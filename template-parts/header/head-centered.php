<?php
/**
 * The template file to display the centered header
 *
 * @package agncy
 */

add_filter( 'wp_nav_menu_items', 'center_menu_logo', 10, 2 ); ?>
<?php get_template_part( 'template-parts/header/contact-bar' ); ?>
<div class="container header-container">
	<div class="row header-row">
		<div class="col-sm-12 header-col">
			<?php get_template_part( 'template-parts/header/navigation' ); ?>
		</div>
	</div>
</div>
<?php remove_filter( 'wp_nav_menu_items', 'center_menu_logo', 10 ); ?>
