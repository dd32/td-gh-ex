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
								wp_nav_menu( array(
									 'theme_location'  => 'primary',
									 'container'       => 'div',
									 'container_class' => 'collapse navbar-collapse',
									 'container_id' => 'navbarNavDropdown',
									 'menu_class'      => 'nav navbar-nav m-right-auto',
									 'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
									 'walker'          => new wp_bootstrap_navwalker()
								) );
						    ?>
				</div>
			</div>
		</div>
	</nav>
	<!-- /Theme Menubar -->