<?php
/**
 * Info setup
 *
 * @package Arrival
 */
 require get_template_directory().'/inc/welcome/tgmpa/tgm-plugin-activation.php';
 require get_template_directory().'/inc/welcome/tgmpa/plugins-config.php';

if ( ! function_exists( 'arrival_details_setup' ) ) :

    /**
     * Info setup.
     *
     * @since 1.0.2
     */
    function arrival_details_setup() {

        $config = array(

            // Welcome content.
            /* translators: %1$s: blog info */
            'welcome-texts' => sprintf( esc_html__( 'Howdy %1$s, we would like to thank you for installing and activating %2$s theme for your precious site. All of the features provided by the theme are now ready to use. Here, we have gathered all of the essential details and helpful links for you and your better experience with %2$s. Once again, Thanks for using our theme!', 'arrival' ), get_bloginfo('name'), 'arrival' ),

            // Tabs.
            'tabs' => array(
                'getting-started' => esc_html__( 'Getting Started', 'arrival' ),
                'support'         => esc_html__( 'Support', 'arrival' ),
                'useful_plugins'  => esc_html__( 'Recommended Plugins', 'arrival' ),
                'demo-content'    => esc_html__( 'Demo Import', 'arrival' )
                
            ),

            // Quick links.
            'quick_links' => array(
                'theme_url' => array(
                    'text' => esc_html__( 'Theme Details', 'arrival' ),
                    'url'  => 'https://wpoperation.com/themes/arrival/',
                ),
                'demo_url' => array(
                    'text' => esc_html__( 'View Demo', 'arrival' ),
                    'url'  => 'https://demo.wpoperation.com/arrival/demos/',
                ),
                'documentation_url' => array(
                    'text' => esc_html__( 'View Documentation', 'arrival' ),
                    'url'  => 'https://wpoperation.com/wp-documentation/arrival/',
                ),
                'rating_url' => array(
                    'text' => esc_html__( 'Rate This Theme','arrival' ),
                    'url'  => 'https://wordpress.org/support/theme/arrival/reviews/#new-post',
                ),
            ),

            // Getting started.
            'getting_started' => array(
                'one' => array(
                    'title'       => esc_html__( 'Theme Documentation', 'arrival' ),
                    'icon'        => 'dashicons dashicons-format-aside',
                    'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'arrival' ),
                    'button_text' => esc_html__( 'View Documentation', 'arrival' ),
                    'button_url'  => 'https://wpoperation.com/wp-documentation/arrival/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
                'two' => array(
                    'title'       => esc_html__( 'Static Front Page', 'arrival' ),
                    'icon'        => 'dashicons dashicons-admin-generic',
                    'description' => esc_html__( 'To achieve custom home page other than blog listing, you need to create and set static front page & assign "Home" template from page attributes.', 'arrival' ),
                    'button_text' => esc_html__( 'Static Front Page', 'arrival' ),
                    'button_url'  => admin_url( 'customize.php?autofocus[section]=static_front_page' ),
                    'button_type' => 'primary',
                ),
                'three' => array(
                    'title'       => esc_html__( 'Theme Options', 'arrival' ),
                    'icon'        => 'dashicons dashicons-admin-customizer',
                    'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'arrival' ),
                    'button_text' => esc_html__( 'Customize', 'arrival' ),
                    'button_url'  => wp_customize_url(),
                    'button_type' => 'primary',
                ),
               
                'five' => array(
                    'title'       => esc_html__( 'Demo Import', 'arrival' ),
                    'icon'        => 'dashicons dashicons-layout',
                    /* translators: %1$s: demo importer name */
                    'description' => sprintf( esc_html__( 'To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit WPOp Demo Importer menu under Appearance.', 'arrival' ), esc_html__( 'Operation Demo Importer', 'arrival' ) ),
                    'button_text' => esc_html__( 'Demo Content', 'arrival' ),
                    'button_url'  => admin_url( 'themes.php?page=arrival-details&tab=demo-content' ),
                    'button_type' => 'secondary',
                ),

                'six' => array(
                    'title'       => esc_html__( 'Fix Image Sizes', 'arrival' ),
                    'icon'        => 'dashicons dashicons-format-gallery',
                    'description' => esc_html__( 'If you have already images on your site then all image might not align as expected, to fix this there is handy plugin which will help you', 'arrival' ),
                    'button_text' => esc_html__( 'Fix Images Now', 'arrival' ),
                    'button_url'  => 'https://wordpress.org/plugins/regenerate-thumbnails/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),

            ),

            // Support.
            'support' => array(
                'one' => array(
                    'title'       => esc_html__( 'Contact Support', 'arrival' ),
                    'icon'        => 'dashicons dashicons-sos',
                    'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'arrival' ),
                    'button_text' => esc_html__( 'Contact Support', 'arrival' ),
                    'button_url'  => 'https://wpoperation.com/support/support/free-themes/arrival/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
                'two' => array(
                    'title'       => esc_html__( 'Theme Documentation', 'arrival' ),
                    'icon'        => 'dashicons dashicons-format-aside',
                    'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'arrival' ),
                    'button_text' => esc_html__( 'View Documentation', 'arrival' ),
                    'button_url'  => 'https://wpoperation.com/wp-documentation/arrival/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
                'three' => array(
                    'title'       => esc_html__( 'Child Theme', 'arrival' ),
                    'icon'        => 'dashicons dashicons-admin-tools',
                    'description' => esc_html__( 'For advanced theme customization, it is recommended to use child theme rather than modifying the theme file itself. Using this approach, you wont lose the customization after theme update.', 'arrival' ),
                    'button_text' => esc_html__( 'Learn More', 'arrival' ),
                    'button_url'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
                    'button_type' => 'link',
                    'is_new_tab'  => true,
                ),
            ),

            //Useful plugins.
            'useful_plugins' => array(
                'description' => esc_html__( 'Lets first install & activate following plugins to make every thing working smoothly.', 'arrival' ),
            ),

            //Demo content.
            'demo_content' => array(
                /* translators: %1$s: demo importer name */
                'description' => sprintf( esc_html__( 'To import demo content for this theme, %1$s plugin is needed. Please make sure plugin is installed and activated. After plugin is activated, you will see WPop Demo Importer menu under Appearance.', 'arrival' ), '<a href="https://wordpress.org/plugins/operation-demo-importer/" target="_blank">' . esc_html__( 'Operation Demo Importer', 'arrival' ) . '</a>' ),
            ),


           
        );

        Arrival_Welcome_Info::init( $config );
    }

endif;

add_action( 'after_setup_theme', 'arrival_details_setup' );