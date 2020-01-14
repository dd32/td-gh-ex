<?php get_header(); ?>
<!-- BEGIN PAGE -->
	<div id="page">
	<?php do_action('promax_below_navigation'); ?>
		<div id="page-inner" class="clearfix">
						<div id="content">
					<div class="posthd"><?php echo get_theme_mod('promax_index_label','Latest Posts' ); ?></div>
					<div class="three-columns group">
					<?php if(have_posts()) : ?>
					<?php while(have_posts())  : the_post(); ?>
							<div class="imag"><?php get_template_part('/includes/post'); ?></div>
					<?php endwhile; ?>
					<?php else : ?>
							<div class="post">
								<div class="posttitle">
									<h2><?php _e('404 Error&#58; Not Found', 'promax' ); ?></h2>
									<span class="posttime"></span>
								</div>
						</div>
					<?php endif; ?>
					</div>
					<?php get_template_part('/includes/pagenav'); ?>	
				</div> <!-- end div #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>