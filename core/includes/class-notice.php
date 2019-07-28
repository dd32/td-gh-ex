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

if( !class_exists( 'anna_lite_admin_notice' ) ) {

	class anna_lite_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( 
				!get_option( 'anna-lite-dismissed-notice') &&
				version_compare( PHP_VERSION, ANNA_LITE_MIN_PHP_VERSION, '>=' )
			) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {

			if ( isset( $_GET['anna-lite-dismiss'] ) && check_admin_referer( 'anna-lite-dismiss-action' ) ) {
		
				update_option( 'anna-lite-dismissed-notice', intval($_GET['anna-lite-dismiss']) );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="update-nag notice anna_lite-notice">
            
            	<div class="anna_lite-noticedescription">
					
					<strong><?php esc_html_e( 'Upgrade to the premium version of Anna, to enable 600+ Google Fonts, unlimited sidebars, portfolio section and much more.', 'anna-lite' ); ?></strong><br/>

					<?php 
					
						printf( 
							'<a href="%1$s" class="dismiss-notice">' . esc_html__( 'Dismiss this notice', 'anna-lite' ) . '</a>', 
							esc_url( wp_nonce_url( add_query_arg( 'anna-lite-dismiss', '1' ), 'anna-lite-dismiss-action'))
						);
					
					?>
                
                </div>
                
                <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/anna-clean-wordpress-blog-and-shop-theme/?ref=2&campaign=anna-notice' ); ?>" class="button"><?php esc_html_e( 'Upgrade to Anna Premium', 'anna-lite' ); ?></a>
                
                <div class="clear"></div>

            </div>
		
		<?php
		
		}

	}

}

new anna_lite_admin_notice();

?>