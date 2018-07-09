<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_Minimalist
 */

?>
	</div><!-- .wrap -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="wrap">
			<div class="site-info">
				<div class="left">
					<?php
					esc_html_e( 'Copyright &copy;&nbsp;', 'best-minimalist' );
					echo bloginfo();
?>
				</div>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
