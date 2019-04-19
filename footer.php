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
			<?php _e( 'Copyright', 'arenabiz' ); ?> <?php echo date_i18n(__('Y','arenabiz')); ?> <?php echo esc_html(arenabiz_get_option('arenabiz_footertext')); ?> | <?php _e( 'Powered by', 'arenabiz' ); ?> <a href="http://www.wordpress.org"><?php _e( 'WordPress', 'arenabiz' ); ?></a> | <?php _e( 'arenabiz theme by', 'arenabiz' ); ?> <a href="https://www.arenabiz.com"><?php _e( 'arenabiz', 'arenabiz' ); ?></a>
		</div><!-- .site-info -->
		
	</div><!-- .container -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
