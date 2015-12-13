<?php
/**
 * Avien Light functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Avien_Light
 */
 
 // Nav walker
require( get_template_directory()  . '/inc/navwalker.php');

// Mobile walker
require( get_template_directory()  . '/inc/mobile-navwalker.php');

if ( ! function_exists( 'themeofwp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function themeofwp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Avien Light, use a find and replace
	 * to change 'themeofwp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'themeofwp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	// WooCommerce compatibility tag
	add_theme_support( 'woocommerce' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style( "inc/css/editor-style.css" );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'themeofwp' ),
		'footer' => esc_html__( 'Footer Menu', 'themeofwp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'themeofwp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // themeofwp_setup
add_action( 'after_setup_theme', 'themeofwp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function themeofwp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'themeofwp_content_width', 640 );
}
add_action( 'after_setup_theme', 'themeofwp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
 
class themeofWP_Walker extends Walker_Page {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        if ($depth == 0) {
            $output .= "\n$indent<ul class='dropdown-menu' role='menu'>\n";
        } else {
            $output .= "\n$indent<ul class='dropdown-menu' role='menu'>\n";
        }
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);

        if ($depth == 0) {
            $output .= "$indent</ul>\n";
        } else {
            $output .= "$indent</ul>\n";
        }
    }
}
function themeofwp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'themeofwp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar(array(
	  'name' => __( 'Footer', 'themeofwp' ),
	  'id' => 'bottom',
	  'description' => __( 'Widgets in this area will be shown before footer area.' , 'themeofwp'),
	  'before_title' => '<h3>',
	  'after_title' => '</h3>',
	  'before_widget' => '<div class="col-lg-3 footer_widgets">',
	  'after_widget' => '</div>'
	  )
	);

	register_sidebar(array(
	  'name' => __( 'Header Social', 'themeofwp' ),
	  'id' => 'header-social',
	  'description' => __( 'Widgets in this area will be shown on hader social area.' , 'themeofwp'),
	  'before_title' => '',
	  'after_title' => '',
	  'before_widget' => '',
	  'after_widget' => ''
	  )
	);

	register_sidebar(array(
	  'name' => __( 'Header Contact', 'themeofwp' ),
	  'id' => 'header-contact',
	  'description' => __( 'Widgets in this area will be shown on hader contact area.' , 'themeofwp'),
	  'before_title' => '',
	  'after_title' => '',
	  'before_widget' => '',
	  'after_widget' => ''
	  )
	);
}
add_action( 'widgets_init', 'themeofwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function themeofwp_scripts() {
	wp_enqueue_style( 'themeofwp-style', get_stylesheet_uri() );
	wp_enqueue_style ( 'bootstrap',   get_template_directory_uri() . '/inc/css/bootstrap.css');
    wp_enqueue_style ( 'fontawesome',     get_template_directory_uri() . '/inc/css/font-awesome.css');

	wp_enqueue_script( 'themeofwp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'themeofwp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script ( 'bootstrap-js',   get_template_directory_uri() . '/inc/js/bootstrap.js', array('jquery'));
	wp_enqueue_script ( 'fitvids', 	get_template_directory_uri() . '/inc/js/jquery.fitvids.js', array(), '1.3', true );
	wp_enqueue_script ( 'easing', 		get_template_directory_uri() . '/inc/js/jquery.easing.1.3.js', array(), '1.3', true );
	wp_enqueue_script ( 'respond', 		get_template_directory_uri() . '/inc/js/respond.js', array(), '1.4.2', true );
	wp_enqueue_script ( 'framework-js',   get_template_directory_uri() . '/inc/js/framework.js', array(), '3.3', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'themeofwp_scripts' );

function themeofwp_slider_script() {
	if ( is_home() ) {
		wp_enqueue_style( 'avien-owl-carousel', get_template_directory_uri() . '/inc/css/owl.carousel.css');
		wp_enqueue_style( 'avien-owl-transitions', get_template_directory_uri() . '/inc/css/owl.transitions.css');
		wp_enqueue_script( 'avien-owl-carousel-js', get_template_directory_uri() . '/inc/js/owl.carousel.js', array(), '1.3.3', true );
		wp_enqueue_script( 'avien-owl-slider-js', get_template_directory_uri() . '/inc/js/slider.js', array(), '1.3.3', true );
	}
}

add_action('wp_enqueue_scripts', 'themeofwp_slider_script', 15, 0);

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
*	HEADER CONTACT WIDGET
**/
add_action('widgets_init', 'themeofwp_header_contact_us_load_widgets');

function themeofwp_header_contact_us_load_widgets()
{
	register_widget('ThemeofWP_Header_Contact');
}

class ThemeofWP_Header_Contact extends WP_Widget {
	
	function ThemeofWP_Header_Contact()
	{
		$widget_ops = array('classname' => 'header_contact_us', 'description' => __('Add your contact info to the header area.', 'themeofwp'));

		$control_ops = array('id_base' => 'themeofwp-header_contact_us-widget');

		parent::__construct('themeofwp-header_contact_us-widget', __('TWP Header Contact', 'themeofwp'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		?>
        
                <?php if($instance['phone']): ?>
					<a href="tel:<?php echo $instance['phone']; ?>"><i class="fa fa-phone"></i>
						<?php echo $instance['phone']; ?>
					</a> 
				<?php endif; ?>
				
        
                <?php if($instance['email']): ?>
					<a href="mailto:<?php echo $instance['email']; ?>"><i class="fa fa-envelope-o"></i> 
						<?php echo $instance['email']; ?>
					</a>
				<?php endif; ?>	 

		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;


		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
	
		<p>
			<label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo $instance['phone']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo $instance['email']; ?>" />
		</p>
		
	<?php
	}
}


/**
*	HEADER SOCIAL WIDGET
**/
add_action('widgets_init', 'themeofwp_header_social_us_load_widgets');

function themeofwp_header_social_us_load_widgets()
{
	register_widget('ThemeofWP_Header_Social');
}

class ThemeofWP_Header_Social extends WP_Widget {
	
	function ThemeofWP_Header_Social()
	{
		$widget_ops = array('classname' => 'themeofwp_header_social_us', 'description' => __('Add your social info to the header area.', 'themeofwp'));

		$control_ops = array('id_base' => 'themeofwp_header_social_us-widget');

		parent::__construct('themeofwp_header_social_us-widget', __('TWP Header Social', 'themeofwp'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		$instance['title']= '';
		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		?>
        
                <?php if($instance['twitter']): ?>
					<a href="<?php echo $instance['twitter']; ?>" id="twitter" title="twitter"><i class="fa fa-twitter"> </i></a>
				<?php endif; ?>
				
				<?php if($instance['facebook']): ?>
					<a href="<?php echo $instance['facebook']; ?>" id="facebook" title="facebook"><i class="fa fa-facebook"> </i></a>
				<?php endif; ?>
				
				<?php if($instance['linkedin']): ?>
					<a href="<?php echo $instance['linkedin']; ?>" id="linkedin" title="linkedin"><i class="fa fa-linkedin"> </i></a>
				<?php endif; ?>
				
				<?php if($instance['google']): ?>
					<a href="<?php echo $instance['google']; ?>" id="google" title="google"><i class="fa fa-google-plus"> </i></a>
				<?php endif; ?>
				
				<?php if($instance['instagram']): ?>
					<a href="<?php echo $instance['instagram']; ?>" id="instagram" title="instagram"><i class="fa fa-instagram"> </i></a>
				<?php endif; ?>
				

		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;


		$instance['twitter'] = $new_instance['twitter'];
		$instance['facebook'] = $new_instance['facebook'];
		$instance['linkedin'] = $new_instance['linkedin'];
		$instance['google'] = $new_instance['google'];
		$instance['instagram'] = $new_instance['instagram'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
	
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter URL:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $instance['twitter']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook URL:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $instance['facebook']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('LinkedIn URL:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $instance['linkedin']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google+ URL:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" value="<?php echo $instance['google']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram URL:', 'themeofwp');?></label><br />
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo $instance['instagram']; ?>" />
		</p>
		
	<?php
	}
}
