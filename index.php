<?php 
get_header();
?>
<?php if(is_category('plugins')){echo '<div id="plugin_link">
To view a full list of plugins currently installed on this site: <a href="'.get_bloginfo('home').'/list-plugins/">List Plugins</a>
</div>';} ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<div class="post">
	 <h3 class="storytitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
<div class="meta" style="clear: both;">
<?php the_time("d.m.Y (g:i a)") ?>
<?php _e(" &ndash; Filed under:"); ?> <?php the_category(',') ?>
<?php edit_post_link(__('Edit This'),' :: ',''); ?>
	</div><!-- end META -->
	
	<div class="storycontent">
		<?php the_content(__('more &raquo;')); ?>
	</div><!-- end STORYCONTENT -->
	
	<div class="feedback" style="padding-top: 30px;">
            <?php comments_popup_link(__('Comments [0]'), __('Comments [1]'), __('Comments [%]')); ?>
<?php if(function_exists('the_post_keytags')) { ?><br />Tags: <?php the_post_keytags('','search',''); ?><?php } else {the_tags('Tags: ', ', ', '<br />');} ?>
<div style="float: right; text-align: right; position: relative; top: -45px;"><?php 
if(function_exists(sociable_html)){
print sociable_html();
}
 ?></div>
	</div><!-- end FEEDBACK -->
	
	<!--
	<?php trackback_rdf(); ?>
	-->

</div><!-- end POST -->

<?php comments_template(); // Get comments.php template ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<div id="page_nav_righty"><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else {posts_nav_link('', __('&laquo; Previous'), __('Next &raquo;'));} ?></div>
<br />
</div><!-- end CONTENT -->
<?php get_sidebar(); ?>