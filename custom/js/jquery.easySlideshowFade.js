(function($) {
    $.fn.easySlideshowFade = function(setting) {

        var defaluts = {
            suffle: false,
            width: '100%',
            height: 'auto',
            minHeight: 'none',
            maxHeight: 'none',
            autoChange: true,
            autoTimer: 4000,
            fadeSpeed: 1000,
            shuffle: true,
            gradationColor: '0,0,0',
            callbackBefore: null,
            callbackAfter: null,
            callbackChange: null,
            photoFrame: false,
            stopWhenClicked: true,
            contents: '',

        };

        setting = $.extend(defaluts, setting);

        if (this.length) {
            var element = this;

            var wrapper = '<div id="images-wrapper"></div>';
            var gradationTop = '<div id="images-top"></div>';
            var gradationBottom = '<div id="images-bottom"></div>';

            var parent = element.parent();

            var num = element.find('li').length;

            var imgInfo = [];

            var current = 0;

            var timer = [];

            var device = userAgent();

            var mode = 'background';

            var loaded = false;

            var breakPoint = 782;


            var btnEnable = true;

            var clicked = false;




            if (setting.callbackBefore) {
                window[setting.callbackBefore].apply()
            }

            if (element.find('li').length) {

                element.wrap("<div id='images-wrapper'></div>")
                wrapper = $('#images-wrapper');


                element.css({
                    margin: '0px',
                    padding: '0px'
                })
                wrapper.css({
                    opacity: '1.0'
                })

                if (setting.height != 'auto') {
                    element.css({
                        height: setting.height + 'px'
                    })
                }

                element.find('li').css({
                    position: 'absolute',
                    listStyle: 'none',
                    display: 'none',
                    overflow: 'hidden'
                })

                element.find('img').css({
                    maxWidth: 'none'
                })

                if (setting.width == '100%') {
                    element.find('li').css({
                        width: '100%'
                    })
                    element.find('img').css({
                        width: '100%'
                    })
                } else if (setting.width != 'auto') {
                    element.find('img').css({
                        width: setting.width + 'px'
                    })
                }






                if (setting.shuffle) {
                    var shuffleElement = element.html().split("</li>")
                    shuffleElement.splice(shuffleElement.length - 1);

                    for (var i = shuffleElement.length - 1; i >= 0; i--) {
                        var r = Math.floor(i * Math.random());
                        var tmp = shuffleElement[i];
                        shuffleElement[i] = shuffleElement[r];
                        shuffleElement[r] = tmp;
                    }

                    element.empty();

                    for (var i = 0; i < shuffleElement.length; i++) {
                        element.append(shuffleElement[i]);
                    }

                }

                for (var i = 0; i < element.find('img').length; i++) {
                    var img = element.find('img').eq(i);
                    var src = img.attr('src');
                    imgInfo.push({
                        loaded: false,
                        src: src,
                        width: 0,
                        height: 0,
                        retio: 0,
                        source: null
                    })
                }

                var photoAnimeTime = 1000;
                var photoAnimeEasing = 'easeOutQuad';

                function setResizeEvent() {
                    $(window).resize(function() {
                        for (var i = 0; i < element.find('li').length; i++) {
                            resizeImages(i);
                        }
                    })
                    for (var i = 0; i < element.find('li').length; i++) {
                        resizeImages(i);
                    }
                }



                function resizeImages(_num, animation, callback) {
                    var windowWidth = $(window).width()
                    var windowHeight = $(window).height();
                    var windowRatio = windowWidth / windowHeight;
                    var _li = element.find('li').eq(_num)
                    var _img;



                    if (_li.css('display') != 'none') {

                        if (_num in imgInfo) {
                            _img = _li.find('img');
                            var imgRatio = imgInfo[_num]['ratio'];
                            var baseWidth = imgInfo[_num]['width'];
                            var baseHeight = imgInfo[_num]['height'];
                            var imgWidth;
                            var imgHeight;

                            var marginTop;
                            var marginLeft;



                            _img.stop(false, true)

                            if (mode == 'background') {
                                if (windowRatio > imgRatio) {
                                    imgWidth = windowWidth;
                                    imgHeight = parseInt(baseHeight * (imgWidth / baseWidth));
                                    marginTop = -(imgHeight - windowHeight) / 2
                                    marginLeft = 0
                                } else {
                                    imgHeight = windowHeight;
                                    imgWidth = parseInt(baseWidth * (imgHeight / baseHeight));
                                    marginTop = 0
                                    marginLeft = -(imgWidth - windowWidth) / 2;
                                }
                            } else if (mode == 'photoframe') {
                                if (windowRatio >= imgRatio) {
                                    imgHeight = windowHeight;
                                    imgWidth = parseInt(baseWidth * (imgHeight / baseHeight));
                                    marginLeft = (windowWidth - imgWidth) / 2;
                                    marginTop = 0;
                                } else {
                                    imgWidth = windowWidth;
                                    imgHeight = parseInt(baseHeight * (imgWidth / baseWidth));
                                    marginLeft = 0;
                                    marginTop = (windowHeight - imgHeight) / 2;
                                }
                            }

                            if (animation) {

                                _img.animate({
                                    width: imgWidth + 'px',
                                    height: imgHeight + 'px',
                                    marginTop: marginTop + 'px',
                                    marginLeft: marginLeft + 'px'
                                }, photoAnimeTime, photoAnimeEasing, function() {
                                    if (callback) {
                                        eval(callback + "()");
                                    }

                                })
                            } else {
                                _img.width(imgWidth);
                                _img.height(imgHeight);
                                _img.css({
                                    marginTop: marginTop + 'px',
                                    marginLeft: marginLeft + 'px'
                                })
                            }
                        }
                    }
                }

                function stopResizeImages() {
                    for (var i = 0; i < element.find('li').length; i++) {
                        var _li = element.find('li').eq(_num)
                        var _img = _li.find('img');
                        _img.stop(true, false);
                    }
                }


                for (var i = 0; i < element.find('img').length; i++) {
                    var _img = this.find('img').eq(i);
                    _img.bind("load", function() {
                        var index = element.find('img').index(this);
                        imgInfo[index]['loaded'] = true;
                        setImageSize(index);


                        checkLoadComplete()
                    })
                }

                function setImageSize(_index) {
                    var img = element.find('img').eq(_index);
                    var _src = _img.attr('src');
                    var source = $('<img>');
                    source.attr('src', _src + "?" + new Date().getTime());
                    source.attr('alt', _index);
                    source.load(function() {
                        var num = $(this).attr('alt');
                        imgInfo[num]['source'] = source
                        var _size = getImageTrueSize(imgInfo[num]['source']);
                        _size['ratio'] = _size['width'] / _size['height'];
                        imgInfo[_index]['width'] = _size['width'];
                        imgInfo[_index]['height'] = _size['height'];
                        imgInfo[_index]['ratio'] = _size['ratio'];
                        imgInfo[_index]['loaded'] = true;

                        checkLoadComplete();
                        if (_index == 0) {
                            LoadFirstImageComplete();

                        }

                    })
                }

                function getImageTrueSize(image) {
                    var size = []
                    if (image.prop('naturalWidth')) {
                        size['width'] = image.prop('naturalWidth')
                        size['height'] = image.prop('naturalHeight')
                    } else {
                        var img = new Image();
                        img.src = image.attr('src');
                        size['width'] = img.width
                        size['height'] = img.height;
                    }
                    return size;

                }


                function checkLoadComplete() {
                    var allLoaded = true;
                    for (var i = 0; i < imgInfo.length; i++) {
                        if (!imgInfo[i]['loaded']) {
                            allLoaded = false;
                            break;
                        }
                    }

                    if (allLoaded) {
                        loaded = true;
                        LoadComplete()
                    }

                }

                function LoadFirstImageComplete() {
                    start();
                }

                function LoadComplete() {

                }

                function start() {
                    showFirstImage();
                    setResizeEvent();

                    setTimerEvent();
                    if (setting.callbackAfter) {
                        window[setting.callbackAfter].apply()
                    }
                }

                function showFirstImage() {
                    void 0
                    for (var i = 0; i < element.find('li').length; i++) {
                        var li = element.find('li').eq(i);
                        if (i == 0) {
                            li.fadeIn(setting.fadeSpeed)
                            resizeImages(i);
                        } else {
                            li.hide()
                        }
                    }
                    element.show();
                }

                function setTimerEvent() {
                    if (setting.autoChange && element.find('li').length > 1) {
                        timer.push(setTimeout(function() {
                            timerChange()
                        }, setting.autoTimer))
                    }
                }


                function timerChange() {
                    var newNum;
                    var length = element.find('li').length;
                    if (current >= length - 1) {
                        newNum = 0;
                    } else {
                        newNum = current + 1;
                    }
                    transition(newNum, true);
                }


                function pauseTimerChange() {
                    for (var i = 0; i < timer.length; i++) {
                        clearTimeout(timer[i])
                    }
                    timer.length = 0;
                }


                function restartTimerChange() {
                    if (setting.stopWhenClicked) {
                        if (!navClicked) {
                            pauseTimerChange()
                            timer.push(setTimeout(function() {
                                timerChange()
                            }, setting.autoTimer))
                        }
                    } else {
                        pauseTimerChange()
                        timer.push(setTimeout(function() {
                            timerChange()
                        }, setting.autoTimer))
                    }
                }






                var toggleBtnId = 'photoframe-toggle';
                var iconClassPhotoFrame = 'glyphicon-picture';
                var iconClassBlog = 'glyphicon-list-alt';
                var toggleButtonSrc = '<a href="#" id="' + toggleBtnId + '"><span class="glyphicon glyphicon-picture"></span></a>';
                var toggleButton;
                if (setting.photoFrame) {
                    initPhotoFrame();
                }

                var contentFadeTime = 500;



                function changeToggleBtnIcon() {
                    $('#' + toggleBtnId).find('span').removeClass(iconClassPhotoFrame)
                    $('#' + toggleBtnId).find('span').removeClass(iconClassBlog)
                    if (mode == 'background') {
                        $('#' + toggleBtnId).find('span').addClass(iconClassPhotoFrame)
                    } else if (mode == 'photoframe') {
                        $('#' + toggleBtnId).find('span').addClass(iconClassBlog)

                    }

                }


                function initPhotoFrame() {

                    $('body').append(toggleButtonSrc)

                    toggleButton = $('#photoframe-toggle');
                    var toggleEvent;

                    if (device == 'pc') {
                        toggleEvent = 'click';
                    } else {
                        toggleEvent = 'touchstart';
                    }

                    toggleButton.bind(toggleEvent, function() {
                        togglePhotoFrame();
                    })
                }

                function togglePhotoFrame() {
                    if (btnEnable) {
                        btnEnable = false;
                        pauseTimerChange();
                        stopModeChangeAnimation();
                        if (mode == 'background') {
                            photoFrameMode();
                        } else if (mode == 'photoframe') {
                            backgroundMode();
                        }

                    }
                }

                function photoFrameMode() {
                    mode = "photoframe";
                    hideContents();
                }

                function backgroundMode() {

                    mode = "background";
                    hideNav();
                    modeChangeAnimation(mode)
                }

                function modeChangeAnimation(mode) {
                    var currentImage = element.find('li').eq(current).find('img');
                    resizeImages(current, true, 'EndModeChangeAnimation');
                }

                function EndModeChangeAnimation() {
                    if (mode == "photoframe") {
                        btnEnable = true;
                        showNav();
                    } else if (mode == "background") {
                        showContents();
                    }
                    changeToggleBtnIcon()

                }

                function stopModeChangeAnimation() {
                    stopContentsAnimation()
                }


                function showContents() {
                    $(setting.contents).fadeIn(contentFadeTime, function() {
                        contentsAnimationEnd();
                    });
                }

                function hideContents() {
                    $(setting.contents).fadeOut(contentFadeTime, function() {
                        contentsAnimationEnd()
                    });
                }

                function stopContentsAnimation() {
                    $(setting.contents).stop(true, false)
                }


                function contentsAnimationEnd() {
                    if (mode == "photoframe") {
                        modeChangeAnimation();
                    } else if (mode == "background") {
                        setTimerEvent();
                        btnEnable = true;
                    }
                }






                var nav;
                var prev;
                var next;
                var navClicked = false;

                if (setting.photoFrame) {
                    initNav();
                }


                function initNav() {
                    if (element.find('li').length > 1) {
                        $('body').append('<ul id="photoframe-nav"></ul>')
                        nav = $('#photoframe-nav');
                        nav.append('<li class="photoframe-nav-btn" id="photoframe-nav-prev"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>');

                        for (var i = 0; i < element.find('li').length; i++) {
                            var navBtn = '<li class="photoframe-nav-btn photoframe-nav-num" id="photoframe-nav-' + i + '"><a href="#"></a></li>';
                            nav.append(navBtn);
                        }
                        nav.append('<li class="photoframe-nav-btn" id="photoframe-nav-next"><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>');


                        $('.photoframe-nav-btn').click(function() {
                            navClick($(this))
                        })


                        $(window).resize(function() {
                            resizeNav();
                        })
                    }
                }

                function navClick(btn) {
                    var newNum;
                    if (btnEnable) {
                        if (btn.attr('id').match('prev')) {
                            if (current == 0) {
                                newNum = element.find('li').length - 1;
                            } else {
                                newNum = current - 1;
                            }
                        } else if (btn.attr('id').match('next')) {
                            if (current == element.find('li').length - 1) {
                                newNum = 0;
                            } else {
                                newNum = current + 1;
                            }
                        } else {
                            newNum = parseInt(btn.attr('id').replace('photoframe-nav-', ''));
                        }
                        navClicked = true;
                        transition(newNum);
                    }

                }



                function showNav() {
                    nav.fadeIn();
                    navPosition();
                    appearNav(current)
                }

                function hideNav() {
                    nav.fadeOut();
                }

                function stopNav() {

                }

                function resizeNav() {
                    navPosition();
                }

                function navPosition() {
                    var left;
                    var top;
                    if (breakPoint <= $(window).width()) {
                        left = ($(window).width() - nav.width()) / 2;
                        top = $(window).height() - $('.photoframe-nav-btn').height() - 10;
                        nav.css({
                            top: top + 'px',
                            left: left + 'px'
                        })

                        $('#photoframe-nav-prev').css({
                            position: 'relative',
                            left: 'auto'
                        })

                        $('#photoframe-nav-next').css({
                            position: 'relative',
                            right: 'auto'
                        })
                    } else {

                        top = ($(window).height() - $('.photoframe-nav-btn a').width()) / 2;
                        nav.css({
                            top: top + 'px',
                            left: 'auto'
                        })

                        $('#photoframe-nav-prev').css({
                            position: 'fixed',
                            left: '10px'
                        })

                        $('#photoframe-nav-next').css({
                            position: 'fixed',
                            right: 0
                        })


                    }

                }


                function appearNav(num) {
                    $('.photoframe-nav-btn').removeClass('current');
                    if (nav.css('display') != "none") {
                        $('#photoframe-nav-' + num).addClass('current');
                    }
                }

                transitionMode = 'fade';

                function initChangeMode() {
                    if (setting.photoFrame) {
                        $(window).resize(function() {
                            resizeChangeMode()
                        })
                    }
                }

                function resizeChangeMode() {

                }

                function chnageTransitionMode(mode) {
                    transitionMode = mode;
                }


                function transition(num, restart) {
                    transitionStop()
                    if (transitionMode == 'fade') {
                        transitionFade(num, restart)
                    } else if (transitionMode == 'swipe') {
                        transitionSwipe(num, restart)
                    }
                    current = num;

                    appearNav(num)

                }

                function transitionStop() {
                    transitionFadeStop()
                }





                function transitionFade(num, restart) {

                    var length = element.find('li').length;
                    for (var i = 0; i < length; i++) {
                        var li = element.find('li').eq(i);
                        if (num == i) {
                            if (num != current) {
                                li.fadeIn(setting.fadeSpeed, function() {
                                    transitionFadeEnd(restart)
                                });
                                resizeImages(i);
                            }

                        } else {
                            li.fadeOut(setting.fadeSpeed);
                        }
                    }


                }

                function transitionFadeStop() {
                    var length = element.find('li').length;
                    for (var i = 0; i < length; i++) {
                        var li = element.find('li').eq(i);
                        li.stop(true, true, false);
                    }
                }

                function transitionFadeEnd(restart) {
                    if (restart) {
                        restartTimerChange()
                    }
                }





                function transitionSwipe(num) {

                }


                function transitionSwipeStop() {

                }

                function userAgent() {
                    var a;
                    var ua = navigator.userAgent;

                    if (ua.indexOf("iPhone") > -1 || ua.indexOf("iPad") > -1 || ua.indexOf("iPod") > -1) a = "ios";
                    else if (ua.indexOf("Android") > -1) a = "android";
                    else a = "pc";
                    return a;
                }
            }
        }
    }
})(jQuery);


jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend(jQuery.easing, {
    def: 'easeOutQuad',
    swing: function(x, t, b, c, d) {
        return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
    },
    easeInQuad: function(x, t, b, c, d) {
        return c * (t /= d) * t + b;
    },
    easeOutQuad: function(x, t, b, c, d) {
        return -c * (t /= d) * (t - 2) + b;
    },
    easeInOutQuad: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t + b;
        return -c / 2 * ((--t) * (t - 2) - 1) + b;
    },
    easeInCubic: function(x, t, b, c, d) {
        return c * (t /= d) * t * t + b;
    },
    easeOutCubic: function(x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t + 1) + b;
    },
    easeInOutCubic: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b;
    },
    easeInQuart: function(x, t, b, c, d) {
        return c * (t /= d) * t * t * t + b;
    },
    easeOutQuart: function(x, t, b, c, d) {
        return -c * ((t = t / d - 1) * t * t * t - 1) + b;
    },
    easeInOutQuart: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
        return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
    },
    easeInQuint: function(x, t, b, c, d) {
        return c * (t /= d) * t * t * t * t + b;
    },
    easeOutQuint: function(x, t, b, c, d) {
        return c * ((t = t / d - 1) * t * t * t * t + 1) + b;
    },
    easeInOutQuint: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t * t * t + 2) + b;
    },
    easeInSine: function(x, t, b, c, d) {
        return -c * Math.cos(t / d * (Math.PI / 2)) + c + b;
    },
    easeOutSine: function(x, t, b, c, d) {
        return c * Math.sin(t / d * (Math.PI / 2)) + b;
    },
    easeInOutSine: function(x, t, b, c, d) {
        return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b;
    },
    easeInExpo: function(x, t, b, c, d) {
        return (t == 0) ? b : c * Math.pow(2, 10 * (t / d - 1)) + b;
    },
    easeOutExpo: function(x, t, b, c, d) {
        return (t == d) ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b;
    },
    easeInOutExpo: function(x, t, b, c, d) {
        if (t == 0) return b;
        if (t == d) return b + c;
        if ((t /= d / 2) < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
        return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b;
    },
    easeInCirc: function(x, t, b, c, d) {
        return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b;
    },
    easeOutCirc: function(x, t, b, c, d) {
        return c * Math.sqrt(1 - (t = t / d - 1) * t) + b;
    },
    easeInOutCirc: function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b;
        return c / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + b;
    },
    easeInElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d) == 1) return b + c;
        if (!p) p = d * .3;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4;
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
    },
    easeOutElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d) == 1) return b + c;
        if (!p) p = d * .3;
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4;
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
    },
    easeInOutElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d / 2) == 2) return b + c;
        if (!p) p = d * (.3 * 1.5);
        if (a < Math.abs(c)) {
            a = c;
            var s = p / 4;
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        if (t < 1) return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
        return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b;
    },
    easeInBack: function(x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        return c * (t /= d) * t * ((s + 1) * t - s) + b;
    },
    easeOutBack: function(x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b;
    },
    easeInOutBack: function(x, t, b, c, d, s) {
        if (s == undefined) s = 1.70158;
        if ((t /= d / 2) < 1) return c / 2 * (t * t * (((s *= (1.525)) + 1) * t - s)) + b;
        return c / 2 * ((t -= 2) * t * (((s *= (1.525)) + 1) * t + s) + 2) + b;
    },
    easeInBounce: function(x, t, b, c, d) {
        return c - jQuery.easing.easeOutBounce(x, d - t, 0, c, d) + b;
    },
    easeOutBounce: function(x, t, b, c, d) {
        if ((t /= d) < (1 / 2.75)) {
            return c * (7.5625 * t * t) + b;
        } else if (t < (2 / 2.75)) {
            return c * (7.5625 * (t -= (1.5 / 2.75)) * t + .75) + b;
        } else if (t < (2.5 / 2.75)) {
            return c * (7.5625 * (t -= (2.25 / 2.75)) * t + .9375) + b;
        } else {
            return c * (7.5625 * (t -= (2.625 / 2.75)) * t + .984375) + b;
        }
    },
    easeInOutBounce: function(x, t, b, c, d) {
        if (t < d / 2) return jQuery.easing.easeInBounce(x, t * 2, 0, c, d) * .5 + b;
        return jQuery.easing.easeOutBounce(x, t * 2 - d, 0, c, d) * .5 + c * .5 + b;
    }
});