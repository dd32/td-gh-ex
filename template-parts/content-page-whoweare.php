<?php
/**
 * content-page-whoweare.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.0.0
 */ 
 ?>
 
 <div class="enter-whoweare">
     <div class="header-image-whoweare" style="background-image:url(<?php echo get_theme_mod('image_banner_whoweare', get_stylesheet_directory_uri(). '/img/whoweare.jpg'); ?>)">
        <div class="text-image-whoweare">
			<div id="typed-strings">
				<p><?php echo get_theme_mod( 'title_1_image_banner_whoweare','AVIK'); ?> <i> <?php echo get_theme_mod( 'subtitle_1_image_banner_whoweare','DEVELOPER'); ?></i></p>
			  <p><?php echo get_theme_mod( 'title_2_image_banner_whoweare','AVIK'); ?> <i> <?php echo get_theme_mod( 'subtitle_2_image_banner_whoweare','UI/UX DESIGNER'); ?></i></p>
        <p><?php echo get_theme_mod( 'title_3_image_banner_whoweare','AVIK'); ?> <i> <?php echo get_theme_mod( 'subtitle_3_image_banner_whoweare','WEB DEVELOPER'); ?></i></p>
			</div>
			<span id="typed" style="white-space:pre;"></span>             
        </div>
	</div>
    <div class="title-whoweare text-center">
       <h3><?php the_title();?></h3>
    </div>
    <div class="container">
      <div class="row">
       <?php
        $whowearecontent = get_theme_mod( 'page_id_whoweare', '' );
        $whoweare_count = 1;
        $mod = new WP_Query( array( 'page_id' => $whowearecontent ,'showposts' => $whoweare_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
         <!-- Title who-we-are -->
         <div class="image-thumbnail-portfolio">
           <div class="row">
             <div class="col-sm-6">
              <div><?php the_content();?></div>
             </div>
             <div class="col-sm-6 ">
                 <!-- Image 2 who we are -->
                 <div class="second-image-who-we-are image-enter-whoweare" data-aos="zoom-in">
                 <img class="img-who-we-are border-who-we-are" src="<?php if ( $avik_image_attributes[0] ) : 
                     echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>" 
                     alt="<?php echo get_theme_mod('alt_image_2_whoweare','who we are 2'); ?>"/>
                 </div>   
             </div>
           </div>
         </div>
         <div class="clear"></div> 
         <?php } endwhile;
          wp_reset_query();
          wp_reset_postdata(); ?>
      </div>
    </div>
    <!-- Statistics -->
    <?php if ( false == get_theme_mod( 'enable_statistics_whoweare', false) ) :?>
    <div class="statistics row">
       <div class="statistics-box col-sm-3">
          <div class="statistics-icon">
            <span><i class="<?php echo get_theme_mod( 'icon_1_statistics','far fa-flag'); ?>"></i></span>
              <div class="statistics-number" data-slno='1' data-min='0' data-max="<?php echo get_theme_mod( 'max_numbers_1_statistics','2500'); ?>" data-delay='3' data-increment="2">
              <?php echo get_theme_mod( 'max_numbers_1_statistics','2500'); ?>
              </div>
             <div class="statistics-text one">
               <h4><?php echo get_theme_mod( 'title_1_statistics_whoweare','PROJECT DONE'); ?></h4>
             </div>
          </div>
       </div>
       <div class="statistics-box col-sm-3">
          <div class="statistics-icon">
            <span><i class="<?php echo get_theme_mod( 'icon_2_statistics','far fa-smile'); ?>"></i></span>
              <div class="statistics-number" data-slno='1' data-min='0' data-max="<?php echo get_theme_mod( 'max_numbers_2_statistics','700'); ?>" data-delay='3' data-increment="2">
                <?php echo get_theme_mod( 'max_numbers_2_statistics','700'); ?>
              </div>
               <div class="statistics-text two">
                 <h4><?php echo get_theme_mod( 'title_2_statistics_whoweare','HAPPY CLIENTS'); ?></h4>
               </div>
          </div>
       </div>
       <div class="statistics-box col-sm-3">
          <div class="statistics-icon">
            <span><i class="<?php echo get_theme_mod( 'icon_3_statistics','fas fa-thumbtack'); ?>"></i></span>
              <div class="statistics-number" data-slno='1' data-min='0' data-max="<?php echo get_theme_mod( 'max_numbers_3_statistics','1550'); ?>" data-delay='3' data-increment="2">
                <?php echo get_theme_mod( 'max_numbers_3_statistics','1550'); ?>
              </div>
                 <div class="statistics-text three">
                  <h4><?php echo get_theme_mod( 'title_3_statistics_whoweare','BRANDING'); ?></h4>
                 </div>
          </div>
       </div>
       <div class="statistics-box col-sm-3">
          <div class="statistics-icon">
             <span><i class="<?php echo get_theme_mod( 'icon_4_statistics','fas fa-globe'); ?>"></i></span>
               <div class="statistics-number" data-slno='1' data-min='0' data-max="<?php echo get_theme_mod( 'max_numbers_4_statistics','480'); ?>" data-delay='3' data-increment="2">
                 <?php echo get_theme_mod( 'max_numbers_4_statistics','480'); ?>
               </div>
                 <div class="statistics-text four">
                   <h4><?php echo get_theme_mod( 'title_3_statistics_whoweare','THEMES'); ?></h4>
                </div>
          </div>
       </div>
    </div>
    <?php endif; ?>
    <!-- Team -->
    <?php if ( false == get_theme_mod( 'enable_team_whoweare', false) ) :?>
    <div class="team">
      <div class="title-team text-center">
        <h3><?php echo get_theme_mod( 'title_general_team_whoweare','Management Team'); ?></h3>
      </div>
      <div class="container py-0">
         <div class="row">
           <!-- Team 1 -->
           <div class="frame col-md-4" id="wth-1">
             <img src="<?php echo get_theme_mod('image_team_1_whoweare', get_stylesheet_directory_uri(). '/img/team-1.jpg'); ?>" 
                  alt="<?php echo get_theme_mod('alt_image_team_1_whoweare','Team 1 who we are'); ?>" />
               <div class="name-title one">
                  <h4><?php echo get_theme_mod( 'title_team_1_whoweare','JON VARDEN'); ?></h4>
                  <h5><?php echo get_theme_mod( 'subtitle_team_1_whoweare','Designer'); ?></h5>
               </div>
			   <div class="details">
                 <div class="avik-social-icons-team">
		               <ul class="social-team">
                      <!-- Facebook -->
		                  <?php if ( false == get_theme_mod( 'enable_facebook_icon_team_1', false) ) :?>
		                  <li><a href="<?php echo get_theme_mod( 'link_facebook_icon_team_1' ,'#');?>">
		                      <i class="fab fa-facebook"></i></a></li>
			                <?php endif; ?>
			                <!-- Twitter -->
		                  <?php if ( false == get_theme_mod( 'enable_twitter_icon_team_1', false) ):?>
		                  <li><a href="<?php echo get_theme_mod( 'link_twitter_icon_team_1' );?>">
		                      <i class="fab fa-twitter"></i></a></li>
                      <?php endif; ?>
                      <!-- Instagram -->
		                  <?php if ( false == get_theme_mod( 'enable_instagram_icon_team_1', false) ):?>
		                  <li><a href="<?php echo get_theme_mod( 'link_instagram_icon_team_1' ); ?>">
		                      <i class="fab fa-instagram"></i></a></li>
		                  <?php endif; ?>
			                <!-- Linkedin -->
		                  <?php if ( false == get_theme_mod( 'enable_linkedin_icon_team_1', false) ):?>
		                  <li><a href="<?php echo get_theme_mod( 'link_linkedin_icon_team_1' ); ?>">
		                       <i class="fab fa-linkedin"></i></a></li>
		                  <?php endif; ?>
			                <!-- Google Plus-->
		                  <?php if ( false == get_theme_mod( 'enable_google_plus_icon_team_1', false) ):?>
		                  <li><a href="<?php echo get_theme_mod( 'link_google_plus_icon_team_1' ); ?>">
		                      <i class="fab fa-google-plus-g"></i></a></li>
		                  <?php endif; ?>
		               </ul>
                 </div>
			   </div>		
       </div>
           <!-- Team 2 -->
           <div class="frame col-md-4" id="wth-2" data-aos="fade-up" data-aos-duration="1500">
             <img src="<?php echo get_theme_mod('image_team_2_whoweare', get_stylesheet_directory_uri(). '/img/team-2.jpg'); ?>" 
                  alt="<?php echo get_theme_mod('alt_image_team_2_whoweare','Team 2 who we are'); ?>" />
              <div class="name-title two">
                <h4><?php echo get_theme_mod( 'title_team_2_whoweare','Julia Sender'); ?></h4>
                <h5><?php echo get_theme_mod( 'subtitle_team_2_whoweare','Project manager'); ?></h5>
              </div>
			  <div class="details">
                 <div class="avik-social-icons-team">
		            <ul class="social-team">
                      <!-- Facebook -->
                      <?php if ( false == get_theme_mod( 'enable_facebook_icon_team_2', false) ) :?>
		                  <li><a href="<?php echo get_theme_mod( 'link_facebook_icon_team_2' ,'#');?>">
		                      <i class="fab fa-facebook"></i></a></li>
			                <?php endif; ?>
			                <!-- Twitter -->
		                  <?php if ( false == get_theme_mod( 'enable_twitter_icon_team_2', false) ):?>
		                  <li><a href="<?php echo get_theme_mod( 'link_twitter_icon_team_2' );?>">
		                      <i class="fab fa-twitter"></i></a></li>
                      <?php endif; ?>
                      <!-- Instagram -->
		                  <?php if ( false == get_theme_mod( 'enable_instagram_icon_team_2', false) ):?>
		                  <li><a href="<?php echo get_theme_mod( 'link_instagram_icon_team_2' ); ?>">
		                      <i class="fab fa-instagram"></i></a></li>
		                  <?php endif; ?>
			                <!-- Linkedin -->
		                  <?php if ( false == get_theme_mod( 'enable_linkedin_icon_team_2', false) ):?>
		                  <li><a href="<?php echo get_theme_mod( 'link_linkedin_icon_team_2' ); ?>">
		                       <i class="fab fa-linkedin"></i></a></li>
		                  <?php endif; ?>
			                <!-- Google Plus-->
		                  <?php if ( false == get_theme_mod( 'enable_google_plus_icon_team_2', false) ):?>
		                  <li><a href="<?php echo get_theme_mod( 'link_google_plus_icon_team_2' ); ?>">
		                      <i class="fab fa-google-plus-g"></i></a></li>
		                  <?php endif; ?>
		            </ul>
                 </div>
			  </div>		
       </div>
           <!-- Team 3 -->
           <div class="frame col-md-4" id="wth-3" data-aos="fade-up" data-aos-duration="2000">
             <img src="<?php echo get_theme_mod('image_team_3_whoweare', get_stylesheet_directory_uri(). '/img/team-3.jpg'); ?>" 
                  alt="<?php echo get_theme_mod('alt_image_team_3_whoweare','Team 3 who we are'); ?>" />
                <div class="name-title three">
                   <h4><?php echo get_theme_mod( 'title_team_3_whoweare','Adams Smit'); ?></h4>
                   <h5><?php echo get_theme_mod( 'subtitle_team_3_whoweare','Art director'); ?></h5>
                </div>
			    <div class="details">
				   <div class="avik-social-icons-team">
		              <ul class="social-team">
                      <!-- Facebook -->
                      <?php if ( false == get_theme_mod( 'enable_facebook_icon_team_3', false) ) :?>
		                  <li><a href="<?php echo get_theme_mod( 'link_facebook_icon_team_3' ,'#');?>">
		                      <i class="fab fa-facebook"></i></a></li>
			                <?php endif; ?>
			                <!-- Twitter -->
		                  <?php if ( false == get_theme_mod( 'enable_twitter_icon_team_3', false) ):?>
		                  <li><a href="<?php echo get_theme_mod( 'link_twitter_icon_team_3' );?>">
		                      <i class="fab fa-twitter"></i></a></li>
                      <?php endif; ?>
                      <!-- Instagram -->
		                  <?php if ( false == get_theme_mod( 'enable_instagram_icon_team_3', false) ):?>
		                  <li><a href="<?php echo get_theme_mod( 'link_instagram_icon_team_3' ); ?>">
		                      <i class="fab fa-instagram"></i></a></li>
		                  <?php endif; ?>
			                <!-- Linkedin -->
		                  <?php if ( false == get_theme_mod( 'enable_linkedin_icon_team_3', false) ):?>
		                  <li><a href="<?php echo get_theme_mod( 'link_linkedin_icon_team_3' ); ?>">
		                       <i class="fab fa-linkedin"></i></a></li>
		                  <?php endif; ?>
			                <!-- Google Plus-->
		                  <?php if ( false == get_theme_mod( 'enable_google_plus_icon_team_3', false) ):?>
		                  <li><a href="<?php echo get_theme_mod( 'link_google_plus_icon_team_3' ); ?>">
		                      <i class="fab fa-google-plus-g"></i></a></li>
		                  <?php endif; ?>
		              </ul>
                   </div>
			    </div>	
		  </div>
         </div>
      </div>
  </div>
  <?php endif; ?>
  <!-- Carousel Brands -->
  <?php if ( false == get_theme_mod( 'enable_partner_whoweare', false) ) :?> 
  <?php get_template_part( 'inc/carousel-brands' ); ?>
  <?php endif; ?>
  </div>







	