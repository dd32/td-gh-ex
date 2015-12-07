<?php
/**
 * Theme Customizer Functions
 *
 */

/*========================== CUSTOMIZER CONTROLS FUNCTIONS ==========================*/

if ( class_exists( 'WP_Customize_Control' ) ) :
	
	// Title Control
    class Rubine_Customize_Header_Control extends WP_Customize_Control {

        public function render_content() {  ?>
			
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			</label>
			
			<?php
        }
    }
	
	// Description Control
	class Rubine_Customize_Description_Control extends WP_Customize_Control {

        public function render_content() {  ?>
			
			<span class="description"><?php echo esc_html( $this->label ); ?></span>
			
			<?php
        }
    }
	
	// Upgrade Control
	class Rubine_Customize_Upgrade_Control extends WP_Customize_Control {

        public function render_content() {  ?>
			
			<div class="upgrade-pro-version">
			
				<span class="customize-control-title"><?php esc_html_e( 'Pro Version', 'rubine-lite' ); ?></span>
				
				<span class="textfield">
					<?php printf( esc_html__( 'Purchase the Pro Version of %s to get additional features and advanced customization options.', 'rubine-lite' ), 'Rubine'); ?>
				</span>
				
				<p>
					<a href="http://themezee.com/themes/rubine/?utm_source=customizer&utm_medium=button&utm_campaign=rubine&utm_content=pro-version" target="_blank" class="button button-secondary">
						<?php printf( esc_html__( 'Learn more about %s Pro', 'rubine-lite' ), 'Rubine'); ?>
					</a>
				</p>
				
			</div>
			
			<div class="upgrade-toolkit">
			
				<span class="customize-control-title"><?php esc_html_e( 'ThemeZee Toolkit', 'rubine-lite' ); ?></span>
				
				<span class="textfield">
					<?php esc_html_e( 'The ThemeZee Toolkit add-on is a collection of useful small modules and features, neatly bundled into a single plugin.', 'rubine-lite' ); ?>
				</span>
				
				<p>
					<a href="http://themezee.com/addons/toolkit/?utm_source=customizer&utm_medium=button&utm_campaign=rubine&utm_content=toolkit" target="_blank" class="button button-secondary">
						<?php printf( esc_html__( 'View Details', 'rubine-lite' ), 'Rubine'); ?>
					</a>
					<a href="<?php echo admin_url( 'plugin-install.php?tab=search&type=author&s=themezee' ); ?>" class="button button-primary">
						<?php esc_html_e( 'Install now', 'rubine-lite' ); ?>
					</a>
				</p>
			
			</div>
			
			<div class="upgrade-addons">
			
				<span class="customize-control-title"><?php esc_html_e( 'Add-on plugins', 'rubine-lite' ); ?></span>
				
				<span class="textfield">
					<?php esc_html_e( 'Extend the functionality of your WordPress website with our customized add-ons.', 'rubine-lite' ); ?>
				</span>

				<p>
					<a href="http://themezee.com/addons/?utm_source=customizer&utm_medium=button&utm_campaign=rubine&utm_content=addons" target="_blank" class="button button-secondary">
						<?php esc_html_e( 'Browse our add-ons', 'rubine-lite' ); ?>
					</a>
				</p>
				
			</div>
			
			<?php
        }
    }
	
endif;