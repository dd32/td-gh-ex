<?php 
/** 
 *
 * @package mwsmall
 */
?>
<?php
	$slider_cat = get_theme_mod( 'mwsmall_slider_big_cat' );
	$slider_number = get_theme_mod( 'mwsmall_slider_big_number', 4 );
	$btn_text = get_theme_mod( 'mwsmall_slider_big_button_text', __( 'Read More', 'mw-small' ) );
?>
<div class="mw-slider mw-slider-big">
	<div class="row">
		<div class="col-md-12">
			<?php
				$slider = array(
					'posts_per_page' => $slider_number,
					'cat' => $slider_cat,
					'orderby' => 'post_date',
					'order' => 'DESC',
					'post_type' => 'post',
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1,
				);
				$loop = new WP_Query($slider);
			?>
			<div class="flexslider">
				<ul class="slides">
				<?php while ($loop->have_posts()) : $loop->the_post(); ?>
				<?php
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'slider_img' );
				?>
					<li>
						<img src="<?php echo $image[0] ?>" alt="<?php the_title(); ?>" />
						
						<div class="container slider-dec text-center col-xs-offset-1 col-xs-10 col-md-offset-1 col-md-8">
						
							<div class="header-slider">
								<time>
									<?php echo get_the_date(); ?>
								</time>
								
								<span class="cat-link">
									<?php the_category(', '); ?>
								</span>
							</div>
							
							<div class="entry-slider">
								<h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
								<?php the_excerpt(); ?>
							</div>
						
							<a class="link-more" href="<?php the_permalink(); ?>">
								<?php echo $btn_text; ?>
							</a>
							
						</div>
					</li>
				<?php endwhile; wp_reset_postdata(); ?>
				</ul>
			</div>
		</div>
	</div>
</div>