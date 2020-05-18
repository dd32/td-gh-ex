<!-- Start: Recent Blog
============================= -->
<?php 
	$arowana_hs_blog = get_theme_mod('hide_show_blog','1');
	$arowana_blog_title = get_theme_mod('blog_title');
	$arowana_blog_desc = get_theme_mod('blog_description'); 
	$arowana_blog_display_num = get_theme_mod('blog_display_num','3');
?>
<?php if($arowana_hs_blog == '1') {?>
<section id="recent-blog" class="section-padding">
	<div class="container">
		<?php if ( ! empty( $arowana_blog_title ) || ! empty( $arowana_blog_desc )) :?>
			<div class="row">
				<div class="col-md-6 offset-md-3 text-center">
					<div class="section-header">
						<?php if($arowana_blog_title) { ?>
							<h2><?php echo esc_html($arowana_blog_title); ?></h2>
						<?php } ?>
						<?php if($arowana_blog_desc) { ?>
							<p class="wow fadeInUp" data-wow-delay="0.1s"><?php echo esc_html($arowana_blog_desc); ?></p>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php endif; ?>	
		<div class="row">
			<?php 	
				 if ( function_exists( 'cleverfox_activate' ) ) { 
					$arowana_args = array( 'post_type' => 'post','posts_per_page' => $arowana_blog_display_num,'post__not_in'=>get_option("sticky_posts")) ; 	
				}else{
					$arowana_args = array( 'post_type' => 'post','post__not_in'=>get_option("sticky_posts")) ; 	
				}
					 $arowana_wp_query = new WP_Query($arowana_args);
					if($arowana_wp_query->have_posts())
					{	
					while($arowana_wp_query->have_posts()):$arowana_wp_query->the_post(); ?>
					<div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-4">
						<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
							<div class="post-thumb">
								<?php if ( has_post_thumbnail() ) { 
									 the_post_thumbnail();
								} ?>
								<div class="post-overlay">
									<a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-link"></i></a>
								</div>
							</div>
							<div class="post-content">
								<?php     
									if ( is_single() ) :
										the_title('<h4 class="post-title">', '</h4>' );
									else:
										the_title( sprintf( '<h4 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
									endif; 
								?> 
								<?php 
									the_content( 
										sprintf( 
											__( 'Read More', 'arowana' ), 
											'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
										) 
									);
								?>
							</div>
								<ul class="meta-info">
									 <li class="post-date"><a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><i class="fa fa-calendar"></i> <?php echo esc_html(get_the_date('j M, Y')); ?></a></li>
									<li class="posted-by"><i class="icofont icofont-user"></i> <?php esc_html_e('By','arowana'); ?> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html(the_author()); ?></a></li>
								</ul>
						</article>
					</div>
			<?php 
				endwhile; 
				wp_reset_postdata(); 
				}
			?>
			
		</div>
	</div>
</section>
<?php } ?>
<!-- End: Recent Blog
============================= -->