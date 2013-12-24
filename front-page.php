<?php	
/**
* @Theme Name	:	rambo
* @file         :	front-page.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/front-page.php
*/ 
$is_front_page = get_option('rambo_theme_options');
	if (  $is_front_page['front_page'] != 'on' ) {
	get_template_part('index');
	}	
	else {
	get_header();

	/****** get index slider  ********/
	get_template_part('index', 'slider') ;
	
	/****** get index service  ********/
	get_template_part('index', 'service') ;
	
	/****** get footer section *********/
	get_footer(); 
	}
?>