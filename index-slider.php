<?php 
/**
 * Index Template
 *
 *
 * @file           index-slider.php
 * @package        Appointment
 * @author         Priyanshu Mittal,Shahid Mansuri and Akhilesh Nagar
 * @copyright      2013 Appointment
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/appoinment/index-slider.php
 */


?>


<div class="banner">		
		<div class="ind_slider_newbg">
			<div class="slider-wrapper theme-default">
        
				<?php  
						
						
					$images = array ();
					$captions = array();
					
					
				$query = new WP_Query( array( 'post_type' => 'post') ); 
						/*echo "<pre>";
						print_r ($query);*/
						$c=0;
					while($query->have_posts() ){
							$query->the_post();
								//$meta_image= get_post_meta( get_the_ID(), '_meta_image', true );
								//$meta_caption= get_post_meta( get_the_ID(), '_meta_caption', true );
							
								if(get_post_meta( get_the_ID(), '_meta_image', true ) != '' || get_post_meta( get_the_ID(), '_meta_caption', true ) != ''){
								
								$images[$c]=get_post_meta( get_the_ID(), '_meta_image', true );
								$captions[$c]=get_post_meta( get_the_ID(), '_meta_caption', true );
								$c++; }
								 else {
									//echo 'Enter Image Plz';
								}
						} 	
					 	
			if(count($images)!=0 || count($captions)!=0 ){ $i=1;
		
						?>
                        
				<div id="slider" class="nivoSlider nivoSlider-featured">
						<?php
			                     	while($query->have_posts()){
												$query->the_post();
										
												
										  
						?> <?php foreach ($images as $image)
						      { 	?>
								<img   src="<?php echo $image ; ?>" alt="" <?php  echo "title="."#htmlcaption".$i ; ?> />
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
				<?php _e("This is an example of a HTML caption",'appointment'); ?> 
				</div> 
				
                
											 
				
                 <?php }	?>
                 <?php 	$i=1;
						while ( $query->have_posts() ) : $query->the_post(); 
					?>      
				
				<?php foreach ($captions as $caption){ 
				 ?>
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
	
