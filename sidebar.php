<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package advance-fitness-gym
 */
?>
<div id="sidebar">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside role="complementary" aria-label="firstsidebar" id="archives" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'advance-fitness-gym' ); ?></h3>
            <ul class="m-0">
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside role="complementary" aria-label="secondsidebar" id="meta" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'advance-fitness-gym' ); ?></h3>
            <ul  class="m-0">
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>