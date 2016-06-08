<?php $becorp_option=becorp_theme_default_data(); 
$portfolio_options = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_option );
if($portfolio_options['enable_home_portfolio'] == 1 ) { ?>
<div class="portfolio-section">
<div class="container">
 <div class="row">
     <div class="col-md-12">
		<div class="main-heading">
		   <h2 class="wow fadeInLeft animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;"><?php echo esc_attr($portfolio_options['portfolio_title_one']); ?><span><?php echo $portfolio_options['portfolio_title_two']; ?></span> </h2>
		   <p class="wow fadeInRight animated" data-wow-delay=".8s" style="visibility: visible; -webkit-animation-delay: .8s;"><?php echo esc_attr($portfolio_options['portfolio_description']); ?></p>
		</div>
      </div>	
    </div>
	<div class="col-md-12">
		<ul class="project-scroll-btn">
			<li><a class="project-prev" href="#newCarousel" data-slide="prev"></a></li>
			<li><a class="project-next" href="#newCarousel" data-slide="next"></a></li>    
		</ul>
	</div>
  <div class="clearfix"></div>
   <div class="row">  
	 <div class="col-md-12 wow fadeInDown animated" data-wow-delay="0.4s">
	  <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="newCarousel">
	    
		 <div id="gallery" class="carousel-inner">
				 
				<div class="item active">
					<div class="col-md-4 col-sm-6 col-xs-12 pull-left">
					  <div class="portfolio-area">
						<div class="portfolio-image">
							<?php if($portfolio_options['upload_image_one'] !='') { ?>
							<img class="img-responsive" src="<?php echo esc_url($portfolio_options['upload_image_one']); ?>" />
							  <div class="caption">
								   <div class="portfolio-icon">
								    <a class="photobox_a" href="<?php echo esc_url($portfolio_options['upload_image_one']); ?>"  title="<?php echo $portfolio_options['portfolio_image_one_title']; ?>"><i class="fa fa-search-plus"></i>
										<img title="<?php echo $portfolio_options['portfolio_image_one_title']; ?>" src="<?php echo esc_url($portfolio_options['upload_image_one']); ?>" style="display:none;" />
									</a>
								     <a href="<?php echo esc_url($portfolio_options['portfolio_image_one_link']); ?>"<?php if( $portfolio_options['portfolio_new_tab'] ==1 ) { echo "target='_blank'"; } ?>><i class="fa fa-link"></i></a>
								   </div>
						     </div>
						   <?php } ?>
						</div>
						<div class="portfolio-content">
						  <h4><?php echo $portfolio_options['portfolio_image_one_title']; ?></h4>
						   <p><?php echo $portfolio_options['portfolio_image_one_description']; ?></p>
						</div>
					</div>
				 </div>
				</div>
				<div class="item">
					<div class="col-md-4 col-sm-6 col-xs-12 pull-left">
					  <div class="portfolio-area">
						<div class="portfolio-image">
							<?php if($portfolio_options['upload_image_two'] !='') { ?>
							<img class="img-responsive" src="<?php echo esc_url($portfolio_options['upload_image_two']); ?>" />
							  <div class="caption">
								   <div class="portfolio-icon">
								    <a class="photobox_a" href="<?php echo esc_url($portfolio_options['upload_image_two']); ?>"  title="<?php echo $portfolio_options['portfolio_image_two_title']; ?>"><i class="fa fa-search-plus"></i>
										<img title="<?php echo $portfolio_options['portfolio_image_two_title']; ?>" src="<?php echo esc_url($portfolio_options['upload_image_two']); ?>" style="display:none;" />
									</a>
								     <a href="<?php echo esc_url($portfolio_options['portfolio_image_two_link']); ?>"<?php if( $portfolio_options['portfolio_two_new_tab'] ==1 ) { echo "target='_blank'"; } ?>><i class="fa fa-link"></i></a>
								   </div>
						     </div>
						   <?php } ?>
						</div>
						<div class="portfolio-content">
						  <h4><?php echo $portfolio_options['portfolio_image_two_title']; ?></h4>
						   <p><?php echo $portfolio_options['portfolio_image_two_description']; ?></p>
						</div>
					</div>
				 </div>
				</div>
				<div class="item">
					<div class="col-md-4 col-sm-6 col-xs-12 pull-left">
					  <div class="portfolio-area">
						<div class="portfolio-image">
							<?php if($portfolio_options['upload_image_three'] !='') { ?>
							<img class="img-responsive" src="<?php echo esc_url($portfolio_options['upload_image_three']); ?>" />
							  <div class="caption">
								   <div class="portfolio-icon">
								    <a class="photobox_a" href="<?php echo esc_url($portfolio_options['upload_image_three']); ?>"  title="<?php echo $portfolio_options['portfolio_image_three_title'];  ?>"><i class="fa fa-camera"></i>
									  <img title="<?php echo $portfolio_options['portfolio_image_three_title']; ?>" src="<?php echo esc_url($portfolio_options['upload_image_three']); ?>" style="display:none !important;visibility:hidden" />
									</a>
								     <a href="<?php echo esc_url($portfolio_options['portfolio_image_three_link']); ?>"<?php if( $portfolio_options['portfolio_three_new_tab'] ==1 ) { echo "target='_blank'"; } ?>><i class="fa fa-link"></i></a>
								   </div>
						     </div>
						   <?php } ?>
						</div>
						<div class="portfolio-content">
						  <h4><?php echo $portfolio_options['portfolio_image_three_title']; ?></h4>
						   <p><?php echo $portfolio_options['portfolio_image_three_description']; ?></p>
						</div>
					</div>
				 </div>
				</div>
			</div>
			
	</div>
  </div>
  </div>
  </div>
 </div>
 <?php } ?>