			 <?php if(arenabiz_get_option('arenabiz_home_page_slider') != "off") { ?>	
	
	<div class="slider_bar">
		<div class="container">
	<div class="row">		
		
		<div class="col-md-8 col-sm-8 sb-caption">
			<?php if(esc_html(arenabiz_get_option('arenabiz_slidewelcometext')) != NULL){ echo esc_html(arenabiz_get_option('arenabiz_slidewelcometext'));} else echo __('Business and Consulting WordPress theme for you, get started now.', 'arenabiz');?>
			</div>
			
					<div class="col-md-4 col-sm-4 sb-btn-wrapper">
							<a href="<?php echo esc_url(arenabiz_get_option('arenabiz_slidewelcomelink')); ?>"><?php if(esc_html(arenabiz_get_option('arenabiz_slidewelcomebtntext')) != NULL){ echo esc_html(arenabiz_get_option('arenabiz_slidewelcomebtntext'));} else echo __('Download Now!', 'arenabiz'); ?></a>
							<div class="clear"></div>
						</div>
						
			</div>
		</div>
	</div>

 <?php } ?>