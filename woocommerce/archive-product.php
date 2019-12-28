<?php
/** 
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */


defined( 'ABSPATH' ) || exit;?>

<?php get_header();?>

<!-- Sector Header 1 -->
<?php get_template_part('sections/section',esc_attr(get_theme_mod('at_order_section_header_1','parallax')));?> 

<!-- Sector Header 2 -->
<?php get_template_part('sections/section',esc_attr(get_theme_mod('at_order_section_header_2','portfoliotwo')));?>

<!-- Sector 1 -->
<?php get_template_part('sections/section',esc_attr(get_theme_mod('at_order_section_1','whoweare')));?>

<!-- Sector 2 -->
<?php get_template_part('sections/section',esc_attr(get_theme_mod('at_order_section_2','category')));?>

<!-- Sector 3 -->
<?php get_template_part('sections/section',esc_attr(get_theme_mod('at_order_section_3','twoimage')));?>

<!-- Sector 4 -->
<?php get_template_part('sections/section',esc_attr(get_theme_mod('at_order_section_4','slide')));?>
     
<!-- Sector 5 -->
<?php get_template_part('sections/section',esc_attr(get_theme_mod('at_order_section_5','iconsheader')));?>

<!-- Sector 6 -->
<?php get_template_part('sections/section',esc_attr(get_theme_mod('at_order_section_6','services')));?>



<?php get_footer(); ?>













