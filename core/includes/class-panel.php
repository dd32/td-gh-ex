<?php
 
if( !class_exists( 'suevafree_admin_notice' ) ) {

	class suevafree_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( !get_user_meta( get_current_user_id(), 'suevafree_notice_userid_' . get_current_user_id() , TRUE ) ) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

			add_action( 'switch_theme', array( $this, 'update_dismiss' ) );

		}

		/**
		 * Update notice.
		 */

		public function update_dismiss() {
			delete_metadata( 'user', null, 'suevafree_notice_userid_' . get_current_user_id(), null, true );
		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {
		
			if ( isset( $_GET['suevafree-dismiss'] ) ) {
		
				update_user_meta( get_current_user_id(), 'suevafree_notice_userid_' . get_current_user_id() , $_GET['suevafree-dismiss'] );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="update-nag notice suevafree-notice">
            
            	<div class="suevafree-noticedescription">
					<strong><?php _e( 'Upgrade to the premium version of Sueva, to enable 600+ Google Fonts, Unlimited sidebars, Portfolio section and much more.', 'suevafree' ); ?></strong><br/>
					<?php printf( __('<a href="%1$s" class="dismiss-notice">Dismiss this notice</a>','suevafree'), esc_url( '?suevafree-dismiss=1' ) ); ?>
                </div>
                
                <a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/sueva/?ref=2&campaign=suevanotice' ); ?>" class="button"><?php _e( 'Upgrade to Sueva Premium', 'suevafree' ); ?></a>
                <div class="clear"></div>

            </div>
		
		<?php
		
		}

	}

}

new suevafree_admin_notice();

?>