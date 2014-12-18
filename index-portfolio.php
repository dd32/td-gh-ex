<!-- AddThis Button END -->
<?php $current_options=get_option('wallstreet_lite_options'); ?>
<?php if($current_options['portfolio_section_enabled'] == 'on') { ?>
<div class="portfolio-section">
	<div class="container">

		<div class="row">
			<div class="section_heading_title">
				<?php if($current_options['portfolio_title']) { ?>
				<h1><?php echo esc_html($current_options['portfolio_title']); ?></h1>
				<div class="pagetitle-separator"></div>
			<?php } ?>
			<?php if($current_options['portfolio_description']) { ?>
				<p><?php echo esc_html($current_options['portfolio_description']); ?></p>
			<?php } ?>				
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-md-6 home-portfolio-area">
				<div class="home-portfolio-showcase">
					<div class="home-portfolio-showcase-media">
					<?php if($current_options['portfolio_image_one']) { ?>
						<img class="img-responsive home-portfolio-img" alt="Sleek &amp; Beautiful" src="<?php echo esc_url($current_options['portfolio_image_one']); ?>">
					<?php } ?>
						<div class="home-portfolio-showcase-overlay">
							<div class="home-portfolio-showcase-overlay-inner">
								<div class="home-portfolio-showcase-detail">
									<?php if($current_options['portfolio_title_one']){ ?>
									<h4><?php echo esc_html($current_options['portfolio_title_one']); ?></h4>
									<?php } ?>
									<?php if($current_options['portfolio_description_one']){ ?>
									<p><?php echo esc_html($current_options['portfolio_description_one']);?></p>
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
					<?php if($current_options['portfolio_image_two']) { ?>
						<img class="img-responsive home-portfolio-img" alt="Sleek &amp; Beautiful" src="<?php echo esc_url($current_options['portfolio_image_two']); ?>">
					<?php } ?>
						<div class="home-portfolio-showcase-overlay">
							<div class="home-portfolio-showcase-overlay-inner">
								<div class="home-portfolio-showcase-detail">
									<?php if($current_options['portfolio_title_two']){ ?>
									<h4><?php echo esc_html($current_options['portfolio_title_two']); ?></h4>
									<?php } ?>
									<?php if($current_options['portfolio_description_two']){ ?>
									<p><?php echo esc_html($current_options['portfolio_description_two']);?></p>
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
					<?php if($current_options['portfolio_image_three']) { ?>
						<img class="img-responsive home-portfolio-img" alt="Sleek &amp; Beautiful" src="<?php echo esc_url($current_options['portfolio_image_three']); ?>">
					<?php } ?>
						<div class="home-portfolio-showcase-overlay">
							<div class="home-portfolio-showcase-overlay-inner">
								<div class="home-portfolio-showcase-detail">
									<?php if($current_options['portfolio_title_three']){ ?>
									<h4><?php echo esc_html($current_options['portfolio_title_three']); ?></h4>
									<?php } ?>
									<?php if($current_options['portfolio_description_three']){ ?>
									<p><?php echo esc_html($current_options['portfolio_description_three']);?></p>
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
					<?php if($current_options['portfolio_image_four']) { ?>
						<img class="img-responsive home-portfolio-img" alt="Sleek &amp; Beautiful" src="<?php echo esc_url($current_options['portfolio_image_four']); ?>">
					<?php } ?>
						<div class="home-portfolio-showcase-overlay">
							<div class="home-portfolio-showcase-overlay-inner">
								<div class="home-portfolio-showcase-detail">
									<?php if($current_options['portfolio_title_four']){ ?>
									<h4><?php echo esc_html( $current_options['portfolio_title_four'] ); ?></h4>
									<?php } ?>
									<?php if($current_options['portfolio_description_four']){ ?>
									<p><?php echo esc_html( $current_options['portfolio_description_four'] );?></p>
									<?php } ?>
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
<!-- /wallstreet Portfolio Section ---->