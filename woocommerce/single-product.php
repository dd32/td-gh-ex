<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.0
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

get_header('shop');
$breadcrumb = get_theme_mod('breadcrumb_options_single','1');
$archive_bread = get_theme_mod('breadcrumb_single_image');
if($archive_bread){
    $bread_archive = $archive_bread;
}else{
  $bread_archive = get_template_directory_uri().'/images/about-us-bg.jpg';
}
if($breadcrumb == '1') :
?>
<header id="title_bread_wrap" class="entry-header" style="background:url('<?php echo $bread_archive; ?>') no-repeat center; background-size: cover;">
    <div class="ak-container">

        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
            <h1 class="entry-title ak-container"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>

        <?php
        /**
         * woocommerce_before_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         */
        do_action('woocommerce_before_main_content');
        ?>


        <?php do_action('woocommerce_archive_description'); ?>
    </div>
</header>
<?php endif; ?>
<div class="inner">
    <div class="ak-container">
        <div id="primary" class="content-area">
            <div class="content-inner clearfix">

                <?php while (have_posts()) : the_post(); ?>

                    <?php wc_get_template_part('content', 'single-product'); ?>

                <?php endwhile; // end of the loop.  ?>


                <?php
                /**
                 * woocommerce_after_main_content hook
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action('woocommerce_after_main_content');
                ?>
            </div>
        </div>
        <div id="secondary" class="widget-area secondary-right sidebar">
            <?php
            /**
             * woocommerce_sidebar hook
             *
             * @hooked woocommerce_get_sidebar - 10
             */
            do_action('woocommerce_sidebar');
            ?>
        </div>
    </div>
</div>

<?php get_footer('shop'); ?>