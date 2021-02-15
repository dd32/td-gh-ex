<?php
/**
 * Template Name: Custom home
 */

get_header(); ?>

<main role="main" id="maincontent">
  <?php do_action( 'advance_automobile_above_slider' ); ?>

  <?php if( get_theme_mod( 'advance_automobile_slider_hide', false) != '' || get_theme_mod( 'advance_automobile_responsive_slider', false) != '') { ?>
    <section id="slider" class="mw-100 m-auto p-0">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('advance_automobile_slider_speed_option', 3000)); ?>"> 
        <?php $advance_automobile_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'advance_automobile_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $advance_automobile_slider_pages[] = $mod;
            }
          }
          if( !empty($advance_automobile_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $advance_automobile_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel text-left">
                  <h1 class="m-0 text-left"><?php the_title(); ?></h1>
                  <p class="py-2 px-0"><?php $excerpt = get_the_excerpt(); echo esc_html( advance_automobile_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_automobile_slider_excerpt_length','20')))); ?></p>
                  <?php if( get_theme_mod('advance_automobile_slider_button','READ MORE') != ''){ ?>
                    <div class="read-btn">
                      <a href="<?php the_permalink(); ?>" class="p-3"><?php echo esc_html(get_theme_mod('advance_automobile_slider_button','READ MORE'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_automobile_slider_button','READ MORE'));?></span></a>
                    </div>
                  <?php } ?>
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
        <div class="slider-nex-pre">
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left p-3"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','advance-automobile' );?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right p-3"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','advance-automobile' );?></span>
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'advance_automobile_below_slider' ); ?>
    <section id="contact-details">
      <div class="container">
        <div class="row m-0">
          <?php if( get_theme_mod( 'advance_automobile_address') != '' || get_theme_mod( 'advance_automobile_address1' )!= '') { ?>
          <div class="col-lg-4 col-md-4">
            <div class="address">
              <div class="row">
                <div class="col-lg-2 col-md-3">
                  <i class="fas fa-map-marker-alt p-3 rounded-circle"></i>
                </div>
                <div class="col-lg-10 col-md-9">
                  <?php if( get_theme_mod('advance_automobile_address') != ''){ ?>
                    <p class="address-font mb-0"><?php echo esc_html( get_theme_mod('advance_automobile_address','')); ?></p>
                  <?php } ?>
                  <?php if( get_theme_mod('advance_automobile_address1') != ''){ ?>
                    <p class="mb-0"><?php echo esc_html( get_theme_mod('advance_automobile_address1','')); ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if( get_theme_mod( 'advance_automobile_time') != '' || get_theme_mod( 'advance_automobile_time1' )!= '') { ?>
          <div class="col-lg-4 col-md-4">
            <div class="time">
              <div class="row">
                <div class="col-lg-2 col-md-3">
                  <i class="far fa-clock p-3 rounded-circle"></i>
                </div>
                <div class="col-lg-10 col-md-9">
                  <?php if( get_theme_mod('advance_automobile_time') != ''){ ?>
                    <p class="address-font m-0"><?php echo esc_html( get_theme_mod('advance_automobile_time','')); ?></p>
                  <?php } ?>
                  <?php if( get_theme_mod('advance_automobile_time1') != ''){ ?>
                    <p class="m-0"><?php echo esc_html( get_theme_mod('advance_automobile_time1','')); ?></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if( get_theme_mod( 'advance_automobile_call') != '' || get_theme_mod( 'advance_automobile_call1' )!= '') { ?>
          <div class="col-lg-4 col-md-4">
            <div class="address">
              <div class="row">
                <div class="col-lg-2 col-md-3">
                  <i class="fas fa-phone p-3 rounded-circle"></i>
                </div>
                <div class="col-lg-10 col-md-9">
                  <?php if( get_theme_mod('advance_automobile_call') != ''){ ?>
                    <p class="address-font mb-0"><?php echo esc_html( get_theme_mod('advance_automobile_call','')); ?></p>
                  <?php } ?>
                  <?php if( get_theme_mod('advance_automobile_call1') != ''){ ?>
                    <a href="tel:<?php echo esc_attr( get_theme_mod('advance_automobile_call1','' )); ?>"><?php echo esc_html( get_theme_mod('advance_automobile_call1','')); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('advance_automobile_call1','')); ?></span></a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
  <?php do_action( 'advance_automobile_below_contact_section' ); ?>

  <?php if( get_theme_mod('advance_automobile_category3') != '' || get_theme_mod( 'advance_automobile_our_services_title' )!= ''){ ?>
    <section id="category" class="py-5 px-0">
      <div class="container">
        <?php if( get_theme_mod('advance_automobile_our_services_title') != ''){ ?>
        <h2 class="m-0 pt-0 px-0 pb-3 text-center"><?php echo esc_html(get_theme_mod('advance_automobile_our_services_title','')); ?></h2>
        <?php }?>
        <div class="row owl-carousel m-0">
          <?php 
          $advance_automobile_catData = get_theme_mod('advance_automobile_category3');
          if($advance_automobile_catData){              
          $page_query = new WP_Query(array( 'category_name' => esc_html( $advance_automobile_catData ,'advance-automobile')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="text-content">
                  <h3 class="pb-0"><?php the_title(); ?></h3>
                  <p><?php the_excerpt(); ?></p>
                  <div class="explore-btn mt-4">
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="py-3 px-4"><?php echo esc_html_e('EXPLORE MORE','advance-automobile'); ?><span class="screen-reader-text"><?php esc_html_e( 'EXPLORE MORE','advance-automobile' );?></span></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="imagebox">
                  <?php the_post_thumbnail(); ?>
                </div>
              </div>
            </div>
            <?php endwhile; 
            wp_reset_postdata();
          }
          ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'advance_automobile_below_our_services_section' ); ?>

  <div id="content">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>