<?php get_header(); ?>
<section id="content">
 <section class="container paddingtop">
        <div class="row">
        <?php if(get_theme_mod('enable_breadcrumb',false)){ ?>
       <div> <div class="col-lg-12"> <div class="breadcrumbs"><?php the_breadcrumbs(); ?></div></div></div>
         <?php } ?>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <main id="main" class="site-main wow fadeInUp">
           <?php  if ( have_posts() ) : 
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part('template-parts/content', 'search');

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __('Previous page', 'backyard'),
				'next_text'          => __('Next page', 'backyard'),
				'before_page_number' => '<span class="meta-nav screen-reader-text">'. __('Page', 'backyard'). ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part('template-parts/content', 'none');

		endif; ?>
              
          </main>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </section>
  </section>
  <?php get_footer(); ?>