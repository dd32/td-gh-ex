<?php
/**
 * Template Name: Custom home
 */

get_header(); ?>

<?php do_action( 'bb_wedding_bliss_below_slider' ); ?>

  <?php /** slider section **/ ?>
  <div class="slider-main">
    <?php
      // Get pages set in the customizer (if any)
      $pages = array();
      for ( $count = 1; $count <= 5; $count++ ) {
        $mod = intval( get_theme_mod( 'bb_wedding_bliss_slidersettings-page-' . $count ) );
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
              $bb_wedding_bliss_n = 0;
            while ( $query->have_posts() ) : $query->the_post();
                
                $bb_wedding_bliss_n++;
                $bb_wedding_bliss_slideno[] = $bb_wedding_bliss_n;
                $bb_wedding_bliss_slidetitle[] = get_the_title();
                $bb_wedding_bliss_slidelink[] = esc_url( get_permalink() );
                ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $bb_wedding_bliss_n ); ?>" />
                <?php
              $count++;
            endwhile;
            ?>
          </div>

          <?php
          $bb_wedding_bliss_k = 0;
            foreach( $bb_wedding_bliss_slideno as $bb_wedding_bliss_sln ){ ?>
              <div id="slidecaption<?php echo esc_attr( $bb_wedding_bliss_sln ); ?>" class="nivo-html-caption">
                <div class="slide-cap  ">
                  <div class="container">
                    <h2><?php echo esc_html( $bb_wedding_bliss_slidetitle[$bb_wedding_bliss_k] ); ?></h2>
                    <a class="read-more" href="<?php echo esc_url( $bb_wedding_bliss_slidelink[$bb_wedding_bliss_k] ); ?>"><?php esc_html_e( 'Learn More','bb-wedding-bliss' ); ?></a>
                  </div>
                </div>
              </div>
              <?php $bb_wedding_bliss_k++;
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

<?php do_action( 'bb_wedding_bliss_after_slider' ); ?>

<div class="container">
  <div class="col-md-5 col-sm-5">
    <?php /** second section **/ ?>
    <section id="love-Story">
      <?php
      $args = array( 'name' => get_theme_mod('bb_wedding_bliss_love_post_setting',''));
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="box-image text-center">
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>                  
            </div>
          </div>
          <div class="col-md-6 col-sm-6 lscontent">
            <h3><?php the_title(); ?></h3>
            <img src="<?php echo esc_url( get_theme_mod('',get_template_directory_uri().'/images/border-image.png') ); ?>" alt="">
            <p><?php the_excerpt(); ?></p>              
            <div class="clearfix"></div>
          </div>
        </div>
        <?php endwhile; 
        wp_reset_postdata();?>
        <?php else : ?>
           <div class="no-postfound"></div>
         <?php
      endif; ?>
      <div class="clearfix"></div>
    </section>
  </div>
  <div class="col-md-7 col-sm-7">
    <?php /** post section **/ ?>
    <section id="moreevent" class="darkbox" >
      <?php if( get_theme_mod('bb_wedding_bliss_main_title') != ''){ ?>
          <div class="heading-line">
            <h3><?php echo esc_html(get_theme_mod('bb_wedding_bliss_main_title','')); ?> </h3>
            <img src="<?php echo esc_url( get_theme_mod('',get_template_directory_uri().'/images/border-image.png') ); ?>" alt="">
            <p><?php echo esc_html(get_theme_mod('bb_wedding_bliss_short_line','')); ?> </p>
          </div>
        <?php } ?>
        <?php 
            $page_query = new WP_Query(array( 'category_name' => get_theme_mod('bb_wedding_bliss_event_setting','theblog')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-md-4 col-sm-4">
                <div class="imagebox">
                  <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                </div>
                <div class="contentbox">
                  <h4><?php the_title(); ?></h4>
                </div>
              </div>
              <?php endwhile; 
              wp_reset_postdata();?>      
        <div class="clearfix"></div>
    </section>
  </div>
</div>

<?php do_action( 'bb_wedding_bliss_after_section1' ); ?>

<?php get_footer(); ?>