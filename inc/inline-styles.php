<?php
/**
 * Custom stylesheet
 *
 * @package Fmi
 */

function vs_inline_styles() {

  $inline_styles = '';

  $design_primary_color = get_theme_mod( 'design_primary_color', '#23b2dd' );
  if ( '#23b2dd' !== $design_primary_color ) {
    $inline_styles .= '
a,

a:hover, a:focus, a:active,

.site-title a,

.site-title a:hover,
.site-title a:focus,
.site-title a:active,

.main-navigation .menu >li >a:hover,
.main-navigation .menu >li >a:focus,

.main-navigation .menu >li ul li a:hover,
.main-navigation .menu >li ul li a:focus,

.responsive-nav >li a:hover,
.responsive-nav >li a:focus,

.post-author .author-name a:hover,
.post-author .author-name a:focus,

.post-author .author-social a:hover i,
.post-author .author-social a:focus i,

.archive-wrap .archive-full .entry-header .entry-title a:hover,
.archive-wrap .archive-full .entry-header .entry-title a:focus,

.entry-meta-inner a:hover,
.entry-meta-inner a:focus,

.entry-details-inner a:hover,
.entry-details-inner a:focus,

.widget a:hover,
.widget a:focus,

.comment-meta a:hover,
.comment-meta a:focus,

.comment-meta .fn a:hover,
.comment-meta .fn a:focus,

.pagination .nav-links a:hover,
.pagination .nav-links a:focus,

.pagination .nav-links .current,

.site-info-inner a:hover,
.site-info-inner a:focus,

.owl-theme .owl-controls .owl-page:hover span, 
.owl-theme .owl-controls .owl-page:focus span, 
.owl-theme .owl-controls .active span,

.slider-wrap .owl-theme .owl-controls .owl-buttons div {
  color: '.$design_primary_color.';
}

button,
input[type="button"],
input[type="reset"],
input[type="submit"],

.widget_tag_cloud a:hover,

.slider-title a,

.owl-theme .owl-controls .owl-page:hover span, 
.owl-theme .owl-controls .owl-page:focus span, 
.owl-theme .owl-controls .active span {
  background-color: '.$design_primary_color.';
}

blockquote,

input[type="text"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="password"]:focus,
input[type="search"]:focus,
input[type="number"]:focus,
input[type="tel"]:focus,
input[type="range"]:focus,
input[type="date"]:focus,
input[type="month"]:focus,
input[type="week"]:focus,
input[type="time"]:focus,
input[type="datetime"]:focus,
input[type="datetime-local"]:focus,
input[type="color"]:focus,
textarea:focus {
  border-color: '.$design_primary_color.';
}
    ';
  }

  wp_add_inline_style( 'vs-styles', $inline_styles );
}
add_action( 'wp_enqueue_scripts', 'vs_inline_styles' );
