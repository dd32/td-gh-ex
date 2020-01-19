<div id="promaxmain">
			<div class="header-navigation-wrapper">

					<?php
					if ( has_nav_menu( 'primary' ) ) {
						?>

							<nav class="primari-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'promax' ); ?>" role="navigation">

								<ul class="primari-menu reset-list-style">

								<?php
								if ( has_nav_menu( 'primary' ) ) {

									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'primary',
										)
									);

								} 
								?>

								</ul>

							</nav><!-- .primary-menu-wrapper -->

						<?php
					} ?>
					</div>
					</div>				