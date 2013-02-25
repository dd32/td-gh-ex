<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1 class="post-title">
	<rel="bookmark"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h1>

<?php the_excerpt(); ?>
<?php endwhile; else: ?>
<div class="entry"><?php _e('Sorry, no posts matched your search.'); ?>	 </div>
<?php endif; ?>

</div>
 
<?php get_sidebar(); ?>
<?php get_template_part( 'sidebar2'); ?>
<?php get_footer(); ?>