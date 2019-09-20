<?php
/**
 * Template part for displaying posts
 *
 * @package Automobile Hub
 * @subpackage automobile_hub
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="page-box row">
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
    <div class="box-content">
      <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
      <div class="box-info">
        <i class="far fa-calendar-alt"></i><span class="entry-date"><?php the_date(); ?></span>
        <i class="fas fa-user"></i><span class="entry-author"><?php the_author(); ?></span>
        <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','automobile-hub'), __('0 Comments','automobile-hub'), __('% Comments','automobile-hub') ); ?></span>
      </div>
      <p><?php $excerpt = get_the_excerpt(); echo esc_html( automobile_hub_string_limit_words( $excerpt,30 ) ); ?></p>
      <div class="readmore-btn">
        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'automobile-hub' ); ?>"><?php esc_html_e('Read More','automobile-hub'); ?></a>
      </div>
    </div>
      <div class="clearfix"></div>
  </div>
</div>