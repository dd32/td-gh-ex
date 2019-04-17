<?php if(arenabiz_get_option('arenabiz_home_page_cta') != "off") { ?>	
	
	<div class="cta_bar">
		<div class="container">
	<div class="row">		
		
		<div class="col-md-12 col-sm-12 cta-caption">
			<?php if(esc_html(arenabiz_get_option('arenabiz_ctatext')) != NULL){ echo esc_html(arenabiz_get_option('arenabiz_ctatext'));} else echo __('Business and Consulting WordPress theme for you, get started now.', 'arenabiz');?>
			</div>
							<div class="clear"></div>			
					<div class="col-md-12 col-sm-12 cta-btn-wrapper">
							<a href="<?php echo esc_url(arenabiz_get_option('arenabiz_ctalink')); ?>"><?php if(esc_html(arenabiz_get_option('arenabiz_ctabtntext')) != NULL){ echo esc_html(arenabiz_get_option('arenabiz_ctabtntext'));} else echo __('Download Now!', 'arenabiz'); ?></a>
							<div class="clear"></div>
						</div>
						
			</div>
		</div>
	</div>

 <?php } ?>