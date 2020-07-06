<?php
/* 	Design Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/

$fimages = '';
foreach (range(1, 3) as $fboxn) {
	$fimage = '';
	$fimagelink = '#'; $fimageimg = '';
	$fimagelink = design_get_option('featured-link'.$fboxn, '#');
	$fimageimg = design_get_option('featured-image'.$fboxn, '');
	if($fimageimg) $fimages .= '<span class="featured-box"><a href="'.esc_url($fimagelink).'"><img src="'.esc_url($fimageimg).'"/><span class="read-more"></span></a></span>';	
}
if($fimages) echo '<div class="featured-boxs">'.$fimages.'</div><div class="sep3">...</div>';

$fcontents = '';
foreach (range(1, 2) as $fcon) {
	$fcontent = '';
	$fimagelink = '#'; $fcontenttitle1 = ''; $fcontenttitle2 = ''; $fcontentdes = '';
	$fcontentlink = design_get_option('fcontent-link'.$fcon, '#');
	$fcontenttitle1 = design_get_option('fcontent01-title'.$fcon, '');
	$fcontenttitle2 = design_get_option('fcontent02-title'.$fcon, '');
	if($fcontenttitle2) $fcontenttitle2 = '<span>'.esc_textarea($fcontenttitle2).'</span>';
	if($fcontenttitle1 || $fcontenttitle1) $fcontenttitle1 = '<h2>'.esc_textarea($fcontenttitle1).$fcontenttitle2.'</h2>';
	$fcontentdes = design_get_option('fcontent-description'.$fcon, '');
	if($fcontentdes) $fcontentdes ='<p>'.esc_textarea($fcontentdes).'</p>';
	
	if($fcontenttitle1 || $fcontentdes) $fcontents .= '<span class="featured-content'.$fcon.'">'.$fcontenttitle1.$fcontentdes.'<a href="'.esc_url($fcontentlink).'" class="read-more"></a></span>';
}

if($fcontents) echo $fcontents.'<div class="sep2">...</div>';