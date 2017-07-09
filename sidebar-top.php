<?php
/*
 * sidebar used for top banner area
 * only shows on Default Template page template
 * and Three Width Page Template
 */
?>
<div id="sidebar-top" role="complementary">
    <div class="vertical-nav block">

        <?php  if ( !empty ( get_theme_mod( 'appeal_topbox_image_setting' ) ) ) : ?>
        <div id="topbox-banner"></div>
        <?php else : ?>
        <?php dynamic_sidebar( 'sidebar-top' ); ?>
        <?php endif; ?>

    </div>
</div>

