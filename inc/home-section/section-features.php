<?php 

function agensy_home_features(){

	$agensy_enable_features_control = get_theme_mod('agensy_enable_features_control','on');

	if($agensy_enable_features_control == 'on'){
	?>
		<section class = "agensy-home-features agensy-home-section" id = "agensy-scroll-features">
			<?php 
			$agensy_features_title_control = get_theme_mod('agensy_features_title_control');
			$agensy_features_description_control = get_theme_mod('agensy_features_description_control');
			?>
				
				<div class = "agensy-container clearfix">
					<div class="section-title">
						<h2>
						<?php echo $agensy_features_title_control; ?>
						</h2>
					</div>
					<div class="section-description">
						<?php echo $agensy_features_description_control; ?>
					</div>
					<div class = "agensy-feature-wrap clearfix ">
					<?php 
					$features_pages = array('one','two', 'three' );
					foreach( $features_pages as $features_page ){
						$agensy_features_pages = get_theme_mod('agensy_'.$features_page.'_features_pages');

						if($agensy_features_pages){
							$agensy_features_args = array(
					            'post_type' => 'page',
					            'post_status' => 'publish',
					            'p' => absint($agensy_features_pages)
					      		  );
						
							$agensy_features_query = new WP_Query($agensy_features_args);
							if($agensy_features_query->have_posts()):
								while($agensy_features_query->have_posts()):
									$agensy_features_query->the_post();
				                    $agensy_image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'');?>
				                    
				                    <div class=" agensy-features-page">
										<?php
					                    if($agensy_image_src){
					                      ?>
					                        <div class="features-image-wrap"><img src="<?php echo esc_url($agensy_image_src[0]); ?>" />
					                        </div>
				                        <?php } ?>
											 <div class = "agensy-feature-title">
				                            	 <?php the_title();?>
				                    		 </div>
				                    		 <div class = "agensy-feature-description">
				                    		 	<?php echo esc_attr(wp_trim_words( get_the_content(), 15, '...' )); ?>
				                   			 </div>
				                   			 <div class = "feat-btn">
                                                <a href="<?php the_permalink(); ?>">Read More</a>
                                            </div>
			                   		</div>
				        		<?php 
				    			endwhile;
				            wp_reset_postdata();
				    		endif;
				    	}
					}
					?>
				</div>
			</div>
		</section>
	<?php
	}
}
	add_action('agensy_home_features_roles','agensy_home_features');
	