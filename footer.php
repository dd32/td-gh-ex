<div class="clearboth"></div>
<footer id="colophon" class="site-footer" role="contentinfo">
	<?php
	$sidebars_widgets = wp_get_sidebars_widgets();
	if(!empty($sidebars_widgets['site-footer'])) : ?>
	<div class="footer-bar site-pad">
		<div class="site-container">
			<div class="footer-widgets">
				<?php dynamic_sidebar('site-footer') ?>
				<div class="clearboth"></div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="footer-bottom-bar site-pad">
		<div class="site-container">
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div> <!-- Scroll To Top Button -->
			<div class="footer-left">
                <?php echo wp_kses_post( 'Albar theme, by <a href="http://www.kairaweb.com/">Kaira</a>' ) ?>
			</div>
			<div class="footer-right">
				<?php get_template_part( '/includes/inc/social-links' ); ?>
			</div>
			<div class="clearboth"></div>
		</div><!-- .site-info -->
	</div>
</footer><!-- #colophon -->

<?php if ( kaira_theme_option( 'kra-website-layout' ) == 'site-layout-boxed' ) : ?>
</div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>