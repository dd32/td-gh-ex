<?php
/**
* The template for displaying the footer.
*
* @package beam
*/
?>
	</div><!-- #content-inner -->
</div><!-- #content -->

<?php do_action( 'beam_before_footer' ); ?>
<footer id="colophon" class="site-footer">

	<?php if( Kirki::get_option( 'bo', 'opt_fwidget_visibility' ) ) {
		$opt_fwidget_visibility = Kirki::get_option( 'bo', 'opt_fwidget_visibility' );
	}
		if ($opt_fwidget_visibility == 'option-1') {
	?>
		<?php do_action( 'beam_before_footer_widget' ); ?>
		<div class="widget-wrap clear">
			<div class="centeralign-footer">
				<div id="footer-widget" class="widget-area-footer" role="complementary">

					<?php if ( ! dynamic_sidebar( 'sidebar-4' ) ) : ?>

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
			</div>
		</div>
	<?php do_action( 'beam_after_footer_widget' );
		}
		if( Kirki::get_option( 'bo', 'opt_menu_visibility' ) ) {
			$opt_menu_visibility = Kirki::get_option( 'bo', 'opt_menu_visibility' );
		}
		if ($opt_menu_visibility == 'option-1') {
	?>
	<?php do_action( 'beam_before_footer_nav' ); ?>
	<div class="nav-wrap clear">
		<div class="centeralign-footer">
			<div class="footer-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'depth' => 1 ) ); ?>
			</div>
		</div>
	</div>
	<?php do_action( 'beam_after_footer_nav' );
		}
	?>

	<div class="info-wrap clear">
		<div class="centeralign-footer">
            <div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'beam' ) ); ?>"><?php printf( 		esc_html__( 'Powered by %s', 'beam' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Runs on %1$s.', 'beam' ), '<a href="https://www.beamtheme.com/" target="_blank" rel="external nofollow">Beam Theme</a>' ); ?>
			</div><!-- .site-info -->
		</div><!-- .site-info -->
	</div><!-- #info-wrap-->
</footer><!-- #colophon -->
<?php do_action( 'beam_after_footer' ); ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
