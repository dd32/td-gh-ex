<?php
if (!defined('ABSPATH')) {
    exit;
}
$navigation_buttons = AttireThemeEngine::NextGetOption('attire_single_post_post_navigation', 'show');
$navigation_buttons = $navigation_buttons === 'show' ? 'canshow' : 'noshow';
?>
<div class="post-meta">
    <ul class="meta-list single-post">
        <li>
            <span><?php echo esc_attr__('Posted on', 'attire'); ?></span>
            <span class="bold"><a
                        href="<?php the_permalink(); ?>"><?php the_date(); ?></a></span>
        </li>
        <li>
            <span><?php echo esc_attr__('By', 'attire'); ?></span>
            <span class="bold">
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
            </span>
        </li>
        <li>
            <span><?php echo esc_attr__('In', 'attire'); ?></span>
            <span class="bold"><?php the_category(', '); ?></span>

        </li>

        <li class="post-navs float-right <?php echo esc_attr($navigation_buttons); ?>">
            <span class="text-primary"><?php previous_post_link('%link', '<i class="fa fa-long-arrow-left"></i> ' . __('Previous', 'attire')); ?></span>
            <i class="fa fa-dot-circle-o"></i>
            <span class=""><?php next_post_link('%link', __('Next', 'attire') . ' <i class="fa fa-long-arrow-right"></i>'); ?></span>
        </li>
    </ul>
</div>
