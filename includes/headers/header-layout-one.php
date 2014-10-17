<?php
$site_social = '';

if ( ( kaira_theme_option( 'kra-social-email' ) == '' ) && ( kaira_theme_option( 'kra-social-skype' ) == '' ) && ( kaira_theme_option( 'kra-social-facebook' ) == '' ) && ( kaira_theme_option( 'kra-social-twitter' ) == '' ) && ( kaira_theme_option( 'kra-social-google-plus' ) == '' ) && ( kaira_theme_option( 'kra-social-youtube' ) == '' ) && ( kaira_theme_option( 'kra-social-instagram' ) == '' ) && ( kaira_theme_option( 'kra-social-pinterest' ) == '' ) && ( kaira_theme_option( 'kra-social-linkedin' ) == '' ) && ( kaira_theme_option( 'kra-social-tumblr' ) == '' ) && ( kaira_theme_option( 'kra-social-flickr' ) == '' ) ) :
    $site_social = ' header-nosocial';
endif; ?>
    <header id="masthead" class="site-header site-header-one <?php echo ( kaira_theme_option( 'kra-header-search' ) == 1 ) ? '' : 'bg-left'; ?><?php echo $site_social; ?><?php echo ( kaira_theme_option( 'kra-website-layout' ) == 'site-layout-boxed' ) ? ' header-boxed-in' : ''; ?>" role="banner">
        <div class="site-top-bar site-pad">
            <div class="site-container">
                <?php if ( kaira_theme_option( 'kra-website-txt-address' ) ) : ?>
                <div class="site-top-bar-left">
                    <i class="fa fa-map-marker"></i> <?php echo wp_kses_post( kaira_theme_option( 'kra-website-txt-address' ) ) ?>
                </div>
                <?php endif; ?>
                <div class="site-top-bar-right">
                    <?php if ( kaira_theme_option( 'kra-website-txt-email' ) ) : ?>
                    <i class="fa fa-envelope-o"></i> <a href="<?php echo esc_url( 'mailto:' . antispambot( kaira_theme_option( 'kra-website-txt-email' ), 1 ) ) ?>"><?php echo esc_html_e( 'Email Us' ) ?></a>
                    <?php endif; ?>
                    
                    <?php if ( kaira_theme_option( 'kra-website-txt-phone' ) ) : ?>
                    <i class="fa fa-phone"></i> <?php echo wp_kses_post( kaira_theme_option( 'kra-website-txt-phone' ) ) ?>
                    <?php endif; ?>
                    
                    <?php if ( kaira_theme_option( 'kra-header-search' ) == 1 ) : ?>
                    <div class="search-button">
                        <i class="fa fa-search"></i>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="clearboth"></div>
            </div>
        </div>
        <div class="header-bar site-pad">
            <div class="site-container">
                <div class="header-bar-inner">
                    <div class="site-branding">
                        <?php if( get_header_image() ) : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php esc_url( header_image() ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" /></a>
                        <?php else : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                            <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="site-header-right">
                        <div class="site-social">
                            <?php get_template_part( '/includes/inc/social-links' ); ?>
                        </div>
                        <nav id="site-navigation" class="navigation-main" role="navigation">
                            <h1 class="menu-toggle"><?php _e( 'Menu', 'albar' ); ?></h1>
                            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                        </nav><!-- #site-navigation -->
                    </div>
                    <div class="clearboth"></div>
                </div>
                <div class="search-block">
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
        <div class="clearboth"></div>
    </header><!-- #masthead -->