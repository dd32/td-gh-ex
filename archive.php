<?php 
/*
============================================================================================================================
White Spektrum - index.php
============================================================================================================================
The index.php template file is flexible, it can be used to include all the references for the header, content, aside, and 
footer and other pages created in WordPress. It can also be divided into modular template files, each taking on part of the 
workload. If you wish to not provide other template files, the WordPress hierarchy may have default template files or 
functions to peform their jobs.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
?>
<?php get_header(); ?>
    <div id="gobal-layout" class="<?php echo esc_attr(get_theme_mod('global_layout', 'left-sidebar')); ?>">
        <div class="content-area">
            <?php Backdrop\MainQuery\display_content_archive(); ?>
        </div>
        <?php Backdrop\Sidebar\display_primary(); ?>
    </div>
<?php get_footer(); ?>