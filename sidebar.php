
				<div class="span4">
					<div id="secondary" class="widget-area" role="complementary">


						<header id="masthead" class="site-header clearfix" role="banner">

							<div class="site-title-description">
								<?php
								$title_desc = esc_attr( get_bloginfo( 'name', 'display' ) );
								if ( get_bloginfo( 'description' ) ){
									$title_desc .= ' | '.esc_attr( get_bloginfo( 'description', 'display' ) );
								}
								?>
								<h4 class="site-title">
									<?php if( activetab_is_homepage() ): ?>
										<?php bloginfo( 'name' ); ?>
									<?php else: ?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
										   title="<?php echo $title_desc ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
									<?php endif; ?>
								</h4>
								<?php /*
                                    bloginfo('comments_rss2_url'); // all comments rss feed
                                    if ( get_bloginfo( 'description' ) ): ?>
									<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
								<?php endif; */ ?>
							</div>

							<?php $header_image = get_header_image();
							if ( ! empty( $header_image ) ) : ?>
								<?php if( ! activetab_is_homepage() ): ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
									   title="<?php echo $title_desc ?>"
									   rel="home">
								<?php endif; ?>
									<img class="border-radius" src="<?php echo esc_url( $header_image ); ?>"
					                   height="<?php echo get_custom_header()->height; ?>"
					                   width="<?php echo get_custom_header()->width; ?>"
					                   alt="<?php echo $title_desc ?>" />
								<?php if( ! activetab_is_homepage() ): ?>
									</a>
								<?php endif; ?>
							<?php endif; ?>

						</header> <!-- /#masthead /.site-header -->



						<aside id="search" class="widget widget_search">
							<?php get_search_form(); ?>
						</aside>


						<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : // sidebar widgetized area ?>
							<?php
								// show something if there is no widgets in main sidebar
							?>


							<aside id="archives-popular" class="widget widget_popular_entries">
								<h4 class="widget-title"><?php _e( 'Popular posts', 'activetab' ); ?></h4>
								<ul>
									<?php // recent posts
									$args = array(
										'numberposts' => 3,
										'post_status' => 'publish',
										'post_type' => 'post',
										'orderby' => 'comment_count',
										'order' => 'desc'
									);
									$recent_posts = get_posts( $args );
									foreach( $recent_posts as $recent_post ) : setup_postdata( $recent_post ); ?>
										<li><a href="<?php echo get_page_link( $recent_post->ID ); ?>"><?php echo $recent_post->post_title; ?></a></li>
										<?php endforeach; ?>
								</ul>
							</aside>


							<aside id="archives" class="widget widget_recent_entries">
								<h4 class="widget-title"><?php _e( 'Recent posts', 'activetab' ); ?></h4>
								<ul>
									<?php // recent posts
									$args = array(
										'numberposts' => 3,
										'post_status' => 'publish',
										'post_type' => 'post',
										'orderby' => 'post_date',
										'order' => 'desc'
									);
									$recent_posts = get_posts( $args );
									foreach( $recent_posts as $recent_post ) : setup_postdata( $recent_post ); ?>
										<li><a href="<?php echo get_page_link( $recent_post->ID ); ?>"><?php echo $recent_post->post_title; ?></a></li>
									<?php endforeach; ?>
								</ul>
							</aside>


							<aside id="categories" class="widget widget_categories">
								<h4 class="widget-title"><?php _e( 'Categories', 'activetab' ); ?></h4>
								<ul>
									<?php
									// http://codex.wordpress.org/Template_Tags/wp_list_categories
									$cat_args = array(
										'show_option_all'    => '',
										'orderby'            => 'name',
										'order'              => 'ASC',
										'style'              => 'list',
										'show_count'         => 1,
										'hide_empty'         => 1,
										'use_desc_for_title' => 1,
										'child_of'           => 0,
										'hierarchical'       => 1,
										'title_li'           => '',
										'number'             => null,
										'depth'              => 0,
									);
									wp_list_categories( $cat_args ); ?>
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
