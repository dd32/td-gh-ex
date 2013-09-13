<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

<?php if(have_posts()) while(have_posts()): the_post(); ?>

<?php get_template_part('element', 'page-header'); ?>
		
<div id="main" class="main">
	<div class="container">		
		<section id="content" class="content content-wide">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="page-content">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<div class="page-link">'.__('Pages', 'cpotheme').':', 'after' => '</div>')); ?>
				</div>
			</div>
			
			<section id="sitemap" class="sitemap">
				<?php $sitemap = get_pages('sort_column=menu_order&sort_order=ASC&parent=0&post_status=publish'); $sitemap_count = 0; ?>
				<?php foreach($sitemap as $current_page): ?>
				<?php if($sitemap_count % 4 == 0 && $sitemap_count != 0) echo '<div class="col-divide"></div>'; ?>
				<?php $sitemap_count++; ?>
				<?php if($current_page->ID != $post->ID): ?>
				<ul class="column col4 sitemap<?php if($sitemap_count % 4 == 0 && $sitemap_count != 0) echo ' col-last'; ?>">
					<li><a href="<?php echo get_permalink($current_page->ID); ?>"><?php echo $current_page->post_title; ?></a></li>
					<?php $child_pages = get_pages('sort_column=menu_order&sort_order=ASC&child_of='.$current_page->ID.'&parent='.$current_page->ID); ?>
					<?php if(sizeof($child_pages) > 0): ?>
					<ul>
						<?php foreach($child_pages as $current_child){ ?>
						<li><a href="<?php echo get_permalink($current_child->ID); ?>"><?php echo $current_child->post_title; ?></a></li>
						<?php } ?>
					</ul>
					<?php endif; ?>
				</ul>
				<?php endif; ?>
				<?php endforeach; ?>
			</section>
			
		</section>
	</div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>