<?php
/**
 * The template part for displaying post 
 *
 * @package advance-it-company
 * @subpackage advance-it-company
 * @since advance-it-company 1.0
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
    <h4><?php the_title();?></h4>
    <div class="metabox">
      <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></span>
      <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-it-company'), __('0 Comments', 'advance-it-company'), __('% Comments', 'advance-it-company') ); ?> </span>
      <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
    </div>
    <p><?php the_excerpt();?></p>
    <p><?php the_tags(); ?></p>     
    <div class="read-more-btn">
      <a href="<?php the_permalink(); ?>" alt="<?php esc_html_e( 'READ MORE','advance-it-company' );?>"><?php echo esc_html_e('READ MORE','advance-it-company'); ?><i class="fas fa-angle-right"></i><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-it-company' );?></span></a>
    </div>
  </div>
  <div class="clearfix"></div>
</article>