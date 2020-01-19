<div class="promaxtopmenu">
			<div class="header-navigation-wrapper">

					<?php
					if ( has_nav_menu( 'promax-navigation' ) ) {
						?>

							<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'promax' ); ?>" role="navigation">

								<ul class="primary-menu reset-list-style">

								<?php
								if ( has_nav_menu( 'promax-navigation' ) ) {

									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'promax-navigation',
										)
									);

								} 
								?>

								</ul>

							</nav><!-- .primary-menu-wrapper -->

						<?php
					} ?>
					<?php echo wp_kses_post( promax_socialprofiles() ); ?>
					</div>
					</div>				