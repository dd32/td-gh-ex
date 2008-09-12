<?php /* Template Name: Widgets Page
*/ get_header();?>
<div id="content">
    <h2 class="post-title"><?php _e('Widgets')?></h2>
    <ul id="widgetl">
        <?php if(!function_exists('dynamic_sidebar')|| !dynamic_sidebar('Widgets Page Left')): ?>
        <?php endif; edit_post_link();?>
    </ul>
    <ul id="widgetr">
        <?php if(!function_exists('dynamic_sidebar')|| !dynamic_sidebar('Widgets Page Right')): ?>
        <?php endif;?>
    </ul>
</div><?php get_sidebar();get_footer()?>