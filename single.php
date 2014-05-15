<?php 
get_header(); 
?>

<section class="section-main back-img-aboutus">
  <div class="container">
    <div class="col-md-12 no-padding-left img-banner-aboutus">
    	 <p class="font-34 color-fff conter-text"> <?php the_title(); ?> </p>
         <p class="font-14 color-fff conter-text">  <?php if (function_exists('booster_custom_breadcrumbs')) booster_custom_breadcrumbs(); ?> </p>
    </div>
  </div>
</section>
 
<div  id="post-<?php the_ID(); ?>" <?php post_class("container blog-background"); ?>>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="col-md-8 no-padding-left booster-post">
	
 <?php $booster_feature_img = wp_get_attachment_url(get_post_thumbnail_id(get_the_id())); ?>
    	<div class="blog">
            <img src="<?php echo $booster_feature_img; ?>" alt="" class="img-responsive blog-img" />
            <h1 class="blog-title"><?php echo get_the_title(); ?></h1>
           
             <div class="post-date-blog">
                <?php booster_entry_meta(); ?>
             </div>   
    
            <p class="blog-text">
              <?php the_content();
					wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'booster' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
				 ?>
            </p>
            
            <div class="blog-hr"></div>
        </div>
        
        
<!-- paging -->
    <div class="col-md-12 paging-back-color ">
  			<ul class="list-inline text-center">
            	<li>
                	<?php previous_post_link(); ?>
                </li>
                <li>
                	<?php next_post_link(); ?>
                </li>
            </ul>
    </div>
<!-- paging -->
<?php comments_template( '', true ); ?>
    </div> 

<?php endwhile; ?> 
     
<!-- S I D E B A R  -->
       <div class="col-md-4 blog-col-2 main-sidebar">
		   <?php 
            get_sidebar();
           ?> 
  	   </div>
       </div>


<?php get_footer(); ?>