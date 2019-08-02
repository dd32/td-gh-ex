<?php
/**
 * The template part for displaying single post
 *
 * @package advance-education
 * @subpackage advance-education
 * @since advance-education 1.0
 */
?>  
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <single class="page-box-single">
        <h3><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>
        <div class="box-img">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="new-text">
            <div class="metabox">
                <span class="entry-date"><i class="fas fa-calendar-alt"></i><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>
                <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-education'), __('0 Comments', 'advance-education'), __('% Comments', 'advance-education') ); ?> </span>
                <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
            </div>
            <div class="entry-content"><p><?php the_content();?></p></div>
        </div>
        <div class="clearfix"></div>
    </single>
</article>