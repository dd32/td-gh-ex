<?php get_header();
get_template_part('breadcrumbs');
the_post(); ?>
<section class="blog-wrapper">
	<div class="container">
		<?php $imageSize = 'awada_blog_sidebar_thumb'; ?>
		<div id="content" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="row">
			   <div class="blog-masonry">
					<div class="col-lg-12">
						<?php get_template_part('blog', 'content'); ?>
					</div><!-- end col-lg-4 -->
				</div><!-- end blog-masonry -->
				<div class="clearfix"></div>
				<?php comments_template('', true); ?>
				<hr>
			</div><!-- end row --> 
		</div><!-- end content -->
			<?php get_sidebar(); ?>
	</div><!-- end container -->
</section><!--end white-wrapper -->
<?php get_footer(); ?>