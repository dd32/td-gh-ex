                <?php $product = wc_get_product( get_the_ID() ); ?>

                <aside id="article-microdata">
                    
                    <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?>
                    
                    <h6 class="microdata-title"><?php if ( get_the_title() ) { the_title();} else { _e('(No Title)', 'semper-fi-lite'); } ?></h6>
                    
                    <p>

                        <?php if ( $product->get_manage_stock() && $product->get_stock_status() ) : ?><b><span itemprop="brand"><?php bloginfo('name'); ?></span></b> currently has <b/><?php echo $product->get_stock_quantity();?></b> <meta itemprop="availability" content="http://schema.org/InStock" />in stock and ready to ship.<?php endif; ?>

                        <?php if ( get_the_title() ) { the_title();} else { _e('(No Title)', 'semper-fi-lite'); } ?> have a shipping weight of <b><?php echo wc_get_weight( $product->get_weight(), 'lbs' ); ?></b>, and the dimensions <b><?php echo wc_format_dimensions($product->get_dimensions(false)); ?></b> when shipped.
                        
                    </p>
                
                </aside>