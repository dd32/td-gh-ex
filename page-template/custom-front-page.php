<?php
/**
 * Template Name: Custom home
 */

get_header(); ?>

<main role="main" id="maincontent">
  <?php do_action( 'advance_coaching_above_slider' ); ?>

  <?php if( get_theme_mod( 'advance_coaching_slider_hide') != '') { ?>
      <section id="slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
          <?php $slider_page = array();
            for ( $count = 1; $count <= 4; $count++ ) {
              $mod = intval( get_theme_mod( 'advance_coaching_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $slider_page[] = $mod;
              }
            }
            if( !empty($slider_page) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $slider_page,
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
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_coaching_string_limit_words( $excerpt,20 ) ); ?></p>
                    <div class="read-btn">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('READ MORE','advance-coaching'); ?><i class="fas fa-angle-right"></i><span class="screen-reader-text"><?php the_title(); ?></span></a>
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
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
              <span class="screen-reader-text"><?php esc_html_e( 'Previous','advance-coaching' );?></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
              <span class="screen-reader-text"><?php esc_html_e( 'Next','advance-coaching' );?></span>
            </a>
          </div>
        </div>
        <div class="clearfix"></div>
      </section>
  <?php } ?>

  <?php do_action( 'advance_coaching_below_slider' ); ?>

  <?php if( get_theme_mod( 'advance_coaching_title') != '' || get_theme_mod( 'advance_coaching_projects_category_category') != '') { ?>
    <section id="coaching">
      <div class="container">
        <?php if( get_theme_mod('advance_coaching_title') != ''){ ?>
          <div class="coaching-title">
            <h3><?php echo esc_html(get_theme_mod('advance_coaching_title','')); ?></h3>
            <img src="<?php echo esc_url(get_theme_mod('advance_coaching_sec_border',get_template_directory_uri().'/images/border.png')); ?>" alt="">
          </div>
        <?php } ?>
        <div class="row">
          <?php 
           $catData =  get_theme_mod('advance_coaching_projects_category_category');
           if($catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'advance-coaching')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="col-lg-4 col-md-4">
                  <div class="box">
                    <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                    <div class="box-content">
                      <h4 class="title"><?php the_title(); ?></h4>
                      <p class="description">
                        <?php $excerpt = get_the_excerpt(); echo esc_html( advance_coaching_string_limit_words( $excerpt,12 ) ); ?>
                      </p> 
                    </div>
                  </div>
                  <div class="read-more">
                    <a href="<?php the_permalink(); ?>" class="blogbutton-small"><?php esc_html_e('READ MORE','advance-coaching'); ?><i class="fas fa-angle-right"></i>
                    <span class="screen-reader-text"><?php esc_html_e( 'EXPLORE MORE','advance-coaching' );?></span>
                    </a>
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
  <?php do_action( 'advance_coaching_below_coaching_section' ); ?>

  <div id="content">
    <div class="container">
      <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?> post thumbnail image"></a>
    </div>
  </div>
</main>

<?php get_footer(); ?>