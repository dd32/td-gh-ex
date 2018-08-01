<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php $prefix = atlast_agency_get_prefix();  ?>


<?php
$hasSticky = esc_attr(get_theme_mod($prefix . '_sticky_header', '0'));
$header_style = esc_attr(get_theme_mod($prefix . '_header_layout', '1'));
?>

<header id="header"
        class="pad-tb-20 <?php echo atlast_agency_return_trans_class();?> <?php echo($hasSticky != '0' ? ' sticky-header ' : ''); ?> <?php echo 'header-style-' . $header_style; ?>"
        role="banner">
    <?php
    $header_style = esc_attr(get_theme_mod($prefix . '_header_layout', '1'));
    ?>

    <div class="container grid-xl">
        <div class="columns center-flex mobile-nav-container">
            <?php get_template_part('template-parts/mobile/mobile-header-style-1'); ?>
        </div>
        <!-- Desktop / Tablet till 600px; -->
        <?php get_template_part('template-parts/header/header-style-' . $header_style); ?>
    </div>
</header>


<?php
/*
 * Hooked the function/s
 * atlast_agency_set_header_image - Priority 5 - init.php
 */
do_action('atlast_agency_after_header');

