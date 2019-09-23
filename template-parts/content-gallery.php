<?php
/**
 * The template part for displaying services
 *
 * @package BB Mobile Application
 * @subpackage bb_mobile_application
 * @since BB Mobile Application 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>> 
  <div class="page-box">
    <div class="box-image">
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the gallery.
          if ( get_post_gallery() ) {
            echo '<div class="entry-gallery">';
              echo ( get_post_gallery() );
            echo '</div>';
          };
        };
      ?>
    </div>
    <div class="new-text"<?php if(has_post_thumbnail()) { ?><?php } ?>>
      <h3><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
      <div class="entry-content"><p><?php the_excerpt();?></p></div>
      <a href="<?php the_permalink(); ?>" class="read-more-box" title="<?php esc_attr_e('Read More','bb-mobile-application'); ?>"><?php esc_html_e('Read More','bb-mobile-application'); ?><span class="screen-reader-text"><?php esc_html_e( 'Read More','bb-mobile-application' );?></span></a> 
    </div>
    <div class="clearfix"></div>
  </div>
</article>