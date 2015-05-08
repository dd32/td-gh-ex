<?php

add_filter( 'wp_title', 'commodore_baw_hack_wp_title_for_home' );
function Commodore_baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( get_bloginfo( 'title' ) ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

function Commodore_pieSearchjs(){
	wp_enqueue_script( 'pie_auto_grow', get_template_directory_uri().'/pie_input_grow.js',array('jquery'),'1.0.0',true );
}
add_action('wp_enqueue_scripts','Commodore_pieSearchjs');

function Commodore_flipcursor_script() {
	wp_enqueue_script( 'flipcursor', get_template_directory_uri().'/js/flipcursor.js',array(),'1.0.0',false );
}
add_action('wp_enqueue_scripts','Commodore_flipcursor_script');

if ( ! isset( $content_width ) ) $content_width = 550;

function Commodore_register_sidebars() {
	register_sidebar(
		array(
			'name' => __('Sidebar','Commodore'),
			'id' => 'sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<header><h3 class="widgettitle">',
			'after_title' => '</h3></header>'
		)
	);
}
add_action( 'widgets_init', 'Commodore_register_sidebars' );

add_editor_style();// hack to add a class to the body tag when the sidebar is active

function Commodore_terminally_has_sidebar($classes) {	if (is_active_sidebar('sidebar')) {		// add 'class-name' to the $classes array
$classes[] = 'has_sidebar';			}	// return the $classes array
return $classes;}add_filter('body_class','Commodore_terminally_has_sidebar');

function Commodore_search_form( $form ) { 
$form = '<form class="pie_search_form" role="search" method="get" id="searchform" action="' . esc_url(home_url( '/' )) . '" ><div id="terminal" onclick="$(\'s\').focus();" onblur="alert(\'blur\');">
		<input type="text" value="" name="s" id="s" onkeydown="writeit(this, event);moveIt(this.value.length, event)" onkeyup="writeit(this, event)" onkeypress="writeit(this, event);" maxlength="75" />
		<div id="getter">
			<span id="writer"></span><span id="cursor">&nbsp;</span>
		</div>
	</div>
	</form><script type="text/javascript">   function formfocus() { document.getElementById("s").focus();  }   window.onload = formfocus;flipcursor(0);var $a=jQuery.noConflict();$a("document").ready(function() {
    setTimeout(function() {
        $a("#terminal").trigger(\'click\');
    },1);
});

</script>'; 

 return $form;
}
add_filter( 'get_search_form', 'Commodore_search_form' );

function Commodore_enqueue_comments_reply() {
	if(get_option('thread_comments')) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/* Sets up theme defaults and registers support for various WordPress features */
if ( ! function_exists( 'Commodore_setup' ) ) :
	function Commodore_setup() {
		load_theme_textdomain( 'Commodore', get_template_directory() . '/languages' );
		add_theme_support('automatic-feed-links');
		add_theme_support('custom-background');
		add_theme_support('post-thumbnails');
		add_theme_support('custom-header');
		add_theme_support('title-tag');
		register_nav_menus( array(
  			'header-menu' => esc_html__( 'Header Menu','Commodore' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'Commodore_setup' );

?>