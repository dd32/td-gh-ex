<?php
global $cx_framework_options; ?>
    <header id="masthead" class="site-header <?php echo esc_attr( $cx_framework_options['cx-options-header-layout'] ) ?> <?php echo ( $cx_framework_options['cx-options-search'] == 1 ) ? '' : 'bg-left'; ?>" role="banner">
        <div class="site-top-bar site-pad">
            <div class="site-container">
                <div class="site-top-bar-left">
                    <?php wp_nav_menu( array( 'theme_location' => 'header-bar-menu' ) ); ?>
                </div>
                <div class="site-top-bar-right">
                    <?php get_template_part( '/includes/inc/social-links' ); ?>
                </div>
                <div class="clearboth"></div>
            </div>
        </div>
        <div class="header-bar site-pad">
            <div class="site-container">
                <div class="header-bar-inner">
                    <div class="site-branding">
                        <?php if ( get_header_image() ) : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php esc_url(header_image()); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" /></a>
                        <?php else : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="site-header-right">
                        <div class="site-social">
                            <?php if ( $cx_framework_options['cx-options-header-details-address'] ) : ?>
                            <i class="fa fa-map-marker"></i> <?php echo wp_kses_post( $cx_framework_options['cx-options-header-details-address'] ) ?>
                            <?php endif; ?>
                            
                            <?php if ( $cx_framework_options['cx-options-header-details-email'] ) : ?>
                            <i class="fa fa-envelope-o"></i> <a href="<?php echo esc_url( 'mailto:' . antispambot( $cx_framework_options['cx-options-header-details-email'], 1 ) ); ?>"><?php echo esc_html_e( 'Email Us' ) ?></a>
                            <?php endif; ?>
                            
                            <?php if ( $cx_framework_options['cx-options-header-details-phone'] ) : ?>
                            <i class="fa fa-phone"></i> <?php echo wp_kses_post( $cx_framework_options['cx-options-header-details-phone'] ) ?>
                            <?php endif; ?>
                            
                            <?php if ( $cx_framework_options['cx-options-search'] == 1 ) : ?>
                            <div class="search-button">
                                <i class="fa fa-search"></i>
                            </div>
                            <?php endif; ?>
                        </div>
                        <nav id="site-navigation" class="navigation-main" role="navigation">
                            <h1 class="menu-toggle"><?php _e( 'Menu', 'alba' ); ?></h1>
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