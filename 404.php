<?php
get_header();
get_template_part('index', 'bannerstrip');
 ?>
 
<!-- 404 Error Section -->
<section id="section" class="404">
	<div class="container">
	
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">			
				<div class="error-404">
					<h1>404</h1>
					<h3><span class="txt-color"><?php echo __('Opps!','busiprof'); ?></span> <?php echo __('Sorry the page not found','busiprof'); ?></h3>
					<p><?php echo __('We`re sorry, but the page you are looking for doesn`t exist.','busiprof'); ?></p>
					<div class="btn-wrap"><a href="<?php echo home_url();?>" class="btn-error btn-large"><?php echo __('Homepage','busiprof'); ?></a></div>	
				</div>
			</div>
		</div>
		<!-- /Section Title -->	
		
		<div class="row">
			
		</div>
				
	</div>
</section>
<!-- End of 404 Error Section -->

<?php get_footer(); ?>