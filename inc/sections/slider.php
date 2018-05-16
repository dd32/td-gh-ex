<?php
/**
 * Slider section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage Architectonic
 * @since Architectonic 1.0.0
 */
if ( ! function_exists( 'architectonic_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Architectonic 1.0.0
    */
    function architectonic_add_slider_section() {
    	$options = architectonic_get_theme_options();
        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'architectonic_section_status', true, 'slider_section_enable' );

        if ( true !== $slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'architectonic_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        architectonic_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'architectonic_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Architectonic 1.0.0
    * @param array $input slider section details.
    */
    function architectonic_get_slider_section_details( $input ) {
        $options = architectonic_get_theme_options();

        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['slider_content_page_' . $i] ) )
                $page_ids[] = $options['slider_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = architectonic_trim_content( 25 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// slider section content details.
add_filter( 'architectonic_filter_slider_section_details', 'architectonic_get_slider_section_details' );


if ( ! function_exists( 'architectonic_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Architectonic 1.0.0
   *
   */
   function architectonic_render_slider_section( $content_details = array() ) {
        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="main-slider" class="relative">
            <div class="wrapper">
                <div class="main-slider-wrapper" data-effect="cubic-bezier(0.680, 0, 0.265, 1)" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":false, "autoplay": true, "fade": true }'>
                <?php foreach ( $content_details as $content ) : ?>
                    <article class="slick-item" data-title="<?php echo esc_attr( $content['title'] ); ?>" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        <div class="slider-content">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </header>

                            <div class="entry-content">
                                <?php echo esc_html( $content['excerpt'] ); ?>
                            </div><!-- .entry-content -->
                        </div><!-- .slider-content -->
                    </article><!-- .slick-item -->
                <?php endforeach; ?>
                </div><!-- .main-slider-wrapper -->
            </div><!-- .wrapper -->
        </div><!-- #main-slider -->
        
    <?php }
endif;