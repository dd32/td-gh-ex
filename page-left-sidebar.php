<?php 
/*
    Template Name: Page with Left Sidebar
*/

get_header(); 
    $bg_image = $axiohost['header-bg-image']['url'];
     $bg_color = $axiohost['header-bg-color'];
     $bg = $axiohost['_page'];
?>
      <!-- Start Post Title Area -->
      <section class="post-title-area bg-color2" style="<?php if($bg == 'image' && class_exists('ReduxFrameWork')){echo 'background-image: url('.esc_url($bg_image).')'; }elseif($bg == 'color' && class_exists('ReduxFrameWork')){ echo 'background:'.esc_attr($bg_color); }else{echo '';}?>">
         <div class="container">
            <div class="post-title-content ">
               <h1 class="heading-1"><?php wp_title(' '); ?></h1>
               <?php get_template_part('template-parts/breadcrumb', 'breadcrumb'); ?>
            </div>
         </div>
         <div id="post-title-shape"></div>
      </section>
      <!-- End Post Title  Area -->
      <div class="blog-area section-spacing bg-color1">
         <div class="blog-wrapper">
            <div class="container">
               <div class="row">
               <?php get_sidebar(); ?>  
                  <div class="col-md-7 col-lg-8"> 
                     <div id="post-<?php the_ID(); ?>">
                            <?php 
                                 get_template_part('template-parts/content', 'content'); 
                                 get_template_part('template-parts/comments-template', 'comments-template');
                            ?>  
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
      <!-- End Blog Area -->
      
      <?php get_footer(); ?>