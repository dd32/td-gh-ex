<?php
/**
 * Backdrop Core (primary.php)
 *
 * @package        Backdrop
 * @copyright      Copyright (C) 2018. Benjamin Lu
 * @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author         Benjamin Lu (https://getbenonit.com)
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Menu;

/**
 *  Table of Content
 *
 *  1.0 - Primary Menu
 */

/**
 *  1.0 - Primary Menu
 *
 * @param string $feature display menus.
 */
function display( $feature = '' ) {
	if ( 'primary' === $feature ) {
		if ( has_nav_menu( 'primary' ) ) { ?>
			<div class="main-navigation">
				<nav id="site-navigation" class="primary-navigation">
					<button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'auspicious' ); ?></button>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'nav-menu',
							)
						);
					?>
				</nav>
			</div>
			<?php
		}
	} elseif ( 'secondary' === $feature ) {
		if ( has_nav_menu( 'secondary' ) ) {
			?>
			<div class="main-navigation">
				<nav id="site-navigation" class="secondary-navigation">
					<button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'auspicious' ); ?></button>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'nav-menu',
								'depth'          => '1',
							)
						);
					?>
				</nav>
			</div>
			<?php
		}
	} elseif ( 'social' === $feature ) {
		if ( has_nav_menu( 'social' ) ) {
			?>
			<nav id="site-social" class="site-social">
				<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'social',
							'container'       => 'nav',
							'container_id'    => 'menu-social',
							'container_class' => 'menu-social',
							'menu_id'         => 'menu-social-items',
							'menu_class'      => 'menu-items',
							'depth'           => 1,
							'link_before'     => '<span class="screen-reader-text">',
							'link_after'      => '</span>',
							'fallback_cb'     => '',
						)
					);
				?>
			</nav>
			<?php
		}
	}
}
