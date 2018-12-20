<?php
/*
* Template Name:Home
*/
get_header(); 
$medics_options = get_option( 'medics_theme_options' ); ?>
<!-- HOME BANNER -->
<div class="medics-home-banner ">
  <?php if(get_header_image()){ ?>
  <div class="custom-header-img"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="img-responsive"> </a> </div>
  <?php } ?>
</div>
<!-- END HOME BANNER -->
<!--home-title-->
<?php if(get_theme_mod('hide_about_us') == ''){ ?>
<div class="section-main front-main">
  <div class=" container-medics container homepage-theme-title">
    <div class="">

    <h2>
      <?php if(get_theme_mod('about_us_title',isset($medics_options['home-title'])?$medics_options['home-title']:'About Us') != '') { echo esc_html(get_theme_mod('about_us_title',isset($medics_options['home-title'])?$medics_options['home-title']:'About Us')); } ?>
    </h2>
    <h3>
      <?php echo esc_html(get_theme_mod('about_us_description',isset($medics_options['home-content'])?$medics_options['home-content']:'Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum Lorem Ispum')); ?>
    </h3>
    <?php if((get_theme_mod('about_us_description',isset($medics_options['home-content'])?$medics_options['home-content']:'') != '') || (get_theme_mod('about_us_title',isset($medics_options['home-title'])?$medics_options['home-title']:'About Us'))) { ?>
    <div class="center-welcome-line text-center"></div>
    <?php } ?>
  </div>
</div>
</div>
<?php } ?>
<!--End-home-title-->
<div class="container container-medics medics-margin-bottom"> 
  <!-- technology -->
  <?php if(get_theme_mod('hide_key_features') == ''){ ?>
  <div class="row technology">
    <?php for($medics_section_i=1; $medics_section_i <= 3 ;$medics_section_i++ ): ?>
    <div class="col-md-4 technology-blog">
      <div class="screenshot" id="first-img-<?php echo esc_attr($medics_section_i); ?>">
        <?php        
          if(get_theme_mod('key_features_section_tab_icon'.$medics_section_i) != ''){
            $image_url = wp_get_attachment_url(get_theme_mod('key_features_section_tab_icon'.$medics_section_i));
          }else{
            $image_url=$medics_options['home-icon-'.$medics_section_i];
          }
          if($image_url != ""){
            echo "<img src='".esc_url($image_url)."' alt=''  />";
          } ?>
      </div>
      <h1>
        <?php if(get_theme_mod('key_features_section_tab_title'.$medics_section_i,isset($medics_options['section-title-'.$medics_section_i])?$medics_options['section-title-'.$medics_section_i]:'') !='') 
          { 
            echo esc_html(get_theme_mod('key_features_section_tab_title'.$medics_section_i,isset($medics_options['section-title-'.$medics_section_i])?$medics_options['section-title-'.$medics_section_i]:'')); 
          } ?>
      </h1>
      <p>
        <?php if(get_theme_mod('key_features_section_tab_description'.$medics_section_i,isset($medics_options['section-content-'.$medics_section_i])?$medics_options['section-content-'.$medics_section_i]:'') != '') 
          { 
            echo esc_html(get_theme_mod('key_features_section_tab_description'.$medics_section_i,isset($medics_options['section-content-'.$medics_section_i])?$medics_options['section-content-'.$medics_section_i]:'')); 
          } ?>
      </p>
    </div>
    <?php endfor; ?>
  </div>
  <?php } ?>
  <!--end technology -->
  <?php if(get_theme_mod('hide_recent_posts') == ''){ ?>
  <!-- FROM THE BLOG -->
  <?php if(get_theme_mod('recent_posts_section_category',isset($medics_options['post-category'])?$medics_options['post-category']:'1') != ''){ ?>
  <div class="col-md-12 main-title no-padding clearfix">
    <h1> 
      <?php 
      echo esc_html(get_theme_mod('recent_posts_section_title',isset($medics_options['homeblogtitle'])?$medics_options['homeblogtitle']:'FROM THE BLOG')); ?>
    </h1>
    <div class="full-line-title"></div>
  </div>
  <div class="medics-homeblog owl-carousel owl-theme" id="from-theblog">
    <?php $medics_args = array(
	   'cat'  => get_theme_mod('recent_posts_section_category',isset($medics_options['post-category'])?$medics_options['post-category']:'1'),
		'meta_query' => array(
			array(
			 'key' => '_thumbnail_id',
			 'compare' => 'EXISTS'
			),
		)
	);	
	$medics_query=new $wp_query($medics_args);
      if ( $medics_query->have_posts() ) {
      while($medics_query->have_posts()) {  $medics_query->the_post(); ?>
    <div class="home-blog item">
      <div class="col-md-2 no-padding blog-date">
        <h6><?php echo get_the_date("M j, Y "); ?></h6>
        <div class="blog-comment"> <i class="fa fa-comments"></i><?php echo esc_html(get_comments_number()); ?> </div>
      </div>
      <div class="col-md-10 no-padding blog-contan">
        <div class="medics-home-blog-img">
           <?php if ( has_post_thumbnail() ) { ?>
          <a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php the_post_thumbnail('',array( 'class' => 'img-responsive medics-featured-image' )); ?>
          </a>
          <?php } ?>
        </div>
        <h1><a href=<?php echo esc_url(get_permalink()); ?>>
          <?php the_title(); ?>
          </a></h1>
        <div class="dr-name-icon">
          <?php medics_entry_meta(); ?>
        </div>
        <p>
          <?php the_excerpt(); ?>
        </p>
      </div>
    </div>
    <?php } } else { echo '<p>'.esc_html__('no posts found','medics').'</p>'; } ?>
    <?php // endwhile; endif; // end of the loop. ?>
  </div>
  <?php } ?>
  <!-- END FROM THE BLOG -->
  <?php } ?>
</div>
<?php
if(get_theme_mod('hide_download_section') == ''){ 
 if(get_theme_mod('download_text',isset($medics_options['home-download-text'])?$medics_options['home-download-text']:'')!= '') { ?>
<div class="twiterpost">
  <div class="container container-medics twiterpost ">
<div class="col-md-12">
    <div class="icon-msg">
      <p>
        <?php echo esc_attr(get_theme_mod('download_text',isset($medics_options['home-download-text'])?$medics_options['home-download-text']:'')); ?>
      </p>
    </div>
    <?php if(get_theme_mod('download_link',isset($medics_options['home-download-link'])?$medics_options['home-download-link']:'') != '') { ?>
    <div class="medics-download-link pull-right"> <a href="<?php  echo esc_url(get_theme_mod('download_link',isset($medics_options['home-download-link'])?$medics_options['home-download-link']:'')); ?>"><?php echo esc_html(get_theme_mod('download_button_text','Download')); ?></a> </div>
    <?php } ?>
  </div>
</div>
</div>
<?php } }
get_footer();