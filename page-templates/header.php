<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
	<?php if ( get_theme_mod( 'aqua_favicon') ) { ?>
	<link rel="shortcut icon" href="<?php echo get_theme_mod( 'aqua_favicon', 'No image has been saved yet.' ); ?>" />
	<?php }
	else {
	?>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/aqa-fav.png" />
	<?php } ?>
	<title><?php  wp_title( '|', true, 'right'); ?></title>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- Aqua Wraper -->

<div class="aqa-wrap">

<header>

<!-- Aqua Logo Menu Bar -->

<div class="aqa-logo-menu-bar">

<div class="container">

<div class="col-md-3 col-xs-6">

<div class="aqa-logo">

	<?php if ( get_theme_mod( 'aqua_header_logo') ) { ?>

	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="logo_position" src="<?php echo get_theme_mod( 'aqua_header_logo', 'No image has been saved yet.' ); ?>"></a>

	<?php 

	}

	else

	{

	?>
	<!-- <img src=""> -->

	<p class="aqa-logo-txt"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/aqa-logo.png"></a></p>

	<?php } ?>

</div>

</div>

<div class="col-md-8">

<div class="aqa-menu">

<div class="custom-nav nav-menu-align">

<nav class="navbar navbar-default">

    <?php

wp_nav_menu(
  array(
	'theme_location' => 'Header Menu',
	'menu'              => 'Header Menu',
	'container' => '',
	'container_class' => '',
	'li_class'   => 'dropdown-submenu-position',
	'container_id' => '',
	'menu_class' => 'main-menu nav nav-bar',
	'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
	'walker' => new WP_Bootstrap_Navwalker()
  )
  );

        ?>
 
</nav>

</div>

</div>

</div>



<?php if( get_theme_mod( 'aqua_search_box' ) == '1') { ?> 

<div class="col-md-1 col-xs-6">

    <div class="codecon_half">

    <div class="expSearchBox">

        <div class="expSearchFrom">
		
		     <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" id="search-form">

            <input id="field" type="text" placeholder="Search here" name="s" />  
           
            <div class="close">

                <span class="front"></span>

                <span class="back"></span></div>

			 </form>	

            </div>   

        </div>

    </div>

    </div>
    <div class="col-xs-12 aqa-mean-menu"></div>



<?php } ?>

</div>

</div>
<?php if ( ! is_home() && ! is_front_page() ) { ?>
<div class="breadcrumb">
<div class="container">
<div class="aqa-page-breadcrum-title"><?php the_title(); ?> </div>
<div class="aqa-breadcrumb"><?php get_breadcrumb(); ?></div>
</div>
</div>
<?php } ?>

</header>
