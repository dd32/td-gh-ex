<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link    https://codex.wordpress.org/Template_Hierarchy
*
*@package WordPress
*@subpackage Beenews
*@since Bee news 1.1
*/
get_header(); ?>
<div id="primary" class="content-area">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <?php if ( is_home() && ! is_front_page() ) : ?>
        <header class="page-header">
          <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
        <?php endif; ?>
      </div>
    </div>
      <div class="row">
        <div class="col-md-8 col-lg-8 col-xs-8">
          <div class="row">
            <?php if ( have_posts() ) : ?>
              <?php
              // Start the Loop.
              while ( have_posts() ) : the_post();
              ?>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <?php
                get_template_part( 'template-parts/content', 'list' );
                ?>
              </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
          <div class="row">
            <?php
            if ( function_exists('wp_bootstrap_pagination') )
              wp_bootstrap_pagination();
            ?>
          </div>
          
        </div>
        <?php get_sidebar(); ?>
      </div>
    
    </div>
    </div><!-- .content-area -->
    <?php get_footer(); ?>