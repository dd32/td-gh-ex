  <?php 
/**
 * Template Name: Slider Home Page
**/
get_header(); 
$top_mag_options = get_option( 'topmag_theme_options' );
if(get_theme_mod('hide_post_slider_section') == ''){
?>       
<!-- home slider -->
  <?php
  $top_mag_slider_post_args = array(
								'orderby'          => 'post_date',
								'order'            => 'DESC',
								'post_type'        => 'post',
								'post_status'      => 'publish',
								'cat'    =>  get_theme_mod('post_slider_section_category', isset($top_mag_options['post-slider-category'])?$top_mag_options['post-slider-category']:''),
                'meta_query' => array(
                  array(
                   'key' => '_thumbnail_id',
                   'compare' => 'EXISTS'
                  ),
                )
							);	
	$top_mag_slider_post = new WP_Query( $top_mag_slider_post_args );	
        if($top_mag_slider_post->max_num_pages != 0) {					
  ?>                          
 <div class="col-md-12">
   <div id="slider1_container">
        <!-- Slides Container -->
        <div u="slides" class="slider-image-content owl-carousel">
            <?php
				  while ( $top_mag_slider_post->have_posts() ) { $top_mag_slider_post->the_post();
  				$top_mag_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'topmag-slider-image');
  				if($top_mag_featured_image[0] != ''){	?>
                <img u="image" alt="<?php echo get_the_title(); ?>" src="<?php echo esc_url($top_mag_featured_image[0]); ?>" />
            <?php } 
             } ?>
        </div>        
    </div> 
  </div>
  <?php } }?>
  
  <!-- Recent Post -->
  <?php if(get_theme_mod('hide_recent_post_section') == ''){ ?>
  <div class="col-md-12 no-padding ">
    <div class="col-md-12 clearfix"> <span class="recent-posts-title"><?php echo esc_html(get_theme_mod('recent_post_title','Recent Posts')); ?></span> </div>
    <div class="col-md-12 clearfix owl-carousel" id="home-banner">
  <?php
	if(get_theme_mod('display_recent_post_number', isset($top_mag_options['recent-post-number'])?$top_mag_options['recent-post-number']:'' )!='') { 
    $top_mag_recent_post_page = esc_attr(get_theme_mod('display_recent_post_number',$top_mag_options['recent-post-number'])); 
    } 
    else { $top_mag_recent_post_page = get_option('posts_per_page');  } 
	    $top_mag_recent_post_args = array(
					'posts_per_page'   => $top_mag_recent_post_page,
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'post_type'        => 'post',
                    'post_status'      => 'publish'
                );
    $top_mag_recent_post = new WP_Query( $top_mag_recent_post_args );
    while ( $top_mag_recent_post->have_posts() ) { $top_mag_recent_post->the_post();
	$top_mag_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'medium');
	?>
          <div class="recent-posts clearfix item">
            <div class="blog-post">
              <div class="ImageWrapper chrome-fix">
			  	<?php if($top_mag_featured_image[0] != '')  { ?>
                 <?php the_post_thumbnail( 'topmagthumbnailimage', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?>	
                <?php } else { ?>    
                	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/no-image.png" width="320" height="221" alt="<?php echo get_the_title(); ?>" class="img-responsive" />
                <?php } ?>    
                <div class="ImageOverlayC"></div>
                <div class="Buttons StyleH"> </div>
                <?php if(get_the_tag_list()) { ?>
                <div class="caption-wrap">
                  <div class="caption"><?php the_tags('',', '); ?></div>
                </div>
				<?php } ?>
              </div>
            </div>
            <div>
              <p><a href="<?php echo esc_url(get_permalink()); ?>" class="home-recent-post-slider"><?php echo get_the_title(); ?></a></p>
            </div>
            <div class="line-hr"></div>
            <div class="col-md-12 no-padding postblog">
              <div class="post-comment col-md-12 no-padding"> 
               <?php top_mag_entry_meta(); ?> 
              </div>
            </div>
          </div>
    <?php } ?>      
      </div>
  </div>
  <!-- End Recent Post --> 
  <?php }
  if(get_theme_mod('hide_post_category_section') == ''){ ?>
  <div class="col-md-12 technology-sports-news">
    <div class="col-md-8 news-list no-padding-left clearfix"> 
      <div class="col-md-12 no-padding">

        <h1 class="home_category_title"> <?php if(get_theme_mod('post_category_name',isset($top_mag_options['home-post-category'])?$top_mag_options['home-post-category']:'')!= "") { echo esc_html(get_theme_mod('post_category_name',$top_mag_options['home-post-category'])); } else { esc_html_e('All Posts','top-mag'); } ?></h1>
        <?php
		 $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
		 if(get_theme_mod('display_post_category_number',isset($top_mag_options['post-number'])?$top_mag_options['post-number']:'') != "") {
        $top_mag_post_page = esc_attr(get_theme_mod('display_post_category_number',$top_mag_options['post-number'])); 
      } else { 
        $top_mag_post_page = get_option('posts_per_page');  
      } 
		    $top_mag_args = array( 
					'posts_per_page'   => $top_mag_post_page,
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'post_type'        => 'post',
                    'post_status'      => 'publish',
					'paged' 		   => $paged,
                    'category_name'    => esc_attr(get_theme_mod('post_category_name',$top_mag_options['home-post-category']))
                );
		$top_mag_single_post = new WP_Query( $top_mag_args );
	   
		while ( $top_mag_single_post->have_posts() ) { $top_mag_single_post->the_post();
		$top_mag_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()),'medium');
		?> 
        <div class="home-category-post">
        <div class="news-list-col1 no-padding">
          <div class="ImageWrapper chrome-fix"> 
            <?php if($top_mag_featured_image[0] != '')  { ?>
                	<?php the_post_thumbnail( 'topmagthumbnailimage', array( 'alt' => get_the_title(), 'class' => 'img-responsive') ); ?>
			<?php } else { ?>    
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/no-image.png" alt="No image" width="320" height="221" class="img-responsive" />
            <?php } ?>  
            <div class="ImageOverlayC"></div>
            <div class="Buttons StyleH">  </div>
          </div>
        </div>
        <div class="news-list-col2 no-padding">
          <h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a></h2>
          <p> <?php the_excerpt(); ?> </p>
          <div class="news-post-comment"> <?php top_mag_entry_meta(); ?> </div>
        </div> 
        </div>
        <?php } ?>
        <div class="col-md-12 top_mag_pagination"> 			
            <div class="top_mag_previous_pagination"><?php previous_posts_link( '&laquo; Previous Page', $top_mag_single_post->max_num_pages ); ?></div>
            <div class="top_mag_next_pagination"><?php next_posts_link( 'Next Page &raquo;', $top_mag_single_post->max_num_pages ); ?></div>			
    	</div>
      </div>
    </div>
	<?php get_sidebar(); ?>
  </div>
<?php }
get_footer(); ?>
