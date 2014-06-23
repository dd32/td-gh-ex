<?php 
/*
Template Name: Left Sidebar
*/
get_header(); 
?>

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 "> <span class="foodrecipes-page-breadcrumbs">
        <?php if (function_exists('foodrecipes_custom_breadcrumbs')) foodrecipes_custom_breadcrumbs(); ?>
        </span> </div>
    </div>
  </div>
</div>
<div class="main-container ">
  <div class="foodrecipes-container-recipes container">
    <div class="row">
      <div class="col-md-4 foodrecipes-side-menu-bgcolor main-sidebar">
        <?php 	
                get_sidebar(); 
            ?>
      </div>
      <!-- side-menu -->
      <?php while ( have_posts() ) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="col-md-8 no-padding-right">
          <div class="foodrecipes-inner-blog-bg"> 
            <!-- blog-text-img-post -->
            <?php $foodrecipes_feature_img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_id())); ?>
            <div class="foodrecipes-inner-blog-text" >
              <h6> <?php echo get_the_date("j F, Y "); ?></h6>
              <h1><?php echo get_the_title(); ?></h1>
              <?php if($foodrecipes_feature_img_url != "") { ?>
              <div><img src="<?php echo $foodrecipes_feature_img_url; ?>"></div>
              <?php } ?>
              <?php foodrecipes_entry_meta(); ?>
              <div class="clear-fix"></div>
              <?php the_tags(); ?>
              <p>
                <?php the_content(); ?>
              </p>
            </div>
            <div class="foodrecipes-inner-blog-text" >
              <h6>
                <?php comments_number( '0 COMMENT', '1 COMMENT', '% COMMENTS' ); ?>
              </h6>
            </div>
            <div class="foodrecipes-comment-form">
              <?php comments_template( '', true ); ?>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
