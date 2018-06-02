<?php
/**
 * content-page-static.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.1.0
 */ 
 ?>

 <!-- Social Icons -->
 
<div class="avik-social-icons-video">
		<ul class="avik-social-icons" data-aos="zoom-in">
          <?php get_template_part( 'inc/social' ); ?>  
        </ul>    
</div>
<div class="header-static" style="background-image:url(<?php echo esc_url( get_theme_mod('avik_image_static', get_stylesheet_directory_uri(). '/img/static.jpg')); ?>)">
             <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_filter_home', false) )) :?> 
             <div class="filter-header"> 
                <?php endif; ?> 
                <div class="text-image-static">
		      	   <div id="avikservices-strings">
                      <p><?php echo get_theme_mod( 'avik_title_1_static','AVIK'); ?> <i> <?php echo get_theme_mod( 'avik_subtitle_1_static','DEVELOPER'); ?></i></p>
			                <p><?php echo get_theme_mod( 'avik_title_2_static','AVIK'); ?> <i> <?php echo get_theme_mod( 'avik_subtitle_2_static','UI/UX DESIGNER'); ?></i></p>
                      <p><?php echo get_theme_mod( 'avik_title_3_static','AVIK'); ?> <i> <?php echo get_theme_mod( 'avik_subtitle_3_static','WEB DEVELOPER'); ?></i></p>
			       </div>
		      	   <span id="avikservices" style="white-space:pre;"></span>             
                </div>
                <!-- Angle scroll -->
                <div class="down-video avik-animation-bounce">
                  <a href="#who-we-are"><i class="fas fa-angle-down"></i></a>
                </div>
             <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_filter_home', false) )) :?>
             </div>
             <?php endif; ?> 
</div>



  

