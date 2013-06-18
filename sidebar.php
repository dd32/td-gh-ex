
				<div class="span4">
					<div id="secondary" class="widget-area" role="complementary">


						<header id="masthead" class="site-header clearfix" role="banner">

							<div class="site-sidebar-title-description">
								<?php
								$show_sidebar_site_title = of_get_option( 'show_sidebar_site_title', '0' );
								$show_sidebar_site_description = of_get_option( 'show_sidebar_site_description', '0' );

								$title_desc = esc_attr( get_bloginfo( 'name', 'display' ) );
								if ( get_bloginfo( 'description' ) ) { // add desc to title attr
									$title_desc .= ' | '.esc_attr( get_bloginfo( 'description', 'display' ) );
								}

								if ( activetab_is_homepage() ) {
									$link_before = '';
									$link_after = '';
								} else {
									$link_before = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . $title_desc . '" rel="home">';
									$link_after = '</a>';
								}
								?>

								<?php if ( ! empty( $show_sidebar_site_title ) ) : ?>
								<h3 class="site-sidebar-title">
									<?php echo $link_before; ?><?php bloginfo( 'name' ); ?><?php echo $link_after; ?>
								</h3>
								<?php endif; ?>

								<?php if ( ! empty( $show_sidebar_site_description ) ) : ?>
									<?php if ( get_bloginfo( 'description' ) ) : ?>
									<h4 class="site-sidebar-description muted"><?php bloginfo( 'description' ); ?></h4>
									<?php endif; ?>
								<?php endif; ?>
							</div>

							<?php $header_image = get_header_image();
							if ( ! empty( $header_image ) ) : ?>
								<?php echo $link_before; ?>
									<img class="border-radius" src="<?php echo esc_url( $header_image ); ?>"
					                   height="<?php echo get_custom_header()->height; ?>"
					                   width="<?php echo get_custom_header()->width; ?>"
					                   alt="<?php echo $title_desc ?>" />
								<?php echo $link_after; ?>
							<?php endif; ?>

						</header> <!-- /#masthead /.site-header -->


						<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : // sidebar widgetized area ?>
							<?php
								// show something if there is no widgets in main sidebar
							?>


							<aside id="search" class="widget widget_search">
								<?php get_search_form(); ?>
							</aside>


							<aside id="archives-popular" class="widget widget_popular_entries">
								<h4 class="widget-title"><?php _e( 'Popular posts', 'activetab' ); ?></h4>
								<ul>
									<?php // 3 most popular posts ordered by comment count
									$args = array(
										'numberposts' => 3,
										'post_status' => 'publish',
										'post_type' => 'post',
										'orderby' => 'comment_count',
										'order' => 'desc'
									);
									$recent_posts = get_posts( $args );
									foreach( $recent_posts as $recent_post ) : setup_postdata( $recent_post );
										echo '<li><a href="' . esc_url( get_page_link( $recent_post->ID ) ) . '">' . $recent_post->post_title . '</a></li>';
									endforeach; ?>
								</ul>
							</aside>


							<aside id="archives" class="widget widget_recent_entries">
								<h4 class="widget-title"><?php _e( 'Recent posts', 'activetab' ); ?></h4>
								<ul>
									<?php // 3 most recent posts ordered by publish date
									$args = array(
										'numberposts' => 3,
										'post_status' => 'publish',
										'post_type' => 'post',
										'orderby' => 'post_date',
										'order' => 'desc'
									);
									$recent_posts = get_posts( $args );
									foreach( $recent_posts as $recent_post ) : setup_postdata( $recent_post );
										echo '<li><a href="' . esc_url( get_page_link( $recent_post->ID ) ) . '">' . $recent_post->post_title . '</a></li>';
									endforeach; ?>
								</ul>
							</aside>


							<aside id="categories" class="widget widget_categories">
								<h4 class="widget-title"><?php _e( 'Categories', 'activetab' ); ?></h4>
								<ul>
									<?php
									$cat_args = array(
										'show_option_all' => '',
										'orderby' => 'name',
										'order' => 'ASC',
										'style' => 'list',
										'show_count' => 1,
										'hide_empty' => 1,
										'use_desc_for_title' => 1,
										'child_of' => 0,
										'hierarchical' => 1,
										'title_li' => '',
										'number' => null,
										'depth' => 0,
									);
									wp_list_categories( $cat_args ); // http://codex.wordpress.org/Template_Tags/wp_list_categories
									?>
								</ul>
							</aside>


							<aside id="meta" class="widget">
								<h4 class="widget-title"><?php _e( 'Meta', 'activetab' ); ?></h4>
								<ul>
									<?php wp_register(); ?>
									<li><?php wp_loginout(); ?></li>
								</ul>
							</aside>


						<?php endif; // end of the sidebar widgetized area ?>

					</div> <!-- /#secondary /.widget-area -->
				</div> <!-- /.span4 -->
