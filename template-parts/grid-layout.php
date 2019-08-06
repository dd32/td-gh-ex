<?php
/**
 * The template part for displaying grid post
 *
 * @package Advance Automobile
 * @subpackage advance-automobile
 * @since advance-automobile 1.0
 */
?>
<div class="col-lg-4 col-md-4">
    <article class="page-box">
        <div class="box-img">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="new-text">
            <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
            <div class="metabox">
                <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>
                <span class="entry-comments"><i class="fas fa-comments"></i><?php comments_number( __('0 Comment', 'advance-automobile'), __('0 Comments', 'advance-automobile'), __('% Comments', 'advance-automobile') ); ?></span>
                <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
            </div>
            <div class="entry-content"><p><?php the_excerpt();?></p></div>        
            <div class="read-more-btn">
                <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('READ MORE','advance-automobile'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-automobile' );?></span></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </article>
</div>