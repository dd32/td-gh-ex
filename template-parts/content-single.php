<?php
/**
 * The template part for displaying slider
 *
 * @package BB Ecommerce Store 
 * @subpackage bb_ecommerce_store
 * @since Ecommerce Store 1.0
 */
?>

<h1><?php the_title();?></h1>
<div class="metabox">
  <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></span>
  <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><i class="fas fa-user"></i><?php the_author(); ?></a></span>
  <span class="entry-comments"> <i class="fas fa-comments"></i><?php comments_number( __('0 Comment', 'bb-ecommerce-store'), __('0 Comments', 'bb-ecommerce-store'), __('% Comments', 'bb-ecommerce-store') ); ?> </span>
</div>
<?php if(has_post_thumbnail()) { ?>
  <hr>
  <div class="feature-box"> 
    <img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
  </div>
  <hr>          
<?php } 
  the_content();

wp_link_pages( array(
  'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bb-ecommerce-store' ) . '</span>',
  'after'       => '</div>',
  'link_before' => '<span>',
  'link_after'  => '</span>',
  'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'bb-ecommerce-store' ) . ' </span>%',
  'separator'   => '<span class="screen-reader-text">, </span>',
) );
              
if ( is_singular( 'attachment' ) ) {
  // Parent post navigation.
  the_post_navigation( array(
    'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'bb-ecommerce-store' ),
  ) );
} elseif ( is_singular( 'post' ) ) {
  // Previous/next post navigation.
  the_post_navigation( array(
    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'bb-ecommerce-store' ) . '</span> ' .
      '<span class="screen-reader-text">' . __( 'Next post:', 'bb-ecommerce-store' ) . '</span> ' .
      '<span class="post-title">%title</span>',
    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'bb-ecommerce-store' ) . '</span> ' .
      '<span class="screen-reader-text">' . __( 'Previous post:', 'bb-ecommerce-store' ) . '</span> ' .
      '<span class="post-title">%title</span>',
  ) );
}
echo '<div class="clearfix"></div>';
                    
the_tags(); 
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
  comments_template();
}?>