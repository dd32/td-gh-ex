<?php
/*
|--------------------------
| Begin POST Loop
|--------------------------
*/

while (have_posts()) : the_post();

?>

<div class="chipboxm1 chipstyle3 <?php echo rtrim($post_class," "); ?>">
  <div class="chipboxm1data">
    <h2 class="blue margin0 font22"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
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

<div class="chipboxm1 chipstyle3 margin10b">
  <div class="chipboxm1data">
    
    <?php comments_template(); ?>
      
  </div>
</div>

<?php endwhile; ?>