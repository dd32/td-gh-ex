<?php
/**
* @Theme Name	:	Corpbiz
* @file         :	front-page.php
* @package      :	Corpbiz
* @author       :	Priyanshu Mittal
* @filesource   :	wp-content/themes/corpbiz/front-page.php
*/
	$current_options = get_option('corpbiz_options');
	if (  $current_options['front_page'] != 'on' ) {
	get_template_part('index');
	}	
	else 
	{
		get_header();
		get_template_part('index', 'slider');
		
		//****** get index service  ********
		get_template_part('index', 'site-info');
		
		//****** get index service  ********
		get_template_part('index', 'service');
		
		//****** get index project  ********
		get_template_part('index', 'portfolio');
		
		get_footer(); 
	}
?>