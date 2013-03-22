<div class="banner">		
		<div class="ind_slider_newbg">
			<div class="slider-wrapper theme-default">
        
				<?php  $query = new WP_Query( array( 'post_type' => 'featured_slider') ); 
				
						if( $query->have_posts() ){
						$i=1;?>
                        
						<div id="slider" class="nivoSlider">
						     <?php
			
				 while($query->have_posts()){
        				$query->the_post();
        				$image_query = new WP_Query( array( 'post_type' => 'attachment','post_status' => 'inherit', 'post_mime_type' => 'image',  'post_parent' => get_the_ID() ) );
						
				
	    			while( $image_query->have_posts() ) {
           			 $image_query->the_post();
					 $image_attributes = wp_get_attachment_image_src( get_the_ID(),array(980,580) );
					 //print_r($image_attributes);
           			 ?>  
                	<img  src="<?php echo $image_attributes[0]; ?>" alt="" <?php  echo "title="."#htmlcaption".$i ; ?> />
				   <?php $i++;
				   break;
				  } 
    			 }
				
				
			?>	
             </div>
             <?php }    else {  ?>
                		
				<div id="slider" class="nivoSlider">
					<img src="<?php echo get_template_directory_uri(); ?>/images/banner1.png" data-thumb="images/banner1.png" alt="" />
					<img src="<?php echo get_template_directory_uri(); ?>/images/banner2.png" data-thumb="images/banner2.png" alt="" data-transition="slideInLeft" />
					<img src="<?php echo get_template_directory_uri(); ?>/images/banner4.png" data-thumb="images/banner4.png" alt="" title="#htmlcaption" />
				</div>
                
				<div id="htmlcaption" class="nivo-html-caption">
                <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
				</div>
                 <?php }	?>
                 <?php 
									$i=1;
									while ( $query->have_posts() ) : $query->the_post();?>
					
								 <div <?php  echo "id="."htmlcaption".$i ; ?> class="nivo-html-caption">
										<span>
										  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<?php  the_excerpt();  ?> 
										 </span>
								</div>	
			
			  						<?php    $i++; endwhile;   ?>
			</div>
			<script type="text/javascript">
    jQuery(window).load(function() {
       jQuery('#slider').nivoSlider();
    });
    </script>
		</div>        
    </div><!-- closing of banner-->
	
