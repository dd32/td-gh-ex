<?php
/**
* @Theme Name	:	wallstreet
* @file         :	index-portfolio.php
* @package      :	wallstreet
@author       :	Harish Lodha
* @filesource   :	wp-content/themes/wallstreet/index-portfolio.php
*/
?>
<!-- AddThis Button END -->
<div class="portfolio-section">
	<div class="container">
		<?php $current_options=get_option('wallstreet_lite_options');
			$portfolio_title = $current_options['portfolio_title'];
			$portfolio_description = $current_options['portfolio_description'];
			
			$portfolio_title_one = $current_options['portfolio_title_one'];
			$portfolio_description_one = $current_options['portfolio_description_one'];
			$portfolio_image_one = $current_options['portfolio_image_one'];

			$portfolio_title_two = $current_options['portfolio_title_two'];
			$portfolio_description_two = $current_options['portfolio_description_two'];
			$portfolio_image_two = $current_options['portfolio_image_two'];
			
			$portfolio_title_three = $current_options['portfolio_title_three'];
			$portfolio_description_three = $current_options['portfolio_description_three'];
			$portfolio_image_three = $current_options['portfolio_image_three'];
			
			$portfolio_title_four = $current_options['portfolio_title_four'];
			$portfolio_description_four = $current_options['portfolio_description_four'];
			$portfolio_image_four = $current_options['portfolio_image_four'];
			
			
		?>
		<div class="row">
			<div class="section_heading_title">
				<?php if($portfolio_title) { ?>
				<h1><?php echo esc_html($portfolio_title); ?></h1>
				<div class="pagetitle-separator"></div>
			<?php } ?>
			<?php if($portfolio_description) { ?>
				<p><?php echo esc_html($portfolio_description); ?></p>
			<?php } ?>				
			</div>
		</div>
		<div class="row">
		<?php if($current_options['portfolio_section_enabled'] == 'on') { ?>
			<div class="col-md-3 col-md-6 home-portfolio-area">
				<div class="home-portfolio-showcase">
					<div class="home-portfolio-showcase-media">
					<?php if($portfolio_image_one) { ?>
						<img class="img-responsive" style="width:263px; height:243px;" alt="Sleek &amp; Beautiful" src="<?php echo esc_url($current_options['portfolio_image_one']); ?>">
					<?php } ?>
						<div class="home-portfolio-showcase-overlay">
							<div class="home-portfolio-showcase-overlay-inner">
								<div class="home-portfolio-showcase-detail">
									<?php if($portfolio_title_one){ ?>
									<h4><?php echo esc_html($portfolio_title_one); ?></h4>
									<?php } ?>
									<?php if($portfolio_description_one){ ?>
									<p><?php echo esc_html($portfolio_description_one);?></p>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-3 col-md-6 home-portfolio-area">
				<div class="home-portfolio-showcase">
					<div class="home-portfolio-showcase-media">
					<?php if($portfolio_image_two) { ?>
						<img class="img-responsive" style="width:263px; height:243px;" alt="Sleek &amp; Beautiful" src="<?php echo esc_url($current_options['portfolio_image_two']); ?>">
					<?php } ?>
						<div class="home-portfolio-showcase-overlay">
							<div class="home-portfolio-showcase-overlay-inner">
								<div class="home-portfolio-showcase-detail">
									<?php if($portfolio_title_two){ ?>
									<h4><?php echo esc_html($portfolio_title_two); ?></h4>
									<?php } ?>
									<?php if($portfolio_description_two){ ?>
									<p><?php echo esc_html($portfolio_description_two);?></p>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-3 col-md-6 home-portfolio-area">
				<div class="home-portfolio-showcase">
					<div class="home-portfolio-showcase-media">
					<?php if($portfolio_image_three) { ?>
						<img class="img-responsive" style="width:263px; height:243px;" alt="Sleek &amp; Beautiful" src="<?php echo esc_url($current_options['portfolio_image_three']); ?>">
					<?php } ?>
						<div class="home-portfolio-showcase-overlay">
							<div class="home-portfolio-showcase-overlay-inner">
								<div class="home-portfolio-showcase-detail">
									<?php if($portfolio_title_three){ ?>
									<h4><?php echo esc_html($portfolio_title_three); ?></h4>
									<?php } ?>
									<?php if($portfolio_description_three){ ?>
									<p><?php echo esc_html($portfolio_description_three);?></p>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-3 col-md-6 home-portfolio-area">
				<div class="home-portfolio-showcase">
					<div class="home-portfolio-showcase-media">
					<?php if($portfolio_image_four) { ?>
						<img class="img-responsive" style="width:263px; height:243px;" alt="Sleek &amp; Beautiful" src="<?php echo esc_url($current_options['portfolio_image_four']); ?>">
					<?php } ?>
						<div class="home-portfolio-showcase-overlay">
							<div class="home-portfolio-showcase-overlay-inner">
								<div class="home-portfolio-showcase-detail">
									<?php if($portfolio_title_four){ ?>
									<h4><?php echo esc_html( $portfolio_title_four ); ?></h4>
									<?php } ?>
									<?php if($portfolio_description_four){ ?>
									<p><?php echo esc_html( $portfolio_description_four );?></p>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
</div>	
</div>
<!-- /wallstreet Portfolio Section ---->