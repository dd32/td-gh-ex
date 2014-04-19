<?php
/*
 WARNING: This is a core Generate file. DO NOT edit
 this file under any circumstances. Please do all modifications
 in the form of a child theme.
 */

/**
 * Creates the options page.
 *
 * This file is a core Generate file and should not be edited.
 *
 * @package  WordPress
 * @author   Thomas Usborne
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     http://www.generateframework.com
 */

// create custom plugin settings menu
add_action('admin_menu', 'gen_create_menu');
function gen_create_menu() 
{
	$addons = array(
		'generate_fonts_setup' => 'gen_fonts_license_key_status',
		'generate_colors_setup' => 'gen_colors_license_key_status',
		'generate_page_header' => 'gen_page_header_license_key_status',
		'generate_insert_import_export' => 'gen_ie_license_key_status'
	);
	$activate_counter = 1;
	$show_count = '';
	foreach ( $addons as $k => $v ) {
		if ( function_exists( $k ) && get_option( $v ) !== 'valid' ) :
			$the_count = $activate_counter++;
			$show_count = ' <span title="' . __('Activate your addons','generate') . '" class="update-plugins count-' . $the_count . '"><span class="plugin-count">' . $the_count . '</span></span>';
		endif;
	}
	
	//add_menu_page( __('Generate','generate'), __('Generate','generate') . $show_count, 'edit_themes', 'generate-options', 'gen_settings_page', 'dashicons-plus', 3 );
	//add_submenu_page('generate-options', __('Options','generate'), __('Options','generate'), 'edit_themes', 'generate-options', 'gen_settings_page');
	//add_submenu_page('generate-options', 'Customizer', 'Customizer', 'edit_theme_options', 'customize.php', '', '');
	$gen_page = add_theme_page( __('GeneratePress','generate'), __('GeneratePress','generate') . $show_count, 'edit_themes', 'generate-options', 'gen_settings_page' );
	
	//call register settings function
	add_action( 'admin_init', 'register_gen_settings' );
	add_action( "admin_print_scripts-$gen_page", 'generate_options_scripts' );
	add_action( "admin_print_styles-$gen_page", 'generate_options_styles' );
}

function generate_options_scripts() 
{
    // wp_enqueue_script( 
    //    'move-it', 
    //    GEN_URI . '/inc/admin/js/move-it.js',
    //    array( 'jquery-ui-sortable', 'jquery' )
    //);
}

function generate_options_styles() 
{
     wp_enqueue_style( 
        'generate-options', 
        GEN_URI . '/inc/css/style.css'
    );
}


function register_gen_settings() {
	//register our settings
	register_setting( 'gen-settings-group', 'gen_header_scripts' );
	register_setting( 'gen-settings-group', 'gen_footer_scripts' );
}

function gen_settings_page() 
{
	?>
	<div class="wrap">
		<h2><?php _e('GeneratePress','generate');?></h2>
		<div class="metabox-holder">
			<div class="postbox-container" style="float: none;max-width: 700px;">
				<div class="meta-box-sortables">
					<form method="post" action="options.php">
						<?php settings_fields( 'gen-settings-group' ); ?>
						<?php do_settings_sections( 'gen-settings-group' ); ?>
						
						<?php
						if ( !empty($_GET['status']) && $_GET['status'] == 'imported' ) {
							echo '<div id="message" class="updated" style="max-width:670px;"><p>' . __('Import successful.','generate') . '</p></div>';
						}
						
						if ( !empty($_GET['status']) && $_GET['status'] == 'reset' ) {
							echo '<div id="message" class="updated" style="max-width:670px;"><p>' . __('Settings removed.','generate') . '</p></div>';
						}
						
						if ( !empty($_GET['settings-updated']) && $_GET['settings-updated'] == true ) {
							echo '<div id="message" class="updated" style="max-width:670px;"><p>' . __('Settings saved.','generate') . '</p></div>';
						}
						?>
								
						<div class="postbox generate-metabox" id="gen-1">
							<h3 class="hndle"><?php _e('Information','generate');?></h3>
							<div class="inside">
								<p>
									<strong style="display:inline-block;width:60px;"><?php _e('Version','generate');?>:</strong> <?php echo GEN_VERSION; ?><br />
									<strong style="display:inline-block;width:60px;"><?php _e('Author','generate');?>:</strong> <a href="<?php echo esc_url('http://edge22.com');?>" target="_blank">Thomas Usborne</a><br />
									<strong style="display:inline-block;width:60px;"><?php _e('Website','generate');?>:</strong> <a href="<?php echo esc_url('http://generatepress.com');?>" target="_blank">GeneratePress</a>
								</p>
								<p>
									<strong><?php _e('Addons','generate');?>:</strong>
									<?php 
									
									$addons = array(
										'1' => array(
												'name' => __('Colors','generate'),
												'version' => ( function_exists('generate_colors_setup') ) ? GEN_COLORS_VERSION : '',
												'id' => 'generate_colors_setup',
												'license' => 'gen_colors_license_key_status',
												'url' => esc_url('http://generatepress.com')
										),
										'2' => array(
												'name' => __('Typography','generate'),
												'version' => ( function_exists('generate_fonts_setup') ) ? GEN_FONT_VERSION : '',
												'id' => 'generate_fonts_setup',
												'license' => 'gen_fonts_license_key_status',
												'url' => esc_url('http://generatepress.com')
										 ),
										'3' => array(
												'name' => __('Page Header','generate'),
												'version' => ( function_exists('generate_page_header') ) ? GEN_PAGE_HEADER_VERSION : '',
												'id' => 'generate_page_header',
												'license' => 'gen_page_header_license_key_status',
												'url' => esc_url('http://generatepress.com')
										),
										'4' => array(
												'name' => __('Import / Export','generate'),
												'version' => ( function_exists('generate_insert_import_export') ) ? GEN_IE_VERSION : '',
												'id' => 'generate_insert_import_export',
												'license' => 'gen_ie_license_key_status',
												'url' => esc_url('http://generatepress.com')
										)
									);
									
									foreach ( $addons as $addon ) {
										echo '<br /><a href="' . $addon['url'] . '" target="_blank">' . $addon['name'] . '</a>';
										if ( !function_exists($addon['id']) ) :
											echo ' / <span style="color:red;">' . __('plugin inactive','generate') . '</span>';
										else :
											echo ' ' . $addon['version'] . ' - <span style="color:green;">' . __('plugin active','generate') . '</span>';
											if ( get_option($addon['license']) !== 'valid' ) :
												echo ' / <span style="color:red;">' . __('license key inactive','generate') . '</span>';
											else :
												echo ' / <span style="color:green;">' . __('license key active','generate') . '</span>';
											endif;
										endif;
									} 
									?>
											
								</p>
										
								<div class="clear" style="margin-bottom:20px;"></div>
										
								<p>
									<a id="gen_customize_button" class="button button-primary" href="<?php echo admin_url('customize.php'); ?>"><?php _e('Customize','generate');?></a>  
									<a id="gen_addon_button" class="button button-primary" href="<?php echo esc_url('http://generatepress.com');?>" target="_blank"><?php _e('Addons','generate');?></a> 
									<a title="<?php _e('Please help support development of the GeneratePress by donating.','generate');?>" class="button button-primary" target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UVPTY2ZJA68S6"><?php _e('Donate','generate');?></a>
								</p>
							</div>
						</div>

						<div class="postbox generate-metabox" id="gen-2">
							<h3 class="hndle"><?php _e('Scripts','generate');?></h3>
							<div class="inside">
								<p>
									<label for="gen_header_scripts"><?php _e('Insert into <code>&lt;head&gt;</code>','generate');?></label>
									<textarea id="gen_header_scripts" name="gen_header_scripts"><?php echo esc_html(get_option('gen_header_scripts')); ?></textarea>
									<span class="description"><?php _e('Custom meta tags, styles..','generate');?></span>
								</p>
											
								<div class="clear" style="margin-bottom:20px;"></div>
										 
								<p>
									<label for="gen_footer_scripts"><?php _e('Insert before closing <code>&lt;/body&gt;</code>','generate');?></label>
									<textarea id="gen_footer_scripts" name="gen_footer_scripts"><?php echo esc_html(get_option('gen_footer_scripts')); ?></textarea>
									<span class="description"><?php _e('Analytics tracking codes, other javascript..','generate');?></span>
								</p>
							</div>
						</div>
						
						<?php do_action('generate_inside_options_form'); ?>
						
						<div class="postbox generate-metabox" id="gen-license-keys">
							<h3 class="hndle"><?php _e('License Keys','generate');?></h3>
							<div class="inside">
							
								<?php
								
								if ( !function_exists('generate_fonts_setup') &&
									!function_exists('generate_colors_setup') &&
									!function_exists('generate_page_header') &&
									!function_exists('generate_insert_import_export') ) :
										echo __('Looks like you don\'t have any Addons! <a href="' . esc_url('http://generatepress.com') . '" target="_blank">Take a look at what\'s available here</a>.','generate');
									endif;

								?>
											
								<?php do_action('generate_license_key_items'); ?>

							</div>
						</div>
									
						<div style="display:block;clear:both;width:100%;"></div>
						<?php submit_button(); ?>

					</form>
								
					<?php do_action('generate_options_items'); ?>
					
					<div class="postbox generate-metabox" id="gen-delete">
						<h3 class="hndle"><?php _e('Delete Visual Settings','generate');?></h3>
						<div class="inside">
										
							<p><?php _e( '<strong>Warning:</strong> Clicking this button will delete your settings set in the <a href="' . admin_url('customize.php') . '">Customize</a> area.','generate' ); ?></p>
							<p><?php _e( 'You may want to export your settings before deleting them forever.','generate');?></p>
							<form method="post">
								<p><input type="hidden" name="gen_reset_customizer" value="gen_reset_customizer_settings" /></p>
								<p>
									<?php wp_nonce_field( 'gen_reset_customizer_nonce', 'gen_reset_customizer_nonce' ); ?>
									<?php submit_button( __( 'Delete Visual Settings', 'generate' ), 'button', 'submit', false ); ?>
								</p>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }

/**
 * Reset customizer settings
 */
add_action( 'admin_init', 'gen_reset_customizer_settings' );
function gen_reset_customizer_settings() {

	if( empty( $_POST['gen_reset_customizer'] ) || 'gen_reset_customizer_settings' != $_POST['gen_reset_customizer'] )
		return;

	if( ! wp_verify_nonce( $_POST['gen_reset_customizer_nonce'], 'gen_reset_customizer_nonce' ) )
		return;

	if( ! current_user_can( 'manage_options' ) )
		return;

	delete_option('generate_settings');
	
	wp_safe_redirect( admin_url( 'admin.php?page=generate-options&status=reset' ) ); exit;

}