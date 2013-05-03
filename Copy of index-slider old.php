<div class="banner">		
		<div class="ind_slider_newbg">
			<div class="slider-wrapper theme-default">
        
				<?php  
						
						
				$image = array ();
				  
										
				$query = new WP_Query( array( 'post_type' => 'post') ); 
					while($query->have_posts() ){
						
						$query->the_post();
						//$caption= get_post_meta( get_the_ID(), '_meta_caption', true );
						//$URL= get_post_meta( get_the_ID(), '_meta_image', true );
									
						} //print_r($image);
						
						if( $query->have_posts() ){ $i=1; 								
						?>
                        
				<div id="slider" class="nivoSlider">
						<?php
			                     $c=0;
								while($query->have_posts()){
									 $query->the_post();
										//$cap= get_post_meta( get_the_ID(), '_meta_caption', true );
						
										$meta= get_post_meta( get_the_ID(), '_meta_image', true ); 
										  $image[$c]=$meta;
										  //print_r($meta); 
										  $c++;
										//print_r($cap); 
						?>
						<img  src="<?php echo $meta ; ?>" alt="" <?php  echo "title="."#htmlcaption".$i ; ?> />
				<?php ++$i; } print_r($image);	?>
				
				         
		
             </div>
			 
             <?php }    else {  ?>
                		
				<div id="slider" class="nivoSlider">
					<img src="<?php echo get_template_directory_uri(); ?>/images/banner1.png" data-thumb="images/banner1.png" alt="" />
					<img src="<?php echo get_template_directory_uri(); ?>/images/banner2.png" data-thumb="images/banner2.png" alt="" data-transition="slideInLeft" />
					<img src="<?php echo get_template_directory_uri(); ?>/images/banner4.png" data-thumb="images/banner4.png" alt="" title="#htmlcaption" />
				</div> 
				<!--	<div id="htmlcaption" class="nivo-html-caption">
               			<?php echo $cap;  ?>
				<strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
				</div> -->
				
                
											 
				
                 <?php }	?>
                 <?php 
						$i=1;
							$query = new WP_Query( array( 'post_type' => 'post' ) );
								while ( $query->have_posts() ) : $query->the_post();
									$cap=get_post_meta( get_the_ID(), '_meta_caption', true );	
									//print_r($cap);
				?>
						<div  <?php  echo "id="."htmlcaption".$i ; ?> class="nivo-html-caption">
							<span><center>
								<h2><?php echo $cap ;?></h2></center>
								<?php // the_excerpt();  ?> 
							</span>
						</div>	
								<?php   $i++; endwhile;   ?>
			</div>
			<script type="text/javascript">
				jQuery(window).load(function() {
				jQuery('#slider').nivoSlider();
				});
			</script>
	</div>        
</div><!-- closing of banner-->
	
