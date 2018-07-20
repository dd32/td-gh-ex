<?php 
/*
** Template Name : Right Sidebar
*/
get_header(); ?>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 ">
        <p class="redpro-post-title">
          <?php redpro_title() ?>
        </p>
      </div>
      <div class="col-md-6  col-sm-6 ">
        <ol class="breadcrumb  pull-right">
          <?php redpro_breadcrumbs(); ?>
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
      <div class="col-md-8 main">
        <?php while ( have_posts() ) : the_post(); ?>
        <article class="post">
          <?php if(has_post_thumbnail()) { ?>
          <figure class="feature-thumbnail-large">             
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large');?></a>            
           </figure> 
           <?php } ?>
          <div class="post-content">
            <?php the_content(); ?>
          </div>
          <!--end / post-content--> 
        </article>
        <?php endwhile; // end of the loop. ?>
        <?php comments_template( '', true ); ?>
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
