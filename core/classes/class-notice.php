<?php
 
if( !class_exists( 'novalite_admin_notice' ) ) {

	class novalite_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( !get_user_meta( get_current_user_id(), 'novalite_userID_notice_' . get_current_user_id() , TRUE ) ) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

			add_action( 'switch_theme', array( $this, 'update_dismiss' ) );

		}

		/**
		 * Update notice.
		 */

		public function update_dismiss() {
			delete_metadata( 'user', null, 'novalite_userID_notice_' . get_current_user_id(), null, true );
		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {
		
			if ( isset( $_GET['novalite-dismiss'] ) ) {
		
				update_user_meta( get_current_user_id(), 'novalite_userID_notice_' . get_current_user_id() , $_GET['novalite-dismiss'] );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="update-nag notice novalite-notice">
            
            	<div class="novalite-noticedescription">
					<strong><?php esc_html_e( 'Upgrade to the premium version of Nova, to enable 600+ Google Fonts, Unlimited sidebars, WooCommerce support, Portfolio section and much more.', 'novalite' ); ?></strong><br/>
					<?php printf( '<a href="%1$s" class="dismiss-notice">'. esc_html__( 'Dismiss this notice', 'novalite' ) .'</a>', esc_url( '?novalite-dismiss=1' ) ); ?>
                </div>
                
                <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/nova-free-responsive-portfolio-blogging-wordpress-theme/?ref=2&campaign=nova-notice' ); ?>" class="button"><?php esc_html_e( 'Upgrade to Nova Premium', 'novalite' ); ?></a>
                <div class="clear"></div>

            </div>
		
		<?php
		
		}

	}

}

new novalite_admin_notice();

?>