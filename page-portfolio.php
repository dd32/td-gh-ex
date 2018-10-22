<?php
/*
Template Name: Portfolio
Template Post Type: post, page, product
*/
/**
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.2.4
 */

if(is_single()) { get_header('post'); } else { get_header(); }
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
		        <h3 class="title-client-portfolio-1-c-1"><?php echo esc_html( get_theme_mod( '','AUTHOR')); ?></h3>
		        <p class="subtitle-client-portfolio-1-c-1"><i class="fas fa-angle-right"></i><?php the_author(); ?></p>
		        <h3 class="title-project-portfolio-1-c-1"><?php echo esc_html( get_theme_mod( 'avik_title_project_portfolio_1_c_1','PROJECT DATE')); ?></h3>
		        <p class="subtitle-project-portfolio-1-c-1"><i class="fas fa-angle-right"></i><?php echo get_the_date (); ?></p>
		        <h3 class="title-category-portfolio-1-c-1"><?php echo esc_html( get_theme_mod( 'avik_title_category_portfolio_1_c_1','CATEGORY')); ?></h3>
		        <p class="subtitle-category-portfolio-1-c-1"><i class="fas fa-angle-right"></i><?php the_category(', ') ?></p>
		        <h3 class="title-name-portfolio-1-c-1"><?php echo esc_html( get_theme_mod( 'avik_title_name_portfolio_1_c_1','NAME')); ?></h3>
						<p class="subtitle-name-portfolio-1-c-1"><i class="fas fa-angle-right "></i><?php the_title(); ?></p>

			</div>
	      </div>
	    </div>
     </div>
</main>
<?php
get_footer();
