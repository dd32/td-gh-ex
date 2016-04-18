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
		<div class="site-info smallPart">
			<?php
				$name = get_bloginfo('name');
				$url = home_url('/');
				$year = date('Y');
			?>
			&copy; <?php echo $year ?> <a href="<?php echo esc_url($url); ?>"><?php echo $name ?></a>
			<span class="sep"> | </span>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'storto' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'storto' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'storto' ), 'Storto', '<a target="_blank" title="CrestaProject" href="http://crestaproject.com/downloads/storto/" rel="designer">CrestaProject WordPress Themes</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
	</div><!-- #content -->
	
</div><!-- #page -->
<a href="#top" id="toTop"><i class="fa fa-angle-up fa-lg"></i></a>
<?php wp_footer(); ?>

</body>
</html>
