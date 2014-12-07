<?php
/**
 * The template for displaying Search Results pages.
 *
 */
get_header(); ?>
<div class="mainblogwrapper">
    <div class="container">
        <div class="row">
        
            <div class="mainblogcontent">
            <div class="col-md-12  col-sm-12 ">
        <ol class="breadcrumb ">
          <?php ariwoo_breadcrumbs(); ?>
        </ol>
      </div>
             <div class="col-md-9">
            
            
          <h1><?php printf( __( 'Search Results for: %s', 'ariwoo' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        
        <?php if (have_posts() ) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="article-page">
          <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                    <?php 
			   the_post_thumbnail();
			  ?>
                <?php }   ?>
                  
           
          <div class="post-meta">
            <div class="post-date"> <span class="day"><?php echo get_the_time('d'); ?></span> <span class="month"><?php echo get_the_time('M'); ?></span> </div>
            
            <!--end / post-date-->
            
            <div class="post-meta-author">
              <div class="post-author-name">
                <h5><a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                  </a></h5>
              </div>
              <?php ariwoo_entry_meta(); ?>
              <div class="clear-fix"></div>
			  <?php the_tags(); ?>
            </div>
            
            <!--end / post-meta--> 
            
          </div>
          <div class="post-content">
            <?php the_excerpt(); ?>
          </div>
           </div>
          <!--end / post-content--> 
          
       <div class="clearfix"></div>
                    <!-- *** Post1 Starts Ends *** -->
                    <!-- *** Post loop ends*** -->
                    <div class="clearfix"></div>
        <?php endwhile; 
	  else:
			echo'<h2>No Results Found</h2>';
	  ?>
        <?php endif; ?>
        
        <!--end / article--> 
         <nav class="ariniom-nav">
                <span class="ariniom-nav-previous"><?php previous_posts_link(); ?></span>
                <span class="ariniom-nav-next"><?php next_posts_link(); ?></span>
			</nav>
      </div>
      
      <!--end / main-->
      
     <div class="col-md-3">
        <?php get_sidebar(); ?>
     </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
