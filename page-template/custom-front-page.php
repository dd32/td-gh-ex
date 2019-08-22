<?php
/**
 * Template Name: Custom home
 */
get_header(); ?>

<main role="main" id="maincontent">
  <?php do_action( 'advance_pet_care_above_slider' ); ?>

  <?php if( get_theme_mod( 'advance_pet_care_slider_hide') != '') { ?>
    
      <section id="slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
          <?php $slider_pages = array();
            for ( $count = 1; $count <= 4; $count++ ) {
              $mod = intval( get_theme_mod( 'advance_pet_care_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $slider_pages[] = $mod;
              }
            }
            if( !empty($slider_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $slider_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>     
          <div class="carousel-inner" role="listbox">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?> post thumbnail image"/>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <h2><?php the_title(); ?></h2>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_pet_care_string_limit_words( $excerpt,20 ) ); ?></p>
                    <div class="get-apt-btn">
                      <a href="<?php the_permalink(); ?>" alt="<?php esc_html_e( 'GET APPOINTMENT','advance-pet-care' );?>"><?php echo esc_html_e('GET APPOINTMENT','advance-pet-care'); ?><span class="screen-reader-text"><?php esc_html_e( 'GET APPOINTMENT','advance-pet-care' );?></span></a>
                    </div>
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
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" alt="<?php esc_html_e( 'Previous','advance-pet-care' );?>">
              <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
              <span class="screen-reader-text"><?php esc_html_e( 'Previous','advance-pet-care' );?></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" alt="<?php esc_html_e( 'Next','advance-pet-care' );?>">
              <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
              <span class="screen-reader-text"><?php esc_html_e( 'Next','advance-pet-care' );?></span>
            </a>
          </div>
        </div>
        <div class="clearfix"></div>
      </section>
    
  <?php } ?>

  <?php do_action( 'advance_pet_care_below_slider' ); ?>

  <?php if( get_theme_mod( 'advance_pet_care_welcome_setting') != '') { ?>
    <section id="welcome">
      <div class="container">
        <div class="row content-sec">
         <?php
          $args = array( 'name' => get_theme_mod('advance_pet_care_welcome_setting',''));
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="col-lg-5 col-md-5">
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?> post thumbnail image"/>              
              </div>
              <div class="col-lg-7 col-md-7">
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>            
                <div class ="discover-btn">
                  <a href="<?php the_permalink(); ?>" alt="<?php esc_html_e( 'DISCOVER MORE','advance-pet-care' );?>"><span><?php echo esc_html(get_theme_mod('advance_pet_care_about_name',__('DISCOVER MORE','advance-pet-care'))); ?></span>
                  <span class="screen-reader-text"><?php esc_html_e( 'DISCOVER MORE','advance-pet-care' );?></span></a>
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