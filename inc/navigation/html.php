
    <nav id="for-mobile" role="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
        
        <div itemscope itemtype="http://schema.org/Organization">
            
            <meta itemprop="url" content="<?php echo esc_url( home_url( '/' ) ); ?>" />
        
            <img itemprop="logo" src="<?php echo esc_url( get_theme_mod( 'nav_main_img_1' , get_template_directory_uri() . '/inc/navigation/images/default-naviagtion-moose-image.png' ) ); ?>" class="nav-logo" />

            <div class="menu-trick" id="hide-moble">

                <a class="enable-drop-down" href="#for-mobile"><?php _e( 'Open' , 'semper-fi-lite' ); ?><br><?php _e( 'Menu' , 'semper-fi-lite' ); ?></a>

                <a class="disable-drop-down" href="#hide-moble"><?php _e( 'Close' , 'semper-fi-lite' ); ?><br><?php _e( 'Menu' , 'semper-fi-lite' ); ?></a>

            </div>
<?php do_action('navigation_social_icons'); ?>
            
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
            
            <li><?php $my_theme = wp_get_theme(); echo __( 'Good Old Fashioned Hand Written Code by' , 'semper-fi-lite' ) . '<a href="' . $my_theme->get( 'AuthorURI' ) . '" title="Eric J Schwarz">' . $my_theme->get( 'Author' ) . '</a>'; ?></li>
        
        </ul>

    </nav>
