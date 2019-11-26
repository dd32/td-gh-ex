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

if( !class_exists( 'diarjo_lite_admin_notice' ) ) {

	class diarjo_lite_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( 
				!get_option( 'diarjo-lite-dismissed-notice') &&
				version_compare( PHP_VERSION, DIARJO_LITE_MIN_PHP_VERSION, '>=' )
			) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {

			if ( isset( $_GET['diarjo-lite-dismiss'] ) && check_admin_referer( 'diarjo-lite-dismiss-action' ) ) {
		
				update_option( 'diarjo-lite-dismissed-notice', intval($_GET['diarjo-lite-dismiss']) );
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
                        
                            esc_html_e( 'Download for free the premium version of Diarjo to enable an extensive option panel, 600+ Google Fonts, unlimited sidebars, portfolio and much more. ', 'diarjo-lite' );
							
							printf( 
								'<a href="%1$s" class="dismiss-notice">' . esc_html__( 'Dismiss this notice', 'diarjo-lite' ) . '</a>', 
								esc_url( wp_nonce_url( add_query_arg( 'diarjo-lite-dismiss', '1' ), 'diarjo-lite-dismiss-action'))
							);
                            
                        ?>
                    
                    </strong>
                    
            	</p>
                    
            	<p>
            		
					<a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/diarjo-free-creative-minimal-wordpress-theme/?ref=2&campaign=diarjonotice' ); ?>" class="button button-primary"><?php _e( 'Download for free Diarjo Premium', 'diarjo-lite' ); ?></a>
                
            	</p>

            </div>
		
		<?php
		
		}

	}

}

new diarjo_lite_admin_notice();

?>