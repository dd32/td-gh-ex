<?php get_header(); ?>

	<!--/.container -->
	<div class="container">
	
		<!--/.row -->
		<div class="row">
		
			<!--/.theme-layout-start-->
			<div class="col-md-12 nopadding">
			
			<!-- #content -->
			<div id="content" class="site-content col-md-9" role="main">
				
				<!-- query posts -->
				<?php if ( have_posts() ) { ?>
				<?php while ( have_posts() ) { the_post(); ?>
				<?php get_template_part( 'inc/post-templates/content', get_post_format() ); ?>
				<?php } ?>
				<!-- query posts -->

				<!-- pagination -->
				<?php echo themeofwp_pagination(); ?>
				<!-- pagination -->

				<?php } else { ?>
				<?php get_template_part( 'inc/post-templates/content', 'none' ); ?>
				<?php } ?>
				
			</div>
			<!-- #content -->
			
			<!-- sidebar right -->
			<?php get_sidebar(); ?>
			<!-- sidebar right -->
			
		</div><!--/.row -->
		
	</div><!--/.container -->
	
</div><!--/.theme-layout-end-->

<?php get_footer();