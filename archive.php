<?php
/*
================================================================================================
Beyond Expectations - archive.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other style.css). The index.php template file is flexible. It can be used to 
include all references to the header, content, widget, footer and any other pages created in 
WordPress. Or it can be divided into modular template files, each taking on part of the workload. 
If you do not provide other template files, WordPress may have default files or functions to 
perform their jobs.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://ninjablume.com/contact/
@since          0.0.1
================================================================================================
*/
?>
<?php get_header(); ?>
    <div id="main-content" class="content-area">
        <?php if (have_posts()) : ?>
			<h2 class="content-archive">
			<?php 
				if (is_category()) {
					printf(__('Category: ','beyond-expectations'));
					echo single_cat_title(); 
				} elseif (is_tag()) {
					printf(__('Tag: ', 'beyond-expectations'));
					echo single_tag_title(); 
				} elseif (is_author()) {
					printf(__('Author Archives: ', 'beyond-expectations'));
					echo get_the_author(); 
				} elseif (is_day()) {
					printf(__('Daily Archives: ', 'beyond-expectations'));
					echo get_the_date();
				} elseif (is_month()) {
					printf(__('Monthly Archives: ', 'beyond-expectations'));
					echo get_the_date('F Y');
				} elseif (is_year()) {
					printf(__('Yearly Archives: ', 'beyond-expectations'));
					echo get_the_date('Y');
				}else {
					echo 'Archives: ';
				}
			?>
			</h2>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'archive'); ?>
        <?php endwhile; ?>
                <?php beyond-expectations_paging_navigation_setup(); ?>
        <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>