<?php
/**
 * star Theme Customizer
 *
 * @package star
 */

/**
 * Enqueue the customizer stylesheet for our radio buttons.
 */
function star_customizer_stylesheet() {
	wp_enqueue_style( 'star-customizer-css', get_template_directory_uri() . '/inc/customizer.css' );
	wp_enqueue_style( 'star-customizer-iconcss', get_template_directory_uri() . '/fonts/font-awesome.min.css' );
}
add_action( 'customize_controls_print_styles', 'star_customizer_stylesheet' );

function star_customize_register( $wp_customize ) {
	/**
	 * Custom control
	 */
	class Star_Icon_Control extends WP_Customize_Control {
		public function render_content() {
			?>
			<div class="star-radio-buttons">
				<fieldset>
					<legend class="customize-control-title"><?php echo esc_html( $this->label ); ?></legend>
					<label>
						<input type="radio" value="f1fd" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f1fd' ); ?> />
						<i class="fa fa-birthday-cake"></i> <?php esc_html_e('Bake','star')?>
					</label>
					<label>
						<input type="radio" value="f219" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f219' ); ?> />
						<i class="fa fa-diamond"></i> <?php esc_html_e('Diamond','star')?>
					</label>
					<label>
						<input type="radio" value="f005" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f005' ); ?> />
						<i class="fa fa-star"></i> <?php esc_html_e('Star','star')?>
					</label>
					<label>
						<input type="radio" value="f0fc" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f0fc' ); ?> />
						<i class="fa fa-beer"></i> <?php esc_html_e('Beer','star')?>
					</label>
					<label>
						<input type="radio" value="f0f4" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f0f4' ); ?> />
						<i class="fa fa-coffee"></i> <?php esc_html_e('Coffee','star')?>
					</label>
					<label>
						<input type="radio" value="f1ae" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f1ae' ); ?> />
						<i class="fa fa-child"></i> <?php esc_html_e('Child','star')?>
					</label>
					<label>
						<input type="radio" value="f182" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f182' ); ?> />
						<i class="fa fa-female"></i> <?php _e('Female','star')?>
					</label>
					<label>
						<input type="radio" value="f183" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f183' ); ?> />
						<i class="fa fa-male"></i> <?php esc_html_e('Male','star')?>
					</label>
					<label>
						<input type="radio" value="f0fb" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f0fb' ); ?> />
						<i class="fa fa-fighter-jet"></i> <?php esc_html_e('Fighter jet','star')?>
					</label>
					<label>
						<input type="radio" value="f008" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f008' ); ?> />
						<i class="fa fa-film"></i> <?php esc_html_e('Film','star')?>
					</label>
					<label>
						<input type="radio" value="f004" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f004' ); ?> />
						<i class="fa fa-heart"></i> <?php esc_html_e('Heart','star')?>
					</label>
					<label>
						<input type="radio" value="f0ac" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f0ac' ); ?> />
						<i class="fa fa-globe"></i> <?php esc_html_e('Globe','star')?>
					</label>
					<label>
						<input type="radio" value="f1b0" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f1b0' ); ?> />
						<i class="fa fa-paw"></i> <?php esc_html_e('Paw','star')?>
					</label>
					<label>
						<input type="radio" value="f1fc" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f1fc' ); ?> />
						<i class="fa fa-paint-brush"></i> <?php esc_html_e(' Paintbrush','star')?>
					</label>
					<label>
						<input type="radio" value="f135" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f135' ); ?> />
						<i class="fa fa-rocket"></i> <?php esc_html_e('Rocket','star')?>
					</label>
					<label>
						<input type="radio" value="f07a" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f07a' ); ?> />
						<i class="fa fa-shopping-cart"></i> <?php esc_html_e('Shopping','star')?>
					</label>
					<label>
						<input type="radio" value="f091" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f091' ); ?> />
						<i class="fa fa-trophy"></i> <?php esc_html_e('Trophy','star')?>
					</label>
					<label>
						<input type="radio" value="f072" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f072' ); ?> />
						<i class="fa fa-plane"></i> <?php esc_html_e('Plane','star')?>
					</label>
					<label>
						<input type="radio" value="f1e3" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f1e3' ); ?> />
						<i class="fa fa-futbol-o"></i> <?php esc_html_e('Ball','star')?>
					</label>
					<label>
						<input type="radio" value="f087" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f087' ); ?> />
						<i class="fa fa-thumbs-o-up"></i> <?php esc_html_e('Like','star')?>
					</label>
					<label>
						<input type="radio" value="f043" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f043' ); ?> />
						<i class="fa fa-tint"></i> <?php esc_html_e('Tint','star')?>
					</label>
					<label>
						<input type="radio" value="f1b9" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f1b9' ); ?> />
						<i class="fa fa-car"></i> <?php esc_html_e('Car','star')?>
					</label>
					<label>
						<input type="radio" value="f192" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f192' ); ?> />
						<i class="fa fa-dot-circle-o"></i> <?php esc_html_e('Dot','star')?>
					</label>
					<label>
						<input type="radio" value="f155" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f155' ); ?> />
						<i class="fa fa-usd"></i> <?php esc_html_e('Dollar','star')?>
					</label>
					<label>
						<input type="radio" value="f030" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f030' ); ?> />
						<i class="fa fa-camera"></i> <?php esc_html_e('Camera','star')?>
					</label>
					<label>
						<input type="radio" value="f130" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'f130' ); ?> />
						<i class="fa fa-microphone"></i> <?php esc_html_e('Microphone','star')?>
					</label>
				</fieldset>
			</div>
			<?php
		}
	}

	/* Add sections and panels to the WordPress customizer*/
	$wp_customize->add_section('star_section_advanced',      array(
		'title' => __( 'Advanced settings', 'star' ),
		'priority' => 100,
	) );

	$wp_customize->get_section( 'header_image' )->title = __( 'Header', 'star' );

	$wp_customize->add_setting( 'star_header_bgcolor', array(
		'default'        => '#95b8cf',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'star_header_bgcolor', array(
		'label'        => __( 'Header background color:', 'star' ),
		'section' => 'header_image',
		'settings'  => 'star_header_bgcolor',
	) ) );

	$wp_customize->add_setting( 'star_hide_icon',		array(
		'sanitize_callback' => 'star_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'star_hide_icon',		array(
		'type' => 'checkbox',
		'label' => __( 'Check this box to hide the icon.', 'star' ),
		'section' => 'header_image',
		'priority' => 5,
	) );

	$wp_customize->add_setting( 'star_header_icon',		array(
		'sanitize_callback' => 'star_sanitize_text',
	) );

	$wp_customize->add_control( new star_icon_Control( $wp_customize, 'star_header_icon', array(
		'label' => __( 'Chose an icon for your header:', 'star' ),
		'section'  => 'header_image',
		'settings' => 'star_header_icon',
		'priority' => 1,
		)
	) );

	$wp_customize->add_setting( 'star_show_sidebar_on_pages',		array(
		'sanitize_callback' => 'star_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'star_show_sidebar_on_pages',		array(
		'type' => 'checkbox',
		'label' => __( 'Check this box to show the sidebar on pages.', 'star' ),
		'section' => 'star_section_advanced',
	) );

	$wp_customize->add_setting( 'star_front_sidebar',		array(
		'sanitize_callback' => 'star_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'star_front_sidebar',		array(
		'type' => 'checkbox',
		'label' => __( 'Check this box to show the sidebar on the frontpage.', 'star' ),
		'section' => 'star_section_advanced',
	) );

	/* Call to action text **/

	$wp_customize->add_section('star_section_one',      array(
		'title' => __( 'Call to Action', 'star' ),
		'priority' => 100,
	) );

	$wp_customize->add_setting( 'star_action_text',		array(
		'sanitize_callback' => 'star_sanitize_text',
	) );

	$wp_customize->add_control( 'star_action_text',		array(
		'type' => 'text',
		'label' => __( 'Add this text to the Call to Action button on the front page:', 'star' ),
		'section' => 'star_section_one',
	) );

	/* Call to action link **/
	$wp_customize->add_setting( 'star_action_link',		array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control('star_action_link',		array(
		'type' => 'text',
		'label' => __( 'Add a link to the Call to action button:', 'star' ),
		'section' => 'star_section_one',
	) );

	$wp_customize->add_setting( 'star_hide_action',		array(
		'sanitize_callback' => 'star_sanitize_checkbox',
	) );
	$wp_customize->add_control('star_hide_action',		array(
		'type' => 'checkbox',
		'label' => __( 'Check this box to hide the Call to Action button.', 'star' ),
		'section' => 'star_section_one',
	) );

	/*Advanced settings*/
	$wp_customize->add_setting( 'star_hide_search',		array(
		'sanitize_callback' => 'star_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'star_hide_search',		array(
		'type' => 'checkbox',
		'label' => __( 'Check this box to hide the search form in the header menu.', 'star' ),
		'section' => 'star_section_advanced',
	) );

	$wp_customize->add_setting( 'star_hide_title',		array(
		'sanitize_callback' => 'star_sanitize_checkbox',
	) );
	$wp_customize->add_control('star_hide_title',		array(
		'type' => 'checkbox',
		'label' => __( 'Check this box to hide the clickable site title in the header menu.', 'star' ),
		'section' => 'star_section_advanced',
	) );

	/* if jetpack is installed, add the featured heading to the customizer. */
	$wp_customize->add_setting( 'star_featured_headline',		array(
		'sanitize_callback' => 'star_sanitize_text',
		'default'        => __( 'Featured', 'star' ),
	) );
	$wp_customize->add_control('star_featured_headline',		array(
		'type' => 'text',
		'label' => __( 'Headline above your featured content:', 'star' ),
		'section' => 'featured_content',
	) );

	/*Add a better screen reader text for the two widget areas depending on your content*/
	$wp_customize->add_setting( 'star_footer_screen_reader',		array(
		'sanitize_callback' => 'star_sanitize_text',
	) );
	$wp_customize->add_control('star_footer_screen_reader',		array(
		'type' => 'text',
		'label' => __( 'Add a descriptive screen reader text for the footer.', 'star' ),
		'section' => 'star_section_advanced',
	) );

	$wp_customize->add_setting( 'star_sidebar_screen_reader',		array(
		'sanitize_callback' => 'star_sanitize_text',
	) );
	$wp_customize->add_control('star_sidebar_screen_reader',		array(
		'type' => 'text',
		'label' => __( 'Add a descriptive screen reader text for the sidebar.', 'star' ),
		'section' => 'star_section_advanced',
	) );

	/** Reset */
	$wp_customize->add_setting( 'star_reset',		array(
		'sanitize_callback' => 'star_sanitize_reset',
	) );
	$wp_customize->add_control('star_reset',		array(
		'type' => 'text',
		'label' => __( 'Are you sure that you want to reset your settings? Type YES in the box, save and refresh the page.', 'star' ),
		'section' => 'star_section_reset',
	) );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'star_hide_search' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'star_hide_title' )->transport  = 'postMessage';

	if ( star_has_featured_posts( 1 ) ) {
		$wp_customize->get_setting( 'star_featured_headline' )->transport  = 'postMessage';
	}
}
add_action( 'customize_register', 'star_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function star_customize_preview_js() {
	wp_enqueue_script( 'star_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'star_customize_preview_js' );


function star_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function star_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
