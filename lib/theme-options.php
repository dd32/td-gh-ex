<?php
require_once get_template_directory() . '/lib/options-config.php';
	if(!class_exists('Yds_Customizer_API_Wrapper')) {
			require_once get_template_directory() . '/lib/admin/yds-customizer-api-wrapper.php';
	}
Yds_Customizer_API_Wrapper::getInstance($options);
