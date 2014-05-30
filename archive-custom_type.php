<?php
/*
 * CUSTOM POST TYPE ARCHIVE TEMPLATE
 *
 * This is the custom post type archive template. If you edit the custom post type name,
 * you've got to change the name of this template to reflect that name change.
 *
 * For Example, if your custom post type is called "register_post_type( 'bookmarks')",
 * then your template name should be archive-bookmarks.php
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
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
				<?php post_type_archive_title(); ?>
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
							<?php get_template_part('loop'); ?>
						</div>
						
						<?php endwhile; ?>
							<ul class="pager">
								<?php bnw_page_navi(); ?>
							</ul>
						<?php else : ?>
						
						<article id="post-not-found" class="hentry cf">
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
