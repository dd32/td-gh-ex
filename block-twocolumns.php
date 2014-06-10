<?php query_posts('post_type=post&posts_per_page='.get_sub_field('posts_to_show').'&cat='.get_sub_field('filter_by_categories'));?>

				<?php if(have_posts()): ?>
				<section class="content-main" role="main">	

				<div class="col-sm-8">

				<div class="category-wide col-sm-12">

					<h3 class="p-category">
						<?php if(get_sub_field('title')){ ?>

						<span><?php the_sub_field('title'); ?></span>

						<?php }else{ ?>
						
						<span><?php _e('Category','newsmag'); ?></span>

						<?php } ?>
					</h3>

					<div class="main-category">
						
						<ul>

						<?php while(have_posts()):the_post(); ?>

							<li class="col-sm-12">

								<article <?php post_class('h-entry'); ?> id="post-<?php the_ID(); ?>">
									
									<div class="entry-content entry-media col-sm-5">

										<a href="<?php the_permalink(); ?>" class="u-photo">
											<?php the_post_thumbnail(); ?>
										</a>

									</div> <!-- end entry-content -->

									<header class="entry-header">
										
										<h3 class="entry-title">
											<a href="<?php the_permalink(); ?>" class="u-url" rel="bookmark"><?php the_title(); ?></a>
										</h3>

										<div class="entry-meta">
											
											<span class="dt-published"><?php the_date(); ?></span>

											<?php if(comments_open()){ ?>
												<span class="sep">|</span>	

												<span class="span-comment">
													<?php comments_number(__('No Comments', 'newsmag'),__('1 Comment', 'newsmag'),__('% Comments', 'newsmag')); ?>
												</span>	
											<?php } ?>	

										</div> <!-- end entry-meta -->

									</header> <!-- end entry-header -->


									<div class="entry-summary">

										<?php the_excerpt(); ?>										

									</div> <!-- end entry-content -->

									

								</article> <!-- end h-entry -->
								
							</li>

						<?php endwhile; ?>
							
						</ul>

					</div> <!-- end main-category -->
					

				</div> <!-- end category-wide -->

				</div> <!-- end col-sm8 -->	

				</section>

				<?php endif; ?>

<?php wp_reset_query(); ?>