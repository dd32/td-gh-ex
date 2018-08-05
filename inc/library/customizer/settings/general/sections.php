<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
global $wp_customize;

$wp_customize->add_section( 'beenews_general_section',
                            array(
	                            'title'    => esc_html__( 'General', 'bee-news' ),
	                            'panel'    => 'beenews_panel_general',
	                            'priority' => 1,
                            )
);

$wp_customize->add_section( 'beenews_footer_section',
                            array(
	                            'title'    => esc_html__( 'Footer', 'bee-news' ),
	                            'priority' => 50,
                            )
);

$wp_customize->add_section( 'beenews_blog_section',
                            array(
	                            'title'    => esc_html__( 'Single Post', 'bee-news' ),
	                            'panel'    => 'beenews_panel_blog',
	                            'priority' => 1,
                            )
);

$wp_customize->add_section( 'beenews_preloader_section',
                            array(
	                            'title'    => esc_html__( 'Preloader', 'bee-news' ),
	                            'panel'    => 'beenews_panel_general',
	                            'priority' => 1,
                            )
);


$wp_customize->add_section( 'beenews_typography',
                            array(
	                            'title'    => esc_html__( 'Typography', 'bee-news' ),
	                            'priority' => 51,
                            )
);

$wp_customize->add_section( 'beenews_typography_headings',
                            array(
	                            'title'    => esc_html__( 'Headings', 'bee-news' ),
	                            'panel'    => 'beenews_panel_typography',
	                            'priority' => 51,
                            )
);
$wp_customize->add_section( 'beenews_typography_paragraph',
                            array(
	                            'title'    => esc_html__( 'Paragraphs', 'bee-news' ),
	                            'panel'    => 'beenews_panel_typography',
	                            'priority' => 52,
                            )
);

$wp_customize->add_section(
	new Epsilon_Section_Pro(
		$wp_customize,
		'epsilon-section-pro',
		array(
			'title'       => esc_html__( 'LITE vs PRO comparison', 'bee-news' ),
			'button_text' => esc_html__( 'Learn more', 'bee-news' ),
			'button_url'  => esc_url_raw( admin_url() . 'themes.php?page=beenews-welcome&tab=features' ),
			'priority'    => 0
		)
	)
);

global $beenews_required_actions, $beenews_recommended_plugins;

$wp_customize->add_section(
	new Epsilon_Section_Recommended_Actions(
		$wp_customize,
		'epsilon_recommended_section',
		array(
			'title'                        => esc_html__( 'Recomended Actions', 'bee-news' ),
			'social_text'                  => esc_html__( 'We are social :', 'bee-news' ),
			'plugin_text'                  => esc_html__( 'Recomended Plugins :', 'bee-news' ),
			'actions'                      => $beenews_required_actions,
			'plugins'                      => $beenews_recommended_plugins,
			'theme_specific_option'        => 'beenews_show_required_actions',
			'theme_specific_plugin_option' => 'beenews_show_required_plugins',
			'facebook'                     => 'https://www.facebook.com/machothemes',
			'twitter'                      => 'https://twitter.com/MachoThemez',
			'wp_review'                    => true,
			'theme_slug'                   => 'bee-news',
			'priority'                     => 0
		)
	)
);