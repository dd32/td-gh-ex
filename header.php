<!DOCTYPE html>

<html >
<html <?php language_attributes(); ?> xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" itemscope itemtype="http://schema.org/Article">
	<head>

		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

		<title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php if (!is_admin()) { wp_enqueue_script('html5_shim'); } ?>

		<?php wp_head(); ?>



<script language="JavaScript">


	// c64 404 page not found by Klaus Hessellund / 200709 / Optimized for cursor only by United Networks 7-15-12
	// Feel free to copy this script to you own page. Some credits would be nice, but not mandatory :p
	// c64 charset found here : http://www.dwarffortresswiki.net/index.php/List_of_user_tilesets


	function flipcursor(nosettime) {

		var cursor=document.getElementById("cursor");

		if (cursor.style.visibility == 'hidden') {
			cursor.style.visibility = '';
		} else {
			cursor.style.visibility = 'hidden';
		}
		if (!nosettime) {
			setTimeout('flipcursor()',300);
		}
	}
</script>
	</head>
	<body onload="flipcursor(0);initWrite();" <?php body_class(); ?>>
<div id="container">
  		<header class="header">
  			<h1>**** <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> ****</h1>
  			<p><?php bloginfo('description'); ?></p>
  			<h3><?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'fallback_cb' => '' ) ); ?></h3>
  		</header>
	  <div id="wrapper">
 		<section class="content">