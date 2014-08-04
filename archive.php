<?php 
/**
 * The archive template file.
**/
get_header(); ?>

<div class="col-md-12 blogpost-list">
  <div class="col-md-8 blogpost no-padding-left clearfix">
    <div class="col-md-12 no-padding">
      <h1 class="post-page-title"><?php printf( __( 'Archives : %s', 'topmag' ), get_the_date('M-Y') ); ?></h1>
    </div>
    <?php while ( have_posts() ) : the_post(); 
	$topmag_featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
?>
    <div class="col-md-12 no-padding blogpost-border">
      <div class="blogpost-col1 no-padding">
        <?php if($topmag_featured_image != '') { ?>
        <img src="<?php echo $topmag_featured_image; ?>" class="img-responsive single-post-image" />
        <?php } else { ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" class="img-responsive single-post-image" />
        <?php } ?>
        <div class="caption-wrap-topimg">
          <div class="caption-date"><span><?php echo get_the_date('d M'); ?></span></div>
          <div class="caption-time"><i class="fa fa-clock-o"></i><?php echo get_the_date('g:i'); ?></div>
        </div>
      </div>
      <div class="blogpost-col2 no-padding">
        <h2>
          <?php the_title(); ?>
        </h2>
        <div class="blogpost-comment">
          <?php topmag_entry_meta(); ?>
          <p class="post-tags">
            <?php the_tags(); ?>
          </p>
        </div>
        <?php the_excerpt(); ?>
        <div class="blogpost-readmore">
          <p><a href="<?php the_permalink(); ?>">
            <?php _e('Read More...','topmag'); ?>
            </a></p>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <div class="col-md-12 topmag_pagination">
      <div class="topmag_previous_pagination">
        <?php previous_posts_link(); ?>
      </div>
      <div class="topmag_next_pagination">
        <?php next_posts_link(); ?>
      </div>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>