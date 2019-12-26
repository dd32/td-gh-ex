
    <nav id="for-mobile" role="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
        
        <div itemscope itemtype="http://schema.org/Organization">
            
            <meta itemprop="url" content="<?php echo esc_url( home_url( '/' ) ); ?>" />
        
            <img itemprop="logo" src="<?php echo get_theme_mod( 'nav_main_img_1' , get_template_directory_uri() . '/images/bison-schwarttzy-text-logo.png' ); ?>" class="nav-logo" />

            <div class="menu-trick" id="hide-moble">

                <a class="enable-drop-down" href="#for-mobile">Open<br>Menu</a>

                <a class="disable-drop-down" href="#hide-moble">Close<br>Menu</a>

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
            
            <li>Good Old Fashioned Hand Written <a href="<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'ThemeURI' );?>" title="<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'Name' );?> - v<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'Version' );?>">WordPress Theme</a> by <a href="<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'AuthorURI' );?>" title="Eric J Schwarz"><?php echo $my_theme->get( 'Author' );?></a></li>
        
        </ul>

    </nav>
