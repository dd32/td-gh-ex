<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title>
		<?php global $page, $paged;
		wp_title('|', true, 'right');
		bloginfo('name');
		$site_description = get_bloginfo('description', 'display');
		if( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if( $paged >=2 || $page >= 2 )
			echo ' | ' . sprintf( __('Page $s', 'baris'), max($paged, $page));
		?>
	</title>
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ) ?>" type="text/css" media="all">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
	<?php if( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container" class="clearfix">
	<header>
		<h1><a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a></h1>
		<span></span>
		<p><?php echo get_bloginfo('description', 'display'); ?></p>
		
		<?php get_sidebar('left'); ?>
		<?php get_sidebar('right'); ?>
		<div class="clear"></div>
	</header>
