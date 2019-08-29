<?php
/**
 * The template part for displaying grid post
 *
 * @package advance-it-company
 * @subpackage advance-it-company
 * @since advance-it-company 1.0
 */
?>

<div class="col-lg-4 col-md-4">
    <article class="page-box">
        <div class="box-img">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="new-text">
            <h4><?php the_title();?></h4>
            <div class="metabox">
                <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></span>
                <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-it-company'), __('0 Comments', 'advance-it-company'), __('% Comments', 'advance-it-company') ); ?> </span>
                <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
            </div>
            <p><?php the_excerpt();?></p>        
            <div class="read-more-btn">
                <a href="<?php the_permalink(); ?>" alt="<?php esc_html_e( 'READ MORE','advance-it-company' );?>"><?php echo esc_html_e('READ MORE','advance-it-company'); ?><i class="fas fa-angle-right"></i><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-it-company' );?></span></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </article>
</div>