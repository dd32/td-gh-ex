<?php
/*
 Template Name: Full Width page
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
 *
 * @package WordPress
 * @subpackage B & W
 * @since B & W 1.1
*/
?>

<?php get_header(); ?>
	<!-- /Header End -->
	<section class="breadcrumb-wrapper" style="background: #F5F5F5; margin-bottom: 0px;">
		<div class="container">
			<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs(); ?>
		</div>
	</section>
	<!-- /breadcrumb End -->

	<!-- Title Wrapper -->
	<section class="title-wrapper">
		<div class="container">
			<h2 class="page-title" itemprop="headline"><?php the_title(); ?></h2>
		</div>
	</section><!-- /title-wrapper -->

	<!-- Content -->
	<section class="content page wow fadeInUp">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
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
				
			</div>
		</div><!--/container -->
	</section><!--/content-wrapper -->

<?php get_footer(); ?>
