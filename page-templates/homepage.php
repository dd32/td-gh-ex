<?php
/* Template Name: Homepage */
get_header(); ?>
<!-- Section start -->
<section>
    <!-- Slider Section -->
<div class="banner">            
    <div id="slider-carousel" class="carousel zoomIn garden-slider" data-ride="carousel">
        <div class="carousel-inner slider">
            <?php $indicators=0;$avocation_loop_active=0;
            for($avocation_loop=1 ; $avocation_loop <=5 ; $avocation_loop++):          
                $sliderimage_image = get_theme_mod ( 'avocation_homepage_sliderimage'.$avocation_loop.'_image');

                $sliderimage_title = get_theme_mod ( 'avocation_homepage_sliderimage'.$avocation_loop.'_title');
                $sliderimage_content = get_theme_mod ( 'avocation_homepage_sliderimage'.$avocation_loop.'_subtitle');
                
                $sliderimage_link  = get_theme_mod ( 'avocation_homepage_sliderimage'.$avocation_loop.'_link');
            ?>

            <?php if($sliderimage_image!=''){
                $avocation_loop_active++;
                $sliderimage_image_url = wp_get_attachment_image_src($sliderimage_image,'full');
            ?>
            <div class="item <?php if($avocation_loop_active == 1) { echo "active"; } ?>">
                <?php if($sliderimage_link!='') { ?>
                
                    <img src="<?php echo esc_url($sliderimage_image_url[0]); ?>" alt="<?php echo $avocation_loop;?>" />
                    <div class="effect-hover">
                        <h3><?php echo esc_html($sliderimage_title); ?></h3>
                        <p><?php echo esc_html($sliderimage_content);?></p>
                        <p><a href="<?php echo esc_url($sliderimage_link);?>" target="_blank"><?php esc_html_e('Read More','avocation'); ?></a></p>
                    </div>
                
                <?php } else { ?>                          
                    <img src="<?php echo esc_url($sliderimage_image_url[0]); ?>" alt="<?php echo $avocation_loop;?>" />
                    <div class="effect-hover">
                        <h3><?php echo esc_html($sliderimage_title); ?></h3>
                    </div>
                <?php } ?>  
            </div>  
            <?php $indicators++;}  endfor; ?>
        </div>
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php for($avocation_loop=1 ; $avocation_loop<=$indicators ; $avocation_loop++):  ?>
            <li data-target="#slider-carousel" data-slide-to="<?php echo ($avocation_loop-1); ?>"></li>
            <?php endfor; ?>
        </ol>
        <?php if($avocation_loop_active >= 2) { ?>       
        <a class="left carousel-control slider_button" href="#slider-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right carousel-control slider_button" href="#slider-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
        <?php } ?>
    </div>
</div>
<!-- Slider Section -->
    <!--About-us  Start-->
    <div class="aboutus-wrap">        
        <div class="avocation-container  container aboutus-box"> 
          <div class="blog-wrap">
            <div class="title-box">
        <?php if(get_theme_mod( 'avocation_homepage_aboutus_title','') != '' ) { ?>
                <h2 class="content-heading"><?php echo esc_attr( get_theme_mod('avocation_homepage_aboutus_title', '') ); ?></h2> 
               <?php  if(get_theme_mod( 'avocation_homepage_aboutus_subtitle','') != '') { ?>
                <p class="description"><?php echo wp_kses_post( get_theme_mod('avocation_homepage_aboutus_subtitle', '') ); ?></p> 
        <?php }
            } ?>
            </div>
          </div>
        <?php if(get_theme_mod( 'avocation_homepage_aboutus_image','') != '' || get_theme_mod( 'avocation_homepage_aboutus_desc','') != ''){ ?>
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <div class="about-us-text">
                        <?php if(get_theme_mod( 'avocation_homepage_aboutus_desc','') != ''):?>
                            <p><?php echo wp_kses_post( get_theme_mod('avocation_homepage_aboutus_desc', '') ); ?></p>
                        <?php endif; ?>    
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                    <?php if(get_theme_mod( 'avocation_homepage_aboutus_image','') != ''):
                    $sliderimage_image_url = wp_get_attachment_image_src(get_theme_mod( 'avocation_homepage_aboutus_image'),'full');?>
                        <div class="about-us-image"><img src="<?php echo esc_url($sliderimage_image_url[0]); ?>" /> </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <!--About-us  End-->
    <!--Purpose-Business  Start-->
    <div class="business-wrap">
        <span class="mask-overlay"></span>
        <div class="avocation-container  container business-box"> 
        <?php $purpose_check = get_theme_mod( 'avocation_purposetitle' );
            if(!empty($purpose_check)) { ?>
                <h2><?php echo esc_attr( get_theme_mod('avocation_purposetitle', '') ); ?></h2> 
            <?php } 
            $purposeinfo_check = get_theme_mod( 'avocation_purposeinfo' );
            if(!empty($purposeinfo_check)) { ?>
                <p><?php echo esc_textarea( get_theme_mod('avocation_purposeinfo', '') ); ?></p> 
            <?php } ?>
        </div>
    </div>
    <!--Purpose-Business End-->
    <!--Our-Blog  Start-->
    <div class="avocation-container  container"> 
        <div class="blog-wrap">
            <div class="title-box">
           <?php $blog_check = get_theme_mod( 'avocation_blog-title' );
                if(!empty($blog_check)) {?>
                    <h2 class="content-heading"><?php  echo esc_html( get_theme_mod('avocation_blog-title', '') ); ?></h2>
                <?php }
                else { ?>
                    <h2 class="content-heading"> <?php esc_html_e('Our Blog', 'avocation'); ?> </h2> 
                <?php }
                $bloginfo_check = get_theme_mod( 'avocation_bloginfo' );
                if(!empty($bloginfo_check)) { ?>
                    <p class="description"><?php  echo esc_attr( get_theme_mod('avocation_bloginfo', '') ); ?></p>
             <?php } ?>
        </div>
        <div class="row ">
            <div class="blog-slider" id="blog_slide">
                <?php $avocation_blogcategory=get_theme_mod('avocation_blogcategory');
                $avocation_args = array(
                    'ignore_sticky_posts' => '1',
                    'meta_query' => array(
                        array(
                            'key' => '_thumbnail_id',
                            'compare' => 'EXISTS'
                        ),
                    )
                );
                if(!empty($avocation_blogcategory))
					$avocation_args['cat']=$avocation_blogcategory;
                $avocation_query = new WP_Query($avocation_args);
                if ($avocation_query->have_posts()) : while ($avocation_query->have_posts()) : $avocation_query->the_post(); ?>
                        <div class="blog-box item">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="blog-box-img">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('avocation-latest-post-homepage', array('alt' => esc_attr(get_the_title()), 'class' => 'img-responsive')); ?></a>
                                </div>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="blog-title"><?php the_title(); ?></a>
                            <div class="blog-meta">  
                                <ul>
                                    <li> <i class="fa fa-calendar"></i> <a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))); ?>">  <?php the_time(get_option('date_format')); ?> </a></li>
                                    <li> <i class="fa fa-user"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">  <?php the_author(); ?>  </a></li>    
                                </ul>
                            </div>
                            <div class="our-blog-details">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    <?php endwhile;
                        wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<!--Our-Blog End-->
</section>
<!-- Section end -->
<?php get_footer(); ?>