<?php
/**
 * content-page-services.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.0.0
 */
 ?>

<div class="enter-services"> 
      <div class="header-image-whoweare" style="background-image:url(<?php echo get_theme_mod('image_banner_services', get_stylesheet_directory_uri(). '/img/services.jpg'); ?>)">
         <div class="text-image-services">
		      	<div id="avikservices-strings">
              <p><?php echo get_theme_mod( 'title_1_image_banner_services','AVIK'); ?> <i> <?php echo get_theme_mod( 'subtitle_1_image_banner_services','DEVELOPER'); ?></i></p>
			        <p><?php echo get_theme_mod( 'title_2_image_banner_services','AVIK'); ?> <i> <?php echo get_theme_mod( 'subtitle_2_image_banner_services','UI/UX DESIGNER'); ?></i></p>
              <p><?php echo get_theme_mod( 'title_3_image_banner_services','AVIK'); ?> <i> <?php echo get_theme_mod( 'subtitle_3_image_banner_services','WEB DEVELOPER'); ?></i></p>
			      </div>
		      	<span id="avikservices" style="white-space:pre;"></span>             
         </div>
      </div>
      <div class="container">
         <div class="tab cf is-visible">
         <?php
          $servicescontent = get_theme_mod( 'page_id_services', '' );
          $services_count = 1;
          $mod = new WP_Query( array( 'page_id' => $servicescontent ,'showposts' => $services_count ) );
          while ( $mod->have_posts() ) : $mod->the_post(); { ?>
             <h1 class="tab__title animated wow fadeInUp tab-fade text-center" ><?php the_title();?></h1>
             <div class="tab__subheading tab-fade animated text-right"><?php the_content();?></div>
                <div class="tabs__list cf">
                  <!-- Services 1 -->
                  <div class="tab__development border-enter-services tabs__list-item tabs__list-item--fourth animated wow fadeInUp tab-fadeup">
                    <div class="tab__development-img" data-aos="fade-left" data-aos-duration="2000">
                      <i class="<?php echo get_theme_mod( 'icon_1_services','fas fa-desktop'); ?> fa-3x"></i>
                    </div>
                       <h2 class="tab__development-title enter-title-services one"><?php echo get_theme_mod( 'title_icon_1_services','Custom Web Development'); ?></h2>
                       <h3 class="p-enter-services one">
                        <?php echo get_theme_mod( 'subtitle_icon_1_services','User Experience Design'); ?>
                       </h3>
                  </div>
                  <!-- Services 2 -->
                  <div class="tab__development border-enter-services tabs__list-item tabs__list-item--fourth animated wow fadeInUp tab-fadeup">
                     <div class="tab__development-img" data-aos="fade-right" data-aos-duration="2000">
                       <i class="<?php echo get_theme_mod( 'icon_2_services','fab fa-stack-overflow'); ?> fa-3x"></i>
                      </div>
                       <h2 class="tab__development-title enter-title-services two"><?php echo get_theme_mod( 'title_icon_2_services','Digital Marketing & Seo'); ?></h2>
                       <h3 class="p-enter-services two">
                       <?php echo get_theme_mod( 'subtitle_icon_2_services','Social Media Management'); ?>
                       </h3>             
                  </div>
                  <!-- Services 3 -->
                  <div class="tab__development border-enter-services tabs__list-item tabs__list-item--fourth animated wow fadeInUp tab-fadeup">
                     <div class="tab__development-img" data-aos="fade-left" data-aos-duration="2000">
                       <i class="<?php echo get_theme_mod( 'icon_3_services','fas fa-cog'); ?> fa-3x"></i>
                      </div>
                        <h2 class="tab__development-title enter-title-services three"><?php echo get_theme_mod( 'title_icon_3_services','Retail Experience Design'); ?></h2>
                        <h3 class="p-enter-services three">
                        <?php echo get_theme_mod( 'subtitle_icon_3_services','Website Development'); ?>
                        </h3>           
                  </div>
                  <!-- Services 4 -->
                  <div class="tab__development border-enter-services tabs__list-item tabs__list-item--fourth animated wow fadeInUp tab-fadeup">
                     <div class="tab__development-img" data-aos="fade-right" data-aos-duration="2000">
                       <i class="<?php echo get_theme_mod( 'icon_4_services','fas fa-chart-line'); ?> fa-3x"></i>
                     </div>
                       <h2 class="tab__development-title enter-title-services four"><?php echo get_theme_mod( 'title_icon_4_services','Print and Graphic Design'); ?></h2>
                       <h3 class="p-enter-services four">
                       <?php echo get_theme_mod( 'subtitle_icon_4_services','User Experience Design'); ?>
                      </h3>           
                  </div>
                </div>
         </div>       
      </div>
      <div class="clear"></div> 
       <?php } endwhile;
          wp_reset_query();
          wp_reset_postdata(); ?>
      <!-- Partenrs -->
      <?php if ( false == get_theme_mod( 'enable_partners_services', false) ) :?>
      <div class="partners">
          <div class="title-partenrs text-center">
             <h2><?php echo get_theme_mod( 'title_partners_services','Technology Partners'); ?></h2>
		         <h3><?php echo get_theme_mod( 'subtitle_partners_services','We Get Around'); ?></h3>
          </div>
          <div class="container">
            <div class="row gray-effect-partenrs"> 
                <div class="col-md-3">
                <img data-aos="fade-up" data-aos-duration="3000" src="<?php echo get_theme_mod('image_partners_1_services', get_stylesheet_directory_uri(). '/img/jquery.png'); ?>"
                                                                 alt="<?php echo get_theme_mod('alt_image_partners_1_services','jquery logo'); ?>"/>   
                </div>
                <div class="col-md-3">
                <img  data-aos="fade-up"  src="<?php echo get_theme_mod('image_partners_2_services', get_stylesheet_directory_uri(). '/img/basecamp.png'); ?>" 
                                          alt="<?php echo get_theme_mod('alt_image_partners_2_services','basecamp logo'); ?>"/>                    
                </div>
                <div class="col-md-3">
                <img data-aos="fade-up" data-aos-duration="2500" src="<?php echo get_theme_mod('image_partners_3_services', get_stylesheet_directory_uri(). '/img/dropbox.png'); ?>" 
                                          alt="<?php echo get_theme_mod('alt_image_partners_3_services','dropbox logo'); ?>"/>  
                </div>
                <div class="col-md-3">
                <img data-aos="fade-up" data-aos-duration="3000" src="<?php echo get_theme_mod('image_partners_4_services', get_stylesheet_directory_uri(). '/img/google-analytics.png'); ?>" 
                                          alt="<?php echo get_theme_mod('alt_image_partners_4_services','google analytics logo'); ?>"/>    
                </div>
                <div class="col-md-3">
                <img data-aos="fade-up" data-aos-duration="2000" src="<?php echo get_theme_mod('image_partners_5_services', get_stylesheet_directory_uri(). '/img/shopify.png'); ?>" 
                                          alt="<?php echo get_theme_mod('alt_image_partners_5_services','shopify logo'); ?>"/>       
                </div>
                <div class="col-md-3">
                <img data-aos="fade-up" src="<?php echo get_theme_mod('image_partners_6_services', get_stylesheet_directory_uri(). '/img/html5.png'); ?>" 
                                          alt="<?php echo get_theme_mod('alt_image_partners_6_services','html5 logo'); ?>"/>                             
                </div>
                <div class="col-md-3">
                <img data-aos="fade-up" data-aos-duration="2000" src="<?php echo get_theme_mod('image_partners_7_services', get_stylesheet_directory_uri(). '/img/invision.png'); ?>" 
                                          alt="<?php echo get_theme_mod('alt_image_partners_7_services','invision logo'); ?>"/>                      
                </div>
                <div class="col-md-3">
                <img data-aos="fade-up" data-aos-duration="2000" src="<?php echo get_theme_mod('image_partners_8_services', get_stylesheet_directory_uri(). '/img/css3.png'); ?>" 
                                          alt="<?php echo get_theme_mod('alt_image_partners_8_services','css3 logo'); ?>"/>
                </div>
                <div class="col-md-3">
                <img data-aos="fade-up" data-aos-duration="3000" src="<?php echo get_theme_mod('image_partners_9_services', get_stylesheet_directory_uri(). '/img/trello.png'); ?>" 
                                          alt="<?php echo get_theme_mod('alt_image_partners_9_services','trello logo'); ?>"/>                    
                </div>
                <div class="col-md-3">
                <img data-aos="fade-up" data-aos-duration="2500" src="<?php echo get_theme_mod('image_partners_10_services', get_stylesheet_directory_uri(). '/img/javascript.png'); ?>" 
                                          alt="<?php echo get_theme_mod('alt_image_partners_10_services','javascript logo'); ?>"/>    
                </div>
                <div class="col-md-3">
                <img data-aos="fade-up" data-aos-duration="3000" src="<?php echo get_theme_mod('image_partners_11_services', get_stylesheet_directory_uri(). '/img/slack.png'); ?>" 
                                          alt="<?php echo get_theme_mod('alt_image_partners_11_services','slack logo'); ?>"/>                         
                </div>
                <div class="col-md-3">
                <img data-aos="fade-up" data-aos-duration="3000" src="<?php echo get_theme_mod('image_partners_12_services', get_stylesheet_directory_uri(). '/img/zeplin.png'); ?>" 
                                          alt="<?php echo get_theme_mod('alt_image_partners_12_services','zeplin logo'); ?>"/>                         
                </div>
            </div>
          </div>
      </div>
      <?php endif; ?>
      <!-- Price quotation -->
      <?php if ( false == get_theme_mod( 'enable_quotation_services', false) ) :?>
      <div class="content-price">
        <div class="row">
          <div class="col-md-6">
            <div class="price-quotation">
              <div class="title-price text-center">
                <div class="separator-price">
                  <h2><?php echo get_theme_mod( 'title_1_quotation_services','Avik'); ?></h2>
                    <h3><?php echo get_theme_mod( 'subtitle_1_quotation_services','is expert to webdesigner'); ?></h3>
                </div>
              </div>
              <div class="subtitle-price text-center">
                 <h3><?php echo get_theme_mod( 'title_2_quotation_services','Ready to get started?'); ?></h3>
                 <h4><?php echo get_theme_mod( 'subtitle_2_quotation_services','Request a quote'); ?></h4>
                 <?php if ( false == get_theme_mod( 'enable_arrow_quotation_services', false) ) :?>
                 <i class="fas fa-arrow-right arrow-price-animation"></i>
                 <?php endif; ?>
              </div>
            </div> 
          </div>
          <!-- Widget Contact Form -->
          <div class="col-md-6 widget-contact">
               <h3 class="text-center" data-aos="zoom-in"><?php echo get_theme_mod( 'title_project_quotation_services','Start A Project'); ?></h3>
               <?php dynamic_sidebar('widget_contact_form_services'); ?>
          </div>
        </div>
      </div>
      <?php endif; ?>
</div>
 
 








