<?php
/**
 * The template part for displaying services
 *
 * @package advance-fitness-gym
 * @subpackage advance-fitness-gym
 * @since advance-fitness-gym 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<div class="col-lg-4 col-md-4">
    <article class="page-box">
        <h3><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>
        <div class="box-image">
            <?php the_post_thumbnail();?>
        </div>
        <div class="new-text">
            <div class="entry-content"><p><?php the_excerpt();?></p></div>
            <div class="second-border">
                <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'READ MORE', 'advance-fitness-gym' ); ?>"><?php esc_html_e('READ MORE','advance-fitness-gym'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-fitness-gym' );?></span></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </article>
</div>