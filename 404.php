<?php get_header();
  $bg_image = $axiohost['error-header-bg-image']['url'];
    $bg_color = $axiohost['error-header-bg-color'];
    $bg = $axiohost['error-page'];  
?>
      <section class="post-title-area bg-color2"  style="<?php if($bg == 'image' && class_exists('ReduxFrameWork')){echo 'background-image: url('.esc_url($bg_image).')'; }elseif($bg == 'color' && class_exists('ReduxFrameWork')){ echo 'background:'.esc_attr($bg_color); }else{echo '';}?>">
         <div class="container">
            <div class="post-title-content">
               <h1 class="heading-1"><?php echo esc_html('404', 'axiohost'); ?></h1>
               <?php get_template_part('template-parts/breadcrumb', 'breadcrumb'); ?>
            </div>
         </div>
         <div id="post-title-shape"></div>
      </section>
     
      <!-- End Post Title Area -->
      <section class="blog-area section-spacing bg-color1">
         <div class="container">
            <div class="error-content">
                <div class="error-logo"><img src="<?php echo esc_url(AXIOHOST_IMG_URL.'/404.png'); ?>" alt="<?php esc_attr_e('404 img', 'axiohost'); ?>" /></div>
				<h4 class="heading-4">Sorry the page not found</h4>
				<a href="<?php echo esc_url(site_url()); ?>" class="error-btn btn btn-primary"><?php echo esc_html('Back to Home', 'axiohost'); ?></a>
            </div>
         </div>
      </section>
      <!-- End Blog Area -->
 <?php get_footer(); ?>