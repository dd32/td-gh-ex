<?php
/**
 * The template file to display the mobile header
 *
 * @package agncy
 */

?>
<header class="mobile-header color-primary--border visible-xs visible-sm" role="banner">
	<div class="container header-container">
		<div class="row header-row">
			<div class="col-xs-9 col-sm-9 title-wrapper">
				<?php get_template_part( 'template-parts/header/logo', 'mobile' ); ?>
			</div>
			<div class="col-xs-3 col-sm-3 hidden-md hidden-lg trigger-wrapper">
				<a class="mobile-nav-trigger" title="<?php esc_attr_e( 'Navigation', 'agncy' ); ?>">
					<span class="color-primary--background"></span>
				</a>
			</div>
			<div class="nav-lightbox"></div>
			<div class="nav-wrapper color-primary--background" role="navigation">
				<?php
				$show_searchform = get_theme_mod( 'agncy_header_show_mobile_search', true );

				if ( $show_searchform ) {
					/*
					* Call the search form
					*/
					get_search_form();
				}

				/*
				 * Call the header nav menu
				 */
				$args = array(
					'theme_location'  => 'header',
					'menu_class'      => 'menu clearfix header',
					'container'       => 'nav',
					'container_class' => 'header-menu',
					'link_class'      => 'primaryBorder color-primary--border-hover',
					'fallback_cb'     => false,
					'depth'           => 3,
				);
				wp_nav_menu( $args );
				?>
			</div>
		</div>
	</div>
</header>
