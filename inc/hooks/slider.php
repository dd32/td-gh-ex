<?php
if (!function_exists('best_education_banner_slider')) :
    /**
     * Banner Slider
     *
     * @since best-education 1.0.0
     *
     */
    function best_education_banner_slider()
    {
        if (1 != best_education_get_option('show_slider_section')) {
            return null;
        }
        $best_education_slider_category = esc_attr(best_education_get_option('select_category_for_slider'));
        $best_education_slider_double_post_category = esc_attr(best_education_get_option('select_category_for_slider_double_post'));
        $best_education_slider_number = 3;
        ?>
        <!-- slider News -->
        <section class="main-banner white-bgcolor section-block">
            <?php
            $best_education_banner_slider_args = array(
                'post_type' => 'post',
                'cat' => absint($best_education_slider_category),
                'ignore_sticky_posts' => true,
                'posts_per_page' => absint( $best_education_slider_number ),
            ); ?>

            <div class="mainbanner-jumbotron tm-hover-2">
                <?php
                $best_education_banner_slider_post_query = new WP_Query($best_education_banner_slider_args);
                if ($best_education_banner_slider_post_query->have_posts()) :
                    while ($best_education_banner_slider_post_query->have_posts()) : $best_education_banner_slider_post_query->the_post();
                        if(has_post_thumbnail()){
                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'best-education-1140-600' );
                            $url = $thumb['0'];
                        }
                        else{
                            $url = get_template_directory_uri().'/assets/images/no-image-1200x800.jpg';
                        }
                        global $post;
                        $author_id = $post->post_author;
                        ?>
                            <figure class="slick-item primary-bgcolor">
                                <a href="<?php the_permalink(); ?>" class="data-bg data-bg-slide" data-background="<?php echo esc_url($url); ?>">
                                </a>
                                <figcaption class="slider-figcaption">
                                    <h2 class="slide-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="slider-content">
                                        <?php the_content(); ?>
                                    </div>
                                </figcaption>
                                <div class="bg-overlay"></div>
                            </figure>
                        <?php
                        endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </section>
        <!-- end slider-section -->
        <?php
    }
endif;
add_action('best_education_action_front_page', 'best_education_banner_slider', 40);
