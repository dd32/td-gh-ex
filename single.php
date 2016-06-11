<div class="blog-content-wrapper">
<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package aza-lite
 */

get_header(); ?>

    <div class="container blog-content">
        <div class="row">
            <div class="col-md-9">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'template-parts/content', 'single' ); ?>
                                <?php the_post_navigation(); ?>
                                    <?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

                                        <?php endwhile; // End of the loop. ?>

                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <div class="col-md-3">
            <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
    </div>
    <?php get_footer(); ?>
