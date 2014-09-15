<?php
global $cx_framework_options; ?>
    <header id="masthead" class="site-header site-header-one <?php echo ($cx_framework_options['cx-options-search'] == 1) ? '' : 'bg-left'; ?><?php echo ($cx_framework_options['cx-options-site-type'] == 'site-layout-boxed') ? ' header-boxed-in' : ''; ?>" role="banner">
        <div class="header-bar site-pad<?php echo ($cx_framework_options['cx-options-sticky-header']) ? ' stick-header' : ''; ?>">
            <div class="site-container">
                <div class="header-bar-inner">
                    <div class="site-branding">
                        <?php if ( get_header_image() ) : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php esc_url(header_image()); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" /></a>
                        <?php else : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                            <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ( $cx_framework_options['cx-options-search'] ) : ?>
                    <div class="search-button">
                        <i class="fa fa-search"></i>
                    </div>
                    <?php endif; ?>
                    
                    <div class="site-header-right">
                        <nav id="site-navigation" class="navigation-main" role="navigation">
                            <h1 class="menu-toggle"><?php _e( 'Menu', 'conica' ); ?></h1>
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