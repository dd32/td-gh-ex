<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package star
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php
		if ( get_theme_mod('star_footer_screen_reader')<>"" ){
			echo '<h2 class="screen-reader-text">' . esc_html( get_theme_mod('star_footer_screen_reader') ) . '</h2>';
		}else{
		?>
			<h2 class="screen-reader-text"><?php _e( 'Footer Content', 'star' ); ?></h2>
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
			<nav class="social-menu" role="navigation" aria-label="<?php _e( 'Social Media', 'star' ); ?>">
				<?php wp_nav_menu( array( 'theme_location' => 'social',  'fallback_cb' => false, 'depth'=>1, 'link_before'=>'<span class="screen-reader-text">', 'link_after'=>'</span>') ); ?>
			</nav><!-- #social-menu -->
		<?php }; ?>


		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'star' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'star' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url( __( 'http://wptema.se/star', 'star' ) ); ?>" rel="nofollow"><?php printf( __( 'Theme: %1$s by Carolina', 'star' ), 'Star'); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
