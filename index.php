<?php get_header(); ?>
<?php include (TEMPLATEPATH . "/feat.php"); ?>
<div id="content">

	<?php if (have_posts()) :?>
		<?php $postCount=0; ?>
		<?php while (have_posts()) : the_post();?>
			<?php $postCount++;?>
	<div class="entry entry-<?php echo $postCount ;?>">
		<div class="entrytitle">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2> 
			<h3><span class="postedby">By <?php the_author() ?></span>, <?php the_time('F jS, Y') ?>,<span class="filedto">in <?php the_category(', ') ?> &raquo;<?php the_tags(); ?> <?php edit_post_link('Edit', ' | ', ''); ?></span>| <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;', 'commentslink'); ?></h3>
		</div>
		<div class="entrybody">
			<?php the_content('Read more &raquo;'); ?>
		</div>
		
		<div class="entrymeta">
		<div class="postinfo">
			
			
		</div>
		
		</div>
		
	</div>
	<div class="commentsblock">
		<?php comments_template(); ?>
	</div>
	<?php endwhile; ?>
		<div class="navigation">
			<?php
include('wp-pagenavi.php');
if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
?>
		<p>&nbsp;</p>
        </div>
		
	<?php else : ?>

		<h2>Not Found</h2>
		<div class="entrybody">Sorry, but you are looking for something that isn't here.</div>

	<?php endif; ?>
    
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>