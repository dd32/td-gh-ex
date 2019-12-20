<?php
/**
 * Header Layout: Centered Header
 */

    $apex_business_fixed_header = '';
    if ( get_theme_mod( 'apex_business_sticky_header_switch_setting' ) ) {
        $apex_business_fixed_header = 'fixed-header';
    }
?>
<div class="main-header header-spacing no-stick">
    <div class="container">
        <div class="row nav-menu layout-center">
            <div class="col-md-12 vertical-center logo-container">
                <div class="site-logo center-logo logo-vertical-spacing">
                    <?php get_template_part( 'template-parts/header/logo', 'default' ); ?>
                </div><!-- /.site-logo -->

                <!-- Mobile Menu Icon -->
                <?php if ( has_nav_menu( 'mobile_menu' ) || has_nav_menu( 'header_menu' ) ) : ?>
                    <a href="#" class="js-ct-menubar-right"><i class="fa fa-bars menubar-right"></i></a>
                <?php endif; ?>
            </div><!-- /.col-md-12 -->

            <div class="col-md-12 vertical-center menu-container <?php echo esc_attr( $apex_business_fixed_header ); ?>">
                <?php get_template_part( 'template-parts/header/menu', 'main' ); ?>
            </div><!-- /.col-md-12 vertical-center layout-center -->
        </div><!-- /.row -->
    </div><!-- /.container -->

    <?php get_template_part( 'template-parts/header/menu', 'mobile' ); ?>
</div><!-- /.main-header -->
