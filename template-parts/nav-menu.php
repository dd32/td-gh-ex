<div id="promaxmain">
			<div class="header-navigation-wrapper">

					<?php
					if ( has_nav_menu( 'primary' ) ) {
						?>

							<nav class="primari-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'promax' ); ?>" role="navigation">

								<ul class="primari-menu reset-list-style">

								<?php
									// wp_nav_menu(
										// array(
											// 'fallback_cb'    => 'promax_fallbackcb',
											// 'container'  => '',
											// 'items_wrap' => '%3$s',
											// 'theme_location' => 'primary',
										// )
									// );
								 wp_nav_menu(
									array(
										'theme_location' => 'primary',						
										'items_wrap' => '%3$s',
										'menu_class'     => '',
										//'fallback_cb'    => '',
										//'echo'           => false,
									)
								);						
								
								?>

								</ul>

							</nav><!-- .primary-menu-wrapper -->

						<?php
					}
					?>
					</div>
					</div>				