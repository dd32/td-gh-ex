<?php
/** 
* @Theme Name	:	Quality
* @file         :	front-page.php
* @package      :	Quality
* @author       :	Vibhor
* @license      :	license.txt
* @filesource   :	wp-content/themes/quality/front-page.php
*/
// Template Name: HOME

		get_header();
		get_template_part('index', 'static');			
		
		//****** get index service  *********/
		$current_options = get_option('quality_options');
		if (  $current_options['service_enable'] == 'on' ) {
		get_template_part('index', 'service');
		}
		
	get_footer(); 

?>