<?php
/*
Template Name: Page-portfolio-6-c-1
*/
/**
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.1.0
 */

if(is_page()) { get_header('post'); } else { get_header(); } 
avik_the_breadcrumb(); ?>
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
		        <h3 class="title-client-portfolio-6-c-1"><?php echo esc_html( get_theme_mod( 'avik_title_client_portfolio_6_c_1','CLIENT')); ?></h3>
		        <p class="subtitle-client-portfolio-6-c-1"><i class="fas fa-angle-right"></i><?php echo esc_html( get_theme_mod( 'avik_subtitle_client_portfolio_6_c_1','Brand Exponent')); ?></p>
		        <h3 class="title-project-portfolio-6-c-1"><?php echo esc_html( get_theme_mod( 'avik_title_project_portfolio_6_c_1','PROJECT DATE')); ?></h3>
		        <p class="subtitle-project-portfolio-6-c-1"><i class="fas fa-angle-right"></i><?php echo esc_html( get_theme_mod( 'avik_subtitle_project_portfolio_6_c_1','May 2018')); ?></p>
		        <h3 class="title-category-portfolio-6-c-1"><?php echo esc_html( get_theme_mod( 'avik_title_category_portfolio_6_c_1','CATEGORY')); ?></h3>
		        <p class="subtitle-category-portfolio-6-c-1"><i class="fas fa-angle-right"></i><?php echo esc_html( get_theme_mod( 'avik_subtitle_category_portfolio_6_c_1','Business')); ?></p>
		        <h3 class="title-name-portfolio-6-c-1"><?php echo esc_html( get_theme_mod( 'avik_title_name_portfolio_6_c_1','NAME')); ?></h3>
						<p class="subtitle-name-portfolio-6-c-1"><i class="fas fa-angle-right "></i><?php echo esc_html( get_theme_mod( 'avik_subtitle_name_portfolio_6_c_1','Marc')); ?></p>
						<?php if ( false == get_theme_mod( 'avik_enable_button_portfolio_6_c_1', false) ) :?>
						<a href="<?php echo esc_url( get_theme_mod( 'avik_link_button_portfolio_6_c_1' )); ?>" class="btn btn-avik button-portfolio-6-c-1" role="button" aria-pressed="true" data-aos="zoom-in" data-aos-duration="2000">
						<?php echo esc_html( get_theme_mod( 'avik_title_button_portfolio_6_c_1','View Project')); ?></a> 
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