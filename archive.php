<?php
/**
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
			<h2>
				<?php if (is_category()) { ?>
				<span><?php _e( 'Posts Categorized:', 'bnwtheme' ); ?></span> <?php single_cat_title(); ?>
				<?php } elseif (is_tag()) { ?>
				<span><?php _e( 'Posts Tagged:', 'bnwtheme' ); ?></span> <?php single_tag_title(); ?>
				<?php } elseif (is_author()) {
				global $post;
				$author_id = $post->post_author;
				?>
				<span><?php _e( 'Posts By:', 'bnwtheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>
				<?php } elseif (is_day()) { ?>
				<span><?php _e( 'Daily Archives:', 'bnwtheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
				<?php } elseif (is_month()) { ?>
				<span><?php _e( 'Monthly Archives:', 'bnwtheme' ); ?></span> <?php the_time('F Y'); ?>
				<?php } elseif (is_year()) { ?>
				<span><?php _e( 'Yearly Archives:', 'bnwtheme' ); ?></span> <?php the_time('Y'); ?>
				<?php } ?>
			</h2>
		</div>
	</section>
	<!-- /Title Wrapper -->
	
	<!-- Content
	================================================== -->
	<section class="home-blog wow fadeInUp">
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
