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
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="article_content">
    <header class="entry-header">
      <?php   
        if ( is_single() ) {
          the_title( '<h1 class="entry-title">', '</h1>' );
        } elseif ( is_front_page() && is_home() ) {
          the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
        } else {
          the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        }
      ?>
    </header>
    <div class="post-thumbnail">
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
    <div class="meta">
      <?php echo esc_html( get_the_date( 'd') ); ?>
      <?php echo esc_html( get_the_date( 'M' ) ); ?>
      <?php echo esc_html( get_the_date( 'Y' ) ); ?>
    </div>
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
    <div class="new-text">
      <div class="box-content">
        <p><?php echo the_excerpt(); ?></p>
        <a href="<?php echo esc_url( the_permalink() );?>" class="blogbutton-mdall" title="<?php esc_attr_e( 'READ MORE', 'akhada-fitness-gym' ); ?>"><?php esc_html_e('READ MORE','akhada-fitness-gym'); ?></a>
      </div>
    </div>
    <?php
    if ( is_single() ) {
      akhada_fitness_gym_entry_footer();
    }
    ?>
  </div>
</div>