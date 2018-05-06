<?php
/**
* Require of functions and files for the theme
*
*/


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/etc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/etc/template-tags.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/agensy-functions.php';

/**
 * Header hoooks
 */
require get_template_directory() . '/inc/hooks/header.php';

/**
* Footer hooks
*/
require get_template_directory() . '/inc/hooks/footer.php';


/**
 * Customizer functions.
 */
require get_template_directory() . '/inc/customizer/customizer-class.php';

/**
 * Implement the Section About Page
 */
require get_template_directory() . '/inc/home-section/section-about.php';

/**
 * Implement the FAW Section  Page
 */
require get_template_directory() . '/inc/home-section/section-faq.php';

/**
 * Implement the Features Section Page
 */
require get_template_directory() . '/inc/home-section/section-features.php';

/**
 * Implement the Service Section Page
 */
require get_template_directory() . '/inc/home-section/section-service.php';

/**
 * Implement the team widget
 **/
require get_template_directory() . '/inc/widgets/agensy-widget.php';
require get_template_directory() . '/inc/widgets/agensy-team.php';
require get_template_directory() . '/inc/home-section/section-team.php';

/**
 * Implement the Team Section Page
 */
require get_template_directory() . '/inc/home-section/section-counter.php';

/**
 * Implement the Blog Section Page
 */
require get_template_directory() . '/inc/home-section/section-blog.php';

/**
 * Implement the Logo  Section Page
 */
require get_template_directory() . '/inc/home-section/section-logo.php';

/**
 * Implement the Agensy Recent Post Widgets
 */
require get_template_directory() . '/inc/widgets/agensy-recent-posts.php';

/**
 * Agensy Map Widgets
 */
require get_template_directory() . '/inc/widgets/agensy-map.php';
/**
 * Agensy Info Widgets
 */
require get_template_directory() . '/inc/widgets/agensy-info.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/etc/jetpack.php';
}

require get_template_directory() . '/inc/etc/dynamic-css.php';

require get_template_directory() . '/inc/customizer/repeater-controller/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';