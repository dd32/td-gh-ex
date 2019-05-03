<?php
/**
 * Template Name: Custom home
 */

get_header(); ?>

<?php do_action( 'bb_wedding_bliss_below_slider' ); ?>

<?php if( get_theme_mod('bb_wedding_bliss_slider_arrows') != ''){ ?>
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <?php $pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'bb_wedding_bliss_slidersettings_page' . $count ));
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
              <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('full'); ?>"/></a>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <div class="logo">
                    <?php bb_wedding_bliss_the_custom_logo(); ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo esc_html( $description ); ?></p>
                    <?php endif; ?>
                  </div>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>                     
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

<?php do_action( 'bb_wedding_bliss_after_slider' ); ?>

<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-5">
        <?php if( get_theme_mod('bb_wedding_bliss_love_post_setting') != ''){ ?>
          <?php /** second section **/ ?>
          <div id="love-Story">
            <?php
            $args = array( 'name' => get_theme_mod('bb_wedding_bliss_love_post_setting',''));
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="box-image text-center">
                    <img src="<?php the_post_thumbnail_url('full'); ?>"/>                  
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 lscontent">
                  <h3><?php the_title(); ?></h3>
                  <img src="<?php echo esc_url( get_theme_mod('',get_template_directory_uri().'/images/border-image.png') ); ?>" alt="">
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( bb_wedding_bliss_string_limit_words( $excerpt,20 ) ); ?></p>     
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
          </div>
        <?php }?>
      </div>
      <div class="col-lg-7 col-md-7">
        <?php if( get_theme_mod('bb_wedding_bliss_main_title') != ''){ ?>
          <?php /** post section **/ ?>
          <div id="moreevent" class="darkbox" >
            <?php if( get_theme_mod('bb_wedding_bliss_main_title') != ''){ ?>
                <div class="heading-line">
                  <h3><?php echo esc_html(get_theme_mod('bb_wedding_bliss_main_title','')); ?> </h3>
                  <img src="<?php echo esc_url( get_theme_mod('',get_template_directory_uri().'/images/border-image.png') ); ?>" alt="">
                  <p><?php echo esc_html(get_theme_mod('bb_wedding_bliss_short_line','')); ?> </p>
                </div>
              <?php } ?>
              <div class="row">
              <?php
                $catData=  get_theme_mod('bb_wedding_bliss_event_setting');
                  if($catData){
                    $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'bb-wedding-bliss')));?>
                    <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                      <div class="col-lg-4 col-md-4">
                                <div class="imagebox">
                                  <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                                </div>
                                <div class="contentbox">
                                    <h4><?php the_title(); ?></h4>
                                </div>
                            </div>
                      <?php endwhile;
                    wp_reset_postdata();
                } ?>
              </div>     
              <div class="clearfix"></div>
          </div>
        <?php }?>
      </div>
    </div>
  </div>
</section>

<?php do_action( 'bb_wedding_bliss_after_section1' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>