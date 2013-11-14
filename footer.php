<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package B3
 */
?>

	</div><!-- #content -->

	<?php if ('Y' == b3_option('sidebar_bottom')) { get_sidebar('bottom'); } ?>

	<footer id="colophon" class="site-footer text-center spacer-all" role="contentinfo">
		<div class="site-info center">
			<?php
			if ($text = b3_option('copyright')) {
				echo '<p>&copy; ' .$text . '</p>';
			}
			if ('Y' == b3_option('credits')) {
				do_action('b3_credits'); ?>
				<a href="http://wordpress.org/"><?php printf( __('Proudly powered by %s', 'b3'), 'WordPress'); ?></a>.
				<?php printf( __('Theme %1$s by %2$s based on %3$s.', 'b3'), 'B3', '<a href="http://andrey.ws/">Andrey K</a>', '<a href="http://getbootstrap.com/">Bootstrap 3</a>');
			}
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>