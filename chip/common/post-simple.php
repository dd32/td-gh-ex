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
    <?php locate_template( array( CHIP_LIFE_COMMON_FSROOT . 'post-data.php' ), true, false ); ?>
  </div>
</div>