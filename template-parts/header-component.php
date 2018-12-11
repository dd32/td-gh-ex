<?php
    $absolutte_header_classes = '';
    $absolutte_site_layout = get_theme_mod( 'absolutte_site_layout', 'default' );
    if ( isset( $_GET['site_layout'] ) ) {
        $absolutte_site_layout = sanitize_text_field( wp_unslash( $_GET['site_layout'] ) );
    }
    $absolutte_header_layout = get_theme_mod( 'absolutte_header_layout', 'header-1' );
    if ( isset( $_GET['header_layout'] ) ) {
        $absolutte_header_layout = sanitize_text_field( wp_unslash( $_GET['header_layout'] ) );
    }
    $absolutte_header_selected = str_replace( "header-", "", $absolutte_header_layout );
    $absolutte_sub_header_class = 'absolutte-header-style-' . $absolutte_header_selected;
    $absolutte_header_classes .= ' ' . $absolutte_sub_header_class;

    $absolutte_logo_container_classes = 'col-md-2 col-md-push-2 col-sm-12 col-xs-12 ';

    $absolutte_header_sticky = get_theme_mod( 'absolutte_header_sticky', '0' );
    if (  ( isset( $_GET['header_sticky'] ) || $absolutte_header_sticky ) && 'sidenav' != $absolutte_site_layout ) {
        $absolutte_header_classes .= ' absolutte-fixed-header';
    }

    $absolutte_header_position = get_theme_mod( 'absolutte_header_position', 'header-top' );
    if ( isset( $_GET['header_position'] ) ) {
        $absolutte_header_position = sanitize_text_field( wp_unslash( $_GET['header_position'] ) );
    }

    $header_image = "";
    if ( get_header_image() ) {
        $header_image = get_header_image();
    }

    $absolutte_header_margin = rwmb_meta( 'absolutte_header_margin' );
    if ( function_exists( 'is_shop' ) && is_shop() ) {
        $shop_id = get_option( 'woocommerce_shop_page_id' );
        $absolutte_header_margin = rwmb_meta( 'absolutte_header_margin', '', $shop_id );
    }
    if ( is_singular( array( 'product' ) ) || 'sidenav' == $absolutte_site_layout || 'header-side' == $absolutte_header_position ) {
        $absolutte_header_margin = 0;
    } elseif ( '' == $absolutte_header_margin ) {
        $absolutte_header_margin = 30;
    }

    if ( 'sidenav' == $absolutte_site_layout || 'header-2' == $absolutte_header_layout ):
        $absolutte_logo_container_classes = '';
    endif;
?>
<header id="header" class="site-header<?php echo ' ' . esc_attr( $absolutte_header_classes ); ?>"<?php echo ' ' . ( $header_image ) ? 'style="background-image: url(' . esc_url( $header_image ) . '); margin-bottom: ' . esc_attr( $absolutte_header_margin ) . 'px;"' : 'style=" margin-bottom: ' . esc_attr( $absolutte_header_margin ) . 'px;"'; ?>>

    <div class="absolutte-nav-btn-wrap">
        <button id="ql_nav_btn2" type="button" class="collapsed absolutte-nav-btn" data-toggle="collapse" data-target="#ql_nav_collapse" aria-expanded="false">
            <i class="fa fa-navicon"></i>
        </button>
    </div>

    <div class="absolutte-logo-wrap">
        <?php
            $logo = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="ql_logo">' . esc_html( get_bloginfo( 'name' ) ) . '</a><a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="absolutte-logo-small">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';

            $absolutte_logo_small = get_theme_mod( 'absolutte_logo_small', '' );
            $absolutte_logo_type = rwmb_meta( 'absolutte_logo_type' );

            if ( $absolutte_logo_small && has_custom_logo() ) {
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $image_logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
                $image_logo = $image_logo[0];

                if ( 'contrast' == $absolutte_logo_type ) {
                    $image_logo = get_theme_mod( 'absolutte_logo_contrast', '' );
                }

                $logo = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="ql_logo"><img src="' . esc_url( $image_logo ) . '" /></a><a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="absolutte-logo-small"><img src="' . esc_url( $absolutte_logo_small ) . '" /></a>';
            } elseif ( $absolutte_logo_small ) {
                $logo = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="absolutte-logo-small"><img src="' . esc_url( $absolutte_logo_small ) . '" /></a>';
            } elseif ( has_custom_logo() ) {
                $logo = get_custom_logo();
                if ( 'contrast' == $absolutte_logo_type ) {
                    $absolutte_logo_contrast = get_theme_mod( 'absolutte_logo_contrast', '' );
                    $logo = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="ql_logo"><img src="' . esc_url( $absolutte_logo_contrast ) . '" /></a>';
                }
            } elseif ( 'contrast' == $absolutte_logo_type ) {
                $absolutte_logo_contrast = get_theme_mod( 'absolutte_logo_contrast', '' );
                $logo = '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="ql_logo"><img src="' . esc_url( $absolutte_logo_contrast ) . '" /></a>';
            }
        ?>
<?php if ( is_front_page() ): ?>
            <h1 class="site-title"><?php echo wp_kses_post( $logo ); ?>&nbsp;</h1>
        <?php else: ?>
            <p class="site-title"><?php echo wp_kses_post( $logo ); ?></p>
        <?php endif; ?>

        <button id="absolutte-nav-btn" type="button" class="menu-toggle" data-toggle="collapse" aria-controls="primary-menu" aria-expanded="false">
            <i class="fa fa-navicon"></i>
        </button>
    </div><!-- /absolutte-logo-wrap -->


    <div class="absolutte-main-nav-wrap">
        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'absolutte' ); ?>">
            <?php

                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
            ) ); ?>
        </nav><!-- #site-navigation -->
    </div><!-- /absolutte-main-nav-wrap -->

</header>