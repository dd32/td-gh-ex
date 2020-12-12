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

if( !class_exists( 'alhena_lite_admin_notice' ) ) {

	class alhena_lite_admin_notice {

		/**
		 * Constructor
		 */

		public function __construct( $fields = array() ) {

			if (
				!get_option( 'alhena-lite-dismissed-notice') &&
				version_compare( PHP_VERSION, ALHENA_LITE_MIN_PHP_VERSION, '>=' )
			) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );

			}

		}

		/**
		 * Dismiss notice.
		 */

		public function dismiss() {

			if ( isset( $_GET['alhena-lite-dismiss'] ) && check_admin_referer( 'alhena-lite-dismiss-action' ) ) {

				update_option( 'alhena-lite-dismissed-notice', intval($_GET['alhena-lite-dismiss']) );
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
                  <h2><?php esc_html_e('WordPress Bundle.','alhena-lite');?></h2>

						<?php

							esc_html_e( 'The premium version of Alhena with other 17 premium WordPress themes and 5 premium WordPress plugins, starting at only €1. ', 'alhena-lite' );

							printf(
								'<a href="%1$s" class="dismiss-notice">' . esc_html__( 'Dismiss this notice', 'alhena-lite' ) . '</a>',
								esc_url( wp_nonce_url( add_query_arg( 'alhena-lite-dismiss', '1' ), 'alhena-lite-dismiss-action'))
							);

                        ?>

                    </strong>

            	</p>

            	<p>
                <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/wordpress-deal-bundle/?ref=2&campaign=alhena-notice' ); ?>" class="button button-primary"><?php esc_html_e( 'Get the bundle', 'alhena-lite' ); ?></a>
                
            	</p>

            </div>

		<?php

		}

	}

}

new alhena_lite_admin_notice();

?>
