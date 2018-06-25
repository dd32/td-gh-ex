<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<?php /** slider section **/ ?>
  <div class="slider-main">
    <?php
      // Get pages set in the customizer (if any)
      $pages = array();
      for ( $count = 1; $count <= 5; $count++ ) {
        $mod = absint( get_theme_mod( 'automobile_car_dealer_slidersettings-page-' . $count ) );
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      
      if( !empty($pages) ) :
        $args = array(
          'posts_per_page' => 5,
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $count = 1;
          ?>
          <div id="slider" class="nivoSlider">
            <?php
              $automobile_car_dealer_n = 0;
            while ( $query->have_posts() ) : $query->the_post();
                
                $automobile_car_dealer_n++;
                $automobile_car_dealer_slideno[] = $automobile_car_dealer_n;
                $automobile_car_dealer_slidetitle[] = get_the_title();
                $automobile_car_dealer_slideexcerpt[] = get_the_excerpt();
                $automobile_car_dealer_slidelink[] = esc_url( get_permalink() );
                ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $automobile_car_dealer_n ); ?>" />
                <?php
              $count++;
            endwhile;
            wp_reset_postdata(); ?>
          </div>

          <?php
          $automobile_car_dealer_k = 0;
            foreach( $automobile_car_dealer_slideno as $automobile_car_dealer_sln ){ ?>
              <div id="slidecaption<?php echo esc_attr( $automobile_car_dealer_sln ); ?>" class="nivo-html-caption">
                <div class="slide-cap">
                  <div class="container">
                    <div class="main-slide">
                      <h2><?php echo esc_html( $automobile_car_dealer_slidetitle[$automobile_car_dealer_k] ); ?></h2>
                      <p><?php echo esc_html( $automobile_car_dealer_slideexcerpt[$automobile_car_dealer_k] ); ?></p>
                      <div class="slide-button">
                        <a class="read-more" href="<?php echo esc_url( $automobile_car_dealer_slidelink[$automobile_car_dealer_k] ); ?>"><?php esc_html_e( 'Read More','automobile-car-dealer' ); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php $automobile_car_dealer_k++;
          }
        else : ?>
            <div class="header-no-slider"></div>
          <?php
        endif;
      else : ?>
          <div class="header-no-slider"></div>
      <?php
      endif; 
    ?>
  </div>

<?php /** About Us section **/ ?>
<section id="project">
  <div class="container">
    <?php if( get_theme_mod('automobile_car_dealer_sec_title') != ''){ ?>     
      <h3><i class="fas fa-car"></i><?php echo esc_html(get_theme_mod('automobile_car_dealer_sec_title',__('About Us','automobile-car-dealer'))); ?></h3>
    <?php }?>
    <div class="row">
      <div class="col-md-7 col-sm-7">
        <?php
        $args = array( 'name' => esc_html(get_theme_mod('automobile_car_dealer_project_single_post','')));
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="mainbox">
              <p><?php the_excerpt();?></p>
              <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>"></a>
            </div>
          <?php endwhile; 
          wp_reset_postdata();?>
          <?php else : ?>
             <div class="no-postfound"></div>
           <?php
          endif; ?>
          <div class="clearfix"></div>
      </div>
      <div class="col-md-5 col-sm-5">
        <?php 
          $page_query = new WP_Query(array( 'category_name' => esc_html(get_theme_mod('automobile_car_dealer_project_category'),'theblog')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="categorybox row">
              <div class="col-md-4 col-sm-4">
                <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
              </div>
              <div class="col-md-8 col-sm-8">
                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( automobile_car_dealer_string_limit_words( $excerpt,10 ) ); ?></p>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        ?>
      </div>
    </div>
  </div> 
</section>

<?php get_footer(); ?>