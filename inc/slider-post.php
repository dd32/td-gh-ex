<?php 
/** 
 *
 * @package mwsmall
 */
?>
<div class="mw-slider">
	<?php
		$posts_num = 5;
		$slider_cat = get_theme_mod( 'mwsmall_slider_cat' );
		$title_align = get_theme_mod( 'mwsmall_slider_text', 'center' );
		$btn_text = get_theme_mod( 'mwsmall_slider_button_text', __( 'Read More', 'mw-small' ) );
	?>
	<div class="row">
		<div class="col-md-12">
			<?php
			$slider = array(
				'posts_per_page' => $posts_num,
				'cat' => $slider_cat,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_type' => 'post',
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
			);
			$loop = new WP_Query( $slider );
		?>
			<div class="mw-small-slider-cat flexslider">
				<ul class="slides">
			
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog_img' );
		
					if( $title_align == 'left' ) {
						$slidclass = ' text-left';
					}else if( $title_align == 'right' ) {
						$slidclass = ' text-right';
					}else{
						$slidclass = ' text-center';
					}
				?>
					<li>
						<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" />
					
						<div class="container slider-dec col-xs-offset-1 col-xs-10 col-md-offset-1 col-md-8<?php echo $slidclass; ?>">
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