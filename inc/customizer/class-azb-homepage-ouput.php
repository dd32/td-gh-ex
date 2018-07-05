<?php
/**
 * Class AzonBooster_Homepage_Output for customize render
 *
 * @since 1.2.0
 * @package azonbooster
 */
class AzonBooster_Homepage_Output
{
	public function __construct() {

		add_filter( 'azonbooster_homepage_content_show', array( $this, 'show_homepage_content' ) );

		add_action( 'azonbooster_homepage', array( $this, 'repeater_content'), 20 );
	}

	/**
	 * Show or hide default page content
	 * 
	 * @since 1.2.0
	 * @param  boolean $is_show
	 * @return boolean
	 */
	public function show_homepage_content( $is_show ) {

		$is_show = azonbooster_get_option( 'homepage_show_page_content_setting', true );

		return $is_show;
	}

	/**
	 * Show homepage repeater content
	 *
	 * @since 1.2.0
	 * @return void
	 */
	public function repeater_content() {

		$contents = azonbooster_get_option( 'homepage_content_setting', array() );
		$columns = azonbooster_get_option( 'homepage_content_col_setting', 2);

		if ( ! empty( $contents ) ) {
			// Div Container
			printf('<div class="azb-hmp-container azb-hmp-box-%s">', $columns);
			if ( $columns > 1 ) {

				$contents = array_chunk( $contents, $columns );

				foreach ( $contents as $key => $vals ) {

					printf('<div class="azb-hmp-row azb-hmp-row-%s">', $key+1 );
						$index = 1;
						foreach ( $vals as $v ) {

							echo $this->render_main($v, $index);
							$index++;
						}

					echo '</div>';
				}

			} else {

				echo '<div class="azb-hmp-row azb-hmp-row-1">';

					foreach ( $contents as $content ) {

						echo $this->render_main( $content );						
					
					}

				echo '</div>';
			}

			echo '</div>'; // Div container
		}
		
	}

	private function render_main( $param, $index = 1 ) {

		$posts = $this->get_posts( $param );

		$content = '';

		if ( ! empty( $posts ) ) {
			
			printf( '<div class="azb-box azb-box-%s">', $index );
			$this->render_category( $param );
			echo $this->render_posts( $posts, $param );
			echo '</div>';

		}

	}

	/**
	 * Render posts from each repeater control
	 * 
	 * @param  array $posts
	 * @param  array $param
	 * @return string
	 */
	private function render_posts( $posts, $param ) {
		global $post;

		ob_start();

		$ul_class = 'azb-hmp-style-'. $param['render_style'];

		 $ul_class .= $param['render_style'] == 'grid' ?  ' grid-'. $param['num_cols'] : '';

		printf('<ul class="%s">', $ul_class);
		foreach ( $posts as $post ) :

			setup_postdata($post);
			?>
			<li>
				<?php $this->render_post_title( $param ) ?>
				<?php $this->render_post_content( $param ) ?>

			</li>
			<?php

		endforeach;
		echo '</ul>';
		wp_reset_postdata();

		$content = ob_get_clean();

		return $content;
	}

	/**
	 * Get posts by custom condition on homepage
	 *
	 * @since 1.2.0
	 * @param  array $params
	 * @return array of posts
	 */
	private function get_posts( $params ) {

		$args = array(
			'ignore_sticky_posts'	=> false,
			'posts_per_page'	=> $params['post_per_page'],
		);

		if ( $params['cat'] > 0 ) {
			$args['cat'] = $params['cat'];
		}

		$posts = get_posts( $args );

		return $posts;
	}

	private function render_post_title( $param ) {

		?>
			<div class="azb-hmp-title">
				<?php 
					if ( $param['image_pos'] == 'befor_title') : 
						$this->render_post_thumbnail( $param );
					endif;

				?>
				<a href="<?php the_permalink() ?>"><?php echo $this->render_simple_html_el( get_the_title(), $param['post_content_title_el'] ) ?></a>
				<?php 
					if ( $param['image_pos'] == 'after_title') : 
						$this->render_post_thumbnail( $param );
					endif;

				?>
			</div>
		<?php
	}

	private function render_post_content( $param ) {

		// If don't show content
		if ( $param['post_content_type'] == 'none' ) return;

		?>
		<div class="azb-hmp-content"><?php the_excerpt() ?></div>
		<?php
	}

	private function render_post_thumbnail( $param ) {

		// Return if post doesn't have or show thumbnail
		if ( ! $param['image_show'] || ! has_post_thumbnail() ) return;

		$class = 'img-align-'. $param['image_alignment'];

		
		printf('<div class="%s">', $class);
		the_post_thumbnail();
		echo '</div>';
	}

	private function render_category( $param ) {

		if ( $param['cat'] == 0 ) {

			printf('<h2 class="azb-hmp-cat"><a href="%s">%s</a></h2>', get_permalink( get_option( 'page_for_posts' ) ), __('Recent Posts', 'azonbooster') . ' <span class="arrow">&raquo;</span>' );

		} else {

			$cat = get_category( $param['cat'] );			
			$content = sprintf('<h2 class="azb-hmp-cat"><a href="%s">%s</a></h2>', get_category_link($cat), $cat->name . ' <span class="arrow">&raquo;</span>');


			if ( intval($param['cat_img'] ) > 0 ) {

				$content .= sprintf( '<div class="cat-img">%s</div>', wp_get_attachment_image( $param['cat_img'], array('450', '320')) );
			}

			if ( $cat->description != '' ) {
				$content .= sprintf('<div class="cat-desc">%s</div>', $cat->description );
			}

			printf('<div class="cat-summary">%s</div>', $content );
			
		}
	}

	public function render_simple_html_el( $content, $tag, $class = '', $id = '' ) {
		
		$class = $class != '' ? ' class="' . $class .'"' : '';
		$id = $id != '' ? ' id="' . $id .'"' : '';

		$attr = $class . $id;

		return sprintf('<%s %s >%s</%s>', $tag, $attr, $content, $tag );
	}

}

new AzonBooster_Homepage_Output();