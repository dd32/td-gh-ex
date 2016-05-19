<?php get_header(); ?>

    <div class="container main-content">
        <div class="row">
            <div class="
		<?php if(get_theme_mod('aster_home_layout') == 'full') : ?>
		col-md-12
		<?php elseif(get_theme_mod('aster_home_layout') == 'leftsidebar') : ?>
		col-md-8 col-md-push-4
		<?php else : ?>
		col-md-8
		<?php endif; ?>
		">
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

                    <?php get_template_part('content', 'single'); ?>

                    <?php if (!get_theme_mod('aster_post_author')) : ?>
                        <?php get_template_part( 'user-profile' ); ?>
                    <?php endif; ?>

                    <?php if (!get_theme_mod('aster_post_nav')): ?>
                        <?php aster_post_navigation(); ?>
                    <?php endif; ?>


                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || get_comments_number() ) : ?>
                        <div class="comment-box">
                            <?php comments_template(); ?>
                        </div>
                    <?php endif;
                    ?>

                    <?php
                    // don't-delete
                    $count_post = get_post_meta( $post->ID, 'post_views_count', true);

                    if( $count_post == 'post_views_count'){
                        $count_post = 0;
                        delete_post_meta( $post->ID, 'post_views_count');
                        add_post_meta( $post->ID, 'post_views_count', $count_post);
                    }
                    else
                    {
                        $count_post = (int)$count_post + 1;
                        update_post_meta( $post->ID, 'post_views_count', $count_post);

                    }
                    ?>

                <?php endwhile; ?>

                <?php else : ?>

                    <?php get_template_part( 'content', 'none' ); ?>

                <?php endif; ?>
            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>

<?php get_footer(); ?>
