<?php get_header(); ?>

<div id="content"><!-- begin content -->

<h2 class="title">Latest Ramblings</h2>

<div class="home"><!-- begin home -->
	  
		<?php query_posts('showposts=1'); // this shows the latest post you have written ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<h3><?php the_time('F jS, Y') ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></h3>
				<div class="entry">
					<?php the_content('continue reading'); ?>
				</div>
			<?php if (function_exists('the_tags')) { the_tags('<p>Tags: ', ', ', '</p>'); } ?>
			<?php edit_post_link('[edit]', '<p class="edit">', '</p>'); ?>
		</div>
			<?php endwhile; ?>
</div><!-- end home -->
	
<div class="spacer"></div> <!-- the hr below the first post -->

<div class="recentposts"><!-- begin recent posts -->
	  
		<?php query_posts("offset=1"); // you can chage how many posts are shown through your WordPress dashboard = settings = reading ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="repost" id="post-<?php the_ID(); ?>">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<p class="repostmetadata"><?php the_time('F jS, Y') ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><br/>
    	<?php if(function_exists("the_tags")) the_tags('Tags: ', ', ', ''); ?></p>

		</div>
		<?php endwhile; ?>
		
</div><!-- end recent posts-->

</div> <!-- end begin content -->

<?php include(TEMPLATEPATH."/left.php");?>
<?php include(TEMPLATEPATH."/right.php");?>

<?php get_footer(); ?>