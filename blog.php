<?php
/*
  Template Name: Blog Page
 */
?>
<?php get_header(); ?>
<div class="page_heading_container">
<div class="container_24">
<div class="grid_24">
<div class="page_heading">
<h1><?php appointway_breadcrumbs(); ?>
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
<?php
            $limit = get_option('posts_per_page');
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            query_posts('showposts=' . $limit . '&paged=' . $paged);
            $wp_query->is_archive = true;
            $wp_query->is_home = false;
            ?>
 			<!--Start Post-->
            <?php get_template_part('loop', 'blog'); ?>   
			<div class="clear"></div>
			<nav id="nav-single"> <span class="nav-previous">
                    <?php next_posts_link(__('&larr; Older posts', 'spotmoto')); ?>
                </span> <span class="nav-next">
                    <?php previous_posts_link(__('Newer posts &rarr;', 'spotmoto')); ?>
                </span> </nav>	
				<!--Start Post-->
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