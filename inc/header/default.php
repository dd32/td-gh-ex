<?php
/**
 * Default header template
 *
 * @package nnfy
 */

$logo = get_theme_mod('customizer_setting_one');

?>

<header  class="header-default main-header clearfix">
	<div class="header-area">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

					<div class="header-menu-wrap logo-left">
						<!-- Start Logo Wrapper  -->
						<div class="site-title">
							
							<?php if ( $logo ): ?>
								<a href="<?php echo esc_url( home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo('name','99fy')); ?>" rel="home" >
										
										<img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
								 </a>

							<?php else: ?>
								
								<h3>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
										<?php echo esc_html( get_bloginfo( 'title', 'display' ) ); ?>
									</a>
								</h3>
								<p><?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?></p>

							<?php endif ?>

						</div>
						<!-- End Logo Wrapper -->
						<!-- Start Primary Menu Wrapper -->
						<div class="primary-nav-wrap nav-horizontal default-menu default-style-one">
							<nav>
                                <?php
                                	wp_nav_menu(array(
                                		'theme_location' => 'primary',
                                		'container'      => false,
                                		'fallback_cb'    => 'nnfy_fallback'
                                	));
                                ?>
							</nav>
						</div>
						<!-- End Primary Menu Wrapper -->
					</div>
				</div>
			</div>
			<!-- Mobile Menu  -->
			<div class="mobile-menu"></div>
		</div>
	</div>	
</header>
