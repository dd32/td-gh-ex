<?php get_header(); ?>

<section class="page-title-bar page-title-bar-single title-left">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
  <h4 class="text-uppercase"><?php the_title();?></h4>
    <div class="breadcrumb-nav">
      <?php avata_breadcrumbs();?>
    </div>
    <div class="clearfix"></div>
    </div>
    </div>
  </div>
</section>
<div class="page-wrap">
  <div class="container">
    <div class="page-inner row">
      <div class="blog-post">
        <div class="full-width">
          <?php the_post_thumbnail( 'avata-featured-image' ); ?>
        </div>
        <h4 class="text-uppercase entry-title">
          <?php the_title();?>
        </h4>
        <?php echo avata_posted_on();?>
        <?php while ( have_posts() ) : the_post();?>
        <div class="post-content">
          <?php

			the_content();

			the_posts_pagination( array(
			'prev_text' => '<i class="fa fa-arrow-left"></i><span class="screen-reader-text">' . __( 'Previous page', 'avata' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'avata' ) . '</span><i class="fa fa-arrow-right"></i>' ,
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'avata' ) . ' </span>',
		) );
			?>
        </div>
        <div class="inline-block">
          <div class="widget-tags">
            <?php
				  if(get_the_tag_list()) {
					  echo get_the_tag_list(__( 'Tags: ', 'avata' ),', ');
				  }
				  
				  ?>
          </div>
        </div>
        <div class="pagination-row">
          <div class="pagination-post"> </div>
        </div>
        <?php endwhile; // End of the loop.?>
      </div>
    </div>
  </div>
</div>
<?php get_footer();

