<?php
/**
 *
 * @package Theme Freesia
 * @subpackage Arise
 * @since Arise 1.0
 */
/************************* ARISE OUR TEAM WIDGETS **************************************/

class arise_display_team extends WP_Widget {
	function arise_display_team() {
 		$widget_ops = array( 'classname' => 'widget_team', 'description' => __( 'Display Our Team Widgets on front Page', 'arise' ) );
 		$control_ops = array( 'width' => 200, 'height' =>250 ); 
 		parent::__construct( false, $name = __( 'TF: FP Our Team', 'arise' ), $widget_ops, $control_ops);
	}
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '','primary_text' => '', 'secondary_text' => '', 'number' => '4', 'image1' => '','ourteam_link1' => '', 'name1' =>'', 'text1' => '', 'description1' => '', 'team_facebook_link1'=>'', 'team_pinintrest_link1'=>'', 'team_twitter_link1'=>'', 'team_googleplus_link1'=>'', 'team_linkedin_link1'=>'', 'team_youtube_link1'=>'', 'team_tumblr_link1'=>'', 'team_vimeo_link1'=>'', 'team_flickr_link1'=>'', 'team_feed_link1'=>'', 'team_dribbble_link1'=>'', 'team_wordpress_link1'=>'', 'team_github_link1'=>'', 'team_instagram_link1'=>'', 'team_codepen_link1'=>'', 'team_polldaddy_link1'=>'', 'team_path_link1'=>'', 'team_digg_link1'=>'', 'team_reddit_link1'=>'', 'team_stumbleupon_link1'=>'', 'team_dropbox_link1'=>'', 'team_pocket_link1'=>'','image2'=>'','ourteam_link2' => '', 'text2'=>'','description2' => '','name2'=>'', 'team_facebook_link2'=>'', 'team_pinintrest_link2'=>'', 'team_twitter_link2'=>'', 'team_googleplus_link2'=>'', 'team_linkedin_link2'=>'', 'team_youtube_link2'=>'', 'team_tumblr_link2'=>'', 'team_vimeo_link2'=>'', 'team_flickr_link2'=>'', 'team_feed_link2'=>'', 'team_dribbble_link2'=>'', 'team_wordpress_link2'=>'', 'team_github_link2'=>'', 'team_instagram_link2'=>'', 'team_codepen_link2'=>'', 'team_polldaddy_link2'=>'', 'team_path_link2'=>'', 'team_digg_link2'=>'', 'team_reddit_link2'=>'', 'team_stumbleupon_link2'=>'', 'team_dropbox_link2'=>'', 'team_pocket_link2'=>'','image3' => '','ourteam_link3' => '', 'text3' => '','description3' => '', 'name3' =>'', 'team_facebook_link3'=>'', 'team_pinintrest_link3'=>'', 'team_twitter_link3'=>'', 'team_googleplus_link3'=>'', 'team_linkedin_link3'=>'', 'team_youtube_link3'=>'', 'team_tumblr_link3'=>'', 'team_vimeo_link3'=>'', 'team_flickr_link3'=>'', 'team_feed_link3'=>'', 'team_dribbble_link3'=>'', 'team_wordpress_link3'=>'', 'team_github_link3'=>'', 'team_instagram_link3'=>'', 'team_codepen_link3'=>'', 'team_polldaddy_link3'=>'', 'team_path_link3'=>'', 'team_digg_link3'=>'', 'team_reddit_link3'=>'', 'team_stumbleupon_link3'=>'', 'team_dropbox_link3'=>'', 'team_pocket_link3'=>'','image4' => '','ourteam_link4' => '', 'text4' => '','description4' => '', 'name4' =>'', 'team_facebook_link4'=>'', 'team_pinintrest_link4'=>'', 'team_twitter_link4'=>'', 'team_googleplus_link4'=>'', 'team_linkedin_link4'=>'', 'team_youtube_link4'=>'', 'team_tumblr_link4'=>'', 'team_vimeo_link4'=>'', 'team_flickr_link4'=>'', 'team_feed_link4'=>'', 'team_dribbble_link4'=>'', 'team_wordpress_link4'=>'', 'team_github_link4'=>'', 'team_instagram_link4'=>'', 'team_codepen_link4'=>'', 'team_polldaddy_link4'=>'', 'team_path_link4'=>'', 'team_digg_link4'=>'', 'team_reddit_link4'=>'', 'team_stumbleupon_link4'=>'', 'team_dropbox_link4'=>'', 'team_pocket_link4'=>'' ) );
		$number = absint( $instance[ 'number' ] );
		$title = strip_tags($instance['title']);
		$primary_text = stripslashes( wp_filter_post_kses( addslashes ($instance['primary_text'])));
		$secondary_text = stripslashes( wp_filter_post_kses( addslashes ($instance['secondary_text'])));
		for ($i = 1; $i <= $number; $i++) {
			$image = 'image'.$i;
			$ourteam_link = 'ourteam_link'.$i;
			$name  = 'name'.$i;
			$text  = 'text'.$i;
			$description  = 'description'.$i;
			$team_facebook_link  = 'team_facebook_link'.$i;
			$team_twitter_link  = 'team_twitter_link'.$i;
			$team_googleplus_link  = 'team_googleplus_link'.$i;
			$team_pinintrest_link  = 'team_pinintrest_link'.$i;
			$team_linkedin_link  = 'team_linkedin_link'.$i;
			$team_youtube_link  = 'team_youtube_link'.$i;
			$team_tumblr_link  = 'team_tumblr_link'.$i;
			$team_vimeo_link  = 'team_vimeo_link'.$i;
			$team_flickr_link  = 'team_flickr_link'.$i;
			$team_feed_link  = 'team_feed_link'.$i;
			$team_dribbble_link  = 'team_dribbble_link'.$i;
			$team_wordpress_link  = 'team_wordpress_link'.$i;
			$team_github_link  = 'team_github_link'.$i;
			$team_instagram_link  = 'team_instagram_link'.$i;
			$team_codepen_link  = 'team_codepen_link'.$i;
			$team_polldaddy_link  = 'team_polldaddy_link'.$i;
			$team_path_link  = 'team_path_link'.$i;
			$team_digg_link  = 'team_digg_link'.$i;
			$team_reddit_link  = 'team_reddit_link'.$i;
			$team_stumbleupon_link  = 'team_stumbleupon_link'.$i;
			$team_dropbox_link  = 'team_dropbox_link'.$i;
			$team_pocket_link  = 'team_pocket_link'.$i;

			$instance[ $image ] = esc_url( $instance[ $image ] );
			$instance[ $ourteam_link ] = esc_url( $instance[ $ourteam_link ] );
			$instance[ $name ] = strip_tags( $instance[ $name ] );
			$instance[ $text ] = strip_tags( $instance[ $text ] );
			$instance[ $description ] = strip_tags( $instance[ $description ] );
			$instance[ $team_facebook_link ] = esc_url( $instance[ $team_facebook_link ] );
			$instance[ $team_twitter_link ] = esc_url( $instance[ $team_twitter_link ] );
			$instance[ $team_googleplus_link ] = esc_url( $instance[ $team_googleplus_link ] );
			$instance[ $team_pinintrest_link ] = esc_url( $instance[ $team_pinintrest_link ] );
			$instance[ $team_linkedin_link ] = esc_url( $instance[ $team_linkedin_link ] );
			$instance[ $team_youtube_link ] = esc_url( $instance[ $team_youtube_link ] );
			$instance[ $team_tumblr_link ] = esc_url( $instance[ $team_tumblr_link ] );
			$instance[ $team_vimeo_link ] = esc_url( $instance[ $team_vimeo_link ] );
			$instance[ $team_flickr_link ] = esc_url( $instance[ $team_flickr_link ] );
			$instance[ $team_feed_link ] = esc_url( $instance[ $team_feed_link ] );
			$instance[ $team_dribbble_link ] = esc_url( $instance[ $team_dribbble_link ] );
			$instance[ $team_wordpress_link ] = esc_url( $instance[ $team_wordpress_link ] );
			$instance[ $team_github_link ] = esc_url( $instance[ $team_github_link ] );
			$instance[ $team_instagram_link ] = esc_url( $instance[ $team_instagram_link ] );
			$instance[ $team_codepen_link ] = esc_url( $instance[ $team_codepen_link ] );
			$instance[ $team_polldaddy_link ] = esc_url( $instance[ $team_polldaddy_link ] );
			$instance[ $team_path_link ] = esc_url( $instance[ $team_path_link ] );
			$instance[ $team_digg_link ] = esc_url( $instance[ $team_digg_link ] );
			$instance[ $team_reddit_link ] = esc_url( $instance[ $team_reddit_link ] );
			$instance[ $team_stumbleupon_link ] = esc_url( $instance[ $team_stumbleupon_link ] );
			$instance[ $team_dropbox_link ] = esc_url( $instance[ $team_dropbox_link ] );
			$instance[ $team_pocket_link ] = esc_url( $instance[ $team_pocket_link ] );
		} ?>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
				<?php _e( 'Number of OurTeam:', 'arise' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e( 'Title:', 'arise' ); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('primary_text'); ?>">
				<?php _e( 'Primary Text:', 'arise' ); ?>
			</label>
			<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('primary_text'); ?>" name="<?php echo $this->get_field_name('primary_text'); ?>"><?php echo stripslashes( wp_filter_post_kses( addslashes ( $primary_text))); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('secondary_text'); ?>">
				<?php _e( 'Secondary Text:', 'arise' ); ?>
			</label>
			<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('secondary_text'); ?>" name="<?php echo $this->get_field_name('secondary_text'); ?>"><?php echo stripslashes( wp_filter_post_kses( addslashes ($secondary_text))); ?></textarea>
		</p>
		<?php for ( $i=1; $i<=$number; $i++ ) {
			$image = 'image'.$i;
			$ourteam_link = 'ourteam_link'.$i;
			$name  = 'name'.$i;
			$text  = 'text'.$i;
			$description  = 'description'.$i;
			$team_facebook_link  = 'team_facebook_link'.$i;
			$team_twitter_link  = 'team_twitter_link'.$i;
			$team_googleplus_link  = 'team_googleplus_link'.$i;
			$team_pinintrest_link  = 'team_pinintrest_link'.$i;
			$team_linkedin_link  = 'team_linkedin_link'.$i;
			$team_youtube_link  = 'team_youtube_link'.$i;
			$team_tumblr_link  = 'team_tumblr_link'.$i;
			$team_vimeo_link  = 'team_vimeo_link'.$i;
			$team_flickr_link  = 'team_flickr_link'.$i;
			$team_feed_link  = 'team_feed_link'.$i;
			$team_dribbble_link  = 'team_dribbble_link'.$i;
			$team_wordpress_link  = 'team_wordpress_link'.$i;
			$team_github_link  = 'team_github_link'.$i;
			$team_instagram_link  = 'team_instagram_link'.$i;
			$team_codepen_link  = 'team_codepen_link'.$i;
			$team_polldaddy_link  = 'team_polldaddy_link'.$i;
			$team_path_link  = 'team_path_link'.$i;
			$team_digg_link  = 'team_digg_link'.$i;
			$team_reddit_link  = 'team_reddit_link'.$i;
			$team_stumbleupon_link  = 'team_stumbleupon_link'.$i;
			$team_dropbox_link  = 'team_dropbox_link'.$i;
			$team_pocket_link  = 'team_pocket_link'.$i;

			$instance[ $image ] = esc_url( $instance[ $image ] );
			$instance[ $ourteam_link ] = esc_url( $instance[ $ourteam_link ] );
			$instance[ $name ] = strip_tags( $instance[ $name ] );
			$instance[ $text ] = strip_tags( $instance[ $text ] );
			$instance[ $description ] = strip_tags( $instance[ $description ] );
			$instance[ $team_facebook_link ] = esc_url( $instance[ $team_facebook_link ] );
			$instance[ $team_twitter_link ] = esc_url( $instance[ $team_twitter_link ] );
			$instance[ $team_googleplus_link ] = esc_url( $instance[ $team_googleplus_link ] );
			$instance[ $team_pinintrest_link ] = esc_url( $instance[ $team_pinintrest_link ] );
			$instance[ $team_linkedin_link ] = esc_url( $instance[ $team_linkedin_link ] );
			$instance[ $team_youtube_link ] = esc_url( $instance[ $team_youtube_link ] );
			$instance[ $team_tumblr_link ] = esc_url( $instance[ $team_tumblr_link ] );
			$instance[ $team_vimeo_link ] = esc_url( $instance[ $team_vimeo_link ] );
			$instance[ $team_flickr_link ] = esc_url( $instance[ $team_flickr_link ] );
			$instance[ $team_feed_link ] = esc_url( $instance[ $team_feed_link ] );
			$instance[ $team_dribbble_link ] = esc_url( $instance[ $team_dribbble_link ] );
			$instance[ $team_wordpress_link ] = esc_url( $instance[ $team_wordpress_link ] );
			$instance[ $team_github_link ] = esc_url( $instance[ $team_github_link ] );
			$instance[ $team_instagram_link ] = esc_url( $instance[ $team_instagram_link ] );
			$instance[ $team_codepen_link ] = esc_url( $instance[ $team_codepen_link ] );
			$instance[ $team_polldaddy_link ] = esc_url( $instance[ $team_polldaddy_link ] );
			$instance[ $team_path_link ] = esc_url( $instance[ $team_path_link ] );
			$instance[ $team_digg_link ] = esc_url( $instance[ $team_digg_link ] );
			$instance[ $team_reddit_link ] = esc_url( $instance[ $team_reddit_link ] );
			$instance[ $team_stumbleupon_link ] = esc_url( $instance[ $team_stumbleupon_link ] );
			$instance[ $team_dropbox_link ] = esc_url( $instance[ $team_dropbox_link ] );
			$instance[ $team_pocket_link ] = esc_url( $instance[ $team_pocket_link ] ); ?>
			<p>
			<label for="<?php echo $this->get_field_id('ourteam_image'); ?>">
				<?php _e( '(Recommended Image Size (300x300))', 'arise' ); ?>
			</label>
			<input type="text" class="upload1" id="<?php echo $this->get_field_id($image); ?>" name="<?php echo $this->get_field_name($image); ?>" value="<?php if(isset ( $instance[$image] ) ) 
				echo esc_url( $instance[$image] ); ?>"/>

			<input type="button" class="button  custom_media_button"name="<?php echo $this->get_field_name($image); ?>" id="custom_media_button_services" value="<?php echo esc_attr( 'Add Image'); ?>" onclick="mediaupload.uploader( '<?php echo $this->get_field_id($image); ?>' ); return false;"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('ourteam_link'); ?>">
					<?php _e( 'Our Team Link', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($ourteam_link); ?>" name="<?php echo $this->get_field_name($ourteam_link); ?>" type="text" value="<?php if(isset ( $instance[$ourteam_link] ) ) echo esc_url( $instance[$ourteam_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('name'); ?>">
					<?php _e( 'Name ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($name); ?>" name="<?php echo $this->get_field_name($name); ?>" type="text" value="<?php if(isset ( $instance[$name] ) ) echo esc_attr( $instance[ $name ] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('text'); ?>">
				<?php _e( 'Text','arise'); echo $i; ?>
				<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id($text); ?>" name="<?php echo $this->get_field_name($text); ?>"><?php if(isset ( $instance[$text] ) ) echo esc_attr( $instance[$text] ); ?></textarea></p>
			<p>
				<label for="<?php echo $this->get_field_id('description'); ?>">
				<?php _e( 'Description','arise'); echo $i; ?>
				<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id($description); ?>" name="<?php echo $this->get_field_name($description); ?>"><?php if(isset ( $instance[$description] ) ) echo esc_attr( $instance[$description] ); ?></textarea>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_facebook_link'); ?>">
					<?php _e( 'Facebook Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_facebook_link); ?>" name="<?php echo $this->get_field_name($team_facebook_link); ?>" type="text" value="<?php if(isset ( $instance[$team_facebook_link] ) ) echo esc_url( $instance[$team_facebook_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_twitter_link'); ?>">
					<?php _e( 'Twitter Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_twitter_link); ?>" name="<?php echo $this->get_field_name($team_twitter_link); ?>" type="text" value="<?php if(isset ( $instance[$team_twitter_link] ) ) echo esc_attr( $instance[$team_twitter_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_googleplus_link'); ?>">
					<?php _e( 'Google Plus Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_googleplus_link); ?>" name="<?php echo $this->get_field_name($team_googleplus_link); ?>" type="text" value="<?php if(isset ( $instance[$team_googleplus_link] ) ) echo esc_attr( $instance[$team_googleplus_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_pinintrest_link'); ?>">
					<?php _e( 'Pinterest Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_pinintrest_link); ?>" name="<?php echo $this->get_field_name($team_pinintrest_link); ?>" type="text" value="<?php if(isset ( $instance[$team_pinintrest_link] ) ) echo esc_attr( $instance[$team_pinintrest_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_linkedin_link'); ?>">
					<?php _e( 'Linkendin Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_linkedin_link); ?>" name="<?php echo $this->get_field_name($team_linkedin_link); ?>" type="text" value="<?php if(isset ( $instance[$team_linkedin_link] ) ) echo esc_attr( $instance[$team_linkedin_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_youtube_link'); ?>">
					<?php _e( 'Youtube Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_youtube_link); ?>" name="<?php echo $this->get_field_name($team_youtube_link); ?>" type="text" value="<?php if(isset ( $instance[$team_youtube_link] ) ) echo esc_attr( $instance[$team_youtube_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_tumblr_link'); ?>">
					<?php _e( 'Tumblr Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_tumblr_link); ?>" name="<?php echo $this->get_field_name($team_tumblr_link); ?>" type="text" value="<?php if(isset ( $instance[$team_tumblr_link] ) ) echo esc_attr( $instance[$team_tumblr_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_vimeo_link'); ?>">
					<?php _e( 'Vimeo Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_vimeo_link); ?>" name="<?php echo $this->get_field_name($team_vimeo_link); ?>" type="text" value="<?php if(isset ( $instance[$team_vimeo_link] ) ) echo esc_attr( $instance[$team_vimeo_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_flickr_link'); ?>">
					<?php _e( 'Flickr Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_flickr_link); ?>" name="<?php echo $this->get_field_name($team_flickr_link); ?>" type="text" value="<?php if(isset ( $instance[$team_flickr_link] ) ) echo esc_attr( $instance[$team_flickr_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_feed_link'); ?>">
					<?php _e( 'Feed Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_feed_link); ?>" name="<?php echo $this->get_field_name($team_feed_link); ?>" type="text" value="<?php if(isset ( $instance[$team_feed_link] ) ) echo esc_attr( $instance[$team_feed_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_dribbble_link'); ?>">
					<?php _e( 'Dribble Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_dribbble_link); ?>" name="<?php echo $this->get_field_name($team_dribbble_link); ?>" type="text" value="<?php if(isset ( $instance[$team_dribbble_link] ) ) echo esc_attr( $instance[$team_dribbble_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_wordpress_link'); ?>">
					<?php _e( 'WordPress Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_wordpress_link); ?>" name="<?php echo $this->get_field_name($team_wordpress_link); ?>" type="text" value="<?php if(isset ( $instance[$team_wordpress_link] ) ) echo esc_attr( $instance[$team_wordpress_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_github_link'); ?>">
					<?php _e( 'GitHub Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_github_link); ?>" name="<?php echo $this->get_field_name($team_github_link); ?>" type="text" value="<?php if(isset ( $instance[$team_github_link] ) ) echo esc_attr( $instance[$team_github_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_instagram_link'); ?>">
					<?php _e( 'Instagram Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_instagram_link); ?>" name="<?php echo $this->get_field_name($team_instagram_link); ?>" type="text" value="<?php if(isset ( $instance[$team_instagram_link] ) ) echo esc_attr( $instance[$team_instagram_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_codepen_link'); ?>">
					<?php _e( 'Codepen Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_codepen_link); ?>" name="<?php echo $this->get_field_name($team_codepen_link); ?>" type="text" value="<?php if(isset ( $instance[$team_codepen_link] ) ) echo esc_attr( $instance[$team_codepen_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_polldaddy_link'); ?>">
					<?php _e( 'Pollydaddy Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_polldaddy_link); ?>" name="<?php echo $this->get_field_name($team_polldaddy_link); ?>" type="text" value="<?php if(isset ( $instance[$team_polldaddy_link] ) ) echo esc_attr( $instance[$team_polldaddy_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_path_link'); ?>">
					<?php _e( 'Path Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_path_link); ?>" name="<?php echo $this->get_field_name($team_path_link); ?>" type="text" value="<?php if(isset ( $instance[$team_path_link] ) ) echo esc_attr( $instance[$team_path_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_digg_link'); ?>">
					<?php _e( 'Digg Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_digg_link); ?>" name="<?php echo $this->get_field_name($team_digg_link); ?>" type="text" value="<?php if(isset ( $instance[$team_digg_link] ) ) echo esc_attr( $instance[$team_digg_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_reddit_link'); ?>">
					<?php _e( 'Reddit Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_reddit_link); ?>" name="<?php echo $this->get_field_name($team_reddit_link); ?>" type="text" value="<?php if(isset ( $instance[$team_reddit_link] ) ) echo esc_attr( $instance[$team_reddit_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_stumbleupon_link'); ?>">
					<?php _e( 'Stumbleupon Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_stumbleupon_link); ?>" name="<?php echo $this->get_field_name($team_stumbleupon_link); ?>" type="text" value="<?php if(isset ( $instance[$team_stumbleupon_link] ) ) echo esc_attr( $instance[$team_stumbleupon_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_dropbox_link'); ?>">
					<?php _e( 'Dropbox Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_dropbox_link); ?>" name="<?php echo $this->get_field_name($team_dropbox_link); ?>" type="text" value="<?php if(isset ( $instance[$team_dropbox_link] ) ) echo esc_attr( $instance[$team_dropbox_link] ); ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('team_pocket_link'); ?>">
					<?php _e( 'Pocket Link ', 'arise' ); echo $i; ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id($team_pocket_link); ?>" name="<?php echo $this->get_field_name($team_pocket_link); ?>" type="text" value="<?php if(isset ( $instance[$team_pocket_link] ) ) echo esc_attr( $instance[$team_pocket_link] ); ?>" />
			</p>
			<hr><hr>
			<p>&nbsp; </p>
			<?php
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = absint( $new_instance['number'] );
		$instance['primary_text'] = stripslashes( wp_filter_post_kses( addslashes ( $new_instance['primary_text'] )));
		$instance['secondary_text'] = stripslashes( wp_filter_post_kses( addslashes ( $new_instance['secondary_text'] )));
		for( $i=1; $i<=$instance['number']; $i++ ) {
			$image = 'image'.$i;
			$ourteam_link = 'ourteam_link'.$i;
			$name  = 'name'.$i;
			$text  = 'text'.$i;
			$description  = 'description'.$i;
			$team_facebook_link  = 'team_facebook_link'.$i;
			$team_twitter_link  = 'team_twitter_link'.$i;
			$team_googleplus_link  = 'team_googleplus_link'.$i;
			$team_pinintrest_link  = 'team_pinintrest_link'.$i;
			$team_linkedin_link  = 'team_linkedin_link'.$i;
			$team_youtube_link  = 'team_youtube_link'.$i;
			$team_tumblr_link  = 'team_tumblr_link'.$i;
			$team_vimeo_link  = 'team_vimeo_link'.$i;
			$team_flickr_link  = 'team_flickr_link'.$i;
			$team_feed_link  = 'team_feed_link'.$i;
			$team_dribbble_link  = 'team_dribbble_link'.$i;
			$team_wordpress_link  = 'team_wordpress_link'.$i;
			$team_github_link  = 'team_github_link'.$i;
			$team_instagram_link  = 'team_instagram_link'.$i;
			$team_codepen_link  = 'team_codepen_link'.$i;
			$team_polldaddy_link  = 'team_polldaddy_link'.$i;
			$team_path_link  = 'team_path_link'.$i;
			$team_digg_link  = 'team_digg_link'.$i;
			$team_reddit_link  = 'team_reddit_link'.$i;
			$team_stumbleupon_link  = 'team_stumbleupon_link'.$i;
			$team_dropbox_link  = 'team_dropbox_link'.$i;
			$team_pocket_link  = 'team_pocket_link'.$i;

			$instance[ $image ] = esc_url( $new_instance[ $image ] );
			$instance[ $ourteam_link ] = esc_url( $new_instance[ $ourteam_link ] );
			$instance[ $name ] = strip_tags( $new_instance[ $name ] );
			$instance[ $text ] = strip_tags( $new_instance[ $text ] );
			$instance[ $description ] = strip_tags( $new_instance[ $description ] );
			$instance[ $team_facebook_link ] = esc_url( $new_instance[ $team_facebook_link ] );
			$instance[ $team_twitter_link ] = esc_url( $new_instance[ $team_twitter_link ] );
			$instance[ $team_googleplus_link ] = esc_url( $new_instance[ $team_googleplus_link ] );
			$instance[ $team_pinintrest_link ] = esc_url( $new_instance[ $team_pinintrest_link ] );
			$instance[ $team_linkedin_link ] = esc_url( $new_instance[ $team_linkedin_link ] );
			$instance[ $team_youtube_link ] = esc_url( $new_instance[ $team_youtube_link ] );
			$instance[ $team_tumblr_link ] = esc_url( $new_instance[ $team_tumblr_link ] );
			$instance[ $team_vimeo_link ] = esc_url( $new_instance[ $team_vimeo_link ] );
			$instance[ $team_flickr_link ] = esc_url( $new_instance[ $team_flickr_link ] );
			$instance[ $team_feed_link ] = esc_url( $new_instance[ $team_feed_link ] );
			$instance[ $team_dribbble_link ] = esc_url( $new_instance[ $team_dribbble_link ] );
			$instance[ $team_wordpress_link ] = esc_url( $new_instance[ $team_wordpress_link ] );
			$instance[ $team_github_link ] = esc_url( $new_instance[ $team_github_link ] );
			$instance[ $team_instagram_link ] = esc_url( $new_instance[ $team_instagram_link ] );
			$instance[ $team_codepen_link ] = esc_url( $new_instance[ $team_codepen_link ] );
			$instance[ $team_polldaddy_link ] = esc_url( $new_instance[ $team_polldaddy_link ] );
			$instance[ $team_path_link ] = esc_url( $new_instance[ $team_path_link ] );
			$instance[ $team_digg_link ] = esc_url( $new_instance[ $team_digg_link ] );
			$instance[ $team_reddit_link ] = esc_url( $new_instance[ $team_reddit_link ] );
			$instance[ $team_stumbleupon_link ] = esc_url( $new_instance[ $team_stumbleupon_link ] );
			$instance[ $team_dropbox_link ] = esc_url( $new_instance[ $team_dropbox_link ] );
			$instance[ $team_pocket_link ] = esc_url( $new_instance[ $team_pocket_link ] );
		}
		return $instance;
	}
	function widget( $args, $instance ) {
		extract($args);
		global $arise_theme_default;
		$options = $arise_theme_default;
		$number = empty( $instance['number'] ) ? 4 : $instance['number']; 
		$title = empty( $instance['title'] ) ? '' : $instance['title'];
		$primary_text = empty( $instance['primary_text'] ) ? '' : $instance['primary_text'];
		$secondary_text = empty( $instance['secondary_text'] ) ? '' : $instance['secondary_text'];
		$image_array = array();
		$ourteam_link_array = array();
		$name_array = array();
		$text_array = array();
		$description_array = array();
		$team_facebook_link_array = array();
		$team_twitter_link_array = array();
		$team_googleplus_link_array = array();
		$team_pinintrest_link_array = array();
		$team_linkedin_link_array = array();
		$team_youtube_link_array = array();
		$team_tumblr_link_array = array();
		$team_vimeo_link_array = array();
		$team_flickr_link_array = array();
		$team_feed_link_array = array();
		$team_dribbble_link_array = array();
		$team_wordpress_link_array = array();
		$team_github_link_array = array();
		$team_instagram_link_array = array();
		$team_codepen_link_array = array();
		$team_polldaddy_link_array = array();
		$team_path_link_array = array();
		$team_digg_link_array = array();
		$team_reddit_link_array = array();
		$team_stumbleupon_link_array = array();
		$team_dropbox_link_array = array();
		$team_pocket_link_array = array();
		for( $i=1; $i<=$number; $i++ ) {
			$image = 'image'.$i;
			$ourteam_link = 'ourteam_link'.$i;
			$name  = 'name'.$i;
			$text  = 'text'.$i;
			$description  = 'description'.$i;
			$team_facebook_link  = 'team_facebook_link'.$i;
			$team_twitter_link  = 'team_twitter_link'.$i;
			$team_googleplus_link  = 'team_googleplus_link'.$i;
			$team_pinintrest_link  = 'team_pinintrest_link'.$i;
			$team_linkedin_link  = 'team_linkedin_link'.$i;
			$team_youtube_link  = 'team_youtube_link'.$i;
			$team_tumblr_link  = 'team_tumblr_link'.$i;
			$team_vimeo_link  = 'team_vimeo_link'.$i;
			$team_flickr_link  = 'team_flickr_link'.$i;
			$team_feed_link  = 'team_feed_link'.$i;
			$team_dribbble_link  = 'team_dribbble_link'.$i;
			$team_wordpress_link  = 'team_wordpress_link'.$i;
			$team_github_link  = 'team_github_link'.$i;
			$team_instagram_link  = 'team_instagram_link'.$i;
			$team_codepen_link  = 'team_codepen_link'.$i;
			$team_polldaddy_link  = 'team_polldaddy_link'.$i;
			$team_path_link  = 'team_path_link'.$i;
			$team_digg_link  = 'team_digg_link'.$i;
			$team_reddit_link  = 'team_reddit_link'.$i;
			$team_stumbleupon_link  = 'team_stumbleupon_link'.$i;
			$team_dropbox_link  = 'team_dropbox_link'.$i;
			$team_pocket_link  = 'team_pocket_link'.$i;
			$image = isset( $instance[ $image ] ) ? $instance[ $image ] : '';
			$ourteam_link = isset( $instance[ $ourteam_link ] ) ? $instance[ $ourteam_link ] : '';
			$name = isset( $instance[ $name ] ) ? $instance[ $name ] : '';
			$text = isset( $instance[ $text ] ) ? $instance[ $text ] : '';
			$description = isset( $instance[ $description ] ) ? $instance[ $description ] : '';
			$team_facebook_link = isset( $instance[ $team_facebook_link ] ) ? $instance[ $team_facebook_link ] : ''; 	
			$team_twitter_link = isset( $instance[ $team_twitter_link ] ) ? $instance[ $team_twitter_link ] : ''; 	
			$team_googleplus_link = isset( $instance[ $team_googleplus_link ] ) ? $instance[ $team_googleplus_link ] : ''; 
			$team_pinintrest_link = isset( $instance[ $team_pinintrest_link ] ) ? $instance[ $team_pinintrest_link ] : '';
			$team_linkedin_link = isset( $instance[ $team_linkedin_link ] ) ? $instance[ $team_linkedin_link ] : '';
			$team_youtube_link = isset( $instance[ $team_youtube_link ] ) ? $instance[ $team_youtube_link ] : '';
			$team_tumblr_link = isset( $instance[ $team_tumblr_link ] ) ? $instance[ $team_tumblr_link ] : '';
			$team_vimeo_link = isset( $instance[ $team_vimeo_link ] ) ? $instance[ $team_vimeo_link ] : '';
			$team_flickr_link = isset( $instance[ $team_flickr_link ] ) ? $instance[ $team_flickr_link ] : '';
			$team_feed_link = isset( $instance[ $team_feed_link ] ) ? $instance[ $team_feed_link ] : '';
			$team_dribbble_link = isset( $instance[ $team_dribbble_link ] ) ? $instance[ $team_dribbble_link ] : '';
			$team_wordpress_link = isset( $instance[ $team_wordpress_link ] ) ? $instance[ $team_wordpress_link ] : '';
			$team_github_link = isset( $instance[ $team_github_link ] ) ? $instance[ $team_github_link ] : '';
			$team_instagram_link = isset( $instance[ $team_instagram_link ] ) ? $instance[ $team_instagram_link ] : '';
			$team_codepen_link = isset( $instance[ $team_codepen_link ] ) ? $instance[ $team_codepen_link ] : '';
			$team_polldaddy_link = isset( $instance[ $team_polldaddy_link ] ) ? $instance[ $team_polldaddy_link ] : '';
			$team_path_link = isset( $instance[ $team_path_link ] ) ? $instance[ $team_path_link ] : '';
			$team_digg_link = isset( $instance[ $team_digg_link ] ) ? $instance[ $team_digg_link ] : '';
			$team_reddit_link = isset( $instance[ $team_reddit_link ] ) ? $instance[ $team_reddit_link ] : '';
			$team_stumbleupon_link = isset( $instance[ $team_stumbleupon_link ] ) ? $instance[ $team_stumbleupon_link ] : '';
			$team_dropbox_link = isset( $instance[ $team_dropbox_link ] ) ? $instance[ $team_dropbox_link ] : '';
			$team_pocket_link = isset( $instance[ $team_pocket_link ] ) ? $instance[ $team_pocket_link ] : '';

			if( !empty( $image )  || !empty( $name ) || !empty( $ourteam_link ) || !empty( $text ) || !empty( $description ) || !empty( $team_facebook_link ) || !empty( $team_twitter_link )|| !empty( $team_googleplus_link ) || !empty( $team_pinintrest_link ) || !empty( $team_linkedin_link )|| !empty( $team_youtube_link )|| !empty( $team_tumblr_link )|| !empty( $team_vimeo_link )|| !empty( $team_flickr_link )|| !empty( $team_feed_link )|| !empty( $team_dribbble_link )|| !empty( $team_wordpress_link )|| !empty( $team_github_link )|| !empty( $team_instagram_link )|| !empty( $team_codepen_link )|| !empty( $team_polldaddy_link )|| !empty( $team_path_link )|| !empty( $team_digg_link )|| !empty( $team_reddit_link )|| !empty( $team_stumbleupon_link )|| !empty( $team_dropbox_link )|| !empty( $team_pocket_link ))  {
				if( !empty( $image ) )
					array_push( $image_array, $image );
				 else array_push($image_array, "");

				 if( !empty( $ourteam_link ) )
					array_push( $ourteam_link_array, $ourteam_link );
				 else array_push($ourteam_link_array, "");

				if( !empty( $name ) )
				array_push( $name_array, $name );
			 	else array_push($name_array, "");

				if( !empty( $text ) )
					array_push( $text_array, $text );
				 	else array_push($text_array, "");
			 	if( !empty( $description ) )
				array_push( $description_array, $description );
			 	else array_push($description_array, "");

				if( !empty( $team_facebook_link ) )
					array_push( $team_facebook_link_array, $team_facebook_link );
				 	else array_push($team_facebook_link_array, "");

				if( !empty( $team_twitter_link ) )
					array_push( $team_twitter_link_array, $team_twitter_link );
				 	else array_push($team_twitter_link_array, "");

				if( !empty( $team_googleplus_link ) )
					array_push( $team_googleplus_link_array, $team_googleplus_link );
				 	else array_push($team_googleplus_link_array, "");

				if( !empty( $team_pinintrest_link ) )
					array_push( $team_pinintrest_link_array, $team_pinintrest_link ); // Push the page id in the array
				 	else array_push($team_pinintrest_link_array, "");
				if( !empty( $team_linkedin_link ) )
					array_push( $team_linkedin_link_array, $team_linkedin_link );
				 	else array_push($team_linkedin_link_array, "");
				if( !empty( $team_youtube_link ) )
					array_push( $team_youtube_link_array, $team_youtube_link );
				 	else array_push($team_youtube_link_array, "");
				if( !empty( $team_tumblr_link ) )
					array_push( $team_tumblr_link_array, $team_tumblr_link );
				 	else array_push($team_tumblr_link_array, "");
				if( !empty( $team_vimeo_link ) )
					array_push( $team_vimeo_link_array, $team_vimeo_link );
				 	else array_push($team_vimeo_link_array, "");
				if( !empty( $team_flickr_link ) )
					array_push( $team_flickr_link_array, $team_flickr_link );
				 	else array_push($team_flickr_link_array, "");
				if( !empty( $team_feed_link ) )
					array_push( $team_feed_link_array, $team_feed_link );
				 	else array_push($team_feed_link_array, "");
				if( !empty( $team_dribbble_link ) )
					array_push( $team_dribbble_link_array, $team_dribbble_link );
				 	else array_push($team_dribbble_link_array, "");
				if( !empty( $team_wordpress_link ) )
					array_push( $team_wordpress_link_array, $team_wordpress_link );
				 	else array_push($team_wordpress_link_array, "");
				if( !empty( $team_github_link ) )
					array_push( $team_github_link_array, $team_github_link );
				 	else array_push($team_github_link_array, "");
				if( !empty( $team_instagram_link ) )
					array_push( $team_instagram_link_array, $team_instagram_link );
				 	else array_push($team_instagram_link_array, "");
				if( !empty( $team_codepen_link ) )
					array_push( $team_codepen_link_array, $team_codepen_link );
				 	else array_push($team_codepen_link_array, "");
				if( !empty( $team_polldaddy_link ) )
					array_push( $team_polldaddy_link_array, $team_polldaddy_link );
				 	else array_push($team_polldaddy_link_array, "");
				if( !empty( $team_path_link ) )
					array_push( $team_path_link_array, $team_path_link );
				 	else array_push($team_path_link_array, "");
				if( !empty( $team_digg_link ) )
					array_push( $team_digg_link_array, $team_digg_link );
				 	else array_push($team_digg_link_array, "");
				if( !empty( $team_reddit_link ) )
					array_push( $team_reddit_link_array, $team_reddit_link );
				 	else array_push($team_reddit_link_array, "");
				if( !empty( $team_stumbleupon_link ) )
					array_push( $team_stumbleupon_link_array, $team_stumbleupon_link );
				 	else array_push($team_stumbleupon_link_array, "");
				if( !empty( $team_dropbox_link ) )
					array_push( $team_dropbox_link_array, $team_dropbox_link );
				 	else array_push($team_dropbox_link_array, "");
				if( !empty( $team_pocket_link ) )
					array_push( $team_pocket_link_array, $team_pocket_link );
				 	else array_push($team_pocket_link_array, "");
			}
		}

		echo '<!-- Team Widget ============================================= -->' .$before_widget; ?>
		<div class="container clearfix">
		<?php if ( !empty( $title ) ) { echo $before_title . esc_html( $title ) . $after_title; } ?>
		<?php if(!empty($primary_text)): ?>
			<p class="widget-highlighted-sub-title"><?php echo stripslashes( wp_filter_post_kses( addslashes ($primary_text))); ?></p>
			<?php endif;
			if(!empty($secondary_text)): ?>
		<p class="widget-sub-title"><?php echo stripslashes( wp_filter_post_kses( addslashes ($secondary_text))); ?></p>
			<?php endif;
			echo '<div class="column clearfix">';
			for( $i=0; $i<$number; $i++ ) { ?>
				<div class="four-column">
					<div class="our_team">
					<?php if(!empty($image_array[$i])):?>
					 <a href="<?php echo esc_url($ourteam_link_array[$i]); ?>" target ="_blank"><img class="team_member" src="<?php echo esc_url($image_array[$i]); ?>" title="<?php if(!empty($name_array[$i])){ echo esc_attr($name_array[$i]); } ?>" alt="<?php if(!empty($image_array[$i])){ echo esc_attr($name_array[$i]); }?>" /> </a>
					 <?php endif; 
					 if(!empty($name_array[$i])){ ?>
					<a href="<?php echo esc_url($ourteam_link_array[$i]); ?>"  target ="_blank"><h5><?php echo esc_attr($name_array[$i]);?></h5></a>
					<?php }
					if(!empty($text_array[$i])){  ?>
				<p  class="member-post"><?php echo esc_attr($text_array[$i]); ?></p>
					<?php }
					if(!empty($description_array[$i])){  ?>
				<p  class="about-member"><?php echo esc_attr($description_array[$i]); ?></p>
					<?php } 
					if( !empty( $team_facebook_link_array[$i] )  || !empty( $team_twitter_link_array[$i] )  || !empty( $team_googleplus_link_array[$i] )  ||!empty( $team_pinintrest_link_array[$i] )  ||!empty( $team_linkedin_link_array[$i] )  ||!empty( $team_youtube_link_array[$i] )  ||!empty( $team_tumblr_link_array[$i] )  ||!empty( $team_vimeo_link_array[$i] )  ||!empty( $team_flickr_link_array[$i] )  ||!empty( $team_feed_link_array[$i] )  ||!empty( $team_dribbble_link_array[$i] )  ||!empty( $team_wordpress_link_array[$i] )  ||!empty( $team_github_link_array[$i] )  ||!empty( $team_instagram_link_array[$i] )  ||!empty( $team_codepen_link_array[$i] )  ||!empty( $team_polldaddy_link_array[$i] )  ||!empty( $team_path_link_array[$i] )  ||!empty( $team_digg_link_array[$i] )  ||!empty( $team_reddit_link_array[$i] )  ||!empty( $team_stumbleupon_link_array[$i] )  ||!empty( $team_dropbox_link_array[$i] )  ||!empty( $team_pocket_link_array[$i] ) ) :?>
	 					<div class="social-links clearfix">
							<ul><?php if( !empty( $team_facebook_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_facebook_link_array[$i]); ?>" title="<?php _e('Facebook', 'arise'); ?>"></a></li>
							<?php endif; 
							if( !empty( $team_twitter_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_twitter_link_array[$i]); ?>" title="<?php _e('Twitter', 'arise'); ?>"></a></li>
							<?php endif;
							if( !empty( $team_googleplus_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_googleplus_link_array[$i]); ?>" title="<?php _e('Google Plus', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_pinintrest_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_pinintrest_link_array[$i]); ?>" title="<?php _e('Pinterest', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_linkedin_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_linkedin_link_array[$i]); ?>" title="<?php _e('Linkedin', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_youtube_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_youtube_link_array[$i]); ?>" title="<?php _e('Youtube', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_tumblr_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_tumblr_link_array[$i]); ?>" title="<?php _e('Tublr', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_vimeo_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_vimeo_link_array[$i]); ?>" title="<?php _e('Vimeo', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_flickr_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_flickr_link_array[$i]); ?>" title="<?php _e('Flickr', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_feed_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_feed_link_array[$i]); ?>" title="<?php _e('Feed', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_dribbble_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_dribbble_link_array[$i]); ?>" title="<?php _e('Dribble', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_wordpress_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_wordpress_link_array[$i]); ?>" title="<?php _e('WordPress', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_github_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_github_link_array[$i]); ?>" title="<?php _e('GitHub', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_instagram_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_instagram_link_array[$i]); ?>" title="<?php _e('instagram', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_codepen_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_codepen_link_array[$i]); ?>" title="<?php _e('Codepen', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_polldaddy_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_polldaddy_link_array[$i]); ?>" title="<?php _e('Polldaddy', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_path_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_path_link_array[$i]); ?>" title="<?php _e('Path', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_digg_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_digg_link_array[$i]); ?>" title="<?php _e('Digg', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_reddit_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_reddit_link_array[$i]); ?>" title="<?php _e('Reddit', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_stumbleupon_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_stumbleupon_link_array[$i]); ?>" title="<?php _e('Stumbleupon', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_dropbox_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_dropbox_link_array[$i]); ?>" title="<?php _e('Dropbox', 'arise'); ?>"></a></li>
								<?php endif;
								if( !empty( $team_pocket_link_array[$i] )): ?>
								<li><a href="<?php echo esc_url($team_pocket_link_array[$i]); ?>" title="<?php _e('pocket', 'arise'); ?>"></a></li>
								<?php endif; ?>
							</ul>
						</div> <!-- end .social-links -->
					<?php endif; ?>
					</div> <!-- end .our_team -->
				</div> <!-- end .four-column -->
			<?php }
			echo '</div> <!-- end .column -->'?>
		</div>
		<?php 
		echo $after_widget. '<!-- end .widget_team -->';
	}
}
?>