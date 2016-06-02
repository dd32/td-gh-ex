<!-- service section -->
<?php $cpm_theme_options = bhumi_get_options();
$bhumi_service_arg = array(
	'post_type'      => 'post',
	'posts_per_page' => 4,
	'post_status'    => 'publish',
	'order'          => 'desc',
	'orderby'        => 'date',
	'category_name' => 'service-slug',
	);
$bhumi_service_query = new WP_Query($bhumi_service_arg);
if($bhumi_service_query->have_posts()):


?>
<div class="bhumi_service">
<?php if($cpm_theme_options['home_service_heading'] !='') { ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="bhumi_heading_title">
				<h3><?php echo esc_attr($cpm_theme_options['home_service_heading']); ?></h3>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<div class="container">
		<div class="row isotope" id="isotope-service-container">
			<?php
			while($bhumi_service_query->have_posts()):
				$bhumi_service_query->the_post();
					$value = get_post_meta( $post->ID, 'service_class', true );
				     ?>
						<div class=" col-md-3 service">
							<div class="bhumi_service_area appear-animation bounceIn appear-animation-visible">
									<?php if($value !='') { ?>
										<a class="bhumi_service_icon" href="<?php the_permalink(); ?>"><i class="fa <?php echo esc_attr($value); ?>"></i></a>
									<?php } ?>
									<div class="bhumi_service_detail media-body">
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										 <p>
										<?php the_content(); ?></p>
									</div>
							</div>
						</div>
			        <?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</div>
<!-- /Service section -->
<?php endif;
wp_reset_query(); ?>