<?php
/**
 * The template for displaying the footer
 */

?>

	</div><!-- #content -->
	
	<?php if (get_theme_mod( 'social_media_activate' )) { best_wp_social_section (); } ?>
	
	<footer role="contentinfo">
	
		<div id="colophon"  class="site-info">
		<?php if (get_theme_mod('best_wp_premium_copyright1')) : echo get_theme_mod('best_wp_premium_copyright1'); else : ?>
			<p>
					<?php esc_html_e('All rights reserved', 'best-wp'); ?>  &copy; <?php bloginfo('name'); ?>
								
					<a title="Seos Themes" href="<?php echo esc_url('https://seosthemes.com/', 'best-wp'); ?>" target="_blank"><?php esc_html_e('Theme by Seos Themes', 'best-wp'); ?></a>
			</p>
		<?php endif; ?>		
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
	<a id="totop" href="#"><div><?php esc_html_e('To Top', 'best-wp'); ?></div></a>	
</div><!-- #page -->


	
<?php wp_footer(); ?>

</body>
</html>
