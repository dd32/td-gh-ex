<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astrid
 */

?>

		</div>
	</div><!-- #content -->

	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<?php get_sidebar('footer'); ?>
	<?php endif; ?>
	
	<?php $toggle_contact = get_theme_mod('toggle_contact_footer', 1); ?>
	<?php if ( $toggle_contact ) : ?>
	<div class="footer-info">
		<div class="container">
			<?php astrid__footer_branding(); ?>
			<?php astrid__footer_contact(); ?>
		</div>
	</div>
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">	
		<div class="site-info container">
			<nav id="footernav" class="footer-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'footer', 'depth' => '1', 'menu_id' => 'footer-menu' ) ); ?>
			</nav><!-- #site-navigation -->
			<div class="site-copyright">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'astrid' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'astrid' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'astrid' ), 'astrid', '<a href="http://athemes.com" rel="designer">aThemes</a>' ); ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
