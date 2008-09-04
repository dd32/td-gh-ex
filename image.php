<?php get_header(); ?>

	<div id="content" class="widecolumn">

<?php if(have_posts()): while(have_posts()): the_post(); ?>

		<div class="hentry" id="post-<?php the_ID(); ?>">
			<h2 class="entry-title"><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h2>
			
			<div class="posted">
				Posted by <?php sp_author_hcard() ?>
					<abbr class="published posted_date" title="<?php the_time('Y-m-d\TH:i:sP') ?>">on <?php echo get_the_time(get_option('date_format')) ?></abbr>
			</div>
			<br class="clear" />	
			
			<div class="entry">
				<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
                <div class="caption"><?php if(!empty($post->post_excerpt)) the_excerpt(); // this is the "caption" ?></div>

				<?php the_content(); ?>

				<div class="navigation">
					<div class="alignleft"><?php previous_image_link() ?></div>
					<div class="alignright"><?php next_image_link() ?></div>
				</div>
				<br class="clear" />

			</div>

		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no attachments matched your criteria.</p>

<?php endif; ?>

	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
