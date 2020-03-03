<?php
/* 	Small Business Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Small Business 1.0
*/

$fboxcons = '';

$fboxttl = ''; $fboxdes = ''; $fboxlnk = '';
$fboxcon = '';
$fboxttl = wp_kses_post(smallbusiness_get_option('featured-title1', ''));
$fboxdes = wp_kses_post(smallbusiness_get_option('featured-description1', ''));
$fboxlnk = esc_url(smallbusiness_get_option('featured-link1', ''));

if($fboxttl): $fboxttl = smallbusiness_linkandtarget('<h2>'.$fboxttl.'</h2>',$fboxlnk); endif;
if($fboxdes): $fboxdes = '<p>'.$fboxdes.'</p>'; endif;
if($fboxlnk): $fboxlnk = smallbusiness_linkandtarget(__(' ... Read More ... ', 'small-business'),$fboxlnk,'','','fealink','1'); endif;
$fboxcon = $fboxttl.$fboxdes.$fboxlnk;

if($fboxcon): $fboxcons .= '<div class="featured-box-first">'.$fboxcon.'</div>';  endif;


$fboxttl = ''; $fboxdes = ''; $fboxlnk = '';
$fboxcon = '';
$fboxttl = wp_kses_post(smallbusiness_get_option('featured-title2', ''));
$fboxdes = wp_kses_post(smallbusiness_get_option('featured-description2', ''));
$fboxlnk = esc_url(smallbusiness_get_option('featured-link2', ''));

if($fboxttl): $fboxttl = smallbusiness_linkandtarget('<h2>'.$fboxttl.'</h2>',$fboxlnk); endif;
if($fboxdes): $fboxdes = '<p>'.$fboxdes.'</p>'; endif;
if($fboxlnk): $fboxlnk = smallbusiness_linkandtarget(__(' ... Read More ... ', 'small-business'),$fboxlnk,'','','fealink','1'); endif;
$fboxcon = $fboxttl.$fboxdes.$fboxlnk;

if($fboxcon): $fboxcons .= '<div class="featured-box">'.$fboxcon.'</div>';  endif;


$fboxttl = ''; $fboxdes = ''; $fboxlnk = '';
$fboxcon = '';
$fboxttl = wp_kses_post(smallbusiness_get_option('featured-title3', ''));
$fboxdes = wp_kses_post(smallbusiness_get_option('featured-description3', ''));
$fboxlnk = esc_url(smallbusiness_get_option('featured-link3', ''));

if($fboxttl): $fboxttl = smallbusiness_linkandtarget('<h2>'.$fboxttl.'</h2>',$fboxlnk); endif;
if($fboxdes): $fboxdes = '<p>'.$fboxdes.'</p>'; endif;
if($fboxlnk): $fboxlnk = smallbusiness_linkandtarget(__(' ... Read More ... ', 'small-business'),$fboxlnk,'','','fealink','1'); endif;
$fboxcon = $fboxttl.$fboxdes.$fboxlnk;

if($fboxcon): $fboxcons .= '<div class="featured-box">'.$fboxcon.'</div>';  endif;

if($fboxcons): echo '<div id="featured-boxs">'.$fboxcons.'</div><div class="content-ver-sep"></div><br>'; endif;