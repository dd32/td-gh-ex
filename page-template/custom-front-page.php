<?php
/**
 * Template Name: Custom home
 */

get_header(); ?>

<main role="main" id="maincontent">
  <?php do_action( 'advance_business_above_slider' ); ?>

  <?php if( get_theme_mod( 'advance_business_slider_hide', false) != '' || get_theme_mod( 'advance_business_responsive_slider', false) != '') { ?>
    <section id="slider" class="mw-100 m-auto p-0">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('advance_business_slider_speed_option', 3000)); ?>"> 
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
                <div class="inner_carousel text-left">
                  <h1 class="m-0 text-left"><?php the_title(); ?></h1>
                  <p class="py-3 px-0"><?php $excerpt = get_the_excerpt(); echo esc_html( advance_business_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_business_slider_excerpt_length','20')))); ?></p>
                  <?php if( get_theme_mod('advance_business_slider_button','READ MORE') != ''){ ?>
                    <div class="know-btn mt-4">
                      <a href="<?php the_permalink(); ?>" class="p-3"><?php echo esc_html(get_theme_mod('advance_business_slider_button','READ MORE'));?><i class="fas fa-long-arrow-alt-right p-2"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_business_slider_button','READ MORE'));?></span></a>
                    </div>
                  <?php } ?>
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
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left rounded-circle"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','advance-business' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right rounded-circle"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','advance-business' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'advance_business_below_slider' ); ?>

  <?php if( get_theme_mod( 'advance_business_location') != '') { ?>
    <section id="business-contact" class="my-5 mx-0">
      <div class="container">
        <div class="contact-box p-4">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <?php if( get_theme_mod( 'advance_business_location','' ) != '' || get_theme_mod( 'advance_business_location_title','' ) != '') { ?>
                <div class="contact">
                  <div class="row">
                    <div class="col-lg-3 col-md-3">
                      <i class="fas fa-map"></i>
                    </div>
                    <div class="col-lg-9 col-md-9">
                      <p class="heading-line mt-3 mx-0 mb-0"><?php echo esc_html(get_theme_mod('advance_business_location_title','')); ?> </p>
                      <p><?php echo esc_html( get_theme_mod('advance_business_location','')); ?></p>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="col-lg-4 col-md-4">
              <?php if( get_theme_mod( 'advance_business_email','' ) != '' || get_theme_mod( 'advance_business_email_title','' ) != '') { ?>
                <div class="contact">
                  <div class="row">
                    <div class="col-lg-3 col-md-3">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="col-lg-9 col-md-9">
                      <p class="heading-line"><?php echo esc_html(get_theme_mod('advance_business_email_title','')); ?> </p>
                      <a href="mailto:<?php echo esc_url( get_theme_mod('advance_business_email','') ); ?>"><?php echo esc_html( get_theme_mod('advance_business_email','') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('advance_business_email','') ); ?></span></a>                    
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="col-lg-4 col-md-4">
             <?php if( get_theme_mod( 'advance_business_contact','' ) != '' || get_theme_mod( 'advance_business_contact_title','' ) != '') { ?>
                <div class="contact">
                  <div class="row">
                    <div class="col-lg-3 col-md-3">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="col-lg-9 col-md-9">
                      <p class="heading-line"><?php echo esc_html(get_theme_mod('advance_business_contact_title','')); ?> </p>
                      <a href="tel:<?php echo esc_url( get_theme_mod('advance_business_contact','' )); ?>"><?php echo esc_html( get_theme_mod('advance_business_contact','')); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('advance_business_contact','')); ?></span></a>                    
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
    <section id="latest-projects" class="my-5 mx-0">
      <div class="container">
        <?php if( get_theme_mod('advance_business_projects_title') != ''){ ?>
          <div class="project_title">
            <h2 class="mt-0 text-center"><?php echo esc_html(get_theme_mod('advance_business_projects_title','')); ?> </h2>
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
              <div class="project-box mb-3">
                <div class="row m-0">
                  <div class="col-lg-6 col-md-6 p-0">
                    <div><?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?></div>
                  </div>
                  <div class="col-lg-6 col-md-6 p-0">
                    <div class="project_content py-2 px-3">
                      <a href="<?php the_permalink(); ?>" class="text-uppercase"><h3><?php the_title(); ?></h3><span class="screen-reader-text"><?php the_title(); ?></span></a>
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_business_string_limit_words( $excerpt,12 ) ); ?></p>
                      <div class="know-btn">
                        <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small text-uppercase" title="<?php esc_attr_e( 'Know More', 'advance-business' ); ?>"><?php esc_html_e('Know More','advance-business'); ?><i class="fas fa-angle-double-right p-2"></i>
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