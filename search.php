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
          <h1><?php printf( __( 'Search Results for: %s', 'RedPro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header>
        <?php if (have_posts() ) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <article class="post">
          <h2 class="post-title"><a href="#"></a> </h2>
          <figure class="feature-thumbnail-large">
            <?php 

        $id = get_the_ID();

        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($id)); 

		if($feat_image!='')

		{

		?>
            <a href="<?php echo $feat_image ?>"> <img src="<?php echo $feat_image ?>" class="img-responsive" alt="<?php echo get_the_title();?>" /> </a>
            <?php } ?>
          </figure>
          <div class="post-meta">
            <div class="post-date"> <span class="day"><?php echo get_the_time('d'); ?></span> <span class="month"><?php echo get_the_time('M'); ?></span> </div>
            
            <!--end / post-date-->
            
            <div class="post-meta-author">
              <div class="post-author-name">
                <h5><a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                  </a></h5>
              </div>
              <div class="post-category"> POST IN:
                <?php  

					$the_cat = get_the_category();  

					$count=0;  

					if ($the_cat) {  

						foreach($the_cat as $cat) {  

							$count++;  

							echo '<a href="'.get_category_link($cat->cat_ID).'">'.$cat->cat_name.'</a>';  

							if( $count == 1 ) break;  

						}  

					}  

			    ?>
                <?php echo get_category_link($category[0]->term_id ); ?>"><?php echo $category[0]->cat_name; ?></div>
              <div class="post-author"> BY:
                <?php the_author_posts_link(); ?>
              </div>
              <div class="post-comment"> COMMENT: <a href="#"><?php echo get_comments_number(); ?></a> </div>
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

			echo'<h2>No Results Found</h2>';

	  ?>
        <?php endif; ?>
        
        <!--end / article--> 
        
      </div>
      
      <!--end / main-->
      
      <div class="col-md-3 col-md-offset-1 sidebar">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  
  <!-- /container --> 
  
</div>
<?php get_footer(); ?>
