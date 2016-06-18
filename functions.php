<?php
/*
	*Theme Name	: Becorp
	*Theme Core Functions and Codes
*/
	/**Includes reqired resources here**/
	define('BECORP_TEMPLATE_DIR_URI',get_template_directory_uri());
	define('BECORP_TEMPLATE_DIR',get_template_directory());
	define('BECORP_THEME_FUNCTIONS_PATH',BECORP_TEMPLATE_DIR.'/core-functions');
	require( BECORP_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' ); // for Default Menus
	require( BECORP_THEME_FUNCTIONS_PATH . '/menu/asiathemes_nav_walker.php' ); // for Custom Menus	
	require( BECORP_THEME_FUNCTIONS_PATH . '/scripts/scripts.php' );
	require( BECORP_THEME_FUNCTIONS_PATH . '/comment-section/comment-function.php' ); //for comments sections
	require( BECORP_THEME_FUNCTIONS_PATH . '/widgets/register-sidebar.php' ); //for widget register
			
	
	//Customizer
	require( BECORP_THEME_FUNCTIONS_PATH . '/customizer/customizer-header.php' );
	// Fonts
	require_once('asia_breadcrumbs.php');
	require('template-tags.php');
	require( BECORP_THEME_FUNCTIONS_PATH . '/fonts/font.php');

add_action( 'after_setup_theme', 'becorp_setup' ); 	
		function becorp_setup()
		{	// Load text domain for translation-ready
			load_theme_textdomain( 'becorp', BECORP_THEME_FUNCTIONS_PATH . '/lang' );
			add_theme_support( 'title-tag' );
			// This theme uses wp_nav_menu() in one location.
			add_theme_support('post-thumbnails');
			// This theme uses wp_nav_menu() in one location.
			register_nav_menu( 'primary', __( 'Primary Menu', 'becorp' ) );
			// theme Background support
			add_theme_support( 'custom-background');
			add_theme_support( 'automatic-feed-links');
			add_theme_support( 'custom-logo', array(
				'height'      => 240,
				'width'       => 240,
				'flex-height' => true,
			) );
			add_theme_support( 'custom-header', apply_filters( 'childcare_custom_header_args', array(
				'width'                  => 1200,
				'height'                 => 280,
				'flex-height'            => true,
				'wp-head-callback'       => 'childcare_header_style',
			) ) );
			//Default Data
			if ( ! isset( $content_width ) ) $content_width = 900;
			require_once('theme_default_data.php');
			$becorp_options=becorp_theme_default_data();
			$current_theme_options = get_option('becorp_options');
			if($current_theme_options)	{ 	
				$becorp_options = array_merge($becorp_options, $current_theme_options);
				update_option('becorp_options',$becorp_options);			
		}
		else
		{
			add_option('becorp_options', $becorp_options);
		} // for Option Panel Settings		
}

	//Excerpt Length function
			function custom_excerpt_length( $length ) {
			return 40;
			}
			add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	
	/****--- Navigation for Author, Category , Tag , Archive ---***/
			function becorp_navigation() { ?>
			<div class="row">
				<div class="col-md-12">	
					<div class="blog-pagination wow fadeInLeft animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
						<?php //posts_nav_link(); 
							previous_posts_link(); 
							next_posts_link(); ?>
					</div>
				</div>
			</div>	
			<?php }
			
		if ( ! function_exists( 'childcare_header_style' ) ) :

function childcare_header_style() {
	if ( display_header_text() ) {
		return;
	}
	?>
	<style type="text/css" id="becorp-header-css">
		.site-branding {
			margin: 0 auto 0 0;
		}

		.site-branding .site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
			margin:0 10px 0;
		}
	</style>
	<?php
}
endif;	
	/*
	* Add Class Gravtar
	*/
	add_filter('get_avatar','becorp_gravatar_class');
	function becorp_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='author-image", $class);
    return $class;
	}
?>