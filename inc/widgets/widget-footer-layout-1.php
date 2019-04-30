<?php
/**
 * Widget - Footer Layouts One
 *
 * @package Best_Charity
 */


/*-----------------------------------------------------
		Footer News Layouts 1 Widgets
		-----------------------------------------------------*/

		if ( ! class_exists( 'Best_Charity_Footer_Layouts_One' ) ) :
	/**
	* News Block Layout One
	*/
	class Best_Charity_Footer_Layouts_One extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'block-layout-a',
				'description'	=> esc_html__( 'Footer Layouts One. Place it within "Footer widget"', 'best-charity' )
			);

			parent::__construct( 'footer-layout-one', esc_html__( 'Bnews: Footer News Layouts 1', 'best-charity' ), $opts );
		}

		function widget( $args, $instance ) {
			
			$description = ! empty( $instance[ 'description' ] ) ? $instance[ 'description' ] : '';
			$facebook_url = ! empty( $instance[ 'facebook_url' ] ) ? $instance[ 'facebook_url' ] : '';
			$twitter_url = ! empty( $instance[ 'twitter_url' ] ) ? $instance[ 'twitter_url' ] : '';
			$linkedin_url = ! empty( $instance[ 'linkedin_url' ] ) ? $instance[ 'linkedin_url' ] : '';
			$instagram_url = ! empty( $instance[ 'instagram_url' ] ) ? $instance[ 'instagram_url' ] : '';

			echo $args[ 'before_widget' ];
			?>

			<div class="f-about">
				<div class="logo">
					<?php 
					if(has_custom_logo()):
						the_custom_logo();
					else:    
						?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url());?>" class="navbar-brand"><?php bloginfo('title');?></a></h1>
					<?php endif;?>
				</div>
				
				<p class="text"><?php echo esc_html($description);?></p>
				<!-- Social -->
				<ul class="social-links">
					<li><a href="<?php echo esc_url( $twitter_url );?>"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
					<li><a href="<?php echo esc_url( $facebook_url );?>"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
					<li><a href="<?php echo esc_url( $facebook_url );?>"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
					<li><a href="<?php echo esc_url( $instagram_url );?>"><span class="fa fa-instagram" aria-hidden="true"></span></a></li>
				</ul>
				<!-- End Social -->
			</div>

			<?php
			echo $args[ 'after_widget' ];
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance[ 'description' ] = sanitize_text_field( $new_instance[ 'description' ] );

			$instance[ 'facebook_url' ] = esc_url( $new_instance[ 'facebook_url' ] );
			$instance[ 'twitter_url' ] = esc_url( $new_instance[ 'twitter_url' ] );
			$instance[ 'linkedin_url' ] = esc_url( $new_instance[ 'linkedin_url' ] );
			$instance[ 'instagram_url' ] = esc_url( $new_instance[ 'instagram_url' ] );

			return $instance;
		}

		function form( $instance ) {

			$description = ! empty( $instance[ 'description' ] ) ? $instance[ 'description' ] : '';

			$facebook_url = ! empty( $instance[ 'facebook_url' ] ) ? $instance[ 'facebook_url' ] : '';
			$twitter_url = ! empty( $instance[ 'twitter_url' ] ) ? $instance[ 'twitter_url' ] : '';
			$linkedin_url = ! empty( $instance[ 'linkedin_url' ] ) ? $instance[ 'linkedin_url' ] : '';
			$instagram_url = ! empty( $instance[ 'instagram_url' ] ) ? $instance[ 'instagram_url' ] : '';
			

			?>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><strong><?php echo esc_html__( 'Description: ', 'best-charity' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" value="<?php echo esc_attr( $description ); ?>" class="widefat">
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_url' ) ); ?>"><strong><?php echo esc_html__( 'Twitter Url: ', 'best-charity' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'twitter_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_url' ) ); ?>" value="<?php echo esc_attr( $twitter_url ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'facebook_url' ) ); ?>"><strong><?php echo esc_html__( 'Facebook Url: ', 'best-charity' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'facebook_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_url' ) ); ?>" value="<?php echo esc_attr( $facebook_url ); ?>" class="widefat">
			</p>

			

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin_url' ) ); ?>"><strong><?php echo esc_html__( 'Linkedin Url: ', 'best-charity' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'linkedin_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin_url' ) ); ?>" value="<?php echo esc_attr( $linkedin_url ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'instagram_url' ) ); ?>"><strong><?php echo esc_html__( 'Instagram Url: ', 'best-charity' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'instagram_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram_url' ) ); ?>" value="<?php echo esc_attr( $instagram_url ); ?>" class="widefat">
			</p>
			
			<?php
		}
	}
endif;