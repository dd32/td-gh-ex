<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package aaron
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}


if ( 'page' == get_option( 'show_on_front' ) && get_theme_mod('aaron_front_sidebar')==="" ){
	return;

}else{

	 if ( is_front_page() && get_theme_mod('aaron_front_sidebar') <>"" || is_page() && get_theme_mod('aaron_show_sidebar_on_pages')<>"" || !is_front_page() && is_home() || is_single() || is_archive() || is_search() || is_404() ) {	
		?>

		<div id="secondary" class="widget-area" role="complementary">
			<?php
			if ( get_theme_mod('aaron_sidebar_screen_reader')<>"" ){
				echo '<h2 class="screen-reader-text">' . esc_html( get_theme_mod('aaron_sidebar_screen_reader') ) . '</h2>';
			}else{
			?>
				<h2 class="screen-reader-text"><?php _e( 'Sidebar', 'aaron' ); ?></h2>
			<?php 
			}

			dynamic_sidebar( 'sidebar-1' ); 
			?>
		</div><!-- #secondary -->

	<?php
	}
}
?>
