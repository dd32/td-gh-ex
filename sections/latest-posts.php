<?php
/**
 *	The template for dispalying latest posts section in front page.
 *
 *	@package WordPress
 *	@subpackage asterion
 */

	if( defined('OT_WIDGETS') && current_user_can( 'edit_theme_options' ) ) {
		$title = get_theme_mod('asterion_latest_posts_title',esc_html__('Latest Posts','asterion'));
		$text = get_theme_mod('asterion_latest_posts_text',esc_html__('All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.','asterion'));
	} else {
		$title = get_theme_mod('asterion_latest_posts_title');
		$text = get_theme_mod('asterion_latest_posts_text');
	}


	$bg_color = get_theme_mod('asterion_latest_posts_bg_color', '#ffffff');
	$text_color = get_theme_mod('asterion_latest_posts_text_color', 0);



	$count = get_theme_mod('asterion_latest_posts_count', 3);
	$offset = get_theme_mod('asterion_latest_posts_offset', 0);
	$cat = get_theme_mod('asterion_latest_posts_cat', array());
	$tag = get_theme_mod('asterion_latest_posts_tag', array());
	$images = get_theme_mod('asterion_latest_posts_images', 1);


	if(is_array($cat)) {
		$args['category__in'] = $cat;
		$category__in = $args['category__in'];
	} else if($cat) {
		$args['cat'] = $cat;
		$category__in = false;
	} else {
		$category__in = false;
	}

	if(is_array($tag)) {
		$args['tag__in'] = $tag;
		$tag__in = $args['tag__in'];
	} else if($cat) {
		$args['tag'] = $tag;
		$tag__in = false;
	} else {
		$tag__in = false;
	}

	$args = array(
		'offset' => $offset,
		'category__in' => $category__in,
		'tag__in' => $tag__in,
		'posts_per_page'=> $count,
		'ignore_sticky_posts' => true
	);

	$the_query = new WP_Query($args);

?>

<?php if( $title != "" || $text != "" || $the_query->have_posts() ) : ?>
	<!-- about plugin --> 
	<section id="latest-posts" class="ot-section <?php echo esc_attr(( $text_color == 1) ? 'text-light' : 'text-dark'); ?> <?php echo esc_attr(( $bg_color == "#fff" || $bg_color == "#ffffff" ) ? 'ot-bg-white' : ''); ?>" style="background-color:<?php echo esc_attr( $bg_color );?>">
		<div class="ot-container">
			<?php if( $title || $text ) : ?>
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<?php if( $title ) : ?>
								<h2><?php echo asterion()->customizer->sanitize_html($title);?></h2>
							<?php endif; ?>
							<?php if( $text ) : ?>
								<p><?php echo asterion()->customizer->sanitize_html($text);?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>


			<div class="row widget-count-<?php echo esc_attr($count);?> per-row-<?php echo esc_attr($count);?>">


				<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
				
					<div class="ot-widget">
						<div class="ot-blog-post">
							<?php if( $images == 1 ) : ?>
								<div class="ot-blog-post-image">
									<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
										<?php the_post_thumbnail( 'asterion-latest-posts-front' ); ?>		
									</a>
								</div>
							<?php endif;?>		
							<div class="ot-blog-post-body">
								<h2>
									<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" class="post-title">
										<?php the_title();?>
									</a>
								</h2>
								<p>
									<?php the_excerpt(); ?>
								</p>
								<p>
									<a href="<?php the_permalink();?>" title="<?php esc_attr_e("Read more", "asterion");?>" class="btn">
										<?php esc_html_e("Read more", "asterion");?>
									</a>
								</p>
							</div><!--/.post-entry-->

						</div><!--/.post-->
					</div>


				<?php endwhile; else: ?>
					<p><?php  esc_html_e('No posts were found','asterion');?></p>
				<?php endif; ?>


			</div>


		</div>
		<!-- /.container -->
	</section>
<?php endif; ?>