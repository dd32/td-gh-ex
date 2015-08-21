<?php
/**
 * badeyes Theme Customizer support
 *
 * @package WordPress
 * @subpackage badeyes
 * @since badeyes 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since badeyes 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function badeyes_customize_register( $wp_customize ) {
$wp_customize->add_section("intro_text", array( 
'description' => '<p>Use the edit boxes below to add a description, Advertisement, Google Ads or any other relevant text  to the top of the Blog, Single Post and Page area , you need to use html code to render properly, for accessibility reasons leave the headings at their current default levels if you use any.</p><p>Leave blank to remove text from front end.</p>',
"title" => __("Call to Action(CTA) Areas", "badeyes", "customizer_intro_text_sections"), 
"priority" => 1, 
)); 
$wp_customize->add_setting("single", array( 
"default" => "<h2>Badeyes Theme Single Post Text Area</h2><p>Use this area to highlight something important you want to draw your visitors attention to, or just remove it in the Customize area in the backend.</p>", 
"sanitize_callback' => 'single",
"transport" => "postMessage", 
)); 
$wp_customize->add_control(new WP_Customize_Control(
$wp_customize,
"single",
array(
"label" => __("Enter text for single post area", "badeyes", "customizer_single_label"),
"section" => "intro_text",
"settings" => "single",
"type" => "textarea",
"sanitize_callback' => 'single"
)));
$wp_customize->add_setting("featuredTitle", array( 
"default" => "Leave this area blank to remove text from front end", 
"sanitize_callback' => 'featuredTitle",
"transport" => "postMessage", 
)); 
$wp_customize->add_control(new WP_Customize_Control(
$wp_customize,
"featuredTitle",
array(
"label" => __("Enter text for Featured Content Heading", "badeyes", "customizer_featuredTitle_label"),
"section" => "rewrite_titles",
"settings" => "featuredTitle",
"type" => "textbox",
"sanitize_callback' => 'featuredTitle"
)));
$wp_customize->add_setting("blog", array( 
"default" => "<h2>Badeyes Theme Blog Text Area</h2><p>Use this area to highlight something important you want to draw your visitors attention to, or just remove it in the Customize area in the backend.</p>", 
"sanitize_callback' => 'blog",
"transport" => "postMessage", 
)); 
$wp_customize->add_control(new WP_Customize_Control(
$wp_customize,
"blog",
array(
"label" => __("Enter text for Blog text area", "badeyes", "customizer_blog_label"),
"section" => "intro_text",
"settings" => "blog",
"type" => "textarea",
"sanitize_callback' => 'blog"
)));
$wp_customize->add_setting("page", array( 
"default" => "<h2>Badeyes Theme Page Text Area</h2><p>Use this area to highlight something important you want to draw your visitors attention to, or just remove it in the Customize area in the backend.</p>", 
"sanitize_callback' => 'page",
"transport" => "postMessage", 
)); 
$wp_customize->add_control(new WP_Customize_Control(
$wp_customize,
"page",
array(
"label" => __("Enter text for page text area", "badeyes", "customizer_page_label"),
"section" => "intro_text",
"settings" => "page",
"type" => "textarea",
"sanitize_callback' => 'page"
)));
$wp_customize->add_section("rewrite_titles", array( 
'description' => '<p>Use the edit fields below to change or remove the corresponding text.</p>',
"title" => __("Rewrite Titles", "badeyes", "customizer_rewrite_titles_sections"), 
"priority" => 2, 
)); 
$wp_customize->add_setting("blog_title", array( 
"default" => "Leave this area blank to remove text from front end", 
"sanitize_callback' => 'blog_title",
"transport" => "postMessage", 
)); 
$wp_customize->add_control(new WP_Customize_Control(
$wp_customize,
"blog_title",
array(
"label" => __("Enter title for Blog Heading", "badeyes", "customizer_blog_title_label"),
"section" => "rewrite_titles",
"settings" => "blog_title",
"type" => "textbox",
"sanitize_callback' => 'blog_title"
)));
$wp_customize->add_setting("side_menu", array( 
"default" => "Leave this area blank to remove text from front end", 
"sanitize_callback' => 'side_menu",
"transport" => "postMessage", 
)); 
$wp_customize->add_control(new WP_Customize_Control(
$wp_customize,
"side_menu",
array(
"label" => __("Enter text for link to side menu in skip links", "badeyes", "customizer_side_menu_label"),
"section" => "rewrite_titles",
"settings" => "side_menu",
"type" => "textbox",
"sanitize_callback' => 'side_menu"
)));
$wp_customize->add_setting("sideHeading", array( 
"default" => "Side Menu", 
"sanitize_callback' => 'sideHeading",
"transport" => "postMessage", 
)); 
$wp_customize->add_control(new WP_Customize_Control(
$wp_customize,
"sideHeading",
array(
"label" => __("Right hand side Heading text(leave empty to hide)", "badeyes", "customizer_sideHeading_label"),
"section" => "rewrite_titles",
"settings" => "sideHeading",
"type" => "textbox",
"sanitize_callback' => 'sideHeading"
)));
$wp_customize->add_section("miscellaneous", array( 
'description' => '<p>Use this area to add scripts to the head section, alt text to the header image and show/hide certain elements.</p>',
"title" => __("Miscellaneous", "badeyes", "customizer_miscellaneous_sections"), 
"priority" => 3, 
)); 
$wp_customize->add_setting("copyright", array( 
"default" => "Copyright Since (start date goes here)",
"sanitize_callback' => 'copyright",
"transport" => "postMessage", 
)); 
$wp_customize->add_control(new WP_Customize_Control(
$wp_customize,
"copyright",
array(
"label" => __("Enter text for Copyright notice.", "badeyes", "customizer_copyright_label"),
"section" => "miscellaneous",
"settings" => "copyright",
"type" => "textbox",
"sanitize_callback' => 'copyright"
)));
$wp_customize->add_setting("author_credits", array( 
"default" => "", 
"sanitize_callback' => 'author_credits",
"transport" => "postMessage", 
)); 
$wp_customize->add_control(new WP_Customize_Control(
$wp_customize,
"author_credits",
array(
"label" => __("Check to hide Author credits", "badeyes", "customizer_author_credits_label"),
"section" => "miscellaneous",
"settings" => "author_credits",
"type" => "checkbox",
"sanitize_callback' => 'author_credits"
)));
$wp_customize->add_section("css_code", array( 
'description' => '',
"title" => __("CSS Options", "badeyes", "customizer_css_code_sections"), 
"priority" => 4, 
)); 
$wp_customize->add_setting("styleSheet", array( 
"default" => "", 
"sanitize_callback' => 'styleSheet",
"transport" => "postMessage", 
)); 
$wp_customize->add_control(new WP_Customize_Control(
$wp_customize,
"styleSheet",
array(
"label" => __("Replace css classes here", "badeyes", "customizer_styleSheet_label"),
"section" => "css_code",
"settings" => "styleSheet",
"type" => "textarea",
"sanitize_callback' => 'styleSheet"
)));
$wp_customize->remove_section( 'colors');
	$wp_customize->get_section( 'background_image' )->description = __( 'Background may only be visible on wide screens.', 'badeyes' );

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'badeyes' );

	// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title &amp; Tagline', 'badeyes' );
	// Add the featured content layout setting and control.
	$wp_customize->add_setting( 'featured_content_layout', array(
		'default'           => 'grid',
		'sanitize_callback' => 'badeyes_sanitize_layout',
	) );

	$wp_customize->add_control( 'featured_content_layout', array(
		'label'   => __( 'Layout', 'badeyes' ),
		'section' => 'featured_content',
		'type'    => 'select',
		'choices' => array(
			'grid'   => __( 'Grid',   'badeyes' ),
			'slider' => __( 'Slider', 'badeyes' ),
		),
	) );
}
add_action( 'customize_register', 'badeyes_customize_register' );

/**
 * Sanitize the Featured Content layout value.
 *
 * @since badeyes 1.0
 *
 * @param string $layout Layout type.
 * @return string Filtered layout type (grid|slider).
 */
function badeyes_sanitize_layout( $layout ) {
	if ( ! in_array( $layout, array( 'grid', 'slider' ) ) ) {
		$layout = 'grid';
	}

	return $layout;
}

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since badeyes 1.0
 */
function badeyes_customize_preview_js() {
	wp_enqueue_script( 'badeyes_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20131205', true );
}
add_action( 'customize_preview_init', 'badeyes_customize_preview_js' );

/**
 * Add contextual help to the Themes and Post edit screens.
 *
 * @since badeyes 1.0
 *
 * @return void
 */
function badeyes_contextual_help() {
	if ( 'admin_head-edit.php' === current_filter() && 'post' !== $GLOBALS['typenow'] ) {
		return;
	}

	get_current_screen()->add_help_tab( array(
		'id'      => 'badeyes',
		'title'   => __( 'badeyes', 'badeyes' ),
		'content' =>
			'<ul>' .
				'<li>' . sprintf( __( 'The home page features your choice of up to 6 posts prominently displayed in a grid or slider, controlled by the <a href="%1$s">featured</a> tag; you can change the tag and layout in <a href="%2$s">Appearance &rarr; Customize</a>. If no posts match the tag, <a href="%3$s">sticky posts</a> will be displayed instead.', 'badeyes' ), admin_url( '/edit.php?tag=featured' ), admin_url( 'customize.php' ), admin_url( '/edit.php?show_sticky=1' ) ) . '</li>' .
				'<li>' . sprintf( __( 'Enhance your site design by using <a href="%s">Featured Images</a> for posts you&rsquo;d like to stand out (also known as post thumbnails). This allows you to associate an image with your post without inserting it. badeyes uses featured images for posts and pages&mdash;above the title&mdash;and in the Featured Content area on the home page.', 'badeyes' ), 'http://codex.wordpress.org/Post_Thumbnails#Setting_a_Post_Thumbnail' ) . '</li>' .
				'<li>' . sprintf( __( 'For an in-depth tutorial, and more tips and tricks, visit the <a href="%s">badeyes documentation</a>.', 'badeyes' ), 'http://codex.wordpress.org/badeyes' ) . '</li>' .
			'</ul>',
	) );
}
add_action( 'admin_head-themes.php', 'badeyes_contextual_help' );
add_action( 'admin_head-edit.php',   'badeyes_contextual_help' );
