<?php
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( get_bloginfo( 'title' ) ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

function pieSearchjs(){
	wp_register_script( 'pie_auto_grow', get_stylesheet_directory_uri().'/pie_input_grow.js',array('jquery'),'1.0.0',true);
    //wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'pie_auto_grow' );

}
add_action('wp_enqueue_scripts','pieSearchjs');

if ( ! isset( $content_width ) ) $content_width = 550;

function commodore_register_sidebars() {
	register_sidebar(
		array(
			'name' => 'Sidebar',
			'id' => 'sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<header><h3 class="widgettitle">',
			'after_title' => '</h3></header>'
		)
	);
}
add_action( 'widgets_init', 'commodore_register_sidebars' );

add_theme_support('automatic-feed-links');

add_theme_support('custom-background');

add_editor_style();// hack to add a class to the body tag when the sidebar is active

function terminally_has_sidebar($classes) {	if (is_active_sidebar('sidebar')) {		// add 'class-name' to the $classes array
$classes[] = 'has_sidebar';			}	// return the $classes array
return $classes;}add_filter('body_class','terminally_has_sidebar');

function my_search_form( $form ) { 
$form = '<form class="pie_search_form" role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" ><div id="terminal" onclick="$(\'s\').focus();" onblur="alert(\'blur\');">
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
add_filter( 'get_search_form', 'my_search_form' );

function register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => 'Header Menu' )
  );
}
add_action( 'init', 'register_my_menus' );

// RECOMMENDED: No reference to post-thumbnails was found in the theme...
add_theme_support('post-thumbnails');

// RECOMMENDED: No reference to add_theme_support( "custom-header", $args )
add_theme_support('custom-header');

function theme_slug_setup() {
   add_theme_support('title-tag');
}
//add_action( 'after_setup_theme', 'theme_slug_setup' );

?>