<?php
require_once get_template_directory() .'/include/options-config.php';
	if(!class_exists('Yds_Customizer_API_Wrapper')) {
			require_once get_template_directory().'/include/yds-customizer-api-wrapper.php';
	}
//Yds_Customizer_API_Wrapper::getInstance($options);
Yds_Customizer_API_Wrapper::getInstance($options);
