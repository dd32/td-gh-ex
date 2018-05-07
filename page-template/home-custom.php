<?php
/**
 * Template Name: Home Custom Page
 */
?>

<?php get_header(); ?>

<?php /** slider section **/ ?>
  <div class="slider-main">
    <?php
      $pages = array();
      for ( $count = 1; $count <= 5; $count++ ) {
        $mod = absint( get_theme_mod( 'academic_education_slidersettings-page-' . $count ) );
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
              $academic_education_n = 0;
            while ( $query->have_posts() ) : $query->the_post();
                
                $academic_education_n++;
                $academic_education_slideno[] = $academic_education_n;
                $academic_education_slidetitle[] = get_the_title();
                $academic_education_slidecontent[] = get_the_content();
                $academic_education_slidelink[] = esc_url( get_permalink() );
                ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $academic_education_n ); ?>" />
                <?php
              $count++;
            endwhile; wp_reset_postdata(); ?>
          </div>

          <?php
          $academic_education_k = 0;
            foreach( $academic_education_slideno as $academic_education_sln ){ ?>
              <div id="slidecaption<?php echo esc_attr( $academic_education_sln ); ?>" class="nivo-html-caption">
                <div class="slide-cap  ">
                  <h2><?php echo esc_html( $academic_education_slidetitle[$academic_education_k] ); ?></h2>
                  <p><?php echo esc_html( $academic_education_slidecontent[$academic_education_k] ); ?></p>
                  <div class="read-more">
                    <a href="<?php echo esc_url( $academic_education_slidelink[$academic_education_k] ); ?>"><?php esc_html_e( 'Read More','academic-education' ); ?></a>
                  </div>
                </div>
              </div>
              <?php $academic_education_k++;
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

<?php do_action( 'academic_education_after_slider' ); ?>

<?php /*--Courses--*/?>
<section id="courses">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8 row">
        <?php 
          $page_query = new WP_Query(array( 'category_name' => esc_html(get_theme_mod('academic_education_category'),'theblog')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-md-4 col-sm-4 course-box">
                <a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></a>
              <div class="borderbox"></div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        ?>
        <div class="clearfix"></div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="single-layout">
          <?php
            $args = array( 'name' => get_theme_mod('academic_education_single_post',''));
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
                <div class="button">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('More','academic-education'); ?></a>
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
    </div>
  </div>
</section>

<?php do_action( 'academic_education_after_courses' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>