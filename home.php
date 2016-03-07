<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Avien_Light
 */

get_header(); ?>

	<section id="main-slider">
		
		<!--/.owl-carousel-->
		<div class="owl-carousel">

			<?php
				// Query Out Database
				$wpbp = new WP_Query(array( 'post_type' => 'post', 'showposts'=>'4' ) );
				
				// Begin The Loop
				if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post();
				
				global $post;
				$ID = $post->ID;
			?>
			
			<!--/.item-->
			<div class="item parallax" style="background-image: url(<?php if ( has_post_thumbnail() ) { $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); echo $feat_image_url ; }; ?>) ; no-repeat center center fixed !important; -webkit-background-size: cover; -moz-background-size: cover !important; background-size: cover !important; -o-background-size: cover !important;" data-speed="2">
				<span style="background-color: rgb(51, 51, 51); opacity: 0.20;" class="slider-overlay"></span>
				<div class="slider-inner">
					<div class="container">
						<div class="row">
							<div class="col-sm-6">
								<div class="carousel-content">
									<h2><?php echo get_the_title() ?></h2>
									<p><?php the_excerpt(); ?></p>
									<a class="btn btn-default btn-lg" href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'avien-light' );?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/.item-->
			
		<?php endwhile; endif; wp_reset_query();// END the Wordpress Loop ?>	
			
		</div>
		<!--/.owl-carousel-->
			
	</section>
	<!--/#main-slider-->

	<!--/.container -->
	<div class="container">
	
		<!--/.row -->
		<div class="row">
		
			<!--/.theme-layout-start-->
			<div class="col-md-12 nopadding">
			
			<!-- #content -->
			<div id="content" class="site-content col-md-9" role="main">

			<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

			</div>
			<!-- #content -->
			
			<!-- sidebar right -->
			<?php get_sidebar(); ?>
			<!-- sidebar right -->
			
		</div><!--/.row -->
		
	</div><!--/.container -->
	
</div><!--/.theme-layout-end-->
<?php get_footer(); ?>
