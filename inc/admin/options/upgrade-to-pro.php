<?php
/**
* Upgrade to pro options
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license licennse URI, for example : http://www.gnu.org/licenses/gpl-2.0.html
* @author ThemesDNA <themesdna@gmail.com>
*/

function bestwp_upgrade_to_pro($wp_customize) {

    $wp_customize->add_section( 'sc_bestwp_upgrade', array( 'title' => esc_html__( 'Upgrade to Pro Version', 'bestwp' ), 'priority' => 400 ) );
    
    $wp_customize->add_setting( 'bestwp_options[upgrade_text]', array( 'default' => '', 'sanitize_callback' => '__return_false', ) );
    
    $wp_customize->add_control( new BestWP_Customize_Static_Text_Control( $wp_customize, 'bestwp_upgrade_text_control', array(
        'label'       => esc_html__( 'BestWP Pro', 'bestwp' ),
        'section'     => 'sc_bestwp_upgrade',
        'settings' => 'bestwp_options[upgrade_text]',
        'description' => esc_html__( 'Do you enjoy BestWP? Upgrade to BestWP Pro now and get:', 'bestwp' ).
            '<ul class="bestwp-customizer-pro-features">' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Color Options', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Font Options', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '10+ Layout Options', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '10+ Custom Page Templates', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '10+ Custom Post Templates', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '10 Different Posts Styles', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '17 Different Featured Posts Widgets(each widget displays recent/popular/random posts or posts from a given category or tag.)', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'News Ticker', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Slider with More Options', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Tabbed Widget', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Social Profiles Widget and About Me Widget', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( '3 Header Layouts (full-width header or header+728x90 ad or header+search box)', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Post Share Buttons', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Related Posts with Thumbnails', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Author Bio Box with Social Buttons', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Sticky Menu/Sticky Sidebars with enable/disable capability', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Built-in Contact Form', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'WooCommerce Support', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'Search Engine Optimized', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Customizer options', 'bestwp' ) . '</li>' .
                '<li><i class="fa fa-check"></i> ' . esc_html__( 'More Features...', 'bestwp' ) . '</li>' .
            '</ul>'.
            '<strong><a href="'.BESTWP_PROURL.'" class="button button-primary" target="_blank"><i class="fa fa-shopping-cart"></i> ' . esc_html__( 'Upgrade To BestWP PRO', 'bestwp' ) . '</a></strong>'
    ) ) ); 

}