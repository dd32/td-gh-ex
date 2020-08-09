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
	$settings = SiteOrigin_Settings::single();

	$settings->add_section( 'header', esc_html__( 'Header', 'puro' ) );
	$settings->add_section( 'navigation', esc_html__( 'Navigation', 'puro' ) );
	$settings->add_section( 'layout', esc_html__( 'Layout', 'puro' ) );
	$settings->add_section( 'home', esc_html__( 'Home', 'puro' ) );
	$settings->add_section( 'pages', esc_html__( 'Pages', 'puro' ) );
	$settings->add_section( 'blog', esc_html__( 'Blog', 'puro' ) );
	$settings->add_section( 'comments', esc_html__( 'Comments', 'puro' ) );
	$settings->add_section( 'social', esc_html__( 'Social', 'puro' ) );
	$settings->add_section( 'footer', esc_html__( 'Footer', 'puro' ) );

	// Header.
	$settings->add_field( 'header', 'image', 'media', esc_html__( 'Logo Image', 'puro' ), array(
		'choose' => esc_html__( 'Choose Image', 'puro' ),
		'update' => esc_html__( 'Set Logo', 'puro' ),
		'description' => esc_html__( 'Your own custom logo.', 'puro' )
	) );

	$settings->add_teaser( 'header', 'image_retina', 'media', esc_html__( 'Retina Logo', 'puro' ), array(
		'choose' => esc_html__( 'Choose Image', 'puro' ),
		'update' => esc_html__( 'Set Logo', 'puro' ),
		'description' => esc_html__( 'A double sized version of your logo for use on high pixel density displays. Must be used in addition to standard logo.', 'puro' )
	) );

	$settings->add_field( 'header', 'center_logo', 'checkbox', esc_html__( 'Center Logo', 'puro' ), array(
		'description' => esc_html__( 'Display a centered header logo.', 'puro' )
	) );

	$settings->add_field( 'header', 'display_tagline', 'checkbox', esc_html__( 'Display Tagline', 'puro' ), array(
		'description' => esc_html__( 'Display the website tagline.', 'puro' )
	) );

	// Navigation.
	$settings->add_field( 'navigation', 'post_nav', 'checkbox', esc_html__( 'Post Navigation', 'puro' ), array(
		'description' => esc_html__( 'Display next/previous post navigation.', 'puro' )
	) );

	$settings->add_field( 'navigation', 'header_menu', 'checkbox', esc_html__( 'Header Menu', 'puro' ), array(
		'description' => esc_html__( 'Display the header menu.', 'puro' )
	) );

	$settings->add_field( 'navigation', 'responsive_menu', 'checkbox', esc_html__( 'Mobile Menu', 'puro' ), array(
		'description' => esc_html__( 'Use a special responsive menu for small screen devices.', 'puro' ),
	) );

	$settings->add_field( 'navigation', 'responsive_menu_collapse', 'number', esc_html__( 'Mobile Menu Collapse', 'puro' ), array(
		'description' => esc_html__( 'The pixel resolution when the primary menu changes to a mobile menu.', 'puro' )
	) );

	// Layout.
	$settings->add_field( 'layout', 'responsive', 'checkbox', esc_html__( 'Responsive Layout', 'puro' ), array(
		'description' => esc_html__( 'Adapt the site layout for mobile devices.', 'puro' )
	) );

	$settings->add_field( 'layout', 'fitvids', 'checkbox', esc_html__( 'Enable FitVids.js', 'puro' ), array(
		'description' => esc_html__( 'Include FitVids.js for fluid width video embeds.', 'puro' )
	) );

	// Home.
	$settings->add_field( 'home', 'slider', 'select', esc_html__( 'Home Page Slider', 'puro' ), array(
		'options' => siteorigin_metaslider_get_options( true ),
		'description' => sprintf(
			esc_html__( 'This theme supports Meta Slider. %1$s for free to easily build beautiful responsive sliders - %2$s.', 'puro' ),
			'<a href="' . siteorigin_metaslider_install_link() . '">Install it</a>',
			'<a href="http://purothemes.com/documentation/puro-theme/theme-settings/home/" target="_blank">More Info</a>'
		)
	) );

	// Pages.
	$settings->add_field( 'pages', 'page_featured_image', 'checkbox', esc_html__( 'Page Featured Image', 'puro' ), array(
		'description' => esc_html__( 'Display the featured image on pages.', 'puro' )
	) );

	// Blog.
	$settings->add_field( 'blog', 'archive_layout', 'select', esc_html__( 'Blog Archive Layout', 'puro' ), array(
		'options' => puro_blog_layout_options(),
		'description' => esc_html__( 'Choose the layout to be used on blog and archive pages.', 'puro' )
	) );

	$settings->add_field( 'blog', 'archive_featured_image', 'checkbox', esc_html__( 'Archive Featured Image', 'puro' ), array(
		'description' => esc_html__( 'Display the featured image on the blog archive pages.', 'puro' )
	) );

	$settings->add_field( 'blog', 'archive_content', 'select', esc_html__( 'Archive Post Content', 'puro' ), array(
		'options' => array(
			'full' => esc_html__( 'Full Post Content', 'puro' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'puro' )
		),
		'description' => esc_html__( 'Choose how to display your post content on blog and archive pages. Select Full Post Content if using the "more" quicktag.', 'puro' )
	) );

	$settings->add_field( 'blog', 'read_more', 'text', esc_html__( 'Read More Text', 'puro' ), array(
		'description' => esc_html__( 'The link text displayed when posts are split using the "more" quicktag.', 'puro' )
	) );

	$settings->add_field( 'blog', 'excerpt_length', 'number', esc_html__( 'Post Excerpt Length', 'puro' ), array(
		'description' => esc_html__( 'If no manual post excerpt is added one will be generated. How many words should it be?', 'puro' )
	) );

	$settings->add_field( 'blog', 'excerpt_more', 'checkbox', esc_html__( 'Post Excerpt Read More Link', 'puro' ), array(
		'description' => esc_html__( 'Display the Read More Text below the post excerpt. Only applicable if Post Excerpt has been selected from the Archive Post Content setting.', 'puro' )
	) );

	$settings->add_field( 'blog', 'post_featured_image', 'checkbox', esc_html__( 'Post Featured Image', 'puro' ), array(
		'description' => esc_html__( 'Display the featured image on the single post page.', 'puro' )
	) );

	$settings->add_field( 'blog', 'post_date', 'checkbox', esc_html__( 'Post Date', 'puro' ), array(
		'description' => esc_html__( 'Display the post date.', 'puro' )
	) );

	$settings->add_field( 'blog', 'post_author', 'checkbox', esc_html__( 'Post Author', 'puro' ), array(
		'description' => esc_html__( 'Display the post author.', 'puro' )
	) );

	$settings->add_field( 'blog', 'post_cats', 'checkbox', esc_html__( 'Post Categories', 'puro' ), array(
		'description' => esc_html__( 'Display the post categories.', 'puro' )
	) );

	$settings->add_field( 'blog', 'post_tags', 'checkbox', esc_html__( 'Post Tags', 'puro' ), array(
		'description' => esc_html__( 'Display the post tags.', 'puro' )
	) );

	$settings->add_field( 'blog', 'post_comment_count', 'checkbox', esc_html__( 'Post Comment Count', 'puro' ), array(
		'description' => esc_html__( 'Display the post comment count.', 'puro' )
	) );

	$settings->add_field( 'blog', 'post_author_box', 'checkbox', esc_html__( 'Post Author Box', 'puro' ), array(
		'description' => esc_html__( 'Display the post author biographical info.', 'puro' )
	) );

	$settings->add_field( 'blog', 'edit_link', 'checkbox', esc_html__( 'Post Edit Link', 'puro' ), array(
		'description' => esc_html__( 'Display an Edit link below post content. Visible if a user is logged in and allowed to edit the content. Also applies to Pages.', 'puro' )
	) );

	// Comments.
	$settings->add_field( 'comments', 'comment_form_tags', 'checkbox', esc_html__( 'Comment Form Allowed Tags', 'puro' ), array(
		'description' => esc_html__( 'Display the explanatory text below the comment form that lets users know which HTML tags may be used.', 'puro' )
	) );

	$settings->add_teaser( 'comments', 'ajax_comments', 'checkbox', esc_html__( 'AJAX Comments', 'puro' ), array(
		'description' => esc_html__( 'Allow users to submit comments without a page re-load on submit.', 'puro' )
	) );

	// Social.
	$settings->add_teaser( 'social', 'share_post', 'checkbox', esc_html__( 'Post and Page Sharing', 'puro' ), array(
		'description' => esc_html__( 'Show icons to share your posts on Facebook, Twitter, Google+ and LinkedIn.', 'puro' )
	) );

	// Footer.
	$settings->add_field( 'footer', 'copyright_text', 'text', esc_html__( 'Footer Copyright Text', 'puro' ), array(
		'description' => esc_html__( '{site-title}, {copyright} and {year} can be used to display your website title, a copyright symbol and the current year.', 'puro' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$settings->add_field( 'footer', 'privacy_policy_link', 'checkbox', esc_html__( 'Privacy Policy Link', 'puro' ), array(
		'description' => esc_html__( 'Display the Privacy Policy page link in the footer.', 'puro' )
	) );

	$settings->add_teaser( 'footer', 'attribution', 'checkbox', esc_html__( 'Footer Attribution Link', 'puro' ), array(
		'description' => esc_html__( 'Remove the theme attribution link from your footer without editing any code.', 'puro' )
	) );

	$settings->add_field( 'footer', 'js_enqueue', 'checkbox', esc_html__( 'Enqueue JavaScript in Footer', 'puro' ), array(
		'description' => esc_html__( 'Enqueue theme JavaScript files in the footer. Doing so can improve site load time.', 'puro' )
	) );

}
add_action( 'siteorigin_settings_init', 'puro_theme_settings' );

/**
 * Setup theme default settings.
 * 
 * @param $defaults
 * @return mixed
 * @since puro 1.0
 */
function puro_theme_setting_defaults( $defaults ) {
	$defaults['header_image']           = false;
	$defaults['header_image_retina']    = false;
	$defaults['header_center_logo']     = false;
	$defaults['header_display_tagline'] = false;

	$defaults['navigation_post_nav']                 = true;
	$defaults['navigation_header_menu']              = true;
	$defaults['navigation_responsive_menu']          = true;
	$defaults['navigation_responsive_menu_collapse'] = 768;

	$defaults['layout_responsive'] = true;
	$defaults['layout_fitvids']    = true;

	$defaults['home_slider'] = '';

	$defaults['pages_page_featured_image'] = true;

	$defaults['blog_archive_layout']         = 'blog';
	$defaults['blog_archive_featured_image'] = true;
	$defaults['blog_archive_content']        = 'full';
	$defaults['blog_read_more']              = esc_html__( 'Continue reading', 'puro' );
	$defaults['blog_excerpt_length']         = 55;
	$defaults['blog_excerpt_more']           = false;
	$defaults['blog_post_featured_image']    = true;
	$defaults['blog_post_date']              = true;
	$defaults['blog_post_author']            = true;
	$defaults['blog_post_cats']              = true;
	$defaults['blog_post_tags']              = true;
	$defaults['blog_post_comment_count']     = true;
	$defaults['blog_post_author_box']        = false;
	$defaults['blog_edit_link']              = true;

	$defaults['comments_comment_form_tags'] = true;
	$defaults['comments_ajax_comments']     = true;

	$defaults['social_share_post'] = true;
	$defaults['social_share_page'] = false;
	$defaults['social_twitter']    = '';

	$defaults['footer_copyright_text']      = esc_html__( 'Copyright {year}', 'puro' );
	$defaults['footer_privacy_policy_link'] = false;
	$defaults['footer_attribution']         = true;
	$defaults['footer_js_enqueue']          = false;

	return $defaults;
}
add_filter( 'siteorigin_settings_defaults', 'puro_theme_setting_defaults' );

function puro_blog_layout_options() {
	$layouts = array();
	foreach ( glob( get_template_directory().'/loops/loop-*.php' ) as $template ) {
		$headers = get_file_data( $template, array(
			'loop_name' => 'Loop Name',
		) );

		preg_match( '/loop\-(.*?)\.php/', basename( $template ), $matches );
		if ( ! empty( $matches[1] ) ) {
			$layouts[$matches[1]] = $headers['loop_name'];
		}
	}
	return $layouts;
}
