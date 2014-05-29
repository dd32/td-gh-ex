<?php 
/*
Template Name: Blog page
*/
get_header(); 
?>

<!-- Header END -->
<?php while ( have_posts() ) : the_post(); ?>
<section class="section-main back-img-aboutus">
  <div class="container">
    <div class="col-md-12 img-banner-aboutus">
    	 <p class="font-34 color-fff conter-text"><?php echo get_the_title(); ?></p>
         <?php if (function_exists('booster_custom_breadcrumbs')) booster_custom_breadcrumbs(); ?>
    </div>
  </div>
</section>

<?php endwhile; // end of the loop. ?>    
<div class="container blog-background no-padding">
	<div class="col-md-8 booster-post clearfix no-padding-left">
    <?php     $booster_args = array(
				'paged'			   => $paged,
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'post_type'        => 'post',
				'post_status'      => 'publish'
        );
    $booster_blog = new WP_Query( $booster_args );
    while ( $booster_blog->have_posts() ) {
   			 $booster_blog->the_post();
	?>
	<?php $booster_feature_img = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
    	<article class="post clearfix">
            <div class="blog">
               <h1 class="blog-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>
                 <div class="post-date-blog">
                   <?php booster_entry_meta(); ?>
                 </div>
				 <div class="blog-line"></div>
                 <?php if($booster_feature_img != '') { ?>
                	<img src="<?php echo $booster_feature_img; ?>" class="img-responsive blog-page-image" />
                 <?php } ?>
                    
                 <div class="post-content"><?php echo get_the_excerpt(); ?></div>
                
            </div>
        </article>  
         <?php } ?>   
  <div class="booster-pagination-color">
  	<?php 
		 booster_pagination($booster_blog->max_num_pages);
	?>
    </div>
          
    </div> 
 
     <!-- S I D E B A R --> 
      <div class="col-md-4 blog-col-2 main-sidebar">
		   <?php 
            get_sidebar();
           ?> 
  	 </div>	
</div>
<?php get_footer(); ?>