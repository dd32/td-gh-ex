<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package AccesspressLite
 */
?>
</div><!-- #content -->

<footer id="colophon" class="site-footer">
	<?php 
	$accesspresslite_options = accesspress_default_setting_value();
	$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
	$home_template  = isset( $accesspresslite_settings[ 'accesspresslite_home_template' ] ) ? $accesspresslite_settings[ 'accesspresslite_home_template' ] : 'template_one';
	if ( is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' )  || is_active_sidebar( 'footer-3' )  || is_active_sidebar( 'footer-4' ) ) : ?>
		<div id="top-footer">
			<div class="ak-container">
				<div class="footer1 footer">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<?php dynamic_sidebar( 'footer-1' ); ?>
					<?php endif; ?>	
				</div>

				<div class="footer2 footer">
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<?php dynamic_sidebar( 'footer-2' ); ?>
					<?php endif; ?>	
				</div>

				<div class="clearfix hide"></div>

				<div class="footer3 footer">
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<?php dynamic_sidebar( 'footer-3' ); ?>
					<?php endif; ?>	
				</div>

				<div class="footer4 footer">
					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<?php dynamic_sidebar( 'footer-4' ); ?>
					<?php endif; ?>	
				</div>
			</div>
		</div>
	<?php endif; ?>


	<div id="bottom-footer">
		<div class="ak-container">
			<div class="copyright">
				<?php
				if(!empty($accesspresslite_settings['footer_copyright'])){
					echo wp_kses_post($accesspresslite_settings['footer_copyright']);
				}
				?>
			</div>
			<div class="site-info">
				<?php esc_html_e( 'WordPress Theme', 'accesspress-lite' ); ?>
				<span class="sep">:</span>
				<a href="<?php echo esc_url('https://accesspressthemes.com/wordpress-themes/accesspress-lite/');?>" title="<?php esc_attr_e('AccessPress Lite','accesspress-lite');?>" target="_blank"><?php esc_html_e('AccessPress Lite','accesspress-lite');?></a>
			</div><!-- .site-info -->
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>