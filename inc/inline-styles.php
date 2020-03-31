<?php
/**
 * custom stylesheet
 *
 * @package Fmi
 */

function vs_inline_styles() {

  $inline_styles = '';

  $design_primary_color = get_theme_mod( 'design_primary_color', '#23b2dd' );
  if ( '#23b2dd' !== $design_primary_color ) {
    $inline_styles .= '
blockquote{
  border-left: 4px solid '.$design_primary_color.';
}
button,
input[type="button"],
input[type="reset"],
input[type="submit"]{
  background: '.$design_primary_color.';
}
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
textarea:focus{
  border:1px solid '.$design_primary_color.';
}
a{
  color:'.$design_primary_color.';
}
a:hover, a:focus, a:active {
  color: '.$design_primary_color.';
}
.site-title a{
  color:'.$design_primary_color.';
}
.site-title a:hover,
.site-title a:focus,
.site-title a:active{
  color:'.$design_primary_color.';
}
.main-navigation .menu >li >a:hover,
.main-navigation .menu >li >a:focus{
  color: '.$design_primary_color.';
}
.main-navigation .menu >li ul li a:hover,
.main-navigation .menu >li ul li a:focus{
  color: '.$design_primary_color.';
}
.responsive-nav >li a:hover,
.responsive-nav >li a:focus{
  color: '.$design_primary_color.';
}
.about-author-name a:hover{
  color: '.$design_primary_color.';
}
.archive-wrap .entry-header .entry-title a:hover {
  color:'.$design_primary_color.';
}
.entry-meta a:hover,
.entry-meta a:focus{
  color:'.$design_primary_color.';
}
.entry-footer a:hover,
.entry-footer a:focus{
  color:'.$design_primary_color.';
}
.widget a:hover,
.widget a:focus{
  color:'.$design_primary_color.';
}
.widget_tag_cloud a:hover {
  background-color: '.$design_primary_color.';
}

.comment-meta a:hover,
.comment-meta a:focus{
  color:'.$design_primary_color.';
}
.comment-meta .fn a:hover,
.comment-meta .fn a:focus{
  color:'.$design_primary_color.';
} 
.pagination .nav-links a:hover,
.pagination .nav-links a:focus{
  color:'.$design_primary_color.';
}
.pagination .nav-links .current {
  color:'.$design_primary_color.';
}
.site-info a:hover,
.site-info a:focus{
  color:'.$design_primary_color.';
}
.slider-title a {
  background: '.$design_primary_color.';
}
.owl-theme .owl-controls .owl-page:hover span, 
.owl-theme .owl-controls .owl-page:focus span, 
.owl-theme .owl-controls .active span{
  color: '.$design_primary_color.';
  background-color: '.$design_primary_color.';
}
.slider-wrap .owl-theme .owl-controls .owl-buttons div {
  color: '.$design_primary_color.';
}
    ';
  }

  $blog_images_hover_effects = get_theme_mod('blog_images_hover_effects', 0);
  if ($blog_images_hover_effects&&!is_singular()) {
    $inline_styles .= '
.post-media img{
  display: block;
  max-width: 100%;
  width: auto;
  height: auto;
  margin: 0 auto;

  -webkit-transition: all 0.2s ease-out;
  -moz-transition: all 0.2s ease-out;
  -o-transition: all 0.2s ease-out;
  transition: all 0.2s ease-out;
}
.post-media:hover img {
  -webkit-transform: scale(1.04);
  -moz-transform: scale(1.04);
  -ms-transform: scale(1.04);
  -o-transform: scale(1.04);
  transform: scale(1.04);
}
    ';
  }

  wp_add_inline_style('vs-style', $inline_styles);

}
add_action('wp_enqueue_scripts', 'vs_inline_styles');
