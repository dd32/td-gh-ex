<?php 
$absolutte_site_layout = get_theme_mod( 'absolutte_site_layout', 'default' );
if ( isset( $_GET[ 'site_layout' ] ) ) {
    $absolutte_site_layout = sanitize_text_field( wp_unslash( $_GET[ 'site_layout' ] ) );
}
$absolutte_topbar_enable = get_theme_mod( 'absolutte_topbar_enable', true );
?>
<div class="top-bar <?php if( false == $absolutte_topbar_enable && empty( $_GET[ 'top_bar' ] ) ): echo 'hidden'; endif ?>" >

    <?php 
    if( 'sidenav' == $absolutte_site_layout ): 
        echo '<div class="container-fluid">';
    else:
        echo '<div class="container">';
    endif;
    ?>

        <div class="row">
        <?php
        $absolutte_top_bar_class = 'col-md-8 col-sm-12 col-md-push-2';
        if ( has_nav_menu( 'top-bar-menu' ) ) {
            $absolutte_top_bar_class = 'col-md-4 col-sm-6 col-md-push-2';
        }
        ?>
            <div class="<?php echo esc_attr( $absolutte_top_bar_class ); ?>">
                <?php $absolutte_topbar_text = get_theme_mod( 'absolutte_topbar_text', '' ); ?>
                <p><?php echo wp_kses_post( $absolutte_topbar_text ); ?></p>
            </div>
            <?php
                if ( has_nav_menu( 'top-bar-menu' ) ) {
            ?>
             <div class="col-md-4 col-sm-6 col-md-push-2 align-right">
                <?php
                $args = array(
                        'theme_location'  => 'top-bar-menu',
                        'container'       => 'div',
                        'container_id'    => 'top-bar-menu',
                        'container_class' => 'menu',
                        'menu_id'         => 'menu-top-bar-items',
                        'menu_class'      => 'menu-items',
                        'depth'           => 1,
                        'fallback_cb'     => '',
                    );                    
                wp_nav_menu( $args );
                ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div><!-- .top-bar -->