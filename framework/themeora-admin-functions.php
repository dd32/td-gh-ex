<?php
/**
 * Admin functions for core framework features.
 * This file is the same contents as all themes using our framework
 *
 * @package WordPress
 * @subpackage Themeora Framework
 * @author Themebeans
 * @since Themeora Framework 1
 */


/* Login logo
---------------------------------------------------------------------------------------------------- */

if ( !function_exists('themeora_custom_login') )
{
	function themeora_custom_login()
	{

		if ( get_theme_mod( 'img-upload-login-logo' ) ) {
			//GET DEFAULT IMAGE IF UPLOADED
			$login_logo = esc_html( get_theme_mod( 'img-upload-login-logo') );
		} else {
			//GET DEFAULT IMAGES IF NO UPLOADED IMAGE
			$framwork_logo = TRUE;
			$login_logo = THEMEORA_FRAMEWORK_IMAGES_URL.'/login-logo.png';
			$login_logo_retina = THEMEORA_FRAMEWORK_IMAGES_URL.'/login-logo@2x.png';
		}

 		if( !themeora_theme_supports( 'primary', 'whitelabel' ) OR get_theme_mod( 'img-upload-login-logo' ) ) {

			$dimensions = @getimagesize( $login_logo );
			echo '<style>';
				echo 'body.login #login h1 a {';
					echo 'background: url("' . $login_logo . '") no-repeat scroll center top transparent;';
					echo 'height: ' . $dimensions[1] . 'px;';
					echo 'background-size: auto !important; width:auto;';
				echo '}';

				echo '.login #nav {text-align: center}.login #backtoblog { display:none }';

				if( !get_theme_mod( 'img-upload-login-logo' ) ) {
					echo '@media all and (-webkit-min-device-pixel-ratio: 1.5), (min-resolution: 192dpi) {';
						echo 'body.login #login h1 a {';
							echo 'background-image: url("' . $login_logo_retina . '");';
							echo 'background-size: 163px 75px!important;';
						echo '}';
					echo '}';
				} //END if ( $framwork_logo = true )
			echo '</style>';

		}
	}
	add_filter('login_head', 'themeora_custom_login');
}


/* Load custom editor style
---------------------------------------------------------------------------------------------------- */

add_action( 'admin_enqueue_scripts', 'themeora_add_editor_styles' );
function themeora_add_editor_styles()
{
    add_editor_style( 'custom-editor-style.css' );
}
