<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @subpackage Flat_Thirteen
 * @since WP FlatThirteen 1.3
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>
			<div class="site-info">
				<p>Proudly powered by<a href="http://wordpress.org/" title="Semantic Personal Publishing Platform"> WordPress </a> | Child Theme by:<a href="http://crayonux.com/" rel="designer"> Crayonux </a></p>
	    	</div><!-- .site-info -->
		</footer><!-- #colophon -->
	<?php wp_footer(); ?>		
</body>
</html>