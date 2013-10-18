<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Flat_Thirteen
 * @since WP FlatThirteen 1.1
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>
			<div class="site-info">
				<p>Proudly powered by<a href="http://wordpress.org/" title="Semantic Personal Publishing Platform"> WordPress </a> | Designed by <a href="http://crayonux.com/" title="Basanta Moharana, User Experience designer, Wordpress developer"> Crayonux </a></p>
	    	</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>	
	<script type="text/javascript">
	<?php echo of_get_option('analytics_textarea'); ?>
</script>	
</body>
</html>