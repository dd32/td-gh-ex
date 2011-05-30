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
<div id="post-<?php the_ID(); ?>" class="chipboxm1 chipstyle1 margin10b <?php echo rtrim($post_class," "); ?>">
  <div class="chipboxm1data">
    
    <div class="chipsetl1">
      <div class="chipsetl1data">        
        <?php global $chip_life_global; ?>
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="img1"><img src="<?php echo $chip_life_global['chip_image']['imageurl']; ?>" alt="<?php the_title_attribute(); ?>" width="150" height="150" class="attachment-thumbnail wp-post-image" /></a>
      </div>
    </div>
    
    <div class="chipsetr1">
      <div class="chipsetr1data">        
        <?php locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-data.php' ), true, false ); ?>       
      </div>
    </div>
    
    <br class="clear" />
    
  </div>
</div>