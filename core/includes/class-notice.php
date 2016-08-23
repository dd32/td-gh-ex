<?php
 
if( !class_exists( 'diarjolite_admin_notice' ) ) {

	class diarjolite_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( !get_user_meta( get_current_user_id(), 'diarjolite_notice_userid_' . get_current_user_id() , TRUE ) ) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

			add_action( 'switch_theme', array( $this, 'update_dismiss' ) );

		}

		/**
		 * Update notice.
		 */

		public function update_dismiss() {
			delete_metadata( 'user', null, 'diarjolite_notice_userid_' . get_current_user_id(), null, true );
		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {
		
			if ( isset( $_GET['diarjolite-dismiss'] ) ) {
		
				update_user_meta( get_current_user_id(), 'diarjolite_notice_userid_' . get_current_user_id() , $_GET['diarjolite-dismiss'] );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="update-nag notice diarjolite-notice">
            
            	<div class="diarjolite-noticedescription">
					<strong><?php _e( 'Important! From today, you can upgrade to the premium version of Diarjo for FREE! ( This resource will be available for a short period of time) ', 'diarjolite' ); ?></strong><br/>
					<?php printf( __('<a href="%1$s" class="dismiss-notice">Dismiss this notice</a>','diarjolite'), esc_url( '?diarjolite-dismiss=1' ) ); ?>
                </div>
                
                <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/reserved-area/?ref=2&campaign=diarjonotice' ); ?>" class="button"><?php _e( 'Download Now', 'diarjolite' ); ?></a>
                <div class="clear"></div>

            </div>
		
		<?php
		
		}

	}

}

new diarjolite_admin_notice();

?>