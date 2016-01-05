<?php
/**
 * The sidebar containing the footer widget area
 *
 * If no active widgets in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Artwork
 * @since Artwork 1.0
 */
?>
<div  class="footer-sidebar">
    <div class="container">
        <div class="row">            
            <?php
            $args = array(
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'
            );
            $instance = array();
            ?>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <?php if (is_active_sidebar('sidebar-2')) : ?>                
                    <?php dynamic_sidebar('sidebar-2'); ?>               
                <?php else: ?>
                    <?php
                    wp_cache_delete('widget_about', 'widget');
                    the_widget('Theme_Widget_About', $instance, $args);
                    ?>
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <?php if (is_active_sidebar('sidebar-3')) : ?>
                    <?php dynamic_sidebar('sidebar-3'); ?>                
                <?php else: ?>
                    <?php
                    wp_cache_delete('theme_widget_recent_posts', 'widget');
                    the_widget('Theme_Widget_RecentPosts', $instance, $args);
                    ?> 
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <?php if (is_active_sidebar('sidebar-4')) : ?>
                    <?php dynamic_sidebar('sidebar-4'); ?>                
                <?php else: ?>
                    <?php
                    wp_cache_delete('widget_authors', 'widget');
                    the_widget('Theme_Widget_Authors', $instance, $args);
                    ?> 
                <?php endif; ?>
            </div>
        </div><!-- .widget-area -->
    </div>
</div>