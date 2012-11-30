<?php get_header(); ?>
	
			<!--content-->
		<div id="content">

<!--slideshow-->

    <div id="slider-container">
                                      
		<?php $slider_url = ''; ?>
									    
                    <!--slider begin-->
				<div id="slideshow">
								
	<?php for ($i = 1; $i <= 2; $i++) { ?>
						
						<div>
								 
								 <span class="information">
                            
                            <h2><?php if(of_get_option('slider_head'.$i) != NULL){ echo of_get_option('slider_head'.$i);} else echo "100% Professional Business WordPress theme" ?></h2>
							
<p>	<?php if(of_get_option('slider_content'.$i) != NULL){ echo of_get_option('slider_content'.$i);} else echo "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae." ?></p>
					
					<?php $slider_url = of_get_option('slider_link'.$i); ?>
					
					<?php if($slider_url<>'') { ?><span class="read-more"><a href="<?php echo of_get_option('slider_link'.$i); ?>"><?php _e( 'Read More', 'application' ); ?></a></span><?php } ?>
						
						</span><!--content end-->
						
					<?php if($slider_url<>'') { ?><a href="<?php echo of_get_option('slider_link'.$i); ?>"><img width="560" height="380" src="<?php if(of_get_option('slider_image'.$i) != NULL){ echo of_get_option('slider_image'.$i);} else echo get_template_directory_uri() . '/images/slide'.$i.'.png' ?>" alt="" /></a>
		<?php } else {?>
		<img width="560" height="380" src="<?php if(of_get_option('slider_image'.$i) != NULL){ echo of_get_option('slider_image'.$i);} else echo get_template_directory_uri() . '/images/slide'.$i.'.png' ?>" alt="" /><?php } ?>
					</div>

	<?php } ?>	


			</div><!--slider end-->

    </div><!--slider container end-->

		
		<div id="box"> <!--box outer-->
		
		<!--boxes-->
		
		<?php for ($i = 1; $i <= 4; $i++) { ?>
		
				<?php $thumb_small='';
	$thumb_small= of_get_option('box_image' . $i); ?>
		
				<div class="boxes">
				
				<div class="box-head">
					
					<div class="title-box"><a href="<?php echo of_get_option('b_link_0'.$i); ?>"><?php if(of_get_option('b_head_0'.$i) != NULL){ echo of_get_option('b_head_0'.$i);} else echo "Your headline here" ?></a></div><!--title-box close-->
					
						<div class="box-content">

				<?php if(of_get_option('b_co_0'.$i) != NULL){ echo of_get_option('b_co_0'.$i);} else echo "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae. Pellentesque habitant morbi tristique senectus et netus. Vestibulum, feugiat vitae." ?>
											
						</div> <!--box-content close-->
					
						</div> <!--box-head close-->
						
						
						<span class="box-thumb"><a href="<?php echo of_get_option('b_link_0'.$i); ?>"><img width="212" height="80" src="<?php if(of_get_option('box_image'.$i) != NULL){ echo of_get_option('box_image'.$i);} else echo get_template_directory_uri() . '/images/ic'.$i.'.png' ?>" alt="" /></a></span>
						
					
				</div><!--boxes  end-->				
 
		<?php } ?>
		
		</div> <!--outer box end-->
		
			<div class="clear"></div>
							
	
</div>
<!--wrapper end-->

<?php get_footer(); ?>