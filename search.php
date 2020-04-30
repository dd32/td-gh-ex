<?php
/**
* search.php
*
* @author    Franchi Design
* @package   Atomy
*/

get_header('cat');
?>

<div class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_header','container'))?> at-woocommerce-breadcrumbs">
<?php atomy_custom_breadcrumbs(); ?>
</div>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">
		  <?php if ( have_posts() ) : ?>
			<header class="page-header text-center mt-5 mb-5">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'atomy' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();
