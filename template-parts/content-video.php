<?php
/**
 * The template part for displaying post 
 *
 * @package advance-education
 * @subpackage advance-education
 * @since advance-education 1.0
 */
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
  <div class="box-img">
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
    <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
    <div class="metabox">
      <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>
      <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-education'), __('0 Comments', 'advance-education'), __('% Comments', 'advance-education') ); ?> </span>
      <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
    </div>
    <div class="entry-content"><p><?php the_excerpt();?></p></div>
    <p><?php the_tags(); ?></p>
    <div class="read-more-btn">
      <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('READ MORE','advance-education'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-education' );?></span></a>
    </div>
  </div>
  <div class="clearfix"></div>
</article>