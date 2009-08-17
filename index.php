<?php get_header(); ?>
<div id="pann">
<?php include (TEMPLATEPATH . "/feat.php"); ?>
</div>
<div id="content">

	<?php if (have_posts()) :?>
		<?php $postCount=0; ?>
		<?php while (have_posts()) : the_post();?>
			<?php $postCount++;?>
	<div class="entry entry-<?php echo $postCount ;?>">
		<div class="entrytitle">
        <div class="thumb">
			<?php $screen = get_post_meta($post->ID,'screen', true); ?>
			<img src="<?php echo ($screen); ?>" width="181" height="100" alt=""  />
            </div>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2> 
			<h3><span class="postedby"><?php the_author() ?></span> | <?php the_time('F jS, Y') ?> | <span class="filedto"><?php the_category(', ') ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;', 'commentslink'); ?></h3>
		</div>
		<div class="entrybody">
			<?php the_excerpt('Read more &raquo;'); ?>
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