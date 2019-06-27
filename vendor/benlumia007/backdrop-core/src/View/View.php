<?php //phpcs:ignore
/**
 * Backdrop Core ( framework.php )
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\View;

use Benlumia007\Backdrop\Contracts\Viewable;
/**
 * Site extends SiteContract
 */
class View implements Viewable {
	/**
	 * Displayable
	 *
	 * @since        1.0.0
	 * @access       public
	 * @param string $type output type menu, loop, and sidebar.
	 * @param array  $items an array of ids to display.
	 */
	public static function display( $type, $items = [] ) {
		foreach ( $items as $item ) {
			switch ( $type ) {
				case 'sidebar': ?>
					<div id="aside" class="widget-area">
						<?php dynamic_sidebar( $item ); ?>
					</div>
					<?php
					break;
				case 'menu':
					menu_display( $item );
					break;
				default:
					break;
			}
		}
	}
}

/**
 * The menu_display();
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function menu_display( $item ) {
	if ( 'primary' === $item ) {
		if ( has_nav_menu( 'primary' ) ) { ?>
			<div class="main-navigation">
				<nav id="site-navigation" class="primary-navigation">
					<button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'backdrop-core' ); ?></button>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'menu_class'     => 'nav-menu',
								'depth'			 => 2,
							)
						);
					?>
				</nav>
			</div>
		<?php }
	} elseif ( 'social' === $item ) {
		if ( has_nav_menu( 'social' ) ) { ?>
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
		<?php }
	}
}
