<?php


if ( ! function_exists( 'aemi_header_menu' ) )
{
	function aemi_header_menu()
	{
		if ( has_nav_menu( 'header-menu' ) )
		{ ?>
			<nav id="header-menu" role="navigation">

				<div id="toggle-header-menu" class="toggle">+</div>

				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

			</nav>

		<?php
		} else {
			echo '<div class="spacer"></div>';
		}
	}
}



if ( ! function_exists( 'aemi_header_branding' ) )
{
	function aemi_header_branding()
	{ ?>

		<div id="branding">

			<?php if ( has_custom_logo() )
			{ ?>

				<div id="logo">

					<a href="<?php echo esc_html( home_url() ); ?>" class="custom-logo-link" rel="home" itemprop="url">
						<img width="46" height="46" src="<?php echo esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'aemi-logo' )[0] ); ?>" class="custom-logo" alt="" itemprop="logo" >
					</a>

				</div>

				<?php

			}
			else if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() )
			{

				jetpack_the_site_logo();

			}
			else
			{ ?>

				<h1 id="site-title" class="site-title">
					<a href="<?php echo esc_html( home_url() ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				</h1>

			<?php } ?>

		</div>

	<?php }
}



if ( ! function_exists( 'aemi_header_widgets' ) )
{
	function aemi_header_widgets()
	{
		if ( is_active_sidebar( 'header-widget-area' ) )
		{ ?>

			<div id="header-widget">

				<div id="toggle-header-widget" class="toggle">&#8285;</div>
				<div id="header-widget-container"  class="widget-area">

					<?php dynamic_sidebar( 'header-widget-area' ); ?>

				</div>

			</div>

		<?php }

		else
		{
			echo '<div class="spacer"></div>';
		}
	}
}
