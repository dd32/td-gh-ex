<?php
/**
 * AccessPress Lite Theme Options
 *
 * @package AccesspressLite
 */

if ( is_admin() ) : // Load only if we are viewing an admin page

function accesspress_lite_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_script( 'accesspresslite_custom_js', get_template_directory_uri().'/inc/admin-panel/js/custom.js', array( 'jquery' ) );
	wp_enqueue_script( 'of-media-uploader', get_template_directory_uri().'/inc/admin-panel/js/media-uploader.js', array( 'jquery' ) );
	
	wp_enqueue_style( 'accesspresslite_admin_style',get_template_directory_uri().'/inc/admin-panel/css/admin.css', array( 'farbtastic', 'thickbox'), '1.0', 'screen' );

}
add_action('admin_print_styles-appearance_page_theme_options', 'accesspress_lite_admin_scripts');



$accesspresslite_options = array(
	'responsive_design'=>'',
	'accesspresslite_favicon'=> '',
	'header_text'=>'Call us : 984187523XX',
	'show_search'=>true,
	'menu_alignment'=>'Left',
	'welcome_post' => '',
	'show_fontawesome' => false,
    'big_icons' => false,
	'featured_post1' => '',
	'featured_post2' => '',
	'featured_post3' => '',
	'featured_post1_icon' => '',
	'featured_post2_icon' => '',
	'featured_post3_icon' => '',
	'event_cat' => '',
	'testimonial_cat' => '',
	'blog_cat' => '',
	'portfolio_cat' => '',
	'footer_copyright' => get_bloginfo('name'),

	'show_slider' => 'yes',
	'slider_show_pager' => 'yes1',
	'slider_show_controls' => 'yes2',
	'slider_mode' => 'slide',
	'slider_auto' => 'yes3',
	'slider_speed' => '500',
	'slider_caption'=>'yes4',

	'slider1'=>'',
	'slider2'=>'',
	'slider3'=>'',
	'slider4'=>'',

	'leftsidebar_show_latest_events'=>true,
	'leftsidebar_show_testimonials'=>true,
	'rightsidebar_show_latest_events'=>true,
	'rightsidebar_show_testimonials'=>true,


	'accesspresslite_facebook' => '',
	'accesspresslite_twitter' => '',
	'accesspresslite_gplus' => '',
	'accesspresslite_youtube' => '',
	'accesspresslite_pinterest' => '',
	'accesspresslite_linkedin' => '',
	'accesspresslite_flickr' => '',
	'accesspresslite_vimeo' => '',
	'accesspresslite_stumbleupon' => '',
	'accesspresslite_skype' => '',
	'accesspresslite_rss' => '',
	'show_social_header'=>'',
	'show_social_footer'=>'',

	'google_map' => '',
	'contact_address' => '',
	'accesspresslite_home_page_layout' => 'Default',
    'accesspresslite_webpage_layout' => 'Fullwidth',
    'gallery_code' => '',
);


add_action( 'admin_init', 'accesspresslite_register_settings' );
add_action( 'admin_menu', 'accesspresslite_theme_options' );

function accesspresslite_register_settings() {
	register_setting( 'accesspresslite_theme_options', 'accesspresslite_options', 'accesspresslite_validate_options' );
}

function accesspresslite_theme_options() {
	// Add theme options page to the addmin menu
	add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'accesspresslite_theme_options_page' );
}



// Store Posts in array
$accesspresslite_postlist[0] = array(
	'value' => 0,
	'label' => '--choose--'
);
$arg = array('posts_per_page'   => -1);
$accesspresslite_posts = get_posts($arg); $i = 1;
foreach( $accesspresslite_posts as $accesspresslite_post ) :
	$accesspresslite_postlist[$accesspresslite_post->ID] = array(
		'value' => $accesspresslite_post->ID,
		'label' => $accesspresslite_post->post_title
	);
	$i++;
endforeach;

wp_reset_query();

// Store categories in array
$accesspresslite_catlist[0] = array(
	'value' => 0,
	'label' => '--choose--'
);
$arg1 = array(
	'hide_empty' => 0,
	'orderby' => 'name',
  	'parent' => 0,
  	);
$accesspresslite_cats = get_categories($arg1); $i = 1;

foreach( $accesspresslite_cats as $accesspresslite_cat ) :
	$accesspresslite_catlist[$accesspresslite_cat->cat_ID] = array(
		'value' => $accesspresslite_cat->cat_ID,
		'label' => $accesspresslite_cat->cat_name
	);
	$i++;
endforeach;

// Store slider setting in array
$accesspresslite_slider = array(
	'yes' => array(
		'value' => 'yes',
		'label' => 'show'
	),
	'no' => array(
		'value' => 'no',
		'label' => 'hide'
	),
);

$accesspresslite_slider_show_pager = array(
	'yes1' => array(
		'value' => 'yes1',
		'label' => 'yes'
	),
	'no1' => array(
		'value' => 'no1',
		'label' => 'no'
	),
);

$accesspresslite_slider_show_controls = array(
	'yes2' => array(
		'value' => 'yes2',
		'label' => 'yes'
	),
	'no2' => array(
		'value' => 'no2',
		'label' => 'no'
	),
);

$accesspresslite_slider_auto = array(
	'yes3' => array(
		'value' => 'yes3',
		'label' => 'yes'
	),
	'no3' => array(
		'value' => 'no3',
		'label' => 'no'
	),
);

$accesspresslite_slider_mode = array(
	'fade' => array(
		'value' => 'fade',
		'label' => 'fade'
	),
	'slide' => array(
		'value' => 'slide',
		'label' => 'slide'
	),
);

$accesspresslite_slider_caption = array(
	'yes4' => array(
		'value' => 'yes4',
		'label' => 'show'
	),
	'no4' => array(
		'value' => 'no4',
		'label' => 'hide'
	),
);





// Function to generate options page
function accesspresslite_theme_options_page() {
	global $accesspresslite_options, $accesspresslite_postlist, $accesspresslite_slider, $accesspresslite_slider_show_pager, $accesspresslite_slider_show_controls, $accesspresslite_slider_mode, $accesspresslite_slider_auto, $accesspresslite_slider_caption, $accesspresslite_catlist;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false; // This checks whether the form has just been submitted. ?>

	<div class="wrap" id="optionsframework-wrap">

	<div class="accesspresslite-header">
		<div class="accesspresslite-logo">
		<img src="<?php echo get_template_directory_uri();?>/inc/admin-panel/images/logo.png" alt="AccessPress Lite" />
		</div>

		<div class="ak-socials">
		<p>Follow us for new updates</p>
		<a href="https://www.facebook.com/pages/AccessPress-lite/1396595907277967" title="Facebook" class="accesspresslite_facebook" target="_blank">Facebook</a>
		<a href="https://twitter.com/AccessPress1" title="Twitter" class="accesspresslite_twitter" target="_blank">Twitter</a>
		<a href="http://wordpress.org/support/profile/access-keys" title="Wordpress" class="accesspresslite_wordpress" target="_blank">Wordpress</a>
		</div>

		<div class="accesspresslite_title"><?php echo wp_get_theme() . _e( ' Theme Options', 'accesspresslite' )?></div>
	</div>

	<div class="clear"></div>

	<?php 	if ( false !== $_REQUEST['settings-updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e( 'Options saved' , 'accesspresslite' ); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>

	<?php // Shows all the tabs of the theme options ?>
	<div class="nav-tab-wrapper">
	<a id="options-group-1-tab" class="nav-tab nav-tab-active" href="#options-group-1">Basic</a>
    <a id="options-group-2-tab" class="nav-tab" href="#options-group-2">Home Page</a>
	<a id="options-group-3-tab" class="nav-tab" href="#options-group-3">Slider</a>
	<a id="options-group-4-tab" class="nav-tab" href="#options-group-4">Sidebar</a>
	<a id="options-group-5-tab" class="nav-tab" href="#options-group-5">Social Links</a>
	<a id="options-group-6-tab" class="nav-tab" href="#options-group-6">Miscellaneous</a>
	<a id="options-group-7-tab" class="nav-tab" href="#options-group-7">About AccessPress Lite</a>
	</div>

	<div id="optionsframework-metabox" class="metabox-holder">
		<div id="optionsframework" class="postbox">
			<form method="post" action="options.php">

			<?php $settings = get_option( 'accesspresslite_options', $accesspresslite_options ); ?>
			
			
			<?php settings_fields( 'accesspresslite_theme_options' );
			/* This function outputs some hidden fields required by the form,
			including a nonce, a unique number used to ensure the form has been submitted from the admin page
			and not somewhere else, very important for security */ ?>

			<!-- Basic Settings -->
			<div id="options-group-1" class="group">
			<h3>Basic Settings</h3>
				<table class="form-table">
					<tr>
						<th><label for="footer_copyright">Disable Responsive Design?</th>
						<td>
							<input type="checkbox" id="responsive_design" name="accesspresslite_options[responsive_design]" value="1" <?php checked( true, $settings['responsive_design'] ); ?> />
							<label for="responsive_design">Check to disable</label>
						</td>
					</tr>
                    
                    <tr>
						<th><label for="show_search">Show Search in Header?</th>
						<td>
							<input type="checkbox" id="show_search" name="accesspresslite_options[show_search]" value="1" <?php checked( true, $settings['show_search'] ); ?> />
							<label for="show_search">Check to enable</label>
						</td>
					</tr>

					<tr>
						<th><label for="accesspresslite_favicon">Upload Favicon</th>
						<td>
							<div class="accesspresslite_fav_icon">
							  <input type="text" name="accesspresslite_options[media_upload]" id="accesspresslite_media_upload" value="<?php if(!empty($settings['media_upload'])){ echo $settings['media_upload']; }?>" />
							  <input class="button" name="media_upload_button" id="accesspresslite_media_upload_button" value="Upload" type="button" />
							  <em class="f13">&nbsp;&nbsp;Upload favicon(.png) with size of 16px X 16px</em>

							  <?php if(!empty($settings['media_upload'])){ ?>
							  <div id="accesspresslite_media_image">
							  <img src="<?php echo $settings['media_upload'] ?>" id="accesspresslite_show_image">
							  <div id="accesspresslite_fav_icon_remove">Remove</div>
							  </div>
							  <?php }else{ ?>
							  <div id="accesspresslite_media_image" style="display:none">
							  <img src="<?php if(isset($settings['media_upload'])) { echo $settings['media_upload']; } ?>" id="accesspresslite_show_image">
							  <a href="javascript:void(0)" id="accesspresslite_fav_icon_remove" title="remove">Remove</a>
							  </div>
							  <?php	} ?>
							</div>
						</td>
					</tr>

					<tr>
						<th><label for="upload_log">Upload Logo</th>
						<td>
							<a class="button" href="<?php echo admin_url('/themes.php?page=custom-header'); ?>">Upload</a>
						</td>
					</tr>

					<tr>
					<th scope="row"><label for="header_text">Header Text</label></th>
					<td>
					<textarea id="header_text" name="accesspresslite_options[header_text]" rows="5" cols="30" placeholder="Example.. Call Us : 985XXX9856XX"><?php echo $settings['header_text']; ?></textarea><br />
                    <em class="f13">Html content allowed</em> </td>
                    </tr>

					<tr><th scope="row"><label for="menu_alignment">Menu Alignment</label></th>
					<td>
					<?php $accesspresslite_menu_alignments = array('Left','Right','Center'); ?>
					<select id="menu_alignment" name="accesspresslite_options[menu_alignment]">
					<?php
					foreach ( $accesspresslite_menu_alignments as $accesspresslite_menu_alignment ) :
						echo '<option style="padding-right: 10px;" value="' .  $accesspresslite_menu_alignment . '" ' . selected( $accesspresslite_menu_alignment , $settings['menu_alignment'] ) . '>' . $accesspresslite_menu_alignment  . '</option>';
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>

					<tr>
					<th scope="row"><label for="footer_copyright">Footer Copyright Text</label></th>
					<td>
					<input id="footer_copyright" name="accesspresslite_options[footer_copyright]" type="text" value="<?php echo $settings['footer_copyright']; ?>" />
					</td>
					</tr>
				</table>
			</div>
            
            <!-- Home page Settings -->
			<div id="options-group-2" class="group" style="display: none;">
			<h3>Home Page Settings</h3> 
				<table class="form-table">
                    <tr><th scope="row"><label for="webpage_layouts">Web Page Layout</label></th>
					<td>
					<?php $accesspresslite_webpage_layouts = array('Fullwidth','Boxed'); ?>
					<?php
					foreach ( $accesspresslite_webpage_layouts as $accesspresslite_webpage_layout ) : ?>
						<input type="radio" id="<?php echo $accesspresslite_webpage_layout; ?>" name="accesspresslite_options[accesspresslite_webpage_layout]" value="<?php echo $accesspresslite_webpage_layout; ?>" <?php checked( $settings['accesspresslite_webpage_layout'], $accesspresslite_webpage_layout ); ?> />
						<label for="<?php echo $accesspresslite_webpage_layout; ?>"><?php echo $accesspresslite_webpage_layout; ?></label><br />
					<?php endforeach;
					?>
					</td>
					</tr>
                    
                    <tr><th scope="row"><label for="home_page_layout">Home Page Layout</label></th>
					<td>
					<?php $accesspresslite_home_page_layouts = array('Default','Layout1','Layout2'); ?>
					<?php
					foreach ( $accesspresslite_home_page_layouts as $accesspresslite_home_page_layout ) : ?>
                    <div class="layout-img">
						
						<label for="<?php echo $accesspresslite_home_page_layout; ?>">
                        <img src="<?php echo get_template_directory_uri().'/images/demo/'.$accesspresslite_home_page_layout.'.jpg'; ?>"/>
                        <div class="">
                        <input type="radio" id="<?php echo $accesspresslite_home_page_layout; ?>" name="accesspresslite_options[accesspresslite_home_page_layout]" value="<?php echo $accesspresslite_home_page_layout; ?>" <?php checked( $settings['accesspresslite_home_page_layout'], $accesspresslite_home_page_layout ); ?> />
                        <?php echo $accesspresslite_home_page_layout ;?></div>
                        </label>
                    </div>
					<?php endforeach; ?>
					</td>
					</tr>

					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>

					<tr><th scope="row"><label for="welcome_post">Welcome Post</label></th>
					<td>
					<select id="welcome_post" name="accesspresslite_options[welcome_post]">
					<?php
					foreach ( $accesspresslite_postlist as $single_post ) :
						$label = $single_post['label'];
						echo '<option style="padding-right: 10px;" value="' . $single_post['value'] . '" ' . selected( $single_post['value'], $settings['welcome_post'] ). '>' . $label . '</option>';
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>

					<tr>
						<th><label for="show_fontawesome">Show Font Awesome icon for Featured Post?</th>
						<td>
							<input type="checkbox" id="show_fontawesome" name="accesspresslite_options[show_fontawesome]" value="1" <?php checked( true, $settings['show_fontawesome'] ); ?> />
							<label for="show_fontawesome">Check to enable </label><br />
                            <em class="f13">(If enabled the featured image will be replaced by Font Awesome Icon. For lists of icons click <a href="http://fontawesome.io/icons/" target="_blank">here</a>)</em>
						</td>
					</tr>
                    
                    <tr>
						<th><label for="big_icons">Show Big Font Awesome icon with center aligned</th>
						<td>
							<input type="checkbox" id="big_icons" name="accesspresslite_options[big_icons]" value="1" <?php checked( true, $settings['big_icons'] ); ?> />
							<label for="big_icons">Check to enable </label><br />
						</td>
					</tr>
                    
					<tr><th scope="row"><label for="featured_post1">Featured Post 1</label></th>
					<td>
					<select id="featured_post1" name="accesspresslite_options[featured_post1]">
					<?php
					foreach ( $accesspresslite_postlist as $single_post ) :
						$label = $single_post['label'];
						echo '<option style="padding-right: 10px;" value="' . $single_post['value'] . '" ' . selected( $single_post['value'] , $settings['featured_post1'] ). '>' . $label . '</option>';
					endforeach;
					?>
					</select>
					<input id="featured_post1_icon" name="accesspresslite_options[featured_post1_icon]" type="text" value="<?php echo $settings['featured_post1_icon']; ?>" placeholder="Font Awesome icon name" /><em class="f13">&nbsp;&nbsp;Example: fa-bell</em>
					</td>
					</tr>

					<tr><th scope="row"><label for="featured_post2">Featured Post 2</label></th>
					<td>
					<select id="featured_post2" name="accesspresslite_options[featured_post2]">
					<?php
					foreach ( $accesspresslite_postlist as $single_post ) :
						$label = $single_post['label'];
						echo '<option style="padding-right: 10px;" value="' . $single_post['value']  . '" ' . selected( $single_post['value'] , $settings['featured_post2'] ) . '>' . $label . '</option>';
					endforeach;
					?>
					</select>
					<input id="featured_post2_icon" name="accesspresslite_options[featured_post2_icon]" type="text" value="<?php echo $settings['featured_post2_icon']; ?>" placeholder="Font Awesome icon name" /><em class="f13">&nbsp;&nbsp;Example: fa-bell</em>
					</td>
					</tr>

					<tr><th scope="row"><label for="featured_post3">Featured Post 3</label></th>
					<td>
					<select id="featured_post3" name="accesspresslite_options[featured_post3]">
					<?php
					foreach ( $accesspresslite_postlist as $single_post ) :
						$label = $single_post['label'];
						echo '<option style="padding-right: 10px;" value="' . $single_post['value']  . '" ' . selected( $single_post['value'] , $settings['featured_post3'] ) . '>' . $label . '</option>';
					endforeach;
					?>
					</select>
					<input id="featured_post3_icon" name="accesspresslite_options[featured_post3_icon]" type="text" value="<?php  echo $settings['featured_post3_icon']; ?>" placeholder="Font Awesome icon name" /><em class="f13">&nbsp;&nbsp;Example: fa-bell</em>
					</td>
					</tr>

					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>

					<tr><th scope="row"><label for="event_cat">Select the category to display as Events</label></th>
					<td>
					<select id="event_cat" name="accesspresslite_options[event_cat]">
					<?php
					foreach ( $accesspresslite_catlist as $single_cat ) :
						$label = $single_cat['label'];
						echo '<option style="padding-right: 10px;" value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['event_cat'] ). '>' . $label . '</option>';
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><th scope="row"><label for="testimonial_cat">Select the category to display as Testimonails</label></th>
					<td>
					<select id="testimonial_cat" name="accesspresslite_options[testimonial_cat]">
					<?php
					foreach ( $accesspresslite_catlist as $single_cat ) :
						$label = $single_cat['label'];
						echo '<option style="padding-right: 10px;" value="' . $single_cat['value'] . '" ' . selected( $single_cat['value'] , $settings['testimonial_cat']). '>' . $label . '</option>';
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><th scope="row"><label for="blog_cat">Select the category to display as Blog</label></th>
					<td>
					<select id="blog_cat" name="accesspresslite_options[blog_cat]">
					<?php
					foreach ( $accesspresslite_catlist as $single_cat ) :
						$label = $single_cat['label'];
						echo '<option style="padding-right: 10px;" value="' . $single_cat['value'] . '" ' . selected( $single_cat['value'] , $settings['blog_cat'] ) . '>' . $label . '</option>';
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><th scope="row"><label for="portfolio_cat">Select the category to display as Portfolio/Products</label></th>
					<td>
					<select id="portfolio_cat" name="accesspresslite_options[portfolio_cat]">
					<?php
					foreach ( $accesspresslite_catlist as $single_cat ) :
						$label = $single_cat['label'];
						echo '<option style="padding-right: 10px;" value="' . $single_cat['value'] . '" ' . selected( $single_cat['value'] , $settings['portfolio_cat'] ) . '>' . $label . '</option>';
					endforeach;
					?>
					</select>
					</td>
					</tr>
                    
                    <tr><td colspan="2" class="seperator">&nbsp;</td></tr>
                    
                    <tr>
					<th scope="row"><label for="gallery_code">Gallery Short Code</label></th>
					<td>
					<textarea id="gallery_code" name="accesspresslite_options[gallery_code]" rows="3" cols="30" placeholder='[gallery link="file" ids="203,204,205,206,207,208"]'><?php echo $settings['gallery_code']; ?></textarea>
                    </td>
					</tr>
                    
                    <tr>
                        <td colspan="2">
                        You can replace the gallery with custom widget <a href="<?php echo admin_url('/widgets.php') ?>">here</a>
                        </td>
                    </tr>
                </table>
            </div>


			<!-- Slider Settings-->
			<div id="options-group-3" class="group" style="display: none;">
			<h3>Home Page Slider Settings</h3>
				<table class="form-table">
					<tr>
						<td colspan="2" style="padding-left:0"><em class="f13">Select the post that you want to display as a Slider</em></td>
					</tr>

					<tr><th scope="row"><label for="slider1">Silder 1</label></th>
					<td>
					<select id="slider1" name="accesspresslite_options[slider1]">
					<?php
					foreach ( $accesspresslite_postlist as $single_post ) :
						$label = $single_post['label'];
						echo '<option style="padding-right: 10px;" value="' . $single_post['value'] . '" ' . selected($single_post['value'] , $settings['slider1'] ). '>' . $label . '</option>';
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><th scope="row"><label for="slider2">Silder 2</label></th>
					<td>
					<select id="slider2" name="accesspresslite_options[slider2]">
					<?php
					foreach ( $accesspresslite_postlist as $single_post ) :
						$label = $single_post['label'];
						echo '<option style="padding-right: 10px;" value="' . $single_post['value']  . '" ' . selected($single_post['value'] , $settings['slider2'] ) . '>' . $label . '</option>';
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><th scope="row"><label for="slider3">Silder 3</label></th>
					<td>
					<select id="slider3" name="accesspresslite_options[slider3]">
					<?php
					foreach ( $accesspresslite_postlist as $single_post ) :
						$label = $single_post['label'];
						echo '<option style="padding-right: 10px;" value="' . esc_attr( $single_post['value'] ) . '" ' . selected($single_post['value'] , $settings['slider3'] ) . '>' . $label . '</option>';
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><th scope="row"><label for="slider4">Silder 4</label></th>
					<td>
					<select id="slider4" name="accesspresslite_options[slider4]">
					<?php
					foreach ( $accesspresslite_postlist as $single_post ) :
						$label = $single_post['label'];
						echo '<option style="padding-right: 10px;" value="' . esc_attr( $single_post['value'] ) . '" ' . selected( $single_post['value'], $settings['slider4'] ) . '>' . $label . '</option>';
					endforeach;
					?>
					</select>
					</td>
					</tr>

					<tr><td colspan="2" class="seperator">&nbsp;</td></tr>
					
					<tr>
						<td colspan="2" style="padding-left:0"><em class="f13">Adjust the slider as per your need.</em></td>
					</tr>

					<tr><th scope="row">Show Slider</th>
					<td>
					<?php foreach( $accesspresslite_slider as $slider ) : ?>
					<input type="radio" id="<?php echo $slider['value']; ?>" name="accesspresslite_options[show_slider]" value="<?php echo $slider['value']; ?>" <?php checked( $settings['show_slider'], $slider['value'] ); ?> />
					<label for="<?php echo $slider['value']; ?>"><?php echo $slider['label']; ?></label><br />
					<?php endforeach; ?>
					</td>
					</tr>

					<tr><th scope="row">Show Slider Pager (Navigation dots)</th>
					<td>
					<?php foreach( $accesspresslite_slider_show_pager as $slider_pager ) : ?>
					<input type="radio" id="<?php echo $slider_pager['value']; ?>" name="accesspresslite_options[slider_show_pager]" value="<?php echo $slider_pager['value']; ?>" <?php checked( $settings['slider_show_pager'], $slider_pager['value'] ); ?> />
					<label for="<?php echo $slider_pager['value']; ?>"><?php echo $slider_pager['label']; ?></label><br />
					<?php endforeach; ?>
					</td>
					</tr>

					<tr><th scope="row">Show Slider Controls (Arrows)</th>
					<td>
					<?php foreach( $accesspresslite_slider_show_controls as $slider_controls ) : ?>
					<input type="radio" id="<?php echo $slider_controls['value']; ?>" name="accesspresslite_options[slider_show_controls]" value="<?php echo $slider_controls['value']; ?>" <?php checked( $settings['slider_show_controls'], $slider_controls['value'] ); ?> />
					<label for="<?php echo $slider_controls['value']; ?>"><?php echo $slider_controls['label']; ?></label><br />
					<?php endforeach; ?>
					</td>
					</tr>

					<tr><th scope="row">Slider Transition - fade/slide</th>
					<td>
					<?php foreach( $accesspresslite_slider_mode as $slider_modes) : ?>
					<input type="radio" id="<?php echo $slider_modes['value']; ?>" name="accesspresslite_options[slider_mode]" value="<?php echo $slider_modes['value']; ?>" <?php checked( $settings['slider_mode'], $slider_modes['value'] ); ?> />
					<label for="<?php echo $slider_modes['value']; ?>"><?php echo $slider_modes['label']; ?></label><br />
					<?php endforeach; ?>
					</td>
					</tr>

					<tr><th scope="row">Slider auto Transition</th>
					<td>
					<?php foreach( $accesspresslite_slider_auto as $slider_autos) : ?>
					<input type="radio" id="<?php echo $slider_autos['value']; ?>" name="accesspresslite_options[slider_auto]" value="<?php echo $slider_autos['value']; ?>" <?php checked( $settings['slider_auto'], $slider_autos['value'] ); ?> />
					<label for="<?php echo $slider_autos['value']; ?>"><?php echo $slider_autos['label']; ?></label><br />
					<?php endforeach; ?>
					</td>
					</tr>

					<tr><th scope="row">Slider Speed</th>
					<td>
					<input id="slider_speed" name="accesspresslite_options[slider_speed]" type="text" value="<?php echo $settings['slider_speed']; ?>" />
					</td>
					</tr>

					<tr><th scope="row">Show Slider Captions</th>
					<td>
					<?php foreach( $accesspresslite_slider_caption as $slider_captions) : ?>
					<input type="radio" id="<?php echo $slider_captions['value']; ?>" name="accesspresslite_options[slider_caption]" value="<?php echo $slider_captions['value']; ?>" <?php checked( $settings['slider_caption'], $slider_captions['value'] ); ?> />
					<label for="<?php echo $slider_captions['value']; ?>"><?php echo $slider_captions['label']; ?></label><br />
					<?php endforeach; ?>
					</td>
					</tr>
				</table>
			</div>

			<!-- Slider Settings-->
			<div id="options-group-4" class="group" style="display: none;">
			<h3>Sidebar Settings</h3>
				<table class="form-table">
				<tr>
					<td style="padding:0">
						<table>
						<tr><th colspan="2" class="line">Left Sidebar Options</th></tr>
						<tr>
							<th><label for="leftsidebar_show_latest_events">Show Latest Events?</th>
							<td>
							<input type="checkbox" id="leftsidebar_show_latest_events" name="accesspresslite_options[leftsidebar_show_latest_events]" value="1" <?php checked( true, $settings['leftsidebar_show_latest_events'] ); ?> />
							<label for="leftsidebar_show_latest_events">Check to enable</label>
							</td>
						</tr>

						<tr>
							<th><label for="leftsidebar_show_testimonials">Show Testimonials?</th>
							<td>
							<input type="checkbox" id="leftsidebar_show_testimonials" name="accesspresslite_options[leftsidebar_show_testimonials]" value="1" <?php checked( true, $settings['leftsidebar_show_testimonials'] ); ?> />
							<label for="leftsidebar_show_testimonials">Check to enable</label>
							</td>
						</tr>

						<tr>
							<th colspan="2">To add Custom widget in Left Sidebar, Click <a href="<?php echo admin_url('/widgets.php')?>">here</a></th>
						</tr>
						</table>

					</td>
					<td style="padding:0">
						<table>
						<tr><th colspan="2" class="line">Right Sidebar Options</th></tr>
						<tr>
							<th><label for="rightsidebar_show_latest_events">Show Latest Events?</th>
							<td>
							<input type="checkbox" id="rightsidebar_show_latest_events" name="accesspresslite_options[rightsidebar_show_latest_events]" value="1" <?php checked( true, $settings['rightsidebar_show_latest_events'] ); ?> />
							<label for="rightsidebar_show_latest_events">Check to enable</label>
							</td>
						</tr>

						<tr>
							<th><label for="rightsidebar_show_testimonials">Show Testimonials?</th>
							<td>
							<input type="checkbox" id="rightsidebar_show_testimonials" name="accesspresslite_options[rightsidebar_show_testimonials]" value="1" <?php checked( true, $settings['rightsidebar_show_testimonials'] ); ?> />
							<label for="rightsidebar_show_testimonials">Check to enable</label>
							</td>
						</tr>

						<tr>
							<th colspan="2">To add Custom widget in Right Sidebar, Click <a href="<?php echo admin_url('/widgets.php')?>">here</a></th>
						</tr>
						</table>

					</td>
				</tr>
				</table>
			</div>

			<!-- Social Settings-->
			<div id="options-group-5" class="group" style="display: none;">
			<h3>Social links - Put your social url</h3>
				<table class="form-table social-urls">
					<tr>
						<td colspan="2" style="padding-left:0"><em class="f13">Put your social url below.. Leave blank if you don't want to show it.</em></td>
					</tr>

					<tr>
						<th><label for="show_social_header">Disable Social icons in header?</th>
						<td>
							<input type="checkbox" id="show_social_header" name="accesspresslite_options[show_social_header]" value="1" <?php checked( true, $settings['show_social_header'] ); ?> />
							<label for="show_social_header">Check to disable</label>
						</td>
					</tr>

					<tr>
						<th><label for="show_social_footer">Disable Social icons in Footer?</th>
						<td>
							<input type="checkbox" id="show_social_footer" name="accesspresslite_options[show_social_footer]" value="1" <?php checked( true, $settings['show_social_footer'] ); ?> />
							<label for="show_social_footer">Check to disable</label>
						</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_facebook">Facebook</label></th>
					<td>
					<input id="accesspresslite_facebook" name="accesspresslite_options[accesspresslite_facebook]" type="text" value="<?php echo $settings['accesspresslite_facebook']; ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_twitter">Twitter</label></th>
					<td>
					<input id="accesspresslite_twitter" name="accesspresslite_options[accesspresslite_twitter]" type="text" value="<?php echo esc_url($settings['accesspresslite_twitter']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_gplus">Google plus</label></th>
					<td>
					<input id="accesspresslite_gplus" name="accesspresslite_options[accesspresslite_gplus]" type="text" value="<?php echo esc_url($settings['accesspresslite_gplus']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_youtube">Youtube</label></th>
					<td>
					<input id="accesspresslite_youtube" name="accesspresslite_options[accesspresslite_youtube]" type="text" value="<?php echo esc_url($settings['accesspresslite_youtube']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_pinterest">Pinterest</label></th>
					<td>
					<input id="accesspresslite_pinterest" name="accesspresslite_options[accesspresslite_pinterest]" type="text" value="<?php echo esc_url($settings['accesspresslite_pinterest']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_linkedin">Linkedin</label></th>
					<td>
					<input id="accesspresslite_linkedin" name="accesspresslite_options[accesspresslite_linkedin]" type="text" value="<?php echo esc_url($settings['accesspresslite_linkedin']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_flickr">Flickr</label></th>
					<td>
					<input id="accesspresslite_flickr" name="accesspresslite_options[accesspresslite_flickr]" type="text" value="<?php echo esc_url($settings['accesspresslite_flickr']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_vimeo">Vimeo</label></th>
					<td>
					<input id="accesspresslite_vimeo" name="accesspresslite_options[accesspresslite_vimeo]" type="text" value="<?php echo esc_url($settings['accesspresslite_vimeo']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_stumbleupon">Stumbleupon</label></th>
					<td>
					<input id="accesspresslite_stumbleupon" name="accesspresslite_options[accesspresslite_stumbleupon]" type="text" value="<?php echo esc_url($settings['accesspresslite_stumbleupon']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_skype">Skype</label></th>
					<td>
					<input id="accesspresslite_skype" name="accesspresslite_options[accesspresslite_skype]" type="text" value="<?php echo esc_url($settings['accesspresslite_skype']); ?>" />
					</td>
					</tr>

					<tr><th scope="row"><label for="accesspresslite_rss">RSS</label></th>
					<td>
					<input id="accesspresslite_rss" name="accesspresslite_options[accesspresslite_rss]" type="text" value="<?php echo esc_url($settings['accesspresslite_rss']); ?>" />
					</td>
					</tr>
				</table>
			</div>

			<!-- miscellaneous -->
			<div id="options-group-6" class="group" style="display: none;">
			<h3>Miscellaneous</h3>
				<table class="form-table">
					<tr><th scope="row"><label for="google_map">Google Map Iframe</label></th>
						<td>
						<textarea id="google_map" name="accesspresslite_options[google_map]" rows="5" cols="40"><?php echo $settings['google_map']; ?></textarea>
						<p class="f13"><em>Enter the Iframe of the google map to show in contact us page.<br />Leave Blank if you don't want to show<em></p>
						</td>
					</tr>

					<tr><th scope="row"><label for="contact_address">Contact Address</label></th>
						<td>
						<textarea id="contact_address" name="accesspresslite_options[contact_address]" rows="5" cols="40"><?php echo $settings['contact_address']; ?></textarea>
						<p class="f13"><em>Enter the Contact Address<br />Leave Blank if you don't want to show<em></p>
						</td>
					</tr>
				</table>
			</div>

			<!-- About Accesspress Lite -->
			<div id="options-group-7" class="group" style="display: none;">
			<h3>Know more about AccessPress Lite</h3>
				<table class="form-table">
					<tr>
					<td colspan="2">
<p>AccessPress Lite - is a FREE WordPress theme by Access Keys.
Access Keys - has developed more than 350 WordPress websites for its clients.</p>

<p>We want to give "a little beautiful thing" - back to the community.
With our experience, we are creating "AccessPress Lite", a free WordPress theme, which includes the most useful features for a generic business website!</p>

<p>You'll find features in a premium theme yet no nonsense!	</p>					
					</td>
					</tr>
				</table>
			</div>

			<div id="optionsframework-submit">
			<input type="submit" class="button-primary" value="Save Options" />
			</div>

			</form>
		</div><!-- #optionsframework -->
	</div><!-- #optionsframework-metabox -->

	</div>

	<?php
}


function accesspresslite_validate_options( $input ) {
	global $accesspresslite_options, $accesspresslite_menu_alignments, $accesspresslite_postlist, $accesspresslite_slider, $accesspresslite_slider_show_pager, $accesspresslite_slider_show_controls, $accesspresslite_slider_mode, $accesspresslite_slider_auto, $accesspresslite_slider_caption;

	$settings = get_option( 'accesspresslite_options', $accesspresslite_options );
	
	// We strip all tags from the text field, to avoid vulnerablilties.
    $input['welcome_post'] = wp_filter_nohtml_kses( $input['welcome_post'] );
    $input['featured_post1'] = wp_filter_nohtml_kses( $input['featured_post1'] );
    $input['featured_post2'] = wp_filter_nohtml_kses( $input['featured_post2'] );
    $input['featured_post3'] = wp_filter_nohtml_kses( $input['featured_post3'] );
    $input['featured_post1_icon'] = sanitize_text_field( $input['featured_post1_icon'] );
    $input['featured_post2_icon'] = sanitize_text_field( $input['featured_post2_icon'] );
    $input['featured_post3_icon'] = sanitize_text_field( $input['featured_post3_icon'] );
    $input['event_cat'] = wp_filter_nohtml_kses( $input['event_cat'] );
    $input['blog_cat'] = wp_filter_nohtml_kses( $input['blog_cat'] );
    $input['testimonial_cat'] = wp_filter_nohtml_kses( $input['testimonial_cat'] );
    $input['portfolio_cat'] = wp_filter_nohtml_kses( $input['portfolio_cat'] );
    $input['menu_alignment'] = wp_filter_nohtml_kses( $input['menu_alignment'] );
    $input['slider_speed'] = sanitize_text_field( $input['slider_speed'] );
    $input['footer_copyright'] = sanitize_text_field( $input['footer_copyright'] );

    // We select the previous value of the field, to restore it in case an invalid entry has been given
	$prev = $settings['featured_post1'];
	// We verify if the given value exists in the layouts array
	if ( !array_key_exists( $input['featured_post1'], $accesspresslite_postlist ) )
		$input['featured_post1'] = $prev;

	$prev = $settings['featured_post2'];
	if ( !array_key_exists( $input['featured_post2'], $accesspresslite_postlist ) )
		$input['featured_post2'] = $prev;
        
    $prev = $settings['featured_post3'];
	if ( !array_key_exists( $input['featured_post3'], $accesspresslite_postlist ) )
		$input['featured_post3'] = $prev;
	
	
	$prev = $settings['show_slider'];
	if ( !array_key_exists( $input['show_slider'], $accesspresslite_slider ) )
		$input['show_slider'] = $prev;

	$prev = $settings['slider_show_pager'];
	if ( !array_key_exists( $input['slider_show_pager'], $accesspresslite_slider_show_pager ) )
		$input['slider_show_pager'] = $prev;

	$prev = $settings['slider_show_controls'];
	if ( !array_key_exists( $input['slider_show_controls'], $accesspresslite_slider_show_controls) )
		$input['slider_show_controls'] = $prev;

	$prev = $settings['slider_mode'];
	if ( !array_key_exists( $input['slider_mode'], $accesspresslite_slider_mode ) )
		$input['slider_mode'] = $prev;

	$prev = $settings['slider_auto'];
	if ( !array_key_exists( $input['slider_auto'], $accesspresslite_slider_auto ) )
		$input['slider_auto'] = $prev;

	$prev = $settings['slider_caption'];
	if ( !array_key_exists( $input['slider_caption'], $accesspresslite_slider_caption ) )
		$input['slider_caption'] = $prev;
        
    if (isset( $input['slider_speed'] ) ){
        if(intval($input['slider_speed'])){
            $input['slider_speed'] = absint($input['slider_speed']);
        }
    }

	// If the checkbox has not been checked, we void it
	if ( ! isset( $input['responsive_design'] ) )
		$input['responsive_design'] = null;
	// We verify if the input is a boolean value
	$input['responsive_design'] = ( $input['responsive_design'] == 1 ? 1 : 0 );

	if ( ! isset( $input['show_search'] ) )
		$input['show_search'] = null;
	$input['show_search'] = ( $input['show_search'] == 1 ? 1 : 0 );

	if ( ! isset( $input['show_fontawesome'] ) )
		$input['show_fontawesome'] = null;
	$input['show_fontawesome'] = ( $input['show_fontawesome'] == 1 ? 1 : 0 );
    
    if ( ! isset( $input['big_icons'] ) )
		$input['big_icons'] = null;
	$input['big_icons'] = ( $input['big_icons'] == 1 ? 1 : 0 );

	if ( ! isset( $input['leftsidebar_show_latest_events'] ) )
		$input['leftsidebar_show_latest_events'] = null;
	$input['leftsidebar_show_latest_events'] = ( $input['leftsidebar_show_latest_events'] == 1 ? 1 : 0 );

	if ( ! isset( $input['leftsidebar_show_testimonials'] ) )
		$input['leftsidebar_show_testimonials'] = null;
	$input['leftsidebar_show_testimonials'] = ( $input['leftsidebar_show_testimonials'] == 1 ? 1 : 0 );

	if ( ! isset( $input['leftsidebar_show_social_links'] ) )
		$input['leftsidebar_show_social_links'] = null;
	$input['leftsidebar_show_social_links'] = ( $input['leftsidebar_show_social_links'] == 1 ? 1 : 0 );

	if ( ! isset( $input['rightsidebar_show_latest_events'] ) )
		$input['rightsidebar_show_latest_events'] = null;
	$input['rightsidebar_show_latest_events'] = ( $input['rightsidebar_show_latest_events'] == 1 ? 1 : 0 );

	if ( ! isset( $input['rightsidebar_show_testimonials'] ) )
		$input['rightsidebar_show_testimonials'] = null;
	$input['rightsidebar_show_testimonials'] = ( $input['rightsidebar_show_testimonials'] == 1 ? 1 : 0 );
	
	if ( ! isset( $input['rightsidebar_show_social_links'] ) )
		$input['rightsidebar_show_social_links'] = null;
	$input['rightsidebar_show_social_links'] = ( $input['rightsidebar_show_social_links'] == 1 ? 1 : 0 );

	if ( ! isset( $input['show_social_header'] ) )
		$input['show_social_header'] = null;
	$input['show_social_header'] = ( $input['show_social_header'] == 1 ? 1 : 0 );

	if ( ! isset( $input['show_social_footer'] ) )
		$input['show_social_footer'] = null;
	$input['show_social_footer'] = ( $input['show_social_footer'] == 1 ? 1 : 0 );


	 // data validation for Social Icons
	if( isset( $input[ 'accesspresslite_facebook' ] ) ) {
		$input[ 'accesspresslite_facebook' ] = esc_url_raw( $input[ 'accesspresslite_facebook' ] );
	};
	if( isset( $input[ 'accesspresslite_twitter' ] ) ) {
		$input[ 'accesspresslite_twitter' ] = esc_url_raw( $input[ 'accesspresslite_twitter' ] );
	};
	if( isset( $input[ 'accesspresslite_gplus' ] ) ) {
		$input[ 'accesspresslite_gplus' ] = esc_url_raw( $input[ 'accesspresslite_gplus' ] );
	};
	if( isset( $input[ 'accesspresslite_youtube' ] ) ) {
		$input[ 'accesspresslite_youtube' ] = esc_url_raw( $input[ 'accesspresslite_youtube' ] );
	};
	if( isset( $input[ 'accesspresslite_pinterest' ] ) ) {
		$input[ 'accesspresslite_pinterest' ] = esc_url_raw( $input[ 'accesspresslite_pinterest' ] );
	};
	if( isset( $input[ 'accesspresslite_linkedin' ] ) ) {
		$input[ 'accesspresslite_linkedin' ] = esc_url_raw( $input[ 'accesspresslite_linkedin' ] );
	};
	if( isset( $input[ 'accesspresslite_flickr' ] ) ) {
		$input[ 'accesspresslite_flickr' ] = esc_url_raw( $input[ 'accesspresslite_flickr' ] );
	};
	if( isset( $input[ 'accesspresslite_vimeo' ] ) ) {
		$input[ 'accesspresslite_vimeo' ] = esc_url_raw( $input[ 'accesspresslite_vimeo' ] );
	};
	if( isset( $input[ 'accesspresslite_stumbleupon' ] ) ) {
		$input[ 'accesspresslite_stumbleupon' ] = esc_url_raw( $input[ 'accesspresslite_stumbleupon' ] );
	};
	if( isset( $input[ 'accesspresslite_skype' ] ) ) {
		$input[ 'accesspresslite_skype' ] = esc_url_raw( $input[ 'accesspresslite_skype' ] );
	};
	if( isset( $input[ 'accesspresslite_rss' ] ) ) {
		$input[ 'accesspresslite_rss' ] = esc_url_raw( $input[ 'accesspresslite_rss' ] );
	};

    if( isset( $input[ 'header_text' ] ) ) {
	   $input[ 'header_text' ] = wp_kses_post( $input[ 'header_text' ] );
    }
    
    if( isset( $input[ 'google_map' ] ) ) {
    	$allowed_tags=array(
    		'iframe' => array(
    			'src' => array()
    			)
    		);
	   $input[ 'google_map' ] = wp_kses( $input[ 'google_map' ],$allowed_tags );
    }
    if( isset( $input[ 'contact_address' ] ) ) {
	   $input[ 'contact_address' ] = wp_kses_post( $input[ 'contact_address' ] );
    }
    
    if( isset( $input[ 'gallery_code' ] ) ) {
	   $input[ 'gallery_code' ] = wp_kses_post( $input[ 'gallery_code' ] );
	}
	return $input;
}

endif;  // EndIf is_admin()
?>