<?php get_header(); ?>
<!-- anIMass index.php (anIMass WordPress Theme design by Richard Dickinson - http://www.richard-dickinson.com/)-->
<div id="maincontent">
<article>
	
      <!--the start of the anIMass WP loop-->

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	 
		<!--post title-->
		<h1><div id="post-<?php the_ID(); ?>"<?php post_class(); ?>><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
		<p><b>By <?php the_author(); ?></b> | <?php the_time( get_option( 'date_format' ) ) ?></p>
<div class="post3">
	</div>			
<!--content with more link-->
			<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
	
	     <!--navigation-->
		<div class="navigation">
<?php previous_post_link('&laquo; %link') ?> | <?php next_post_link('%link &raquo;') ?>
</div>

  <!--for paginate posts-->
<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?> 

<p><b>Topics:</b> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			<?php the_tags( $before, $separator, $after ); ?> 	
<div class="post2">
	</div>
<?php if ( has_post_thumbnail() ) {        the_post_thumbnail();}; ?>

<!--do not delete-->
	<?php endwhile; else: ?>
	
	Sorry, no posts matched your criteria.

<!--do not delete-->
<?php endif; ?>
<?php comments_template( '', true ); ?>
</article>
<!--index.php end-->
<!--include sidebar-->

<?php get_sidebar(); ?>                                 
<!--include footer-->
<?php get_footer(); ?>
