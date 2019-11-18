<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ansia
 */

?>

	</div><!-- #content -->
	</div><!-- .ansia-content -->
	</div><!-- .ansia-big-content -->
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) : ?>
		<footer id="colophon" class="site-footer">
			<div class="footer-inner">
				<div class="ansia-footer-widgets">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<aside id="footer-1" class="widget-area footer">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</aside><!-- #footer-1 -->
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<aside id="footer-2" class="widget-area footer">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</aside><!-- #footer-2 -->
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<aside id="footer-3" class="widget-area footer">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</aside><!-- #footer-3 -->
					<?php endif; ?>
				</div>
				<div class="ansia-copyright">
					<div class="site-info">
						<?php
						$copyrightText = ansia_options('_copyright_text', '&copy; '.date('Y').' '. get_bloginfo('name'));
						if ($copyrightText || is_customize_preview()): ?>
							<span class="custom"><?php echo wp_kses($copyrightText, ansia_allowed_html()); ?></span>
						<?php endif; ?>
						<span class="sep"> | </span>
						<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( 'WordPress Theme: %1$s by %2$s.', 'ansia' ), '<a target="_blank" href="https://crestaproject.com/downloads/ansia/" rel="noopener noreferrer" title="Ansia Theme">Ansia</a>', 'CrestaProject' );
						?>
					</div><!-- .site-info -->
					<?php 
					$showInFooter =  ansia_options('_social_show_footer', '1');
					if ($showInFooter == 1) {
						ansia_show_social_network('footer');
					} ?>
				</div>
			</div><!-- .footer-inner -->
		</footer><!-- #colophon -->
	<?php endif; ?>
</div><!-- #page -->
<?php $scrollToTopMobile = ansia_options('_scroll_top', ''); ?>
<a href="#top" id="toTop" aria-hidden="true" class="<?php echo $scrollToTopMobile ? 'scrolltop_on' : 'scrolltop_off' ?>"><i class="fa fa-angle-up fa-lg"></i></a>
<?php wp_footer(); ?>

</body>
</html>
