<?php 
/*
* author page template
*/
get_header(); ?>

<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 ">
        <p class="foodrecipes-post-title">Author : <span class="foodrecipes-post-subtitle">All posts by <?php echo get_the_author();?></span></p>
      </div>
      <div class="col-md-6  col-sm-6 ">
        <ol class="archive-breadcrumb  pull-right">
          <?php if (function_exists('foodrecipes_custom_breadcrumbs')) foodrecipes_custom_breadcrumbs(); ?>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="main-container ">
  <div class="foodrecipes-container-recipes container ">
    <div class="row">
      <div class="col-md-8 main no-padding-left">
        <div class="foodrecipes-inner-blog-bg">
          <?php if (have_posts() ) : ?>
          <?php while (have_posts()) : the_post(); ?>
          <article class="post ">
            <div class="foodrecipes-inner-blog-text" >
              <h6><?php echo get_the_date("j F, Y"); ?></h6>
              <h1><a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                </a></h1>
              <figure class="feature-thumbnail-large">
                <?php 
                        $foodrecipes_feature_img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); 
                        if($foodrecipes_feature_img_url!="") { ?>
                <?php if($foodrecipes_feature_img_url == "") {?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg" class="img-responsive">
                <?php } else { ?>
                <img src="<?php echo $foodrecipes_feature_img_url; ?>" class="img-responsive" alt="<?php echo get_the_title();?>">
                <?php } ?>
                <?php } ?>
              </figure>
              <?php foodrecipes_entry_meta(); ?>
              <div class="clear-fix"></div>
              <?php the_tags(); ?>
              <div class="post-content">
                <?php the_excerpt(); ?>
              </div>
            </div>
          </article>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
		<?php if(!is_plugin_active('faster-pagination/ft-pagination.php')){ ?>
            <?php if(get_option('posts_per_page ') < $wp_query->found_posts) { ?>
            <nav class="col-md-12 foodrecipes-box-paging clearfix foodrecipes-main-pagination foodrecipes-nav"> 
            <span class="foodrecipes-nav-previous">
              <?php previous_posts_link(); ?>
              </span> 
              <span class="foodrecipes-nav-next">
              <?php next_posts_link(); ?>
              </span> </nav>
            <?php } ?>
        <?php }else{ ?>
            <nav class="col-md-12 foodrecipes-box-paging clearfix"> 
        <?php if (function_exists("faster_pagination")):
                 faster_pagination(); 
        endif; ?>
        </nav>
        <?php } ?>
      </div>
        <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
