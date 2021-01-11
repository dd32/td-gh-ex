<?php
/**
 * Template Name: Custom home
 */
get_header(); ?>

<main role="main" id="maincontent">
  <?php do_action( 'advance_it_company_above_slider' ); ?>
  
  <?php if( get_theme_mod( 'advance_it_company_slider_hide', false) != '' || get_theme_mod( 'advance_it_company_responsive_slider', false) != '') { ?>
    <section id="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('advance_it_company_slider_speed_option', 3000)); ?>">
        <?php $advance_it_company_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'advance_it_company_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $advance_it_company_slider_pages[] = $mod;
            }
          }
          if( !empty($advance_it_company_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $advance_it_company_slider_pages,
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
                  <h1><?php the_title(); ?></h1>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_it_company_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_it_company_slider_excerpt_length','20')))); ?></p>
                  <?php if( get_theme_mod('advance_it_company_slider_button','READ MORE') != ''){ ?>
                    <div class="readbtn">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('advance_it_company_slider_button','READ MORE'));?><i class="fas fa-angle-right"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_it_company_slider_button','READ MORE'));?></span></a>
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
        <div class="slider-nex-pre">
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Previous','advance-it-company' );?></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators"  role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
            <span class="screen-reader-text"><?php esc_html_e( 'Next','advance-it-company' );?></span>
          </a>
        </div>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'advance_it_company_below_slider' ); ?>

  <?php do_action( 'advance_it_company_above_work_section' ); ?>

  <?php if( get_theme_mod('advance_it_company_title') != '' || get_theme_mod( 'advance_it_company_setting' )!= '' || get_theme_mod( 'advance_it_company_works_category' )!= ''){ ?>
    <section id="work_cat">
      <div class="container">
        <?php if( get_theme_mod('advance_it_company_title') != ''){ ?>
          <h5><?php echo esc_html(get_theme_mod('advance_it_company_title','')); ?></h5>
        <?php } ?>
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <?php
              $advance_it_company_postData1=  get_theme_mod('advance_it_company_setting');
              if($advance_it_company_postData1){
                $args = array( 'name' => esc_html($advance_it_company_postData1 ,'advance-it-company'));
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="post-sec">
                      <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2><span class="screen-reader-text"><?php the_title(); ?></span></a>
                      <p><?php $excerpt = get_the_excerpt(); echo esc_html( advance_it_company_string_limit_words( $excerpt,10 ) ); ?></p>
                      <?php the_post_thumbnail(); ?>
                    </div>
                  <?php endwhile; 
                  wp_reset_postdata();?>
                <?php else : ?>
                  <div class="no-postfound"></div>
                <?php
              endif; }?>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="row">
              <?php 
               $advance_it_company_catData =  get_theme_mod('advance_it_company_works_category');
               if($advance_it_company_catData){
                $page_query = new WP_Query(array( 'category_name' => esc_html($advance_it_company_catData,'advance-it-company')));?>
                  <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                    <div class=" col-lg-6 col-md-4">
                      <div class="cat-posts ">
                        <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                        <div class="cat_body">
                          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                          <p>
                            <?php $excerpt = get_the_excerpt(); echo esc_html( advance_it_company_string_limit_words( $excerpt,10 ) ); ?>
                          </p> 
                        </div>
                      </div>
                    </div> 
                  <?php endwhile;
                  wp_reset_postdata();
                  }
                ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'advance_it_company_below_work_section' ); ?>

  <div id="content">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>