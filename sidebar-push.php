<?php
/**
 * The push sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ansia
 */
?>
<div class="ansia-subbar">
	<?php if (is_active_sidebar( 'sidebar-push' ) ) : ?>
		<div class="ansia-sidebar-button">
			<div class="ansia-absolute">
				<div class="hamburger">
				  <div class="hamburger-box hamburger--spin">
					<div class="hamburger-inner"></div>
				  </div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if(ansia_options('_search_button', '1')) : ?>
		<div class="ansia-search-button">
			<div class="ansia-absolute">
				<div class="asbutton">
				</div>
				<div class="search-container">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php 
	$showInSidebar =  ansia_options('_social_show_push', '1');
	if ($showInSidebar == 1) {
		ansia_show_social_network('sidebar');
	} ?>
</div>
<div class="ansia-bar">
	<?php if (is_active_sidebar( 'sidebar-push' ) ) : ?>
		<aside id="tertiary" class="widget-area nano">
			<div class="nano-content"><?php dynamic_sidebar( 'sidebar-push' ); ?></div>
		</aside><!-- #secondary -->
	<?php endif; ?>
</div>
<div class="opacityBox"></div>