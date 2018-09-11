<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Absolutte
 */

?>

    

    <?php 
    $absolutte_site_layout = get_theme_mod( 'absolutte_site_layout', 'default' );
    if ( isset( $_GET[ 'site_layout' ] ) ) {
        $absolutte_site_layout = sanitize_text_field( wp_unslash( $_GET[ 'site_layout' ] ) );
    }
    ?>
    <?php if( 'default' == $absolutte_site_layout ): ?>
                    </div><!-- /#row -->

                </div><!-- /#container -->

            </main><!-- #main -->
        
    <?php endif; ?>

    


        <?php
        $footer_sections = array(
                                'first-footer-widgets' => false,
                                'second-footer-widgets' => false,
                                'third-footer-widgets' => false,
                                'fourth-footer-widgets' => false,
                            );
        $footer_count = 0;
        $footer_section_class = "";

        foreach ( $footer_sections as $footer_section => $active ) {
            if ( is_active_sidebar( $footer_section ) ) {
                $footer_sections[$footer_section] = true;
                $footer_count++;
            }//if is_active_sidebar
        }//for each

        switch ( $footer_count ) {
            case 1:
                $footer_section_class = "absolutte-footer-1-column";
                break;
            case 2:
                $footer_section_class = "absolutte-footer-2-column";
                break;
            case 3:
               $footer_section_class = "absolutte-footer-3-column";
                break;
            default:
                $footer_section_class = "absolutte-footer-3-column";
                break;
        }

        ?>
    <div class="footer-wrap">
        <div class="absolutte-footer-image"></div>
        <?php
        /*
        *Only show the Footer sections that have widgets
        */
        if ( $footer_count > 0 ) {
        ?>

        <footer id="footer" class="site-footer container <?php echo esc_attr( $footer_section_class ); ?>">
            <?php
            foreach ( $footer_sections as $footer_section => $active ) {
                if ( $active ) {
                    echo '<div class="footer-column">';

                        if ( is_active_sidebar( $footer_section ) ) { if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( $footer_section ) ) : else :

                        endif; }//if is_active_sidebar

                    echo '</div>';
                }//if active
            }//for each
            ?>
        </footer><!-- #footer -->
        <?php
        }//if footer_count
        ?>



        <?php
        $absolutte_footer_layout = get_theme_mod( 'absolutte_footer_layout', 'footer-1' );
        if ( isset( $_GET[ 'footer_layout' ] ) ) {
            $absolutte_footer_layout = sanitize_text_field( wp_unslash( $_GET[ 'footer_layout' ] ) );
        }
        $absolutte_footer_selected = str_replace( "footer-", "", $absolutte_footer_layout );
        $absolutte_sub_footer_class = 'absolutte-sub-footer-style-' . $absolutte_footer_selected;
        ?>
    	<div class="sub-footer <?php echo esc_attr( $absolutte_sub_footer_class );?>">
            <div class="container">

                <div class="row">
                <?php 
                $absolutte_sub_footer_class = 'col-md-6 col-sm-6';
                $absolutte_sub_footer_social_class = 'col-md-6 col-sm-6';
                ?>

                    <div class="<?php echo esc_attr( $absolutte_sub_footer_class ); ?> sub-footer-copy">

                        <p><?php esc_html_e( '&copy; Copyright', 'absolutte' ); ?> <?php echo esc_html( date('Y') ); ?> <a rel="nofollow" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( bloginfo( 'name' ) ); ?></a></p>

                        <?php
                        if ( has_nav_menu( 'footer-menu' ) ) {
                            wp_nav_menu(
                                array(
                                    'theme_location'  => 'footer-menu',
                                    'container'       => 'div',
                                    'container_id'    => 'footer-menu',
                                    'container_class' => 'menu',
                                    'menu_id'         => 'menu-footer-items',
                                    'menu_class'      => 'menu-items',
                                    'depth'           => 1,
                                    'fallback_cb'     => '',
                                )
                            );
                        }
                        ?>
                    </div>
                    <div class="<?php echo esc_attr( $absolutte_sub_footer_social_class ); ?> sub-footer-social-menu">
                        <?php get_template_part( '/template-parts/social-menu', 'footer' ); ?>
                    </div>

                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .sub-footer -->
        <?php
            $absolutte_footer_up_btn = get_theme_mod( 'absolutte_footer_up_btn', '0' );
            $absolutte_up_btn_css = '';
            if ( ! $absolutte_footer_up_btn ) {
                $absolutte_up_btn_css = 'display: none;';
            }
        ?>
        <a href="#" class="absolutte-up-button hidden-xs hidden-sm" style="<?php echo esc_attr( $absolutte_up_btn_css );?>"><i class="absolutte-icon-chevron-up"></i></a>
    </div><!-- .footer-wrap -->

</div><!-- /absolutte-site-wrap -->


<?php wp_footer(); ?>

</body>
</html>