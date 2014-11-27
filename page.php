<?php 
/**
 * Main Page template file
**/
get_header(); 
?>

<div class="col-md-12 site-title clearfix">
  <div class="multishop-container multishop-breadcrumb">
    <h1><?php echo get_the_title(); ?></h1>
    <ol class="site-breadcumb">
      <?php  if (function_exists('multishop_custom_breadcrumbs')) multishop_custom_breadcrumbs(); ?>
    </ol>
  </div>
</div>
<div class="multishop-container row">
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php while ( have_posts() ) : the_post(); ?>
    <?php $multishop_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
    <div class="col-md-9 clearfix">
      <div class="media blog-box singleblog-box padding-top-0">
        <?php if($multishop_image != "") { ?>
        <img src="<?php echo esc_url($multishop_image); ?>" class="single-image img-responsive" />
        <?php } ?>
        <div class="media-body blog-body single-blog-body">
          <h4><?php echo get_the_title(); ?></h4>
          <div class="multishop-tags">
            <?php multishop_entry_meta(); ?>
            <?php  if(get_the_tags() != '') { ?>
            <i class="fa fa-tags"></i> <span>
            <?php the_tags('<li>', '</li>, <li>', '</li>'); ?>
            </span> <span> <i class="fa fa-comments"></i>
            <?php comments_number( '0', '1', '%' ); ?>
            </span>
            <?php } ?>
          </div>
          <p class="multishop-content-p">
            <?php the_content(); 
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'multishop' ),
					'after' => '</div>',
				) );
			?>
          </p>
        </div>
      </div>
      <?php  comments_template( '', true ); ?>
      <?php endwhile; ?>
    </div>
    <?php  get_sidebar(); ?>
  </div>
</div>
<div class="clearfix"></div>
<?php get_footer(); ?>
