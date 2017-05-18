<?php
 
if( !class_exists( 'alhenalite_admin_notice' ) ) {

	class alhenalite_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( !get_user_meta( get_current_user_id(), 'alhena_lite_notice_userid_' . get_current_user_id() , TRUE ) ) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

			add_action( 'switch_theme', array( $this, 'update_dismiss' ) );

		}

		/**
		 * Update notice.
		 */

		public function update_dismiss() {
			delete_metadata( 'user', null, 'alhena_lite_notice_userid_' . get_current_user_id(), null, true );
		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {
		
			if ( isset( $_GET['alhena_lite-dismiss'] ) ) {
		
				update_user_meta( get_current_user_id(), 'alhena_lite_notice_userid_' . get_current_user_id() , $_GET['alhena_lite-dismiss'] );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="update-nag notice alhenalite-notice">
            
            	<div class="alhenalite-noticedescription">
					<strong><?php esc_html_e( 'Upgrade to the premium version of Alhena, to enable 600+ Google Fonts, Unlimited sidebars, Portfolio section and much more.', 'alhena-lite' ); ?></strong><br/>
					<?php printf( '<a href="%1$s" class="dismiss-notice">'. esc_html__( 'Dismiss this notice', 'alhena-lite' ) .'</a>', esc_url( '?alhena_lite-dismiss=1' ) ); ?>
                </div>
                
                <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/alhena-free-responsive-corporate-wordpress-theme/?ref=2&campaign=alhena-notice' ); ?>" class="button"><?php esc_html_e( 'Upgrade to Alhena Premium', 'alhena-lite' ); ?></a>
                <div class="clear"></div>

            </div>
		
		<?php
		
		}

	}

}

new alhenalite_admin_notice();

?>