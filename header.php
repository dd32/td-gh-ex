<?php
/**
 * header.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?php bloginfo('description');?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
   <!-- Preloader -->
   <div class="avik-loader">
     <div class="loader"></div>
   </div>
   <div id="page" class="site">	
     <header>
	   <!-- General Logo-->
     <!-- Logo 2 -->
     <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_logo_2', false ) )) : ?>
     <div class="avik-custom-logo-header avik-logo <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_rotate_logo', false ) )) : ?> rotate <?php endif; ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php echo esc_url( get_theme_mod( 'avik_logo_2', get_stylesheet_directory_uri(). '/img/logo-avik-bianco.png' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name','dispaly' ) ); ?>" class="avik-custom-logo-header">
        </a>
     </div>
     <?php endif; ?>
     <nav class="navbar navbar-expand-lg avik-nav-front-page hide-menu fixed-top"> 
        <div class="avik-logo <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_rotate_logo', false ) )) : ?> rotate <?php endif; ?>">
			       <!-- Logo 1-->
			       <div class="avik-custom-logo-body">
		           <?php the_custom_logo();?>
					   </div>
			       <?php if ( is_front_page() && is_home() ) : ?>
				     <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			       <?php else : ?>
				     <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			       <?php endif;
			           $avik_description = get_bloginfo( 'description', 'display' );
			       if ($avik_description || is_customize_preview() ) : ?>
				     <p class="site-description"><?php echo $avik_description; /* WPCS: xss ok. */ ?></p>
			       <?php endif; ?>		
           </div>	
		       <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
           </button>
             <?php
               wp_nav_menu([
                'menu'            => 'menu-1',
                'theme_location'  => 'menu-1',
                'container'       => 'div',
                'container_id'    => 'bs4navbar',
                'container_class' => 'collapse navbar-collapse',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav ml-auto',
                'depth'           => 2,
                'fallback_cb'     => 'bs4navwalker::fallback',
                'walker'          => new bs4navwalker() ]);
		         ?>
	   </nav>
</header>
<div id="content" class="site-content">

