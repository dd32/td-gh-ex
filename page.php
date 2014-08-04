<?php 
/**
 * The page template file.
**/
get_header(); ?>

<div class="col-md-12">
  <div class="col-md-8 single-blog no-padding-left clearfix">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="col-md-12 no-padding">
      <h1 class="post-page-title">
        <?php the_title(); ?>
      </h1>
    </div>
    <div class="col-md-12 singleblog-img no-padding singleblog-contan">
      <?php $topmag_featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
			 if($topmag_featured_image != '') { ?>
      <img src="<?php echo $topmag_featured_image; ?>" class="img-responsive" />
      <?php } ?>
      <?php the_content(); ?>
    </div>
    <?php endwhile; ?>
    <hr class="col-md-12 socialicon-like no-padding" />
    <?php comments_template(); ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
