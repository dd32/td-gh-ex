<?php
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */

function premium_customizer( $wp_customize ) {
    
    
    	/***** Register Custom Controls *****/

	class araiz_Customize_Header_Control extends WP_Customize_Control {
        public function render_content() { ?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span> <?php
        }
    }

	class araiz_Customize_Text_Control extends WP_Customize_Control {
        public function render_content() { ?>
			<span class="textfield"><?php echo esc_html($this->label); ?></span> <?php
        }
    }

    class araiz_Customize_Button_Control extends WP_Customize_Control {
        public function render_content() {  ?>
			<p>
				<a href="<?php echo esc_url('http://lodse.com/araiz-wordpress-blog-theme/#premium'); ?>" target="_blank" class="button button-secondary"><?php echo esc_html($this->label); ?></a>
			</p> <?php
        }
    }
     	$wp_customize->add_section('araiz_general', array('title' => __('Theme Options', 'araiz-corporate-basic'), 'priority' => 1));
	$wp_customize->add_section('araiz_upgrade', array('title' => __('Upgrade to Premium', 'araiz-corporate-basic'), 'priority' => 999));

     
    $wp_customize->add_setting('araizc_options[premium_version_label]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));
	$wp_customize->add_setting('araizc_options[premium_version_text]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));
	$wp_customize->add_setting('araizc_options[premium_version_button]', array('default' => '', 'type' => 'option', 'sanitize_callback' => 'esc_attr'));

    
    
    $wp_customize->add_control(new araiz_Customize_Header_Control($wp_customize, 'premium_version_label', array('label' => __('Need more features and options?', 'araiz-corporate-basic'), 'section' => 'araiz_upgrade', 'settings' => 'araizc_options[premium_version_label]', 'priority' => 1)));
	$wp_customize->add_control(new araiz_Customize_Text_Control($wp_customize, 'premium_version_text', array('label' => __('Check out the Premium Version of this theme which comes with additional features and advanced customization options for your website.', 'araiz-corporate-basic'), 'section' => 'araiz_upgrade', 'settings' => 'araizc_options[premium_version_text]', 'priority' => 2)));
	$wp_customize->add_control(new araiz_Customize_Button_Control($wp_customize, 'premium_version_button', array('label' => __('Learn more about the Premium Version', 'araiz-corporate-basic'), 'section' => 'araiz_upgrade', 'settings' => 'araizc_options[premium_version_button]', 'priority' => 3)));
        
}
add_action( 'customize_register', 'premium_customizer' );