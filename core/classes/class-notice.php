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

if( !class_exists( 'nova_lite_admin_notice' ) ) {

	class nova_lite_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( 
				!get_option( 'nova-lite-dismissed-notice') &&
				version_compare( PHP_VERSION, NOVA_LITE_MIN_PHP_VERSION, '>=' )
			) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {

			if ( isset( $_GET['nova-lite-dismiss'] ) && check_admin_referer( 'nova-lite-dismiss-action' ) ) {
		
				update_option( 'nova-lite-dismissed-notice', intval($_GET['nova-lite-dismiss']) );
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
                        
                            esc_html_e( 'Upgrade to the premium version of Nova, to enable 600+ Google Fonts, Unlimited sidebars, WooCommerce support, Portfolio section and much more. ', 'nova-lite' ); 
                            
							printf( 
								'<a href="%1$s" class="dismiss-notice">' . esc_html__( 'Dismiss this notice', 'nova-lite' ) . '</a>', 
								esc_url( wp_nonce_url( add_query_arg( 'nova-lite-dismiss', '1' ), 'nova-lite-dismiss-action'))
							);
                            
                        ?>
                    
                    </strong>
                    
            	</p>
                    
            	<p>
            		
                    <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/nova-free-responsive-portfolio-blogging-wordpress-theme/?ref=2&campaign=nova-notice' ); ?>" class="button button-primary"><?php esc_html_e( 'Upgrade to Nova Premium', 'nova-lite' ); ?></a>
                
            	</p>

            </div>
		
		<?php
		
		}

	}

}

new nova_lite_admin_notice();

?>