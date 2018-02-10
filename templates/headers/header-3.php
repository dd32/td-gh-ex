<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_mod      = get_option( 'attire_options' );
$content_layout = $theme_mod['header_content_layout_type'];
$nav_width      = isset( $theme_mod['main_layout_type'] ) ? $theme_mod['main_layout_type'] : 'container-fluid'; // For sticky menu to match site width
$stickable      = '';
if ( isset( $theme_mod['attire_nav_behavior'] ) && $theme_mod['attire_nav_behavior'] === 'sticky' ) {
	$stickable = ' stickable';
}
?>
<div id="header-style-3">
    <header id="header-3" class="header navigation3">
        <nav class="short-nav navbar navbar-expand-lg navbar-light navbar-dark default-menu justify-content-between <?php echo esc_attr( $stickable . ' ' . $nav_width ); ?>">
            <div class="<?php echo esc_attr( $content_layout ); ?> header-contents">
                <!-- Icon+Text & Image Logo Default Image Logo -->
                <div class="logo-div">
                    <a class="navbar-brand default-logo site-logo"
                       href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo AttireThemeEngine::SiteLogo(); ?></a>
					<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
                        <h2 class="site-description"><?php echo wp_kses_post( $description ); /* WPCS: xss ok. */ ?></h2>
					<?php
					endif; ?>
                </div>

                <button class="col-lg-1 navbar-toggler float-right" type="button" data-toggle="collapse"
                        data-target="#header3_menu"
                        aria-controls="header3_menu" aria-expanded="false"
                        aria-label="<?php _e( 'Toggle navigation', 'attire' ); ?>">
                    <span class="mobile-menu-toggle"><i class="fa fa-bars " aria-hidden="true"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="header3_menu">

					<?php


					if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
						require get_template_directory() . '/libs/wp_bootstrap_navwalker.php';
					}
					wp_nav_menu( array(
							'theme_location' => 'primary',
							'depth'          => 0,
							'container'      => false,
							'menu_class'     => 'nav navbar-nav mainmenu ml-auto ',
							'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
							'walker'         => new wp_bootstrap_navwalker()
						)
					);

					?>
                    <ul class="nav navbar-nav ul-search">
                        <li class="mobile-search">
                            <form class="navbar-left nav-search nav-search-form"
                                  action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" method="get">
                                <div class="form-inline">
                                    <input name="post_type" value="post" type="hidden">
                                    <div class="input-group">
                                        <input type="search" required="required"
                                               class="search-field form-control"
                                               value="" name="s" title="<?php _e( 'Search for:', 'attire' ); ?>"/>
                                        <span class="input-group-addon" id="mobile-search-icon">
                                                <button type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li class="dropdown nav-item desktop-search">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-search"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right list-search">
                                <li class="dropdown-item">
                                    <form class="navbar-left nav-search search-form"
                                          action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" method="get">
                                        <div class="form-inline">
                                            <input name="post_type" value="post"
                                                   type="hidden">
                                            <input type="search" class="search-field form-control"
                                                   value="" name="s"
                                                   title="<?php _e( 'Search for:', 'attire' ); ?>"/>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><!-- end default nav -->
    </header>

</div>


