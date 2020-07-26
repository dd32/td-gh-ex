<?php
/* 	GREEN EYE Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since GREEN 1.0
*/


$fboxs = '';
foreach (range(1, 8) as $fboxn) {
	$boxv = green_get_option('fbox-show' . $fboxn, '1');
	if(!$boxv) continue;
	$fbox = '';
	$fimg = green_get_option('featured-image' . $fboxn, '');
	if($fimg) $fbox .= '<img class="box-image" src="'.esc_url($fimg).'"/>';
	$fttl = green_get_option('featured-title' . $fboxn, '');
	if($fttl) $fbox .= '<h3>'.esc_textarea($fttl).'</h3>';
	$fdes = green_get_option('featured-description' . $fboxn , ''); 
	if($fdes) $fbox .= '<p>'.esc_textarea($fdes).'</p>';
	
	if($fbox) $fboxs .= '<span class="featured-box">'.$fbox.'</span>';	
}

if($fboxs) echo '<div id="featured-boxs">'.$fboxs.'</div><div class="content-ver-sep"> </div><br/><br/>';