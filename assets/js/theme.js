/**
 * Theme name: Fmi
 */

( function( $ ) {
  'use strict';

/**
 * Homepage Slider
 */
function initHomepageSlider() {
    $('.slider-cycle').owlCarousel({
      singleItem: true,
      slideSpeed : 600,
      paginationSpeed: 600,
      rewindSpeed: 1000,
      autoPlay: 5000,
      stopOnHover: true,
      navigation : true,
      navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      pagination: true,
    });
}

$( document ).ready( function() {
  initHomepageSlider();
  $( document.body ).on( 'post-load', function() {
    initHomepageSlider();
  } );
} );

/**
 * Navigation Sidebar
 */
$.fn.responsiveNav = function() {
  this.removeClass( 'menu-item-expanded' );
  if ( this.prev().hasClass( 'submenu-visible' ) ) {
    this.prev().removeClass( 'submenu-visible' ).slideUp( 350 );
    this.parent().removeClass( 'menu-item-expanded' );
  } else {
    this.parent().parent().find( '.menu-item .sub-menu' ).removeClass( 'submenu-visible' ).slideUp( 350 );
    this.parent().parent().find( '.menu-item-expanded' ).removeClass( 'menu-item-expanded' );
    this.prev().toggleClass( 'submenu-visible' ).hide().slideToggle( 350 );
    this.parent().toggleClass( 'menu-item-expanded' );
  }
};

function navigation_sidebar( e ) {
  $( '.widget_nav_menu .menu-item-has-children' ).each( function( e ) {
    $( this ).append( '<span></span>' );
    $( '> span', this ).on( 'click', function( e ) {
      e.preventDefault();
      $( this ).responsiveNav();
    } );
    if ( '#' === $( '> a', this ).attr( 'href' ) ) {
      $( '> a', this ).on( 'click', function( e ) {
        e.preventDefault();
        $( this ).next().next().responsiveNav();
      } );
    }
  } );
}

$( document ).ready( function( e ) {
  navigation_sidebar( e );
} );

/**
 * Offcanvas
 */
$( '.toggle-offcanvas, .site-overlay' ).on( 'click', function( e ) {
  e.preventDefault();

  if ( !$( 'body' ).hasClass( 'offcanvas-active' ) ) {
    $( 'body' ).addClass( 'offcanvas-transition' );
  } else {
    setTimeout( function() {
      $( 'body' ).removeClass( 'offcanvas-transition' );
    }, 400 );
  }

  $( 'body' ).toggleClass( 'offcanvas-active' );
} );

/**
 * Scroll To Top
 */
function scroll_to_top() {
  window.addEventListener( 'scroll', function( e ) {
    var offset = $( 'body' ).innerHeight() * 0.1;
    if ( $( this ).scrollTop() > offset ) {
      $( '.vs-scroll-to-top' ).addClass( 'vs-active' );
    } else {
      $( '.vs-scroll-to-top' ).removeClass( 'vs-active' );
    }
  } );

  $( '.vs-scroll-to-top' ).on( 'click', function() {
    $( 'body, html' ).animate( {
      scrollTop: 0
    }, 400 );
    return false;
  } );
}

$( document ).ready( function() {
  scroll_to_top();
} );

} )( jQuery );
