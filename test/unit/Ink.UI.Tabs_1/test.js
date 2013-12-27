Ink.requireModules(['Ink.UI.Tabs_1', 'Ink.UI.Common_1', 'Ink.Dom.Element_1', 'Ink.Dom.Event_1', 'Ink.Dom.Selector_1'], function (Tabs, Common, InkElement, InkEvent, Selector) {
    var fakeLayout;

    // Prevent state from other test runs from infecting this.
    var pathHere = (window.location + '').replace(/\#.*/g, '')
    window.location.hash = '#no-hash';

    function makeContainer() {
        return InkElement.create('div', {
            className: 'ink-tabs',
            setHTML: Ink.i('tab_html').innerHTML,
            style: 'display: none',
            insertBottom: document.body
        });
    }

    function testTabs(name, testBack, options) {
        test(name, function ()  {
            var container = makeContainer();
            var tabs = Ink.ss('.tabs-nav li', container);
            var tabComponent = new Tabs(container, options || {});
            testBack(tabComponent, container, tabs);
        });
    }

    testTabs('_findLinkByHref', function (tabComponent, container, tabs) {
        var link = tabs[0].children[0];
        var linkWithFullUrl = tabs[1].children[0];
        linkWithFullUrl.setAttribute('href', pathHere + '#someth');

        ok(link && linkWithFullUrl);
        strictEqual(tabComponent._findLinkByHref('someth'), linkWithFullUrl);
        strictEqual(tabComponent._findLinkByHref('home'), link);
    });

    testTabs('_changeTab', function (tabComponent, container, tabs) {
        var changeTo = tabs[1];  // because tab 0 is the active one now
        ok(changeTo);
        notStrictEqual(tabComponent.activeMenuTab(), changeTo);

        tabComponent._changeTab(Ink.s('a', changeTo));

        ok(changeTo.className.match(/active/), 'tab has .active class!');
        strictEqual(tabComponent.activeMenuTab(), changeTo, 'tab is active!');

        var activeTabs = Ink.ss('.tabs-nav .active', container);
        equal(activeTabs.length, 1, 'only ever one active tab');

        var activePanes = Ink.ss('div.active', container);
        equal(activePanes.length, 1, 'only ever one active pane');
    });

    testTabs('changeTab calls _changeTab with correct arguments', function (tabComponent, container) {
        var spy = sinon.spy(tabComponent, '_changeTab');
        tabComponent.changeTab('home');
        ok(spy.calledOnce);
        deepEqual(spy.lastCall.args, [Ink.s('a[href$="#home"]', container), true]);
    });

    testTabs('... but not new tab is ', function (tabComponent) {
        var spy = sinon.spy(tabComponent, '_changeTab');
        tabComponent.changeTab('hoem');
        ok(!spy.called);
    });

    testTabs('when clicking a tab, _changeTab is called with the target link', function (tabComponent, container) {
        stop();
        var spy = sinon.spy(tabComponent, '_changeTab');
        var theTabLink = Ink.s('a[href$="#news"]', container);
        Syn.click(theTabLink, function () {
            ok(spy.calledOnce);
            deepEqual(spy.lastCall && spy.lastCall.args, [theTabLink, true]);
            start();
        });
    });

    test('regression test: #245', function () {
        var cont = makeContainer();
        var home = Ink.s('a[href$="#home"]', cont);
        home.setAttribute('href', '#hoem');
        new Tabs(cont, { active: 'hoem' });
        ok(true, 'creating a tabs object didn\'t raise an exception');
    });

    module('change the hash in the URL', {
        setup: function () { window.location.hash = '#original-hash'; },
        teardown: function () { window.location.hash = ''; }
    });

    testTabs('clicking a tab changes window.location.hash', function (tabComponent, container) {
        stop();
        Syn.click(Ink.s('a[href$="#home"]', container), function () {
            equal(window.location.hash, '#home');
            start();
        });
    });

    testTabs('... except when options.preventUrlChange === true', function (tabComponent, container) {
        stop();
        Syn.click(Ink.s('a[href$="#home"]', container), function () {
            equal(window.location.hash, '#original-hash', 'location.hash shouldnt change if preventUrlChange === true.');
            start();
        });
    }, {preventUrlChange: true});
});
