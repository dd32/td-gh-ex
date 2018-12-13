<?php 
/*
Template Name: Blog page
*/
get_header(); ?>
<section class="section-main back-img-aboutus">
  <div class="container">
    <div class="col-md-12 img-banner-aboutus">
    	 <p class="font-34 color-fff conter-text"><?php echo get_the_title(); ?></p>
         <?php if (function_exists('booster_custom_breadcrumbs')) booster_custom_breadcrumbs(); ?>
    </div>
  </div>
</section>
<div class="container blog-background">
  <div class="col-md-8 booster-post clearfix no-padding-left">
    <?php $booster_args = array(
        'posts_per_page'   => 10,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'post_type'        => 'post',
        'post_status'      => 'publish'
        );
    $booster_blog = new WP_Query( $booster_args );
    while ( $booster_blog->have_posts() ) {
      $booster_blog->the_post();
      $booster_feature_img = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
      <article class="post clearfix">
            <div class="blog">
               <h1 class="blog-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a></h1>
                 <div class="post-date-blog">
                   <p><?php booster_entry_meta(); ?></p>
                 </div>
                 <div class="blog-line"></div>
                 <?php if($booster_feature_img != '') { ?>
                  <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo esc_url($booster_feature_img); ?>" class="img-responsive blog-page-image" /></a>
                 <?php } ?>
                 <div class="post-content"><?php echo get_the_excerpt(); ?></div>
            </div>
        </article>  
         <?php } ?>
<!--Pagination Start-->
  <div class="booster-pagination-color">
    <?php
    $big = 999999999; // need an unlikely integer
    echo paginate_links( array(
    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $booster_blog->max_num_pages
    ) );
    wp_reset_postdata(); ?>
    </div>
    <!--Pagination End-->           
    </div>
     <!-- S I D E B A R --> 
      <div class="col-md-4 blog-col-2 main-sidebar">
       <?php get_sidebar(); ?>
     </div>
</div>
<?php get_footer(); ?>