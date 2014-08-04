<?php 
/**
 * Template Name: Slider Home Page
**/
get_header(); 
$topmag_options = get_option( 'topmag_theme_options' );
?>       
<!-- home slider -->
  <?php
  if(!empty($topmag_options['post-slider-category'])) {
  $topmag_slider_post_args = array(
								'orderby'          => 'post_date',
								'order'            => 'DESC',
								'post_type'        => 'post',
								'post_status'      => 'publish',
								'category_name'    => $topmag_options['post-slider-category'],
								'meta_query'  	   => array( array('key' => '_thumbnail_id','compare' => 'EXISTS' ),)
							);	
	$topmag_slider_post = new WP_Query( $topmag_slider_post_args );	
	if($topmag_slider_post->max_num_pages != 0) {					
  ?>                          
 <div class="col-md-12">
   <div id="slider1_container">
        <!-- Loading Screen -->
        <div u="loading" class="slider-loader">
            <div class="slider-loader-content"></div>
            <div class="slider-loader-wrapper"></div>
        </div>

        <!-- Slides Container -->
        <div u="slides" class="slider-image-content">
            <?php
				while ( $topmag_slider_post->have_posts() ) { $topmag_slider_post->the_post();
				$topmag_featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
			?>
            <div>
                <img u="image" src="<?php echo $topmag_featured_image; ?>" />
            </div>
            <?php } ?>
        </div>
        
    </div> 
  </div>
  <?php } } ?>
  
  <!-- Recent Post -->
  <div class="col-md-12 no-padding ">
    <div class="col-md-12 clearfix"> <span class="recent-posts-title"><?php _e('Recent Posts','topmag'); ?></span> <span  class="prev prev1"><img src="<?php echo get_template_directory_uri(); ?>/images/right-arrow.png" class="img-responsive" /> </span> <span  class="next next1"><img src="<?php echo get_template_directory_uri(); ?>/images/left-arrow.png" class="img-responsive" /></span> </div>
    <div class="col-md-12 clearfix" id="home-banner">
    <?php
	if(!empty($topmag_options['recent-post-number'])) { $topmag_recent_post_page = $topmag_options['recent-post-number']; } else { $topmag_recent_post_page = get_option('posts_per_page');  } 
	    $topmag_recent_post_args = array(
					'posts_per_page'   => $topmag_recent_post_page,
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'post_type'        => 'post',
                    'post_status'      => 'publish'
                );
    $topmag_recent_post = new WP_Query( $topmag_recent_post_args );
    while ( $topmag_recent_post->have_posts() ) { $topmag_recent_post->the_post();
	$topmag_featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
	?>
          <div class="col-md-12 recent-posts clearfix item no-padding-left">
            <div class="blog-post">
              <div class="ImageWrapper chrome-fix">
			  	<?php if($topmag_featured_image != '')  { ?>
                	<img src="<?php echo $topmag_featured_image; ?>" class="img-responsive" />
                <?php } else { ?>    
                	<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" class="img-responsive" />
                <?php } ?>    
                <div class="ImageOverlayC"></div>
                <div class="Buttons StyleH"> <span class="WhiteRounded"><a href="<?php echo get_permalink(); ?>"><i class="fa fa-picture-o"></i></a> </span> </div>
                <?php if(get_the_tag_list()) { ?>
                <div class="caption-wrap">
                  <div class="caption"><?php the_tags('',', '); ?></div>
                </div>
				<?php } ?>
              </div>
            </div>
            <div>
              <p><a href="<?php echo get_permalink(); ?>" class="home-recent-post-slider"><?php echo get_the_title(); ?></a></p>
            </div>
            <div class="line-hr"></div>
            <div class="col-md-12 no-padding postblog">
              <div class="post-comment col-md-12 no-padding"> <span><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></span> <span><?php if(get_comments_number() != 0) : ?><i class="fa fa-comments-o"></i> <?php comments_number( '0', '1', '%' ); ?></span><?php  endif; ?> </div>
            </div>
          </div>
    <?php } ?>      
      </div>
  </div>
  <!-- End Recent Post --> 
  
  <div class="col-md-12 technology-sports-news">
    <div class="col-md-8 news-list no-padding-left clearfix"> 
      <div class="col-md-12 no-padding-left">
        <h1 class="home_category_title"> <?php if(!empty($topmag_options['home-post-category'])) { echo wp_filter_nohtml_kses($topmag_options['home-post-category']); } else { echo 'All Posts'; } ?></h1>
        <?php
		 $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
		 if(!empty($topmag_options['post-number'])) { $topmag_post_page = $topmag_options['post-number']; } else { $topmag_post_page = get_option('posts_per_page');  } 
		    $topmag_args = array( 
					'posts_per_page'   => $topmag_post_page,
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'post_type'        => 'post',
                    'post_status'      => 'publish',
					'paged' 		   => $paged,
                    'category_name'    => wp_filter_nohtml_kses($topmag_options['home-post-category'])
                );
		$topmag_single_post = new WP_Query( $topmag_args );
	   
		while ( $topmag_single_post->have_posts() ) { $topmag_single_post->the_post();
		$topmag_featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
		?> 
        <div class="home-category-post">
        <div class="news-list-col1 no-padding">
          <div class="ImageWrapper chrome-fix"> 
            <?php if($topmag_featured_image != '')  { ?>
                	<img src="<?php echo $topmag_featured_image; ?>" class="img-responsive" />
			<?php } else { ?>    
                <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" class="img-responsive" />
            <?php } ?>  
            <div class="ImageOverlayC"></div>
            <div class="Buttons StyleH"> <span class="WhiteRounded"><a href="<?php echo get_permalink(); ?>"><i class="fa fa-picture-o"></i></a> </span> </div>
          </div>
        </div>
        <div class="news-list-col2 no-padding">
          <h2><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
          <p> <?php the_excerpt(); ?> </p>
          <div class="news-post-comment"> <span><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></span> <?php topmag_entry_meta(); ?> </div>
        </div> 
        </div>
        <?php } ?>
        <div class="col-md-12 topmag_pagination">      
            <div class="topmag_previous_pagination"><?php previous_posts_link( '&laquo; Previous Page', $topmag_single_post->max_num_pages ); ?></div>
            <div class="topmag_next_pagination"><?php next_posts_link( 'Next Page &raquo;', $topmag_single_post->max_num_pages ); ?></div>
    	</div>
      </div>
    </div>
    
	<?php get_sidebar(); ?>

  </div>
   
<?php get_footer(); ?>
