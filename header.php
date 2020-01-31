<!DOCTYPE html >
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$fixed_nav = get_theme_mod('navbar_fixed', 'no');
$fixed_nav = 'fixed_nav_' . $fixed_nav;
?>

<div class="page-wrapper <?php echo $fixed_nav; ?>">
    <a class="skip-link screen-reader-text" href="#content-wrap"><?php _e( 'Skip to content', 'atwood' ); ?></a>

    <!-- BEGIN NAV -->
    <nav class="primary-navigation navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if ( has_custom_logo() ) {
                        echo '<a href="' . home_url() . '" title="' . get_bloginfo( 'name' ) . '"><img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '"></a>';
                } else {
                        echo '<a href="' . home_url() . '" title="' . get_bloginfo( 'name' ) . '">' .  bloginfo( 'name' ) . '</a>';
                }
                ?>

                <?php
                    $description = get_bloginfo ( 'description' );
                    if ( strlen( $description ) > 0 && display_header_text() == true ) : ?>
                    <div class="site-description subtext">
                        <?php echo get_bloginfo ( 'description' ); ?>
                    </div>
                <?php endif; ?>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only"><?php _e('Toggle navigation', 'atwood'); ?></span>
                    <span class="fa fa-bars"></span>
                </button>
            </div><!-- end navbar-header -->

            <div class="navbar-collapse collapse" id="nav-spy">
                <div class="nav-wrap">
                    <!-- primary nav -->
                    <?php
                        if ( has_nav_menu('primary_menu') ) {
                            wp_nav_menu(array(
                            'container' =>false,
                            'theme_location' => 'primary_menu',
                            'menu_class' => 'nav navbar-nav',
                            'echo' => true,
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'depth' => 0,
                            'walker' => new Themeora_Walker_Nav_Menu()
                            ));
                        }
                        else {
                            echo 'Create & assign a menu: Dashboard > Appearance > Menus' ;
                        }
                    ?>
                </div><!--end nav-wrap -->
            </div><!-- end .navbar-collapse #nav-spy -->
        </div>
    </nav>

    <?php
    // Load header image if set in theme customizer
    if ( get_header_image() ) :
    ?>
        <header id="primary-header">
            <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
        </header>
	<?php endif; ?>

    <!-- END NAV -->

    <div id="content-wrap">
