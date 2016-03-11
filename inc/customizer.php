<?php
if ( class_exists( 'WP_Customize_Control' ) ) {
	class ABC_Description_Control extends WP_Customize_Control {
		public function render_content() {
			echo $this->description;
		}
	}

	class ABC_Layout_Control extends WP_Customize_Control {
	    public function render_content() {
			if ( empty( $this->choices ) )
				return;

			$name = '_customize-radio-' . $this->id;

			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php
			foreach ( $this->choices as $value => $label ) :
				?>
				<label>
					<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
					<?php echo '<div class="' . esc_attr( $value ) . '"></div>'; ?>
				</label>
				<?php
			endforeach;
	    }
	}

	class ABC_Reset_Control extends WP_Customize_Control {
		public function render_content() {
			echo '<p class="customizer-section-intro">' . $this->description . '</p>';

			echo '<button type="button" class="button" id="abc-reset-theme-options">' . __( 'Reset', 'abacus' ) . '</button>';
		}
	}
}

class ABC_Customizer {
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'customize_register', array( $this, 'customize_register' ), 99 );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_controls_enqueue_scripts' ) );
	}

	static public function init() {
    	if ( current_user_can( 'edit_theme_options' ) ) {
	        if ( isset( $_REQUEST['abc-reset'] ) ) {
		    	if ( ! wp_verify_nonce( $_REQUEST['abc-reset'], 'abc-customizer' ) ) {
		        	return;
		        }

				remove_theme_mods();
				wp_redirect( esc_url( admin_url( 'customize.php' ) ) );
            }
    	}
    }

	public function customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'site_icon' )->transport = 'refresh';
		$wp_customize->remove_section( 'background_image' );

		## Posts section
		$wp_customize->add_section( 'abc_posts', array(
			'title' => __( 'Posts', 'abacus' ),
			'priority' => 22,
		) );
		// setting
		$wp_customize->add_setting( 'read_more_text', array(
			'default' => 'Continue reading',
			'sanitize_callback' => 'abc_sanitize_text',
		) );
		// control
		$wp_customize->add_control( 'read_more_text', array(
			'label'    => __( 'Read More text', 'abacus' ),
			'section'  => 'abc_posts',
			'priority' => 2,
			'type'     => 'text'
		) );
		// setting
		/*$wp_customize->add_setting( 'posts_default', array(
			'sanitize_callback' => 'absint',
		) );
		// control
		$wp_customize->add_control( new ABC_Description_Control(
			$wp_customize, 'posts_default', array(
				'section' => 'abc_posts',
				'priority' => 3,
				'description' => apply_filters( 'abc_posts_section_description', sprintf( __( 'Activate the <a target="_blank" href="%s">ABC Post Layouts</a> plugin to add more post options.', 'abacus' ), 'https://alphabetthemes.com/downloads/abc-post-layouts/' ) ),
			)
		) );*/

		## Reset section
		$wp_customize->add_section( 'abc_reset', array(
			'title' => __( 'Reset', 'abacus' ),
			'priority' => 999,
		) );
		// setting
		$wp_customize->add_setting( 'reset_theme_options', array(
			'sanitize_callback' => 'absint',
		) );
		// control
		$wp_customize->add_control( new ABC_Reset_Control(
			$wp_customize, 'reset_theme_options', array(
				'section' => 'abc_reset',
				'priority' => 1,
				'description' => __( 'Click on the button below to reset all theme options back to default.', 'abacus' ),
			)
		) );

		######################
		## 	Premium options	##
		######################

		// setting
		$wp_customize->add_setting( 'colors_default', array(
			'sanitize_callback' => 'absint',
		) );
		// control
		$wp_customize->add_control( new ABC_Description_Control(
			$wp_customize, 'colors_default', array(
				'section' => 'colors',
				'priority' => 1,
				'description' => apply_filters( 'abc_colors_section_description', sprintf( __( 'Activate the <a target="_blank" href="%s">ABC Custom Colors</a> plugin to open more color options.', 'abacus' ), 'https://alphabetthemes.com/downloads/abc-custom-colors/' ) ),
			)
		) );

		## Fonts section
		$wp_customize->add_section( 'abc_fonts', array(
			'title' => __( 'Fonts', 'abacus' ),
			'priority' => 40,
		) );
		// setting
		$wp_customize->add_setting( 'fonts_default', array(
			'sanitize_callback' => 'absint',
		) );
		// control
		$wp_customize->add_control( new ABC_Description_Control(
			$wp_customize, 'fonts_default', array(
				'section' => 'abc_fonts',
				'priority' => 1,
				'description' => apply_filters( 'abc_fonts_section_description', sprintf( __( 'Activate the <a target="_blank" href="%s">ABC Fonts Manager</a> plugin to open all the font options.', 'abacus' ), 'https://alphabetthemes.com/downloads/abc-fonts-manager/' ) ),
			)
		) );

		## Footer section
		$wp_customize->add_section( 'abc_footer', array(
			'title' => __( 'Footer', 'abacus' ),
			'priority' => 990,
		) );
		// setting
		$wp_customize->add_setting( 'footer_default', array(
			'sanitize_callback' => 'absint',
		) );
		// control
		$wp_customize->add_control( new ABC_Description_Control(
			$wp_customize, 'footer_default', array(
				'section' => 'abc_footer',
				'priority' => 1,
				'description' => apply_filters( 'abc_footer_section_description', sprintf( __( 'Activate the <a target="_blank" href="%s">ABC Footer</a> plugin to add footer options.', 'abacus' ), 'https://alphabetthemes.com/downloads/abc-footer/' ) ),
			)
		) );
	}

    public function sanitize_checkbox( $value ) {
        if ( 'on' != $value )
            $value = false;

        return $value;
    }

	public function customize_controls_enqueue_scripts() {
		wp_enqueue_script( 'abc-customizer', ABC_THEME_URL . '/js/admin/customizer.js', array( 'jquery' ), '', true );
        wp_localize_script( 'abc-customizer', 'ABC_Customizer', array(
            'customizerURL' => admin_url( 'customize.php' ),
            'exportNonce' => wp_create_nonce( 'abc-customizer' ),
            'upgradeAd' => __( 'Unlock Premium Theme Options', 'abacus' ),
            'confirmText' => __( 'Are you sure?', 'abacus' ),
        ));

		wp_enqueue_style( 'abc-customizer-styles', ABC_THEME_URL . '/css/admin/customizer.css' );

		$css_selectors = array(
			apply_filters( 'abc_footer_section_css', '#accordion-section-abc_footer' ),
			apply_filters( 'abc_colors_section_css', '#accordion-section-colors' ),
			apply_filters( 'abc_fonts_section_css', '#accordion-section-abc_fonts' ),
			apply_filters( 'abc_posts_section_css', '' ),
		);

		$background_css_selectors = $content_css_selectors = '';
		foreach ( $css_selectors as $css_selector ) {
			if ( $css_selector ) {
				$background_css_selectors .= $css_selector . ' > .accordion-section-title,' . $css_selector . ' > .accordion-section-title:hover,';
				$content_css_selectors .= $css_selector . ' > .accordion-section-title:after,' . $css_selector . ' > .accordion-section-title:hover:after,';
			}
		}

		wp_add_inline_style( 'abc-customizer-styles',
rtrim( $background_css_selectors, ',' ) . ' {
  background-image: url("' . ABC_THEME_URL . '/images/gray-lines.png");
  background-size: 100%;
}' . "\n" .
rtrim( $content_css_selectors, ',' ) . '{
  content: "\f160";
}
		' );
	}
}
$abc_customizer = new ABC_Customizer;

function abc_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}