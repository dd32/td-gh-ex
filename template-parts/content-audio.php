<?php
/**
 * The template part for displaying single-post
 *
 * @package Advance Blogging
 * @subpackage advance_blogging
 * @since Advance Blogging 1.0
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
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="postbox mdallpostimage">
    <div class="postimage">
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
          }
        };
      ?>
    </div>
    <div class="new-text">
      <div class="box-content">
        <h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if(get_theme_mod('advance_blogging_post_content') == 'Full Content'){ ?>
          <?php the_content(); ?>
        <?php }
        if(get_theme_mod('advance_blogging_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
          <?php if(get_the_excerpt()) { ?>
            <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_blogging_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_blogging_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('advance_blogging_button_excerpt_suffix','[...]') ); ?></p></div>
          <?php }?>
        <?php }?>
        <?php if ( get_theme_mod('advance_blogging_post_button_text','READ MORE') != '' ) {?>
          <a href="<?php the_permalink(); ?>" class="blogbutton-mdall" title="<?php esc_attr_e( 'READ MORE', 'advance-blogging' ); ?>"><?php echo esc_html( get_theme_mod('advance_blogging_post_button_text',__( 'READ MORE','advance-blogging' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('advance_blogging_post_button_text',__( 'READ MORE','advance-blogging' )) ); ?></span></a>
        <?php }?>
      </div>
    </div>
    <div class="clearfix"></div> 
  </div> 
</article>