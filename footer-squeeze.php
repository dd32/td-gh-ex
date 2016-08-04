<?php
/**
* The template for displaying the footer in Squeeze One Template.
*
* @package beam
*/
?>
	</div><!-- #content-inner -->
</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="centeralign-footer">

			<div id="" class="widget-area-footer" role="complementary">

			<?php 
			if ( ! dynamic_sidebar( 'sidebar-4' ) ) :
			endif; // end sidebar widget area ?>

			</div>

			<div class="site-info">
				<p>
					<?php 
					if( Kirki::get_option( 'bo', 'opt_copyright' ) ) { 
						$opt_copyright = Kirki::get_option( 'bo', 'opt_copyright' );
							echo balanceTags(wp_kses_data( $opt_copyright ));
					}
					?>
				</p>

				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'beam' ) ); ?>"><?php printf( esc_html_e( 'Powered by %s', 'beam' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html_e( 'Runs on %1$s.', 'beam' ), '<a href="http://beamtheme.com/beam-wordpress-theme/">Beam Theme</a>' ); ?>

			</div><!-- .site-info -->
			
		</div><!-- #footer-center-->
		
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>