<?php get_header(); ?>
<!--page.php-->

<div id="maincontent">
<article>

    <!--loop-->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
                 <!--post title-->
		<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
		<div class="post3">
	</div>	
                              <!--post with more link -->
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

	                       <!--if you paginate pages-->
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?> 
	
	<!--end of post and end of loop-->
	  <?php endwhile; endif; ?>

         <!--edit link-->
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
</article>


<!--page.php end-->
<!--include sidebar-->
<?php get_sidebar(); ?> 
<!--include footer-->
<?php get_footer(); ?>