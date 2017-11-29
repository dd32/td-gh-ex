<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$theme_mod      = get_option( 'attire_options' );
$content_layout = $theme_mod['header_content_layout_type'];
$nav_width      = isset( $theme_mod['main_layout_type'] ) ? $theme_mod['main_layout_type'] : 'container-fluid'; // For sticky menu to match site width

$stickable = '';
if ( isset( $theme_mod['attire_nav_behavior'] ) && $theme_mod['attire_nav_behavior'] === 'sticky' ) {
	$stickable = ' stickable';
}
?>
<div id="header-style-1">
    <header id="header-1" class="header navigation1">
        <div class="middle-header">
            <div class="<?php echo $content_layout . ' ' . $nav_width; ?> header-contents">
                <div class="row justify-content-between">
                    <div class="col-lg-auto logo-div">
                        <!-- Icon+Text & Image Logo Default Image Logo -->
                        <div class="middle-logo logo-div">
                            <h1 class="logo-header">
                                <a class="site-logo navbar-brand"
                                   href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo AttireThemeEngine::SiteLogo(); ?></a>
                            </h1>
							<?php $description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
                                <h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
								<?php
							endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-auto social-icons-div">
                        <ul class="list-inline middle-social-icon">
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
        <nav class="long-nav navbar navbar-expand-lg navbar-light navbar-dark default-menu justify-content-between <?php echo $stickable . ' ' . $nav_width; ?>">
            <div class="<?php echo $content_layout; ?> header-contents">
                <button class="col-lg-1 navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#header1_menu" aria-controls="header1_menu" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="mobile-menu-toggle"><i class="fa fa-bars " aria-hidden="true"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="header1_menu">

					<?php
					if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
						require get_template_directory() . '/libs/wp_bootstrap_navwalker.php';
					}
					wp_nav_menu( array(
							'theme_location' => 'primary',
							'depth'          => 0,
							'container'      => false,
							'menu_class'     => 'nav navbar-nav mainmenu ',
							'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
							'walker'         => new wp_bootstrap_navwalker()
						)
					);

					?>
                    <ul class="nav navbar-nav ml-auto ul-search">
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
        </nav>
    </header>
</div>


