<?php
/**
 * The template part for displaying post
 *
 * @package Automotive Centre 
 * @subpackage automotive-centre
 * @since Automotive Centre 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box ">
    <?php $theme_lay = get_theme_mod( 'automotive_centre_blog_layout_option','Default');
    if($theme_lay == 'Default'){ ?>
      <div class="row m-0">
        <?php if(has_post_thumbnail()) {?>
          <div class="box-image col-lg-6 col-md-6">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>
        <div class="new-text <?php if(has_post_thumbnail()) { ?>col-lg-6 col-md-6"<?php } else { ?>col-lg-12 col-md-12"<?php } ?>>
          <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
          <div class="post-info">
            <?php if(get_theme_mod('automotive_centre_toggle_postdate',true)==1){ ?>
              <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
            <?php } ?>

            <?php if(get_theme_mod('automotive_centre_toggle_author',true)==1){ ?>
              <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
            <?php } ?>

            <?php if(get_theme_mod('automotive_centre_toggle_comments',true)==1){ ?>
              <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'automotive-centre'), __('0 Comments', 'automotive-centre'), __('% Comments', 'automotive-centre') ); ?> </span>
            <?php } ?>
            <hr>
          </div>
          <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( automotive_centre_string_limit_words( $excerpt, esc_attr(get_theme_mod('automotive_centre_excerpt_number','30')))); ?></p></div>
          <div class="more-btn">
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'automotive-centre' ); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','automotive-centre' );?></span></a>
          </div>
        </div>
      </div>
    <?php }else if($theme_lay == 'Center'){ ?>
      <div class="service-text">
        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <div class="box-image">
          <?php the_post_thumbnail(); ?>
        </div>
        <div class="post-info">
          <?php if(get_theme_mod('automotive_centre_toggle_postdate',true)==1){ ?>
            <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('automotive_centre_toggle_author',true)==1){ ?>
            <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('automotive_centre_toggle_comments',true)==1){ ?>
            <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'automotive-centre'), __('0 Comments', 'automotive-centre'), __('% Comments', 'automotive-centre') ); ?> </span>
          <?php } ?>
          <hr>
        </div>
        <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( automotive_centre_string_limit_words( $excerpt, esc_attr(get_theme_mod('automotive_centre_excerpt_number','30')))); ?></p></div>
        <div class="more-btn">
          <a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'automotive-centre' ); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','automotive-centre' );?></span></a>
        </div>
      </div>
    <?php }else if($theme_lay == 'Left'){ ?>
      <div class="service-text">
        <div class="box-image">
          <?php the_post_thumbnail(); ?>
        </div>
        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <div class="post-info">
          <?php if(get_theme_mod('automotive_centre_toggle_postdate',true)==1){ ?>
            <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('automotive_centre_toggle_author',true)==1){ ?>
            <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('automotive_centre_toggle_comments',true)==1){ ?>
            <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'automotive-centre'), __('0 Comments', 'automotive-centre'), __('% Comments', 'automotive-centre') ); ?> </span>
          <?php } ?>
          <hr>
        </div>
        <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( automotive_centre_string_limit_words( $excerpt, esc_attr(get_theme_mod('automotive_centre_excerpt_number','30')))); ?></p></div>
        <div class="more-btn">
          <a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'automotive-centre' ); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','automotive-centre' );?></span></a>
        </div>
      </div>
    <?php } ?>
  </div>
</article>