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
    <article class="page-box">
        <h4><a href="<?php echo esc_url( get_permalink() ); ?>" alt="<?php the_title(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
        <div class="box-image">
            <?php the_post_thumbnail();?>
        </div>
        <div class="new-text">
            <p><?php the_excerpt();?></p>
            <div class="second-border">
                <a href="<?php echo esc_url( get_permalink() );?>" alt="<?php esc_html_e( 'READ MORE','advance-fitness-gym' );?>" title="<?php esc_attr_e( 'READ MORE', 'advance-fitness-gym' ); ?>"><?php esc_html_e('READ MORE','advance-fitness-gym'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-fitness-gym' );?></span></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </article>
</div>