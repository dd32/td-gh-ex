<?php ?>                <?php $semper_fi_lite_woocommerce_product = wc_get_product( get_the_ID() ); ?>

                <aside id="article-microdata">
                    
                    <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?>
                    
                    <h6 class="microdata-title"><?php if ( get_the_title() ) { the_title();} else { _e('(No Title)', 'semper-fi-lite'); } ?></h6>
                    
                    <p>

                        <?php if ( $semper_fi_lite_woocommerce_product->get_manage_stock() && $semper_fi_lite_woocommerce_product->get_stock_status() ) : ?><b><span itemprop="brand"><?php bloginfo('name'); ?></span></b> <?php _e( 'currently has' , 'semper-fi-lite' ); ?> <b/><?php echo $semper_fi_lite_woocommerce_product->get_stock_quantity();?></b> <meta itemprop="availability" content="http://schema.org/InStock" /><?php _e( 'in stock and ready to ship.' , 'semper-fi-lite' ); ?><?php endif; ?>

                        <?php if ( get_the_title() ) { the_title();} else { _e('(No Title)', 'semper-fi-lite'); } ?> <?php _e( 'have a shipping weight of' , 'semper-fi-lite' ); ?> <b><?php echo wc_get_weight( $semper_fi_lite_woocommerce_product->get_weight(), 'lbs' ); ?></b><?php _e( ', and the dimensions' , 'semper-fi-lite' ); ?> <b><?php echo wc_format_dimensions($semper_fi_lite_woocommerce_product->get_dimensions(false)); ?></b> <?php _e( 'when shipped.' , 'semper-fi-lite' ); ?>
                        
                    </p>
                
                </aside>