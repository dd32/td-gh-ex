<?php //Pro Details
function corpbiz_pro_feature_customizer( $wp_customize ) {
class WP_Pro__Feature_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <div class="corpbiz-pro-features-customizer">
    <ul class="corpbiz-pro-features">
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Advance Theme Style Settings','corpbiz' ); ?>
        </li>
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Slider Settings','corpbiz' ); ?>
        </li>
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Create unlimited Services','corpbiz' ); ?>
        </li>
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Project Slider Settings','corpbiz' ); ?>
        </li>
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Portfolio Management','corpbiz' ); ?>
        </li>
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Client Section','corpbiz' ); ?>
        </li>
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Theme Support Section','corpbiz' ); ?>
        </li>
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Footer Callout Settings','corpbiz' ); ?>
        </li>
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Typography settings','corpbiz' ); ?>
        </li>
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Taxonomy Archive Portfolio Settings','corpbiz' ); ?>
        </li>
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Template Settings','corpbiz' ); ?>
        </li>
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Section Reordering','corpbiz' ); ?>
        </li>
        <li>
            <span class="corpbiz-pro-label"><?php _e( 'PRO','corpbiz' ); ?></span>
            <?php _e( 'Quality Support','corpbiz' ); ?>
        </li>
    </ul>
    <a target="_blank" href="<?php echo 'https://webriti.com/corpbiz/';?>" class="corpbiz-pro-button button-primary"><?php _e( 'UPGRADE TO PRO','corpbiz' ); ?></a>
    <hr>
</div>
    <?php
    }
}
$wp_customize->add_section( 'corpbiz_pro_feature_section' , array(
		'title'      => __('View PRO Details', 'corpbiz'),
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
		'section' => 'corpbiz_pro_feature_section',
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
   
     <div class="corpbiz-pro-content">
        <ul class="corpbiz-pro-des">
            <li> 
                <?php _e('Select among predefined color skins, you can even create yours without writing any CSS code.','corpbiz');?>
            </li>
            <li> 
                <?php _e('Pro version theme comes with add multiple slides in slider and you can select the slider enable / disable option, slider animation etc.','corpbiz');?>
            </li>
            <li> 
                <?php _e('Add as many services you like. You can even display all the services on a separate page and manage the how many services shown on frontpage.','corpbiz');?>
            </li>
            <li> 
                <?php _e('Show all your projects details in slider format on the frontpage','corpbiz');?>
            </li>
            <li> 
                <?php _e('Portfolio section, templates , archives with 3 possible layouts.','corpbiz');?>
            </li>
            <li> 
                <?php _e('Show all your clients and manage number of clients showing on the frontpage.','corpbiz');?>
            </li>
            <li> 
                <?php _e('Pro version theme comes with Theme Support Section.','corpbiz');?>
            </li>
            <li> 
                <?php _e('In footer callout settings you can manage the title. description and button text.','corpbiz');?>
            </li>
            <li> 
                <?php _e('Typography will helps you to manage custom fonts like paragraph font, menu font etc.','corpbiz');?>
            </li>
            <li> 
                <?php _e('Manage the portfolio category page layout like 2c/3c/4c using taxonomy archive portfolio settings','corpbiz');?>
            </li>
            <li> 
                <?php _e('Theme comes with multiple page settings like about us, service, etc.','corpbiz');?>
            </li>
            <li> 
                <?php _e('Theme Layout manager will helps you to rearrange the sections.','corpbiz');?>
            </li>
            <li> 
                <?php _e('Dedicated support, various widget and sidebar management.','corpbiz');?>
            </li>
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
		'section' => 'corpbiz_pro_feature_section',
		'setting' => 'doc_Review_feature',
    ))
);

}
add_action( 'customize_register', 'corpbiz_pro_feature_customizer' );
?>