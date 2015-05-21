<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package aaron
 */
?>



	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php
		if ( get_theme_mod('aaron_footer_screen_reader')<>"" ){
			echo '<h2 class="screen-reader-text">' . esc_html( get_theme_mod('aaron_footer_screen_reader') ) . '</h2>';
		}else{
		?>
			<h2 class="screen-reader-text"><?php _e( 'Footer Content', 'aaron' ); ?></h2>
		<?php 
		}
	
		if ( is_active_sidebar( 'sidebar-2' ) ) {
			?>
			<div class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div><!-- #secondary -->
		<?php
		}
		
		if ( has_nav_menu( 'social' ) ){ ?>
			<nav class="social-menu" role="navigation" aria-label="<?php _e( 'Social Media', 'aaron' ); ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'social',  'fallback_cb' => false, 'depth'=>1, 'link_before'=>'<span class="screen-reader-text">', 'link_after'=>'</span>') ); ?>
			</nav><!-- #social-menu -->
		<?php }; ?>


		<div class="site-info">
			<?php
			if ( is_active_sidebar( 'sidebar-copyright' ) ) {
				 dynamic_sidebar( 'sidebar-copyright' ); 
			}
			?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'aaron' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'aaron' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url('http://wptema.se/aaron'); ?>" rel="nofollow"><?php printf( __( 'Theme: %1$s by Carolina', 'aaron' ), 'Aaron'); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
