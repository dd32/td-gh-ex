<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Agensy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post_content_article single_page_wrap'); ?>>
  <div class="entry-content">
    <?php
    $agensy_img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'agensy-post-image-withsidebar', false );
    if($agensy_img_src){ 
    ?>
    <div class="agensy_img_wrap">
      <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($agensy_img_src[0]); ?>" /></a>
    </div>
    <?php } ?>
    <div class="excerpt_post_content"><?php
     the_content(); 
     wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'punte' ),
        'after' => '</div>',
    ) );
     ?>
     </div>
   </div><!-- .entry-content -->
</article>
