<?php
 	if (themeszen_get_option('arena_portfolio_status', 'on') == 'on') {
		?>		
<!-- Portfolio Section -->
<section class="portfolio-section">
	<div class="container">
	
		<!-- Section Title -->
                    <div class="portfolio_heading_container"> 
                        <h2 class="themeszen_portfolio_main_head">
						<?php if(esc_html(themeszen_get_option('themeszen_portfolio_main_head')) != NULL){ echo esc_html(themeszen_get_option('themeszen_portfolio_main_head'));} else echo __('Our Portfolio', 'arena'); ?></h2>
                        <h4 class="themeszen_portfolio_main_desc"><?php if(esc_html(themeszen_get_option('themeszen_portfolio_main_desc')) != NULL){ echo esc_html(themeszen_get_option('themeszen_portfolio_main_desc'));} else echo __('Some of our recent work.', 'arena');?>
						</h4>
                    </div>
		<!-- /Section Title -->
				
		<!-- Item Scroll -->	
			<div class="row">
			
				
					<div class="col-md-4 col-sm-4">						
						<article class="post">
							<figure class="post-thumbnail">
								<a href="<?php echo esc_url(themeszen_get_option('arena_portfolio_link')); ?>"><img class="img-responsive" alt="img" src="<?php if(esc_url(themeszen_get_option('themeszen_portfolio_img')) != NULL){ echo esc_url(themeszen_get_option('themeszen_portfolio_img'));} else echo get_template_directory_uri() . '/images/port1.jpg' ?>"></a>
							</figure>
							<header class="entry-header">
								<h4 class="entry-title"><?php if(esc_html(themeszen_get_option('themeszen_portfolio_name')) != NULL){ echo esc_html(themeszen_get_option('themeszen_portfolio_name'));} else echo __('Photography', 'arena'); ?></h4>
							</header>	
							<div class="entry-content">
								<p><?php if(esc_html(themeszen_get_option('themeszen_portfolio')) != NULL){ echo esc_html(themeszen_get_option('themeszen_portfolio'));} else echo __('Collection of recent work done for our clients in the recent years.', 'arena');?></p>
							</div>	
						</article>
					</div>
					
					<div class="col-md-4 col-sm-4">						
						<article class="post">
							<figure class="post-thumbnail">
									<a href="<?php echo esc_url(themeszen_get_option('arena_portfolio_link1')); ?>"><img class="img-responsive" alt="img" src="<?php if(esc_url(themeszen_get_option('themeszen_portfolio_img_2')) != NULL){ echo esc_url(themeszen_get_option('themeszen_portfolio_img_2'));} else echo get_template_directory_uri() . '/images/port2.jpg' ?>"></a>
							</figure>
							<header class="entry-header">
								<h4 class="entry-title"><?php if(esc_html(themeszen_get_option('themeszen_portfolio_name_2')) != NULL){ echo esc_html(themeszen_get_option('themeszen_portfolio_name_2'));} else echo __('Graphic design', 'arena'); ?></h4>
							</header>	
							<div class="entry-content">
								<p><?php if(esc_html(themeszen_get_option('themeszen_portfolio_2')) != NULL){ echo esc_html(themeszen_get_option('themeszen_portfolio_2'));} else echo __('Collection of recent work done for our clients in the recent years.', 'arena');?></p>
							</div>	
						</article>
					</div>
					
					<div class="col-md-4 col-sm-4">						
						<article class="post">
							<figure class="post-thumbnail">
									<a href="<?php echo esc_url(themeszen_get_option('arena_portfolio_link2')); ?>"><img class="img-responsive" alt="img" src="<?php if(esc_url(themeszen_get_option('themeszen_portfolio_img_3')) != NULL){ echo esc_url(themeszen_get_option('themeszen_portfolio_img_3'));} else echo get_template_directory_uri() . '/images/port3.jpg' ?>"></a>
							</figure>
							<header class="entry-header">
								<h4 class="entry-title"><?php if(esc_html(themeszen_get_option('themeszen_portfolio_name_3')) != NULL){ echo esc_html(themeszen_get_option('themeszen_portfolio_name_3'));} else echo __('Our products', 'arena'); ?></h4>
							</header>
							<div class="entry-content">
								<p><?php if(esc_html(themeszen_get_option('themeszen_portfolio_3')) != NULL){ echo esc_html(themeszen_get_option('themeszen_portfolio_3'));} else echo __('Collection of recent work done for our clients in the recent years.', 'arena');?></p>
							</div>	
						</article>
					</div>
					
					
				</div>			
			
		<!-- /Item Scroll -->
		
	</div>
</section>
<!-- /Portfolio Section -->

<div class="clearfix"></div>	
<?php }  ?>