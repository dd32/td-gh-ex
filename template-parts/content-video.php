<?php
/**
 * The template part for displaying services
 *
 * @package advance-coaching
 * @subpackage advance-coaching
 * @since advance-coaching 1.0
 */
?>  
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;
  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>
<article class="page-box">
  <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
  <div class="box-image">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the video file.
        if ( ! empty( $video ) ) {
          foreach ( $video as $video_html ) {
            echo '<div class="entry-video">';
              echo $video_html;
            echo '</div>';
          }
        };
      }; 
    ?>
  </div>
  <div class="new-text">
    <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_coaching_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_coaching_excerpt_number','20')))); ?></p></div>
    <div class="read-more-btn">
      <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('advance_coaching_button_text','READ MORE'));?><i class="fas fa-angle-right"></i><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-coaching' );?></span></a>
    </div>
  </div>
  <?php if( get_theme_mod( 'advance_coaching_date_hide',true) != '' || get_theme_mod( 'advance_coaching_author_hide',true) != '' || get_theme_mod( 'advance_coaching_comment_hide',true) != '') { ?>
    <div class="metabox">
      <?php if( get_theme_mod( 'advance_coaching_date_hide',true) != '') { ?>
        <span class="entry-date"><i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
      <?php } ?>

      <?php if( get_theme_mod( 'advance_coaching_author_hide',true) != '') { ?>
        <span class="entry-author"><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
      <?php } ?>

      <?php if( get_theme_mod( 'advance_coaching_comment_hide',true) != '') { ?>
        <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comments','advance-coaching'), __('0 Comments','advance-coaching'), __('% Comments','advance-coaching') ); ?></span>
      <?php } ?>
    </div>
  <?php }?>
  <div class="clearfix"></div>
</article>