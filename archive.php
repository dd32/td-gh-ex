<?php 
get_header(); ?> 
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 ">
        <?php if ( have_posts() ) : 
	 		printf( __( '<p class="booster-post-title">Archives : %s', 'booster' ), '<span class="booster-post-subtitle">' . get_the_date('M-Y') . '</span></p>' );
		endif; ?>
      </div>
      <div class="col-md-6  col-sm-6 ">
        <ol class="archive-breadcrumb  pull-right">
          <?php if (function_exists('booster_custom_breadcrumbs')) booster_custom_breadcrumbs(); ?>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="main-container">
  <div class="container"> 
    <div class="row">
      <div class="col-md-8 main">
        <?php if (have_posts() ) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <article class="post">
          <figure class="feature-thumbnail-large">
            <?php 
			$booster_feature_img = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); 
			if($booster_feature_img!="") { ?>
            <img src="<?php echo $booster_feature_img ?>" class="img-responsive" alt="<?php echo get_the_title();?>" />
            <?php } ?>
          </figure>
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
          
          
          
          <div class="post-content">
            <?php the_excerpt(); ?>
            <div class="blog-hr-archive"></div>
          </div>
         
        </article>
           
        <?php endwhile; ?>
        <?php endif; ?>
        <nav class="booster-nav">
                <span class="booster-nav-previous"><?php previous_posts_link(); ?></span>
                <span class="booster-nav-next"><?php next_posts_link(); ?></span>
		</nav>
      </div>
      <div class="col-md-4  blog-col-2 main-sidebar">
      	<?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>