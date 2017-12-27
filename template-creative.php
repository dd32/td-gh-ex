<?php
/**
 * Template Name: Creative Homepage
 *
 * Displays the custom Template of the theme.
 *
 * @package Best Blog
 */

get_header(); ?>

 <?php get_template_part( 'home','part/slider' );?>
  <div class="grid-container padding-vertical-large-2 padding-vertical-small-2 padding-horizontal-cs-1">
    <div class="grid-x grid-margin-x align-center">
      <?php if ( is_active_sidebar( 'home-widgets-bestblog' ) ) :?>
      <div class="large-auto small-24 cell">
        <?php dynamic_sidebar( 'home-widgets-bestblog' );?>
      </div>
        <?php endif;?>
        <?php if ( is_active_sidebar( 'home-sidebar-bestblog' ) ) :?>
      <div class="large-7 small-24 cell">
        <div id="home-sidebar" class="sidebar-inner" >
          <div  class="grid-x grid-margin-x ">
        <?php dynamic_sidebar( 'home-sidebar-bestblog' );?>
        </div>
        </div>
      </div>
      <?php endif;?>
    </div>
  </div>
<?php
get_footer();
