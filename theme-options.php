<?php
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

function theme_options_init(){
	register_setting( 'adamsrazor_options', 'adamsrazor_theme_options', 'theme_options_validate' );
}

function theme_options_add_page() {
	add_theme_page( __( 'Adam\'s Razor Options', 'adams-razor' ), __( 'Adam\'s Razor Options', 'adams-razor' ), 'edit_theme_options', 'theme_options', 'theme_options_create_page' );
}

function theme_options_create_page() {
	
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Adam\'s Razor Options', 'adams-razor' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'adams-razor' ); ?></strong></p></div>
		<?php endif; ?>
		
		<div class="updated"><p><strong>Be careful:</strong> script tags with errors can break your website.</p></div>

		<form method="post" action="options.php">
			<?php settings_fields( 'adamsrazor_options' ); ?>
			<?php $options = get_option( 'adamsrazor_theme_options' ); ?>

			<table class="form-table">

				<tr valign="top"><th scope="row"><?php _e( 'Before &lt;/head&gt;', 'adams-razor' ); ?></th>
					<td>
						<textarea id="adamsrazor_theme_options[precloseheadtag]" class="large-text" cols="50" rows="10" name="adamsrazor_theme_options[precloseheadtag]"><?php echo esc_textarea( $options['precloseheadtag'] ); ?></textarea>
						<label class="description" for="adamsrazor_theme_options[precloseheadtag]"><?php _e( 'Code to include before the closing head tag: &lt;/head&gt;', 'adams-razor' ); ?></label>
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><?php _e( 'Before &lt;/body&gt;', 'adams-razor' ); ?></th>
					<td>
						<textarea id="adamsrazor_theme_options[preclosebodytag]" class="large-text" cols="50" rows="10" name="adamsrazor_theme_options[preclosebodytag]"><?php echo esc_textarea( $options['preclosebodytag'] ); ?></textarea>
						<label class="description" for="adamsrazor_theme_options[preclosebodytag]"><?php _e( 'Code to include before the closing body tag: &lt;/body&gt;', 'adams-razor' ); ?></label>
					</td>
				</tr>
				
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'adams-razor' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

function theme_options_validate( $input ) {
	// no validation required on these inital two fields. 
	// function may be useful for future options
	return $input;
}