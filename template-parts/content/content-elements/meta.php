<ul class="blog-item-meta">
    <li><?php
        echo atlast_agency_post_categories(); ?>
    </li>
    <li><?php esc_html__('on', 'atlast-agency'); ?><?php echo esc_attr(get_the_time(get_option('date_format'))); ?></li>
</ul>