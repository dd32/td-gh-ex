<?php
/*
Template Name: Page-portfolio-4-c-3
*/
/**
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.0.0
 */

if(is_page()) { get_header('post'); } else { get_header(); } 
the_breadcrumb(); ?>
 <div id="primary" class="content-area main">
	 <main id="main" class="site-main">
	   <div class="container mt-5">
		 <div class="row">	
		   <div class="col-sm-9 avik-img-portfolio">
			<?php
			  while ( have_posts() ) :
					  the_post();
					  get_template_part( 'template-parts/content', 'page-portfolio' );
			  // If comments are open or we have at least one comment, load up the comment template.
			  if ( comments_open() || get_comments_number() ) :
				   comments_template();
			  endif;
			  endwhile; // End of the loop.
			?>
		  </div> 
		  <div class="col-sm-3 right-portfolio">
            <div class="details-portfolio">
		        <h3 class="title-client-portfolio-4-c-3"><?php echo get_theme_mod( 'title_client_portfolio_4_c_3','CLIENT'); ?></h3>
		        <p class="subtitle-client-portfolio-4-c-3"><i class="fas fa-angle-right"></i><?php echo get_theme_mod( 'subtitle_client_portfolio_4_c_3','Brand Exponent'); ?></p>
		        <h3 class="title-project-portfolio-4-c-3"><?php echo get_theme_mod( 'title_project_portfolio_4_c_3','PROJECT DATE'); ?></h3>
		        <p class="subtitle-project-portfolio-4-c-3"><i class="fas fa-angle-right"></i><?php echo get_theme_mod( 'subtitle_project_portfolio_4_c_3','May 2018'); ?></p>
		        <h3 class="title-category-portfolio-4-c-3"><?php echo get_theme_mod( 'title_category_portfolio_4_c_3','CATEGORY'); ?></h3>
		        <p class="subtitle-category-portfolio-4-c-3"><i class="fas fa-angle-right"></i><?php echo get_theme_mod( 'subtitle_category_portfolio_4_c_3','Business'); ?></p>
		        <h3 class="title-name-portfolio-4-c-3"><?php echo get_theme_mod( 'title_name_portfolio_4_c_3','NAME'); ?></h3>
						<p class="subtitle-name-portfolio-4-c-3"><i class="fas fa-angle-right"></i><?php echo get_theme_mod( 'subtitle_name_portfolio_4_c_3','Marc'); ?></p>
						<?php if ( false == get_theme_mod( 'enable_button_portfolio_4_c_3', false) ) :?>
						<a href="<?php echo get_theme_mod( 'link_button_portfolio_4_c_3' ); ?>" class="btn btn-avik button-portfolio-4-c-3" role="button" aria-pressed="true" data-aos="zoom-in" data-aos-duration="2000">
						<?php echo get_theme_mod( 'title_button_portfolio_4_c_3','View Project'); ?></a> 
						<?php endif; ?>    
			</div>
			<!-- Social Share -->
            <div class="social-share-portfolio">
			   <?php get_template_part( 'inc/share' ); ?>  
            </div>
	      </div>
	    </div>
     </div>
</main>
<?php
get_footer();