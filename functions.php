<?php
require('includes/excerpts.php');
require('includes/pagination.php');

add_action('after_setup_theme', 'wp_newsstream_theme_setup');
function wp_newsstream_theme_setup(){
    load_theme_textdomain('wp-newsstream', get_template_directory() . '/languages');
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background') ;
	add_editor_style();
}

if ( ! function_exists( 'wp_newsstream_content_width' ) ) :
	function wp_newsstream_content_width() {
		global $content_width;
		if (!isset($content_width))
			$content_width = 550; /* pixels */
	}
endif;
add_action( 'after_setup_theme', 'wp_newsstream_content_width' );

/**
 * Enqueue scripts & styles
 */
if ( ! function_exists( 'wp_newsstream_custom_scripts' ) ) :
	function wp_newsstream_custom_scripts() {
		if (!is_admin()) {
		wp_register_script( 'wp_newsstream_jquery', get_template_directory_uri() . '/js/jquery-1.9.1.min.js' );
		wp_enqueue_script('wp_newsstream_jquery');
		wp_enqueue_script( 'wp_newsstream_skdslider_js', get_template_directory_uri() . '/js/skdslider.js' );
		wp_enqueue_script( 'wp_newsstream_custom_js', get_template_directory_uri() . '/js/custom.js' );
		wp_enqueue_style( 'wp_newsstream_skdslider', get_template_directory_uri() .'/css/skdslider.css', array(), false ,'screen' );
		wp_enqueue_script( 'wp_newsstream_responsive_js', get_template_directory_uri() . '/js/responsive.js' );		
		wp_enqueue_style( 'wp_newsstream_responsive', get_template_directory_uri() .'/css/responsive.css', array(), false ,'screen' );		
		wp_enqueue_style( 'wp_newsstream_font_awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'wp_newsstream_style', get_stylesheet_uri() );
		}
	}
endif;
add_action('wp_enqueue_scripts', 'wp_newsstream_custom_scripts');

/*******************************************************************
* These are settings for the Theme Customizer in the admin panel. 
*******************************************************************/
if ( ! function_exists( 'wp_newsstream_theme_customizer' ) ) :
	function wp_newsstream_theme_customizer( $wp_customize ) {
		
		$wp_customize->remove_section( 'title_tagline');

		
		/* logo option */
		$wp_customize->add_section( 'wp_newsstream_logo_section' , array(
			'title'       => __( 'Site Logo', 'wp-newsstream' ),
			'priority'    => 29,
			'description' => __( 'Upload a logo to replace the default site name in the header', 'wp-newsstream' ),
		) );
		
		$wp_customize->add_setting( 'wp_newsstream_logo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_newsstream_logo', array(
			'label'    => __( 'Choose your logo (ideal width is 100-300px and ideal height is 40-100px)', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_logo_section',
			'settings' => 'wp_newsstream_logo',
		) ) );
		
		
		/* color theme */
		$wp_customize->add_setting( 'wp_newsstream_theme_color', array (
			'default' => '#ff3333',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_newsstream_theme_color', array(
			'label'    => __( 'Theme Color Option', 'wp-newsstream' ),
			'section'  => 'colors',
			'settings' => 'wp_newsstream_theme_color',
			'priority' => 31,
		) ) );
		
		$wp_customize->add_setting( 'wp_newsstream_theme_border_color', array (
			'default' => '#d10000',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_newsstream_theme_border_color', array(
			'label'    => __( 'Theme Border Color Option', 'wp-newsstream' ),
			'section'  => 'colors',
			'settings' => 'wp_newsstream_theme_border_color',
			'priority' => 32,
		) ) );
	
		
		/* social media option */
		$wp_customize->add_section( 'wp_newsstream_social_section' , array(
			'title'       => __( 'Social Media Icons', 'wp-newsstream' ),
			'priority'    => 33,
			'description' => __( 'Optional social media buttons in the header', 'wp-newsstream' ),
		) );
		
		$wp_customize->add_setting( 'wp_newsstream_facebook', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_facebook', array(
			'label'    => __( 'Enter your Facebook url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_facebook',
			'priority'    => 101,
		) ) );
	
		$wp_customize->add_setting( 'wp_newsstream_twitter', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_twitter', array(
			'label'    => __( 'Enter your Twitter url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_twitter',
			'priority'    => 102,
		) ) );
		
		$wp_customize->add_setting( 'wp_newsstream_google', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_google', array(
			'label'    => __( 'Enter your Google+ url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_google',
			'priority'    => 103,
		) ) );
		
		$wp_customize->add_setting( 'wp_newsstream_pinterest', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_pinterest', array(
			'label'    => __( 'Enter your Pinterest url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_pinterest',
			'priority'    => 104,
		) ) );
		
		$wp_customize->add_setting( 'wp_newsstream_linkedin', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_linkedin', array(
			'label'    => __( 'Enter your Linkedin url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_linkedin',
			'priority'    => 105,
		) ) );
		
		$wp_customize->add_setting( 'wp_newsstream_youtube', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_youtube', array(
			'label'    => __( 'Enter your Youtube url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_youtube',
			'priority'    => 106,
		) ) );
		
		$wp_customize->add_setting( 'wp_newsstream_tumblr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_tumblr', array(
			'label'    => __( 'Enter your Tumblr url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_tumblr',
			'priority'    => 107,
		) ) );
		
		$wp_customize->add_setting( 'wp_newsstream_instagram', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_instagram', array(
			'label'    => __( 'Enter your Instagram url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_instagram',
			'priority'    => 108,
		) ) );
		
		$wp_customize->add_setting( 'wp_newsstream_flickr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_flickr', array(
			'label'    => __( 'Enter your Flickr url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_flickr',
			'priority'    => 109,
		) ) );
		
		$wp_customize->add_setting( 'wp_newsstream_vimeo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_vimeo', array(
			'label'    => __( 'Enter your Vimeo url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_vimeo',
			'priority'    => 110,
		) ) );
		
			
		$wp_customize->add_setting( 'wp_newsstream_rss', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_rss', array(
			'label'    => __( 'Enter your RSS url', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_rss',
			'priority'    => 111,
		) ) );
		
		$wp_customize->add_setting( 'wp_newsstream_email', array (
			'sanitize_callback' => 'sanitize_email',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_email', array(
			'label'    => __( 'Enter your email address', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_social_section',
			'settings' => 'wp_newsstream_email',
			'priority'    => 112,
		) ) );
		
		// author bio in posts option 
		$wp_customize->add_section( 'wp_newsstream_author_bio_section' , array(
			'title'       => __( 'Display Author Bio', 'wp-newsstream' ),
			'priority'    => 113,
			'description' => __( 'Option to show/hide the author bio in the posts.', 'wp-newsstream' ),
		) );
		
		$wp_customize->add_setting( 'wp_newsstream_author_bio', array (
			'default'        => '1',
			'sanitize_callback' => 'wp_newsstream_sanitize_checkbox',
		) );
		
		 $wp_customize->add_control('author_bio', array(
			'settings' => 'wp_newsstream_author_bio',
			'label' => __('Show the author bio in posts?', 'wp-newsstream'),
			'section' => 'wp_newsstream_author_bio_section',
			'type' => 'checkbox',
		));
		
		//slider
		
		$categories = get_categories();
				$cats = array();
				$i = 0;
				foreach($categories as $category){
					if($i==0){
						$default = $category->slug;
						$i++;
					}
					$cats[$category->slug] = $category->name;
				}	
		
		
		//  =============================
		//  Select Box               
		//  =============================
		$wp_customize->add_section('wp_newsstream_slider', array(
        'title'    => __('Slider Option', 'wp_newsstream'),
        'priority' => 114,
		));
		 
		
		$wp_customize->add_setting(
			'powered_by',
			array(
				'default' => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		 
		$wp_customize->add_control(
			'powered_by',
			array(
				'type' => 'select',
				'label' => 'Select Category:',
				'section' => 'wp_newsstream_slider',
				'choices' => $cats,
			)
		);
		
		$wp_customize->add_setting( 'wp_newsstream_slider_speed', array (
			'sanitize_callback' => 'wp_newsstream_sanitize_integer',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_newsstream_slider_speed', array(
			'default' => 6000,
			'label'    => __( 'Slider Speed (milliseconds)', 'wp-newsstream' ),
			'section'  => 'wp_newsstream_slider',
			'settings' => 'wp_newsstream_slider_speed',
			'priority'    => 115,
		) ) );
				
		
		
	}
endif;
add_action('customize_register', 'wp_newsstream_theme_customizer');

/**
 * Sanitize integer input
 */
if ( ! function_exists( 'wp_newsstream_sanitize_integer' ) ) :
	function wp_newsstream_sanitize_integer( $input ) {		
		return absint($input);
	}
endif;

/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'wp_newsstream_sanitize_checkbox' ) ) :
	function wp_newsstream_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}
endif;



if ( ! function_exists( 'wp_newsstream_enqueue_comment_reply' ) ) :
	function wp_newsstream_enqueue_comment_reply() {
		wp_enqueue_script( 'comment-reply' );

	 }
endif;
add_action( 'comment_form_before', 'wp_newsstream_enqueue_comment_reply' );


/**
* Apply Color Scheme
*/
if ( ! function_exists( 'wp_newsstream_apply_color' ) ) :
  function wp_newsstream_apply_color() {
	 if ( get_theme_mod('wp_newsstream_theme_color') ) {
	?>
	<style id="color-settings">
	<?php if ( get_theme_mod('wp_newsstream_theme_color') ) : ?>
		.btn-default, .navbar-default .navbar-toggle .icon-bar, .nav_container, #respond #submit, .post-content form input[type=submit], .post-content form input[type=button], #footer .widget_calendar thead tr, #copyright, .btn-info, .pagination .fa, .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus, .dropdown-menu > li > a, .dropdown-menu .sub-menu a, .navbar-default .navbar-nav > li{
			background-color:<?php echo get_theme_mod('wp_newsstream_theme_color'); ?>;
			}
		.btn-info, .nav_container, #footer, .navbar-default .navbar-toggle, .post_box{
			border-color: <?php echo get_theme_mod('wp_newsstream_theme_border_color'); ?>;
		}
		a, a:hover, a:focus .logo h1 span, .logo a, .fan-sociel-media a.btn:hover, .meta-info a:hover, .post_box a.meta-comment:hover,  aside ul li a, a.comment-reply-link, ul li.recentcomments, cite.fn, cite.fn a, footer ul li a, .widget_calendar td a {
		color:<?php echo get_theme_mod('wp_newsstream_theme_color'); ?>;
		}
		h2.post_title a{
		<?php
			$header_text_color = get_header_textcolor();
			if($header_text_color != ""){
		?>	
		color:<?php echo "#" . $header_text_color; ?>	
		<?php
			}
		?>	
		}
		
	<?php endif; ?>
	</style>
	<?php	  
	} 
  }
endif;
add_action( 'wp_head', 'wp_newsstream_apply_color' );

// register navigation menus
register_nav_menus(
	array(
	'main-menu'=>__('Main Menu')
	)

);
function wp_newsstream_menu() {

	require_once (TEMPLATEPATH . '/includes/wp_newsstream_menu.php');

}
if ( function_exists( 'add_theme_support' ) ){

	add_theme_support( 'post-thumbnails' );
}


if ( function_exists( 'add_image_size' ) ) {
	
	add_image_size( 'widget-post-thumb',  70, 70, true );
	add_image_size( 'post-thumb',  905, 380 , true );
	add_image_size( 'slide-small-thumb',  130, 135 , true );
	add_image_size( 'slide-medium-thumb',  265, 135 , true );
	add_image_size( 'slide-large-image',  1256, 450, true );

}
 


// Register widgetized area and update sidebar with default widgets
function wp_newsstream_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Homepage Sidebar', 'wp-newsstream' ),
		'id' => 'defaul-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Post Sidebar', 'wp-newsstream' ),
		'id' => 'post-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'wp-newsstream' ),
		'id' => 'page-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Archives Sidebar', 'wp-newsstream' ),
		'id' => 'archives-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Banner Widget', 'wp-newsstream' ),
		'description' => 'Enter your banner code into this text widget.',
		'id' => 'top-right-widget',
		'before_widget' => '<div id="top-widget">',
		'after_widget' => "</div>",
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 1', 'wp-newsstream' ),
		'id' => 'footer-one',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 2', 'wp-newsstream' ),
		'id' => 'footer-two',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 3', 'wp-newsstream' ),
		'id' => 'footer-three',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );
	
}
add_action( 'widgets_init', 'wp_newsstream_widgets_init' );

if ( ! function_exists( 'wp_newsstream_comment' ) ) :

// Template for comments and pingbacks.

function wp_newsstream_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'wp-newsstream' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'wp-newsstream' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>">
			<footer class="clearfix comment-head">
            
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 50 ); ?>
					<?php printf( __( '%s', 'wp-newsstream' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'wp-newsstream' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
                    
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content">
            	<?php if ( $comment->comment_approved == '0' ) : ?>
					<h6><em><?php _e( 'Your comment is awaiting moderation.', 'wp-newsstream' ); ?></em></h6>
					<br />
				<?php endif; ?>
				<?php comment_text(); ?>
                <span class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </span><!-- .reply -->
					<?php edit_comment_link( __( '(Edit)', 'wp-newsstream' ), ' ' );?>
            </div>

			
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif;

//====================================Breadcrumbs=============================================================================================
function wp_newsstream_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo home_url();
        echo '">';
        echo '<i class="fa fa-home"></i>Home';
        echo '</a></li><li class="separator"> / </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> / </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> / </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $newsstream_act = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $newsstream_act as $newsstream_inherit ) {
                    $output = '<li><a href="'.get_permalink($newsstream_inherit).'" title="'.get_the_title($newsstream_inherit).'">'.get_the_title($newsstream_inherit).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    echo '</ul>';
}

//=================================start BootstrapNavMenuWalker================================================================================

class wpnewsstreamNavMenuWalker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
	
		$indent = str_repeat( "\t", $depth );
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output	.= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}

 

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$li_attributes = '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		// managing divider: add divider class to an element to get a divider before it.
		$divider_class_position = array_search('divider', $classes);
		if($divider_class_position !== false){
		$output .= "<li class=\"divider\"></li>\n";
		unset($classes[$divider_class_position]);
	
	}
	

	$classes[] = isset($args->has_children) ? 'dropdown' : '';
	$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
	$classes[] = 'menu-item-' . $item->ID;

	if($depth && $args->has_children){
		$classes[] = 'dropdown-submenu';
	}

	$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	$class_names = ' class="' . esc_attr( $class_names ) . '"';
	$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
	$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
	$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
	$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
	$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
	$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
	$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
	$attributes .= isset($args->has_children) ? ' class="dropdown-toggle"  ' : '';
	$item_output = $args->before;
	$item_output .= '<a'. $attributes .'>';
	$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	$item_output .= ($depth == 0 && $args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
	$item_output .= $args->after;
	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

}


function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
	//v($element);
	if ( !$element )
	return;

	$id_field = $this->db_fields['id'];

	//display this element
	if ( is_array( $args[0] ) )
	$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
	else if ( is_object( $args[0] ) )
	$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );

	$cb_args = array_merge( array(&$output, $element, $depth), $args);

	call_user_func_array(array(&$this, 'start_el'), $cb_args);
	$id = $element->$id_field;

 

	// descend only when the depth is right and there are childrens for this element
	if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) { 
	
	foreach( $children_elements[ $id ] as $child ){ 
	
		if ( !isset($newlevel) ) {
			$newlevel = true;
			//start the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
		}
		$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
	}

	unset( $children_elements[ $id ] );

} 

if ( isset($newlevel) && $newlevel ){
	
	//end the child delimiter
	$cb_args = array_merge( array(&$output, $depth), $args);
	call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
} 

//end this element

$cb_args = array_merge( array(&$output, $element, $depth), $args);

call_user_func_array(array(&$this, 'end_el'), $cb_args); 

}
}
//===================================end BootstrapNavMenuWalker==============================================================================

// Register 'newsstream Recent Posts' widget
add_action( 'widgets_init', 'init_wp_newsstream_recent_posts' );
function init_wp_newsstream_recent_posts() { return register_widget('wp_newsstream_recent_posts'); }

class wp_newsstream_recent_posts extends WP_Widget {
	/** constructor */
	function wp_newsstream_recent_posts() {
		parent::WP_Widget( 'wp_newsstream_recent_posts', $name = 'News Stream Recent Post' );
	}

	
	// Widget	
	function widget( $args, $instance ) {
		global $post;
		extract($args);

		// Widget options
		$title 	 = apply_filters('widget_title', $instance['title'] ); // Title		
		/*$cpt 	 = $instance['types'];*/ // Post type(s) 		
	    $types   = 'post';
		$number	 = $instance['number']; // Number of posts to show
		
        // Output
		echo $before_widget;
		
	    if ( $title ) echo $before_title . $title . $after_title;
			
		$fzq = new WP_Query(array( 'post_type' => $types, 'showposts' => $number ));
		if( $fzq->have_posts() ) : 
		?>
		<ul>
		<?php while($fzq->have_posts()) : $fzq->the_post(); ?>
		<li class="clearfix">
        <?php if ( $instance['display_featured_image'] && has_post_thumbnail() ) {?>
        	<a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
        <?php
			the_post_thumbnail('widget-post-thumb', array('class' => 'alignleft'));
		?>
        	</a>
        <?php
		} ?>
        <h5><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></h5>
        <div class="meta-info">
        	<span class="meta-info-date"><?php the_time('F j, Y');  ?></span>, <a href="<?php comments_link(); ?>" class="meta-info-comment"><?php comments_number( '0 <i class="fa fa-comments"></i>', '1 <i class="fa fa-comments"></i>', '% <i class="fa fa-comments"></i>' ); ?></a>
        </div>
        </li>
		<?php wp_reset_query(); 
		endwhile; ?>
		</ul>
			
		<?php endif; ?>			
		<?php
		// echo widget closing tag
		echo $after_widget;
	}

	/** Widget control update */
	function update( $new_instance, $old_instance ) {
		$instance    = $old_instance;
		
		//Let's turn that array into something the Wordpress database can store
		$types       = 'post';
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['types']  = $types;
		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['display_featured_image'] = $new_instance['display_featured_image'];
		return $instance;
	}
	
	
	// Widget settings
	
	function form( $instance ) {	
			$number = 3;
			$display_featured_image = 'false';
		    // instance exist? if not set defaults
		    if ( $instance ) {
				$title  = $instance['title'];
		        $types  = $instance['types'];
		        $number = $instance['number'];
				$display_featured_image = $instance['display_featured_image'];
		    } 
			
			//Let's turn $types into an array
			$types = 'post';
			// The widget form
			?>
			<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"> Title:</label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php if(isset($title)) { echo $title; } ?>" class="widefat" />
			</p>
			<p>
            	<input type="checkbox" name="<?php echo $this->get_field_name('display_featured_image'); ?>"  <?php checked('true', $display_featured_image); ?> value="true" /> 			
                <label for="<?php echo $this->get_field_id('display_featured_image'); ?>">Display Thumbnail</label>
            </p>
			<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"> Number of posts to show:</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
			</p>
	<?php 
	}

} // class rcp_recent_posts

?>