<?php
/**
 * The template part for displaying single-post
 *
 * @package Advance Blogging
 * @subpackage advance_blogging
 * @since Advance Blogging 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
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
                <h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
                <div class="entry-content"><p><?php the_excerpt(); ?></p></div>
                <a href="<?php echo esc_url( the_permalink() );?>" class="blogbutton-mdall" title="<?php esc_attr_e( 'READ MORE', 'advance-blogging' ); ?>"><?php esc_html_e('READ MORE','advance-blogging'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-blogging' );?></span></a>
            </div>
        </div>
        <div class="clearfix"></div> 
    </div> 
</article>