<?php 
/**
 * The main template file
**/
get_header(); 
$multishop_options = get_option( 'multishop_theme_options' );
?>

<div class="clearfix"></div>
<section class="shoap-section">
  <div class="site-title-border"> </div>
  <div class="multishop-container">
    <div class="col-md-9">
      <?php 
	  	$multishop_args = array( 
						'orderby'      => 'post_date', 
						'order'        => 'DESC',
						'post_type'    => 'post',
						'paged' => $paged,
						'post_status'    => 'publish'	
					  );
		$multishop_query = new WP_Query($multishop_args);
		?>
      <?php if ($multishop_query->have_posts() ) : while ($multishop_query->have_posts()) : $multishop_query->the_post(); ?>
      <?php $multishop_image = wp_get_attachment_link(get_post_thumbnail_id(get_the_id()),'multishop-blog-image'); ?>
        <div class="clearfix"></div>
        <div class="media blog-box padding-top-0">
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
      <?php endwhile; endif; // end of the loop. ?>
  
      <div class="clearfix"></div>
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
        <?php } ?>
    </div>
      <?php  get_sidebar(); ?>
  </div>
  <div class="clearfix"></div>
</section>
<div class="clearfix"></div>
<?php  get_footer(); ?>
