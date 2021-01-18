<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package advance-coaching
 */
?>

<div id="sidebar" class="mt-3">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside role="complementary" aria-label="firstsidebar" id="archives" class="widget mb-3 p-2">
            <h3 class="widget-title text-uppercase text-left py-3 px-2"><?php esc_html_e( 'Archives', 'advance-coaching' ); ?></h3>
            <ul class="m-0">
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside role="complementary" aria-label="secondsidebar" id="meta" class="widget mb-3 p-2">
            <h3 class="widget-title text-uppercase text-left py-3 px-2"><?php esc_html_e( 'Meta', 'advance-coaching' ); ?></h3>
            <ul class="m-0">
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>