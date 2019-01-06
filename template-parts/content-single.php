<?php
/**
 * The template part for displaying single post
 *
 * @package advance-education
 * @subpackage advance-education
 * @since advance-education 1.0
 */
?>  
<div class="page-box-single">
    <h3><?php the_title();?></h3>
    <div class="box-img">
        <img src="<?php the_post_thumbnail_url('full'); ?>"/>
    </div>
    <div class="new-text">
        <div class="metabox">
            <span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo esc_html( get_the_date() ); ?></span>
            <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-education'), __('0 Comments', 'advance-education'), __('% Comments', 'advance-education') ); ?> </span>
            <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
        </div>
        <p><?php the_content();?></p>
    </div>
    <div class="clearfix"></div>
</div>