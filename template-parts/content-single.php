<?php
/**
 * The template part for displaying single post
 *
 * @package Advance Automobile
 * @subpackage advance-automobile
 * @since advance-automobile 1.0
 */
?> 
<article class="page-box-single">
    <div class="new-text">
        <h2><?php the_title();?></h2>
        <div class="box-img">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="metabox">
            <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></span>
            <span class="entry-comments"><i class="fas fa-comments"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a><?php comments_number( __('0 Comment', 'advance-automobile'), __('0 Comments', 'advance-automobile'), __('% Comments', 'advance-automobile') ); ?> </span>
            <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
        </div>
        <div class="entry-content"><?php the_content();?></div>
    </div>
    <div class="clearfix"></div>
</article>