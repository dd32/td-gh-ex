<?php

add_action( 'elementor/widgets/widgets_registered', 'best_charity_register_elementor_widgets' );
function best_charity_register_elementor_widgets() {
	
	if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {	
		require_once( get_template_directory() . '/elementor-widget/widgets/banner.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/top-service.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/discover.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/about.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/cfund.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/services.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/numbering.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/blog.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/testimonial.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/query.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/partners.php' );
		require_once( get_template_directory() . '/elementor-widget/widgets/newsletter.php' );

 	}
}

add_action( 'elementor/init', function() {
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'best_charity',
		[
			'title' => __( 'Best Charity', 'best-charity' ),
			'icon' => 'fa fa-plug', //default icon
		],
		1 // position
	);
});