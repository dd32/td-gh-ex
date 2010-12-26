<?php
if (have_posts()):
while (have_posts()) : the_post();

/*
|--------------------------
| POST Manipulation
|--------------------------
*/

$postcat = get_the_category();

$post_class_array = get_post_class();
$post_class = '';
foreach( $post_class_array as $val ) {
	$post_class .= $val . " ";
}

?>

<div class="chipboxm1 chipstyle1 margin10b <?php echo rtrim($post_class," "); ?>">
  <div class="chipboxm1data">
    
    <h2 class="blue margin0 font22"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    
    <div class="chipboxg1 chiplisth1 margin0 font11">
      <ul>
        <li><span><?php the_time('M j, Y') ?></span></li>            
        <li><a href="<?php echo get_author_posts_url($authordata->ID); ?>" class="lblue"><span><?php echo $authordata->display_name; ?></span></a></li>
        <li><a href="<?php echo get_comments_link($post->ID); ?>" class="lblue"><span><?php echo get_comments_number($post->ID); ?> Comments</span></a></li>
      </ul>
    <br class="clear" />  
    </div>
    
  </div>
</div>

<div class="chipboxm1 chipstyle1 margin10b">
  <div class="chipboxm1data">
    <div class="chipoverride1"><?php the_content(); ?></div>
    <?php
    $wp_link_pages = wp_link_pages( array( 'echo' => 0 ) );
	if( !empty($wp_link_pages) ):
	?>
    <div class="wplinkpages"><?php echo $wp_link_pages; ?></div>    
    <?php endif; ?>
  </div>
</div>

<div class="chipboxm1 chipstyle1 margin10b">
  <div class="chipboxm1data">
    <div><strong>Category:</strong> <?php the_category(', ') ?></div>    
  </div>
</div>

<div class="chipboxm1 chipstyle1 margin10b">
  <div class="chipboxm1data">
    
    <div class="chipsetl3">
        <div><?php the_tags("<strong>Tags:</strong> ",", "); ?></div>   
    </div>
    
    <div class="chipsetr4 alignr">
        <div><?php do_action( 'addthis_widget' ); ?></div>
    </div>
    
    <br class="clear" /> 
  
  </div>
</div>

<?php
if( get_option( $theme_options['c52']['id'] ) == "yes" ):
require_once(COMMON_FSROOT . 'related.php');
endif;
?>

<?php
if( get_option( $theme_options['c204']['id'] ) == "yes" && get_option( $theme_options['c206']['id'] ) == "yes" ):
require_once(COMMON_FSROOT . 'subscribe-feedburner.php');
endif;
?>

<div class="chipboxm1 margin10b">
  <div class="chipboxm1data">
    
    <div class="chipsetl4">
        <div><?php echo get_avatar( get_the_author_meta( 'user_email' ), 60 ); ?></div>   
    </div>
    
    <div class="chipsetr5">
        <h2 class="blue margin10b"><?php _e("About the Author"); ?></h2>
      	<div class="font11"><?php the_author_meta('description'); ?></div>
    </div>
    
    <br class="clear" /> 
  
  </div>
</div>

<div class="chipboxm1 chipstyle3 margin10b">
  <div class="chipboxm1data">
    
    <?php comments_template(); ?>
      
  </div>
</div>

<?php require_once(COMMON_FSROOT . 'pager-single.php'); ?> 

<?php
endwhile;
endif;
?>