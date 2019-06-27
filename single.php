<?php get_header(); 
    $bg_image = $axiohost['blog-header-bg-image']['url'];
    $bg_color = $axiohost['blog-header-bg-color'];
    $bg = $axiohost['blog-page'];
?>
      <!-- Start Post Title Area -->
       <section class="post-title-area bg-color2" style="<?php if($bg == 'image' && class_exists('ReduxFrameWork')){echo 'background-image: url('.esc_url($bg_image).')'; }elseif($bg == 'color' && class_exists('ReduxFrameWork')){ echo 'background:'.esc_attr($bg_color); }else{echo '';}?>">
         <div class="container">
            <div class="post-title-content post">
               <h1 class="heading-1"><?php the_title(); ?></h1>
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
                  <div class="col-md-7 col-lg-8">   
                     <div id="post-<?php the_ID(); ?>" <?php post_class();?>>
                            <?php 
                                 get_template_part('template-parts/content', 'content'); 
                                 get_template_part('template-parts/tags-share', 'tags-share'); 
                                 get_template_part('template-parts/single-admin', 'single-admin'); 
                                 get_template_part('template-parts/page-links', 'page-links'); 
                                 get_template_part('template-parts/comments-template', 'comments-template');
                            ?>  
                     </div>
                  </div>
                  
                  <?php get_sidebar(); ?>

               </div>
            </div>
         </div>
      </div>
      <?php get_footer(); ?>