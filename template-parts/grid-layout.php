<?php
/**
 * The template part for displaying services
 *
 * @package advance-coaching
 * @subpackage advance-coaching
 * @since advance-coaching 1.0
 */
?>
<div class="col-lg-4 col-md-4">
    <div class="page-box">
        <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
        <?php 
          if(has_post_thumbnail()) {?>
            <div class="box-image">
                <?php the_post_thumbnail(); ?>
            </div>
        <div class="date-color">
            <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></span>  
        </div>
        <?php } ?>
        <div class="new-text">
            <p><?php the_excerpt();?></p>
            <div class="read-more-btn">
                <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('READ MORE','advance-coaching'); ?><i class="fas fa-angle-right"></i></a>
            </div>
        </div>
        <div class="metabox">
            <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-coaching'), __('0 Comments', 'advance-coaching'), __('% Comments', 'advance-coaching') ); ?> </span>
            <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
        </div>
        <div class="clearfix"></div>
    </div>
</div>