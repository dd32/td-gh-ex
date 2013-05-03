<div class="banner">		
		<div class="ind_slider_newbg">
			<div class="slider-wrapper theme-default">
        
				<?php  
						
						
					$images = array ();
					$captions = array();
					
					
				$query = new WP_Query( array( 'post_type' => 'post') ); 
						$c=0;
					while($query->have_posts() ){
							$query->the_post();
								$meta_image= get_post_meta( get_the_ID(), '_meta_image', true );
								$meta_caption= get_post_meta( get_the_ID(), '_meta_caption', true );
								
								if($meta_image != '' || $meta_caption != ''){
								$images[$c]=$meta_image;
								$captions[$c]=$meta_caption;
								$c++; }
								 else {
									//echo 'Enter Image Plz';
								}
						} 
						
			if($images != '' || $captions != '' ){ $i=1; 								
						?>
                        
				<div id="slider" class="nivoSlider nivoSlider-featured">
						<?php
			                     	while($query->have_posts()){
												$query->the_post();
										
													
										  
						?> <?php foreach ($images as $image)
						      { ?>
								<img  src="<?php echo $image ; ?>" alt="" <?php  echo "title="."#htmlcaption".$i ; ?> />
							   <?php ++$i;}}?>
						
				<?php 				//print_r($image); ?>
				</br>
				      
		
             </div>
			 
        <?php }  else {  ?>
                		
				<div id="slider" class="nivoSlider">
					<img src="<?php echo get_template_directory_uri(); ?>/images/banner1.png" data-thumb="images/banner1.png" alt="" />
					<img src="<?php echo get_template_directory_uri(); ?>/images/banner2.png" data-thumb="images/banner2.png" alt="" data-transition="slideInLeft" />
					<img src="<?php echo get_template_directory_uri(); ?>/images/banner4.png" data-thumb="images/banner4.png" alt="" title="#htmlcaption" />
				</div> 
				<div id="htmlcaption" class="nivo-html-caption">
               			<?php// echo $value;  ?>
				<strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
				</div> 
				
                
											 
				
                 <?php }	?>
                 <?php 
						$i=1;
							//$query = new WP_Query( array( 'post_type' => 'post' ) );
								while ( $query->have_posts() ) : $query->the_post(); 
									//$cap=get_post_meta( get_the_ID(), '_meta_caption', true );	
									//print_r($cap);
				?>      
				
				<?php foreach ($captions as $caption){ ?>
						<div  <?php  echo "id="."htmlcaption".$i ; ?> class="nivo-html-caption">
					<span><?php echo $caption ;?></span>
						</div>	<?php $i++; }?>
								<?php    endwhile;   ?>
			</div>
			<script type="text/javascript">
				jQuery(window).load(function() {
				jQuery('#slider').nivoSlider();
				});
			</script>
	</div>        
</div><!-- closing of banner-->
	
