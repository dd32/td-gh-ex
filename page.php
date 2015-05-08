<?php get_header();	 ?>

	<!--/#page-->
	<section id="page">
		
		<!--/.container -->
		<div class="container">
		
			<!--/.row -->
			<div class="row">
			
				<!--/.theme-layout-start-->
				<div class="col-md-12 nopadding">				
        
				<!--/#content-->
				<div id="content" class="site-content col-md-9" role="main">
					
					<?php while ( have_posts() ) { the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php edit_post_link( __( '<i class="fa fa-pencil"></i> Edit - ', themeofwp ), '<small class="edit-link">', '</small><div class="clearfix"></div>' ); ?>
						<?php if ( has_post_thumbnail() && ! post_password_required() ) { ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php } ?>
						<div class="entry-content">
							<?php the_content(); ?>
							<?php themeofwp_link_pages(); ?>
						</div>
					</article>
					
					<?php comments_page(); ?>
					
					<?php } ?>
					
				</div>
				<!--/#content-->
		
				<!-- sidebar right -->	
				<?php get_sidebar(); ?>
				<!-- sidebar right -->


			</div>
			<!--/.row -->
		
		</div>
		<!--/.theme-layout-end -->
	
	</section><!--/#page-->

<?php get_footer();