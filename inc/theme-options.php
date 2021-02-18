<?php

/******************************
  Register the settings to use on the Theme Admin Page
******************************/
add_filter( 'option_page_capability_fgymm-options', 'fgymm_get_options_page_cap' );
add_action( 'admin_init', 'fgymm_register_general_settings' );
add_action( 'admin_init', 'fgymm_register_header_settings' );
add_action( 'admin_init', 'fgymm_register_footer_settings' );
add_action( 'admin_init', 'fgymm_register_slider_settings' );
add_action( 'admin_init', 'fgymm_register_social_settings' );
add_action( 'admin_init', 'fgymm_register_notfound_settings' );
add_action( 'admin_menu', 'fgymm_menu' );

/******************************
  Admin Page Functions
******************************/
function fgymm_menu() {
	add_theme_page( __( 'Theme Options', 'fgymm' ),
	                __( 'Theme Options', 'fgymm' ),
					fgymm_get_options_page_cap(),
					'options.php',
					'fgymm_page' );
}

function fgymm_get_options_page_cap() {
    return 'edit_theme_options';
}


/******************************
  Callback function to the add_theme_page. It displays the theme options page
******************************/
function fgymm_get_option_defaults() {

	$defaults = array(
		'social_rss' 	   		=> get_bloginfo( 'rss2_url' ),
		'notfound_image'		=> get_stylesheet_directory_uri().'/images/404.png',
		'notfound_title'		=> __( 'Error 404: Not Found', 'fgymm' ),
		'notfound_content'		=> __( '<p>Sorry. The page you are looking for does not exist.</p>', 'fgymm' ),
		'slider_slide1_content' => __( '<h2>Lorem ipsum dolor</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a class="btn" title="Read more" href="#">Read more</a>', 'fgymm' ),
		'slider_slide1_image'	=> get_stylesheet_directory_uri().'/images/slider/1.jpg',
		'slider_slide2_content' => __( '<h2>Everti Constituam</h2><p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><a class="btn" title="Read more" href="#">Read more</a>', 'fgymm' ),
		'slider_slide2_image'	=> get_stylesheet_directory_uri().'/images/slider/2.jpg',		
		'slider_slide3_content' => __( '<h2>Id Essent Cetero</h2><p>Quodsi docendi sed id. Ea eam quod aliquam epicurei, qui tollit inimicus partiendo cu ei. Nisl consul expetendis at duo, mea ea ceteros constituam.</p><a class="btn" title="Read more" href="#">Read more</a>', 'fgymm' ),
		'slider_slide3_image' 	=> get_stylesheet_directory_uri().'/images/slider/3.jpg',
	);

	return apply_filters( 'fgymm_get_option_defaults', $defaults );
}

function fgymm_get_options() {
    // Options API
    return wp_parse_args( 
        get_option( 'theme_fgymm_options', array() ), 
        fgymm_get_option_defaults() 
    );
}

function fgymm_page()
{
	$active_tab = isset($_GET[ 'tab' ]) ? $_GET[ 'tab' ] : 'tab_general';
	$fullThemeUrl = "http://tishonator.com/product/tgymm";
?>
    <div class="wrap">
		<h2 class="nav-tab-wrapper">  
			<a href="?page=options.php&tab=tab_general"  class="nav-tab <?php echo $active_tab == 'tab_general' ? 'nav-tab-active' : ''; ?>"><?php _e( 'General', 'fgymm' ); ?></a>	
			<a href="?page=options.php&tab=tab_header"  class="nav-tab <?php echo $active_tab == 'tab_header' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Header', 'fgymm' ); ?></a>
			<a href="?page=options.php&tab=tab_footer"  class="nav-tab <?php echo $active_tab == 'tab_footer' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Footer', 'fgymm' ); ?></a>
			<a href="?page=options.php&tab=tab_homepage"  class="nav-tab <?php echo $active_tab == 'tab_homepage' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Home', 'fgymm' ); ?></a>
			<a href="?page=options.php&tab=tab_slider"  class="nav-tab <?php echo $active_tab == 'tab_slider' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Slider', 'fgymm' ); ?></a>
			<a href="?page=options.php&tab=tab_colors"  class="nav-tab <?php echo $active_tab == 'tab_colors' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Colors', 'fgymm' ); ?></a>
			<a href="?page=options.php&tab=tab_social" class="nav-tab <?php echo $active_tab == 'tab_social' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Social', 'fgymm' ); ?></a>
			<a href="?page=options.php&tab=tab_lightbox" class="nav-tab <?php echo $active_tab == 'tab_lightbox' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Lightbox', 'fgymm' ); ?></a>
			<a href="?page=options.php&tab=tab_thumbnails" class="nav-tab <?php echo $active_tab == 'tab_thumbnails' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Thumbnails', 'fgymm' ); ?></a>
			<a href="?page=options.php&tab=tab_contacts" class="nav-tab <?php echo $active_tab == 'tab_contacts' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Contacts', 'fgymm' ); ?></a>
			<a href="?page=options.php&tab=tab_notfound" class="nav-tab <?php echo $active_tab == 'tab_notfound' ? 'nav-tab-active' : ''; ?>">404</a>
			<a href="?page=options.php&tab=tab_woocommerce" class="nav-tab <?php echo $active_tab == 'tab_woocommerce' ? 'nav-tab-active' : ''; ?>">WooCommerce</a>
		</h2>

				<?php if (isset($_GET[ 'settings-updated' ])) : ?>
					<div class='updated'>
						<p>
							<?php _e( 'Theme settings updated successfully.', 'fgymm' ) ?>
						</p>
					</div>
				<?php endif; ?>

				<form method="post" enctype="multipart/form-data" action="options.php">
					<?php
					if ( $active_tab == 'tab_general' ) :

						settings_fields( 'fgymm_general_settings' );
						do_settings_sections( 'fgymm_general_settings' );
?>
						<div style="background-color:#CCCCCC;padding:10px;">
						
							<div>
								<?php _e( 'These options are available in the full version only.', 'fgymm' ); ?> <a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Click Here', 'fgymm' ); ?>"><?php _e( 'Click Here', 'fgymm' ); ?></a> <?php _e( 'to get the full version of tGymm theme.', 'fgymm' ); ?>
							</div>
						
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"> <label for="layout"><?php _e( 'Website Layout', 'fgymm' ); ?></label> </th>
										<td>
											<select name="layout" id="layout" disabled>
												<option selected="selected" value="Wide" style="padding-right: 10px;"><?php _e( 'Wide', 'fgymm' ); ?></option>
												<option value="Boxed" style="padding-right: 10px;"><?php _e( 'Boxed', 'fgymm' ); ?></option>
											</select>
											<br> <span class="description"><?php _e( 'Select layout of your website', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"> <label for="headercode"> <?php _e( 'Code before &lt;/header&gt; tag', 'fgymm' ); ?> </label> </th>
										<td> <textarea name="headercode" id="headercode" cols="50" rows="4" disabled></textarea> <br> <span class="description"><?php _e( 'Custom html code, before the &lt;/head&gt; tag', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="bodycode"> <?php _e( 'Code before &lt;/body&gt; tag', 'fgymm' ); ?> </label> </th>
										<td> <textarea name="bodycode" id="bodycode" cols="50" rows="4" disabled></textarea> <br> <span class="description"><?php _e( 'Custom html code, before the &lt;/body&gt; tag', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="trackingcode"><?php _e( 'Tracking Code', 'fgymm' ); ?></label> </th>
										<td> <textarea name="trackingcode" id="trackingcode" cols="50" rows="4" disabled></textarea> <br> <span class="description"><?php _e( 'Tracking code (i.e. Google Analytics). It will be added in the footer part of the website.', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="aftersinglepost"><?php _e( 'Show Author Info After Single Posts', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" name="aftersinglepost" id="aftersinglepost" disabled> <br> <span class="description"><?php _e( 'Display author info box after single posts', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="aftersinglepost"><?php _e( 'Show Social Sharing After Single Posts', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" name="aftersinglepost" id="aftersinglepost" disabled> <br> <span class="description"><?php _e( 'Display social sharing box after single posts', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="aftersinglepage"><?php _e( 'Show Author Info After Single Pages', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" name="aftersinglepage" id="aftersinglepage" disabled> <br> <span class="description"><?php _e( 'Display author info box after single page', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="aftersinglepage"><?php _e( 'Show Social Sharing After Single Pages', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" name="aftersinglepage" id="aftersinglepage" disabled> <br> <span class="description"><?php _e( 'Display social sharing box after single pages', 'fgymm' ); ?></span> </td>
									</tr>
								</tbody>
							</table>
						</div>
						
						<?php fgymm_display_hidden_fields($active_tab); ?>
						
						<p class="submit">  
							<a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Get tGymm Theme', 'fgymm' ); ?>" class="button-primary"><?php _e( 'Get tGymm Theme', 'fgymm' ); ?></a>   <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'fgymm' ) ?>" />  
						</p>
<?php
					elseif ( $active_tab == 'tab_header' ) :

						settings_fields( 'fgymm_header_settings' );
						do_settings_sections( 'fgymm_header_settings' );
?>						
						<div style="background-color:#CCCCCC;padding:10px;">
						
							<div>
								<?php _e( 'These options are available in the full version only.', 'fgymm' ); ?> <a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Click Here', 'fgymm' ); ?>"><?php _e( 'Click Here', 'fgymm' ); ?></a> <?php _e( 'to get the full version of tGymm theme.', 'fgymm' ); ?>
							</div>
							
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"> <label for="logo_width"><?php _e( 'Logo Image Width', 'fgymm' ); ?></label> </th>
										<td> <input type="text" name="logo_width" id="logo_width" class="regular-text" disabled> <br> <span class="description"><?php _e( 'Logo image width of your website', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="logo_height"><?php _e( 'Logo Image Height', 'fgymm' ); ?></label> </th>
										<td> <input type="text" name="logo_height" id="logo_height" class="regular-text" disabled> <br> <span class="description"><?php _e( 'Logo image height of your website', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="header_phone"><?php _e( 'Header Phone', 'fgymm' ); ?></label> </th>
										<td> <input type="text" value="1.555.555.555" name="header_phone" id="header_phone" class="regular-text" disabled> <br> <span class="description"><?php _e( 'Your phone to appear in the website header', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="header_email"><?php _e( 'Header E-mail', 'fgymm' ); ?></label> </th>
										<td> <input type="text" value="sales@yoursite.com" name="header_email" id="header_email" class="regular-text" disabled> <br> <span class="description"><?php _e( 'Your e-mail to appear in the website header', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="displayhomeicon"><?php _e( 'Display Homepage Icon', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" checked="checked" value="1" name="displayhomeicon" id="displayhomeicon" disabled> <br> <span class="description"><?php _e( 'Display homepage icon in the website header', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="displaysocial"><?php _e( 'Display Social Icons', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" checked="checked" value="1" name="displaysocial" id="displaysocial" disabled> <br> <span class="description"><?php _e( 'Display social icons in the website header', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="displaysearch"><?php _e( 'Display Search Form', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" name="displaysearch" id="displaysearch" disabled> <br> <span class="description"><?php _e( 'Display search form in the website header', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="opensocialnewwindow"><?php _e( 'Open Social Icons in a new window', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" name="opensocialnewwindow" checked="checked" value="1" id="opensocialnewwindow" disabled> <br> <span class="description"><?php _e( 'Open social icons links in a new window', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="showbreadcrumb"><?php _e( 'Show Breadcrumb', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" checked="checked" value="1" name="showbreadcrumb" id="showbreadcrumb" disabled> <br> <span class="description"><?php _e( 'Show breadcrumb in the website header', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="pageheaderbackground"><?php _e( 'Page Header Background Image', 'fgymm' ); ?></label> </th>
										<td> <input type="text" class="regular-text" name="pageheaderbackground" id="pageheaderbackground" disabled><input type="button" value="Upload" id="pageheaderbackground_uploadBtn" disabled> <br> <span class="description"><?php _e( 'Upload a custom breadcrumb background image for page header section.', 'fgymm' ); ?></span> <br> </td>
									</tr>
								</tbody>
							</table>
						
						</div>
						
						<?php fgymm_display_hidden_fields($active_tab); ?>
						
						<p class="submit">  
							<a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Get tGymm Theme', 'fgymm' ); ?>" class="button-primary"><?php _e( 'Get tGymm Theme', 'fgymm' ); ?></a>   <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'fgymm' ) ?>" />  
						</p>
<?php						
					elseif ( $active_tab == 'tab_footer' ) :

						settings_fields( 'fgymm_footer_settings' );
						do_settings_sections( 'fgymm_footer_settings' );
?>						
						<div style="background-color:#CCCCCC;padding:10px;">
							<div>
								<?php _e( 'These options are available in the full version only.', 'fgymm' ); ?> <a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Click Here', 'fgymm' ); ?>"><?php _e( 'Click Here', 'fgymm' ); ?></a> <?php _e( 'to get the full version of tGymm theme.', 'fgymm' ); ?>
							</div>
							
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"> <label for="columnsnumber"><?php _e( 'Number of Columns', 'fgymm' ); ?></label> </th>
										<td>
											<select name="columnsnumber" id="columnsnumber" disabled>
												<option value="none" style="padding-right: 10px;"><?php _e( 'none', 'fgymm' ); ?></option>
												<option value="1" style="padding-right: 10px;"><?php _e( '1', 'fgymm' ); ?></option>
												<option value="2" style="padding-right: 10px;"><?php _e( '2', 'fgymm' ); ?></option>
												<option value="3" style="padding-right: 10px;"><?php _e( '3', 'fgymm' ); ?></option>
												<option selected="selected" value="4" style="padding-right: 10px;"><?php _e( '4', 'fgymm' ); ?></option>
											</select>
											<br> <span class="description"><?php _e( 'Select number of columns to display in the website footer', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"> <label for="displaysocial"><?php _e( 'Display Social Icons', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" checked="checked" value="1" name="displaysocial" id="displaysocial" disabled> <br> <span class="description"><?php _e( 'Display social icons in the website footer', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="opensocialnewwindow"><?php _e( 'Open Social Icons in a new window', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" checked="checked" value="1" name="opensocialnewwindow" id="opensocialnewwindow" disabled> <br> <span class="description"><?php _e( 'Open social icons links in a new window', 'fgymm' ); ?></span> </td>
									</tr>
								</tbody>
							</table>

						</div>
						
						<?php fgymm_display_hidden_fields($active_tab); ?>
						
						<p class="submit">  
							<a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Get tGymm Theme', 'fgymm' ); ?>" class="button-primary"><?php _e( 'Get tGymm Theme', 'fgymm' ); ?></a>   <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'fgymm' ) ?>" />  
						</p>
<?php

					elseif ($active_tab == 'tab_homepage' ) :
?>				
						<h3><?php _e( 'Home Page Settings', 'fgymm' ); ?></h3>				
						<div style="background-color:#CCCCCC;padding:10px;">			
							<div>
								<?php _e( 'These options are available in the full version only.', 'fgymm' ); ?> <a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Click Here', 'fgymm' ); ?>"><?php _e( 'Click Here', 'fgymm' ); ?></a> <?php _e( 'to get the full version of tGymm theme.', 'fgymm' ); ?>
							</div>
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"> <label for="displayslider"><?php _e( 'Display Slider', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" checked="checked" value="1" name="displayslider" id="displayslider" disabled> <br> <span class="description"><?php _e( 'Display slider in your website home page', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="displaylatestposts"><?php _e( 'Display Latest Posts', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" checked="checked" value="1" name="displaylatestposts" id="displaylatestposts" disabled> <br> <span class="description"><?php _e( 'Display latest posts in your website home page', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="displaysidebar"><?php _e( 'Display Sidebar', 'fgymm' ); ?></label> </th>
										<td> <input type="checkbox" checked="checked" value="1" name="displaysidebar" id="displaysidebar" disabled> <br> <span class="description"><?php _e( 'Display sidebar in your website home page', 'fgymm' ); ?></span> </td>
									</tr>
									<tr>
										<th scope="row"> <label for="columnsnumber"><?php _e( 'Number of Columns', 'fgymm' ); ?></label> </th>
										<td>
											<select name="columnsnumber" id="columnsnumber" disabled>
												<option value="none" style="padding-right: 10px;"><?php _e( 'none', 'fgymm' ); ?></option>
												<option value="1" style="padding-right: 10px;"><?php _e( '1', 'fgymm' ); ?></option>
												<option value="2" style="padding-right: 10px;"><?php _e( '2', 'fgymm' ); ?></option>
												<option value="3" style="padding-right: 10px;"><?php _e( '3', 'fgymm' ); ?></option>
												<option selected="selected" value="4" style="padding-right: 10px;"><?php _e( '4', 'fgymm' ); ?></option>
											</select>
											<br> <span class="description"><?php _e( 'Select number of columns to display in the website homepage', 'fgymm' ); ?></span> 
										</td>
									</tr>
								</tbody>
							</table>
						
						</div>
						
						<p class="submit">  
							<a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Get tGymm Theme', 'fgymm' ); ?>" class="button-primary"><?php _e( 'Get tGymm Theme', 'fgymm' ); ?></a>  
						</p>
<?php						
					elseif ($active_tab == 'tab_slider' ) :

						settings_fields( 'fgymm_slider_settings' );
						do_settings_sections( 'fgymm_slider_settings' );					
?>

						<div style="background-color:#CCCCCC;padding:10px;">
						
							<div>
								<?php _e( 'Full Slider options are available in the full version only.', 'fgymm' ); ?> <a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Click Here', 'fgymm' ); ?>"><?php _e( 'Click Here', 'fgymm' ); ?></a> <?php _e( 'to get the full version of tGymm theme.', 'fgymm' ); ?>
							</div>
							
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"><label for="displayslide1"><?php _e( 'Display Slide #1', 'fgymm' ); ?></label></th>
										<td><input disabled type="checkbox" checked="checked" value="1" name="displayslide1" id="displayslide1"><br><span class="description"><?php _e( 'Display slide #1 in the slider', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide1_title"><?php printf( __( 'Slide #%s Title', 'fgymm' ), 1 ); ?></label></th>
										<td><input disabled type="text" value="Lorem ipsum dolor" name="slide1_title" id="slide1_title" class="regular-text"><br><span class="description"><?php printf( __( 'Slide #%s Title in the slider', 'fgymm' ), 1 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide1_text"><?php printf( __( 'Slide #%s Text', 'fgymm' ), 1 ); ?></label></th>
										<td><textarea disabled name="slide1_text" id="slide1_text" cols="50" rows="4"><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'fgymm' ); ?></textarea><br><span class="description"><?php printf( __( 'Slide #%s Text in the slider', 'fgymm' ), 1 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide1_url"><?php printf( __( 'Slide #%s URL', 'fgymm' ), 1 ); ?></label></th>
										<td><input disabled type="text" value="#" name="slide1_url" id="slide1_url" class="regular-text"><br><span class="description"><?php printf( __( 'Slide #%s URL in the slider', 'fgymm' ), 1 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide1_image"><?php printf( __( 'Slide #%s Background Image', 'fgymm' ), 1 ); ?></label></th>
										<td><input disabled type="text" class="regular-text" value="fgymm/images/slider/1.jpg" name="slide1_image" id="slide1_image"><input disabled type="button" value="<?php _e( 'Upload', 'fgymm' ); ?>" id="slide1_image_uploadBtn"><br><span class="description"><?php printf( __( 'Upload a custom Slide #%s Background image for the slider.', 'fgymm' ), 1 ); ?></span><br>			  
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="displayslide2"><?php _e( 'Display Slide #2', 'fgymm' ); ?></label></th>
										<td><input disabled type="checkbox" checked="checked" value="1" name="displayslide2" id="displayslide2"><br><span class="description"><?php _e( 'Display slide #2 in the slider', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide2_title"><?php printf( __( 'Slide #%s Title', 'fgymm' ), 2 ); ?></label></th>
										<td><input disabled type="text" value="Everti Constituam" name="slide2_title" id="slide2_title" class="regular-text"><br><span class="description"><?php printf( __( 'Slide #%s Title in the slider', 'fgymm' ), 2 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide2_text"><?php printf( __( 'Slide #%s Text', 'fgymm' ), 2 ); ?></label></th>
										<td><textarea disabled name="slide2_text" id="slide2_text" cols="50" rows="4"><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'fgymm' ); ?></textarea><br><span class="description"><?php printf( __( 'Slide #%s Text in the slider', 'fgymm' ), 2 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide2_url"><?php printf( __( 'Slide #%s URL', 'fgymm' ), 2 ); ?></label></th>
										<td><input disabled type="text" value="#" name="slide2_url" id="slide2_url" class="regular-text"><br><span class="description"><?php printf( __( 'Slide #%s URL in the slider', 'fgymm' ), 2 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide2_image"><?php printf( __( 'Slide #%s Background Image', 'fgymm' ), 2 ); ?></label></th>
										<td><input disabled type="text" class="regular-text" value="fgymm/images/slider/2.jpg" name="slide2_image" id="slide2_image"><input disabled type="button" value="<?php _e( 'Upload', 'fgymm' ); ?>" id="slide2_image_uploadBtn"><br><span class="description"><?php printf( __( 'Upload a custom Slide #%s Background image for the slider.', 'fgymm' ), 2 ); ?></span><br>
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="displayslide3"><?php _e( 'Display Slide #3', 'fgymm' ); ?></label></th>
										<td><input disabled type="checkbox" checked="checked" value="1" name="displayslide3" id="displayslide3"><br><span class="description"><?php _e( 'Display slide #3 in the slider', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide3_title"><?php printf( __( 'Slide #%s Title', 'fgymm' ), 3 ); ?></label></th>
										<td><input disabled type="text" value="Id Essent Cetero" name="slide3_title" id="slide3_title" class="regular-text"><br><span class="description"><?php printf( __( 'Slide #%s Title in the slider', 'fgymm' ), 3 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide3_text"><?php printf( __( 'Slide #%s Text', 'fgymm' ), 3 ); ?></label></th>
										<td><textarea disabled name="slide3_text" id="slide3_text" cols="50" rows="4"><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'fgymm' ); ?></textarea><br><span class="description"><?php printf( __( 'Slide #%s Text in the slider', 'fgymm' ), 3 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide3_url"><?php printf( __( 'Slide #%s URL', 'fgymm' ), 3 ); ?></label></th>
										<td><input disabled type="text" value="#" name="slide3_url" id="slide3_url" class="regular-text"><br><span class="description"><?php printf( __( 'Slide #%s URL in the slider', 'fgymm' ), 3 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide3_image"><?php printf( __( 'Slide #%s Background Image', 'fgymm' ), 3 ); ?></label></th>
										<td><input disabled type="text" class="regular-text" value="fgymm/images/slider/3.jpg" name="slide3_image" id="slide3_image"><input disabled type="button" value="<?php _e( 'Upload', 'fgymm' ); ?>" id="slide3_image_uploadBtn"><br><span class="description"><?php printf( __( 'Upload a custom Slide #%s Background image for the slider.', 'fgymm' ), 3 ); ?></span><br>
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="displayslide4"><?php _e( 'Display Slide #4', 'fgymm' ); ?></label></th>
										<td><input disabled type="checkbox" checked="checked" value="1" name="displayslide4" id="displayslide4"><br><span class="description"><?php _e( 'Display slide #4 in the slider', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide4_title"><?php printf( __( 'Slide #%s Title', 'fgymm' ), 4 ); ?></label></th>
										<td><input disabled type="text" value="Nostrud Cotidieque Et" name="slide4_title" id="slide4_title" class="regular-text"><br><span class="description"><?php printf( __( 'Slide #%s Title in the slider', 'fgymm' ), 4 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide4_text"><?php printf( __( 'Slide #%s Text', 'fgymm' ), 4 ); ?></label></th>
										<td><textarea disabled name="slide4_text" id="slide4_text" cols="50" rows="4"><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'fgymm' ); ?></textarea><br><span class="description"><?php printf( __( 'Slide #%s Text in the slider', 'fgymm' ), 4 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide4_url"><?php printf( __( 'Slide #%s URL', 'fgymm' ), 4 ); ?></label></th>
										<td><input disabled type="text" value="#" name="slide4_url" id="slide4_url" class="regular-text"><br><span class="description"><?php printf( __( 'Slide #%s URL in the slider', 'fgymm' ), 4 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide4_image"><?php printf( __( 'Slide #%s Background Image', 'fgymm' ), 4 ); ?></label></th>
										<td><input disabled type="text" class="regular-text" value="fgymm/images/slider/4.jpg" name="slide4_image" id="slide4_image"><input disabled type="button" value="<?php _e( 'Upload', 'fgymm' ); ?>" id="slide4_image_uploadBtn"><br><span class="description"><?php printf( __( 'Upload a custom Slide #%s Background image for the slider.', 'fgymm' ), 4 ); ?></span><br>
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="displayslide5"><?php _e( 'Display Slide #5', 'fgymm' ); ?></label></th>
										<td><input disabled type="checkbox" checked="checked" value="1" name="displayslide5" id="displayslide5"><br><span class="description"><?php _e( 'Display slide #5 in the slider', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide5_title"><?php printf( __( 'Slide #%s Title', 'fgymm' ), 5 ); ?></label></th>
										<td><input disabled type="text" value="Lorem ipsum dolor sit amet" name="slide5_title" id="slide5_title" class="regular-text"><br><span class="description"><?php printf( __( 'Slide #%s Title in the slider', 'fgymm' ), 5 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide5_text"><?php printf( __( 'Slide #%s Text', 'fgymm' ), 5 ); ?></label></th>
										<td><textarea disabled name="slide5_text" id="slide5_text" cols="50" rows="4"><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'fgymm' ); ?></textarea><br><span class="description"><?php printf( __( 'Slide #%s Text in the slider', 'fgymm' ), 5 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide5_url"><?php printf( __( 'Slide #%s URL', 'fgymm' ), 5 ); ?></label></th>
										<td><input disabled type="text" value="#" name="slide5_url" id="slide5_url" class="regular-text"><br><span class="description"><?php printf( __( 'Slide #%s URL in the slider', 'fgymm' ), 5 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="slide5_image"><?php printf( __( 'Slide #%s Background Image', 'fgymm' ), 5 ); ?></label></th>
										<td><input disabled type="text" class="regular-text" value="fgymm/images/slider/5.jpg" name="slide5_image" id="slide5_image"><input disabled type="button" value="<?php _e( 'Upload', 'fgymm' ); ?>" id="slide5_image_uploadBtn"><br><span class="description"><?php printf( __( 'Upload a custom Slide #%s Background image for the slider.', 'fgymm' ), 5 ); ?></span><br>
										</td>
									</tr>
								</tbody>
							</table>

						</div>
						
						<?php fgymm_display_hidden_fields($active_tab); ?>

						<p class="submit">  
							<a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Get tGymm Theme', 'fgymm' ); ?>" class="button-primary"><?php _e( 'Get tGymm Theme', 'fgymm' ); ?></a>   <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'fgymm' ) ?>" />  
						</p>
<?php
					elseif ($active_tab == 'tab_colors' ) :
?>					
						<h3><?php _e( 'Colors Settings', 'fgymm' ); ?></h3>
						<div style="background-color:#CCCCCC;padding:10px;">
							<div>
								<?php _e( 'These options are available in the full version only.', 'fgymm' ); ?> <a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Click Here', 'fgymm' ); ?>"><?php _e( 'Click Here', 'fgymm' ); ?></a> <?php _e( 'to get the full version of tGymm theme.', 'fgymm' ); ?>
							</div>
							
							<table class="form-table color-settings-table">
								<tbody>
									<tr>
										<th scope="row"><label for="contentbackgroundcolor"><?php _e( 'Content Background Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#ffffff" name="tgymm_settings[contentbackgroundcolor]" id="contentbackgroundcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 0px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(255, 0, 0), rgb(255, 255, 255));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"> <?php _e( 'The content background color of the website', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="textcolor"><?php _e( 'Text Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#555555" name="tgymm_settings[textcolor]" id="textcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 122.029px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(81, 0, 0), rgb(84, 84, 84));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"> <?php _e( 'The text color of the website', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="linkcolor"><?php _e( 'Link Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#556d7d" name="tgymm_settings[linkcolor]" id="linkcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 92.8878px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 73, 122), rgb(124, 124, 124));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"> <?php _e( 'The links color of the website', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="linkhovercolor"><?php _e( 'Link Hover Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#9CC7E4" name="tgymm_settings[linkhovercolor]" id="linkhovercolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 20.0346px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 134, 224), rgb(226, 226, 226));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"> <?php _e( 'The links hover color of the website', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="headingscolor"><?php _e( 'Headings Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#555555" name="tgymm_settings[headingscolor]" id="headingscolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 122.029px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(81, 0, 0), rgb(84, 84, 84));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"> <?php _e( 'The headings (h1, h2, h3) color of the website', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="buttonbackgroundgradienttop"><?php _e( 'Buttons Gradient Top Background Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#99C1D0" name="tgymm_settings[buttonbackgroundgradienttop]" id="buttonbackgroundgradienttop" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 99.1613px; top: 32.7839px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 188, 188), rgb(255, 221, 188), rgb(255, 255, 188), rgb(221, 255, 188), rgb(188, 255, 188), rgb(188, 255, 221), rgb(188, 255, 255), rgb(188, 221, 255), rgb(188, 188, 255), rgb(221, 188, 255), rgb(254, 188, 255), rgb(255, 188, 221), rgb(255, 188, 188));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 153, 209), rgb(209, 209, 209));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 26%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"> <?php _e( 'The buttons gradient top background color.', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="buttonbackgroundgradientbottom"><?php _e( 'Buttons Gradient Bottom Background Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#84A1AE" name="tgymm_settings[buttonbackgroundgradientbottom]" id="buttonbackgroundgradientbottom" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 100.679px; top: 58.2826px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 193, 193), rgb(255, 224, 193), rgb(255, 255, 193), rgb(224, 255, 193), rgb(193, 255, 193), rgb(193, 255, 224), rgb(193, 255, 255), rgb(193, 224, 255), rgb(193, 193, 255), rgb(224, 193, 255), rgb(254, 193, 255), rgb(255, 193, 224), rgb(255, 193, 193));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 118, 173), rgb(173, 173, 173));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 24%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"> <?php _e( 'The buttons gradient bottom background color.', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="headertopbackground"><?php _e( 'Header Top Box Background Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#e8e6e7" name="tgymm_settings[headertopbackground]" id="headertopbackground" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 166.955px; top: 16.392px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 249, 249), rgb(255, 252, 249), rgb(255, 255, 249), rgb(252, 255, 249), rgb(249, 255, 249), rgb(249, 255, 252), rgb(249, 255, 255), rgb(249, 252, 255), rgb(249, 249, 255), rgb(252, 249, 255), rgb(255, 249, 255), rgb(255, 249, 252), rgb(255, 249, 249));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(229, 0, 114), rgb(232, 232, 232));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 1%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website header top box background', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="headertop_textcolor"><?php _e( 'Header Top Box Text Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#5A5859" name="tgymm_settings[headertop_textcolor]" id="headertop_textcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 166.955px; top: 118.386px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 249, 249), rgb(255, 252, 249), rgb(255, 255, 249), rgb(252, 255, 249), rgb(249, 255, 249), rgb(249, 255, 252), rgb(249, 255, 255), rgb(249, 252, 255), rgb(249, 249, 255), rgb(252, 249, 255), rgb(255, 249, 255), rgb(255, 249, 252), rgb(255, 249, 249));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(86, 0, 43), rgb(89, 89, 89));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 2%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website header top box text color', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="headertop_linkcolor"><?php _e( 'Header Top Box Link Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#5A5859" name="tgymm_settings[headertop_linkcolor]" id="headertop_linkcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 166.955px; top: 118.386px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 249, 249), rgb(255, 252, 249), rgb(255, 255, 249), rgb(252, 255, 249), rgb(249, 255, 249), rgb(249, 255, 252), rgb(249, 255, 255), rgb(249, 252, 255), rgb(249, 249, 255), rgb(252, 249, 255), rgb(255, 249, 255), rgb(255, 249, 252), rgb(255, 249, 249));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(86, 0, 43), rgb(89, 89, 89));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 2%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website header top box links colors', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="headertop_linkhovercolor"><?php _e( 'Header Top Box Link Hover Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#9CC7E4" name="tgymm_settings[headertop_linkhovercolor]" id="headertop_linkhovercolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 20.0346px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 134, 224), rgb(226, 226, 226));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website header top box links colors on hover', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="headertopsubcontentbackground"><?php _e( 'Header top Box Sub-Content Background Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#323236" name="tgymm_settings[headertopsubcontentbackground]" id="headertopsubcontentbackground" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 121.422px; top: 143.885px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 234, 234), rgb(255, 244, 234), rgb(255, 255, 234), rgb(244, 255, 234), rgb(234, 255, 234), rgb(234, 255, 244), rgb(234, 255, 255), rgb(234, 244, 255), rgb(234, 234, 255), rgb(244, 234, 255), rgb(255, 234, 255), rgb(255, 234, 244), rgb(255, 234, 234));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 0, 51), rgb(53, 53, 53));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 7%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website header top box subcontent background', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="headertopsubcontent_textcolor"><?php _e( 'Header top Box Sub-Content Text Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#d5d1c4" name="tgymm_settings[headertopsubcontent_textcolor]" id="headertopsubcontent_textcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 23.2726px; top: 29.1413px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 234, 234), rgb(255, 244, 234), rgb(255, 255, 234), rgb(244, 255, 234), rgb(234, 255, 234), rgb(234, 255, 244), rgb(234, 255, 255), rgb(234, 244, 255), rgb(234, 234, 255), rgb(244, 234, 255), rgb(255, 234, 255), rgb(255, 234, 244), rgb(255, 234, 234));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(214, 164, 0), rgb(214, 214, 214));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 8%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website header top box subcontent text color', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="headertopsubcontent_linkcolor"><?php _e( 'Header top Box Sub-Content Link Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#b8c7bf" name="tgymm_settings[headertopsubcontent_linkcolor]" id="headertopsubcontent_linkcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 74.8769px; top: 40.0693px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 234, 234), rgb(255, 244, 234), rgb(255, 255, 234), rgb(244, 255, 234), rgb(234, 255, 234), rgb(234, 255, 244), rgb(234, 255, 255), rgb(234, 244, 255), rgb(234, 234, 255), rgb(244, 234, 255), rgb(255, 234, 255), rgb(255, 234, 244), rgb(255, 234, 234));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 198, 92), rgb(198, 198, 198));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 8%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website header top box subcontent links colors', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="headertopsubcontent_linkhovercolor"><?php _e( 'Header top Sub-Content Box Link Hover Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#9CC7E4" name="tgymm_settings[headertopsubcontent_linkhovercolor]" id="headertopsubcontent_linkhovercolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 20.0346px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 134, 224), rgb(226, 226, 226));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website header top box subcontent links colors on hover', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="headerbackground"><?php _e( 'Header Background Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#ffffff" name="tgymm_settings[headerbackground]" id="headerbackground" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 0px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(255, 0, 0), rgb(255, 255, 255));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website header background', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="pageheader_textcolor"><?php _e( 'Page Header Text Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#5a5859" name="tgymm_settings[pageheader_textcolor]" id="pageheader_textcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 166.955px; top: 118.386px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 249, 249), rgb(255, 252, 249), rgb(255, 255, 249), rgb(252, 255, 249), rgb(249, 255, 249), rgb(249, 255, 252), rgb(249, 255, 255), rgb(249, 252, 255), rgb(249, 249, 255), rgb(252, 249, 255), rgb(255, 249, 255), rgb(255, 249, 252), rgb(255, 249, 249));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(86, 0, 43), rgb(89, 89, 89));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 2%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website page header text color', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="pageheader_linkcolor"><?php _e( 'Page Header Link Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#556d7d" name="tgymm_settings[pageheader_linkcolor]" id="pageheader_linkcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 92.8878px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 73, 122), rgb(124, 124, 124));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website page header link color', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="pageheader_linkhovercolor"><?php _e( 'Page Header Link Hover Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#9CC7E4" name="tgymm_settings[pageheader_linkhovercolor]" id="pageheader_linkhovercolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 20.0346px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 134, 224), rgb(226, 226, 226));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website page header link color on hover', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="menutextcolor"><?php _e( 'Menu Text Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#556D7D" name="tgymm_settings[menutextcolor]" id="menutextcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 92.8878px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 73, 122), rgb(124, 124, 124));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website main menu text', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="menudropdownbordercolor"><?php _e( 'Menu Drop Down Border Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#f8f6f7" name="tgymm_settings[menudropdownbordercolor]" id="menudropdownbordercolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 166.955px; top: 5.46399px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 249, 249), rgb(255, 252, 249), rgb(255, 255, 249), rgb(252, 255, 249), rgb(249, 255, 249), rgb(249, 255, 252), rgb(249, 255, 255), rgb(249, 252, 255), rgb(249, 249, 255), rgb(252, 249, 255), rgb(255, 249, 255), rgb(255, 249, 252), rgb(255, 249, 249));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(244, 0, 122), rgb(247, 247, 247));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 1%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website main menu drop down border', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="menudropdownbackgroundcolor"><?php _e( 'Menu Drop Down Background Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#f8f6f7" name="tgymm_settings[menudropdownbackgroundcolor]" id="menudropdownbackgroundcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 166.955px; top: 5.46399px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 249, 249), rgb(255, 252, 249), rgb(255, 255, 249), rgb(252, 255, 249), rgb(249, 255, 249), rgb(249, 255, 252), rgb(249, 255, 255), rgb(249, 252, 255), rgb(249, 249, 255), rgb(252, 249, 255), rgb(255, 249, 255), rgb(255, 249, 252), rgb(255, 249, 249));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(244, 0, 122), rgb(247, 247, 247));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 1%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Background color to appear in the website main menu drop down', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="menuhoverbackground"><?php _e( 'Menu Hover Background Color (Large Resolution)', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#757575" name="tgymm_settings[menuhoverbackground]" id="menuhoverbackground" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 98.3518px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(117, 0, 0), rgb(117, 117, 117));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Background color to appear in the website main menu on hover', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="menuhovertextcolor"><?php _e( 'Menu Text Hover Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#FFFFFF" name="tgymm_settings[menuhovertextcolor]" id="menuhovertextcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 0px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(255, 0, 0), rgb(255, 255, 255));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website main menu text on hover', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="footerbackground"><?php _e( 'Footer Background Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#ffffff" name="tgymm_settings[footerbackground]" id="footerbackground" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 0px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(255, 0, 0), rgb(255, 255, 255));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website footer background', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="footertextcolor"><?php _e( 'Footer Text Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#555555" name="tgymm_settings[footertextcolor]" id="footertextcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 122.029px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(81, 0, 0), rgb(84, 84, 84));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website footer text', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="footerlinkcolor"><?php _e( 'Footer Link Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#556d7d" name="tgymm_settings[footerlinkcolor]" id="footerlinkcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 92.8878px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 73, 122), rgb(124, 124, 124));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website footer links', 'fgymm' ); ?></span> 
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="footerlinkhovercolor"><?php _e( 'Footer Link Hover Color', 'fgymm' ); ?></label></th>
										<td>
											<div class="wp-picker-container">
												<span class="wp-picker-input-wrap"><input type="text" value="#9cc7e4" name="tgymm_settings[footerlinkhovercolor]" id="footerlinkhovercolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span>
												<div class="wp-picker-holder">
													<div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;">
														<div class="iris-picker-inner">
															<div class="iris-square" style="width: 182.125px; height: 182.125px;">
																<a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 20.0346px;"><span class="iris-square-handle ui-slider-handle"></span></a>
																<div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div>
																<div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div>
															</div>
															<div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 134, 224), rgb(226, 226, 226));">
																<div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div>
															</div>
														</div>
														<div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div>
													</div>
												</div>
											</div>
											<br><span class="description"><?php _e( 'Color to appear in the website footer links on hover', 'fgymm' ); ?></span>
										</td>
									</tr>
								</tbody>
							</table>
							
							
						</div>
						<p class="submit">  
							<a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Get tGymm Theme', 'fgymm' ); ?>" class="button-primary"><?php _e( 'Get tGymm Theme', 'fgymm' ); ?></a>
						</p>
<?php
					elseif ($active_tab == 'tab_social' ) :

						settings_fields( 'fgymm_social_settings' );
						do_settings_sections( 'fgymm_social_settings' );
?>
						<div style="background-color:#CCCCCC;padding:10px;">
						
							<div>
								<?php _e( 'These options are available in the full version only.', 'fgymm' ); ?> <a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Click Here', 'fgymm' ); ?>"><?php _e( 'Click Here', 'fgymm' ); ?></a> <?php _e( 'to get the full version of tGymm theme.', 'fgymm' ); ?>
							</div>
							
							<table class="form-table">
								<tbody>
									<tr>
									<tr>
										<th scope="row"><label for="twitter"><?php _e( 'Twitter', 'fgymm' ); ?></label></th>
										<td><input disabled type="text" value="https://twitter.com" name="twitter" id="twitter" class="regular-text"><br><span class="description"><?php _e( 'Place your Twitter page url and the Twitter icon will appear. To remove it, just leave it blank.', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="linkedin"><?php _e( 'LinkedIn', 'fgymm' ); ?></label></th>
										<td><input disabled type="text" value="http://www.linkedin.com/" name="linkedin" id="linkedin" class="regular-text"><br><span class="description"><?php _e( 'Place your LinkedIn page url and the LinkedIn icon will appear. To remove it, just leave it blank.', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="instagram"><?php _e( 'Instagram', 'fgymm' ); ?></label></th>
										<td><input disabled type="text" value="http://instagram.com" name="instagram" id="instagram" class="regular-text"><br><span class="description"><?php _e( 'Place your Instagram page url and the Instagram icon will appear. To remove it, just leave it blank.', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="tumblr"><?php _e( 'Tumblr', 'fgymm' ); ?></label></th>
										<td><input disabled type="text" value="https://www.tumblr.com/" name="tumblr" id="tumblr" class="regular-text"><br><span class="description"><?php _e( 'Place your Tumblr page url and the Tumblr icon will appear. To remove it, just leave it blank.', 'fgymm' ); ?></span></td>
									</tr>
								</tbody>
							</table>
						</div>
						
						<?php fgymm_display_hidden_fields($active_tab); ?>

						<p class="submit">  
							<a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Get tGymm Theme', 'fgymm' ); ?>" class="button-primary"><?php _e( 'Get tGymm Theme', 'fgymm' ); ?></a>   <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'fgymm' ) ?>" />  
						</p>
<?php
					elseif ( $active_tab == 'tab_lightbox' ) :
?>
						<h3><?php _e( 'Lightbox Settings', 'fgymm' ); ?></h3>

						<div style="background-color:#CCCCCC;padding:10px;">
							<div>
								<?php _e( 'These options are available in the full version only.', 'fgymm' ); ?> <a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Click Here', 'fgymm' ); ?>"><?php _e( 'Click Here', 'fgymm' ); ?></a> <?php _e( 'to get the full version of tGymm theme.', 'fgymm' ); ?>
							</div>
							
							<table class="form-table"><tbody><tr><th scope="row"><label for="enablelightbox"><?php _e( 'Enable Lightbox Functionality', 'fgymm' ); ?></label></th><td><input disabled type="checkbox" name="enablelightbox" id="enablelightbox"><br><span class="description"><?php _e( 'Globally Enable Lightbox functionality', 'fgymm' ); ?></span></td></tr><tr><th scope="row"><label for="enableonhomepage"><?php _e( 'Enable on Home Page', 'fgymm' ); ?></label></th><td><input disabled type="checkbox" name="enableonhomepage" id="enableonhomepage"><br><span class="description"><?php _e( 'Enable Lightbox on Home Page of your website', 'fgymm' ); ?></span></td></tr><tr><th scope="row"><label for="enableonindexpage"><?php _e( 'Enable on Blog Index Page', 'fgymm' ); ?></label></th><td><input disabled type="checkbox" name="enableonindexpage" id="enableonindexpage"><br><span class="description"><?php _e( 'Enable Lightbox on blog posts index page of your website', 'fgymm' ); ?></span></td></tr><tr><th scope="row"><label for="enableonposts"><?php _e( 'Enable on Posts', 'fgymm' ); ?></label></th><td><input disabled type="checkbox" name="enableonposts" id="enableonposts"><br><span class="description"><?php _e( 'Enable Lightbox on Posts', 'fgymm' ); ?></span></td></tr><tr><th scope="row"><label for="enableonpages"><?php _e( 'Enable on Pages', 'fgymm' ); ?></label></th><td><input disabled type="checkbox" name="enableonpages" id="enableonpages"><br><span class="description"><?php _e( 'Enable Lightbox on Pages', 'fgymm' ); ?></span></td></tr><tr><th scope="row"><label for="enableonarchives"><?php _e( 'Enable on Archive', 'fgymm' ); ?></label></th><td><input disabled type="checkbox" name="enableonarchives" id="enableonarchives"><br><span class="description"><?php _e( 'Enable Lightbox on Archive Pages (categories, tags, etc.)', 'fgymm' ); ?></span></td></tr><tr><th scope="row"><label for="groupitems"><?php _e( 'Group Items', 'fgymm' ); ?></label></th><td><input disabled type="checkbox" name="groupitems" id="groupitems"><br><span class="description"><?php _e( 'Group Items (for displaying as a slideshow)', 'fgymm' ); ?></span></td></tr></tbody></table>
						</div>
						<p class="submit">  
							<a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Get tGymm Theme', 'fgymm' ); ?>" class="button-primary"><?php _e( 'Get tGymm Theme', 'fgymm' ); ?></a>  
						</p>
<?php						
					elseif ( $active_tab == 'tab_thumbnails' ) :
?>
						<h3><?php _e( 'Thumbnails Settings', 'fgymm' ); ?></h3>
						
						<div style="background-color:#CCCCCC;padding:10px;">
							<div>
								<?php _e( 'These options are available in the full version only.', 'fgymm' ); ?> <a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Click Here', 'fgymm' ); ?>"><?php _e( 'Click Here', 'fgymm' ); ?></a> <?php _e( 'to get the full version of tGymm theme.', 'fgymm' ); ?>
							</div>
							
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"><label for="thumbnails_enablethumbnails"><?php _e( 'Enable', 'fgymm' ); ?> <?php _e( 'Thumbnails Functionality', 'fgymm' ); ?></label></th>
										<td><input disabled type="checkbox" checked="checked" value="1" name="thumbnails_enablethumbnails" id="thumbnails_enablethumbnails"><br><span class="description"><?php _e( 'Globally Enable Thumbnails functionality', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="thumbnails_size"><?php _e( 'Display Image Size in Index Pages', 'fgymm' ); ?></label></th>
										<td>
											<select disabled name="thumbnails_size" id="thumbnails_size">
												<option value="none" style="padding-right: 10px;"><?php _e( 'none', 'fgymm' ); ?></option>
												<option value="thumbnail" style="padding-right: 10px;"><?php _e( 'thumbnail', 'fgymm' ); ?></option>
												<option value="medium" style="padding-right: 10px;"><?php _e( 'medium', 'fgymm' ); ?></option>
												<option value="large" style="padding-right: 10px;"><?php _e( 'large', 'fgymm' ); ?></option>
												<option selected="selected" value="full" style="padding-right: 10px;"><?php _e( 'full', 'fgymm' ); ?></option>
											</select>
											<br><span class="description"><?php _e( 'Select display thumbnail image size in Index Pages', 'fgymm' ); ?></span>
										</td>
									</tr>
									<tr>
										<th scope="row"><label for="thumbnails_linkthumbnails"><?php _e( 'Link Thumbnails', 'fgymm' ); ?></label></th>
										<td><input disabled type="checkbox" checked="checked" value="1" name="thumbnails_linkthumbnails" id="thumbnails_linkthumbnails"><br><span class="description"><?php _e( 'Link Thumbnails to Single Post URLs', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="thumbnails_displayinsingle"><?php _e( 'Display in Single Post', 'fgymm' ); ?></label></th>
										<td><input disabled type="checkbox" checked="checked" value="1" name="thumbnails_displayinsingle" id="thumbnails_displayinsingle"><br><span class="description"><?php _e( 'Display Thumbnail in Single Post', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="thumbnails_sizeinsinglepost"><?php _e( 'Display Image Size in Single Post', 'fgymm' ); ?></label></th>
										<td>
											<select disabled name="thumbnails_sizeinsinglepost" id="thumbnails_sizeinsinglepost">
												<option value="none" style="padding-right: 10px;"><?php _e( 'none', 'fgymm' ); ?></option>
												<option value="thumbnail" style="padding-right: 10px;"><?php _e( 'thumbnail', 'fgymm' ); ?></option>
												<option value="medium" style="padding-right: 10px;"><?php _e( 'medium', 'fgymm' ); ?></option>
												<option value="large" style="padding-right: 10px;"><?php _e( 'large', 'fgymm' ); ?></option>
												<option selected="selected" value="full" style="padding-right: 10px;"><?php _e( 'full', 'fgymm' ); ?></option>
											</select>
											<br><span class="description"><?php _e( 'Select display thumbnail image size in Single Post', 'fgymm' ); ?></span>
										</td>
									</tr>
								</tbody>
							</table>
						
						</div>
						
						<p class="submit">  
							<a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Get tGymm Theme', 'fgymm' ); ?>" class="button-primary"><?php _e( 'Get tGymm Theme', 'fgymm' ); ?></a>
						</p>
<?php						
					elseif ( $active_tab == 'tab_contacts' ) :
?>
						<h3><?php _e( 'Contacts Settings', 'fgymm' ); ?></h3>
						
						<div style="background-color:#CCCCCC;padding:10px;">
							<div>
								<?php _e( 'These options are available in the full version only.', 'fgymm' ); ?> <a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Click Here', 'fgymm' ); ?>"><?php _e( 'Click Here', 'fgymm' ); ?></a> <?php _e( 'to get the full version of tGymm theme.', 'fgymm' ); ?>
							</div>
							
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"><label for="googlemapcenterlatitude"><?php _e( 'Center Google Map Latitude', 'fgymm' ); ?></label></th>
										<td><input disabled type="text" value="40.764229" name="googlemapcenterlatitude" id="googlemapcenterlatitude" class="regular-text"><br><span class="description"><?php _e( 'The latitude of the center of the google map in contact pages.', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="googlemapcenterlongitude"><?php _e( 'Center Google Map Longitude', 'fgymm' ); ?></label></th>
										<td><input disabled type="text" value="-73.948134" name="googlemapcenterlongitude" id="googlemapcenterlongitude" class="regular-text"><br><span class="description"><?php _e( 'The longitude of the center of the google map in contact pages.', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office1_name"><?php printf( __( 'Office #%s Name', 'fgymm' ), 1 ); ?></label></th>
										<td><input disabled type="text" value="Office No. 1" name="office1_name" id="office1_name" class="regular-text"><br><span class="description"><?php printf( __( 'The display name of office #%s', 'fgymm' ), 1 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office1_latitude"><?php printf( __( 'Office #%s Latitude', 'fgymm' ), 1 ); ?></label></th>
										<td><input disabled type="text" value="40.764229" name="office1_latitude" id="office1_latitude" class="regular-text"><br><span class="description"><?php printf( __( 'The latitude coordinate of office #%s', 'fgymm' ), 1 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office1_longitude"><?php printf( __( 'Office #%s Longitude', 'fgymm' ), 1 ); ?></label></th>
										<td><input disabled type="text" value="-73.948134" name="office1_longitude" id="office1_longitude" class="regular-text"><br><span class="description"><?php printf( __( 'The longitude coordinate of office #%s', 'fgymm' ), 1 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office1_address"><?php printf( __( 'Office #%s Address', 'fgymm' ), 1 ); ?></label></th>
										<td><input disabled type="text" value="1111 Main Street Anytown, USA" name="office1_address" id="office1_address" class="regular-text"><br><span class="description"><?php printf( __( 'The address of office #%s', 'fgymm' ), 1 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office1_phone"><?php printf( __( 'Office #%s Phone', 'fgymm' ), 1 ); ?></label></th>
										<td><input disabled type="text" value="1.111.111.111" name="office1_phone" id="office1_phone" class="regular-text"><br><span class="description"><?php printf( __( 'The phone of office #%s', 'fgymm' ), 1 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office1_email"><?php printf( __( 'Office #%s Email', 'fgymm' ), 1 ); ?></label></th>
										<td><input disabled type="text" value="office1@example.com" name="office1_email" id="office1_email" class="regular-text"><br><span class="description"><?php printf( __( 'The email of office #%s', 'fgymm' ), 1 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office2_name"><?php printf( __( 'Office #%s Name', 'fgymm' ), 2 ); ?></label></th>
										<td><input disabled type="text" value="Office No. 2" name="office2_name" id="office2_name" class="regular-text"><br><span class="description"><?php printf( __( 'The display name of office #%s', 'fgymm' ), 2 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office2_latitude"><?php printf( __( 'Office #%s Latitude', 'fgymm' ), 2 ); ?></label></th>
										<td><input disabled type="text" value="40.801375" name="office2_latitude" id="office2_latitude" class="regular-text"><br><span class="description"><?php printf( __( 'The latitude coordinate of office #%s', 'fgymm' ), 2 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office2_longitude"><?php printf( __( 'Office #%s Longitude', 'fgymm' ), 2 ); ?></label></th>
										<td><input disabled type="text" value="-74.051721" name="office2_longitude" id="office2_longitude" class="regular-text"><br><span class="description"><?php printf( __( 'The longitude coordinate of office #%s', 'fgymm' ), 2 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office2_address"><?php printf( __( 'Office #%s Address', 'fgymm' ), 2 ); ?></label></th>
										<td><input disabled type="text" value="2222 Main Street Anytown, USA" name="office2_address" id="office2_address" class="regular-text"><br><span class="description"><?php printf( __( 'The address of office #%s', 'fgymm' ), 2 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office2_phone"><?php printf( __( 'Office #%s Phone', 'fgymm' ), 2 ); ?></label></th>
										<td><input disabled type="text" value="1.222.222.222" name="office2_phone" id="office2_phone" class="regular-text"><br><span class="description"><?php printf( __( 'The phone of office #%s', 'fgymm' ), 2 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office2_email"><?php printf( __( 'Office #%s Email', 'fgymm' ), 2 ); ?></label></th>
										<td><input disabled type="text" value="office2@example.com" name="office2_email" id="office2_email" class="regular-text"><br><span class="description"><?php printf( __( 'The email of office #%s', 'fgymm' ), 2 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office3_name"><?php printf( __( 'Office #%s Name', 'fgymm' ), 3 ); ?></label></th>
										<td><input disabled type="text" value="Office No. 3" name="office3_name" id="office3_name" class="regular-text"><br><span class="description"><?php printf( __( 'The display name of office #%s', 'fgymm' ), 3 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office3_latitude"><?php printf( __( 'Office #%s Latitude', 'fgymm' ), 3 ); ?></label></th>
										<td><input disabled type="text" value="40.738062" name="office3_latitude" id="office3_latitude" class="regular-text"><br><span class="description"><?php printf( __( 'The latitude coordinate of office #%s', 'fgymm' ), 3 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office3_longitude"><?php printf( __( 'Office #%s Longitude', 'fgymm' ), 3 ); ?></label></th>
										<td><input disabled type="text" value="-74.132916" name="office3_longitude" id="office3_longitude" class="regular-text"><br><span class="description"><?php printf( __( 'The longitude coordinate of office #%s', 'fgymm' ), 3 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office3_address"><?php printf( __( 'Office #%s Address', 'fgymm' ), 3 ); ?></label></th>
										<td><input disabled type="text" value="3333 Main Street Anytown, USA" name="office3_address" id="office3_address" class="regular-text"><br><span class="description"><?php printf( __( 'The address of office #%s', 'fgymm' ), 3 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office3_phone"><?php printf( __( 'Office #%s Phone', 'fgymm' ), 3 ); ?></label></th>
										<td><input disabled type="text" value="1.333.333.333" name="office3_phone" id="office3_phone" class="regular-text"><br><span class="description"><?php printf( __( 'The phone of office #%s', 'fgymm' ), 3 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office3_email"><?php printf( __( 'Office #%s Email', 'fgymm' ), 3 ); ?></label></th>
										<td><input disabled type="text" value="office3@example.com" name="office3_email" id="office3_email" class="regular-text"><br><span class="description"><?php printf( __( 'The email of office #%s', 'fgymm' ), 3 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office4_name"><?php printf( __( 'Office #%s Name', 'fgymm' ), 4 ); ?></label></th>
										<td><input disabled type="text" value="Office No. 4" name="office4_name" id="office4_name" class="regular-text"><br><span class="description"><?php printf( __( 'The display name of office #%s', 'fgymm' ), 4 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office4_latitude"><?php printf( __( 'Office #%s Latitude', 'fgymm' ), 4 ); ?></label></th>
										<td><input disabled type="text" value="40.677422" name="office4_latitude" id="office4_latitude" class="regular-text"><br><span class="description"><?php printf( __( 'The latitude coordinate of office #%s', 'fgymm' ), 4 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office4_longitude"><?php printf( __( 'Office #%s Longitude', 'fgymm' ), 4 ); ?></label></th>
										<td><input disabled type="text" value="-74.004857" name="office4_longitude" id="office4_longitude" class="regular-text"><br><span class="description"><?php printf( __( 'The longitude coordinate of office #%s', 'fgymm' ), 4 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office4_address"><?php printf( __( 'Office #%s Address', 'fgymm' ), 4 ); ?></label></th>
										<td><input disabled type="text" value="4444 Main Street Anytown, USA" name="office4_address" id="office4_address" class="regular-text"><br><span class="description"><?php printf( __( 'The address of office #%s', 'fgymm' ), 4 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office4_phone"><?php printf( __( 'Office #%s Phone', 'fgymm' ), 4 ); ?></label></th>
										<td><input disabled type="text" value="1.444.444.444" name="office4_phone" id="office4_phone" class="regular-text"><br><span class="description"><?php printf( __( 'The phone of office #%s', 'fgymm' ), 4 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office4_email"><?php printf( __( 'Office #%s Email', 'fgymm' ), 4 ); ?></label></th>
										<td><input disabled type="text" value="office4@example.com" name="office4_email" id="office4_email" class="regular-text"><br><span class="description"><?php printf( __( 'The email of office #%s', 'fgymm' ), 4 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office5_name"><?php printf( __( 'Office #%s Name', 'fgymm' ), 5 ); ?></label></th>
										<td><input disabled type="text" value="Office No. 5" name="office5_name" id="office5_name" class="regular-text"><br><span class="description"><?php printf( __( 'The display name of office #%s', 'fgymm' ), 5 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office5_latitude"><?php printf( __( 'Office #%s Latitude', 'fgymm' ), 5 ); ?></label></th>
										<td><input disabled type="text" value="40.685884" name="office5_latitude" id="office5_latitude" class="regular-text"><br><span class="description"><?php printf( __( 'The latitude coordinate of office #%s', 'fgymm' ), 5 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office5_longitude"><?php printf( __( 'Office #%s Longitude', 'fgymm' ), 5 ); ?></label></th>
										<td><input disabled type="text" value="-73.812596" name="office5_longitude" id="office5_longitude" class="regular-text"><br><span class="description"><?php printf( __( 'The longitude coordinate of office #%s', 'fgymm' ), 5 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office5_address"><?php printf( __( 'Office #%s Address', 'fgymm' ), 5 ); ?></label></th>
										<td><input disabled type="text" value="5555 Main Street Anytown, USA" name="office5_address" id="office5_address" class="regular-text"><br><span class="description"><?php printf( __( 'The address of office #%s', 'fgymm' ), 5 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office5_phone"><?php printf( __( 'Office #%s Phone', 'fgymm' ), 5 ); ?></label></th>
										<td><input disabled type="text" value="1.555.555.555" name="office5_phone" id="office5_phone" class="regular-text"><br><span class="description"><?php printf( __( 'The phone of office #%s', 'fgymm' ), 5 ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="office5_email"><?php printf( __( 'Office #%s Email', 'fgymm' ), 5 ); ?></label></th>
										<td><input disabled type="text" value="office5@example.com" name="office5_email" id="office5_email" class="regular-text"><br><span class="description"><?php printf( __( 'The email of office #%s', 'fgymm' ), 5 ); ?></span></td>
									</tr>
								</tbody>
							</table>
						</div>

						<p class="submit">  
							<a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Get tGymm Theme', 'fgymm' ); ?>" class="button-primary"><?php _e( 'Get tGymm Theme', 'fgymm' ); ?></a>  
						</p>
<?php
					elseif ( $active_tab == 'tab_notfound' ) :

						settings_fields( 'fgymm_notfound_settings' );
						do_settings_sections( 'fgymm_notfound_settings' );
?>

						<?php fgymm_display_hidden_fields($active_tab); ?>

						<p class="submit">  
							<a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Get tGymm Theme', 'fgymm' ); ?>" class="button-primary"><?php _e( 'Get tGymm Theme', 'fgymm' ); ?></a>   <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'fgymm' ) ?>" />  
						</p>
<?php						
					elseif ( $active_tab == 'tab_woocommerce' ) :
?>
						<h3><?php _e( 'WooCommerce Settings', 'fgymm' ); ?></h3>
						<div style="background-color:#CCCCCC;padding:10px;">
							<div>
								<?php _e( 'These options are available in the full version only.', 'fgymm' ); ?> <a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Click Here', 'fgymm' ); ?>"><?php _e( 'Click Here', 'fgymm' ); ?></a> <?php _e( 'to get the full version of tGymm theme.', 'fgymm' ); ?>
							</div>
							
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"><label for="woocommerce_displaysidebar"><?php _e( 'Display WooCommerce Sidebar', 'fgymm' ); ?></label></th>
										<td><input type="checkbox" checked="checked" value="1" name="woocommerce_settings[woocommerce_displaysidebar]" id="woocommerce_displaysidebar" disabled><br><span class="description"><?php _e( 'Display WooCommerce sidebar in products pages', 'fgymm' ); ?></span></td>
									</tr>
									<tr>
										<th scope="row"><label for="woocommerce_productsperpage"><?php _e( 'Products per Page', 'fgymm' ); ?></label></th>
										<td><input type="number" value="10" name="woocommerce_settings[woocommerce_productsperpage]" id="woocommerce_productsperpage" pattern="\d*" class="regular-text" disabled><br><span class="description"><?php _e( 'The number of products diplayed per page', 'fgymm' ); ?></span></td>
									</tr>
								</tbody>
							</table>
						</div>
						<p class="submit">  
							<a href="<?php echo esc_url( $fullThemeUrl ); ?>" title="<?php esc_attr_e( 'Get tGymm Theme', 'fgymm' ); ?>" class="button-primary"><?php _e( 'Get tGymm Theme', 'fgymm' ); ?></a>  
						</p>
<?php
					endif; ?>    
				</form>
    </div>
<?php
}

/**
 * Function to register the settings
 */
function fgymm_register_general_settings() {

	register_setting( 'fgymm_general_settings', 'theme_fgymm_options', 'fgymm_general_sanitize_callback' );
					 
	add_settings_section( 'fgymm_general_options_section', __( 'General Settings', 'fgymm' ),
						  'fgymm_display_general_settings_section', 'fgymm_general_settings' );
	
	// Add favicon
	$field_args = array( 'type'        => 'image',
						 'id'          => 'general_favicon',
						 'name'        => 'general_favicon',
						 'desc'        => __( 'Favicon for your website', 'fgymm' ),
						 'std'         => '',
						 'label_for'   => 'general_favicon',
						 'option_name' => 'theme_fgymm_options',
					   );

	add_settings_field( 'general_favicon_image', __( 'Favicon', 'fgymm' ), 'fgymm_display_setting',
				'fgymm_general_settings', 'fgymm_general_options_section', $field_args );
}

function fgymm_register_header_settings() {
	
	register_setting( 'fgymm_header_settings', 'theme_fgymm_options', 'fgymm_header_sanitize_callback' );
					 
	add_settings_section( 'fgymm_header_options_section', __( 'Header Settings', 'fgymm' ),
		'fgymm_display_header_settings_section', 'fgymm_header_settings');

	// Add logo image
	$field_args = array( 'type'        => 'image',
						 'id'          => 'header_logo',
						 'name'        => 'header_logo',
						 'desc'        => __( 'Upload a custom logo for your website.', 'fgymm' ),
						 'std'         => '',
						 'label_for'   => 'header_logo',
						 'option_name' => 'theme_fgymm_options',
					   );

	add_settings_field( 'header_logo_image', __( 'Logo image', 'fgymm' ), 'fgymm_display_setting',
				'fgymm_header_settings', 'fgymm_header_options_section', $field_args );
}

function fgymm_register_footer_settings() {
	
	register_setting( 'fgymm_footer_settings', 'theme_fgymm_options', 'fgymm_footer_sanitize_callback' );
	
	add_settings_section( 'fgymm_footer_options_section', __( 'Footer Settings', 'fgymm' ),
		'fgymm_display_footer_settings_section', 'fgymm_footer_settings');
	
	$field_args = array( 'type'        => 'text',
						 'id'          => 'footer_copyrighttext',
						 'name'        => 'footer_copyrighttext',
						 'desc'        => __( 'Your Copyright text to appear in the website footer', 'fgymm' ),
						 'std'         => '',
						 'label_for'   => 'footer_copyrighttext',
						 'option_name' => 'theme_fgymm_options',
					   );

	add_settings_field( 'footer_copyrighttext_text', __( 'Copyright Text', 'fgymm' ), 'fgymm_display_setting',
				'fgymm_footer_settings', 'fgymm_footer_options_section', $field_args );
}

function fgymm_register_slider_settings() {
	
	register_setting( 'fgymm_slider_settings', 'theme_fgymm_options', 'fgymm_slider_sanitize_callback' );
					 
	add_settings_section( 'fgymm_slider_options_section', __( 'Slider Settings', 'fgymm' ),
		'fgymm_display_slider_settings_section', 'fgymm_slider_settings');

	$field_args = array( 'type'        => 'textarea',
					 'id'          => 'slider_slide1_content',
					 'name'        => 'slider_slide1_content',
					 'desc'        => sprintf( __( 'Slide #%s content in the slider', 'fgymm' ), 1 ),
					 'std'         => '',
					 'label_for'   => 'slider_slide1_content',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'slider_slide1_content_textarea', sprintf( __( 'Slide #%s Content', 'fgymm' ), 1 ), 'fgymm_display_setting',
			'fgymm_slider_settings', 'fgymm_slider_options_section', $field_args );

	$field_args = array( 'type'        => 'image',
					 'id'          => 'slider_slide1_image',
					 'name'        => 'slider_slide1_image',
					 'desc'        => sprintf( __( 'Upload a custom Slide #%s Background image for the slider.', 'fgymm' ), 1 ),
					 'std'         => '',
					 'label_for'   => 'slider_slide1_image',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'slider_slide1_image_image', sprintf( __( 'Slide #%s Background Image', 'fgymm' ), 1 ), 'fgymm_display_setting',
			'fgymm_slider_settings', 'fgymm_slider_options_section', $field_args );
			
	$field_args = array( 'type'        => 'textarea',
					 'id'          => 'slider_slide2_content',
					 'name'        => 'slider_slide2_content',
					 'desc'        => sprintf( __( 'Slide #%s content in the slider', 'fgymm' ), 2 ),
					 'std'         => '',
					 'label_for'   => 'slider_slide2_content',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'slider_slide2_content_textarea', sprintf( __( 'Slide #%s Content', 'fgymm' ), 2 ), 'fgymm_display_setting',
			'fgymm_slider_settings', 'fgymm_slider_options_section', $field_args );

	$field_args = array( 'type'        => 'image',
					 'id'          => 'slider_slide2_image',
					 'name'        => 'slider_slide2_image',
					 'desc'        => sprintf( __( 'Upload a custom Slide #%s Background image for the slider.', 'fgymm' ), 2 ),
					 'std'         => '',
					 'label_for'   => 'slider_slide2_image',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'slider_slide2_image_image', sprintf( __( 'Slide #%s Background Image', 'fgymm' ), 2 ), 'fgymm_display_setting',
			'fgymm_slider_settings', 'fgymm_slider_options_section', $field_args );
	
	$field_args = array( 'type'        => 'textarea',
					 'id'          => 'slider_slide3_content',
					 'name'        => 'slider_slide3_content',
					 'desc'        => sprintf( __( 'Slide #%s content in the slider', 'fgymm' ), 3 ),
					 'std'         => '',
					 'label_for'   => 'slider_slide3_content',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'slider_slide3_content_textarea', sprintf( __( 'Slide #%s Content', 'fgymm' ), 3 ), 'fgymm_display_setting',
			'fgymm_slider_settings', 'fgymm_slider_options_section', $field_args );


	$field_args = array( 'type'        => 'image',
					 'id'          => 'slider_slide3_image',
					 'name'        => 'slider_slide3_image',
					 'desc'        => sprintf( __( 'Upload a custom Slide #%s Background image for the slider.', 'fgymm' ), 3 ),
					 'std'         => '',
					 'label_for'   => 'slider_slide3_image',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'slider_slide3_image_image', sprintf( __( 'Slide #%s Background Image', 'fgymm' ), 3 ), 'fgymm_display_setting',
			'fgymm_slider_settings', 'fgymm_slider_options_section', $field_args );
}

function fgymm_register_social_settings() {

    register_setting( 'fgymm_social_settings', 'theme_fgymm_options', 'fgymm_social_sanitize_callback' );

	add_settings_section( 'fgymm_social_sites_section', __( 'Social Websites', 'fgymm' ),
		'fgymm_display_social_settings_section', 'fgymm_social_settings' );
		
	$field_args = array( 'type'        => 'url',
					 'id'          => 'social_facebook',
					 'name'        => 'social_facebook',
					 'desc'        => __( 'Place your Facebook page url and the Facebook icon will appear. To remove it, just leave it blank.', 'fgymm' ),
					 'std'         => '',
					 'label_for'   => 'social_facebook',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'social_facebook_text', __( 'Facebook', 'fgymm' ), 'fgymm_display_setting',
			'fgymm_social_settings', 'fgymm_social_sites_section', $field_args );
			
	$field_args = array( 'type'        => 'url',
					 'id'          => 'social_googleplus',
					 'name'        => 'social_googleplus',
					 'desc'        => __( 'Place your Google+ page url and the Google+ icon will appear. To remove it, just leave it blank.', 'fgymm' ),
					 'std'         => '',
					 'label_for'   => 'social_googleplus',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'social_googleplus_text', __( 'Google+', 'fgymm' ), 'fgymm_display_setting',
			'fgymm_social_settings', 'fgymm_social_sites_section', $field_args );
			
	$field_args = array( 'type'        => 'url',
					 'id'          => 'social_rss',
					 'name'        => 'social_rss',
					 'desc'        => __( 'Place your RSS Feeds page url and the RSS Feeds icon will appear. To remove it, just leave it blank.', 'fgymm' ),
					 'std'         => '',
					 'label_for'   => 'social_rss',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'social_rss_text', __( 'RSS Feeds', 'fgymm' ), 'fgymm_display_setting',
			'fgymm_social_settings', 'fgymm_social_sites_section', $field_args );
	
	$field_args = array( 'type'    => 'url',
					 'id'          => 'social_youtube',
					 'name'        => 'social_youtube',
					 'desc'        => __( 'Place your YouTube channel page url and the YouTube channel icon will appear. To remove it, just leave it blank.', 'fgymm' ),
					 'std'         => '',
					 'label_for'   => 'social_youtube',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'social_youtube_text', __( 'YouTube channel', 'fgymm' ), 'fgymm_display_setting',
			'fgymm_social_settings', 'fgymm_social_sites_section', $field_args );	
}

function fgymm_register_notfound_settings() {
	
	register_setting( 'fgymm_notfound_settings', 'theme_fgymm_options', 'fgymm_notfound_sanitize_callback' );
					 
	add_settings_section( 'fgymm_notfound_options_section', __( 'Error 404 Not Found Page Settings', 'fgymm' ),
		'fgymm_display_notfound_settings_section', 'fgymm_notfound_settings');

	// Add 404 image
	$field_args = array( 'type'    => 'image',
					 'id'          => 'notfound_image',
					 'name'        => 'notfound_image',
					 'desc'        => __( 'Upload a custom image for your 404 Not Found Page.', 'fgymm' ),
					 'std'         => '',
					 'label_for'   => 'notfound_image',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'notfound_image_text', __( 'Image', 'fgymm' ), 'fgymm_display_setting',
			'fgymm_notfound_settings', 'fgymm_notfound_options_section', $field_args );
				   
	// Add title
	$field_args = array( 'type'    => 'text',
					 'id'          => 'notfound_title',
					 'name'        => 'notfound_title',
					 'desc'        => __( 'The Title to appear in the 404 Not Found Page', 'fgymm' ),
					 'std'         => '',
					 'label_for'   => 'notfound_title',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'notfound_title_text', __( 'Title', 'fgymm' ), 'fgymm_display_setting',
			'fgymm_notfound_settings', 'fgymm_notfound_options_section', $field_args );

	// Add content
	$field_args = array( 'type'    => 'textarea',
					 'id'          => 'notfound_content',
					 'name'        => 'notfound_content',
					 'desc'        => __( 'The Content to appear in the 404 Not Found Page', 'fgymm' ),
					 'std'         => '',
					 'label_for'   => 'notfound_content',
					 'option_name' => 'theme_fgymm_options',
				   );

	add_settings_field( 'notfound_content_textarea', __( 'Content', 'fgymm' ), 'fgymm_display_setting',
			'fgymm_notfound_settings', 'fgymm_notfound_options_section', $field_args );
}

function fgymm_display_hidden_fields($activeTab) {

	$options = fgymm_get_options();
	
	if ($activeTab != 'tab_general') {
	
		fgymm_display_hidden_field('general_favicon', $options);
	}
	
	if ($activeTab != 'tab_header') {
	
		fgymm_display_hidden_field('header_logo', $options);
	}
	
	if ($activeTab != 'tab_footer') {
	
		fgymm_display_hidden_field('footer_copyrighttext', $options);
	}
	
	if ($activeTab != 'tab_slider') {
	
		fgymm_display_hidden_field('slider_slide1_content', $options);
		fgymm_display_hidden_field('slider_slide1_image', $options);
		fgymm_display_hidden_field('slider_slide2_content', $options);
		fgymm_display_hidden_field('slider_slide2_image', $options);
		fgymm_display_hidden_field('slider_slide3_content', $options);
		fgymm_display_hidden_field('slider_slide3_image', $options);
	}
	
	if ($activeTab != 'tab_social') {
	
		fgymm_display_hidden_field('social_facebook', $options);
		fgymm_display_hidden_field('social_googleplus', $options);
		fgymm_display_hidden_field('social_rss', $options);
		fgymm_display_hidden_field('social_youtube', $options);
	}
	
	if ($activeTab != 'tab_notfound') {
	
		fgymm_display_hidden_field('notfound_image', $options);
		fgymm_display_hidden_field('notfound_title', $options);
		fgymm_display_hidden_field('notfound_content', $options);
	}
}

function fgymm_display_hidden_field($id, $options) {

	$val = ( $options !== false && array_key_exists( $id, $options ) ) ? $options[ $id ] : '';

	echo "<input id='" .  esc_attr($id) . "' type='hidden' value='" . esc_attr( $val ) . "' name='theme_fgymm_options[$id]' />";
}

/**
 * Function to add extra text to display on each section
 */
function fgymm_display_general_settings_section() {
}

function fgymm_display_header_settings_section() {
}

function fgymm_display_footer_settings_section() {
}

function fgymm_display_homepage_settings_section() {
}

function fgymm_display_slider_settings_section() {
}

function fgymm_display_social_settings_section() {
}

function fgymm_display_notfound_settings_section() {
}

function fgymm_add_select_settings_option($type, $id, $desc, $settingsKey, $title, $section, $values) {		   
	$field_args = array(
					  'type'        => $type,
					  'id'          => $id,
					  'name'        => $id,
					  'desc'        => $desc,
					  'std'         => '',
					  'label_for'   => $id,
					  'option_name' => $settingsKey,
					  'values'      => $values,
				   );

	add_settings_field( $id.'_'.$type, $title, 'fgymm_display_setting', $settingsKey, $section, $field_args );
}

/**
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */
 $sendToEditorAdded = false;
function fgymm_display_setting( $args ) {

	extract( $args );

    $options = fgymm_get_options();
	
	if ( array_key_exists( $id, $options ) ) {
	
		$options[$id] = stripslashes( $options[$id] );  
        $options[$id] = esc_attr( $options[$id] );
	}
	
	$optionsId = ( $options !== false && array_key_exists( $id, $options ) )
							? $options[ $id ] : '';
				
    switch ( $type ) {
		case 'url':
              echo "<input class='regular-text' type='url' id='" .  esc_attr($id) . "' name='" .  esc_attr($option_name) . "[$id]' value='" .  esc_attr( $optionsId ) . "' />";  
              echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";  
          break;
          case 'text':
              echo "<input class='regular-text' type='text' id='" .  esc_attr($id) . "' name='" .  esc_attr($option_name) . "[$id]' value='" .  esc_attr( $optionsId ) . "' />";  
              echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";  
          break;
		  
		  case 'textarea':    
              echo "<textarea rows='4' cols='50' id='" .  esc_attr( $id ) . "' name='" .  esc_attr( $option_name ) . "[" .  esc_attr( $id ) . "]'>" . esc_attr( $optionsId ) . '</textarea>';  
              echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";  
          break;
		  
		  case 'image':		  
		  	  echo "<input type='url' id='" .  esc_attr( $id ) . "' name='" .  esc_attr( $option_name ) . "[" . esc_attr( $id ) . "]' value='" .  esc_attr( $optionsId ) . "' class='regular-text' />";  
        	  echo '<input id="'.$id.'_uploadBtn" type="button" value="'.__( 'Upload', 'fgymm' ).'" />';
			  echo ($desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";
			  if ( $optionsId != '' ) {			  
			  	echo '<br /><p><img id="' . esc_attr( $id ) . '_preview" src="' .  esc_attr( $optionsId ) . '" /></p>';
			  }
		  break;
    }
}

/**
 * This function is used to load all of the necessary styles and scripts used in admin
 */
function fgymm_settings_enqueue_scripts() {

	wp_enqueue_script( 'thickbox' );
    wp_enqueue_style( 'thickbox' );
    wp_enqueue_script( 'media-upload' );
    wp_enqueue_script( 'wptuts-upload' );
	wp_enqueue_style( 'wp-color-picker' );

	wp_register_script( 'fgymm-admin-utilities-js', get_template_directory_uri() . '/js/admin-utilities.js', array( 'jquery', 'wp-color-picker' ) );

	$translation_array = array( 'upload_image' => __( 'Upload an image', 'fgymm') );
	
	wp_localize_script( 'fgymm-admin-utilities-js', 'translation_array', $translation_array );
	
	wp_enqueue_script( 'fgymm-admin-utilities-js' );
}
add_action( 'admin_print_scripts-appearance_page_options', 'fgymm_settings_enqueue_scripts' );

/******************************
  Change 'Insert into Post' test in WP media upload dialog
******************************/
function fgymm_image_options_setup() {  
    global $pagenow;  
  
    if ( 'media-upload.php' == $pagenow || 'async-upload.php' == $pagenow ) {  
        // Now we'll replace the 'Insert into Post Button' inside Thickbox  
        add_filter( 'gettext', 'fgymm_replace_thickbox_text', 1, 3 ); 
    } 
} 
add_action( 'admin_init', 'fgymm_image_options_setup' ); 
 
function fgymm_replace_thickbox_text( $translated_text, $text, $domain ) {
    if ( 'Insert into Post' == $text ) {
        $referer = strpos( wp_get_referer(), 'options.php' ); 
        if ( $referer != '' ) { 
            return 'Select Image';  
        }  
    }
    return $translated_text;  
}

/**
 * Sanitized the general input values before storing to database
 */
function fgymm_general_sanitize_callback($input) {

	foreach ( $input as $k => $v ) {
	
		$val = trim($v);
		
		switch ($k) {
			case 'general_favicon':
				$newinput[$k] = esc_url_raw( $val );			
				break;
			default:
				$newinput[$k] = $val;
				break;
		}
	}

	return $newinput;
}

/**
 * Sanitized the header input values before storing to database
 */
function fgymm_header_sanitize_callback($input) {

	foreach ( $input as $k => $v ) {
	
		$val = trim($v);
		
		switch ($k) {
			case 'header_logo':
				$newinput[$k] = esc_url_raw( $val );			
				break;
			default:
				$newinput[$k] = $val;
				break;
		}
	}

	return $newinput;

}

/**
 * Sanitized the footer input values before storing to database
 */
function fgymm_footer_sanitize_callback($input) {

	foreach ( $input as $k => $v ) {
	
		$val = trim($v);
		
		switch ($k) {
			case 'footer_copyrighttext':
				$newinput[$k] = sanitize_text_field( $val );			
				break;
			default:
				$newinput[$k] = $val;
				break;
		}
	}

	return $newinput;
}

/**
 * Sanitized the slider input values before storing to database
 */
function fgymm_slider_sanitize_callback($input) {

	foreach ( $input as $k => $v ) {
	
		$val = trim($v);
		
		switch ($k) {
			case 'slider_slide1_content':
				$newinput[$k] = force_balance_tags( $val );			
				break;	
			case 'slider_slide1_image':
				$newinput[$k] = esc_url_raw( $val );			
				break;	
			case 'slider_slide2_content':
				$newinput[$k] = force_balance_tags( $val );			
				break;	
			case 'slider_slide2_image':
				$newinput[$k] = esc_url_raw( $val );			
				break;	
			case 'slider_slide3_content':
				$newinput[$k] = force_balance_tags( $val );			
				break;
			case 'slider_slide3_image':
				$newinput[$k] = esc_url_raw( $val );			
				break;	
			default:
				$newinput[$k] = $val;
				break;
		}
	}
	
	return $newinput;
}

/**
 * Sanitized the social input values before storing to database
 */
function fgymm_social_sanitize_callback($input) {

	foreach ( $input as $k => $v ) {
	
		$val = trim($v);
		
		switch ($k) {
			case 'social_facebook':
				$newinput[$k] = esc_url_raw( $val );			
				break;
			case 'social_googleplus':
				$newinput[$k] = esc_url_raw( $val );			
				break;
			case 'social_rss':
				$newinput[$k] = esc_url_raw( $val );			
				break;
			case 'social_youtube':
				$newinput[$k] = esc_url_raw( $val );			
				break;
			default:
				$newinput[$k] = $val;
				break;
		}
	}

	return $newinput;
}

/**
 * Sanitized the not found input values before storing to database
 */
function fgymm_notfound_sanitize_callback($input) {

	foreach ( $input as $k => $v ) {
	
		$val = trim($v);
		
		switch ($k) {
			case 'notfound_image':
				$newinput[$k] = esc_url_raw( $val );			
				break;
			case 'notfound_title':
				$newinput[$k] = sanitize_text_field( $val );			
				break;
			case 'notfound_content':
				$newinput[$k] = force_balance_tags( $val );			
				break;
			default:
				$newinput[$k] = $val;
				break;
		}
	}

	return $newinput;
}

?>