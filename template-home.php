<?php
/*
Template Name: Home
*/

get_header(); ?>

    <!-- Slider -->
<div class="hero_slider">

  <?php if ( is_active_sidebar( 'home_slider' ) ) { dynamic_sidebar( 'home_slider' ); } ?>

</div> <!-- end .hero_slider -->

<div class="main_content_wrap">

  <?php if ( is_active_sidebar( 'home_widgets_top' ) ) { 
    $home_top_widgets_animation = get_theme_mod( 'home_top_widgets_animation' );
  ?>

  <div class="row home_top_bg <?php if ( $home_top_widgets_animation != 'none' ) { echo 'wow '; echo esc_html( $home_top_widgets_animation ); };  ?>">

    <div class="home_top_wrap clearfix">

      <?php dynamic_sidebar( 'home_widgets_top' ); ?>

    </div><!-- .home_top_wrap -->

  </div><!-- .home_top_bg .row -->

  <?php } // end home_widgets_top sidebar check ?>

  <div class="row home_widgets_section">

    <div class="clearfix">

    <div class="large-12 columns">

        <div class="row">

    		  <!-- Home Widget Left -->
        	<div class="large-7 columns home_text_widget_left">

            <?php if ( is_active_sidebar( 'home_left' ) ) { dynamic_sidebar( 'home_left' ); } ?>

       	  </div><!-- .home_text_widget_left -->

    	   	<!-- Home Widget Right -->
        	<div class="large-4 large-offset-1 columns home_text_widget_right">

            <?php if ( is_active_sidebar( 'home_right' ) ) { dynamic_sidebar( 'home_right' ); } ?>

        	</div><!-- .home_text_widget_right -->

        </div><!-- .row -->

    </div><!-- .large-12 -->

    </div><!-- .clearfix -->

  </div><!-- .row .home_widgets_section -->


  <!-- Upcoming Events -->
  <?php if ( is_active_sidebar( 'home_events' ) ) { 
    $home_events_animation = get_theme_mod( 'home_events_animation' );
  ?>

  <div class="row home_events_wrap clearfix <?php if ( $home_events_animation != 'none' ) { echo 'wow '; echo esc_html( $home_events_animation ); };  ?>">

    <div class="large-12 columns">

      <div class="row">

        <?php dynamic_sidebar( 'home_events' ); ?>

      </div><!-- .row -->

    </div><!-- .large-12 -->

  </div><!-- .row .home_events_wrap -->

  <?php } // end home_events sidebar check ?>


  <!-- News Area -->
  <?php if ( get_theme_mod('home_news_show') ) { 
    $home_news_animation = get_theme_mod( 'home_news_animation' );
  ?>

  <div class="home_latest_news clearfix <?php if ( $home_news_animation != 'none' ) { echo 'wow '; echo esc_html( $home_news_animation ); };  ?>">

    <div class="row">

      <div class="large-12 columns">

        <h3>
            <?php printf( __( '%s', 'advocator-lite' ), esc_attr( get_theme_mod('home_news_title', customizer_library_get_default( 'home_news_title' ) ) ) ); ?>
        </h3>

      </div><!-- .large-12 -->

    </div><!-- .row -->

      <?php 
        $home_blog_num = get_theme_mod('home_blog_num') ;
        $home_blog_category = get_theme_mod( 'home_blog_category' );

        $formats = new WP_Query( array( // Display most recent standard posts
      		'posts_per_page' => esc_attr( $home_blog_num ),
          'category_name' => esc_attr( $home_blog_category ),
      		'tax_query' => array(
      		  	array(
      		  	'taxonomy' => 'post_format',
      			  'field'    => 'slug',
      		  	'terms'    => array( 
                            'post-format-link', 
                            'post-format-aside', 
                            'post-format-gallery', 
                            'post-format-status', 
                            'post-format-quote', 
                            'post-format-chat', 
                            'post-format-image' ),
      		    'operator' => 'NOT IN',
      		  ))
          )
        );

      	if( $formats->have_posts() ) : while( $formats->have_posts() ) : $formats->the_post(); ?>

      <div class="row home_post">

        <div class="large-3 columns">

          <hr>

      		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

        </div><!-- .large-3 -->

        <div class="large-9 columns">

    		  <?php the_excerpt(); ?>

        </div><!-- .large-9 -->

      </div><!-- .row -->

  <?php endwhile; endif; wp_reset_postdata(); // end most recent standard post ?>

  </div><!-- .home_latest_news -->

    <div class="row home-latest-news-button">
    
    <?php if ( get_theme_mod('home_news_link') ) { ?>

      <div class="small-12 columns">
        <a href="<?php echo esc_url( get_theme_mod('home_news_link') ); ?>" class="button tiny radius right">
          <?php printf( __( '%s', 'advocator-lite' ), esc_attr( get_theme_mod( 'home_news_button_text', customizer_library_get_default( 'home_news_button_text' ) ) ) ); ?>
        </a>
      </div><!-- .small-12 -->

    <?php } // end blog button link check ?>

    </div><!-- .row -->

  <?php } // end check for latest news area show ?>

  <?php if ( get_theme_mod('home_gallery_show') ) { 
    $home_gallery_animation = get_theme_mod( 'home_gallery_animation' );
  ?>

  <div class="home_image_gallery clearfix <?php if ( $home_gallery_animation != 'none' ) { echo 'wow '; echo esc_html( $home_gallery_animation ); };  ?>">

    <div class="row ">

      <?php // Checking for Rescue Portfolio Plugin
      include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

      if ( is_plugin_active( 'rescue-portfolio/index.php' ) or is_plugin_active( 'rescue-portfolio-master/index.php' ) ) : ?>

      <div class="small-12 columns">
        <h3>
          <?php printf( __( '%s', 'advocator-lite' ), esc_attr( get_theme_mod( 'home_gallery_title', customizer_library_get_default( 'home_gallery_title' ) ) ) ); ?>
        </h3>
      </div><!-- .small-12 -->

      <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-3">

          <?php
              $home_gallery_qty = esc_attr( get_theme_mod( 'home_gallery_qty' ) );
              // Query Our Database
              $wpbp = new WP_Query(
                array( 
                  'post_type'      => 'portfolio', 
                  'posts_per_page' => $home_gallery_qty 
                ) 
              ); 

              // Begin The Loop
              if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 

              // Get The Taxonomy 'Filter' Categories
              $terms = get_the_terms( get_the_ID(), 'filter' ); 

              // Get the image URL
              $thumb = get_post_thumbnail_id();
              $img_url = wp_get_attachment_url( $thumb ); //get img URL
          ?>
                <li>
                  
                    <?php 
                      // Check if wordpress supports featured images, and if so output the thumbnail
                      if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 
                    ?>
                      
                      <?php // Output the featured image ?>
                      <a href="<?php echo esc_url( $img_url); ?>" class="fancybox image_hover" rel="gallery_group" title="<?php echo get_the_title(); ?>"><?php the_post_thumbnail('portfolio', array('class'=>'rescue_port_image')); ?></a>                 
                                        
                    <?php endif; ?> 
                    
                </li>
            
            <?php //$count++; // Increase the count by 1 ?>   
            <?php endwhile; endif; // END the Wordpress Loop ?>
            <?php wp_reset_query(); // Reset the Query Loop?>

      </ul><!-- .small-block-grid-2 medium-block-grid-3 large-block-grid-3 -->

    </div><!-- .row .home_image_gallery -->

    <div class="row home-gallery-button-section">

      <div class="medium-12 columns home_gallery_button">
        <a href="<?php echo esc_attr( get_theme_mod( 'home_gallery_link') ); ?>" class="button tiny radius right">
          <?php printf( __( '%s', 'advocator-lite' ), esc_attr( get_theme_mod( 'home_gallery_button_text', customizer_library_get_default( 'home_gallery_button_text' ) ) ) ); ?>
        </a>
      </div><!-- .medium-12 .home_gallery_button -->
      
    </div><!-- .row -->

  </div><!-- .clearfix .home_image_gallery -->

    <?php endif; // end our plugin check ?>

    <?php } // end gallery section ?>

</div><!-- .main_content_wrap -->

<?php get_footer(); ?>