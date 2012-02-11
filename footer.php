<?php
/**
 * The template for displaying the footer.
 *
 * @since Akyuz 1.0
 */
?>

	</div><!-- #main -->
	</div><!-- #main -->

	<footer id="colophon" role="contentinfo" class="">
		<div class="footer-top-wrap container" >
			<?php
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>
		</div>
		<div class="footer-bottom-wrap" >
			<div id="site-generator" class="container">
				<div id="copyright" class="span-12">
					<?php echo akyuz_get_options_value(AKYUZ_SHORTNAME.'_footer_left');?>
				</div>
				<div id="generator" class="span-12 last">
					<?php echo do_shortcode('[theme-url]'); ?>
					
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->


	<?php wp_footer(); ?>

	<?php echo akyuz_get_options_value(AKYUZ_SHORTNAME.'_tracking_footer');?>


</body>
</html>