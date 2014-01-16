<?php

if ( ! isset( $content_width ) )
	$content_width = 584;
add_action( 'after_setup_theme', 'northern_setup' );

function northern_setup() {
	load_theme_textdomain( 'northern', get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

register_nav_menu( 'primary', __( 'Primary Menu', 'northern' ) );

add_editor_style();
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-background', array( 'default-color' => '444' ) );
};






function northern_widgets_init() {
    register_sidebar(array(
    'name'=> __( 'Sidebar 1', 'northern' ),
    'id' => 'sidebar-1',
    'description' => 'Sidebar 1',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));

    register_sidebar(array(
    'name'=> __( 'Sidebar 2', 'northern' ),
    'id' => 'sidebar-2',
    'description' => 'Sidebar 2',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
    'name'=> __( 'Sidebar 3,', 'northern' ),
    'id' => 'sidebar-3,',
    'description' => 'Sidebar 3,',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
    'name'=> __( 'Sidebar 4', 'northern' ),
    'id' => 'sidebar-4',
    'description' => 'Sidebar 4',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));
}
add_action( 'widgets_init', 'northern_widgets_init' );










function northern_pagenavi() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
    'base' => @add_query_arg('paged','%#%'),
    'format' => '',
    'total' => $wp_query->max_num_pages,
    'current' => $current,
    'type' =>'plain',
    'show_all' => false,
    'mid_size' => 2,
);
if ( $wp_rewrite->using_permalinks() )
    $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
    if ( !empty( $wp_query->query_vars['s'] ) )
    $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
    echo paginate_links( $pagination );
}

function northern_the_breadcrumb() {
    echo(_e("You are here:", 'northern'));
	echo ' <a href="';
	echo home_url();
	echo '">';
	bloginfo('name');
	echo "</a> ";
	if (is_category() || is_single()) {
		echo "&raquo; ";
        the_category(', ');
		if (is_single()) {
			echo " &raquo; ";
			the_title();
		}
	} elseif (is_page()) {
		echo "&raquo; ";
   		echo the_title();
	}
};

function northern_theme_styles()
{
   wp_register_style( 'screen-style', get_template_directory_uri() . '/style.css');
   wp_register_style('ubuntu-font', 'http://fonts.googleapis.com/css?family=Ubuntu');
   wp_enqueue_style( 'screen-style' );
   wp_enqueue_style('ubuntu-font');
}
add_action('wp_print_styles', 'northern_theme_styles');

function northern_enqueue_scripts() {
	if (!is_admin()) {
	  wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.js');
      wp_register_script('northern-custom', get_template_directory_uri() . '/js/northern-custom.js');
      wp_register_script( 'html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array( 'jquery' ), '1', false );
      wp_enqueue_script('jquery');
	  wp_enqueue_script('superfish');
      wp_enqueue_script('northern-custom');
      wp_enqueue_script( 'html5-shim' );
	}
}
add_action('init', 'northern_enqueue_scripts');