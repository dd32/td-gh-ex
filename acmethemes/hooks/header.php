<?php
/**
 * Setting global variables for all theme options saved values
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmephoto_set_global' ) ) :
    function acmephoto_set_global() {
        /*Getting saved values start*/
        $acmephoto_saved_theme_options = acmephoto_get_theme_options();
        $GLOBALS['acmephoto_customizer_all_values'] = $acmephoto_saved_theme_options;
        /*Getting saved values end*/
    }
endif;
add_action( 'acmephoto_action_before_head', 'acmephoto_set_global', 0 );

/**
 * Doctype Declaration
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmephoto_doctype' ) ) :
    function acmephoto_doctype() {
        ?>
        <!DOCTYPE html><html <?php language_attributes(); ?>>
        <?php
    }
endif;
add_action( 'acmephoto_action_before_head', 'acmephoto_doctype', 10 );

/**
 * Code inside head tage but before wp_head funtion
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmephoto_before_wp_head' ) ) :

    function acmephoto_before_wp_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php
    }
endif;
add_action( 'acmephoto_action_before_wp_head', 'acmephoto_before_wp_head', 10 );

/**
 * Add body class
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmephoto_body_class' ) ) :

    function acmephoto_body_class( $acmephoto_body_classes ) {
        global $acmephoto_customizer_all_values;
        
        if ( 'no-image' == $acmephoto_customizer_all_values['acmephoto-blog-archive-layout'] ) {
            $acmephoto_body_classes[] = 'blog-no-image';
        }
        $acmephoto_body_classes[] = acmephoto_sidebar_selection();

        return $acmephoto_body_classes;

    }
endif;
add_action( 'body_class', 'acmephoto_body_class', 10, 1);

/**
 * Start site div
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmephoto_site_start' ) ) :

    function acmephoto_site_start() {
        ?>
<div class="site" id="page">
        <?php
    }
endif;
add_action( 'acmephoto_action_before', 'acmephoto_site_start', 20 );
/**
 * Skip to content
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmephoto_skip_to_content' ) ) :

    function acmephoto_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acmephoto' ); ?></a>
        <?php
    }
endif;
add_action( 'acmephoto_action_before_header', 'acmephoto_skip_to_content', 10 );

/**
 * Main header
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmephoto_header' ) ) :
    function acmephoto_header() {
        global $acmephoto_customizer_all_values;

        $inner_nav = '';
        if ( !is_front_page() || ( is_front_page() && 'posts' == get_option( 'show_on_front' ) ) ) {
            $inner_nav = 'at-inner-nav';
        }
        $acmephoto_enable_feature = $acmephoto_customizer_all_values['acmephoto-enable-feature'];
        if( 1 != $acmephoto_enable_feature ) {
            $inner_nav .= ' navbar-no-fs';
        }
        ?>
        <div class="navbar at-navbar navbar-fixed-top <?php echo esc_attr( $inner_nav );?>" id="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
                    <?php
                    if ( 'disable' != $acmephoto_customizer_all_values['acmephoto-header-id-display-opt'] ):
                        if ( 'logo-only' == $acmephoto_customizer_all_values['acmephoto-header-id-display-opt'] ):
                            if( !empty( $acmephoto_customizer_all_values['acmephoto-header-logo'] ) ):
                                $acmephoto_header_alt = $acmephoto_customizer_all_values['acmephoto-header-alt'];
                                ?>
                                <a class="navbar-brand animated" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                        <img src="<?php echo esc_url( $acmephoto_customizer_all_values['acmephoto-header-logo'] ); ?>" alt="<?php echo esc_attr( $acmephoto_header_alt ); ?>" />
                                    </a>
                                <?php
                            endif;/*acmephoto-header-logo*/
                            ?>
                            <?php
                        else:/*else is title-only or title-and-tagline*/
                            if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </h1>
                            <?php else : ?>
                                <p class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </p>
                            <?php endif;
                            if ( 'title-and-tagline' == $acmephoto_customizer_all_values['acmephoto-header-id-display-opt'] ):
                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) : ?>
                                    <p class="site-description"><?php echo esc_html( $description ); ?></p>
                                <?php endif;
                            endif;
                            ?>
                            <?php
                        endif;
                    endif;
                    ?>
                </div>
                <div class="main-navigation navbar-collapse collapse">
                    <?php
                    if( is_front_page() && !is_home() && has_nav_menu( 'one-page') ){
                        wp_nav_menu(
                            array(
                                'theme_location' => 'one-page',
                                'menu_id' => 'primary-menu',
                                'menu_class' => 'nav navbar-nav navbar-right animated',
                            )
                        );
                    }
                    else{
                     wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_id' => 'primary-menu',
                            'menu_class' => 'nav navbar-nav navbar-right animated',
                        )
                    );
                    }
                   ?>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
        <?php
        if( 1 != $acmephoto_enable_feature ) {
            echo "<div class='no-fs-clearfix'></div>";
        }
    }
endif;
add_action( 'acmephoto_action_header', 'acmephoto_header', 10 );