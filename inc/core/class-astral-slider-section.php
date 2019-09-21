<?php
/**
 * The Slider Section
 *
 * @package Astral
 */

/**
 * Class astral_Slider_Section
 */
class astral_Slider_Section extends astral_Abstract_Main {
	/**
	 * Initialize Slider Section
	 */
	public function __construct() {
		add_action( 'astral_slider_area', array( $this, 'astral_slider' ) );
	}

	public function init() {

	}

	/**
	 * Slider section content.
	 *
	 * @since astral 0.1
	 */
	public function astral_slider() { ?>
		<?php if ( get_theme_mod( 'slide_image_1' ) || get_theme_mod( 'slide_image_2' ) || get_theme_mod( 'slide_image_3' ) ) : ?>
            <div class="swiper-container" id="mwa_banner_slider">
                <div class="swiper-wrapper">
					<?php for ( $i = 1; $i < 4; $i ++ ) {
						if ( get_theme_mod( 'slide_image_' . $i ) ) {
							$slider_image = get_theme_mod( 'slide_image_' . $i );
							$slider_title = get_theme_mod( 'slide_title_' . $i );
							$slider_desc  = get_theme_mod( 'slide_desc_' . $i );
							$slider_link  = get_theme_mod( 'slide_btn_link_' . $i );
							?>
                            <div class="swiper-slide"
                                 style="background-image:url(<?php echo esc_url( $slider_image ); ?>)">
                                <div class="container banner-text">
                                    <div class="slider-info wow fadeInLeft">
                                        <h3><?php echo esc_html( $slider_title ); ?></h3>
                                        <span class="line"></span>
                                        <p><?php echo esc_html( $slider_desc ); ?></p>

										<?php if ( $slider_link ) { ?>
                                            <a class="btn mwa-theme mt-4 mwa_link_bnr scroll"
                                               href="<?php echo esc_url( $slider_link ); ?>"
                                               role="button"><?php esc_html_e( 'View More', 'astral' ); ?></a>
										<?php } ?>
                                    </div>
                                </div>
                            </div>
						<?php }
					} ?>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
		<?php endif;
	}
}

$astral_Slider_Section = new astral_Slider_Section();