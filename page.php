<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage B & W
 * @since B & W 1.1
 */

get_header(); ?>
	<!-- /Header End -->
	<!-- Breadcrumb -->
	<section class="breadcrumb-wrapper" style="background: #F5F5F5; margin-bottom: 0px;">
		<div class="container">
			<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
		</div>
	</section><!-- /breadcrumb-wrapper -->

	<!-- Title Wrapper -->
	<section class="title-wrapper">
		<div class="container">
			<h2 class="entry-title" itemprop="headline"><?php the_title(); ?></h2>
		</div>
	</section><!-- /title-wrapper -->
	
	<!-- Content -->
	<section class="content page wow fadeInUp">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="col-sm-12 col-md-6 col-lg-12">
								<!-- Loop -->
								<?php get_template_part('loop-single'); ?>
								<!-- /Loop -->
								
								<?php comments_template(); ?>
								
							</div>
						<?php endwhile; ?>
						
						<?php else : ?>
							<!-- Post Not Found -->
							<article id="post-not-found" class="hentry clearfix">
								<header class="article-header">
								<h1><?php _e( 'Oops, Post Not Found!', 'bnwtheme' ); ?></h1>
								</header>
								<section class="entry-content">
								<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bnwtheme' ); ?></p>
								</section>
								<footer class="article-footer">
								<p><?php _e( 'This is the error message in the index.php template.', 'bnwtheme' ); ?></p>
								</footer>
							</article>
							<!-- /Post Not Found -->
						<?php endif; ?>
					</div>
				</div><!--/col-lg-8 -->
				<div class="col-lg-4">
					<?php get_sidebar(); ?>
				</div><!--/col-lg-4 -->
			</div>
		</div><!--/container -->
	</section><!--/content -->

<?php get_footer(); ?>
