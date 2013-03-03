<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />


<title><?php wp_title( '|', true, 'right' ); ?></title>


<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php // loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); // wp_head() should be just before the closing </head> tag, or many plugins will be broken ?>

</head>


<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<nav class="site-navigation main-navigation" role="navigation">
			<?php //wp_list_pages('title_li='); // list of pages ?>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary-nav',
				'container'       => 'nav',
				'container_class' => 'nav-menu clearfix',
				'menu_class'      => 'nav',
				'fallback_cb'     => 'activetab_list_pages'
			) );
			?>
			</nav> <!-- /.site-navigation /.main-navigation -->
		</div>
	</div> <!-- /.navbar-inner -->
</div> <!-- /.navbar -->

<?php
/*
<div class="container-fluid"><div class="row-fluid">
<div class="container"><div class="row">
*/
?>

<div class="container">
<div class="row">
<div class="span12 site-wrapper border-radius">
<div class="row">

	<div id="main" class="site-main">
