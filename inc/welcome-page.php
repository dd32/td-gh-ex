<?php
/*******************************************************************************
 *  Add a Custom CSS file to Admin Area
 *******************************************************************************/
function apex_business_admin_theme_stylesheet() {
   wp_enqueue_style( 'custom-admin-style', get_template_directory_uri() .'/assets/css/admin-css.css' );
}
add_action( 'admin_enqueue_scripts', 'apex_business_admin_theme_stylesheet' );

/*******************************************************************************
 *  Adds theme page of ( About Apex Business )
 *******************************************************************************/
function apex_business_add_main_theme_page() {
    add_theme_page( esc_html__( 'About Apex Business', 'apex-business' ), esc_html__( 'About Apex Business', 'apex-business' ), 'edit_theme_options', 'about_apex_business', 'apex_business_about' );
}
add_action( 'admin_menu', 'apex_business_add_main_theme_page' );

function apex_business_about() {

    $theme = wp_get_theme();
    $theme_name = $theme->get( 'Name' );
    $theme_description = $theme->get( 'Description' );
    $theme_user = wp_get_current_user();
    $theme_slug = basename( get_stylesheet_directory() );
?>

<div class="container about-theme">
    <div class="row">
        <div class="twelve columns clearfix">
            <?php /* translators: %s: theme name. */ ?>
            <h1><?php printf( esc_html__( 'Getting started with %s', 'apex-business' ), esc_html( $theme_name ) ); ?></h1>
            <?php /* translators: %1$s: user name. %2$s: theme name. */ ?>
            <p><?php printf( esc_html__( 'Hi %1$s, thank you for installing %2$s!', 'apex-business' ), esc_html( $theme_user->display_name ), esc_html( $theme_name ) ); ?> <?php echo esc_html( $theme_description ); ?></p>
        </div><!-- /.apex-desh-hl -->
    </div>

    <div class="row">
        <?php /* translators: 1: Theme user name. 2: Theme name */ ?>
        <div class="six columns apex-screenshot clearfix">
            <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="Theme Screenshot" />
            <a class="jquery-btn-get-started button button-primary button-hero ct-button-padding" href="#" data-name="" data-slug=""><?php esc_html_e( 'Get started with Apex Business', 'apex-business' ); ?></a>
            <small class="ct-small"><?php esc_html_e( 'This will install and activate Crafthemes Demo Import plugin.', 'apex-business' ); ?></small>
        </div><!-- /.six columns -->

        <div class="six columns">
            <div class="ct-content">
                <h3><a href="https://www.crafthemes.com/docs/<?php echo esc_attr( $theme_slug ); ?>-documentation/" target="_blank">    <?php esc_html_e( 'Theme Documentation', 'apex-business' ); ?></a></h3>
                <p>
                    <?php esc_html_e( 'Read about all of the theme settings, and find out about its features.', 'apex-business' ); ?>
                </p>
            </div><!-- /.apex-n-doc -->
            <div class="ct-content">
                <h3><a href="https://www.crafthemes.com/<?php echo esc_attr( $theme_slug ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'apex-business' ); ?></a></h3>
                <p>
                    <?php esc_html_e( 'Checkout the live demo of Apex Business.', 'apex-business' ); ?>
                </p>
            </div><!-- /.apex-n-doc -->
        </div><!-- /.six columns -->
    </div><!-- /.row -->
</div><!-- /.container about-writer -->

<?php
}
