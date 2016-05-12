<?php $corpbiz_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options ); 
if($current_options['portfolio_section_enabled'] == true) { ?>
<div class="portfolio_section">
	<div class="container">
		<div class="row">
			<div class="section_title">
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
	<?php if($current_options['portfolio_image_one'] !='') { ?>
		<div class="corpo_portfolio_image">
			<a href="<?php echo $current_options['home_image_one_link']; ?>"<?php if($current_options['home_image_one_link_target'] =="on") { echo "target='_blank'"; } ?>>
			<img class="img-responsive" src="<?php echo esc_url($current_options['portfolio_image_one']); ?>">
			<div class="corpo_home_portfolio_showcase_overlay">
				<div class="corpo_home_portfolio_showcase_overlay_inner">
					<div class="corpo_home_portfolio_showcase_icons">
						<h4><?php echo esc_html($current_options['portfolio_title_one']); ?></h4>							
					</div>
				</div>
			</div>
			</a>
		</div>
		<?php } ?>
	</div>
	
	<div class="col-md-3 col-sm-6 corpo_col_padding">
		<?php if($current_options['portfolio_image_two'] !='') { ?>
		<div class="corpo_portfolio_image">
			<a href="<?php echo $current_options['home_image_two_link']; ?>"<?php if($current_options['home_image_two_link_target'] =="on") { echo "target='_blank'"; } ?>>
			<img class="img-responsive" src="<?php echo esc_url($current_options['portfolio_image_two']); ?>">
			<div class="corpo_home_portfolio_showcase_overlay">
				<div class="corpo_home_portfolio_showcase_overlay_inner">
					<div class="corpo_home_portfolio_showcase_icons">
						<h4><?php echo esc_html($current_options['portfolio_title_two']); ?></h4>							
					</div>
				</div>
			</div>
			</a>
		</div>
		<?php } ?>
	</div>
	
	<div class="col-md-3 col-sm-6 corpo_col_padding">
		<?php if($current_options['portfolio_image_three'] !='') { ?>
		<div class="corpo_portfolio_image">
			<a href="<?php echo $current_options['home_image_three_link']; ?>"<?php if($current_options['home_image_three_link_target'] =="on") { echo "target='_blank'"; } ?>>
			<img class="img-responsive" src="<?php echo esc_url($current_options['portfolio_image_three']); ?>">
			<div class="corpo_home_portfolio_showcase_overlay">
				<div class="corpo_home_portfolio_showcase_overlay_inner">
					<div class="corpo_home_portfolio_showcase_icons">
						<h4><?php echo esc_html($current_options['portfolio_title_three']); ?></h4>							
					</div>
				</div>
			</div>
			</a>
		</div>
		<?php } ?>
	</div>
	
	<div class="col-md-3 col-sm-6 corpo_col_padding">
		<?php if($current_options['portfolio_image_four'] !='') { ?>
		<div class="corpo_portfolio_image">
		<a href="<?php echo $current_options['home_image_four_link']; ?>"<?php if($current_options['home_image_four_link_target'] =="on") { echo "target='_blank'"; } ?>>
			<img class="img-responsive" src="<?php echo esc_url($current_options['portfolio_image_four']); ?>">
			<div class="corpo_home_portfolio_showcase_overlay">
				<div class="corpo_home_portfolio_showcase_overlay_inner">
					<div class="corpo_home_portfolio_showcase_icons">
						<h4><?php echo esc_html($current_options['portfolio_title_four']); ?></h4>							
					</div>
				</div>
				
			</div>
			</a>
			<?php } ?>
		</div>
	</div>
	
	
	<!--/Porfolio Showcase-->	
</div>
<!--/Homepage Portfolio Section-->
<?php } ?>