<?php get_header(); ?>

	<div id="content">

		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		  <div class="hentry" id="article-<?php the_ID(); ?>">
				<h2 class="entry-title">
          <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
          <?php the_comment_count_elem(); ?>
        </h2>

        <div class="posted">
          <span class="vcard">
            Posted by <span class="fn"><?php the_author() ?></span>
          </span>
          <span class="published posted_date" title="<?php the_time('Y-m-d H:i:sP') ?>">on <?php the_time('F d, Y') ?></span>
        </div>
			  <br class="clear" />	
				<div class="entry-content">
					<?php the_content('Continue reading...'); ?>
				</div>
				<ul class="meta">
	<li class="categories">Category: <?php the_category(', ') ?></li>
          <li class="tags"><?php the_tags(); ?></li>
          <li>Meta:
            <?php comments_popup_link('no comments', '1 comment', '% comments'); ?>,
            <a href="<?php the_permalink() ?>" rel="bookmark">permalink</a>,
            <?php comments_rss_link('rss'); ?>
          </li>
        </ul>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
	
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
