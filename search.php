<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package atoz
 */

get_header(); ?>

<section id="sb-imgbox">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12">
				<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h3 class="page-title"><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s', 'atoz' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
				</header>
				<!-- .page-header -->
				<?php /* Start the Loop */ while ( have_posts() ) : the_post(); /** * Run the loop for the search to output the results. * If you want to overload this in a child theme then include a file * called content-search.php and that will be used instead. */ ?>
				<!--blog-box-->
					<?php get_template_part( 'template-parts/content', 'search' ); ?>
				<!--/blog-box-->
				<?php endwhile; the_posts_pagination( array( 'prev_text'=> '<i class="fa fa-chevron-left"></i> ' . __( 'Newer posts', 'atoz' ), 
															'next_text' => __( 'Older posts', 'atoz' ) . ' <i class="fa fa-chevron-right"></i>' , ) ); 
					else : get_template_part( 'template-parts/content', 'none' ); endif; 
				?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();