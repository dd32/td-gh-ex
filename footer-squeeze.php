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
<?php do_action( 'before_sidebar' ); ?>
<?php if ( ! dynamic_sidebar( 'sidebar-4' ) ) : ?>
<?php endif; // end sidebar widget area ?>
</div>

<!--
<?php if( Kirki::get_option( 'bo', 'opt_menu_visibility' ) ) { 
$opt_menu_visibility = Kirki::get_option( 'bo', 'opt_menu_visibility' );
}
if ($opt_menu_visibility == 'option-1') {
?>
<div class="footer-navigation">
<?php wp_nav_menu( array( 'theme_location' => 'footer', 'depth' => 1 ) ); ?>
</div>
<?php	
}
?>
-->

<div class="site-info">
		<p>
		<?php 
		if( Kirki::get_option( 'bo', 'opt_copyright' ) ) { 
			$opt_copyright = Kirki::get_option( 'bo', 'opt_copyright' );
				echo balanceTags(wp_kses_data( $opt_copyright ));
		}
		?>
		</p>


	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'beam' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'beam' ), 'WordPress' ); ?></a>
		<span class="sep"> | </span>
	<?php printf( esc_html__( 'Runs on %1$s.', 'beam' ), '<a href="http://beamtheme.com/beam-wordpress-theme/">Beam Theme</a>' ); ?>


</div><!-- .site-info -->
</div><!-- #footer-center-->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>