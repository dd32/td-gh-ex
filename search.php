<?php
/**
 * @package WordPress
 * @subpackage Webfish_Theme
 */

get_header(); ?>
<div id="c_wrap">
<div id="c_top"></div>
	<div id="content" class="narrowcolumn" role="main">

	<?php if (have_posts()) : ?>

		<h1 class="pagetitle"><?php _e("Search Results")?></h1>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;')) ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('l, F jS, Y') ?></small>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link(__('Edit'), '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;')) ?></div>
		</div>

	<?php else : ?>

		<h2 class="center"><?php _e("No posts found. Try a different search?")?></h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<div id="c_bottom"></div>
<div class="clear"></div>
</div><!-- End: c_wrap -->

<?php get_footer(); ?>
