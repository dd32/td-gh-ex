<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?php wp_title('&raquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper">

	<div id="header">


		<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
		<<?php echo $heading_tag; ?> id="site-title">
			<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</<?php echo $heading_tag; ?>>
		<div id="tagline"><?php bloginfo( 'description' ); ?></div>

		<ul>
			<li><a href="<?php  bloginfo('url'); ?>"><?php _e('Top', 'birdsite'); ?></a>
			<li><a href="<?php  bloginfo('url'); ?>/about"><?php _e('About', 'birdsite'); ?></a>
			<li><a href="<?php  bloginfo('url'); ?>/feed"><?php _e('Feed', 'birdsite'); ?></a>
		</ul>
	</div>
