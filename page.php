<?php
/**
* The template for displaying all pages
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages and that other
* 'pages' on your WordPress site will use a different template.
*
* @package abaya
* @since abaya 1.0
*/

get_header(); ?>
<?php 
global $wp_query;
$pageidwithimage=$wp_query->post->ID;
$image=get_theme_mod('footer_logo_page'.$pageidwithimage);
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

<section id="content">
 <section class="container">
<?php
      if (have_posts()):
		// Start the loop.
		while ( have_posts() ) : the_post();
			// Include the page content template.
			get_template_part('template-parts/content', 'page' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		// End the loop.
		endwhile;
else:  get_template_part('template-parts/content', 'none'); endif; ?>
 </section><!--container-->
</section><!--content-->

<?php get_footer(); ?>