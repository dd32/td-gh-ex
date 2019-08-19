<?php 
$arilewp_menu_style = get_theme_mod('arilewp_menu_style', 'sticky');   
$arilewp_menu_container_size = get_theme_mod('arilewp_menu_container_size', 'container-full');  
$arilewp_cart_icon_disabled = get_theme_mod('arilewp_cart_icon_disabled', true); 
$arilewp_search_icon_disabled = get_theme_mod('arilewp_search_icon_disabled', true); 
?>
	<!-- Theme Menubar -->
	<nav class="navbar navbar-expand-lg not-sticky navbar-light <?php if($arilewp_menu_style == 'sticky'){echo 'header-sticky'; }?>">
		<div class="<?php echo esc_attr($arilewp_menu_container_size); ?>">
			<div class="row">
				<div class="col-lg-3 align-self-center">	
					<?php arilewp_header_logo(); ?>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
				<div class="col-lg-9">
					<?php 
					$wooshop_cart = '<ul class="%2$s">%3$s';
					$wooshop_cart .= '<div class="themes-header-top">';
					if($arilewp_cart_icon_disabled == true):  
					 if ( class_exists( 'WooCommerce' ) ) {
						$wooshop_cart .= '<div class="woo-cart-block float-left">';
								global $woocommerce;
								$link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
								$wooshop_cart .= '<a class="cart-icon" href="'.$link.'" >';	
								if ($woocommerce->cart->cart_contents_count == 0){
									$wooshop_cart .= '<i class="fa fa-shopping-basket" aria-hidden="true"></i>';
								}else{
								    $wooshop_cart .= '<i class="fa fa-shopping-basket" aria-hidden="true"></i>'; }   
									$wooshop_cart .= '</a>';
									$wooshop_cart .= '<a href="'.$link.'" ><span class="cart-total">
										'.sprintf(_n('%d item', $woocommerce->cart->cart_contents_count, 'arilewp'), $woocommerce->cart->cart_contents_count).'</span></a>'; $wooshop_cart .= '</div>'; }
					endif;					
					    $wooshop_cart .= '</ul>';
								wp_nav_menu( array(
									 'theme_location'  => 'primary',
									 'container'       => 'div',
									 'container_class' => 'collapse navbar-collapse',
									 'container_id' => 'navbarNavDropdown',
									 'menu_class'      => 'nav navbar-nav m-right-auto',
									 'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
									 'items_wrap'  => $wooshop_cart,
									 'walker'          => new wp_bootstrap_navwalker()
								) );
						    ?>
				</div>
			</div>
		</div>
	</nav>
	<!-- /Theme Menubar -->