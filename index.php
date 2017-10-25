<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme and one of the
* two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* For example, it puts together the home page when no home.php file exists.
*
* @link http://codex.wordpress.org/Template_Hierarchy
*
* @package abaya
* @since abaya 1.0
*/
get_header(); 
$page_for_posts = get_option( 'page_for_posts' );
$image=get_theme_mod('footer_logo_page'.$page_for_posts);
$src = wp_get_attachment_url( $image);
?>
<?php if($src){?>
<section class="inner-page-bg" style="background:url(<?php echo esc_url($src);?>);">
<?php }else{?>
<section class="inner-page-bg">
<?php }?>
 <div class="container">
   <div class="row">
     <div class="col-lg-12">
       <div class="inner-page-title">
         <h1 class="title"><?php the_title(); ?></h1>
       </div><!--header-->
     </div><!--col-->
   </div><!--row-->
 </div><!--container-->
</section><!--inner-page-bg-->
<section id="content" class="site-content">
 <section class="container">
   <div class="blog-content" id="blog-content">
     <div class="row">
       <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
         <div class="content-area" id="primary">
           <div id="main" class="site-main">
            <?php if (have_posts()): ?>
             <?php while(have_posts()): the_post(); get_template_part('template-parts/content'); endwhile; ?>    
           <nav>
           <ul class="pagination wow fadeInUp">
           <li class="prev"><?php previous_posts_link(__('&laquo;', 'abaya')); ?></li>
           <li class="next"><?php next_posts_link(__('&raquo;', 'abaya')); ?></li>
           </ul>
          </nav>
          <?php else : get_template_part('template-parts/content', 'none'); endif; ?>
           </div><!--main-->
         </div><!--primary-->
       </div><!--col-->
     <?php get_sidebar(); ?>
     </div><!--row-->
   </div><!--main-->
 </section><!--container-->
</section><!--content-->
<?php get_footer(); ?>