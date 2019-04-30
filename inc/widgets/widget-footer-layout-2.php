<?php
/**
 * Widget - Footer Latest News
 *
 * @package Best_Charity
 */


/*-----------------------------------------------------
		Footer Latest News Widgets
		-----------------------------------------------------*/

		if ( ! class_exists( 'Best_Charity_Footer_Latest_News' ) ) :
	/**
	* NFooter Latest News Widgets
	*/
	class Best_Charity_Footer_Latest_News extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'block-layout-a',
				'description'	=> esc_html__( 'Footer Latest News widgets. Place it within "Footer widget"', 'best-charity' )
			);

			parent::__construct( 'footer-latest-news', esc_html__( 'Bnews: Footer Latest News', 'best-charity' ), $opts );
		}

		function widget( $args, $instance ) {
			
			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 3;

			echo $args[ 'before_widget' ];
			?>

			<div class="r-post">
				<?php
				echo $args[ 'before_title' ];
				?>
				<?php 

				echo esc_html( $title ); ?>
				<?php
				echo $args[ 'after_title' ];
				$the_query = new WP_Query('showposts='.$post_no.'&orderby=post_date&order=desc');

				while ($the_query->have_posts()) : $the_query->the_post(); 
					?>
					<div class="media">
						<a href="#" class="img-holder mr-3">
							<?php 
							if(has_post_thumbnail()):?>
								<?php the_post_thumbnail('recent-post-of-footer');?>
							<?php endif;
							?>
						</a>
						<div class="media-body">
							<span class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></span>
							<span class="date"><?php echo esc_html(get_the_date('F j, Y'));?></span>
						</div>
					</div>
					<?php
				endwhile; ?>
			</div>
			<?php
			echo $args[ 'after_widget' ];
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
			$instance[ 'post_no' ] = absint( $new_instance[ 'post_no' ] );

			return $instance;
		}

		function form( $instance ) {

			$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 3;
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php echo esc_html__( 'Title: ', 'best-charity' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_no' ) )?>"><strong><?php echo esc_html__( 'Post No: ', 'best-charity' )?></strong></label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_no' ) ); ?>" value="<?php echo esc_attr( $post_no ); ?>" class="widefat">
			</p>
			<?php
		}
	}
endif;