<?php
/**
 * The template part for displaying services
 *
 * @package advance-business
 * @subpackage advance-business
 * @since advance-business 1.0
 */
?>
<div class="col-lg-4 col-md-4">
    <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
        <div class="page-box">
            <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
            <div class="metabox">
                <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
                <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>       
                <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-business'), __('0 Comments', 'advance-business'), __('% Comments', 'advance-business') ); ?> </span>
            </div>
            <div class="box-image">
                <?php the_post_thumbnail();?>
            </div>
            <div class="new-text">
                <div class="entry-content"><p><?php the_excerpt();?></p></div>
                <div class="second-border">
                    <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'Read More', 'advance-business' ); ?>"><?php esc_html_e('Read More','advance-business'); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </article>
</div>