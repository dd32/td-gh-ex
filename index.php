<?php
/**
 * The template for displaying home page.
 * @package Automobile Car Dealer
 */

get_header(); 
?>
<?php /** post section **/ ?>
<div class="container">
  <?php
    $layout_option = get_theme_mod( 'automobile_car_dealer_layout_options','Right Sidebar');
    if($layout_option == 'One Column'){ ?>
    <section id="blog_sec" class="blog-section col-md-12 col-sm-12">
      <?php if ( have_posts() ) :
        /* Start the Loop */          
          while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content' );           
          endwhile;
          else :
            get_template_part( 'no-results' ); 
          endif; 
      ?>
      <div class="navigation">
        <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'automobile-car-dealer' ),
                'next_text'          => __( 'Next page', 'automobile-car-dealer' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'automobile-car-dealer' ) . ' </span>',
            ) );
        ?>
          <div class="clearfix"></div>
      </div>
    </section>
  <?php }else if($layout_option == 'Three Columns'){ ?>
    <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
    <section id="blog_sec" class="blog-section col-md-6 col-sm-6">
      <?php if ( have_posts() ) :
        /* Start the Loop */          
          while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content' );           
          endwhile;
          else :
            get_template_part( 'no-results' ); 
          endif; 
      ?>
      <div class="navigation">
        <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'automobile-car-dealer' ),
                'next_text'          => __( 'Next page', 'automobile-car-dealer' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'automobile-car-dealer' ) . ' </span>',
            ) );
        ?>
          <div class="clearfix"></div>
      </div>
    </section>
    <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
  <?php }else if($layout_option == 'Four Columns'){ ?>
    <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
    <section id="blog_sec" class="blog-section col-md-3 col-sm-3">
      <?php if ( have_posts() ) :
        /* Start the Loop */          
          while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content' );           
          endwhile;
          else :
            get_template_part( 'no-results' ); 
          endif; 
      ?>
      <div class="navigation">
        <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'automobile-car-dealer' ),
                'next_text'          => __( 'Next page', 'automobile-car-dealer' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'automobile-car-dealer' ) . ' </span>',
            ) );
        ?>
          <div class="clearfix"></div>
      </div>
    </section>
    <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
    <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
  <?php }else if($layout_option == 'Grid Layout'){ ?>
    <section id="blog_sec" class="blog-section col-md-12 col-sm-12">
      <?php if ( have_posts() ) :
        /* Start the Loop */          
          while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/grid-layout' );           
          endwhile;
          else :
            get_template_part( 'no-results' ); 
          endif; 
      ?>
      <div class="navigation">
        <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'automobile-car-dealer' ),
                'next_text'          => __( 'Next page', 'automobile-car-dealer' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'automobile-car-dealer' ) . ' </span>',
            ) );
        ?>
          <div class="clearfix"></div>
      </div>
    </section>
  <?php }else if($layout_option == 'Right Sidebar'){ ?>
    <section id="blog_sec" class="blog-section col-md-8 col-sm-8">
      <?php if ( have_posts() ) :
        /* Start the Loop */          
          while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content' );           
          endwhile;
          else :
            get_template_part( 'no-results' ); 
          endif; 
      ?>
      <div class="navigation">
        <?php
            // Previous/next page navigation.
            the_posts_pagination( array(
                'prev_text'          => __( 'Previous page', 'automobile-car-dealer' ),
                'next_text'          => __( 'Next page', 'automobile-car-dealer' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'automobile-car-dealer' ) . ' </span>',
            ) );
        ?>
          <div class="clearfix"></div>
      </div>
    </section>
    <div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
    <?php }else if($layout_option == 'Left Sidebar'){ ?>
    <div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
      <section id="blog_sec" class="blog-section col-md-8 col-sm-8">
        <?php if ( have_posts() ) :
          /* Start the Loop */          
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content' );           
            endwhile;
            else :
              get_template_part( 'no-results' ); 
            endif; 
        ?>
        <div class="navigation">
          <?php
              // Previous/next page navigation.
              the_posts_pagination( array(
                  'prev_text'          => __( 'Previous page', 'automobile-car-dealer' ),
                  'next_text'          => __( 'Next page', 'automobile-car-dealer' ),
                  'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'automobile-car-dealer' ) . ' </span>',
              ) );
          ?>
            <div class="clearfix"></div>
        </div>
      </section>
  <?php }?>
</div>
<div class="clearfix"></div>
<?php get_footer(); ?>