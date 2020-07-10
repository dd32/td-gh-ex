<?php
/**
 * The template part for displaying single-post
 *
 * @package Advance Blogging
 * @subpackage advance_blogging
 * @since Advance Blogging 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="postbox mdallpostimage">
        <div class="postimage">
            <?php 
                if(has_post_thumbnail()) { ?>
                    <?php the_post_thumbnail();  ?>
                    <?php if( get_theme_mod( 'advance_blogging_date_hide',true) != '') { ?>
                        <div class="metabox">
                            <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>">
                            <div class="dateday"><?php echo esc_html( get_the_date( 'd') ); ?></div>
                            <hr class="metahr m-0 p-0">
                            <div class="month"><?php echo esc_html( get_the_date( 'M' ) ); ?></div>
                            <div class="year"><?php echo esc_html( get_the_date( 'Y' ) ); ?></div>
                            <span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a>
                        </div>
                    <?php } ?>
            <?php } ?>
        </div>
        <div class="new-text">
            <div class="box-content">
                <h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
                <?php if(get_theme_mod('advance_blogging_post_content') == 'Full Content'){ ?>
                    <?php the_content(); ?>
                <?php }
                if(get_theme_mod('advance_blogging_post_content', 'Excerpt Content') == 'Excerpt Content'){ ?>
                    <?php if(get_the_excerpt()) { ?>
                      <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_blogging_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_blogging_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('advance_blogging_button_excerpt_suffix','[...]') ); ?></p></div>
                    <?php }?>
                <?php }?>
                <?php if ( get_theme_mod('advance_blogging_post_button_text','READ MORE') != '' ) {?>
                    <a href="<?php the_permalink(); ?>" class="blogbutton-mdall" title="<?php esc_attr_e( 'READ MORE', 'advance-blogging' ); ?>"><?php echo esc_html( get_theme_mod('advance_blogging_post_button_text',__( 'READ MORE','advance-blogging' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('advance_blogging_post_button_text',__( 'READ MORE','advance-blogging' )) ); ?></span></a>
                <?php }?>
            </div>
        </div>
        <div class="clearfix"></div> 
    </div> 
</article>