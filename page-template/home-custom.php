<?php
/**
 * Template Name: Home Custom Page
 */
?>

<?php get_header(); ?>

<?php do_action( 'academic_education_before_slider' ); ?>

<?php /** slider section **/ ?>
<?php if( get_theme_mod('academic_education_slider_hide') != ''){ ?>
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel"> 
      <?php $pages = array();
        for ( $count = 1; $count <= 3; $count++ ) {
          $mod = intval( get_theme_mod( 'academic_education_slidersettings-page-' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $pages[] = $mod;
          }
        }
        if( !empty($pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>
      <div class="carousel-inner" role="listbox">
        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h2><?php the_title(); ?></h2>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( academic_education_string_limit_words( $excerpt,30 ) ); ?></p>
                <div class="more-btn">              
                  <a href="<?php the_permalink(); ?>"><span><?php esc_html_e('LEARN MORE','academic-education'); ?></span></a>
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
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
      </a>
    </div>  
    <div class="clearfix"></div>
  </section>
<?php }?>

<?php do_action( 'academic_education_after_slider' ); ?>

<?php /*--Courses--*/?>
<section id="courses">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 row">
        <?php 
          $catData = get_theme_mod('academic_education_category');
          if($catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html( $catData ,'academic-education')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-4 col-md-4">
              <div class="course-box">
                <a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></a>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        }
        ?>
        <div class="clearfix"></div>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="single-layout">
          <?php
            $postData = get_theme_mod('academic_education_single_post');
              if($postData){
              $args = array( 'name' => esc_html( $postData ,'academic-education'));
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  while ( $query->have_posts() ) : $query->the_post(); ?>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    <div class="button">
                      <a href="<?php the_permalink(); ?>"><span><?php esc_html_e('SEE COURSE','academic-education'); ?></span></a>
                    </div>
                <?php endwhile; 
              wp_reset_postdata(); ?>
            <?php else : ?>
            <div class="no-postfound"></div>
           <?php
          endif; } ?>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php do_action( 'academic_education_after_courses' ); ?>

<div id="main-content" class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>