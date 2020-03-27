<?php get_header(); ?>

  <div class="slide-entrada">
    <?php get_template_part( 'parts/slideshow', get_post_format() ); ?>
  </div>

  <section class="ejemplo-section">
    <div class="padre-col clearfix">
      <div class="col-70">
        <?php if (have_posts()) : 
          while (have_posts()) : 
            the_post();
            ?>
            <div class="col-33">
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="">
                  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                  <ul>
                    <li><?php the_time( get_option('date_format') ); ?></li>
                    <li><?php the_category( ', ' ); ?></li>
                  </ul>
                  <div class="">
                    <?php the_post_thumbnail('medium') ?>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="readmore"><?php _e('Keep reading &rarr;', 'baena'); ?></a>
                  </div>
                </article>  <!-- article -->
              </div><!--col-33-->
            <?php endwhile; else : ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><?php _e('No content available', 'baena'); ?></h1>       
                <div class="">
                  <p><?php _e('There is no content corresponding to this page, please do a search to find what you are looking for', 'baena'); ?></p>
                  <?php get_search_form(); ?>
                </div>
              </article>  <!-- article -->       
            <?php endif; ?>  
      </div><!--.col-70-->
      <div class="col-30">
        <?php get_sidebar(); ?>
      </div><!--col-30-->
    </div><!--.padre-col clearfix-->
    <div class="padre-col clearfix">
      <div class="paginador">
        <?php get_template_part( 'pagination' ); ?>    
      </div><!--.paginador--> 
    </div><!--.padre-col clearfix-->
     
    <div class="padre-col clearfix">
      <div class="col-70">
                <?php
                    // La consulta con sus argumentos
                    $the_query = new WP_Query(array(
                      'cat' => 196,
                      'posts_per_page' => 8,
                      'orderby' => 'date', 
                      'order' => 'DESC'
                    ));

                    // El loop
                    if ( $the_query->have_posts() ) {
                      while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                          echo '<div class ="col-33">';
                          echo '<div class ="imagen">';
                          the_post_thumbnail();            
                          echo '<div class ="datos-comparte">';
                          echo '<h1>';              
                          the_title();
                          echo '</h1>';
                          echo '<p>';
                          the_excerpt();
                          echo '</p>';
                          echo '</div>';
                          echo '</div>';
                          echo '</div>';
                      }
                    }
                    // resetear la consulta
                    wp_reset_postdata();
              ?>
      </div><!--.col-70-->
      <div class="col-30">
        <?php get_sidebar(); ?>
      </div><!--col-30-->
    </div><!--.padre-col clearfix-->

  </section><!--#ejemplo-section-->   
  <?php get_footer(); ?>