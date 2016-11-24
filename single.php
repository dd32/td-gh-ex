<?php get_header(); ?>

    <div class="container main-content">
        <div class="row">
            <div class="col-md-8">
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                    <?php get_template_part('content', 'single'); ?>

                    <?php get_template_part( 'user-profile' ); ?>

                    <?php aster_post_navigation(); ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || get_comments_number() ) : ?>
                        <div class="comment-box">
                            <?php comments_template(); ?>
                        </div>
                    <?php endif; ?>

                <?php endwhile; ?>

                <?php else : ?>

                    <?php get_template_part( 'content', 'none' ); ?>

                <?php endif; ?>
            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>

<?php get_footer(); ?>
