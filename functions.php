<?php
require('includes/excerpts.php');
require('includes/pagination.php');

add_action('after_setup_theme', 'wp_fanzone_theme_setup');
function wp_fanzone_theme_setup(){
    load_theme_textdomain('wp-fanzone', get_template_directory() . '/languages');
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background') ;
	add_editor_style();
}

if ( ! function_exists( 'wp_fanzone_content_width' ) ) :
	function wp_fanzone_content_width() {
		global $content_width;
		if (!isset($content_width))
			$content_width = 550; /* pixels */
	}
endif;
add_action( 'after_setup_theme', 'wp_fanzone_content_width' );

/**
 * Enqueue scripts & styles
 */
if ( ! function_exists( 'wp_fanzone_custom_scripts' ) ) :
	function wp_fanzone_custom_scripts() {
		if (!is_admin()) {
		wp_register_script( 'wp_fanzone_jquery', get_template_directory_uri() . '/js/jquery-1.9.1.min.js' );
		wp_enqueue_script('wp_fanzone_jquery');
		wp_enqueue_script( 'wp_fanzone_responsive_js', get_template_directory_uri() . '/js/responsive.js' );
		wp_enqueue_script( 'wp_fanzone_slider_js', get_template_directory_uri() . '/js/slider.js' );
		wp_enqueue_style( 'wp_fanzone_slider', get_template_directory_uri() .'/css/slider.css', array(), false ,'screen' );
		wp_enqueue_style( 'wp_fanzone_responsive', get_template_directory_uri() .'/css/responsive.css', array(), false ,'screen' );
		wp_enqueue_style( 'wp_fanzone_font_awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'wp_fanzone_style', get_stylesheet_uri() );
		}
	}
endif;
add_action('wp_enqueue_scripts', 'wp_fanzone_custom_scripts');

/*******************************************************************
* These are settings for the Theme Customizer in the admin panel. 
*******************************************************************/
if ( ! function_exists( 'wp_fanzone_theme_customizer' ) ) :
	function wp_fanzone_theme_customizer( $wp_customize ) {
		
		$wp_customize->remove_section( 'title_tagline');

		
		/* logo option */
		$wp_customize->add_section( 'wp_fanzone_logo_section' , array(
			'title'       => __( 'Site Logo', 'wp-fanzone' ),
			'priority'    => 29,
			'description' => __( 'Upload a logo to replace the default site name in the header', 'wp-fanzone' ),
		) );
		
		$wp_customize->add_setting( 'wp_fanzone_logo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_fanzone_logo', array(
			'label'    => __( 'Choose your logo (ideal width is 100-300px and ideal height is 40-100px)', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_logo_section',
			'settings' => 'wp_fanzone_logo',
		) ) );
		
		
		/* color theme */
		$wp_customize->add_setting( 'wp_fanzone_theme_color', array (
			'default' => '#339390',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wp_fanzone_theme_color', array(
			'label'    => __( 'Theme Color Option', 'wp-fanzone' ),
			'section'  => 'colors',
			'settings' => 'wp_fanzone_theme_color',
			'priority' => 31,
		) ) );
	
		
		/* social media option */
		$wp_customize->add_section( 'wp_fanzone_social_section' , array(
			'title'       => __( 'Social Media Icons', 'wp-fanzone' ),
			'priority'    => 32,
			'description' => __( 'Optional social media buttons in the header', 'wp-fanzone' ),
		) );
		
		$wp_customize->add_setting( 'wp_fanzone_facebook', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_facebook', array(
			'label'    => __( 'Enter your Facebook url', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_social_section',
			'settings' => 'wp_fanzone_facebook',
			'priority'    => 101,
		) ) );
	
		$wp_customize->add_setting( 'wp_fanzone_twitter', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_twitter', array(
			'label'    => __( 'Enter your Twitter url', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_social_section',
			'settings' => 'wp_fanzone_twitter',
			'priority'    => 102,
		) ) );
		
		$wp_customize->add_setting( 'wp_fanzone_google', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_google', array(
			'label'    => __( 'Enter your Google+ url', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_social_section',
			'settings' => 'wp_fanzone_google',
			'priority'    => 103,
		) ) );
		
		$wp_customize->add_setting( 'wp_fanzone_pinterest', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_pinterest', array(
			'label'    => __( 'Enter your Pinterest url', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_social_section',
			'settings' => 'wp_fanzone_pinterest',
			'priority'    => 104,
		) ) );
		
		$wp_customize->add_setting( 'wp_fanzone_linkedin', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_linkedin', array(
			'label'    => __( 'Enter your Linkedin url', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_social_section',
			'settings' => 'wp_fanzone_linkedin',
			'priority'    => 105,
		) ) );
		
		$wp_customize->add_setting( 'wp_fanzone_youtube', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_youtube', array(
			'label'    => __( 'Enter your Youtube url', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_social_section',
			'settings' => 'wp_fanzone_youtube',
			'priority'    => 106,
		) ) );
		
		$wp_customize->add_setting( 'wp_fanzone_tumblr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_tumblr', array(
			'label'    => __( 'Enter your Tumblr url', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_social_section',
			'settings' => 'wp_fanzone_tumblr',
			'priority'    => 107,
		) ) );
		
		$wp_customize->add_setting( 'wp_fanzone_instagram', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_instagram', array(
			'label'    => __( 'Enter your Instagram url', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_social_section',
			'settings' => 'wp_fanzone_instagram',
			'priority'    => 108,
		) ) );
		
		$wp_customize->add_setting( 'wp_fanzone_flickr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_flickr', array(
			'label'    => __( 'Enter your Flickr url', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_social_section',
			'settings' => 'wp_fanzone_flickr',
			'priority'    => 109,
		) ) );
		
		$wp_customize->add_setting( 'wp_fanzone_vimeo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_vimeo', array(
			'label'    => __( 'Enter your Vimeo url', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_social_section',
			'settings' => 'wp_fanzone_vimeo',
			'priority'    => 110,
		) ) );
		
			
		$wp_customize->add_setting( 'wp_fanzone_rss', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_rss', array(
			'label'    => __( 'Enter your RSS url', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_social_section',
			'settings' => 'wp_fanzone_rss',
			'priority'    => 111,
		) ) );
		
		$wp_customize->add_setting( 'wp_fanzone_email', array (
			'sanitize_callback' => 'sanitize_email',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_email', array(
			'label'    => __( 'Enter your email address', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_social_section',
			'settings' => 'wp_fanzone_email',
			'priority'    => 112,
		) ) );
		
		// author bio in posts option 
		$wp_customize->add_section( 'wp_fanzone_author_bio_section' , array(
			'title'       => __( 'Display Author Bio', 'wp-fanzone' ),
			'priority'    => 113,
			'description' => __( 'Option to show/hide the author bio in the posts.', 'wp-fanzone' ),
		) );
		
		$wp_customize->add_setting( 'wp_fanzone_author_bio', array (
			'default'        => '1',
			'sanitize_callback' => 'wp_fanzone_sanitize_checkbox',
		) );
		
		 $wp_customize->add_control('author_bio', array(
			'settings' => 'wp_fanzone_author_bio',
			'label' => __('Show the author bio in posts?', 'wp-fanzone'),
			'section' => 'wp_fanzone_author_bio_section',
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
		$wp_customize->add_section('wp_fanzone_slider', array(
        'title'    => __('Slider Option', 'wp_fanzone'),
        'priority' => 114,
		));
		 
		
		$wp_customize->add_setting(
			'powered_by',
			array(
				'default' => '',
			)
		);
		 
		$wp_customize->add_control(
			'powered_by',
			array(
				'type' => 'select',
				'label' => 'Select Category:',
				'section' => 'wp_fanzone_slider',
				'choices' => $cats,
			)
		);
		
		$wp_customize->add_setting( 'wp_fanzone_slider_speed', array (
			'sanitize_callback' => 'wp_fanzone_sanitize_integer',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_fanzone_slider_speed', array(
			'label'    => __( 'Slider Speed (milliseconds)', 'wp-fanzone' ),
			'section'  => 'wp_fanzone_slider',
			'settings' => 'wp_fanzone_slider_speed',
			'priority'    => 115,
		) ) );
				
		
		
	}
endif;
add_action('customize_register', 'wp_fanzone_theme_customizer');

/**
 * Sanitize integer input
 */
if ( ! function_exists( 'wp_fanzone_sanitize_integer' ) ) :
	function wp_fanzone_sanitize_integer( $input ) {		
		return absint($input);
	}
endif;

/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'wp_fanzone_sanitize_checkbox' ) ) :
	function wp_fanzone_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}
endif;



if ( ! function_exists( 'wp_fanzone_enqueue_comment_reply' ) ) :
	function wp_fanzone_enqueue_comment_reply() {
		wp_enqueue_script( 'comment-reply' );

	 }
endif;
add_action( 'comment_form_before', 'wp_fanzone_enqueue_comment_reply' );


/**
* Apply Color Scheme
*/
if ( ! function_exists( 'wp_fanzone_apply_color' ) ) :
  function wp_fanzone_apply_color() {
	 if ( get_theme_mod('wp_fanzone_theme_color') ) {
	?>
	<style id="color-settings">
	<?php if ( get_theme_mod('wp_fanzone_theme_color') ) : ?>
		.btn-info, .btn-default, #copyright, .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus, .dropdown-menu, .dropdown-menu .sub-menu, .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus, #respond #submit, .post-content form input[type=submit], .post-content form input[type=button], .widget-title h4, .pagination .fa, #footer .widget_calendar thead tr, .navbar-default .navbar-toggle .icon-bar{
			background-color:<?php echo get_theme_mod('wp_fanzone_theme_color'); ?>;
			}
		.top-bar, .btn-info, .nav_container, #footer, .navbar-default .navbar-toggle{
			border-color:<?php echo get_theme_mod('wp_fanzone_theme_color'); ?>;
		}
		aside ul li a, .pagination a, h4.author-title a, .author-info a, cite.fn, a.comment-reply-link, comment-meta a, a.comment-edit-link, .logged-in-as a, .widget_tag_cloud a, .widget_calendar td a, .widget_calendar td a, footer .meta-info span, footer .meta-info a, footer ul li a:hover, .meta-info a:hover, ul li.recentcomments, .post_box a.meta-comment:hover, .entry a:hover, .entry a:focus, .entry a, #breadcrumbs a, #breadcrumbs a:hover, .meta-info, .post a{
		color:<?php echo get_theme_mod('wp_fanzone_theme_color'); ?>;
		}
		.arrow-right{
			border-left: 10px solid <?php echo get_theme_mod('wp_fanzone_theme_color'); ?>;
		}
	<?php endif; ?>
	</style>
	<?php	  
	} 
  }
endif;
add_action( 'wp_head', 'wp_fanzone_apply_color' );

// register navigation menus
register_nav_menus(
	array(
	'main-menu'=>__('Main Menu'),
	'top-menu'=>__('Top Menu')
	)

);
function wp_fanzone_menu() {

	require_once (TEMPLATEPATH . '/includes/wp_fanzone_menu.php');

}
if ( function_exists( 'add_theme_support' ) ){

	add_theme_support( 'post-thumbnails' );
}


if ( function_exists( 'add_image_size' ) ) {
	
	add_image_size( 'widget-post-thumb',  70, 70, true );
	add_image_size( 'post-thumb',  400, '200' , true );
	add_image_size( 'slide-small-thumb',  130, 135 , true );
	add_image_size( 'slide-medium-thumb',  265, 135 , true );
	add_image_size( 'slide-large-image',  849, 424, true );

}
 


// Register widgetized area and update sidebar with default widgets
function wp_fanzone_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Homepage Sidebar', 'wp-fanzone' ),
		'id' => 'defaul-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4><div class="arrow-right"></div></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Post Sidebar', 'wp-fanzone' ),
		'id' => 'post-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4><div class="arrow-right"></div></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'wp-fanzone' ),
		'id' => 'page-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4><div class="arrow-right"></div></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Archives Sidebar', 'wp-fanzone' ),
		'id' => 'archives-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title"><h4>',
		'after_title' => '</h4><div class="arrow-right"></div></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Banner Widget', 'wp-fanzone' ),
		'description' => 'Enter your banner code into this text widget.',
		'id' => 'top-right-widget',
		'before_widget' => '<div id="top-widget">',
		'after_widget' => "</div>",
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 1', 'wp-fanzone' ),
		'id' => 'footer-one',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 2', 'wp-fanzone' ),
		'id' => 'footer-two',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 3', 'wp-fanzone' ),
		'id' => 'footer-three',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );
	
}
add_action( 'widgets_init', 'wp_fanzone_widgets_init' );

if ( ! function_exists( 'wp_fanzone_comment' ) ) :

// Template for comments and pingbacks.

function wp_fanzone_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'wp-fanzone' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'wp-fanzone' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>">
			<footer class="clearfix comment-head">
            
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 50 ); ?>
					<?php printf( __( '%s', 'wp-fanzone' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'wp-fanzone' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
                    <span class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </span><!-- .reply -->
					<?php edit_comment_link( __( '(Edit)', 'wp-fanzone' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content">
            	<?php if ( $comment->comment_approved == '0' ) : ?>
					<h6><em><?php _e( 'Your comment is awaiting moderation.', 'wp-fanzone' ); ?></em></h6>
					<br />
				<?php endif; ?>
				<?php comment_text(); ?>
            </div>

			
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif;

//====================================Breadcrumbs=============================================================================================
function wp_fanzone_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo home_url();
        echo '">';
        echo 'Home';
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
                $fanzone_act = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $fanzone_act as $fanzone_inherit ) {
                    $output = '<li><a href="'.get_permalink($fanzone_inherit).'" title="'.get_the_title($fanzone_inherit).'">'.get_the_title($fanzone_inherit).'</a></li> <li class="separator">/</li>';
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

class wpfanzoneNavMenuWalker extends Walker_Nav_Menu {
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
	

	$classes[] = ($args->has_children) ? 'dropdown' : '';
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
	$attributes .= ($args->has_children) ? ' class="dropdown-toggle"  ' : '';
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

// Register 'FanZone Recent Posts' widget
add_action( 'widgets_init', 'init_wp_fanzone_recent_posts' );
function init_wp_fanzone_recent_posts() { return register_widget('wp_fanzone_recent_posts'); }

class wp_fanzone_recent_posts extends WP_Widget {
	/** constructor */
	function wp_fanzone_recent_posts() {
		parent::WP_Widget( 'wp_fanzone_recent_posts', $name = 'FanZone Recent Post' );
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