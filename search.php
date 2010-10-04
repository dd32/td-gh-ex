<?php get_header(); ?>


<article>
<!--search.php-->

        <!--loop-->
	<?php if (have_posts()) : ?>

		<h2>Search Results</h2>
		
                <!--to create links for the previous entries or the next-->
		<?php next_posts_link('&laquo; Previous Entries') ?>

		<?php previous_posts_link('Next Entries &raquo;') ?>
		

                <!--loop-->
		<?php while (have_posts()) : the_post(); ?>
				
			        <!--permalink of the post title-->
				<h3> <div id="post-<?php the_ID(); ?>"<?php post_class(); ?>><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
		
			<!--show the category, edit link, comments-->
                           Posted in <?php the_category(', ') ?>
			
	        <!--loop-->
		<?php endwhile; ?>

		<!--to create links for the previous entries or the next-->
		<?php next_posts_link('&laquo; Previous Entries') ?>

		<?php previous_posts_link('Next Entries &raquo;') ?>
		
	
        <!--necessary do not delete-->
	<?php else : ?>

		No posts found. Try a different search?
                 <!--include searchform-->
		<?php get_search_form(); ?>
        <!--do not delete-->
	<?php endif; ?>
		
</article>
<!--search.php end-->
<!--include sidebar-->
<?php get_sidebar(); ?> 
<!--include footer-->
<?php get_footer(); ?>