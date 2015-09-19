<!--Footer Section-->
<?php $corpbiz_options=theme_data_setup(); 
	  $current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options ); ?>
<div class="footer_section">
	<div class="container">
		<div class="row">
			<?php 
			if ( is_active_sidebar( 'footer-widget-area' ) )
			{ dynamic_sidebar( 'footer-widget-area' );	}
			?>
		</div>
	</div>
</div>
<!--/Footer Section-->
<!--Footer Copyright Section-->
<div class="container">
	<div class="row copyright_menu_section">
		<?php if($current_options['footer_copyright']!='') { ?>
		<div class="col-md-6">			
			<p><?php echo $current_options['footer_copyright'];?></p>
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
<!--/Footer Copyright Section-->
<?php wp_footer(); ?>
  </body>
</html>