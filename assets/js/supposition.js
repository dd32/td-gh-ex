(function($) {
  jQuery.fn.supposition = function() {
    var $w = jQuery(window),
      /*do this once instead of every onBeforeShow call*/
      _offset = function(dir) {
        return window[dir == 'y' ? 'pageYOffset' : 'pageXOffset'] || document.documentElement && document.documentElement[dir == 'y' ? 'scrollTop' : 'scrollLeft'] || document.body[dir == 'y' ? 'scrollTop' : 'scrollLeft'];
      },
      onInit = function() {
        /* I haven't touched this bit - needs work as there are still z-index issues */
        $topNav = jQuery('li', this);
        var cZ = parseInt($topNav.css('z-index')) + $topNav.length;
        $topNav.each(function() {
          jQuery(this).css({
            zIndex: --cZ
          });
        });
      },
      onHide = function() {
        this.css({
          marginTop: '',
          marginLeft: ''
        });
      },
      onBeforeShow = function() {
        this.each(function() {
          var $u = jQuery(this);
          $u.css('display', 'block');
          var menuWidth = $u.width(),
            parentWidth = $u.parents('ul').width(),
            totalRight = $w.width() + _offset('x'),
            menuRight = $u.offset().left + menuWidth;
          if (menuRight > totalRight) {
            $u.css('margin-left', ($u.parents('ul').length == 1 ? totalRight - menuRight : -(menuWidth + parentWidth)) + 'px');
          }

          var windowHeight = $w.height(),
            offsetTop = $u.offset().top,
            menuHeight = $u.height(),
            baseline = windowHeight + _offset('y');
          var expandUp = (offsetTop + menuHeight > baseline);
          if (expandUp) {
            $u.css('margin-top', baseline - (menuHeight + offsetTop));
          }
          $u.css('display', 'none');
        });
      };

    return this.each(function() {
      var $this = jQuery(this),
        o = $this.data('sf-options'); /* get this menu's options */

      /* if callbacks already set, store them */
      var _onInit = o.onInit,
        _onBeforeShow = o.onBeforeShow,
        _onHide = o.onHide;

      jQuery.extend($this.data('sf-options'), {
        onInit: function() {
          onInit.call(this); /* fire our Supposition callback */
          _onInit.call(this); /* fire stored callbacks */
        },
        onBeforeShow: function() {
          onBeforeShow.call(this); /* fire our Supposition callback */
          _onBeforeShow.call(this); /* fire stored callbacks */
        },
        onHide: function() {
          onHide.call(this); /* fire our Supposition callback */
          _onHide.call(this); /* fire stored callbacks */
        }
      });
    });
  };

})(jQuery);
(function($) { //create closure so we can safely use $ as alias for jQuery

  jQuery(document).ready(function() {

    // initialise plugin
    var example = jQuery('#example').superfish({
         speed:'fast', 					
    }).supposition();

  });

})(jQuery);