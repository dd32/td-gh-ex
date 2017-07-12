<?php
/*
 * sidebar used for top banner area
 * only shows on Default Template page template
 * and Three Width Page Template
 */
if ( !empty ( get_theme_mod( 'appeal_topbox_image_setting' ) ) || is_active_sidebar( 'sidebar-top' ) ) {  
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 topbox">

            <div id="sidebar-top" role="complementary">
                <div class="vertical-nav block">

                        <?php  if ( !empty ( get_theme_mod( 'appeal_topbox_image_setting' ) ) ) : ?>
                
                        <div id="topbox-banner"></div>
                
                        <?php else : ?>
                        <?php dynamic_sidebar( 'sidebar-top' ); ?>
                        <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</div>
<?php } 
?>
