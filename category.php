<?php get_header(); ?>
  <section class="ejemplo-section">
    <div class="padre-col clearfix">
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
            </div>
            <div class="">
              <?php the_post_thumbnail('large') ?>
              <?php the_excerpt(); ?>              
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
        </article>
      <?php endif; ?>    
    </div><!--.padre-col clearfix-->
    
    <div class="padre-col clearfix">
      <div class="paginador">
        <?php get_template_part( 'pagination' ); ?>    
      </div><!--.paginador--> 
    </div><!--.padre-col clearfix--> 
  </section><!--.ejemplo-section-->    
<?php get_footer(); ?>