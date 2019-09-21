<?php
/**
 * The Service Section
 *
 * @package Astral
 */

/**
 * Class astral_Service_Section
 */
class astral_Service_Section extends astral_Abstract_Main {

	/**
	 * Initialize Slider Section
	 */
	public function __construct() {
		add_action( 'astral_service_area', array( $this, 'astral_service' ) );
	}

	public function init() {
	}

	function astral_service() {
		$astral_service_title = get_theme_mod( 'astral_service_title' );
		$astral_service_desc  = get_theme_mod( 'astral_service_desc' );
		if ( get_theme_mod( 'astral_service_show' ) ) : ?>
            <section class="align-about" id="about">
                <div class="container">
                    <div class="mwa_title text-center">
                        <h4 class="mwa-title"><?php echo esc_html( $astral_service_title ); ?></h4>
                        <p class="sub-title"><?php echo esc_html( $astral_service_desc ); ?></p>
                    </div>
                    <div class="row">
						<?php for ( $i = 1; $i < 4; $i ++ ) {
							$service_icon  = get_theme_mod( 'service_icon_' . $i );
							$service_title = get_theme_mod( 'service_title_' . $i );
							$service_desc  = get_theme_mod( 'service_desc_' . $i );
							$service_link  = get_theme_mod( 'service_link_' . $i );
							if ( $service_title ) : ?>
                                <div class="col-lg-4 col-sm-6 wow bounceInLeft">
                                    <div class="abt-grid">
                                        <div class="row">
                                            <div class="col-3">
												<?php if ( $service_icon ) : ?>
                                                    <div class="abt-icon">
                                                        <span class="<?php echo esc_attr( $service_icon ); ?>"></span>
                                                    </div>
												<?php endif; ?>
                                            </div>
                                            <div class="col-9">
                                                <div class="abt-txt">
                                                    <h4><a href="<?php echo esc_url( $service_link ); ?>"
                                                           target="_blank">                                        <?php echo esc_html( $service_title ); ?></a>
                                                    </h4>
                                                    <p><?php echo esc_html( $service_desc ); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							<?php endif;
						} ?>
                    </div>
                </div>
            </section>
		<?php endif;
	}
}

$astral_Service_Section = new astral_Service_Section();