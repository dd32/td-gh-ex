<?php
/**
 * Bartleby Theme Options Panel
 *
 * @package bartleby
 * @since bartleby 1.0
 */
function bartleby_theme_options_init() {
	register_setting(
		'bartleby_options', // Options group, see settings_fields() call in bartleby_theme_options_render_page()
		'bartleby_theme_options', // Database option, see bartleby_get_theme_options()
		'bartleby_theme_options_validate' // The sanitization callback, see bartleby_theme_options_validate()
	);
	// Register our settings field group
	add_settings_section(
		'header', // Unique identifier for the settings section
		'Header Options', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'bartleby_theme_options' // Menu slug, used to uniquely identify the page; see bartleby_theme_options_add_page()
	);
	add_settings_section(
		'display', // Unique identifier for the settings section
		'Display Options', // Section title (we don't want one)
		'__return_false', // Section callback (we don't want anything)
		'bartleby_theme_options' // Menu slug, used to uniquely identify the page; see bartleby_theme_options_add_page()
	);
	// Register our individual settings fields
	// header
	add_settings_field('bartleby_logo', __( 'Site Logo', 'bartleby' ), 'bartleby_settings_field_bartleby_logo', 'bartleby_theme_options', 'header' );
	add_settings_field('social_bar', __( 'Social Bar', 'bartleby' ), 'bartleby_settings_field_social_bar', 'bartleby_theme_options', 'header' );
	add_settings_field('facebook_link', __( 'Facebook', 'bartleby' ), 'bartleby_settings_field_facebook_link', 'bartleby_theme_options', 'header' );
	add_settings_field('twitter_link', __( 'Twitter', 'bartleby' ), 'bartleby_settings_field_twitter_link', 'bartleby_theme_options', 'header');
	add_settings_field('gplus_link', __( 'Google Plus', 'bartleby' ), 'bartleby_settings_field_gplus_link', 'bartleby_theme_options', 'header');
	add_settings_field('linkedin_link', __( 'LinkedIn', 'bartleby' ), 'bartleby_settings_field_linkedin_link', 'bartleby_theme_options', 'header');
	add_settings_field('github_link', __( 'Github', 'bartleby' ), 'bartleby_settings_field_github_link', 'bartleby_theme_options', 'header');
	add_settings_field('pinterest_link', __( 'Pinterest', 'bartleby' ), 'bartleby_settings_field_pinterest_link', 'bartleby_theme_options', 'header');
	add_settings_field('feed_link', __( 'RSS Feed', 'bartleby' ), 'bartleby_settings_field_feed_link', 'bartleby_theme_options', 'header');

	// display
	add_settings_field( 'home_headline', __( 'Home Headline', 'bartleby' ), 'bartleby_settings_field_home_headline', 'bartleby_theme_options', 'display' );
	add_settings_field('column_posts', __( 'Column Posts', 'bartleby' ), 'bartleby_settings_field_column_posts', 'bartleby_theme_options', 'display');
	add_settings_field( 'elength', __( 'Excerpt Length', 'bartleby' ), 'bartleby_settings_field_elength', 'bartleby_theme_options', 'display' );
	add_settings_field('post_default_image', __( 'Post Default Image', 'bartleby' ), 'bartleby_settings_field_post_default_image', 'bartleby_theme_options', 'display');
	add_settings_field('infinite_scroll_disable', __( 'Infinite Scroll', 'bartleby' ), 'bartleby_settings_field_infinite_scroll_disable', 'bartleby_theme_options', 'display');	
	add_settings_field( 'footer_link', __( 'Footer Link', 'bartleby' ), 'bartleby_settings_field_footer_link', 'bartleby_theme_options', 'display' );
}
add_action( 'admin_init', 'bartleby_theme_options_init' );

function bartleby_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_bartleby_options', 'bartleby_option_page_capability' );
/**
 * Adds page to the admin menu
 */
function bartleby_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Bartleby Theme Options', 'bartleby' ),   // Name of page
		__( 'Theme Options', 'bartleby' ),   // Label in menu
		'edit_theme_options',          // Capability required
		'bartleby_theme_options',               // Menu slug, used to uniquely identify the page
		'bartleby_theme_options_render_page' // Function that renders the options page
	);
}
add_action( 'admin_menu', 'bartleby_theme_options_add_page' );

function bartleby_settings_column_posts() {
	$bartleby_settings_column_posts = array(
		'one-column' => array(
			'value' => '3',
			'label' => __( 'Blog Style', 'bartleby' )
		),
		'two-column' => array(
			'value' => '1',
			'label' => __( 'Two Column', 'bartleby' )
		),
		'three-column' => array(
			'value' => '2',
			'label' => __( 'Three Column', 'bartleby' )
		)
	);
	return apply_filters( 'bartleby_settings_column_posts', $bartleby_settings_column_posts );
}
function bartleby_get_theme_options() {
	$saved = (array) get_option( 'bartleby_theme_options' );
	$defaults = array(
	'home_headline' => '',
	'bartleby_logo' => '',
	'social_bar' => 'off',
	'facebook_link' => '',
	'twitter_link' => '',
	'gplus_link' => '',
	'linkedin_link' => '',
	'github_link' => '',
	'pinterest_link' => '',
	'feed_link' => '',
	'footer_link' => 'off',
	'column_posts' => '2',
	'infinite_scroll_disable' => 'off',
	'elength' => '20',
	'post_default_image' => ''
	);
	$defaults = apply_filters( 'bartleby_default_theme_options', $defaults );
	$bartleby_options = wp_parse_args( $saved, $defaults );
	$bartleby_options = array_intersect_key( $bartleby_options, $defaults );
	return $bartleby_options;
}
function bartleby_settings_field_post_default_image() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<input type="url" name="bartleby_theme_options[post_default_image]" size="80" id="post-default-image" value="<?php echo esc_url( $bartleby_options['post_default_image'] ); ?>" />
	<input id="upload_post_default" type="button" value="Upload Image" /><br>
	<label class="description" for="post-default-image"><?php _e( 'Used as a default post thumbnail if the post has no set featured image.', '_s' ); ?></label>
	<?php
}
function bartleby_settings_field_column_posts() {
	$bartleby_options = bartleby_get_theme_options();
	foreach ( bartleby_settings_column_posts() as $button ) {
	?>
	<div class="layout">
		<label class="description">
			<input type="radio" name="bartleby_theme_options[column_posts]" value="<?php echo esc_attr( $button['value'] ); ?>" <?php checked( $bartleby_options['column_posts'], $button['value'] ); ?> />
			<?php echo $button['label']; ?>
		</label>
	</div>
	<?php
	} ?>
	<br>
	<label class="description">
	<?php _e( 'If using the three-column layout, you may want to set your posts to 9 or 12 posts per page in Settings->Reading to prevent the last post in a feed from sitting on its own line.', '_s' ); ?>
	</label>
	<?php
}
function bartleby_settings_social_bar() {
	$bartleby_settings_field_social_bar = array(
		'on' => array(
			'value' => 'on',
			'label' => __( 'On', 'bartleby' )
		),
		'off' => array(
			'value' => 'off',
			'label' => __( 'Off', 'bartleby' )
		)
	);
	return apply_filters( 'bartleby_settings_social_bar', $bartleby_settings_field_social_bar );
}
function bartleby_settings_infinite_scroll_disable() {
	$bartleby_settings_infinite_scroll_disable = array(
		'on' => array(
			'value' => 'on',
			'label' => __( 'On', 'bartleby' )
		),
		'off' => array(
			'value' => 'off',
			'label' => __( 'Off', 'bartleby' )
		)
	);
	return apply_filters( 'bartleby_settings_infinite_scroll_disable', $bartleby_settings_infinite_scroll_disable );
}
function bartleby_settings_footer_link() {
	$bartleby_settings_footer_link = array(
		'on' => array(
			'value' => 'on',
			'label' => __( 'On', 'bartleby' )
		),
		'off' => array(
			'value' => 'off',
			'label' => __( 'Off', 'bartleby' )
		)
	);
	return apply_filters( 'bartleby_settings_footer_link', $bartleby_settings_footer_link );
}
function bartleby_settings_field_bartleby_logo() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<div class="layout">
		<label class="description">
			<input id="bartleby_site_logo" name="bartleby_theme_options[bartleby_logo]" type="url" size="60" value="<?php esc_attr_e( $bartleby_options['bartleby_logo'] ); ?>" />
			<input id="upload_bartleby_logo" type="button" value="Upload Image" />
		</label>
	</div>
	<?php
}
function bartleby_settings_field_facebook_link() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<div class="layout">
		<label class="description">
			<input id="bartleby_facebook_link" name="bartleby_theme_options[facebook_link]" type="url" size="60" value="<?php esc_attr_e( $bartleby_options['facebook_link'] ); ?>" />
		</label>
	</div>
	<?php
}
function bartleby_settings_field_twitter_link() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<div class="layout">
		<label class="description">
			<input id="bartleby_twitter_link" name="bartleby_theme_options[twitter_link]" type="url" size="60" value="<?php esc_attr_e( $bartleby_options['twitter_link'] ); ?>" />
		</label>
	</div>
	<?php
}
function bartleby_settings_field_linkedin_link() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<div class="layout">
		<label class="description">
			<input id="bartleby_linkedin_link" name="bartleby_theme_options[linkedin_link]" type="url" size="60" value="<?php esc_attr_e( $bartleby_options['linkedin_link'] ); ?>" />
		</label>
	</div>
	<?php
}
function bartleby_settings_field_gplus_link() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<div class="layout">
		<label class="description">
			<input id="bartleby_gplus_link" name="bartleby_theme_options[gplus_link]" type="url" size="60" value="<?php esc_attr_e( $bartleby_options['gplus_link'] ); ?>" />
		</label>
	</div>
	<?php
}
function bartleby_settings_field_pinterest_link() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<div class="layout">
		<label class="description">
			<input id="bartleby_pinterest_link" name="bartleby_theme_options[pinterest_link]" type="url" size="60" value="<?php esc_attr_e( $bartleby_options['pinterest_link'] ); ?>" />
		</label>
	</div>
	<?php
}
function bartleby_settings_field_github_link() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<div class="layout">
		<label class="description">
			<input id="bartleby_github_link" name="bartleby_theme_options[github_link]" type="url" size="60" value="<?php esc_attr_e( $bartleby_options['github_link'] ); ?>" />
		</label>
	</div>
	<?php
}
function bartleby_settings_field_feed_link() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<div class="layout">
		<label class="description">
			<input id="bartleby_feed_link" name="bartleby_theme_options[feed_link]" type="url" size="60" value="<?php esc_attr_e( $bartleby_options['feed_link'] ); ?>" />
		</label>
	</div>
	<?php
}
function bartleby_settings_field_social_bar() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<label class="description">
		<input type="checkbox" name="bartleby_theme_options[social_bar]" id="social_bar" <?php checked( 'on', $bartleby_options['social_bar'] ); ?> />
		<?php _e( 'Check this box to activate the social bar.', '_s' ); ?>
	</label>
	<?php
}
function bartleby_settings_field_infinite_scroll_disable() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<label class="description">
		<input type="checkbox" name="bartleby_theme_options[infinite_scroll_disable]" id="infinite_scroll" <?php checked( 'on', $bartleby_options['infinite_scroll_disable'] ); ?> />
		<?php _e( 'Check this box to deactivate infinite scroll.', '_s' ); ?>
	</label>
	<?php
}
function bartleby_settings_field_elength() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<label class="description">
		<input type="number" size="80" min="0" max="100" name="bartleby_theme_options[elength]" value='<?php echo $bartleby_options['elength']; ?>' />
		<?php _e( 'Set the length of the post excerpt.', '_s' ); ?>
	</label>
	<?php
}
function bartleby_settings_field_footer_link() {
	$bartleby_options = bartleby_get_theme_options();
	?>
	<label class="description">
		<input type="checkbox" name="bartleby_theme_options[footer_link]" id="footer_link" <?php checked( 'on', $bartleby_options['footer_link'] ); ?> />
		<?php _e( 'Check to add a small credit link in your footer to the theme author\'s site. This is a great way to show support in lieu of a donation.', '_s' ); ?>
	</label>
	<?php
}
function bartleby_settings_field_home_headline() {
	$bartleby_options = bartleby_get_theme_options(); ?>
	<input id="home_headline" name="bartleby_theme_options[home_headline]" type="text" size="40" value="<?php echo($bartleby_options['home_headline']); ?>" />
	<label class="description" for="bartleby_theme_options[home_headline]"><?php esc_attr_e( 'Leave blank to disable', 'bartleby' ); ?></label>
	<?php
	}
/**
 * Renders the admin screen
 */
function bartleby_theme_options_render_page() { ?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<?php $theme_name = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme(); ?>
		<h2><?php printf( __( '%s Theme Options', 'bartleby' ), $theme_name ); ?></h2>
		<?php settings_errors(); ?>
		<form method="post" action="options.php">
			<?php
				settings_fields( 'bartleby_options' );
				do_settings_sections( 'bartleby_theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}
/**
 * Sanitize and validate form input
 */
function bartleby_theme_options_validate( $input ) {
	$output = array();
	if ( isset ( $input['home_headline'] ) )
	$output['home_headline'] = esc_attr( $input['home_headline'] );
	if ( isset ( $input['bartleby_logo'] ) )
	$output['bartleby_logo'] = esc_url( $input['bartleby_logo'] );
	if ( isset ( $input['facebook_link'] ) )
	$output['facebook_link'] = esc_url( $input['facebook_link'] );
	if ( isset ( $input['twitter_link'] ) )
	$output['twitter_link'] = esc_url( $input['twitter_link'] );
	if ( isset ( $input['gplus_link'] ) )
	$output['gplus_link'] = esc_url( $input['gplus_link'] );
	if ( isset ( $input['linkedin_link'] ) )
	$output['linkedin_link'] = esc_url( $input['linkedin_link'] );
	if ( isset ( $input['github_link'] ) )
	$output['github_link'] = esc_url( $input['github_link'] );
	if ( isset ( $input['pinterest_link'] ) )
	$output['pinterest_link'] = esc_url( $input['pinterest_link'] );
	if ( isset ( $input['feed_link'] ) )
	$output['feed_link'] = esc_url( $input['feed_link'] );
	if ( isset ( $input['column_posts'] ) )
	$output['column_posts'] = esc_attr ( $input['column_posts'] );
	if ( isset ( $input['elength'] ) && !empty ($input['elength'] ) )
	$output['elength'] = esc_attr ( $input['elength'] );
	if ( isset( $input['elength'] ) && ! empty( $input['elength'] ) )
		$output['elength'] = wp_filter_nohtml_kses( $input['elength'] );
	if ( isset( $input['social_bar'] ) )
	$output['social_bar'] = 'on';
	if ( isset ( $input['post_default_image'] ) )
	$output['post_default_image'] = esc_url( $input['post_default_image'] );
	if ( isset( $input['footer_link'] ) )
	$output['footer_link'] = 'on';
	if ( isset( $input['infinite_scroll_disable'] ) )
	$output['infinite_scroll_disable'] = 'on';
	return apply_filters( 'bartleby_theme_options_validate', $output, $input );
}