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
  <?php /** post section **/ ?>
  <section id="our-services">
    <div class="innerlightbox" style="background-color:;background-image:url('')">
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