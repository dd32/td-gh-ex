<?php
/**
* Customize Stylesheet
*
* @since 1.0
*/
add_action( 'customize_controls_print_styles', 'customize_styles_agama_blue_support' );
function customize_styles_agama_blue_support() { ?>
<style type="text/css">
#customize-theme-controls #accordion-section-agama_support_section .accordion-section-title,
#customize-theme-controls #accordion-panel-agama_theme_options > .accordion-section-title {
	background-color: rgba(0, 164, 208, 0.9) !important;
}
#accordion-section-agama_slider_section .accordion-section-content,
#accordion-section-agama_typography_section .accordion-section-content,
#accordion-section-agama_share_icons_section .accordion-section-content,
#accordion-section-agama_woocommerce_section .accordion-section-content,
#accordion-section-agama_lightbox_section .accordion-section-content,
#accordion-section-agama_body_background_animated_section .accordion-section-content,
#accordion-section-agama_contact_section .accordion-section-content {
	background-color: #00a4d0 !important;
}
#accordion-section-agama_body_background_animated_section h3:before,
#accordion-section-agama_slider_section h3:before,
#accordion-section-agama_typography_section h3:before,
#accordion-section-agama_share_icons_section h3:before,
#accordion-section-agama_woocommerce_section h3:before,
#accordion-section-agama_lightbox_section h3:before,
#accordion-section-agama_contact_section h3:before {
	color: #00a4d0 !important;
}
</style>
<?php } ?>