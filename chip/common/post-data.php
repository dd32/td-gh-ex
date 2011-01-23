<?php
/**
* Post Data
*/

global $authordata;
$postcat = get_the_category();
$edit_post_link = get_edit_post_link();

?>
<h2 class="blue margin10b"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<div class="chipboxg1 chiplisth1 margin10b font11">
  <span class="font11 colordim">Posted in
  <?php foreach( $postcat as $obj ): ?>
  <a href="<?php echo get_category_link($obj->term_id); ?>"><?php echo $obj->cat_name; ?></a>, 
  <?php endforeach; ?>
  on <?php the_time('M j, Y') ?> by <a href="<?php echo get_author_posts_url($authordata->ID); ?>"><?php echo $authordata->display_name; ?></a>
  <?php if( ! empty( $edit_post_link ) ): ?>
  - <a href="<?php echo $edit_post_link; ?>"><span>Edit</span></a>
  <?php endif; ?>  
  </span>
</div>
<div class="margin10b">
  <?php echo get_the_excerpt(); ?>
</div>