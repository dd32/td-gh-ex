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
        <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
        <div class="box-image">
            <?php the_post_thumbnail();?>
        </div>
        <div class="new-text">
            <?php if(get_theme_mod('advance_fitness_gym_blog_post_description_option') == 'Full Content'){ ?>
              <?php the_content(); ?>
            <?php }
            if(get_theme_mod('advance_fitness_gym_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
              <?php if(get_the_excerpt()) { ?>
                <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_fitness_gym_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_fitness_gym_excerpt_number','20')))); ?><?php echo esc_html( get_theme_mod('advance_fitness_gym_post_suffix_option','...') ); ?></p></div>
              <?php }?>
            <?php }?>
            <?php if( get_theme_mod('advance_fitness_gym_button_text','READ MORE') != ''){ ?>
              <div class="second-border">
                <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'READ MORE', 'advance-fitness-gym' ); ?>"><?php echo esc_html(get_theme_mod('advance_fitness_gym_button_text','READ MORE'));?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-fitness-gym' );?></span></a>
              </div>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
    </article>
</div>