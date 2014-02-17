<?php 

/*

 * Template Name: Left Sidebar

*/

get_header();

?>

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 ">
        <h1>
          <?php RedPro_title() ?>
        </h1>
      </div>
      <div class="col-md-6  col-sm-6 ">
        <ol class="breadcrumb  pull-right">
          <?php RedPro_breadcrumbs(); ?>
        </ol>
      </div>
    </div>
  </div>
</div>

<!--end / page-title-->

<div class="main-container">
  <div class="container"> 
    
    <!-- Example row of columns -->
    
    <div class="row">
      <div class="col-md-3 sidebar">
        <?php get_sidebar(); ?>
      </div>
      <div class="col-md-9 main ">
        <article class="post">
          <?php while ( have_posts() ) : the_post(); ?>
          <?php 

			$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

			if($feat_image!="")

			{

			?>
          <figure class="feature-thumbnail-large"> <a href="<?php echo $feat_image;?>"> <img src="<?php echo $feat_image;?>" class="img-responsive" alt="<?php echo get_the_title();?>" /> </a> </figure>
          <?php

		  }

		  ?>
          <div class="post-content">
            <?php the_content(); ?>
          </div>
          
          <!--end / post-content--> 
          
        </article>
        <?php endwhile; ?>
        
        <!--end / article-->
        
        <?php comments_template( '', true ); ?>
      </div>
      
      <!--end / main--> 
      
    </div>
  </div>
  
  <!-- /container --> 
  
</div>
<?php get_footer(); ?>
