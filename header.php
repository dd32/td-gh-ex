<?php
/*Template for displaying the header for all the files.
*
*@package -> Wordpress
*@sub-package -> afia
*@since -> V 1.0.0
*/ 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<html>
<head>
 <meta charset = "<?php bloginfo('charset'); ?>"/>
<?php
if(get_bloginfo('description')):
?>
 <meta name = "description" content = "<?php bloginfo('description'); ?>" />
<?php
endif;
?>
 
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <?php
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'theme_slug_render_title' );
}
?>
 <!--[if lt IE 9]>
  <script src="<?php echo get_stylesheet_directory_uri();?>/lib/js/html5.js"></script>
  <![endif]-->
 <link rel = "stylesheet" media = "screen and (min-device-width: 750px)" href = "<?php echo get_stylesheet_uri();?>">
 <link rel = "stylesheet" media = "screen and (max-device-width: 750px)" href = "<?php echo get_stylesheet_directory_uri();?>/assets/css/handheld.css">
<script src = "<?php echo get_stylesheet_directory_uri();?>/lib/js/functions.js"></script>
<style>
<?php 
if(is_home() || is_front_page()):
	$css = '.top-bar{display:none;}';
	echo $css;	
endif;
$z  = get_header_image();
if(! $z):
echo '#header-img{display:none;} ';
else:
echo '#sideba{top:413px;}';
endif; 
?>
</style>
<?php 
wp_head();
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
?>
</head>
<body <?php body_class( $class ); ?>>
<!--We create a div container for the #content -->
<div id = "content">
<header class="header">
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        </h1>
        <span class="site-description">
<div class="inline">
<?php  
		afia_short_description();
		?>
</div>
</span>
<div class="inline">
		<?php 
		afia_logged_details();
		?>
</div>
<div id = "header-img">
<img src="<?php header_image(); ?>"  alt="" />
</div>
</header><br /><br /> <!-- .header -->
<!--#leftContent-->
<div id = "leftContent">
<div class = "top-bar">
<!--Top-bar class -->
<?php afia_top_bar();?>
</div>
