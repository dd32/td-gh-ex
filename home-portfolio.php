<?php $awada_theme_options = awada_theme_options();
if (!$awada_theme_options['portfolio_home']) return;
global $post;
if ($awada_theme_options['portfolio_home'] == 1){ ?>
<section id="home_portfolio" class="white-wrapper">
	<div class="container">
		<div class="general-title">
			<?php if ($awada_theme_options['home_portfolio_title'] != ""){ ?>
			<h2 id="portfolio_heading"><?php echo esc_attr($awada_theme_options['home_portfolio_title']); ?></h2>
			<hr>
			<?php } ?>
		</div><!-- end general title -->
		<div class="padding-top">
			<?php preg_match('/\[PVGM[^\]]*](.*)/uis', $post->post_content, $matches);
			if(isset($matches[0]) || $awada_theme_options['portfolio_shortcode'] != "") { ?>
							<?php if (isset($matches[0])) {
								echo do_shortcode($matches[0]);
							} elseif ($awada_theme_options['portfolio_shortcode'] != "") {
								echo do_shortcode($awada_theme_options['portfolio_shortcode']);
							} ?>
			
				<?php } else {
				$port_title = array('PERFECT THEME', 'QUICK SUPPORT', 'RESPONSIVE THEME', 'MULTIPLE COLOR SCHEME', 'RETINA READY', 'AMAZING SHORTCODES');
				$j = 0;
				for($i=1 ; $i<=3 ; $i++){ ?>
					<div class="col-lg-4 col-sm-4 col-md-4 col-sm-4">
						<div class="portfolio_item">
							<div class="entry">
								<img src="<?php echo get_template_directory_uri(); ?>/images/Portfolio/port1.jpg" alt="" class="img-responsive">
								<div class="magnifier">
									<div class="buttons">
										<a class="st" rel="bookmark" href="#"><i class="fa fa-link"></i></a>
										<a class="sf" data-gal="prettyPhoto[product-gallery]" href="<?php echo get_template_directory_uri(); ?>/images/portfolio/port1.jpg"><i class="fa fa-expand"></i></a>
										<h3><?php echo $port_title[$j]; ?></h3>
									</div><!-- end buttons -->
								</div><!-- end magnifier -->
							</div><!-- end entry -->
						</div><!-- end portfolio_item -->
					</div><!-- end col-lg-4 -->
				<?php $j++; }
				} ?>	
		</div>
		<div class="clearfix"></div>
	</div><!-- end container -->
</section><!-- end white-wrapper -->
<?php } ?>