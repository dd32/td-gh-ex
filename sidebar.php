<?php
/**
 * The sidebars containing the main widget areas.
 *
 * @package aaron
 */

//If we are viewing the front page or the blog index, and if the front page sidebar is active: show the front page sidebar.
if ( is_front_page() || is_home() ) {
	if ( is_active_sidebar( 'sidebar-front' )  ) {
	?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php
		if ( get_theme_mod('aaron_sidebar_screen_reader')<>"" ){
			echo '<h2 class="screen-reader-text">' . esc_html( get_theme_mod('aaron_sidebar_screen_reader') ) . '</h2>';
		}else{
			echo '<h2 class="screen-reader-text">' . esc_html( 'Sidebar', 'aaron' ) . '</h2>';
		}
		dynamic_sidebar( 'sidebar-front' ); 
		?>
	</div><!-- #secondary -->
<?php
	}
}else{
	//If we are viewing any other page, display the regular sidebar, but only if it is active.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
	?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php
		if ( get_theme_mod('aaron_sidebar_screen_reader')<>"" ){
			echo '<h2 class="screen-reader-text">' . esc_html( get_theme_mod('aaron_sidebar_screen_reader') ) . '</h2>';
		}else{
			echo '<h2 class="screen-reader-text">' . esc_html( 'Sidebar', 'aaron' ) . '</h2>';
		}
		dynamic_sidebar( 'sidebar-1' ); 
		?>
	</div><!-- #secondary -->
<?php
}
?>
