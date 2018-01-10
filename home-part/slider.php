<?php
/**
 * Slider template
 *
 * @package Best blog
 */
?>

<?php
$category_show = get_theme_mod( 'category_show_slider');
$post_order_by = get_theme_mod( 'slider_post_order_by','date' );
if ( true == get_theme_mod( 'sticky_checkbox_slider', false ) ) :
  $sticky = get_option( 'sticky_posts' );
else:
  $sticky ='';
endif;
  $args=array(
    'post_type' => 'post',
    'posts_per_page'=>4,
    'cat' => $category_show,
    'orderby' => $post_order_by,
    'post__not_in' => $sticky,
    );
  $main_slider = new WP_Query($args);
?>
<div  class="grid-container full ">
<div class="cell large-auto small-12" >
  <div id="slider" class="slick-slider slider-post-wrap" >
      <?php if ( $main_slider->have_posts() ) : ?>
        <?php /* Start the Loop */ ?>
        <?php while ( $main_slider->have_posts() ) : $main_slider->the_post(); ?>
            <article class="post-wrap-slider">
              <div class="post-thumbouter-slider">
                <div class="post-thumb-overlay"></div>
                <div class="post-thumb-slider ">
                  <span class="thumbnail-resize-slider">
                    <span class="thumbnail-image-slider">
                      <?php
                        if ( has_post_thumbnail() ) {?>
                            <?php the_post_thumbnail( 'bestblog-slider'); ?>
                          <?php  } else {?>
                          <img src="<?php echo get_template_directory_uri(); ?>/images/sliderdemo.jpg" / />
                        <?php }?>
                    </span>
                  </span>
                </div>
              </div>
              <div class="post-header-outer is-header-overlay">
                <span class="slider-cat-info">
                <?php bestblog_category_slider(); ?>
                </span>
                <div class="post-header">
                  <?php the_title( sprintf( '<h3 class="post-title is-size-2"><a class="post-title-link" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                </div>
              </article >
    <?php endwhile; ?>
      <?php else : ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>
  </div>
