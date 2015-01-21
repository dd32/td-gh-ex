<?php 
/**
 * zenzero functions and dynamic template
 *
 * @package zenzero
 */

/**
 * Replace more Excerpt
 */
function zenzero_new_excerpt_more($more) {
       global $post;
	return ' ...';
}
add_filter('excerpt_more', 'zenzero_new_excerpt_more');

/**
 * Delete font size style from tag cloud widget
 */
function zenzero_fix_tag_cloud($tag_string){
   return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
}
add_filter('wp_generate_tag_cloud', 'zenzero_fix_tag_cloud',10,3);

 /**
 * Register All Colors and Section
 */
function zenzero_color_primary_register( $wp_customize ) {
	$colors = array();
	
	$colors[] = array(
	'slug'=>'text_color_first', 
	'default' => '#919191',
	'label' => __('Box Text Color', 'zenzero')
	);
	
	$colors[] = array(
	'slug'=>'box_color_second', 
	'default' => '#ffffff',
	'label' => __('Box Background Color', 'zenzero')
	);
	
	$colors[] = array(
	'slug'=>'special_color_third', 
	'default' => '#292929',
	'label' => __('Header / Footer / Sidebar Background Color', 'zenzero')
	);
	
	$colors[] = array(
	'slug'=>'special_color_fourth', 
	'default' => '#727272',
	'label' => __('Header / Footer / Sidebar Text Color', 'zenzero')
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
add_action( 'customize_register', 'zenzero_color_primary_register' );

/**
 * Add Custom CSS to Header 
 */
function zenzero_custom_css_styles() { 
	$text_color_first = get_option('text_color_first');
	$box_color_second = get_option('box_color_second');
	$special_color_third = get_option('special_color_third');
	$special_box_color_fourth = get_option('special_color_fourth');
?>

<style type="text/css">
	<?php if (!empty($text_color_first) && $text_color_first != '#919191' ) : ?>
	body,
	button,
	input,
	select,
	textarea {
		color: <?php echo esc_attr($text_color_first); ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($box_color_second) && $box_color_second != '#ffffff' ) : ?>
	<?php list($r, $g, $b) = sscanf($box_color_second, '#%02x%02x%02x'); ?>
	#search-full {
		background: rgba(<?php echo esc_attr($r).', '.esc_attr($g).', '.esc_attr($b); ?>, 0.9);
	}
	
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.main-navigation ul:not(.sub-menu) > li > a:hover::before,
	.main-navigation ul:not(.sub-menu) > li > a:focus::before,
	.main-navigation ul li:hover > a, 
	.main-navigation li.current-menu-item > a, 
	.main-navigation li.current-menu-parent > a, 
	.main-navigation li.current-page-ancestor > a, 
	.main-navigation .current_page_item > a, 
	.main-navigation ul > li:hover .indicator,
	.main-navigation li.current-menu-parent .indicator, 
	.main-navigation li.current-menu-item .indicator,
	.paging-navigation .nav-links a, 
	.comment-navigation a,
	#toTop:hover, 
	.showSide:hover, 
	.showSearch:hover,
	.site-social i.fa-rss:hover,
	.page-links span a,
	.entry-footer a,
	.widget-title	{
		color: <?php echo esc_attr($box_color_second); ?>;
	}
	.site-branding a, 
	.site-branding a:hover,
	.menu-toggle, 
	.menu-toggle:hover {
		color: <?php echo esc_attr($box_color_second); ?> !important;
	}
	.paging-navigation .nav-links a:hover,
	.comment-navigation a:hover,
	#page	{
		background: <?php echo esc_attr($box_color_second); ?>;
	}
	.main-navigation ul:not(.sub-menu) > li > a:hover::before,
	.main-navigation ul:not(.sub-menu) > li > a:focus::before {
		text-shadow: 8px 0 <?php echo esc_attr($box_color_second); ?>, -8px 0px <?php echo esc_attr($box_color_second); ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($special_color_third) && $special_color_third != '#292929' ) : ?>
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.main-navigation ul ul,
	.paging-navigation .nav-links a,
	.comment-navigation a,
	.site-header,
	.site-footer,
	#secondary,
	.showSide, 
	.showSearch,
	#toTop,
	.page-links span a,
	.entry-footer a	{
		background: <?php echo esc_attr($special_color_third); ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	button:focus,
	input[type="button"]:focus,
	input[type="reset"]:focus,
	input[type="submit"]:focus,
	button:active,
	input[type="button"]:active,
	input[type="reset"]:active,
	input[type="submit"]:active,
	a,
	a:hover,
	a:focus,
	a:active,
	.paging-navigation .nav-links a:hover, 
	.comment-navigation a:hover,
	.entry-meta,
	.entry-footer a:hover,
	.sticky .entry-header:before {
		color: <?php echo esc_attr($special_color_third); ?>;
	}
	.tagcloud a {	
		color: <?php echo esc_attr($special_color_third); ?> !important;
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
	.paging-navigation .nav-links a:hover, 
	.comment-navigation a:hover,
	.entry-footer a:hover {
		border: 1px solid <?php echo esc_attr($special_color_third); ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($special_box_color_fourth) && $special_box_color_fourth != '#727272' ) : ?>
	.site-header a, 
	.site-footer a, 
	#secondary a, 
	.site-footer a:hover,
	.main-navigation ul li .indicator,
	.site-header, .site-footer,
	#secondary,
	.showSide, 
	.showSearch,
	#toTop {
		color: <?php echo esc_attr($special_box_color_fourth); ?>;
	}
	.tagcloud a:hover {
		color: <?php echo esc_attr($special_box_color_fourth); ?> !important;
	}
	.tagcloud a {
		background: <?php echo esc_attr($special_box_color_fourth); ?>;
	}
	#wp-calendar tbody td#today,
	.tagcloud a:hover {
		border: 1px solid <?php echo esc_attr($special_box_color_fourth); ?>;
	}
	<?php endif; ?>
	
</style>
    <?php
}
add_action('wp_head', 'zenzero_custom_css_styles');
