<?php
//Pro Button

function rambo_template_setting_customizer( $wp_customize ) {
    class WP_Template_Settings_Customize_Control extends WP_Customize_Control {
        public $type = 'new_menu';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>
         <h3><?php echo sprintf(__("Want to get control on all the template settings available in the premium version of this theme? <a href='http://webriti.com/rambo' target='_blank'>Upgrade to Pro</a>","rambo")); ?></h3>
        <br>
        <ul class="upsell-feature-list">
            <li><span class="upsell-pro-badge">Pro</span>&nbsp;&nbsp;&nbsp;Create effective about page</li>
            <li><span class="upsell-pro-badge">Pro</span>&nbsp;&nbsp;&nbsp;Contact page template settings</li>
            <li><span class="upsell-pro-badge">Pro</span>&nbsp;&nbsp;&nbsp;Manage blog meta settings</li>
            <li><span class="upsell-pro-badge">Pro</span>&nbsp;&nbsp;&nbsp;Project user friendly URL</li>
            <li><span class="upsell-pro-badge">Pro</span>&nbsp;&nbsp;&nbsp;Manage all the page titles</li>
        </ul>
        
        
        <?php
        }
    }
    $wp_customize->add_section( 'rambo_pro_template_setting_section' , array(
    		'title'      => __('Template Settings', 'rambo'),
    		'priority'   => 611,
       	) );
    
    $wp_customize->add_setting(
        'template_settings',
        array(
            'default' => '',
    		'capability'     => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_text_field',
        )	
    );
    $wp_customize->add_control( new WP_Template_Settings_Customize_Control( $wp_customize, 'template_settings', array(
    		'section' => 'rambo_pro_template_setting_section',
    		'setting' => 'template_settings',
        ))
    );

}
add_action( 'customize_register', 'rambo_template_setting_customizer' );
?>