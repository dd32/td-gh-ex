<?php 
get_header();
$categories = get_the_category();
$category_name = $categories[0]->name;
$category_id = $categories[0]->cat_ID; ?> 
<section class="section-main back-img-aboutus">
  <div class="container">
    <div class="row">
        <div class="col-md-12 img-banner-aboutus">
       <p class="font-34 color-fff conter-text"><?php esc_html_e('Category','booster'); ?></p>
         <?php if (function_exists('booster_custom_breadcrumbs')) booster_custom_breadcrumbs(); ?>
    </div>
    </div>
  </div>
</section>
<div class="main-container">
  <div class="container no-padding-left"> 
    <div class="row">
      <div class="col-md-8 booster-post main">
        <?php if (have_posts() ) :
          while (have_posts()) : the_post(); ?>
        <article class="post clearfix">
          <div class="post-meta">
            <div class="post-meta-author">
              <div class="post-author-name blog-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
               </div>
              <?php booster_entry_meta(); ?>
              <div class="clear-fix"></div>
              <?php the_tags(); ?>
            </div>
          </div>
           <?php $booster_feature_img = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
            if($booster_feature_img != '') { ?>
              <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo esc_url($booster_feature_img); ?>" class="img-responsive blog-page-image" /></a>
           <?php } ?>
          <div class="post-content">
            <?php the_excerpt(); ?>
          </div>
        </article>
          <div class="blog-hr-archive"></div> 
        <?php endwhile; endif; ?>
    <!--Pagination Start-->
      <div class="booster-pagination-color">
         <?php
             the_posts_pagination( array(
            'type'  => 'div',
            'screen_reader_text' => ' ',
            'prev_text'          => esc_html__( '<< Previous', 'booster' ),
            'next_text'          => esc_html__('Next >>','booster'),
            ) ); ?>
      </div>
      <!--Pagination End-->        
      </div>
      <div class="col-md-4  blog-col-2 main-sidebar">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
