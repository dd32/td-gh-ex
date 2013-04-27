<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * 
 */
?>
<?php get_header(); ?>
<div class="page_heading_container">
<div class="container_24">
<div class="grid_24">
<div class="page_heading">
<h1><?php printf(__('Search Results for: %s', 'spotmoto'), '' . get_search_query() . ''); ?>
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
                <!--Start Post-->
                <?php get_template_part('loop', 'search'); ?>
                <!--End Post-->
            <?php else : ?>
                <article id="post-0" class="post no-results not-found">
                    <header class="entry-header">
                        <h1 class="entry-title">
                            <?php _e('Nothing Found', 'spotmoto'); ?>
                        </h1>
                    </header>
                    <!-- .entry-header -->
                    <div class="entry-content">
                        <p>
                            <?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'spotmoto'); ?>
                        </p>
                        <?php get_search_form(); ?>
                    </div>
                    <!-- .entry-content -->
                </article>
            <?php endif; ?>
            <div class="clear"></div>
            <nav id="nav-single"> <span class="nav-previous">
                    <?php next_posts_link(__('&larr; Older posts', 'spotmoto')); ?>
                </span> <span class="nav-next">
                    <?php previous_posts_link(__('Newer posts &rarr;', 'spotmoto')); ?>
                </span> </nav>	
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