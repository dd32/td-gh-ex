<?php
/**
 * Description: The template for displaying portfolio type posts.
 *
 * @package Aperture
 */

get_header(); ?>

<?php $pagesize = get_theme_mod( 'aperture_portfolio_pagesize' ); ?>
<?php $description = get_theme_mod( 'aperture_portfolio_description' ); ?>

<?php if ( $pagesize == 'fullwidth' ) { ?>
	<div id="primary" class="content-area-fullwidth portfolio">
		<main id="main" class="site-main" role="main">
<?php } elseif ( is_active_sidebar( 'right-sidebar' ) ) { ?>
	<div id="primary" class="content-area single-portfolio">
		<main id="main" class="site-main" role="main">
<?php } else { ?>
	<div id="primary" class="content-area-no-sidebar portfolio">
		<main id="main" class="site-main" role="main">
<?php } ?>

			<div class="portfolio-page">
				<header class="portfolio-header">
					<h1 class="portfolio-title"><?php single_cat_title(); ?></h1>
				</header><!-- .portfolio-header -->

				<?php if ( $description == 'enable' ) {
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="portfolio-description">%s</div>', $term_description );
					endif;
				} ?>

				<?php while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" class="portfolio-item">
					<div class="portfolio-item-inner">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="portfolio-item-image">
								<?php the_post_thumbnail( 'aperture-portfolio-item' ); ?>
							</div>
						<?php } else { ?>
							<div class="portfolio-no-image">
								<img src="<?php echo get_template_directory_uri(); ?>/img/no-image.png" class="attachment-aperture-portfolio-item wp-post-image no-image" width="445" height="300">
							</div>
						<?php } ?>
						<span class="portfolio-item-overlay">
							<div class="vertical-center">
								<div class="vertical-center-child">
								<h3 class="portfolio-item-title"><?php the_title(); ?></h3>
								<div class="portfolio-button-container"><a class="button portfolio-button" href="<?php echo get_permalink(); ?>">View Project</a></div>
								</div>
							</div>
						</span>
					</div>
				</div>

				<?php endwhile; // end of the loop. ?>

			</div><!-- .portfolio-page -->

			<?php aperture_paging_nav(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if ( $pagesize != 'fullwidth' ) { 
	get_sidebar( 'right' ); } ?>
<?php get_footer(); ?>
