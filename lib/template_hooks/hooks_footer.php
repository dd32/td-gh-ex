<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


add_action('wp_footer', 'ascend_header_extras_login_modal', 20);
function ascend_header_extras_login_modal() {
	global $ascend;
		if(isset($ascend['header_extras']['login']) && $ascend['header_extras']['login'] == '1' && !is_user_logged_in()) { ?>
	        	<div class="mag-pop-modal mfp-hide mfp-with-anim kt-loggin-modal" id="kt-extras-modal-login" tabindex="-1" role="dialog" aria-hidden="true">
	                <div class="pop-modal-content">
	                    <div class="pop-modal-body"">
	                        <?php 
	                        	if (class_exists('woocommerce'))  {
	                        		wc_get_template( 'myaccount/form-login.php' );
	                        	} else {
	                        		wp_login_form();
	                        		wp_register('<p>'.__("Don't have an account?", "ascend"), '</p>');
	                        	}
	                        ?>
	                    </div>
	                </div>
		        </div>
	        <?php
	    }
}
add_action('wp_footer', 'ascend_header_extras_search_modal', 20);
function ascend_header_extras_search_modal() {
	global $ascend;
		if(isset($ascend['header_extras']['search']) && $ascend['header_extras']['search'] == '1') { ?>
    		<div class="mag-pop-modal mfp-hide mfp-with-anim kt-search-modal" id="kt-extras-modal-search" tabindex="-1" role="dialog" aria-hidden="true">
	            <div class="pop-modal-content">
	                <div class="pop-modal-body"">
                        <?php
                        if(isset($ascend['header_extras_search_woo']) && $ascend['header_extras_search_woo'] == '1') { 
							get_product_search_form();
			        	} else { 
			              	get_search_form();
			            } ?>
	                </div>
	            </div>
	        </div>
	   	<?php 
	   }
}

add_action('wp_footer', 'ascend_mobile_menu_sldr', 30);
function ascend_mobile_menu_sldr() {
	global $ascend; ?>
    		<div class="mag-pop-sldr mfp-hide mfp-with-anim kt-mobile-menu" id="kt-mobile-menu" tabindex="-1" role="dialog" aria-hidden="true">
	            <div class="pop-modal-content">
	                <div class="pop-modal-body"">
                    <?php do_action('kt_mobile_menu_before'); 
                  	
                  	if(isset($ascend['mobile_menu_search']) && $ascend['mobile_menu_search'] == '1') { 
	                  	if(isset($ascend['mobile_menu_search_woo']) && $ascend['mobile_menu_search_woo'] == '1') { 
	            			get_product_search_form();
			          	} else { 
			              	get_search_form();
			            } 
                  	} 
                  	if(isset($ascend['mobile_submenu_collapse']) && $ascend['mobile_submenu_collapse'] == '1') {
                    	wp_nav_menu( array('theme_location' => 'primary_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mobile-nav', 'walker' => new kadence_mobile_walker()));
                  	} else {
                    	wp_nav_menu( array('theme_location' => 'primary_navigation','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>', 'menu_class' => 'kad-mobile-nav'));
                  	} 
                  	do_action('kt_mobile_menu_after'); ?>
	                </div>
	            </div>
	        </div>
	   	<?php 
	   
}
add_action('wp_footer', 'ascend_mobile_cart_sldr', 30);
function ascend_mobile_cart_sldr() { 
	if (class_exists('woocommerce'))  { 
		global $ascend;  
		if(isset($ascend['mobile_header_cart']) && ($ascend['mobile_header_cart'] == 'right' || $ascend['mobile_header_cart'] == 'left'))  {?>
    		<div class="mag-pop-sldr mfp-hide mfp-with-anim kt-mobile-cart" id="kt-mobile-cart" tabindex="-1" role="dialog" aria-hidden="true">
	            <div class="pop-modal-content">
	                <div class="pop-modal-body"">
                    <?php do_action('kt_mobile_cart_before'); ?>
                  	
                  	<div class="kt-mini-cart-refreash">
						<?php woocommerce_mini_cart(); ?>
					</div>
                  	<?php do_action('kt_mobile_cart_after'); ?>
	                </div>
	            </div>
	        </div>
	   	<?php 
	   }
	}
}
add_action('wp_footer', 'ascend_mobile_account_sldr', 30);
function ascend_mobile_account_sldr() { 
	if (class_exists('woocommerce'))  { 
		global $ascend;  
		if(isset($ascend['mobile_header_account']) && ($ascend['mobile_header_account'] == 'right' || $ascend['mobile_header_account'] == 'left') ) {
			if(is_user_logged_in()) {?>
    		<div class="mag-pop-sldr mfp-hide mfp-with-anim kt-mobile-account" id="kt-mobile-account" tabindex="-1" role="dialog" aria-hidden="true">
	            <div class="pop-modal-content">
	                <div class="pop-modal-body"">
                    <?php do_action('kt_mobile_account_before'); ?>
                  	<?php 
			            wc_get_template( 'myaccount/navigation.php' );
			            ?>
                  	<?php do_action('kt_mobile_account_after'); ?>
	                </div>
	            </div>
	        </div>
	   		<?php 
		  	} else { ?>
		  		<div class="mag-pop-modal mfp-hide mfp-with-anim kt-loggin-modal" id="kt-mobile-modal-login" tabindex="-1" role="dialog" aria-hidden="true">
	                <div class="pop-modal-content">
	                    <div class="pop-modal-body"">
                    <?php
                    	if (class_exists('woocommerce'))  {
                    		wc_get_template( 'myaccount/form-login.php' );
                    	} else {
                    		wp_login_form();
                    		wp_register('<p>'.__("Don't have an account?", "ascend"), '</p>');
                    	}?>
	                </div>
	            </div>
	        </div>
	        <?php 
		   	}
	   	}
	}
}