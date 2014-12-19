<?php
/*
Template Name: Homepage

 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Artist
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
				
				<?php if ( has_post_thumbnail() ) { 
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src( $image_id, 'full', true);
				?>
				<div class="header-image" style="background-image: url('<?php echo $image_url[0]; ?>');"></div>
				<?php } ?>
				
			<?php endwhile; // end of the loop. ?>
<div class="portfolio-area">			
			<?php 
			$project_type_terms = get_terms( 'jetpack-portfolio-type' );
			foreach ( $project_type_terms as $project_type_term ) {
			$project_type_query = new WP_Query( array(
			'post_type' => 'jetpack-portfolio',
			'tax_query' => array(
            array(
                'taxonomy' => 'jetpack-portfolio-type',
                'field' => 'slug',
                'terms' => array( $project_type_term->slug ),
            )
        )
    ) );
			?>
	<div class="portfolio-category">
    <h2 class="portfolio-category-title"><a href="<?php echo esc_url( get_term_link( $project_type_term ) ); ?>"><?php echo $project_type_term->name; ?></a></h2>    
    
	<?php
	
	while ( $project_type_query->have_posts() ) : $project_type_query->the_post(); ?>

	<div class="portfolio-item">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'portfolio-thumb'); ?>
			<div class="portfolio-title"><?php the_title(); ?></div>
		</a>
	</div>

	<?php endwhile; ?>
	</div>
	<?php
	
    $project_type_query = null;
    wp_reset_postdata();
} 
?>
</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
