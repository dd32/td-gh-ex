<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arena
 */

?>

<?php
		if (! is_front_page() && !is_home() ) { ?>

</div><!-- .inner-wrapper -->

			</div><!-- .container -->

	</div><!-- #content -->
	
	<?php } ?>
	
	<?php
		if ( is_home() ) { ?>

</div><!-- .inner-wrapper -->

			</div><!-- .container -->

	</div><!-- #content -->
	
	<?php } ?>
	
	<?php
	get_sidebar( 'footer' );
			?>

	<footer id="colophon" class="site-footer">
	
	<div class="container">
	
	
		<div class="site-info">
			<?php _e( 'Copyright', 'arena' ); ?> <?php echo date( 'Y' ); ?> <?php echo esc_html(themeszen_get_option('arena_footertext')); ?> | <?php _e( 'Powered by', 'arena' ); ?> <a href="http://www.wordpress.org"><?php _e( 'WordPress', 'arena' ); ?></a> | <?php _e( 'arena theme by', 'arena' ); ?> <a href="https://www.themeszen.com"><?php _e( 'themeszen', 'arena' ); ?></a>
		</div><!-- .site-info -->
		
	</div><!-- .container -->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
