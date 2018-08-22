<?php if ( !is_front_page() ) :
    $page_title_tag = get_theme_mod( 'conica-seo-page-title-tag', customizer_library_get_default( 'conica-seo-page-title-tag' ) ); ?>
    <div class="title-bar page-header">
        <div class="site-container">
            <h<?php echo esc_attr( $page_title_tag ); ?> class="page-h-title">
                <?php if ( is_home() ) :
                    $blog_page_id = get_option( 'page_for_posts' );  ?>
                    
                    <?php echo ( get_theme_mod( 'conica-set-blog-title' ) ) ? get_theme_mod( 'conica-set-blog-title' ) : get_page( $blog_page_id )->post_title; ?>
                
                <?php elseif ( is_archive() ) : ?>
                        
                        <?php if ( conica_is_woocommerce_activated() ) : ?>
                            
                            <?php if ( is_woocommerce() ) :
                                $shop_id = get_option( 'woocommerce_shop_page_id' ); ?>
                                <?php echo get_page( $shop_id )->post_title; ?>
                            <?php else : ?>
                                <?php the_archive_title(); ?>
                            <?php endif; ?>
                            
                        <?php else : ?>
                            
                            <?php the_archive_title(); ?>
                            
                        <?php endif; ?>
                    
                    <?php elseif ( is_search() ) : ?>
                    
                    <?php printf( esc_html__( 'Search Results for: %s', 'conica' ), '<span>' . get_search_query() . '</span>' ); ?>
                
                <?php elseif ( is_singular() ) : ?>
                    
                    <?php echo get_the_title( get_the_ID() ); ?>
                    
                <?php elseif ( conica_is_woocommerce_activated() ) : ?>
                    
                    <?php if ( is_shop() ) :
                        $shop_id = get_option( 'woocommerce_shop_page_id' ); ?>
                        
                        <?php echo get_page( $shop_id )->post_title; ?>
                    <?php endif; ?>
                
                <?php else : ?>
                    
                    <?php the_title(); ?>
                    
                <?php endif; ?>
            </h<?php echo esc_attr( $page_title_tag ); ?>>
            <div class="conica-breadcrumbs">
                <?php if ( function_exists( 'bcn_display' ) ) : ?>
                    <?php bcn_display(); ?>
                <?php else: ?>
                    
                <?php endif; ?>
            </div>
            <div class="clearboth"></div>
        </div>
    </div>
    <div class="clearboth"></div>
<?php endif; ?>