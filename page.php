<?php get_header(); ?>
  <section class="ejemplo-section">
    <div class="padre-col clearfix">            
      <div class="col-70">
        <?php if (have_posts()) : 
          while (have_posts()) : 
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <h1> <?php the_title(); ?> </h1>
              <div class="pagination">
                <?php
                  the_content();
                  wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'baena' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                  ) );
                ?>
                <!--TO HAVE COMMENTS-->
                <div>
                  <?php comments_template(); ?>
                </div>   
                <!--END TO HAVE COMMENTS-->
              </div><!--.pagination-->
            </article>        
        <?php endwhile; endif; ?>
      </div><!--.col-70-->
      
      <div class="col-30">
        <?php get_sidebar(); ?>
      </div><!--col-30-->

    </div><!--.padre-col clearfix-->    
  </section>

  <?php get_footer(); ?>