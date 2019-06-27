<?php 
/*
    Template Name: Page with Right Sidebar
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
                    <?php 
                         if(class_exists('ReduxFrameworkPlugin')){
                              if($axiohost['page-layout'] == '2'){
                                   get_sidebar();   
                              }
                          }
                    ?>
                  <div class="col-md-<?php if($axiohost['page-layout'] == '1' && class_exists('ReduxFrameworkPlugin')){echo '12 col-md-12'; }elseif(!is_active_sidebar('axiohost-sidebar')){echo '12 col-md-12';}else{echo '8 col-md-7'; }?>">   
                     <div id="post-<?php the_ID(); ?>" <?php post_class('single-post');?>>
                            <?php 
                                 get_template_part('template-parts/content', 'content'); 
                                 get_template_part('template-parts/comments-template', 'comments-template');
                            ?>  
                     </div>
                  </div>
                  
                  <?php 
                      if(class_exists('ReduxFrameworkPlugin')){
                          if($axiohost['page-layout'] == '3'){
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