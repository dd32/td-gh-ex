<?php
/**
 * Display featured slider
 *
 * @since AcmePhoto 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('acmephoto_default_slider') ) :
    function acmephoto_default_slider(){
        ?>
        <div class="item">
            <a href="#">
                <img src="<?php echo esc_url( get_template_directory_uri()."/assets/img/acme-photo-feature.jpg" ); ?>"/>
            </a>
            <div class="slider-desc">
                <div class="slider-details">
                    <a href="#">
                        <div class="slide-title">
                            <?php _e('Life Is Beautiful','acmephoto'); ?>
                        </div>
                    </a>
                </div>
                <?php
                echo '<div class="slide-caption">'.__("Don't miss anything",'acmephoto').'</div>';
                ?>
            </div>
        </div>
        <?php
    }
endif;

/**
 * Featured Slider display
 *
 * @since AcmePhoto 1.0.0
 *
 * @param null
 * @return void
 */

if ( ! function_exists( 'acmephoto_display_feature_slider' ) ) :

    function acmephoto_display_feature_slider(){
        global $acmephoto_customizer_all_values;
        $acmephoto_feature_page = $acmephoto_customizer_all_values['acmephoto-feature-page'];
        $acmephoto_feature_button_option = $acmephoto_customizer_all_values['acmephoto-feature-button-option'];
        if ( 0 != $acmephoto_feature_page ) {
            $acmephoto_cat_post_args = array(
                'page_id'         => $acmephoto_feature_page,
                'posts_per_page'      => 1,
                'post_type'           => 'page',
                'no_found_rows'       => true,
                'post_status'         => 'publish'
            );
            $slider_query = new WP_Query($acmephoto_cat_post_args);
            if ($slider_query->have_posts()):
                while ($slider_query->have_posts()): $slider_query->the_post();
                    if (has_post_thumbnail()) {
                        $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    } else {
                        $image_url[0] = get_template_directory_uri() . '/assets/img/no-image-avalable.png';
                    }
                    ?>
                    <div class="item">
                        <a href="javascript:void (0)">
                            <img src="<?php echo esc_url( $image_url[0] ); ?>"/>
                        </a>
                        <div class="slider-desc">
                            <div class="slider-details">
                                <div class="slide-title">
                                    <?php the_title(); ?>
                                </div>
                                <div class="slide-caption">
                                    <?php echo esc_html( get_the_excerpt() ); ?>
                                </div>
                                <?php
                                if( 'search' == $acmephoto_feature_button_option ){
                                    ?>
                                    <div class="banner-search">
                                        <?php get_search_form()?>
                                    </div>
                                    <?php
                                }
                                elseif ( 'read-more' == $acmephoto_feature_button_option ){
                                    ?>
                                    <a href="<?php the_permalink()?>" class="read-more">
                                        <?php _e( 'Read More', 'acmephoto' );?>
                                    </a>
                                    <?php
                                }
                                else{
                                    /*do nothing*/
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            <?php endif;
        }
        else{
            acmephoto_default_slider();
        }
    }
endif;
/**
 * Display featured slider
 *
 * @since AcmePhoto 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('acmephoto_feature_slider') ) :
    function acmephoto_feature_slider() {
        ?>
        <div class="slider-section">
            <div class="feature-slider owl-carousel">
                <?php acmephoto_display_feature_slider(); ?>
            </div>
        </div>
        <?php
    }
endif;

add_action( 'acmephoto_action_feature_slider', 'acmephoto_feature_slider', 0 );