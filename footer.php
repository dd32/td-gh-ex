<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package semplicemente
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
				$name = get_bloginfo('name');
				$url = home_url('/');
				$year = date('Y');
			?>
			&copy; <?php echo $year ?> <a href="<?php echo esc_url($url); ?>"><?php echo $name ?></a>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'semplicemente' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'semplicemente' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'semplicemente' ), '<a title="Semplicemente Theme" href="http://crestaproject.com/downloads/semplicemente/" rel="nofollow" target="_blank">Semplicemente</a>', 'CrestaProject WordPress Themes' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
