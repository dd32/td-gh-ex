<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Arbutus
 */
?>

	</div><!-- #content -->

	<?php if ( is_active_sidebar( 'footer' ) ) : ?>

		<div id="secondary" class="widget-area" role="complementary">
			<div class="inner">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div>
		</div><!-- #secondary -->

	<?php endif; ?>

	<footer id="colophon" class="site-footer">
		<div class="inner">
			<div class="site-info" role="contentinfo">
				<?php arbutus_footer_credits(); ?>
			</div><!-- .site-info -->
		</div><!-- .inner -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>