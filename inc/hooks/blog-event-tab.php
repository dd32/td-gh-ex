<?php
if (!function_exists('best_education_blog_event_block')):
    /**
     * Main Event/Blog Block
     *
     * @since Best Education 1.0.0
     *
     */
    function best_education_blog_event_block() {
        if (1 != best_education_get_option('show_blog_event_tab_section')) {
            return null;
        }?>
        <section class="section-block section-block-1 tab-section">
            <div class="tab-section-wrapper">
                <ul class="nav nav-tabs tm-nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#news-tab" role="tab" data-toggle="tab"><?php echo esc_html(best_education_get_option('blog_title_text')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#events-tab" role="tab" data-toggle="tab"><?php echo esc_html(best_education_get_option('event_title_text')); ?></a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <?php
                $best_education_blog_section_cat = esc_attr(best_education_get_option('select_category_blog_event_tab'));
                $best_education_blog_content_number = absint( best_education_get_option('number_of_content_home_blog') );
                $best_education_blog_section_cat_args = array(
                    'post_type' => 'post',
                    'cat' => absint($best_education_blog_section_cat),
                    'posts_per_page' => 3,
                ); ?>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="news-tab">
                        <div class="container">
                            <div class="tm-news">
                            <?php $best_education_blog_section_cat_post_query = new WP_Query($best_education_blog_section_cat_args);
                            if ($best_education_blog_section_cat_post_query->have_posts()) :
                                while ($best_education_blog_section_cat_post_query->have_posts()) : $best_education_blog_section_cat_post_query->the_post();
                                    if (has_post_thumbnail()) {
                                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                        $url = $thumb['0'];
                                    } else {
                                        $url = NULL;
                                    }
                                    if (has_excerpt()) {
                                        $best_education_blog_content = get_the_excerpt();
                                    } else {
                                        $best_education_blog_content = best_education_words_count($best_education_blog_content_number, get_the_content());
                                    }?>

                                        <div class="align-items-center no-gutters">
                                            <div class="col-md-6">
                                                <img src="<?php echo esc_url($url); ?>">
                                                <div class="tm-date">
                                                    <span class="tm-date-month"><?php the_time( 'M' ) ?></span>
                                                    <span class="tm-date-day"><?php the_time( 'd' ) ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-center">
                                                    <div class="section-header">
                                                        <h2 class="section-title section-title1">
        	                                                <span>
        	                                                   <?php the_title(); ?>
        	                                                </span>
                                                        </h2>
                                                    </div>
                                                    <div class="title-divider secondary-bgcolor"></div>
                                                    <div class="section-content">
                                                        <?php echo esc_html($best_education_blog_content); ?>
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>" class="btn tm-btn"><?php echo esc_html__('Know More','best-education'); ?></a>
                                                </div>
                                            </div>
                                        </div>

                                <?php endwhile;
                            endif;
                            wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $best_education_event_section_cat = esc_attr(best_education_get_option('select_category_event_event_tab'));
                    $best_education_event_content_number = absint( best_education_get_option('number_of_content_home_event') );
                    $best_education_event_section_cat_args = array(
                        'post_type' => 'post',
                        'cat' => absint($best_education_event_section_cat),
                        'posts_per_page' => 3,
                    ); ?>
                    <div role="tabpanel" class="tab-pane fade" id="events-tab">
                        <div class="container">
                            <div class="row">
                                <?php $best_education_event_section_cat_post_query = new WP_Query($best_education_event_section_cat_args);
                                if ($best_education_event_section_cat_post_query->have_posts()) :
                                    while ($best_education_event_section_cat_post_query->have_posts()) : $best_education_event_section_cat_post_query->the_post();
                                        if (has_post_thumbnail()) {
                                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
                                            $url = $thumb['0'];
                                        } else {
                                            $url = NULL;
                                        }
                                        if (has_excerpt()) {
                                            $best_education_event_content = get_the_excerpt();
                                        } else {
                                            $best_education_event_content = best_education_words_count($best_education_event_content_number, get_the_content());
                                        }?>
                                        <div class="col-sm-4">
                                            <div class="tm-events">
                                                <div class="event-item">
                                                    <div class="tm-date">
                                                        <span class="tm-date-month"><?php the_time( 'M' ) ?></span>
                                                        <span class="tm-date-day"><?php the_time( 'd' ) ?></span>
                                                    </div>
                                                    <h3>
                                                        <?php the_title(); ?>
                                                    </h3>
                                                    <div>
                                                        <?php echo esc_html($best_education_event_content); ?>
                                                    </div>
                                                    <a href="<?php the_permalink(); ?>"> <?php echo esc_html__('Read More','best-education'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                endif;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php
    }
endif;
add_action('best_education_action_front_page', 'best_education_blog_event_block', 90);