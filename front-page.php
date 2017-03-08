<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package BB Mobile Application
 */

get_header(); ?>

  <?php /** slider section **/ ?>
  <div class="slider-main">
    <?php
      // Get pages set in the customizer (if any)
      $pages = array();
      for ( $count = 1; $count <= 5; $count++ ) {
        $mod = intval( get_theme_mod( 'bb_mobile_application_slidersettings-page-' . $count ) );
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
              $bb_mobile_application_n = 0;
            while ( $query->have_posts() ) : $query->the_post();
                
                $bb_mobile_application_n++;
                $bb_mobile_application_slideno[] = $bb_mobile_application_n;
                $bb_mobile_application_slidetitle[] = get_the_title();
                $bb_mobile_application_slidelink[] = esc_url( get_permalink() );
                ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $bb_mobile_application_n ); ?>" />
                <?php
              $count++;
            endwhile;
            ?>
          </div>

          <?php
          $bb_mobile_application_k = 0;
            foreach( $bb_mobile_application_slideno as $bb_mobile_application_sln ){ ?>
              <div id="slidecaption<?php echo esc_attr( $bb_mobile_application_sln ); ?>" class="nivo-html-caption">
                <div class="slide-cap  ">
                  <div class="container">
                    <h2><?php echo esc_html( $bb_mobile_application_slidetitle[$bb_mobile_application_k] ); ?></h2>
                    <a class="read-more" href="<?php echo esc_url( $bb_mobile_application_slidelink[$bb_mobile_application_k] ); ?>"><?php _e( 'Learn More','bb-mobile-application' ); ?></a>
                  </div>
                </div>
              </div>
              <?php $bb_mobile_application_k++;
          }
          wp_reset_postdata();
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

  <?php /** post section **/ ?>
  <section id="our-services">
    <div class="innerlightbox">
		  <div class="container">
        <div id="post-<?php the_ID(); ?>" <?php post_class('col-md-8 col-sm-8 col-xs-12'); ?>>          
          <?php if ( have_posts() ) :
          /* Start the Loop */
          while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content' ); 
          endwhile;
          else :
            get_template_part( 'no-results', 'archive' ); 
          endif; 
        ?>
    	  <div class="navigation">
          <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'bb-mobile-application' ),
                'next_text'          => __( 'Next page', 'bb-mobile-application' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-mobile-application' ) . ' </span>',
            ) );
          ?>
         </div> 
    	  </div>
    	  <div class="col-md-3 col-md-offset-1">
    			<?php get_sidebar();?>
    	  </div>
  		  <div class="clearfix"></div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>