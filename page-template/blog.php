<?php 
/**
 * Template Name: Blog
**/
get_header();
?>
<div class="generator-single-blog section-main">
  <div class=" container-generator container">
    <h1><?php the_title(); ?></h1>
    <div class="header-breadcrumb">
      <ol>
        <?php if (function_exists('generator_custom_breadcrumbs')) generator_custom_breadcrumbs(); ?>
      </ol>
    </div>
  </div>
</div>
<div class="container container-generator">
  <div class="col-md-12 generator-post no-padding">
    <div class="col-md-8 no-padding-left"> 
      <?php 
	  $generator_args = array( 
						'orderby'      => 'post_date', 
						'order'        => 'DESC',
						'post_type'    => 'post',
						'paged' => $paged,
						'post_status'    => 'publish'	
					  );
		$generator_query = new WP_Query($generator_args);
		
	 if ($generator_query->have_posts() ) : while ($generator_query->have_posts()) : $generator_query->the_post(); ?>
      <?php $generator_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
      <div class="col-md-12 no-padding">
        <div class="col-md-10 no-padding">
          <h2 class="generator-head-title"><?php the_title(); ?></h2>
        </div>
        <div class="col-md-2 comments-icon"> 
          <!--<img src="images/comment-icon.png" />--> 
          <i class="fa fa-comments"></i> <?php comments_number( '0', '1', '%' ); ?> </div>
      </div>
      <div class="col-md-12 breadcrumb">
      	  <?php generator_entry_meta(); ?>
        <ol>
          <?php the_tags('<li>', '</li><li>', '</li>'); ?>
        </ol>
      </div>
      <div class="col-md-12 generator-post-content no-padding">
        <?php if($generator_image != "") { ?><img src="<?php echo $generator_image; ?>" class="img-responsive generator-featured-image" /><?php } ?>
		<?php the_content();  ?>
      </div>
      <?php endwhile; endif; ?> 
      <div class="col-md-12 paging-blog ">
        <ul class="list-inline text-center">
          <?php if (function_exists("generator_pagination"))
   		 		generator_pagination($generator_query->max_num_pages); ?>
        </ul>
      </div>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>