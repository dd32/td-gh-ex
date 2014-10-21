<?php 
/**
 * blogghiamo functions and dynamic template
 *
 * @package blogghiamo
 */
 
 /**
 * Delete font size style from tag cloud widget
 */
function blogghiamo_fix_tag_cloud($tag_string){
   return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
}
add_filter('wp_generate_tag_cloud', 'blogghiamo_fix_tag_cloud',10,3);

/**
 * Replace more Excerpt
 */
function blogghiamo_new_excerpt_more($more) {
       global $post;
	return ' ...';
}
add_filter('excerpt_more', 'blogghiamo_new_excerpt_more');

 /**
 * Register All Colors and Section
 */
function blogghiamo_color_primary_register( $wp_customize ) {
	$colors = array();
	
	$colors[] = array(
	'slug'=>'text_color_first', 
	'default' => '#404040',
	'label' => __('Text Color', 'blogghiamo')
	);
	
	$colors[] = array(
	'slug'=>'box_color_second', 
	'default' => '#ffffff',
	'label' => __('Box Color', 'blogghiamo')
	);
	
	$colors[] = array(
	'slug'=>'special_color_third', 
	'default' => '#f7c322',
	'label' => __('Special Color', 'blogghiamo')
	);
	
	foreach( $colors as $color ) {
	// SETTINGS
	$wp_customize->add_setting(
		$color['slug'], array(
			'default' => $color['default'],
			'type' => 'option', 
			'sanitize_callback' => 'sanitize_hex_color',
			'capability' => 'edit_theme_options'
		)
	);
	// CONTROLS
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'], 
			array('label' => $color['label'], 
			'section' => 'colors',
			'settings' => $color['slug'])
		)
	);
	}
	
}
add_action( 'customize_register', 'blogghiamo_color_primary_register' );

/**
 * Add Custom CSS to Header 
 */
function blogghiamo_custom_css_styles() { 
	$text_color_first = get_option('text_color_first');
	$box_color_second = get_option('box_color_second');
	$special_color_third = get_option('special_color_third');
?>

<style type="text/css">
	<?php if (!empty($text_color_first) && $text_color_first != '#404040' ) : ?>
	body,
	button,
	input,
	select,
	textarea,
	a {
		color: <?php echo $text_color_first; ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($box_color_second) && $box_color_second != '#ffffff' ) : ?>
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.main-navigation ul li .indicator,
	.main-navigation a,
	.main-navigation a:hover,
	.menu-toggle:hover,
	.post-navigation .meta-nav,
	.widget-title,
	.edit-link a, .tagcloud a,
	.theShareSpace,
	.theShareButton a,
	.theShareButton a:hover,
	#comments .reply a {
		color: <?php echo $box_color_second; ?>;
	}
	.theTop, footer.site-footer, .hentry, .widget, .comments-area, #toTop, .paging-navigation .nav-links a, .page-header,
	.crestaPostStripeInner,
	.page-content,
	.entry-content,
	.entry-summary {
		background: <?php echo $box_color_second; ?>;
	}
	.site-title {
		text-shadow: 4px 3px 0px <?php echo $box_color_second; ?>, 9px 8px 0px rgba(0, 0, 0, 0.1);
	}
	<?php endif; ?>
	
	<?php if (!empty($special_color_third) && $special_color_third != '#f7c322' ) : ?>
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.main-navigation,
	.main-navigation ul ul,
	.post-navigation .meta-nav,
	.widget-title,
	.edit-link a, .tagcloud a,
	.theShareSpace,
	#comments .reply {
		background: <?php echo $special_color_third; ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	a:hover,
	a:focus,
	a:active,
	.post-navigation .meta-nav:hover,
	.top-search.active,
	.edit-link a:hover, .tagcloud a:hover,
	.page-links a span {
		color: <?php echo $special_color_third; ?>;
	}
	blockquote {
		border-left: 5px solid <?php echo $special_color_third; ?>;
		border-right: 2px solid <?php echo $special_color_third; ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	textarea:focus,
	.post-navigation .meta-nav:hover,
	#wp-calendar tbody td#today,
	.edit-link a:hover, .tagcloud a:hover	{
		border: 1px solid <?php echo $special_color_third; ?>;
	}
	.widget-title:before, .theShareSpace:before {
		border-top: 1.5em solid <?php echo $special_color_third; ?>;
	}
	<?php endif; ?>
	
</style>
    <?php
}
add_action('wp_head', 'blogghiamo_custom_css_styles');