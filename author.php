<?php 
/**
 * Author Page template file
**/
get_header(); 
?>

<div class="clearfix"></div>
<div class="col-md-12 site-title clearfix">
  <div class="multishop-container multishop-breadcrumb">
    <h1>Author : <span> All posts by <?php echo get_the_author();?></span></h1>
    <ol class="site-breadcumb">
      <?php if (function_exists('multishop_custom_breadcrumbs')) multishop_custom_breadcrumbs(); ?>
    </ol>
  </div>
</div>
<div class="multishop-container row">
  <div class="col-md-9">
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="media blog-box padding-top-0">
      <?php $multishop_image = wp_get_attachment_link(get_post_thumbnail_id(get_the_id()),'multishop-blog-image'); ?>
      <?php if(get_post_thumbnail_id(get_the_ID())) { ?>
      <div class="blog-image"> <?php echo $multishop_image; ?> </div>
      <?php }  ?>
      <div class="media-body blog-body">
        <h4 class="media-heading"><a href=<?php echo get_permalink(); ?>>
          <?php the_title(); ?>
          </a></h4>
        <div class="multishop-tags">
          <?php multishop_entry_meta(); ?>
          <span> <i class="fa fa-comments"></i>
          <?php comments_number( '0', '1', '%' ); ?>
          </span>
          <?php  if(get_the_tags() != '') { ?>
          <i class="fa fa-tags"></i> <span>
          <?php the_tags('<li>', '</li>, <li>', '</li>'); ?>
          </span>
          <?php } ?>
        </div>
        <p class="multishop-content-p">
          <?php the_excerpt(); ?>
        </p>
      </div>
    </div>
    <?php endwhile; ?>
    
    <!--Pagination Start-->
    <?php if(function_exists('faster_pagination')) { ?>
    <nav class="col-md-12 multishop-box-paging">
      <?php faster_pagination();?>
    </nav>
    <?php } else { ?>
    <?php if(get_option('posts_per_page ') < $wp_query->found_posts) { ?>
    <div class="col-md-12 multishop-default-pagination"> <span class="multishop-previous-link">
      <?php previous_posts_link(); ?>
      </span> <span class="multishop-next-link">
      <?php next_posts_link(); ?>
      </span> </div>
    <?php } ?>
    <?php }//is plugin active ?>
    <!--Pagination End--> 
  </div>
  <?php  get_sidebar(); ?>
</div>
<?php get_footer(); ?>
