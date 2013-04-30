<?php get_header(); ?>

<?php get_template_part( 'template-part', 'wrap-before' ); ?>

					<article id="post-0" class="post error-404 page-not-found">
						<header class="entry-header page-header">
							<h1 class="entry-title"><?php _e( 'Page not found. Error 404', 'activetab' ); ?></h1>
						</header><!-- /.entry-header -->

						<div class="entry-content">
							<div class="alert alert-error">
								<?php _e( 'The URL you requested could not be found.', 'activetab' ); ?>
							</div>

							<?php get_search_form(); ?>


							<h4><?php _e( 'Popular posts', 'activetab' ); ?></h4>
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


							<h4><?php _e( 'Recent posts', 'activetab' ); ?></h4>
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


						</div><!-- /.entry-content -->
					</article><!-- /#post-0 -->

<?php get_template_part( 'template-part', 'wrap-after' ); ?>

<?php //get_sidebar(); ?>

<?php get_footer(); ?>