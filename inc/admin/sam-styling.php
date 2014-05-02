<?php
if ( !defined( 'ABSPATH' ) )
    exit( 'restricted access' );

$style = sampression_styling();
//sam_p($style);
$default_fonts = sampression_fonts_style();
?>
<div id="content">
    <form id="sampression-metadata" onsubmit="javascript:return false;">
        <input type="hidden" name="meta_data" value="styling" />
        <section class="row">
            <h3 class="sec-title"><?php _e( 'Customize', 'sampression' ); ?></h3>
            <div class="box titled-box">
                <div  class="box-title">
                    <h4><?php _e( 'Sidebar', 'sampression' ) ?></h4>
                </div>
                <div class="box-entry">
                    <ul id="sidebar-selector" class="style-selector-list clearfix">
                        <?php
                        $sidebar = $style['sidebar'];
                        $sidebar_name = $sidebar['name'];
                        $sidebar_active = esc_attr( $sidebar['active'] );
                        for ( $i = 0; $i < count( $sidebar_name ); $i++ ) {
                            ?>
                            <li class="<?php
                            if ( $i == 0 ) {
                                echo 'first ';
                            } if ( $sidebar_active == $sidebar_name[$i] ) {
                                echo 'active ';
                            }
                            ?>style-selector">
                                <a href="javascript:void(0);" data-sidebar="<?php echo esc_attr( $sidebar_name[$i] ); ?>" class="sam-style">
                                    <img src="<?php echo SAM_FW_ADMIN_IMAGES_URL; ?>/<?php echo esc_attr( $sidebar_name[$i] ); ?>-layout.jpg" alt=""/>
    <?php echo ucwords( esc_attr( $sidebar_name[$i] ) ); ?>
                                </a>
                            </li>
    <?php
}
?>
                    </ul>
                    <input type="hidden" name="sidebar" id="sidebar" value="<?php echo $sidebar_active; ?>" />
                </div>
            </div>
        </section>
        <div id="response"></div>
        <a id="save" href="javascript:void(0);" class="button1 alignright save-data"><?php _e( 'Save', 'sampression' );?></a>
    </form>
</div>