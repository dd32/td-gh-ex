<?php
/**
 * The template part for displaying single-post
 *
 * @package Advance Blogging
 * @subpackage tc_blog
 * @since Advance Blogging 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<div class="col-lg-4 col-md-4">
    <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
        <div class="mdallpostimage">
            <div class="postimage">
                <?php 
                    if(has_post_thumbnail()) { ?>
                    <?php the_post_thumbnail();  ?>
                <?php } ?>
            </div>
            <div class="box-content">
                <h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
                <?php if(get_the_excerpt()) { ?>
                  <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_blogging_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_blogging_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('advance_blogging_button_excerpt_suffix','[...]') ); ?></p></div>
                <?php }?>
                <?php if ( get_theme_mod('advance_blogging_post_button_text','READ MORE') != '' ) {?>
                    <a href="<?php the_permalink(); ?>" class="blogbutton-mdall" title="<?php esc_attr_e( 'READ MORE', 'advance-blogging' ); ?>"><?php echo esc_html( get_theme_mod('advance_blogging_post_button_text',__( 'READ MORE','advance-blogging' )) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('advance_blogging_post_button_text',__( 'READ MORE','advance-blogging' )) ); ?></span></a>
                <?php }?>
            </div>
            <div class="clearfix"></div> 
        </div>
    </article>
</div>