<?php get_header(); ?>
  <section class="ejemplo-section">
    <div class="padre-col clearfix">
      <div class="col-70"> 
        <h1 class="page-title">
          <?php printf( esc_html__( 'Results found: %s', 'baena' ), '<span>' . get_search_query() . '</span>' ); ?>       
        </h1>  
          
        <?php if (have_posts()) : 
          while (have_posts()) : 
            the_post();
            ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2>
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                <?php the_time('Y-m-d'); ?>
                <?php the_author(); ?>
              </a>
            </h2>  
            <div class="">
              <a href="<?php the_permalink(); ?>">
                <i class="fa fa-plus icon-mas" aria-hidden="true"></i>
              </a>
            </div>                          
          </article>
          <?php endwhile; else : ?>
        </div><!--.col-70-->
      </div><!--.padre-col clearfix-->
      <div class="padre-col">  
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h1><?php _e('No content available', 'baena'); ?></h1>       
          <div class="">
            <p><?php _e('There is no content corresponding to this page, please do a search to find what you are looking for', 'baena'); ?></p>
            <?php get_search_form(); ?>
          </div>
        </article>  <!-- article -->
      <?php endif; ?>
      <div class="paginador">
        <?php get_template_part( 'pagination' ); ?>    
      </div><!--.paginador--> 
    </div><!--.padre-col-->       
  </section>
<?php get_footer(); ?>