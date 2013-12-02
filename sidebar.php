<!-- ASIDE -->
<div id="aside" class="last col width-25">
    <?php if(!dynamic_sidebar('sidebar-widgets')) : ?>
        <div class="widget">
            <?php get_search_form(); ?>
        </div>
        <div class="widget">
            <h1 class="title"><?php _e('Archives', 'autoadjust'); ?></h1>
            <ul class="widget_archive">
                <?php wp_get_archives(array('type' => 'monthly')); ?> 
            </ul>
        </div>
    <?php endif; ?>
</div>
<!-- ASIDE END -->