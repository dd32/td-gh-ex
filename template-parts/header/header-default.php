<?php
/**
 * Header Layout: Main header
 */

    $apex_business_fixed_header = '';
    if ( get_theme_mod( 'apex_business_sticky_header_switch_setting' ) ) {
        $apex_business_fixed_header = 'fixed-header';
    }
?>
<div class="main-header header-spacing <?php echo esc_attr( $apex_business_fixed_header ); ?>">
    <div class="container">
        <div class="row nav-menu">
            <div class="col-md-12 vertical-center header-col">
                <div class="site-logo logo-vertical-spacing">
                    <?php get_template_part( 'template-parts/header/logo', 'default' ); ?>
                </div><!-- /.site-logo -->

                <?php get_template_part( 'template-parts/header/menu', 'main' ); ?>

                <!-- Mobile Menu Icon -->
                <?php if ( has_nav_menu( 'mobile_menu' ) || has_nav_menu( 'header_menu' ) ) : ?>
                <i class="fa fa-bars menubar-right"></i>
                <?php endif; ?>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->

    <?php get_template_part( 'template-parts/header/menu', 'mobile' ); ?>
</div><!-- /.main-header -->
