<?php
/**
 * The template part for displaying services
 *
 * @package advance-fitness-gym
 * @subpackage advance-fitness-gym
 * @since advance-fitness-gym 1.0
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
<article class="page-box py-md-3 px-md-2 py-0 px-2">
  <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
  <?php if( get_theme_mod( 'advance_fitness_gym_author_hide',true) != '' || get_theme_mod( 'advance_fitness_gym_date_hide',true) != '' || get_theme_mod( 'advance_fitness_gym_comment_hide',true) != '') { ?>
    <div class="metabox pt-2 px-0 pb-3">
      <?php if( get_theme_mod( 'advance_fitness_gym_author_hide',true) != '') { ?>
        <span class="entry-author py-0 px-2"><i class="fas fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span><?php echo esc_html( get_theme_mod('advance_fitness_gym_metabox_separator_blog_post') ); ?>
      <?php } ?>
      <?php if( get_theme_mod( 'advance_fitness_gym_date_hide',true) != '') { ?>
        <span class="entry-date py-0 px-2"><i class="fa fa-calendar mr-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('advance_fitness_gym_metabox_separator_blog_post') ); ?>
      <?php } ?>  
      <?php if( get_theme_mod( 'advance_fitness_gym_comment_hide',true) != '') { ?>  
        <span class="entry-comments py-0 px-2"><i class="fas fa-comments mr-2"></i> <?php comments_number( __('0 Comment', 'advance-fitness-gym'), __('0 Comments', 'advance-fitness-gym'), __('% Comments', 'advance-fitness-gym') ); ?> </span>
      <?php } ?>
    </div>
  <?php }?>
  <?php if(get_theme_mod('advance_fitness_gym_blog_post_description_option') != 'Full Content'){ ?>
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
    <?php if(get_theme_mod('advance_fitness_gym_blog_post_description_option') == 'Full Content'){ ?>
      <div class="entry-content"><p class="my-2 mx-0"><?php the_content(); ?></p></div>
    <?php }
    if(get_theme_mod('advance_fitness_gym_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p class="my-2 mx-0"><?php $excerpt = get_the_excerpt(); echo esc_html( advance_fitness_gym_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_fitness_gym_excerpt_number','20')))); ?><?php echo esc_html( get_theme_mod('advance_fitness_gym_post_suffix_option','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if( get_theme_mod('advance_fitness_gym_button_text','READ MORE') != ''){ ?>
      <div class="second-border text-right my-4 mx-0">
        <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'READ MORE', 'advance-fitness-gym' ); ?>" class="py-3 px-4"><?php echo esc_html(get_theme_mod('advance_fitness_gym_button_text','READ MORE'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_fitness_gym_button_text','READ MORE'));?></span></a>
      </div>
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</article>