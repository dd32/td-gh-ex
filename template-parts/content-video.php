<?php
/**
 * The template part for displaying services
 *
 * @package BB Mobile Application
 * @subpackage bb_mobile_application
 * @since BB Mobile Application 1.0
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
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>  
  <div class="page-box">
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
    <div class="new-text"<?php if(has_post_thumbnail()) { ?><?php } ?>>
      <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( bb_mobile_application_string_limit_words( $excerpt, esc_attr(get_theme_mod('bb_mobile_application_excerpt_number','20')))); ?></p></div>
      <a href="<?php the_permalink(); ?>" class="read-more-box" title="<?php esc_attr_e('Read More','bb-mobile-application'); ?>"><?php echo esc_html(get_theme_mod('bb_mobile_application_button_text','Read More'));?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','bb-mobile-application' );?></span></a> 
    </div>
    <div class="clearfix"></div>
  </div>
</article>