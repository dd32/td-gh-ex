<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'looki_lite_admin_notice' ) ) {

	class looki_lite_admin_notice {

		/**
		 * Constructor
		 */

		public function __construct( $fields = array() ) {

			if (
				!get_option( 'looki-lite-dismissed-notice') &&
				version_compare( PHP_VERSION, LOOKI_LITE_MIN_PHP_VERSION, '>=' )
			) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );

			}

		}

		/**
		 * Dismiss notice.
		 */

		public function dismiss() {

			if ( isset( $_GET['looki-lite-dismiss'] ) && check_admin_referer( 'looki-lite-dismiss-action' ) ) {

				update_option( 'looki-lite-dismissed-notice', intval($_GET['looki-lite-dismiss']) );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );

			}

		}

		/**
		 * Admin notice.
		 */

		public function admin_notice() {

		?>

            <div class="notice notice-warning is-dismissible">

            	<p>

            		<strong>

						<?php

                            esc_html_e( 'Download for free the premium version of Looki to enable an extensive option panel, 600+ Google Fonts, unlimited sidebars, portfolio and much more. ', 'looki-lite' );

							printf(
								'<a href="%1$s" class="dismiss-notice">' . esc_html__( 'Dismiss this notice', 'looki-lite' ) . '</a>',
								esc_url( wp_nonce_url( add_query_arg( 'looki-lite-dismiss', '1' ), 'looki-lite-dismiss-action'))
							);

                        ?>

                    </strong>

            	</p>

            	<p>

                    <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/looki/?ref=2&campaign=looki-notice' ); ?>" class="button-primary"><?php _e( 'Download for free Looki Premium', 'looki-lite' ); ?></a>

            	</p>

            </div>

		<?php

		}

	}

}

new looki_lite_admin_notice();

?>
