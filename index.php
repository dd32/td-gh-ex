<?php get_header();
get_template_part('breadcrumbs'); ?>
<section class="blog-wrapper">
	<div class="container">
		<?php $imageSize = 'awada_blog_sidebar_thumb'; ?>
		<div id="content" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class="row">
			   <div class="blog-masonry">
					<div class="col-lg-12">
						<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array('post_type' => 'post', 'paged' => $paged);
						$wp_query = new WP_Query($args);
						while ($wp_query->have_posts()):
							$wp_query->the_post();
							get_template_part('blog', 'content');
						endwhile;
						wp_link_pages(); ?>
					</div><!-- end col-lg-4 -->
				</div><!-- end blog-masonry -->
				<div class="clearfix"></div>					
				<hr>
				<?php awada_pagination() ; ?>
			</div><!-- end row --> 
		</div><!-- end content -->
		<?php get_sidebar(); ?>
	</div><!-- end container -->
</section><!--end white-wrapper -->
<?php get_footer(); ?>