<?php
/**
 * Template Name: Custom home
 */
get_header(); ?>

<main role="main" id="maincontent">
  <?php do_action( 'advance_fitness_gym_above_slider' ); ?>
  
  <?php if( get_theme_mod( 'advance_fitness_gym_slider_hide', false) != '' || get_theme_mod( 'advance_fitness_gym_responsive_slider', false) != '') { ?>
    <section id="slider" class="mw-100 m-auto p-0">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('advance_fitness_gym_slider_speed_option', 3000)); ?>"> 
        <?php $advance_fitness_gym_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'advance_fitness_gym_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $advance_fitness_gym_slider_pages[] = $mod;
            }
          }
          if( !empty($advance_fitness_gym_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $advance_fitness_gym_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
              <div class="carousel-caption">
                <div class="inner_carousel text-center">
                  <h1 class="m-0 py-2 px-3"><?php the_title(); ?></h1>
                  <p class="mb-0 mt-2 py-2 px-3"><?php $excerpt = get_the_excerpt(); echo esc_html( advance_fitness_gym_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_fitness_gym_slider_excerpt_length','20')))); ?></p>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','advance-fitness-gym' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','advance-fitness-gym' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'advance_fitness_gym_below_slider' ); ?>

  <?php if( get_theme_mod( 'advance_fitness_gym_product_service') == true) { ?>
    <section id="fitness-content" class="my-4 mx-0">
      <div class="container">
        <div class="fitnes-post p-3">      
          <div class="row">
            <?php 
              $advance_fitness_gym_catData = get_theme_mod('advance_fitness_gym_product_service');
              if($advance_fitness_gym_catData){              
              $page_query = new WP_Query(array( 'category_name' => esc_html( $advance_fitness_gym_catData ,'advance-fitness-gym')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="col-lg-3 col-md-3">
                  <div class="service-border text-center">
                    <?php the_post_thumbnail('full'); ?>
                    <a href="<?php the_permalink(); ?>"><strong class="text-center text-uppercase my-2 mx-3"><?php the_title(); ?></strong></a>
                    <p class="m-0 text-center py-0 px-2"><?php $excerpt = get_the_excerpt(); echo esc_html( advance_fitness_gym_string_limit_words( $excerpt,10 ) ); ?></p>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_postdata();
            }
            ?>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php do_action( 'advance_fitness_gym_below_services' ); ?>

  <?php if( get_theme_mod( 'advance_fitness_gym_single_post') != '') { ?>
    <section id="fitness-togym" class="py-4 px-0">
      <div class="container">
        <div class="fitness-single-post">      
          <?php
            $args = array( 'name' => get_theme_mod('advance_fitness_gym_single_post',''));
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="img-box">
                      <?php the_post_thumbnail('full'); ?>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="single-content">
                      <h2 class="text-uppercase"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
                      <hr class="wlcm-hr mx-0 mt-0 mb-3">
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_fitness_gym_string_limit_words( $excerpt,70 ) ); ?></p>
                      <div class="know-btn text-left mt-5">
                        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small p-3" title="<?php esc_attr_e( 'READ MORE', 'advance-fitness-gym' ); ?>"><?php esc_html_e('READ MORE','advance-fitness-gym'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-fitness-gym' );?></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; 
              wp_reset_postdata();?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php
          endif; ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'advance_fitness_gym_below_welcome_section' ); ?>

  <div id="content">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>