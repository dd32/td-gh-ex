<?php get_header(); ?>
	<!-- BEGIN PAGE -->
		<div id="page">
			<div id="page-inner" class="clearfix">
				<?php get_template_part('/includes/banner-top'); ?>
				
				<div id="content">
				<div id="subtitle">
				<?php if (have_posts()) : ?>
				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>					
				<?php /* If this is a category archive */ if (is_category()) { ?>				
				<?php /* If this is a tag archive */  } elseif( is_tag() ) { ?>				
				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>		<?php _e('Archive for', 'optimize'); ?> <?php the_time('F jS, Y'); ?>
				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>				
				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>				
				<?php /* If this is a search */ } elseif (is_search()) { ?>				
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
						<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?> <?php _e('Blog Archives', 'optimize'); ?> <?php } ?>
				</div>
				<?php while(have_posts())  : the_post(); ?>
				
					<?php get_template_part('/includes/post'); ?>
					<?php endwhile; ?>
					<?php else : ?>
					<div class="post">
					<div class="posttitle">
					<h2><?php _e('404 Error&#58; Not Found', 'optimize'); ?></h2>
					<span class="posttime"></span>
					</div>
					</div>
					<?php endif; ?>
					<?php load_template(get_template_directory() . '/includes/pagenav.php'); ?>
					</div> <!-- end div #content -->
			<?php get_sidebar(); ?>
			<?php get_footer(); ?>
