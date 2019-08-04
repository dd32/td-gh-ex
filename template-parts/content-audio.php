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
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;
  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>
<article class="page-box">
  <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
  <div class="box-image">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the audio file.
        if ( ! empty( $audio ) ) {
          foreach ( $audio as $audio_html ) {
            echo '<div class="entry-audio">';
              echo $audio_html;
            echo '</div><!-- .entry-audio -->';
          }
        };
      };
    ?>
  </div>
  <div class="new-text">
    <div class="entry-content"><p><?php the_excerpt();?></p></div>
    <?php the_tags(); ?>
    <div class="read-more-btn">
      <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('READ MORE','advance-coaching'); ?><i class="fas fa-angle-right"></i><span class="screen-reader-text"><?php the_title(); ?></span></a>
    </div>
  </div>
  <div class="metabox">
    <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>  
    <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-coaching'), __('0 Comments', 'advance-coaching'), __('% Comments', 'advance-coaching') ); ?> </span>
    <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
  </div>
  <div class="clearfix"></div>
</article>