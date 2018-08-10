<?php
/**
 * Related Posts Class
 *
 * @author   AzonBooster
 * @since    1.2.3
 * @package  AzonBooster
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AzonBooster_Related_Posts' ) ) :
	/**
	 * AzonBooster_Related_Posts
	 *
	 * @since 1.2.3
	 */
	class AzonBooster_Related_Posts {
		/**
		 * Class Contructor
		 *
		 * @since    1.2.3
		 */
		public function __construct() {

		}

		/**
		 * Render Related Posts
		 * 
		 * @return void
		 */
		public function render_related_posts( $posts, $style ) {

			?>
			<div class="related-posts">
				<h5 class="related-posts-title"><b><?php echo esc_html(apply_filters( 'azonbooster_related_posts_title', __('See More Related', 'azonbooster') ) ) ?></b></h5>

				<?php

					if ( $style == 'grid' ) {

						$this->render_grid( $posts );

					} else {
					
						$this->render_list( $posts );
					
					}
				?>
			</div>
			<?php

		}

		/**
		 * Render List Articles
		 *
		 * @since 
		 * @return void
		 */
		private function render_list( $posts ) {

			global $post;

			?>
				<ul class="list-related-posts">
				<?php 
					foreach ($posts as $post) :
						setup_postdata($post);
						?>
						<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
						<?php
					endforeach;
				?>
				</ul>
			<?php

			wp_reset_postdata();
		}

		private function render_grid( $posts ) {

			global $post;

			$num_col = apply_filters( 'azonbooster_related_posts_num_cols', 4 );

			switch ( $num_col ) {
				case 1:
					$size = 'full';
					break;
				case 2:
				case 3:
					$size = 'large';
					break;
				case 4:
				case 6:
					$size = 'large';
					break;
				
				default:
					$size = 'medium';
					break;
			}
			

			$num_col_class = 'num-col-' . $num_col;
			$thumbnail_pos = apply_filters( 'azonbooster_related_posts_thumb_pos', 'top' );
			$thumbnail_size = apply_filters( 'azonbooster_related_posts_thumb_size', $size );

			?>
			<div class="grid-related-posts <?php echo esc_attr( $num_col_class . ' num-row-1' ) ?>">
				<?php 
					
					$i = 1;
					$n = 1;

					foreach ($posts as $post) :

						setup_postdata($post);

						
						?>

						<div class="related-post-block <?php echo esc_attr('azb-rpb-' . $i ) ?>">

							<?php if ( has_post_thumbnail() ) : ?>
								<div class="related-post-thumbnail">
									<a href="<?php the_permalink() ?>"> 
									<?php the_post_thumbnail( $thumbnail_size ); ?></a>
								</div>
							<?php endif; ?>

							<div class="related-post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
						</div>
						<?php
						if ( $i % $num_col == 0 && $num_col <= $i  ) :
							$n++;
						?>
							</div>	
							<div class="grid-related-posts <?php echo esc_attr( $num_col_class . ' num-row-' . $n ) ?>">
						<?php
						 endif;
						$i++;


					endforeach;
				?>
	
			</div>
			<?php

			wp_reset_postdata();
		}
	}

endif;