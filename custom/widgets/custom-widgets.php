<?php
/**
 * Adds AboutMeWidget widget.
 */
 
//class AboutMeWidget  begin
class AboutMeWidget extends WP_Widget
{

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'AboutMe_widget', // Base ID
			__( 'CT About Me Widget', 'ascreen' ), // Name
			array( 'description' => __( 'Displays About Me Information', 'ascreen' ), ) // Args
		);
	}

	/* Displays the Widget in the front-end */
    function widget( $args, $instance ){
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? 'About Me' : esc_html( $instance['title'] ) );
		$imagePath = empty( $instance['imagePath'] ) ? '' : esc_url( $instance['imagePath'] );
		$aboutText = empty( $instance['aboutText'] ) ? '' : $instance['aboutText'];

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title; ?>
		<div class="clearfix ct_widgets_aboutme">
			<img src="<?php 
			//echo et_new_thumb_resize( et_multisite_thumbnail($imagePath), 74, 74, '', true ); 
			echo $imagePath;
			?>" id="about-image" alt="" width="100%"/>
			<?php echo wp_kses_post( $aboutText )?>
		</div> <!-- end about me section -->
	<?php
		echo $after_widget;
	}
	
	/*Saves the settings. */
    function update( $new_instance, $old_instance ){
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['imagePath'] = esc_url( $new_instance['imagePath'] );
		$instance['aboutText'] = current_user_can('unfiltered_html') ? $new_instance['aboutText'] : stripslashes( wp_filter_post_kses( addslashes($new_instance['aboutText']) ) );

		return $instance;
	}

	/*Creates the form for the widget in the back-end. */
    function form( $instance ){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title'=>'About Me', 'imagePath'=>'', 'aboutText'=>'' ) );

		$title = esc_attr( $instance['title'] );
		$imagePath = esc_url( $instance['imagePath'] );
		$aboutText = esc_textarea( $instance['aboutText'] );

		# Title
		echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
		# Image
		echo '<p><label for="' . $this->get_field_id('imagePath') . '">' . 'Image:' . '</label><textarea cols="20" rows="2" class="widefat" id="' . $this->get_field_id('imagePath') . '" name="' . $this->get_field_name('imagePath') . '" >'. $imagePath .'</textarea></p>';
		# About Text
		echo '<p><label for="' . $this->get_field_id('aboutText') . '">' . 'Text:' . '</label><textarea cols="20" rows="5" class="widefat" id="' . $this->get_field_id('aboutText') . '" name="' . $this->get_field_name('aboutText') . '" >'. $aboutText .'</textarea></p>';
	}

}// end AboutMeWidget class

function AboutMeWidgetInit() {
	register_widget('AboutMeWidget');
}
add_action('widgets_init', 'AboutMeWidgetInit');


/**
 * Adds adsense widget.
 */

class AdsenseWidget extends WP_Widget
{
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Adsense_widget', // Base ID
			__( 'CT Adsense Widget', 'ascreen' ), // Name
			array( 'description' => __( 'Displays Adsense Ads(User Code)', 'ascreen' ), ) // Args
		);
	}	
	/* Displays the Widget in the front-end */
	function widget( $args, $instance ){
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? 'Adsense' : esc_html( $instance['title'] ) );
		$adsenseCode = empty( $instance['adsenseCode'] ) ? '' : $instance['adsenseCode'];

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;
		?>
		<div style="overflow: hidden;">
			<?php echo $adsenseCode; ?>
			<div class="clearfix"></div>
		</div> <!-- end adsense -->
	<?php
		echo $after_widget;
	}

	/*Saves the settings. */
	function update( $new_instance, $old_instance ){
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['adsenseCode'] = current_user_can('unfiltered_html') ? $new_instance['adsenseCode'] : stripslashes( wp_filter_post_kses( addslashes($new_instance['adsenseCode']) ) );

		return $instance;
	}

	/*Creates the form for the widget in the back-end. */
	function form( $instance ){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title'=>'Adsense', 'adsenseCode'=>'' ) );

		$title = esc_attr( $instance['title'] );
		$adsenseCode = esc_textarea( $instance['adsenseCode'] );

		# Title
		echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
		# Adsense Code
		echo '<p><label for="' . $this->get_field_id('adsenseCode') . '">' . 'Adsense Code:' . '</label><textarea cols="20" rows="12" class="widefat" id="' . $this->get_field_id('adsenseCode') . '" name="' . $this->get_field_name('adsenseCode') . '" >'. $adsenseCode .'</textarea></p>';
	}

}// end AdsenseWidget class

function AdsenseWidgetInit() {
	register_widget('AdsenseWidget');
}
add_action('widgets_init', 'AdsenseWidgetInit');



/**
 * Adds adsense widget.
 */
class AdvWidget extends WP_Widget
{
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Advertisement_widget', // Base ID
			__( 'CT Advertisement Widget', 'ascreen' ), // Name
			array( 'description' => __( 'Displays Advertisements(User Images)', 'ascreen' ), ) // Args
		);
	}	
  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : esc_html( $instance['title'] ) );
		$use_relpath = isset($instance['use_relpath']) ? $instance['use_relpath'] : false;
		$new_window = isset($instance['new_window']) ? $instance['new_window'] : false;
		$bannerPath[1] = empty($instance['bannerOnePath']) ? '' : esc_attr($instance['bannerOnePath']);
		$bannerUrl[1] = empty($instance['bannerOneUrl']) ? '' : esc_url($instance['bannerOneUrl']);
		$bannerTitle[1] = empty($instance['bannerOneTitle']) ? '' : esc_attr($instance['bannerOneTitle']);
		$bannerAlt[1] = empty($instance['bannerOneAlt']) ? '' : esc_attr($instance['bannerOneAlt']);

		$bannerPath[2] = empty($instance['bannerTwoPath']) ? '' : esc_attr($instance['bannerTwoPath']);
		$bannerUrl[2] = empty($instance['bannerTwoUrl']) ? '' : esc_url($instance['bannerTwoUrl']);
		$bannerTitle[2] = empty($instance['bannerTwoTitle']) ? '' : esc_attr($instance['bannerTwoTitle']);
		$bannerAlt[2] = empty($instance['bannerTwoAlt']) ? '' : esc_attr($instance['bannerTwoAlt']);

		$bannerPath[3] = empty($instance['bannerThreePath']) ? '' : esc_attr($instance['bannerThreePath']);
		$bannerUrl[3] = empty($instance['bannerThreeUrl']) ? '' : esc_url($instance['bannerThreeUrl']);
		$bannerTitle[3] = empty($instance['bannerThreeTitle']) ? '' : esc_attr($instance['bannerThreeTitle']);
		$bannerAlt[3] = empty($instance['bannerThreeAlt']) ? '' : esc_attr($instance['bannerThreeAlt']);

		$bannerPath[4] = empty($instance['bannerFourPath']) ? '' : esc_attr($instance['bannerFourPath']);
		$bannerUrl[4] = empty($instance['bannerFourUrl']) ? '' : esc_url($instance['bannerFourUrl']);
		$bannerTitle[4] = empty($instance['bannerFourTitle']) ? '' : esc_attr($instance['bannerFourTitle']);
		$bannerAlt[4] = empty($instance['bannerFourAlt']) ? '' : esc_attr($instance['bannerFourAlt']);

		$bannerPath[5] = empty($instance['bannerFivePath']) ? '' : esc_attr($instance['bannerFivePath']);
		$bannerUrl[5] = empty($instance['bannerFiveUrl']) ? '' : esc_url($instance['bannerFiveUrl']);
		$bannerTitle[5] = empty($instance['bannerFiveTitle']) ? '' : esc_attr($instance['bannerFiveTitle']);
		$bannerAlt[5] = empty($instance['bannerFiveAlt']) ? '' : esc_attr($instance['bannerFiveAlt']);

		$bannerPath[6] = empty($instance['bannerSixPath']) ? '' : esc_attr($instance['bannerSixPath']);
		$bannerUrl[6] = empty($instance['bannerSixUrl']) ? '' : esc_url($instance['bannerSixUrl']);
		$bannerTitle[6] = empty($instance['bannerSixTitle']) ? '' : esc_attr($instance['bannerSixTitle']);
		$bannerAlt[6] = empty($instance['bannerSixAlt']) ? '' : esc_attr($instance['bannerSixAlt']);


		echo $before_widget;

		if ( $title )
		echo $before_title . $title . $after_title;
?>
<div class="ct_adwrap">
<?php $i = 1;
while ($i <= 6):
if ($bannerPath[$i] <> '') { ?>
<?php if ($bannerTitle[$i] == '') $bannerTitle[$i] = "advertisement";
	  if ($bannerAlt[$i] == '') $bannerAlt[$i] = "advertisement"; ?>
	<a href="<?php echo $bannerUrl[$i] ?>" <?php if ($new_window == 1) echo('target="_blank"') ?>>
		<img src="<?php if ($use_relpath == 1) echo esc_url(home_url()); else echo $bannerPath[$i]; ?><?php if ($use_relpath == 1 ) echo ("/" . $bannerPath[$i]); ?>" alt="<?php echo $bannerAlt[$i]; ?>" title="<?php echo $bannerTitle[$i]; ?>"  width="100%"/>
		</a>
<?php }; $i++;
endwhile; ?>
</div> <!-- end adwrap -->
<?php
		echo $after_widget;
	}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['use_relpath'] = 0;
		$instance['new_window'] = 0;
		if ( isset($new_instance['use_relpath']) ) $instance['use_relpath'] = 1;
		if ( isset($new_instance['new_window']) ) $instance['new_window'] = 1;
		$instance['bannerOnePath'] = esc_attr($new_instance['bannerOnePath']);
		$instance['bannerOneUrl'] = esc_url($new_instance['bannerOneUrl']);
		$instance['bannerOneTitle'] = esc_attr($new_instance['bannerOneTitle']);
		$instance['bannerOneAlt'] = esc_attr($new_instance['bannerOneAlt']);

		$instance['bannerTwoPath'] = esc_attr($new_instance['bannerTwoPath']);
		$instance['bannerTwoUrl'] = esc_url($new_instance['bannerTwoUrl']);
		$instance['bannerTwoTitle'] = esc_attr($new_instance['bannerTwoTitle']);
		$instance['bannerTwoAlt'] = esc_attr($new_instance['bannerTwoAlt']);

		$instance['bannerThreePath'] = esc_attr($new_instance['bannerThreePath']);
		$instance['bannerThreeUrl'] = esc_url($new_instance['bannerThreeUrl']);
		$instance['bannerThreeTitle'] = esc_attr($new_instance['bannerThreeTitle']);
		$instance['bannerThreeAlt'] = esc_attr($new_instance['bannerThreeAlt']);

		$instance['bannerFourPath'] = esc_attr($new_instance['bannerFourPath']);
		$instance['bannerFourUrl'] = esc_url($new_instance['bannerFourUrl']);
		$instance['bannerFourTitle'] = esc_attr($new_instance['bannerFourTitle']);
		$instance['bannerFourAlt'] = esc_attr($new_instance['bannerFourAlt']);

		$instance['bannerFivePath'] = esc_attr($new_instance['bannerFivePath']);
		$instance['bannerFiveUrl'] = esc_url($new_instance['bannerFiveUrl']);
		$instance['bannerFiveTitle'] = esc_attr($new_instance['bannerFiveTitle']);
		$instance['bannerFiveAlt'] = esc_attr($new_instance['bannerFiveAlt']);

		$instance['bannerSixPath'] = esc_attr($new_instance['bannerSixPath']);
		$instance['bannerSixUrl'] = esc_url($new_instance['bannerSixUrl']);
		$instance['bannerSixTitle'] = esc_attr($new_instance['bannerSixTitle']);
		$instance['bannerSixAlt'] = esc_attr($new_instance['bannerSixAlt']);


		return $instance;
	}

  /*Creates the form for the widget in the back-end. */
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'Advertisement', 'use_relpath' => false, 'new_window' => true, 'bannerOnePath'=>'', 'bannerOneUrl'=>'', 'bannerOneTitle'=>'', 'bannerOneAlt'=>'', 'bannerTwoPath'=>'', 'bannerTwoUrl'=>'', 'bannerTwoTitle'=>'', 'bannerTwoAlt'=>'','bannerThreePath'=>'', 'bannerThreeUrl'=>'','bannerThreeTitle'=>'', 'bannerThreeAlt'=>'','bannerFourPath'=>'', 'bannerFourUrl'=>'','bannerFourTitle'=>'', 'bannerFourAlt'=>'','bannerFivePath'=>'', 'bannerFiveUrl'=>'','bannerFiveTitle'=>'', 'bannerFiveAlt'=>'','bannerSixPath'=>'', 'bannerSixUrl'=>'','bannerSixTitle'=>'','bannerSixAlt'=>'') );

		$title = esc_html($instance['title']);
		$bannerPath[1] = esc_attr($instance['bannerOnePath']);
		$bannerUrl[1] = esc_url($instance['bannerOneUrl']);
		$bannerTitle[1] = esc_attr($instance['bannerOneTitle']);
		$bannerAlt[1] = esc_attr($instance['bannerOneAlt']);

		$bannerPath[2] = esc_attr($instance['bannerTwoPath']);
		$bannerUrl[2] = esc_url($instance['bannerTwoUrl']);
		$bannerTitle[2] = esc_attr($instance['bannerTwoTitle']);
		$bannerAlt[2] = esc_attr($instance['bannerTwoAlt']);

		$bannerPath[3] = esc_attr($instance['bannerThreePath']);
		$bannerUrl[3] = esc_url($instance['bannerThreeUrl']);
		$bannerTitle[3] = esc_attr($instance['bannerThreeTitle']);
		$bannerAlt[3] = esc_attr($instance['bannerThreeAlt']);

		$bannerPath[4] = esc_attr($instance['bannerFourPath']);
		$bannerUrl[4] = esc_url($instance['bannerFourUrl']);
		$bannerTitle[4] = esc_attr($instance['bannerFourTitle']);
		$bannerAlt[4] = esc_attr($instance['bannerFourAlt']);

		$bannerPath[5] = esc_attr($instance['bannerFivePath']);
		$bannerUrl[5] = esc_url($instance['bannerFiveUrl']);
		$bannerTitle[5] = esc_attr($instance['bannerFiveTitle']);
		$bannerAlt[5] = esc_attr($instance['bannerFiveAlt']);

		$bannerPath[6] = esc_attr($instance['bannerSixPath']);
		$bannerUrl[6] = esc_url($instance['bannerSixUrl']);
		$bannerTitle[6] = esc_attr($instance['bannerSixTitle']);
		$bannerAlt[6] = esc_attr($instance['bannerSixAlt']);

		# Title
		echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>'; ?>

		<input class="checkbox" type="checkbox" <?php checked($instance['use_relpath'], true) ?> id="<?php echo $this->get_field_id('use_relpath'); ?>" name="<?php echo $this->get_field_name('use_relpath'); ?>" />
		<label for="<?php echo $this->get_field_id('use_relpath'); ?>">Use Relative Image Paths</label><br />
		<input class="checkbox" type="checkbox" <?php checked($instance['new_window'], true) ?> id="<?php echo $this->get_field_id('new_window'); ?>" name="<?php echo $this->get_field_name('new_window'); ?>" />
		<label for="<?php echo $this->get_field_id('new_window'); ?>">Open in a new window</label><br /><br />

		<?php	# Banner #1 Image
		echo '<p><label for="' . $this->get_field_id('bannerOnePath') . '">' . 'Banner #1 Image:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerOnePath') . '" name="' . $this->get_field_name('bannerOnePath') . '" type="text" value="' . $bannerPath[1] . '" /></p>';
		# Banner #1 Url
		echo '<p><label for="' . $this->get_field_id('bannerOneUrl') . '">' . 'Banner #1 Url:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerOneUrl') . '" name="' . $this->get_field_name('bannerOneUrl') . '" type="text" value="' . $bannerUrl[1] . '" /></p>';
		# Banner #1 Title
		echo '<p><label for="' . $this->get_field_id('bannerOneTitle') . '">' . 'Banner #1 Title:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerOneTitle') . '" name="' . $this->get_field_name('bannerOneTitle') . '" type="text" value="' . $bannerTitle[1] . '" /></p>';
		# Banner #1 Alt
		echo '<p><label for="' . $this->get_field_id('bannerOneAlt') . '">' . 'Banner #1 Alt:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerOneAlt') . '" name="' . $this->get_field_name('bannerOneAlt') . '" type="text" value="' . $bannerAlt[1] . '" /></p>';
		# Banner #2 Image
		echo '<p><label for="' . $this->get_field_id('bannerTwoPath') . '">' . 'Banner #2 Image:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerTwoPath') . '" name="' . $this->get_field_name('bannerTwoPath') . '" type="text" value="' . $bannerPath[2] . '" /></p>';
		# Banner #2 Url
		echo '<p><label for="' . $this->get_field_id('bannerTwoUrl') . '">' . 'Banner #2 Url:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerTwoUrl') . '" name="' . $this->get_field_name('bannerTwoUrl') . '" type="text" value="' . $bannerUrl[2] . '" /></p>';
		# Banner #2 Title
		echo '<p><label for="' . $this->get_field_id('bannerTwoTitle') . '">' . 'Banner #2 Title:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerTwoTitle') . '" name="' . $this->get_field_name('bannerTwoTitle') . '" type="text" value="' . $bannerTitle[2] . '" /></p>';
		# Banner #2 Alt
		echo '<p><label for="' . $this->get_field_id('bannerTwoAlt') . '">' . 'Banner #2 Alt:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerTwoAlt') . '" name="' . $this->get_field_name('bannerTwoAlt') . '" type="text" value="' . $bannerAlt[2] . '" /></p>';
		# Banner #3 Image
		echo '<p><label for="' . $this->get_field_id('bannerThreePath') . '">' . 'Banner #3 Image:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerThreePath') . '" name="' . $this->get_field_name('bannerThreePath') . '" type="text" value="' . $bannerPath[3] . '" /></p>';
		# Banner #3 Url
		echo '<p><label for="' . $this->get_field_id('bannerThreeUrl') . '">' . 'Banner #3 Url:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerThreeUrl') . '" name="' . $this->get_field_name('bannerThreeUrl') . '" type="text" value="' . $bannerUrl[3] . '" /></p>';
		# Banner #3 Title
		echo '<p><label for="' . $this->get_field_id('bannerThreeTitle') . '">' . 'Banner #3 Title:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerThreeTitle') . '" name="' . $this->get_field_name('bannerThreeTitle') . '" type="text" value="' . $bannerTitle[3] . '" /></p>';
		# Banner #3 Alt
		echo '<p><label for="' . $this->get_field_id('bannerThreeAlt') . '">' . 'Banner #3 Alt:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerThreeAlt') . '" name="' . $this->get_field_name('bannerThreeAlt') . '" type="text" value="' . $bannerAlt[3] . '" /></p>';
		# Banner #4 Image
		echo '<p><label for="' . $this->get_field_id('bannerFourPath') . '">' . 'Banner #4 Image:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFourPath') . '" name="' . $this->get_field_name('bannerFourPath') . '" type="text" value="' . $bannerPath[4] . '" /></p>';
		# Banner #4 Url
		echo '<p><label for="' . $this->get_field_id('bannerFourUrl') . '">' . 'Banner #4 Url:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFourUrl') . '" name="' . $this->get_field_name('bannerFourUrl') . '" type="text" value="' . $bannerUrl[4] . '" /></p>';
		# Banner #4 Title
		echo '<p><label for="' . $this->get_field_id('bannerFourTitle') . '">' . 'Banner #4 Title:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFourTitle') . '" name="' . $this->get_field_name('bannerFourTitle') . '" type="text" value="' . $bannerTitle[4] . '" /></p>';
		# Banner #4 Alt
		echo '<p><label for="' . $this->get_field_id('bannerFourAlt') . '">' . 'Banner #4 Alt:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFourAlt') . '" name="' . $this->get_field_name('bannerFourAlt') . '" type="text" value="' . $bannerAlt[4] . '" /></p>';
		# Banner #5 Image
		echo '<p><label for="' . $this->get_field_id('bannerFivePath') . '">' . 'Banner #5 Image:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFivePath') . '" name="' . $this->get_field_name('bannerFivePath') . '" type="text" value="' . $bannerPath[5] . '" /></p>';
		# Banner #5 Url
		echo '<p><label for="' . $this->get_field_id('bannerFiveUrl') . '">' . 'Banner #5 Url:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFiveUrl') . '" name="' . $this->get_field_name('bannerFiveUrl') . '" type="text" value="' . $bannerUrl[5] . '" /></p>';
		# Banner #5 Title
		echo '<p><label for="' . $this->get_field_id('bannerFiveTitle') . '">' . 'Banner #5 Title:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFiveTitle') . '" name="' . $this->get_field_name('bannerFiveTitle') . '" type="text" value="' . $bannerTitle[5] . '" /></p>';
		# Banner #5 Alt
		echo '<p><label for="' . $this->get_field_id('bannerFiveAlt') . '">' . 'Banner #5 Alt:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerFiveAlt') . '" name="' . $this->get_field_name('bannerFiveAlt') . '" type="text" value="' . $bannerAlt[5] . '" /></p>';
		# Banner #6 Image
		echo '<p><label for="' . $this->get_field_id('bannerSixPath') . '">' . 'Banner #6 Image:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerSixPath') . '" name="' . $this->get_field_name('bannerSixPath') . '" type="text" value="' . $bannerPath[6] . '" /></p>';
		# Banner #6 Url
		echo '<p><label for="' . $this->get_field_id('bannerSixUrl') . '">' . 'Banner #6 Url:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerSixUrl') . '" name="' . $this->get_field_name('bannerSixUrl') . '" type="text" value="' . $bannerUrl[6] . '" /></p>';
		# Banner #6 Title
		echo '<p><label for="' . $this->get_field_id('bannerSixTitle') . '">' . 'Banner #6 Title:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerSixTitle') . '" name="' . $this->get_field_name('bannerSixTitle') . '" type="text" value="' . $bannerTitle[6] . '" /></p>';
		# Banner #6 Alt
		echo '<p><label for="' . $this->get_field_id('bannerSixAlt') . '">' . 'Banner #6 Alt:' . '</label><input class="widefat" id="' . $this->get_field_id('bannerSixAlt') . '" name="' . $this->get_field_name('bannerSixAlt') . '" type="text" value="' . $bannerAlt[6] . '" /></p>';


		echo '<p><small>If you don\'t want to display some banners - leave approptiate fields blank.</small></p>';
	}

}// end AdvWidget class

function AdvWidgetInit() {
	register_widget('AdvWidget');
}

add_action('widgets_init', 'AdvWidgetInit');


/**
 * Adds AuthorWidget widget.
 */
//class AboutMeWidget  begin
class AuthorWidget extends WP_Widget
{	
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Author_widget', // Base ID
			__( 'CT Author Widget', 'ascreen' ), // Name
			array( 'description' => __( 'Displays Author Information(To use only on "After Content" )', 'ascreen' ), ) // Args
		);
	}	


	/* Displays the Widget in the front-end */
    function widget( $args, $instance ){
		extract($args);
		/*$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? 'Author' : esc_html( $instance['title'] ) );
		$imagePath = empty( $instance['imagePath'] ) ? '' : esc_url( $instance['imagePath'] );
		$aboutText = empty( $instance['aboutText'] ) ? '' : $instance['aboutText'];*/

		
		$name = empty( $instance['name'] ) ? '' : $instance['name'];
		$imagePath = empty( $instance['imagePath'] ) ? '' : esc_url( $instance['imagePath'] );
		$description = empty( $instance['description'] ) ? '' : $instance['description'];	
		$homelink = empty( $instance['homelink'] ) ? '' : esc_url( $instance['homelink'] );	
		$email = empty( $instance['email'] ) ? '' : $instance['email'];	

		$facebooklink = empty( $instance['facebooklink'] ) ? '' : esc_url( $instance['facebooklink'] );		
		$twitterlink = empty( $instance['twitterlink'] ) ? '' : esc_url( $instance['twitterlink'] );								
		$googlepluslink = empty( $instance['googlepluslink'] ) ? '' : esc_url( $instance['googlepluslink'] );	
		
		echo $before_widget;

		if ( $name )
			//echo $before_title . $title . $after_title; 	
		?>
        
        
        <div class="ct_border">
            <div class="ct_author">
                <?php if($imagePath == '' ){echo get_avatar(150);}else{echo "<img src='".$imagePath."' class='avatar avatar-96 photo avatar-default' />";}?>
                <div class="rc">
                    <p class="rch1"><?php if($name == '' ){the_author();}else{echo $name;} ?></p>
                    <?php if($description == '' ){the_author_meta('description');}else{echo $description;} ?> 
                    
                    <div class="social-ul">
                        <ul>
                        <li class="social-home"><a href="<?php if($homelink == '' ){echo esc_url(home_url('/'));}else{echo $homelink;} ?>" target="_blank"><i class="fa fa-home"></i></a></li>
                        <li class="social-envelope"><a href="mailto:<?php if($email == '' ){the_author_meta('user_email');}else{echo $email;} ?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
                        
                        
                        <?php if($facebooklink != '' ){ ?>
                        <li class="social-facebook"><a href="<?php echo $facebooklink;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <?php }?>
                        <?php if($twitterlink != '' ){ ?>
                        <li class="social-twitter"><a target="_blank" href="<?php echo $twitterlink;?>"><i class="fa fa-twitter"></i></a></li> 
                        <?php }?>
                        <?php if($googlepluslink != '' ){ ?>                           
                        <li class="social-google"><a target="_blank" href="<?php echo $googlepluslink;?>"><i class="fa fa-google-plus"></i></a></li> 
                        <?php }?>
                        </ul>
                    </div><!-- End social-ul -->
                
                
                </div>
                <p class="ct_clear"></p>
            </div>
        </div>           
        
        
        
        
	<?php
		echo $after_widget;
	}
	
	/*Saves the settings. */
    function update( $new_instance, $old_instance ){
		$instance = $old_instance;
		$instance['name'] = sanitize_text_field( $new_instance['name'] );
		$instance['imagePath'] = esc_url( $new_instance['imagePath'] );
		$instance['description'] = current_user_can('unfiltered_html') ? $new_instance['description'] : stripslashes( wp_filter_post_kses( addslashes($new_instance['description']) ) );				
		$instance['homelink'] = esc_url( $new_instance['homelink'] );
		$instance['email'] = sanitize_text_field( $new_instance['email'] );	
				
		$instance['facebooklink'] = esc_url( $new_instance['facebooklink'] );		
		$instance['twitterlink'] = esc_url( $new_instance['twitterlink'] );
		$instance['googlepluslink'] = esc_url( $new_instance['googlepluslink'] );
		return $instance;
	}

	/*Creates the form for the widget in the back-end. */
    function form( $instance ){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'name'=>'Author Name', 'imagePath'=>'', 'description'=>'', 'homelink'=>'', 'email'=>'', 'facebooklink'=>'', 'twitterlink'=>'', 'googlepluslink'=>'' ) );

		$name = esc_attr( $instance['name'] );
		$imagePath = esc_url( $instance['imagePath'] );
		$description = esc_textarea( $instance['description'] );
		$homelink = esc_url( $instance['homelink'] );
		$email = esc_attr( $instance['email'] );
		

		$facebooklink = esc_url( $instance['facebooklink'] );
		$twitterlink = esc_url( $instance['twitterlink'] );
		$googlepluslink = esc_url( $instance['googlepluslink'] );

		# Author name
		echo '<p><label for="' . $this->get_field_id('name') . '">' . 'Name:' . '</label><input class="widefat" id="' . $this->get_field_id('name') . '" name="' . $this->get_field_name('name') . '" type="text" value="' . $name . '" /></p>';
		
		# Image
		echo '<p><label for="' . $this->get_field_id('imagePath') . '">' . 'Image:' . '</label><textarea cols="20" rows="2" class="widefat" id="' . $this->get_field_id('imagePath') . '" name="' . $this->get_field_name('imagePath') . '" >'. $imagePath .'</textarea></p>';		
				
		# About Text
		echo '<p><label for="' . $this->get_field_id('description') . '">' . 'Description:' . '</label><textarea cols="20" rows="5" class="widefat" id="' . $this->get_field_id('description') . '" name="' . $this->get_field_name('description') . '" >'. $description .'</textarea></p>';
	
		# Home link
		echo '<p><label for="' . $this->get_field_id('homelink') . '">' . 'Author home link:' . '</label><textarea cols="20" rows="2" class="widefat" id="' . $this->get_field_id('homelink') . '" name="' . $this->get_field_name('homelink') . '" >'. $homelink .'</textarea></p>';		
			
		# Email
		echo '<p><label for="' . $this->get_field_id('email') . '">' . 'Email:' . '</label><textarea cols="20" rows="2" class="widefat" id="' . $this->get_field_id('email') . '" name="' . $this->get_field_name('email') . '" >'. $email .'</textarea></p>';			


		
		# facebook
		echo '<p><label for="' . $this->get_field_id('facebooklink') . '">' . 'Facebook Link:' . '</label><textarea cols="20" rows="2" class="widefat" id="' . $this->get_field_id('facebooklink') . '" name="' . $this->get_field_name('facebooklink') . '" >'. $facebooklink .'</textarea></p>';	
		
		# twitter
		echo '<p><label for="' . $this->get_field_id('twitterlink') . '">' . 'Twitter Link:' . '</label><textarea cols="20" rows="2" class="widefat" id="' . $this->get_field_id('twitterlink') . '" name="' . $this->get_field_name('twitterlink') . '" >'. $twitterlink .'</textarea></p>';	
		
		# google +
		echo '<p><label for="' . $this->get_field_id('googlepluslink') . '">' . 'Google Plus Link:' . '</label><textarea cols="20" rows="2" class="widefat" id="' . $this->get_field_id('googlepluslink') . '" name="' . $this->get_field_name('googlepluslink') . '" >'. $googlepluslink .'</textarea></p>';					

	}
}//end AboutMeWidget class

function AuthorWidgetInit() {
	register_widget('AuthorWidget');
}
add_action('widgets_init', 'AuthorWidgetInit');


/**
 * Adds adsense widget.
 */

class VisitStatisticsCodeWidget extends WP_Widget
{
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'visit_statistics_code_widget', // Base ID
			__( 'CT Visit statistics Code Widget', 'ascreen' ), // Name
			array( 'description' => __( 'Add third party Visit statistics Code to the end of the page, such as Google Analytics Code(User Code)', 'ascreen' ), ) // Args
		);
	}	
	/* Displays the Widget in the front-end */
	function widget( $args, $instance ){
		extract($args);
		$adsenseCode = empty( $instance['adsenseCode'] ) ? '' : $instance['adsenseCode'];


		if ( $adsenseCode )echo $adsenseCode; 

	}

	/*Saves the settings. */
	function update( $new_instance, $old_instance ){
		$instance = $old_instance;
		$instance['adsenseCode'] = current_user_can('unfiltered_html') ? $new_instance['adsenseCode'] : stripslashes( wp_filter_post_kses( addslashes($new_instance['adsenseCode']) ) );

		return $instance;
	}

	/*Creates the form for the widget in the back-end. */
	function form( $instance ){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'adsenseCode'=>'' ) );

		//$title = esc_attr( $instance['title'] );
		$adsenseCode = esc_textarea( $instance['adsenseCode'] );

		# Title
		//echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
		# Adsense Code
		echo '<p><label for="' . $this->get_field_id('adsenseCode') . '">' . 'Visit statistics Code(such as Google Analytics Code):' . '</label><textarea cols="20" rows="12" class="widefat" id="' . $this->get_field_id('adsenseCode') . '" name="' . $this->get_field_name('adsenseCode') . '" >'. $adsenseCode .'</textarea></p>';
	}

}// end AdsenseWidget class

function VisitStatisticsCodeWidgetInit() {
	register_widget('VisitStatisticsCodeWidget');
}
add_action('widgets_init', 'VisitStatisticsCodeWidgetInit');

?>