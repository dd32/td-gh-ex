<?php
/**
 * The template part for displaying header layout.
 *
 * @package Fmi
 */

?>
<div class="navbar navbar-topbar">
  <div class="navbar-container">
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

      <?php vs_header_offcanvas_button(); ?>
    </div>
  </div>
</div>
<div class="navbar navbar-bottombar">
  <div class="navbar-container">
    <div id="site-navigation" class="main-navigation">
      <?php
        if (has_nav_menu('primary')) {
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'menu_class' => 'menu clearfix',
          ) );
        }
      ?>
    </div>
  </div>
</div>
