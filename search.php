<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage B & W
 * @since B & W 1.1
 */

get_header(); ?>
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
			<h2 class="page-title" itemprop="headline">
				<i class="fa fa-search"></i> <?php _e( 'Search Results for:', 'bnwtheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?>
			</h2>
		</div>
	</section>
	<!-- /Title Wrapper -->
	<!-- Content
	================================================== -->
	<section class="content search wow fadeInUp">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="row">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div class="col-sm-12 col-md-6 col-lg-12">
								<!-- Loop -->
								<?php get_template_part('loop'); ?>
								<!-- /Loop -->
							</div>
						<?php endwhile; ?>
							<!-- Pagination -->
							<ul class="pager">
								<?php bnw_page_navi(); ?>
							</ul>
							<!-- /Pagination -->
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
				</div>
				<div class="col-lg-4">
					<div class="">
						<?php get_sidebar(); ?>
					</div>
				</div>
				
			</div>
		</div>
	</section><!-- /home-blog -->
	<!-- /Content End -->
<?php get_footer(); ?>
