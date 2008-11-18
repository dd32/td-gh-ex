<?php
/*
 * @package WordPress
 * @subpackage Webfish_Theme
 */

get_header(); 
global $webfish_settings; ?>
<div id="c_wrap">
<div id="c_top"></div>
	<div id="content" role="main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small class="date"><?php the_time('F jS, Y') ?>
				<?php if($webfish_settings['show_authors']=="1"): echo " ".__('by')." "; the_author(); endif; ?>
				</small>

				<div class="entry">
					<?php 
					if (WEBFISH_USE_THUMBNAILS && $webfish_settings['thumbnails_indexpage']=="1")
						if ( has_post_thumbnail()) 
  							the_post_thumbnail();
					
					the_content(__('Read the rest of this entry &raquo;')); ?>
					<div class="clear"></div>
				</div>
				<div class="postmetadata"><?php the_tags('<div class="tags">', ' ', '</div> '); ?><div class="categories"><?php the_category(' ') ?></div><?php comments_popup_link(__('No Comments &#187;'), __('1 Comment &#187;'), __('% Comments &#187;'));  edit_post_link(__('Edit'), ' | ', ''); ?>  </div>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_posts_link(__('&laquo; Newer Entries')) ?></div>
			<div class="alignright"><?php next_posts_link(__('Older Entries &raquo;')) ?></div>
			
		</div>

	<?php else : ?>

		<h2 class="center"><?php _e("Not Found", "webfish"); ?></h2>
		<p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>
<div id="c_bottom"></div>
<div class="clear"></div>
</div><!-- End: c_wrap -->

<?php get_footer(); ?>
