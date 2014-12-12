<?php
/**
 * Configure theme settings.
 *
 * @package puro
 * @since puro 1.0
 * @license GPL 2.0
 */

/**
 * Setup theme options.
 * 
 * @since puro 1.0
 */
function puro_theme_settings(){

	siteorigin_settings_add_section( 'header', __('Header', 'puro' ) );
	siteorigin_settings_add_section( 'navigation', __('Navigation', 'puro' ) );
	siteorigin_settings_add_section( 'home', __('Home', 'puro' ) );
	siteorigin_settings_add_section( 'pages', __('Pages', 'puro' ) );
	siteorigin_settings_add_section( 'blog', __('Blog', 'puro' ) );
	siteorigin_settings_add_section( 'comments', __('Comments', 'puro' ) );
	siteorigin_settings_add_section( 'social', __('Social', 'puro' ) );	
	siteorigin_settings_add_section( 'footer', __('Footer', 'puro' ) );

	/**
	 * Logo
	 */

	siteorigin_settings_add_field('header', 'image', 'media', __('Logo Image', 'puro'), array(
		'choose' => __('Choose Image', 'puro'),
		'update' => __('Set Logo', 'puro'),
		'description' => __('Your own custom logo.', 'puro')
	) );

	siteorigin_settings_add_teaser('header', 'image_retina', __('Retina Logo', 'puro'), array(
		'choose' => __('Choose Image', 'puro'),
		'update' => __('Set Logo', 'puro'),
		'description' => __('A double sized version of your logo for use on high pixel density displays. Must be used in addition to standard logo.', 'puro'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teasers/retina-logo.png',
	) );

	siteorigin_settings_add_field('header', 'center_logo', 'checkbox', __('Center Logo', 'puro'), array(
		'description' => __('Display a centered header logo.', 'puro')
	) );

	siteorigin_settings_add_field('header', 'display_tagline', 'checkbox', __('Display Tagline', 'puro'), array(
		'description' => __('Display the website tagline.', 'puro')
	) );	

	/**
	 * Navigation
	 */

	siteorigin_settings_add_field( 'navigation', 'post_nav', 'checkbox', __('Post Navigation', 'puro'), array(
		'description' => __('Display next/previous post navigation.', 'puro')
	) );		

	siteorigin_settings_add_field('navigation', 'header_menu', 'checkbox', __('Header Menu', 'puro'), array(
		'description' => __('Display the header menu.', 'puro')
	));	

	siteorigin_settings_add_teaser('navigation', 'responsive_menu', __('Responsive Menu', 'puro'), array(
		'description' => __('Use a special responsive menu for small screen devices.', 'puro'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teasers/responsive-menu.png',
	));				

	/**
	 * Home
	 */

	siteorigin_settings_add_field('home', 'slider', 'select', __('Home Page Slider', 'puro'), array(
		'options' => siteorigin_metaslider_get_options(true),
		'description' => sprintf(
			__('This theme supports <a href="%s" target="_blank">Meta Slider</a>. <a href="%s">Install it</a> for free to create beautiful responsive sliders.', 'puro'),
			'http://bit.ly/meta-slider',
			siteorigin_metaslider_install_link()
		)
	));

	/**
	 * Pages
	 */	

	siteorigin_settings_add_field('pages', 'page_featured_image', 'checkbox', __('Page Featured Image', 'puro'), array(
		'description' => __('Display the featured image on pages.', 'puro')
	) );		

	/**
	 * Blog Settings
	 */

	siteorigin_settings_add_field('blog', 'post_date', 'checkbox', __('Post Date', 'puro'), array(
		'description' => __('Display the post date.', 'puro')
	));	

	siteorigin_settings_add_field('blog', 'post_author', 'checkbox', __('Post Author', 'puro'), array(
		'description' => __('Display the post author.', 'puro')
	));	

	siteorigin_settings_add_field('blog', 'post_cats', 'checkbox', __('Post Categories', 'puro'), array(
		'description' => __('Display the post categories.', 'puro')
	));		

	siteorigin_settings_add_field('blog', 'post_tags', 'checkbox', __('Post Tags', 'puro'), array(
		'description' => __('Display the post tags.', 'puro')
	));

	siteorigin_settings_add_field('blog', 'post_comment_count', 'checkbox', __('Post Comment Count', 'puro'), array(
		'description' => __('Display the post comment count.', 'puro')
	));	

	siteorigin_settings_add_field('blog', 'post_featured_image', 'checkbox', __('Post Featured Image', 'puro'), array(
		'description' => __('Display the featured image on the single post page.', 'puro')
	) );	

	siteorigin_settings_add_field('blog', 'archive_featured_image', 'checkbox', __('Archive Featured Image', 'puro'), array(
		'description' => __('Display the featured image on the blog archive pages.', 'puro')
	) );

	siteorigin_settings_add_field( 'blog', 'edit_link', 'checkbox', __( 'Post Edit Link', 'puro' ), array(
		'description' => __( 'Display an Edit link below post content. Visible if a user is logged in and allowed to edit the content. Also applies to Pages.', 'puro' )
	) );	

	/**
	 * Comments
	 */		

	siteorigin_settings_add_field('comments', 'comment_form_tags', 'checkbox', __('Comment Form Allowed Tags', 'puro'), array(
		'description' => __('Display the explanatory text below the comment form that lets users know which HTML tags may be used.', 'puro')
	) );				

	siteorigin_settings_add_teaser('comments', 'ajax_comments', __('Ajax Comments', 'puro'), array(
		'description' => __('Allow users to submit comments without a page re-load on submit.', 'puro'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teasers/ajax-comments.png',
	));			 		

	/**
	 * Social
	 */		

	siteorigin_settings_add_teaser('social', 'share_post', __('Post Sharing', 'puro'), array(
		'description' => __('Show icons to share your posts on Facebook, Twitter and Google+.', 'puro'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teasers/share.png',
	));

	siteorigin_settings_add_teaser('social', 'twitter', __('Twitter Handle', 'puro'), array(
		'description' => __('This handle will be recommended after a user shares one of your posts.', 'puro'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teasers/share-rec.png',
	));	

	/**
	 * Footer
	 */

	siteorigin_settings_add_field( 'footer', 'copyright_text', 'text', __( 'Footer Copyright Text', 'puro' ), array(
		'description' => __( '{site-title} and {year} can be used to display your website title and the current year.', 'puro' )
	) );

	siteorigin_settings_add_teaser('footer', 'attribution', __('Footer Attribution Link', 'puro'), array(
		'description' => __('Remove the theme attribution link from your footer without editing any code.', 'puro'),
		'teaser-image' => get_template_directory_uri().'/upgrade/teasers/attribution.png',
	));	

}
add_action('siteorigin_settings_init', 'puro_theme_settings');

/**
 * Setup theme default settings.
 * 
 * @param $defaults
 * @return mixed
 * @since puro 1.0
 */
function puro_theme_setting_defaults($defaults){
	$defaults['header_image'] = false;
	$defaults['header_image_retina'] = false;
	$defaults['header_center_logo'] = false;
	$defaults['header_display_tagline'] = false;

	$defaults['navigation_post_nav'] = true;
	$defaults['navigation_header_menu'] = true;
	$defaults['navigation_responsive_menu'] = true;

	$defaults['home_slider'] = '';

	$defaults['pages_page_featured_image'] = true;		

	$defaults['blog_post_date'] = true;
	$defaults['blog_post_author'] = true;
	$defaults['blog_post_cats'] = true;
	$defaults['blog_post_tags'] = true;	
	$defaults['blog_post_comment_count'] = true;	
	$defaults['blog_post_featured_image'] = true;		
	$defaults['blog_archive_featured_image'] = true;
	$defaults['blog_edit_link'] = true;

	$defaults['comments_comment_form_tags'] = true;		
	$defaults['comments_ajax_comments'] = true;	

	$defaults['social_share_post'] = true;
	$defaults['social_twitter'] = '';		

	$defaults['footer_copyright_text'] = __('Copyright {year}', 'puro');
	$defaults['footer_attribution'] = true;

	return $defaults;
}
add_filter('siteorigin_theme_default_settings', 'puro_theme_setting_defaults');

function puro_siteorigin_settings_page_icon($icon){
	return get_template_directory_uri().'/images/settings-icon.png';
}
add_filter('siteorigin_settings_page_icon', 'puro_siteorigin_settings_page_icon');