<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package undedicated
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info wrap">
			<?php _e( 'Powered by ', 'undedicated' ); ?><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'undedicated' ) ); ?>"><?php _e( 'WordPress', 'undedicated' ); ?></a>
			<span class="sep"> & </span>
			<?php
				if ( is_front_page() ) {
					printf( esc_html__( '%1$s theme by %2$s.', 'undedicated' ), 'Undedicated', '<a href="http://reduxthemes.com" rel="designer">ReduxThemes.com</a>' );
				} else {
					printf( esc_html__( '%1$s theme by %2$s.', 'undedicated' ), 'Undedicated', '<a href="http://reduxthemes.com" rel="nofollow">ReduxThemes.com</a>' );
				
				} 
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
