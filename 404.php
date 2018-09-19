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
            <article id="post-0" <?php post_class('post'); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php esc_html_e('Whoa! You broke something', 'silver-quantum'); ?></h1>
                </header>
                <div class="entry-content">
                    <p>
                        <?php printf(esc_html__("Just kidding! You tried going to %s, which doesn't exist, so that means I probably broke something. To find what you are looking for, check out the most recent articles below or try a search: ", 'silver-quantum'), 
                        '<code>' . home_url(esc_url($_SERVER['REQUEST_URI'])) . '</code>'); ?>
                    </p>
                    <?php get_search_form(); ?>
                </div>
            </article>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>