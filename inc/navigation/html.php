    <nav id="display-menu" role="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
        
        <div id="hide-menu">

            <div itemscope itemtype="http://schema.org/Organization">

                <a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    
                    <img itemprop="logo" src="<?php echo esc_url( get_theme_mod( 'nav_main_img_1' , get_template_directory_uri() . '/inc/navigation/images/navigation-semperfi-mousse-chocolate-lab-duck-schwarttzy.png' ) ); ?>" class="nav-logo" />
                
                </a>

                <div class="menu-trick">

                    <a class="enable-drop-down" href="#display-menu"><?php _e( 'Open' , 'semper-fi-lite' ); ?><br><?php _e( 'Menu' , 'semper-fi-lite' ); ?></a>

                    <a class="disable-drop-down" href="#hide-menu"><?php _e( 'Close' , 'semper-fi-lite' ); ?><br><?php _e( 'Menu' , 'semper-fi-lite' ); ?></a>

                </div>
    <?php do_action( 'semperfi_navigation_social_icons' ); ?>

            </div>
            <?php if ( has_nav_menu( 'touch_menu' ) ) :

                wp_nav_menu(
                    array(
                        'theme_location' => 'touch_menu',
                        'menu_class' => 'navigation',
                        'depth' => 2,
                        'container' => '' )
                );

            else :

                ?><ul class="navigation">
                <?php wp_list_pages(array('title_li' => '', 'depth' => '3')); ?>
            </ul><?php endif; ?>

            <ul class="navigation-widgets">

                <?php if (!dynamic_sidebar('menu widgets')) : ?><?php endif; ?>

                <li><?php $semperfi_them_info = wp_get_theme(); echo __( 'Good Old Fashioned Hand Written Code by ' , 'semper-fi-lite' ) . '<a href="' . $semperfi_them_info->get( 'AuthorURI' ) . '" title="Eric J Schwarz">' . $semperfi_them_info->get( 'Author' ) . '</a>'; ?></li>

            </ul>   
        
        </div>

    </nav>
