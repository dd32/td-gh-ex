<?php
/**
 *  The template for displaying the Footer.
 *
 *  @package WordPress
 *	@subpackage AccountantLaw
 */
?>
		<footer role="contentinfo" id="footer">
			<div class="wrapper cf">
				<div class="footer-margin-left cf">
					<?php if( is_active_sidebar( 'footer-sidebar' ) ): ?>
						<?php dynamic_sidebar( 'footer-sidebar' ); ?>
					<?php endif; ?>
				</div><!--/div .footer-margin-left .cf-->
				<?php echo '<div class="lawyeria_lite_poweredby"><a href="https://themeisle.com/themes/lawyeria-lite/" target="_blank" rel="nofollow">Lawyeria Lite </a>'.__( ' powered by', 'accountantlaw' ).'<a href="http://wordpress.org/" target="_blank" rel="nofollow"> WordPress</a></div>'; ?>
			</div><!--/div .wrapper .cf-->
		</footer><!--/footer #footer-->
		<?php wp_footer(); ?>
	</body>
</html>