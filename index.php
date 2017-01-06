<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Big Blue
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        	<div class="inner-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="archived-wrapper">
                            
									<?php
                                    if ( have_posts() ) :
                            
                                        if ( is_home() && ! is_front_page() ) : ?>
                                            <header>
                                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                            </header>
                            
                                        <?php
                                        endif;
                            
                                        /* Start the Loop */
                                        while ( have_posts() ) : the_post();
                            
                                            /*
                                             * Include the Post-Format-specific template for the content.
                                             * If you want to override this in a child theme, then include a file
                                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                             */
                                            get_template_part( 'template-parts/content', get_post_format() );
                            
                                        endwhile;
                            
                                    else :
                            
                                        get_template_part( 'template-parts/content', 'none' );
                            
                                    endif; ?>
                                    <?php the_posts_pagination( array(
                                        'mid_size' => 2,
                                        'prev_text' => '<span class="fa fa-chevron-left"></span>', 
                                        'next_text' => '<span class="fa fa-chevron-right"></span>'
                                    ) ); 
                                    ?>

                            </div><!--post-wrapper-->
                        </div>
                        <div class="col-md-4">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div><!-- container -->
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
