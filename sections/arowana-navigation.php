<!-- Start: Header
============================= -->
<?php
	$arowana_cart_hdr_setting		= get_theme_mod('cart_header_setting','1');
	$arowana_hdr_search				= get_theme_mod('header_search');  
	$arowana_booknow_setting		= get_theme_mod('booknow_setting','1'); 
	$arowana_hdr_btn_icon			= get_theme_mod('header_btn_icon'); 
	$arowana_hdr_btn_lbl			= get_theme_mod('header_btn_lbl'); 
	$arowana_hdr_btn_link			= get_theme_mod('header_btn_link'); 
?>
<header id="header" role="banner">
<!-- Navigation Starts -->
	<div class="navbar-area normal-h <?php echo esc_attr(startkit_sticky_menu()); ?> active-1">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-6 my-auto">
				<div class="logo main">
					<?php if ( function_exists( 'startkit_logo_title_description' ) ) :	startkit_logo_title_description(); endif; ?>
				</div>
			</div>
			<!-- Nav -->
			<div class="col-lg-6 d-none d-lg-block my-auto">
				<nav class="text-right main-menu">
					<?php if ( function_exists( 'startkit_navigation' ) ) :	startkit_navigation(); endif; ?>
				</nav>
			</div>
			<!-- Nav End -->
			<div class="col-lg-3 col-6 my-auto">
				<div class="header-right-bar">                            
					<ul>
						<?php if($arowana_cart_hdr_setting == '1') { ?>
							<?php if ( ! empty( $arowana_hdr_search ) ) { ?>
								<li class="search-button search-cart-se">
									<a id="search-popup" href="javascript:void(0);"><i class="fa <?php echo esc_attr( $arowana_hdr_search ); ?>"></i></a>                                
								</li>
							<?php } ?>	
						<?php } ?>
						<?php if($arowana_booknow_setting == '1') { ?>
							<li class="book-now-btn">
								<?php if ( ! empty( $arowana_hdr_btn_lbl ) ) : ?>
									<a class="book-now" href="<?php echo esc_url( $arowana_hdr_btn_link ); ?>"><i class="fa <?php echo esc_attr( $arowana_hdr_btn_icon ); ?>"></i><?php echo esc_html( $arowana_hdr_btn_lbl ); ?></a>
								<?php endif; ?>		
							</li>
						<?php } ?>	
					</ul>
				</div>
			</div>
			<!-- Start Mobile Menu -->
            <div class="mobile-menu-area d-lg-none">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav class="mobile-menu-active">
                                    <?php startkit_navigation(); ?>
                                </nav>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Mobile Menu -->
		</div>
	</div>
</div>	
<!-- Navigation End -->
 <!-- Start: Search
    ============================= -->
	<div id="search">
		<a href="javascript:void(0);" id="close-btn"><i class="fa fa-times"></i></a>      
		<div>        
		<form method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input id="searchbox" class="search-field" type="search" type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e('type here','arowana'); ?>" />
			<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
		</form>
		</div>        
	</div>	
<!-- End: Search
============================= -->
<?php 
if ( !is_page_template( 'templates/template-homepage.php' ) ) {
		startkit_breadcrumbs_style(); 
	}
?>