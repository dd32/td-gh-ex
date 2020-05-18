<?php
function arowana_premium_setting( $wp_customize ) {
	
	$wp_customize->add_section(
        'upgrade_premium',
        array(
            'title' 		=> __('Upgrade to Pro','arowana'),
		)
    );
	
	/*=========================================
	Add Buttons
	=========================================*/
	
	class Arowana_WP_Buttons_Customize_Control extends WP_Customize_Control {
	public $type = 'upgrade_premium';

	   function render_content() {
		?>
			<div class="premium_info">
				<ul>
					<li><a class="documentation" href="http://help.nayrathemes.com/category/free-themes/startkit-free/" target="_blank"><i class="dashicons dashicons-visibility"></i><?php _e( 'View Documentation','arowana' ); ?> </a></li>
					
					<li><a class="support" href="https://nayrathemes.ticksy.com/" target="_blank"><i class="dashicons dashicons-lightbulb"></i><?php _e( 'Get Support','arowana' ); ?> </a></li>
					
					<li><a class="free-pro" href="https://www.nayrathemes.com/arowana-pro/#pt-freevspro" target="_blank"><i class="dashicons dashicons-visibility"></i><?php _e( 'Free Vs Pro','arowana' ); ?> </a></li>
					
					<li><a class="upgrade-to-pro" href="https://www.nayrathemes.com/arowana-pro/" target="_blank"><i class="dashicons dashicons-update-alt"></i><?php _e( 'Upgrade to Pro','arowana' ); ?> </a></li>
					
					<li><a class="show-love" href="https://wordpress.org/support/theme/arowana/reviews/#new-post" target="_blank"><i class="dashicons dashicons-smiley"></i><?php _e( 'Show Some Love','arowana' ); ?> </a></li>
				</ul>
			</div>
		<?php
	   }
	}
	
	$wp_customize->add_setting(
		'premium_info_buttons',
		array(
		   'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'startkit_sanitize_text',
		)	
	);
	
	$wp_customize->add_control( new Arowana_WP_Buttons_Customize_Control( $wp_customize, 'premium_info_buttons', array(
		'section' => 'upgrade_premium',
		'setting' => 'premium_info_buttons',
    ))
);
}
add_action( 'customize_register', 'arowana_premium_setting',999 );
?>