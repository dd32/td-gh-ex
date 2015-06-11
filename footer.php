<?php
/**
 *  The template for displaying Footer.
 *
 *  @package accountant
 */
?>
		<footer id="footer">
			<div class="wrapper cf">
				<div class="footer-margin-left cf">
					<?php if( is_active_sidebar( 'footer-sidebar' ) ): ?>
						<?php dynamic_sidebar( 'footer-sidebar' ); ?>
					<?php endif; ?>
				</div><!--/div .footer-margin-left .cf-->
				<?php echo '<div class="lawyeria_lite_poweredby"><a class="" href="https://themeisle.com/themes/lawyeria-lite/" target="_blank" rel="nofollow">Lawyeria Lite </a>'.__(' powered by','lawyeria-lite').'<a class="" href="http://wordpress.org/" target="_blank" rel="nofollow"> WordPress</a></div>'; ?>
			</div><!--/div .wrapper .cf-->
		</footer><!--/footer #footer-->
		<?php wp_footer(); ?>
	</body>
</html>