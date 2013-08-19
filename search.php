<?php get_header(); ?>

<div id="content">

<div class="post">

	<h2 class="entry"><?php _e('Search results:'); ?></h2>

 <?php get_template_part( 'searchform'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1 class="post-title">
	<rel="bookmark"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h1>

		<div id="postmetadata">
			<a href="<?php the_permalink(', '); ?>"><?php the_time( get_option('date_format') ); ?></a>, 
			<?php comments_popup_link(' Comment &raquo; ', '1 comment &raquo;', '% comments &raquo;'); ?>
			<?php edit_post_link(' EDIT '); ?>
		</div>

		<div id="postmetadata2"> 
			<?php the_category(', '); ?>
			<?php the_tags(', '); ?>
		</div>

<?php the_excerpt(); ?>
<?php endwhile; else: ?>
<div class="entry"><?php _e('Try again, no articles matched your criteria.'); ?></div>

<?php endif; ?>


    	<div class="navigation">
        <?php posts_nav_link(); ?>
    	</div>

</div>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>