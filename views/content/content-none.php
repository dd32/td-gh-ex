<?php
/*
================================================================================================
Silver Quantum - content-none.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
404 and Search as well as recent posts.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com/)
================================================================================================
*/
?>
<article id="post-0" <?php post_class('post'); ?>>
    <header class="entry-header">
        <h1 class="entry-title">
            <?php esc_html_e('Nothing Found', 'silver-quantum'); ?>
        </h1>
    </header>
    <div class="entry-content">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <p><?php printf(esc_html__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'silver-quantum'), esc_url(admin_url('post-new.php'))); ?></p>
        <?php else : ?>
            <p><?php esc_html_e('It seems we cannot find what you are looking for. Perhaps searching can help.', 'silver-quantum'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</article>