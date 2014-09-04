<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storto
 */
?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
				$name = get_bloginfo('name');
				$url = home_url('/');
				$year = date('Y');
			?>
			&copy; <?php echo $year ?> <a href="<?php echo esc_url($url); ?>"><?php echo $name ?></a>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'storto' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'storto' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( '%1$s by %2$s.', 'storto' ), 'Storto', '<a title="Cresta Project" href="http://crestaproject.com/" rel="designer" target="_blank">Cresta Project WordPress Themes</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
	</div><!-- #content -->
	
</div><!-- #page -->
<a href="#top" id="toTop"><i class="fa fa-angle-up fa-lg"></i></a>
<?php wp_footer(); ?>

</body>
</html>
