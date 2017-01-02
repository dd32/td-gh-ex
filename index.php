<?php 
/*
 * Main Template File.
 */
get_header(); 
global $a1_options; ?>
<!--section part start-->
<section class="section-main" style="<?php if (!empty($a1_options['fixed-top-menu'])){ ?>margin-top:93px; <?php } ?>">
 <div class="col-md-12 a1-breadcrumb" >
   <div class="container a1-container">
     <div class="col-md-6 col-sm-6 no-padding-lr left-part">
     <?php if(!empty($a1_options['blogtitle'])): ?>
     <h3><?php echo esc_attr($a1_options['blogtitle']); ?></h3>
     <?php else: ?><h3><?php _e('Blog','a1'); ?></h3><?php endif; ?>
     </div>
     <div class="col-md-6 col-sm-6 no-padding-lr right-part">
       <?php if(function_exists('a1_custom_breadcrumbs')) a1_custom_breadcrumbs(); ?>
     </div>
   </div>
 </div>
 <div class="clearfix"></div>
 <div class="container a1-container">
   <div class="row">
     <div class="col-md-8 col-sm-8 blog-article">
       <?php while ( have_posts() ) : the_post(); ?>
       <div class="blog-post"> <a href="<?php echo esc_url( get_permalink() ); ?>" class="blog-title"><?php echo get_the_title();  ?></a>
         <?php if(!isset($a1_options['hide-meta-info-archieve-pages']) || empty($a1_options['hide-meta-info-archieve-pages'])){ ?>
           <div class="blog-info"> 
            <ul>
              <?php a1_entry_meta();  ?>
            </ul>
          </div>
          <?php } ?>
         <div class="blog-inner"> 
         <?php $a1_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())); 
             if(!empty($a1_image)) :?>
           <img src="<?php echo esc_url( $a1_image ); ?>" class="img-responsive" alt="<?php echo get_the_title(); ?>">
            <?php endif; ?>
           <div class="blog-content">
             <?php the_excerpt(); ?>
              </div>
         </div>
       </div>
        <?php endwhile; ?> 
       
       <!--Pagination Start-->
       <?php if(function_exists('faster_pagination')) { ?>
        <div class="col-md-12 a1-pagination no-padding">
             <?php faster_pagination('','2'); ?>
        </div>
       <?php }else { ?>
       <?php if(get_option('posts_per_page ') < $wp_query->found_posts) { ?>
       <div class="col-md-12 a1-pagination no-padding">
         <ul>
         <li><?php previous_posts_link(); ?></li>
         <li><?php next_posts_link(); ?></li>
       </ul>
       </div>
       <?php }
        } ?>
       <!--Pagination End-->
     </div>
     <!--sidebar start-->
     <?php get_sidebar(); ?>
       </div>
     </div>
 </section>
<!--section part end-->
<?php get_footer(); ?>