<?php $awada_theme_options = awada_theme_options();
get_header(); ?>
<section class="post-wrapper-top jt-shadow clearfix">
	<div class="container">
		<div class="col-lg-12">
		<?php if(class_exists('woocommerce') && is_shop()){
			echo '<h2>'.__('Shop','awada').'</h2>';
			}else{?>
			<h2><?php if(is_front_page()){echo "Home";}else{single_post_title();} ?></h2>
			<?php } ?>
			<?php awada_breadcrumbs(); ?>
		</div>
	</div>
</section><!-- end post-wrapper-top -->
<section class="blog-wrapper">
	<div class="container">
		<?php
		$blog_layout = $awada_theme_options['post_layout'];
		$imageSize = $blog_layout == "fullwidth" ? 'awada_blog_full_thumb' : 'awada_blog_sidebar_thumb';
		if ($blog_layout == "leftsidebar") {
			get_sidebar();
			$float = 9;
		} elseif ($blog_layout == "fullwidth") {
			$float = 12;
		} elseif ($blog_layout == "rightsidebar") {
			$float = 9;
		} else {
			$blog_layout = "rightsidebar";
			$float = 9;
		} ?>
		<div id="content" class="col-lg-<?php echo $float; ?> col-md-<?php echo $float; ?> col-sm-12 col-xs-12">
			<div class="row">
			   <div class="blog-masonry">
					<div class="col-lg-12">
						<?php
						while (have_posts()):
							the_post();
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
		<?php if ($blog_layout == "rightsidebar") {
			get_sidebar();
		} ?>
	</div><!-- end container -->
</section><!--end white-wrapper -->
<?php get_footer(); ?>