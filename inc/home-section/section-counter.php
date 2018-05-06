<?php 

function agensy_counter_page(){
	$agensy_enable_counter_section = get_theme_mod('agensy_enable_counter_section','on');
	if($agensy_enable_counter_section == 'on'){
		?>
		<section class = "agensy-counter-wrap agensy-home-section" id = "agensy-scroll-counter">
			<div class = "agensy-container">
				<div class="counter-of-agency clearfix">
				<?php 
					$team_counters = array('one','two', 'three' );
					foreach( $team_counters as $team_counter ){
						$agensy_counter_value = get_theme_mod('agensy_team_'.$team_counter.'_counter_value');
						if($agensy_counter_value){
							?>
							<div class="counter-inner-wrapper">
								<div id = "agensy-scroll" class = "agensy-counter-scroll">
									<div class = "agensy-counter-scroll-value" data-count="<?php echo absint($agensy_counter_value) ?>">0</div>
								</div>
							 	<?php 	
								$agensy_counter_pages = get_theme_mod('agensy_team_'.$team_counter.'_counter_pages');
								if($agensy_counter_pages){
									$agensy_counter_args = array(
							            'post_type' => 'page',
							            'post_status' => 'publish',
							            'p' => $agensy_counter_pages
							      		  );
									$agensy_counter_query = new WP_Query($agensy_counter_args);
									if($agensy_counter_query->have_posts()):
										while($agensy_counter_query->have_posts()):
											$agensy_counter_query->the_post();
										?>
						                <div class="agensy-counter-page">
											 <div class = "agensy-feature-title">
						                         <?php the_title();?>
						                	 </div>

						            		 <div class = "agensy-feature-description">
						                 		<?php the_content(); ?>
						           			 </div>
						               	 </div>
										<?php 
										endwhile;
								    wp_reset_postdata();
									endif; 
								}?>
							</div>
			<?php 	} 	}?>
			</div>
			</div>
		</section>
	<?php 
	}
}

add_action('agensy_counter_page_roles','agensy_counter_page');

