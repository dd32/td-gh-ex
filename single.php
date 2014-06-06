<?php 
/*
* single post template
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
      <?php while ( have_posts() ) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="col-md-8 main no-padding-left">
          <div class="foodrecipes-inner-blog-bg">
            <article class="post">
              <div class="foodrecipes-inner-blog-text">
                <?php $foodrecipes_feature_img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_id())); ?>
                <div class="foodrecipes-inner-blog-text" >
                  <h6> <?php echo get_the_date("j F, Y"); ?></h6>
                  <h1><?php echo get_the_title(); ?></h1>
                  <?php if($foodrecipes_feature_img_url != "") { ?>
                  <div><img src="<?php echo $foodrecipes_feature_img_url; ?>"></div>
                  <?php } ?>
                  <?php foodrecipes_entry_meta(); ?>
                  <div class="clear-fix"></div>
                  <?php the_tags(); ?>
                  <p>
                    <?php the_content();
                        wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'foodrecipes' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            ) );
                     ?>
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
            </article>
          </div>
          <div class="clearfix"></div>
          <nav class="col-md-12 foodrecipes-box-paging clearfix foodrecipes-main-pagination foodrecipes-single-pagination"> <span class="foodrecipes-nav-previous">
            <?php previous_post_link(); ?>
            </span> <span class="foodrecipes-nav-next">
            <?php next_post_link(); ?>
            </span> </nav>
        </div>
        <?php endwhile; ?>
        
        <!-- side-menu -->
        <div class="col-md-4 foodrecipes-side-menu-bgcolor main-sidebar">
          <?php 	
		get_sidebar(); 
	?>
        </div>
        <!-- side-menu --> 
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
