<div class="sidebar">
        <?php if (!dynamic_sidebar('content-sidebar')) : ?>
            <?php get_search_form(); ?>
            <br/>
            <h3>
                <?php echo ('Archives'); ?>
            </h3>
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>
            <h3>
                <?php echo ('Categories'); ?>
            </h3>
            <ul>
                <?php wp_list_categories('title_li'); ?>
            </ul>
        <?php endif; // end primary widget area  ?>
        <?php
        // A second sidebar for widgets, just because.
        if (is_active_sidebar('secondary-widget-area')) :
            ?>
            <?php dynamic_sidebar('secondary-widget-area'); ?>
        <?php endif; ?>
    </div>
 
