<?php 
/**
 ************************************************************************************************************************
 * Silver Quantum - index.php
 ************************************************************************************************************************
 * The (index.php) template file is flexible, it can be used to include all references for the header, content, aside, 
 * footer, and other pages created in the WordPress hierarchy. It can also be divided into modular templates files, each 
 * taking on part of the workload. If you wish to not provide other templates, the WordPress hierarchy may have default 
 * template files or functions to perform their jobs.
 * 
 * @package     Silver Quantum
 * @copyright   Copyright (C) 2014-2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */
?>
<?php get_header(); ?>
    <div id="gobal-layout" class="<?php echo esc_attr(get_theme_mod('global_layout', 'left-sidebar')); ?>">
        <div class="content-area">
            <?php Benlumia007\Backdrop\MainQuery\display_content_post_format(); ?>
        </div>
        <?php Benlumia007\Backdrop\Sidebar\display_primary(); ?>
    </div>
<?php get_footer(); ?>