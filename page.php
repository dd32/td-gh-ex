<?php
/**
 * The template for displaying all pages
 *
 * @package Adventure Travelling
 * @subpackage adventure_travelling
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area">
		<?php $sidebar_layout = get_theme_mod( 'adventure_travelling_sidebar_page_layout','right');
	    if($sidebar_layout == 'left'){ ?>
	        <div class="row">
	          	<div class="col-md-4 col-sm-4" id="theme-sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
	          	<div class="col-md-8 col-sm-8">
	           		<?php while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/page/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						endwhile; // End of the loop.
					?>
	          	</div>
	        </div>
	        <div class="clearfix"></div>
	    <?php }else if($sidebar_layout == 'right'){ ?>
	        <div class="row">
	          	<div class="col-md-8 col-sm-8">
		            <?php while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/page/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						endwhile; // End of the loop.
					?>
	          	</div>
	          	<div class="col-md-4 col-sm-4" id="theme-sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
	        </div>
	    <?php }else if($sidebar_layout == 'full'){ ?>
	        <div class="full">
	            <?php while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/page/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					endwhile; // End of the loop.
				?>
	      	</div>
		<?php }?>
	</div>
</div>

<?php get_footer();