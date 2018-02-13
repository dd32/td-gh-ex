<?php
if (!function_exists('best_education_about_block')):
    /**
     * Main About Block
     *
     * @since Best Education 1.0.0
     *
     */
    function best_education_about_block() {
        if (1 != best_education_get_option('show_about_section')) {
            return null;
        }
        $best_education_about_page = absint(best_education_get_option('select_about_main_page'));
        $best_education_main_about_excerpt_number = absint(best_education_get_option('number_of_content_home_about'));
        $best_education_about_main_args = array(
            'post_type' => 'page',
            'page_id' => absint($best_education_about_page),
            'posts_per_page' => 1,
        );
        $best_education_about_main_post_query = new WP_Query($best_education_about_main_args);
        if ($best_education_about_main_post_query->have_posts()) :
            while ($best_education_about_main_post_query->have_posts()) : $best_education_about_main_post_query->the_post();
                if (has_excerpt()) {
                    $best_education_main_about_content = get_the_excerpt();
                } else {
                    $best_education_main_about_content = best_education_words_count($best_education_main_about_excerpt_number, get_the_content());
                }
                ?>
                <section id="about-us" class="section-block about-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="section-header">
                                    <h2 class="section-title section-title2"><?php the_title(); ?></h2>
                                </div>
                                <div class="title-divider secondary-bgcolor"></div>
                                <div class="section-content">
                                    <?php echo wp_kses_post($best_education_main_about_content); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
        <!-- about category section -->
        <?php
        $best_education_about_page_cat = esc_attr(best_education_get_option('select_category_for_about'));
        $best_education_about_cat_args = array(
            'post_type' => 'post',
            'cat' => absint($best_education_about_page_cat),
            'posts_per_page' => 4,
        ); ?>
        <section class="section-block about-cta-section">
            <div class="container high-index">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="about-cta-wrapper">
                            <?php $best_education_about_cat_post_query = new WP_Query($best_education_about_cat_args);
                            if ($best_education_about_cat_post_query->have_posts()) :
                                while ($best_education_about_cat_post_query->have_posts()) : $best_education_about_cat_post_query->the_post();
                                    if (has_post_thumbnail()) {
                                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                        $url = $thumb['0'];
                                    } else {
                                        $url = NULL;
                                    }?>
                                    <div class="about-cta-block">
                                        <div class="data-bg data-bg-cta" data-background="<?php echo esc_url($url); ?>">
                                            <div class="block-title-wrapper table-align">
                                                <h3 class="section-block-title section-block-title-1 table-align-cell v-align-bottom">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h3>
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
        </section>

        <?php $best_education_about_sec_arg = absint(best_education_get_option('select_about_secondary_page'));
        $best_education_sec_about_excerpt_number = absint(best_education_get_option('number_of_content_home_sec_about'));
        $best_education_about_sec_args = array(
            'post_type' => 'page',
            'page_id' => absint($best_education_about_sec_arg),
            'posts_per_page' => 1,
        );
        $best_education_about_sec_post_query = new WP_Query($best_education_about_sec_args);
        if ($best_education_about_sec_post_query->have_posts()) :
            while ($best_education_about_sec_post_query->have_posts()) : $best_education_about_sec_post_query->the_post();
                if (has_excerpt()) {
                    $best_education_sec_about_content = get_the_excerpt();
                } else {
                    $best_education_sec_about_content = best_education_words_count($best_education_sec_about_excerpt_number, get_the_content());
                }
                if (has_post_thumbnail()) {
                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                    $url = $thumb['0'];
                } else {
                    $url = NULL;
                }
                ?>
                <section class="section-block about-section-bg primary-bgcolor data-bg bg-fixed low-index" data-stellar-background-ratio="0.5" data-background="<?php echo esc_url($url); ?>">
                    <div class="container">
                        <div class="stellar-heading">
                            <div class="section-header">
                                <h2 class="section-title section-title2">
				                    <span>
				                       <?php the_title( ); ?>
				                    </span>
                                </h2>
                            </div>
                            <div class="title-divider secondary-bgcolor"></div>
                            <?php if ($best_education_sec_about_excerpt_number != 0 ) { ?>
                                <div class="section-content">
                                    <?php echo wp_kses_post($best_education_sec_about_content); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="bg-overlay primary-bgcolor"></div>
                </section>
            <?php endwhile;
        endif;
        wp_reset_postdata(); ?>

        <?php
        $best_education_sec_cat = esc_attr(best_education_get_option('select_category_sec_about'));
        $best_education_about_sec_cat_args = array(
            'post_type' => 'post',
            'cat' => absint($best_education_sec_cat),
            'posts_per_page' => 6,
        ); ?>
        <section class="section-block student-voice-section">
            <div class="container high-index">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="student-voice slick-carousel">
                            <?php $best_education_about_sec_cat_post_query = new WP_Query($best_education_about_sec_cat_args);
                            if ($best_education_about_sec_cat_post_query->have_posts()) :
                                while ($best_education_about_sec_cat_post_query->have_posts()) : $best_education_about_sec_cat_post_query->the_post();
                                    if (has_post_thumbnail()) {
                                        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                                        $url = $thumb['0'];
                                    } else {
                                        $url = NULL;
                                    }?>
                                    <article class="voice-items">
                                        <div class="student-voice-wrapper">
                                            <figure class="bg-image data-bg-cta-1">
                                                <img src="<?php echo esc_url($url); ?>">
                                                <div class="tm-date">
                                                    <span class="tm-date-month"><?php the_time( 'M' ) ?> </span>
                                                    <span class="tm-date-day"><?php the_time( 'd' ) ?></span>
                                                </div>
                                            </figure>
                                            <figcaption class="">
                                                <div class="block-title-wrapper">
                                                    <h3 class="section-block-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                                </div>
                                            </figcaption>
                                    </article>
                                <?php endwhile;
                            endif;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action('best_education_action_front_page', 'best_education_about_block', 20);