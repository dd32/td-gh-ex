<?php query_posts('post_type=post&posts_per_page='.get_sub_field('posts_to_show').'&cat='.get_sub_field('filter_by_categories'));?>

				<?php if(have_posts()): ?>

				<section class="content-main" role="main">
				<div class="col-sm-8">	

				<div class="category-box col-sm-12">

					<h3 class="p-category">
						<?php if(get_sub_field('title')){ ?>

						<span><?php the_sub_field('title'); ?></span>

						<?php }else{ ?>
						
						<span><?php _e('Category','newsmag'); ?></span>

						<?php } ?>
					</h3>

					<div class="main-category">
						
						<ul class="clearfix">

						<?php while(have_posts()):the_post(); ?>

							<li class="col-sm-3">

								<article <?php post_class('h-entry'); ?> id="post-<?php the_ID(); ?>">
									
									<div class="entry-content entry-media">

										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>

									</div> <!-- end entry-content -->

									<header class="entry-header">
										
										<h5 class="entry-title">
											<a href="<?php the_permalink(); ?>" class="u-url" rel="bookmark"><?php the_title(); ?></a>
										</h5>										

									</header> <!-- end entry-header -->									

								</article> <!-- end h-entry -->
								
							</li>	

						<?php endwhile; ?>					

							
						</ul>

					</div> <!-- end main-category -->
					

				</div> <!-- end category-box -->

				</div> <!-- end col-sm-8 -->
				</section> <!-- end content-main -->

				<!-- end col-sm-8 -->

				<?php endif; ?>

				<?php wp_reset_query(); ?>