<?php
/**
 * Template Name: Home Custom Page
 */

get_header(); ?>

<?php do_action( 'aagaz_startup_before_slider' ); ?>

<?php if( get_theme_mod('aagaz_startup_slider_arrows') != ''){ ?>

  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <?php $pages = array();
        for ( $count = 1; $count <= 3; $count++ ) {
          $mod = intval( get_theme_mod( 'aagaz_startup_slide_page' . $count ));
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
              <h2><?php the_title();?></h2>
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( aagaz_startup_string_limit_words( $excerpt,20 ) ); ?></p>
              <div class ="readbutton">
                <a href="<?php the_permalink(); ?>"> <?php echo esc_html(get_theme_mod('aagaz_startup_slide_page',__('READ MORE','aagaz-startup'))); ?></a>
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

<?php do_action( 'aagaz_startup_after_slider' ); ?>

<?php if( get_theme_mod('aagaz_startup_about_page') != ''){ ?>
  <section id="about">
    <div class="container">
      <?php $pages = array();
        $mod = absint( get_theme_mod( 'aagaz_startup_about_page'));
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="about-text">
              <?php if( get_theme_mod('aagaz_startup_title') != ''){ ?>     
                <h3><?php echo esc_html(get_theme_mod('aagaz_startup_title','')); ?></h3>
                <hr>
              <?php }?>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <h4><?php the_title(); ?></h4>
                  <p><?php the_excerpt();  ?></p>
                  <div class ="aboutbtn">
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','aagaz-startup'); ?></a>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="abt-image">
                    <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
      endif;
      wp_reset_postdata()?>
        <div class="clearfix"></div> 
    </div>
  </section>
<?php }?>

<?php do_action( 'aagaz_startup_after_about' ); ?>

<div class="container">
  <?php while ( have_posts() ) : the_post();?>
    <?php the_content(); ?>
  <?php endwhile; // End of the loop.
  wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>