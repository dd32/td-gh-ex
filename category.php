<?php
/**
 * The template for displaying Category pages.
 *
 */
?>
<?php get_header(); ?>
<div class="page_heading_container">
<div class="container_24">
<div class="grid_24">
<div class="page_heading">
<h1><?php printf(__('Category Archives: %s', 'appointway'), '' . single_cat_title('', false) . ''); ?>
</h1>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<div class="page_container">
<div class="container_24">
<div class="grid_24">
<div class="page_content">
<div class="grid_17 alpha">
<div class="content_bar">
<?php if (have_posts()) : ?>
<?php
$category_description = category_description();
if (!empty($category_description))
	echo '' . $category_description . '';
/* Run the loop for the category page to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-category.php and that will be used instead.
 */
?>
<?php get_template_part('loop', 'category'); ?>
<div class="clear"></div>
<nav id="nav-single"> <span class="nav-previous">
		<?php next_posts_link(__('&larr; Older posts', 'spotmoto')); ?>
	</span> <span class="nav-next">
   <?php previous_posts_link(__('Newer posts &rarr;', 'spotmoto')); ?>
                    </span> </nav>
            <?php endif; ?>
</div>
</div>
<div class="grid_7 omega">
<!--Start Sidebar-->
 <?php get_sidebar(); ?>
 <!--End Sidebar-->
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php get_footer(); ?>