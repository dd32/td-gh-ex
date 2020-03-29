<?php get_header(); ?>

  <div class="slide-entry">
    <?php get_template_part( 'parts/slideshow', get_post_format() ); ?>
  </div>

  <section class="esection">
    <div class="father-col clearfix">
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
                    <a href="<?php the_permalink(); ?>" class="readmore"><?php esc_html_e('Keep reading &rarr;', 'baena'); ?></a>
                  </div>
                </article>  <!-- article -->
              </div><!--col-33-->
            <?php endwhile; else : ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><?php esc_html_e('No content available', 'baena'); ?></h1>       
                <div class="">
                  <p><?php esc_html_e('There is no content corresponding to this page, please do a search to find what you are looking for', 'baena'); ?></p>
                  <?php get_search_form(); ?>
                </div>
              </article>  <!-- article -->       
            <?php endif; ?>  
      </div><!--.col-70-->
      <div class="col-30">
        <?php get_sidebar(); ?>
      </div><!--col-30-->
    </div><!--.father-col clearfix-->
    <div class="father-col clearfix">
      <div class="pager">
        <?php get_template_part( 'pagination' ); ?>    
      </div><!--.pager--> 
    </div><!--.father-col clearfix-->
  </section><!--esection-->   
  <?php get_footer(); ?>