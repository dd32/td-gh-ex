<?php 
/*
 * Template Name: Full Page
*/
get_header(); ?>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 ">
       <p class="redpro-post-title"><?php _e('Blog ','redpro'); echo " : "; ?>
          <span class="redpro-post-subtitle">
          <?php redpro_title(); ?>
          </span></p>
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
      <div class="col-md-12 main full-page">
        <?php while ( have_posts() ) : the_post(); ?>
        <article class="post">
          <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			if($feat_image!="") { ?>
          <figure class="feature-thumbnail-large"> <a href="<?php echo $feat_image; ?>"> <img src="<?php echo $feat_image; ?>" class="img-responsive" alt="<?php echo get_the_title(); ?>" /> </a> </figure>
          <?php } ?>
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