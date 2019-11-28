<?php

	$theme_lay = get_theme_mod( 'adventure_travelling_tp_body_layout_settings','Full');
    if($theme_lay == 'Container'){
		$tp_theme_css .='body{';
			$tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$tp_theme_css .='}';
		$tp_theme_css .='.scrolled{';
			$tp_theme_css .='width: auto; left:0; right:0;';
		$tp_theme_css .='}';
	}else if($theme_lay == 'Container Fluid'){
		$tp_theme_css .='body{';
			$tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$tp_theme_css .='}';
		$tp_theme_css .='.scrolled{';
			$tp_theme_css .='width: auto; left:0; right:0;';
		$tp_theme_css .='}';
	}else if($theme_lay == 'Full'){
		$tp_theme_css .='body{';
			$tp_theme_css .='max-width: 100%;';
		$tp_theme_css .='}';
	}