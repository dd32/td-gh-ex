<?php
/**
 * The template for displaying Search Results pages.
 *
 */
get_header(); ?>
<div class="main-container">
  <div class="container"> 
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-8 main">
        <header class="page-header">
          <h1>
			 <?php esc_html_e( 'Search Results for', 'redpro' ); echo ' : '. get_search_query(); ?>
			  </h1>
        </header>
        <?php if (have_posts() ) :
            while (have_posts()) : the_post(); ?>
        <article class="post">
          <h2 class="post-title"><a href="#"></a> </h2>
          <?php if(has_post_thumbnail()) { ?>
          <figure class="feature-thumbnail-large">             
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large');?></a>            
           </figure> 
           <?php } ?>
          <div class="post-meta">
            <div class="post-date"> <span class="day"><?php echo esc_html(get_the_time('d')); ?></span> <span class="month"><?php echo esc_html(get_the_time('M')); ?></span> </div>
            
            <!--end / post-date-->
            
            <div class="post-meta-author">
              <div class="post-author-name">
                <h5><a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                  </a></h5>
              </div>
              <?php redpro_entry_meta(); ?>
              <div class="clear-fix"></div>			        
            </div>
            <!--end / post-meta-->
          </div>
          <div class="post-content">
            <?php the_excerpt(); ?>
          </div>
          <!--end / post-content--> 
        </article>
        <?php endwhile; 
	      else:
			  echo'<h2>'.esc_html__('No Results Found','redpro').'</h2>'; ?>
        <?php endif; ?>
        <!--end / article--> 
        <!--Pagination Start-->
        <?php the_posts_pagination( array(
            'screen-reader-text'=>'',
            'Previous' => __( 'Back', 'redpro' ),
            'Next' => __( 'Onward', 'redpro' ),
          ) ); ?>
        <!--Pagination End-->
      </div>
      <!--end / main-->
      <div class="col-md-4 sidebar">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  <!-- /container --> 
</div>
<?php get_footer(); ?>