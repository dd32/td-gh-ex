<ul id="attire-mbl-menu" class="attire-mbl-menu-main">
    <li class="gn-trigger">
        <div class="row justify-content-between attire-mbl-header">
            <a class="gn-icon gn-icon-menu">
                <i class="fa fa-bars fa-2x"></i>
            </a>
            <a class="mbl-logo"
               href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo AttireThemeEngine::SiteLogo(); ?></a>
        </div>
        <nav class="attire-mbl-menu-wrapper">
            <div class="gn-scroller">
				<?php
				if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
					require get_template_directory() . '/libs/wp_bootstrap_navwalker.php';
				}
				wp_nav_menu( array(
						'theme_location' => 'primary',
						'depth'          => 0,
						'container'      => false,
						'menu_class'     => 'attire-mbl-menu navbar-nav',
						'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
						'walker'         => new wp_bootstrap_navwalker()
					)
				);
				?>
            </div><!-- /gn-scroller -->
        </nav>
    </li>
</ul>