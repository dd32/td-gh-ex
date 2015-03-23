<?php get_header(); ?>

<div id="content">

<div class="post">

	<h2 class="entry"><?php _e('Search results:', 'redesign'); ?></h2>

 <?php get_template_part( 'searchform'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="postmetadata"> 
		<?php the_category(', '); ?>
		<?php the_tags(', '); ?>
		</div>

        <a href="<?php the_permalink(); ?>">
	<h1><?php the_title(); ?></h1>
	</a>

		<div class="postmetadata"> 
		<?php the_author_posts_link(); ?>, <a href="<?php the_permalink(', '); ?>"><?php the_time( get_option('date_format') ); ?></a>
		<?php edit_post_link(' - EDIT '); ?>
		</div>

		<div class="postmetadata2"> 
		<?php comments_popup_link('Comment &raquo; ', '1 comment &raquo;', '% comments &raquo;'); ?>
		</div>

<?php the_excerpt(); ?>
<?php endwhile; else: ?>
<div class="entry"><?php _e('Try again, no articles matched your criteria.', redesign'); ?></div>

<?php endif; ?>




</div>

   		<div class="navigation">
		<?php posts_nav_link( ' ', '&#9668 Newer', 'Older &#9658' ); ?>
		</div>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>