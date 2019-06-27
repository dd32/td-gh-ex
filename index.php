<?php get_header(); 

    $bg_image = $axiohost['blog-header-bg-image']['url'];
    $bg_color = $axiohost['blog-header-bg-color'];
    $bg = $axiohost['blog-page'];
?>
    
      <!-- End Post Title Area -->
      <section class="post-title-area bg-color2" style="<?php if($bg == 'image' && class_exists('ReduxFrameWork')){echo 'background-image: url('.esc_url($bg_image).')'; }elseif($bg == 'color' && class_exists('ReduxFrameWork')){ echo 'background:'.esc_attr($bg_color); }else{echo '';}?>">
         <div class="container">
            <div class="post-title-content">
               <h1 class="heading-1"><?php wp_title(' '); ?></h1>
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
                         if(class_exists('ReduxFrameworkPlugin')){
                              if($axiohost['page-layout'] == '2' && !$axiohost['blog_style'] == 2){
                                   get_sidebar();   
                              }
                          }
                    ?>
                   <?php 
                        if($axiohost['blog_style'] == 2){
                           get_template_part('template-parts/blog-grid', 'blog-grid'); 
                       }
                       else{
                            get_template_part('template-parts/blog-list', 'blog-list'); 
                         }
                       
                      ?>
                      <?php 
                          if(class_exists('ReduxFrameworkPlugin')){
                              if($axiohost['page-layout'] == '3' && !$axiohost['blog_style'] == 2){
                                   get_sidebar();   
                              }
                          }
                          else{
                              get_sidebar();
                          }
                    ?>
                    
               </div>
            </div>
         </div>
      </div>
      <!-- End Blog Area -->
      
      <?php get_footer(); ?>