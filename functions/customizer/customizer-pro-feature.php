<?php //Pro Details
function spasalon_pro_feature_customizer( $wp_customize ) {
class WP_Pro__Feature_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <div class="spasalon-pro-features-customizer">
    <ul class="spasalon-pro-features">
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Advance Theme Style Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Page Banner Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Slider Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Product Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Testimonial Section','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Latest News Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Team Section','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Gallery Section','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Client Section','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Callout Section','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Additional Section Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'About us Page Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Service Page Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Contact Page Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Section Reordering','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Typography Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'SEO Friendly URL Settings','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Support for WPML / Polylang','spasalon' ); ?>
        </li>
        <li>
            <span class="spasalon-pro-label"><?php _e( 'PRO','spasalon' ); ?></span>
            <?php _e( 'Quality Support','spasalon' ); ?>
        </li>
    </ul>
    <a target="_blank" href="<?php echo 'https://webriti.com/spasalon/';?>" class="spasalon-pro-button button-primary"><?php _e( 'UPGRADE TO PRO','spasalon' ); ?></a>
    <hr>
</div>
    <?php
    }
}
$wp_customize->add_section( 'spasalon_pro_feature_section' , array(
		'title'      => __('View PRO Details', 'spasalon'),
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
		'section' => 'spasalon_pro_feature_section',
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
   
     <div class="spasalon-pro-content">
        <ul class="spasalon-pro-des">
            <li> 
                <?php _e('Select among predefined color skins, you can even create yours without writing any CSS code.','spasalon');?>
            </li>
            <li> 
                <?php _e('Using page banner settings manage page banner content and enable/disable page banner.','spasalon');?>
            </li>
            <li> 
                <?php _e('Pro version theme comes with add multiple slides in slider and you can select the slider enable / disable option, manage slider caption color etc.','spasalon');?>
            </li>
            <li> 
                <?php _e('Add multiple products and you can show product by category, etc.','spasalon');?>
            </li>
            <li> 
                <?php _e('Add multiple testimonials, show all your testimonials on the frontpage, change background of testimonial section, etc.','spasalon');?>
            </li>
            <li> 
                <?php _e('In Pro version you can show the latest news by category.','spasalon');?>
            </li>
            <li> 
                <?php _e('Show all your team members, gallery, clients and callout details on the frontpage.','spasalon');?>
            </li>
            <li> 
                <?php _e('Pro version comes with additional settings section, you can add content using widgets in this section.','spasalon');?>
            </li>
            <li> 
                <?php _e('Theme comes with about-us page, service page and contact page settings.','spasalon');?>
            </li>
            <li> 
                <?php _e('Theme Layout manager will helps you to rearrange the sections.','spasalon');?>
            </li>
            <li> 
                <?php _e('Typography will helps you to manage custom fonts like paragraph font, menu font etc.','spasalon');?>
            </li>
            <li> 
                <?php _e('You can change the URL slug using SEO friendly URL settings','spasalon');?>
            </li>
            <li> 
                <?php _e('Translation ready supporting popular plugins WPML / Polylang.','spasalon');?>
            </li>
            <li> 
                <?php _e('Dedicated support, various widget and sidebar management.','spasalon');?>
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
		'section' => 'spasalon_pro_feature_section',
		'setting' => 'doc_Review_feature',
    ))
);

}
add_action( 'customize_register', 'spasalon_pro_feature_customizer' );
?>