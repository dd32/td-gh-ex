<?php
/**
 * The template part for displaying post
 *
 * @package Automotive Centre 
 * @subpackage automotive-centre
 * @since Automotive Centre 1.0
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box ">
    <div class="row m-0">
      <?php if(has_post_thumbnail()) {?>
        <div class="box-image col-lg-6 col-md-6">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php } ?>
      <div class="new-text <?php if(has_post_thumbnail()) { ?>col-lg-6 col-md-6"<?php } else { ?>col-lg-12 col-md-12"<?php } ?>>
        <h3 class="section-title"><?php the_title();?></h3>
        <div class="post-info">
          <?php if(get_theme_mod('automotive_centre_toggle_postdate',true)==1){ ?>
            <span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('automotive_centre_toggle_author',true)==1){ ?>
            <span class="entry-author"><?php the_author(); ?></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('automotive_centre_toggle_comments',true)==1){ ?>
            <span class="entry-comments"><?php comments_number( __('0 Comment', 'automotive-centre'), __('0 Comments', 'automotive-centre'), __('% Comments', 'automotive-centre') ); ?> </span>
          <?php } ?>
          <hr>
        </div>
        <p><?php $excerpt = get_the_excerpt(); echo esc_html( automotive_centre_string_limit_words( $excerpt, esc_attr(get_theme_mod('automotive_centre_excerpt_number','30')))); ?></p>
        <div class="more-btn">
          <a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'automotive-centre' ); ?></a>
        </div>
      </div>
    </div>
  </div>
</div>