<?php
/**
 * Template Name: Custom home
 */

get_header(); ?>

<main role="main" id="maincontent">
  <?php do_action( 'advance_education_above_slider' ); ?>

  <?php if( get_theme_mod( 'advance_education_slider_hide') != '') { ?>    
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'advance_education_slider_page' . $count ));
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
              <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><?php the_title(); ?></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_education_string_limit_words( $excerpt,20 ) ); ?></p>
                  <div class="readbtn">
                    <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('READ MORE','advance-education'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','advance-education' );?></span></a>
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
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','advance-education' );?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','advance-education' );?></span>
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'advance_education_below_slider' ); ?>
  
  <div class="header-nav">
    <?php get_template_part( 'template-parts/header/header-navigation' ); ?> 
  </div>

  <?php do_action( 'advance_education_above_popular_courses_section' ); ?>

  <?php if( get_theme_mod('advance_education_title') != '' || get_theme_mod( 'advance_education_popular_courses_category' )!= ''){ ?>
    <section id="courses">
      <div class="container">
        <?php if( get_theme_mod('advance_education_title') != ''){ ?>
          <h2><i class="fas fa-book"></i><?php echo esc_html(get_theme_mod('advance_education_title','')); ?></h2>
        <?php } ?>
        <div class="row">
          <?php 
           $catData =  get_theme_mod('advance_education_popular_courses_category');
           if($catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'advance-education')));?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class=" col-lg-4 col-md-6">
                  <div class="cat_content">
                    <div class="cat-posts ">
                      <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                      <div class="cat_body">
                        <h3 class="title"><?php the_title(); ?></h3>
                        <p class="description">
                          <?php $excerpt = get_the_excerpt(); echo esc_html( advance_education_string_limit_words( $excerpt,12 ) ); ?>
                        </p> 
                        <div class="theme_button">
                          <a href="<?php the_permalink(); ?>"><?php echo esc_html_e('APPLY NOW','advance-education'); ?><span class="screen-reader-text"><?php esc_html_e( 'APPLY NOW','advance-education' );?></span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <h3 class="title-btn"><?php the_title(); ?></h3>
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

  <?php do_action( 'advance_education_below_popular_courses_section' ); ?>
  <div id="content">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>