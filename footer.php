<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package BOXY
 */
?>
	</div><!-- #content -->
</div>
<?php do_action('boxy_before_footer'); ?>
	<footer id="colophon" class="site-footer footer-image " role="contentinfo">
	 <?php global $boxy;
       if ( get_theme_mod ('footer_overlay',false ) ) { 
		   echo '<div class="overlay overlay-footer"></div>';     
		} 
		if( get_theme_mod( 'footer-widgets' ,true ) ) : ?>
		<div class="footer-top">
			<div class="container">
				<?php get_template_part( 'footer', 'widgets' ); ?>
			</div>
		</div>
	<?php endif; ?>
		<div class="footer-bottom copy">
			<div class="container">
				<div class="eight columns">
					<?php if( get_theme_mod('copyright') ) : ?>
							<p><?php echo get_theme_mod('copyright'); ?></p>
						<?php else : 
							printf( '<p> %1$s <a href="%2$s" target="_blank"> %3$s</a> %4$s <a href="%5$s" target="_blank" rel="designer">%6$s</a></p>', __('Powered by','boxy'), esc_url( 'http://wordpress.org/'), __('WordPress','boxy'), __('| Theme: Boxy by','boxy'), esc_url('https://www.webulousthemes.com/'), __('Webulous Themes','boxy')) ;
   						endif; ?>
				</div>
				<div class="footer-right eight columns">      
					<?php dynamic_sidebar( 'footer-nav' ); ?>
				</div>
			</div>
		</div>
		<?php if( get_theme_mod('scroll_to_top_button',true) ) : ?>
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		<?php endif;  ?>
	</footer><!-- #colophon -->

	<?php do_action('boxy_after_footer'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
