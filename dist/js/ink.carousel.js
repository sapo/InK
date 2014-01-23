/**
 * @module Ink.UI.Carousel_1
 * @author inkdev AT sapo.pt
 * @version 1
 */
Ink.createModule('Ink.UI.Carousel', '1',
    ['Ink.UI.Common_1', 'Ink.Dom.Event_1', 'Ink.Dom.Css_1', 'Ink.Dom.Element_1', 'Ink.UI.Pagination_1', 'Ink.Dom.Browser_1', 'Ink.Dom.Selector_1'],
    function(Common, InkEvent, Css, InkElement, Pagination, Browser/*, Selector*/) {
    'use strict';

    /*
     * TODO:
     *  keyboardSupport
     */

    function limitRange(n, min, max) {
        return Math.min(max, Math.max(min, n));
    }

    var requestAnimationFrame = window.requestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        function (cb) {return setTimeout(cb, 1000 / 30); };

    /**
     * @class Ink.UI.Carousel_1
     * @constructor
     *
     * @param {String|DOMElement} selector
     * @param {Object} [options]
     *  @param {String} [options.axis='x'] Can be `'x'` or `'y'`, for a horizontal or vertical carousel
     *  @param {Boolean} [options.center=false] Center the carousel.
     *  @param {Number} [options.initialSlide=null] If set to a number, set the corresponding slide immediately.
     *  @TODO @param {Boolean} [options.keyboardSupport=false] Enable keyboard support
     *  @param {Boolean} [options.swipe=true] Enable swipe support where available
     *  @param {String|DOMElement|Ink.UI.Pagination_1} [options.pagination] Either an `<ul>` element to add pagination markup to, or an `Ink.UI.Pagination` instance to use.
     *  @param {Function} [options.onChange] Callback for when the page is changed.
     */
    var Carousel = function(selector, options) {
        this._handlers = {
            paginationChange: Ink.bindMethod(this, '_onPaginationChange'),
            windowResize:     Ink.bindMethod(this, 'refit')
        };

        InkEvent.observe(window, 'resize', this._handlers.windowResize);

        var element = this._element = Common.elOrSelector(selector, '1st argument');

        var opts = this._options = Ink.extendObj({
            axis:           'x',
            initialSlide:    null,
            hideLast:       false,
            center:         false,
            keyboardSupport:false,
            pagination:     null,
            onChange:       null,
            swipe:          true
            // TODO exponential swipe
            // TODO specify break point for next slide
        }, options || {}, InkElement.data(element));

        opts.initialSlide = parseInt(opts.initialSlide);

        this._isY = (opts.axis === 'y');

        var ulEl = Ink.s('ul.stage', element);
        this._ulEl = ulEl;

        InkElement.removeTextNodeChildren(ulEl);

        if (opts.hideLast) {
            var hiderEl = InkElement.create('div', {
                className: 'hider',
                insertBottom: this._element
            });
            hiderEl.style.position = 'absolute';
            hiderEl.style[ this._isY ? 'left' : 'top' ] = '0';  // fix to top..
            hiderEl.style[ this._isY ? 'right' : 'bottom' ] = '0';  // and bottom...
            hiderEl.style[ this._isY ? 'bottom' : 'right' ] = '0';  // and move to the end.
            this._hiderEl = hiderEl;
        }

        this.refit();

        if (this._isY) {
            // Override white-space: no-wrap which is only necessary to make sure horizontal stuff stays horizontal, but breaks stuff intended to be vertical.
            this._ulEl.style.whiteSpace = 'normal';
        }

        var pagination;
        if (opts.pagination) {
            if (Common.isDOMElement(opts.pagination) || typeof opts.pagination === 'string') {
                // if dom element or css selector string...
                pagination = this._pagination = new Pagination(opts.pagination, {
                    size:     this._numSlides,
                    onChange: this._handlers.paginationChange
                });
            } else {
                // assumes instantiated pagination
                pagination = this._pagination = opts.pagination;
                this._pagination._options.onChange = this._handlers.paginationChange;
                this._pagination.setSize(this._numSlides);
                this._pagination.setCurrent(opts.initialSlide || 0);
            }
        } else {
            this._currentSlide = opts.initialSlide || 0;
        }

        if (opts.swipe) {
            InkEvent.observe(element, 'touchstart', Ink.bindMethod(this, '_onTouchStart'));
            InkEvent.observe(element, 'touchmove', Ink.bindMethod(this, '_onTouchMove'));
            InkEvent.observe(element, 'touchend', Ink.bindMethod(this, '_onTouchEnd'));
        }
    };

    Carousel.prototype = {
        /**
         * Measure the carousel once again, adjusting the involved elements'
         * sizes. Called automatically when the window resizes, in order to
         * cater for changes from responsive media queries, for instance.
         *
         * @method refit
         * @public
         */
        refit: function() {
            var _isY = this._isY;

            var size = function (elm, perpendicular) {
                if (!perpendicular) {
                    return InkElement.outerDimensions(elm)[_isY ? 1 : 0];
                } else {
                    return InkElement.outerDimensions(elm)[_isY ? 0 : 1];
                }
            };

            this._liEls = Ink.ss('li.slide', this._ulEl);
            var numItems = this._liEls.length;
            this._ctnLength = size(this._element);
            this._elLength = size(this._liEls[0]);
            this._itemsPerSlide = Math.floor( this._ctnLength / this._elLength  );

            var numSlides = Math.ceil( numItems / this._itemsPerSlide );
            var numSlidesChanged = this._numSlides !== numSlides;
            this._numSlides = numSlides;
            this._deltaLength = this._itemsPerSlide * this._elLength;
            
            if (this._isY) {
                this._element.style.width = size(this._liEls[0], true) + 'px';
                this._ulEl.style.width  = size(this._liEls[0], true) + 'px';
            } else {
                this._ulEl.style.height = size(this._liEls[0], true) + 'px';
            }

            this._center();
            this._updateHider();
            this._IE7();
            
            if (this._pagination && numSlidesChanged) {
                this._pagination.setSize(this._numSlides);
                this._pagination.setCurrent(0);
            }
        },

        _center: function() {
            if (!this._options.center) { return; }
            var gap = Math.floor( (this._ctnLength - (this._elLength * this._itemsPerSlide) ) / 2 );

            var pad;
            if (this._isY) {
                pad = [gap, 'px 0'];
            } else {
                pad = ['0 ', gap, 'px'];
            }

            this._ulEl.style.padding = pad.join('');
        },

        _updateHider: function() {
            if (!this._hiderEl) { return; }
            if ((!this._pagination) || this._pagination.getCurrent() === 0) {
                var gap = Math.floor( this._ctnLength - (this._elLength * this._itemsPerSlide) );
                if (this._options.center) {
                    gap /= 2;
                }
                this._hiderEl.style[ this._isY ? 'height' : 'width' ] = gap + 'px';
            } else {
                this._hiderEl.style[ this._isY ? 'height' : 'width' ] = '0px';
            }
        },
        
        /**
         * Refit stuff for IE7 because it won't support inline-block.
         *
         * @method _IE7
         * @private
         */
        _IE7: function () {
            if (Browser.IE && '' + Browser.version.split('.')[0] === '7') {
                // var numSlides = this._numSlides;
                var slides = Ink.ss('li.slide', this._ulEl);
                var stl = function (prop, val) {slides[i].style[prop] = val; };
                for (var i = 0, len = slides.length; i < len; i++) {
                    stl('position', 'absolute');
                    stl(this._isY ? 'top' : 'left', (i * this._elLength) + 'px');
                }
            }
        },

        _onTouchStart: function (event) {
            if (event.touches.length > 1) { return; }

            this._swipeData = {
                x: InkEvent.pointerX(event),
                y: InkEvent.pointerY(event),
                lastUlPos: null
            };

            var ulRect = this._ulEl.getBoundingClientRect();

            this._swipeData.inUlX =  this._swipeData.x - ulRect.left;
            this._swipeData.inUlY =  this._swipeData.y - ulRect.top;

            setTransitionProperty(this._ulEl, 'none');

            this._touchMoveIsFirstTouchMove = true;

            // event.preventDefault();
            event.stopPropagation();
        },

        _onTouchMove: function (event) {
            if (event.touches.length > 1) { return; /* multitouch event, not my problem. */ }

            var pointerX = InkEvent.pointerX(event);
            var pointerY = InkEvent.pointerY(event);

            var deltaY = Math.abs(pointerY - this._swipeData.y);
            var deltaX = Math.abs(pointerX - this._swipeData.x);

            if (this._touchMoveIsFirstTouchMove) {
                this._touchMoveIsFirstTouchMove = undefined;
                this._scrolling = this._isY ?
                    deltaX > deltaY :
                    deltaY > deltaX ;

                if (!this._scrolling) {
                    this._onAnimationFrame();
                }
            }

            if (!this._scrolling && this._swipeData) {
                event.preventDefault();

                if (!this._isY) {
                    this._swipeData.pointerPos = pointerX;
                } else {
                    this._swipeData.pointerPos = pointerY;
                }
            }

            event.stopPropagation();
        },

        _onAnimationFrame: function () {
            var swipeData = this._swipeData;

            if (!swipeData || this._scrolling || this._touchMoveIsFirstTouchMove) { return; }

            var elRect = this._element.getBoundingClientRect();

            var newPos;

            if (!this._isY) {
                newPos = swipeData.pointerPos - swipeData.inUlX - elRect.left;
            } else {
                newPos = swipeData.pointerPos - swipeData.inUlY - elRect.top;
            }

            this._ulEl.style[this._isY ? 'top' : 'left'] = newPos + 'px';

            swipeData.lastUlPos = newPos;

            requestAnimationFrame(Ink.bindMethod(this, '_onAnimationFrame'));
        },

        _onTouchEnd: function (event) {
            if (this._swipeData && this._swipeData.pointerPos && !this._scrolling && !this._touchMoveIsFirstTouchMove) {
                var snapToNext = 0.1;  // swipe 10% of the way to change page
                var progress = - this._swipeData.lastUlPos;

                var curSlide = this._pagination.getCurrent();
                var estimatedSlide = progress / this._elLength / this._itemsPerSlide;

                if (Math.round(estimatedSlide) === curSlide) {
                    var diff = estimatedSlide - curSlide;
                    if (Math.abs(diff) > snapToNext) {
                        diff = diff > 0 ? 1 : -1;
                        curSlide += diff;
                    }
                } else {
                    curSlide = Math.round(estimatedSlide);
                }

                this.setSlide(curSlide);

                event.stopPropagation();
                // event.preventDefault();
            }

            setTransitionProperty(this._ulEl, null /* transition: left, top */);
            this._swipeData = null;
            this._touchMoveIsFirstTouchMove = undefined;
            this._scrolling = undefined;
        },

        _onPaginationChange: function(pgn) {
            var currSlide = pgn.getCurrent();
            this.setSlide(currSlide);
        },

        getSlide: function () {
            if (this._pagination) {
                return this._pagination.getCurrent();
            } else {
                return this._currentSlide;
            }
        },

        /**
         * Set the current slide to `page`
         * @method setSlide
         * @param slide
         **/
        setSlide: function (slide) {
            slide = limitRange(slide, 0, this._numSlides - 1);
            this._ulEl.style[ this._options.axis === 'y' ? 'top' : 'left'] = ['-', slide * this._deltaLength, 'px'].join('');
            if (this._options.onChange) {
                this._options.onChange.call(this, slide);
            }

            this._currentSlide = slide;

            this._updateHider();
        },

        /**
         * Change to the next page
         * @method nextSlide
         **/
        nextSlide: function () { this.setSlide(this.getSlide() + 1); },

        /**
         * Change to the previous page
         * @method previousSlide
         **/
        previousSlide: function () { this.setSlide(this.getSlide() - 1); }
    };

    function setTransitionProperty(el, newTransition) {
        el.style.transitionProperty =
        el.style.oTransitionProperty =
        el.style.msTransitionProperty =
        el.style.mozTransitionProperty =
        el.style.webkitTransitionProperty = newTransition;
    }

    return Carousel;

});
