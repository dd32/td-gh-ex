<?php
/**
 * The template for displaying the footer
 */

?>

	</div><!-- #content -->
	
	<?php if (get_theme_mod( 'social_media_activate' )) { auto_store_social_section (); } ?>
	
	<footer role="contentinfo">
	
		<div id="colophon"  class="site-info">
			<p>
					<?php esc_html_e('All rights reserved', 'auto-store'); ?>  &copy; <?php bloginfo('name'); ?>
								
					<a title="Seos Themes" href="<?php echo esc_url('https://seosthemes.com/', 'auto-store'); ?>" target="_blank"><?php esc_html_e('Theme by Seos Themes', 'auto-store'); ?></a>
			</p>	
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
	<a id="totop" href="#"><div><?php esc_html_e('To Top', 'auto-store'); ?></div></a>	
</div><!-- #page -->


	
<?php wp_footer(); ?>

</body>
</html>
