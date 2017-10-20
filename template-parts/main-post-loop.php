<?php
/**
 * main post loop for tag,index,Category etc.
 *
 * imonthemes
 * @subpackage bestblog
 * @since 1.0
 * @version 1.0
 */

?>
<div class="grid-container">
  <div class="grid-x grid-margin-x align-center ">
    <div class="cell  small-12 <?php if ( !is_active_sidebar( 'right-sidebar' ) ) : ?> large-12 medium-12 <?php else : ?> large-8 with-sidebar  <?php endif;?>">
      <div class="blog-container <?php if ( !is_active_sidebar( 'right-sidebar' ) ) : ?>grid-x grid-margin-x <?php endif;?>"  >

        <?php if ( have_posts() ) : ?>

          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <?php
            /*
            * Include the Post-Format-specific template for the content.
            * If bestblog want to override this in a child theme, then include a file
            * called content-___.php (where ___ is the Post Format name) and that will be used instead.
            */
            get_template_part( 'template-parts/post/content', get_post_format() );
            ?>

          <?php endwhile; ?>

          <?php get_template_part('pagination'); ?>

        <?php else : ?>

          <?php get_template_part( 'template-parts/post/content', 'none' ); ?>

        <?php endif; ?>
      </div><!--POST END-->
    </div>
  <?php get_template_part('sidebar'); ?>
    <!--sidebar END-->
  </div>
</div>
