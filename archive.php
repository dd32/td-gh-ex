<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package agency-x
 */

get_header(); ?>
        <!-- Start Blog -->
        <section id="blog" class="section page">
            <div class="container">
                <div class="row">
                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php

                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/content' );
                                ?>

                            <?php endwhile; ?>

                            

                        <?php else : ?>

                            <?php get_template_part( 'template-parts/content', 'none' ); ?>

                        <?php endif; ?>           
                
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-nav">
                        <?php the_posts_pagination(); ?></div>
                    </div>
                </div>
            </div>
        </section>

<?php get_footer(); ?>
