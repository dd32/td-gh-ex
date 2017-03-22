<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Ecommerce Store
 */

get_header(); 
?>
<?php /** post section **/ ?>

<div class="container">
  <section id="our-services" class="services flipInX col-md-8">
                
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
                'prev_text'          => __( 'Previous page', 'bb-ecommerce-store' ),
                'next_text'          => __( 'Next page', 'bb-ecommerce-store' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bb-ecommerce-store' ) . ' </span>',
            ) );
        ?>
          <div class="clearfix"></div>
      </div>
  </section>
  <div class="col-md-3 col-md-offset-1"><?php get_sidebar(); ?></div>
  </div>
<div class="clearfix"></div>
</div>
<?php get_footer(); ?>