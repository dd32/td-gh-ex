<?php
 	if (arenabiz_get_option('arenabiz_portfolio_status') != "off") {	
		?>		
<!-- Portfolio Section -->
<section class="portfolio-section">
	<div class="container">
	
		<!-- Section Title -->
                    <div class="portfolio_heading_container"> 
                        <h2 class="arenabiz_portfolio_main_head">
						<?php if(esc_html(arenabiz_get_option('arenabiz_portfolio_main_head')) != NULL){ echo esc_html(arenabiz_get_option('arenabiz_portfolio_main_head'));} else echo __('Our Portfolio', 'arenabiz'); ?></h2>
                        <h4 class="arenabiz_portfolio_main_desc"><?php if(esc_html(arenabiz_get_option('arenabiz_portfolio_main_desc')) != NULL){ echo esc_html(arenabiz_get_option('arenabiz_portfolio_main_desc'));} else echo __('Some of our recent work.', 'arenabiz');?>
						</h4>
                    </div>
		<!-- /Section Title -->
				
		<!-- Item Scroll -->	
			<div class="row">

			<?php for ($i = 1; $i <= 3; $i++) { 
			
					$arenabiz_portfolio_page_id = esc_html(arenabiz_get_option('arenabiz_portfolio_page'.$i));

		if($arenabiz_portfolio_page_id){
			$args = array( 
                        'page_id' => absint($arenabiz_portfolio_page_id) 
                        );
			$query = new WP_Query($args);
			if( $query->have_posts() ):
				while($query->have_posts()) : $query->the_post();
				?>			
				
					<div class="col-md-4 col-sm-4">						
						<article class="post">
							<figure class="post-thumbnail">
								
					<?php 
					if(has_post_thumbnail()){
						$arenabiz_portfolio_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
						echo '<img class="img-responsive" alt="'. esc_html(get_the_title()) .'" src="'.esc_url($arenabiz_portfolio_image[0]).'">';
			} else echo '<img alt="'. esc_html(get_the_title()) .'" src="'.get_template_directory_uri() . '/images/port'.$i.'.jpg'.'">';
					?>
							</figure>
							
							<header class="entry-header">
								<h4 class="entry-title"><?php if(esc_html(get_the_title()) != NULL){ echo esc_html(get_the_title());} else echo __('Heading', 'arenabiz'); ?></h4>
							</header>	
							<div class="entry-content">
							
								<?php if(has_excerpt()){
						the_excerpt();
					}else{
						the_content(); 
					} ?>
				
							</div>	
						</article>
					</div>
					
				<?php
				endwhile;
			endif;
		}
	} ?>
				</div>			
			
		<!-- /Item Scroll -->
		
	</div>
</section>
<!-- /Portfolio Section -->

<div class="clearfix"></div>	
<?php }  ?>