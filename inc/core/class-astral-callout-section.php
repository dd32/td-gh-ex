<?php
/**
 * The Callout Section
 *
 * @package Astral
 */

/**
 * Class astral_Callout_Section
 */
class astral_Callout_Section extends astral_Abstract_Main {
	/**
	 * Initialize Slider Section
	 */
	public function __construct() {
		add_action( 'astral_callout_area', array( $this, 'astral_callout' ) );
	}

	public function init() {

	}

	/**
	 * Callout section content.
	 *
	 * @since astral 0.1
	 */
	function astral_callout() {
		$callout_title  = get_theme_mod( 'callout_title' );
		$callout_desc   = get_theme_mod( 'callout_desc' );
		$callout_link_1 = get_theme_mod( 'callout_link_1' );
		$callout_link_2 = get_theme_mod( 'callout_link_2' );
		if ( get_theme_mod( 'astral_callout_show' ) ) :
			?>
            <div class="abt_bottom py-lg-5 mwa-theme" id="callout">
                <div class="container py-sm-4 py-3">
                    <h4 class="abt-text text-capitalize text-sm-center mb-0"><?php echo esc_html( $callout_title ); ?></h4>
                    <p class="color-white text-sm-center "><?php echo esc_html( $callout_desc ); ?></p>
                    <div class="d-sm-flex justify-content-center">
                        <a href="<?php echo esc_url( esc_attr( $callout_link_1 ) ); ?>"
                           class="btn  mt-sm-4 mt-3 ml-3 mwa_link_bnr wow fadeInLeft">
							<?php esc_html_e( 'View More', 'astral' ); ?></a>
                        <a href="<?php echo esc_url( esc_attr( $callout_link_2 ) ); ?>"
                           class="btn  mt-sm-4 mt-3 ml-3 mwa_link_bnr scroll wow fadeInRight">
							<?php esc_html_e( 'Contact Us', 'astral' ); ?></a>
                    </div>
                </div>
            </div>
		<?php endif;
	}
}

$astral_Callout_Section = new astral_Callout_Section();