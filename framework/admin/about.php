<?php
/**
 * About Agama Page under Appearances
 *
 * @since Agama v1.0.1
 */
if( ! class_exists( 'Agama_About' ) ) {
	class Agama_About
	{
		/**
		 * Class Constructor
		 *
		 * @since Agama v1.0.1
		 */
		public function __construct() {
			// Register page
			add_action('admin_menu', array( $this, 'register_page' ) );
		}
		
		/**
		 * Register 'About Agama' Page
		 *
		 * @since Agama v1.0.1
		 */
		public function register_page() {
			add_theme_page( 
				__( 'About Agama', 'agama' ), 
				__( 'About Agama', 'agama' ), 
				'edit_theme_options', 
				'about-agama', 
				array( $this, 'render_page' )
			);
		}
		
		/**
		 * Render 'About Agama' Page
		 *
		 * @since Agama v1.0.1
		 */
		public function render_page() {
			echo '<div class="wrap about-wrap">';
				echo '<h1>'.sprintf( __( 'Welcome to Agama v%s', 'agama' ), AGAMA_VER ).'</h1>';
				
				echo '<div class="about-text">';
					echo __( 'Thank you for using Agama theme!', 'agama' ).'<br>';
					echo __( 'Consider supporting us with any desired amount donation.', 'agama' ).'<br>';
					echo __( 'Even the smallest donation amount means a lot for us.', 'agama' ).'<br>';
					echo __( 'With donations you are helping us for faster theme development & updates.', 'agama' ).'<br><br>';
					echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
							<div class="paypal-donations">
							<input type="hidden" name="cmd" value="_donations">
							<input type="hidden" name="bn" value="TipsandTricks_SP">
							<input type="hidden" name="business" value="paypal@theme-vision.com">
							<input type="hidden" name="return" value="https://www.theme-vision.com/thank-you/">
							<input type="hidden" name="item_name" value="Agama development support.">
							<input type="hidden" name="rm" value="0">
							<input type="hidden" name="currency_code" value="USD">
							<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" name="submit" alt="PayPal - The safer, easier way to pay online.">
							<img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</div>
						</form>';
					
					echo __( 'or', 'agama' ).'<br>';
					
					echo sprintf( __( 'You can support us by Buying an %s theme with allot new features & extensions!', 'agama' ), '<a href="http://theme-vision.com/agama-pro/" title="Agama Pro" target="_blank">AgamaPRO</a>' );
				echo '</div>';
				
				echo '<h2 class="nav-tab-wrapper">';
					echo '<a class="nav-tab nav-tab-active">'.__( 'What\'s New', 'agama' ).'</a>';
				echo '</h2>';
				
				echo '<div class="changelog point-releases">';
					echo '<h3>'.__( 'Changelog Agama v1.0.4', 'agama' ).'</h3>';
					echo '<p><strong>Version 1.0.4</strong> multiple theme fixes & unnecessary css code cleaned.</p>';
				
					echo '<h3>'.__( 'Changelog Agama v1.0.3', 'agama' ).'</h3>';
					echo '<p><strong>Version 1.0.3</strong> implemented FlexSlider 2 in customizer.</p>';
					echo '<p><strong>Version 1.0.3</strong> implemented Infinite Scroll for blog posts.</p>';
					echo '<p><strong>Version 1.0.3</strong> WooCommerce Products per Page option.</p>';
				
					echo '<h3>'.__( 'Changelog Agama v1.0.2', 'agama' ).'</h3>';
					echo '<p><strong>Version 1.0.2</strong> Sticky header option.</p>';
					echo '<p><strong>Version 1.0.2</strong> NiceScroll option.</p>';
					echo '<p><strong>Version 1.0.2</strong> Back to top button option.</p>';
					
					echo '<h3>'.__( 'Changelog Agama v1.0.1', 'agama' ).'</h3>';
					echo '<p><strong>Version 1.0.1</strong> added enable/disable top navigation menu option.</p>';
					echo '<p><strong>Version 1.0.1</strong> added light/dark skin option</p>';
					echo '<p><strong>Version 1.0.1</strong> added blog grid/list style option</p>';
					echo '<p><strong>Version 1.0.1</strong> added blog excerpt lenght option</p>';
					echo '<p><strong>Version 1.0.1</strong> added social icons option</p>';
					echo '<p><strong>Version 1.0.1</strong> added WooCommerce support</p>';
					echo '<p><strong>Version 1.0.1</strong> added bbPress support</p>';
					echo '<p><strong>Version 1.0.1</strong> added BuddyPress support</p>';
					echo '<p><strong>Version 1.0.1</strong> added Agama slider option</p>';
					echo '<p><strong>Version 1.0.1</strong> added four widget places in footer.</p>';
					echo '<p><strong>Version 1.0.1</strong> added footer custom copyright option.</p>';
					echo '<p><strong>Version 1.0.1</strong> added Serbian language translation.</p>';
				echo '</div>';
				
			echo '</div>';
		}
	}
	new Agama_About;
}