			 <?php if(themeszen_get_option('arena_home_page_cta') != "off") { ?>	
	
	<div class="cta_bar">
		<div class="container">
	<div class="row">		
		
		<div class="col-md-12 col-sm-12 cta-caption">
			<?php if(esc_html(themeszen_get_option('arena_ctatext')) != NULL){ echo esc_html(themeszen_get_option('arena_ctatext'));} else echo __('Business and Consulting WordPress theme for you, get started now.', 'arena');?>
			</div>
							<div class="clear"></div>			
					<div class="col-md-12 col-sm-12 cta-btn-wrapper">
							<a href="<?php echo esc_url(themeszen_get_option('arena_ctalink')); ?>"><?php if(esc_html(themeszen_get_option('arena_ctabtntext')) != NULL){ echo esc_html(themeszen_get_option('arena_ctabtntext'));} else echo __('Download Now!', 'arena'); ?></a>
							<div class="clear"></div>
						</div>
						
			</div>
		</div>
	</div>

 <?php } ?>