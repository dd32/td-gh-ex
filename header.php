<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php 
    global $page, $paged;

	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
		
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'blogmeans' ), max( $paged, $page ) ); 
?></title>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.png" type="image/x-icon" />
<?php 
  if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
?>
<style type="text/css">
body, .header .ads468-60 {background-color:white; color: black}
.middle{background-color:white }  
.sticky {background: #CEE3FF}
a, a:hover, a:link, a:active, a:visited {color:#008000}
.header{background:white;}
.footer{background:white;}

#access {background:white; border-top: 2px solid black; border-bottom: 2px solid black}

.footer {border-top: 2px solid black}
.widget h3 {border-bottom: 2px solid black}
.header .title span {color: gray; }
h1,h2,h3,h4,h5, .post h1 a, .header .title h1 a, #comments h3 {color: #0000FF;}
</style>

<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>

<div class="wrapper">

<div class="header">

<div class="title">
<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
<span><?php bloginfo('description'); ?></span>
</div>

<div class="ads468-60">
<?php dynamic_sidebar('text-widget-area-for-ads468x60-in-header'); ?> 
</div>
</div>

<div id="access" role="navigation">			  
  <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
</div>

<div class="middle">