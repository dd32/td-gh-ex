<?php get_header(); ?>
<div id="page">
	<div id="content" class="narrowcolumn">


	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
			
			<div class="post">
<h2 id="post-<?php the_ID(); ?>"> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<small>&#8838; <?php the_time('F jS, Y') ?> by <?php the_author_posts_link('namefl'); ?> | <?php edit_post_link('Edit','','<strong>|</strong>'); ?>  &#732; <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></small>
				
				<div class="entry">
					<?php the_content('Read more...'); ?>

<br class="spacer"/>
<small> 
Topic: <?php the_category(', ') ?> | <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', '<br />'); } else {echo "Tags: None";} }?>
<?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo '<br />'; } ?>
</small>
				</div>
<br class="spacer"/>
				
				<!--
				<?php trackback_rdf(); ?>
				-->
			</div>
	
		<?php endwhile; ?>

<?php else : ?>
<h2 class="center">Not Found</h2>
<p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
<?php include (TEMPLATEPATH . "/searchform.php"); ?>
<?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>