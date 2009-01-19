<?php get_header(); ?>



	<div id="content">
	
	<h2 class="title"><?php the_title(); ?></h2>
	
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content('<p>Continue reading &raquo;</p>'); ?>
	
				<?php //if page is split into more than one
					link_pages('<p>Pages: ', '</p>', 'number'); ?>
			</div>
			<?php edit_post_link('(edit this page)', '<p>', '</p>'); ?>
		</div>
	  <?php endwhile; endif; ?>
		
	
</div>

<?php include(TEMPLATEPATH."/left.php");?>
<?php include(TEMPLATEPATH."/right.php");?>


<?php get_footer(); ?>