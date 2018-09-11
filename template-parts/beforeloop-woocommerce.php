<?php
$absolutte_shop_pre_page = get_theme_mod( 'absolutte_shop_pre_page', '' );
if ( $absolutte_shop_pre_page && is_shop() ) {
    echo '<div class="absolutte-pre-shop">';
        $absolutte_shop_pre_page_obj = get_post( intval( $absolutte_shop_pre_page ) ); 
        $absolutte_shop_pre_page_content = apply_filters( 'the_content', $absolutte_shop_pre_page_obj->post_content ); 
        echo $absolutte_shop_pre_page_content; //Already sanitized via the filter the_content
    echo '</div>';
}
?>
<div id="content" class="<?php echo esc_attr( absolutte_shop_css_class() ); ?>">

            <?php
            if ( ! is_shop() ) {
                echo '<header class="page-header">';
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                echo '</header><!-- .page-header -->';
            }


            ?>


            <div class="ql_woocommerce_info">
                <div class="row">
                    <div class="col-md-8">
                    <?php
                    $absolutte_shop_categories = get_theme_mod( 'absolutte_shop_categories', '' );
                    if ( ! empty( $absolutte_shop_categories ) ) {
                    ?>
                        <div class="ql_woocommerce_categories">
                            <ul>
                                <?php
                                $current_class = is_shop() ? "current" : "";
                                echo '<li class="' .  esc_attr( $current_class ) . '"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" data-category="all">' . esc_html__( 'All', 'absolutte' ) . '</a></li>';

                                    foreach ( $absolutte_shop_categories as $slug ) {

                                        $term = get_term_by( 'slug', $slug, 'product_cat' );

                                        // The $term is an object, so we don't need to specify the $taxonomy.
                                        $term_link = get_term_link( $slug, 'product_cat' );

                                        // If there was an error, continue to the next term.
                                        if ( is_wp_error( $term_link ) ) {
                                            continue;
                                        }
                                        $current_cat = is_product_category( $slug ) ? 'current' : '';
                                        // We successfully got a link. Print it out.
                                        echo '<li class="' . esc_attr( $current_cat ) . '"><a href="' . esc_url( $term_link ) . '" data-category="' . esc_attr( $slug ) . '">' . esc_html( $term->name ) . '</a></li>';
                                    }
                                

                                ?>
                                <li class="ql_product_search"><i class="ql-magnifier"></i>
                                <?php get_product_search_form( true ); ?>
                                </li>

                            </ul>
                        </div>
                    <?php } ?>
                    </div>
                    <?php
                        $absolutte_shop_sidebar_position = absolutte_get_theme_mod( 'absolutte_shop_sidebar_position', 'shop-sidebar-top' );
                        if ( 'shop-sidebar-top' == $absolutte_shop_sidebar_position ) {
                    ?>
                    <div class="col-md-4">
                        <?php if ( is_active_sidebar( 'shop-sidebar' ) && ! isset( $_GET[ 'sidebar_side' ] ) ) {  ?>
                        <a class="sidebar_btn" href="#"><i class="ql-funnel"></i><?php esc_html_e( 'Filter', 'absolutte' ); ?></a>
                        <?php } ?>
                    </div>
                    <?php
                        }
                    ?>
                </div><!-- /row -->
            </div><!-- /woocommerce_info -->


            <?php
            $absolutte_shop_sidebar_position = absolutte_get_theme_mod( 'absolutte_shop_sidebar_position', 'shop-sidebar-top' );
            if ( 'shop-sidebar-top' == $absolutte_shop_sidebar_position ) {
                /**
                 * woocommerce_sidebar hook
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                do_action( 'woocommerce_sidebar' );
            }
            ?>
