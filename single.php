<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
$meta_position = AttireThemeEngine::NextGetOption('attire_single_post_meta_position', 'after-title');
?>
    <div class="row">
        <?php AttireFramework::DynamicSidebars('left');
        do_action(ATTIRE_THEME_PREFIX . "before_main_content_area");
        ?>
        <div class="<?php AttireFramework::ContentAreaWidth(); ?> attire-post-and-comments">
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php

                while (have_posts()): the_post(); ?>
                    <?php the_post_thumbnail('full'); ?><br>
                    <h1><?php
                        do_action(ATTIRE_THEME_PREFIX . 'before_post_title');
                        the_title();
                        do_action(ATTIRE_THEME_PREFIX . 'after_post_title');
                        ?></h1>

                    <?php
                    if ($meta_position === 'after-title') {
                        get_template_part('single', 'post-meta');
                    } ?>
                    <div <?php post_class('post'); ?>>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                        <?php
                        if ($meta_position === 'after-content') {
                            get_template_part('single', 'post-meta');
                        } ?>
                        <?php wp_link_pages(); ?>
                        <div class="clear"></div>


                        <div class="single-post-tags">
                            <h3 class="tag-title"><?php echo esc_attr__('Post Tags', 'attire'); ?></h3>
                            <?php the_tags('<div class="post-tags">', ' ', '</div>'); ?>
                        </div>

                        <br/>
                        <div class="single-post-author">

                            <h3 class="author-title"><?php echo esc_attr__('About The Author', 'attire'); ?></h3>

                            <div class="post-author-info">

                                <div class="media">
                                    <img class="mr-3"
                                         src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'), array('size' => 90))); ?>"
                                         alt="Author Avatar">
                                    <div class="media-body">
                                        <h4 class="mt-0"><?php echo esc_attr(get_the_author_meta('display_name')); ?></h4>
                                        <?php echo esc_attr(get_the_author_meta('description')); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="mx_comments">

                        <?php comments_template(); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php
        do_action(ATTIRE_THEME_PREFIX . "after_main_content_area");
        AttireFramework::DynamicSidebars('right'); ?>
    </div>


<?php get_footer();
