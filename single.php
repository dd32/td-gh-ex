<?php get_header();
get_template_part('breadcrumbs'); ?>
<section class="blog-wrapper">
	<div class="container">
		<?php $imageSize = 'awada_blog_sidebar_thumb'; ?>
		<div id="content" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="row">
			   <div class="blog-masonry">
					<div class="col-lg-12">
						<?php if (have_posts()):
						while (have_posts()): the_post();
							get_template_part('blog', 'content');
						endwhile;
						endif;
						wp_link_pages(); ?>
					</div><!-- end col-lg-12 -->
				</div><!-- end blog-masonry -->
				
				<div class="clearfix"></div>
				<?php comments_template('', true); ?>
				<div class="clearfix"></div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php awada_pagination_link(); ?><!-- next_prev --> 
				</div><!-- end col-lg-12 -->
			</div><!-- end row -->
		</div><!-- end content -->
		<?php get_sidebar(); ?>
	</div><!-- end container -->
</section><!--end white-wrapper -->
<?php get_footer(); ?>