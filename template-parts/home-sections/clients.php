<?php if( get_theme_mod( 'clients_display', true ) ) : ?>

	<?php
		$category_id = get_theme_mod( 'clients_category' );

		$args = array(
        	'cat' => absint( $category_id ),
    		'posts_per_page'  => 6
        );
        $query = new WP_Query( $args );
	?>

<?php if( $query->have_posts() ) : ?>
<!-- Start Clients -->
		<div id="clients">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="clients-main wow fadeInUp">
							<?php while( $query->have_posts() ) : $query->the_post(); ?>
								<!-- Single Clients -->
								<?php
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?> 
									<?php if( ! empty( $image ) ) { ?>
										<div class="single-client">
											<img src="<?php echo esc_url( $image[0] ); ?>" class="img-responsive" alt="<?php echo esc_attr( get_the_title() ); ?>">									
										</div>											
									<?php } ?>								
								<!--/ Single Clients -->
							<?php endwhile; wp_reset_postdata(); ?>							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Clients -->
	<?php endif; ?>
<?php endif;