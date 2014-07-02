<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Aperture
 */
?>

<?php if ( !is_page_template('page-slider.php') ) { ?>
	</div><!-- #content -->
<?php } ?>

	<footer id="colophon" class="site-footer <?php if ( is_page_template('page-slider.php') ) { esc_attr_e( 'no-footer-sidebar', 'aperture' ); } ?>" role="contentinfo">
		<?php if ( !is_page_template('page-slider.php') ) { get_sidebar( 'footer' ); } ?>

		<div class="site-info-background">
			<div class="site-info <?php if ( is_page_template('page-slider.php') ) { esc_attr_e( 'site-info-fullwidth', 'aperture' ); } ?>">
				<?php printf( __( 'Powered by %s', 'aperture' ), '<a href="http://wordpress.org/" rel="generator" target="_blank">WordPress</a>' ); ?>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s', 'aperture' ), '<a href="http://www.michaelvandenberg.com/themes/#aperture" target="_blank">Aperture</a>', '<a href="http://www.michaelvandenberg.com/" rel="designer" target="_blank">Michael Van Den Berg</a>' ); ?>
				<?php $copyrighttext = get_theme_mod( 'copyright_custom_text' ); ?>
				<?php if ( ! empty( $copyrighttext ) ) : ?>
				<span class="custom-text"><?php echo esc_html( $copyrighttext ); ?></span>
				<?php endif; ?>
			</div><!-- .site-info -->
		</div><!-- .site-info-background -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
jQuery(document).ready(function($){
    $('#sidr-toggle').sidr({
      name: 'sidr-menu',
      source: '.primary-menu-container, .secondary-menu-container',
      side: 'right'
    });
});

jQuery(window).resize(function() {
       jQuery.sidr('close', 'sidr-menu');
});
</script>

</body>
</html>