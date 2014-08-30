<?php 
/**
 * Main Page template file
**/
get_header(); 
?>

<div class="medics-single-blog section-main header-blog">
  <div class=" container-medics container">
    <h1> <span>
      <?php the_title(); ?>
      </span> </h1>
    <div class="header-breadcrumb">
      <ol>
        <?php if (function_exists('medics_custom_breadcrumbs')) medics_custom_breadcrumbs(); ?>
      </ol>
    </div>
  </div>
</div>
<div class="container container-medics">
  <div class="col-md-12 medics-post no-padding">
    <?php while ( have_posts() ) : the_post(); ?>
    <?php $medics_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
    <div class="col-md-9 clearfix no-padding">
      <div class="single-blog">
        <div class="blog-date-col-1">
          <h2><?php echo get_the_date("M j, Y "); ?> </h2>
          <div class="blog-comment"> <i class="fa fa-comments"></i><?php comments_number( '0', '1', '%' ); ?> </div>
        </div>
        <div class="blog-contan-col-2">
          <?php if($medics_image != "") { ?>
          <img src="<?php echo $medics_image; ?>" class="img-responsive medics-featured-image" alt="" />
          <?php } ?>
          <h1>
            <?php the_title(); ?>
          </h1>
          <div class="medics-contant">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
      <?php  comments_template( '', true ); ?>
    </div>
    <?php endwhile; ?>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
