<?php
/**
 * header-post.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.2.4
 */

?>
<?php
/**
 * header.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.1.1
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
	  <!-- Logo-->
      <nav class="navbar navbar-expand-lg nav-post">
           <div class="avik-logo">
			       <div class="avik-custom-logo-post  <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_rotate_logo', true ) )) : ?> rotate <?php endif; ?>">
		           <?php the_custom_logo();?>
					   </div>
			       <?php if ( is_front_page() && is_home() ) : ?>
				     <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			       <?php else : ?>
				     <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			       <?php endif;
			         $avik_description = get_bloginfo( 'description', 'display' );
			       if ($avik_description || is_customize_preview() ) : ?>
				     <p class="site-description"><?php echo esc_html($avik_description); ?></p>
			       <?php endif; ?>
		       </div>
		       <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
           </button>
           <?php
               wp_nav_menu(array(
                'menu'            => 'menu-2',
                'theme_location'  => 'menu-2',
                'container'       => 'div',
                'container_id'    => 'bs4navbar',
                'container_class' => 'collapse navbar-collapse',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav ml-auto',
                'depth'           => 2,
                'fallback_cb'     => 'bs4navwalker::fallback',
                'walker'          => new bs4navwalker() ));
		         ?>
	  </nav>
</header>
</div>
<div id="content" class="site-content">
