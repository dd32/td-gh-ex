
<div class="featlist">

<?php 
	$highcat = get_option('pov_story_category'); 
	$highcount = get_option('pov_story_count');
	
	$my_query = new WP_Query('category_name= '. $highcat .'&showposts='.$highcount.'');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="fblock">
<?php $screen = get_post_meta($post->ID,'screen', true); ?>
<img src="<?php echo ($screen); ?>" width="126" height="70" alt=""  />

<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
<div class="auth"> Posted by <?php the_author(); ?> </div> 
<div class="fmeta"> 	

<?php the_time('F jS, Y') ?> 

</div>
</div>
<?php endwhile; ?>



</div>
 <div class="clear"></div>
<p>&nbsp;</p>
 