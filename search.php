<?php
/**
 *  Search
 */

get_header(); ?>

    <section class="content-wrapper">
        <div class="content-container">
            <div class="container">
                <div class="row">
                    <div class="eight columns">

                        <header class="page-header">
                            <?php if ( have_posts() ) : ?>
                                <h1 class="page-title"><?php printf( __( 'Search Results for: %s', "bnw-theme" ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                            <?php else : ?>
                                <h1 class="page-title"><?php _e( 'Nothing Found', "bnw-theme" ); ?></h1>
                            <?php endif; ?>
                        </header><!-- .page-header -->

                        <div class="blog-wrapper">

                            <?php if ( have_posts() ): ?>

                                <?php while ( have_posts() ) : the_post(); ?>

                                    <?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>

                                <?php endwhile; ?>

                                <?php 
                                    the_posts_pagination( array(
                                        "screen_reader_text" => "",
                                        "mid_size" => 2,
                                        "prev_text" => __( 'Pre', "bnw-theme" ),
                                        "next_text" => __( 'Next', "bnw-theme" ),
                                    ) );
                                ?>

                            <?php else: ?>

                                <?php get_template_part( 'template-parts/post/content', 'none' ); ?>

                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="four columns">

                        <?php get_sidebar(); ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
