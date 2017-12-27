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
      <div class="cell  small-24 <?php echo bestblog_sidebar_layout();?> large-order-2 ">
        <?php $blogpost_style = get_theme_mod('layout_page_gen', 'content1');?>
        <div class="blog-container <?php if ( 'content2' == $blogpost_style) : ?> post-wrap-layout-2 grid-x grid-padding-x grid-padding-y <?php endif;?>">
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
                <div class="cell small-24  large-24 ">
                <?php the_posts_pagination(); ?>
              </div>
          <?php else : ?>
            <?php get_template_part( 'template-parts/post/content', 'none' ); ?>
          <?php endif; ?>
        </div>
        <!--POST END-->
      </div>
      <?php $sidbar_positionmn = get_theme_mod( 'sidbar_position_gen', 'right' );
      if (('full' == $sidbar_positionmn)) {
          echo '';  // nosidebar
      } elseif ( ('right' == $sidbar_positionmn)) {
        echo '<div class="cell small-24 medium-22 large-7 large-order-2">';   get_template_part('sidebar');   echo '</div>';
      } elseif ( ('left' == $sidbar_positionmn)) {
        echo '<div class="cell small-24 medium-22 large-7 large-order-1">';   get_template_part('sidebar');   echo '</div>';
      }
      ?>
      <!--sidebar END-->
    </div>
  </div>
