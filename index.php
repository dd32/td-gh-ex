<?php get_header(); ?>

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 ">
        <h1>Blog : <small>
          <?php RedPro_title() ?>
          </small></h1>
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
      <div class="col-md-8 main">
        <?php while ( have_posts() ) : the_post(); ?>
        <article class="post">
          <h2 class="post-title"><a href="#"></a> </h2>
          <div class="post-meta">
            <div class="post-date"> <span class="day"><?php echo get_the_time('d'); ?></span> <span class="month"><?php echo get_the_time('M'); ?></span> </div>
            <!--end / post-date-->
            <div class="post-meta-author">
              <div class="post-author-name">
                <h5><a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                  </a></h5>
              </div>
              <div class="post-category"> </div>
              <div class="post-author"> BY:
                <?php the_author_posts_link(); ?>
              </div>
            </div>
            <!--end / post-meta--> 
            
          </div>
          <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				if($feat_image!="") { ?>
          <figure class="feature-thumbnail-large"> <a href="<?php echo $feat_image;?>"> <img src="<?php echo $feat_image;?>" class="img-responsive" alt="<?php echo get_the_title();?>" /> </a> </figure>
          <?php } ?>
          <div class="post-content">
            <?php the_content(); ?>
          </div>
          <!--end / post-content--> 
        </article>
      </div>
      <!--end / main-->
      <?php endwhile; // end of the loop. ?>
      <div class="col-md-3 col-md-offset-1 sidebar">
      	<?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  
  <!-- /container --> 
</div>
<?php get_footer(); ?>
