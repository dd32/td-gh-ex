<?php
/**
 * The template part for displaying post 
 *
 * @package advance-pet-care
 * @subpackage advance-pet-care
 * @since advance-pet-care 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article class="page-box">
  <div class="box-img">
    <?php the_post_thumbnail();?>
  </div>
  <div class="new-text">
    <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php esc_html(the_title());?><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a></h2>
    <?php if( get_theme_mod( 'advance_pet_care_date_hide',true) != '' || get_theme_mod( 'advance_pet_care_date_hide',true) != '' || get_theme_mod( 'advance_pet_care_date_hide',true) != '') { ?>
      <div class="metabox">
        <?php if( get_theme_mod( 'advance_pet_care_date_hide',true) != '') { ?>
          <span class="entry-date"><i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
        <?php } ?>
        <?php if( get_theme_mod( 'advance_pet_care_author_hide',true) != '') { ?>
          <span class="entry-author"><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php esc_html(the_author()); ?><span class="screen-reader-text"><?php esc_html(the_author()); ?></span></a></span>
        <?php } ?>
        <?php if( get_theme_mod( 'advance_pet_care_comment_hide',true) != '') { ?>
          <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-pet-care'), __('0 Comments', 'advance-pet-care'), __('% Comments', 'advance-pet-care') ); ?> </span>
        <?php } ?>
      </div>
    <?php }?>
    <?php if(get_theme_mod('advance_pet_care_blog_post_description_option') == 'Full Content'){ ?>
      <?php the_content(); ?>
    <?php }
    if(get_theme_mod('advance_pet_care_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_pet_care_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_pet_care_excerpt_number','20')))); ?><?php echo esc_html( get_theme_mod('advance_pet_care_post_suffix_option','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if( get_theme_mod('advance_pet_care_button_text','READ MORE') != ''){ ?>
      <div class="read-more-btn">
        <a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(get_theme_mod('advance_pet_care_button_text','READ MORE'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_pet_care_button_text','READ MORE'));?></span></a>
      </div>
    <?php }?>
  </div>
  <div class="clearfix"></div>
</article>