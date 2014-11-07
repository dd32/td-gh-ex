<?php $current_options = get_option('corpbiz_options'); ?>
<div class="portfolio_section">
	<div class="container">
		<div class="row">
			<div class="corpo_heading_title">
			<?php if($current_options['portfolio_title'] !='') { ?>
				<h1><?php echo esc_html($current_options['portfolio_title']);  ?></h1>
				<?php } ?>
				<?php if($current_options['portfolio_description'] !='') { ?>
				<p><?php echo esc_html($current_options['portfolio_description']); ?></p>
				<?php } ?>
			</div>	
		</div> 		
	</div>
	
	<div class="col-md-3 col-sm-6 corpo_col_padding">
		<div class="corpo_portfolio_image">
			<img class="img-responsive" style="width:396px; height:336px;" src="<?php echo esc_url($current_options['portfolio_image_one']); ?>">
			<div class="corpo_home_portfolio_showcase_overlay">
				<div class="corpo_home_portfolio_showcase_overlay_inner">
					<div class="corpo_home_portfolio_showcase_icons">
						<h4><?php echo esc_html($current_options['portfolio_title_one']); ?></h4>							
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-3 col-sm-6 corpo_col_padding">
		<div class="corpo_portfolio_image">
			<img class="img-responsive" style="width:396px; height:336px;" src="<?php echo esc_url($current_options['portfolio_image_two']); ?>">
			<div class="corpo_home_portfolio_showcase_overlay">
				<div class="corpo_home_portfolio_showcase_overlay_inner">
					<div class="corpo_home_portfolio_showcase_icons">
						<h4><?php echo esc_html($current_options['portfolio_title_two']); ?></h4>							
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-3 col-sm-6 corpo_col_padding">
		<div class="corpo_portfolio_image">
			<img class="img-responsive" style="width:396px; height:336px;" src="<?php echo esc_url($current_options['portfolio_image_three']); ?>">
			<div class="corpo_home_portfolio_showcase_overlay">
				<div class="corpo_home_portfolio_showcase_overlay_inner">
					<div class="corpo_home_portfolio_showcase_icons">
						<h4><?php echo esc_html($current_options['portfolio_title_three']); ?></h4>							
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-3 col-sm-6 corpo_col_padding">
		<div class="corpo_portfolio_image">
			<img class="img-responsive" style="width:396px; height:336px;" src="<?php echo esc_url($current_options['portfolio_image_four']); ?>">
			<div class="corpo_home_portfolio_showcase_overlay">
				<div class="corpo_home_portfolio_showcase_overlay_inner">
					<div class="corpo_home_portfolio_showcase_icons">
						<h4><?php echo esc_html($current_options['portfolio_title_four']); ?></h4>							
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<!--/Porfolio Showcase-->	
</div>
<!--/Homepage Portfolio Section-->