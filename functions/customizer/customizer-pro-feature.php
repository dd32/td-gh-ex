<?php //Pro Details
function elitepress_pro_feature_customizer( $wp_customize ) {
class WP_Pro__Feature_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <div class="elitepress-pro-features-customizer">
    <ul class="elitepress-pro-features">
        <li>
            <span class="elitepress-pro-label"><?php _e( 'PRO','elitepress' ); ?></span>
            <?php _e( 'Header Layout Variations','elitepress' ); ?>
        </li>
        <li>
            <span class="elitepress-pro-label"><?php _e( 'PRO','elitepress' ); ?></span>
            <?php _e( 'Advanced Theme Style Settings','elitepress' ); ?>
        </li>
        <li>
            <span class="elitepress-pro-label"><?php _e( 'PRO','elitepress' ); ?></span>
            <?php _e( 'Multiple Page Templates','elitepress' ); ?>
        </li>   
        <li>
            <span class="elitepress-pro-label"><?php _e( 'PRO','elitepress' ); ?></span>
            <?php _e( 'Portfolio Management','elitepress' ); ?>
        </li>
        <li>
            <span class="elitepress-pro-label"><?php _e( 'PRO','elitepress' ); ?></span>
            <?php _e( 'Testimonial Section','elitepress' ); ?>
        </li>
        <li>
            <span class="elitepress-pro-label"><?php _e( 'PRO','elitepress' ); ?></span>
            <?php _e( 'Client Section','elitepress' ); ?>
        </li>      
        <li>
            <span class="elitepress-pro-label"><?php _e( 'PRO','elitepress' ); ?></span>
            <?php _e( 'Manage Contact Details','elitepress' ); ?>
        </li>
        <li>
            <span class="elitepress-pro-label"><?php _e( 'PRO','elitepress' ); ?></span>
            <?php _e( 'Section Reordering','elitepress' ); ?>
        </li>
        <li>
            <span class="elitepress-pro-label"><?php _e( 'PRO','elitepress' ); ?></span>
            <?php _e( 'Support for WPML / Polylang','elitepress' ); ?>
        </li>
        <li>
            <span class="elitepress-pro-label"><?php _e( 'PRO','elitepress' ); ?></span>
            <?php _e( 'Google Map','elitepress' ); ?>
        </li>
        <li>
            <span class="elitepress-pro-label"><?php _e( 'PRO','elitepress' ); ?></span>
            <?php _e( 'Quality Support','elitepress' ); ?>
        </li>
    </ul>
    <a target="_blank" href="<?php echo 'http://webriti.com/elitepress/';?>" class="elitepress-pro-button button-primary"><?php _e( 'UPGRADE TO PRO','elitepress' ); ?></a>
    <hr>
</div>
    <?php
    }
}
$wp_customize->add_section( 'elitepress_pro_feature_section' , array(
		'title'      => __('View PRO Details', 'elitepress'),
		'priority'   => 1,
   	) );

$wp_customize->add_setting(
    'upgrade_pro_feature',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Pro__Feature_Customize_Control( $wp_customize, 'upgrade_pro_feature', array(
		'section' => 'elitepress_pro_feature_section',
		'setting' => 'upgrade_pro_feature',
    ))
);
class WP_Feature_document_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
   
     <div class="elitepress-pro-content">
        <ul class="elitepress-pro-des">
                
                <li> <?php _e('You will enjoy more frontpage sections along with their settings.','elitepress');?></li>
                
                <li> <?php _e('Theme comes with multiple page settings like about us, service etc.','elitepress');?> </li>
                
                <li> <?php _e('Portfolio section, templates , archives with 3 possible layouts.','elitepress');?></li>
                <li> <?php _e('Theme comes with a beautifully designed section where you can manage your contact details.','elitepress');?></li>
                <li> <?php _e('Show all your clients, testimonials on front page.','elitepress');?></li>
                <li> <?php _e('Drag and drop panels to change the order of sections.','elitepress');?></li>
                <li> <?php _e('Various color schemes , you can even create yours.','elitepress');?></li>
                <li> <?php _e('Translation ready supporting popular plugins WPML / Polylang.','elitepress');?></li>
                <li> <?php _e('Support for google map 24/7 professional support.','elitepress');?></li>
                <li> <?php _e('Dedicated support, various widget and sidebar management.','elitepress');?></li>
                
            </ul>
     </div>
    <?php
    }
}

$wp_customize->add_setting(
    'doc_Review_feature',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Feature_document_Customize_Control( $wp_customize, 'doc_Review_feature', array(	
		'section' => 'elitepress_pro_feature_section',
		'setting' => 'doc_Review_feature',
    ))
);

}
add_action( 'customize_register', 'elitepress_pro_feature_customizer' );
?>