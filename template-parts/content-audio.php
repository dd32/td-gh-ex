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
  $audio = false;
  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>
<article class="page-box p-3 my-3 mx-0">
  <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
  <?php if(get_theme_mod('advance_coaching_blog_post_description_option') != 'Full Content'){ ?>
    <div class="box-image m-0">
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
  <?php }?>
  <div class="new-text">
    <?php if(get_theme_mod('advance_coaching_blog_post_description_option') == 'Full Content'){ ?>
      <div class="entry-content"><p class="my-3 mx-0"><?php the_content(); ?></p></div>
    <?php }
    if(get_theme_mod('advance_coaching_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p class="my-3 mx-0"><?php $excerpt = get_the_excerpt(); echo esc_html( advance_coaching_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_coaching_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('advance_coaching_post_suffix_option','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if( get_theme_mod('advance_coaching_button_text','READ MORE') != ''){ ?>
      <div class="read-more-btn my-3 mx-0 text-right">
        <a href="<?php the_permalink(); ?>" class="py-3 pr-2 pl-3"><?php echo esc_html(get_theme_mod('advance_coaching_button_text','READ MORE'));?><i class="fas fa-angle-right rounded-circle ml-3"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_coaching_button_text','READ MORE'));?></span></a>
      </div>
    <?php } ?>
  </div>
  <?php if( get_theme_mod( 'advance_coaching_date_hide',true) != '' || get_theme_mod( 'advance_coaching_author_hide',true) != '' || get_theme_mod( 'advance_coaching_comment_hide',true) != '') { ?>
    <div class="metabox pt-3 px-0 pb-2">
      <?php if( get_theme_mod( 'advance_coaching_date_hide',true) != '') { ?>
        <span class="entry-date"><i class="fa fa-calendar pr-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
      <?php } ?>
      <?php if( get_theme_mod( 'advance_coaching_author_hide',true) != '') { ?>
        <span class="entry-author"><i class="fa fa-user pr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
      <?php } ?>
      <?php if( get_theme_mod( 'advance_coaching_comment_hide',true) != '') { ?>
        <span class="entry-comments ml-3"><i class="fas fa-comments pr-2"></i><?php comments_number( __('0 Comments','advance-coaching'), __('0 Comments','advance-coaching'), __('% Comments','advance-coaching') ); ?></span>
      <?php } ?>
    </div>
  <?php }?>
  <div class="clearfix"></div>
</article>