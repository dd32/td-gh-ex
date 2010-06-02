<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>

<body>
<div id="header"><div class="hpadd"><div class="hwrapp">
	<div class="hlogo"><h1><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1><div class="description"><?php bloginfo('description'); ?></div></div>
	<div class="top_menu">
		<ul>
			<li class="home"><a href="<?php bloginfo('url'); ?>/">Home</a></li>	
			<?php wp_list_pages('title_li='); ?>
		</ul>
		<div class="search"><?php get_search_form(); ?></div>
	</div>
</div></div></div><!-- #header-->
<div id="wrapper">
	