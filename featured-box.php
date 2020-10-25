<?php
/* 	SPARK Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since SPARK 1.0
*/

$fboxf = '';
$fboxfin = ''; $fbfttl = ''; $fbfdes = '';
$fbfttl = esc_textarea(spark_get_option('featuredr-title', ''));
if($fbfttl) $fboxfin .= '<h2>'.$fbfttl.'</h2><div class="content-ver-sep"></div>'; 
$fbfdes = esc_textarea(spark_get_option('featuredr-description',  ''));
if($fbfdes) $fboxfin .= '<p>'.$fbfdes.'</p>';

if($fboxfin) $fboxf .= '<div class="featured-box-first featured-box">'.$fboxfin.'</div>';

foreach (range(1, 3) as $fboxn) { 
	$fboxfin = ''; $fbfimg = ''; $fbfttl = ''; $fbfdes = '';
	$fbfimg = esc_url(spark_get_option('featured-image' . $fboxn, ''));
	if($fbfimg) $fboxfin .= '<img class="box-image" src="'.$fbfimg.'"/>';
	$fbfttl = esc_textarea(spark_get_option('featured-title' . $fboxn,  ''));
	if($fbfttl) $fboxfin .= '<h3>'.$fbfttl.'</h3><div class="content-ver-sep"></div>'; 
	$fbfdes = esc_textarea(spark_get_option('featured-description' . $fboxn ,  ''));
	if($fbfdes) $fboxfin .= '<p>'.$fbfdes.'</p>';
	
	if($fboxfin) $fboxf .= '<div class="featured-box">'.$fboxfin.'</div>';	
} 
if($fboxf) echo '<div class="featured-boxs">'.$fboxf.'<div class="lsep"></div></div>'; 


$fboxf = '';
$fboxfin = ''; $fbfttl = ''; $fbfdes = '';
$fbfttl = esc_textarea(spark_get_option('featuredrsecond-title', ''));
if($fbfttl): $fboxfin .= '<h2>'.$fbfttl.'</h2>'; $fboxfin .= '<div class="content-ver-sep"></div>'; endif;
$fbfdes = esc_textarea(spark_get_option('featuredrsecond-description', ''));
if($fbfdes) $fboxfin .= '<p>'.$fbfdes.'</p>';

if($fboxfin) $fboxf .= '<div class="featured-box-first featured-box">'.$fboxfin.'</div>';

foreach (range(1, 3) as $fboxn2) { 
	$fboxfin = ''; $fbfttl = ''; $fbfdes = '';		
	$fbfttl = esc_textarea(spark_get_option('featured-title2' . $fboxn2, ''));
	if($fbfttl) $fboxfin .= '<div class="icontitle"><img class="box-icon" src="'.esc_url(get_template_directory_uri() . '/images/featured-image.png').'" /><h3 class="featured-box2">'.$fbfttl.'</h3></div><div class="clear"></div>'; 
	$fbfdes = esc_textarea(spark_get_option('featured-description2' . $fboxn2 , ''));
	if($fbfdes) $fboxfin .= '<p>'.$fbfdes.'</p>';
	
	if($fboxfin) $fboxf .= '<div class="featured-box">'.$fboxfin.'</div>';	
} 
if($fboxf && spark_get_option('srfbox', '1')) echo '<div class="featured-boxs">'.$fboxf.'</div>';