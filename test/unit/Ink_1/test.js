/*globals equal,test,asyncTest,stop,start,ok,expect*/
test('bindMethod', function () {
    var obj = {
        test0: function () {
            return [].slice.call(arguments);
        },
        test1: function () {
            return [].slice.call(arguments);
        },
        test2: function () {
            return this;
        }
    };
    var test0 = Ink.bindMethod(obj, 'test0');
    var test1 = Ink.bindMethod(obj, 'test1', 1, 2, 3, 4);
    var test2 = Ink.bindMethod(obj, 'test2');

    deepEqual(test0(1, 2, 3, 4), [1, 2, 3, 4], 'returns same arguments as called with');
    deepEqual(test1(), [1, 2, 3, 4], 'returns arguments given at bind time');
    deepEqual(test2(), obj, 'returns the object owning the method');
});

test('createExt', function () {
    stop();  // async
    expect(1);  // only one assertion
    
    Ink.createExt('Lol.Parser', 1, [], function () {
        return {
            parse: function () {}
        };
    });

    Ink.requireModules(['Ink.Ext.Lol.Parser_1'], function (Parser) {
        equal(typeof Parser.parse, 'function', 'checking module');
        start();  // async done
    });
});

test('getPath, setPath', function () {
    Ink.setPath('Ink', 'http://example.com/');
    equal(Ink.getPath('Ink'), 'http://example.com/lib.js');
    equal(Ink.getPath('Ink.Dom.Element'), 'http://example.com/Dom/Element/lib.js');
    equal(Ink.getPath('Ink.Dom.Element.Stuff_1'), 'http://example.com/Dom/Element/Stuff/1/lib.js');
    equal(Ink.getPath('Ink', true), 'http://example.com/');  // noLib === true, so no lib.jhs
});

test('getPath, setPath', function () {
    Ink.setPath('Ink.Sub', 'http://example.com/sub/');
    equal(Ink.getPath('Ink.Sub'), 'http://example.com/sub/lib.js');
    equal(Ink.getPath('Ink.Sub.Sub_1'), 'http://example.com/sub/Sub/1/lib.js');

    Ink.setPath('Plug.Sub', 'http://example.com/subplug/');
    equal(Ink.getPath('Plug.Sub'), 'http://example.com/subplug/lib.js');
    equal(Ink.getPath('Plug.Sub.Sub'), 'http://example.com/subplug/Sub/lib.js');

    Ink.setPath('Ink.Sub.Sub', 'http://example.com/subsub/');
    equal(Ink.getPath('Ink.Sub'), 'http://example.com/sub/lib.js');
    equal(Ink.getPath('Ink.Sub.Sub_whoo'), 'http://example.com/subsub/whoo/lib.js');

    Ink.setPath('Plug.Sub.Sub', 'http://example.com/subsubplug/');
    equal(Ink.getPath('Plug.Sub'), 'http://example.com/subplug/lib.js');
    equal(Ink.getPath('Plug.Sub.Sub'), 'http://example.com/subsubplug/lib.js');
});

asyncTest('loadScript', function () {
    expect(2);
    window.loadScriptWorks = function (sayYeah) {
        equal(sayYeah, 'yeah');
        start();
    };
    Ink.loadScript('./loadscript-test.js');  // This script calls window.loadScriptWorks('yeah')
    var scripts = document.getElementsByTagName('script');
    var _a = document.createElement('a');
    _a.href = './loadscript-test.js';
    for (var i = 0, len = scripts.length; i < len; i++) {
        if (scripts[i].src === _a.href) {
            ok(true, 'script tag inserted as expected');
        }
    }
});

(function () {
    Ink.createModule('My.Module', 1, [], function () {
        return {
            my: 'module'
        };
    });

    Ink.createModule('My.Other.Module', 1, ['My.Module_1'], function (mymodule) {
        return {
            my: 'othermodule',
            dependency: mymodule
        };
    });

    test('createModule dependencies', function () {
        var myModule = Ink.getModule('My.Module_1');
        equal(myModule.my, 'module');

        var myOtherModule = Ink.getModule('My.Other.Module_1');
        equal(myOtherModule.my, 'othermodule');
        equal(myOtherModule.dependency.my, 'module');
    });

    test('requireModules', function () {
        Ink.requireModules(['My.Module_1'], function (module) {
            equal(module.my, 'module');
        });
    });
}());

test('createModule makes the module available immediately when there are no dependencies', function () {
    Ink.createModule('Ink.New.Module', 1, [], function () {
        return {};
    });
    ok(Ink.getModule('Ink.New.Module_1'));
});

asyncTest('trying to load TestModuleWithDependencies/1/lib.js', function () {
    expect(3 /* here */ + 2 /* for each createModules */);
    Ink.setPath('TestModule', './TestModule'); // TestModuleWithDependencies's dependency
    Ink.setPath('TestModuleWithDependencies', './TestModuleWithDependencies')
    Ink.requireModules(['TestModuleWithDependencies_1'], function (TestModuleWithDependencies) {
        equal(TestModuleWithDependencies.hello, 'dependencies');
        ok(TestModuleWithDependencies.TestModule);
        equal(TestModuleWithDependencies.TestModule.hello, 'world');
        start();
        return {}
    });
});

asyncTest('Nested requireModules', function () {
    expect(2);// expecting all the callbacks to run

    Ink.createModule('Ink.nest1', 1, [], function () { return {} });
    Ink.createModule('Ink.nest2', 1, [], function () { return {} });

    Ink.requireModules(['Ink.nest1_1'], function () {
        ok(true, 'first callback run');
        Ink.requireModules(['Ink.nest2_1'], function () {
            ok(true, 'second callback run');
            start();
        });
    });

});

asyncTest('requireModules can require a module which does not yet exist. The script tag is only made on the next tick.', function () {
    expect(2);
    Ink.requireModules(['Ink.notYet_1'], function (obj) {
        var scripts = document.getElementsByTagName('script');
        for (var i = 0, len = scripts.length; i < len; i++) {
            if (scripts[i].src === Ink.getPath('Ink.notYet_1')) {
                ok(false, 'Ink tried to load the module and did not wait a tick!');
                start();
                return
            }
        }
        ok(true, 'Ink did not try to load the module before waiting a tick');
        start();
        return;
    });
    Ink.createModule('Ink.notYet', 1, [], function () {
        ok(true);
        return {};
    });
});

asyncTest('createModule also waits a tick for dependencies to be created', function () {
    expect(2);
    Ink.createModule('Ink.Test.Wait.Tick.For.Dependencies', 1, ['Ink.Not.Yet.Dependency_1'], function () {
        ok(true);
        start();
        return {};
    });
    Ink.createModule('Ink.Not.Yet.Dependency', 1, [], function () {
        ok(true);
        return {};
    });
});
asyncTest('(regression) createModule can work with a requireModule afterwards when it has dependencies', function () {
    expect(2);

    Ink.setPath('Ink', '.');

    Ink.createModule( 'Ink.UI.SelectFilter' , '1', ['Ink.SomeUnresolvedDependency_1'], function( Common , Selector , InkEvent ) {
        ok(true);
        return {};
    });

    Ink.requireModules( [ 'Ink.UI.SelectFilter_1' ] , function( SF ) {
        var scripts = document.getElementsByTagName('script');
        var _a = document.createElement('a');
        _a.href = Ink.getPath('Ink.UI.SelectFilter_1');
        for (var i = 0, len = scripts.length; i < len; i++) {
            if (scripts[i].src === _a.href) {
                ok(false, 'Ink tried to request the Ink.UI.SelectFilter_1 module using a script tag, even though it was already created but waiting for dependencies!');
                start();
                return
            }
        }
        ok(true);
        start();
    });
});

