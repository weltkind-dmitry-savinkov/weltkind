
// Plugins


// Get standart scrollbar width
function getScrollWidth() {
    var div = document.createElement('div');
    div.style.overflowY = 'scroll';
    div.style.width = '50px';
    div.style.height = '50px';
    div.style.visibility = 'hidden';
    document.body.appendChild(div);
    var scrollWidth = div.offsetWidth - div.clientWidth;
    document.body.removeChild(div);
    return scrollWidth;
}
// Lock the scrollbar
function disableBodyOverflow() {
    var scrollWidth = getScrollWidth();
    $('html').css({
        'overflow': 'hidden',
        'margin-right': scrollWidth
    });
}
// Unlock the scrollbar
function enableBodyOverflow() {
    $('html').css({
        'overflow': 'auto',
        'margin-right': '0'
    });
}


//
// Browsehappy
(function() {
    $('.browsehappy').click(function() {
        $(this).slideUp();
    });
})();


/*!
 * fancyBox - jQuery Plugin
 * version: 2.1.5 (Fri, 14 Jun 2013)
 * requires jQuery v1.6 or later
 *
 * Examples at http://fancyapps.com/fancybox/
 * License: www.fancyapps.com/fancybox/#license
 *
 * Copyright 2012 Janis Skarnelis - janis@fancyapps.com
 *
 */
;(function (window, document, $, undefined) {
    "use strict";
    var H = $("html"),
        W = $(window),
        D = $(document),
        F = $.fancybox = function () {
            F.open.apply( this, arguments );
        },
        IE =  navigator.userAgent.match(/msie/i),
        didUpdate   = null,
        isTouch     = document.createTouch !== undefined,
        isQuery = function(obj) {
            return obj && obj.hasOwnProperty && obj instanceof $;
        },
        isString = function(str) {
            return str && $.type(str) === "string";
        },
        isPercentage = function(str) {
            return isString(str) && str.indexOf('%') > 0;
        },
        isScrollable = function(el) {
            return (el && !(el.style.overflow && el.style.overflow === 'hidden') && ((el.clientWidth && el.scrollWidth > el.clientWidth) || (el.clientHeight && el.scrollHeight > el.clientHeight)));
        },
        getScalar = function(orig, dim) {
            var value = parseInt(orig, 10) || 0;
            if (dim && isPercentage(orig)) {
                value = F.getViewport()[ dim ] / 100 * value;
            }
            return Math.ceil(value);
        },
        getValue = function(value, dim) {
            return getScalar(value, dim) + 'px';
        };
    $.extend(F, {
        // The current version of fancyBox
        version: '2.1.5',
        defaults: {
            padding : 0,
            margin  : 20,
            width     : 800,
            height    : 600,
            minWidth  : 100,
            minHeight : 100,
            maxWidth  : 9999,
            maxHeight : 9999,
            pixelRatio: 1, // Set to 2 for retina display support
            autoSize   : true,
            autoHeight : false,
            autoWidth  : false,
            autoResize  : true,
            autoCenter  : !isTouch,
            fitToView   : true,
            aspectRatio : false,
            topRatio    : 0.5,
            leftRatio   : 0.5,
            scrolling : 'auto', // 'auto', 'yes' or 'no'
            wrapCSS   : '',
            arrows     : true,
            closeBtn   : true,
            closeClick : false,
            nextClick  : false,
            mouseWheel : true,
            autoPlay   : false,
            playSpeed  : 3000,
            preload    : 3,
            modal      : false,
            loop       : true,
            ajax  : {
                dataType : 'html',
                headers  : { 'X-fancyBox': true }
            },
            iframe : {
                scrolling : 'auto',
                preload   : true
            },
            swf : {
                wmode: 'transparent',
                allowfullscreen   : 'true',
                allowscriptaccess : 'always'
            },
            keys  : {
                next : {
                    13 : 'left', // enter
                    34 : 'up',   // page down
                    39 : 'left', // right arrow
                    40 : 'up'    // down arrow
                },
                prev : {
                    8  : 'right',  // backspace
                    33 : 'down',   // page up
                    37 : 'right',  // left arrow
                    38 : 'down'    // up arrow
                },
                close  : [27], // escape key
                play   : [32], // space - start/stop slideshow
                toggle : [70]  // letter "f" - toggle fullscreen
            },
            direction : {
                next : 'left',
                prev : 'right'
            },
            scrollOutside  : true,
            // Override some properties
            index   : 0,
            type    : null,
            href    : null,
            content : null,
            title   : null,
            // HTML templates
            tpl: {
                wrap     : '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
                image    : '<img class="fancybox-image" src="{href}" alt="" />',
                iframe   : '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen' + (IE ? ' allowtransparency="true"' : '') + '></iframe>',
                error    : '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
                closeBtn : '<a title="X" class="fancybox-item fancybox-close" href="javascript:;"></a>',
                next     : '<a title=">" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
                prev     : '<a title="<" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>',
                loading  : '<div id="fancybox-loading"><div></div></div>'
            },
            // Properties for each animation type
            // Opening fancyBox
            openEffect  : 'fade', // 'elastic', 'fade' or 'none'
            openSpeed   : 0,
            openEasing  : 'swing',
            openOpacity : true,
            openMethod  : 'zoomIn',
            // Closing fancyBox
            closeEffect  : 'fade', // 'elastic', 'fade' or 'none'
            closeSpeed   : 0,
            closeEasing  : 'swing',
            closeOpacity : true,
            closeMethod  : 'zoomOut',
            // Changing next gallery item
            nextEffect : 'elastic', // 'elastic', 'fade' or 'none'
            nextSpeed  : 0,
            nextEasing : 'swing',
            nextMethod : 'changeIn',
            // Changing previous gallery item
            prevEffect : 'elastic', // 'elastic', 'fade' or 'none'
            prevSpeed  : 0,
            prevEasing : 'swing',
            prevMethod : 'changeOut',
            // Enable default helpers
            helpers : {
                overlay : true,
                title   : true
            },
            // Callbacks
            onCancel     : $.noop, // If canceling
            beforeLoad   : $.noop, // Before loading
            afterLoad    : $.noop, // After loading
            beforeShow   : $.noop, // Before changing in current item
            afterShow    : $.noop, // After opening
            beforeChange : $.noop, // Before changing gallery item
            beforeClose  : $.noop, // Before closing
            afterClose   : $.noop  // After closing
        },
        //Current state
        group    : {}, // Selected group
        opts     : {}, // Group options
        previous : null,  // Previous element
        coming   : null,  // Element being loaded
        current  : null,  // Currently loaded element
        isActive : false, // Is activated
        isOpen   : false, // Is currently open
        isOpened : false, // Have been fully opened at least once
        wrap  : null,
        skin  : null,
        outer : null,
        inner : null,
        player : {
            timer    : null,
            isActive : false
        },
        // Loaders
        ajaxLoad   : null,
        imgPreload : null,
        // Some collections
        transitions : {},
        helpers     : {},
        /*
         *  Static methods
         */
        open: function (group, opts) {
            if (!group) {
                return;
            }
            if (!$.isPlainObject(opts)) {
                opts = {};
            }
            // Close if already active
            if (false === F.close(true)) {
                return;
            }
            // Normalize group
            if (!$.isArray(group)) {
                group = isQuery(group) ? $(group).get() : [group];
            }
            // Recheck if the type of each element is `object` and set content type (image, ajax, etc)
            $.each(group, function(i, element) {
                var obj = {},
                    href,
                    title,
                    content,
                    type,
                    rez,
                    hrefParts,
                    selector;
                if ($.type(element) === "object") {
                    // Check if is DOM element
                    if (element.nodeType) {
                        element = $(element);
                    }
                    if (isQuery(element)) {
                        obj = {
                            href    : element.data('fancybox-href') || element.attr('href'),
                            title   : $('<div/>').text( element.data('fancybox-title') || element.attr('title') || '' ).html(),
                            isDom   : true,
                            element : element
                        };
                        if ($.metadata) {
                            $.extend(true, obj, element.metadata());
                        }
                    } else {
                        obj = element;
                    }
                }
                href  = opts.href  || obj.href || (isString(element) ? element : null);
                title = opts.title !== undefined ? opts.title : obj.title || '';
                content = opts.content || obj.content;
                type    = content ? 'html' : (opts.type  || obj.type);
                if (!type && obj.isDom) {
                    type = element.data('fancybox-type');
                    if (!type) {
                        rez  = element.prop('class').match(/fancybox\.(\w+)/);
                        type = rez ? rez[1] : null;
                    }
                }
                if (isString(href)) {
                    // Try to guess the content type
                    if (!type) {
                        if (F.isImage(href)) {
                            type = 'image';
                        } else if (F.isSWF(href)) {
                            type = 'swf';
                        } else if (href.charAt(0) === '#') {
                            type = 'inline';
                        } else if (isString(element)) {
                            type    = 'html';
                            content = element;
                        }
                    }
                    // Split url into two pieces with source url and content selector, e.g,
                    // "/mypage.html #my_id" will load "/mypage.html" and display element having id "my_id"
                    if (type === 'ajax') {
                        hrefParts = href.split(/\s+/, 2);
                        href      = hrefParts.shift();
                        selector  = hrefParts.shift();
                    }
                }
                if (!content) {
                    if (type === 'inline') {
                        if (href) {
                            content = $( isString(href) ? href.replace(/.*(?=#[^\s]+$)/, '') : href ); //strip for ie7
                        } else if (obj.isDom) {
                            content = element;
                        }
                    } else if (type === 'html') {
                        content = href;
                    } else if (!type && !href && obj.isDom) {
                        type    = 'inline';
                        content = element;
                    }
                }
                $.extend(obj, {
                    href     : href,
                    type     : type,
                    content  : content,
                    title    : title,
                    selector : selector
                });
                group[ i ] = obj;
            });
            // Extend the defaults
            F.opts = $.extend(true, {}, F.defaults, opts);
            // All options are merged recursive except keys
            if (opts.keys !== undefined) {
                F.opts.keys = opts.keys ? $.extend({}, F.defaults.keys, opts.keys) : false;
            }
            F.group = group;
            return F._start(F.opts.index);
        },
        // Cancel image loading or abort ajax request
        cancel: function () {
            var coming = F.coming;
            if (coming && false === F.trigger('onCancel')) {
                return;
            }
            F.hideLoading();
            if (!coming) {
                return;
            }
            if (F.ajaxLoad) {
                F.ajaxLoad.abort();
            }
            F.ajaxLoad = null;
            if (F.imgPreload) {
                F.imgPreload.onload = F.imgPreload.onerror = null;
            }
            if (coming.wrap) {
                coming.wrap.stop(true, true).trigger('onReset').remove();
            }
            F.coming = null;
            // If the first item has been canceled, then clear everything
            if (!F.current) {
                F._afterZoomOut( coming );
            }
        },
        // Start closing animation if is open; remove immediately if opening/closing
        close: function (event) {
            F.cancel();
            if (false === F.trigger('beforeClose')) {
                return;
            }
            F.unbindEvents();
            if (!F.isActive) {
                return;
            }
            if (!F.isOpen || event === true) {
                $('.fancybox-wrap').stop(true).trigger('onReset').remove();
                F._afterZoomOut();
            } else {
                F.isOpen = F.isOpened = false;
                F.isClosing = true;
                $('.fancybox-item, .fancybox-nav').remove();
                F.wrap.stop(true, true).removeClass('fancybox-opened');
                F.transitions[ F.current.closeMethod ]();
            }
        },
        // Manage slideshow:
        //   $.fancybox.play(); - toggle slideshow
        //   $.fancybox.play( true ); - start
        //   $.fancybox.play( false ); - stop
        play: function ( action ) {
            var clear = function () {
                    clearTimeout(F.player.timer);
                },
                set = function () {
                    clear();
                    if (F.current && F.player.isActive) {
                        F.player.timer = setTimeout(F.next, F.current.playSpeed);
                    }
                },
                stop = function () {
                    clear();
                    D.unbind('.player');
                    F.player.isActive = false;
                    F.trigger('onPlayEnd');
                },
                start = function () {
                    if (F.current && (F.current.loop || F.current.index < F.group.length - 1)) {
                        F.player.isActive = true;
                        D.bind({
                            'onCancel.player beforeClose.player' : stop,
                            'onUpdate.player'   : set,
                            'beforeLoad.player' : clear
                        });
                        set();
                        F.trigger('onPlayStart');
                    }
                };
            if (action === true || (!F.player.isActive && action !== false)) {
                start();
            } else {
                stop();
            }
        },
        // Navigate to next gallery item
        next: function ( direction ) {
            var current = F.current;
            if (current) {
                if (!isString(direction)) {
                    direction = current.direction.next;
                }
                F.jumpto(current.index + 1, direction, 'next');
            }
        },
        // Navigate to previous gallery item
        prev: function ( direction ) {
            var current = F.current;
            if (current) {
                if (!isString(direction)) {
                    direction = current.direction.prev;
                }
                F.jumpto(current.index - 1, direction, 'prev');
            }
        },
        // Navigate to gallery item by index
        jumpto: function ( index, direction, router ) {
            var current = F.current;
            if (!current) {
                return;
            }
            index = getScalar(index);
            F.direction = direction || current.direction[ (index >= current.index ? 'next' : 'prev') ];
            F.router    = router || 'jumpto';
            if (current.loop) {
                if (index < 0) {
                    index = current.group.length + (index % current.group.length);
                }
                index = index % current.group.length;
            }
            if (current.group[ index ] !== undefined) {
                F.cancel();
                F._start(index);
            }
        },
        // Center inside viewport and toggle position type to fixed or absolute if needed
        reposition: function (e, onlyAbsolute) {
            var current = F.current,
                wrap    = current ? current.wrap : null,
                pos;
            if (wrap) {
                pos = F._getPosition(onlyAbsolute);
                if (e && e.type === 'scroll') {
                    delete pos.position;
                    wrap.stop(true, true).animate(pos, 200);
                } else {
                    wrap.css(pos);
                    current.pos = $.extend({}, current.dim, pos);
                }
            }
        },
        update: function (e) {
            var type = (e && e.originalEvent && e.originalEvent.type),
                anyway = !type || type === 'orientationchange';
            if (anyway) {
                clearTimeout(didUpdate);
                didUpdate = null;
            }
            if (!F.isOpen || didUpdate) {
                return;
            }
            didUpdate = setTimeout(function() {
                var current = F.current;
                if (!current || F.isClosing) {
                    return;
                }
                F.wrap.removeClass('fancybox-tmp');
                if (anyway || type === 'load' || (type === 'resize' && current.autoResize)) {
                    F._setDimension();
                }
                if (!(type === 'scroll' && current.canShrink)) {
                    F.reposition(e);
                }
                F.trigger('onUpdate');
                didUpdate = null;
            }, (anyway && !isTouch ? 0 : 300));
        },
        // Shrink content to fit inside viewport or restore if resized
        toggle: function ( action ) {
            if (F.isOpen) {
                F.current.fitToView = $.type(action) === "boolean" ? action : !F.current.fitToView;
                // Help browser to restore document dimensions
                if (isTouch) {
                    F.wrap.removeAttr('style').addClass('fancybox-tmp');
                    F.trigger('onUpdate');
                }
                F.update();
            }
        },
        hideLoading: function () {
            D.unbind('.loading');
            $('#fancybox-loading').remove();
        },
        showLoading: function () {
            var el, viewport;
            F.hideLoading();
            el = $(F.opts.tpl.loading).click(F.cancel).appendTo('body');
            // If user will press the escape-button, the request will be canceled
            D.bind('keydown.loading', function(e) {
                if ((e.which || e.keyCode) === 27) {
                    e.preventDefault();
                    F.cancel();
                }
            });
            if (!F.defaults.fixed) {
                viewport = F.getViewport();
                el.css({
                    position : 'absolute',
                    top  : (viewport.h * 0.5) + viewport.y,
                    left : (viewport.w * 0.5) + viewport.x
                });
            }
            F.trigger('onLoading');
        },
        getViewport: function () {
            var locked = (F.current && F.current.locked) || false,
                rez    = {
                    x: W.scrollLeft(),
                    y: W.scrollTop()
                };
            if (locked && locked.length) {
                rez.w = locked[0].clientWidth;
                rez.h = locked[0].clientHeight;
            } else {
                // See http://bugs.jquery.com/ticket/6724
                rez.w = isTouch && window.innerWidth  ? window.innerWidth  : W.width();
                rez.h = isTouch && window.innerHeight ? window.innerHeight : W.height();
            }
            return rez;
        },
        // Unbind the keyboard / clicking actions
        unbindEvents: function () {
            if (F.wrap && isQuery(F.wrap)) {
                F.wrap.unbind('.fb');
            }
            D.unbind('.fb');
            W.unbind('.fb');
        },
        bindEvents: function () {
            var current = F.current,
                keys;
            if (!current) {
                return;
            }
            // Changing document height on iOS devices triggers a 'resize' event,
            // that can change document height... repeating infinitely
            W.bind('orientationchange.fb' + (isTouch ? '' : ' resize.fb') + (current.autoCenter && !current.locked ? ' scroll.fb' : ''), F.update);
            keys = current.keys;
            if (keys) {
                D.bind('keydown.fb', function (e) {
                    var code   = e.which || e.keyCode,
                        target = e.target || e.srcElement;
                    // Skip esc key if loading, because showLoading will cancel preloading
                    if (code === 27 && F.coming) {
                        return false;
                    }
                    // Ignore key combinations and key events within form elements
                    if (!e.ctrlKey && !e.altKey && !e.shiftKey && !e.metaKey && !(target && (target.type || $(target).is('[contenteditable]')))) {
                        $.each(keys, function(i, val) {
                            if (current.group.length > 1 && val[ code ] !== undefined) {
                                F[ i ]( val[ code ] );
                                e.preventDefault();
                                return false;
                            }
                            if ($.inArray(code, val) > -1) {
                                F[ i ] ();
                                e.preventDefault();
                                return false;
                            }
                        });
                    }
                });
            }
            if ($.fn.mousewheel && current.mouseWheel) {
                F.wrap.bind('mousewheel.fb', function (e, delta, deltaX, deltaY) {
                    var target = e.target || null,
                        parent = $(target),
                        canScroll = false;
                    while (parent.length) {
                        if (canScroll || parent.is('.fancybox-skin') || parent.is('.fancybox-wrap')) {
                            break;
                        }
                        canScroll = isScrollable( parent[0] );
                        parent    = $(parent).parent();
                    }
                    if (delta !== 0 && !canScroll) {
                        if (F.group.length > 1 && !current.canShrink) {
                            if (deltaY > 0 || deltaX > 0) {
                                F.prev( deltaY > 0 ? 'down' : 'left' );
                            } else if (deltaY < 0 || deltaX < 0) {
                                F.next( deltaY < 0 ? 'up' : 'right' );
                            }
                            e.preventDefault();
                        }
                    }
                });
            }
        },
        trigger: function (event, o) {
            var ret, obj = o || F.coming || F.current;
            if (obj) {
                if ($.isFunction( obj[event] )) {
                    ret = obj[event].apply(obj, Array.prototype.slice.call(arguments, 1));
                }
                if (ret === false) {
                    return false;
                }
                if (obj.helpers) {
                    $.each(obj.helpers, function (helper, opts) {
                        if (opts && F.helpers[helper] && $.isFunction(F.helpers[helper][event])) {
                            F.helpers[helper][event]($.extend(true, {}, F.helpers[helper].defaults, opts), obj);
                        }
                    });
                }
            }
            D.trigger(event);
        },
        isImage: function (str) {
            return isString(str) && str.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i);
        },
        isSWF: function (str) {
            return isString(str) && str.match(/\.(swf)((\?|#).*)?$/i);
        },
        _start: function (index) {
            var coming = {},
                obj,
                href,
                type,
                margin,
                padding;
            index = getScalar( index );
            obj   = F.group[ index ] || null;
            if (!obj) {
                return false;
            }
            coming = $.extend(true, {}, F.opts, obj);
            // Convert margin and padding properties to array - top, right, bottom, left
            margin  = coming.margin;
            padding = coming.padding;
            if ($.type(margin) === 'number') {
                coming.margin = [margin, margin, margin, margin];
            }
            if ($.type(padding) === 'number') {
                coming.padding = [padding, padding, padding, padding];
            }
            // 'modal' propery is just a shortcut
            if (coming.modal) {
                $.extend(true, coming, {
                    closeBtn   : false,
                    closeClick : false,
                    nextClick  : false,
                    arrows     : false,
                    mouseWheel : false,
                    keys       : null,
                    helpers: {
                        overlay : {
                            closeClick : false
                        }
                    }
                });
            }
            // 'autoSize' property is a shortcut, too
            if (coming.autoSize) {
                coming.autoWidth = coming.autoHeight = true;
            }
            if (coming.width === 'auto') {
                coming.autoWidth = true;
            }
            if (coming.height === 'auto') {
                coming.autoHeight = true;
            }
            /*
             * Add reference to the group, so it`s possible to access from callbacks, example:
             * afterLoad : function() {
             *     this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
             * }
             */
            coming.group  = F.group;
            coming.index  = index;
            // Give a chance for callback or helpers to update coming item (type, title, etc)
            F.coming = coming;
            if (false === F.trigger('beforeLoad')) {
                F.coming = null;
                return;
            }
            type = coming.type;
            href = coming.href;
            if (!type) {
                F.coming = null;
                //If we can not determine content type then drop silently or display next/prev item if looping through gallery
                if (F.current && F.router && F.router !== 'jumpto') {
                    F.current.index = index;
                    return F[ F.router ]( F.direction );
                }
                return false;
            }
            F.isActive = true;
            if (type === 'image' || type === 'swf') {
                coming.autoHeight = coming.autoWidth = false;
                coming.scrolling  = 'visible';
            }
            if (type === 'image') {
                coming.aspectRatio = true;
            }
            if (type === 'iframe' && isTouch) {
                coming.scrolling = 'scroll';
            }
            // Build the neccessary markup
            coming.wrap = $(coming.tpl.wrap).addClass('fancybox-' + (isTouch ? 'mobile' : 'desktop') + ' fancybox-type-' + type + ' fancybox-tmp ' + coming.wrapCSS).appendTo( coming.parent || 'body' );
            $.extend(coming, {
                skin  : $('.fancybox-skin',  coming.wrap),
                outer : $('.fancybox-outer', coming.wrap),
                inner : $('.fancybox-inner', coming.wrap)
            });
            $.each(["Top", "Right", "Bottom", "Left"], function(i, v) {
                coming.skin.css('padding' + v, getValue(coming.padding[ i ]));
            });
            F.trigger('onReady');
            // Check before try to load; 'inline' and 'html' types need content, others - href
            if (type === 'inline' || type === 'html') {
                if (!coming.content || !coming.content.length) {
                    return F._error( 'content' );
                }
            } else if (!href) {
                return F._error( 'href' );
            }
            if (type === 'image') {
                F._loadImage();
            } else if (type === 'ajax') {
                F._loadAjax();
            } else if (type === 'iframe') {
                F._loadIframe();
            } else {
                F._afterLoad();
            }
        },
        _error: function ( type ) {
            $.extend(F.coming, {
                type       : 'html',
                autoWidth  : true,
                autoHeight : true,
                minWidth   : 0,
                minHeight  : 0,
                scrolling  : 'no',
                hasError   : type,
                content    : F.coming.tpl.error
            });
            F._afterLoad();
        },
        _loadImage: function () {
            // Reset preload image so it is later possible to check "complete" property
            var img = F.imgPreload = new Image();
            img.onload = function () {
                this.onload = this.onerror = null;
                F.coming.width  = this.width / F.opts.pixelRatio;
                F.coming.height = this.height / F.opts.pixelRatio;
                F._afterLoad();
            };
            img.onerror = function () {
                this.onload = this.onerror = null;
                F._error( 'image' );
            };
            img.src = F.coming.href;
            if (img.complete !== true) {
                F.showLoading();
            }
        },
        _loadAjax: function () {
            var coming = F.coming;
            F.showLoading();
            F.ajaxLoad = $.ajax($.extend({}, coming.ajax, {
                url: coming.href,
                error: function (jqXHR, textStatus) {
                    if (F.coming && textStatus !== 'abort') {
                        F._error( 'ajax', jqXHR );
                    } else {
                        F.hideLoading();
                    }
                },
                success: function (data, textStatus) {
                    if (textStatus === 'success') {
                        coming.content = data;
                        F._afterLoad();
                    }
                }
            }));
        },
        _loadIframe: function() {
            var coming = F.coming,
                iframe = $(coming.tpl.iframe.replace(/\{rnd\}/g, new Date().getTime()))
                    .attr('scrolling', isTouch ? 'auto' : coming.iframe.scrolling)
                    .attr('src', coming.href);
            // This helps IE
            $(coming.wrap).bind('onReset', function () {
                try {
                    $(this).find('iframe').hide().attr('src', '//about:blank').end().empty();
                } catch (e) {}
            });
            if (coming.iframe.preload) {
                F.showLoading();
                iframe.one('load', function() {
                    $(this).data('ready', 1);
                    // iOS will lose scrolling if we resize
                    if (!isTouch) {
                        $(this).bind('load.fb', F.update);
                    }
                    // Without this trick:
                    //   - iframe won't scroll on iOS devices
                    //   - IE7 sometimes displays empty iframe
                    $(this).parents('.fancybox-wrap').width('100%').removeClass('fancybox-tmp').show();
                    F._afterLoad();
                });
            }
            coming.content = iframe.appendTo( coming.inner );
            if (!coming.iframe.preload) {
                F._afterLoad();
            }
        },
        _preloadImages: function() {
            var group   = F.group,
                current = F.current,
                len     = group.length,
                cnt     = current.preload ? Math.min(current.preload, len - 1) : 0,
                item,
                i;
            for (i = 1; i <= cnt; i += 1) {
                item = group[ (current.index + i ) % len ];
                if (item.type === 'image' && item.href) {
                    new Image().src = item.href;
                }
            }
        },
        _afterLoad: function () {
            var coming   = F.coming,
                previous = F.current,
                placeholder = 'fancybox-placeholder',
                current,
                content,
                type,
                scrolling,
                href,
                embed;
            F.hideLoading();
            if (!coming || F.isActive === false) {
                return;
            }
            if (false === F.trigger('afterLoad', coming, previous)) {
                coming.wrap.stop(true).trigger('onReset').remove();
                F.coming = null;
                return;
            }
            if (previous) {
                F.trigger('beforeChange', previous);
                previous.wrap.stop(true).removeClass('fancybox-opened')
                    .find('.fancybox-item, .fancybox-nav')
                    .remove();
            }
            F.unbindEvents();
            current   = coming;
            content   = coming.content;
            type      = coming.type;
            scrolling = coming.scrolling;
            $.extend(F, {
                wrap  : current.wrap,
                skin  : current.skin,
                outer : current.outer,
                inner : current.inner,
                current  : current,
                previous : previous
            });
            href = current.href;
            switch (type) {
                case 'inline':
                case 'ajax':
                case 'html':
                    if (current.selector) {
                        content = $('<div>').html(content).find(current.selector);
                    } else if (isQuery(content)) {
                        if (!content.data(placeholder)) {
                            content.data(placeholder, $('<div class="' + placeholder + '"></div>').insertAfter( content ).hide() );
                        }
                        content = content.show().detach();
                        current.wrap.bind('onReset', function () {
                            if ($(this).find(content).length) {
                                content.hide().replaceAll( content.data(placeholder) ).data(placeholder, false);
                            }
                        });
                    }
                break;
                case 'image':
                    content = current.tpl.image.replace(/\{href\}/g, href);
                break;
                case 'swf':
                    content = '<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="' + href + '"></param>';
                    embed   = '';
                    $.each(current.swf, function(name, val) {
                        content += '<param name="' + name + '" value="' + val + '"></param>';
                        embed   += ' ' + name + '="' + val + '"';
                    });
                    content += '<embed src="' + href + '" type="application/x-shockwave-flash" width="100%" height="100%"' + embed + '></embed></object>';
                break;
            }
            if (!(isQuery(content) && content.parent().is(current.inner))) {
                current.inner.append( content );
            }
            // Give a chance for helpers or callbacks to update elements
            F.trigger('beforeShow');
            // Set scrolling before calculating dimensions
            current.inner.css('overflow', scrolling === 'yes' ? 'scroll' : (scrolling === 'no' ? 'hidden' : scrolling));
            // Set initial dimensions and start position
            F._setDimension();
            F.reposition();
            F.isOpen = false;
            F.coming = null;
            F.bindEvents();
            if (!F.isOpened) {
                $('.fancybox-wrap').not( current.wrap ).stop(true).trigger('onReset').remove();
            } else if (previous.prevMethod) {
                F.transitions[ previous.prevMethod ]();
            }
            F.transitions[ F.isOpened ? current.nextMethod : current.openMethod ]();
            F._preloadImages();
        },
        _setDimension: function () {
            var viewport   = F.getViewport(),
                steps      = 0,
                canShrink  = false,
                canExpand  = false,
                wrap       = F.wrap,
                skin       = F.skin,
                inner      = F.inner,
                current    = F.current,
                width      = current.width,
                height     = current.height,
                minWidth   = current.minWidth,
                minHeight  = current.minHeight,
                maxWidth   = current.maxWidth,
                maxHeight  = current.maxHeight,
                scrolling  = current.scrolling,
                scrollOut  = current.scrollOutside ? current.scrollbarWidth : 0,
                margin     = current.margin,
                wMargin    = getScalar(margin[1] + margin[3]),
                hMargin    = getScalar(margin[0] + margin[2]),
                wPadding,
                hPadding,
                wSpace,
                hSpace,
                origWidth,
                origHeight,
                origMaxWidth,
                origMaxHeight,
                ratio,
                width_,
                height_,
                maxWidth_,
                maxHeight_,
                iframe,
                body;
            // Reset dimensions so we could re-check actual size
            wrap.add(skin).add(inner).width('auto').height('auto').removeClass('fancybox-tmp');
            wPadding = getScalar(skin.outerWidth(true)  - skin.width());
            hPadding = getScalar(skin.outerHeight(true) - skin.height());
            // Any space between content and viewport (margin, padding, border, title)
            wSpace = wMargin + wPadding;
            hSpace = hMargin + hPadding;
            origWidth  = isPercentage(width)  ? (viewport.w - wSpace) * getScalar(width)  / 100 : width;
            origHeight = isPercentage(height) ? (viewport.h - hSpace) * getScalar(height) / 100 : height;
            if (current.type === 'iframe') {
                iframe = current.content;
                if (current.autoHeight && iframe && iframe.data('ready') === 1) {
                    try {
                        if (iframe[0].contentWindow.document.location) {
                            inner.width( origWidth ).height(9999);
                            body = iframe.contents().find('body');
                            if (scrollOut) {
                                body.css('overflow-x', 'hidden');
                            }
                            origHeight = body.outerHeight(true);
                        }
                    } catch (e) {}
                }
            } else if (current.autoWidth || current.autoHeight) {
                inner.addClass( 'fancybox-tmp' );
                // Set width or height in case we need to calculate only one dimension
                if (!current.autoWidth) {
                    inner.width( origWidth );
                }
                if (!current.autoHeight) {
                    inner.height( origHeight );
                }
                if (current.autoWidth) {
                    origWidth = inner.width();
                }
                if (current.autoHeight) {
                    origHeight = inner.height();
                }
                inner.removeClass( 'fancybox-tmp' );
            }
            width  = getScalar( origWidth );
            height = getScalar( origHeight );
            ratio  = origWidth / origHeight;
            // Calculations for the content
            minWidth  = getScalar(isPercentage(minWidth) ? getScalar(minWidth, 'w') - wSpace : minWidth);
            maxWidth  = getScalar(isPercentage(maxWidth) ? getScalar(maxWidth, 'w') - wSpace : maxWidth);
            minHeight = getScalar(isPercentage(minHeight) ? getScalar(minHeight, 'h') - hSpace : minHeight);
            maxHeight = getScalar(isPercentage(maxHeight) ? getScalar(maxHeight, 'h') - hSpace : maxHeight);
            // These will be used to determine if wrap can fit in the viewport
            origMaxWidth  = maxWidth;
            origMaxHeight = maxHeight;
            if (current.fitToView) {
                maxWidth  = Math.min(viewport.w - wSpace, maxWidth);
                maxHeight = Math.min(viewport.h - hSpace, maxHeight);
            }
            maxWidth_  = viewport.w - wMargin;
            maxHeight_ = viewport.h - hMargin;
            if (current.aspectRatio) {
                if (width > maxWidth) {
                    width  = maxWidth;
                    height = getScalar(width / ratio);
                }
                if (height > maxHeight) {
                    height = maxHeight;
                    width  = getScalar(height * ratio);
                }
                if (width < minWidth) {
                    width  = minWidth;
                    height = getScalar(width / ratio);
                }
                if (height < minHeight) {
                    height = minHeight;
                    width  = getScalar(height * ratio);
                }
            } else {
                width = Math.max(minWidth, Math.min(width, maxWidth));
                if (current.autoHeight && current.type !== 'iframe') {
                    inner.width( width );
                    height = inner.height();
                }
                height = Math.max(minHeight, Math.min(height, maxHeight));
            }
            // Try to fit inside viewport (including the title)
            if (current.fitToView) {
                inner.width( width ).height( height );
                wrap.width( width + wPadding );
                // Real wrap dimensions
                width_  = wrap.width();
                height_ = wrap.height();
                if (current.aspectRatio) {
                    while ((width_ > maxWidth_ || height_ > maxHeight_) && width > minWidth && height > minHeight) {
                        if (steps++ > 19) {
                            break;
                        }
                        height = Math.max(minHeight, Math.min(maxHeight, height - 10));
                        width  = getScalar(height * ratio);
                        if (width < minWidth) {
                            width  = minWidth;
                            height = getScalar(width / ratio);
                        }
                        if (width > maxWidth) {
                            width  = maxWidth;
                            height = getScalar(width / ratio);
                        }
                        inner.width( width ).height( height );
                        wrap.width( width + wPadding );
                        width_  = wrap.width();
                        height_ = wrap.height();
                    }
                } else {
                    width  = Math.max(minWidth,  Math.min(width,  width  - (width_  - maxWidth_)));
                    height = Math.max(minHeight, Math.min(height, height - (height_ - maxHeight_)));
                }
            }
            if (scrollOut && scrolling === 'auto' && height < origHeight && (width + wPadding + scrollOut) < maxWidth_) {
                width += scrollOut;
            }
            inner.width( width ).height( height );
            wrap.width( width + wPadding );
            width_  = wrap.width();
            height_ = wrap.height();
            canShrink = (width_ > maxWidth_ || height_ > maxHeight_) && width > minWidth && height > minHeight;
            canExpand = current.aspectRatio ? (width < origMaxWidth && height < origMaxHeight && width < origWidth && height < origHeight) : ((width < origMaxWidth || height < origMaxHeight) && (width < origWidth || height < origHeight));
            $.extend(current, {
                dim : {
                    width   : getValue( width_ ),
                    height  : getValue( height_ )
                },
                origWidth  : origWidth,
                origHeight : origHeight,
                canShrink  : canShrink,
                canExpand  : canExpand,
                wPadding   : wPadding,
                hPadding   : hPadding,
                wrapSpace  : height_ - skin.outerHeight(true),
                skinSpace  : skin.height() - height
            });
            if (!iframe && current.autoHeight && height > minHeight && height < maxHeight && !canExpand) {
                inner.height('auto');
            }
        },
        _getPosition: function (onlyAbsolute) {
            var current  = F.current,
                viewport = F.getViewport(),
                margin   = current.margin,
                width    = F.wrap.width()  + margin[1] + margin[3],
                height   = F.wrap.height() + margin[0] + margin[2],
                rez      = {
                    position: 'absolute',
                    top  : margin[0],
                    left : margin[3]
                };
            if (current.autoCenter && current.fixed && !onlyAbsolute && height <= viewport.h && width <= viewport.w) {
                rez.position = 'fixed';
            } else if (!current.locked) {
                rez.top  += viewport.y;
                rez.left += viewport.x;
            }
            rez.top  = getValue(Math.max(rez.top,  rez.top  + ((viewport.h - height) * current.topRatio)));
            rez.left = getValue(Math.max(rez.left, rez.left + ((viewport.w - width)  * current.leftRatio)));
            return rez;
        },
        _afterZoomIn: function () {
            var current = F.current;
            if (!current) {
                return;
            }
            F.isOpen = F.isOpened = true;
            F.wrap.css('overflow', 'visible').addClass('fancybox-opened').hide().show(0);
            F.update();
            // Assign a click event
            if ( current.closeClick || (current.nextClick && F.group.length > 1) ) {
                F.inner.css('cursor', 'pointer').bind('click.fb', function(e) {
                    if (!$(e.target).is('a') && !$(e.target).parent().is('a')) {
                        e.preventDefault();
                        F[ current.closeClick ? 'close' : 'next' ]();
                    }
                });
            }
            // Create a close button
            if (current.closeBtn) {
                $(current.tpl.closeBtn).appendTo(F.skin).bind('click.fb', function(e) {
                    e.preventDefault();
                    F.close();
                });
            }
            // Create navigation arrows
            if (current.arrows && F.group.length > 1) {
                if (current.loop || current.index > 0) {
                    $(current.tpl.prev).appendTo(F.outer).bind('click.fb', F.prev);
                }
                if (current.loop || current.index < F.group.length - 1) {
                    $(current.tpl.next).appendTo(F.outer).bind('click.fb', F.next);
                }
            }
            F.trigger('afterShow');
            // Stop the slideshow if this is the last item
            if (!current.loop && current.index === current.group.length - 1) {
                F.play( false );
            } else if (F.opts.autoPlay && !F.player.isActive) {
                F.opts.autoPlay = false;
                F.play(true);
            }
        },
        _afterZoomOut: function ( obj ) {
            obj = obj || F.current;
            $('.fancybox-wrap').trigger('onReset').remove();
            $.extend(F, {
                group  : {},
                opts   : {},
                router : false,
                current   : null,
                isActive  : false,
                isOpened  : false,
                isOpen    : false,
                isClosing : false,
                wrap   : null,
                skin   : null,
                outer  : null,
                inner  : null
            });
            F.trigger('afterClose', obj);
        }
    });
    /*
     *  Default transitions
     */
    F.transitions = {
        getOrigPosition: function () {
            var current  = F.current,
                element  = current.element,
                orig     = current.orig,
                pos      = {},
                width    = 50,
                height   = 50,
                hPadding = current.hPadding,
                wPadding = current.wPadding,
                viewport = F.getViewport();
            if (!orig && current.isDom && element.is(':visible')) {
                orig = element.find('img:first');
                if (!orig.length) {
                    orig = element;
                }
            }
            if (isQuery(orig)) {
                pos = orig.offset();
                if (orig.is('img')) {
                    width  = orig.outerWidth();
                    height = orig.outerHeight();
                }
            } else {
                pos.top  = viewport.y + (viewport.h - height) * current.topRatio;
                pos.left = viewport.x + (viewport.w - width)  * current.leftRatio;
            }
            if (F.wrap.css('position') === 'fixed' || current.locked) {
                pos.top  -= viewport.y;
                pos.left -= viewport.x;
            }
            pos = {
                top     : getValue(pos.top  - hPadding * current.topRatio),
                left    : getValue(pos.left - wPadding * current.leftRatio),
                width   : getValue(width  + wPadding),
                height  : getValue(height + hPadding)
            };
            return pos;
        },
        step: function (now, fx) {
            var ratio,
                padding,
                value,
                prop       = fx.prop,
                current    = F.current,
                wrapSpace  = current.wrapSpace,
                skinSpace  = current.skinSpace;
            if (prop === 'width' || prop === 'height') {
                ratio = fx.end === fx.start ? 1 : (now - fx.start) / (fx.end - fx.start);
                if (F.isClosing) {
                    ratio = 1 - ratio;
                }
                padding = prop === 'width' ? current.wPadding : current.hPadding;
                value   = now - padding;
                F.skin[ prop ](  getScalar( prop === 'width' ?  value : value - (wrapSpace * ratio) ) );
                F.inner[ prop ]( getScalar( prop === 'width' ?  value : value - (wrapSpace * ratio) - (skinSpace * ratio) ) );
            }
        },
        zoomIn: function () {
            var current  = F.current,
                startPos = current.pos,
                effect   = current.openEffect,
                elastic  = effect === 'elastic',
                endPos   = $.extend({opacity : 1}, startPos);
            // Remove "position" property that breaks older IE
            delete endPos.position;
            if (elastic) {
                startPos = this.getOrigPosition();
                if (current.openOpacity) {
                    startPos.opacity = 0.1;
                }
            } else if (effect === 'fade') {
                startPos.opacity = 0.1;
            }
            F.wrap.css(startPos).animate(endPos, {
                duration : effect === 'none' ? 0 : current.openSpeed,
                easing   : current.openEasing,
                step     : elastic ? this.step : null,
                complete : F._afterZoomIn
            });
        },
        zoomOut: function () {
            var current  = F.current,
                effect   = current.closeEffect,
                elastic  = effect === 'elastic',
                endPos   = {opacity : 0.1};
            if (elastic) {
                endPos = this.getOrigPosition();
                if (current.closeOpacity) {
                    endPos.opacity = 0.1;
                }
            }
            F.wrap.animate(endPos, {
                duration : effect === 'none' ? 0 : current.closeSpeed,
                easing   : current.closeEasing,
                step     : elastic ? this.step : null,
                complete : F._afterZoomOut
            });
        },
        changeIn: function () {
            var current   = F.current,
                effect    = current.nextEffect,
                startPos  = current.pos,
                endPos    = { opacity : 1 },
                direction = F.direction,
                distance  = 200,
                field;
            startPos.opacity = 0.1;
            if (effect === 'elastic') {
                field = direction === 'down' || direction === 'up' ? 'top' : 'left';
                if (direction === 'down' || direction === 'right') {
                    startPos[ field ] = getValue(getScalar(startPos[ field ]) - distance);
                    endPos[ field ]   = '+=' + distance + 'px';
                } else {
                    startPos[ field ] = getValue(getScalar(startPos[ field ]) + distance);
                    endPos[ field ]   = '-=' + distance + 'px';
                }
            }
            // Workaround for http://bugs.jquery.com/ticket/12273
            if (effect === 'none') {
                F._afterZoomIn();
            } else {
                F.wrap.css(startPos).animate(endPos, {
                    duration : current.nextSpeed,
                    easing   : current.nextEasing,
                    complete : F._afterZoomIn
                });
            }
        },
        changeOut: function () {
            var previous  = F.previous,
                effect    = previous.prevEffect,
                endPos    = { opacity : 0.1 },
                direction = F.direction,
                distance  = 200;
            if (effect === 'elastic') {
                endPos[ direction === 'down' || direction === 'up' ? 'top' : 'left' ] = ( direction === 'up' || direction === 'left' ? '-' : '+' ) + '=' + distance + 'px';
            }
            previous.wrap.animate(endPos, {
                duration : effect === 'none' ? 0 : previous.prevSpeed,
                easing   : previous.prevEasing,
                complete : function () {
                    $(this).trigger('onReset').remove();
                }
            });
        }
    };
    /*
     *  Overlay helper
     */
    F.helpers.overlay = {
        defaults : {
            closeClick : true,      // if true, fancyBox will be closed when user clicks on the overlay
            speedOut   : 200,       // duration of fadeOut animation
            showEarly  : true,      // indicates if should be opened immediately or wait until the content is ready
            css        : {},        // custom CSS properties
            locked     : !isTouch,  // if true, the content will be locked into overlay
            fixed      : true       // if false, the overlay CSS position property will not be set to "fixed"
        },
        overlay : null,      // current handle
        fixed   : false,     // indicates if the overlay has position "fixed"
        el      : $('html'), // element that contains "the lock"
        // Public methods
        create : function(opts) {
            var parent;
            opts = $.extend({}, this.defaults, opts);
            if (this.overlay) {
                this.close();
            }
            parent = F.coming ? F.coming.parent : opts.parent;
            this.overlay = $('<div class="fancybox-overlay"></div>').appendTo( parent && parent.length ? parent : 'body' );
            this.fixed   = false;
            if (opts.fixed && F.defaults.fixed) {
                this.overlay.addClass('fancybox-overlay-fixed');
                this.fixed = true;
            }
        },
        open : function(opts) {
            var that = this;
            opts = $.extend({}, this.defaults, opts);
            if (this.overlay) {
                this.overlay.unbind('.overlay').width('auto').height('auto');
            } else {
                this.create(opts);
            }
            if (!this.fixed) {
                W.bind('resize.overlay', $.proxy( this.update, this) );
                this.update();
            }
            if (opts.closeClick) {
                this.overlay.bind('click.overlay', function(e) {
                    if ($(e.target).hasClass('fancybox-overlay')) {
                        if (F.isActive) {
                            F.close();
                        } else {
                            that.close();
                        }
                        return false;
                    }
                });
            }
            this.overlay.css( opts.css ).show();
        },
        close : function() {
            W.unbind('resize.overlay');
            if (this.el.hasClass('fancybox-lock')) {
                $('.fancybox-margin').removeClass('fancybox-margin');
                this.el.removeClass('fancybox-lock');
                W.scrollTop( this.scrollV ).scrollLeft( this.scrollH );
            }
            $('.fancybox-overlay').remove().hide();
            $.extend(this, {
                overlay : null,
                fixed   : false
            });
        },
        // Private, callbacks
        update : function () {
            var width = '100%', offsetWidth;
            // Reset width/height so it will not mess
            this.overlay.width(width).height('100%');
            // jQuery does not return reliable result for IE
            if (IE) {
                offsetWidth = Math.max(document.documentElement.offsetWidth, document.body.offsetWidth);
                if (D.width() > offsetWidth) {
                    width = D.width();
                }
            } else if (D.width() > W.width()) {
                width = D.width();
            }
            this.overlay.width(width).height(D.height());
        },
        // This is where we can manipulate DOM, because later it would cause iframes to reload
        onReady : function (opts, obj) {
            var overlay = this.overlay;
            $('.fancybox-overlay').stop(true, true);
            if (!overlay) {
                this.create(opts);
            }
            if (opts.locked && this.fixed && obj.fixed) {
                obj.locked = this.overlay.append( obj.wrap );
                obj.fixed  = false;
            }
            if (opts.showEarly === true) {
                this.beforeShow.apply(this, arguments);
            }
        },
        beforeShow : function(opts, obj) {
            if (obj.locked && !this.el.hasClass('fancybox-lock')) {
                if (this.fixPosition !== false) {
                    $('*:not(object)').filter(function(){
                        return ($(this).css('position') === 'fixed' && !$(this).hasClass("fancybox-overlay") && !$(this).hasClass("fancybox-wrap") );
                    }).addClass('fancybox-margin');
                }
                this.el.addClass('fancybox-margin');
                this.scrollV = W.scrollTop();
                this.scrollH = W.scrollLeft();
                this.el.addClass('fancybox-lock');
                W.scrollTop( this.scrollV ).scrollLeft( this.scrollH );
            }
            this.open(opts);
        },
        onUpdate : function() {
            if (!this.fixed) {
                this.update();
            }
        },
        afterClose: function (opts) {
            // Remove overlay if exists and fancyBox is not opening
            // (e.g., it is not being open using afterClose callback)
            if (this.overlay && !F.coming) {
                this.overlay.fadeOut(opts.speedOut, $.proxy( this.close, this ));
            }
        }
    };
    /*
     *  Title helper
     */
    F.helpers.title = {
        defaults : {
            type     : 'float', // 'float', 'inside', 'outside' or 'over',
            position : 'bottom' // 'top' or 'bottom'
        },
        beforeShow: function (opts) {
            var current = F.current,
                text    = current.title,
                type    = opts.type,
                title,
                target;
            if ($.isFunction(text)) {
                text = text.call(current.element, current);
            }
            if (!isString(text) || $.trim(text) === '') {
                return;
            }
            title = $('<div class="fancybox-title fancybox-title-' + type + '-wrap">' + text + '</div>');
            switch (type) {
                case 'inside':
                    target = F.skin;
                break;
                case 'outside':
                    target = F.wrap;
                break;
                case 'over':
                    target = F.inner;
                break;
                default: // 'float'
                    target = F.skin;
                    title.appendTo('body');
                    if (IE) {
                        title.width( title.width() );
                    }
                    title.wrapInner('<span class="child"></span>');
                    //Increase bottom margin so this title will also fit into viewport
                    F.current.margin[2] += Math.abs( getScalar(title.css('margin-bottom')) );
                break;
            }
            title[ (opts.position === 'top' ? 'prependTo'  : 'appendTo') ](target);
        }
    };
    // jQuery plugin initialization
    $.fn.fancybox = function (options) {
        var index,
            that     = $(this),
            selector = this.selector || '',
            run      = function(e) {
                var what = $(this).blur(), idx = index, relType, relVal;
                if (!(e.ctrlKey || e.altKey || e.shiftKey || e.metaKey) && !what.is('.fancybox-wrap')) {
                    relType = options.groupAttr || 'data-fancybox-group';
                    relVal  = what.attr(relType);
                    if (!relVal) {
                        relType = 'rel';
                        relVal  = what.get(0)[ relType ];
                    }
                    if (relVal && relVal !== '' && relVal !== 'nofollow') {
                        what = selector.length ? $(selector) : that;
                        what = what.filter('[' + relType + '="' + relVal + '"]');
                        idx  = what.index(this);
                    }
                    options.index = idx;
                    // Stop an event from bubbling if everything is fine
                    if (F.open(what, options) !== false) {
                        e.preventDefault();
                    }
                }
            };
        options = options || {};
        index   = options.index || 0;
        if (!selector || options.live === false) {
            that.unbind('click.fb-start').bind('click.fb-start', run);
        } else {
            D.undelegate(selector, 'click.fb-start').delegate(selector + ":not('.fancybox-item, .fancybox-nav')", 'click.fb-start', run);
        }
        this.filter('[data-fancybox-start=1]').trigger('click');
        return this;
    };
    // Tests that need a body at doc ready
    D.ready(function() {
        var w1, w2;
        if ( $.scrollbarWidth === undefined ) {
            // http://benalman.com/projects/jquery-misc-plugins/#scrollbarwidth
            $.scrollbarWidth = function() {
                var parent = $('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo('body'),
                    child  = parent.children(),
                    width  = child.innerWidth() - child.height( 99 ).innerWidth();
                parent.remove();
                return width;
            };
        }
        if ( $.support.fixedPosition === undefined ) {
            $.support.fixedPosition = (function() {
                var elem  = $('<div style="position:fixed;top:20px;"></div>').appendTo('body'),
                    fixed = ( elem[0].offsetTop === 20 || elem[0].offsetTop === 15 );
                elem.remove();
                return fixed;
            }());
        }
        $.extend(F.defaults, {
            scrollbarWidth : $.scrollbarWidth(),
            fixed  : $.support.fixedPosition,
            parent : $('body')
        });
        //Get real width of page scroll-bar
        w1 = $(window).width();
        H.addClass('fancybox-lock-test');
        w2 = $(window).width();
        H.removeClass('fancybox-lock-test');
        $("<style type='text/css'>.fancybox-margin{margin-right:" + (w2 - w1) + "px;}</style>").appendTo("head");
    });
}(window, document, jQuery));



/*
 * jQuery Form Styler v1.7.6
 * https://github.com/Dimox/jQueryFormStyler
 *
 * Copyright 2012-2016 Dimox (http://dimox.name/)
 * Released under the MIT license.
 *
 * Date: 2016.06.05
 *
 */

;(function(factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // CommonJS
        module.exports = factory(require('jquery'));
    } else {
        factory(jQuery);
    }
}(function($) {

    'use strict';

    var pluginName = 'styler',
            defaults = {
                idSuffix: '-styler',
                filePlaceholder: 'Файл не выбран',
                fileBrowse: 'Обзор...',
                fileNumber: 'Выбрано файлов: %s',
                selectPlaceholder: 'Выберите...',
                selectSearch: false,
                selectSearchLimit: 10,
                selectSearchNotFound: 'Совпадений не найдено',
                selectSearchPlaceholder: 'Поиск...',
                selectVisibleOptions: 0,
                singleSelectzIndex: '1',
                selectSmartPositioning: true,
                onSelectOpened: function() {},
                onSelectClosed: function() {},
                onFormStyled: function() {}
            };

    function Plugin(element, options) {
        this.element = element;
        this.options = $.extend({}, defaults, options);
        this.init();
    }

    Plugin.prototype = {

        // инициализация
        init: function() {

            var el = $(this.element);
            var opt = this.options;

            var iOS = (navigator.userAgent.match(/(iPad|iPhone|iPod)/i) && !navigator.userAgent.match(/(Windows\sPhone)/i)) ? true : false;
            var Android = (navigator.userAgent.match(/Android/i) && !navigator.userAgent.match(/(Windows\sPhone)/i)) ? true : false;

            function Attributes() {
                if (el.attr('id') !== undefined && el.attr('id') !== '') {
                    this.id = el.attr('id') + opt.idSuffix;
                }
                this.title = el.attr('title');
                this.classes = el.attr('class');
                this.data = el.data();
            }

            // checkbox
            if (el.is(':checkbox')) {

                var checkboxOutput = function() {

                    var att = new Attributes();
                    var checkbox = $('<div class="jq-checkbox"><div class="jq-checkbox__div"></div></div>')
                        .attr({
                            id: att.id,
                            title: att.title
                        })
                        .addClass(att.classes)
                        .data(att.data)
                    ;

                    // прячем оригинальный чекбокс
                    el.css({
                        position: 'absolute',
                        zIndex: '-1',
                        opacity: 0,
                        margin: 0,
                        padding: 0
                    }).after(checkbox).prependTo(checkbox);

                    checkbox.attr('unselectable', 'on').css({
                        '-webkit-user-select': 'none',
                        '-moz-user-select': 'none',
                        '-ms-user-select': 'none',
                        '-o-user-select': 'none',
                        // 'user-select': 'none',
                        display: 'inline-block',
                        position: 'relative',
                        overflow: 'hidden'
                    });

                    if (el.is(':checked')) checkbox.addClass('checked');
                    if (el.is(':disabled')) checkbox.addClass('disabled');

                    // клик на псевдочекбокс
                    checkbox.click(function(e) {
                        e.preventDefault();
                        if (!checkbox.is('.disabled')) {
                            if (el.is(':checked')) {
                                el.prop('checked', false);
                                checkbox.removeClass('checked');
                            } else {
                                el.prop('checked', true);
                                checkbox.addClass('checked');
                            }
                            el.focus().change();
                        }
                    });
                    // клик на label
                    el.closest('label').add('label[for="' + el.attr('id') + '"]').on('click.styler', function(e) {
                        if (!$(e.target).is('a') && !$(e.target).closest(checkbox).length) {
                            checkbox.triggerHandler('click');
                            e.preventDefault();
                        }
                    });
                    // переключение по Space или Enter
                    el.on('change.styler', function() {
                        if (el.is(':checked')) checkbox.addClass('checked');
                        else checkbox.removeClass('checked');
                    })
                    // чтобы переключался чекбокс, который находится в теге label
                    .on('keydown.styler', function(e) {
                        if (e.which == 32) checkbox.click();
                    })
                    .on('focus.styler', function() {
                        if (!checkbox.is('.disabled')) checkbox.addClass('focused');
                    })
                    .on('blur.styler', function() {
                        checkbox.removeClass('focused');
                    });

                }; // end checkboxOutput()

                checkboxOutput();

                // обновление при динамическом изменении
                el.on('refresh', function() {
                    el.closest('label').add('label[for="' + el.attr('id') + '"]').off('.styler');
                    el.off('.styler').parent().before(el).remove();
                    checkboxOutput();
                });

            // end checkbox

            // radio
            } else if (el.is(':radio')) {

                var radioOutput = function() {

                    var att = new Attributes();
                    var radio = $('<div class="jq-radio"><div class="jq-radio__div"></div></div>')
                        .attr({
                            id: att.id,
                            title: att.title
                        })
                        .addClass(att.classes)
                        .data(att.data)
                    ;

                    // прячем оригинальную радиокнопку
                    el.css({
                        position: 'absolute',
                        zIndex: '-1',
                        opacity: 0,
                        margin: 0,
                        padding: 0
                    }).after(radio).prependTo(radio);

                    radio.attr('unselectable', 'on').css({
                        '-webkit-user-select': 'none',
                        '-moz-user-select': 'none',
                        '-ms-user-select': 'none',
                        '-o-user-select': 'none',
                        // 'user-select': 'none',
                        display: 'inline-block',
                        position: 'relative'
                    });

                    if (el.is(':checked')) radio.addClass('checked');
                    if (el.is(':disabled')) radio.addClass('disabled');

                    // определяем общего родителя у радиокнопок с одинаковым name
                    // http://stackoverflow.com/a/27733847
                    $.fn.commonParents = function (){
                        var cachedThis = this;
                        return cachedThis.first().parents().filter(function () {
                            return $(this).find(cachedThis).length === cachedThis.length;
                        });
                    };
                    $.fn.commonParent = function (){
                        return $(this).commonParents().first();
                    };

                    // клик на псевдорадиокнопке
                    radio.click(function(e) {
                        e.preventDefault();
                        if (!radio.is('.disabled')) {
                            var inputName = $('input[name="' + el.attr('name') + '"]');
                            inputName.commonParent().find(inputName).prop('checked', false).parent().removeClass('checked');
                            el.prop('checked', true).parent().addClass('checked');
                            el.focus().change();
                        }
                    });
                    // клик на label
                    el.closest('label').add('label[for="' + el.attr('id') + '"]').on('click.styler', function(e) {
                        if (!$(e.target).is('a') && !$(e.target).closest(radio).length) {
                            radio.triggerHandler('click');
                            e.preventDefault();
                        }
                    });
                    // переключение стрелками
                    el.on('change.styler', function() {
                        el.parent().addClass('checked');
                    })
                    .on('focus.styler', function() {
                        if (!radio.is('.disabled')) radio.addClass('focused');
                    })
                    .on('blur.styler', function() {
                        radio.removeClass('focused');
                    });

                }; // end radioOutput()

                radioOutput();

                // обновление при динамическом изменении
                el.on('refresh', function() {
                    el.closest('label').add('label[for="' + el.attr('id') + '"]').off('.styler');
                    el.off('.styler').parent().before(el).remove();
                    radioOutput();
                });

            // end radio

            // file
            } else if (el.is(':file')) {

                // прячем оригинальное поле
                el.css({
                    position: 'absolute',
                    top: 0,
                    right: 0,
                    margin: 0,
                    padding: 0,
                    opacity: 0,
                    fontSize: '100px'
                });

                var fileOutput = function() {

                    var att = new Attributes();
                    var placeholder = el.data('placeholder');
                    if (placeholder === undefined) placeholder = opt.filePlaceholder;
                    var browse = el.data('browse');
                    if (browse === undefined || browse === '') browse = opt.fileBrowse;

                    var file =
                        $('<div class="jq-file">' +
                                '<div class="jq-file__name">' + placeholder + '</div>' +
                                '<div class="jq-file__browse">' + browse + '</div>' +
                            '</div>')
                        .css({
                            display: 'inline-block',
                            position: 'relative',
                            overflow: 'hidden'
                        })
                        .attr({
                            id: att.id,
                            title: att.title
                        })
                        .addClass(att.classes)
                        .data(att.data)
                    ;

                    el.after(file).appendTo(file);
                    if (el.is(':disabled')) file.addClass('disabled');

                    el.on('change.styler', function() {
                        var value = el.val();
                        var name = $('div.jq-file__name', file);
                        if (el.is('[multiple]')) {
                            value = '';
                            var files = el[0].files.length;
                            if (files > 0) {
                                var number = el.data('number');
                                if (number === undefined) number = opt.fileNumber;
                                number = number.replace('%s', files);
                                value = number;
                            }
                        }
                        name.text(value.replace(/.+[\\\/]/, ''));
                        if (value === '') {
                            name.text(placeholder);
                            file.removeClass('changed');
                        } else {
                            file.addClass('changed');
                        }
                    })
                    .on('focus.styler', function() {
                        file.addClass('focused');
                    })
                    .on('blur.styler', function() {
                        file.removeClass('focused');
                    })
                    .on('click.styler', function() {
                        file.removeClass('focused');
                    });

                }; // end fileOutput()

                fileOutput();

                // обновление при динамическом изменении
                el.on('refresh', function() {
                    el.off('.styler').parent().before(el).remove();
                    fileOutput();
                });

            // end file

            } else if (el.is('input[type="number"]')) {

                var numberOutput = function() {

                    var att = new Attributes();
                    var number =
                        $('<div class="jq-number">' +
                                '<div class="jq-number__spin minus"></div>' +
                                '<div class="jq-number__spin plus"></div>' +
                            '</div>')
                        .attr({
                            id: att.id,
                            title: att.title
                        })
                        .addClass(att.classes)
                        .data(att.data)
                    ;

                    el.after(number).prependTo(number).wrap('<div class="jq-number__field"></div>');
                    if (el.is(':disabled')) number.addClass('disabled');

                    var min,
                            max,
                            step,
                            timeout = null,
                            interval = null;
                    if (el.attr('min') !== undefined) min = el.attr('min');
                    if (el.attr('max') !== undefined) max = el.attr('max');
                    if (el.attr('step') !== undefined && $.isNumeric(el.attr('step')))
                        step = Number(el.attr('step'));
                    else
                        step = Number(1);

                    var changeValue = function(spin) {
                        var value = el.val(),
                                newValue;

                        if (!$.isNumeric(value)) {
                            value = 0;
                            el.val('0');
                        }

                        if (spin.is('.minus')) {
                            newValue = Number(value) - step;
                        } else if (spin.is('.plus')) {
                            newValue = Number(value) + step;
                        }

                        // определяем количество десятичных знаков после запятой в step
                        var decimals = (step.toString().split('.')[1] || []).length;
                        if (decimals > 0) {
                            var multiplier = '1';
                            while (multiplier.length <= decimals) multiplier = multiplier + '0';
                            // избегаем появления лишних знаков после запятой
                            newValue = Math.round(newValue * multiplier) / multiplier;
                        }

                        if ($.isNumeric(min) && $.isNumeric(max)) {
                            if (newValue >= min && newValue <= max) el.val(newValue);
                        } else if ($.isNumeric(min) && !$.isNumeric(max)) {
                            if (newValue >= min) el.val(newValue);
                        } else if (!$.isNumeric(min) && $.isNumeric(max)) {
                            if (newValue <= max) el.val(newValue);
                        } else {
                            el.val(newValue);
                        }
                    };

                    if (!number.is('.disabled')) {
                        number.on('mousedown', 'div.jq-number__spin', function() {
                            var spin = $(this);
                            changeValue(spin);
                            timeout = setTimeout(function(){
                                interval = setInterval(function(){ changeValue(spin); }, 40);
                            }, 350);
                        }).on('mouseup mouseout', 'div.jq-number__spin', function() {
                            clearTimeout(timeout);
                            clearInterval(interval);
                        }).on('mouseup', 'div.jq-number__spin', function() {
                            el.change();
                        });
                        el.on('focus.styler', function() {
                            number.addClass('focused');
                        })
                        .on('blur.styler', function() {
                            number.removeClass('focused');
                        });
                    }

                }; // end numberOutput()

                numberOutput();

                // обновление при динамическом изменении
                el.on('refresh', function() {
                    el.off('.styler').closest('.jq-number').before(el).remove();
                    numberOutput();
                });

            // end number

            // select
            } else if (el.is('select')) {

                var selectboxOutput = function() {

                    // запрещаем прокрутку страницы при прокрутке селекта
                    function preventScrolling(selector) {
                        selector.off('mousewheel DOMMouseScroll').on('mousewheel DOMMouseScroll', function(e) {
                            var scrollTo = null;
                            if (e.type == 'mousewheel') { scrollTo = (e.originalEvent.wheelDelta * -1); }
                            else if (e.type == 'DOMMouseScroll') { scrollTo = 40 * e.originalEvent.detail; }
                            if (scrollTo) {
                                e.stopPropagation();
                                e.preventDefault();
                                $(this).scrollTop(scrollTo + $(this).scrollTop());
                            }
                        });
                    }

                    var option = $('option', el);
                    var list = '';
                    // формируем список селекта
                    function makeList() {
                        for (var i = 0; i < option.length; i++) {
                            var op = option.eq(i);
                            var li = '',
                                    liClass = '',
                                    liClasses = '',
                                    id = '',
                                    title = '',
                                    dataList = '',
                                    optionClass = '',
                                    optgroupClass = '',
                                    dataJqfsClass = '';
                            var disabled = 'disabled';
                            var selDis = 'selected sel disabled';
                            if (op.prop('selected')) liClass = 'selected sel';
                            if (op.is(':disabled')) liClass = disabled;
                            if (op.is(':selected:disabled')) liClass = selDis;
                            if (op.attr('id') !== undefined && op.attr('id') !== '') id = ' id="' + op.attr('id') + opt.idSuffix + '"';
                            if (op.attr('title') !== undefined && option.attr('title') !== '') title = ' title="' + op.attr('title') + '"';
                            if (op.attr('class') !== undefined) {
                                optionClass = ' ' + op.attr('class');
                                dataJqfsClass = ' data-jqfs-class="' + op.attr('class') + '"';
                            }

                            var data = op.data();
                            for (var k in data) {
                                if (data[k] !== '') dataList += ' data-' + k + '="' + data[k] + '"';
                            }

                            if ( (liClass + optionClass) !== '' )   liClasses = ' class="' + liClass + optionClass + '"';
                            li = '<li' + dataJqfsClass + dataList + liClasses + title + id + '>'+ op.html() +'</li>';

                            // если есть optgroup
                            if (op.parent().is('optgroup')) {
                                if (op.parent().attr('class') !== undefined) optgroupClass = ' ' + op.parent().attr('class');
                                li = '<li' + dataJqfsClass + dataList + ' class="' + liClass + optionClass + ' option' + optgroupClass + '"' + title + id + '>'+ op.html() +'</li>';
                                if (op.is(':first-child')) {
                                    li = '<li class="optgroup' + optgroupClass + '">' + op.parent().attr('label') + '</li>' + li;
                                }
                            }

                            list += li;
                        }
                    } // end makeList()

                    // одиночный селект
                    function doSelect() {

                        var att = new Attributes();
                        var searchHTML = '';
                        var selectPlaceholder = el.data('placeholder');
                        var selectSearch = el.data('search');
                        var selectSearchLimit = el.data('search-limit');
                        var selectSearchNotFound = el.data('search-not-found');
                        var selectSearchPlaceholder = el.data('search-placeholder');
                        var singleSelectzIndex = el.data('z-index');
                        var selectSmartPositioning = el.data('smart-positioning');

                        if (selectPlaceholder === undefined) selectPlaceholder = opt.selectPlaceholder;
                        if (selectSearch === undefined || selectSearch === '') selectSearch = opt.selectSearch;
                        if (selectSearchLimit === undefined || selectSearchLimit === '') selectSearchLimit = opt.selectSearchLimit;
                        if (selectSearchNotFound === undefined || selectSearchNotFound === '') selectSearchNotFound = opt.selectSearchNotFound;
                        if (selectSearchPlaceholder === undefined) selectSearchPlaceholder = opt.selectSearchPlaceholder;
                        if (singleSelectzIndex === undefined || singleSelectzIndex === '') singleSelectzIndex = opt.singleSelectzIndex;
                        if (selectSmartPositioning === undefined || selectSmartPositioning === '') selectSmartPositioning = opt.selectSmartPositioning;

                        var selectbox =
                            $('<div class="jq-selectbox jqselect">' +
                                    '<div class="jq-selectbox__select" style="position: relative">' +
                                        '<div class="jq-selectbox__select-text"></div>' +
                                        '<div class="jq-selectbox__trigger">' +
                                            '<div class="jq-selectbox__trigger-arrow"></div></div>' +
                                    '</div>' +
                                '</div>')
                            .css({
                                display: 'inline-block',
                                position: 'relative',
                                zIndex: singleSelectzIndex
                            })
                            .attr({
                                id: att.id,
                                title: att.title
                            })
                            .addClass(att.classes)
                            .data(att.data)
                        ;

                        el.css({margin: 0, padding: 0}).after(selectbox).prependTo(selectbox);

                        var divSelect = $('div.jq-selectbox__select', selectbox);
                        var divText = $('div.jq-selectbox__select-text', selectbox);
                        var optionSelected = option.filter(':selected');

                        makeList();

                        if (selectSearch) searchHTML =
                            '<div class="jq-selectbox__search"><input type="search" autocomplete="off" placeholder="' + selectSearchPlaceholder + '"></div>' +
                            '<div class="jq-selectbox__not-found">' + selectSearchNotFound + '</div>';
                        var dropdown =
                            $('<div class="jq-selectbox__dropdown" style="position: absolute">' +
                                    searchHTML +
                                    '<ul style="position: relative; list-style: none; overflow: auto; overflow-x: hidden">' + list + '</ul>' +
                                '</div>');
                        selectbox.append(dropdown);
                        var ul = $('ul', dropdown);
                        var li = $('li', dropdown);
                        var search = $('input', dropdown);
                        var notFound = $('div.jq-selectbox__not-found', dropdown).hide();
                        if (li.length < selectSearchLimit) search.parent().hide();

                        // показываем опцию по умолчанию
                        // если у 1-й опции нет текста и она выбрана по умолчанию, то показываем плейсхолдер
                        if (option.first().text() === '' && option.first().is(':selected')) {
                            divText.text(selectPlaceholder).addClass('placeholder');
                        } else {
                            divText.text(optionSelected.text());
                        }

                        // определяем самый широкий пункт селекта
                        var liWidthInner = 0,
                                liWidth = 0;
                        li.css({'display': 'inline-block'});
                        li.each(function() {
                            var l = $(this);
                            if (l.innerWidth() > liWidthInner) {
                                liWidthInner = l.innerWidth();
                                liWidth = l.width();
                            }
                        });
                        li.css({'display': ''});

                        // подстраиваем ширину свернутого селекта в зависимости
                        // от ширины плейсхолдера или самого широкого пункта
                        if (divText.is('.placeholder') && (divText.width() > liWidthInner)) {
                            divText.width(divText.width());
                        } else {
                            var selClone = selectbox.clone().appendTo('body').width('auto');
                            var selCloneWidth = selClone.outerWidth();
                            selClone.remove();
                            if (selCloneWidth == selectbox.outerWidth()) {
                                divText.width(liWidth);
                            }
                        }

                        // подстраиваем ширину выпадающего списка в зависимости от самого широкого пункта
                        if (liWidthInner > selectbox.width()) dropdown.width(liWidthInner);

                        // прячем 1-ю пустую опцию, если она есть и если атрибут data-placeholder не пустой
                        // если все же нужно, чтобы первая пустая опция отображалась, то указываем у селекта: data-placeholder=""
                        if (option.first().text() === '' && el.data('placeholder') !== '') {
                            li.first().hide();
                        }

                        // прячем оригинальный селект
                        el.css({
                            position: 'absolute',
                            left: 0,
                            top: 0,
                            width: '100%',
                            height: '100%',
                            opacity: 0
                        });

                        var selectHeight = selectbox.outerHeight(true);
                        var searchHeight = search.parent().outerHeight(true);
                        var isMaxHeight = ul.css('max-height');
                        var liSelected = li.filter('.selected');
                        if (liSelected.length < 1) li.first().addClass('selected sel');
                        if (li.data('li-height') === undefined) li.data('li-height', li.outerHeight());
                        var position = dropdown.css('top');
                        if (dropdown.css('left') == 'auto') dropdown.css({left: 0});
                        if (dropdown.css('top') == 'auto') {
                            dropdown.css({top: selectHeight});
                            position = selectHeight;
                        }
                        dropdown.hide();

                        // если выбран не дефолтный пункт
                        if (liSelected.length) {
                            // добавляем класс, показывающий изменение селекта
                            if (option.first().text() != optionSelected.text()) {
                                selectbox.addClass('changed');
                            }
                            // передаем селекту класс выбранного пункта
                            selectbox.data('jqfs-class', liSelected.data('jqfs-class'));
                            selectbox.addClass(liSelected.data('jqfs-class'));
                        }

                        // если селект неактивный
                        if (el.is(':disabled')) {
                            selectbox.addClass('disabled');
                            return false;
                        }

                        // при клике на псевдоселекте
                        divSelect.click(function() {

                            // колбек при закрытии селекта
                            if ($('div.jq-selectbox').filter('.opened').length) {
                                opt.onSelectClosed.call($('div.jq-selectbox').filter('.opened'));
                            }

                            el.focus();

                            // если iOS, то не показываем выпадающий список,
                            // т.к. отображается нативный и неизвестно, как его спрятать
                            if (iOS) return;

                            // умное позиционирование
                            var win = $(window);
                            var liHeight = li.data('li-height');
                            var topOffset = selectbox.offset().top;
                            var bottomOffset = win.height() - selectHeight - (topOffset - win.scrollTop());
                            var visible = el.data('visible-options');
                            if (visible === undefined || visible === '') visible = opt.selectVisibleOptions;
                            var minHeight = liHeight * 5;
                            var newHeight = liHeight * visible;
                            if (visible > 0 && visible < 6) minHeight = newHeight;
                            if (visible === 0) newHeight = 'auto';

                            var dropDown = function() {
                                dropdown.height('auto').css({bottom: 'auto', top: position});
                                var maxHeightBottom = function() {
                                    ul.css('max-height', Math.floor((bottomOffset - 20 - searchHeight) / liHeight) * liHeight);
                                };
                                maxHeightBottom();
                                ul.css('max-height', newHeight);
                                if (isMaxHeight != 'none') {
                                    ul.css('max-height', isMaxHeight);
                                }
                                if (bottomOffset < (dropdown.outerHeight() + 20)) {
                                    maxHeightBottom();
                                }
                            };

                            var dropUp = function() {
                                dropdown.height('auto').css({top: 'auto', bottom: position});
                                var maxHeightTop = function() {
                                    ul.css('max-height', Math.floor((topOffset - win.scrollTop() - 20 - searchHeight) / liHeight) * liHeight);
                                };
                                maxHeightTop();
                                ul.css('max-height', newHeight);
                                if (isMaxHeight != 'none') {
                                    ul.css('max-height', isMaxHeight);
                                }
                                if ((topOffset - win.scrollTop() - 20) < (dropdown.outerHeight() + 20)) {
                                    maxHeightTop();
                                }
                            };

                            if (selectSmartPositioning === true || selectSmartPositioning === 1) {
                                // раскрытие вниз
                                if (bottomOffset > (minHeight + searchHeight + 20)) {
                                    dropDown();
                                    selectbox.removeClass('dropup').addClass('dropdown');
                                // раскрытие вверх
                                } else {
                                    dropUp();
                                    selectbox.removeClass('dropdown').addClass('dropup');
                                }
                            } else if (selectSmartPositioning === false || selectSmartPositioning === 0) {
                                // раскрытие вниз
                                if (bottomOffset > (minHeight + searchHeight + 20)) {
                                    dropDown();
                                    selectbox.removeClass('dropup').addClass('dropdown');
                                }
                            }

                            // если выпадающий список выходит за правый край окна браузера,
                            // то меняем позиционирование с левого на правое
                            if (selectbox.offset().left + dropdown.outerWidth() > win.width()) {
                                dropdown.css({left: 'auto', right: 0});
                            }
                            // конец умного позиционирования

                            $('div.jqselect').css({zIndex: (singleSelectzIndex - 1)}).removeClass('opened');
                            selectbox.css({zIndex: singleSelectzIndex});
                            if (dropdown.is(':hidden')) {
                                $('div.jq-selectbox__dropdown:visible').hide();
                                dropdown.show();
                                selectbox.addClass('opened focused');
                                // колбек при открытии селекта
                                opt.onSelectOpened.call(selectbox);
                            } else {
                                dropdown.hide();
                                selectbox.removeClass('opened dropup dropdown');
                                // колбек при закрытии селекта
                                if ($('div.jq-selectbox').filter('.opened').length) {
                                    opt.onSelectClosed.call(selectbox);
                                }
                            }

                            // поисковое поле
                            if (search.length) {
                                search.val('').keyup();
                                notFound.hide();
                                search.keyup(function() {
                                    var query = $(this).val();
                                    li.each(function() {
                                        if (!$(this).html().match(new RegExp('.*?' + query + '.*?', 'i'))) {
                                            $(this).hide();
                                        } else {
                                            $(this).show();
                                        }
                                    });
                                    // прячем 1-ю пустую опцию
                                    if (option.first().text() === '' && el.data('placeholder') !== '') {
                                        li.first().hide();
                                    }
                                    if (li.filter(':visible').length < 1) {
                                        notFound.show();
                                    } else {
                                        notFound.hide();
                                    }
                                });
                            }

                            // прокручиваем до выбранного пункта при открытии списка
                            if (li.filter('.selected').length) {
                                if (el.val() === '') {
                                    ul.scrollTop(0);
                                } else {
                                    // если нечетное количество видимых пунктов,
                                    // то высоту пункта делим пополам для последующего расчета
                                    if ( (ul.innerHeight() / liHeight) % 2 !== 0 ) liHeight = liHeight / 2;
                                    ul.scrollTop(ul.scrollTop() + li.filter('.selected').position().top - ul.innerHeight() / 2 + liHeight);
                                }
                            }

                            preventScrolling(ul);

                        }); // end divSelect.click()

                        // при наведении курсора на пункт списка
                        li.hover(function() {
                            $(this).siblings().removeClass('selected');
                        });
                        var selectedText = li.filter('.selected').text();

                        // при клике на пункт списка
                        li.filter(':not(.disabled):not(.optgroup)').click(function() {
                            el.focus();
                            var t = $(this);
                            var liText = t.text();
                            if (!t.is('.selected')) {
                                var index = t.index();
                                index -= t.prevAll('.optgroup').length;
                                t.addClass('selected sel').siblings().removeClass('selected sel');
                                option.prop('selected', false).eq(index).prop('selected', true);
                                selectedText = liText;
                                divText.text(liText);

                                // передаем селекту класс выбранного пункта
                                if (selectbox.data('jqfs-class')) selectbox.removeClass(selectbox.data('jqfs-class'));
                                selectbox.data('jqfs-class', t.data('jqfs-class'));
                                selectbox.addClass(t.data('jqfs-class'));

                                el.change();
                            }
                            dropdown.hide();
                            selectbox.removeClass('opened dropup dropdown');
                            // колбек при закрытии селекта
                            opt.onSelectClosed.call(selectbox);

                        });
                        dropdown.mouseout(function() {
                            $('li.sel', dropdown).addClass('selected');
                        });

                        // изменение селекта
                        el.on('change.styler', function() {
                            divText.text(option.filter(':selected').text()).removeClass('placeholder');
                            li.removeClass('selected sel').not('.optgroup').eq(el[0].selectedIndex).addClass('selected sel');
                            // добавляем класс, показывающий изменение селекта
                            if (option.first().text() != li.filter('.selected').text()) {
                                selectbox.addClass('changed');
                            } else {
                                selectbox.removeClass('changed');
                            }
                        })
                        .on('focus.styler', function() {
                            selectbox.addClass('focused');
                            $('div.jqselect').not('.focused').removeClass('opened dropup dropdown').find('div.jq-selectbox__dropdown').hide();
                        })
                        .on('blur.styler', function() {
                            selectbox.removeClass('focused');
                        })
                        // изменение селекта с клавиатуры
                        .on('keydown.styler keyup.styler', function(e) {
                            var liHeight = li.data('li-height');
                            if (el.val() === '') {
                                divText.text(selectPlaceholder).addClass('placeholder');
                            } else {
                                divText.text(option.filter(':selected').text());
                            }
                            li.removeClass('selected sel').not('.optgroup').eq(el[0].selectedIndex).addClass('selected sel');
                            // вверх, влево, Page Up, Home
                            if (e.which == 38 || e.which == 37 || e.which == 33 || e.which == 36) {
                                if (el.val() === '') {
                                    ul.scrollTop(0);
                                } else {
                                    ul.scrollTop(ul.scrollTop() + li.filter('.selected').position().top);
                                }
                            }
                            // вниз, вправо, Page Down, End
                            if (e.which == 40 || e.which == 39 || e.which == 34 || e.which == 35) {
                                ul.scrollTop(ul.scrollTop() + li.filter('.selected').position().top - ul.innerHeight() + liHeight);
                            }
                            // закрываем выпадающий список при нажатии Enter
                            if (e.which == 13) {
                                e.preventDefault();
                                dropdown.hide();
                                selectbox.removeClass('opened dropup dropdown');
                                // колбек при закрытии селекта
                                opt.onSelectClosed.call(selectbox);
                            }
                        }).on('keydown.styler', function(e) {
                            // открываем выпадающий список при нажатии Space
                            if (e.which == 32) {
                                e.preventDefault();
                                divSelect.click();
                            }
                        });

                        // прячем выпадающий список при клике за пределами селекта
                        if (!onDocumentClick.registered) {
                            $(document).on('click', onDocumentClick);
                            onDocumentClick.registered = true;
                        }

                    } // end doSelect()

                    // мультиселект
                    function doMultipleSelect() {

                        var att = new Attributes();
                        var selectbox =
                            $('<div class="jq-select-multiple jqselect"></div>')
                            .css({
                                display: 'inline-block',
                                position: 'relative'
                            })
                            .attr({
                                id: att.id,
                                title: att.title
                            })
                            .addClass(att.classes)
                            .data(att.data)
                        ;

                        el.css({margin: 0, padding: 0}).after(selectbox);

                        makeList();
                        selectbox.append('<ul>' + list + '</ul>');
                        var ul = $('ul', selectbox).css({
                            'position': 'relative',
                            'overflow-x': 'hidden',
                            '-webkit-overflow-scrolling': 'touch'
                        });
                        var li = $('li', selectbox).attr('unselectable', 'on');
                        var size = el.attr('size');
                        var ulHeight = ul.outerHeight();
                        var liHeight = li.outerHeight();
                        if (size !== undefined && size > 0) {
                            ul.css({'height': liHeight * size});
                        } else {
                            ul.css({'height': liHeight * 4});
                        }
                        if (ulHeight > selectbox.height()) {
                            ul.css('overflowY', 'scroll');
                            preventScrolling(ul);
                            // прокручиваем до выбранного пункта
                            if (li.filter('.selected').length) {
                                ul.scrollTop(ul.scrollTop() + li.filter('.selected').position().top);
                            }
                        }

                        // прячем оригинальный селект
                        el.prependTo(selectbox).css({
                            position: 'absolute',
                            left: 0,
                            top: 0,
                            width: '100%',
                            height: '100%',
                            opacity: 0
                        });

                        // если селект неактивный
                        if (el.is(':disabled')) {
                            selectbox.addClass('disabled');
                            option.each(function() {
                                if ($(this).is(':selected')) li.eq($(this).index()).addClass('selected');
                            });

                        // если селект активный
                        } else {

                            // при клике на пункт списка
                            li.filter(':not(.disabled):not(.optgroup)').click(function(e) {
                                el.focus();
                                var clkd = $(this);
                                if(!e.ctrlKey && !e.metaKey) clkd.addClass('selected');
                                if(!e.shiftKey) clkd.addClass('first');
                                if(!e.ctrlKey && !e.metaKey && !e.shiftKey) clkd.siblings().removeClass('selected first');

                                // выделение пунктов при зажатом Ctrl
                                if(e.ctrlKey || e.metaKey) {
                                    if (clkd.is('.selected')) clkd.removeClass('selected first');
                                        else clkd.addClass('selected first');
                                    clkd.siblings().removeClass('first');
                                }

                                // выделение пунктов при зажатом Shift
                                if(e.shiftKey) {
                                    var prev = false,
                                            next = false;
                                    clkd.siblings().removeClass('selected').siblings('.first').addClass('selected');
                                    clkd.prevAll().each(function() {
                                        if ($(this).is('.first')) prev = true;
                                    });
                                    clkd.nextAll().each(function() {
                                        if ($(this).is('.first')) next = true;
                                    });
                                    if (prev) {
                                        clkd.prevAll().each(function() {
                                            if ($(this).is('.selected')) return false;
                                                else $(this).not('.disabled, .optgroup').addClass('selected');
                                        });
                                    }
                                    if (next) {
                                        clkd.nextAll().each(function() {
                                            if ($(this).is('.selected')) return false;
                                                else $(this).not('.disabled, .optgroup').addClass('selected');
                                        });
                                    }
                                    if (li.filter('.selected').length == 1) clkd.addClass('first');
                                }

                                // отмечаем выбранные мышью
                                option.prop('selected', false);
                                li.filter('.selected').each(function() {
                                    var t = $(this);
                                    var index = t.index();
                                    if (t.is('.option')) index -= t.prevAll('.optgroup').length;
                                    option.eq(index).prop('selected', true);
                                });
                                el.change();

                            });

                            // отмечаем выбранные с клавиатуры
                            option.each(function(i) {
                                $(this).data('optionIndex', i);
                            });
                            el.on('change.styler', function() {
                                li.removeClass('selected');
                                var arrIndexes = [];
                                option.filter(':selected').each(function() {
                                    arrIndexes.push($(this).data('optionIndex'));
                                });
                                li.not('.optgroup').filter(function(i) {
                                    return $.inArray(i, arrIndexes) > -1;
                                }).addClass('selected');
                            })
                            .on('focus.styler', function() {
                                selectbox.addClass('focused');
                            })
                            .on('blur.styler', function() {
                                selectbox.removeClass('focused');
                            });

                            // прокручиваем с клавиатуры
                            if (ulHeight > selectbox.height()) {
                                el.on('keydown.styler', function(e) {
                                    // вверх, влево, PageUp
                                    if (e.which == 38 || e.which == 37 || e.which == 33) {
                                        ul.scrollTop(ul.scrollTop() + li.filter('.selected').position().top - liHeight);
                                    }
                                    // вниз, вправо, PageDown
                                    if (e.which == 40 || e.which == 39 || e.which == 34) {
                                        ul.scrollTop(ul.scrollTop() + li.filter('.selected:last').position().top - ul.innerHeight() + liHeight * 2);
                                    }
                                });
                            }

                        }
                    } // end doMultipleSelect()

                    if (el.is('[multiple]')) {

                        // если Android или iOS, то мультиселект не стилизуем
                        // причина для Android - в стилизованном селекте нет возможности выбрать несколько пунктов
                        // причина для iOS - в стилизованном селекте неправильно отображаются выбранные пункты
                        if (Android || iOS) return;

                        doMultipleSelect();
                    } else {
                        doSelect();
                    }

                }; // end selectboxOutput()

                selectboxOutput();

                // обновление при динамическом изменении
                el.on('refresh', function() {
                    el.off('.styler').parent().before(el).remove();
                    selectboxOutput();
                });

            // end select

            // reset
            } else if (el.is(':reset')) {
                el.on('click', function() {
                    setTimeout(function() {
                        el.closest('form').find('input, select').trigger('refresh');
                    }, 1);
                });
            } // end reset

        }, // init: function()

        // деструктор
        destroy: function() {

            var el = $(this.element);

            if (el.is(':checkbox') || el.is(':radio')) {
                el.removeData('_' + pluginName).off('.styler refresh').removeAttr('style').parent().before(el).remove();
                el.closest('label').add('label[for="' + el.attr('id') + '"]').off('.styler');
            } else if (el.is('input[type="number"]')) {
                el.removeData('_' + pluginName).off('.styler refresh').closest('.jq-number').before(el).remove();
            } else if (el.is(':file') || el.is('select')) {
                el.removeData('_' + pluginName).off('.styler refresh').removeAttr('style').parent().before(el).remove();
            }

        } // destroy: function()

    }; // Plugin.prototype

    $.fn[pluginName] = function(options) {
        var args = arguments;
        if (options === undefined || typeof options === 'object') {
            this.each(function() {
                if (!$.data(this, '_' + pluginName)) {
                    $.data(this, '_' + pluginName, new Plugin(this, options));
                }
            })
            // колбек после выполнения плагина
            .promise()
            .done(function() {
                var opt = $(this[0]).data('_' + pluginName);
                if (opt) opt.options.onFormStyled.call();
            });
            return this;
        } else if (typeof options === 'string' && options[0] !== '_' && options !== 'init') {
            var returns;
            this.each(function() {
                var instance = $.data(this, '_' + pluginName);
                if (instance instanceof Plugin && typeof instance[options] === 'function') {
                    returns = instance[options].apply(instance, Array.prototype.slice.call(args, 1));
                }
            });
            return returns !== undefined ? returns : this;
        }
    };

    // прячем выпадающий список при клике за пределами селекта
    function onDocumentClick(e) {
        // e.target.nodeName != 'OPTION' - добавлено для обхода бага в Opera на движке Presto
        // (при изменении селекта с клавиатуры срабатывает событие onclick)
        if (!$(e.target).parents().hasClass('jq-selectbox') && e.target.nodeName != 'OPTION') {
            if ($('div.jq-selectbox.opened').length) {
                var selectbox = $('div.jq-selectbox.opened'),
                        search = $('div.jq-selectbox__search input', selectbox),
                        dropdown = $('div.jq-selectbox__dropdown', selectbox),
                        opt = selectbox.find('select').data('_' + pluginName).options;

                // колбек при закрытии селекта
                opt.onSelectClosed.call(selectbox);

                if (search.length) search.val('').keyup();
                dropdown.hide().find('li.sel').addClass('selected');
                selectbox.removeClass('focused opened dropup dropdown');
            }
        }
    }
    onDocumentClick.registered = false;

}));

/*

arcticModal — jQuery plugin
Version: 0.3
Author: Sergey Predvoditelev (sergey.predvoditelev@gmail.com)
Company: Arctic Laboratory (http://arcticlab.ru/)

Docs & Examples: http://arcticlab.ru/arcticmodal/

*/

(function(d) {
    var g = {
            type: "html",
            content: "",
            url: "",
            ajax: {},
            ajax_request: null,
            closeOnEsc: !0,
            closeOnOverlayClick: !0,
            clone: !1,
            overlay: {
                block: void 0,
                tpl: '<div class="arcticmodal-overlay"></div>',
                css: {
                    backgroundColor: "#000",
                    opacity: 0.6
                }
            },
            container: {
                block: void 0,
                tpl: '<div class="arcticmodal-container"><table class="arcticmodal-container_i"><tr><td class="arcticmodal-container_i2"></td></tr></table></div>'
            },
            wrap: void 0,
            body: void 0,
            errors: {
                tpl: '<div class="arcticmodal-error arcticmodal-close"></div>',
                autoclose_delay: 2E3,
                ajax_unsuccessful_load: "Error"
            },
            openEffect: {
                type: "fade",
                speed: 400
            },
            closeEffect: {
                type: "fade",
                speed: 400
            },
            beforeOpen: d.noop,
            afterOpen: d.noop,
            beforeClose: d.noop,
            afterClose: d.noop,
            afterLoading: d.noop,
            afterLoadingOnShow: d.noop,
            errorLoading: d.noop
        },
        j = 0,
        e = d([]),
        m = {
            isEventOut: function(a, b) {
                var c = !0;
                d(a).each(function() {
                    d(b.target).get(0) == d(this).get(0) && (c = !1);
                    0 == d(b.target).closest("HTML", d(this).get(0)).length && (c = !1)
                });
                return c
            }
        },
        f = {
            getParentEl: function(a) {
                var b = d(a);
                return b.data("arcticmodal") ? b : (b =
                    d(a).closest(".arcticmodal-container").data("arcticmodalParentEl")) ? b : !1
            },
            transition: function(a, b, c, e) {
                e = void 0 == e ? d.noop : e;
                switch (c.type) {
                    case "fade":
                        "show" == b ? a.fadeIn(c.speed, e) : a.fadeOut(c.speed, e);
                        break;
                    case "none":
                        "show" == b ? a.show() : a.hide(), e()
                }
            },
            prepare_body: function(a, b) {
                d(".arcticmodal-close", a.body).unbind("click.arcticmodal").bind("click.arcticmodal", function() {
                    b.arcticmodal("close");
                    return !1
                })
            },
            init_el: function(a, b) {
                var c = a.data("arcticmodal");
                if (!c) {
                    c = b;
                    j++;
                    c.modalID = j;
                    c.overlay.block =
                        d(c.overlay.tpl);
                    c.overlay.block.css(c.overlay.css);
                    c.container.block = d(c.container.tpl);
                    c.body = d(".arcticmodal-container_i2", c.container.block);
                    b.clone ? c.body.html(a.clone(!0)) : (a.before('<div id="arcticmodalReserve' + c.modalID + '" style="display: none" />'), c.body.html(a));
                    f.prepare_body(c, a);
                    c.closeOnOverlayClick && c.overlay.block.add(c.container.block).click(function(b) {
                        m.isEventOut(d(">*", c.body), b) && a.arcticmodal("close")
                    });
                    c.container.block.data("arcticmodalParentEl", a);
                    a.data("arcticmodal", c);
                    e = d.merge(e, a);
                    d.proxy(h.show, a)();
                    if ("html" == c.type) return a;
                    if (void 0 != c.ajax.beforeSend) {
                        var k = c.ajax.beforeSend;
                        delete c.ajax.beforeSend
                    }
                    if (void 0 != c.ajax.success) {
                        var g = c.ajax.success;
                        delete c.ajax.success
                    }
                    if (void 0 != c.ajax.error) {
                        var l = c.ajax.error;
                        delete c.ajax.error
                    }
                    var n = d.extend(!0, {
                        url: c.url,
                        beforeSend: function() {
                            void 0 == k ? c.body.html('<div class="arcticmodal-loading" />') : k(c, a)
                        },
                        success: function(b) {
                            a.trigger("afterLoading");
                            c.afterLoading(c, a, b);
                            void 0 == g ? c.body.html(b) : g(c, a, b);
                            f.prepare_body(c,
                                a);
                            a.trigger("afterLoadingOnShow");
                            c.afterLoadingOnShow(c, a, b)
                        },
                        error: function() {
                            a.trigger("errorLoading");
                            c.errorLoading(c, a);
                            void 0 == l ? (c.body.html(c.errors.tpl), d(".arcticmodal-error", c.body).html(c.errors.ajax_unsuccessful_load), d(".arcticmodal-close", c.body).click(function() {
                                a.arcticmodal("close");
                                return !1
                            }), c.errors.autoclose_delay && setTimeout(function() {
                                a.arcticmodal("close")
                            }, c.errors.autoclose_delay)) : l(c, a)
                        }
                    }, c.ajax);
                    c.ajax_request = d.ajax(n);
                    a.data("arcticmodal", c)
                }
            },
            init: function(a) {
                a =
                    d.extend(!0, {}, g, a);
                if (d.isFunction(this))
                    if (void 0 == a) d.error("jquery.arcticmodal: Uncorrect parameters");
                    else if ("" == a.type) d.error('jquery.arcticmodal: Don\'t set parameter "type"');
                else switch (a.type) {
                    case "html":
                        if ("" == a.content) {
                            d.error('jquery.arcticmodal: Don\'t set parameter "content"');
                            break
                        }
                        var b = a.content;
                        a.content = "";
                        return f.init_el(d(b), a);
                    case "ajax":
                        if ("" == a.url) {
                            d.error('jquery.arcticmodal: Don\'t set parameter "url"');
                            break
                        }
                        return f.init_el(d("<div />"), a)
                } else return this.each(function() {
                    f.init_el(d(this),
                        d.extend(!0, {}, a))
                })
            }
        },
        h = {
            show: function() {
                var a = f.getParentEl(this);
                if (!1 === a) d.error("jquery.arcticmodal: Uncorrect call");
                else {
                    var b = a.data("arcticmodal");
                    b.overlay.block.hide();
                    b.container.block.hide();
                    d("BODY").append(b.overlay.block);
                    d("BODY").append(b.container.block);
                    b.beforeOpen(b, a);
                    a.trigger("beforeOpen");
                    if ("hidden" != b.wrap.css("overflow")) {
                        b.wrap.data("arcticmodalOverflow", b.wrap.css("overflow"));
                        var c = b.wrap.outerWidth(!0);
                        b.wrap.css("overflow", "hidden");
                        var g = b.wrap.outerWidth(!0);
                        g !=
                            c && b.wrap.css("marginRight", g - c + "px")
                    }
                    e.not(a).each(function() {
                        d(this).data("arcticmodal").overlay.block.hide()
                    });
                    f.transition(b.overlay.block, "show", 1 < e.length ? {
                        type: "none"
                    } : b.openEffect);
                    f.transition(b.container.block, "show", 1 < e.length ? {
                        type: "none"
                    } : b.openEffect, function() {
                        b.afterOpen(b, a);
                        a.trigger("afterOpen")
                    });
                    return a
                }
            },
            close: function() {
                if (d.isFunction(this)) e.each(function() {
                    d(this).arcticmodal("close")
                });
                else return this.each(function() {
                    var a = f.getParentEl(this);
                    if (!1 === a) d.error("jquery.arcticmodal: Uncorrect call");
                    else {
                        var b = a.data("arcticmodal");
                        !1 !== b.beforeClose(b, a) && (a.trigger("beforeClose"), e.not(a).last().each(function() {
                            d(this).data("arcticmodal").overlay.block.show()
                        }), f.transition(b.overlay.block, "hide", 1 < e.length ? {
                            type: "none"
                        } : b.closeEffect), f.transition(b.container.block, "hide", 1 < e.length ? {
                            type: "none"
                        } : b.closeEffect, function() {
                            b.afterClose(b, a);
                            a.trigger("afterClose");
                            b.clone || d("#arcticmodalReserve" + b.modalID).replaceWith(b.body.find(">*"));
                            b.overlay.block.remove();
                            b.container.block.remove();
                            a.data("arcticmodal",
                                null);
                            d(".arcticmodal-container").length || (b.wrap.data("arcticmodalOverflow") && b.wrap.css("overflow", b.wrap.data("arcticmodalOverflow")), b.wrap.css("marginRight", 0))
                        }), "ajax" == b.type && b.ajax_request.abort(), e = e.not(a))
                    }
                })
            },
            setDefault: function(a) {
                d.extend(!0, g, a)
            }
        };
    d(function() {
        g.wrap = d(document.all && !document.querySelector ? "html" : "body")
    });
    d(document).bind("keyup.arcticmodal", function(a) {
        var b = e.last();
        b.length && b.data("arcticmodal").closeOnEsc && 27 === a.keyCode && b.arcticmodal("close")
    });
    d.arcticmodal =
        d.fn.arcticmodal = function(a) {
            if (h[a]) return h[a].apply(this, Array.prototype.slice.call(arguments, 1));
            if ("object" === typeof a || !a) return f.init.apply(this, arguments);
            d.error("jquery.arcticmodal: Method " + a + " does not exist")
        }
})(jQuery);

/*!
 * jQuery.scrollTo
 * Copyright (c) 2007-2015 Ariel Flesler - aflesler ○ gmail • com | http://flesler.blogspot.com
 * Licensed under MIT
 * http://flesler.blogspot.com/2007/10/jqueryscrollto.html
 * @projectDescription Lightweight, cross-browser and highly customizable animated scrolling with jQuery
 * @author Ariel Flesler
 * @version 2.1.2
 */
;(function(factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery'], factory);
    } else if (typeof module !== 'undefined' && module.exports) {
        // CommonJS
        module.exports = factory(require('jquery'));
    } else {
        // Global
        factory(jQuery);
    }
})(function($) {
    'use strict';

    var $scrollTo = $.scrollTo = function(target, duration, settings) {
        return $(window).scrollTo(target, duration, settings);
    };

    $scrollTo.defaults = {
        axis:'xy',
        duration: 0,
        limit:true
    };

    function isWin(elem) {
        return !elem.nodeName ||
            $.inArray(elem.nodeName.toLowerCase(), ['iframe','#document','html','body']) !== -1;
    }       

    $.fn.scrollTo = function(target, duration, settings) {
        if (typeof duration === 'object') {
            settings = duration;
            duration = 0;
        }
        if (typeof settings === 'function') {
            settings = { onAfter:settings };
        }
        if (target === 'max') {
            target = 9e9;
        }

        settings = $.extend({}, $scrollTo.defaults, settings);
        // Speed is still recognized for backwards compatibility
        duration = duration || settings.duration;
        // Make sure the settings are given right
        var queue = settings.queue && settings.axis.length > 1;
        if (queue) {
            // Let's keep the overall duration
            duration /= 2;
        }
        settings.offset = both(settings.offset);
        settings.over = both(settings.over);

        return this.each(function() {
            // Null target yields nothing, just like jQuery does
            if (target === null) return;

            var win = isWin(this),
                elem = win ? this.contentWindow || window : this,
                $elem = $(elem),
                targ = target, 
                attr = {},
                toff;

            switch (typeof targ) {
                // A number will pass the regex
                case 'number':
                case 'string':
                    if (/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(targ)) {
                        targ = both(targ);
                        // We are done
                        break;
                    }
                    // Relative/Absolute selector
                    targ = win ? $(targ) : $(targ, elem);
                    /* falls through */
                case 'object':
                    if (targ.length === 0) return;
                    // DOMElement / jQuery
                    if (targ.is || targ.style) {
                        // Get the real position of the target
                        toff = (targ = $(targ)).offset();
                    }
            }

            var offset = $.isFunction(settings.offset) && settings.offset(elem, targ) || settings.offset;

            $.each(settings.axis.split(''), function(i, axis) {
                var Pos = axis === 'x' ? 'Left' : 'Top',
                    pos = Pos.toLowerCase(),
                    key = 'scroll' + Pos,
                    prev = $elem[key](),
                    max = $scrollTo.max(elem, axis);

                if (toff) {// jQuery / DOMElement
                    attr[key] = toff[pos] + (win ? 0 : prev - $elem.offset()[pos]);

                    // If it's a dom element, reduce the margin
                    if (settings.margin) {
                        attr[key] -= parseInt(targ.css('margin'+Pos), 10) || 0;
                        attr[key] -= parseInt(targ.css('border'+Pos+'Width'), 10) || 0;
                    }

                    attr[key] += offset[pos] || 0;

                    if (settings.over[pos]) {
                        // Scroll to a fraction of its width/height
                        attr[key] += targ[axis === 'x'?'width':'height']() * settings.over[pos];
                    }
                } else {
                    var val = targ[pos];
                    // Handle percentage values
                    attr[key] = val.slice && val.slice(-1) === '%' ?
                        parseFloat(val) / 100 * max
                        : val;
                }

                // Number or 'number'
                if (settings.limit && /^\d+$/.test(attr[key])) {
                    // Check the limits
                    attr[key] = attr[key] <= 0 ? 0 : Math.min(attr[key], max);
                }

                // Don't waste time animating, if there's no need.
                if (!i && settings.axis.length > 1) {
                    if (prev === attr[key]) {
                        // No animation needed
                        attr = {};
                    } else if (queue) {
                        // Intermediate animation
                        animate(settings.onAfterFirst);
                        // Don't animate this axis again in the next iteration.
                        attr = {};
                    }
                }
            });

            animate(settings.onAfter);

            function animate(callback) {
                var opts = $.extend({}, settings, {
                    // The queue setting conflicts with animate()
                    // Force it to always be true
                    queue: true,
                    duration: duration,
                    complete: callback && function() {
                        callback.call(elem, targ, settings);
                    }
                });
                $elem.animate(attr, opts);
            }
        });
    };

    // Max scrolling position, works on quirks mode
    // It only fails (not too badly) on IE, quirks mode.
    $scrollTo.max = function(elem, axis) {
        var Dim = axis === 'x' ? 'Width' : 'Height',
            scroll = 'scroll'+Dim;

        if (!isWin(elem))
            return elem[scroll] - $(elem)[Dim.toLowerCase()]();

        var size = 'client' + Dim,
            doc = elem.ownerDocument || elem.document,
            html = doc.documentElement,
            body = doc.body;

        return Math.max(html[scroll], body[scroll]) - Math.min(html[size], body[size]);
    };

    function both(val) {
        return $.isFunction(val) || $.isPlainObject(val) ? val : { top:val, left:val };
    }

    // Add special hooks so that window scroll properties can be animated
    $.Tween.propHooks.scrollLeft = 
    $.Tween.propHooks.scrollTop = {
        get: function(t) {
            return $(t.elem)[t.prop]();
        },
        set: function(t) {
            var curr = this.get(t);
            // If interrupt is true and user scrolled, stop animating
            if (t.options.interrupt && t._last && t._last !== curr) {
                return $(t.elem).stop();
            }
            var next = Math.round(t.now);
            // Don't waste CPU
            // Browsers don't render floating point scroll
            if (curr !== next) {
                $(t.elem)[t.prop](next);
                t._last = this.get(t);
            }
        }
    };

    // AMD requirement
    return $scrollTo;
});


/*
     _ _      _       _
 ___| (_) ___| | __  (_)___
/ __| | |/ __| |/ /  | / __|
\__ \ | | (__|   < _ | \__ \
|___/_|_|\___|_|\_(_)/ |___/
                   |__/

 Version: 1.6.0
  Author: Ken Wheeler
 Website: http://kenwheeler.github.io
    Docs: http://kenwheeler.github.io/slick
    Repo: http://github.com/kenwheeler/slick
  Issues: http://github.com/kenwheeler/slick/issues

 */
/* global window, document, define, jQuery, setInterval, clearInterval */
(function(factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof exports !== 'undefined') {
        module.exports = factory(require('jquery'));
    } else {
        factory(jQuery);
    }

}(function($) {
    'use strict';
    var Slick = window.Slick || {};

    Slick = (function() {

        var instanceUid = 0;

        function Slick(element, settings) {

            var _ = this, dataSettings;

            _.defaults = {
                accessibility: true,
                adaptiveHeight: false,
                appendArrows: $(element),
                appendDots: $(element),
                arrows: true,
                asNavFor: null,
                prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button">Previous</button>',
                nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button">Next</button>',
                autoplay: false,
                autoplaySpeed: 3000,
                centerMode: false,
                centerPadding: '50px',
                cssEase: 'ease',
                customPaging: function(slider, i) {
                    return $('<button type="button" data-role="none" role="button" tabindex="0" />').text(i + 1);
                },
                dots: false,
                dotsClass: 'slick-dots',
                draggable: true,
                easing: 'linear',
                edgeFriction: 0.35,
                fade: false,
                focusOnSelect: false,
                infinite: true,
                initialSlide: 0,
                lazyLoad: 'ondemand',
                mobileFirst: false,
                pauseOnHover: true,
                pauseOnFocus: true,
                pauseOnDotsHover: false,
                respondTo: 'window',
                responsive: null,
                rows: 1,
                rtl: false,
                slide: '',
                slidesPerRow: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                swipe: true,
                swipeToSlide: false,
                touchMove: true,
                touchThreshold: 5,
                useCSS: true,
                useTransform: true,
                variableWidth: false,
                vertical: false,
                verticalSwiping: false,
                waitForAnimate: true,
                zIndex: 6
            };

            _.initials = {
                animating: false,
                dragging: false,
                autoPlayTimer: null,
                currentDirection: 0,
                currentLeft: null,
                currentSlide: 0,
                direction: 1,
                $dots: null,
                listWidth: null,
                listHeight: null,
                loadIndex: 0,
                $nextArrow: null,
                $prevArrow: null,
                slideCount: null,
                slideWidth: null,
                $slideTrack: null,
                $slides: null,
                sliding: false,
                slideOffset: 0,
                swipeLeft: null,
                $list: null,
                touchObject: {},
                transformsEnabled: false,
                unslicked: false
            };

            $.extend(_, _.initials);

            _.activeBreakpoint = null;
            _.animType = null;
            _.animProp = null;
            _.breakpoints = [];
            _.breakpointSettings = [];
            _.cssTransitions = false;
            _.focussed = false;
            _.interrupted = false;
            _.hidden = 'hidden';
            _.paused = true;
            _.positionProp = null;
            _.respondTo = null;
            _.rowCount = 1;
            _.shouldClick = true;
            _.$slider = $(element);
            _.$slidesCache = null;
            _.transformType = null;
            _.transitionType = null;
            _.visibilityChange = 'visibilitychange';
            _.windowWidth = 0;
            _.windowTimer = null;

            dataSettings = $(element).data('slick') || {};

            _.options = $.extend({}, _.defaults, settings, dataSettings);

            _.currentSlide = _.options.initialSlide;

            _.originalSettings = _.options;

            if (typeof document.mozHidden !== 'undefined') {
                _.hidden = 'mozHidden';
                _.visibilityChange = 'mozvisibilitychange';
            } else if (typeof document.webkitHidden !== 'undefined') {
                _.hidden = 'webkitHidden';
                _.visibilityChange = 'webkitvisibilitychange';
            }

            _.autoPlay = $.proxy(_.autoPlay, _);
            _.autoPlayClear = $.proxy(_.autoPlayClear, _);
            _.autoPlayIterator = $.proxy(_.autoPlayIterator, _);
            _.changeSlide = $.proxy(_.changeSlide, _);
            _.clickHandler = $.proxy(_.clickHandler, _);
            _.selectHandler = $.proxy(_.selectHandler, _);
            _.setPosition = $.proxy(_.setPosition, _);
            _.swipeHandler = $.proxy(_.swipeHandler, _);
            _.dragHandler = $.proxy(_.dragHandler, _);
            _.keyHandler = $.proxy(_.keyHandler, _);

            _.instanceUid = instanceUid++;

            // A simple way to check for HTML strings
            // Strict HTML recognition (must start with <)
            // Extracted from jQuery v1.11 source
            _.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/;


            _.registerBreakpoints();
            _.init(true);

        }

        return Slick;

    }());

    Slick.prototype.activateADA = function() {
        var _ = this;

        _.$slideTrack.find('.slick-active').attr({
            'aria-hidden': 'false'
        }).find('a, input, button, select').attr({
            'tabindex': '0'
        });

    };

    Slick.prototype.addSlide = Slick.prototype.slickAdd = function(markup, index, addBefore) {

        var _ = this;

        if (typeof(index) === 'boolean') {
            addBefore = index;
            index = null;
        } else if (index < 0 || (index >= _.slideCount)) {
            return false;
        }

        _.unload();

        if (typeof(index) === 'number') {
            if (index === 0 && _.$slides.length === 0) {
                $(markup).appendTo(_.$slideTrack);
            } else if (addBefore) {
                $(markup).insertBefore(_.$slides.eq(index));
            } else {
                $(markup).insertAfter(_.$slides.eq(index));
            }
        } else {
            if (addBefore === true) {
                $(markup).prependTo(_.$slideTrack);
            } else {
                $(markup).appendTo(_.$slideTrack);
            }
        }

        _.$slides = _.$slideTrack.children(this.options.slide);

        _.$slideTrack.children(this.options.slide).detach();

        _.$slideTrack.append(_.$slides);

        _.$slides.each(function(index, element) {
            $(element).attr('data-slick-index', index);
        });

        _.$slidesCache = _.$slides;

        _.reinit();

    };

    Slick.prototype.animateHeight = function() {
        var _ = this;
        if (_.options.slidesToShow === 1 && _.options.adaptiveHeight === true && _.options.vertical === false) {
            var targetHeight = _.$slides.eq(_.currentSlide).outerHeight(true);
            _.$list.animate({
                height: targetHeight
            }, _.options.speed);
        }
    };

    Slick.prototype.animateSlide = function(targetLeft, callback) {

        var animProps = {},
            _ = this;

        _.animateHeight();

        if (_.options.rtl === true && _.options.vertical === false) {
            targetLeft = -targetLeft;
        }
        if (_.transformsEnabled === false) {
            if (_.options.vertical === false) {
                _.$slideTrack.animate({
                    left: targetLeft
                }, _.options.speed, _.options.easing, callback);
            } else {
                _.$slideTrack.animate({
                    top: targetLeft
                }, _.options.speed, _.options.easing, callback);
            }

        } else {

            if (_.cssTransitions === false) {
                if (_.options.rtl === true) {
                    _.currentLeft = -(_.currentLeft);
                }
                $({
                    animStart: _.currentLeft
                }).animate({
                    animStart: targetLeft
                }, {
                    duration: _.options.speed,
                    easing: _.options.easing,
                    step: function(now) {
                        now = Math.ceil(now);
                        if (_.options.vertical === false) {
                            animProps[_.animType] = 'translate(' +
                                now + 'px, 0px)';
                            _.$slideTrack.css(animProps);
                        } else {
                            animProps[_.animType] = 'translate(0px,' +
                                now + 'px)';
                            _.$slideTrack.css(animProps);
                        }
                    },
                    complete: function() {
                        if (callback) {
                            callback.call();
                        }
                    }
                });

            } else {

                _.applyTransition();
                targetLeft = Math.ceil(targetLeft);

                if (_.options.vertical === false) {
                    animProps[_.animType] = 'translate3d(' + targetLeft + 'px, 0px, 0px)';
                } else {
                    animProps[_.animType] = 'translate3d(0px,' + targetLeft + 'px, 0px)';
                }
                _.$slideTrack.css(animProps);

                if (callback) {
                    setTimeout(function() {

                        _.disableTransition();

                        callback.call();
                    }, _.options.speed);
                }

            }

        }

    };

    Slick.prototype.getNavTarget = function() {

        var _ = this,
            asNavFor = _.options.asNavFor;

        if ( asNavFor && asNavFor !== null ) {
            asNavFor = $(asNavFor).not(_.$slider);
        }

        return asNavFor;

    };

    Slick.prototype.asNavFor = function(index) {

        var _ = this,
            asNavFor = _.getNavTarget();

        if ( asNavFor !== null && typeof asNavFor === 'object' ) {
            asNavFor.each(function() {
                var target = $(this).slick('getSlick');
                if(!target.unslicked) {
                    target.slideHandler(index, true);
                }
            });
        }

    };

    Slick.prototype.applyTransition = function(slide) {

        var _ = this,
            transition = {};

        if (_.options.fade === false) {
            transition[_.transitionType] = _.transformType + ' ' + _.options.speed + 'ms ' + _.options.cssEase;
        } else {
            transition[_.transitionType] = 'opacity ' + _.options.speed + 'ms ' + _.options.cssEase;
        }

        if (_.options.fade === false) {
            _.$slideTrack.css(transition);
        } else {
            _.$slides.eq(slide).css(transition);
        }

    };

    Slick.prototype.autoPlay = function() {

        var _ = this;

        _.autoPlayClear();

        if ( _.slideCount > _.options.slidesToShow ) {
            _.autoPlayTimer = setInterval( _.autoPlayIterator, _.options.autoplaySpeed );
        }

    };

    Slick.prototype.autoPlayClear = function() {

        var _ = this;

        if (_.autoPlayTimer) {
            clearInterval(_.autoPlayTimer);
        }

    };

    Slick.prototype.autoPlayIterator = function() {

        var _ = this,
            slideTo = _.currentSlide + _.options.slidesToScroll;

        if ( !_.paused && !_.interrupted && !_.focussed ) {

            if ( _.options.infinite === false ) {

                if ( _.direction === 1 && ( _.currentSlide + 1 ) === ( _.slideCount - 1 )) {
                    _.direction = 0;
                }

                else if ( _.direction === 0 ) {

                    slideTo = _.currentSlide - _.options.slidesToScroll;

                    if ( _.currentSlide - 1 === 0 ) {
                        _.direction = 1;
                    }

                }

            }

            _.slideHandler( slideTo );

        }

    };

    Slick.prototype.buildArrows = function() {

        var _ = this;

        if (_.options.arrows === true ) {

            _.$prevArrow = $(_.options.prevArrow).addClass('slick-arrow');
            _.$nextArrow = $(_.options.nextArrow).addClass('slick-arrow');

            if( _.slideCount > _.options.slidesToShow ) {

                _.$prevArrow.removeClass('slick-hidden').removeAttr('aria-hidden tabindex');
                _.$nextArrow.removeClass('slick-hidden').removeAttr('aria-hidden tabindex');

                if (_.htmlExpr.test(_.options.prevArrow)) {
                    _.$prevArrow.prependTo(_.options.appendArrows);
                }

                if (_.htmlExpr.test(_.options.nextArrow)) {
                    _.$nextArrow.appendTo(_.options.appendArrows);
                }

                if (_.options.infinite !== true) {
                    _.$prevArrow
                        .addClass('slick-disabled')
                        .attr('aria-disabled', 'true');
                }

            } else {

                _.$prevArrow.add( _.$nextArrow )

                    .addClass('slick-hidden')
                    .attr({
                        'aria-disabled': 'true',
                        'tabindex': '-1'
                    });

            }

        }

    };

    Slick.prototype.buildDots = function() {

        var _ = this,
            i, dot;

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {

            _.$slider.addClass('slick-dotted');

            dot = $('<ul />').addClass(_.options.dotsClass);

            for (i = 0; i <= _.getDotCount(); i += 1) {
                dot.append($('<li />').append(_.options.customPaging.call(this, _, i)));
            }

            _.$dots = dot.appendTo(_.options.appendDots);

            _.$dots.find('li').first().addClass('slick-active').attr('aria-hidden', 'false');

        }

    };

    Slick.prototype.buildOut = function() {

        var _ = this;

        _.$slides =
            _.$slider
                .children( _.options.slide + ':not(.slick-cloned)')
                .addClass('slick-slide');

        _.slideCount = _.$slides.length;

        _.$slides.each(function(index, element) {
            $(element)
                .attr('data-slick-index', index)
                .data('originalStyling', $(element).attr('style') || '');
        });

        _.$slider.addClass('slick-slider');

        _.$slideTrack = (_.slideCount === 0) ?
            $('<div class="slick-track"/>').appendTo(_.$slider) :
            _.$slides.wrapAll('<div class="slick-track"/>').parent();

        _.$list = _.$slideTrack.wrap(
            '<div aria-live="polite" class="slick-list"/>').parent();
        _.$slideTrack.css('opacity', 0);

        if (_.options.centerMode === true || _.options.swipeToSlide === true) {
            _.options.slidesToScroll = 1;
        }

        $('img[data-lazy]', _.$slider).not('[src]').addClass('slick-loading');

        _.setupInfinite();

        _.buildArrows();

        _.buildDots();

        _.updateDots();


        _.setSlideClasses(typeof _.currentSlide === 'number' ? _.currentSlide : 0);

        if (_.options.draggable === true) {
            _.$list.addClass('draggable');
        }

    };

    Slick.prototype.buildRows = function() {

        var _ = this, a, b, c, newSlides, numOfSlides, originalSlides,slidesPerSection;

        newSlides = document.createDocumentFragment();
        originalSlides = _.$slider.children();

        if(_.options.rows > 1) {

            slidesPerSection = _.options.slidesPerRow * _.options.rows;
            numOfSlides = Math.ceil(
                originalSlides.length / slidesPerSection
            );

            for(a = 0; a < numOfSlides; a++){
                var slide = document.createElement('div');
                for(b = 0; b < _.options.rows; b++) {
                    var row = document.createElement('div');
                    for(c = 0; c < _.options.slidesPerRow; c++) {
                        var target = (a * slidesPerSection + ((b * _.options.slidesPerRow) + c));
                        if (originalSlides.get(target)) {
                            row.appendChild(originalSlides.get(target));
                        }
                    }
                    slide.appendChild(row);
                }
                newSlides.appendChild(slide);
            }

            _.$slider.empty().append(newSlides);
            _.$slider.children().children().children()
                .css({
                    'width':(100 / _.options.slidesPerRow) + '%',
                    'display': 'inline-block'
                });

        }

    };

    Slick.prototype.checkResponsive = function(initial, forceUpdate) {

        var _ = this,
            breakpoint, targetBreakpoint, respondToWidth, triggerBreakpoint = false;
        var sliderWidth = _.$slider.width();
        var windowWidth = window.innerWidth || $(window).width();

        if (_.respondTo === 'window') {
            respondToWidth = windowWidth;
        } else if (_.respondTo === 'slider') {
            respondToWidth = sliderWidth;
        } else if (_.respondTo === 'min') {
            respondToWidth = Math.min(windowWidth, sliderWidth);
        }

        if ( _.options.responsive &&
            _.options.responsive.length &&
            _.options.responsive !== null) {

            targetBreakpoint = null;

            for (breakpoint in _.breakpoints) {
                if (_.breakpoints.hasOwnProperty(breakpoint)) {
                    if (_.originalSettings.mobileFirst === false) {
                        if (respondToWidth < _.breakpoints[breakpoint]) {
                            targetBreakpoint = _.breakpoints[breakpoint];
                        }
                    } else {
                        if (respondToWidth > _.breakpoints[breakpoint]) {
                            targetBreakpoint = _.breakpoints[breakpoint];
                        }
                    }
                }
            }

            if (targetBreakpoint !== null) {
                if (_.activeBreakpoint !== null) {
                    if (targetBreakpoint !== _.activeBreakpoint || forceUpdate) {
                        _.activeBreakpoint =
                            targetBreakpoint;
                        if (_.breakpointSettings[targetBreakpoint] === 'unslick') {
                            _.unslick(targetBreakpoint);
                        } else {
                            _.options = $.extend({}, _.originalSettings,
                                _.breakpointSettings[
                                    targetBreakpoint]);
                            if (initial === true) {
                                _.currentSlide = _.options.initialSlide;
                            }
                            _.refresh(initial);
                        }
                        triggerBreakpoint = targetBreakpoint;
                    }
                } else {
                    _.activeBreakpoint = targetBreakpoint;
                    if (_.breakpointSettings[targetBreakpoint] === 'unslick') {
                        _.unslick(targetBreakpoint);
                    } else {
                        _.options = $.extend({}, _.originalSettings,
                            _.breakpointSettings[
                                targetBreakpoint]);
                        if (initial === true) {
                            _.currentSlide = _.options.initialSlide;
                        }
                        _.refresh(initial);
                    }
                    triggerBreakpoint = targetBreakpoint;
                }
            } else {
                if (_.activeBreakpoint !== null) {
                    _.activeBreakpoint = null;
                    _.options = _.originalSettings;
                    if (initial === true) {
                        _.currentSlide = _.options.initialSlide;
                    }
                    _.refresh(initial);
                    triggerBreakpoint = targetBreakpoint;
                }
            }

            // only trigger breakpoints during an actual break. not on initialize.
            if( !initial && triggerBreakpoint !== false ) {
                _.$slider.trigger('breakpoint', [_, triggerBreakpoint]);
            }
        }

    };

    Slick.prototype.changeSlide = function(event, dontAnimate) {

        var _ = this,
            $target = $(event.currentTarget),
            indexOffset, slideOffset, unevenOffset;

        // If target is a link, prevent default action.
        if($target.is('a')) {
            event.preventDefault();
        }

        // If target is not the <li> element (ie: a child), find the <li>.
        if(!$target.is('li')) {
            $target = $target.closest('li');
        }

        unevenOffset = (_.slideCount % _.options.slidesToScroll !== 0);
        indexOffset = unevenOffset ? 0 : (_.slideCount - _.currentSlide) % _.options.slidesToScroll;

        switch (event.data.message) {

            case 'previous':
                slideOffset = indexOffset === 0 ? _.options.slidesToScroll : _.options.slidesToShow - indexOffset;
                if (_.slideCount > _.options.slidesToShow) {
                    _.slideHandler(_.currentSlide - slideOffset, false, dontAnimate);
                }
                break;

            case 'next':
                slideOffset = indexOffset === 0 ? _.options.slidesToScroll : indexOffset;
                if (_.slideCount > _.options.slidesToShow) {
                    _.slideHandler(_.currentSlide + slideOffset, false, dontAnimate);
                }
                break;

            case 'index':
                var index = event.data.index === 0 ? 0 :
                    event.data.index || $target.index() * _.options.slidesToScroll;

                _.slideHandler(_.checkNavigable(index), false, dontAnimate);
                $target.children().trigger('focus');
                break;

            default:
                return;
        }

    };

    Slick.prototype.checkNavigable = function(index) {

        var _ = this,
            navigables, prevNavigable;

        navigables = _.getNavigableIndexes();
        prevNavigable = 0;
        if (index > navigables[navigables.length - 1]) {
            index = navigables[navigables.length - 1];
        } else {
            for (var n in navigables) {
                if (index < navigables[n]) {
                    index = prevNavigable;
                    break;
                }
                prevNavigable = navigables[n];
            }
        }

        return index;
    };

    Slick.prototype.cleanUpEvents = function() {

        var _ = this;

        if (_.options.dots && _.$dots !== null) {

            $('li', _.$dots)
                .off('click.slick', _.changeSlide)
                .off('mouseenter.slick', $.proxy(_.interrupt, _, true))
                .off('mouseleave.slick', $.proxy(_.interrupt, _, false));

        }

        _.$slider.off('focus.slick blur.slick');

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
            _.$prevArrow && _.$prevArrow.off('click.slick', _.changeSlide);
            _.$nextArrow && _.$nextArrow.off('click.slick', _.changeSlide);
        }

        _.$list.off('touchstart.slick mousedown.slick', _.swipeHandler);
        _.$list.off('touchmove.slick mousemove.slick', _.swipeHandler);
        _.$list.off('touchend.slick mouseup.slick', _.swipeHandler);
        _.$list.off('touchcancel.slick mouseleave.slick', _.swipeHandler);

        _.$list.off('click.slick', _.clickHandler);

        $(document).off(_.visibilityChange, _.visibility);

        _.cleanUpSlideEvents();

        if (_.options.accessibility === true) {
            _.$list.off('keydown.slick', _.keyHandler);
        }

        if (_.options.focusOnSelect === true) {
            $(_.$slideTrack).children().off('click.slick', _.selectHandler);
        }

        $(window).off('orientationchange.slick.slick-' + _.instanceUid, _.orientationChange);

        $(window).off('resize.slick.slick-' + _.instanceUid, _.resize);

        $('[draggable!=true]', _.$slideTrack).off('dragstart', _.preventDefault);

        $(window).off('load.slick.slick-' + _.instanceUid, _.setPosition);
        $(document).off('ready.slick.slick-' + _.instanceUid, _.setPosition);

    };

    Slick.prototype.cleanUpSlideEvents = function() {

        var _ = this;

        _.$list.off('mouseenter.slick', $.proxy(_.interrupt, _, true));
        _.$list.off('mouseleave.slick', $.proxy(_.interrupt, _, false));

    };

    Slick.prototype.cleanUpRows = function() {

        var _ = this, originalSlides;

        if(_.options.rows > 1) {
            originalSlides = _.$slides.children().children();
            originalSlides.removeAttr('style');
            _.$slider.empty().append(originalSlides);
        }

    };

    Slick.prototype.clickHandler = function(event) {

        var _ = this;

        if (_.shouldClick === false) {
            event.stopImmediatePropagation();
            event.stopPropagation();
            event.preventDefault();
        }

    };

    Slick.prototype.destroy = function(refresh) {

        var _ = this;

        _.autoPlayClear();

        _.touchObject = {};

        _.cleanUpEvents();

        $('.slick-cloned', _.$slider).detach();

        if (_.$dots) {
            _.$dots.remove();
        }


        if ( _.$prevArrow && _.$prevArrow.length ) {

            _.$prevArrow
                .removeClass('slick-disabled slick-arrow slick-hidden')
                .removeAttr('aria-hidden aria-disabled tabindex')
                .css('display','');

            if ( _.htmlExpr.test( _.options.prevArrow )) {
                _.$prevArrow.remove();
            }
        }

        if ( _.$nextArrow && _.$nextArrow.length ) {

            _.$nextArrow
                .removeClass('slick-disabled slick-arrow slick-hidden')
                .removeAttr('aria-hidden aria-disabled tabindex')
                .css('display','');

            if ( _.htmlExpr.test( _.options.nextArrow )) {
                _.$nextArrow.remove();
            }

        }


        if (_.$slides) {

            _.$slides
                .removeClass('slick-slide slick-active slick-center slick-visible slick-current')
                .removeAttr('aria-hidden')
                .removeAttr('data-slick-index')
                .each(function(){
                    $(this).attr('style', $(this).data('originalStyling'));
                });

            _.$slideTrack.children(this.options.slide).detach();

            _.$slideTrack.detach();

            _.$list.detach();

            _.$slider.append(_.$slides);
        }

        _.cleanUpRows();

        _.$slider.removeClass('slick-slider');
        _.$slider.removeClass('slick-initialized');
        _.$slider.removeClass('slick-dotted');

        _.unslicked = true;

        if(!refresh) {
            _.$slider.trigger('destroy', [_]);
        }

    };

    Slick.prototype.disableTransition = function(slide) {

        var _ = this,
            transition = {};

        transition[_.transitionType] = '';

        if (_.options.fade === false) {
            _.$slideTrack.css(transition);
        } else {
            _.$slides.eq(slide).css(transition);
        }

    };

    Slick.prototype.fadeSlide = function(slideIndex, callback) {

        var _ = this;

        if (_.cssTransitions === false) {

            _.$slides.eq(slideIndex).css({
                zIndex: _.options.zIndex
            });

            _.$slides.eq(slideIndex).animate({
                opacity: 1
            }, _.options.speed, _.options.easing, callback);

        } else {

            _.applyTransition(slideIndex);

            _.$slides.eq(slideIndex).css({
                opacity: 1,
                zIndex: _.options.zIndex
            });

            if (callback) {
                setTimeout(function() {

                    _.disableTransition(slideIndex);

                    callback.call();
                }, _.options.speed);
            }

        }

    };

    Slick.prototype.fadeSlideOut = function(slideIndex) {

        var _ = this;

        if (_.cssTransitions === false) {

            _.$slides.eq(slideIndex).animate({
                opacity: 0,
                zIndex: _.options.zIndex - 2
            }, _.options.speed, _.options.easing);

        } else {

            _.applyTransition(slideIndex);

            _.$slides.eq(slideIndex).css({
                opacity: 0,
                zIndex: _.options.zIndex - 2
            });

        }

    };

    Slick.prototype.filterSlides = Slick.prototype.slickFilter = function(filter) {

        var _ = this;

        if (filter !== null) {

            _.$slidesCache = _.$slides;

            _.unload();

            _.$slideTrack.children(this.options.slide).detach();

            _.$slidesCache.filter(filter).appendTo(_.$slideTrack);

            _.reinit();

        }

    };

    Slick.prototype.focusHandler = function() {

        var _ = this;

        _.$slider
            .off('focus.slick blur.slick')
            .on('focus.slick blur.slick',
                '*:not(.slick-arrow)', function(event) {

            event.stopImmediatePropagation();
            var $sf = $(this);

            setTimeout(function() {

                if( _.options.pauseOnFocus ) {
                    _.focussed = $sf.is(':focus');
                    _.autoPlay();
                }

            }, 0);

        });
    };

    Slick.prototype.getCurrent = Slick.prototype.slickCurrentSlide = function() {

        var _ = this;
        return _.currentSlide;

    };

    Slick.prototype.getDotCount = function() {

        var _ = this;

        var breakPoint = 0;
        var counter = 0;
        var pagerQty = 0;

        if (_.options.infinite === true) {
            while (breakPoint < _.slideCount) {
                ++pagerQty;
                breakPoint = counter + _.options.slidesToScroll;
                counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
            }
        } else if (_.options.centerMode === true) {
            pagerQty = _.slideCount;
        } else if(!_.options.asNavFor) {
            pagerQty = 1 + Math.ceil((_.slideCount - _.options.slidesToShow) / _.options.slidesToScroll);
        }else {
            while (breakPoint < _.slideCount) {
                ++pagerQty;
                breakPoint = counter + _.options.slidesToScroll;
                counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
            }
        }

        return pagerQty - 1;

    };

    Slick.prototype.getLeft = function(slideIndex) {

        var _ = this,
            targetLeft,
            verticalHeight,
            verticalOffset = 0,
            targetSlide;

        _.slideOffset = 0;
        verticalHeight = _.$slides.first().outerHeight(true);

        if (_.options.infinite === true) {
            if (_.slideCount > _.options.slidesToShow) {
                _.slideOffset = (_.slideWidth * _.options.slidesToShow) * -1;
                verticalOffset = (verticalHeight * _.options.slidesToShow) * -1;
            }
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                if (slideIndex + _.options.slidesToScroll > _.slideCount && _.slideCount > _.options.slidesToShow) {
                    if (slideIndex > _.slideCount) {
                        _.slideOffset = ((_.options.slidesToShow - (slideIndex - _.slideCount)) * _.slideWidth) * -1;
                        verticalOffset = ((_.options.slidesToShow - (slideIndex - _.slideCount)) * verticalHeight) * -1;
                    } else {
                        _.slideOffset = ((_.slideCount % _.options.slidesToScroll) * _.slideWidth) * -1;
                        verticalOffset = ((_.slideCount % _.options.slidesToScroll) * verticalHeight) * -1;
                    }
                }
            }
        } else {
            if (slideIndex + _.options.slidesToShow > _.slideCount) {
                _.slideOffset = ((slideIndex + _.options.slidesToShow) - _.slideCount) * _.slideWidth;
                verticalOffset = ((slideIndex + _.options.slidesToShow) - _.slideCount) * verticalHeight;
            }
        }

        if (_.slideCount <= _.options.slidesToShow) {
            _.slideOffset = 0;
            verticalOffset = 0;
        }

        if (_.options.centerMode === true && _.options.infinite === true) {
            _.slideOffset += _.slideWidth * Math.floor(_.options.slidesToShow / 2) - _.slideWidth;
        } else if (_.options.centerMode === true) {
            _.slideOffset = 0;
            _.slideOffset += _.slideWidth * Math.floor(_.options.slidesToShow / 2);
        }

        if (_.options.vertical === false) {
            targetLeft = ((slideIndex * _.slideWidth) * -1) + _.slideOffset;
        } else {
            targetLeft = ((slideIndex * verticalHeight) * -1) + verticalOffset;
        }

        if (_.options.variableWidth === true) {

            if (_.slideCount <= _.options.slidesToShow || _.options.infinite === false) {
                targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex);
            } else {
                targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex + _.options.slidesToShow);
            }

            if (_.options.rtl === true) {
                if (targetSlide[0]) {
                    targetLeft = (_.$slideTrack.width() - targetSlide[0].offsetLeft - targetSlide.width()) * -1;
                } else {
                    targetLeft =  0;
                }
            } else {
                targetLeft = targetSlide[0] ? targetSlide[0].offsetLeft * -1 : 0;
            }

            if (_.options.centerMode === true) {
                if (_.slideCount <= _.options.slidesToShow || _.options.infinite === false) {
                    targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex);
                } else {
                    targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex + _.options.slidesToShow + 1);
                }

                if (_.options.rtl === true) {
                    if (targetSlide[0]) {
                        targetLeft = (_.$slideTrack.width() - targetSlide[0].offsetLeft - targetSlide.width()) * -1;
                    } else {
                        targetLeft =  0;
                    }
                } else {
                    targetLeft = targetSlide[0] ? targetSlide[0].offsetLeft * -1 : 0;
                }

                targetLeft += (_.$list.width() - targetSlide.outerWidth()) / 2;
            }
        }

        return targetLeft;

    };

    Slick.prototype.getOption = Slick.prototype.slickGetOption = function(option) {

        var _ = this;

        return _.options[option];

    };

    Slick.prototype.getNavigableIndexes = function() {

        var _ = this,
            breakPoint = 0,
            counter = 0,
            indexes = [],
            max;

        if (_.options.infinite === false) {
            max = _.slideCount;
        } else {
            breakPoint = _.options.slidesToScroll * -1;
            counter = _.options.slidesToScroll * -1;
            max = _.slideCount * 2;
        }

        while (breakPoint < max) {
            indexes.push(breakPoint);
            breakPoint = counter + _.options.slidesToScroll;
            counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
        }

        return indexes;

    };

    Slick.prototype.getSlick = function() {

        return this;

    };

    Slick.prototype.getSlideCount = function() {

        var _ = this,
            slidesTraversed, swipedSlide, centerOffset;

        centerOffset = _.options.centerMode === true ? _.slideWidth * Math.floor(_.options.slidesToShow / 2) : 0;

        if (_.options.swipeToSlide === true) {
            _.$slideTrack.find('.slick-slide').each(function(index, slide) {
                if (slide.offsetLeft - centerOffset + ($(slide).outerWidth() / 2) > (_.swipeLeft * -1)) {
                    swipedSlide = slide;
                    return false;
                }
            });

            slidesTraversed = Math.abs($(swipedSlide).attr('data-slick-index') - _.currentSlide) || 1;

            return slidesTraversed;

        } else {
            return _.options.slidesToScroll;
        }

    };

    Slick.prototype.goTo = Slick.prototype.slickGoTo = function(slide, dontAnimate) {

        var _ = this;

        _.changeSlide({
            data: {
                message: 'index',
                index: parseInt(slide)
            }
        }, dontAnimate);

    };

    Slick.prototype.init = function(creation) {

        var _ = this;

        if (!$(_.$slider).hasClass('slick-initialized')) {

            $(_.$slider).addClass('slick-initialized');

            _.buildRows();
            _.buildOut();
            _.setProps();
            _.startLoad();
            _.loadSlider();
            _.initializeEvents();
            _.updateArrows();
            _.updateDots();
            _.checkResponsive(true);
            _.focusHandler();

        }

        if (creation) {
            _.$slider.trigger('init', [_]);
        }

        if (_.options.accessibility === true) {
            _.initADA();
        }

        if ( _.options.autoplay ) {

            _.paused = false;
            _.autoPlay();

        }

    };

    Slick.prototype.initADA = function() {
        var _ = this;
        _.$slides.add(_.$slideTrack.find('.slick-cloned')).attr({
            'aria-hidden': 'true',
            'tabindex': '-1'
        }).find('a, input, button, select').attr({
            'tabindex': '-1'
        });

        _.$slideTrack.attr('role', 'listbox');

        _.$slides.not(_.$slideTrack.find('.slick-cloned')).each(function(i) {
            $(this).attr({
                'role': 'option',
                'aria-describedby': 'slick-slide' + _.instanceUid + i + ''
            });
        });

        if (_.$dots !== null) {
            _.$dots.attr('role', 'tablist').find('li').each(function(i) {
                $(this).attr({
                    'role': 'presentation',
                    'aria-selected': 'false',
                    'aria-controls': 'navigation' + _.instanceUid + i + '',
                    'id': 'slick-slide' + _.instanceUid + i + ''
                });
            })
                .first().attr('aria-selected', 'true').end()
                .find('button').attr('role', 'button').end()
                .closest('div').attr('role', 'toolbar');
        }
        _.activateADA();

    };

    Slick.prototype.initArrowEvents = function() {

        var _ = this;

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
            _.$prevArrow
               .off('click.slick')
               .on('click.slick', {
                    message: 'previous'
               }, _.changeSlide);
            _.$nextArrow
               .off('click.slick')
               .on('click.slick', {
                    message: 'next'
               }, _.changeSlide);
        }

    };

    Slick.prototype.initDotEvents = function() {

        var _ = this;

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {
            $('li', _.$dots).on('click.slick', {
                message: 'index'
            }, _.changeSlide);
        }

        if ( _.options.dots === true && _.options.pauseOnDotsHover === true ) {

            $('li', _.$dots)
                .on('mouseenter.slick', $.proxy(_.interrupt, _, true))
                .on('mouseleave.slick', $.proxy(_.interrupt, _, false));

        }

    };

    Slick.prototype.initSlideEvents = function() {

        var _ = this;

        if ( _.options.pauseOnHover ) {

            _.$list.on('mouseenter.slick', $.proxy(_.interrupt, _, true));
            _.$list.on('mouseleave.slick', $.proxy(_.interrupt, _, false));

        }

    };

    Slick.prototype.initializeEvents = function() {

        var _ = this;

        _.initArrowEvents();

        _.initDotEvents();
        _.initSlideEvents();

        _.$list.on('touchstart.slick mousedown.slick', {
            action: 'start'
        }, _.swipeHandler);
        _.$list.on('touchmove.slick mousemove.slick', {
            action: 'move'
        }, _.swipeHandler);
        _.$list.on('touchend.slick mouseup.slick', {
            action: 'end'
        }, _.swipeHandler);
        _.$list.on('touchcancel.slick mouseleave.slick', {
            action: 'end'
        }, _.swipeHandler);

        _.$list.on('click.slick', _.clickHandler);

        $(document).on(_.visibilityChange, $.proxy(_.visibility, _));

        if (_.options.accessibility === true) {
            _.$list.on('keydown.slick', _.keyHandler);
        }

        if (_.options.focusOnSelect === true) {
            $(_.$slideTrack).children().on('click.slick', _.selectHandler);
        }

        $(window).on('orientationchange.slick.slick-' + _.instanceUid, $.proxy(_.orientationChange, _));

        $(window).on('resize.slick.slick-' + _.instanceUid, $.proxy(_.resize, _));

        $('[draggable!=true]', _.$slideTrack).on('dragstart', _.preventDefault);

        $(window).on('load.slick.slick-' + _.instanceUid, _.setPosition);
        $(document).on('ready.slick.slick-' + _.instanceUid, _.setPosition);

    };

    Slick.prototype.initUI = function() {

        var _ = this;

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {

            _.$prevArrow.show();
            _.$nextArrow.show();

        }

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {

            _.$dots.show();

        }

    };

    Slick.prototype.keyHandler = function(event) {

        var _ = this;
         //Dont slide if the cursor is inside the form fields and arrow keys are pressed
        if(!event.target.tagName.match('TEXTAREA|INPUT|SELECT')) {
            if (event.keyCode === 37 && _.options.accessibility === true) {
                _.changeSlide({
                    data: {
                        message: _.options.rtl === true ? 'next' :  'previous'
                    }
                });
            } else if (event.keyCode === 39 && _.options.accessibility === true) {
                _.changeSlide({
                    data: {
                        message: _.options.rtl === true ? 'previous' : 'next'
                    }
                });
            }
        }

    };

    Slick.prototype.lazyLoad = function() {

        var _ = this,
            loadRange, cloneRange, rangeStart, rangeEnd;

        function loadImages(imagesScope) {

            $('img[data-lazy]', imagesScope).each(function() {

                var image = $(this),
                    imageSource = $(this).attr('data-lazy'),
                    imageToLoad = document.createElement('img');

                imageToLoad.onload = function() {

                    image
                        .animate({ opacity: 0 }, 100, function() {
                            image
                                .attr('src', imageSource)
                                .animate({ opacity: 1 }, 200, function() {
                                    image
                                        .removeAttr('data-lazy')
                                        .removeClass('slick-loading');
                                });
                            _.$slider.trigger('lazyLoaded', [_, image, imageSource]);
                        });

                };

                imageToLoad.onerror = function() {

                    image
                        .removeAttr( 'data-lazy' )
                        .removeClass( 'slick-loading' )
                        .addClass( 'slick-lazyload-error' );

                    _.$slider.trigger('lazyLoadError', [ _, image, imageSource ]);

                };

                imageToLoad.src = imageSource;

            });

        }

        if (_.options.centerMode === true) {
            if (_.options.infinite === true) {
                rangeStart = _.currentSlide + (_.options.slidesToShow / 2 + 1);
                rangeEnd = rangeStart + _.options.slidesToShow + 2;
            } else {
                rangeStart = Math.max(0, _.currentSlide - (_.options.slidesToShow / 2 + 1));
                rangeEnd = 2 + (_.options.slidesToShow / 2 + 1) + _.currentSlide;
            }
        } else {
            rangeStart = _.options.infinite ? _.options.slidesToShow + _.currentSlide : _.currentSlide;
            rangeEnd = Math.ceil(rangeStart + _.options.slidesToShow);
            if (_.options.fade === true) {
                if (rangeStart > 0) rangeStart--;
                if (rangeEnd <= _.slideCount) rangeEnd++;
            }
        }

        loadRange = _.$slider.find('.slick-slide').slice(rangeStart, rangeEnd);
        loadImages(loadRange);

        if (_.slideCount <= _.options.slidesToShow) {
            cloneRange = _.$slider.find('.slick-slide');
            loadImages(cloneRange);
        } else
        if (_.currentSlide >= _.slideCount - _.options.slidesToShow) {
            cloneRange = _.$slider.find('.slick-cloned').slice(0, _.options.slidesToShow);
            loadImages(cloneRange);
        } else if (_.currentSlide === 0) {
            cloneRange = _.$slider.find('.slick-cloned').slice(_.options.slidesToShow * -1);
            loadImages(cloneRange);
        }

    };

    Slick.prototype.loadSlider = function() {

        var _ = this;

        _.setPosition();

        _.$slideTrack.css({
            opacity: 1
        });

        _.$slider.removeClass('slick-loading');

        _.initUI();

        if (_.options.lazyLoad === 'progressive') {
            _.progressiveLazyLoad();
        }

    };

    Slick.prototype.next = Slick.prototype.slickNext = function() {

        var _ = this;

        _.changeSlide({
            data: {
                message: 'next'
            }
        });

    };

    Slick.prototype.orientationChange = function() {

        var _ = this;

        _.checkResponsive();
        _.setPosition();

    };

    Slick.prototype.pause = Slick.prototype.slickPause = function() {

        var _ = this;

        _.autoPlayClear();
        _.paused = true;

    };

    Slick.prototype.play = Slick.prototype.slickPlay = function() {

        var _ = this;

        _.autoPlay();
        _.options.autoplay = true;
        _.paused = false;
        _.focussed = false;
        _.interrupted = false;

    };

    Slick.prototype.postSlide = function(index) {

        var _ = this;

        if( !_.unslicked ) {

            _.$slider.trigger('afterChange', [_, index]);

            _.animating = false;

            _.setPosition();

            _.swipeLeft = null;

            if ( _.options.autoplay ) {
                _.autoPlay();
            }

            if (_.options.accessibility === true) {
                _.initADA();
            }

        }

    };

    Slick.prototype.prev = Slick.prototype.slickPrev = function() {

        var _ = this;

        _.changeSlide({
            data: {
                message: 'previous'
            }
        });

    };

    Slick.prototype.preventDefault = function(event) {

        event.preventDefault();

    };

    Slick.prototype.progressiveLazyLoad = function( tryCount ) {

        tryCount = tryCount || 1;

        var _ = this,
            $imgsToLoad = $( 'img[data-lazy]', _.$slider ),
            image,
            imageSource,
            imageToLoad;

        if ( $imgsToLoad.length ) {

            image = $imgsToLoad.first();
            imageSource = image.attr('data-lazy');
            imageToLoad = document.createElement('img');

            imageToLoad.onload = function() {

                image
                    .attr( 'src', imageSource )
                    .removeAttr('data-lazy')
                    .removeClass('slick-loading');

                if ( _.options.adaptiveHeight === true ) {
                    _.setPosition();
                }

                _.$slider.trigger('lazyLoaded', [ _, image, imageSource ]);
                _.progressiveLazyLoad();

            };

            imageToLoad.onerror = function() {

                if ( tryCount < 3 ) {

                    /**
                     * try to load the image 3 times,
                     * leave a slight delay so we don't get
                     * servers blocking the request.
                     */
                    setTimeout( function() {
                        _.progressiveLazyLoad( tryCount + 1 );
                    }, 500 );

                } else {

                    image
                        .removeAttr( 'data-lazy' )
                        .removeClass( 'slick-loading' )
                        .addClass( 'slick-lazyload-error' );

                    _.$slider.trigger('lazyLoadError', [ _, image, imageSource ]);

                    _.progressiveLazyLoad();

                }

            };

            imageToLoad.src = imageSource;

        } else {

            _.$slider.trigger('allImagesLoaded', [ _ ]);

        }

    };

    Slick.prototype.refresh = function( initializing ) {

        var _ = this, currentSlide, lastVisibleIndex;

        lastVisibleIndex = _.slideCount - _.options.slidesToShow;

        // in non-infinite sliders, we don't want to go past the
        // last visible index.
        if( !_.options.infinite && ( _.currentSlide > lastVisibleIndex )) {
            _.currentSlide = lastVisibleIndex;
        }

        // if less slides than to show, go to start.
        if ( _.slideCount <= _.options.slidesToShow ) {
            _.currentSlide = 0;

        }

        currentSlide = _.currentSlide;

        _.destroy(true);

        $.extend(_, _.initials, { currentSlide: currentSlide });

        _.init();

        if( !initializing ) {

            _.changeSlide({
                data: {
                    message: 'index',
                    index: currentSlide
                }
            }, false);

        }

    };

    Slick.prototype.registerBreakpoints = function() {

        var _ = this, breakpoint, currentBreakpoint, l,
            responsiveSettings = _.options.responsive || null;

        if ( $.type(responsiveSettings) === 'array' && responsiveSettings.length ) {

            _.respondTo = _.options.respondTo || 'window';

            for ( breakpoint in responsiveSettings ) {

                l = _.breakpoints.length-1;
                currentBreakpoint = responsiveSettings[breakpoint].breakpoint;

                if (responsiveSettings.hasOwnProperty(breakpoint)) {

                    // loop through the breakpoints and cut out any existing
                    // ones with the same breakpoint number, we don't want dupes.
                    while( l >= 0 ) {
                        if( _.breakpoints[l] && _.breakpoints[l] === currentBreakpoint ) {
                            _.breakpoints.splice(l,1);
                        }
                        l--;
                    }

                    _.breakpoints.push(currentBreakpoint);
                    _.breakpointSettings[currentBreakpoint] = responsiveSettings[breakpoint].settings;

                }

            }

            _.breakpoints.sort(function(a, b) {
                return ( _.options.mobileFirst ) ? a-b : b-a;
            });

        }

    };

    Slick.prototype.reinit = function() {

        var _ = this;

        _.$slides =
            _.$slideTrack
                .children(_.options.slide)
                .addClass('slick-slide');

        _.slideCount = _.$slides.length;

        if (_.currentSlide >= _.slideCount && _.currentSlide !== 0) {
            _.currentSlide = _.currentSlide - _.options.slidesToScroll;
        }

        if (_.slideCount <= _.options.slidesToShow) {
            _.currentSlide = 0;
        }

        _.registerBreakpoints();

        _.setProps();
        _.setupInfinite();
        _.buildArrows();
        _.updateArrows();
        _.initArrowEvents();
        _.buildDots();
        _.updateDots();
        _.initDotEvents();
        _.cleanUpSlideEvents();
        _.initSlideEvents();

        _.checkResponsive(false, true);

        if (_.options.focusOnSelect === true) {
            $(_.$slideTrack).children().on('click.slick', _.selectHandler);
        }

        _.setSlideClasses(typeof _.currentSlide === 'number' ? _.currentSlide : 0);

        _.setPosition();
        _.focusHandler();

        _.paused = !_.options.autoplay;
        _.autoPlay();

        _.$slider.trigger('reInit', [_]);

    };

    Slick.prototype.resize = function() {

        var _ = this;

        if ($(window).width() !== _.windowWidth) {
            clearTimeout(_.windowDelay);
            _.windowDelay = window.setTimeout(function() {
                _.windowWidth = $(window).width();
                _.checkResponsive();
                if( !_.unslicked ) { _.setPosition(); }
            }, 50);
        }
    };

    Slick.prototype.removeSlide = Slick.prototype.slickRemove = function(index, removeBefore, removeAll) {

        var _ = this;

        if (typeof(index) === 'boolean') {
            removeBefore = index;
            index = removeBefore === true ? 0 : _.slideCount - 1;
        } else {
            index = removeBefore === true ? --index : index;
        }

        if (_.slideCount < 1 || index < 0 || index > _.slideCount - 1) {
            return false;
        }

        _.unload();

        if (removeAll === true) {
            _.$slideTrack.children().remove();
        } else {
            _.$slideTrack.children(this.options.slide).eq(index).remove();
        }

        _.$slides = _.$slideTrack.children(this.options.slide);

        _.$slideTrack.children(this.options.slide).detach();

        _.$slideTrack.append(_.$slides);

        _.$slidesCache = _.$slides;

        _.reinit();

    };

    Slick.prototype.setCSS = function(position) {

        var _ = this,
            positionProps = {},
            x, y;

        if (_.options.rtl === true) {
            position = -position;
        }
        x = _.positionProp == 'left' ? Math.ceil(position) + 'px' : '0px';
        y = _.positionProp == 'top' ? Math.ceil(position) + 'px' : '0px';

        positionProps[_.positionProp] = position;

        if (_.transformsEnabled === false) {
            _.$slideTrack.css(positionProps);
        } else {
            positionProps = {};
            if (_.cssTransitions === false) {
                positionProps[_.animType] = 'translate(' + x + ', ' + y + ')';
                _.$slideTrack.css(positionProps);
            } else {
                positionProps[_.animType] = 'translate3d(' + x + ', ' + y + ', 0px)';
                _.$slideTrack.css(positionProps);
            }
        }

    };

    Slick.prototype.setDimensions = function() {

        var _ = this;

        if (_.options.vertical === false) {
            if (_.options.centerMode === true) {
                _.$list.css({
                    padding: ('0px ' + _.options.centerPadding)
                });
            }
        } else {
            _.$list.height(_.$slides.first().outerHeight(true) * _.options.slidesToShow);
            if (_.options.centerMode === true) {
                _.$list.css({
                    padding: (_.options.centerPadding + ' 0px')
                });
            }
        }

        _.listWidth = _.$list.width();
        _.listHeight = _.$list.height();


        if (_.options.vertical === false && _.options.variableWidth === false) {
            _.slideWidth = Math.ceil(_.listWidth / _.options.slidesToShow);
            _.$slideTrack.width(Math.ceil((_.slideWidth * _.$slideTrack.children('.slick-slide').length)));

        } else if (_.options.variableWidth === true) {
            _.$slideTrack.width(5000 * _.slideCount);
        } else {
            _.slideWidth = Math.ceil(_.listWidth);
            _.$slideTrack.height(Math.ceil((_.$slides.first().outerHeight(true) * _.$slideTrack.children('.slick-slide').length)));
        }

        var offset = _.$slides.first().outerWidth(true) - _.$slides.first().width();
        if (_.options.variableWidth === false) _.$slideTrack.children('.slick-slide').width(_.slideWidth - offset);

    };

    Slick.prototype.setFade = function() {

        var _ = this,
            targetLeft;

        _.$slides.each(function(index, element) {
            targetLeft = (_.slideWidth * index) * -1;
            if (_.options.rtl === true) {
                $(element).css({
                    position: 'relative',
                    right: targetLeft,
                    top: 0,
                    zIndex: _.options.zIndex - 2,
                    opacity: 0
                });
            } else {
                $(element).css({
                    position: 'relative',
                    left: targetLeft,
                    top: 0,
                    zIndex: _.options.zIndex - 2,
                    opacity: 0
                });
            }
        });

        _.$slides.eq(_.currentSlide).css({
            zIndex: _.options.zIndex - 1,
            opacity: 1
        });

    };

    Slick.prototype.setHeight = function() {

        var _ = this;

        if (_.options.slidesToShow === 1 && _.options.adaptiveHeight === true && _.options.vertical === false) {
            var targetHeight = _.$slides.eq(_.currentSlide).outerHeight(true);
            _.$list.css('height', targetHeight);
        }

    };

    Slick.prototype.setOption =
    Slick.prototype.slickSetOption = function() {

        /**
         * accepts arguments in format of:
         *
         *  - for changing a single option's value:
         *     .slick("setOption", option, value, refresh )
         *
         *  - for changing a set of responsive options:
         *     .slick("setOption", 'responsive', [{}, ...], refresh )
         *
         *  - for updating multiple values at once (not responsive)
         *     .slick("setOption", { 'option': value, ... }, refresh )
         */

        var _ = this, l, item, option, value, refresh = false, type;

        if( $.type( arguments[0] ) === 'object' ) {

            option =  arguments[0];
            refresh = arguments[1];
            type = 'multiple';

        } else if ( $.type( arguments[0] ) === 'string' ) {

            option =  arguments[0];
            value = arguments[1];
            refresh = arguments[2];

            if ( arguments[0] === 'responsive' && $.type( arguments[1] ) === 'array' ) {

                type = 'responsive';

            } else if ( typeof arguments[1] !== 'undefined' ) {

                type = 'single';

            }

        }

        if ( type === 'single' ) {

            _.options[option] = value;


        } else if ( type === 'multiple' ) {

            $.each( option , function( opt, val ) {

                _.options[opt] = val;

            });


        } else if ( type === 'responsive' ) {

            for ( item in value ) {

                if( $.type( _.options.responsive ) !== 'array' ) {

                    _.options.responsive = [ value[item] ];

                } else {

                    l = _.options.responsive.length-1;

                    // loop through the responsive object and splice out duplicates.
                    while( l >= 0 ) {

                        if( _.options.responsive[l].breakpoint === value[item].breakpoint ) {

                            _.options.responsive.splice(l,1);

                        }

                        l--;

                    }

                    _.options.responsive.push( value[item] );

                }

            }

        }

        if ( refresh ) {

            _.unload();
            _.reinit();

        }

    };

    Slick.prototype.setPosition = function() {

        var _ = this;

        _.setDimensions();

        _.setHeight();

        if (_.options.fade === false) {
            _.setCSS(_.getLeft(_.currentSlide));
        } else {
            _.setFade();
        }

        _.$slider.trigger('setPosition', [_]);

    };

    Slick.prototype.setProps = function() {

        var _ = this,
            bodyStyle = document.body.style;

        _.positionProp = _.options.vertical === true ? 'top' : 'left';

        if (_.positionProp === 'top') {
            _.$slider.addClass('slick-vertical');
        } else {
            _.$slider.removeClass('slick-vertical');
        }

        if (bodyStyle.WebkitTransition !== undefined ||
            bodyStyle.MozTransition !== undefined ||
            bodyStyle.msTransition !== undefined) {
            if (_.options.useCSS === true) {
                _.cssTransitions = true;
            }
        }

        if ( _.options.fade ) {
            if ( typeof _.options.zIndex === 'number' ) {
                if( _.options.zIndex < 3 ) {
                    _.options.zIndex = 3;
                }
            } else {
                _.options.zIndex = _.defaults.zIndex;
            }
        }

        if (bodyStyle.OTransform !== undefined) {
            _.animType = 'OTransform';
            _.transformType = '-o-transform';
            _.transitionType = 'OTransition';
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.webkitPerspective === undefined) _.animType = false;
        }
        if (bodyStyle.MozTransform !== undefined) {
            _.animType = 'MozTransform';
            _.transformType = '-moz-transform';
            _.transitionType = 'MozTransition';
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.MozPerspective === undefined) _.animType = false;
        }
        if (bodyStyle.webkitTransform !== undefined) {
            _.animType = 'webkitTransform';
            _.transformType = '-webkit-transform';
            _.transitionType = 'webkitTransition';
            if (bodyStyle.perspectiveProperty === undefined && bodyStyle.webkitPerspective === undefined) _.animType = false;
        }
        if (bodyStyle.msTransform !== undefined) {
            _.animType = 'msTransform';
            _.transformType = '-ms-transform';
            _.transitionType = 'msTransition';
            if (bodyStyle.msTransform === undefined) _.animType = false;
        }
        if (bodyStyle.transform !== undefined && _.animType !== false) {
            _.animType = 'transform';
            _.transformType = 'transform';
            _.transitionType = 'transition';
        }
        _.transformsEnabled = _.options.useTransform && (_.animType !== null && _.animType !== false);
    };


    Slick.prototype.setSlideClasses = function(index) {

        var _ = this,
            centerOffset, allSlides, indexOffset, remainder;

        allSlides = _.$slider
            .find('.slick-slide')
            .removeClass('slick-active slick-center slick-current')
            .attr('aria-hidden', 'true');

        _.$slides
            .eq(index)
            .addClass('slick-current');

        if (_.options.centerMode === true) {

            centerOffset = Math.floor(_.options.slidesToShow / 2);

            if (_.options.infinite === true) {

                if (index >= centerOffset && index <= (_.slideCount - 1) - centerOffset) {

                    _.$slides
                        .slice(index - centerOffset, index + centerOffset + 1)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false');

                } else {

                    indexOffset = _.options.slidesToShow + index;
                    allSlides
                        .slice(indexOffset - centerOffset + 1, indexOffset + centerOffset + 2)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false');

                }

                if (index === 0) {

                    allSlides
                        .eq(allSlides.length - 1 - _.options.slidesToShow)
                        .addClass('slick-center');

                } else if (index === _.slideCount - 1) {

                    allSlides
                        .eq(_.options.slidesToShow)
                        .addClass('slick-center');

                }

            }

            _.$slides
                .eq(index)
                .addClass('slick-center');

        } else {

            if (index >= 0 && index <= (_.slideCount - _.options.slidesToShow)) {

                _.$slides
                    .slice(index, index + _.options.slidesToShow)
                    .addClass('slick-active')
                    .attr('aria-hidden', 'false');

            } else if (allSlides.length <= _.options.slidesToShow) {

                allSlides
                    .addClass('slick-active')
                    .attr('aria-hidden', 'false');

            } else {

                remainder = _.slideCount % _.options.slidesToShow;
                indexOffset = _.options.infinite === true ? _.options.slidesToShow + index : index;

                if (_.options.slidesToShow == _.options.slidesToScroll && (_.slideCount - index) < _.options.slidesToShow) {

                    allSlides
                        .slice(indexOffset - (_.options.slidesToShow - remainder), indexOffset + remainder)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false');

                } else {

                    allSlides
                        .slice(indexOffset, indexOffset + _.options.slidesToShow)
                        .addClass('slick-active')
                        .attr('aria-hidden', 'false');

                }

            }

        }

        if (_.options.lazyLoad === 'ondemand') {
            _.lazyLoad();
        }

    };

    Slick.prototype.setupInfinite = function() {

        var _ = this,
            i, slideIndex, infiniteCount;

        if (_.options.fade === true) {
            _.options.centerMode = false;
        }

        if (_.options.infinite === true && _.options.fade === false) {

            slideIndex = null;

            if (_.slideCount > _.options.slidesToShow) {

                if (_.options.centerMode === true) {
                    infiniteCount = _.options.slidesToShow + 1;
                } else {
                    infiniteCount = _.options.slidesToShow;
                }

                for (i = _.slideCount; i > (_.slideCount -
                        infiniteCount); i -= 1) {
                    slideIndex = i - 1;
                    $(_.$slides[slideIndex]).clone(true).attr('id', '')
                        .attr('data-slick-index', slideIndex - _.slideCount)
                        .prependTo(_.$slideTrack).addClass('slick-cloned');
                }
                for (i = 0; i < infiniteCount; i += 1) {
                    slideIndex = i;
                    $(_.$slides[slideIndex]).clone(true).attr('id', '')
                        .attr('data-slick-index', slideIndex + _.slideCount)
                        .appendTo(_.$slideTrack).addClass('slick-cloned');
                }
                _.$slideTrack.find('.slick-cloned').find('[id]').each(function() {
                    $(this).attr('id', '');
                });

            }

        }

    };

    Slick.prototype.interrupt = function( toggle ) {

        var _ = this;

        if( !toggle ) {
            _.autoPlay();
        }
        _.interrupted = toggle;

    };

    Slick.prototype.selectHandler = function(event) {

        var _ = this;

        var targetElement =
            $(event.target).is('.slick-slide') ?
                $(event.target) :
                $(event.target).parents('.slick-slide');

        var index = parseInt(targetElement.attr('data-slick-index'));

        if (!index) index = 0;

        if (_.slideCount <= _.options.slidesToShow) {

            _.setSlideClasses(index);
            _.asNavFor(index);
            return;

        }

        _.slideHandler(index);

    };

    Slick.prototype.slideHandler = function(index, sync, dontAnimate) {

        var targetSlide, animSlide, oldSlide, slideLeft, targetLeft = null,
            _ = this, navTarget;

        sync = sync || false;

        if (_.animating === true && _.options.waitForAnimate === true) {
            return;
        }

        if (_.options.fade === true && _.currentSlide === index) {
            return;
        }

        if (_.slideCount <= _.options.slidesToShow) {
            return;
        }

        if (sync === false) {
            _.asNavFor(index);
        }

        targetSlide = index;
        targetLeft = _.getLeft(targetSlide);
        slideLeft = _.getLeft(_.currentSlide);

        _.currentLeft = _.swipeLeft === null ? slideLeft : _.swipeLeft;

        if (_.options.infinite === false && _.options.centerMode === false && (index < 0 || index > _.getDotCount() * _.options.slidesToScroll)) {
            if (_.options.fade === false) {
                targetSlide = _.currentSlide;
                if (dontAnimate !== true) {
                    _.animateSlide(slideLeft, function() {
                        _.postSlide(targetSlide);
                    });
                } else {
                    _.postSlide(targetSlide);
                }
            }
            return;
        } else if (_.options.infinite === false && _.options.centerMode === true && (index < 0 || index > (_.slideCount - _.options.slidesToScroll))) {
            if (_.options.fade === false) {
                targetSlide = _.currentSlide;
                if (dontAnimate !== true) {
                    _.animateSlide(slideLeft, function() {
                        _.postSlide(targetSlide);
                    });
                } else {
                    _.postSlide(targetSlide);
                }
            }
            return;
        }

        if ( _.options.autoplay ) {
            clearInterval(_.autoPlayTimer);
        }

        if (targetSlide < 0) {
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                animSlide = _.slideCount - (_.slideCount % _.options.slidesToScroll);
            } else {
                animSlide = _.slideCount + targetSlide;
            }
        } else if (targetSlide >= _.slideCount) {
            if (_.slideCount % _.options.slidesToScroll !== 0) {
                animSlide = 0;
            } else {
                animSlide = targetSlide - _.slideCount;
            }
        } else {
            animSlide = targetSlide;
        }

        _.animating = true;

        _.$slider.trigger('beforeChange', [_, _.currentSlide, animSlide]);

        oldSlide = _.currentSlide;
        _.currentSlide = animSlide;

        _.setSlideClasses(_.currentSlide);

        if ( _.options.asNavFor ) {

            navTarget = _.getNavTarget();
            navTarget = navTarget.slick('getSlick');

            if ( navTarget.slideCount <= navTarget.options.slidesToShow ) {
                navTarget.setSlideClasses(_.currentSlide);
            }

        }

        _.updateDots();
        _.updateArrows();

        if (_.options.fade === true) {
            if (dontAnimate !== true) {

                _.fadeSlideOut(oldSlide);

                _.fadeSlide(animSlide, function() {
                    _.postSlide(animSlide);
                });

            } else {
                _.postSlide(animSlide);
            }
            _.animateHeight();
            return;
        }

        if (dontAnimate !== true) {
            _.animateSlide(targetLeft, function() {
                _.postSlide(animSlide);
            });
        } else {
            _.postSlide(animSlide);
        }

    };

    Slick.prototype.startLoad = function() {

        var _ = this;

        if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {

            _.$prevArrow.hide();
            _.$nextArrow.hide();

        }

        if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {

            _.$dots.hide();

        }

        _.$slider.addClass('slick-loading');

    };

    Slick.prototype.swipeDirection = function() {

        var xDist, yDist, r, swipeAngle, _ = this;

        xDist = _.touchObject.startX - _.touchObject.curX;
        yDist = _.touchObject.startY - _.touchObject.curY;
        r = Math.atan2(yDist, xDist);

        swipeAngle = Math.round(r * 180 / Math.PI);
        if (swipeAngle < 0) {
            swipeAngle = 360 - Math.abs(swipeAngle);
        }

        if ((swipeAngle <= 45) && (swipeAngle >= 0)) {
            return (_.options.rtl === false ? 'left' : 'right');
        }
        if ((swipeAngle <= 360) && (swipeAngle >= 315)) {
            return (_.options.rtl === false ? 'left' : 'right');
        }
        if ((swipeAngle >= 135) && (swipeAngle <= 225)) {
            return (_.options.rtl === false ? 'right' : 'left');
        }
        if (_.options.verticalSwiping === true) {
            if ((swipeAngle >= 35) && (swipeAngle <= 135)) {
                return 'down';
            } else {
                return 'up';
            }
        }

        return 'vertical';

    };

    Slick.prototype.swipeEnd = function(event) {

        var _ = this,
            slideCount,
            direction;

        _.dragging = false;
        _.interrupted = false;
        _.shouldClick = ( _.touchObject.swipeLength > 10 ) ? false : true;

        if ( _.touchObject.curX === undefined ) {
            return false;
        }

        if ( _.touchObject.edgeHit === true ) {
            _.$slider.trigger('edge', [_, _.swipeDirection() ]);
        }

        if ( _.touchObject.swipeLength >= _.touchObject.minSwipe ) {

            direction = _.swipeDirection();

            switch ( direction ) {

                case 'left':
                case 'down':

                    slideCount =
                        _.options.swipeToSlide ?
                            _.checkNavigable( _.currentSlide + _.getSlideCount() ) :
                            _.currentSlide + _.getSlideCount();

                    _.currentDirection = 0;

                    break;

                case 'right':
                case 'up':

                    slideCount =
                        _.options.swipeToSlide ?
                            _.checkNavigable( _.currentSlide - _.getSlideCount() ) :
                            _.currentSlide - _.getSlideCount();

                    _.currentDirection = 1;

                    break;

                default:


            }

            if( direction != 'vertical' ) {

                _.slideHandler( slideCount );
                _.touchObject = {};
                _.$slider.trigger('swipe', [_, direction ]);

            }

        } else {

            if ( _.touchObject.startX !== _.touchObject.curX ) {

                _.slideHandler( _.currentSlide );
                _.touchObject = {};

            }

        }

    };

    Slick.prototype.swipeHandler = function(event) {

        var _ = this;

        if ((_.options.swipe === false) || ('ontouchend' in document && _.options.swipe === false)) {
            return;
        } else if (_.options.draggable === false && event.type.indexOf('mouse') !== -1) {
            return;
        }

        _.touchObject.fingerCount = event.originalEvent && event.originalEvent.touches !== undefined ?
            event.originalEvent.touches.length : 1;

        _.touchObject.minSwipe = _.listWidth / _.options
            .touchThreshold;

        if (_.options.verticalSwiping === true) {
            _.touchObject.minSwipe = _.listHeight / _.options
                .touchThreshold;
        }

        switch (event.data.action) {

            case 'start':
                _.swipeStart(event);
                break;

            case 'move':
                _.swipeMove(event);
                break;

            case 'end':
                _.swipeEnd(event);
                break;

        }

    };

    Slick.prototype.swipeMove = function(event) {

        var _ = this,
            edgeWasHit = false,
            curLeft, swipeDirection, swipeLength, positionOffset, touches;

        touches = event.originalEvent !== undefined ? event.originalEvent.touches : null;

        if (!_.dragging || touches && touches.length !== 1) {
            return false;
        }

        curLeft = _.getLeft(_.currentSlide);

        _.touchObject.curX = touches !== undefined ? touches[0].pageX : event.clientX;
        _.touchObject.curY = touches !== undefined ? touches[0].pageY : event.clientY;

        _.touchObject.swipeLength = Math.round(Math.sqrt(
            Math.pow(_.touchObject.curX - _.touchObject.startX, 2)));

        if (_.options.verticalSwiping === true) {
            _.touchObject.swipeLength = Math.round(Math.sqrt(
                Math.pow(_.touchObject.curY - _.touchObject.startY, 2)));
        }

        swipeDirection = _.swipeDirection();

        if (swipeDirection === 'vertical') {
            return;
        }

        if (event.originalEvent !== undefined && _.touchObject.swipeLength > 4) {
            event.preventDefault();
        }

        positionOffset = (_.options.rtl === false ? 1 : -1) * (_.touchObject.curX > _.touchObject.startX ? 1 : -1);
        if (_.options.verticalSwiping === true) {
            positionOffset = _.touchObject.curY > _.touchObject.startY ? 1 : -1;
        }


        swipeLength = _.touchObject.swipeLength;

        _.touchObject.edgeHit = false;

        if (_.options.infinite === false) {
            if ((_.currentSlide === 0 && swipeDirection === 'right') || (_.currentSlide >= _.getDotCount() && swipeDirection === 'left')) {
                swipeLength = _.touchObject.swipeLength * _.options.edgeFriction;
                _.touchObject.edgeHit = true;
            }
        }

        if (_.options.vertical === false) {
            _.swipeLeft = curLeft + swipeLength * positionOffset;
        } else {
            _.swipeLeft = curLeft + (swipeLength * (_.$list.height() / _.listWidth)) * positionOffset;
        }
        if (_.options.verticalSwiping === true) {
            _.swipeLeft = curLeft + swipeLength * positionOffset;
        }

        if (_.options.fade === true || _.options.touchMove === false) {
            return false;
        }

        if (_.animating === true) {
            _.swipeLeft = null;
            return false;
        }

        _.setCSS(_.swipeLeft);

    };

    Slick.prototype.swipeStart = function(event) {

        var _ = this,
            touches;

        _.interrupted = true;

        if (_.touchObject.fingerCount !== 1 || _.slideCount <= _.options.slidesToShow) {
            _.touchObject = {};
            return false;
        }

        if (event.originalEvent !== undefined && event.originalEvent.touches !== undefined) {
            touches = event.originalEvent.touches[0];
        }

        _.touchObject.startX = _.touchObject.curX = touches !== undefined ? touches.pageX : event.clientX;
        _.touchObject.startY = _.touchObject.curY = touches !== undefined ? touches.pageY : event.clientY;

        _.dragging = true;

    };

    Slick.prototype.unfilterSlides = Slick.prototype.slickUnfilter = function() {

        var _ = this;

        if (_.$slidesCache !== null) {

            _.unload();

            _.$slideTrack.children(this.options.slide).detach();

            _.$slidesCache.appendTo(_.$slideTrack);

            _.reinit();

        }

    };

    Slick.prototype.unload = function() {

        var _ = this;

        $('.slick-cloned', _.$slider).remove();

        if (_.$dots) {
            _.$dots.remove();
        }

        if (_.$prevArrow && _.htmlExpr.test(_.options.prevArrow)) {
            _.$prevArrow.remove();
        }

        if (_.$nextArrow && _.htmlExpr.test(_.options.nextArrow)) {
            _.$nextArrow.remove();
        }

        _.$slides
            .removeClass('slick-slide slick-active slick-visible slick-current')
            .attr('aria-hidden', 'true')
            .css('width', '');

    };

    Slick.prototype.unslick = function(fromBreakpoint) {

        var _ = this;
        _.$slider.trigger('unslick', [_, fromBreakpoint]);
        _.destroy();

    };

    Slick.prototype.updateArrows = function() {

        var _ = this,
            centerOffset;

        centerOffset = Math.floor(_.options.slidesToShow / 2);

        if ( _.options.arrows === true &&
            _.slideCount > _.options.slidesToShow &&
            !_.options.infinite ) {

            _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');
            _.$nextArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            if (_.currentSlide === 0) {

                _.$prevArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                _.$nextArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            } else if (_.currentSlide >= _.slideCount - _.options.slidesToShow && _.options.centerMode === false) {

                _.$nextArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            } else if (_.currentSlide >= _.slideCount - 1 && _.options.centerMode === true) {

                _.$nextArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
                _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

            }

        }

    };

    Slick.prototype.updateDots = function() {

        var _ = this;

        if (_.$dots !== null) {

            _.$dots
                .find('li')
                .removeClass('slick-active')
                .attr('aria-hidden', 'true');

            _.$dots
                .find('li')
                .eq(Math.floor(_.currentSlide / _.options.slidesToScroll))
                .addClass('slick-active')
                .attr('aria-hidden', 'false');

        }

    };

    Slick.prototype.visibility = function() {

        var _ = this;

        if ( _.options.autoplay ) {

            if ( document[_.hidden] ) {

                _.interrupted = true;

            } else {

                _.interrupted = false;

            }

        }

    };

    $.fn.slick = function() {
        var _ = this,
            opt = arguments[0],
            args = Array.prototype.slice.call(arguments, 1),
            l = _.length,
            i,
            ret;
        for (i = 0; i < l; i++) {
            if (typeof opt == 'object' || typeof opt == 'undefined')
                _[i].slick = new Slick(_[i], opt);
            else
                ret = _[i].slick[opt].apply(_[i].slick, args);
            if (typeof ret != 'undefined') return ret;
        }
        return _;
    };

}));


/*! Social Likes v3.1.1 by Artem Sapegin - http://sapegin.github.com/social-likes - Licensed MIT */
! function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : a(jQuery)
}(function(a, b) {
    "use strict";

    function c(a, b) {
        this.container = a, this.options = b, this.init()
    }

    function d(b, c) {
        this.widget = b, this.options = a.extend({}, c), this.detectService(), this.service && this.init()
    }

    function e(a) {
        function b(a, b) {
            return b.toUpper()
        }
        var c = {},
            d = a.data();
        for (var e in d) {
            var f = d[e];
            "yes" === f ? f = !0 : "no" === f && (f = !1), c[e.replace(/-(\w)/g, b)] = f
        }
        return c
    }

    function f(a, b) {
        return g(a, b, encodeURIComponent)
    }

    function g(a, b, c) {
        return a.replace(/\{([^\}]+)\}/g, function(a, d) {
            return d in b ? c ? c(b[d]) : b[d] : a
        })
    }

    function h(a, b) {
        var c = l + a;
        return c + " " + c + "_" + b
    }

    function i(b, c) {
        function d(g) {
            "keydown" === g.type && 27 !== g.which || a(g.target).closest(b).length || (b.removeClass(m), e.off(f, d), a.isFunction(c) && c())
        }
        var e = a(document),
            f = "click touchstart keydown";
        e.on(f, d)
    }

    function j(a) {
        var b = 10;
        if (document.documentElement.getBoundingClientRect) {
            var c = parseInt(a.css("left"), 10),
                d = parseInt(a.css("top"), 10),
                e = a[0].getBoundingClientRect();
            e.left < b ? a.css("left", b - e.left + c) : e.right > window.innerWidth - b && a.css("left", window.innerWidth - e.right - b + c), e.top < b ? a.css("top", b - e.top + d) : e.bottom > window.innerHeight - b && a.css("top", window.innerHeight - e.bottom - b + d)
        }
        a.addClass(m)
    }
    var k = "social-likes",
        l = k + "__",
        m = k + "_opened",
        n = "https:" === location.protocol ? "https:" : "http:",
        o = {
            facebook: {
                counterUrl: "https://graph.facebook.com/?id={url}",
                convertNumber: function(a) {
                    return a.share.share_count
                },
                popupUrl: "https://www.facebook.com/sharer/sharer.php?u={url}",
                popupWidth: 600,
                popupHeight: 359
            },
            twitter: {
                counters: !1,
                popupUrl: "https://twitter.com/intent/tweet?url={url}&text={title}",
                popupWidth: 600,
                popupHeight: 250,
                click: function() {
                    return /[\.\?:\-–—]\s*$/.test(this.options.title) || (this.options.title += ":"), !0
                }
            },
            mailru: {
                counterUrl: n + "//connect.mail.ru/share_count?url_list={url}&callback=1&func=?",
                convertNumber: function(a) {
                    for (var b in a)
                        if (a.hasOwnProperty(b)) return a[b].shares
                },
                popupUrl: "https://connect.mail.ru/share?share_url={url}&title={title}",
                popupWidth: 492,
                popupHeight: 500
            },
            vkontakte: {
                counterUrl: "https://vk.com/share.php?act=count&url={url}&index={index}",
                counter: function(b, c) {
                    var d = o.vkontakte;
                    d._ || (d._ = [], window.VK || (window.VK = {}), window.VK.Share = {
                        count: function(a, b) {
                            d._[a].resolve(b)
                        }
                    });
                    var e = d._.length;
                    d._.push(c), a.getScript(f(b, {
                        index: e
                    })).fail(c.reject)
                },
                popupUrl: "https://vk.com/share.php?url={url}&title={title}",
                popupWidth: 655,
                popupHeight: 450
            },
            odnoklassniki: {
                counterUrl: n + "//connect.ok.ru/dk?st.cmd=extLike&ref={url}&uid={index}",
                counter: function(b, c) {
                    var d = o.odnoklassniki;
                    d._ || (d._ = [], window.ODKL || (window.ODKL = {}), window.ODKL.updateCount = function(a, b) {
                        d._[a].resolve(b)
                    });
                    var e = d._.length;
                    d._.push(c), a.getScript(f(b, {
                        index: e
                    })).fail(c.reject)
                },
                popupUrl: "https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&service=odnoklassniki&st.shareUrl={url}",
                popupWidth: 580,
                popupHeight: 336
            },
            plusone: {
                counterUrl: n + "//share.yandex.ru/gpp.xml?url={url}&callback=?",
                convertNumber: function(a) {
                    return parseInt(a.replace(/\D/g, ""), 10)
                },
                popupUrl: "https://plus.google.com/share?url={url}",
                popupWidth: 500,
                popupHeight: 550
            },
            pinterest: {
                counterUrl: n + "//api.pinterest.com/v1/urls/count.json?url={url}&callback=?",
                convertNumber: function(a) {
                    return a.count
                },
                popupUrl: "https://pinterest.com/pin/create/button/?url={url}&description={title}",
                popupWidth: 740,
                popupHeight: 550
            }
        },
        p = {
            promises: {},
            fetch: function(b, c, d) {
                p.promises[b] || (p.promises[b] = {});
                var e = p.promises[b];
                if (!d.forceUpdate && e[c]) return e[c];
                var g = a.extend({}, o[b], d),
                    h = a.Deferred(),
                    i = g.counterUrl && f(g.counterUrl, {
                        url: c
                    });
                return i && a.isFunction(g.counter) ? g.counter(i, h) : g.counterUrl ? a.getJSON(i).done(function(b) {
                    try {
                        var c = b;
                        a.isFunction(g.convertNumber) && (c = g.convertNumber(b)), h.resolve(c)
                    } catch (a) {
                        h.reject()
                    }
                }).fail(h.reject) : h.reject(), e[c] = h.promise(), e[c]
            }
        };
    a.fn.socialLikes = function(b) {
        return this.each(function() {
            var d = a(this),
                f = d.data(k);
            f ? a.isPlainObject(b) && f.update(b) : (f = new c(d, a.extend({}, a.fn.socialLikes.defaults, b, e(d))), d.data(k, f))
        })
    }, a.fn.socialLikes.defaults = {
        url: window.location.href.replace(window.location.hash, ""),
        title: document.title,
        counters: !0,
        zeroes: !1,
        wait: 500,
        timeout: 1e4,
        popupCheckInterval: 500,
        singleTitle: "Share"
    }, c.prototype = {
        init: function() {
            this.container.addClass(k), this.single = this.container.hasClass(k + "_single"), this.initUserButtons(), this.countersLeft = 0, this.number = 0, this.container.on("counter." + k, a.proxy(this.updateCounter, this));
            var b = this.container.children();
            this.makeSingleButton(), this.buttons = [], b.each(a.proxy(function(b, c) {
                var e = new d(a(c), this.options);
                this.buttons.push(e), e.options.counterUrl && this.countersLeft++
            }, this)), this.options.counters ? (this.timer = setTimeout(a.proxy(this.appear, this), this.options.wait), this.timeout = setTimeout(a.proxy(this.ready, this, !0), this.options.timeout)) : this.appear()
        },
        initUserButtons: function() {
            !this.userButtonInited && window.socialLikesButtons && a.extend(!0, o, socialLikesButtons), this.userButtonInited = !0
        },
        makeSingleButton: function() {
            if (this.single) {
                var b = this.container;
                b.addClass(k + "_vertical"), b.wrap(a("<div>", {
                    class: k + "_single-w"
                })), b.wrapInner(a("<div>", {
                    class: k + "__single-container"
                }));
                var c = b.parent(),
                    d = a("<div>", {
                        class: h("widget", "single")
                    }),
                    e = a(g('<div class="{buttonCls}"><span class="{iconCls}"></span>{title}</div>', {
                        buttonCls: h("button", "single"),
                        iconCls: h("icon", "single"),
                        title: this.options.singleTitle
                    }));
                d.append(e), c.append(d), d.on("click", function() {
                    var a = k + "__widget_active";
                    return d.toggleClass(a), d.hasClass(a) ? (b.css({
                        left: -(b.width() - d.width()) / 2,
                        top: -b.height()
                    }), j(b), i(b, function() {
                        d.removeClass(a)
                    })) : b.removeClass(m), !1
                }), this.widget = d
            }
        },
        update: function(b) {
            if (b.forceUpdate || b.url !== this.options.url) {
                this.number = 0, this.countersLeft = this.buttons.length, this.widget && this.widget.find("." + k + "__counter").remove(), a.extend(this.options, b);
                for (var c = 0; c < this.buttons.length; c++) this.buttons[c].update(b)
            }
        },
        updateCounter: function(a, b, c) {
            c = c || 0, (c || this.options.zeroes) && (this.number += c, this.single && this.getCounterElem().text(this.number)), this.countersLeft--, 0 === this.countersLeft && (this.appear(), this.ready())
        },
        appear: function() {
            this.container.addClass(k + "_visible")
        },
        ready: function(a) {
            this.timeout && clearTimeout(this.timeout), this.container.addClass(k + "_ready"), a || this.container.trigger("ready." + k, this.number)
        },
        getCounterElem: function() {
            var b = this.widget.find("." + l + "counter_single");
            return b.length || (b = a("<span>", {
                class: h("counter", "single")
            }), this.widget.append(b)), b
        }
    }, d.prototype = {
        init: function() {
            this.detectParams(), this.initHtml(), setTimeout(a.proxy(this.initCounter, this), 0)
        },
        update: function(b) {
            a.extend(this.options, {
                forceUpdate: !1
            }, b), this.widget.find("." + k + "__counter").remove(), this.initCounter()
        },
        detectService: function() {
            var b = this.widget.data("service");
            if (!b) {
                for (var c = this.widget[0], d = c.classList || c.className.split(" "), e = 0; e < d.length; e++) {
                    var f = d[e];
                    if (o[f]) {
                        b = f;
                        break
                    }
                }
                if (!b) return
            }
            this.service = b, a.extend(this.options, o[b])
        },
        detectParams: function() {
            var a = this.widget.data();
            if (a.counter) {
                var b = parseInt(a.counter, 10);
                isNaN(b) ? this.options.counterUrl = a.counter : this.options.counterNumber = b
            }
            a.title && (this.options.title = a.title), a.url && (this.options.url = a.url)
        },
        initHtml: function() {
            var b = this.options,
                c = this.widget,
                d = c.find("a");
            d.length && this.cloneDataAttrs(d, c);
            var e = a("<span>", {
                class: this.getElementClassNames("button"),
                html: c.html()
            });
            if (b.clickUrl) {
                var g = f(b.clickUrl, {
                        url: b.url,
                        title: b.title
                    }),
                    h = a("<a>", {
                        href: g
                    });
                this.cloneDataAttrs(c, h), c.replaceWith(h), this.widget = c = h
            } else c.on("click", a.proxy(this.click, this));
            c.removeClass(this.service), c.addClass(this.getElementClassNames("widget")), e.prepend(a("<span>", {
                class: this.getElementClassNames("icon")
            })), c.empty().append(e), this.button = e
        },
        initCounter: function() {
            if (this.options.counters)
                if (this.options.counterNumber) this.updateCounter(this.options.counterNumber);
                else {
                    var b = {
                        counterUrl: this.options.counterUrl,
                        forceUpdate: this.options.forceUpdate
                    };
                    p.fetch(this.service, this.options.url, b).always(a.proxy(this.updateCounter, this))
                }
        },
        cloneDataAttrs: function(a, b) {
            var c = a.data();
            for (var d in c) c.hasOwnProperty(d) && b.data(d, c[d])
        },
        getElementClassNames: function(a) {
            return h(a, this.service)
        },
        updateCounter: function(b) {
            b = parseInt(b, 10) || 0;
            var c = {
                class: this.getElementClassNames("counter"),
                text: b
            };
            b || this.options.zeroes || (c.class += " " + k + "__counter_empty", c.text = "");
            var d = a("<span>", c);
            this.widget.append(d), this.widget.trigger("counter." + k, [this.service, b])
        },
        click: function(b) {
            var c = this.options,
                d = !0;
            if (a.isFunction(c.click) && (d = c.click.call(this, b)), d) {
                var e = f(c.popupUrl, {
                    url: c.url,
                    title: c.title
                });
                e = this.addAdditionalParamsToUrl(e), this.openPopup(e, {
                    width: c.popupWidth,
                    height: c.popupHeight
                })
            }
            return !1
        },
        addAdditionalParamsToUrl: function(b) {
            var c = a.param(a.extend(this.widget.data(), this.options.data));
            if (a.isEmptyObject(c)) return b;
            var d = b.indexOf("?") === -1 ? "?" : "&";
            return b + d + c
        },
        openPopup: function(b, c) {
            var d = Math.round(screen.width / 2 - c.width / 2),
                e = 0;
            screen.height > c.height && (e = Math.round(screen.height / 3 - c.height / 2));
            var f = window.open(b, "sl_" + this.service, "left=" + d + ",top=" + e + ",width=" + c.width + ",height=" + c.height + ",personalbar=0,toolbar=0,scrollbars=1,resizable=1");
            if (f) {
                f.focus(), this.widget.trigger("popup_opened." + k, [this.service, f]);
                var g = setInterval(a.proxy(function() {
                    f.closed && (clearInterval(g), this.widget.trigger("popup_closed." + k, this.service))
                }, this), this.options.popupCheckInterval)
            } else location.href = b
        }
    }, a(function() {
        a("." + k).socialLikes()
    })
});

// hpr895: 2017-1-17
// For IE9+

// Equivalent Tabs Plugin
(function( $ ) {
    $.fn.eqTabs = function(options) {
        // Settings
        var eq_default = $.extend( {
            'tab_init'         : 1,
            'nav'              : '.eqNav',
            'main'             : '.eqMain',
            'tab'              : '.eqTab',
            'content'          : '.eqContent',
            'activeTab'        : 'eqActive',
            'activeContent'    : 'eqActive',
        }, options);
        // Set 'this'
        var el = this;
        // Shorten variables
        var act_tab     = eq_default.activeTab;
        var act_cont    = eq_default.activeContent;
        var sel_nav     = eq_default.nav;
        var sel_main    = eq_default.main;
        var tab         = eq_default.tab;
        var content     = eq_default.content;
        // Protecting from wrong 'tab_init' value
        if ( eq_default.tab_init > el.find( sel_nav + ' ' + tab ).length || eq_default.tab_init < 0 ) {
            eq_default.tab_init = 1;
        };
        // Set 'tab_init' tab to active
        if (eq_default.tab_init != 0) {
            var defTab = eq_default.tab_init - 1;
            el.find( sel_nav + ' ' + tab ).eq( defTab ).addClass( act_tab );
            el.find( sel_main + ' ' + content ).eq( defTab ).addClass( act_cont );
        }
        // Changing classes on click
        el.find( sel_nav + ' ' + tab ).click(function(e) {
            e.preventDefault();
            var active_tab = $(this).index(tab);
            $(this).closest( el ).find( sel_nav + ' ' + tab ).removeClass( act_tab );
            $(this).addClass( act_tab );
            $(this).closest( el ).find( sel_main + ' ' + content ).removeClass( act_cont );
            $(this).closest( el ).find( sel_main + ' ' + content ).eq( active_tab ).addClass( act_cont );
            // Call user Function on tab Change
            if($.isFunction(options.onChange)){
                options.onChange.call(el);
            }
        });
    };
})(jQuery);


// Slide to page top

var toPageTop = (function () {
    return {
        init: function() {
            $('body').append('<div class="to-page-top"></div>');
            var winh;
            function getWindowHeight() {
                winh = $(window).height();
            }
            getWindowHeight();
            $(window).resize(function() {
                getWindowHeight();
            });
            $('.to-page-top').click(function(e){
                e.preventDefault();
                $('html, body').animate({scrollTop: 0}, 'slow');
            });
            $(window).scroll(function(){
                var boff = $(document).scrollTop();
                if ( boff > winh ) {
                    $('.to-page-top').addClass('to-page-top_visible');
                } else {
                    $('.to-page-top').removeClass('to-page-top_visible');
                };
            })
        }
    }
})();


