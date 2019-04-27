<?php
/**
 * 	Footer.
 */
?>

				<footer class="footer-wrapper">
					<div class="footer-container">
						<div class="top-footer">
							<div class="container-box">
								<div class="container">

								</div>
							</div>
						</div>

						<div class="middle-footer">
							<div class="container-box">
								<div class="container">
									<div class="middle-footer-inner">
										<div class="row">
											<div class="three columns">
												<div class="">
													<?php if (is_active_sidebar('footer-one')) : ?>
														<div class="footer-widget-area">
															<?php dynamic_sidebar('footer-one'); ?>
														</div>
													<?php endif; ?>
												</div>
											</div>
											<div class="three columns">
												<div class="">
													<?php if (is_active_sidebar('footer-two')) : ?>
														<div class="footer-widget-area">
															<?php dynamic_sidebar('footer-two'); ?>
														</div>
													<?php endif; ?>
												</div>
											</div>
											<div class="three columns">
												<div class="">
													<?php if (is_active_sidebar('footer-three')) : ?>
														<div class="footer-widget-area">
															<?php dynamic_sidebar('footer-three'); ?>
														</div>
													<?php endif; ?>
												</div>
											</div>
											<div class="three columns">
												<div class="">
													<?php if (is_active_sidebar('footer-four')) : ?>
														<div class="footer-widget-area">
															<?php dynamic_sidebar('footer-four'); ?>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="bottom-footer">
							<div class="container-box">
								<div class="">
									<div class="bottom-footer-inner">

										<nav id="footer-navigation" class="footer-navigation" role="navigation">
											<?php
                                                $defaults = array(
                                                    'theme_location' => 'footer-menu',
                                                    'menu' => '',
                                                    'container' => 'div',
                                                    'container_class' => 'footer-menu',
                                                    'container_id' => 'footer-menu',
                                                    'menu_class' => 'nav justify-content-center',
                                                    'menu_id' => '',
                                                    'echo' => true,
                                                    'fallback_cb' => 'wp_page_menu',
                                                    'before' => '',
                                                    'after' => '',
                                                    'link_before' => '',
                                                    'link_after' => '',
                                                    'depth' => 1,
                                                    'walker' => '',
                                                );
                                            ?>
											<?php wp_nav_menu($defaults); ?>
										</nav>

										<div class="copyright">
											<?php
                                                $author_url = esc_url('http://alisiddique.com/');
                                            ?>
											<a target="_blank" href="<?php echo esc_url(__('https://wordpress.org/', 'bnw-theme')); ?>"><?php printf(esc_html__('Proudly powered by %s', 'bnw-theme'), 'WordPress'); ?></a>
											<br>

											<?php

                                                echo sprintf(__('Design and Developed by <a href="%s" target="_blank" rel="designer">Ali Siddique</a>', 'bnw-theme'), $author_url);

                                            ?>
											<br>
											Copyright &copy; <?php $the_year = date('Y'); echo esc_html($the_year); ?> | <?php bloginfo('name'); ?> | All Rights Reserved.
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</footer>


			</div><!-- /wrapper-container -->
		</div><!-- /wrapper -->

        <?php wp_footer(); ?>
    </body>
</html>