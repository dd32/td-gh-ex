<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Generate
 */
?>

	</div><!-- #content -->
</div><!-- #page -->
<div <?php generate_footer_class(); ?>>
	<?php 
	global $post, $generate_defaults;
	$generate_settings = get_option( 'generate_settings', $generate_defaults );
	$stored_meta = '';
	if ( isset( $post ) ) :
		$stored_meta = get_post_meta( $post->ID, '_generate-footer-widget-meta', true );
	endif;
	
	if ( '' !== $stored_meta ) :
		$generate_settings['footer_widget_setting'] = $stored_meta;
	endif;
	
	if ( !empty( $generate_settings['footer_widget_setting'] ) && 0 !== $generate_settings['footer_widget_setting'] ) : 
		$widget_width = '';
		if ( $generate_settings['footer_widget_setting'] == 1 ) $widget_width = '100';
		if ( $generate_settings['footer_widget_setting'] == 2 ) $widget_width = '50';
		if ( $generate_settings['footer_widget_setting'] == 3 ) $widget_width = '33';
		if ( $generate_settings['footer_widget_setting'] == 4 ) $widget_width = '25';
		?>
		<div id="footer-widgets" class="site footer-widgets">
			<div class="inside-footer-widgets grid-container grid-parent">
				<?php if ( $generate_settings['footer_widget_setting'] >= 1 ) : ?>
					<div class="footer-widget-1 grid-parent grid-<?php echo $widget_width; ?>">
						<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1')): ?>
							<aside class="widget inner-padding widget_text">
								<h4 class="widget-title"><?php _e('Footer Widget 1','generate');?></h4>			
								<div class="textwidget">
									<p><?php _e('Replace this widget content by going to <a href="' . admin_url() . 'widgets.php"><strong>Appearance / Widgets</strong></a> and dragging widgets into Footer Area 1.','generate');?></p>
									<p><?php _e('To remove or choose the number of footer widgets, go to <a href="' . admin_url() . 'customize.php"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.','generate');?></p>
								</div>
							</aside>
						<?php endif; ?>
					</div>
				<?php endif;
				
				if ( $generate_settings['footer_widget_setting'] >= 2 ) : ?>
				<div class="footer-widget-2 grid-parent grid-<?php echo $widget_width; ?>">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2')): ?>
						<aside class="widget inner-padding widget_text">
							<h4 class="widget-title"><?php _e('Footer Widget 2','generate');?></h4>			
							<div class="textwidget">
								<p><?php _e('Replace this widget content by going to <a href="' . admin_url() . 'widgets.php"><strong>Appearance / Widgets</strong></a> and dragging widgets into Footer Area 1.','generate');?></p>
								<p><?php _e('To remove or choose the number of footer widgets, go to <a href="' . admin_url() . 'customize.php"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.','generate');?></p>
							</div>
						</aside>
					<?php endif; ?>
				</div>
				<?php endif;
				
				if ( $generate_settings['footer_widget_setting'] >= 3 ) : ?>
				<div class="footer-widget-3 grid-parent grid-<?php echo $widget_width; ?>">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3')): ?>
						<aside class="widget inner-padding widget_text">
							<h4 class="widget-title"><?php _e('Footer Widget 3','generate');?></h4>			
							<div class="textwidget">
								<p><?php _e('Replace this widget content by going to <a href="' . admin_url() . 'widgets.php"><strong>Appearance / Widgets</strong></a> and dragging widgets into Footer Area 1.','generate');?></p>
								<p><?php _e('To remove or choose the number of footer widgets, go to <a href="' . admin_url() . 'customize.php"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.','generate');?></p>
							</div>
						</aside>
					<?php endif; ?>
				</div>
				<?php endif;
				
				if ( $generate_settings['footer_widget_setting'] >= 4 ) : ?>
				<div class="footer-widget-4 grid-parent grid-<?php echo $widget_width; ?>">
					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-4')): ?>
						<aside class="widget inner-padding widget_text">
							<h4 class="widget-title"><?php _e('Footer Widget 4','generate');?></h4>			
							<div class="textwidget">
								<p><?php _e('Replace this widget content by going to <a href="' . admin_url() . 'widgets.php"><strong>Appearance / Widgets</strong></a> and dragging widgets into Footer Area 1.','generate');?></p>
								<p><?php _e('To remove or choose the number of footer widgets, go to <a href="' . admin_url() . 'customize.php"><strong>Appearance / Customize / Layout / Footer Widgets</strong></a>.','generate');?></p>
							</div>
						</aside>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	<?php
	endif;
	?>
	<footer class="site-info" itemtype="http://schema.org/WPFooter" itemscope="itemscope" role="contentinfo">
		<div class="inside-site-info grid-container grid-parent">
			<?php do_action( 'generate_credits' ); ?>
		</div>
	</footer><!-- .site-info -->
</div><!-- .site-footer -->

<?php wp_footer(); ?>

</body>
</html>