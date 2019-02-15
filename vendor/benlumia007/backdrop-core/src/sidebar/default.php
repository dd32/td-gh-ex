<?php
/**
 *  Backdrop Core (primary.php)
 *
 *  @package        Backdrop Core
 *  @copyright      Copyright (C) 2018. Benjamin Lu
 *  @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 *  @author         Benjamin Lu (https://getbenonit.com)
 * ************************************************************************************************************************
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Sidebar;

/**
 *  Table of Content
 *
 *  1.0 - Sidebar (Primary)
 */
/**
 *  1.0 - Sidebar (Primary)
 *
 * @param string $sidebar Out put sidebar.
 */
function display( $sidebar = '' ) { ?>
	<div id="widget-area" class="widget-area">
		<?php
		if ( 'primary' === $sidebar ) {
			! dynamic_sidebar( 'primary-sidebar' );
		} elseif ( 'secondary' === $sidebar ) {
			! dynamic_sidebar( 'secondary-sidebar' );
		} elseif ( 'custom' === $sidebar ) {
			! dynamic_sidebar( 'custom-sidebar' );
		}
		?>
		<?php
			the_widget(
				'WP_Widget_Categories',
				array(
					'dropdown'     => false,
					'hierarchical' => true,
				),
				array(
					'before_widget' => '<aside id="widget" class="widget widget_categories">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);
		?>

		<?php
			the_widget(
				'WP_Widget_Tag_Cloud',
				array(),
				array(
					'before_widget' => '<aside id="widget" class="widget widget_tag_cloud">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);
		?>

		<?php
			the_widget(
				'WP_Widget_Meta',
				array(),
				array(
					'before_widget' => '<aside id="widget" class="widget widget_meta">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);
		?>
	</div>
	<?php
}
