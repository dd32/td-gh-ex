    <nav id="display-menu" role="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
        
        <div id="hide-menu">

            <div itemscope itemtype="http://schema.org/Organization">

                <a aria-label="<?php esc_attr_e( 'Link to home page of ' , 'semper-fi-lite' ); ?> <?php esc_html( bloginfo('name') ); ?>" itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
                    
                    <img itemprop="logo" src="<?php semper_fi_lite_image( 'nav_main_img_1' , '/inc/navigation/images/navigation-semperfi-mousse-chocolate-lab-duck-schwarttzy-250x250.png' , 350 , 100 ); ?>" alt="<?php esc_attr_e( 'Website Image Logo for' , 'semper-fi-lite' ); ?> <?php esc_html( bloginfo('name') ); ?>" />
                
                </a>

                <div class="menu-trick">

                    <a aria-label="<?php esc_attr_e( 'This button locks the menu open' , 'semper-fi-lite' ); ?>" class="enable-drop-down"><?php _e( 'Open' , 'semper-fi-lite' ); ?><br><?php esc_html_e( 'Menu' , 'semper-fi-lite' ); ?></a>
                    
                </div>
    <?php do_action( 'semper_fi_lite_navigation_social_icons' ); ?>

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

                ?>
            
            <ul class="navigation">
                
                <?php wp_list_pages(array('title_li' => '', 'depth' => '3')); ?>
                
            </ul><?php endif; ?>

            
            <ul class="navigation-widgets">
                <?php if (!dynamic_sidebar('menu widgets')) : ?><?php endif; ?>

                <li><?php $semper_fi_lite_them_info = wp_get_theme(); echo esc_html( 'Good Old Fashioned Hand Written Code by ' , 'semper-fi-lite' ) . '<a aria-label="' . esc_attr__( 'Link to Eric J Schwarz website, the author of this website design' , 'semper-fi-lite' ) . '" href="' . esc_url( $semper_fi_lite_them_info->get( 'AuthorURI' ) ) . '" title="' . esc_attr__( 'Eric J Schwarz' , 'semper-fi-lite' ) . '">' . esc_attr( $semper_fi_lite_them_info->get( 'Author' ) ) . '</a>'; ?></li>

            </ul>   
        
        </div>

    </nav>
