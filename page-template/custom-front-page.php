<?php
/**
 * Template Name: Custom home
 */

get_header(); ?>

<main role="main" id="maincontent">
  <?php do_action( 'advance_business_above_slider' ); ?>

  <?php if( get_theme_mod( 'advance_business_slider_hide', false) != '' || get_theme_mod( 'advance_business_responsive_slider', false) != '') { ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $advance_business_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'advance_business_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $advance_business_slider_pages[] = $mod;
            }
          }
          if( !empty($advance_business_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $advance_business_slider_pages,
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
                  <h1><?php esc_html(the_title()); ?></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_business_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_business_slider_excerpt_length','20')))); ?></p>
                  <div class="know-btn">
                    <a href="<?php esc_url(the_permalink()); ?>"> <?php echo esc_html_e('READ MORE','advance-business'); ?><i class="fas fa-long-arrow-alt-right"></i><span class="screen-reader-text"><?php esc_html_e( 'READ MORE', 'advance-business' ); ?></span></a>
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
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','advance-business' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','advance-business' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'advance_business_below_slider' ); ?>

  <?php if( get_theme_mod( 'advance_business_location') != '') { ?>
    <section id="business-contact">
      <div class="container">
        <div class="contact-box">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <?php if( get_theme_mod( 'advance_business_location','' ) != '') { ?>
              <div class="contact">
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <i class="fas fa-map"></i>
                  </div>
                  <div class="col-lg-9 col-md-9">
                    <p class="heading-line"><?php echo esc_html(get_theme_mod('advance_business_location_title','')); ?> </p>
                    <p><?php echo esc_html( get_theme_mod('advance_business_location','')); ?></p>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="col-lg-4 col-md-4">
              <?php if( get_theme_mod( 'advance_business_email','' ) != '') { ?>
              <div class="contact">
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  </div>
                  <div class="col-lg-9 col-md-9">
                    <p class="heading-line"><?php echo esc_html(get_theme_mod('advance_business_email_title','')); ?> </p>
                    <p><?php echo esc_html( get_theme_mod('advance_business_email','') ); ?></p>                    
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="col-lg-4 col-md-4">
             <?php if( get_theme_mod( 'advance_business_contact','' ) != '') { ?>
              <div class="contact">
                <div class="row">
                  <div class="col-lg-3 col-md-3">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                  </div>
                  <div class="col-lg-9 col-md-9">
                    <p class="heading-line"><?php echo esc_html(get_theme_mod('advance_business_contact_title','')); ?> </p>
                    <p><?php echo esc_html( get_theme_mod('advance_business_contact','')); ?></p>                    
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php do_action( 'advance_business_below_business_contact' ); ?>

  <?php if( get_theme_mod( 'advance_business_projects_title') != '' || get_theme_mod( 'advance_business_projects_category_category') != '') { ?>
    <section id="latest-projects">
      <div class="container">
        <?php if( get_theme_mod('advance_business_projects_title') != ''){ ?>
          <div class="project_title">
            <h2><?php echo esc_html(get_theme_mod('advance_business_projects_title','')); ?> </h2>
            <hr class="project-hr">
          </div>
        <?php } ?>
        <div class="row">
          <?php 
          $advance_business_catData =  get_theme_mod('advance_business_projects_category_category');
          if($advance_business_catData){
          $page_query = new WP_Query(array( 'category_name' => esc_html($advance_business_catData,'advance-business')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-6 col-md-12">
              <div class="project-box">
                <div class="row m-0">
                  <div class="col-lg-6 col-md-6 p-0">
                    <div><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
                  </div>
                  <div class="col-lg-6 col-md-6 p-0">
                    <div class="project_content">
                      <a href="<?php esc_url(the_permalink()); ?>"><h3><?php esc_html(the_title()); ?></h3><span class="screen-reader-text"><?php esc_html(the_title()); ?></span></a>
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_business_string_limit_words( $excerpt,12 ) ); ?></p>
                      <div class="know-btn">
                        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Know More', 'advance-business' ); ?>"><?php esc_html_e('Know More','advance-business'); ?><i class="fas fa-angle-double-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
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

  <?php do_action( 'advance_business_below_latest_projects' ); ?>

  <div id="content">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>