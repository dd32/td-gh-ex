  <div class="cactus-header cactus-classic-header right">
  <?php get_template_part( 'template-parts/header/header', 'top-bar' ); ?>
            <div class="cactus-main-header">
            
                <div class="cactus-logo">
                <?php get_template_part( 'template-parts/header/header', 'logo' ); ?>
                   
                    <div class="cactus-f-microwidgets">
                        <div class="cactus-microwidget cactus-search-full">
                            <form role="search" class="searchform searchform-cats" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) );?>">
                                <div><?php

								$args = array(
								  'taxonomy' => 'product_cat',
								  'show_option_all' => esc_attr__('All Categories','astore'),
								  'class' => 'select_products',
								  'name' => 'product_cat',
								  'value_field' => 'slug',
								  'selected' => isset($_GET['product_cat'])?$_GET['product_cat']:'',
								);
								wp_dropdown_categories( $args );
								?>
                                    
                                    <label class="screen-reader-text"><?php esc_attr__('Search for','astore');?>:</label>
                                    <input type="text" class="search-field" placeholder="<?php esc_attr_e('Search','astore');?> …" value="<?php echo get_search_query(); ?>" name="s">
                                    <input type="hidden" value="product" name="post_type" id="post_type" />
                                    <input type="submit" class="search-submit" value="Search">
                                </div>                                    
                            </form>
                        </div>
                    </div>
                    <?php
					$display_shopping_cart_icon = astore_option('display_shopping_cart_icon');
					
					?>
                    <div class="cactus-f-microwidgets">
                    <?php
					global $woocommerce;
					if ( $woocommerce && $display_shopping_cart_icon == '1' ):
						
						$cart_contents_count = $woocommerce->cart->cart_contents_count;
						$cart_url = esc_url(wc_get_cart_url());
						if ( $cart_contents_count <= 0 )
							$cart_url = 'javascript:;';
							
					?>
                        <div class="cactus-microwidget cactus-shopping-cart">
                            <a href="<?php echo $cart_url;?>" class="cactus-shopping-cart-label">
                                <span class="cactus-shopping-cart-num"><?php echo $cart_contents_count;?></span>
                            </a>
                            <div class="cactus-shopping-cart-wrap right-overflow">
                                <div class="cactus-shopping-cart-inner">
                                    <ul class="cart_list product_list_widget empty">
                                        <li> <?php echo apply_filters('astore_shopping_cart',esc_html__( 'No products in the cart.', 'astore' ));?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                    
                </div>
                <nav class="cactus-navigation cactus-style-top-line-full">
                    <div class="cactus-cate-menu-wrap">
                        <div class="cactus-cate-menu-toggle"><i class="fa fa-list-ul"></i> 
						<?php esc_attr_e('Browse Categories','astore');?>
                        </div>
                        <?php
							global $post;
			
							$postid = isset($post->ID)?$post->ID:0;
							if(is_home()){
								$postid = get_option( 'page_for_posts' );
							}

							$expand_menu = get_post_meta($postid , 'astore_expand_menu', true);
							
							
							$expand_menu = apply_filters( 'astore_expand_menu', $expand_menu );
	
							$menu_class = 'cactus-cate-menu';
							if ( $expand_menu == '1' || $expand_menu == 'on' )
								$menu_class .= ' show';
						?>
                        <div class="<?php echo $menu_class;?>" style="display:none;">
                        
                         <?php
	
						   wp_nav_menu( array(
							'theme_location' => 'browse-categories',
							'menu_id'        => 'browse-categories',
							'menu_class' => 'cactus-cate-nav',
							'fallback_cb'    => '',
							'container' =>'',
							'link_before' => '<span>',
							'link_after' => '</span>',
						) );
				
					?>
                        </div>
                    </div>
                    
              <?php get_template_part( 'template-parts/header/header', 'top-menu' ); ?>
                </nav>                
            </div>
            <div class="cactus-mobile-main-header">
                <div class="cactus-logo">
                    <?php get_template_part( 'template-parts/header/header', 'logo' ); ?>
                </div>
               
                <div class="cactus-menu-toggle">
                    <div class="cactus-toggle-icon">
                        <span class="cactus-line"></span>
                    </div>
                </div>
            </div>
            <div class="cactus-mobile-drawer-header" style="display: none;">
            <?php get_template_part( 'template-parts/header/header', 'top-menu-mobile' ); ?>
            </div>
        </div>
        
  <div class="cactus-fixed-header-wrap" style="display: none;">
            <div class="cactus-header cactus-inline-header right shadow">
                <div class="cactus-main-header">
                    <div class="cactus-logo">
                        <?php get_template_part( 'template-parts/header/header', 'logo' ); ?>
                    </div>
                     <?php get_template_part( 'template-parts/header/header', 'top-menu' ); ?>
                   
                </div>
                <div class="cactus-mobile-main-header">
                    
                </div>
            </div>
        </div>