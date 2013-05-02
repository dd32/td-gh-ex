<?php
/**
 *
 * BoldR Lite WordPress Theme by Iceable Themes | http://www.iceablethemes.com
 *
 * Copyright 2013 Mathieu Sarrasin - Iceable Media
 *
 * Single Post Template
 *
 */
?>

<?php get_header(); ?>

	<div class="container" id="main-content">

		<?php $blog_sidebar_side = strtolower( icefit_get_option('blog_sidebar_side') );
		if ($blog_sidebar_side == 'right' || $blog_sidebar_side == '') {
			$blog_sidebar_side = 'right';
			$page_container_side = 'left';
		} else {
			$page_container_side = 'right';
		}
		?>

		<div id="page-container" class="<?php echo $page_container_side; ?> with-sidebar">

			<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class("single-post"); ?>>

				<div class="postmetadata">
					<span class="meta-date"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
						<span class="month"><?php the_time('M'); ?></span>
						<span class="day"><?php the_time('d'); ?></span>
						<span class="year"><?php the_time('Y'); ?></span>
					</a></span>

					<?php if (comments_open() || get_comments_number()!=0 ): ?>
					<span class="meta-comments">
						<?php comments_popup_link( __( 'No', 'icefit' ), __( '1', 'icefit' ), __( '%', 'icefit' ), 'comments-count', '' ); ?>
						<?php comments_popup_link( __( 'Comment', 'icefit' ), __( 'Comment', 'icefit' ), __( 'Comments', 'icefit' ), '', __('Comments Off', 'icefit') ); ?>
					</span>
					<?php endif; ?>
						
					<span class="meta-author"><span><?php _e('by ', 'icefit'); the_author(); ?></span></span>

					<?php edit_post_link(__('Edit', 'icefit'), '<span class="editlink">', '</span>'); ?>
					
				</div>

				<?php if (has_post_thumbnail()) : ?>
				<div class="thumbnail">
					<a rel="prettyPhoto" href="<?php	$image_id = get_post_thumbnail_id();
									$image_url = wp_get_attachment_image_src($image_id,'large', true);
									echo $image_url[0];  ?>">
					<?php the_post_thumbnail('large', array('class' => 'scale-with-grid')); ?>
					</a>
				</div>
				<?php endif; ?>

				<div class="post-contents">
					<h3 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h3>
					<div class="post-category"><?php _e('Posted in', 'icefit'); ?> <?php the_category(', '); ?></div>
					<?php the_content() ?>
					
					<div class="clear"></div>
					<?php $args = array(
						'before'           => '<br class="clear" /><div class="paged_nav">' . __('Pages:', 'icefit'),
						'after'            => '</div>',
						'link_before'      => '<span>',
						'link_after'       => '</span>',
						'next_or_number'   => 'number',
						'nextpagelink'     => __('Next page', 'icefit'),
						'previouspagelink' => __('Previous page', 'icefit'),
						'pagelink'         => '%',
						'echo'             => 1
					);
					wp_link_pages( $args ); ?>

					<?php if (has_tag()) { the_tags('<div class="tags"><span class="the-tags">Tags:</span>', '', '</div>'); } ?>


				</div>
				<br class="clear" />

			</div><!-- end div post -->

			<div class="article_nav">
				<?php if ("" != get_adjacent_post( false, "", true ) ): // Is there a previous post? ?>
				<div class="previous"><?php previous_post_link('%link', "Previous Post"); ?></div>
				<?php endif; ?>
				<?php if ("" != get_adjacent_post( false, "", false ) ): // Is there a next post? ?>
				<div class="next"><?php next_post_link('%link', "Next Post"); ?></div>
				<?php endif; ?>
				<br class="clear" />
			</div>


			<?php	// Display comments section only if comments are open or if there are comments already.
			if ( comments_open() || get_comments_number()!=0 ) : ?>
				<hr />
				<!-- comments section -->
				<div class="comments">
				<?php comments_template( '', true ); ?>
				</div>
				<!-- end comments section -->

			<div class="article_nav">
				<?php if ("" != get_adjacent_post( false, "", true ) ): // Is there a previous post? ?>
				<div class="previous"><?php previous_post_link('%link', "Previous Post"); ?></div>
				<?php endif; ?>
				<?php if ("" != get_adjacent_post( false, "", false ) ): // Is there a next post? ?>
				<div class="next"><?php next_post_link('%link', "Next Post"); ?></div>
				<?php endif; ?>
				<br class="clear" />
			</div>

			<?php endif; ?>

			<?php endwhile; ?>

			<?php else : ?>
		
			<h2><?php _e('Not Found', 'icefit'); ?></h2>
			<p><?php _e('What you are looking for isn\'t here...', 'icefit'); ?></p>

			<?php endif; ?>

		</div>
		<!-- End page container -->
		
		<div id="sidebar-container" class="<?php echo $blog_sidebar_side; ?>">
			<?php get_sidebar(); ?>
		</div>		
		<!-- End sidebar column -->
		

	</div>
	<!-- End main content -->

<?php get_footer(); ?>