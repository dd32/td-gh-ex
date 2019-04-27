<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
		<!-- Basic Page Needs
		================================================== -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- Mobile Specific Meta
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		        
		<?php wp_head(); ?>
		
	</head>
	
    <body <?php body_class(); ?>>
        <div class="wrapper">
			<div class="wrapper-container">

                <header class="header-wrapper">
					<div class="header-container">

						<div class="top-header">
							<div class="container-box">
								<div class="">
									<div class="top-header-inner u-text-center">
										
									</div>
								</div>
							</div>
						</div>

						<div class="middle-header">
							<div class="container-box">
								<div class="">
									<div class="middle-header-inner u-text-center">

										<div class="row">
											<div class="twelve columns">

												<div class="brand-logo-text">
													
													<h2>
														<a href="<?php echo esc_url(home_url('/')); ?>">
															<?php bloginfo('name'); ?>
														</a>
													</h2>
													
												</div>

												<div class="brand-desc-alt">
													<?php bloginfo('description'); ?>
												</div>

											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>

						<div class="bottom-header">
							<div class="container-box">
								<div class="">
									<div class="bottom-header-inner">
										<div class="menu-container">
											<nav id="main-navigation" class="main-navigation" role="navigation">

												<?php if (has_nav_menu('main-menu')) : ?>

													<?php
                                                        wp_nav_menu(array(
                                                            'theme_location' => 'main-menu',
                                                            'menu_id' => '',
                                                            'menu_class' => '',
                                                            'container_id' => 'main-menu',
                                                            'container_class' => 'rmm style main-menu',
                                                        ));
                                                    ?>

												<?php endif; ?>
												
											</nav><!-- #site-navigation -->
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>

				</header>