<?php
 /**
  * Template Name: Content Right
  *
  * template-content-right.php
  * Template for placing main content on the right
  *
  * @subpackage Best_Reloaded
  * @since Best Reloaded 0.1
  */
?>

<?php get_header(); ?>
        <?php get_template_part( 'inc/parts/featured', 'bar' ); ?>

        <div class="row">
            <div class="col-md-8 content-right">
                <div id="main_content" role="main">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <h2 class="page-title"><?php the_title(); ?></h2>
                    <?php the_content(); ?>
					<?php wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'best-reloaded' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) ); ?>
                <?php endwhile; else: ?>

                    <p class="hero-p no-content-message"><?php esc_html_e( 'There is currently nothing to display.', 'best-reloaded' ); ?></p>

                <?php endif; ?>

                </div><!-- end #main_content -->
                <hr class="hr-row-divider">
            </div><!-- end .col-md-8 -->

            <?php get_sidebar( 'main' ); ?>

        </div><!-- end .row -->

<?php get_footer(); ?>
