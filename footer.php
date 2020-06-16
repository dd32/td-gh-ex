<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storto
 */
?>

	<footer id="colophon" class="site-footer">
		<div class="site-info smallPart">
			<?php
			$copyrightText = get_theme_mod('storto_theme_options_copyrighttext', '&copy; '.date('Y').' '. get_bloginfo('name'));
			if ($copyrightText || is_customize_preview()): ?>
				<span class="custom"><?php echo wp_kses($copyrightText, storto_allowed_html()); ?></span>
			<?php endif; ?>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: theme name, 2: theme developer */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'storto' ), '<a target="_blank" href="https://crestaproject.com/downloads/storto/" rel="noopener noreferrer" title="Storto Theme">Storto</a>', 'CrestaProject WordPress Themes' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
	</div><!-- #content -->
	
</div><!-- #page -->
<a href="#top" id="toTop" aria-hidden="true"><i class="fa fa-angle-up fa-lg"></i></a>
<?php wp_footer(); ?>

</body>
</html>
