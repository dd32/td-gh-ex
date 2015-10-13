<?php
/**
 * The sidebar containing the shop widget area.
 *
 * @package Base WP
 */

if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
    return;
}
?>

<div id="secondary" class="widget-area col3 last" role="complementary">

<?php igthemes_before_sidebar_content(); ?>
    <?php dynamic_sidebar( 'sidebar-shop' ); ?>
<?php igthemes_after_sidebar_content(); ?>

</div><!-- #secondary -->
