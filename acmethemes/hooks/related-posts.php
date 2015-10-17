<?php

/**
 * Display related posts from same category
 *
 * @since acmeblog 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('acmeblog_related_post_below') ) :
    function acmeblog_related_post_below($post_id) {
        global $acmeblog_customizer_all_values;
        if( isset($acmeblog_customizer_all_values['acmeblog-hide-related']) && 1 == $acmeblog_customizer_all_values['acmeblog-hide-related'] ){
            return;
        }
        $categories = get_the_category( $post_id );
        if ($categories) {
            $category_ids = array();
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            ?>
            <h2 class="widget-title">
                <?php _e('Related posts', 'acmeblog'); ?>
            </h2>
            <ul class="featured-entries-col featured-entries featured-col-posts">
                <?php
                $acmeblog_cat_post_args = array(
                    'category__in' => $category_ids,
                    'post__not_in' => array($post_id),
                    'post_type' => 'post',
                    'posts_per_page'      => 3,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => true
                );
                $acmeblog_featured_query = new WP_Query($acmeblog_cat_post_args);

                while ( $acmeblog_featured_query->have_posts() ) :$acmeblog_featured_query->the_post();
                    $acmeblog_sidebar_no_thumbnail = 'no-image-240x172.jpg';
                    ?>
                    <li class="col-3">
                        <?php
                        if( isset($acmeblog_customizer_all_values['acmeblog-show-image']) && 1 == $acmeblog_customizer_all_values['acmeblog-show-image'] ){
                        ?>
                        <figure class="widget-image">
                            <?php
                            if ( has_post_thumbnail() ):
                                $post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                            else:
                                $post_thumb[0] = get_template_directory_uri() . '/assets/img/'.$acmeblog_sidebar_no_thumbnail;
                            endif;
                            ?>
                            <a href="<?php the_permalink()?>">
                                <img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                            </a>
                        </figure>
                        <?php
                        }
                        ?>
                        <div class="featured-desc">
                            <div class="above-entry-meta">
                                <?php
                                $archive_year  = get_the_date('Y');
                                $archive_month = get_the_date('m');
                                $archive_day   = get_the_date('d');
                                ?>
                                <span><i class="fa fa-calendar"></i><a href="<?php echo esc_url(get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><?php echo get_the_date('F d, Y'); ?></a></span>
                                <span><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author(); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
                                <span><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%' );?></span>
                            </div>
                            <a href="<?php the_permalink()?>">
                                <h4 class="title">
                                    <?php the_title(); ?>
                                </h4>
                                <?php
                                $content = acmeblog_words_count( get_the_excerpt() );
                                echo '<div class="details">'.$content.'</div>';
                                ?>
                            </a>
                            <div class="below-entry-meta">
                                <?php acmeblog_list_category(); ?>
                            </div>
                        </div>
                    </li>
                    <?php
                endwhile;
                wp_reset_query();
                ?>
            </ul>
            <div class="clearfix"></div>
            <?php
        }
    }
endif;
add_action( 'acmeblog_related_posts', 'acmeblog_related_post_below', 10, 1 );