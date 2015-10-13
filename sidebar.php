<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Base WP
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
    return;
}
?>

<div id="secondary" class="widget-area col3 <?php if ( !is_page_template( 'page-sidebar-left.php' ) ) { echo 'last'; }?>" role="complementary">

<?php igthemes_before_sidebar_content(); ?>
    <?php dynamic_sidebar( 'sidebar-main' ); ?>
<?php igthemes_after_sidebar_content(); ?>

</div><!-- #secondary -->
