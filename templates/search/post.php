<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="row">
    <?php do_action(ATTIRE_THEME_PREFIX . "before_main_content_area");
    AttireFramework::DynamicSidebars('left');
    ?>
    <div class="<?php AttireFramework::ContentAreaWidth(); ?> attire-post-and-comments">
        <?php
        if (have_posts()) {
            get_template_part('loop', get_post_type());
        } else {
            ?>

            <div class="col-lg-12">
                <h2><?php echo esc_attr__('Nothing Found!', 'attire'); ?></h2>
                <p><?php echo esc_attr__('Try Different Search Term', 'attire'); ?></p>
            </div>

            <?php
        }
        ?>

    </div>
    <?php
    AttireFramework::DynamicSidebars('right');
    do_action(ATTIRE_THEME_PREFIX . "after_main_content_area"); ?>
</div>