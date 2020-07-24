<?php get_header(); ?>
	<!-- BEGIN PAGE -->
	<div id="page">
		<?php do_action('promax_below_navigation'); ?>
		<div id="page-inner" class="clearfix">			
				<div id="content">
					<div class="post clearfix">
						<h2><?php esc_html_e('404 Error&#58; Not Found', 'promax'); ?>
						</h2>
						<div class="entry">
							<p><?php esc_html_e('Sorry, but the page you are trying to reach is unavailable or does not exist.', 'promax'); ?></p>
							<h3><?php esc_html_e('You may interested with this', 'promax'); ?></h3>
							<?php get_template_part('/includes/random-posts'); ?>
						</div>
					</div><!-- end div .post -->
				</div><!-- end div #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
