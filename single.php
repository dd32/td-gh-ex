<?php
/**
 * @package Babylog
 */

get_header();
?>

	<div id="content" class="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="post_header">
				<h2 class="page_title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to' , 'babylog' ) ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h2>
				<span class="post_date">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to' , 'babylog' ) ?> <?php the_title_attribute(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
				</span>
			</div> 
			
			<div class="entry">
				<small><?php _e( 'by' , 'babylog' ); ?> <?php the_author() ?></small>

				<?php the_content( __( 'Read the rest of this entry' , 'babylog' ) . ' &raquo;'); ?>

				<?php wp_link_pages( array( 'before' => '<p class="clear"><strong>' . __( 'Pages:' , 'babylog' ) . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>

				<p><?php edit_post_link( __( 'Edit this entry' , 'babylog' ) ); ?></p>
				
				<?php the_tags( '<p class="clear">Tags: ', ', ', '</p>'); ?><hr />					
					<?php the_category() ?>
				
					<div class="comments-link"><?php comments_popup_link( __( 'No Comments' , 'babylog' ) . ' &#187;', '1 ' . __( 'Comment' , 'babylog' ) . ' &#187;', '% ' . __( 'Comments' , 'babylog' ) . ' &#187;'); ?></div>
					<div class="clear"></div>
			</div>
			
			<div class="navigation">
				<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
				<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
			</div>
		</div>

	<?php comments_template(); ?>
	</div>
	<?php endwhile; else: ?>

		<h2 class="page_title"><?php _e( 'Not Found' , 'babylog' ) ?></h2>
		<p class="aligncenter"><?php _e( 'Sorry, no posts matched your criteria.', 'babylog' ) ?></p>
		<?php get_search_form(); ?>

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
