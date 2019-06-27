<?php get_header();
    $bg_image = $axiohost['search-header-bg-image']['url'];
    $bg_color = $axiohost['search-header-bg-color'];
    $bg = $axiohost['search-page'];
?>
      <!-- End Post Title Area -->
      <section class="post-title-area bg-color2" style="<?php if($bg == 'image' && class_exists('ReduxFrameWork')){echo 'background-image: url('.esc_url($bg_image).')'; }elseif($bg == 'color' && class_exists('ReduxFrameWork')){ echo 'background:'.esc_attr($bg_color); }else{echo '';}?>">
         <div class="container">
            <div class="post-title-content">
               <h1 class="heading-1"><?php echo wp_kses_post($axiohost['search-for-text']); ?> <strong><?php echo get_search_query(); ?></strong></h1>
               <?php get_template_part('template-parts/breadcrumb', 'breadcrumb'); ?>
            </div>
         </div>
         <div id="post-title-shape"></div>
      </section>
      <!-- End Post Title  Area -->
      <div class="blog-area space-top bg-color1">
         <div class="blog-wrapper">
            <div class="container">
               <div class="row">
                   <?php 
                       if(have_posts()){
                           get_template_part('template-parts/blog-list', 'blog-gird');
                           
                       }else{?>
                           <div class="col-lg-8 result-not-found">
                            <h2 class="text-left search-empty"><?php echo wp_kses_post($axiohost['nothing-found-text']);  ?></h2>
                                <p class="text-left search-empty"><?php echo wp_kses_post($axiohost['nothing-found-desc']);  ?></p>
                                
                                <div id="search-3" class="widget widget_search nothing-found-search">
                                    <form class="search-form-widget" method="get" action="<?php echo esc_url(site_url()); ?>">
                                        <div class="input-group">
                                            <input type="search" value="" class="form-control" placeholder="Search" name="s" aria-label="Search">
                                            <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </form>
                                
                                </div>
                            </div>
                       <?php 
                       }
                    ?>
                  
               </div>
            </div>
         </div>
      </div>
      <!-- End Blog Area -->
      
      <?php get_footer(); ?>