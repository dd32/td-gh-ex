<?php
	/**
	* The template for  the footer - Anorya Theme
	*
	*/
?>

	<footer>
		<?php	if(get_theme_mod( 'anorya_footer_slider_display_setting')): ?>
			<div class="container-fluid footer-slider-container">
				<div id="footerSlider" class="footer-slider owl-carousel owl-theme">
					<?php anorya_footer_slider_items(); ?>
				</div>
			</div>	
		<?php endif; ?>
		
		<?php if(get_theme_mod( 'anorya_footer_widgets_display_setting')): 
				if ( is_active_sidebar('anorya_widget_footer_section_1') ||
					 is_active_sidebar('anorya_widget_footer_section_2') ||
					 is_active_sidebar('anorya_widget_footer_section_3')): ?>
			<div class="footer-container container-fluid">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-12 col-xs-12">
						<?php dynamic_sidebar('anorya_widget_footer_section_1');?>
						</div>
			
						<div class="col-md-4 col-sm-6 col-xs-12">
						<?php dynamic_sidebar('anorya_widget_footer_section_2');?>
						</div>
						
						<div class="col-md-4 col-sm-6 col-xs-12">
						<?php dynamic_sidebar('anorya_widget_footer_section_3');?>
						</div>
					</div>
				</div>
			</div>	
		<?php endif;
		endif; ?>
		
		<div class="footer-bar">
			<div class="container">
				<?php 
					if(get_theme_mod( 'anorya_footer_copyright_text_setting')):
						print esc_html(get_theme_mod( 'anorya_footer_copyright_text_setting'));
					else:
						//link to reborn themes if text on footer is not set
						print esc_html(get_bloginfo( 'name', 'display' ));
						
					endif; ?>
					
					- <a href="https://www.wordpress.org">Powered by WordPress</a>
					- <a href="https://www.rebornthemes.com"> Created by RebornThemes.com</a>			
				
			</div>
		</div>
	</footer>


<?php wp_footer(); ?>
</body>
</html>
