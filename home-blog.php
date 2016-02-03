<section class="white-wrapper">
	<div class="container">
		<div class="general-title">
			<h2>Latest Blog Posts</h2>
			<hr>
			<p class="lead">We provide best solution for your business</p>
		</div><!-- end general title -->
		<?php $imageSize = 'awada_blog_home_thumb'; ?>
		<div class="blog-masonry">
			<?php
			$i = 1;
			while (have_posts()):
			the_post();
			if($i==1){
				$pos = 'first';
			} elseif($i==2){
				$pos = '';
			} else if($i==3){
				$pos = 'last';
				$i = 0;
			} ?>
			<div class="col-lg-4 <?php echo $pos; ?>">
				<?php get_template_part('blog', 'content'); ?>
			</div><!-- end col-lg-4 -->
			<?php $i++; endwhile; ?>
		</div><!-- end blog-masonry -->   
	</div><!-- end container -->
</section><!-- end white-wrapper -->