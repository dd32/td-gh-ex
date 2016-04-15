<?php
/*
================================================================================================
Beyond Expectations - 404.php
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
================================================================================================
*/
?>
<?php get_header(); ?>
    <div id="main-content" class="content-area">
        <?php get_template_part('template-parts/content', 'none'); ?>
    </div>
<?php get_sidebar('post-content'); ?>
<?php get_footer(); ?>