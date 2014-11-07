<?php
/**
* @Theme Name	:	Corpbiz
* @file         :	footer.php
* @package      :	Corpbiz
* @author       :	Priyanshu Mittal
* @filesource   :	wp-content/themes/corpbiz/footer.php
*/
?>
<!--Footer Section-->
<?php $current_options=get_option('corpbiz_options'); ?>
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
		<?php if($current_options['footer_customizations']!='') { ?>
		<div class="col-md-6">			
			<p> <?php echo esc_html($current_options['footer_customizations']); ?>
			 <?php if($current_options['created_by_webriti_text']!='') {   ?>
			<a rel="nofollow" href="<?php if($current_options['created_by_link']!='') { echo esc_url($current_options['created_by_link']); } ?>"> <?php  echo esc_html($current_options['created_by_webriti_text']);  ?></a>
			<?php } ?>
			</p>
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