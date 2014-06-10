<?php query_posts('post_type=post&posts_per_page='.get_sub_field('posts_to_show').'&cat='.get_sub_field('filter_by_categories'));?>

				<?php if(have_posts()): ?>	

				<section class="content-main" role="main">			
				
				

				<div class="category-mixed col-sm-4">

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

							<li>

								<article <?php post_class('h-entry'); ?> id="post-<?php the_ID(); ?>">
									
									<div class="entry-content entry-media">

										<a href="<?php the_permalink(); ?>" class="u-photo">
											<?php the_post_thumbnail(); ?>
										</a>

									</div> <!-- end entry-content -->

									<header class="entry-header">
										
										<h4 class="entry-title"><a href="<?php the_permalink(); ?>" class="u-url" rel="bookmark"><?php the_title(); ?></a></h4>

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
					

				</div> <!-- end category-mixed -->


				


				</section>
				

				<?php endif; ?>
				
<?php wp_reset_query(); ?>