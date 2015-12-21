<?php
/**
 * Front page hook for satisfying all WordPress Conditions
 *
 * @since acmeblog 1.1.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmeblog_front_page' ) ) :

    function acmeblog_front_page() {

        if ( 'posts' == get_option( 'show_on_front' ) ) {
            include( get_home_template() );
        }
        elseif( is_active_sidebar( 'acmeblog-home' ) ){
            ?>
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php
                    dynamic_sidebar( 'acmeblog-home' );
                    ?>
                </main>
                <!-- #main -->
            </div><!-- #primary -->
            <?php
        }
        else {
            include( get_page_template() );
        }

    }
endif;
add_action( 'acmeblog_action_front_page', 'acmeblog_front_page', 10 );