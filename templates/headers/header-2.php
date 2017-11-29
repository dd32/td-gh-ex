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
<div id="header-style-2">
    <header id="header-2" class="header navigation2">
        <!-- small menu -->
        <div class="small-menu <?php echo $nav_width; ?>">
            <div class="<?php echo $content_layout; ?> header-contents">
                <div class="row">
                    <div class="col-8">
                        <ul class="list-inline info-link">
                            <li class="list-inline-item" title="Email"><i class="fa fa-envelope"></i><span
                                        class="hidden-xs-up"><a
                                            href="mailto:<?php echo esc_attr( AttireThemeEngine::NextGetOption( 'contact_email', 'contact@example.com' ) ); ?>"><?php echo sanitize_text_field( AttireThemeEngine::NextGetOption( 'contact_email', 'contact@example.com' ) ); ?></a></span>
                            </li>
                            <li class="list-inline-item" title="Hot Line"><i class="fa fa-phone-square"></i><span
                                        class="hidden-xs-up"><?php echo sanitize_text_field( AttireThemeEngine::NextGetOption( 'contact_phone', '(123) 456-7890' ) ); ?></span>
                            </li>
                        </ul>
                    </div>

                    <div class="col">
                        <ul class="list-inline float-right social-link">
	                        <?php if ( isset( $theme_mod['facebook_profile_url'] ) && $theme_mod['facebook_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                                href="<?php echo esc_url( $theme_mod['facebook_profile_url'] ); ?>"><i
                                                class="fa fa-facebook"></i></a></li>
	                        <?php }
	                        if ( isset( $theme_mod['instagram_profile_url'] ) && $theme_mod['instagram_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                                href="<?php echo esc_url( $theme_mod['instagram_profile_url'] ); ?>"><i
                                                class="fa fa-instagram"></i></a></li>
	                        <?php }
	                        if ( isset( $theme_mod['googleplus_profile_url'] ) && $theme_mod['googleplus_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                                href="<?php echo esc_url( $theme_mod['googleplus_profile_url'] ); ?>"><i
                                                class="fa fa-google-plus"></i></a></li>
	                        <?php }
	                        if ( isset( $theme_mod['twitter_profile_url'] ) && $theme_mod['twitter_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                                href="<?php echo esc_url( $theme_mod['twitter_profile_url'] ); ?>"><i
                                                class="fa fa-twitter"></i></a></li>
	                        <?php }
	                        if ( isset( $theme_mod['pinterest_profile_url'] ) && $theme_mod['pinterest_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                                href="<?php echo esc_url( $theme_mod['pinterest_profile_url'] ); ?>"><i
                                                class="fa fa-pinterest"></i></a></li>
	                        <?php }
	                        if ( isset( $theme_mod['linkedin_profile_url'] ) && $theme_mod['linkedin_profile_url'] !== '' ) { ?>
                                <li class="list-inline-item"><a class="social-link" rel="nofollow" target="_blank"
                                                                href="<?php echo esc_url( $theme_mod['linkedin_profile_url'] ); ?>"><i
                                                class="fa fa-linkedin"></i></a></li>
	                        <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- small menu -->
        <!-- default nav -->
        <nav class="short-nav navbar navbar-expand-lg navbar-light default-menu <?php echo $stickable . ' ' . $nav_width; ?>">
            <div class="<?php echo $content_layout; ?> header-contents">
                <!-- Icon+Text & Image Logo Default Image Logo -->
                <div class="logo-div">
                    <h1 class="logo-header">
                        <a class="site-logo navbar-brand default-logo"
                           href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo AttireThemeEngine::SiteLogo(); ?></a>
                    </h1>
					<?php $description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
                        <h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
						<?php
					endif; ?>
                </div>
                <button class="col-lg-1 navbar-toggler float-right" type="button" data-toggle="collapse"
                        data-target="#header2_menu"
                        aria-controls="header2_menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="mobile-menu-toggle"><i class="fa fa-bars " aria-hidden="true"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="header2_menu">
					<?php


					if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
						require get_template_directory() . '/libs/wp_bootstrap_navwalker.php';
					}
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'depth'          => 0,
						'menu_class'     => 'nav navbar-nav mainmenu ml-auto',
						'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
						'walker'         => new wp_bootstrap_navwalker()
					) );

					?>
                    <ul class="nav navbar-nav ul-search">
                        <li class="mobile-search">
                            <form class="navbar-left nav-search nav-search-form"
                                  action="<?php echo home_url( '/' ); ?>" role="search" method="get">
                                <div class="form-inline">
                                    <input name="post_type" value="post" type="hidden">
                                    <div class="input-group">
                                        <input type="search" required="required"
                                               class="search-field form-control"
                                               value="" name="s" title="Search for:"/>
                                        <span class="input-group-addon" id="basic-addon2">
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
                                          action="<?php echo home_url( '/' ); ?>" role="search" method="get">
                                        <div class="form-inline">
                                            <input name="post_type" value="post"
                                                   type="hidden">
                                            <input type="search" class="search-field form-control"
                                                   value="" name="s"
                                                   title="Search for:"/>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav><!-- end default nav -->

        <!-- /.navbar -->
    </header>
</div>
