<?php
/**
 * The offcanvas right sidebar.
 *
 * @package WordPress
 * @subpackage Abacus
 * @since Abacus 1.0
 */
?>
	<div id="sidebar" class="cols cols-4" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
			<aside id="meta" class="widget">
				<h3 class="widget-title"><?php _e( 'Default Widget', 'abacus' ); ?></h3>
				<p><?php printf( __( 'This is just a default widget. It\'ll disappear as soon as you add your own widgets on the %sWidgets admin page%s.', 'abacus' ), '<a href="' . admin_url( 'widgets.php' ) . '">', '</a>' ); ?></p>

				<p><?php _e( 'Below is an example of an unordered list.', 'abacus' ); ?></p>
				<ul>
					<li><?php _e( 'List item one', 'abacus' ); ?></li>
					<li><?php _e( 'List item two', 'abacus' ); ?></li>
					<li><?php _e( 'List item three', 'abacus' ); ?></li>
					<li><?php _e( 'List item four', 'abacus' ); ?></li>
				</ul>
			</aside>
		<?php endif; ?>
	</div><!-- #sidebar -->