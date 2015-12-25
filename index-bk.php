<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bfront
 */

get_header(); ?>

<div class="content-wrapper">
<div class="container">
    <div class="row">
        <div class="page-post-container-wrapper">
            <div class="col-md-8">
                <!-- ----------------Post loop starts --------------------- -->

                <?php get_template_part('loop', 'index'); ?> 

                <!-- ------------------Post loop ends----------------------- -->

            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
