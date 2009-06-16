<?php get_header();?>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_date('d.M.Y'); ?> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> <?php edit_post_link('- Edit Post'); ?></h2>
			<div class="postmetadata-top"><small>Filed In: <?php the_category(', '); ?></small></div>
			<?php the_content('Read more &rsaquo;'); ?>
			<div align="right" class="comment-button"><small><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></small></div>
			<div class="postmetadata-bottom"><small>Tags: <?php the_tags('', ', '); ?></small></div>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<div class="navlink">
			<?php posts_nav_link(' <font color="#a5a5a5">&mdash;</font> ', '&lsaquo; Newer Posts', 'Older Posts <font color="#a5a5a5">&rsaquo;</font>'); ?>
		</div>
	</div>
	<?php include ('sidebar1.php'); ?>
</div>
<?php get_footer();?>