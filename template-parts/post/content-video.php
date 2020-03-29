<?php
/**
 * Template part for displaying posts
 * @package WordPress
 * @subpackage akhada-fitness-gym
 * @since 1.0
 * @version 1.4
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
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="article_content">
    <?php   
      if ( is_single() ) {
        esc_html( the_title( '<h1 class="entry-title">', '</h1>' ));
      } elseif ( is_front_page() && is_home() ) {
        esc_html( the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ));
      } else {
        esc_html( the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ));
      }
    ?>

    <?php if ( '' !== get_the_post_thumbnail() || is_single() ) : ?>
      <div class="post-thumbnail">
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
    <?php endif; ?>

    <div class="entry-content">
      <?php
      /* translators: %s: Name of current post */
      if ( is_single() ) :
      the_content();
      else :
      the_excerpt();
      endif;
      

      wp_link_pages( array(
        'before'      => '<div class="page-links">' . __( 'Pages:', 'akhada-fitness-gym' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
      ) );
      ?>
    </div>

    <?php
    if ( is_single() ) {
      akhada_fitness_gym_entry_footer();
    }
    ?>
  </div>
</div>