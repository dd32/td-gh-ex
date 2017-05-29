<?php
/*
 * sidebar used for top banner area
 * only shows on Default Template page template
 * and Three Width Page Template
 */
 if( is_page() || is_page_template('top-advert-template') ) { ?>
<div id="sidebar-top" role="complementary">
    <div class="vertical-nav block">
        <?php dynamic_sidebar( 'sidebar-top' ); ?>
    </div>
</div>
<?php } ?>