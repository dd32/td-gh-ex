<?php
/**
 * Template Name: Custom home
 */
get_header(); ?>

<main role="main" id="maincontent">

  <?php do_action( 'bb_mobile_application_before_slider' ); ?>

  <?php if( get_theme_mod('bb_mobile_application_slider_hide_show') != ''){ ?> 

    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'bb_mobile_application_slider' . $count ));
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
            <?php the_post_thumbnail(); ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h1><?php the_title();?></h1>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( bb_mobile_application_string_limit_words( $excerpt, esc_attr(get_theme_mod('bb_mobile_application_slider_excerpt_length','10')))); ?></p>
              </div>
              <div class="know-btn">
                <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('KNOW MORE','bb-mobile-application'); ?><span class="screen-reader-text"><?php esc_html_e( 'KNOW MORE','bb-mobile-application' );?></span></a>
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
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','bb-mobile-application' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','bb-mobile-application' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
 
  <?php }?>

  <?php do_action( 'bb_mobile_application_after_slider' ); ?>

  <?php if( get_theme_mod('bb_mobile_application_title') != '' || get_theme_mod('bb_mobile_application_blogcategory_left_setting') != '' || get_theme_mod('bb_mobile_application_middle_image_setting') || get_theme_mod('bb_mobile_application_blogcategory_right_setting') != ''){ ?>
    <?php /** post section **/ ?>
    <section class="creative-feature">
      <div class="container">
        <?php if( get_theme_mod('bb_mobile_application_title') != ''){ ?>
          <div class="heading-line">
            <h2><?php echo esc_html(get_theme_mod('bb_mobile_application_title','')); ?> </h2>
          </div>
        <?php } ?>
        <div class="row m-0">
          <div class="col-lg-4 col-md-4 p-0">
            <div id="about" class="darkbox" >
              <?php 
               $catData=  get_theme_mod('bb_mobile_application_blogcategory_left_setting');
               if($catData){
                $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'bb-mobile-application')));?>
                  <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                    <div class="left-part">
                      <div class="row m-0"> 
                        <div class="col-lg-4 col-md-4 p-0">
                          <div class="abt-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?> 
                          </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a> </h3>  
                        </div>
                      </div>
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( bb_mobile_application_string_limit_words( $excerpt,10 ) ); ?></p>    
                    </div>
                <?php endwhile;
              wp_reset_postdata();
              } ?>        
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="middle-image">
              <?php
                $args = array( 'name' => get_theme_mod('bb_mobile_application_middle_image_setting',''));
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  while ( $query->have_posts() ) : $query->the_post(); ?>
                  <div class="row m-0">
                    <div class="featuered-image">
                      <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                    </div>
                  </div>
                  <?php endwhile; 
                  wp_reset_postdata();?>
                  <?php else : ?>
                   <div class="no-postfound"></div>
                  <?php
                  endif; ?>
                <div class="clearfix"></div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 p-0">
            <div id="about" class="darkbox" >
              <?php 
               $catData=  get_theme_mod('bb_mobile_application_blogcategory_right_setting');
               if($catData){
                $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'bb-mobile-application')));?>
                  <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                    <div class="right-part">
                      <div class="row m-0">
                        <div class="col-lg-4 col-md-4 p-0">
                          <div class="abt-img-box"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                        </div>
                      </div>
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( bb_mobile_application_string_limit_words( $excerpt,10 ) ); ?></p>
                    </div>
                <?php endwhile;
              wp_reset_postdata();
               }
              ?>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php } ?>

  <?php do_action( 'bb_mobile_application_after_creative_feature' ); ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>