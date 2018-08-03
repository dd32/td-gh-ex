<?php
	/* Dynamic Styles **/
	if( !function_exists( 'accesspress_basic_dynamic_styles' ) ) {
		function accesspress_basic_dynamic_styles() {

			$custom_css = '';
			global $apbasic_options;
	        $apbasic_settings = get_option('apbasic_options',$apbasic_options);
	        $background_image = $apbasic_settings['background_image'];
	        $bg_img = get_template_directory_uri().'/inc/admin-panel/images/'.$background_image.'.png';

	        if( $background_image == 'pattern0' ) {
	        	$custom_css .= "body{
	        		background: none;
	        	}";
	        } else {
	        	$custom_css .= "body{
	        		background: url({$bg_img});
	        	}";
	        }

	        wp_add_inline_style( 'accesspress-basic-style', $custom_css );
		}
	}

	add_action( 'wp_enqueue_scripts', 'accesspress_basic_dynamic_styles' );