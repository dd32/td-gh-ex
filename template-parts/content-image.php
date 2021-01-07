<?php
/**
 * The template part for displaying services
 *
 * @package advance-business
 * @subpackage advance-business
 * @since advance-business 1.0
 */
?> 
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<article class="page-box">
  <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
  <?php if( get_theme_mod( 'advance_business_author_hide',true) != '' || get_theme_mod( 'advance_business_date_hide',true) != '' || get_theme_mod( 'advance_business_comment_hide',true) != '') { ?>
    <div class="metabox">
      <?php if( get_theme_mod( 'advance_business_author_hide',true) != '') { ?>
        <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><?php echo esc_html( get_theme_mod('advance_business_metabox_separator_blog_post') ); ?>
      <?php } ?>
      <?php if( get_theme_mod( 'advance_business_date_hide',true) != '') { ?>
        <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('advance_business_metabox_separator_blog_post') ); ?>
      <?php } ?>
      <?php if( get_theme_mod( 'advance_business_comment_hide',true) != '') { ?>
        <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comment', 'advance-business'), __('0 Comments', 'advance-business'), __('% Comments', 'advance-business') ); ?> </span>
      <?php } ?>
    </div>
  <?php }?>
  <div class="box-image">
    <?php the_post_thumbnail();?>
  </div>
  <div class="new-text">
    <?php if(get_theme_mod('advance_business_blog_post_description_option') == 'Full Content'){ ?>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    <?php }
    if(get_theme_mod('advance_business_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_business_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_business_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('advance_business_post_suffix_option','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if( get_theme_mod('advance_business_button_text','Read More') != ''){ ?>
      <div class="second-border">
        <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'Read More', 'advance-business' ); ?>"><?php echo esc_html(get_theme_mod('advance_business_button_text','Read More'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_business_button_text','Read More'));?></span></a>
      </div>
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</article>