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
<article class="page-box">
  <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php esc_html(the_title());?></a></h2>
  <?php if( get_theme_mod( 'advance_fitness_gym_author_hide',true) != '' || get_theme_mod( 'advance_fitness_gym_date_hide',true) != '' || get_theme_mod( 'advance_fitness_gym_comment_hide',true) != '') { ?>
    <div class="metabox">
      <?php if( get_theme_mod( 'advance_fitness_gym_author_hide',true) != '') { ?>
        <span class="entry-author"><i class="fas fa-user"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php esc_html(the_author()); ?></a></span>
      <?php } ?>
      <?php if( get_theme_mod( 'advance_fitness_gym_date_hide',true) != '') { ?>
        <span class="entry-date"><i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
      <?php } ?>  
      <?php if( get_theme_mod( 'advance_fitness_gym_comment_hide',true) != '') { ?>  
        <span class="entry-comments"><i class="fas fa-comments"></i> <?php comments_number( __('0 Comment', 'advance-fitness-gym'), __('0 Comments', 'advance-fitness-gym'), __('% Comments', 'advance-fitness-gym') ); ?> </span>
      <?php } ?>
    </div>
  <?php }?>
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
        <a href="<?php echo esc_url( get_permalink() );?>" title="<?php esc_attr_e( 'READ MORE', 'advance-fitness-gym' ); ?>"><?php echo esc_html(get_theme_mod('advance_fitness_gym_button_text','READ MORE'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_fitness_gym_button_text','READ MORE'));?></span></a>
      </div>
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</article>