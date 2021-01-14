<?php

/* 	Socialia Theme's Header
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Socialia 2.0
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php 

wp_head(); ?>

</head>

<body <?php body_class(); ?> >
	<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>
  
  	  <div id="top-menu-container">
     
     <div id="social">
		<a href="<?php echo esc_url(d5socialia_get_option('facebook_link', '#')); ?>" class="facebook-link" target="_blank"></a>
		<a href="<?php echo esc_url(d5socialia_get_option('twitter_link', '#')); ?>" class="twitter-link" target="_blank"></a>
		<a href="<?php echo esc_url(d5socialia_get_option('blog_link', '#')); ?>" class="blog-link" target="_blank"></a>

	</div>
  	 
      <?php get_search_form(); ?>
     
      </div><div class="clear"> </div>
      <div id ="header">
      <div id ="header-content">
      
		<!-- Site Titele and Description Goes Here -->
        <a id="logotitle" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( get_header_image() !='' ): ?><img class="site-logo" src="<?php header_image(); ?>"/><?php else: ?><h1 class="site-title"><?php echo bloginfo( 'name' ); ?></h1><?php endif; ?></a>
		<h2 class="site-title-des"><?php bloginfo( 'description' ); ?></h2>
                
        <!-- Site Main Menu Goes Here -->
        <nav id="main-menu-con">
		<?php if ( has_nav_menu( 'main-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'main-menu-items' )); else: wp_page_menu(); endif; ?>
        </nav><div class="whiteline"></div><div class="clear"> </div>
      
      </div><!-- header-content -->
      </div><!-- header -->
      

<div id="slide-container"><div class="box_skitter box_skitter_large"><ul> <?php
foreach (range(1, 12) as $sinumber) { ?>
<li><a href="<?php echo esc_url(d5socialia_get_option('slide-image-' . $sinumber . '-link', '#')); ?>"><img src="<?php echo esc_url(d5socialia_get_option('slide-image-' . $sinumber,  get_template_directory_uri() . '/images/slides/(' . $sinumber . ').jpg')); ?>" class="fade" /></a><div class="label_text"><p><?php echo '<span>' . esc_textarea(d5socialia_get_option('slide-image-' . $sinumber . '-title', 'Slide Image ' . $sinumber . esc_html__(' Title | Welcome to D5 Socialia Theme, Visit D5 Creation for Details','d5-socialia'))). '</span><br />'; echo esc_textarea(d5socialia_get_option('slide-image-' . $sinumber . '-description', esc_html__('D5 Socialia is a WordPress Theme which is Ideal for Social Organizations, NGOs, CBOs, Environmental Organizations, Societies, Climate Change Related Progrms.','d5-socialia'))); ?></p></div></li>
<?php  }  ?>
</ul>

</div > <!-- slide -->
</div> <!-- slide-container -->

<div id="container">