<?php
// Template Name: Blank Template
get_header();
?>
<div class="clearfix"></div>
<!-- Page Title Section -->
<?php asiathemes_breadcrumbs(); ?>

<section class="blog-section">
  	<div class="container">
		<div class="row">
			<div class="col-md-12">
			 	<div class="blog-page-section">
					<div class="wow fadeInUp" data-wow-duration="2s">
						<div class="blog-post-img">	
							<?php
							the_post();
							 the_content(); ?>	   
						</div>
					</div>	
			    </div>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>