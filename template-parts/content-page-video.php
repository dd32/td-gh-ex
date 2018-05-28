<?php
/**
 * content-page-video.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.0.0
 */ 
 ?>

<!-- Social Icons -->
<div class="avik-social-icons-video">
		<ul class="avik-social-icons" data-aos="zoom-in">
      <?php get_template_part( 'inc/social' ); ?>  
		</ul>
</div>
<div class="video-container">
     <video autoplay loop playsinline muted>
        <source src="<?php echo get_theme_mod('upload_video', get_stylesheet_directory_uri(). '/video/avik-2.mp4'); ?>" type="video/mp4" />
        <?php esc_html_e('Sorry, your browser does not support the video tag. I suggest you upgrade your browser.', 'avik'); ?>       
     </video>
     <?php if ( false == get_theme_mod( 'enable_filter_home', false) ) :?> 
     <div class="filter-header">
     <?php endif; ?> 
        <div class="content-video-home">
          <div class="text-image-video">  
		         <div id="typed-strings">
			          <p><?php echo get_theme_mod( 'title_1_video','AVIK'); ?> <i> <?php echo get_theme_mod( 'subtitle_1_video','DEVELOPER'); ?></i></p>
			          <p><?php echo get_theme_mod( 'title_2_video','AVIK'); ?> <i> <?php echo get_theme_mod( 'subtitle_2_video','UI/UX DESIGNER'); ?></i></p>
                <p><?php echo get_theme_mod( 'title_3_video','AVIK'); ?> <i> <?php echo get_theme_mod( 'subtitle_3_video','WEB DEVELOPER'); ?></i></p>
			       </div>
            <span id="typed" style="white-space:pre;"></span> 
          </div>
          <!-- Angle scroll -->
          <div class="down-video avik-animation-bounce">
             <a href="#who-we-are"><i class="fas fa-angle-down"></i></a>
          </div>
        </div>
     <?php if ( false == get_theme_mod( 'enable_filter_home', false) ) :?> 
     </div>
     <?php endif; ?> 
</div>



     
      


