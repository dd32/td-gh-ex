<?php get_header(); ?>
	
	<div id="content">
	
<?php get_sidebar(); ?>

		<div id="contentwrapper">

	 	<div id="header">&nbsp;</div>

		<div id="subheader">

			<h1><?php bloginfo('description'); ?></h1>

		</div>

	<?php include(TEMPLATEPATH . '/right_sidebar.php'); ?>


		<div id="centercontent">

	
	<?php if (have_posts()) : ?>
		
	<?php while (have_posts()) : the_post(); ?>
			
	<div class="post" id="post-<?php the_ID(); ?>">
	
		<div class="entry">
		
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<?php the_content('Read more &raquo;'); ?>
		</div>
	
	
	
		<div class="postmetadata">
		 <?php if (get_the_tags()){?>
		 		  	<p>Tags: <?php the_tags('') ?></p>
		<?php } ?>				
			<p>Posted in <?php the_category(', ') ?> |  <?php the_author_posts_link(); ?>  <?php the_date('') ?> | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?> <?php edit_post_link('Edit',' ',''); ?></p>
				
			</div> 

		
		<?php comments_template(); ?>
		
		
		</div>
		
		


	<?php endwhile; ?>

	
	
	<div id="navigation">
			<div class="fleft"><?php next_posts_link('&laquo; Older') ?></div>
					<div class="fright"> <?php previous_posts_link('Newer &raquo;') ?></div>
	</div>
			
	

	<?php else : ?>
	
	<div class="post">
	<div class="entry">
		<h2>Not Found</h2>
		<p>Sorry, you are looking for something that isn't here.</p>
	</div>
	</div>	
		
	<?php endif; ?>
	
	
	
		</div>



	</div><!-- end of contentwrapper -->
	
</div><!-- end of content -->

<?php get_footer(); ?>
