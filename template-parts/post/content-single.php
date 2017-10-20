<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bestblog
 */

?>


		<!-- Header image-->
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center   <?php if ( !is_active_sidebar( 'right-sidebar' ) ) : ?>no-left-padding single-wrap-noside<?php else : ?> single-wrap  <?php endif;?>">
				<?php if (have_posts()): ?>
				<?php while (have_posts()): ?>
				<?php the_post(); ?>
				<div class="cell large-auto  small-12 ">
					<article class="single-post-wrap " id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">
						<div class="single-post-content-wrap">
							<div class="grid-x grid-margin-y align-center ">
							<div class="cell small-12 <?php if ( !is_active_sidebar( 'right-sidebar' ) ) : ?> large-11 medium-11 <?php else : ?> large-12 <?php endif;?>">
							<div class="single-post-header">
								<div class="single-post-top">
									<!-- post top-->
									<div class="grid-x ">
										<div class="cell large-12 small-12 ">
											<span class="text-right"><?php bestblog_edit_link();?></span>
										</div>
									</div>
								</div>
								<!-- post meta and title-->
								<div class="post-cat-info clearfix">
									<?php bestblog_category_list(); ?>
								</div>
								<div class="single-title  ">
									<h1 ><?php the_title(); ?><h1>
											</div>
											<div class="post-meta-info ">
												<span class="meta-info-el meta-info-author">
													<?php echo get_avatar(get_the_author_meta('ID'), '40'); ?>
													<a class="vcard author" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>">
														<?php echo get_the_author();?>
													</a>
												</span>
												<span class="meta-info-el mate-info-date-icon">
													<i class="fa fa-clock-o"></i>
													<time class="date update" >
														<?php the_time(get_option('date_format')); ?>
													</time>
												</span>
												<span class="meta-info-el meta-info-comment">
													<i class="fa fa-comment-o"></i>
													<?php bestblog_meta_comment(); ?>
												</span>
											</div>
									</div><!-- post top END-->
								<!-- post main body-->
									<div class="single-content-wrap">
											<div class="entry single-entry ">
												<?php
                                                    the_content(sprintf(
                                                        /* translators: %s: Name of current post. */
                                                        wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'best-blog'), array( 'span' => array( 'class' => array() ) )),
                                                        the_title('<span class="screen-reader-text">"', '"</span>', false)
                                                    ));

                                                    wp_link_pages(array(
                                                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'best-blog'),
                                                        'after'  => '</div>',
                                                    ));
                                                ?>
											</div>
										<span class="single-post-tag">
											<?php bestblog_meta_tag();?>
										</span>

											<div class="box-comment-content" >

												<?php if (comments_open() || get_comments_number()) {
                                                    comments_template();
                                                }
                                                ?>
									</div>
								</div>
								<div class="single-post-box-outer">
									<?php get_template_part( 'parts/box', 'author' ); ?>
								</div>
								<?php get_template_part( 'functions/single', 'postnavi' ); ?>
								<?php get_template_part( 'parts/related', 'post' ); ?>
							</div></div>
								</div>


					</article>
				</div> <!-- post content warp end-->

			<?php endwhile ?>

			<?php endif ?><!-- End of the loop. -->

				<?php get_template_part('sidebar'); ?>
		</div>
</div> <!-- .single-post-outer -->
