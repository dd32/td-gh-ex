<?php get_header(); ?>


<div id="maincontent">
<article>
<!--single.php-->
	
<!--loop-->			
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	        <!--navigation-->
<p><?php previous_post_link('&laquo; %link  |') ?>  <a href="<?php bloginfo('url'); ?>">Home</a>  <?php next_post_link('|  %link &raquo;') ?></p>
	
		<!--post title-->
			<h1 id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
		<p><b>By <?php the_author(); ?></b> | <?php the_time('F j, Y'); ?></p>
<div class="postspace2">
	</div>			
<!--content with more link-->
			<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
	
                       <!--for paginate posts-->
			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?> 

<p><b>Topics:</b> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				
<div class="postspace">
	</div>
<?php if ( function_exists( 'add_theme_support' ) ) : ?>
            <?php if ( has_post_thumbnail() ) : ?>
			<div class="postthumb">
            <?php the_post_thumbnail( 'single-post-thumbnail' ); ?>
            </div>
            <?php endif; ?>
            <?php endif; ?>
				<!--all options over and out-->
	
		
	<!--include comments template-->
	<?php comments_template(); ?>
	
<p><?php previous_post_link('&laquo; %link  |') ?>  <a href="<?php bloginfo('url'); ?>">Home</a>  <?php next_post_link('|  %link &raquo;') ?></p>


        <!--do not delete-->
	<?php endwhile; else: ?>
	
	Sorry, no posts matched your criteria.

<!--do not delete-->
<?php endif; ?>
	
<!--single.php end-->
</article>
<!--include sidebar-->
<?php get_sidebar(); ?> 

<!--include footer-->
<?php get_footer(); ?>