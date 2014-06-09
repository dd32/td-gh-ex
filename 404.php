<?php get_header(); ?>
	<!-- BEGIN PAGE -->
	<div id="page">
		<div id="page-inner" class="clearfix">			
				<div id="content">
					<div class="post clearfix">
						<h2><?php _e('404 Error&#58; Not Found', 'digital'); ?>
						</h2>
						<div class="entry">
							<p><?php _e('Sorry, but the page you are trying to reach is unavailable or does not exist.', 'digital'); ?></p>
							<h3><?php _e('You may interested with this', 'digital'); ?></h3>
							<?php load_template (get_template_directory() . '/includes/random-posts.php'); ?>
						</div>
					</div><!-- end div .post -->
				</div><!-- end div #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
