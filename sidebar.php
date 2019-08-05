<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package advance-business
 */
?>

<div id="sidebar">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside role="complementary" aria-labelledby="comp1" id="archives" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'advance-business' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside role="complementary" aria-labelledby="comp2" id="meta" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'advance-business' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>