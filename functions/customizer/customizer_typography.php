<?php
//Pro Button

function rambo_typography_setting_customizer( $wp_customize ) {
    class WP_Typography_Settings_Customize_Control extends WP_Customize_Control {
        public $type = 'new_menu';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>
         <h3><?php echo sprintf(__("Get control on the typography. <a href='http://webriti.com/rambo' target='_blank'>Upgrade to Pro</a>","rambo")); ?></h3>
        <br>
        <ul class="upsell-feature-list">
            <li><span class="upsell-pro-badge">Pro</span>&nbsp;&nbsp;&nbsp;Menu typography</li>
            <li><span class="upsell-pro-badge">Pro</span>&nbsp;&nbsp;&nbsp;Post / Page title</li>
            <li><span class="upsell-pro-badge">Pro</span>&nbsp;&nbsp;&nbsp;Paragraph and widget title</li>
            <li><span class="upsell-pro-badge">Pro</span>&nbsp;&nbsp;&nbsp;Portfolio and service title</li>
            <li><span class="upsell-pro-badge">Pro</span>&nbsp;&nbsp;&nbsp;CTA title and button</li>
        </ul>
        
        
        <?php
        }
    }
    $wp_customize->add_section( 'rambo_pro_typography_setting_section' , array(
    		'title'      => __('Typography settings', 'rambo'),
    		'priority'   => 612,
       	) );
    
    $wp_customize->add_setting(
        'typography_settings',
        array(
            'default' => '',
    		'capability'     => 'edit_theme_options',
    		'sanitize_callback' => 'sanitize_text_field',
        )	
    );
    $wp_customize->add_control( new WP_Typography_Settings_Customize_Control( $wp_customize, 'typography_settings', array(
    		'section' => 'rambo_pro_typography_setting_section',
    		'setting' => 'typography_settings',
        ))
    );

}
add_action( 'customize_register', 'rambo_typography_setting_customizer' );
?>