<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Athenea
 */

get_header();
get_template_part( 'parts/content', 'headmenu' ); ?>
<div class="container">
   <div class="row transbody">      
    <div id="primary" class="col-md-8">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'athenea' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php athenea_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- #primary col-md-8 -->
    <div class="col-md-4">
	  <div class="well_sidebar">
       <?php get_sidebar(); ?>
      </div>
    </div><!-- col-md-4 -->
   </div><!-- /row -->
</div><!--/container-->
<?php
get_template_part( 'parts/content', 'footmenu' );
get_footer(); ?>