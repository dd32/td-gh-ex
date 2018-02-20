<ul class="blog-item-meta">
    <?php if (!has_post_thumbnail()): ?>
    <li><?php
        echo atlast_business_post_categories(); ?>
    </li>
    <?php endif; ?>
    <li><?php echo esc_html__('by ', 'atlast-business'); ?><?php the_author_meta('display_name'); ?></li>
    <li><?php esc_html__('on', 'atlast-business'); ?><?php echo esc_attr(get_the_time(get_option('date_format'))); ?></li>
    <li><?php printf(_nx('%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'atlast-business'), number_format_i18n(get_comments_number())); ?></li>
</ul>