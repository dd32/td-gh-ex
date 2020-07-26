<?php
/*
	Template Name: Front Page
	GREEN EYE Theme's Front Page to Display the Home Page if Selected
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since GREEN 1.0
*/
get_header(); ?>       
<div id="container">
<?php
$heading = green_get_option('heading_text', '');
if($heading) echo '<h1 id="heading">'.esc_textarea($heading).'</h1>';	
$headingdes = green_get_option('heading_des', '');
if($headingdes) echo '<p class="heading-desc">'.wp_kses_post($headingdes).'</p>';	
get_template_part( 'featured-box' ); 
get_template_part( 'fcontent' );
	
$quote = green_get_option('bottom-quotation', '');	
if($quote) echo '<div class="content-ver-sep"></div><div class="fpage-quote"><div class="customers-comment">
<ul><li><q>'.esc_textarea($quote).'</q></li></ul></div></div>';	
get_footer();