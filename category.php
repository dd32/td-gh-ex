<?php 
/**
 * The category template file.
**/
get_header(); ?>
<div class="col-md-12 blogpost-list">
  <div class="col-md-8 blogpost no-padding-left clearfix">
    <div class="col-md-12 no-padding">
      <h1 class="post-page-title">
      <?php  esc_html_e( 'Category Archives', 'top-mag' ); echo ' : '. single_cat_title( '', false ) ?>
    </h1>
    </div>
    <?php while ( have_posts() ) : the_post(); 
	$top_mag_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'medium');
?>
    <div class="col-md-12 no-padding blogpost-border">
      <div class="blogpost-col1 no-padding">
        <?php if(has_post_thumbnail()) { ?>
        <a href="<?php the_permalink(); ?>"><?php  the_post_thumbnail( 'topmagthumbnailimage', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?></a>
        <?php } else { ?>
        <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/no-image.png" alt="<?php echo get_the_title(); ?>" class="img-responsive single-post-image" /></a>
        <?php } ?>
        <div class="caption-wrap-topimg">
          <div class="caption-date"><span><?php echo get_the_date('d M'); ?></span></div>
          <div class="caption-time"><i class="fa fa-clock-o"></i><?php echo get_the_date('g:i'); ?></div>
        </div>
      </div>
      <div class="blogpost-col2 no-padding">
        <a href="<?php the_permalink(); ?>"><h2>
          <?php the_title(); ?>
        </h2></a>
        <div class="blogpost-comment">
          <?php top_mag_entry_meta(); ?>
        </div>
        <?php the_excerpt(); ?>
        <div class="blogpost-readmore">
          <p><a href="<?php the_permalink(); ?>">
            <?php esc_html_e('Read More','top-mag'); ?>
            </a></p>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <div class="col-md-12 top-mag-pagination">
     
      <div class="top-mag-previous-pagination"><?php previous_posts_link(); ?></div>
      <div class="top-mag-next-pagination"><?php next_posts_link(); ?></div>
     
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>