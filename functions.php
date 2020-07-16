<?php

/* Commodore baw hack wp title for home */
add_filter( 'wp_title', 'commodore_baw_hack_wp_title_for_home' );
function Commodore_baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return get_bloginfo( 'title' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

/* Commodore register sidebars */
function Commodore_register_sidebars() {
	register_sidebar(
		array(
			'name' => __('Sidebar','commodore'),
			'id' => 'sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<header><h3 class="widgettitle">',
			'after_title' => '</h3></header>'
		)
	);
}
add_action( 'widgets_init', 'Commodore_register_sidebars' );

/* Sets up theme defaults and registers support for various WordPress features */
function Commodore_setup() {
		load_theme_textdomain( 'commodore', get_template_directory() . '/languages' );
		add_theme_support('automatic-feed-links');
		add_theme_support('custom-background');
		add_theme_support('post-thumbnails');
		add_theme_support('custom-header');
		add_theme_support('title-tag');
		add_editor_style(); // hack to add a class to the body tag when the sidebar is active
		register_nav_menus( array(
  			'header-menu' => esc_html__( 'Header Menu','commodore' ),
			)
		);
	}
add_action( 'after_setup_theme', 'Commodore_setup' );


/* Enqueue scripts */
function Commodore_scripts() {
	wp_enqueue_script( 'pie_auto_grow', get_template_directory_uri().'/js/pie_input_grow.js',array('jquery'),'1.0.0',true );
	//wp_enqueue_script( 'flipcursor', get_template_directory_uri().'/js/flipcursor.js',array(),'1.0.0',false );
	wp_enqueue_script( 'search_functions', get_template_directory_uri().'/js/search_functions.js',array(),'1.0.0',true );
	if(get_option('thread_comments')) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts','Commodore_scripts');

/* Commodore terminally has sidebar */
function Commodore_terminally_has_sidebar($classes) {	if (is_active_sidebar('sidebar')) {		// add 'class-name' to the $classes array
$classes[] = 'has_sidebar';			}	// return the $classes array
return $classes;}add_filter('body_class','Commodore_terminally_has_sidebar');

/* Commodore search form */
function Commodore_search_form( $form ) {
$form = '<form class="pie_search_form" role="search" method="get" id="searchform" action="' . esc_url(home_url( '/' )) . '" ><div id="terminal" onclick="$(\'s\').focus();" onblur="alert(\'blur\');">
		<input type="text" value="" name="s" id="s" onkeydown="writeit(this, event);moveIt(this.value.length, event)" onkeyup="writeit(this, event)" onkeypress="writeit(this, event);" maxlength="75" />
		<div id="getter">
			<span id="writer"></span><span id="cursor">&nbsp;</span>
		</div>
	</div>
	</form>';
 return $form;
}
add_filter( 'get_search_form', 'Commodore_search_form' );

if ( ! isset( $content_width ) ) $content_width = 550;
