<?php 
/*
    Template Name: Page with Full Width
*/

get_header(); 
    $bg_image = $axiohost['header-bg-image']['url'];
     $bg_color = $axiohost['header-bg-color'];
     $bg = $axiohost['_page'];
?>
      <!-- Start Post Title Area -->
      <section class="post-title-area bg-color2" style="<?php if($bg == 'image' && class_exists('ReduxFrameWork')){echo 'background-image: url('.esc_url($bg_image).')'; }elseif($bg == 'color' && class_exists('ReduxFrameWork')){ echo 'background:'.esc_attr($bg_color); }else{echo '';}?>">
         <div class="container">
            <div class="post-title-content">
               <h1 class="heading-1"><?php wp_title(' '); ?></h1>
            </div>
         </div>
         <div id="post-title-shape"></div>
      </section>
      
      <!-- End Post Title  Area -->
      <div class="blog-area">
         <div class="blog-wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">   
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