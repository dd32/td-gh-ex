<?php
/**
 * gump Theme Customizer
 *
 * @package gump
 * @since gump 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gump_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'gump_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function gump_customize_preview_js() {
	wp_enqueue_script( 'gump_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'gump_customize_preview_js' );

/**
 * Data Satinization
 */
// text input
function pk_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Customizer
 *
 * @since gump 1.0
 */
function gump_theme_customizer( $wp_customize ) {
	/*--------------------------------------------------------------
		Colors
	--------------------------------------------------------------*/
	/* Body Font Color */
    $wp_customize->add_setting( 'gump_body_color', array(
        'default' => '#666666',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gump_body_color', array(
		'label' => __( 'Body Font Color', 'gump' ),
		'section' => 'colors',
		'settings' => 'gump_body_color',
	) ) );

	/* Link Color */
    $wp_customize->add_setting( 'gump_link_color', array(
        'default' => '#666666',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gump_link_color', array(
		'label' => __( 'Link Color', 'gump' ),
		'section' => 'colors',
		'settings' => 'gump_link_color',
	) ) );

	/* Link Hover Color */
    $wp_customize->add_setting( 'gump_hover_color', array(
        'default' => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gump_hover_color', array(
		'label' => __( 'Link Hover Color', 'gump' ),
		'section' => 'colors',
		'settings' => 'gump_hover_color',
	) ) );
	
	/* Border Color */
    $wp_customize->add_setting( 'gump_border_color', array(
        'default' => '#f0f4f5',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gump_border_color', array(
		'label' => __( 'Border Color', 'gump' ),
		'section' => 'colors',
		'settings' => 'gump_border_color',
	) ) );
	
	/* Sidebar Color */
    $wp_customize->add_setting( 'gump_sidebar_color', array(
        'default' => '#f0f4f5',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gump_sidebar_color', array(
		'label' => __( 'Sidebar Color', 'gump' ),
		'section' => 'colors',
		'settings' => 'gump_sidebar_color',
	) ) );
	
	/* Widget Title Color */
    $wp_customize->add_setting( 'gump_widget_title_color', array(
        'default' => '#999',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gump_widget_title_color', array(
		'label' => __( 'Widget Title Color', 'gump' ),
		'section' => 'colors',
		'settings' => 'gump_widget_title_color',
	) ) );
	
	/*--------------------------------------------------------------
		Custom CSS
	--------------------------------------------------------------*/
	class gump_Customize_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}

	$wp_customize->add_section( 'gump_css_section' , array(
	    'title'       => __( 'Custom CSS', 'gump' ),
	    'priority'    => 90,
	    'description' => 'You can add your custom CSS',
	) );

	$wp_customize->add_setting( 'gump_css', array(
        'sanitize_callback' => 'pk_sanitize_text',
    ) );
	 
	$wp_customize->add_control(
	    new gump_Customize_Textarea_Control(
	        $wp_customize,
	        'gump_css',
	        array(
	            'label' => 'Custom CSS',
	            'section' => 'gump_css_section',
	            'settings' => 'gump_css'
	        )
	    )
	);

	/*--------------------------------------------------------------
		Footer Scripts
	--------------------------------------------------------------*/
	$wp_customize->add_section( 'gump_scripts_section' , array(
	    'title'       => __( 'Custom Footer Scripts', 'gump' ),
	    'priority'    => 100,
	    'description' => 'You can add your custom Scripts in the footer without the tag "script". For example: google analytics.',
	) );

	$wp_customize->add_setting( 'gump_scripts', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	 
	$wp_customize->add_control(
	    new gump_Customize_Textarea_Control(
	        $wp_customize,
	        'gump_scripts',
	        array(
	            'label' => 'Custom Scripts',
	            'section' => 'gump_scripts_section',
	            'settings' => 'gump_scripts'
	        )
	    )
	);
}
add_action('customize_register', 'gump_theme_customizer');

/**
 * Customizer Apply Style
 *
 * @since gump 1.0
 */
if ( ! function_exists( 'gump_apply_style' ) ) :
  	
  	function gump_apply_style() {	
		if ( get_theme_mod('gump_css') || 
			 get_theme_mod('gump_body_color') || 
			 get_theme_mod('gump_link_color') || 
			 get_theme_mod('gump_hover_color') || 
			 get_theme_mod('gump_border_color') || 
			 get_theme_mod('gump_sidebar_color') || 
			 get_theme_mod('gump_widget_title_color')	
		) { 
		?>
			<style id="gump-custom-css">
				<?php if ( get_theme_mod('gump_css') ) : ?>
					<?php echo get_theme_mod('gump_css');  ?>;
				<?php endif; ?>
				
				<?php if ( get_theme_mod('gump_body_color') || get_theme_mod('gump_body_font') || get_theme_mod('gump_body_font_size') ) : ?>
					body,
					button,
					input,
					select,
					textarea {
						color: <?php echo get_theme_mod('gump_body_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('gump_link_color') ) : ?>
					a,
					a:visited {
						color: <?php echo get_theme_mod('gump_link_color');  ?>;
					}
				<?php endif; ?>
			
				<?php if ( get_theme_mod('gump_hover_color') ) : ?>
					a:hover,
					a:focus,
					a:active {
						color: <?php echo get_theme_mod('gump_hover_color');  ?>;
					}
				<?php endif; ?>
				
				<?php if ( get_theme_mod('gump_border_color') ) : ?>
					html {
						border: 10px solid <?php echo get_theme_mod('gump_border_color');  ?>;
					}
				<?php endif; ?>
				
				<?php if ( get_theme_mod('gump_sidebar_color') ) : ?>
					.widget-area {
						background-color: <?php echo get_theme_mod('gump_sidebar_color');  ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('gump_widget_title_color') ) : ?>
					.widget-title {
						color: <?php echo get_theme_mod('gump_widget_title_color');  ?>;
					}
				<?php endif; ?>
			</style>
		<?php
    }
}
endif;
add_action( 'wp_head', 'gump_apply_style' );

/**
 * Customizer Footer
 *
 * @since gump 1.0
 */
if ( ! function_exists( 'gump_apply_footer' ) ) :
  	
  	function gump_apply_footer() {	
		if ( get_theme_mod('gump_scripts') ) { 
		?>

		<script id="gump-custom-scriptss">
			<?php if ( get_theme_mod('gump_scripts') ) : ?>
				<?php echo get_theme_mod('gump_scripts');  ?>;
			<?php endif; ?>
		</script>
		<?php
    }
}
endif;
add_action('wp_footer', 'gump_apply_footer');