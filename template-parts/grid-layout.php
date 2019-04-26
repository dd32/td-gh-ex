<?php
/**
 * The template part for displaying services
 *
 * @package advance-fitness-gym
 * @subpackage advance-fitness-gym
 * @since advance-fitness-gym 1.0
 */
?>
<div class="col-lg-4 col-md-4">
    <div class="page-box">
        <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
        <div class="box-image">
            <?php the_post_thumbnail();?>
        </div>
        <div class="new-text">
            <p><?php the_excerpt();?></p>
            <div class="second-border">
                <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'Read More', 'advance-fitness-gym' ); ?>"><?php esc_html_e('Read More','advance-fitness-gym'); ?></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>