<?php $single_style = get_theme_mod(atlast_business_get_prefix() . '_single_layout', '1'); ?>

<?php if ($single_style == '2'):
    $id = get_queried_object_id();
    ?>

    <section class="single-major-title major-title">
        <div class="container grid-xl">
            <div class="columns">
                <div class="col-12">
                    <h1><?php echo esc_html(get_the_title($id)); ?></h1>
                    <ul class="blog-item-meta">
                        <?php $authorID = atlast_business_get_author_id(); ?>
                        <?php if (!has_post_thumbnail()): ?>
                            <li><?php
                                echo atlast_business_post_categories(); ?>
                            </li>
                        <?php endif; ?>
                        <li><?php esc_html_e('by ','atlast-business'); ?><?php the_author_meta('display_name', $authorID); ?></li>
                        <li><?php esc_html_e('on ', 'atlast-business'); ?><?php echo esc_html(get_the_time(get_option('date_format'))); ?></li>
                        <li><?php printf(_nx('%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'atlast-business'), number_format_i18n(get_comments_number())); ?></li>
                    </ul>
                </div>
            </div>
        </div>

    </section>

<?php endif; ?> 