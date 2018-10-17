<?php
/**
 * Footer Bar Section.
 *
 * @package Atento
 */

$content_order_lists    = get_theme_mod( 'atento_footer_bar_content_order_list', array( 'footer-bar-text' ) );
$footer_bar_class       = array( 'footer-bar' );

if ( ! empty( $content_order_lists ) ) :

    if ( in_array("footer-bar-menu", $content_order_lists ) ) {
        $footer_bar_class[] = 'has-footer-menu';
    }
    $footer_row_class   = array( 'row flex-wrap align-items-center justify-content-center justify-content-md-between' ); ?>

    <div class="footer-bar-separator"></div>

    <div id="colophon" class="<?php echo esc_attr( implode( ' ', $footer_bar_class ) ); ?>" role="contentinfo">
        <div class="outer-container">
            <div class="container-fluid">
                <div class="<?php echo esc_attr( implode( ' ', $footer_row_class ) ); ?>">

                    <?php foreach ( $content_order_lists as $key => $content_order )  :

                        $order = $key + 1;

	                    if ( $content_order == 'footer-bar-text' ) { ?>

                            <div class="footer-copyright order-3 order-lg-<?php echo esc_attr( $order ) ?>">
			                    <?php do_action( 'atento_footer_copyright' ); ?>
                            </div><!-- .footer-copyright -->

	                    <?php }

	                    elseif ( $content_order == 'footer-bar-menu' ) {

                            $menu_id = get_theme_mod( 'atento_footer_bar_menu_id' );

                            $nav_menu 	= ( empty( $menu_id ) ? false : wp_get_nav_menu_object( $menu_id ) ); ?>

                            <div class="footer-bar-menu order-2 order-md-<?php echo esc_attr( $order ); ?>">

                                <?php if ( $nav_menu ) {

                                    wp_nav_menu(array(
                                        'menu'          => $nav_menu,
                                        'menu_id'       => 'footer-bar-nav',
                                        'container'     => 'ul',
                                        'menu_class'    => 'd-flex flex-wrap justify-content-center align-items-center p-0 m-0 ls-none',
                                        'depth'         => 1
                                    ));
                                }
                                else {
                                    $menus_link = admin_url('nav-menus.php');

                                    printf( '<p class="m-0">%1$s<a href="%2$s" target="_blank">%3$s</a>%4$s</p>',
                                        esc_html__( 'Menu not found! Assign a&nbsp;', 'atento' ),
                                        esc_url( $menus_link ),
                                        esc_html__( 'Menu', 'atento' ),
                                        esc_html__( '&nbsp;& choose menu to display in footer bar from ( Appearance - > Customize -> Footer - > Footer Menu )', 'atento' )
                                    );

                                } ?>
                            </div><!-- .footer-menu -->

                        <?php }

                    endforeach; ?>

                </div><!-- .row -->
            </div><!-- .container-fluid -->
        </div><!-- .outer-container -->
    </div><!-- .footer-bar -->

<?php endif;
