<?php
/**
 * Default template for displaying Primary Widget Area
 * @package sampression framework v 1.0
 * @theme naya 1.0
 */
if ( !defined( 'ABSPATH' ) )
    exit( 'restricted access' );
?>
<aside id="sidebar" role="complementary" class="<?php sampression_sidebar_class() ?>">
    <?php do_action( 'sampression_before_sidebar' ); ?>
     <?php if ( ! dynamic_sidebar( 'primary-sidebar' ) ) : ?>
        <div class="widget widget_search clearfix">
            <?php get_search_form(); ?>
        </div> <!-- search widget -->
        <div class="widget widget_categories clearfix">
            <h3 class="widget-title"> <?php _e( 'Categories', 'sampression' ); ?> </h3>
            <ul>
                <?php wp_list_categories( array( 'title_li' => '', 'hierarchical' => 0 ) ); ?>
            </ul>
        </div>    
    <?php endif; // end sidebar widget area ?>
    <?php do_action( 'sampression_after_sidebar' ); ?>
</aside>
<!-- #sidebar-->