<?php
require_once get_template_directory() . '/lib/options-config.php';
	if(!class_exists('Backyard_Customizer_API_Wrapper')) {
			require_once get_template_directory() . '/lib/admin/backyard-customizer-api-wrapper.php';
	}
Backyard_Customizer_API_Wrapper::getInstance($options);