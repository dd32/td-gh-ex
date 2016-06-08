<?php
/**
* Sidebar Left, Content Right
*
* @package beam
*/
?>

<?php 
	if( Kirki::get_option( 'bo', 'opt_layout' ) ) { 
		$opt_layout = Kirki::get_option( 'bo', 'opt_layout' );
					if ( $opt_layout == '4') {
?>
	<div id="tertiary" class="widget-area">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>

	<aside id="search" class="widget widget_search">
	<?php get_search_form(); ?>
	</aside>

	<aside id="archives" class="widget">
		<span class="widget-title"><?php _e( 'Archives', 'beam' ); ?></span>
		<ul>
		<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
		</ul>
	</aside>

	<aside id="meta" class="widget">
		<span class="widget-title"><?php _e( 'Meta', 'beam' ); ?></span>
		<ul>
			<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</aside>

	<?php endif; // end sidebar widget area ?>
	</div>
<?php } ?>