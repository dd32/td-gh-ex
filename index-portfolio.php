<?php $becorp_option=becorp_theme_default_data(); 
$portfolio_options = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_option );
if($portfolio_options['enable_home_portfolio'] == 1 ) { ?>
<div class="container portfolio-section">
 <div class="row">
     <div class="col-md-12">
		<div class="main-heading">
		   <h2><?php echo $portfolio_options['portfolio_title_one']; ?>&nbsp;&nbsp;<span><?php echo $portfolio_options['portfolio_title_two']; ?></span> </h2>
		   <p><?php echo $portfolio_options['portfolio_description']; ?></p>
		</div>
      </div>	
    </div>
   <div class="row">
			<div class="col-md-12">
				<ul class="project-scroll-btn">
					<li><a class="project-prev" href="#newCarousel" data-slide="prev"></a></li>
					<li><a class="project-next" href="#newCarousel" data-slide="next"></a></li>    
				</ul>
			</div>
	</div> 
	<div class="col-md-12">
	  <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="newCarousel">
	    
		 <div class="carousel-inner">
					
				<div class="item active">
				<?php if($portfolio_options['upload_image_one'] !='') { ?>
					<div class="col-md-4 col-sm-6 col-xs-12 pull-left portfolio-area">
						<div class="portfolio-image">
							<img class="img-responsive" src="<?php echo esc_url($portfolio_options['upload_image_one']); ?>" />
							  <div class="caption">
								<h4><?php echo $portfolio_options['portfolio_image_one_title']; ?></h4>
									<p><?php echo $portfolio_options['portfolio_image_one_description']; ?></p>
								   <div class="portfolio-icon">
								  <a href="<?php echo esc_url($portfolio_options['upload_image_one']); ?>" rel="lightbox[group]" title="<?php echo $portfolio_options['portfolio_image_one_title']; ?>"><i class="fa fa-camera"></i></a>
								  <a href="<?php echo esc_url($portfolio_options['portfolio_image_one_link']); ?>"<?php if( $portfolio_options['portfolio_new_tab'] ==1 ) { echo "target='_blank'"; } ?>><i class="fa fa-link"></i></a>
							   </div>
						   </div>
						</div>
					</div>
					<?php } ?>
				</div>
				
				<div class="item">
				<?php if($portfolio_options['upload_image_two'] !='') { ?>
					<div class="col-md-4 col-sm-6 col-xs-12 pull-left portfolio-area">
						<div class="portfolio-image">
							<img class="img-responsive" src="<?php echo esc_url($portfolio_options['upload_image_two']); ?>" />
							  <div class="caption">
								<h4><?php echo $portfolio_options['portfolio_image_two_title']; ?></h4>
									<p><?php echo $portfolio_options['portfolio_image_two_description']; ?></p>
								   <div class="portfolio-icon">
								  <a href="<?php echo esc_url($portfolio_options['upload_image_two']); ?>" rel="lightbox[group]" title="<?php echo $portfolio_options['portfolio_image_two_title']; ?>"><i class="fa fa-camera"></i></a>
								  <a href="<?php echo esc_url($portfolio_options['portfolio_image_two_link']); ?>"<?php if( $portfolio_options['portfolio_two_new_tab'] ==1 ) { echo "target='_blank'"; } ?>><i class="fa fa-link"></i></a>
							   </div>
						   </div>
						</div>
					</div>
					<?php } ?>
				</div>
				
				<div class="item">
				<?php if($portfolio_options['upload_image_three'] !='') { ?>
					<div class="col-md-4 col-sm-6 col-xs-12 pull-left portfolio-area">
						<div class="portfolio-image">
							<img class="img-responsive" src="<?php echo esc_url($portfolio_options['upload_image_three']); ?>" />
							  <div class="caption">
								<h4><?php echo $portfolio_options['portfolio_image_three_title']; ?></h4>
									<p><?php echo $portfolio_options['portfolio_image_three_description']; ?></p>
								   <div class="portfolio-icon">
								  <a href="<?php echo esc_url($portfolio_options['upload_image_three']); ?>" rel="lightbox[group]" title="<?php echo $portfolio_options['portfolio_image_three_title']; ?>"><i class="fa fa-camera"></i></a>
								  <a href="<?php echo esc_url($portfolio_options['portfolio_image_three_link']); ?>"<?php if( $portfolio_options['portfolio_three_new_tab'] ==1 ) { echo "target='_blank'"; } ?>><i class="fa fa-link"></i></a>
							   </div>
						   </div>
						</div>
					</div>
					<?php } ?>
				</div>
				
			</div>
			
	</div>
  </div>
 </div>
 <?php } ?>