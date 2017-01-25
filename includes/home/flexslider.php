<div class="flexslider">
     <ul class="slides">
       <li>
         <div class="slide-image" style="background-image:url(<?php echo esc_url(get_theme_mod('bgimg-upload'));?>)"></div>
         <div class="banner-cnt">
           <div class="banner-insidecnt">
             <div class="container">
               <div class="banner-slider-content">
               <?php if(get_theme_mod('banner_title')){ ?>
                 <h1 class="banner-title"><?php echo esc_html(get_theme_mod('banner_title')); ?></h1>
                 <?php } if(get_theme_mod('banner_text')){ ?>
                 <p class="banner-description"><?php echo esc_html(get_theme_mod('banner_text')); ?></p>
                 <?php }?>
                 <a href="<?php echo esc_url(get_theme_mod('banner_url')); ?>" class="banner-btn click"><?php _e('Click Here','abaya') ?></a>
               </div><!--banner-slider-content--> 
             </div><!--container--> 
           </div><!--banner-insidecnt--> 
         </div><!--banner-cnt-->
       </li>
       <li>
         <div class="slide-image" style="background-image:url(<?php echo esc_url(get_theme_mod('bgimg-upload-s'));?>)"></div>
         <div class="banner-cnt">
           <div class="banner-insidecnt">
             <div class="container">
               <div class="banner-slider-content">
               <?php if(get_theme_mod('banner_title_s')){ ?>
                 <h1 class="banner-title"><?php echo esc_html(get_theme_mod('banner_title_s')); ?></h1>
                 <?php } if(get_theme_mod('banner_text')){ ?>
                 <p class="banner-description"><?php echo esc_html(get_theme_mod('banner_text_s')); ?></p>
                 <?php }?>
                 <a href="<?php echo esc_url(get_theme_mod('banner_url_s')); ?>" class="banner-btn click"><?php _e('Click Here','abaya') ?></a>
               </div><!--banner-slider-content--> 
             </div><!--container--> 
           </div><!--banner-insidecnt--> 
         </div><!--banner-cnt-->
       </li>
       <li>
         <div class="slide-image" style="background-image:url(<?php echo esc_url(get_theme_mod('bgimg-upload-t'));?>)"></div>
         <div class="banner-cnt">
           <div class="banner-insidecnt">
             <div class="container">
               <div class="banner-slider-content">
               <?php if(get_theme_mod('banner_title_t')){ ?>
                 <h1 class="banner-title"><?php echo esc_html(get_theme_mod('banner_title_t')); ?></h1>
                 <?php } if(get_theme_mod('banner_text')){ ?>
                 <p class="banner-description"><?php echo esc_html(get_theme_mod('banner_text_t')); ?></p>
                 <?php }?>
                 <a href="<?php echo esc_url(get_theme_mod('banner_url_t')); ?>" class="banner-btn click"><?php _e('Click Here','abaya') ?></a>
               </div><!--banner-slider-content--> 
             </div><!--container--> 
           </div><!--banner-insidecnt--> 
         </div><!--banner-cnt-->
       </li>
     </ul>
   </div>