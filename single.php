<?php 
/*
============================================================================================================================
Silver Quantum - index.php
============================================================================================================================
The index.php template file is flexible, it can be used to include all the references for the header, content, aside, and 
footer and other pages created in WordPress. It can also be divided into modular template files, each taking on part of the 
workload. If you wish to not provide other template files, the WordPress hierarchy may have default template files or 
functions to peform their jobs.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
?>
<?php get_header(); ?>
    <div id="global-layout" class="<?php echo esc_attr(get_theme_mod('global_layout', 'left-sidebar')); ?>">
        <div class="content-area">
            <?php silver_quantum_display_content_single(); ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>