<?php
/**
 * Template Name: Custom home
 */
get_header(); ?>

<main role="main" id="maincontent">
  <?php do_action( 'advance_pet_care_above_slider' ); ?>

  <?php if( get_theme_mod( 'advance_pet_care_slider_hide', false) != '' || get_theme_mod( 'advance_pet_care_responsive_slider', false) != '') { ?>
    <section id="slider" class="mw-100 m-auto p-0">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('advance_pet_care_slider_speed_option', 3000)); ?>"> 
        <?php $advance_pet_care_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'advance_pet_care_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $advance_pet_care_slider_pages[] = $mod;
            }
          }
          if( !empty($advance_pet_care_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $advance_pet_care_slider_pages,
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
                  <h1 class="m-0 text-capitalize py-2 px-1 text-left"><?php the_title(); ?></h1>
                  <p class="py-2 px-0"><?php $excerpt = get_the_excerpt(); echo esc_html( advance_pet_care_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_pet_care_slider_excerpt_length','15')))); ?></p>
                  <?php if( get_theme_mod('advance_pet_care_slider_button','GET APPOINTMENT') != ''){ ?>
                    <div class="get-apt-btn mt-4">
                      <a href="<?php the_permalink(); ?>" class="py-3 px-4"><?php echo esc_html(get_theme_mod('advance_pet_care_slider_button','GET APPOINTMENT'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_pet_care_slider_button','GET APPOINTMENT'));?></span></a>
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
            <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left p-2"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','advance-pet-care' );?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right p-2"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','advance-pet-care' );?></span>
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'advance_pet_care_below_slider' ); ?>

  <?php if( get_theme_mod( 'advance_pet_care_welcome_setting') != '') { ?>
    <section id="welcome" class="py-4 px-0">
      <div class="container">
        <div class="row content-sec">
         <?php
          $args = array( 'name' => get_theme_mod('advance_pet_care_welcome_setting',''));
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="col-lg-5 col-md-5">
                <?php the_post_thumbnail(); ?>              
              </div>
              <div class="col-lg-7 col-md-7">
                <h2 class="text-capitalize"><?php the_title(); ?></h2>
                <p><?php the_excerpt(); ?></p>            
                <div class ="discover-btn mt-4">
                  <a href="<?php the_permalink(); ?>" class="py-3 px-4"><span><?php echo esc_html('DISCOVER MORE','advance-pet-care'); ?></span><span class="screen-reader-text"><?php esc_html_e( 'DISCOVER MORE','advance-pet-care' );?></span></a>
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

  <?php do_action( 'advance_pet_care_below_welcome_section' ); ?>

  <div id="content">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>