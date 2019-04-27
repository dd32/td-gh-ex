<?php
/**
 *  Single
 */

get_header(); ?>

    <section class="content-wrapper">
        <div class="content-container">
            <div class="container">
                <div class="row">
                    <div class="eight columns">
                        <div class="entry-wrapper-single">

                            <?php while ( have_posts() ): ?>

                                <?php the_post(); ?>
                                
                                <?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>

                                <?php get_template_part( 'template-parts/extra/author'); ?>

                                <div class="entry-post-navigation">
                                    <?php the_post_navigation(); ?>
                                </div>
                                
                                <div class="comment-wrapper">
                                    <?php 
                                        if( comments_open() ){
                                            comments_template();
                                        }
                                    ?>
                                </div>

                            <?php endwhile; ?>
                        
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
