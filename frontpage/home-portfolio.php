<!-- portfolio section -->
<?php $cpm_theme_options = bhumi_get_options(); ?>
<div class="bhumi_project_section">

	<?php if($cpm_theme_options['port_heading'] !='') { ?>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="bhumi_heading_title">
						<h3><?php echo esc_attr($cpm_theme_options['port_heading']); ?></h3>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

	<div class="container">
		<div class="row" >

			<div id="bhumi_portfolio_section" class="enima_photo_gallery">
				<?php for($i=1 ; $i<=4; $i++) { 
					    if($cpm_theme_options['port_'.$i.'_title'] !='' && $cpm_theme_options['port_'.$i.'_img'] !='') { ?>
							<div class="col-lg-3 col-md-3 col-sm-6 pull-left fade-right d1 in">
								<div class="img-wrapper">

									<?php if($cpm_theme_options['port_'.$i.'_img'] !='') { ?>
											<div class="bhumi_home_portfolio_showcase">
												<img class="bhumi_img_responsive" alt="<?php the_title_attribute(); ?>" src="<?php echo esc_url($cpm_theme_options['port_'.$i.'_img']); ?>">

												<div class="bhumi_home_portfolio_showcase_overlay">
													<div class="bhumi_home_portfolio_showcase_overlay_inner ">

														<div class="bhumi_home_portfolio_showcase_icons">
															<a title="<?php echo esc_attr($cpm_theme_options['port_'.$i.'_title']); ?>" href="<?php echo esc_url($cpm_theme_options['port_'.$i.'_link']); ?>"><i class="fa fa-link"></i></a>
														</div>
													</div>
												</div>

											</div>
									<?php } ?>

									<?php if($cpm_theme_options['port_'.$i.'_title'] !='') { ?>
											<div class="bhumi_home_portfolio_caption">
												<h3><a href="<?php echo esc_url($cpm_theme_options['port_'.$i.'_link']); ?>"><?php echo esc_attr($cpm_theme_options['port_'.$i.'_title']); ?></a></h3>
											</div>
									<?php } ?>

								</div>
								<div class="bhumi_portfolio_shadow"></div>
							</div>
					<?php } 
				   } ?>
			</div>

		</div>
	</div>

</div>
<!-- /portfolio section -->