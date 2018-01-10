<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package bestblog
*/

?>

<div class="content-wrapper padding-vertical-small-2 padding-vertical-large-3 margin-horizontal-cs-1">
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-center">
			<?php if (have_posts()): ?>
				<?php while (have_posts()): ?>
					<?php the_post(); ?>
					<div class="cell small-24 <?php if ( ! is_active_sidebar( 'right-sidebar' ) ) : ?> large-22 <?php else:?> large-17 <?php endif;?> ">
						<article class="single-post-warp z-depth-1" id="post-<?php the_ID(); ?> ">
							<?php if (has_post_thumbnail()): ?>
								<!-- featured-image -->
								<div class="featured-image img-div-cover">
									<?php $post_id = get_post($post); ?>
									<?php echo get_the_post_thumbnail($post_id, 'bestblog-xlarge', array( 'class' => 'float-center object-fit-images' )); ?>
									<span class="single-cats button-group font-bold">
										<?php bestblog_category_list(); ?>
									</span>
								</div>
								<!-- featured-image END -->
							<?php else :?>
								<span class="single-cats single-cats-noimg button-group font-bold">
									<?php bestblog_category_list(); ?>
								</span>
							<?php endif;?>
							<!-- post single content body -->
							<div class="single-header-warp">
								<div class="single-post-title">
									<h1> <?php the_title(); ?></h1>
								</div>
								<div class="post-meta">
									<span class="font-bold clear button secondary meta-author">
										<span><?php echo esc_html__('By', 'best-blog');?> </span>
										<a class="vcard author" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" title="<?php echo esc_attr(get_the_author()); ?>">
											<?php echo get_the_author();?>
										</a>
									</span>
									<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
									<span class="font-bold clear button secondary">
										<?php echo bestblog_time_link(); ?>
									</span>
									<i class="fa fa-dot-circle-o" aria-hidden="true"></i>
									<span class="font-bold clear button secondary">
										<?php bestblog_meta_comment(); ?>
									</span>
								</div>
							</div>
							<div class="post-single-content-body">
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
								<div class="post-single-tags callout border-none">
									<?php bestblog_meta_tag();?>
								</div>
							</div>
							<!-- post single content body END -->
						</article>
						<div class="single-nav z-depth-1 font-bold clearfix" role="navigation" id="sidebar-anchor-btm">
							<?php
							the_post_navigation(array(
								'prev_text' => '<span class="screen-reader-text">' . __('Previous Post', 'best-blog') . '</span><span class="best-blog-nav-icon nav-left-icon"><i class="fa fa-angle-left"></i></span><span class="nav-left-link">%title</span>',
								'next_text' => ' <span class="screen-reader-text">' . __('Next Post', 'best-blog') . '</span><span class="nav-right-link">%title</span><span class="newspaper-nav-icon nav-right-icon"><i class="fa fa-angle-right"></i></span>',
							));?>
						</div>
						<?php get_template_part('template-parts/post/box', 'author');?>
						<?php get_template_part('template-parts/post/related', 'post');?>
						<div class="box-comment-content z-depth-1">
							<div class="grid-x grid-padding-x align-center">
								<div class="cell large-22 medium-24 small-24">
									<?php if (comments_open() || get_comments_number()) {
    								comments_template();
									}
									?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile ?>
			<?php endif ?>
			<!-- End of the loop. -->
			<?php get_template_part('sidebar'); ?>
		</div>
	</div>
</div>
