 <?php /* Footer Template */
 $footer_widget_style = get_theme_mod('footerWidgetStyle',3);
 $hide_footer_widget_bar = get_theme_mod('hideFooterWidgetBar',1); ?>
 <!--==============================Footer start=================================-->
    <footer>
        <div class="footer-bg">
            <div class="avocation-container  container">
			  <?php $footer_column_value = floor(12/($footer_widget_style));
                if ($hide_footer_widget_bar == 1) { ?>
                <div class="row footer-sidebar">
                    <?php for( $i=1; $i<=$footer_widget_style; $i++) { 
                            if (is_active_sidebar('footer-'.$i)) { ?>
                                <aside class="col-md-<?php echo esc_attr($footer_column_value); ?> col-sm-6 col-xs-12"><?php dynamic_sidebar('footer-'.$i); ?></aside>
                    <?php } } ?>
                </div>
               <?php } ?>
				<div class="copyright">  
					<span>
						<?php printf(/* translators: %s is theme info.*/ esc_html__( 'Powered by %1$s', 'avocation' ),'<a href="'.esc_url('https://fruitthemes.com/wordpress-themes/avocation/').'" target="_blank">Avocation WordPress Theme</a>' ); ?>
						</span>
					<?php if(get_theme_mod( 'CopyrightAreaText','')!=='') { ?>
						<p><?php echo wp_kses_post( get_theme_mod('CopyrightAreaText', '') ); ?></p> 
					<?php } ?>
				</div>
			</div>              	
		</div>
	</footer>
  <?php wp_footer(); ?>
  </body>
</html>