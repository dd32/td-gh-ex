<!--Footer Section-->
<?php $corpbiz_options=theme_data_setup(); 
	$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options ); 
if ( is_active_sidebar( 'footer_widget_area_left' ) || is_active_sidebar( 'footer_widget_area_center' ) ||  is_active_sidebar( 'footer_widget_area_right' )) { ?>	
<div class="footer-sidebar">
	<div class="container">
		<?php get_template_part('sidebar','footer');?>
	</div>
</div>
<?php } ?>
<!--/Footer Section-->
<!--Footer Copyright Section-->
<div class="container">
	<div class="row copyright_menu_section">
		<?php if($current_options['footer_copyright_text']!='') { ?>
		<div class="col-md-6">			
			<p> <?php echo $current_options['footer_copyright_text']; ?></p>
		</div>	
		<?php } ?>
		<div class="col-md-6">			
		<?php	wp_nav_menu( array(  
						'theme_location' => 'secondary',
						'menu_class' => 'footer_menu_links',
						'fallback_cb' => 'webriti_fallback_page_menu',
						'walker' => new webriti_nav_walker()
					));	
			?>
		</div>
	</div>
</div>
<!--Page Up--><a href="#" class="page_up"><i class="fa fa-chevron-up"></i></a><!--/Page Up-->
<?php wp_footer(); ?>
  </body>
</html>