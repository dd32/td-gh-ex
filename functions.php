<?php
/*
	*Theme Name	: Becorp
	*Theme Core Functions and Codes
*/
	/**Includes reqired resources here**/
	define('ASIATHEMES_TEMPLATE_DIR_URI',get_template_directory_uri());
	define('ASIATHEMES_TEMPLATE_DIR',get_template_directory());
	define('ASIATHEMES_THEME_FUNCTIONS_PATH',ASIATHEMES_TEMPLATE_DIR.'/core-functions');
	define('ASIATHEMES_THEME_OPTIONS_PATH' , ASIATHEMES_TEMPLATE_DIR_URI.'/core-functions/option-panel');
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' ); // for Default Menus
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/menu/asiathemes_nav_walker.php' ); // for Custom Menus	
	
	
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/scripts/scripts.php' );
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/comment-section/comment-function.php' ); //for comments sections
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/widgets/register-sidebar.php' ); //for widget register
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/resize-image/image_resize.php' ); //image resize
	
	//Customizer
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/customizer/customizer-header.php');
	require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/customizer/customizer-service.php');

add_action( 'after_setup_theme', 'asiathemes_setup' ); 	
		function asiathemes_setup()
		{	// Load text domain for translation-ready
			load_theme_textdomain( 'becorp', ASIATHEMES_THEME_FUNCTIONS_PATH . '/lang' );
			add_theme_support( 'title-tag' );
			
			$header_args = array(
				 'flex-height' => true,
				 'height' => 100,
				 'flex-width' => true,
				 'width' => 1200,
				 'admin-head-callback' => 'mytheme_admin_header_style',
				 );
				 
			add_theme_support( 'custom-header', $header_args );
			// This theme uses wp_nav_menu() in one location.
			add_theme_support('post-thumbnails');
			// This theme uses wp_nav_menu() in one location.
			register_nav_menu( 'primary', __( 'Primary Menu', 'becorp' ) );
			// theme Background support
			add_theme_support( 'custom-background');
			add_theme_support( 'automatic-feed-links');
			//Default Data
			if ( ! isset( $content_width ) ) $content_width = 900;
			require_once('theme_default_data.php');
			$becorp_option=becorp_theme_default_data();
			require( ASIATHEMES_THEME_FUNCTIONS_PATH . '/option-panel/becorp-option-setting.php' ); // for Option Panel 
			
}
		/****--- Navigation for Author, Category , Tag , Archive ---***/
			function asiathemes_navigation() { ?>
			<div class="row">
			<div class="blog-pagination">
			<?php //posts_nav_link(); 
			previous_posts_link( __('Previous','becorp') ); 
			next_posts_link( __('Next','becorp') ); ?>
			</div>
			</div>
			<?php }
			
			// Wordpress Editor style
			function asiathemes_add_editor_styles() {
				add_editor_style( 'custom-editor-style.css' );
			}
			add_action( 'admin_init', 'asiathemes_add_editor_styles' );
	
	
	
			/*******************
			* Add Class Gravtar
			* ******************/
			add_filter('get_avatar','asiathemes_gravatar_class');
			function asiathemes_gravatar_class($class) {
			$class = str_replace("class='avatar", "class='author-image", $class);
			return $class;
			}
?>