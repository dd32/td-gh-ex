<div class="flex-container col-md-12 col-sm-12">

	<!--slideshow-->
	
	<div class="flexslider">
	 	<ul class="slides">

<?php for ($i = 1; $i <= 2; $i++) { 
		$arenabiz_slider_page_id = esc_html(arenabiz_get_option('arenabiz_slide_page'.$i));

		if($arenabiz_slider_page_id){
			$args = array( 
                        'page_id' => absint($arenabiz_slider_page_id) 
                        );
			$query = new WP_Query($args);
			if( $query->have_posts() ):
				while($query->have_posts()) : $query->the_post();
				?>
			<li>
			<div>
				<div class="slider-image">

					<?php 
					if(has_post_thumbnail()){
						$arenabiz_slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
						echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($arenabiz_slider_image[0]).'">';
			} else echo '<img alt="'. esc_html(get_the_title()) .'" src="'.get_template_directory_uri() . '/images/slide'.$i.'.jpg'.'">';
					?>
		
								</div>
				</div>				
			  
		  <div class="flexslider-content">
		  
		  <?php if(arenabiz_get_option('arenabiz_home_page_slider1') != "off") { ?>
		  
		    <div class="flexslider-caption">
			  
			 
			
			
			<div class="flex-caption">
		<?php if(esc_html(get_the_title()) != NULL){ echo esc_html(get_the_title());} else echo __('Consulting theme.', 'arenabiz'); ?>
			</div>
			
			
		<div class="flex-caption2">
    				<?php 
					if(has_excerpt()){
						the_excerpt();
					}else{
						the_content(); 
					} ?>
		</div>
		
	</div>	<!--flexslider-caption-->
	
	
	
		<div class="flex-btn-wrapper">
		<?php if(esc_url(arenabiz_get_option('arenabiz_slidelink' . $i)) != NULL){ ?>
							<a href="<?php echo esc_url(arenabiz_get_option('arenabiz_slidelink'.$i)); ?>"><?php echo __('Read More', 'arenabiz'); ?></a><?php }?>	
						</div> 
			
			 <?php } ?>
			 
			 </div>
			 
			</li>
			

				<?php
				endwhile;
			endif;
		}
	} ?>
		
		</ul>
</div> <!--slideshow end-->

  </div><!--flex container end-->
 


