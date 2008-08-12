<?php get_header(); ?>
<div id="page">
	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">&#8801; Search Results</h2>
		
<div class="navigation">
<div class="alignleft"><?php posts_nav_link('','','&laquo; Previous Entries') ?></div>
<div class="alignright"><?php posts_nav_link('','Next Entries &raquo;','') ?></div>
</div>


		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post">
				<h3 id="post-<?php the_ID(); ?>">&#8801; <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>
				
				<div class="entry">
					<?php the_excerpt() ?>
				</div>
		
				<small> 
Topic: <?php the_category(', ') ?> | <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', '<br />'); } else {echo "Tags: None";} }?>
<?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo '<br />'; } ?>
</small>
				
				<!--
				<?php trackback_rdf(); ?>
				-->
			</div>
	
		<?php endwhile; ?>

<div class="navigation">
<div class="alignleft"><?php posts_nav_link('','','&laquo; Previous Entries') ?></div>
<div class="alignright"><?php posts_nav_link('','Next Entries &raquo;','') ?></div>
</div>
	
	<?php else : ?>

		<h2 class="center">&#8801; Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>