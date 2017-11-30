<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type"
          content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<!--BODY STARTS HERE-->

<body <?php body_class('attire');
AttireThemeEngine::AsinsioBodySchema(); ?> >

<?php
/**
 * Add anything immediately after body tag
 */
global $post;
do_action(ATTIRE_THEME_PREFIX . "body_content_before");

$theme_default_page_width = AttireThemeEngine::NextGetOption('body_content_layout_type');
$site_width = AttireThemeEngine::NextGetOption('main_layout_type', 'container-fluid');
if ($post) {
    $meta = maybe_unserialize(get_post_meta($post->ID, 'attire_post_meta', true));
}
$page_width = isset($meta['layout_page']) && $meta['layout_page'] !== 'default' && $meta['layout_page'] !== '' ? $meta['layout_page'] : $theme_default_page_width;
$page_header_title = isset($meta['cph_title']) && $meta['cph_title'] !== '' ? $meta['cph_title'] : get_the_title();
$page_header_description = isset($meta['cph_description']) && $meta['cph_description'] !== '' ? $meta['cph_description'] : '';
$cph_active = isset($meta['cph_active']) && (int)$meta['cph_active'] === 1 ? true : false;

?>

<div id="mainframe" class="<?php echo esc_attr($site_width); ?>">
    <?php do_action(ATTIRE_THEME_PREFIX . "before_header"); ?>
    <div class="header-div">
        <?php AttireThemeEngine::HeaderStyle(); ?>
    </div>
    <?php do_action(ATTIRE_THEME_PREFIX . "after_header"); ?>
    <div class="attire-content <?php echo esc_attr($page_width); ?>">

        <!--        Page Header        -->
        <?php if (is_page() && $cph_active) {
            do_action(ATTIRE_THEME_PREFIX . "before_page_header");
            ?>
            <div class="page_header_wrap">
                <h1 id="cph_title"><?php echo esc_attr($page_header_title); ?></h1>
                <?php if (isset($page_header_description) && $page_header_description !== '') { ?>
                    <p id="cph_description"><?php echo esc_attr($page_header_description); ?></p>
                <?php } ?>
            </div>
            <?php
            do_action(ATTIRE_THEME_PREFIX . "after_page_header");
        } ?>
        <!--       END : Page Header        -->
