<?php
/**
 * Altitude theme Starter Content
 *
 * @package altitude-lite
 * @since altitude-lite 2.1
 */

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `altitude_lite_get_starter_content` filter before returning.
 *
 * @since altitude-lite 3.0.0
 * @return array a filtered array of args for the starter_content.
 */

function altitude_lite_get_starter_content() {

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'    => array(
			// Place one core-defined widgets in the first footer widget area.
			'sidebar-1' => array(
				'text_about',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'      => array(
			'front' => array(
				'post_type'    => 'page',
				'post_title'   => __( 'Home', 'altitude-lite' ),
				'template'     => 'gutenberg-fullwidth.php',
				'post_content' => join(
					'',
					array(
						'<!-- wp:cover {"url":"' . get_theme_file_uri() . '/assets/images/altitude-bg-hero.jpg","id":1846,"align":"full"} -->',
						'<div class="wp-block-cover alignfull has-background-dim" style="background-image:url(' . get_theme_file_uri() . '/assets/images/altitude-bg-hero.jpg)">',
						'<div class="wp-block-cover__inner-container">',
						'<!-- wp:spacer -->',
						'<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer -->',
						'<!-- wp:columns -->',
						'<div class="wp-block-columns">',
						'<!-- wp:column {"width":66.66} -->',
						'<div class="wp-block-column" style="flex-basis:66.66%">',
						'<!-- wp:heading {"level":1,"textColor":"button-hover-text-color"} -->',
						'<h1 class="has-button-hover-text-color-color has-text-color">Altitude- WordPress Blog Theme</h1>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>100% responsive sleek-modern WordPress theme for bloggers with the full-width header image.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:button -->',
						'<div class="wp-block-button"><a class="wp-block-button__link" href="#">Get Started </a></div>',
						'<!-- /wp:button --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"width":50} -->',
						'<div class="wp-block-column" style="flex-basis:50%"></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:spacer -->',
						'<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer --></div></div>',
						'<!-- /wp:cover -->',
						'<!-- wp:spacer -->',
						'<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer -->',
						'<!-- wp:heading {"align":"center"} -->',
						'<h2 class="has-text-align-center">Features that help your blog grow</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Altitude theme has all features that a WordPress theme needs to set up a beautiful WordPress blog.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:spacer -->',
						'<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer -->',
						'<!-- wp:columns -->',
						'<div class="wp-block-columns">',
						'<!-- wp:column -->',
						'<div class="wp-block-column">',
						'<!-- wp:image {"align":"center","id":1818,"sizeSlug":"large"} -->',
						'<div class="wp-block-image"><figure class="aligncenter size-large"><img src="' . get_theme_file_uri() . '/assets/images/pen.png" alt="" class="wp-image-1818"/></figure></div>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"align":"center","level":4} -->',
						'<h4 class="has-text-align-center">Great Visual Design</h4>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column -->',
						'<div class="wp-block-column">',
						'<!-- wp:image {"align":"center","id":1819,"sizeSlug":"large"} -->',
						'<div class="wp-block-image"><figure class="aligncenter size-large"><img src="' . get_theme_file_uri() . '/assets/images/business-and-finance.png" alt="" class="wp-image-1819"/></figure></div>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"align":"center","level":4} -->',
						'<h4 class="has-text-align-center">24/7 Support</h4>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column -->',
						'<div class="wp-block-column">',
						'<!-- wp:image {"align":"center","id":1820,"sizeSlug":"large"} -->',
						'<div class="wp-block-image"><figure class="aligncenter size-large"><img src="' . get_theme_file_uri() . '/assets/images/multimedia.png" alt="" class="wp-image-1820"/></figure></div>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"align":"center","level":4} -->',
						'<h4 class="has-text-align-center"><strong>Easy To Use</strong></h4>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:button {"align":"center"} -->',
						'<div class="wp-block-button aligncenter"><a class="wp-block-button__link" href="#">Get Started</a></div>',
						'<!-- /wp:button -->',
						'<!-- wp:spacer -->',
						'<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer -->',
						'<!-- wp:spacer -->',
						'<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer -->',
						'<!-- wp:media-text {"mediaPosition":"right","mediaId":1850,"mediaType":"image","className":"is-stacked-on-mobile"} -->',
						'<div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile"><figure class="wp-block-media-text__media"><img src="' . get_theme_file_uri() . '/assets/images/altitude1.png" alt="" class="wp-image-1850"/></figure><div class="wp-block-media-text__content">',
						'<!-- wp:paragraph -->',
						'<p>Productive</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:heading -->',
						'<h2>Integration With SildeDeck</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>Altitude lite is integrated with SlideDeck3, a comprehensive and easy to use slider plugin. You can use this plugin to add a fullscreen slider or a carousel that pops up in a lightbox to draw special attention to the best content.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph {"customTextColor":"#8c2849"} -->',
						'<p style="color:#8c2849" class="has-text-color">Read More &gt;</p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:media-text -->',
						'<!-- wp:media-text {"mediaId":1851,"mediaType":"image","className":"is-stacked-on-mobile"} -->',
						'<div class="wp-block-media-text alignwide is-stacked-on-mobile"><figure class="wp-block-media-text__media"><img src="' . get_theme_file_uri() . '/assets/images/altitude2.png" alt="" class="wp-image-1851"/></figure><div class="wp-block-media-text__content">',
						'<!-- wp:paragraph -->',
						'<p>Productive</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:heading -->',
						'<h2>Multilingual WPML Ready</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>Altitude lite is easily translatable into any language with WPML and you can even create multilingual websites. Choose from over 40 languages for your site and start translating content.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph {"customTextColor":"#8c2849"} -->',
						'<p style="color:#8c2849" class="has-text-color">Read More &gt;</p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:media-text -->',
						'<!-- wp:media-text {"mediaPosition":"right","mediaId":1854,"mediaType":"image","className":"is-stacked-on-mobile"} -->',
						'<div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile"><figure class="wp-block-media-text__media"><img src="' . get_theme_file_uri() . '/assets/images/altitude3.png" alt="" class="wp-image-1854"/></figure>',
						'<div class="wp-block-media-text__content">',
						'<!-- wp:paragraph -->',
						'<p>Productive</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:heading -->',
						'<h2>Accessibility Ready&nbsp;</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>The theme is accessible and follows WCAG 2.0 standards. It meets the AA level which is essential for usability. The theme meets all required and recommended <strong>accessibility</strong> guidelines include keyboard navigation, controls, skip links, content links, forms, headings, contrasts, images, media, and screen reader text.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph {"customTextColor":"#8c2849"} -->',
						'<p style="color:#8c2849" class="has-text-color">Read More &gt;</p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:media-text -->',
						'<!-- wp:spacer -->',
						'<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer -->',
						'<!-- wp:cover {"url":"' . get_theme_file_uri() . '/assets/images/altitude-bg.jpg","id":1852,"align":"full"} -->',
						'<div class="wp-block-cover alignfull has-background-dim" style="background-image:url(' . get_theme_file_uri() . '/assets/images/altitude-bg.jpg)"><div class="wp-block-cover__inner-container">',
						'<!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->',
						'<p class="has-text-align-center has-large-font-size">Get this awesome theme that will help you grow your blog and community.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:button {"align":"center"} -->',
						'<div class="wp-block-button aligncenter"><a class="wp-block-button__link" href="#">Get Started</a></div>',
						'<!-- /wp:button --></div></div>',
						'<!-- /wp:cover -->',
						'<!-- wp:spacer -->',
						'<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer -->',
						'<!-- wp:heading {"align":"center"} -->',
						'<h2 class="has-text-align-center">Meet Our Team</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>We’re led by a team of innovators, analysts, and creative minds who challenge the status quo. Say hello to the driving force behind StartFlow’s first-class service.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:columns -->',
						'<div class="wp-block-columns">',
						'<!-- wp:column -->',
						'<div class="wp-block-column">',
						'<!-- wp:image {"id":1856,"sizeSlug":"large"} -->',
						'<figure class="wp-block-image size-large"><img src="' . get_theme_file_uri() . '/assets/images/altitude-team.png" alt="" class="wp-image-1856"/><figcaption>Thomas Smith<br>Founder &amp; CEO</figcaption></figure>',
						'<!-- /wp:image -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column -->',
						'<div class="wp-block-column">',
						'<!-- wp:image {"id":1857,"sizeSlug":"large"} -->',
						'<figure class="wp-block-image size-large"><img src="' . get_theme_file_uri() . '/assets/images/altitude-team2.png" alt="" class="wp-image-1857"/><figcaption>Eloise Smith<br>Finance Director</figcaption></figure>',
						'<!-- /wp:image -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column -->',
						'<div class="wp-block-column"><!-- wp:image {"id":1858,"sizeSlug":"large"} -->',
						'<figure class="wp-block-image size-large"><img src="' . get_theme_file_uri() . '/assets/images/altitude-team3.png" alt="" class="wp-image-1858"/><figcaption>Ernest Smith<br>Software Engineer</figcaption></figure>',
						'<!-- /wp:image -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry.</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:spacer -->',
						'<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>',
						'<!-- /wp:spacer -->',
						'<!-- wp:paragraph --><p></p>',
						'<!-- /wp:paragraph -->',
					)
				),
			),
			'about',
			'blog',
			'services',
			'contact',
		),

		// Default to a static front page and assign the front and posts pages.
		'options'    => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{front}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'  => array(
			// Assign a menu to the "primary" location.
			'primary' => array(
				'name'  => __( 'Primary', 'altitude-lite' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_services',
					'page_contact',
				),
			),
		),

		// Custom setting.
		'theme_mods' => array(
			'responsive_style' => 'flat',
		),
	);

	/**
	 * Filters Altitude array of starter content.
	 *
	 * @since altitude-lite 2.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'altitude_lite_starter_content', $starter_content );

}
