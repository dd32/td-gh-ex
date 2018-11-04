			 <?php if(themeszen_get_option('arena_home_page_slider') != "off") { ?>	
	
	<div class="slider_bar">
		<div class="container">
	<div class="row">		
		
		<div class="col-md-8 col-sm-8 sb-caption">
			<?php if(esc_html(themeszen_get_option('arena_slidewelcometext')) != NULL){ echo esc_html(themeszen_get_option('arena_slidewelcometext'));} else echo __('Business and Consulting WordPress theme for you, get started now.', 'arena');?>
			</div>
			
					<div class="col-md-4 col-sm-4 sb-btn-wrapper">
							<a href="<?php echo esc_url(themeszen_get_option('arena_slidewelcomelink')); ?>"><?php if(esc_html(themeszen_get_option('arena_slidewelcomebtntext')) != NULL){ echo esc_html(themeszen_get_option('arena_slidewelcomebtntext'));} else echo __('Download Now!', 'arena'); ?></a>
							<div class="clear"></div>
						</div>
						
			</div>
		</div>
	</div>

 <?php } ?>