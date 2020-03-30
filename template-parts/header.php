<?php
/**
 * The template part for displaying header layout.
 *
 * @package Fmi
 */

?>
<div class="vs-container">
  <div class="site-branding clearfix">
    
    <div class="site-branding-logo">
      <?php the_custom_logo();?>
      <?php if ( !get_theme_mod( 'header_title' )):?>
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <?php endif;?>
    </div>

    <?php if ( !get_theme_mod( 'header_search' )):?>
    <div class="site-branding-search">
        <?php get_search_form(); ?>
    </div>
    <?php endif;?>  

    <button class="menu-toggle navbar-toggle toggle-offcanvas" data-toggle="collapse" data-target="#main-navigation-collapse"><i class="fa fa-bars"></i></button>
  </div>
</div>
