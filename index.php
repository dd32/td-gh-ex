<?php
/**
 * @package WordPress
 * @subpackage Beardsley
 */

get_header(); ?>

<div class="page">
<?php get_sidebar(); ?>

<div class="narrowcolumn">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
            <div class="entry">
			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<p><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></p>

				<p>
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</p>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>
            </div>
            
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h1 class="center">Not Found</h1>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>