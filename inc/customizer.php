<?php
/**
 * gump Theme Customizer
 *
 * @package Gump
 * @since Gump 1.0.0
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
 * Customizer CSS
 */
function gump_enqueue_customizer_controls_styles() {

  wp_register_style( 'gump-customizer-controls', get_template_directory_uri() . '/css/customizer-controls.css', NULL, NULL, 'all' );
  wp_enqueue_style( 'gump-customizer-controls' );

  }
add_action( 'customize_controls_print_styles', 'gump_enqueue_customizer_controls_styles' );

/**
 * Data Satinization
 */
// text input
function gump_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Read More Class
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class Gump_Read_More extends WP_Customize_Control {

    	public $type = "pk-read-more";
	
		public function render_content() {
        $read_more = array(
			'discount' => array(
			'link' => esc_url('https://www.pankogut.com/wordpress-themes/gump-pro/?utm_source=customizer_read_more&utm_medium=wordpress_dashboard&utm_campaign=gump_pro'),
			'text' => __('Code ORG50 to get 50% OFF', 'foodylite'),
			),
			'upgrade' => array(
			'link' => esc_url('https://www.pankogut.com/wordpress-themes/gump-pro/?utm_source=customizer_read_more&utm_medium=wordpress_dashboard&utm_campaign=gump_pro'),
			'text' => __('Try Gump Pro', 'gump'),
			),
			'theme' => array(
			'link' => esc_url('http://pankogut.com/wordpress-themes/gump'),
			'text' => __('Theme Homepage', 'gump'),
			),
			'documentation' => array(
			'link' => esc_url('https://www.pankogut.com/docs/gump/?utm_source=customizer_read_more&utm_medium=wordpress_dashboard&utm_campaign=gump_pro'),
			'text' => __('Theme Documentation', 'gump'),
			),
			'rating' => array(
			'link' => esc_url('https://wordpress.org/support/theme/gump/reviews/#new-post'),
			'text' => __('Rate This Theme', 'gump'),
			),
			'twitter' => array(
			'link' => esc_url('https://twitter.com/pankogut'),
			'text' => __('Follow on Twitter', 'gump'),
			)
        );
        foreach ($read_more as $read_more_single) {
        	echo '<p><a class="button" target="_blank" href="' . esc_url( $read_more_single['link'] ). '" >' . esc_html($read_more_single['text']) . ' </a></p>';
        	}
    	}
	}

}

/**
 * Customizer
 *
 * @since Gump 1.0.0
 */
function gump_theme_customizer( $wp_customize ) {
	/*--------------------------------------------------------------
		Read More
	--------------------------------------------------------------*/
	$wp_customize->add_section('read_more_section', array(
		'priority' => 2,
		'title' => __('Read More', 'gump'),
	) );
	
	$wp_customize->add_setting('read_more', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );
	
	$wp_customize->add_control(new gump_Read_More($wp_customize, 'read_more', array(
		'section' => 'read_more_section',
		'settings' => 'read_more',
	) ) );
    
	/*--------------------------------------------------------------
		Colors
	--------------------------------------------------------------*/
	/* Body Font Color */
    $wp_customize->add_setting( 'gump_body_color', array(
        'default' => '#545454',
		'sanitize_callback' => 'sanitize_hex_color',
    ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gump_body_color', array(
		'label' => __( 'Body Font Color', 'gump' ),
		'section' => 'colors',
		'settings' => 'gump_body_color',
	) ) );

	/* Link Color */
    $wp_customize->add_setting( 'gump_link_color', array(
        'default' => '#000000',
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
        'default' => '#000',
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
	    'title'       => __( 'Custom CSS (READ INSIDE)', 'gump' ),
	    'priority'    => 90,
	    'description' => 'Please, in the next update this will be delete because you can use the default Additional CSS of WordPress. Copy and paste your code in that tab right now.',
	) );

	$wp_customize->add_setting( 'gump_css', array(
        'sanitize_callback' => 'gump_sanitize_text',
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
		Google Analytics
	--------------------------------------------------------------*/
	// Google Analytics
    $wp_customize->add_section( 'gump_start_here_analytics' , array(
        'title' => __( 'Google Analytics', 'gump' ),
        'description' => 'Copy and Paste your Google Analytics Code like UA-XXXXXXXX-X',
        'priority' => 90,
    ) );

    // GOOGLE ANALYTICS
    $wp_customize->add_setting( 'gump_start_here_analytics', array(
        'sanitize_callback' => 'sanitize_text_field',
    ) );
     
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'gump_start_here_analytics',
            array(
                'label' => 'Google Analytics Code',
                'priority' => 10,
                'section' => 'gump_start_here_analytics',
                'settings' => 'gump_start_here_analytics'
            )
        )
    );
}
add_action('customize_register', 'gump_theme_customizer');

/**
 * Customizer Apply Style
 *
 * @since Gump 1.0.0
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
						color: <?php echo get_theme_mod('gump_body_color', '#545454'); ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('gump_link_color') ) : ?>
                    .entry-content a,
                    .entry-summary a {
                        color: <?php echo get_theme_mod('gump_link_color', '#000000'); ?>;
                    }
				<?php endif; ?>
			
				<?php if ( get_theme_mod('gump_hover_color') ) : ?>
                    .entry-content a:hover,
                    .entry-content a:focus,
                    .entry-content a:active,
                    .entry-summary a:hover,
                    .entry-summary a:focus,
                    .entry-summary a:active  {
                        color: <?php echo get_theme_mod('gump_hover_color', '#cccccc'); ?>;
                    }
				<?php endif; ?>
				
				<?php if ( get_theme_mod('gump_border_color') ) : ?>
					html {
						border: 10px solid <?php echo get_theme_mod('gump_border_color', '#f0f4f5'); ?>;
					}
				<?php endif; ?>
				
				<?php if ( get_theme_mod('gump_sidebar_color') ) : ?>
					.widget-area {
						background-color: <?php echo get_theme_mod('gump_sidebar_color', '#f0f4f5'); ?>;
					}
				<?php endif; ?>

				<?php if ( get_theme_mod('gump_widget_title_color') ) : ?>
					.widget-title {
						color: <?php echo get_theme_mod('gump_widget_title_color', '#000000'); ?>;
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
 * @since Gump 1.0.0
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