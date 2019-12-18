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
                <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
                <div class="entry-content"><p><?php echo the_excerpt(); ?></p></div>
                <a href="<?php echo esc_url( the_permalink() );?>" class="blogbutton-mdall" title="<?php esc_attr_e( 'READ MORE', 'advance-blogging' ); ?>"><?php esc_html_e('READ MORE','advance-blogging'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-blogging' );?></span></a>
            </div>
            <div class="clearfix"></div> 
        </div>
    </article>
</div>