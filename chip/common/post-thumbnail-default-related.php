<?php
/**
* Post Class Logic
*/

$post_class_array = get_post_class();
$post_class = '';
foreach( $post_class_array as $val ) {
	$post_class .= $val . " ";
}

?>
<div id="post-<?php the_ID(); ?>" class="chippostcol3 <?php echo rtrim($post_class," "); ?>">
    
    <div class="chippostcol3img">
      <?php global $chip_life_global; ?>
      <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="img1"><?php the_post_thumbnail( 'thumbnail'); ?></a>
    </div>
    
    <div class="chippostcol3text">
      <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
    </div>
    
</div>