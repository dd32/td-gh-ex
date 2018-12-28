<?php
/**
 * Template Name: Home Page
 * @package Best Classifieds
 */
get_header();
if(is_home()){ ?>
    <div class="featured_wrap">
    <div class="container">
        <?php
        $blog_layout_class = (get_theme_mod('sidebar_style', 'right_sidebar') == 'left_sidebar') ? "9" : ((get_theme_mod('sidebar_style', 'right_sidebar') == 'right_sidebar') ? "9" : "12");
        if (get_theme_mod('sidebar_style', 'right_sidebar') == 'left_sidebar') {
            ?>
            <!-- Left sidebar -->
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="sidebar">
                <div class="<?php echo esc_attr(get_theme_mod('sidebar_style')); ?>">
                    <?php get_sidebar(); ?>     
                </div>
            </div>
            </div> <!-- and Left sidebar -->
        <?php } ?>
        <!-- content -->
        <div class="col-md-<?php echo esc_attr($blog_layout_class); ?> col-sm-9 col-xs-12">
            <div class="memory_block ">
                 <h3 class="widget-title"><?php esc_html_e("Blog",'best-classifieds'); ?></h3>
                <?php
                $icounter = 1;
                while (have_posts()) : the_post();
                    $icounter = ($icounter > 2) ? 1 : $icounter;
                    ?>
                    <div class="every_people">  
                        <div class="every_sec">  
                          <div class="post_box">
                            <ul>  
                                <?php get_template_part('template-parts/content', 'blog'); ?> 
                            </ul>
                          </div>
                        </div>
                    </div>
                    <?php if ($icounter == 2): ?>
                        <div class="clearfix"></div>
                    <?php endif; 
                $icounter++;
                endwhile; // End of the loop.
                 the_posts_pagination( array(
                    'screen_reader_text' => ' ', 
                    'prev_text' => __( '<i class="fa fa-arrow-left" aria-hidden="true"></i>', 'best-classifieds' ),
                   'next_text' => __( '<i class="fa fa-arrow-right" aria-hidden="true"></i>', 'best-classifieds' )));
                ?>
            </div>
        </div><!-- and content -->
        <?php if (get_theme_mod('sidebar_style', 'right_sidebar') == 'right_sidebar') { ?>
            <!-- right sidebar -->
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="sidebar">
                    <?php get_sidebar(); ?>     
                </div>
            </div> <!-- and right sidebar -->
        <?php } ?>
    </div><!-- and Main  -->
</div>
<?php 
}else{ 
  $theme_i = 0;  if(!get_theme_mod('frontpage_slider_sectionswitch',false)): ?>   
     <!--/////START MAIN SLIDER/////-->    
    <div class="main">
        <!--/////START MAIN SLIDER/////-->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!--Wrapper for slides-->
            <div class="carousel-inner main-slide" role="listbox">
            <?php 
            for ($theme_loop = 1; $theme_loop <= 5; $theme_loop++):  
                $sliderimage_image = wp_get_attachment_url(get_theme_mod ( 'homepage_sliderimage'.$theme_loop.'_image'));
                $sliderimage_title = get_theme_mod ( 'homepage_sliderimage'.$theme_loop.'_title');
                $sliderimage_subtitle = get_theme_mod ( 'homepage_sliderimage'.$theme_loop.'_subtitle','');
                $sliderimage_link  = get_theme_mod ( 'homepage_sliderimage'.$theme_loop.'_link','#');
                $sliderimage_link_title  = get_theme_mod ( 'homepage_sliderimage'.$theme_loop.'_link_title',esc_html__('Buy Now','best-classifieds'));
                  
                 if($sliderimage_image!=''){  $sliderclass = ($theme_i == 0)?'active':'';?>
                <div class="item <?php echo esc_attr($sliderclass); ?> slider-<?php echo esc_attr($theme_i+1); ?>" style="background-image: url(<?php echo esc_url($sliderimage_image);?>);">
                    <div class="blur-img">
                        <!--Static Header-->
                        <div class=" container header-text">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 slider-text">
                                    <h1 class="animated fadeInUp"> <?php echo esc_html($sliderimage_title); ?></h1>
                                    <h2 class="animated fadeInUp"><?php echo esc_html($sliderimage_subtitle); ?></h2>
                                    <?php if($sliderimage_link!='' && $sliderimage_link_title!='' ):?>
                                    <div class="slider-button animated fadeInUp">
                                        <a href="<?php echo esc_url($sliderimage_link);?>"><?php echo esc_html($sliderimage_link_title);?></a>
                                    </div>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!--header-text-->
                    </div>
                </div>
                <?php $theme_i++; } 
                endfor;?>

            </div>
            <!--Wrapper for slides-->
            <?php if ($theme_i >= 2) { ?>
            <!--Left and right controls-->
            <a class="left carousel-control my-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="slide-left" aria-hidden="true"><i class="fa fa-angle-double-left fa-1x" aria-hidden="true"></i></span>
                <span class="sr-only"><?php esc_html_e('Previous','best-classifieds');?></span>
            </a>
            <a class="right carousel-control my-control" href="#myCarousel" role="button" data-slide="next">
                <span class="slide-right" aria-hidden="true"><i class="fa fa-angle-double-right fa-1x" aria-hidden="true"></i></span>
                <span class="sr-only"><?php esc_html_e('Next','best-classifieds');?></span>
            </a>
        <?php } ?>
        </div>
    </div>
    <!--/////END MAIN SLIDER/////-->
    <?php endif;
    if(!get_theme_mod('homepage_search_area_switch',false)): ?>
    <!--/////START SEARCH FILTER SECTION/////-->
    <div class="filter-wrap">
        <div class="container">
            <div class="search-filter-title">
                <h5><?php echo esc_html(get_theme_mod('homepage_search_area_title','Search Awesome Verified Ads!'));?></h5>
            </div>
            <div class="search-filter">
                <div class="row">
                    <form action="<?php echo esc_url(site_url()); ?>" role="search" method="get" id="searchformtop">
                        <div class="filter-category">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">    
                                   
                                        <input type="search"  placeholder="<?php echo esc_attr(get_theme_mod('search_area_placeholder','What are you looking for?')); ?>" name="s" id="s" required="">
                                    
                            </div>                        
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <input type="submit" value="<?php echo esc_html(get_theme_mod('search_area_btn_title','Search')); ?>">
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
    <!--/////END SEARCH FILTER SECTION/////-->   
    <?php endif;
    if(!get_theme_mod('homepage_category_area_switch',false)): ?>
    <div class="category-list-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="main-heading">
                        <?php if(get_theme_mod('homepage_category_area_title','Categories')!=''): ?>
                        <h1 class="heading-title"><?php echo esc_html(get_theme_mod('homepage_category_area_title','Categories')); ?></h1>                    
                        <div class="title-divider">
                            <span></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="main-cat-listing">
                <div class="row">
                    <?php $i= 1;
                     $args             = array('orderby'    => 'id','hide_empty' => 0,);
                     $categories       = get_categories( $args );
                     foreach ( $categories as $category_list ) :
                     $cat_img = wp_get_attachment_image_url(get_theme_mod('category_img_' .  $category_list->cat_ID )); 
                     if(get_theme_mod('category_switch_'.$category_list->cat_ID,false)): ?>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="category-box">
                            <?php if($cat_img!=''): ?>
                            <div class="category-icon">
                                <a href="<?php echo esc_url(get_category_link($category_list->cat_ID));?>"><img src="<?php echo esc_url($cat_img); ?>"></a>
                            </div>
                        <?php endif; ?>
                            <div class="category-title">
                                <h2><a href="<?php echo esc_url(get_category_link($category_list->cat_ID));?>"><?php echo esc_html($category_list->cat_name); ?></a></h2>
                            </div>
                        </div>
                    </div>
                    <?php endif; endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <?php endif;
    if(!get_theme_mod('homepage_keyfeature_switch',false)): 
    $category_list = get_theme_mod('homepage_keyfeature_category','');
    $perpage = 6;    
    if($category_list>0):
    $best_classifieds_keyfeature_post = new WP_Query( apply_filters( 'front_page_keyfeature_posts_args', array( 'posts_per_page' => $perpage,'category__in' => $category_list, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) ); 
    else:
    $best_classifieds_keyfeature_post = new WP_Query( apply_filters( 'front_page_keyfeature_posts_args', array( 'posts_per_page' => $perpage, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) ); 
    endif; ?>
    <!--/////START Why we are Section/////-->
    <div class="whyWeAre-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="main-heading">
                        <?php if(get_theme_mod('homepage_keyfeature_title','Why we are best')!=''): ?>
                        <h1 class="heading-title"><?php echo esc_html(get_theme_mod('homepage_keyfeature_title','Why we are best')); ?></h1>
                        <?php endif; if(get_theme_mod('homepage_keyfeature_title','Why we are best')!=''): ?>
                        <div class="title-divider">
                            <span></span>
                            <?php if(get_theme_mod('homepage_keyfeature_subtitle')!=''): ?>
                                 <h4><?php echo esc_html(get_theme_mod('homepage_keyfeature_subtitle')); ?></h4>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ($best_classifieds_keyfeature_post->have_posts()) : $i=1;?>
            <div class="whyWeAre-section">
                <div class="row">
                   <?php while ( $best_classifieds_keyfeature_post->have_posts() ) : $best_classifieds_keyfeature_post->the_post(); 
               if($i==4):echo '</div><div class="row">';endif; ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="weAre-box">
                            <div class="weAre-icon">
                                <i class="fa <?php echo esc_html(get_theme_mod('homepage_keyfeature'.$i.'_icon','fa-eye')); ?>" aria-hidden="true"></i>
                            </div>                            
                            <div class="weAre-title-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                    <?php $i++; endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
        </div>
    </div>
    <!--/////END Why we are Section/////-->
    <?php endif;
    if(!get_theme_mod('homepage_testimonial_switch',false)):
    $category_list = get_theme_mod('homepage_testimonial_category','');
    $perpage = get_theme_mod('homepage_testimonial_count',3);    
    if($category_list>0):
    $best_classifieds_testimonial_post = new WP_Query( apply_filters( 'front_page_testimonial_posts_args', array( 'posts_per_page' => $perpage,'category__in' => $category_list, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) ); 
    else:
    $best_classifieds_testimonial_post = new WP_Query( apply_filters( 'front_page_testimonial_posts_args', array( 'posts_per_page' => $perpage, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) ); 
    endif;?>
    <!--/////START Testimonials Section/////-->
    <div class="testimonials-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php if(get_theme_mod('homepage_testimonial_section_title','Testimonials')!=''): ?>
                    <div class="main-heading">
                        <h1 class="heading-title"><?php echo esc_html(get_theme_mod('homepage_testimonial_section_title','Testimonials')); ?></h1>
                        <div class="title-divider">
                            <span></span>
                        </div>
                    </div>
                <?php endif;?>
                </div>
            </div>
             <?php if ($best_classifieds_testimonial_post->have_posts()) : ?>
            <div class="testimonials-area">
                <div class="our-customer">
                    <div class="owl-carousel">
                        <?php while ( $best_classifieds_testimonial_post->have_posts() ) : $best_classifieds_testimonial_post->the_post(); ?>
                        <div class="item">
                            <div class="box-bg">
                                <figure><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a></figure>
                                <div class="innercontent-right">
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>                        
                        <?php endwhile;?>

                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <!--/////END Testimonials Section/////-->    
    <?php endif; 
    if(!get_theme_mod('homepage_latest_blog_sectionswitch',false)):
    $category_list = get_theme_mod('homepage_latest_blog_section_category','');
    $perpage = get_theme_mod('homepage_latest_blog_section_perpage',3);
    
    if($category_list>0):
    $best_classifieds_latest_blog_post = new WP_Query( apply_filters( 'front_page_latest_blog_posts_args', array( 'posts_per_page' => $perpage,'category__in' => $category_list, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) ); 
    else:
    $best_classifieds_latest_blog_post = new WP_Query( apply_filters( 'front_page_latest_blog_posts_args', array( 'posts_per_page' => $perpage, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) ); 
    endif; ?>
    <!--/////START Latest Blog Section/////-->
    <div class="latest-blog-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="main-heading">
                        <?php if(get_theme_mod('homepage_latest_blog_section_title','Latest Blog')!=''): ?>
                        <h1 class="heading-title"><?php echo esc_html(get_theme_mod('homepage_latest_blog_section_title','Latest Blog')); ?></h1>
                        <?php endif; if(get_theme_mod('homepage_latest_blog_section_title','Latest Blog')!=''): ?>
                        <div class="title-divider">
                            <span></span>
                            <?php if(get_theme_mod('homepage_latest_blog_section_desc')!=''): ?>
                                <h4><?php echo esc_html(get_theme_mod('homepage_latest_blog_section_desc')); ?></h4>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ($best_classifieds_latest_blog_post->have_posts()) : ?>
            <div class="latest-blog-section">                
                <div class="row">
                <?php while ( $best_classifieds_latest_blog_post->have_posts() ) : $best_classifieds_latest_blog_post->the_post(); ?> 
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="main-blog-area">                            
                             <a href="<?php the_permalink(); ?>" class="blog-post-img"><?php the_post_thumbnail('medium'); ?></a>
                            <div class="blog-post-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo esc_html(get_the_date()); ?></span>
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="blog-post-bottom">
                                <div class="blog-post-entry-meta blog-post-author">
                                   <ul> 
                                    <?php best_classifieds_entry_meta(); ?>
                                    </ul> 
                                </div>
                                <div class="blod-post-read-more">
                                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','best-classifieds');?><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
        </div>
    </div>
    <!--/////END Latest Blog Section/////-->
    <?php endif; ?>

<?php }
get_footer();