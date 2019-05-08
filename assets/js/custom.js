/**
 * @since 1.0.0
 * jquery all settings hear
 */
jQuery(document).ready(function ($) {
  /**
   * @since 1.0.0
   * Academic Hub Slider
   */
  jQuery(".academic-home-slider-sec").slick({
    arrows: true,
    autoplay: true,
    dots: false,
    fade: false,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false
        }
      }
    ]
  });
});

jQuery(document).ready(function () {

	/**
	 * Onepage nav closing issue on menu item click
	 */
  // Hide nav if screen size <= 980px
  function hideNav(mdmScreen) {
    if (mdmScreen.matches) { // If media query matches
      jQuery('.main-navigation .menu').slideUp('slow');
    } else {
      jQuery('#site-navigation ul').show();
    }
  }

  // Define match media size ( <= 980px )
  var mdmScreen = window.matchMedia("(max-width: 980px)");

  // Hide
  hideNav(mdmScreen);

  // Show/hide menu on resize state change
  mdmScreen.addListener(hideNav);

  // Hide nav on Onepage menu item click if screen size <= 980px
  jQuery('#site-navigation li > a[href*="#"]').click(function () {
    hideNav(mdmScreen);
  });
  // End Onepage nav

	/**
	 * Search
	 */
  var hideSearchForm = function () {
    jQuery('.search-wrap .search-box').removeClass('active');
  };
  jQuery('.search-wrap .search-icon').on('click', function () {
    jQuery('.search-wrap .search-box').toggleClass('active');

    // focus after some time to fix conflict with toggleClass
    setTimeout(function () {
      jQuery('.search-wrap .search-box.active input').focus();
    }, 200);

    // For esc key press.
    jQuery(document).on('keyup', function (e) {

      // on esc key press.
      if (27 === e.keyCode) {
        // if search box is opened
        if (jQuery('.search-wrap .search-box').hasClass('active')) {
          hideSearchForm();
        }

      }
    });

    jQuery(document).on('click.outEvent', function (e) {
      if (e.target.closest('.search-wrap')) {
        return;
      }

      hideSearchForm();

      // Unbind current click event.
      jQuery(document).off('click.outEvent');
    });

  });

	/**
	 * Navigation
	 */
  // Append caret icon on menu item with submenu
  jQuery('.main-navigation .menu-item-has-children').append('<span class="sub-toggle"> <i class="fa fa-angle-down"></i> </span>');

  // Mobile menu toggle clicking on hamburger icon
  jQuery('.main-navigation .menu-toggle').click(function () {
    jQuery('.main-navigation .menu').slideToggle('slow');
  });

  // Mobile submenu toggle on click
  jQuery('.main-navigation .sub-toggle').on('click', function () {
    var currentIcon = jQuery(this).children('.fa');
    var currentSubMenu = jQuery(this).parent('li'),
      menuWithChildren = currentSubMenu.siblings('.menu-item-has-children');

    // get siblings icons
    var siblingsIcon = menuWithChildren.find('.fa');

    currentIcon.toggleClass('animate-icon');

    if (siblingsIcon.hasClass('animate-icon')) {
      siblingsIcon.removeClass('animate-icon');
    }

    menuWithChildren.not(currentSubMenu).removeClass('mobile-menu--slided').children('ul').slideUp('1000');
    currentSubMenu.toggleClass('mobile-menu--slided').children('ul').slideToggle('1000');
  });

  // One Page Nav
  jQuery(window).load(function () {
    var top_offset = jQuery('#masthead-sticky-wrapper').height() - 1;
    jQuery('#site-navigation').onePageNav({
      currentClass: 'current-academic-hub-item',
      changeHash: false,
      scrollSpeed: 1500,
      scrollOffset: top_offset,
      scrollThreshold: 0.5,
      filter: '',
      easing: 'swing',
    });
  });

  // Sticky menu
  if (typeof jQuery.fn.sticky !== 'undefined') {
    var wpAdminBar = jQuery('#wpadminbar');
    if (wpAdminBar.length) {
      jQuery('.header-sticky .site-header').sticky({ topSpacing: wpAdminBar.height() });
    } else {
      jQuery('.header-sticky .site-header').sticky({ topSpacing: 0 });
    }
  }





});