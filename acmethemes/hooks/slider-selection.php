<?php
/**
 * Display default slider
 *
 * @since AcmePhoto 0.0.1
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('acmephoto_default_slider') ) :
    function acmephoto_default_slider(){
        ?>
        <?php
        $bg_image_style = '';
        if ( get_header_image() ) :
            $bg_image_style .= 'background-image:url(' . esc_url( get_header_image() ) . ');background-repeat:no-repeat;background-size:cover;background-attachment:fixed;';
        else:
            $bg_image_style .= 'background-image:url(' . esc_url( get_template_directory_uri()."/assets/img/startup-slider.jpg" ) . ');background-repeat:no-repeat;background-size:cover;background-attachment:fixed;';
        endif; // End header image check.
        ?>
        <section id="at-banner-slider" class="home-fullscreen at-parallax" style="<?php echo $bg_image_style; ?>">
            <div class="at-overlay">
                <div class="slide text-slider-wrapper">
                    <ul class="text-slider at-featured-text-slider clearfix">
                        <li class="clearfix">
                            <span class="lead banner-title init-animate fadeInRight"><?php _e('Life is beautiful','acmephoto' );?></span>
                            <div class="text-slider-caption init-animate fadeInDown">
                                <?php _e("Don't miss anything",'acmephoto' );?>
                            </div>
                            <div href="<?php the_permalink()?>" class="banner-search init-animate fadeInUp">
                                <?php get_search_form()?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <?php
    }
endif;

/**
 * Featured Slider display
 *
 * @since AcmePhoto 1.1.0
 *
 * @param null
 * @return void
 */

if ( ! function_exists( 'acmephoto_display_feature_slider' ) ) :

    function acmephoto_display_feature_slider( ){
        global $acmephoto_customizer_all_values;
        $acmephoto_feature_page = $acmephoto_customizer_all_values['acmephoto-feature-page'];
        $acmephoto_featured_slider_number = $acmephoto_customizer_all_values['acmephoto-featured-slider-number'];
        if( 0 != $acmephoto_feature_page ) :
            $acmephoto_child_page_args = array(
                'post_parent'         => $acmephoto_feature_page,
                'posts_per_page'      => $acmephoto_featured_slider_number,
                'post_type'           => 'page',
                'no_found_rows'       => true,
                'post_status'         => 'publish'
            );
            $slider_query = new WP_Query( $acmephoto_child_page_args );
            if ( !$slider_query->have_posts() ){
                $acmephoto_child_page_args = array(
                    'page_id'         => $acmephoto_feature_page,
                    'posts_per_page'      => $acmephoto_featured_slider_number,
                    'post_type'           => 'page',
                    'no_found_rows'       => true,
                    'post_status'         => 'publish'
                );
                $slider_query = new WP_Query( $acmephoto_child_page_args );
            }
            /*The Loop*/
            if ( $slider_query->have_posts() ):

                $bg_image_style = '';
                $bg_image_class = '';
                if ( get_header_image() ) :
                    $bg_image_style .= 'background-image:url(' . get_header_image() . ');background-repeat:no-repeat;background-size:cover;background-attachment:fixed;';
                    $bg_image_class = ' at-parallax';
                endif; // End header image check.
                ?>

                <section id="at-banner-slider" class="home-fullscreen<?php echo $bg_image_class; ?>" style="<?php echo $bg_image_style; ?>">
                    <div class="at-overlay">
                        <div class="slide text-slider-wrapper">
                            <ul class="text-slider at-featured-text-slider clearfix">
                                <?php
                                while( $slider_query->have_posts() ):$slider_query->the_post();
                                    ?>
                                    <li class="clearfix">
                                        <span class="lead banner-title init-animate fadeInRight"><?php the_title()?></span>
                                        <div class="banner-title-line line init-animate fadeInLeft"><span></span></div>
                                        <div class="text-slider-caption init-animate fadeInDown">
                                            <?php the_excerpt();?>
                                        </div>
                                        <a href="<?php the_permalink()?>" class="init-animate fadeInUp btn btn-primary outline-outward banner-btn">
                                            <?php _e('Know More','acmephoto'); ?>
                                        </a>
                                    </li>
                                    <?php
                                endwhile;
                                ?>
                            </ul>
                        </div>
                    </div>
                </section>
                <?php
            endif;
            ?>
        <?php
        else:
            acmephoto_default_slider();
        endif;
        wp_reset_query();
    }
endif;
/**
 * Display related posts from same category
 *
 * @since AcmePhoto 0.0.1
 *
 * @return void
 *
 */
if ( !function_exists('acmephoto_feature_slider') ) :
    function acmephoto_feature_slider() {
        ?>
        <div class="home-bxslider">
            <?php acmephoto_display_feature_slider(); ?>
        </div>
        <div class="clearfix"></div>
        <?php
    }
endif;
add_action( 'acmephoto_action_feature_slider', 'acmephoto_feature_slider', 0 );