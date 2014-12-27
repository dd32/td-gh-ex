<?php
function fmi_theme_setup(){
	global $content_width;
	if(!isset($content_width)){$content_width = 660;}
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' ,array('post'));
}
add_action('after_setup_theme','fmi_theme_setup');

function fmi_theme_scripts(){
	wp_enqueue_style('style',get_stylesheet_uri());
	wp_enqueue_style('base',get_template_directory_uri()."/css/base.css");
	wp_enqueue_style('responsive',get_template_directory_uri()."/css/responsive.css");
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css');
	if(fmi_theme_option( 'vs-body-google-font-url' ) ) {
        wp_enqueue_style( 'google-fonts-body', fmi_theme_option( 'vs-body-google-font-url' ));
    } else {
        wp_enqueue_style( 'google-body-fonts-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic');
    }
	
	wp_enqueue_script('jquery-1.7.2',get_template_directory_uri().'/js/jquery-1.7.2.min.js',array(),'1.0',true);
	wp_enqueue_script('base',get_template_directory_uri().'/js/base.js',array(),'1.0',true);
	if(is_singular()&&comments_open()&&get_option('thread_comments')){wp_enqueue_script('comment-reply');}
}
add_action('wp_enqueue_scripts','fmi_theme_scripts');

function fmi_register_menus(){
	register_nav_menus(array('menu' => 'Menu'));
}
add_action( 'init', 'fmi_register_menus' );

function fmi_theme_title($title,$sep) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name', 'display' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
//		$title = "$title $sep $site_description";
		$title = "$title";
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'fmi' ), max( $paged, $page ) );
	return $title;
}
add_filter('wp_title','fmi_theme_title',10,2);

function fmi_theme_widgets() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'fmi' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'fmi_theme_widgets' );

function fmi_theme_styles(){
    $custom_css = '';
    if (fmi_theme_option( 'vs-custom-css' ) ) {
        $custom_css = fmi_theme_option( 'vs-custom-css' );
    }
	$body_font = fmi_theme_option( 'vs-body-google-font-name' );
?>
<style type="text/css" media="screen">
body{<?php echo ( $body_font ) ? $body_font : 'font-family: \'Open Sans\', sans-serif;'; ?>}
<?php echo htmlspecialchars_decode( $custom_css );?>
</style>
<?php
}
add_action('wp_head', 'fmi_theme_styles', 11);

require get_template_directory() . '/fun/base.php';
require get_template_directory().'/set/settings.php';
?>