<?php 
/*
 * Attachment Template File.
 */
get_header(); ?>

<!--section part start-->
<section class="section-main">
  <div class="col-md-12 a1-breadcrumb">
    <div class="container a1-container">
      <div class="col-md-6 col-sm-6 no-padding-lr left-part">
        <h3><?php echo get_the_title() ?></h3>
      </div>
    </div>
  </div>
  <div class="container a1-container">
    <div class="row">
      <div class="col-md-8 blog-article">
       <?php while ( have_posts() ) : the_post(); ?>  
         <div class="blog-post single-blog"> <?php the_title(); ?>
           <div class="blog-info"> 
          	<ul>
            	<?php a1_entry_meta();  ?>
          	</ul>
          </div>
          <div class="blog-inner"> 
             <?php $a1_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );  
              if(!empty($a1_image)) :?>
            <img src="<?php echo $a1_image[0]; ?>" class="img-responsive" alt="<?php echo get_the_title(); ?>">
             <?php endif; ?>
            <div class="blog-content">
             <?php the_content(); ?>
            </div>
          </div>
        </div>
         <?php endwhile; ?>
         <div class="col-md-12 a1-post-comment no-padding">
         <?php comments_template('', true); ?>
        </div>    
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</section>
<!--section part end-->
<?php get_footer(); ?>
