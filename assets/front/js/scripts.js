/*! addEventListener Polyfill ie9- http://stackoverflow.com/a/27790212*/
window.addEventListener = window.addEventListener || function (e, f) { window.attachEvent('on' + e, f); };


/*!  Datenow Polyfill ie9- https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/now */
if (!Date.now) {
  Date.now = function now() {
    return new Date().getTime();
  };
}


/*! Object.create monkey patch ie8 http://stackoverflow.com/a/18020326 */
if ( ! Object.create ) {
  Object.create = function(proto, props) {
    if (typeof props !== "undefined") {
      throw "The multiple-argument version of Object.create is not provided by this browser and cannot be shimmed.";
    }
    function ctor() { }

    ctor.prototype = proto;
    return new ctor();
  };
}


/*! https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/filter */
if ( ! Array.prototype.filter ) {
  Array.prototype.filter = function(fun/*, thisArg*/) {
    'use strict';

    if (this === void 0 || this === null) {
      throw new TypeError();
    }

    var t = Object(this);
    var len = t.length >>> 0;
    if (typeof fun !== 'function') {
      throw new TypeError();
    }

    var res = [];
    var thisArg = arguments.length >= 2 ? arguments[1] : void 0;
    for (var i = 0; i < len; i++) {
      if (i in t) {
        var val = t[i];
        if (fun.call(thisArg, val, i, t)) {
          res.push(val);
        }
      }
    }

    return res;
  };
}



/*! map was added to the ECMA-262 standard in the 5th edition */
if (!Array.prototype.map) {

  Array.prototype.map = function(callback, thisArg) {

    var T, A, k;

    if (this === null) {
      throw new TypeError(' this is null or not defined');
    }
    var O = Object(this);
    var len = O.length >>> 0;
    if (typeof callback !== 'function') {
      throw new TypeError(callback + ' is not a function');
    }
    if (arguments.length > 1) {
      T = thisArg;
    }
    A = new Array(len);
    k = 0;
    while (k < len) {

      var kValue, mappedValue;
      if (k in O) {
        kValue = O[k];
        mappedValue = callback.call(T, kValue, k, O);
        A[k] = mappedValue;
      }
      k++;
    }
    return A;
  };
}
/*! Array.from was added to the ECMA-262 standard in the 6th edition (ES2015) */
if (!Array.from) {
  Array.from = (function () {
    var toStr = Object.prototype.toString;
    var isCallable = function (fn) {
      return typeof fn === 'function' || toStr.call(fn) === '[object Function]';
    };
    var toInteger = function (value) {
      var number = Number(value);
      if (isNaN(number)) { return 0; }
      if (number === 0 || !isFinite(number)) { return number; }
      return (number > 0 ? 1 : -1) * Math.floor(Math.abs(number));
    };
    var maxSafeInteger = Math.pow(2, 53) - 1;
    var toLength = function (value) {
      var len = toInteger(value);
      return Math.min(Math.max(len, 0), maxSafeInteger);
    };
    return function from(arrayLike/*, mapFn, thisArg */) {
      var C = this;
      var items = Object(arrayLike);
      if (arrayLike == null) {
        throw new TypeError('Array.from requires an array-like object - not null or undefined');
      }
      var mapFn = arguments.length > 1 ? arguments[1] : void undefined;
      var T;
      if (typeof mapFn !== 'undefined') {
        if (!isCallable(mapFn)) {
          throw new TypeError('Array.from: when provided, the second argument must be a function');
        }
        if (arguments.length > 2) {
          T = arguments[2];
        }
      }
      var len = toLength(items.length);
      var A = isCallable(C) ? Object(new C(len)) : new Array(len);
      var k = 0;
      var kValue;
      while (k < len) {
        kValue = items[k];
        if (mapFn) {
          A[k] = typeof T === 'undefined' ? mapFn(kValue, k) : mapFn.call(T, kValue, k);
        } else {
          A[k] = kValue;
        }
        k += 1;
      }
      A.length = len;
      return A;
    };
  }());
}
;(function ( $, window, document, undefined ) {

  var pluginPrefix = 'original',
      _props       = ['Width', 'Height'];

  _props.map( function(_prop) {
    var _lprop = _prop.toLowerCase();
    $.fn[ pluginPrefix + _prop ] = ('natural' + _prop in new Image()) ?
      function () {
        return this[0][ 'natural' + _prop ];
      } :
      function () {
        var _size = _getAttr( this, _lprop );

        if ( _size )
          return _size;

        var _node = this[0],
            _img;

        if (_node.tagName.toLowerCase() === 'img') {
          _img = new Image();
          _img.src = _node.src;
          _size = _img[ _lprop ];
        }
        return _size;
      };
  } );//map()

  function _getAttr( _el, prop ){
    var _img_size = $(_el).attr( prop );
    return ( typeof _img_size === undefined ) ? false : _img_size;
  }

})( jQuery, window, document );
;(function ( $, window, document, undefined ) {
      var pluginName = 'imgSmartLoad',
          defaults = {
                load_all_images_on_first_scroll : false,
                attribute : [ 'data-src', 'data-srcset', 'data-sizes' ],
                excludeImg : [''],
                threshold : 200,
                fadeIn_options : { duration : 400 },
                delaySmartLoadEvent : 0,

          },
          skipImgClass = 'tc-smart-load-skip';


      function Plugin( element, options ) {
            this.element = element;
            this.options = $.extend( {}, defaults, options) ;
            if ( _.isArray( this.options.excludeImg ) )
              this.options.excludeImg.push( '.'+skipImgClass );
            else
              this.options.excludeImg = [ '.'+skipImgClass ];

            this._defaults = defaults;
            this._name = pluginName;
            this.init();
      }
      Plugin.prototype.init = function () {
            var self        = this,
                $_imgs   = $( 'img[' + this.options.attribute[0] + ']:not('+ this.options.excludeImg.join() +')' , this.element );

            this.increment  = 1;//used to wait a little bit after the first user scroll actions to trigger the timer
            this.timer      = 0;


            $_imgs
                  .addClass( skipImgClass )
                  .bind( 'load_img', {}, function() { self._load_img(this); });
            $(window).scroll( function( _evt ) { self._better_scroll_event_handler( $_imgs, _evt ); } );
            $(window).resize( _.debounce( function( _evt ) { self._maybe_trigger_load( $_imgs, _evt ); }, 100 ) );
            this._maybe_trigger_load( $_imgs );
      };
      Plugin.prototype._better_scroll_event_handler = function( $_imgs , _evt ) {
            var self = this;
            if ( ! this.doingAnimation ) {
                  this.doingAnimation = true;
                  window.requestAnimationFrame(function() {
                        self._maybe_trigger_load( $_imgs , _evt );
                        self.doingAnimation = false;
                  });
            }
      };
      Plugin.prototype._maybe_trigger_load = function( $_imgs , _evt ) {
            var self = this;
                _visible_list = $_imgs.filter( function( ind, _img ) { return self._is_visible( _img ,  _evt ); } );
            _visible_list.map( function( ind, _img ) { $(_img).trigger( 'load_img' );  } );
      };
      Plugin.prototype._is_visible = function( _img, _evt ) {
            var $_img       = $(_img),
                wt = $(window).scrollTop(),
                wb = wt + $(window).height(),
                it  = $_img.offset().top,
                ib  = it + $_img.height(),
                th = this.options.threshold;
            if ( _evt && 'scroll' == _evt.type && this.options.load_all_images_on_first_scroll )
              return true;

            return ib >= wt - th && it <= wb + th;
      };
      Plugin.prototype._load_img = function( _img ) {
            var $_img    = $(_img),
                _src     = $_img.attr( this.options.attribute[0] ),
                _src_set = $_img.attr( this.options.attribute[1] ),
                _sizes   = $_img.attr( this.options.attribute[2] ),
                self = this;

            $_img.parent().addClass('smart-loading');

            $_img.unbind('load_img')
                  .hide()
                  .removeAttr( this.options.attribute.join(' ') )
                  .attr( 'sizes' , _sizes )
                  .attr( 'srcset' , _src_set )
                  .attr('src', _src )
                  .load( function () {
                        if ( ! $_img.hasClass('tc-smart-loaded') ) {
                              $_img.fadeIn(self.options.fadeIn_options).addClass('tc-smart-loaded');
                        }
                        if ( ( 'undefined' !== typeof $_img.attr('data-tcjp-recalc-dims')  ) && ( false !== $_img.attr('data-tcjp-recalc-dims') ) ) {
                              var _width  = $_img.originalWidth();
                                  _height = $_img.originalHeight();

                              if ( 2 != _.size( _.filter( [ _width, _height ], function(num){ return _.isNumber( parseInt(num, 10) ) && num > 1; } ) ) )
                                return;
                              $_img.removeAttr( 'data-tcjp-recalc-dims scale' );

                              $_img.attr( 'width', _width );
                              $_img.attr( 'height', _height );
                        }

                        $_img.trigger('smartload');
                  });//<= create a load() fn
            if ( $_img[0].complete ) {
                  $_img.load();
            }
            $_img.parent().removeClass('smart-loading');
      };
      $.fn[pluginName] = function ( options ) {
            return this.each(function () {
                  if (!$.data(this, 'plugin_' + pluginName)) {
                        $.data(this, 'plugin_' + pluginName,
                        new Plugin( this, options ));
                  }
            });
      };
})( jQuery, window, document );
;(function ( $, window, document, undefined ) {
    var pluginName = 'extLinks',
        defaults = {
          addIcon : true,
          iconClassName : 'tc-external',
          newTab: true,
          skipSelectors : { //defines the selector to skip when parsing the wrapper
            classes : [],
            ids : []
          },
          skipChildTags : ['IMG']//skip those tags if they are direct children of the current link element
        };


    function Plugin( element, options ) {
        this.$_el     = $(element);
        this.options  = $.extend( {}, defaults, options) ;
        this._href    = $.trim( this.$_el.attr( 'href' ) );
        this.init();
    }


    Plugin.prototype.init = function() {
      var self = this,
          $_external_icon = this.$_el.next( '.' + self.options.iconClassName );
      if ( ! this._is_eligible() ) {
        if ( $_external_icon.length )
          $_external_icon.remove();
        return;
      }
      if ( this.options.addIcon && 0 === $_external_icon.length ) {
        this.$_el.after('<span class="' + self.options.iconClassName + '">');
      }
      if ( this.options.newTab && '_blank' != this.$_el.attr('target') )
        this.$_el.attr('target' , '_blank');
    };
    Plugin.prototype._is_eligible = function() {
      var self = this;
      if ( ! this._is_external( this._href ) )
        return;
      if ( ! this._is_first_child_tag_allowed () )
        return;
      if ( 2 != ( ['ids', 'classes'].filter( function( sel_type) { return self._is_selector_allowed(sel_type); } ) ).length )
        return;

      var _is_eligible = true;
      $.each( this.$_el.parents(), function() {
        if ( 'underline' == $(this).css('textDecoration') ){
          _is_eligible = false;
          return false;
        }
      });

      return true && _is_eligible;
    };
    Plugin.prototype._is_selector_allowed = function( requested_sel_type ) {
      if ( czrapp && czrapp.userXP && czrapp.userXP.isSelectorAllowed )
        return czrapp.userXP.isSelectorAllowed( this.$_el, this.options.skipSelectors, requested_sel_type);

      var sel_type = 'ids' == requested_sel_type ? 'id' : 'class',
          _selsToSkip   = this.options.skipSelectors[requested_sel_type];
      if ( 'object' != typeof(this.options.skipSelectors) || ! this.options.skipSelectors[requested_sel_type] || ! $.isArray( this.options.skipSelectors[requested_sel_type] ) || 0 === this.options.skipSelectors[requested_sel_type].length )
        return true;
      if ( this.$_el.parents( _selsToSkip.map( function( _sel ){ return 'id' == sel_type ? '#' + _sel : '.' + _sel; } ).join(',') ).length > 0 )
        return false;
      if ( ! this.$_el.attr( sel_type ) )
        return true;

      var _elSels       = this.$_el.attr( sel_type ).split(' '),
          _filtered     = _elSels.filter( function(classe) { return -1 != $.inArray( classe , _selsToSkip ) ;});
      return 0 === _filtered.length;
    };
    Plugin.prototype._is_first_child_tag_allowed = function() {
      if ( 0 === this.$_el.children().length )
        return true;

      var tagName     = this.$_el.children().first()[0].tagName,
          _tagToSkip  = this.options.skipChildTags;
      if ( ! $.isArray( _tagToSkip ) )
        return true;
      _tagToSkip = _tagToSkip.map( function( _tag ) { return _tag.toUpperCase(); });
      return -1 == $.inArray( tagName , _tagToSkip );
    };
    Plugin.prototype._is_external = function( _href  ) {
      var _main_domain = (location.host).split('.').slice(-2).join('.'),
          _reg = new RegExp( _main_domain );

      _href = $.trim( _href );

      if ( _href !== '' && _href != '#' && this._isValidURL( _href ) )
        return ! _reg.test( _href );
      return;
    };
    Plugin.prototype._isValidURL = function( _url ){
      var _pattern = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
      return _pattern.test( _url );
    };
    $.fn[pluginName] = function ( options ) {
      return this.each(function () {
        if (!$.data(this, 'plugin_' + pluginName)) {
            $.data(this, 'plugin_' + pluginName,
            new Plugin( this, options ));
        }
      });
    };

})( jQuery, window, document );
;(function ( $, window, document, undefined ) {
      var pluginName = 'centerImages',
          defaults = {
                enableCentering : true,
                onresize : true,
                oncustom : [],//list of event here
                imgSel : 'img',
                defaultCSSVal : { width : 'auto' , height : 'auto' },
                leftAdjust : 0,
                zeroLeftAdjust : 0,
                topAdjust : 0,
                zeroTopAdjust : -2,//<= top ajustement for h-centered
                enableGoldenRatio : false,
                goldenRatioLimitHeightTo : 350,
                goldenRatioVal : 1.618,
                skipGoldenRatioClasses : ['no-gold-ratio'],
                disableGRUnder : 767,//in pixels
                useImgAttr:false,//uses the img height and width attributes if not visible (typically used for the customizr slider hidden images)
                setOpacityWhenCentered : false,//this can be used to hide the image during the time it is centered
                opacity : 1
          };

      function Plugin( element, options ) {
            var self = this;
            this.container  = element;
            this.options    = $.extend( {}, defaults, options) ;
            this._defaults  = defaults;
            this._name      = pluginName;
            this._customEvt = $.isArray(self.options.oncustom) ? self.options.oncustom : self.options.oncustom.split(' ');
            this.init();
      }
      Plugin.prototype.init = function () {
            var self = this,
                _do = function() {
                    self._maybe_apply_golden_r();
                    var $_imgs = $( self.options.imgSel , self.container );
                    if ( self.options.enableGoldenRatio ) {
                          $(window).bind(
                                'resize',
                                {},
                                _.debounce( function( evt ) { self._maybe_apply_golden_r( evt ); }, 200 )
                          );
                    }
                    if ( 1 <= $_imgs.length && self.options.enableCentering ) {
                          self._parse_imgs($_imgs);
                    }
                };
            _do();
            if ( $.isArray( self._customEvt ) ) {
                  self._customEvt.map( function( evt ) {
                        $( self.container ).bind( evt, {} , _do );
                  } );
            }
      };
      Plugin.prototype._maybe_apply_golden_r = function( evt ) {
            if ( ! this.options.enableGoldenRatio || ! this.options.goldenRatioVal || 0 === this.options.goldenRatioVal )
              return;
            if ( ! this._is_selector_allowed() )
              return;
            if ( ! this._is_window_width_allowed() ) {
                  $(this.container).attr('style' , '');
                  return;
            }

            var new_height = Math.round( $(this.container).width() / this.options.goldenRatioVal );
            new_height = new_height > this.options.goldenRatioLimitHeightTo ? this.options.goldenRatioLimitHeightTo : new_height;
            $(this.container)
                  .css({
                        'line-height' : new_height + 'px',
                        height : new_height + 'px'
                  })
                  .trigger('golden-ratio-applied');
      };
      Plugin.prototype._is_window_width_allowed = function() {
            return $(window).width() > this.options.disableGRUnder - 15;
      };
      Plugin.prototype._parse_imgs = function( $_imgs ) {
            var self = this;
            $_imgs.each(function ( ind, img ) {
                  var $_img = $(img);
                  self._pre_img_cent( $_img );
                  if ( self.options.onresize ) {
                        $(window).resize( _.debounce( function() {
                              self._pre_img_cent( $_img );
                        }, 200 ) );
                  }
                  if ( $.isArray( self._customEvt ) ) {
                        self._customEvt.map( function( evt ) {
                              $_img.bind( evt, {} , function( evt ) {
                                    self._pre_img_cent( $_img );
                              } );
                        } );
                  }
            });//$_imgs.each()
      };
      Plugin.prototype._pre_img_cent = function( $_img ) {
            var _state = this._get_current_state( $_img ),
                self = this,
                _case  = _state.current,
                _p     = _state.prop[_case],
                _not_p = _state.prop[ 'h' == _case ? 'v' : 'h'],
                _not_p_dir_val = 'h' == _case ? ( this.options.zeroTopAdjust || 0 ) : ( this.options.zeroLeftAdjust || 0 );

            var _centerImg = function( $_img ) {
                  $_img
                      .css( _p.dim.name , _p.dim.val )
                      .css( _not_p.dim.name , self.options.defaultCSSVal[ _not_p.dim.name ] || 'auto' )
                      .addClass( _p._class ).removeClass( _not_p._class )
                      .css( _p.dir.name, _p.dir.val ).css( _not_p.dir.name, _not_p_dir_val );

                  return $_img;
            };
            if ( this.options.setOpacityWhenCentered ) {
                  $.when( _centerImg( $_img ) ).done( function( $_img ) {
                        $_img.css( 'opacity', self.options.opacity );
                  });
            } else {
                  _centerImg( $_img );
            }
      };
      Plugin.prototype._get_current_state = function( $_img ) {
            var c_x     = $_img.closest(this.container).outerWidth(),
                c_y     = $(this.container).outerHeight(),
                i_x     = this._get_img_dim( $_img , 'x'),
                i_y     = this._get_img_dim( $_img , 'y'),
                up_i_x  = i_y * c_y !== 0 ? Math.round( i_x / i_y * c_y ) : c_x,
                up_i_y  = i_x * c_x !== 0 ? Math.round( i_y / i_x * c_x ) : c_y,
                current = 'h';
            if ( 0 !== c_x * i_x ) {
                  current = ( c_y / c_x ) >= ( i_y / i_x ) ? 'h' : 'v';
            }

            var prop    = {
                  h : {
                        dim : { name : 'height', val : c_y },
                        dir : { name : 'left', val : ( c_x - up_i_x ) / 2 + ( this.options.leftAdjust || 0 ) },
                        _class : 'h-centered'
                  },
                  v : {
                        dim : { name : 'width', val : c_x },
                        dir : { name : 'top', val : ( c_y - up_i_y ) / 2 + ( this.options.topAdjust || 0 ) },
                        _class : 'v-centered'
                  }
            };

            return { current : current , prop : prop };
      };
      Plugin.prototype._get_img_dim = function( $_img, _dim ) {
            if ( ! this.options.useImgAttr )
              return 'x' == _dim ? $_img.outerWidth() : $_img.outerHeight();

            if ( $_img.is(":visible") ) {
                  return 'x' == _dim ? $_img.outerWidth() : $_img.outerHeight();
            } else {
                  if ( 'x' == _dim ){
                        var _width = $_img.originalWidth();
                        return typeof _width === undefined ? 0 : _width;
                  }
                  if ( 'y' == _dim ){
                        var _height = $_img.originalHeight();
                        return typeof _height === undefined ? 0 : _height;
                  }
            }
      };
      Plugin.prototype._is_selector_allowed = function() {
            if ( ! $(this.container).attr( 'class' ) )
              return true;
            if ( ! this.options.skipGoldenRatioClasses || ! $.isArray( this.options.skipGoldenRatioClasses )  )
              return true;

            var _elSels       = $(this.container).attr( 'class' ).split(' '),
                _selsToSkip   = this.options.skipGoldenRatioClasses,
                _filtered     = _elSels.filter( function(classe) { return -1 != $.inArray( classe , _selsToSkip ) ;});
            return 0 === _filtered.length;
      };
      $.fn[pluginName] = function ( options ) {
            return this.each(function () {
                if (!$.data(this, 'plugin_' + pluginName)) {
                    $.data(this, 'plugin_' + pluginName,
                    new Plugin( this, options ));
                }
            });
      };

})( jQuery, window, document );/* ===================================================
 * jqueryParallax.js v1.0.0
 * ===================================================
 * (c) 2016 Nicolas Guillaume - Rocco Aliberti, Nice, France
 * CenterImages plugin may be freely distributed under the terms of the GNU GPL v2.0 or later license.
 *
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 *
 *
 * =================================================== */
;(function ( $, window, document, undefined ) {
        var pluginName = 'czrParallax',
            defaults = {
                  parallaxRatio : 0.5,
                  parallaxDirection : 1,
                  parallaxOverflowHidden : true,
                  oncustom : [],//list of event here
                  backgroundClass : 'image',
                  matchMedia : 'only screen and (max-width: 768px)'
            };

        function Plugin( element, options ) {
              this.element         = $(element);
              this.element_wrapper = this.element.closest( '.parallax-wrapper' );
              this.options         = $.extend( {}, defaults, options, this.parseElementDataOptions() ) ;
              this._defaults       = defaults;
              this._name           = pluginName;
              this.init();
        }

        Plugin.prototype.parseElementDataOptions = function () {
              return this.element.data();
        };
        Plugin.prototype.init = function () {
              this.$_document   = $(document);
              this.$_window     = czrapp ? czrapp.$_window : $(window);
              this.doingAnimation = false;

              this.initWaypoints();
              this.stageParallaxElements();
              this._bind_evt();
        };
        Plugin.prototype._bind_evt = function() {
              var self = this,
                  _customEvt = $.isArray(this.options.oncustom) ? this.options.oncustom : this.options.oncustom.split(' ');

              _.bindAll( this, 'maybeParallaxMe', 'parallaxMe' );
        };

        Plugin.prototype.stageParallaxElements = function() {

              this.element.css({
                    'position': this.element.hasClass( this.options.backgroundClass ) ? 'absolute' : 'relative',
                    'will-change': 'transform'
              });

              if ( this.options.parallaxOverflowHidden ){
                    var $_wrapper = this.element_wrapper;
                    if ( $_wrapper.length )
                      $_wrapper.css( 'overflow', 'hidden' );
              }
        };

        Plugin.prototype.initWaypoints = function() {
              var self = this;

              this.way_start = new Waypoint({
                    element: self.element_wrapper.length ? self.element_wrapper : self.element,
                    handler: function() {
                          self.maybeParallaxMe();
                          if ( ! self.element.hasClass('parallaxing') ){
                                self.$_window.on('scroll', self.maybeParallaxMe );
                                self.element.addClass('parallaxing');
                          } else{
                                self.element.removeClass('parallaxing');
                                self.$_window.off('scroll', self.maybeParallaxMe );
                                self.doingAnimation = false;
                                self.element.css('top', 0 );
                          }
                    }
              });

              this.way_stop = new Waypoint({
                    element: self.element_wrapper.length ? self.element_wrapper : self.element,
                    handler: function() {
                          self.maybeParallaxMe();
                          if ( ! self.element.hasClass('parallaxing') ) {
                                self.$_window.on('scroll', self.maybeParallaxMe );
                                self.element.addClass('parallaxing');
                          }else {
                                self.element.removeClass('parallaxing');
                                self.$_window.off('scroll', self.maybeParallaxMe );
                                self.doingAnimation = false;
                          }
                    },
                    offset: function(){
                          return - this.adapter.outerHeight();
                    }
              });
        };
        Plugin.prototype.maybeParallaxMe = function() {
              var self = this;
              if ( _.isFunction( window.matchMedia ) && matchMedia( self.options.matchMedia ).matches )
                return this.setTopPosition();

              if ( ! this.doingAnimation ) {
                    this.doingAnimation = true;
                    window.requestAnimationFrame(function() {
                          self.parallaxMe();
                          self.doingAnimation = false;
                    });
              }
        };
        Plugin.prototype.setTopPosition = function( _top_ ) {
              _top_ = _top_ || 0;
              this.element.css({
                    'transform' : 'translate3d(0px, ' + _top_  + 'px, .01px)',
                    '-webkit-transform' : 'translate3d(0px, ' + _top_  + 'px, .01px)'
              });
        };

        Plugin.prototype.parallaxMe = function() {

              var ratio = this.options.parallaxRatio,
                  parallaxDirection = this.options.parallaxDirection,
                  value = ratio * parallaxDirection * ( this.$_document.scrollTop() - this.way_start.triggerPoint );
              this.setTopPosition( parallaxDirection * value < 0 ? 0 : value );
        };
        $.fn[pluginName] = function ( options ) {
            return this.each(function () {
                if (!$.data(this, 'plugin_' + pluginName)) {
                    $.data(this, 'plugin_' + pluginName,
                    new Plugin( this, options ));
                }
            });
        };
})( jQuery, window, document );/* ===================================================
 * jqueryAnimateSvg.js v1.0.0
 * @dependency : Vivus.js (MIT licensed)
 * ===================================================
 * (c) 2016 Nicolas Guillaume, Nice, France
 * Animates an svg icon with Vivus given its #id
 * =================================================== */
;(function ( $, window, document, _ ) {
  var pluginName = 'animateSvg',
      defaults = {
        filter_opacity : 0.8,
        svg_opacity : 0.8,
        animation_duration : 400
      },
      _drawSvgIcon = function(options) {
          var id = $(this).attr('id');
          if ( _.isUndefined(id) || _.isEmpty(id) || 'function' != typeof( Vivus ) ) {
            if ( window.czrapp )
              czrapp.consoleLog( 'An svg icon could not be animated with Vivus.');
            return;
          }
          if ( $('[id=' + id + ']').length > 1 ) {
            if ( window.czrapp )
              czrapp.consoleLog( 'Svg icons must have a unique css #id to be animated. Multiple id found for : ' + id );
          }
          var set_opacity = function() {
            if ( $('#' + id ).siblings('.filter-placeholder').length )
              return $('#' + id ).css('opacity', options.svg_opacity ).siblings('.filter-placeholder').css('opacity', options.filter_opacity);
            else
              return $('#' + id ).css('opacity', options.svg_opacity );
          };
          $.when( set_opacity() ).done( function() {
              new Vivus( id, {type: 'delayed', duration: options.animation_duration } );
          });
      };
  $.fn[pluginName] = function ( options ) {
      options  = $.extend( {}, defaults, options) ;
      return this.each(function () {
          if ( ! $.data(this, 'plugin_' + pluginName) ) {
              $.data(
                this,
                'plugin_' + pluginName,
                _drawSvgIcon.call( this, options )
              );
          }
      });
  };
})( jQuery, window, document, _ );// http://paulirish.com/2011/requestanimationframe-for-smart-animating/
(function() {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] 
                                   || window[vendors[x]+'CancelRequestAnimationFrame'];
    }
 
    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            lastTime = currTime + timeToCall;
            return window.setTimeout(function() { callback(currTime + timeToCall); }, 
              timeToCall);
        };
 
    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
}());/*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas, David Knight. Dual MIT/BSD license */

window.matchMedia || (window.matchMedia = function() {
    "use strict";
    var styleMedia = (window.styleMedia || window.media);
    if (!styleMedia) {
        var style       = document.createElement('style'),
            script      = document.getElementsByTagName('script')[0],
            info        = null;

        style.type  = 'text/css';
        style.id    = 'matchmediajs-test';

        if (!script) {
          document.head.appendChild(style);
        } else {
          script.parentNode.insertBefore(style, script);
        }
        info = ('getComputedStyle' in window) && window.getComputedStyle(style, null) || style.currentStyle;

        styleMedia = {
            matchMedium: function(media) {
                var text = '@media ' + media + '{ #matchmediajs-test { width: 1px; } }';
                if (style.styleSheet) {
                    style.styleSheet.cssText = text;
                } else {
                    style.textContent = text;
                }
                return info.width === '1px';
            }
        };
    }

    return function(media) {
        return {
            matches: styleMedia.matchMedium(media || 'all'),
            media: media || 'all'
        };
    };
}());// Press Customizr version of Galambosi's SmoothScroll

(function () {
var defaultOptions = {
    frameRate        : 150, // [Hz]
    animationTime    : 400, // [px]
    stepSize         : 120, // [px]
    pulseAlgorithm   : true,
    pulseScale       : 4,
    pulseNormalize   : 1,
    accelerationDelta : 20,  // 20
    accelerationMax   : 1,   // 1
    keyboardSupport   : true,  // option
    arrowScroll       : 50,     // [px]
    touchpadSupport   : true,
    fixedBackground   : true,
    excluded          : ''
};

var options = defaultOptions;
var isExcluded = false;
var isFrame = false;
var direction = { x: 0, y: 0 };
var initDone  = false;
var root = document.documentElement;
var activeElement;
var observer;
var deltaBuffer = [];
var isMac = /^Mac/.test(navigator.platform);

var key = { left: 37, up: 38, right: 39, down: 40, spacebar: 32,
            pageup: 33, pagedown: 34, end: 35, home: 36 };

var options = defaultOptions;
function initTest() {
    if (options.keyboardSupport) {
        addEvent('keydown', keydown);
    }
}
function init() {

    if (initDone || !document.body) return;

    initDone = true;

    var body = document.body;
    var html = document.documentElement;
    var windowHeight = window.innerHeight;
    var scrollHeight = body.scrollHeight;
    root = (document.compatMode.indexOf('CSS') >= 0) ? html : body;
    activeElement = body;

    initTest();
    if (top != self) {
        isFrame = true;
    }
    else if (scrollHeight > windowHeight &&
            (body.offsetHeight <= windowHeight ||
             html.offsetHeight <= windowHeight)) {

        var fullPageElem = document.createElement('div');
        fullPageElem.style.cssText = 'position:absolute; z-index:-10000; ' +
                                     'top:0; left:0; right:0; height:' +
                                      root.scrollHeight + 'px';
        document.body.appendChild(fullPageElem);
        var pendingRefresh;
        var refresh = function () {
            if (pendingRefresh) return; // could also be: clearTimeout(pendingRefresh);
            pendingRefresh = setTimeout(function () {
                if (isExcluded) return; // could be running after cleanup
                fullPageElem.style.height = '0';
                fullPageElem.style.height = root.scrollHeight + 'px';
                pendingRefresh = null;
            }, 500); // act rarely to stay fast
        };

        setTimeout(refresh, 10);
        var config = {
            attributes: true,
            childList: true,
            characterData: false
        };

        observer = new MutationObserver(refresh);
        observer.observe(body, config);

        if (root.offsetHeight <= windowHeight) {
            var clearfix = document.createElement('div');
            clearfix.style.clear = 'both';
            body.appendChild(clearfix);
        }
    }
    if (!options.fixedBackground && !isExcluded) {
        body.style.backgroundAttachment = 'scroll';
        html.style.backgroundAttachment = 'scroll';
    }
}
function cleanup() {
    observer && observer.disconnect();
    removeEvent(wheelEvent, wheel);
    removeEvent('mousedown', mousedown);
    removeEvent('keydown', keydown);
}
var que = [];
var pending = false;
var lastScroll = Date.now();
function scrollArray(elem, left, top) {

    directionCheck(left, top);

    if (options.accelerationMax != 1) {
        var now = Date.now();
        var elapsed = now - lastScroll;
        if (elapsed < options.accelerationDelta) {
            var factor = (1 + (50 / elapsed)) / 2;
            if (factor > 1) {
                factor = Math.min(factor, options.accelerationMax);
                left *= factor;
                top  *= factor;
            }
        }
        lastScroll = Date.now();
    }
    que.push({
        x: left,
        y: top,
        lastX: (left < 0) ? 0.99 : -0.99,
        lastY: (top  < 0) ? 0.99 : -0.99,
        start: Date.now()
    });
    if (pending) {
        return;
    }

    var scrollWindow = (elem === document.body);

    var step = function (time) {

        var now = Date.now();
        var scrollX = 0;
        var scrollY = 0;

        for (var i = 0; i < que.length; i++) {

            var item = que[i];
            var elapsed  = now - item.start;
            var finished = (elapsed >= options.animationTime);
            var position = (finished) ? 1 : elapsed / options.animationTime;
            if (options.pulseAlgorithm) {
                position = pulse(position);
            }
            var x = (item.x * position - item.lastX) >> 0;
            var y = (item.y * position - item.lastY) >> 0;
            scrollX += x;
            scrollY += y;
            item.lastX += x;
            item.lastY += y;
            if (finished) {
                que.splice(i, 1); i--;
            }
        }
        if (scrollWindow) {
            window.scrollBy(scrollX, scrollY);
        }
        else {
            if (scrollX) elem.scrollLeft += scrollX;
            if (scrollY) elem.scrollTop  += scrollY;
        }
        if (!left && !top) {
            que = [];
        }

        if (que.length) {
            requestFrame(step, elem, (1000 / options.frameRate + 1));
        } else {
            pending = false;
        }
    };
    requestFrame(step, elem, 0);
    pending = true;
}
function wheel(event) {

    if (!initDone) {
        init();
    }

    var target = event.target;
    var overflowing = overflowingAncestor(target);
    if (!overflowing || event.defaultPrevented || event.ctrlKey) {
        return true;
    }
    if (isNodeName(activeElement, 'embed') ||
       (isNodeName(target, 'embed') && /\.pdf/i.test(target.src)) ||
       isNodeName(activeElement, 'object')) {
        return true;
    }

    var deltaX = -event.wheelDeltaX || event.deltaX || 0;
    var deltaY = -event.wheelDeltaY || event.deltaY || 0;

    if (isMac) {
        if (event.wheelDeltaX && isDivisible(event.wheelDeltaX, 120)) {
            deltaX = -120 * (event.wheelDeltaX / Math.abs(event.wheelDeltaX));
        }
        if (event.wheelDeltaY && isDivisible(event.wheelDeltaY, 120)) {
            deltaY = -120 * (event.wheelDeltaY / Math.abs(event.wheelDeltaY));
        }
    }
    if (!deltaX && !deltaY) {
        deltaY = -event.wheelDelta || 0;
    }
    if (event.deltaMode === 1) {
        deltaX *= 40;
        deltaY *= 40;
    }
    if (!options.touchpadSupport && isTouchpad(deltaY)) {
        return true;
    }
    if (Math.abs(deltaX) > 1.2) {
        deltaX *= options.stepSize / 120;
    }
    if (Math.abs(deltaY) > 1.2) {
        deltaY *= options.stepSize / 120;
    }

    scrollArray(overflowing, deltaX, deltaY);
    event.preventDefault();
    scheduleClearCache();
}
function keydown(event) {

    var target   = event.target;
    var modifier = event.ctrlKey || event.altKey || event.metaKey ||
                  (event.shiftKey && event.keyCode !== key.spacebar);
    if (!document.contains(activeElement)) {
        activeElement = document.activeElement;
    }
    var inputNodeNames = /^(textarea|select|embed|object)$/i;
    var buttonTypes = /^(button|submit|radio|checkbox|file|color|image)$/i;
    if ( inputNodeNames.test(target.nodeName) ||
         isNodeName(target, 'input') && !buttonTypes.test(target.type) ||
         isNodeName(activeElement, 'video') ||
         isInsideYoutubeVideo(event) ||
         target.isContentEditable ||
         event.defaultPrevented   ||
         modifier ) {
      return true;
    }
    if ((isNodeName(target, 'button') ||
         isNodeName(target, 'input') && buttonTypes.test(target.type)) &&
        event.keyCode === key.spacebar) {
      return true;
    }

    var shift, x = 0, y = 0;
    var elem = overflowingAncestor(activeElement);
    var clientHeight = elem.clientHeight;

    if (elem == document.body) {
        clientHeight = window.innerHeight;
    }

    switch (event.keyCode) {
        case key.up:
            y = -options.arrowScroll;
            break;
        case key.down:
            y = options.arrowScroll;
            break;
        case key.spacebar: // (+ shift)
            shift = event.shiftKey ? 1 : -1;
            y = -shift * clientHeight * 0.9;
            break;
        case key.pageup:
            y = -clientHeight * 0.9;
            break;
        case key.pagedown:
            y = clientHeight * 0.9;
            break;
        case key.home:
            y = -elem.scrollTop;
            break;
        case key.end:
            var damt = elem.scrollHeight - elem.scrollTop - clientHeight;
            y = (damt > 0) ? damt+10 : 0;
            break;
        case key.left:
            x = -options.arrowScroll;
            break;
        case key.right:
            x = options.arrowScroll;
            break;
        default:
            return true; // a key we don't care about
    }

    scrollArray(elem, x, y);
    event.preventDefault();
    scheduleClearCache();
}
function mousedown(event) {
    activeElement = event.target;
}

var uniqueID = (function () {
    var i = 0;
    return function (el) {
        return el.uniqueID || (el.uniqueID = i++);
    };
})();

var cache = {}; // cleared out after a scrolling session
var clearCacheTimer;

function scheduleClearCache() {
    clearTimeout(clearCacheTimer);
    clearCacheTimer = setInterval(function () { cache = {}; }, 1*1000);
}

function setCache(elems, overflowing) {
    for (var i = elems.length; i--;)
        cache[uniqueID(elems[i])] = overflowing;
    return overflowing;
}

function overflowingAncestor(el) {
    var elems = [];
    var body = document.body;
    var rootScrollHeight = root.scrollHeight;
    do {
        var cached = cache[uniqueID(el)];
        if (cached) {
            return setCache(elems, cached);
        }
        elems.push(el);
        if (rootScrollHeight === el.scrollHeight) {
            var topOverflowsNotHidden = overflowNotHidden(root) && overflowNotHidden(body);
            var isOverflowCSS = topOverflowsNotHidden || overflowAutoOrScroll(root);
            if (isFrame && isContentOverflowing(root) ||
               !isFrame && isOverflowCSS) {
                return setCache(elems, getScrollRoot());
            }
        } else if (isContentOverflowing(el) && overflowAutoOrScroll(el)) {
            return setCache(elems, el);
        }
    } while (el = el.parentElement);
}

function isContentOverflowing(el) {
    return (el.clientHeight + 10 < el.scrollHeight);
}
function overflowNotHidden(el) {
    var overflow = getComputedStyle(el, '').getPropertyValue('overflow-y');
    return (overflow !== 'hidden');
}
function overflowAutoOrScroll(el) {
    var overflow = getComputedStyle(el, '').getPropertyValue('overflow-y');
    return (overflow === 'scroll' || overflow === 'auto');
}

function addEvent(type, fn) {
    window.addEventListener(type, fn, false);
}

function removeEvent(type, fn) {
    window.removeEventListener(type, fn, false);
}

function isNodeName(el, tag) {
    return (el.nodeName||'').toLowerCase() === tag.toLowerCase();
}

function directionCheck(x, y) {
    x = (x > 0) ? 1 : -1;
    y = (y > 0) ? 1 : -1;
    if (direction.x !== x || direction.y !== y) {
        direction.x = x;
        direction.y = y;
        que = [];
        lastScroll = 0;
    }
}

var deltaBufferTimer;

if (window.localStorage && localStorage.SS_deltaBuffer) {
    deltaBuffer = localStorage.SS_deltaBuffer.split(',');
}

function isTouchpad(deltaY) {
    if (!deltaY) return;
    if (!deltaBuffer.length) {
        deltaBuffer = [deltaY, deltaY, deltaY];
    }
    deltaY = Math.abs(deltaY)
    deltaBuffer.push(deltaY);
    deltaBuffer.shift();
    clearTimeout(deltaBufferTimer);
    deltaBufferTimer = setTimeout(function () {
        if (window.localStorage) {
            localStorage.SS_deltaBuffer = deltaBuffer.join(',');
        }
    }, 1000);
    return !allDeltasDivisableBy(120) && !allDeltasDivisableBy(100);
}

function isDivisible(n, divisor) {
    return (Math.floor(n / divisor) == n / divisor);
}

function allDeltasDivisableBy(divisor) {
    return (isDivisible(deltaBuffer[0], divisor) &&
            isDivisible(deltaBuffer[1], divisor) &&
            isDivisible(deltaBuffer[2], divisor));
}

function isInsideYoutubeVideo(event) {
    var elem = event.target;
    var isControl = false;
    if (document.URL.indexOf ('www.youtube.com/watch') != -1) {
        do {
            isControl = (elem.classList &&
                         elem.classList.contains('html5-video-controls'));
            if (isControl) break;
        } while (elem = elem.parentNode);
    }
    return isControl;
}

var requestFrame = (function () {
      return (window.requestAnimationFrame       ||
              window.webkitRequestAnimationFrame ||
              window.mozRequestAnimationFrame    ||
              function (callback, element, delay) {
                 window.setTimeout(callback, delay || (1000/60));
             });
})();

var MutationObserver = (window.MutationObserver ||
                        window.WebKitMutationObserver ||
                        window.MozMutationObserver);

var getScrollRoot = (function() {
  var SCROLL_ROOT;
  return function() {
    if (!SCROLL_ROOT) {
      var dummy = document.createElement('div');
      dummy.style.cssText = 'height:10000px;width:1px;';
      document.body.appendChild(dummy);
      var bodyScrollTop  = document.body.scrollTop;
      var docElScrollTop = document.documentElement.scrollTop;
      window.scrollBy(0, 1);
      if (document.body.scrollTop != bodyScrollTop)
        (SCROLL_ROOT = document.body);
      else
        (SCROLL_ROOT = document.documentElement);
      window.scrollBy(0, -1);
      document.body.removeChild(dummy);
    }
    return SCROLL_ROOT;
  };
})();
function pulse_(x) {
    var val, start, expx;
    x = x * options.pulseScale;
    if (x < 1) { // acceleartion
        val = x - (1 - Math.exp(-x));
    } else {     // tail
        start = Math.exp(-1);
        x -= 1;
        expx = 1 - Math.exp(-x);
        val = start + (expx * (1 - start));
    }
    return val * options.pulseNormalize;
}

function pulse(x) {
    if (x >= 1) return 1;
    if (x <= 0) return 0;

    if (options.pulseNormalize == 1) {
        options.pulseNormalize /= pulse_(1);
    }
    return pulse_(x);
}

var wheelEvent;
if ('onwheel' in document.createElement('div'))
    wheelEvent = 'wheel';
else if ('onmousewheel' in document.createElement('div'))
    wheelEvent = 'mousewheel';
function _maybeInit( fire ){
  if (wheelEvent) {
    addEvent(wheelEvent, wheel);
    addEvent('mousedown', mousedown);
    if ( ! fire ) addEvent('load', init);
    else init();
  }
  return wheelEvent ? true : false;
}
smoothScroll = function ( _options ) {
  smoothScroll._setCustomOptions( _options );
  _maybeInit();
  czrapp.$_body.addClass('hu-smoothscroll');
};
smoothScroll._cleanUp = function(){
  cleanup();
  czrapp.$_body.removeClass('hu-smoothscroll');
};
smoothScroll._maybeFire = function(){
  _maybeInit(true);
  czrapp.$_body.addClass('hu-smoothscroll');
};
smoothScroll._setCustomOptions = function( _options ){
  options  =  _options ? _.extend( options, _options) : options;
};
})();

var smoothScroll;// modified version of
var tcOutline;
(function(d){
  tcOutline = function() {
	var style_element = d.createElement('STYLE'),
	    dom_events = 'addEventListener' in d,
	    add_event_listener = function(type, callback){
			if(dom_events){
				d.addEventListener(type, callback);
			}else{
				d.attachEvent('on' + type, callback);
			}
		},
	    set_css = function(css_text){
			if ( !!style_element.styleSheet )
                style_element.styleSheet.cssText = css_text; 
            else 
                style_element.innerHTML = css_text;
		}
	;

	d.getElementsByTagName('HEAD')[0].appendChild(style_element);
	add_event_listener('mousedown', function(){
		set_css('input[type=file]:focus,input[type=radio]:focus,input[type=checkbox]:focus,select:focus,a:focus{outline:0}input[type=file]::-moz-focus-inner,input[type=radio]::-moz-focus-inner,input[type=checkbox]::-moz-focus-inner,select::-moz-focus-inner,a::-moz-focus-inner{border:0;}');
	});

	add_event_listener('keydown', function(){
		set_css('');
	});
  }
})(document);
/*!
Waypoints - 4.0.0
Copyright © 2011-2015 Caleb Troughton
Licensed under the MIT license.
https://github.com/imakewebthings/waypoints/blob/master/licenses.txt
*/
(function() {
  'use strict'

  var keyCounter = 0
  var allWaypoints = {}
  function Waypoint(options) {
    if (!options) {
      throw new Error('No options passed to Waypoint constructor')
    }
    if (!options.element) {
      throw new Error('No element option passed to Waypoint constructor')
    }
    if (!options.handler) {
      throw new Error('No handler option passed to Waypoint constructor')
    }

    this.key = 'waypoint-' + keyCounter
    this.options = Waypoint.Adapter.extend({}, Waypoint.defaults, options)
    this.element = this.options.element
    this.adapter = new Waypoint.Adapter(this.element)
    this.callback = options.handler
    this.axis = this.options.horizontal ? 'horizontal' : 'vertical'
    this.enabled = this.options.enabled
    this.triggerPoint = null
    this.group = Waypoint.Group.findOrCreate({
      name: this.options.group,
      axis: this.axis
    })
    this.context = Waypoint.Context.findOrCreateByElement(this.options.context)

    if (Waypoint.offsetAliases[this.options.offset]) {
      this.options.offset = Waypoint.offsetAliases[this.options.offset]
    }
    this.group.add(this)
    this.context.add(this)
    allWaypoints[this.key] = this
    keyCounter += 1
  }
  Waypoint.prototype.queueTrigger = function(direction) {
    this.group.queueTrigger(this, direction)
  }
  Waypoint.prototype.trigger = function(args) {
    if (!this.enabled) {
      return
    }
    if (this.callback) {
      this.callback.apply(this, args)
    }
  }
  Waypoint.prototype.destroy = function() {
    this.context.remove(this)
    this.group.remove(this)
    delete allWaypoints[this.key]
  }
  Waypoint.prototype.disable = function() {
    this.enabled = false
    return this
  }
  Waypoint.prototype.enable = function() {
    this.context.refresh()
    this.enabled = true
    return this
  }
  Waypoint.prototype.next = function() {
    return this.group.next(this)
  }
  Waypoint.prototype.previous = function() {
    return this.group.previous(this)
  }
  Waypoint.invokeAll = function(method) {
    var allWaypointsArray = []
    for (var waypointKey in allWaypoints) {
      allWaypointsArray.push(allWaypoints[waypointKey])
    }
    for (var i = 0, end = allWaypointsArray.length; i < end; i++) {
      allWaypointsArray[i][method]()
    }
  }
  Waypoint.destroyAll = function() {
    Waypoint.invokeAll('destroy')
  }
  Waypoint.disableAll = function() {
    Waypoint.invokeAll('disable')
  }
  Waypoint.enableAll = function() {
    Waypoint.invokeAll('enable')
  }
  Waypoint.refreshAll = function() {
    Waypoint.Context.refreshAll()
  }
  Waypoint.viewportHeight = function() {
    return window.innerHeight || document.documentElement.clientHeight
  }
  Waypoint.viewportWidth = function() {
    return document.documentElement.clientWidth
  }

  Waypoint.adapters = []

  Waypoint.defaults = {
    context: window,
    continuous: true,
    enabled: true,
    group: 'default',
    horizontal: false,
    offset: 0
  }

  Waypoint.offsetAliases = {
    'bottom-in-view': function() {
      return this.context.innerHeight() - this.adapter.outerHeight()
    },
    'right-in-view': function() {
      return this.context.innerWidth() - this.adapter.outerWidth()
    }
  }

  window.Waypoint = Waypoint
}())
;(function() {
  'use strict'

  function requestAnimationFrameShim(callback) {
    window.setTimeout(callback, 1000 / 60)
  }

  var keyCounter = 0
  var contexts = {}
  var Waypoint = window.Waypoint
  var oldWindowLoad = window.onload
  function Context(element) {
    this.element = element
    this.Adapter = Waypoint.Adapter
    this.adapter = new this.Adapter(element)
    this.key = 'waypoint-context-' + keyCounter
    this.didScroll = false
    this.didResize = false
    this.oldScroll = {
      x: this.adapter.scrollLeft(),
      y: this.adapter.scrollTop()
    }
    this.waypoints = {
      vertical: {},
      horizontal: {}
    }

    element.waypointContextKey = this.key
    contexts[element.waypointContextKey] = this
    keyCounter += 1

    this.createThrottledScrollHandler()
    this.createThrottledResizeHandler()
  }
  Context.prototype.add = function(waypoint) {
    var axis = waypoint.options.horizontal ? 'horizontal' : 'vertical'
    this.waypoints[axis][waypoint.key] = waypoint
    this.refresh()
  }
  Context.prototype.checkEmpty = function() {
    var horizontalEmpty = this.Adapter.isEmptyObject(this.waypoints.horizontal)
    var verticalEmpty = this.Adapter.isEmptyObject(this.waypoints.vertical)
    if (horizontalEmpty && verticalEmpty) {
      this.adapter.off('.waypoints')
      delete contexts[this.key]
    }
  }
  Context.prototype.createThrottledResizeHandler = function() {
    var self = this

    function resizeHandler() {
      self.handleResize()
      self.didResize = false
    }

    this.adapter.on('resize.waypoints', function() {
      if (!self.didResize) {
        self.didResize = true
        Waypoint.requestAnimationFrame(resizeHandler)
      }
    })
  }
  Context.prototype.createThrottledScrollHandler = function() {
    var self = this
    function scrollHandler() {
      self.handleScroll()
      self.didScroll = false
    }

    this.adapter.on('scroll.waypoints', function() {
      if (!self.didScroll || Waypoint.isTouch) {
        self.didScroll = true
        Waypoint.requestAnimationFrame(scrollHandler)
      }
    })
  }
  Context.prototype.handleResize = function() {
    Waypoint.Context.refreshAll()
  }
  Context.prototype.handleScroll = function() {
    var triggeredGroups = {}
    var axes = {
      horizontal: {
        newScroll: this.adapter.scrollLeft(),
        oldScroll: this.oldScroll.x,
        forward: 'right',
        backward: 'left'
      },
      vertical: {
        newScroll: this.adapter.scrollTop(),
        oldScroll: this.oldScroll.y,
        forward: 'down',
        backward: 'up'
      }
    }

    for (var axisKey in axes) {
      var axis = axes[axisKey]
      var isForward = axis.newScroll > axis.oldScroll
      var direction = isForward ? axis.forward : axis.backward

      for (var waypointKey in this.waypoints[axisKey]) {
        var waypoint = this.waypoints[axisKey][waypointKey]
        var wasBeforeTriggerPoint = axis.oldScroll < waypoint.triggerPoint
        var nowAfterTriggerPoint = axis.newScroll >= waypoint.triggerPoint
        var crossedForward = wasBeforeTriggerPoint && nowAfterTriggerPoint
        var crossedBackward = !wasBeforeTriggerPoint && !nowAfterTriggerPoint
        if (crossedForward || crossedBackward) {
          waypoint.queueTrigger(direction)
          triggeredGroups[waypoint.group.id] = waypoint.group
        }
      }
    }

    for (var groupKey in triggeredGroups) {
      triggeredGroups[groupKey].flushTriggers()
    }

    this.oldScroll = {
      x: axes.horizontal.newScroll,
      y: axes.vertical.newScroll
    }
  }
  Context.prototype.innerHeight = function() {
    if (this.element == this.element.window) {
      return Waypoint.viewportHeight()
    }
    return this.adapter.innerHeight()
  }
  Context.prototype.remove = function(waypoint) {
    delete this.waypoints[waypoint.axis][waypoint.key]
    this.checkEmpty()
  }
  Context.prototype.innerWidth = function() {
    if (this.element == this.element.window) {
      return Waypoint.viewportWidth()
    }
    return this.adapter.innerWidth()
  }
  Context.prototype.destroy = function() {
    var allWaypoints = []
    for (var axis in this.waypoints) {
      for (var waypointKey in this.waypoints[axis]) {
        allWaypoints.push(this.waypoints[axis][waypointKey])
      }
    }
    for (var i = 0, end = allWaypoints.length; i < end; i++) {
      allWaypoints[i].destroy()
    }
  }
  Context.prototype.refresh = function() {
    var isWindow = this.element == this.element.window
    var contextOffset = isWindow ? undefined : this.adapter.offset()
    var triggeredGroups = {}
    var axes

    this.handleScroll()
    axes = {
      horizontal: {
        contextOffset: isWindow ? 0 : contextOffset.left,
        contextScroll: isWindow ? 0 : this.oldScroll.x,
        contextDimension: this.innerWidth(),
        oldScroll: this.oldScroll.x,
        forward: 'right',
        backward: 'left',
        offsetProp: 'left'
      },
      vertical: {
        contextOffset: isWindow ? 0 : contextOffset.top,
        contextScroll: isWindow ? 0 : this.oldScroll.y,
        contextDimension: this.innerHeight(),
        oldScroll: this.oldScroll.y,
        forward: 'down',
        backward: 'up',
        offsetProp: 'top'
      }
    }

    for (var axisKey in axes) {
      var axis = axes[axisKey]
      for (var waypointKey in this.waypoints[axisKey]) {
        var waypoint = this.waypoints[axisKey][waypointKey]
        var adjustment = waypoint.options.offset
        var oldTriggerPoint = waypoint.triggerPoint
        var elementOffset = 0
        var freshWaypoint = oldTriggerPoint == null
        var contextModifier, wasBeforeScroll, nowAfterScroll
        var triggeredBackward, triggeredForward

        if (waypoint.element !== waypoint.element.window) {
          elementOffset = waypoint.adapter.offset()[axis.offsetProp]
        }

        if (typeof adjustment === 'function') {
          adjustment = adjustment.apply(waypoint)
        }
        else if (typeof adjustment === 'string') {
          adjustment = parseFloat(adjustment)
          if (waypoint.options.offset.indexOf('%') > - 1) {
            adjustment = Math.ceil(axis.contextDimension * adjustment / 100)
          }
        }

        contextModifier = axis.contextScroll - axis.contextOffset
        waypoint.triggerPoint = elementOffset + contextModifier - adjustment
        wasBeforeScroll = oldTriggerPoint < axis.oldScroll
        nowAfterScroll = waypoint.triggerPoint >= axis.oldScroll
        triggeredBackward = wasBeforeScroll && nowAfterScroll
        triggeredForward = !wasBeforeScroll && !nowAfterScroll

        if (!freshWaypoint && triggeredBackward) {
          waypoint.queueTrigger(axis.backward)
          triggeredGroups[waypoint.group.id] = waypoint.group
        }
        else if (!freshWaypoint && triggeredForward) {
          waypoint.queueTrigger(axis.forward)
          triggeredGroups[waypoint.group.id] = waypoint.group
        }
        else if (freshWaypoint && axis.oldScroll >= waypoint.triggerPoint) {
          waypoint.queueTrigger(axis.forward)
          triggeredGroups[waypoint.group.id] = waypoint.group
        }
      }
    }

    Waypoint.requestAnimationFrame(function() {
      for (var groupKey in triggeredGroups) {
        triggeredGroups[groupKey].flushTriggers()
      }
    })

    return this
  }
  Context.findOrCreateByElement = function(element) {
    return Context.findByElement(element) || new Context(element)
  }
  Context.refreshAll = function() {
    for (var contextId in contexts) {
      contexts[contextId].refresh()
    }
  }
  Context.findByElement = function(element) {
    return contexts[element.waypointContextKey]
  }

  window.onload = function() {
    if (oldWindowLoad) {
      oldWindowLoad()
    }
    Context.refreshAll()
  }

  Waypoint.requestAnimationFrame = function(callback) {
    var requestFn = window.requestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      requestAnimationFrameShim
    requestFn.call(window, callback)
  }
  Waypoint.Context = Context
}())
;(function() {
  'use strict'

  function byTriggerPoint(a, b) {
    return a.triggerPoint - b.triggerPoint
  }

  function byReverseTriggerPoint(a, b) {
    return b.triggerPoint - a.triggerPoint
  }

  var groups = {
    vertical: {},
    horizontal: {}
  }
  var Waypoint = window.Waypoint
  function Group(options) {
    this.name = options.name
    this.axis = options.axis
    this.id = this.name + '-' + this.axis
    this.waypoints = []
    this.clearTriggerQueues()
    groups[this.axis][this.name] = this
  }
  Group.prototype.add = function(waypoint) {
    this.waypoints.push(waypoint)
  }
  Group.prototype.clearTriggerQueues = function() {
    this.triggerQueues = {
      up: [],
      down: [],
      left: [],
      right: []
    }
  }
  Group.prototype.flushTriggers = function() {
    for (var direction in this.triggerQueues) {
      var waypoints = this.triggerQueues[direction]
      var reverse = direction === 'up' || direction === 'left'
      waypoints.sort(reverse ? byReverseTriggerPoint : byTriggerPoint)
      for (var i = 0, end = waypoints.length; i < end; i += 1) {
        var waypoint = waypoints[i]
        if (waypoint.options.continuous || i === waypoints.length - 1) {
          waypoint.trigger([direction])
        }
      }
    }
    this.clearTriggerQueues()
  }
  Group.prototype.next = function(waypoint) {
    this.waypoints.sort(byTriggerPoint)
    var index = Waypoint.Adapter.inArray(waypoint, this.waypoints)
    var isLast = index === this.waypoints.length - 1
    return isLast ? null : this.waypoints[index + 1]
  }
  Group.prototype.previous = function(waypoint) {
    this.waypoints.sort(byTriggerPoint)
    var index = Waypoint.Adapter.inArray(waypoint, this.waypoints)
    return index ? this.waypoints[index - 1] : null
  }
  Group.prototype.queueTrigger = function(waypoint, direction) {
    this.triggerQueues[direction].push(waypoint)
  }
  Group.prototype.remove = function(waypoint) {
    var index = Waypoint.Adapter.inArray(waypoint, this.waypoints)
    if (index > -1) {
      this.waypoints.splice(index, 1)
    }
  }
  Group.prototype.first = function() {
    return this.waypoints[0]
  }
  Group.prototype.last = function() {
    return this.waypoints[this.waypoints.length - 1]
  }
  Group.findOrCreate = function(options) {
    return groups[options.axis][options.name] || new Group(options)
  }

  Waypoint.Group = Group
}())
;(function() {
  'use strict'

  var $ = window.jQuery
  var Waypoint = window.Waypoint

  function JQueryAdapter(element) {
    this.$element = $(element)
  }

  $.each([
    'innerHeight',
    'innerWidth',
    'off',
    'offset',
    'on',
    'outerHeight',
    'outerWidth',
    'scrollLeft',
    'scrollTop'
  ], function(i, method) {
    JQueryAdapter.prototype[method] = function() {
      var args = Array.prototype.slice.call(arguments)
      return this.$element[method].apply(this.$element, args)
    }
  })

  $.each([
    'extend',
    'inArray',
    'isEmptyObject'
  ], function(i, method) {
    JQueryAdapter[method] = $[method]
  })

  Waypoint.adapters.push({
    name: 'jquery',
    Adapter: JQueryAdapter
  })
  Waypoint.Adapter = JQueryAdapter
}())
;(function() {
  'use strict'

  var Waypoint = window.Waypoint

  function createExtension(framework) {
    return function() {
      var waypoints = []
      var overrides = arguments[0]

      if (framework.isFunction(arguments[0])) {
        overrides = framework.extend({}, arguments[1])
        overrides.handler = arguments[0]
      }

      this.each(function() {
        var options = framework.extend({}, overrides, {
          element: this
        })
        if (typeof options.context === 'string') {
          options.context = framework(this).closest(options.context)[0]
        }
        waypoints.push(new Waypoint(options))
      })

      return waypoints
    }
  }

  if (window.jQuery) {
    window.jQuery.fn.waypoint = createExtension(window.jQuery)
  }
  if (window.Zepto) {
    window.Zepto.fn.waypoint = createExtension(window.Zepto)
  }
}())
;/**
 * vivus - JavaScript library to make drawing animation on SVG
 * @version v0.3.1
 * @link https://github.com/maxwellito/vivus
 * @license MIT
 */
"use strict";!function(t,e){function r(r){if("undefined"==typeof r)throw new Error('Pathformer [constructor]: "element" parameter is required');if(r.constructor===String&&(r=e.getElementById(r),!r))throw new Error('Pathformer [constructor]: "element" parameter is not related to an existing ID');if(!(r.constructor instanceof t.SVGElement||/^svg$/i.test(r.nodeName)))throw new Error('Pathformer [constructor]: "element" parameter must be a string or a SVGelement');this.el=r,this.scan(r)}function n(t,e,r){this.isReady=!1,this.setElement(t,e),this.setOptions(e),this.setCallback(r),this.isReady&&this.init()}r.prototype.TYPES=["line","ellipse","circle","polygon","polyline","rect"],r.prototype.ATTR_WATCH=["cx","cy","points","r","rx","ry","x","x1","x2","y","y1","y2"],r.prototype.scan=function(t){for(var e,r,n,i,a=t.querySelectorAll(this.TYPES.join(",")),o=0;o<a.length;o++)r=a[o],e=this[r.tagName.toLowerCase()+"ToPath"],n=e(this.parseAttr(r.attributes)),i=this.pathMaker(r,n),r.parentNode.replaceChild(i,r)},r.prototype.lineToPath=function(t){var e={};return e.d="M"+t.x1+","+t.y1+"L"+t.x2+","+t.y2,e},r.prototype.rectToPath=function(t){var e={},r=parseFloat(t.x)||0,n=parseFloat(t.y)||0,i=parseFloat(t.width)||0,a=parseFloat(t.height)||0;return e.d="M"+r+" "+n+" ",e.d+="L"+(r+i)+" "+n+" ",e.d+="L"+(r+i)+" "+(n+a)+" ",e.d+="L"+r+" "+(n+a)+" Z",e},r.prototype.polylineToPath=function(t){var e,r,n={},i=t.points.trim().split(" ");if(-1===t.points.indexOf(",")){var a=[];for(e=0;e<i.length;e+=2)a.push(i[e]+","+i[e+1]);i=a}for(r="M"+i[0],e=1;e<i.length;e++)-1!==i[e].indexOf(",")&&(r+="L"+i[e]);return n.d=r,n},r.prototype.polygonToPath=function(t){var e=r.prototype.polylineToPath(t);return e.d+="Z",e},r.prototype.ellipseToPath=function(t){var e=t.cx-t.rx,r=t.cy,n=parseFloat(t.cx)+parseFloat(t.rx),i=t.cy,a={};return a.d="M"+e+","+r+"A"+t.rx+","+t.ry+" 0,1,1 "+n+","+i+"A"+t.rx+","+t.ry+" 0,1,1 "+e+","+i,a},r.prototype.circleToPath=function(t){var e={},r=t.cx-t.r,n=t.cy,i=parseFloat(t.cx)+parseFloat(t.r),a=t.cy;return e.d="M"+r+","+n+"A"+t.r+","+t.r+" 0,1,1 "+i+","+a+"A"+t.r+","+t.r+" 0,1,1 "+r+","+a,e},r.prototype.pathMaker=function(t,r){var n,i,a=e.createElementNS("http://www.w3.org/2000/svg","path");for(n=0;n<t.attributes.length;n++)i=t.attributes[n],-1===this.ATTR_WATCH.indexOf(i.name)&&a.setAttribute(i.name,i.value);for(n in r)a.setAttribute(n,r[n]);return a},r.prototype.parseAttr=function(t){for(var e,r={},n=0;n<t.length;n++){if(e=t[n],-1!==this.ATTR_WATCH.indexOf(e.name)&&-1!==e.value.indexOf("%"))throw new Error("Pathformer [parseAttr]: a SVG shape got values in percentage. This cannot be transformed into 'path' tags. Please use 'viewBox'.");r[e.name]=e.value}return r};var i,a,o;n.LINEAR=function(t){return t},n.EASE=function(t){return-Math.cos(t*Math.PI)/2+.5},n.EASE_OUT=function(t){return 1-Math.pow(1-t,3)},n.EASE_IN=function(t){return Math.pow(t,3)},n.EASE_OUT_BOUNCE=function(t){var e=-Math.cos(.5*t*Math.PI)+1,r=Math.pow(e,1.5),n=Math.pow(1-t,2),i=-Math.abs(Math.cos(2.5*r*Math.PI))+1;return 1-n+i*n},n.prototype.setElement=function(r,n){if("undefined"==typeof r)throw new Error('Vivus [constructor]: "element" parameter is required');if(r.constructor===String&&(r=e.getElementById(r),!r))throw new Error('Vivus [constructor]: "element" parameter is not related to an existing ID');if(this.parentEl=r,n&&n.file){var i=e.createElement("object");i.setAttribute("type","image/svg+xml"),i.setAttribute("data",n.file),i.setAttribute("built-by-vivus","true"),r.appendChild(i),r=i}switch(r.constructor){case t.SVGSVGElement:case t.SVGElement:this.el=r,this.isReady=!0;break;case t.HTMLObjectElement:var a,o;o=this,a=function(t){if(!o.isReady){if(o.el=r.contentDocument&&r.contentDocument.querySelector("svg"),!o.el&&t)throw new Error("Vivus [constructor]: object loaded does not contain any SVG");return o.el?(r.getAttribute("built-by-vivus")&&(o.parentEl.insertBefore(o.el,r),o.parentEl.removeChild(r),o.el.setAttribute("width","100%"),o.el.setAttribute("height","100%")),o.isReady=!0,o.init(),!0):void 0}},a()||r.addEventListener("load",a);break;default:throw new Error('Vivus [constructor]: "element" parameter is not valid (or miss the "file" attribute)')}},n.prototype.setOptions=function(e){var r=["delayed","async","oneByOne","scenario","scenario-sync"],i=["inViewport","manual","autostart"];if(void 0!==e&&e.constructor!==Object)throw new Error('Vivus [constructor]: "options" parameter must be an object');if(e=e||{},e.type&&-1===r.indexOf(e.type))throw new Error("Vivus [constructor]: "+e.type+" is not an existing animation `type`");if(this.type=e.type||r[0],e.start&&-1===i.indexOf(e.start))throw new Error("Vivus [constructor]: "+e.start+" is not an existing `start` option");if(this.start=e.start||i[0],this.isIE=-1!==t.navigator.userAgent.indexOf("MSIE")||-1!==t.navigator.userAgent.indexOf("Trident/")||-1!==t.navigator.userAgent.indexOf("Edge/"),this.duration=o(e.duration,120),this.delay=o(e.delay,null),this.dashGap=o(e.dashGap,1),this.forceRender=e.hasOwnProperty("forceRender")?!!e.forceRender:this.isIE,this.selfDestroy=!!e.selfDestroy,this.onReady=e.onReady,this.frameLength=this.currentFrame=this.map=this.delayUnit=this.speed=this.handle=null,this.ignoreInvisible=e.hasOwnProperty("ignoreInvisible")?!!e.ignoreInvisible:!1,this.animTimingFunction=e.animTimingFunction||n.LINEAR,this.pathTimingFunction=e.pathTimingFunction||n.LINEAR,this.delay>=this.duration)throw new Error("Vivus [constructor]: delay must be shorter than duration")},n.prototype.setCallback=function(t){if(t&&t.constructor!==Function)throw new Error('Vivus [constructor]: "callback" parameter must be a function');this.callback=t||function(){}},n.prototype.mapping=function(){var e,r,n,i,a,s,h,u;for(u=s=h=0,r=this.el.querySelectorAll("path"),e=0;e<r.length;e++)n=r[e],this.isInvisible(n)||(a={el:n,length:Math.ceil(n.getTotalLength())},isNaN(a.length)?t.console&&console.warn&&console.warn("Vivus [mapping]: cannot retrieve a path element length",n):(this.map.push(a),n.style.strokeDasharray=a.length+" "+(a.length+2*this.dashGap),n.style.strokeDashoffset=a.length+this.dashGap,a.length+=this.dashGap,s+=a.length,this.renderPath(e)));for(s=0===s?1:s,this.delay=null===this.delay?this.duration/3:this.delay,this.delayUnit=this.delay/(r.length>1?r.length-1:1),e=0;e<this.map.length;e++){switch(a=this.map[e],this.type){case"delayed":a.startAt=this.delayUnit*e,a.duration=this.duration-this.delay;break;case"oneByOne":a.startAt=h/s*this.duration,a.duration=a.length/s*this.duration;break;case"async":a.startAt=0,a.duration=this.duration;break;case"scenario-sync":n=a.el,i=this.parseAttr(n),a.startAt=u+(o(i["data-delay"],this.delayUnit)||0),a.duration=o(i["data-duration"],this.duration),u=void 0!==i["data-async"]?a.startAt:a.startAt+a.duration,this.frameLength=Math.max(this.frameLength,a.startAt+a.duration);break;case"scenario":n=a.el,i=this.parseAttr(n),a.startAt=o(i["data-start"],this.delayUnit)||0,a.duration=o(i["data-duration"],this.duration),this.frameLength=Math.max(this.frameLength,a.startAt+a.duration)}h+=a.length,this.frameLength=this.frameLength||this.duration}},n.prototype.drawer=function(){var t=this;this.currentFrame+=this.speed,this.currentFrame<=0?(this.stop(),this.reset(),this.callback(this)):this.currentFrame>=this.frameLength?(this.stop(),this.currentFrame=this.frameLength,this.trace(),this.selfDestroy&&this.destroy(),this.callback(this)):(this.trace(),this.handle=i(function(){t.drawer()}))},n.prototype.trace=function(){var t,e,r,n;for(n=this.animTimingFunction(this.currentFrame/this.frameLength)*this.frameLength,t=0;t<this.map.length;t++)r=this.map[t],e=(n-r.startAt)/r.duration,e=this.pathTimingFunction(Math.max(0,Math.min(1,e))),r.progress!==e&&(r.progress=e,r.el.style.strokeDashoffset=Math.floor(r.length*(1-e)),this.renderPath(t))},n.prototype.renderPath=function(t){if(this.forceRender&&this.map&&this.map[t]){var e=this.map[t],r=e.el.cloneNode(!0);e.el.parentNode.replaceChild(r,e.el),e.el=r}},n.prototype.init=function(){this.frameLength=0,this.currentFrame=0,this.map=[],new r(this.el),this.mapping(),this.starter(),this.onReady&&this.onReady(this)},n.prototype.starter=function(){switch(this.start){case"manual":return;case"autostart":this.play();break;case"inViewport":var e=this,r=function(){e.isInViewport(e.parentEl,1)&&(e.play(),t.removeEventListener("scroll",r))};t.addEventListener("scroll",r),r()}},n.prototype.getStatus=function(){return 0===this.currentFrame?"start":this.currentFrame===this.frameLength?"end":"progress"},n.prototype.reset=function(){return this.setFrameProgress(0)},n.prototype.finish=function(){return this.setFrameProgress(1)},n.prototype.setFrameProgress=function(t){return t=Math.min(1,Math.max(0,t)),this.currentFrame=Math.round(this.frameLength*t),this.trace(),this},n.prototype.play=function(t){if(t&&"number"!=typeof t)throw new Error("Vivus [play]: invalid speed");return this.speed=t||1,this.handle||this.drawer(),this},n.prototype.stop=function(){return this.handle&&(a(this.handle),this.handle=null),this},n.prototype.destroy=function(){this.stop();var t,e;for(t=0;t<this.map.length;t++)e=this.map[t],e.el.style.strokeDashoffset=null,e.el.style.strokeDasharray=null,this.renderPath(t)},n.prototype.isInvisible=function(t){var e,r=t.getAttribute("data-ignore");return null!==r?"false"!==r:this.ignoreInvisible?(e=t.getBoundingClientRect(),!e.width&&!e.height):!1},n.prototype.parseAttr=function(t){var e,r={};if(t&&t.attributes)for(var n=0;n<t.attributes.length;n++)e=t.attributes[n],r[e.name]=e.value;return r},n.prototype.isInViewport=function(t,e){var r=this.scrollY(),n=r+this.getViewportH(),i=t.getBoundingClientRect(),a=i.height,o=r+i.top,s=o+a;return e=e||0,n>=o+a*e&&s>=r},n.prototype.docElem=t.document.documentElement,n.prototype.getViewportH=function(){var e=this.docElem.clientHeight,r=t.innerHeight;return r>e?r:e},n.prototype.scrollY=function(){return t.pageYOffset||this.docElem.scrollTop},i=function(){return t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.oRequestAnimationFrame||t.msRequestAnimationFrame||function(e){return t.setTimeout(e,1e3/60)}}(),a=function(){return t.cancelAnimationFrame||t.webkitCancelAnimationFrame||t.mozCancelAnimationFrame||t.oCancelAnimationFrame||t.msCancelAnimationFrame||function(e){return t.clearTimeout(e)}}(),o=function(t,e){var r=parseInt(t,10);return r>=0?r:e},"function"==typeof define&&define.amd?define([],function(){return n}):"object"==typeof exports?module.exports=n:t.Vivus=n}(window,document);/*global jQuery */
/*!
* FitText.js 1.2
*
* Copyright 2011, Dave Rupert http://daverupert.com
* Released under the WTFPL license
* http://sam.zoy.org/wtfpl/
*
* Date: Thu May 05 14:23:00 2011 -0600
*/

(function( $ ){

  $.fn.fitText = function( kompressor, options ) {
    var compressor = kompressor || 1,
        settings = $.extend({
          'minFontSize' : Number.NEGATIVE_INFINITY,
          'maxFontSize' : Number.POSITIVE_INFINITY
        }, options);

    return this.each(function(){
      var $this = $(this);
      var resizer = function () {
        $this.css('font-size', Math.max(Math.min($this.width() / (compressor*10), parseFloat(settings.maxFontSize)), parseFloat(settings.minFontSize)));
      };
      resizer();
      $(window).on('resize.fittext orientationchange.fittext', resizer);

    });

  };

})( jQuery );var czrapp = czrapp || {};
(function($, czrapp) {
      czrapp._printLog = function( log ) {
            var _render = function() {
                  return $.Deferred( function() {
                        var dfd = this;
                        $.when( $('#footer').before( $('<div/>', { id : "bulklog" }) ) ).done( function() {
                              $('#bulklog').css({
                                    position: 'fixed',
                                    'z-index': '99999',
                                    'font-size': '0.8em',
                                    color: '#000',
                                    padding: '5%',
                                    width: '90%',
                                    height: '20%',
                                    overflow: 'hidden',
                                    bottom: '0',
                                    left: '0',
                                    background: 'yellow'
                              });

                              dfd.resolve();
                        });
                  }).promise();
                },
                _print = function() {
                      $('#bulklog').prepend('<p>' + czrapp._prettyfy( { consoleArguments : [ log ], prettyfy : false } ) + '</p>');
                };

            if ( 1 != $('#bulk-log').length ) {
                _render().done( _print );
            } else {
                _print();
            }
      };


      czrapp._truncate = function( string , length ){
            length = length || 150;
            if ( ! _.isString( string ) )
              return '';
            return string.length > length ? string.substr( 0, length - 1 ) : string;
      };
      czrapp._prettyfy = function( args ) {
            var _defaults = {
                  bgCol : '#5ed1f5',
                  textCol : '#000',
                  consoleArguments : [],
                  prettyfy : true
            };
            args = _.extend( _defaults, args );

            var _toArr = Array.from( args.consoleArguments );
            if ( ! _.isEmpty( _.filter( _toArr, function( it ) { return ! _.isString( it ); } ) ) ) {
                  _toArr =  JSON.stringify( _toArr );
            } else {
                  _toArr = _toArr.join(' ');
            }
            if ( args.prettyfy )
              return [
                    '%c ' + czrapp._truncate( _toArr ),
                    [ 'background:' + args.bgCol, 'color:' + args.textCol, 'display: block;' ].join(';')
              ];
            else
              return czrapp._truncate( _toArr );
      };
      czrapp.consoleLog = function() {
            if ( ! czrapp.localized.isDevMode )
              return;
            if ( ( _.isUndefined( console ) && typeof window.console.log != 'function' ) )
              return;

            console.log.apply( console, czrapp._prettyfy( { consoleArguments : arguments } ) );
      };

      czrapp.errorLog = function() {
            if ( ( _.isUndefined( console ) && typeof window.console.log != 'function' ) )
              return;

            console.log.apply( console, czrapp._prettyfy( { bgCol : '#ffd5a0', textCol : '#000', consoleArguments : arguments } ) );
      };
      czrapp.doAjax = function( query ) {
            query = query || ( _.isObject( query ) ? query : {} );

            var ajaxUrl = czrapp.localized.ajaxUrl,
                nonce = czrapp.localized.frontNonce,//{ 'id' : '', 'handle' : '' }
                dfd = $.Deferred(),
                _query_ = _.extend( {
                            action : ''
                      },
                      query
                );
            if ( "https:" == document.location.protocol ) {
                  ajaxUrl = ajaxUrl.replace( "http://", "https://" );
            }
            if ( _.isEmpty( _query_.action ) || ! _.isString( _query_.action ) ) {
                  czrapp.errorLog( 'czrapp.doAjax : unproper action provided' );
                  return dfd.resolve().promise();
            }
            _query_[ nonce.id ] = nonce.handle;
            if ( ! _.isObject( nonce ) || _.isUndefined( nonce.id ) || _.isUndefined( nonce.handle ) ) {
                  czrapp.errorLog( 'czrapp.doAjax : unproper nonce' );
                  return dfd.resolve().promise();
            }

            $.post( ajaxUrl, _query_ )
                  .done( function( _r ) {
                        if ( '0' === _r ||  '-1' === _r ) {
                              czrapp.errorLog( 'czrapp.doAjax : done ajax error for : ', _query_.action, _r );
                        }
                  })
                  .fail( function( _r ) { czrapp.errorLog( 'czrapp.doAjax : failed ajax error for : ', _query_.action, _r ); })
                  .always( function( _r ) { dfd.resolve( _r ); });
            return dfd.promise();
      };
})(jQuery, czrapp);
(function($, czrapp) {
      czrapp.isKeydownButNotEnterEvent = function ( event ) {
        return ( 'keydown' === event.type && 13 !== event.which );
      };
      czrapp.setupDOMListeners = function( event_map , args, instance ) {
              var _defaultArgs = {
                        model : {},
                        dom_el : {}
                  };

              if ( _.isUndefined( instance ) || ! _.isObject( instance ) ) {
                    czrapp.errorLog( 'setupDomListeners : instance should be an object', args );
                    return;
              }
              if ( ! _.isArray( event_map ) ) {
                    czrapp.errorLog( 'setupDomListeners : event_map should be an array', args );
                    return;
              }
              if ( ! _.isObject( args ) ) {
                    czrapp.errorLog( 'setupDomListeners : args should be an object', event_map );
                    return;
              }

              args = _.extend( _defaultArgs, args );
              if ( ! ( args.dom_el instanceof jQuery ) || 1 != args.dom_el.length ) {
                    czrapp.errorLog( 'setupDomListeners : dom element should be an existing dom element', args );
                    return;
              }
              _.map( event_map , function( _event ) {
                    if ( ! _.isString( _event.selector ) || _.isEmpty( _event.selector ) ) {
                          czrapp.errorLog( 'setupDOMListeners : selector must be a string not empty. Aborting setup of action(s) : ' + _event.actions.join(',') );
                          return;
                    }
                    if ( ! _.isString( _event.selector ) || _.isEmpty( _event.selector ) ) {
                          czrapp.errorLog( 'setupDOMListeners : selector must be a string not empty. Aborting setup of action(s) : ' + _event.actions.join(',') );
                          return;
                    }
                    args.dom_el.on( _event.trigger , _event.selector, function( e, event_params ) {
                          e.stopPropagation();
                          if ( czrapp.isKeydownButNotEnterEvent( e ) ) {
                            return;
                          }
                          e.preventDefault(); // Keep this AFTER the key filter above
                          var actionsParams = $.extend( true, {}, args );
                          if ( _.has( actionsParams, 'model') && _.has( actionsParams.model, 'id') ) {
                                if ( _.has( instance, 'get' ) )
                                  actionsParams.model = instance();
                                else
                                  actionsParams.model = instance.getModel( actionsParams.model.id );
                          }
                          $.extend( actionsParams, { event : _event, dom_event : e } );
                          $.extend( actionsParams, event_params );
                          if ( ! _.has( actionsParams, 'event' ) || ! _.has( actionsParams.event, 'actions' ) ) {
                                czrapp.errorLog( 'executeEventActionChain : missing obj.event or obj.event.actions' );
                                return;
                          }
                          try { czrapp.executeEventActionChain( actionsParams, instance ); } catch( er ) {
                                czrapp.errorLog( 'In setupDOMListeners : problem when trying to fire actions : ' + actionsParams.event.actions );
                                czrapp.errorLog( 'Error : ' + er );
                          }
                    });//.on()
              });//_.map()
      };//setupDomListeners
      czrapp.executeEventActionChain = function( args, instance ) {
              if ( 'function' === typeof( args.event.actions ) )
                return args.event.actions.call( instance, args );
              if ( ! _.isArray( args.event.actions ) )
                args.event.actions = [ args.event.actions ];
              var _break = false;
              _.map( args.event.actions, function( _cb ) {
                    if ( _break )
                      return;

                    if ( 'function' != typeof( instance[ _cb ] ) ) {
                          throw new Error( 'executeEventActionChain : the action : ' + _cb + ' has not been found when firing event : ' + args.event.selector );
                    }
                    var $_dom_el = ( _.has(args, 'dom_el') && -1 != args.dom_el.length ) ? args.dom_el : false;
                    if ( ! $_dom_el ) {
                          czrapp.errorLog( 'missing dom element');
                          return;
                    }
                    $_dom_el.trigger( 'before_' + _cb, _.omit( args, 'event' ) );
                    var _cb_return = instance[ _cb ].call( instance, args );
                    if ( false === _cb_return )
                      _break = true;
                    $_dom_el.trigger( 'after_' + _cb, _.omit( args, 'event' ) );
              });//_.map
      };
})(jQuery, czrapp);var czrapp = czrapp || {};
czrapp.methods = {};

(function( $ ){
      var ctor, inherits, slice = Array.prototype.slice;
      ctor = function() {};
      inherits = function( parent, protoProps, staticProps ) {
        var child;
        if ( protoProps && protoProps.hasOwnProperty( 'constructor' ) ) {
          child = protoProps.constructor;
        } else {
          child = function() {
            var result = parent.apply( this, arguments );
            return result;
          };
        }
        $.extend( child, parent );
        ctor.prototype  = parent.prototype;
        child.prototype = new ctor();
        if ( protoProps )
          $.extend( child.prototype, protoProps );
        if ( staticProps )
          $.extend( child, staticProps );
        child.prototype.constructor = child;
        child.__super__ = parent.prototype;

        return child;
      };
      czrapp.Class = function( applicator, argsArray, options ) {
        var magic, args = arguments;

        if ( applicator && argsArray && czrapp.Class.applicator === applicator ) {
          args = argsArray;
          $.extend( this, options || {} );
        }

        magic = this;
        if ( this.instance ) {
          magic = function() {
            return magic.instance.apply( magic, arguments );
          };

          $.extend( magic, this );
        }

        magic.initialize.apply( magic, args );
        return magic;
      };
      czrapp.Class.extend = function( protoProps, classProps ) {
        var child = inherits( this, protoProps, classProps );
        child.extend = this.extend;
        return child;
      };

      czrapp.Class.applicator = {};
      czrapp.Class.prototype.initialize = function() {};
      czrapp.Class.prototype.extended = function( constructor ) {
        var proto = this;

        while ( typeof proto.constructor !== 'undefined' ) {
          if ( proto.constructor === constructor )
            return true;
          if ( typeof proto.constructor.__super__ === 'undefined' )
            return false;
          proto = proto.constructor.__super__;
        }
        return false;
      };
      czrapp.Events = {
        trigger: function( id ) {
          if ( this.topics && this.topics[ id ] )
            this.topics[ id ].fireWith( this, slice.call( arguments, 1 ) );
          return this;
        },

        bind: function( id ) {
          this.topics = this.topics || {};
          this.topics[ id ] = this.topics[ id ] || $.Callbacks();
          this.topics[ id ].add.apply( this.topics[ id ], slice.call( arguments, 1 ) );
          return this;
        },

        unbind: function( id ) {
          if ( this.topics && this.topics[ id ] )
            this.topics[ id ].remove.apply( this.topics[ id ], slice.call( arguments, 1 ) );
          return this;
        }
      };
      czrapp.Value = czrapp.Class.extend({
        initialize: function( initial, options ) {
          this._value = initial; // @todo: potentially change this to a this.set() call.
          this.callbacks = $.Callbacks();
          this._dirty = false;

          $.extend( this, options || {} );

          this.set = $.proxy( this.set, this );
        },
        instance: function() {
          return arguments.length ? this.set.apply( this, arguments ) : this.get();
        },
        get: function() {
          return this._value;
        },
        set: function( to, o ) {
              var from = this._value, dfd = $.Deferred(), self = this, _promises = [];

              to = this._setter.apply( this, arguments );
              to = this.validate( to );
              args = _.extend( { silent : false }, _.isObject( o ) ? o : {} );
              if ( null === to || _.isEqual( from, to ) ) {
                    return dfd.resolveWith( self, [ to, from, o ] ).promise();
              }

              this._value = to;
              this._dirty = true;
              if ( true === args.silent ) {
                    return dfd.resolveWith( self, [ to, from, o ] ).promise();
              }

              if ( this._deferreds ) {
                    _.each( self._deferreds, function( _prom ) {
                          _promises.push( _prom.apply( null, [ to, from, o ] ) );
                    });

                    $.when.apply( null, _promises )
                          .fail( function() { api.errorLog( 'A deferred callback failed in api.Value::set()'); })
                          .then( function() {
                                self.callbacks.fireWith( self, [ to, from, o ] );
                                dfd.resolveWith( self, [ to, from, o ] );
                          });
              } else {
                    this.callbacks.fireWith( this, [ to, from, o ] );
                    return dfd.resolveWith( self, [ to, from, o ] ).promise( self );
              }
              return dfd.promise( self );
        },
        silent_set : function( to, dirtyness ) {
              var from = this._value,
                  _save_state = api.state('saved')();

              to = this._setter.apply( this, arguments );
              to = this.validate( to );
              if ( null === to || _.isEqual( from, to ) ) {
                return this;
              }

              this._value = to;
              this._dirty = ( _.isUndefined( dirtyness ) || ! _.isBoolean( dirtyness ) ) ? this._dirty : dirtyness;

              this.callbacks.fireWith( this, [ to, from, { silent : true } ] );
              api.state('saved')( _save_state );
              return this;
        },

        _setter: function( to ) {
          return to;
        },

        setter: function( callback ) {
          var from = this.get();
          this._setter = callback;
          this._value = null;
          this.set( from );
          return this;
        },

        resetSetter: function() {
          this._setter = this.constructor.prototype._setter;
          this.set( this.get() );
          return this;
        },

        validate: function( value ) {
          return value;
        },
        bind: function() {
            var self = this,
                _isDeferred = false,
                _cbs = [];

            $.each( arguments, function( _key, _arg ) {
                  if ( ! _isDeferred )
                    _isDeferred = _.isObject( _arg  ) && _arg.deferred;
                  if ( _.isFunction( _arg ) )
                    _cbs.push( _arg );
            });

            if ( _isDeferred ) {
                  self._deferreds = self._deferreds || [];
                  _.each( _cbs, function( _cb ) {
                        if ( ! _.contains( _cb, self._deferreds ) )
                          self._deferreds.push( _cb );
                  });
            } else {
                  self.callbacks.add.apply( self.callbacks, arguments );
            }
            return this;
        },
        unbind: function() {
          this.callbacks.remove.apply( this.callbacks, arguments );
          return this;
        },
      });
      czrapp.Values = czrapp.Class.extend({
        defaultConstructor: czrapp.Value,

        initialize: function( options ) {
          $.extend( this, options || {} );

          this._value = {};
          this._deferreds = {};
        },
        instance: function( id ) {
          if ( arguments.length === 1 )
            return this.value( id );

          return this.when.apply( this, arguments );
        },
        value: function( id ) {
          return this._value[ id ];
        },
        has: function( id ) {
          return typeof this._value[ id ] !== 'undefined';
        },
        add: function( id, value ) {
          if ( this.has( id ) )
            return this.value( id );

          this._value[ id ] = value;
          value.parent = this;
          if ( value.extended( czrapp.Value ) )
            value.bind( this._change );

          this.trigger( 'add', value );
          if ( this._deferreds[ id ] )
            this._deferreds[ id ].resolve();

          return this._value[ id ];
        },
        create: function( id ) {
          return this.add( id, new this.defaultConstructor( czrapp.Class.applicator, slice.call( arguments, 1 ) ) );
        },
        each: function( callback, context ) {
          context = typeof context === 'undefined' ? this : context;

          $.each( this._value, function( key, obj ) {
            callback.call( context, obj, key );
          });
        },
        remove: function( id ) {
          var value;

          if ( this.has( id ) ) {
            value = this.value( id );
            this.trigger( 'remove', value );
            if ( value.extended( czrapp.Value ) )
              value.unbind( this._change );
            delete value.parent;
          }

          delete this._value[ id ];
          delete this._deferreds[ id ];
        },
        when: function() {
          var self = this,
            ids  = slice.call( arguments ),
            dfd  = $.Deferred();
          if ( $.isFunction( ids[ ids.length - 1 ] ) )
            dfd.done( ids.pop() );
          $.when.apply( $, $.map( ids, function( id ) {
            if ( self.has( id ) )
              return;
            return self._deferreds[ id ] || $.Deferred();
          })).done( function() {
            var values = $.map( ids, function( id ) {
                return self( id );
              });
            if ( values.length !== ids.length ) {
              self.when.apply( self, ids ).done( function() {
                dfd.resolveWith( self, values );
              });
              return;
            }

            dfd.resolveWith( self, values );
          });

          return dfd.promise();
        },
        _change: function() {
          this.parent.trigger( 'change', this );
        }
      });
      $.extend( czrapp.Values.prototype, czrapp.Events );

})( jQuery );var czrapp = czrapp || {};

( function ( czrapp, $, _ ) {
      $.extend( czrapp, czrapp.Events );
      czrapp.Root           = czrapp.Class.extend( {
            initialize : function( options ) {
                  $.extend( this, options || {} );
                  this.isReady = $.Deferred();
            },
            ready : function() {
                  var self = this;
                  if ( self.dom_ready && _.isArray( self.dom_ready ) ) {
                        czrapp.status = czrapp.status || [];
                        _.each( self.dom_ready , function( _m_ ) {
                              if ( ! _.isFunction( _m_ ) && ! _.isFunction( self[_m_]) ) {
                                    czrapp.status.push( 'Method ' + _m_ + ' was not found and could not be fired on DOM ready.');
                                    return;
                              }
                              try { ( _.isFunction( _m_ ) ? _m_ : self[_m_] ).call( self ); } catch( er ){
                                    czrapp.status.push( [ 'NOK', self.id + '::' + _m_, _.isString( er ) ? czrapp._truncate( er ) : er ].join( ' => ') );
                                    return;
                              }
                        });
                  }
                  this.isReady.resolve();
            }
      });

      czrapp.Base           = czrapp.Root.extend( czrapp.methods.Base );
      czrapp.ready          = $.Deferred();
      czrapp.bind( 'czrapp-ready', function() {
            czrapp.ready.resolve();
      });
      var _instantianteAndFireOnDomReady = function( newMap, previousMap, isInitial ) {
            if ( ! _.isObject( newMap ) )
              return;
            _.each( newMap, function( params, name ) {
                  if ( czrapp[ name ] || ! _.isObject( params ) )
                    return;

                  params = _.extend(
                        {
                              ctor : {},//should extend czrapp.Base with custom methods
                              ready : [],//a list of method to execute on dom ready,
                              options : {}//can be used to pass a set of initial params to set to the constructors
                        },
                        params
                  );
                  var ctorOptions = _.extend(
                      {
                          id : name,
                          dom_ready : params.ready || []
                      },
                      params.options
                  );

                  try { czrapp[ name ] = new params.ctor( ctorOptions ); }
                  catch( er ) {
                        czrapp.errorLog( 'Error when loading ' + name + ' | ' + er );
                  }
            });
            $(function ($) {
                  _.each( newMap, function( params, name ) {
                        if ( czrapp[ name ] && czrapp[ name ].isReady && 'resolved' == czrapp[ name ].isReady.state() )
                          return;
                        if ( _.isObject( czrapp[ name ] ) && _.isFunction( czrapp[ name ].ready ) ) {
                              czrapp[ name ].ready();
                        }
                  });
                  czrapp.status = czrapp.status || 'OK';
                  if ( _.isArray( czrapp.status ) ) {
                        _.each( czrapp.status, function( error ) {
                              czrapp.errorLog( error );
                        });
                  }
                  czrapp.trigger( isInitial ? 'czrapp-ready' : 'czrapp-updated' );
            });
      };//_instantianteAndFireOnDomReady()
      czrapp.appMap = new czrapp.Value( {} );
      czrapp.appMap.bind( _instantianteAndFireOnDomReady );//<=THE MAP IS LISTENED TO HERE
      czrapp.customMap = new czrapp.Value( {} );
      czrapp.customMap.bind( _instantianteAndFireOnDomReady );//<=THE CUSTOM MAP IS LISTENED TO HERE


})( czrapp, jQuery, _ );