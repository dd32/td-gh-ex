<?php do_action( 'themingstrap_container_end' );?>

<footer class="footer">
<?php do_action( 'themingstrap_footer_top' );?>
	<div class="container">
		<div class="col-md-12">
	        	
				<?php if(get_theme_option('footer_copy')) {?>
				<p align="center">
					<?php echo get_theme_option('footer_copy'); ?>
				</p>
			<?php } else { ?>
				<p align="center">
				&copy; <?php bloginfo( 'name' ); ?>	Theme by <a href="http://themingstrap.com">ThemingStrap.</a>
				Proudly powered by <a href="http://wordpress.org/" title="Semantic Personal Publishing Platform">WordPress</a>
				</p>
			<?php } ?>
				
		</div>
	</div>
	<?php do_action( 'themingstrap_footer_bottom' );?>
</footer>
<?php do_action( 'themingstrap_footer_after' );?>
<?php wp_footer(); ?>
</body>
</html>