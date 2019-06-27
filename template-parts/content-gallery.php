<?php
/**
 * The template part for displaying services
 *
 * @package advance-coaching
 * @subpackage advance-coaching
 * @since advance-coaching 1.0
 */
?>  
<div class="page-box">
  <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
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
  <div class="new-text">
    <p><?php the_excerpt();?></p>
    <?php the_tags(); ?>
    <div class="read-more-btn">
      <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('READ MORE','advance-coaching'); ?><i class="fas fa-angle-right"></i></a>
    </div>
  </div>
  <div class="metabox">
    <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-coaching'), __('0 Comments', 'advance-coaching'), __('% Comments', 'advance-coaching') ); ?> </span>
    <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
  </div>
  <div class="clearfix"></div>
</div>