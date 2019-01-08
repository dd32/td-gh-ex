<?php
 
if( !class_exists( 'lookilite_admin_notice' ) ) {

	class lookilite_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( !get_user_meta( get_current_user_id(), 'lookilite_userID_notice_' . get_current_user_id() , TRUE ) ) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

			add_action( 'switch_theme', array( $this, 'update_dismiss' ) );

		}

		/**
		 * Update notice.
		 */

		public function update_dismiss() {
			delete_metadata( 'user', null, 'lookilite_userID_notice_' . get_current_user_id(), null, true );
		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {
		
			if ( isset( $_GET['lookilite-dismiss'] ) ) {
		
				update_user_meta( get_current_user_id(), 'lookilite_userID_notice_' . get_current_user_id() , $_GET['lookilite-dismiss'] );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="update-nag notice lookilite-notice">
            
            	<div class="lookilite-noticedescription">
                    <strong><?php _e( 'Upgrade to the premium version of Looki to enable an extensive option panel, 600+ Google Fonts, unlimited sidebars, portfolio and much more.', 'lookilite' ); ?></strong><br/>

					<?php printf( __('<a href="%1$s" class="dismiss-notice">Dismiss this notice</a>','lookilite'), esc_url( '?lookilite-dismiss=1' ) ); ?>
                </div>
                
                <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/looki/?ref=2&campaign=looki-notice' ); ?>" class="button"><?php _e( 'Upgrade to Looki Premium', 'lookilite' ); ?></a>
                <div class="clear"></div>

            </div>
		
		<?php
		
		}

	}

}

new lookilite_admin_notice();

?>