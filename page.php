<?php
/* 	Easy Theme's General Page to display all Pages
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Easy 1.0
*/

 get_header(); ?><div id="container">  

	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		
        <h1 class="page-title"><?php the_title(); ?></h1>
			<div class="content-ver-sep"> </div>
            <div class="entrytext">
 				<?php the_post_thumbnail('category-thumb'); easy_content(); ?> 
				<?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . esc_html__('Pages:', 'easy') . '</span>', 'after' => '</div><br/>' ) ); ?>
			</div>
		</div>
		<?php endwhile; ?><div class="clear"> </div>
	<?php edit_post_link(esc_html__('Edit', 'easy'), '<p>', '</p>'); ?>
	<?php comments_template(); ?>
	<?php else: ?>
		<p><?php echo esc_html__('Sorry, no pages matched your criteria', 'easy'); ?></p>
	<?php endif; ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>