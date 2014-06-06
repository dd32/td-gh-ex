<?php
/**
 * The main template file
 */
get_header(); ?>

<div class="container foodrecipes-container-recipes foodrecipes-main-template">
  <div class="col-md-12 foodrecipes-bg">
    <div class="col-md-8">
      <div class="masonry-container masonry">
        <?php     
            $foodrecipes_args = array(
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'post_type'        => 'post',
                    'post_status'      => 'publish',
					'paged' 		   => $paged,
                );
            $foodrecipes_posts = new WP_Query( $foodrecipes_args );
           
            while ( $foodrecipes_posts->have_posts() ) {
            $foodrecipes_posts->the_post();
            
            $foodrecipes_feature_img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
        ?>
        <div class="col-md-6 box masonry-brick foodrecipes-post-box-margin no-padding">
          <div class="foodrecipes-post-box">
            <div class="foodrecipes-post-box-img">
              <?php if($foodrecipes_feature_img_url == "") {?>
              <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg" class="img-responsive">
              <?php } else { ?>
              <img src="<?php echo $foodrecipes_feature_img_url; ?>">
              <?php } ?>
              <div class="foodrecipes-post-box-hover">
                <div class="foodrecipes-post-box-hover-center">
                  <div class="foodrecipes-post-box-hover-center1"> <a href="<?php the_permalink(); ?>"><i class="foodrecipes-zoom-icon"></i></a> </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="foodrecipes-box-name">
              <h6><?php echo get_the_date("j F, Y"); ?></h6>
              <div class="foodrecipes-title"> <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a> </div>
              <div class="foodrecipes-hr"> Post By: <span class="foodrecipes-postby-color"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"> <?php echo get_the_author(); ?></a></span> Comments:<span class="foodrecipes-postby-color"><?php echo get_comments_number(); ?></span> </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      
      <!-- next,prev,pages  -->
      <div class="clearfix"></div>
      <?php if(get_option('posts_per_page') < $wp_query->found_posts) { ?>
      <div class="col-md-12 foodrecipes-box-paging clearfix foodrecipes-main-pagination" >
        <?php foodrecipes_pagination($foodrecipes_posts->max_num_pages); ?>
      </div>
      <?php } ?>
    </div>
    <div class="col-md-4 foodrecipes-side-menu-bgcolor main-sidebar">
      <?php 	
		get_sidebar() 
	?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
