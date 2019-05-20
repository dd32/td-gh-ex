<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arenabiz
 */

?>
	
	<?php
	get_sidebar( 'footer' );
			?>

	<footer id="colophon" class="site-footer">
	
	<div class="container">
	
	
		<div class="site-info">
			<?php esc_html_e( 'Copyright', 'arenabiz' ); ?> <?php echo esc_attr(date_i18n(__('Y','arenabiz'))); ?> <?php echo esc_html(get_theme_mod('arenabiz_footer_title')); ?> | <?php esc_html_e( 'Powered by', 'arenabiz' ); ?> <a href="http://www.wordpress.org"><?php esc_html_e( 'WordPress', 'arenabiz' ); ?></a> | <?php esc_html_e( 'arenabiz theme by', 'arenabiz' ); ?> <a href="https://www.themeszen.com"><?php esc_html_e( 'themeszen', 'arenabiz' ); ?></a>
		</div><!-- .site-info -->
		
	</div><!-- .container -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
