<?php


function bellini_header_logo(){ ?>

		<div class="col-md-2">
		<div class="site-branding">
			<?php
				// Check if Jetpack Logo is Active
				if ( function_exists( 'jetpack_the_site_logo' ) ):
					jetpack_the_site_logo();
				elseif (get_theme_mod('bellini_header_logo', '') !== ''):?>
					<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_theme_mod('bellini_header_logo');?>" alt="<?php bloginfo( 'name' ); ?>">
					</a>
				<?php else:
				// Display the Sitename as Logo
				 if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title" itemprop="headline">
						<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</h1>
				<?php else : ?>
					<p class="site-title" itemprop="headline">
						<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</p>
				<?php endif;

				endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description" itemprop="description"><?php echo $description; ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		</div>
<?php }


function bellini_header_menu(){ ?>
			<div class="col-md-8">
			<?php if ( get_theme_mod('bellini_menu_layout') == 'hamburger' ):?>

			<!-- Hamburger Menu -->
			<nav id="site-navigation" class="full-menu" aria-label="site links" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				<div class="full-menu--middle">
				<button class="menu-toggles menu-toggles--close" aria-controls="primary-menu" aria-expanded="true">
				<div class="site-title" itemprop="headline">
					<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</div>
				</button>
				<div class="container">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'main-nav' ) ); ?>
				</div>
				</div>
			</nav>
			<button class="menu-toggles" aria-controls="primary-menu" aria-expanded="false">
				<?php if(get_theme_mod('bellini_hamburger_title', '') !== ''){
            			echo do_shortcode(get_theme_mod( 'bellini_hamburger_title'));
				}?>
			</button><!-- Hamburger Menu ends -->
		<?php else:?>


		<?php
			//Support for Max Mega Menu
			 if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('primary') ) : ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
			<?php else: ?>

				<nav id="site-navigation" class="main-navigation" aria-label="site links" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'bellini' ); ?></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->

				<?php endif; ?>
			<?php endif; ?>
	</div>
<?php }



if ( ! function_exists( 'bellini_product_search' ) ) {
	function bellini_product_search() {
		if ( is_woocommerce_activated() ) { ?>
			<div class="site-search">
			<span class="site-search__icon"></span>
				<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
			</div>
		<?php
		}
	}
}

if ( ! function_exists( 'bellini_cart_link' ) ) {
	function bellini_cart_link() {?>
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'bellini' ); ?>">
				<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
				<span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'bellini' ), WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		<?php
	}
}



if ( ! function_exists( 'bellini_header_cart' ) ) {
	function bellini_header_cart() {
		if ( is_woocommerce_activated() ) {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = 'listed__total';
			}
		?>
		<!-- Cart Sidebar -->

		<div class="sidebar__cart__full">
			<div class="row sidebar__cart__middle">
				<button class="cart-toggles cart-toggles--close">
				<?php esc_html_e( 'Your Cart ', 'bellini' ); ?>
				</button>

					<ul class="col-md-12 site-header-cart menu">
						<li class="<?php echo esc_attr( $class ); ?>">
							<?php bellini_cart_link(); ?>
						</li>
						<li>
							<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
						</li>
					</ul>
			</div>
			</div>
			<button class="cart-toggles">
				My Bag (<?php echo WC()->cart->get_cart_contents_count(); ?>)
			</button><!-- Hamburger Menu ends -->

		<?php
		}
	}
}


function bellini_top_header(){?>

<div class="col-md-2">
	<div class="row">
		<div class="col-md-10 col-xs-10 text-right text-left-xs"><?php bellini_header_cart(); ?></div>
		<div class="col-md-2 col-xs-2"><?php bellini_product_search(); ?></div>
	</div>
</div>

<?php }