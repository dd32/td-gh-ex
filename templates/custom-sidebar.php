<?php 
/*
============================================================================================================================
Silver Quantum - templates/custom-sidebar.php
Template Name: Custom Sidebar
============================================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for this theme. This home.php is
a template file that allows you to set it as a static page and it will use this to display custom different views for this
theme.
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
            <?php silver_quantum_display_content_page(); ?>
        </div>
        <?php get_sidebar'custom'); ?>
    </div>
<?php get_footer(); ?>