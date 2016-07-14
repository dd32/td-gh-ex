<?php get_header(); ?>
<section class="inner-page-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-page-title">
          <h1 class="title"><?php the_title(); ?></h1>
        </div><!--header-->
        <div class="breadcrumbs">
         <?php woocommerce_breadcrumb(); ?>
          
        </div><!--breadcrumbs-->
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
			get_template_part( 'content', 'page' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		// End the loop.
		endwhile;
     wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'abaya' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
	) );
else: ?>
     <p><?php _e( 'Sorry, no posts matched your criteria.', 'abaya' ) ?></p>
      <?php endif; ?>  
    </section><!--container-->
</section><!--content-->
<?php get_footer(); ?>