<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<article <?php post_class('post'); ?>>
    <?php do_action(ATTIRE_THEME_PREFIX . 'before_content'); ?>

    <div class="post-thumb">
        <a href="<?php the_permalink(); ?>"><?php attire_post_thumb(array(900, 400), true); ?></a>
    </div>
    <!-- /.post-thumb -->
    <div class="post-content">
        <?php do_action(ATTIRE_THEME_PREFIX . 'before_post_title'); ?>
        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php do_action(ATTIRE_THEME_PREFIX . 'after_post_title'); ?>
        <?php
        $full_or_excerpt = AttireThemeEngine::NextGetOption('attire_archive_page_post_view', 'excerpt');
        if ($full_or_excerpt === 'excerpt') {
            the_excerpt();
        } else {
            the_content();
        }
        ?>
    </div>
    <!-- /.post-content -->
    <div class="post-meta post-meta-bottom">
        <ul class="meta-list">
            <li>
                <span><?php echo esc_attr__('Posted on', 'attire'); ?></span>
                <span class="black bold"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></span>
            </li>
            <li>
                <span><?php echo esc_attr__('By', 'attire'); ?></span>
                <span class="bold">
                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></span>
            </li>
            <li>
                <span><?php echo esc_attr__('In', 'attire'); ?></span>
                <span class="bold">
				<?php the_category(', '); ?></span>
            </li>
            <li>
                <span class="black"><?php comments_number(__('No comments', 'attire'), __('One comment', 'attire'), __('% comments', 'attire')); ?></span>
            </li>
        </ul>
    </div>
    <!-- /.post-meta -->
    <?php do_action(ATTIRE_THEME_PREFIX . 'after_content'); ?>
</article>