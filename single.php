<?php get_header();	 ?>

	<!--/.container -->
	<div class="container">
	
		<!--/.row -->
		<div class="row">
		
			<!--/.theme-layout-start-->
			<div class="col-md-12 nopadding"> 
			
			<!-- #content -->
			<div id="content" class="site-content col-md-9" role="main">
				<?php if(have_posts()){ while ( have_posts() ) { the_post(); ?>
				<?php get_template_part( 'inc/post-templates/content', get_post_format() ); ?>
				<?php themeofwp_post_nav(); ?>
				<?php blog_comments(); ?>
				<?php } } ?>
			</div>
			<!--/#content -->
					
			<!-- sidebar right -->	
			<?php get_sidebar(); ?>
			<!-- sidebar right -->
			<?php } ?>
			
		</div><!--/.row -->
		
	</div><!--/.container -->
	
</div><!--/.theme-layout-end-->

<?php get_footer(); ?>