<?php
/**
 * Display related posts from same category
 *
 * @since AcmePhoto 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('acmephoto_related_post_below') ) :

    function acmephoto_related_post_below( $post_id ) {

        global $acmephoto_customizer_all_values;
        if( 0 == $acmephoto_customizer_all_values['acmephoto-show-related'] ){
            return;
        }
        $categories = get_the_category( $post_id );
        if ($categories) {
            $category_ids = array();
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            ?>
            <div class="related-post-wrapper">
                <h2 class="widget-title">
                    <span><?php _e('Related Images', 'acmephoto'); ?></span>
                </h2>
                <div class="featured-entries-col masonry-start featured-related-posts">
                    <?php
                    $acmephoto_cat_post_args = array(
                        'category__in'       => $category_ids,
                        'post__not_in'       => array($post_id),
                        'post_type'          => 'post',
                        'posts_per_page'     => 3,
                        'post_status'        => 'publish',
                        'ignore_sticky_posts'=> true
                    );
                    $acmephoto_featured_query = new WP_Query( $acmephoto_cat_post_args );

                    while ( $acmephoto_featured_query->have_posts() ) : $acmephoto_featured_query->the_post();
                        get_template_part( 'template-parts/content', 'related' );
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
        }
    }

endif;

add_action( 'acmephoto_related_posts', 'acmephoto_related_post_below', 10, 1 );