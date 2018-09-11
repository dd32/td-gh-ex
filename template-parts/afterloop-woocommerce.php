					
                <div class="clearfix"></div>
            </div><!-- /content -->
            
            <?php
            $absolutte_shop_post_page = get_theme_mod( 'absolutte_shop_post_page', '' );
            $absolutte_shop_sidebar_position = absolutte_get_theme_mod( 'absolutte_shop_sidebar_position', 'shop-sidebar-top' );
            if ( $absolutte_shop_post_page && is_shop() && ( 'shop-sidebar-top' == $absolutte_shop_sidebar_position ) ) {
                echo '<div class="absolutte-post-shop col-md-12">';
                    $absolutte_shop_post_page_obj = get_post( intval( $absolutte_shop_post_page ) ); 
                    $absolutte_shop_post_page_content = apply_filters( 'the_content', $absolutte_shop_post_page_obj->post_content ); 
                    echo $absolutte_shop_post_page_content; //Already sanitized via the filter the_content
                echo '</div><!-- /.absolutte-post-shop -->';
            }
            ?>