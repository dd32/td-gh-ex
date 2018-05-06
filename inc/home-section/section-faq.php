<?php 

function agensy_faq_home_page(){

	$agensy_home_faq_enable = get_theme_mod('agensy_home_faq_enable','on');
	if($agensy_home_faq_enable == 'on'){
		?>
		<section class ="agensy-faq-wrap agensy-home-section" id = "agensy-scroll-faq" > 
			<div class="agensy-container" id="faq-home-page">
				<div class="agensy-faq-wrapper">
					<?php 
					$agensy_faq_title = get_theme_mod('agensy_faq_title');
					$agensy_faq_description = get_theme_mod('agensy_faq_description');

					if( $agensy_faq_title ){ ?>
						<div class="section-title">
							<h2><?php echo esc_html($agensy_faq_title);  ?></h2>
						</div>
					<?php 
					}
					if( $agensy_faq_description ){ ?>
						<div class="section-description">
							<?php echo esc_html($agensy_faq_description); ?>
						</div>
					<?php } 
					
					$faq_pages = array('one','two', 'three' );
					foreach( $faq_pages as $faq_page ){

						$agensy_faq_page = get_theme_mod('agensy_'.$faq_page.'_faq_pages');
						if($agensy_faq_page){
							 $agensy_faq_args = array(
					        'post_type' => 'page',
					        'post_status' => 'publish',
					        'p' => absint($agensy_faq_page));
							 $agensy_faq_query = new WP_Query($agensy_faq_args);
						if($agensy_faq_query ->have_posts()):
						 	while($agensy_faq_query->have_posts()):
						 		$agensy_faq_query->the_post();
				                ?>
				                <div class="tab-title">
				                     <h3 data-tab="tab-<?php the_ID();?>">
				                         <?php the_title();?>
				                     </h3>
				                 </div>
				                 <div class="tab-contents" id="tab-<?php the_ID();?>">
				                     <p><?php the_content(); ?></p>
				                </div>
				                <?php 
						 	endwhile;
				            wp_reset_postdata();
				            ?>
				            <?php 
						endif;
						}
					}
					?>
			</div><!-- .agensy-faq-wrapper -->
			</div>
		</section>
	<?php 
	}
}
add_action('agensy_faq_home_page_role','agensy_faq_home_page');


