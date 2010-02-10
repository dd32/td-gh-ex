<h3 class="f1"><?php echo $bxx_featured_title ?></h3>
<?php query_posts('cat=' . $bxx_featured_cat .'&showposts=' . $bxx_featured_number .''); ?>
    <?php while (have_posts()) : the_post(); ?>
	<dl class="ffbox"> 
<?php $postimageurl = get_post_meta($post->ID, 'feature-image', true);
if ($postimageurl) {
?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php bloginfo('wpurl'); ?>/wp-content/uploads/<?php  
	$values = get_post_custom_values("feature-image"); echo $values[0]; ?>" class="foot-latest" alt="Image" /></a> 
<?php } else { ?>
      <a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php bloginfo('template_url'); ?>/images/place-holder.png"  class="foot-latest" alt="Image" /></a>
<?php } ?>
	
	
<dt><a class="ff-link" href="<?php the_permalink() ?>" rel="bookmark"> <?php the_title(); ?></a></dt>

</dl> 
    <?php endwhile; ?>
