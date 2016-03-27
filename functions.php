<?php
/*
	*Theme Name	: Becorp
	*Theme Core Functions and Codes
*/
	/**Includes reqired resources here**/
	define('BECORP_TEMPLATE_DIR_URI',get_template_directory_uri());
	define('BECORP_TEMPLATE_DIR',get_template_directory());
	define('BECORP_THEME_FUNCTIONS_PATH',BECORP_TEMPLATE_DIR.'/core-functions');
	define('BECORP_THEME_OPTIONS_PATH' , BECORP_TEMPLATE_DIR_URI.'/core-functions/option-panel');
	require( BECORP_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' ); // for Default Menus
	require( BECORP_THEME_FUNCTIONS_PATH . '/menu/asiathemes_nav_walker.php' ); // for Custom Menus	
	
	
	require( BECORP_THEME_FUNCTIONS_PATH . '/scripts/scripts.php' );
	require( BECORP_THEME_FUNCTIONS_PATH . '/comment-section/comment-function.php' ); //for comments sections
	require( BECORP_THEME_FUNCTIONS_PATH . '/widgets/register-sidebar.php' ); //for widget register
	
	//Customizer
	require( BECORP_THEME_FUNCTIONS_PATH . '/customizer/customizer-header.php');

add_action( 'after_setup_theme', 'becorp_setup' ); 	
		function becorp_setup()
		{	// Load text domain for translation-ready
			load_theme_textdomain( 'becorp', BECORP_THEME_FUNCTIONS_PATH . '/lang' );
			add_theme_support( 'title-tag' );
			
			// This theme uses wp_nav_menu() in one location.
			add_theme_support('post-thumbnails');
			// This theme uses wp_nav_menu() in one location.
			register_nav_menu( 'primary', __( 'Primary Menu', 'becorp' ) );
			add_theme_support( 'automatic-feed-links');
			//Default Data
			if ( ! isset( $content_width ) ) $content_width = 900;
			require_once('theme_default_data.php');
			$becorp_option=becorp_theme_default_data();
			
}
		/****--- Navigation for Author, Category , Tag , Archive ---***/
			function becorp_navigation() { ?>
			<div class="row">
			<div class="blog-pagination">
				<?php //posts_nav_link(); 
				previous_posts_link( __('Previous','becorp') ); 
				next_posts_link( __('Next','becorp') ); ?>
			</div>
			</div>
			<?php }
			
			// Wordpress Editor style
			function becorp_add_editor_styles() {
				add_editor_style( 'custom-editor-style.css' );
			}
			add_action( 'admin_init', 'becorp_add_editor_styles' );
	
	
	
			/*******************
			* Add Class Gravtar
			* ******************/
			add_filter('get_avatar','becorp_gravatar_class');
			function becorp_gravatar_class($class) {
			$class = str_replace("class='avatar", "class='author-image", $class);
			return $class;
			}
?>