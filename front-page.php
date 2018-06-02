<?php
/**
 * front-page.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.1.0
 */
?>

<?php get_header(); 

 // Slider/Video/Static

  get_template_part( 'template-parts/content',esc_attr( get_theme_mod('avik_order_header_home','page-static') )); ?>

 <!-- Section Who we are --> 

   <?php
   $whowearecontent = esc_attr( get_theme_mod( 'avik_page_id_whoweare', '' ));
   $whoweare_count = 1;
   $mod = new WP_Query( array( 'page_id' => $whowearecontent ,'showposts' => $whoweare_count ) );
   while ( $mod->have_posts() ) : $mod->the_post(); { ?>
   <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
  <section id="who-we-are" class="avik-who-we-are">
    <div class="row m-0">
      <div class="col-xs-12 col-sm-4">
        <!-- Title who-we-are -->
        <h3><?php the_title();?></h3>
          <div><?php the_excerpt();?></div>
             <div class="avik-btn-who-we-are">
             <a href="<?php the_permalink();?>" class="btn btn-avik" role="button" aria-pressed="true" data-aos="zoom-in" data-aos-duration="2000"><?php esc_html_e('Read more...','avik'); ?></a>
             </div>
      </div>
      <div class="col-xs-12 col-sm-8 who-we-are-image-frame">
          <div class="col-xs-12 row">
              <!-- Image 1 who we are -->
              <div class="first-image-who-we-are" data-aos="fade-right" data-aos-duration="2000">
                  <img class="img-who-we-are border-who-we-are" src="<?php echo esc_url( get_theme_mod('avik_image_whoweare', get_stylesheet_directory_uri(). '/img/avik-whoweare.jpg')); ?>"
                         alt="<?php echo esc_attr( get_theme_mod('avik_alt_image_whoweare','who we are')); ?>" />
              </div>
              <!-- Image 2 who we are -->
              <div class="second-image-who-we-are" data-aos="fade-left" data-aos-duration="2000">
              <img class="img-who-we-are border-who-we-are" src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>" 
              alt="<?php echo esc_attr( get_theme_mod('avik_alt_image_2_whoweare','who we are 2')); ?>"/>
              </div>
          </div>
      </div>
    </div>
  </section>
  <div class="clear"></div> 
 <?php }
   endwhile;
   wp_reset_query();
   wp_reset_postdata(); ?>

<!-- Section Services -->

 <?php
   $servicescontent = esc_attr( get_theme_mod( 'avik_page_id_services', '' ));
   $services_count = 1;
   $mod = new WP_Query( array( 'page_id' => $servicescontent ,'showposts' => $services_count ) );
   while ( $mod->have_posts() ) : $mod->the_post(); { ?>
 <section class="tabs" id="services">
        <div class="tab cf is-visible"> 
          <div class="container">
            <h1 class="tab__title animated wow fadeInUp tab-fade text-right"><?php the_title();?></h1>
            <div class="tab__subheading tab-fade animated text-right"><?php the_excerpt();?></div>
            <ul class="tabs__list cf">
              <!-- Services 1 -->
              <li class="tab__development tabs__list-item tabs__list-item--fourth animated wow fadeInUp tab-fadeup">
                <div class="tab__development-img" data-aos="fade-left" data-aos-duration="2000">
                  <i class="<?php echo esc_attr( get_theme_mod( 'avik_icon_1_services','fas fa-desktop')); ?> fa-3x"></i>
                </div> 
                <h2 class="tab__development-title one"><?php echo esc_html( get_theme_mod( 'avik_title_icon_1_services','Custom Web Development')); ?></h2>
                <a href="<?php the_permalink();?>" class="btn btn-avik" role="button" aria-pressed="true" data-aos="zoom-in" data-aos-duration="2000"><?php esc_html_e('Read more...','avik'); ?></a>
              </li>
              <!-- Services 2 -->
              <li class="tab__development tabs__list-item tabs__list-item--fourth animated wow fadeInUp tab-fadeup">
                <div class="tab__development-img" data-aos="fade-right" data-aos-duration="2000">
                  <i class="<?php echo esc_attr( get_theme_mod( 'avik_icon_2_services','fab fa-stack-overflow')); ?> fa-3x"></i>
                </div>
                <h2 class="tab__development-title two"><?php echo esc_html( get_theme_mod( 'avik_title_icon_2_services','Digital Marketing & Seo')); ?></h2>
                <a href="<?php the_permalink();?>" class="btn btn-avik" role="button" aria-pressed="true" data-aos="zoom-in" data-aos-duration="2000"><?php esc_html_e('Read more...','avik'); ?></a>        
              </li>
              <!-- Services 3 -->
              <li class="tab__development tabs__list-item tabs__list-item--fourth animated wow fadeInUp tab-fadeup">
                <div class="tab__development-img" data-aos="fade-left" data-aos-duration="2000">
                  <i class="<?php echo esc_attr( get_theme_mod( 'avik_icon_3_services','fas fa-cog')); ?> fa-3x"></i>
                </div>
                <h2 class="tab__development-title three"><?php echo esc_html( get_theme_mod( 'avik_title_icon_3_services','Retail Experience Design')); ?></h2>
                <a href="<?php the_permalink();?>" class="btn btn-avik" role="button" aria-pressed="true" data-aos="zoom-in" data-aos-duration="2000"><?php esc_html_e('Read more...','avik'); ?></a>
              </li>
              <!-- Services 4 -->
              <li class="tab__development tabs__list-item tabs__list-item--fourth animated wow fadeInUp tab-fadeup">
                <div class="tab__development-img" data-aos="fade-right" data-aos-duration="2000">
                  <i class="<?php echo esc_attr( get_theme_mod( 'avik_icon_4_services','fas fa-chart-line')); ?> fa-3x"></i>
                </div>
                <h2 class="tab__development-title four"><?php echo esc_html(get_theme_mod( 'avik_title_icon_4_services','Print and Graphic Design')); ?></h2>
                <a href="<?php the_permalink();?>" class="btn btn-avik" role="button" aria-pressed="true" data-aos="zoom-in" data-aos-duration="2000"><?php esc_html_e('Read more...','avik'); ?></a>
              </li>
            </ul>
          </div>       
        </div>    
      </section>
      <?php } 
        endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>

<!--Section Portfolio -->

<section class="portfolio" id="portfolio">
<div class="container">
   <!-- Control tab Portfolio -->
   <div id="control-portfolio">
   <h3><?php echo esc_html( get_theme_mod( 'avik_title_portfolio','Portfolio')); ?></h3>
    <ul class="list-portfolio">
      <li class="portfolio-active all" onclick="avikfilterSelection('all')"><?php echo esc_html( get_theme_mod( 'avik_title_nav_all_portfolio','All')); ?></li>
      <li class="portfolio-active one" onclick="avikfilterSelection('1')"><?php echo esc_html( get_theme_mod( 'avik_title_nav_1_portfolio','Web Design')); ?></li>
      <li class="portfolio-active two " onclick="avikfilterSelection('2')"><?php echo esc_html( get_theme_mod( 'avik_title_nav_2_portfolio','Themes')); ?></li>
      <li class="portfolio-active three" onclick="avikfilterSelection('3')"><?php echo esc_html( get_theme_mod( 'avik_title_nav_3_portfolio','Plugins')); ?></li>
    </ul>
   </div>
   <div class="row">
        <!-- Column 1 -->
        <!-- Portfolio 1 column 1 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_1_id_portfolio_1', false) )) :?>
        <?php
        $portfolio_1_c_1_content = esc_attr( get_theme_mod( 'avik_column_1_id_portfolio_1', '' ));
        $portfolio_1_c_1_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_1_c_1_content ,'showposts' => $portfolio_1_c_1_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
			  <div class="col-md-4 col-ms-6 column 1 tabcontent">
          <div class="content avik-portfolio">
           <a href="<?php the_permalink();?>">
             <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_1_id_portfolio_1', true) )) :?>
              <i class="fas fa-play video"></i>
              <?php endif; ?> 
              <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>" 
              alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_1_c_1','Portfolio 1')); ?>"/></a>
          </div>
          </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>  
        <!-- Portfolio 2 column 1 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_1_id_portfolio_2', false) )) :?>
        <?php
        $portfolio_2_c_1_content = esc_attr( get_theme_mod( 'avik_column_1_id_portfolio_2', '' ));
        $portfolio_2_c_1_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_2_c_1_content ,'showposts' => $portfolio_2_c_1_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 1 tabcontent">
          <div class="content avik-portfolio">
           <a href="<?php the_permalink();?>">
            <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_1_id_portfolio_2', false) )) :?>
              <i class="fas fa-play video"></i>
             <?php endif; ?>
              <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_2_c_1','Portfolio 2')); ?>"/></a>   
          </div>
        </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>         

        <!-- Portfolio 3 column 1 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_1_id_portfolio_3', true) )) :?>
        <?php
        $portfolio_3_c_1_content = esc_attr(get_theme_mod( 'avik_column_1_id_portfolio_3', '' ));
        $portfolio_3_c_1_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_3_c_1_content ,'showposts' => $portfolio_3_c_1_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 1 tabcontent">
           <div class="content avik-portfolio">
					  <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_1_id_portfolio_3', true) )) :?>
              <i class="fas fa-play video"></i>
              <?php endif; ?>
              <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_3_c_1','Portfolio 3')); ?>" /></a>
           </div>
        </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>        
        <!-- Portfolio 4 column 1 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_1_id_portfolio_4', true) )) :?>
        <?php
        $portfolio_4_c_1_content = esc_attr( get_theme_mod( 'avik_column_1_id_portfolio_4', '' ));
        $portfolio_4_c_1_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_4_c_1_content ,'showposts' => $portfolio_4_c_1_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 1 tabcontent">
           <div class="content avik-portfolio">
             <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_1_id_portfolio_4', true) )) :?>
              <i class="fas fa-play video"></i>
              <?php endif; ?>
              <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_4_c_1','Portfolio 4')); ?>" /></a>
           </div>
        </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>         
        <!-- Portfolio 5 column 1 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_1_id_portfolio_5', true) )) :?>
        <?php
        $portfolio_5_c_1_content = esc_attr( get_theme_mod( 'avik_column_1_id_portfolio_5', '' ));
        $portfolio_5_c_1_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_5_c_1_content ,'showposts' => $portfolio_5_c_1_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 1 tabcontent">
           <div class="content avik-portfolio">
             <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_1_id_portfolio_5', true) ) ):?>
              <i class="fas fa-play video"></i>
              <?php endif; ?>
              <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_5_c_1','Portfolio 5')); ?>" /></a>
           </div>
        </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>         
        <!-- Portfolio 6 column 1 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_1_id_portfolio_6', true) )) :?>
        <?php
        $portfolio_6_c_1_content = esc_attr( get_theme_mod( 'avik_column_1_id_portfolio_6', '' ));
        $portfolio_6_c_1_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_6_c_1_content ,'showposts' => $portfolio_6_c_1_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 1 tabcontent">
           <div class="content avik-portfolio">
             <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_1_id_portfolio_6', true) )) :?>
              <i class="fas fa-play video"></i>
              <?php endif; ?> 
              <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_6_c_1','Portfolio 6')); ?>"/></a>
           </div>
        </div>
        <?php } endwhile; 
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?> 
        <!-- Column 2 --> 
        <!-- Portfolio 1 column 2 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_2_id_portfolio_1', true) )) :?>
        <?php
        $portfolio_1_c_2_content = esc_attr( get_theme_mod( 'avik_column_2_id_portfolio_1', '' ));
        $portfolio_1_c_2_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_1_c_2_content ,'showposts' => $portfolio_1_c_2_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
			  <div class="col-md-4 col-ms-6 column 2 tabcontent">
          <div class="content avik-portfolio">
           <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_2_id_portfolio_1', true) )) :?>
              <i class="fas fa-play video"></i>
              <?php endif; ?> 
              <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>" 
              alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_1_c_2','Portfolio 1')); ?>" /></a>
          </div>
          </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>      
        <!-- Portfolio 2 column 2 -->
        <?php if ( false == esc_attr(get_theme_mod( 'avik_enable_column_2_id_portfolio_2', true) )) :?>
        <?php
        $portfolio_2_c_2_content = esc_attr(get_theme_mod( 'avik_column_2_id_portfolio_2', '' ));
        $portfolio_2_c_2_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_2_c_2_content ,'showposts' => $portfolio_2_c_2_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 2 tabcontent">
          <div class="content avik-portfolio">
          <a href="<?php the_permalink();?>"><?php if ( false == esc_attr(get_theme_mod( 'avik_enable_icon_video_column_2_id_portfolio_2', false) )) :?>
            <i class="fas fa-play video"></i>
            <?php endif; ?> 
            <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr(get_theme_mod( 'avik_alt_portfolio_2_c_2','Portfolio 2')); ?>" /></a>   
          </div>
        </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>         
        <!-- Portfolio 3 column 2 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_2_id_portfolio_3', false) ) ):?>
        <?php
        $portfolio_3_c_2_content = esc_attr( get_theme_mod( 'avik_column_2_id_portfolio_3', '' ));
        $portfolio_3_c_2_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_3_c_2_content,'showposts' => $portfolio_3_c_2_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 2 tabcontent">
           <div class="content avik-portfolio">
					  <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_2_id_portfolio_3', true) )) :?>
            <i class="fas fa-play video"></i>
            <?php endif; ?> 
            <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_3_c_2','Portfolio 2')); ?>" /></a>
           </div>
        </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>        
        <!-- Portfolio 4 column 2 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_2_id_portfolio_4', false) )) :?>
        <?php
        $portfolio_4_c_2_content = esc_attr( get_theme_mod( 'avik_column_2_id_portfolio_4', '' ));
        $portfolio_4_c_2_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_4_c_2_content ,'showposts' => $portfolio_4_c_2_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 2 tabcontent">
           <div class="content avik-portfolio">
             <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_2_id_portfolio_4', true) )) :?>
            <i class="fas fa-play video"></i>
            <?php endif; ?> 
            <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_4_c_2','Portfolio 4')); ?>" /></a>
           </div>
        </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>         
        <!-- Portfolio 5 column 2 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_2_id_portfolio_5', true) )) :?>
        <?php
        $portfolio_5_c_2_content = esc_attr( get_theme_mod( 'avik_column_2_id_portfolio_5', '' ));
        $portfolio_5_c_2_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_5_c_2_content ,'showposts' => $portfolio_5_c_2_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 2 tabcontent">
           <div class="content avik-portfolio">
             <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_2_id_portfolio_5', true) )) :?>
            <i class="fas fa-play video"></i>
            <?php endif; ?> 
            <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_5_c_2','Portfolio 5')); ?>" /></a>
           </div>
        </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>         
        <!-- Portfolio 6 column 2 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_2_id_portfolio_6', true) )) :?>
        <?php
        $portfolio_6_c_2_content = esc_attr( get_theme_mod( 'avik_column_2_id_portfolio_6', '' ));
        $portfolio_6_c_2_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_6_c_2_content ,'showposts' => $portfolio_6_c_2_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 2 tabcontent">
           <div class="content avik-portfolio">
             <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_2_id_portfolio_6', true) )) :?>
            <i class="fas fa-play video"></i>
            <?php endif; ?> 
            <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_6_c_2','Portfolio 6')); ?>" /></a>
           </div>
        </div>
        <?php } endwhile; 
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>
        <!-- Column 3 --> 
        <!-- Portfolio 1 column 3 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_3_id_portfolio_1', true) )) :?>
        <?php
        $portfolio_1_c_3_content = esc_attr( get_theme_mod( 'avik_column_3_id_portfolio_1', '' ));
        $portfolio_1_c_3_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_1_c_3_content ,'showposts' => $portfolio_1_c_3_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
			  <div class="col-md-4 col-ms-6 column 3 tabcontent">
          <div class="content avik-portfolio">
           <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_3_id_portfolio_1', true) )) :?>
            <i class="fas fa-play video"></i>
            <?php endif; ?> 
            <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_1_c_3','Portfolio 1')); ?>" /></a>
          </div>
          </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>      
        <!-- Portfolio 2 column 3 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_3_id_portfolio_2', true) )) :?>
        <?php
        $portfolio_2_c_3_content = esc_attr( get_theme_mod( 'avik_column_3_id_portfolio_2', '' ));
        $portfolio_2_c_3_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_2_c_3_content ,'showposts' => $portfolio_2_c_3_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 3 tabcontent">
          <div class="content avik-portfolio">
           <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_3_id_portfolio_2', false) )) :?>
            <i class="fas fa-play video"></i>
            <?php endif; ?> 
            <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>" 
              alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_2_c_3','Portfolio 2')); ?>" /></a>   
          </div>
        </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>         
        <!-- Portfolio 3 column 2 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_3_id_portfolio_3', true) )) :?>
        <?php
        $portfolio_3_c_3_content = esc_attr( get_theme_mod( 'avik_column_3_id_portfolio_3', '' ));
        $portfolio_3_c_3_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_3_c_3_content,'showposts' => $portfolio_3_c_3_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 3 tabcontent">
           <div class="content avik-portfolio">
					  <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_3_id_portfolio_3', true) )) :?>
            <i class="fas fa-play video"></i>
            <?php endif; ?> 
            <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>" 
              alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_3_c_3','Portfolio 3')); ?>" /></a>
           </div>
        </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>        
        <!-- Portfolio 4 column 3 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_3_id_portfolio_4', true) )) :?>
        <?php
        $portfolio_4_c_3_content = esc_attr( get_theme_mod( 'avik_column_3_id_portfolio_4', '' ));
        $portfolio_4_c_3_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_4_c_3_content ,'showposts' => $portfolio_4_c_3_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 3 tabcontent">
           <div class="content avik-portfolio">
             <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_3_id_portfolio_4', true) )) :?>
            <i class="fas fa-play video"></i>
            <?php endif; ?> 
            <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_4_c_3','Portfolio 4')); ?>" /></a>
           </div>
        </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>         
        <!-- Portfolio 5 column 3 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_3_id_portfolio_5', false) ) ):?>
        <?php
        $portfolio_5_c_3_content = esc_attr( get_theme_mod( 'avik_column_3_id_portfolio_5', '' ));
        $portfolio_5_c_3_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_5_c_3_content ,'showposts' => $portfolio_5_c_3_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 3 tabcontent">
           <div class="content avik-portfolio">
             <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_3_id_portfolio_5', true) )) :?>
            <i class="fas fa-play video"></i>
            <?php endif; ?> 
            <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_5_c_3','Portfolio 5')); ?>" /></a>
           </div>
        </div>
        <?php } endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>         
        <!-- Portfolio 6 column 3 -->
        <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_column_3_id_portfolio_6', false) )) :?>
        <?php
        $portfolio_6_c_3_content= esc_attr( get_theme_mod( 'avik_column_3_id_portfolio_6', '' ));
        $portfolio_6_c_3_count = 1;
        $mod = new WP_Query( array( 'page_id' => $portfolio_6_c_3_content ,'showposts' => $portfolio_6_c_3_count ) );
        while ( $mod->have_posts() ) : $mod->the_post(); { ?>
        <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
        <div class="col-md-4 col-ms-6 column 3 tabcontent">
           <div class="content avik-portfolio">
             <a href="<?php the_permalink();?>"><?php if ( false == esc_attr( get_theme_mod( 'avik_enable_icon_video_column_3_id_portfolio_6', true) )) :?>
            <i class="fas fa-play video"></i>
            <?php endif; ?> 
            <img src="<?php if ( $avik_image_attributes[0] ) : 
              echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>"
               alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_portfolio_6_c_3','Portfolio 6')); ?>" /></a>
           </div>
        </div>
        <?php } endwhile; 
        wp_reset_query();
        wp_reset_postdata(); ?>
        <?php endif; ?>           
        <div class="clearfix"></div>
    </div> 
	</div>	
</section>
 

<!-- Section Avik-Blog -->

<section class="avik-blog" id="avik-blog">
      <div class="container">
          <div class="row">
            <div class="col-sm-12">
                <h2 class="text-right blog pb-5" data-aos="zoom-in"><?php echo esc_html( get_theme_mod( 'avik_title_blog','Latest News')); ?></h2>
                  <div class="row">
                   <?php
	                  $blog_cat = esc_attr( get_theme_mod('avik_blog_category'));
	                  $blog_count =3;
	                  $new_query = new WP_Query( array( 'cat' => $blog_cat  , 'showposts' => $blog_count ));
	                  while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
                     <?php $avik_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'avik_big');?>
                    <!-- Blog 1 -->
                    <a href="<?php the_permalink();?>" class="col-lg-4 col-md-4 col-sm-6 col-xs-12 link-blog" data-aos="fade-up">
                      <div class="blog-image">
                         <img src="<?php if ( $avik_image_attributes[0] ) : 
                           echo $avik_image_attributes[0]; else: echo get_template_directory_uri().'/images/avik-default.jpg'; endif; ?>" alt="Card image cap">
                      </div>
                         <h2 class="blog-title"><?php the_title();?></h2>
                         <div class="blog-subtitle"><?php the_excerpt();?></div>
                         <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_time_comment_blog_home', false) )) :?>
                         <div class="ciao">
                         <span class="blog-info"><i class="far fa-calendar"></i><?php echo get_the_date (); ?></span>
                         <span class="blog-info"><i class="fas fa-comment"></i><?php comments_number( '0 comment', '1 comment', '% comments' ); ?></span>
                         </div>
                         <?php endif; ?> 
                     </a>
                    <?php endwhile; 
                      wp_reset_query();
                      wp_reset_postdata(); ?>
                  </div>
            </div>
          </div>
        </div>
  </section>
  <div class="clear"></div>

  <!-- Section Contact -->

  <section class="contact" id="contact">
     <div class="row paddong-contact">
       <!-- Address -->
       <div class="col-lg-6 address">
         <h3 data-aos="fade-up"><?php echo esc_html( get_theme_mod( 'avik_title_contact','Contact')); ?></h3>
           <ul class="contact-info">
            <li class="state"><?php echo esc_html(get_theme_mod( 'avik_title_state_contact','Street Norcino,&nbsp; 5 - 44049 Vigarano Mainarda')); ?></li>
            <li class="city"><?php echo esc_html(get_theme_mod( 'avik_title_city_contact','Ferrara - Italia - ')); ?></li>
            <li class="mail"><?php echo esc_html(get_theme_mod( 'avik_title_mail_contact','hi@avik.com')); ?></li>
            <li class="phone"><?php echo esc_html(get_theme_mod( 'avik_title_phone_contact','800 999 999 999')); ?></li>
           </ul>
           <!-- Social Icons Contact -->
           <div class="avik-social-icons-contact" data-aos="zoom-in">
		         <ul class="avik-social-icons-contact-ul">
              <?php get_template_part( 'inc/social' ); ?>
		         </ul>
           </div>
       </div>
       <!-- Widget Contact Form -->
       <div class="col-lg-6 widget-contact">
          <h3 class="text-center" data-aos="zoom-in"><?php echo esc_html( get_theme_mod( 'avik_title_widget_contact','Send us a message')); ?></h3>
           <?php dynamic_sidebar('widget_contact_form'); ?>
       </div>
     </div>
     <!-- Map -->
     <?php if ( false == esc_attr( get_theme_mod( 'avik_enable_map_contact', false) )) :?>
     <div class="avik-map">
     <a href="<?php echo esc_url( get_theme_mod( 'avik_link_map','https://goo.gl/maps/Sus9FzQZ8w82')); ?>" target="_blank">
       <img src="<?php echo esc_url( get_theme_mod( 'avik_image_map', get_stylesheet_directory_uri(). '/img/map.png' )); ?>" alt="<?php echo esc_attr( get_theme_mod( 'avik_alt_image_map','Map Avik')); ?>" /></a>
     </div>
     <?php endif; ?> 
  </section>


<?php get_footer(); ?>
