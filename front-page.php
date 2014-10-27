<?php
/**
* @Theme Name	:	wallstreet
* @file         :	front-page.php
* @package      :	wallstreet
* @author       :	Harish Lodha
* @filesource   :	wp-content/themes/wallstreet/front-page.php
*/
$current_options = get_option('wallstreet_lite_options');
	if (  $current_options['front_page'] != 'on' ) {
	get_template_part('index');
	}	
	else 
	{
		get_header();
		//****** Get Feature Image ********//
		get_template_part('index', 'static-banner');

		//****** get index service  ********
		get_template_part('index', 'service');
		
		//****** get index portfolio  ********
		get_template_part('index', 'portfolio');

	get_footer(); 
	}
?>