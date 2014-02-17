<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package base
 */
?>

	</div><!-- #content -->
	</div><!-- wide contenitor-->
	<footer id="colophon" class="site-footer" role="contentinfo">
  		 <div class="widget-footer container">
   			<?php get_sidebar( 'footer' ); ?>
   		</div><!-- .widget-footer -->
		<div class="site-info container">
			<?php do_action( 'base_credits' ); ?>
			<?php echo of_get_option('footer_text', '' ); ?><span class="sep"> | </span>
			<?php printf( __('Theme by <a href="%s">iografica.it</a>', 'base'), 'http://iogrfica.it'); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>