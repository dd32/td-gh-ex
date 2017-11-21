<?php
/**
 * Ariel theme defaults
 *
 * @package ariel
 */
/**
 * General settings
 */
$ariel_defaults['ariel_footer_copyright']        = esc_html__( 'Copyright &copy; ', 'ariel' ). date( 'Y' );
$ariel_defaults['ariel_example_content']         = 1;
$ariel_defaults['ariel_author_box_show']		 = 1;
$ariel_defaults['ariel_author_social_links'] = array(
	'social_network' => 'facebook',
	'social_url'     => esc_url( 'https://www.facebook.com' )
);
/**
 * Site Identity
 */
$ariel_defaults['ariel_image_logo_show'] = false;
$ariel_defaults['ariel_text_logo']       = esc_html ( get_bloginfo( 'name' ) );
/**
 * Banner setting
 */
$ariel_defaults['ariel_banner_heading']     = esc_html ( get_bloginfo( 'name' ) );
$ariel_defaults['ariel_banner_description'] = esc_html ( get_bloginfo( 'description' ) );
$ariel_defaults['ariel_banner_url']         = esc_url ( get_site_url() );
/**
 * Frontpage > Banner / Slider
 */
$ariel_defaults['ariel_frontpage_banner']                 = 'Banner';
$ariel_defaults['ariel_frontpage_slider_type']            = 'Thumbnails';
$ariel_defaults['ariel_frontpage_posts_slider_category']  = '1'; // Uncategorized
$ariel_defaults['ariel_frontpage_posts_slider_number']    = '3';
/**
 * Frontpage > Featured Posts / Pages
 */
$ariel_defaults['ariel_frontpage_featured_posts_show']    = true;
$ariel_defaults['ariel_frontpage_featured_posts_heading'] = esc_html__( 'Featured Posts', 'ariel' );
$ariel_defaults['ariel_frontpage_featured_post_type']     = 'post';
$ariel_defaults['ariel_frontpage_featured_posts_post_1']  = 1;
$ariel_defaults['ariel_frontpage_featured_posts_post_2']  = 1;
$ariel_defaults['ariel_frontpage_featured_posts_post_3']  = 1;
$ariel_defaults['ariel_frontpage_featured_posts_post_4']  = 1;
$ariel_defaults['ariel_frontpage_featured_posts_page_1']  = 2;
$ariel_defaults['ariel_frontpage_featured_posts_page_2']  = 2;
$ariel_defaults['ariel_frontpage_featured_posts_page_3']  = 2;
$ariel_defaults['ariel_frontpage_featured_posts_page_4']  = 2;
/**
 * Blog feed
 */
$ariel_defaults['ariel_blog_feed_meta_show']     = true;
$ariel_defaults['ariel_blog_feed_date_show']     = 1;
$ariel_defaults['ariel_blog_feed_category_show'] = 1;
$ariel_defaults['ariel_blog_feed_author_show']   = 1;
$ariel_defaults['ariel_blog_feed_comments_show'] = 1;
$ariel_defaults['ariel_blog_feed_tag_show']      = 1;
$ariel_defaults['ariel_blog_feed_label']         = esc_html__( 'Recent Posts', 'ariel' );
$ariel_defaults['ariel_blog_feed_sidebar_show']  = 1;
$ariel_defaults['ariel_blog_feed_post_format']   = 'Grid';
/**
 * Posts
 */
$ariel_defaults['ariel_posts_meta_show']            = true;
$ariel_defaults['ariel_posts_date_show']            = 1;
$ariel_defaults['ariel_posts_category_show']        = 1;
$ariel_defaults['ariel_posts_author_show']          = 1;
$ariel_defaults['ariel_posts_comments_show']        = 1;
$ariel_defaults['ariel_posts_tags_show']            = 1;
$ariel_defaults['ariel_posts_sidebar']              = '1';
$ariel_defaults['ariel_posts_featured_image_show']  = 1;
/**
 * Pages
 */
$ariel_defaults['ariel_pages_sidebar']              = '1';
$ariel_defaults['ariel_pages_featured_image_show']  = 1;
/**
 * Default header image for core Custom Header customizer setting
 */
$ariel_defaults['ariel_custom_header'] = esc_url( get_template_directory_uri() . '/sample/images/header.jpg' );

/* sample images */
/* ------------- */

/* slider - fixed width / default: 1170, 550  */

$ariel_defaults['ariel-slider-fw'][] = esc_url( get_template_directory_uri() . '/sample/images/1170x550-1.jpg' );
$ariel_defaults['ariel-slider-fw'][] = esc_url( get_template_directory_uri() . '/sample/images/1170x550-2.jpg' );
$ariel_defaults['ariel-slider-fw'][] = esc_url( get_template_directory_uri() . '/sample/images/1170x550-3.jpg' );
$ariel_defaults['ariel-slider-fw'][] = esc_url( get_template_directory_uri() . '/sample/images/1170x550-4.jpg' );
$ariel_defaults['ariel-slider-fw'][] = esc_url( get_template_directory_uri() . '/sample/images/1170x550-5.jpg' );
$ariel_defaults['ariel-slider-fw'][] = esc_url( get_template_directory_uri() . '/sample/images/1170x550-6.jpg' );

/* slider - with thumbnails: 870, 550 and 110, 110 */

$ariel_defaults['ariel-slider-sm'][] = esc_url( get_template_directory_uri() . '/sample/images/870x550-1.jpg' );
$ariel_defaults['ariel-slider-sm'][] = esc_url( get_template_directory_uri() . '/sample/images/870x550-2.jpg' );
$ariel_defaults['ariel-slider-sm'][] = esc_url( get_template_directory_uri() . '/sample/images/870x550-3.jpg' );
$ariel_defaults['ariel-slider-sm'][] = esc_url( get_template_directory_uri() . '/sample/images/870x550-4.jpg' );
$ariel_defaults['ariel-slider-sm'][] = esc_url( get_template_directory_uri() . '/sample/images/870x550-5.jpg' );
$ariel_defaults['ariel-slider-sm'][] = esc_url( get_template_directory_uri() . '/sample/images/870x550-6.jpg' );

$ariel_defaults['ariel-recent'][] = esc_url( get_template_directory_uri() . '/sample/images/110x110-1.jpg' );
$ariel_defaults['ariel-recent'][] = esc_url( get_template_directory_uri() . '/sample/images/110x110-2.jpg' );
$ariel_defaults['ariel-recent'][] = esc_url( get_template_directory_uri() . '/sample/images/110x110-3.jpg' );
$ariel_defaults['ariel-recent'][] = esc_url( get_template_directory_uri() . '/sample/images/110x110-4.jpg' );
$ariel_defaults['ariel-recent'][] = esc_url( get_template_directory_uri() . '/sample/images/110x110-5.jpg' );
$ariel_defaults['ariel-recent'][] = esc_url( get_template_directory_uri() . '/sample/images/110x110-6.jpg' );

/* featured posts: 540, 540 */

$ariel_defaults['ariel-featured'][] = esc_url( get_template_directory_uri() . '/sample/images/540x540-1.jpg' );
$ariel_defaults['ariel-featured'][] = esc_url( get_template_directory_uri() . '/sample/images/540x540-2.jpg' );
$ariel_defaults['ariel-featured'][] = esc_url( get_template_directory_uri() . '/sample/images/540x540-3.jpg' );
$ariel_defaults['ariel-featured'][] = esc_url( get_template_directory_uri() . '/sample/images/540x540-4.jpg' );
$ariel_defaults['ariel-featured'][] = esc_url( get_template_directory_uri() . '/sample/images/540x540-5.jpg' );
$ariel_defaults['ariel-featured'][] = esc_url( get_template_directory_uri() . '/sample/images/540x540-6.jpg' );

/* blog feed - grid: 840, 500 */

$ariel_defaults['ariel-grid'][] = esc_url( get_template_directory_uri() . '/sample/images/840x500-1.jpg' );
$ariel_defaults['ariel-grid'][] = esc_url( get_template_directory_uri() . '/sample/images/840x500-2.jpg' );
$ariel_defaults['ariel-grid'][] = esc_url( get_template_directory_uri() . '/sample/images/840x500-3.jpg' );
$ariel_defaults['ariel-grid'][] = esc_url( get_template_directory_uri() . '/sample/images/840x500-4.jpg' );
$ariel_defaults['ariel-grid'][] = esc_url( get_template_directory_uri() . '/sample/images/840x500-5.jpg' );
$ariel_defaults['ariel-grid'][] = esc_url( get_template_directory_uri() . '/sample/images/840x500-6.jpg' );