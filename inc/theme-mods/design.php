<?php
/**
 * Design
 *
 * @package Fmi
 */

// Add new section
Kirki::add_section( 'design_section', array(
  'title'      => esc_html__( 'Design', 'fmi' ),
  'priority'   => 21,
) );

// Primary color
Kirki::add_field( 'vs_theme_mod', array(
  'type'       => 'color',
  'settings'   => 'design_primary_color',
  'label'      => esc_html__( 'Primary Color', 'fmi' ),
  'section'    => 'design_section',
  'priority'   => 10,
  'default'    => '#23b2dd',
  'output'     => array(
    array(
      'element'=> '
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

.about-author-name a:hover,

.archive-wrap .entry-header .entry-title a:hover,

.entry-meta a:hover,
.entry-meta a:focus,

.entry-footer a:hover,
.entry-footer a:focus,

.widget a:hover,
.widget a:focus,

.comment-meta a:hover,
.comment-meta a:focus,

.comment-meta .fn a:hover,
.comment-meta .fn a:focus,

.pagination .nav-links a:hover,
.pagination .nav-links a:focus,

.pagination .nav-links .current,

.site-info a:hover,
.site-info a:focus,

.owl-theme .owl-controls .owl-page:hover span, 
.owl-theme .owl-controls .owl-page:focus span, 
.owl-theme .owl-controls .active span,

.slider-wrap .owl-theme .owl-controls .owl-buttons div
                  ',
      'property'=> 'color',
    ),
    array(
      'element'=> '
button,
input[type="button"],
input[type="reset"],
input[type="submit"],

.widget_tag_cloud a:hover,

.slider-title a,

.owl-theme .owl-controls .owl-page:hover span, 
.owl-theme .owl-controls .owl-page:focus span, 
.owl-theme .owl-controls .active span
                  ',
      'property'=> 'background-color',
    ),
    array(
      'element'=> '
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
textarea:focus
                  ',
      'property'=> 'border-color',
    ),
  ),
) );
