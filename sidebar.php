<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AcmeThemes
 * @subpackage AcmePhoto
 */

if ( ! is_active_sidebar( 'acmephoto-sidebar' ) ) {
	return;
}
$sidebar_layout = acmephoto_sidebar_selection();
if( $sidebar_layout == "right-sidebar" || empty( $sidebar_layout ) ) : ?>
	<div id="secondary-right" class="widget-area sidebar secondary-sidebar init-animate fadeInDown animated" role="complementary">
		<div id="sidebar-section-top" class="widget-area sidebar clearfix">
			<?php dynamic_sidebar( 'acmephoto-sidebar' ); ?>
		</div>
	</div>
<?php endif; ?>
