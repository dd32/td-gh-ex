<?php

/******************************
  Register the settings to use on the Theme Admin Page
******************************/
add_action( 'admin_init', 'tishonator_register_general_settings' );
add_action( 'admin_init', 'tishonator_register_header_settings' );
add_action( 'admin_init', 'tishonator_register_footer_settings' );
add_action( 'admin_init', 'tishonator_register_slider_settings' );
add_action( 'admin_init', 'tishonator_register_social_settings' );
add_action( 'admin_init', 'tishonator_register_notfound_settings' );
add_action( 'admin_menu', 'tishonator_menu' );

/******************************
  Admin Page Functions
******************************/
function tishonator_menu() {
	add_theme_page( __( 'Theme Options', 'tishonator' ),
	                __( 'Theme Options', 'tishonator' ),
					'manage_options',
					'tishonator_options.php',
					'tishonator_page' );
}

/******************************
  Callback function to the add_theme_page. It displays the theme options page
******************************/ 
function tishonator_page()
{
	$active_tab = isset($_GET[ 'tab' ]) ? $_GET[ 'tab' ] : 'tab_general';
	$fullThemeUrl = "http://tishonator.com/product/tmuzz";
?>
    <div class="wrap">
		<h2 class="nav-tab-wrapper">  
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_general"  class="nav-tab <?php echo $active_tab == 'tab_general' ? 'nav-tab-active' : ''; ?>"><?php _e( 'General', 'tishonator' ); ?></a>	
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_header"  class="nav-tab <?php echo $active_tab == 'tab_header' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Header', 'tishonator' ); ?></a>
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_footer"  class="nav-tab <?php echo $active_tab == 'tab_footer' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Footer', 'tishonator' ); ?></a>
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_homepage"  class="nav-tab <?php echo $active_tab == 'tab_homepage' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Home', 'tishonator' ); ?></a>
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_slider"  class="nav-tab <?php echo $active_tab == 'tab_slider' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Slider', 'tishonator' ); ?></a>
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_colors"  class="nav-tab <?php echo $active_tab == 'tab_colors' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Colors', 'tishonator' ); ?></a>
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_social" class="nav-tab <?php echo $active_tab == 'tab_social' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Social', 'tishonator' ); ?></a>
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_lightbox" class="nav-tab <?php echo $active_tab == 'tab_lightbox' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Lightbox', 'tishonator' ); ?></a>
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_thumbnails" class="nav-tab <?php echo $active_tab == 'tab_thumbnails' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Thumbnails', 'tishonator' ); ?></a>
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_contacts" class="nav-tab <?php echo $active_tab == 'tab_contacts' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Contacts', 'tishonator' ); ?></a>
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_notfound" class="nav-tab <?php echo $active_tab == 'tab_notfound' ? 'nav-tab-active' : ''; ?>">404</a>
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_colorschemes" class="nav-tab <?php echo $active_tab == 'tab_colorschemes' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Color Schemes', 'tishonator' ) ?></a>
			<a href="?page=<?php echo 'tishonator_options.php'; ?>&tab=tab_woocommerce" class="nav-tab <?php echo $active_tab == 'tab_woocommerce' ? 'nav-tab-active' : ''; ?>">WooCommerce</a>
		</h2>
	    
		
		<?php if ( $active_tab == 'tab_colorschemes' ) : ?>
		
				<h3><?php _e( 'Color Schemes', 'tishonator' ) ?></h3>
				<style>
					.scheme-cols{float:left;border:1px solid #555555;margin-left:20px;clear:both;}
					.scheme-col{float:left;width:20px;height:20px;}
					.clear{clear:both;}
				</style>

				<form method="post">
				
					<div style="background-color:#CCCCCC;padding:10px;">
						
							<div>
								These options are available in the full version only. <a href="<?php echo $fullThemeUrl; ?>" title="Click Here">Click Here</a> to get the full version of tMuzz theme.
							</div>		
							<ul>
								<li>
									<input type="radio" name="colorschemenane" value="Default" disabled /> Default 
									<div class="clear"></div>
									<div class="scheme-cols">
										<div class="scheme-col" style="background-color:#f8f6f7"></div>
										<div class="scheme-col" style="background-color:#555555"></div>
										<div class="scheme-col" style="background-color:#556D7D"></div>
										<div class="scheme-col" style="background-color:#9CC7E4"></div>
										<div class="scheme-col" style="background-color:#282A29"></div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<input type="radio" name="colorschemenane" value="Golden" disabled /> Golden 
									<div class="clear"></div>
									<div class="scheme-cols">
										<div class="scheme-col" style="background-color:#F4F4F2"></div>
										<div class="scheme-col" style="background-color:#565655"></div>
										<div class="scheme-col" style="background-color:#7F560A"></div>
										<div class="scheme-col" style="background-color:#B38F22"></div>
										<div class="scheme-col" style="background-color:#5F4008"></div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<input type="radio" name="colorschemenane" value="Red" disabled /> Red 
									<div class="clear"></div>
									<div class="scheme-cols">
										<div class="scheme-col" style="background-color:#FAFAFA"></div>
										<div class="scheme-col" style="background-color:#4d201d"></div>
										<div class="scheme-col" style="background-color:#9F061A"></div>
										<div class="scheme-col" style="background-color:#C53334"></div>
										<div class="scheme-col" style="background-color:#3A0309"></div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<input type="radio" name="colorschemenane" value="Yellow" disabled /> Yellow 
									<div class="clear"></div>
									<div class="scheme-cols">
										<div class="scheme-col" style="background-color:#FFFFFF"></div>
										<div class="scheme-col" style="background-color:#000000"></div>
										<div class="scheme-col" style="background-color:#D9960A"></div>
										<div class="scheme-col" style="background-color:#B47001"></div>
										<div class="scheme-col" style="background-color:#443E32"></div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<input type="radio" name="colorschemenane" value="Green" disabled /> Green 
									<div class="clear"></div>
									<div class="scheme-cols">
										<div class="scheme-col" style="background-color:#FFFFFF"></div>
										<div class="scheme-col" style="background-color:#17140D"></div>
										<div class="scheme-col" style="background-color:#0B7415"></div>
										<div class="scheme-col" style="background-color:#389926"></div>
										<div class="scheme-col" style="background-color:#0A0A0A"></div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<input type="radio" name="colorschemenane" value="Violet" disabled /> Violet 
									<div class="clear"></div>
									<div class="scheme-cols">
										<div class="scheme-col" style="background-color:#FFFEFF"></div>
										<div class="scheme-col" style="background-color:#555555"></div>
										<div class="scheme-col" style="background-color:#803B7E"></div>
										<div class="scheme-col" style="background-color:#B64AAD"></div>
										<div class="scheme-col" style="background-color:#4E1D4E"></div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<input type="radio" name="colorschemenane" value="Pink" disabled /> Pink 
									<div class="clear"></div>
									<div class="scheme-cols">
										<div class="scheme-col" style="background-color:#FCFFFF"></div>
										<div class="scheme-col" style="background-color:#000000"></div>
										<div class="scheme-col" style="background-color:#BC4B77"></div>
										<div class="scheme-col" style="background-color:#FD5892"></div>
										<div class="scheme-col" style="background-color:#3f0027"></div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<input type="radio" name="colorschemenane" value="Orange" disabled /> Orange 
									<div class="clear"></div>
									<div class="scheme-cols">
										<div class="scheme-col" style="background-color:#F7FFFD"></div>
										<div class="scheme-col" style="background-color:#0F0F0F"></div>
										<div class="scheme-col" style="background-color:#FB4E02"></div>
										<div class="scheme-col" style="background-color:#FE8B2E"></div>
										<div class="scheme-col" style="background-color:#2A1005"></div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<input type="radio" name="colorschemenane" value="Blue" disabled /> Blue 
									<div class="clear"></div>
									<div class="scheme-cols">
										<div class="scheme-col" style="background-color:#FFFFFF"></div>
										<div class="scheme-col" style="background-color:#00050B"></div>
										<div class="scheme-col" style="background-color:#174E91"></div>
										<div class="scheme-col" style="background-color:#477BB5"></div>
										<div class="scheme-col" style="background-color:#05162B"></div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<input type="radio" name="colorschemenane" value="Dark" disabled /> Dark 
									<div class="clear"></div>
									<div class="scheme-cols">
										<div class="scheme-col" style="background-color:#333333"></div>
										<div class="scheme-col" style="background-color:#FAFAFA"></div>
										<div class="scheme-col" style="background-color:#e2e2d2"></div>
										<div class="scheme-col" style="background-color:#FFFFFF"></div>
										<div class="scheme-col" style="background-color:#282A29"></div>
									</div>
									<div class="clear"></div>
								</li>
							</ul>				
					</div>				
					<p class="submit">  
						<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>
					</p>
		
		<?php else : ?>
				<?php if (isset($_GET[ 'settings-updated' ])) : ?>
					<div class='updated'>
						<p>
							<?php _e( 'Theme settings updated successfully.', 'tishonator' ) ?>
						</p>
					</div>
				<?php endif; ?>

				<form method="post" enctype="multipart/form-data" action="options.php">
					<?php
					if ( $active_tab == 'tab_general' ) :

						settings_fields( 'fmuzz_tishonator_general_settings' );
						do_settings_sections( 'fmuzz_tishonator_general_settings' );
?>
						<div style="background-color:#CCCCCC;padding:10px;">
						
							<div>
								These options are available in the full version only. <a href="<?php echo $fullThemeUrl; ?>" title="Click Here">Click Here</a> to get the full version of tMuzz theme.
							</div>
						
							<table class="form-table"> <tbody> <tr> <th scope="row"> <label for="layout">Website Layout</label> </th> <td> <select name="layout" id="layout" disabled> <option value="Wide" style="padding-right: 10px;">Wide</option> <option value="Boxed" selected="selected" style="padding-right: 10px;">Boxed</option> </select> <br> <span class="description">Select layout of your website</span> </td> </tr> <tr> <th scope="row"> <label for="headercode"> Code before &lt;/header&gt; tag </label> </th> <td> <textarea name="headercode" id="headercode" cols="50" rows="4" disabled></textarea> <br> <span class="description">Custom html code, before the &lt;/head&gt; tag</span> </td> </tr> <tr> <th scope="row"> <label for="bodycode"> Code before &lt;/body&gt; tag </label> </th> <td> <textarea name="bodycode" id="bodycode" cols="50" rows="4" disabled></textarea> <br> <span class="description">Custom html code, before the &lt;/body&gt; tag</span> </td> </tr> <tr> <th scope="row"> <label for="trackingcode">Tracking Code</label> </th> <td> <textarea name="trackingcode" id="trackingcode" cols="50" rows="4" disabled></textarea> <br> <span class="description">Tracking code (i.e. Google Analytics). It will be added in the footer part of the website.</span> </td> </tr> <tr> <th scope="row"> <label for="aftersinglepost">Show Author Info After Single Posts</label> </th> <td> <input type="checkbox" name="aftersinglepost" id="aftersinglepost" disabled> <br> <span class="description">Display author info box after single posts</span> </td> </tr> <tr> <th scope="row"> <label for="aftersinglepost">Show Social Sharing After Single Posts</label> </th> <td> <input type="checkbox" name="aftersinglepost" id="aftersinglepost" disabled> <br> <span class="description">Display social sharing box after single posts</span> </td> </tr> <tr> <th scope="row"> <label for="aftersinglepage">Show Author Info After Single Pages</label> </th> <td> <input type="checkbox" name="aftersinglepage" id="aftersinglepage" disabled> <br> <span class="description">Display author info box after single page</span> </td> </tr> <tr> <th scope="row"> <label for="aftersinglepage">Show Social Sharing After Single Pages</label> </th> <td> <input type="checkbox" name="aftersinglepage" id="aftersinglepage" disabled> <br> <span class="description">Display social sharing box after single pages</span> </td> </tr> </tbody> </table>
						</div>
						
						<p class="submit">  
							<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>   <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'tishonator' ) ?>" />  
						</p>
<?php
					elseif ( $active_tab == 'tab_header' ) :

						settings_fields( 'fmuzz_tishonator_header_settings' );
						do_settings_sections( 'fmuzz_tishonator_header_settings' );
?>						
						<div style="background-color:#CCCCCC;padding:10px;">
						
							<div>
								These options are available in the full version only. <a href="<?php echo $fullThemeUrl; ?>" title="Click Here">Click Here</a> to get the full version of tMuzz theme.
							</div>
							
							<table class="form-table"> <tbody> <tr> <th scope="row"> <label for="logo_width">Logo Image Width</label> </th> <td> <input type="text" name="logo_width" id="logo_width" class="regular-text" disabled> <br> <span class="description">Logo image width of your website</span> </td> </tr> <tr> <th scope="row"> <label for="logo_height">Logo Image Height</label> </th> <td> <input type="text" name="logo_height" id="logo_height" class="regular-text" disabled> <br> <span class="description">Logo image height of your website</span> </td> </tr> <tr> <th scope="row"> <label for="header_phone">Header Phone</label> </th> <td> <input type="text" value="1.555.555.555" name="header_phone" id="header_phone" class="regular-text" disabled> <br> <span class="description">Your phone to appear in the website header</span> </td> </tr> <tr> <th scope="row"> <label for="header_email">Header E-mail</label> </th> <td> <input type="text" value="sales@yoursite.com" name="header_email" id="header_email" class="regular-text" disabled> <br> <span class="description">Your e-mail to appear in the website header</span> </td> </tr> <tr> <th scope="row"> <label for="displayhomeicon">Display Homepage Icon</label> </th> <td> <input type="checkbox" checked="checked" value="1" name="displayhomeicon" id="displayhomeicon" disabled> <br> <span class="description">Display homepage icon in the website header</span> </td> </tr> <tr> <th scope="row"> <label for="displaysocial">Display Social Icons</label> </th> <td> <input type="checkbox" checked="checked" value="1" name="displaysocial" id="displaysocial" disabled> <br> <span class="description">Display social icons in the website header</span> </td> </tr> <tr> <th scope="row"> <label for="displaysearch">Display Search Form</label> </th> <td> <input type="checkbox" name="displaysearch" id="displaysearch" disabled> <br> <span class="description">Display search form in the website header</span> </td> </tr> <tr> <th scope="row"> <label for="opensocialnewwindow">Open Social Icons in a new window</label> </th> <td> <input type="checkbox" name="opensocialnewwindow" checked="checked" value="1" id="opensocialnewwindow" disabled> <br> <span class="description">Open social icons links in a new window</span> </td> </tr> <tr> <th scope="row"> <label for="showbreadcrumb">Show Breadcrumb</label> </th> <td> <input type="checkbox" checked="checked" value="1" name="showbreadcrumb" id="showbreadcrumb" disabled> <br> <span class="description">Show breadcrumb in the website header</span> </td> </tr> <tr> <th scope="row"> <label for="pageheaderbackground">Page Header Background Image</label> </th> <td> <input type="text" class="regular-text" name="pageheaderbackground" id="pageheaderbackground" disabled><input type="button" value="Upload" id="pageheaderbackground_uploadBtn" disabled> <br> <span class="description">Upload a custom breadcrumb background image for page header section.</span> <br> </td> </tr> </tbody> </table>
						</div>
						
						<p class="submit">  
							<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>   <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'tishonator' ) ?>" />  
						</p>
<?php						
					elseif ( $active_tab == 'tab_footer' ) :

						settings_fields( 'fmuzz_tishonator_footer_settings' );
						do_settings_sections( 'fmuzz_tishonator_footer_settings' );
?>						
						<div style="background-color:#CCCCCC;padding:10px;">
							<div>
								These options are available in the full version only. <a href="<?php echo $fullThemeUrl; ?>" title="Click Here">Click Here</a> to get the full version of tMuzz theme.
							</div>
							
							<table class="form-table"> <tbody> <tr> <th scope="row"> <label for="columnsnumber">Number of Columns</label> </th> <td> <select name="columnsnumber" id="columnsnumber" disabled> <option value="none" style="padding-right: 10px;">none</option> <option value="1" style="padding-right: 10px;">1</option> <option value="2" style="padding-right: 10px;">2</option> <option value="3" style="padding-right: 10px;">3</option> <option selected="selected" value="4" style="padding-right: 10px;">4</option> </select> <br> <span class="description">Select number of columns to display in the website footer</span> </td> </tr> <tr> <th scope="row"> <label for="displaysocial">Display Social Icons</label> </th> <td> <input type="checkbox" checked="checked" value="1" name="displaysocial" id="displaysocial" disabled> <br> <span class="description">Display social icons in the website footer</span> </td> </tr> <tr> <th scope="row"> <label for="opensocialnewwindow">Open Social Icons in a new window</label> </th> <td> <input type="checkbox" checked="checked" value="1" name="opensocialnewwindow" id="opensocialnewwindow" disabled> <br> <span class="description">Open social icons links in a new window</span> </td> </tr> </tbody> </table>
						</div>
						
						<p class="submit">  
							<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>   <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'tishonator' ) ?>" />  
						</p>
<?php

					elseif ($active_tab == 'tab_homepage' ) :
?>				
						<h3>Home Page Settings</h3>				
						<div style="background-color:#CCCCCC;padding:10px;">			
							<div>
								These options are available in the full version only. <a href="<?php echo $fullThemeUrl; ?>" title="Click Here">Click Here</a> to get the full version of tMuzz theme.
							</div>
							<table class="form-table"> <tbody> <tr> <th scope="row"> <label for="displayslider">Display Slider</label> </th> <td> <input type="checkbox" checked="checked" value="1" name="displayslider" id="displayslider" disabled> <br> <span class="description">Display slider in your website home page</span> </td> </tr> <tr> <th scope="row"> <label for="displaylatestposts">Display Latest Posts</label> </th> <td> <input type="checkbox" checked="checked" value="1" name="displaylatestposts" id="displaylatestposts" disabled> <br> <span class="description">Display latest posts in your website home page</span> </td> </tr> <tr> <th scope="row"> <label for="displaysidebar">Display Sidebar</label> </th> <td> <input type="checkbox" checked="checked" value="1" name="displaysidebar" id="displaysidebar" disabled> <br> <span class="description">Display sidebar in your website home page</span> </td> </tr> <tr> <th scope="row"> <label for="columnsnumber">Number of Columns</label> </th> <td> <select name="columnsnumber" id="columnsnumber" disabled> <option value="none" style="padding-right: 10px;">none</option> <option value="1" style="padding-right: 10px;">1</option> <option value="2" style="padding-right: 10px;">2</option> <option value="3" style="padding-right: 10px;">3</option> <option selected="selected" value="4" style="padding-right: 10px;">4</option> </select> <br> <span class="description">Select number of columns to display in the website homepage</span> </td> </tr> </tbody> </table>
						</div>
						
						<p class="submit">  
							<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>  
						</p>
<?php						
					elseif ($active_tab == 'tab_slider' ) :

						settings_fields( 'fmuzz_tishonator_slider_settings' );
						do_settings_sections( 'fmuzz_tishonator_slider_settings' );					
?>

						<div style="background-color:#CCCCCC;padding:10px;">
						
							<div>
								Full Slider options are available in the full version only. <a href="<?php echo $fullThemeUrl; ?>" title="Click Here">Click Here</a> to get the full version of tMuzz theme.
							</div>
							
							<table class="form-table"><tbody><tr><th scope="row"><label for="displayslide1">Display Slide #1</label></th><td><input disabled type="checkbox" checked="checked" value="1" name="displayslide1" id="displayslide1"><br><span class="description">Display slide #1 in the slider</span></td></tr><tr><th scope="row"><label for="slide1_title">Slide #1 Title</label></th><td><input disabled type="text" value="Lorem ipsum dolor" name="slide1_title" id="slide1_title" class="regular-text"><br><span class="description">Slide #1 Title in the slider</span></td></tr><tr><th scope="row"><label for="slide1_text">Slide #1 Text</label></th><td><textarea disabled name="slide1_text" id="slide1_text" cols="50" rows="4">&lt;p&gt;&lt;span class="highlight"&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span class="highlight"&gt;Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.&lt;/span&gt;&lt;/p&gt;</textarea><br><span class="description">Slide #1 Text in the slider</span></td></tr><tr><th scope="row"><label for="slide1_url">Slide #1 URL</label></th><td><input disabled type="text" value="#" name="slide1_url" id="slide1_url" class="regular-text"><br><span class="description">Slide #1 URL in the slider</span></td></tr><tr><th scope="row"><label for="slide1_image">Slide #1 Background Image</label></th><td><input disabled type="text" class="regular-text" value="fmuzz/images/slider/1.jpg" name="slide1_image" id="slide1_image"><input disabled type="button" value="Upload" id="slide1_image_uploadBtn"><br><span class="description">Upload a custom Slide #1 Background image for the slider.</span><br>			  
			  </td></tr><tr><th scope="row"><label for="displayslide2">Display Slide #2</label></th><td><input disabled type="checkbox" checked="checked" value="1" name="displayslide2" id="displayslide2"><br><span class="description">Display slide #2 in the slider</span></td></tr><tr><th scope="row"><label for="slide2_title">Slide #2 Title</label></th><td><input disabled type="text" value="Everti Constituam" name="slide2_title" id="slide2_title" class="regular-text"><br><span class="description">Slide #2 Title in the slider</span></td></tr><tr><th scope="row"><label for="slide2_text">Slide #2 Text</label></th><td><textarea disabled name="slide2_text" id="slide2_text" cols="50" rows="4">&lt;ul&gt;&lt;li&gt;&lt;span class="highlight"&gt;Vel nobis libris nostrud an.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span class="highlight"&gt;Id prompta postulant periculis sit. Per ex veniam.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span class="highlight"&gt;Te vide viderer.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span class="highlight"&gt;Ne sea minim eligendi, eum.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;</textarea><br><span class="description">Slide #2 Text in the slider</span></td></tr><tr><th scope="row"><label for="slide2_url">Slide #2 URL</label></th><td><input disabled type="text" value="#" name="slide2_url" id="slide2_url" class="regular-text"><br><span class="description">Slide #2 URL in the slider</span></td></tr><tr><th scope="row"><label for="slide2_image">Slide #2 Background Image</label></th><td><input disabled type="text" class="regular-text" value="fmuzz/images/slider/2.jpg" name="slide2_image" id="slide2_image"><input disabled type="button" value="Upload" id="slide2_image_uploadBtn"><br><span class="description">Upload a custom Slide #2 Background image for the slider.</span><br>
			  </td></tr><tr><th scope="row"><label for="displayslide3">Display Slide #3</label></th><td><input disabled type="checkbox" checked="checked" value="1" name="displayslide3" id="displayslide3"><br><span class="description">Display slide #3 in the slider</span></td></tr><tr><th scope="row"><label for="slide3_title">Slide #3 Title</label></th><td><input disabled type="text" value="Id Essent Cetero" name="slide3_title" id="slide3_title" class="regular-text"><br><span class="description">Slide #3 Title in the slider</span></td></tr><tr><th scope="row"><label for="slide3_text">Slide #3 Text</label></th><td><textarea disabled name="slide3_text" id="slide3_text" cols="50" rows="4">&lt;p&gt;&lt;span class="highlight"&gt;Quodsi docendi sed id. Ea eam quod aliquam epicurei, qui tollit inimicus partiendo cu ei.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span class="highlight"&gt;Nisl consul expetendis at duo, mea ea ceteros constituam.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span class="highlight"&gt;Per id dicit laudem possit. Cu mea diam persequeris. Qui enim facilisis ei, vocent scaevola an est.&lt;/span&gt;&lt;/p&gt;</textarea><br><span class="description">Slide #3 Text in the slider</span></td></tr><tr><th scope="row"><label for="slide3_url">Slide #3 URL</label></th><td><input disabled type="text" value="#" name="slide3_url" id="slide3_url" class="regular-text"><br><span class="description">Slide #3 URL in the slider</span></td></tr><tr><th scope="row"><label for="slide3_image">Slide #3 Background Image</label></th><td><input disabled type="text" class="regular-text" value="fmuzz/images/slider/3.jpg" name="slide3_image" id="slide3_image"><input disabled type="button" value="Upload" id="slide3_image_uploadBtn"><br><span class="description">Upload a custom Slide #3 Background image for the slider.</span><br>
			  </td></tr><tr><th scope="row"><label for="displayslide4">Display Slide #4</label></th><td><input disabled type="checkbox" checked="checked" value="1" name="displayslide4" id="displayslide4"><br><span class="description">Display slide #4 in the slider</span></td></tr><tr><th scope="row"><label for="slide4_title">Slide #4 Title</label></th><td><input disabled type="text" value="Nostrud Cotidieque Et" name="slide4_title" id="slide4_title" class="regular-text"><br><span class="description">Slide #4 Title in the slider</span></td></tr><tr><th scope="row"><label for="slide4_text">Slide #4 Text</label></th><td><textarea disabled name="slide4_text" id="slide4_text" cols="50" rows="4">&lt;ol&gt;&lt;li&gt;&lt;span class="highlight"&gt;Vel nobis libris nostrud an.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span class="highlight"&gt;Id prompta postulant periculis sit. Per ex veniam.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span class="highlight"&gt;Te vide viderer.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span class="highlight"&gt;Ne sea minim eligendi, eum.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span class="highlight"&gt;Meis mutat vis te, usu ex dolor constituam omittantur quas.&lt;/span&gt;&lt;/li&gt;&lt;/ol&gt;</textarea><br><span class="description">Slide #4 Text in the slider</span></td></tr><tr><th scope="row"><label for="slide4_url">Slide #4 URL</label></th><td><input disabled type="text" value="#" name="slide4_url" id="slide4_url" class="regular-text"><br><span class="description">Slide #4 URL in the slider</span></td></tr><tr><th scope="row"><label for="slide4_image">Slide #4 Background Image</label></th><td><input disabled type="text" class="regular-text" value="fmuzz/images/slider/4.jpg" name="slide4_image" id="slide4_image"><input disabled type="button" value="Upload" id="slide4_image_uploadBtn"><br><span class="description">Upload a custom Slide #4 Background image for the slider.</span><br>
			  </td></tr><tr><th scope="row"><label for="displayslide5">Display Slide #5</label></th><td><input disabled type="checkbox" checked="checked" value="1" name="displayslide5" id="displayslide5"><br><span class="description">Display slide #5 in the slider</span></td></tr><tr><th scope="row"><label for="slide5_title">Slide #5 Title</label></th><td><input disabled type="text" value="Lorem ipsum dolor sit amet" name="slide5_title" id="slide5_title" class="regular-text"><br><span class="description">Slide #5 Title in the slider</span></td></tr><tr><th scope="row"><label for="slide5_text">Slide #5 Text</label></th><td><textarea disabled name="slide5_text" id="slide5_text" cols="50" rows="4">&lt;p&gt;&lt;span class="highlight"&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua:&lt;/span&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;span class="highlight"&gt;Id prompta postulant periculis sit. Per ex veniam.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span class="highlight"&gt;Te vide viderer.&lt;/span&gt;&lt;/li&gt;&lt;li&gt;&lt;span class="highlight"&gt;Ne sea minim eligendi, eum.&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;</textarea><br><span class="description">Slide #5 Text in the slider</span></td></tr><tr><th scope="row"><label for="slide5_url">Slide #5 URL</label></th><td><input disabled type="text" value="#" name="slide5_url" id="slide5_url" class="regular-text"><br><span class="description">Slide #5 URL in the slider</span></td></tr><tr><th scope="row"><label for="slide5_image">Slide #5 Background Image</label></th><td><input disabled type="text" class="regular-text" value="fmuzz/images/slider/5.jpg" name="slide5_image" id="slide5_image"><input disabled type="button" value="Upload" id="slide5_image_uploadBtn"><br><span class="description">Upload a custom Slide #5 Background image for the slider.</span><br>
			  </td></tr></tbody></table>

						</div>

						<p class="submit">  
							<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>   <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'tishonator' ) ?>" />  
						</p>
<?php
					elseif ($active_tab == 'tab_colors' ) :
					
						wp_enqueue_style( 'wp-color-picker' );
						wp_enqueue_script( 'wp-color-picker' );
?>					
						<h3>Colors Settings</h3>
						<div style="background-color:#CCCCCC;padding:10px;">
							<div>
								These options are available in the full version only. <a href="<?php echo $fullThemeUrl; ?>" title="Click Here">Click Here</a> to get the full version of tMuzz theme.
							</div>
							
							<table class="form-table"><tbody><tr><th scope="row"><label for="contentbackgroundcolor">Content Background Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#ffffff" name="tisho_settings[contentbackgroundcolor]" id="contentbackgroundcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 0px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(255, 0, 0), rgb(255, 255, 255));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description"> The content background color of the website</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#contentbackgroundcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="textcolor">Text Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#555555" name="tisho_settings[textcolor]" id="textcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 122.029px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(81, 0, 0), rgb(84, 84, 84));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description"> The text color of the website</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#textcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="linkcolor">Link Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#556d7d" name="tisho_settings[linkcolor]" id="linkcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 92.8878px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 73, 122), rgb(124, 124, 124));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description"> The links color of the website</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#linkcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="linkhovercolor">Link Hover Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#9CC7E4" name="tisho_settings[linkhovercolor]" id="linkhovercolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 20.0346px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 134, 224), rgb(226, 226, 226));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description"> The links hover color of the website</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#linkhovercolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="headingscolor">Headings Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#555555" name="tisho_settings[headingscolor]" id="headingscolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 122.029px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(81, 0, 0), rgb(84, 84, 84));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description"> The headings (h1, h2, h3) color of the website</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#headingscolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="buttonbackgroundgradienttop">Buttons Gradient Top Background Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#99C1D0" name="tisho_settings[buttonbackgroundgradienttop]" id="buttonbackgroundgradienttop" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 99.1613px; top: 32.7839px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 188, 188), rgb(255, 221, 188), rgb(255, 255, 188), rgb(221, 255, 188), rgb(188, 255, 188), rgb(188, 255, 221), rgb(188, 255, 255), rgb(188, 221, 255), rgb(188, 188, 255), rgb(221, 188, 255), rgb(254, 188, 255), rgb(255, 188, 221), rgb(255, 188, 188));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 153, 209), rgb(209, 209, 209));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 26%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description"> The buttons gradient top background color.</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#buttonbackgroundgradienttop').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="buttonbackgroundgradientbottom">Buttons Gradient Bottom Background Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#84A1AE" name="tisho_settings[buttonbackgroundgradientbottom]" id="buttonbackgroundgradientbottom" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 100.679px; top: 58.2826px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 193, 193), rgb(255, 224, 193), rgb(255, 255, 193), rgb(224, 255, 193), rgb(193, 255, 193), rgb(193, 255, 224), rgb(193, 255, 255), rgb(193, 224, 255), rgb(193, 193, 255), rgb(224, 193, 255), rgb(254, 193, 255), rgb(255, 193, 224), rgb(255, 193, 193));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 118, 173), rgb(173, 173, 173));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 24%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description"> The buttons gradient bottom background color.</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#buttonbackgroundgradientbottom').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="headertopbackground">Header Top Box Background Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#e8e6e7" name="tisho_settings[headertopbackground]" id="headertopbackground" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 166.955px; top: 16.392px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 249, 249), rgb(255, 252, 249), rgb(255, 255, 249), rgb(252, 255, 249), rgb(249, 255, 249), rgb(249, 255, 252), rgb(249, 255, 255), rgb(249, 252, 255), rgb(249, 249, 255), rgb(252, 249, 255), rgb(255, 249, 255), rgb(255, 249, 252), rgb(255, 249, 249));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(229, 0, 114), rgb(232, 232, 232));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 1%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website header top box background</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#headertopbackground').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="headertop_textcolor">Header Top Box Text Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#5A5859" name="tisho_settings[headertop_textcolor]" id="headertop_textcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 166.955px; top: 118.386px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 249, 249), rgb(255, 252, 249), rgb(255, 255, 249), rgb(252, 255, 249), rgb(249, 255, 249), rgb(249, 255, 252), rgb(249, 255, 255), rgb(249, 252, 255), rgb(249, 249, 255), rgb(252, 249, 255), rgb(255, 249, 255), rgb(255, 249, 252), rgb(255, 249, 249));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(86, 0, 43), rgb(89, 89, 89));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 2%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website header top box text color</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#headertop_textcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="headertop_linkcolor">Header Top Box Link Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#5A5859" name="tisho_settings[headertop_linkcolor]" id="headertop_linkcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 166.955px; top: 118.386px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 249, 249), rgb(255, 252, 249), rgb(255, 255, 249), rgb(252, 255, 249), rgb(249, 255, 249), rgb(249, 255, 252), rgb(249, 255, 255), rgb(249, 252, 255), rgb(249, 249, 255), rgb(252, 249, 255), rgb(255, 249, 255), rgb(255, 249, 252), rgb(255, 249, 249));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(86, 0, 43), rgb(89, 89, 89));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 2%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website header top box links colors</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#headertop_linkcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="headertop_linkhovercolor">Header Top Box Link Hover Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#9CC7E4" name="tisho_settings[headertop_linkhovercolor]" id="headertop_linkhovercolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 20.0346px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 134, 224), rgb(226, 226, 226));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website header top box links colors on hover</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#headertop_linkhovercolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="headertopsubcontentbackground">Header top Box Sub-Content Background Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#323236" name="tisho_settings[headertopsubcontentbackground]" id="headertopsubcontentbackground" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 121.422px; top: 143.885px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 234, 234), rgb(255, 244, 234), rgb(255, 255, 234), rgb(244, 255, 234), rgb(234, 255, 234), rgb(234, 255, 244), rgb(234, 255, 255), rgb(234, 244, 255), rgb(234, 234, 255), rgb(244, 234, 255), rgb(255, 234, 255), rgb(255, 234, 244), rgb(255, 234, 234));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 0, 51), rgb(53, 53, 53));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 7%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website header top box subcontent background</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#headertopsubcontentbackground').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="headertopsubcontent_textcolor">Header top Box Sub-Content Text Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#d5d1c4" name="tisho_settings[headertopsubcontent_textcolor]" id="headertopsubcontent_textcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 23.2726px; top: 29.1413px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 234, 234), rgb(255, 244, 234), rgb(255, 255, 234), rgb(244, 255, 234), rgb(234, 255, 234), rgb(234, 255, 244), rgb(234, 255, 255), rgb(234, 244, 255), rgb(234, 234, 255), rgb(244, 234, 255), rgb(255, 234, 255), rgb(255, 234, 244), rgb(255, 234, 234));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(214, 164, 0), rgb(214, 214, 214));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 8%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website header top box subcontent text color</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#headertopsubcontent_textcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="headertopsubcontent_linkcolor">Header top Box Sub-Content Link Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#b8c7bf" name="tisho_settings[headertopsubcontent_linkcolor]" id="headertopsubcontent_linkcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 74.8769px; top: 40.0693px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 234, 234), rgb(255, 244, 234), rgb(255, 255, 234), rgb(244, 255, 234), rgb(234, 255, 234), rgb(234, 255, 244), rgb(234, 255, 255), rgb(234, 244, 255), rgb(234, 234, 255), rgb(244, 234, 255), rgb(255, 234, 255), rgb(255, 234, 244), rgb(255, 234, 234));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 198, 92), rgb(198, 198, 198));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 8%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website header top box subcontent links colors</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#headertopsubcontent_linkcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="headertopsubcontent_linkhovercolor">Header top Sub-Content Box Link Hover Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#9CC7E4" name="tisho_settings[headertopsubcontent_linkhovercolor]" id="headertopsubcontent_linkhovercolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 20.0346px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 134, 224), rgb(226, 226, 226));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website header top box subcontent links colors on hover</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#headertopsubcontent_linkhovercolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="headerbackground">Header Background Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#ffffff" name="tisho_settings[headerbackground]" id="headerbackground" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 0px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(255, 0, 0), rgb(255, 255, 255));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website header background</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#headerbackground').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="pageheader_textcolor">Page Header Text Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#5a5859" name="tisho_settings[pageheader_textcolor]" id="pageheader_textcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 166.955px; top: 118.386px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 249, 249), rgb(255, 252, 249), rgb(255, 255, 249), rgb(252, 255, 249), rgb(249, 255, 249), rgb(249, 255, 252), rgb(249, 255, 255), rgb(249, 252, 255), rgb(249, 249, 255), rgb(252, 249, 255), rgb(255, 249, 255), rgb(255, 249, 252), rgb(255, 249, 249));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(86, 0, 43), rgb(89, 89, 89));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 2%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website page header text color</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#pageheader_textcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="pageheader_linkcolor">Page Header Link Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#556d7d" name="tisho_settings[pageheader_linkcolor]" id="pageheader_linkcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 92.8878px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 73, 122), rgb(124, 124, 124));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website page header link color</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#pageheader_linkcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="pageheader_linkhovercolor">Page Header Link Hover Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#9CC7E4" name="tisho_settings[pageheader_linkhovercolor]" id="pageheader_linkhovercolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 20.0346px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 134, 224), rgb(226, 226, 226));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website page header link color on hover</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#pageheader_linkhovercolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="menutextcolor">Menu Text Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#556D7D" name="tisho_settings[menutextcolor]" id="menutextcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 92.8878px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 73, 122), rgb(124, 124, 124));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website main menu text</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#menutextcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="menudropdownbordercolor">Menu Drop Down Border Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#f8f6f7" name="tisho_settings[menudropdownbordercolor]" id="menudropdownbordercolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 166.955px; top: 5.46399px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 249, 249), rgb(255, 252, 249), rgb(255, 255, 249), rgb(252, 255, 249), rgb(249, 255, 249), rgb(249, 255, 252), rgb(249, 255, 255), rgb(249, 252, 255), rgb(249, 249, 255), rgb(252, 249, 255), rgb(255, 249, 255), rgb(255, 249, 252), rgb(255, 249, 249));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(244, 0, 122), rgb(247, 247, 247));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 1%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website main menu drop down border</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#menudropdownbordercolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="menudropdownbackgroundcolor">Menu Drop Down Background Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#f8f6f7" name="tisho_settings[menudropdownbackgroundcolor]" id="menudropdownbackgroundcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 166.955px; top: 5.46399px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 249, 249), rgb(255, 252, 249), rgb(255, 255, 249), rgb(252, 255, 249), rgb(249, 255, 249), rgb(249, 255, 252), rgb(249, 255, 255), rgb(249, 252, 255), rgb(249, 249, 255), rgb(252, 249, 255), rgb(255, 249, 255), rgb(255, 249, 252), rgb(255, 249, 249));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(244, 0, 122), rgb(247, 247, 247));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 1%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Background color to appear in the website main menu drop down</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#menudropdownbackgroundcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="menuhoverbackground">Menu Hover Background Color (Large Resolution)</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#757575" name="tisho_settings[menuhoverbackground]" id="menuhoverbackground" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 98.3518px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(117, 0, 0), rgb(117, 117, 117));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Background color to appear in the website main menu on hover</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#menuhoverbackground').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="menuhovertextcolor">Menu Text Hover Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#FFFFFF" name="tisho_settings[menuhovertextcolor]" id="menuhovertextcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 0px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(255, 0, 0), rgb(255, 255, 255));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website main menu text on hover</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#menuhovertextcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="footerbackground">Footer Background Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#ffffff" name="tisho_settings[footerbackground]" id="footerbackground" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 0px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(255, 0, 0), rgb(255, 255, 255));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website footer background</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#footerbackground').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="footertextcolor">Footer Text Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#555555" name="tisho_settings[footertextcolor]" id="footertextcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 0px; top: 122.029px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255), rgb(255, 255, 255));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(81, 0, 0), rgb(84, 84, 84));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 0%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website footer text</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#footertextcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="footerlinkcolor">Footer Link Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#556d7d" name="tisho_settings[footerlinkcolor]" id="footerlinkcolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 92.8878px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 73, 122), rgb(124, 124, 124));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website footer links</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#footerlinkcolor').wpColorPicker(); }); </script> </td></tr><tr><th scope="row"><label for="footerlinkhovercolor">Footer Link Hover Color</label></th><td><div class="wp-picker-container">
							<span class="wp-picker-input-wrap"><input type="text" value="#9cc7e4" name="tisho_settings[footerlinkhovercolor]" id="footerlinkhovercolor" class="regular-text wp-color-picker" style="display: none;"><input type="button" class="button button-small hidden wp-picker-clear" value="Clear"></span><div class="wp-picker-holder"><div class="iris-picker iris-mozilla iris-border" style="display: none; width: 255px; height: 202.125px; padding-bottom: 23.2209px;"><div class="iris-picker-inner"><div class="iris-square" style="width: 182.125px; height: 182.125px;"><a href="#" class="iris-square-value ui-draggable" style="left: 103.209px; top: 20.0346px;"><span class="iris-square-handle ui-slider-handle"></span></a><div class="iris-square-inner iris-square-horiz" style="background-image: -moz-linear-gradient(left center , rgb(255, 173, 173), rgb(255, 214, 173), rgb(255, 255, 173), rgb(214, 255, 173), rgb(173, 255, 173), rgb(173, 255, 214), rgb(173, 255, 255), rgb(173, 214, 255), rgb(173, 173, 255), rgb(214, 173, 255), rgb(254, 173, 255), rgb(255, 173, 214), rgb(255, 173, 173));"></div><div class="iris-square-inner iris-square-vert" style="background-image: -moz-linear-gradient(center top , transparent, rgb(0, 0, 0));"></div></div><div class="iris-slider iris-strip" style="height: 205.346px; width: 28.2px; background-image: -moz-linear-gradient(center top , rgb(0, 134, 224), rgb(226, 226, 226));"><div class="iris-slider-offset ui-slider ui-slider-vertical ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><a href="#" class="ui-slider-handle ui-state-default ui-corner-all" style="bottom: 32%;"></a></div></div></div><div class="iris-palette-container"><a tabindex="0" class="iris-palette" style="background-color: rgb(0, 0, 0); height: 19.5784px; width: 19.5784px; margin-left: 0px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(255, 255, 255); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 51, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(221, 153, 51); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(238, 238, 34); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(129, 215, 66); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(30, 115, 190); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a><a tabindex="0" class="iris-palette" style="background-color: rgb(130, 36, 227); height: 19.5784px; width: 19.5784px; margin-left: 3.6425px;"></a></div></div></div></div><br><span class="description">Color to appear in the website footer links on hover</span> <script type="text/javascript"> jQuery(document).ready(function($){ $('#footerlinkhovercolor').wpColorPicker(); }); </script> </td></tr></tbody></table>
						</div>
						<p class="submit">  
							<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>
						</p>
<?php
					elseif ($active_tab == 'tab_social' ) :

						settings_fields( 'fmuzz_tishonator_social_settings' );
						do_settings_sections( 'fmuzz_tishonator_social_settings' );
?>
						<div style="background-color:#CCCCCC;padding:10px;">
						
							<div>
								These options are available in the full version only. <a href="<?php echo $fullThemeUrl; ?>" title="Click Here">Click Here</a> to get the full version of tMuzz theme.
							</div>
							
							<table class="form-table"><tbody><tr><tr><th scope="row"><label for="twitter">Twitter</label></th><td><input disabled type="text" value="https://twitter.com/tishonator" name="twitter" id="twitter" class="regular-text"><br><span class="description">Place your Twitter page url and the Twitter icon will appear. To remove it, just leave it blank.</span></td></tr><tr><th scope="row"><label for="linkedin">LinkedIn</label></th><td><input disabled type="text" value="http://www.linkedin.com/company/tishonator" name="linkedin" id="linkedin" class="regular-text"><br><span class="description">Place your LinkedIn page url and the LinkedIn icon will appear. To remove it, just leave it blank.</span></td></tr><tr><th scope="row"><label for="instagram">Instagram</label></th><td><input disabled type="text" value="http://instagram.com" name="instagram" id="instagram" class="regular-text"><br><span class="description">Place your Instagram page url and the Instagram icon will appear. To remove it, just leave it blank.</span></td></tr><tr><th scope="row"><label for="tumblr">Tumblr</label></th><td><input disabled type="text" value="https://www.tumblr.com/" name="tumblr" id="tumblr" class="regular-text"><br><span class="description">Place your Tumblr page url and the Tumblr icon will appear. To remove it, just leave it blank.</span></td></tr></tbody></table>
							
						</div>

						<p class="submit">  
							<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>   <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'tishonator' ) ?>" />  
						</p>
<?php
					elseif ( $active_tab == 'tab_lightbox' ) :
?>
						<h3>Lightbox Settings</h3>

						<div style="background-color:#CCCCCC;padding:10px;">
							<div>
								These options are available in the full version only. <a href="<?php echo $fullThemeUrl; ?>" title="Click Here">Click Here</a> to get the full version of tMuzz theme.
							</div>
							
							<table class="form-table"><tbody><tr><th scope="row"><label for="enablelightbox">Enable Lightbox Functionality</label></th><td><input disabled type="checkbox" name="enablelightbox" id="enablelightbox"><br><span class="description">Globally Enable Lightbox functionality</span></td></tr><tr><th scope="row"><label for="enableonhomepage">Enable on Home Page</label></th><td><input disabled type="checkbox" name="enableonhomepage" id="enableonhomepage"><br><span class="description">Enable Lightbox on Home Page of your website</span></td></tr><tr><th scope="row"><label for="enableonindexpage">Enable on Blog Index Page</label></th><td><input disabled type="checkbox" name="enableonindexpage" id="enableonindexpage"><br><span class="description">Enable Lightbox on blog posts index page of your website</span></td></tr><tr><th scope="row"><label for="enableonposts">Enable on Posts</label></th><td><input disabled type="checkbox" name="enableonposts" id="enableonposts"><br><span class="description">Enable Lightbox on Posts</span></td></tr><tr><th scope="row"><label for="enableonpages">Enable on Pages</label></th><td><input disabled type="checkbox" name="enableonpages" id="enableonpages"><br><span class="description">Enable Lightbox on Pages</span></td></tr><tr><th scope="row"><label for="enableonarchives">Enable on Archive</label></th><td><input disabled type="checkbox" name="enableonarchives" id="enableonarchives"><br><span class="description">Enable Lightbox on Archive Pages (categories, tags, etc.)</span></td></tr><tr><th scope="row"><label for="groupitems">Group Items</label></th><td><input disabled type="checkbox" name="groupitems" id="groupitems"><br><span class="description">Group Items (for displaying as a slideshow)</span></td></tr></tbody></table>
						</div>
						<p class="submit">  
							<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>  
						</p>
<?php						
					elseif ( $active_tab == 'tab_thumbnails' ) :
?>
						<h3>Thumbnails Settings</h3>
						
						<div style="background-color:#CCCCCC;padding:10px;">
							<div>
								These options are available in the full version only. <a href="<?php echo $fullThemeUrl; ?>" title="Click Here">Click Here</a> to get the full version of tMuzz theme.
							</div>
							
							<table class="form-table"><tbody><tr><th scope="row"><label for="thumbnails_enablethumbnails">Enable Thumbnails Functionality</label></th><td><input disabled type="checkbox" checked="checked" value="1" name="thumbnails_enablethumbnails" id="thumbnails_enablethumbnails"><br><span class="description">Globally Enable Thumbnails functionality</span></td></tr><tr><th scope="row"><label for="thumbnails_size">Display Image Size in Index Pages</label></th><td><select disabled name="thumbnails_size" id="thumbnails_size"><option value="none" style="padding-right: 10px;">none</option><option value="thumbnail" style="padding-right: 10px;">thumbnail</option><option value="medium" style="padding-right: 10px;">medium</option><option value="large" style="padding-right: 10px;">large</option><option selected="selected" value="full" style="padding-right: 10px;">full</option></select><br><span class="description">Select display thumbnail image size in Index Pages</span></td></tr><tr><th scope="row"><label for="thumbnails_linkthumbnails">Link Thumbnails</label></th><td><input disabled type="checkbox" checked="checked" value="1" name="thumbnails_linkthumbnails" id="thumbnails_linkthumbnails"><br><span class="description">Link Thumbnails to Single Post URLs</span></td></tr><tr><th scope="row"><label for="thumbnails_displayinsingle">Display in Single Post</label></th><td><input disabled type="checkbox" checked="checked" value="1" name="thumbnails_displayinsingle" id="thumbnails_displayinsingle"><br><span class="description">Display Thumbnail in Single Post</span></td></tr><tr><th scope="row"><label for="thumbnails_sizeinsinglepost">Display Image Size in Single Post</label></th><td><select disabled name="thumbnails_sizeinsinglepost" id="thumbnails_sizeinsinglepost"><option value="none" style="padding-right: 10px;">none</option><option value="thumbnail" style="padding-right: 10px;">thumbnail</option><option value="medium" style="padding-right: 10px;">medium</option><option value="large" style="padding-right: 10px;">large</option><option selected="selected" value="full" style="padding-right: 10px;">full</option></select><br><span class="description">Select display thumbnail image size in Single Post</span></td></tr></tbody></table>
						</div>
						
						<p class="submit">  
							<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>
						</p>
<?php						
					elseif ( $active_tab == 'tab_contacts' ) :
?>
						<h3>Contacts Settings</h3>
						
						<div style="background-color:#CCCCCC;padding:10px;">
							<div>
								These options are available in the full version only. <a href="<?php echo $fullThemeUrl; ?>" title="Click Here">Click Here</a> to get the full version of tMuzz theme.
							</div>
							
							<table class="form-table"><tbody><tr><th scope="row"><label for="googlemapcenterlatitude">Center Google Map Latitude</label></th><td><input disabled type="text" value="40.764229" name="googlemapcenterlatitude" id="googlemapcenterlatitude" class="regular-text"><br><span class="description">The latitude of the center of the google map in contact pages.</span></td></tr><tr><th scope="row"><label for="googlemapcenterlongitude">Center Google Map Longitude</label></th><td><input disabled type="text" value="-73.948134" name="googlemapcenterlongitude" id="googlemapcenterlongitude" class="regular-text"><br><span class="description">The longitude of the center of the google map in contact pages.</span></td></tr><tr><th scope="row"><label for="office1_name">Office #1 Name</label></th><td><input disabled type="text" value="Office No. 1" name="office1_name" id="office1_name" class="regular-text"><br><span class="description">The display name of office #1</span></td></tr><tr><th scope="row"><label for="office1_latitude">Office #1 Latitude</label></th><td><input disabled type="text" value="40.764229" name="office1_latitude" id="office1_latitude" class="regular-text"><br><span class="description">The latitude coordinate of office #1</span></td></tr><tr><th scope="row"><label for="office1_longitude">Office #1 Longitude</label></th><td><input disabled type="text" value="-73.948134" name="office1_longitude" id="office1_longitude" class="regular-text"><br><span class="description">The longitude coordinate of office #1</span></td></tr><tr><th scope="row"><label for="office1_address">Office #1 Address</label></th><td><input disabled type="text" value="1111 Main Street Anytown, USA" name="office1_address" id="office1_address" class="regular-text"><br><span class="description">The address of office #1</span></td></tr><tr><th scope="row"><label for="office1_phone">Office #1 Phone</label></th><td><input disabled type="text" value="1.111.111.111" name="office1_phone" id="office1_phone" class="regular-text"><br><span class="description">The phone of office #1</span></td></tr><tr><th scope="row"><label for="office1_email">Office #1 Email</label></th><td><input disabled type="text" value="office1@example.com" name="office1_email" id="office1_email" class="regular-text"><br><span class="description">The email of office #1</span></td></tr><tr><th scope="row"><label for="office2_name">Office #2 Name</label></th><td><input disabled type="text" value="Office No. 2" name="office2_name" id="office2_name" class="regular-text"><br><span class="description">The display name of office #2</span></td></tr><tr><th scope="row"><label for="office2_latitude">Office #2 Latitude</label></th><td><input disabled type="text" value="40.801375" name="office2_latitude" id="office2_latitude" class="regular-text"><br><span class="description">The latitude coordinate of office #2</span></td></tr><tr><th scope="row"><label for="office2_longitude">Office #2 Longitude</label></th><td><input disabled type="text" value="-74.051721" name="office2_longitude" id="office2_longitude" class="regular-text"><br><span class="description">The longitude coordinate of office #2</span></td></tr><tr><th scope="row"><label for="office2_address">Office #2 Address</label></th><td><input disabled type="text" value="2222 Main Street Anytown, USA" name="office2_address" id="office2_address" class="regular-text"><br><span class="description">The address of office #2</span></td></tr><tr><th scope="row"><label for="office2_phone">Office #2 Phone</label></th><td><input disabled type="text" value="1.222.222.222" name="office2_phone" id="office2_phone" class="regular-text"><br><span class="description">The phone of office #2</span></td></tr><tr><th scope="row"><label for="office2_email">Office #2 Email</label></th><td><input disabled type="text" value="office2@example.com" name="office2_email" id="office2_email" class="regular-text"><br><span class="description">The email of office #2</span></td></tr><tr><th scope="row"><label for="office3_name">Office #3 Name</label></th><td><input disabled type="text" value="Office No. 3" name="office3_name" id="office3_name" class="regular-text"><br><span class="description">The display name of office #3</span></td></tr><tr><th scope="row"><label for="office3_latitude">Office #3 Latitude</label></th><td><input disabled type="text" value="40.738062" name="office3_latitude" id="office3_latitude" class="regular-text"><br><span class="description">The latitude coordinate of office #3</span></td></tr><tr><th scope="row"><label for="office3_longitude">Office #3 Longitude</label></th><td><input disabled type="text" value="-74.132916" name="office3_longitude" id="office3_longitude" class="regular-text"><br><span class="description">The longitude coordinate of office #3</span></td></tr><tr><th scope="row"><label for="office3_address">Office #3 Address</label></th><td><input disabled type="text" value="3333 Main Street Anytown, USA" name="office3_address" id="office3_address" class="regular-text"><br><span class="description">The address of office #3</span></td></tr><tr><th scope="row"><label for="office3_phone">Office #3 Phone</label></th><td><input disabled type="text" value="1.333.333.333" name="office3_phone" id="office3_phone" class="regular-text"><br><span class="description">The phone of office #3</span></td></tr><tr><th scope="row"><label for="office3_email">Office #3 Email</label></th><td><input disabled type="text" value="office3@example.com" name="office3_email" id="office3_email" class="regular-text"><br><span class="description">The email of office #3</span></td></tr><tr><th scope="row"><label for="office4_name">Office #4 Name</label></th><td><input disabled type="text" value="Office No. 4" name="office4_name" id="office4_name" class="regular-text"><br><span class="description">The display name of office #4</span></td></tr><tr><th scope="row"><label for="office4_latitude">Office #4 Latitude</label></th><td><input disabled type="text" value="40.677422" name="office4_latitude" id="office4_latitude" class="regular-text"><br><span class="description">The latitude coordinate of office #4</span></td></tr><tr><th scope="row"><label for="office4_longitude">Office #4 Longitude</label></th><td><input disabled type="text" value="-74.004857" name="office4_longitude" id="office4_longitude" class="regular-text"><br><span class="description">The longitude coordinate of office #4</span></td></tr><tr><th scope="row"><label for="office4_address">Office #4 Address</label></th><td><input disabled type="text" value="4444 Main Street Anytown, USA" name="office4_address" id="office4_address" class="regular-text"><br><span class="description">The address of office #4</span></td></tr><tr><th scope="row"><label for="office4_phone">Office #4 Phone</label></th><td><input disabled type="text" value="1.444.444.444" name="office4_phone" id="office4_phone" class="regular-text"><br><span class="description">The phone of office #4</span></td></tr><tr><th scope="row"><label for="office4_email">Office #4 Email</label></th><td><input disabled type="text" value="office4@example.com" name="office4_email" id="office4_email" class="regular-text"><br><span class="description">The email of office #4</span></td></tr><tr><th scope="row"><label for="office5_name">Office #5 Name</label></th><td><input disabled type="text" value="Office No. 5" name="office5_name" id="office5_name" class="regular-text"><br><span class="description">The display name of office #5</span></td></tr><tr><th scope="row"><label for="office5_latitude">Office #5 Latitude</label></th><td><input disabled type="text" value="40.685884" name="office5_latitude" id="office5_latitude" class="regular-text"><br><span class="description">The latitude coordinate of office #5</span></td></tr><tr><th scope="row"><label for="office5_longitude">Office #5 Longitude</label></th><td><input disabled type="text" value="-73.812596" name="office5_longitude" id="office5_longitude" class="regular-text"><br><span class="description">The longitude coordinate of office #5</span></td></tr><tr><th scope="row"><label for="office5_address">Office #5 Address</label></th><td><input disabled type="text" value="5555 Main Street Anytown, USA" name="office5_address" id="office5_address" class="regular-text"><br><span class="description">The address of office #5</span></td></tr><tr><th scope="row"><label for="office5_phone">Office #5 Phone</label></th><td><input disabled type="text" value="1.555.555.555" name="office5_phone" id="office5_phone" class="regular-text"><br><span class="description">The phone of office #5</span></td></tr><tr><th scope="row"><label for="office5_email">Office #5 Email</label></th><td><input disabled type="text" value="office5@example.com" name="office5_email" id="office5_email" class="regular-text"><br><span class="description">The email of office #5</span></td></tr></tbody></table>
							
						</div>

						<p class="submit">  
							<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>  
						</p>
<?php
					elseif ( $active_tab == 'tab_notfound' ) :

						settings_fields( 'fmuzz_tishonator_notfound_settings' );
						do_settings_sections( 'fmuzz_tishonator_notfound_settings' );
?>
						<p class="submit">  
							<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>   <input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'tishonator' ) ?>" />  
						</p>
<?php						
					elseif ( $active_tab == 'tab_woocommerce' ) :
?>
						<h3>WooCommerce Settings</h3>
						<div style="background-color:#CCCCCC;padding:10px;">
							<div>
								These options are available in the full version only. <a href="<?php echo $fullThemeUrl; ?>" title="Click Here">Click Here</a> to get the full version of tMuzz theme.
							</div>
							<table class="form-table"><tbody><tr><th scope="row"><label for="tishonator_woocommerce_displaysidebar">Display WooCommerce Sidebar</label></th><td><input type="checkbox" checked="checked" value="1" name="tishonator_woocommerce_settings[tishonator_woocommerce_displaysidebar]" id="tishonator_woocommerce_displaysidebar" disabled><br><span class="description">Display WooCommerce sidebar in products pages</span></td></tr><tr><th scope="row"><label for="tishonator_woocommerce_productsperpage">Products per Page</label></th><td><input type="number" value="10" name="tishonator_woocommerce_settings[tishonator_woocommerce_productsperpage]" id="tishonator_woocommerce_productsperpage" pattern="\d*" class="regular-text" disabled><br><span class="description">The number of products diplayed per page</span></td></tr></tbody></table>
						</div>
						<p class="submit">  
							<a href="<?php echo $fullThemeUrl; ?>" title="Get tMuzz Theme" class="button-primary">Get tMuzz Theme</a>  
						</p>
<?php
					endif; ?>    
				</form>
		<?php endif; ?>
    </div>
<?php
}

/**
 * Function to register the settings
 */
function tishonator_register_general_settings() {
	$options = get_option( 'fmuzz_tishonator_general_settings' );  
	if ( $options === false ) :
		// add default general settings
		$options = array(
					'tishonator_general_favicon' => get_stylesheet_directory_uri().'/favicon.ico',
				   );
		add_option( 'fmuzz_tishonator_general_settings', $options );
	endif;

	register_setting( 'fmuzz_tishonator_general_settings', 'fmuzz_tishonator_general_settings' );
					 
	add_settings_section( 'tishonator_general_options_section', __( 'General Settings', 'tishonator' ),
						  'tishonator_display_general_settings_section', 'fmuzz_tishonator_general_settings' );
	
	// Add favicon
	$field_args = array( 'type'        => 'image',
						 'id'          => 'tishonator_general_favicon',
						 'name'        => 'tishonator_general_favicon',
						 'desc'        => __( 'Favicon for your website', 'tishonator' ),
						 'std'         => '',
						 'label_for'   => 'tishonator_general_favicon',
						 'option_name' => 'fmuzz_tishonator_general_settings',
					   );

	add_settings_field( 'tishonator_general_favicon_image', __( 'Favicon', 'tishonator' ), 'tishonator_display_setting',
				'fmuzz_tishonator_general_settings', 'tishonator_general_options_section', $field_args );
}

function tishonator_register_header_settings() {

	$options = get_option( 'fmuzz_tishonator_header_settings' );  
	if ( $options === false ) {
		// add default header settings
		$options = array (  
					'tishonator_header_logo' 				=> get_stylesheet_directory_uri().'/images/logo.png',
					);	
		add_option( 'fmuzz_tishonator_header_settings', $options );
	}
	
	register_setting( 'fmuzz_tishonator_header_settings', 'fmuzz_tishonator_header_settings' );
					 
	add_settings_section( 'tishonator_header_options_section', __( 'Header Settings', 'tishonator' ),
		'tishonator_display_header_settings_section', 'fmuzz_tishonator_header_settings');

	// Add logo image
	$field_args = array( 'type'        => 'image',
						 'id'          => 'tishonator_header_logo',
						 'name'        => 'tishonator_header_logo',
						 'desc'        => __( 'Upload a custom logo for your website.', 'tishonator' ),
						 'std'         => '',
						 'label_for'   => 'tishonator_header_logo',
						 'option_name' => 'fmuzz_tishonator_header_settings',
					   );

	add_settings_field( 'tishonator_header_logo_image', __( 'Logo image', 'tishonator' ), 'tishonator_display_setting',
				'fmuzz_tishonator_header_settings', 'tishonator_header_options_section', $field_args );
}

function tishonator_register_footer_settings() {
	$options = get_option( 'fmuzz_tishonator_footer_settings' );  
	if ( $options === false ) {
		// add default footer settings
		$options = array(
			'tishonator_footer_copyrighttext' =>  'Copyright &copy; 2014 YourSite.com. All Rights Reserved.',
		);

		add_option( 'fmuzz_tishonator_footer_settings', $options );
	}
	
	register_setting( 'fmuzz_tishonator_footer_settings', 'fmuzz_tishonator_footer_settings' );
	
	add_settings_section( 'tishonator_footer_options_section', __( 'Footer Settings', 'tishonator' ),
		'tishonator_display_footer_settings_section', 'fmuzz_tishonator_footer_settings');
	
	$field_args = array( 'type'        => 'text',
						 'id'          => 'tishonator_footer_copyrighttext',
						 'name'        => 'tishonator_footer_copyrighttext',
						 'desc'        => __( 'Your Copyright text to appear in the website footer', 'tishonator' ),
						 'std'         => '',
						 'label_for'   => 'tishonator_footer_copyrighttext',
						 'option_name' => 'fmuzz_tishonator_footer_settings',
					   );

	add_settings_field( 'tishonator_footer_copyrighttext_text', __( 'Copyright Text', 'tishonator' ), 'tishonator_display_setting',
				'fmuzz_tishonator_footer_settings', 'tishonator_footer_options_section', $field_args );
}

function tishonator_register_slider_settings() {
	$options = get_option( 'fmuzz_tishonator_slider_settings' );  
	if ( $options === false ) {
		// Add default home page settings
		$options = array(
			// Slide #1 default settings
			'tishonator_slider_slide1_content' 	   		=> '<h2>Lorem ipsum dolor</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a class="btn" title="Read more" href="#">Read more</a>',
			'tishonator_slider_slide1_image'	   		=> get_stylesheet_directory_uri().'/images/slider/1.jpg',
			
			// Slide #2 default settings
			'tishonator_slider_slide2_content' 	   		=> '<h2>Everti Constituam</h2><p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><a class="btn" title="Read more" href="#">Read more</a>',
			'tishonator_slider_slide2_image'	   		=> get_stylesheet_directory_uri().'/images/slider/2.jpg',
			
			// Slide #3 default settings
			'tishonator_slider_slide3_content' 	   		=> '<h2>Id Essent Cetero</h2><p>Quodsi docendi sed id. Ea eam quod aliquam epicurei, qui tollit inimicus partiendo cu ei. Nisl consul expetendis at duo, mea ea ceteros constituam.</p><a class="btn" title="Read more" href="#">Read more</a>',
			'tishonator_slider_slide3_image' 	   		=> get_stylesheet_directory_uri().'/images/slider/3.jpg',
		);
		add_option( 'fmuzz_tishonator_slider_settings', $options );
	}
	
	register_setting( 'fmuzz_tishonator_slider_settings', 'fmuzz_tishonator_slider_settings' );
					 
	add_settings_section( 'tishonator_slider_options_section', __( 'Slider Settings', 'tishonator' ),
		'tishonator_display_slider_settings_section', 'fmuzz_tishonator_slider_settings');

	$field_args = array( 'type'        => 'textarea',
					 'id'          => 'tishonator_slider_slide1_content',
					 'name'        => 'tishonator_slider_slide1_content',
					 'desc'        => 'Slide #1 content in the slider',
					 'std'         => '',
					 'label_for'   => 'tishonator_slider_slide1_content',
					 'option_name' => 'fmuzz_tishonator_slider_settings',
				   );

	add_settings_field( 'tishonator_slider_slide1_content_textarea', 'Slide #1 Content', 'tishonator_display_setting',
			'fmuzz_tishonator_slider_settings', 'tishonator_slider_options_section', $field_args );

	$field_args = array( 'type'        => 'image',
					 'id'          => 'tishonator_slider_slide1_image',
					 'name'        => 'tishonator_slider_slide1_image',
					 'desc'        => 'Upload a custom Slide #1 Background image for the slider.',
					 'std'         => '',
					 'label_for'   => 'tishonator_slider_slide1_image',
					 'option_name' => 'fmuzz_tishonator_slider_settings',
				   );

	add_settings_field( 'tishonator_slider_slide1_image_image', 'Slide #1 Background Image', 'tishonator_display_setting',
			'fmuzz_tishonator_slider_settings', 'tishonator_slider_options_section', $field_args );
			
	$field_args = array( 'type'        => 'textarea',
					 'id'          => 'tishonator_slider_slide2_content',
					 'name'        => 'tishonator_slider_slide2_content',
					 'desc'        => 'Slide #2 content in the slider',
					 'std'         => '',
					 'label_for'   => 'tishonator_slider_slide2_content',
					 'option_name' => 'fmuzz_tishonator_slider_settings',
				   );

	add_settings_field( 'tishonator_slider_slide2_content_textarea', 'Slide #2 Content', 'tishonator_display_setting',
			'fmuzz_tishonator_slider_settings', 'tishonator_slider_options_section', $field_args );

	$field_args = array( 'type'        => 'image',
					 'id'          => 'tishonator_slider_slide2_image',
					 'name'        => 'tishonator_slider_slide2_image',
					 'desc'        => 'Upload a custom Slide #2 Background image for the slider.',
					 'std'         => '',
					 'label_for'   => 'tishonator_slider_slide2_image',
					 'option_name' => 'fmuzz_tishonator_slider_settings',
				   );

	add_settings_field( 'tishonator_slider_slide2_image_image', 'Slide #2 Background Image', 'tishonator_display_setting',
			'fmuzz_tishonator_slider_settings', 'tishonator_slider_options_section', $field_args );
	
	$field_args = array( 'type'        => 'textarea',
					 'id'          => 'tishonator_slider_slide3_content',
					 'name'        => 'tishonator_slider_slide3_content',
					 'desc'        => 'Slide #3 content in the slider',
					 'std'         => '',
					 'label_for'   => 'tishonator_slider_slide3_content',
					 'option_name' => 'fmuzz_tishonator_slider_settings',
				   );

	add_settings_field( 'tishonator_slider_slide3_content_textarea', 'Slide #3 Content', 'tishonator_display_setting',
			'fmuzz_tishonator_slider_settings', 'tishonator_slider_options_section', $field_args );


	$field_args = array( 'type'        => 'image',
					 'id'          => 'tishonator_slider_slide3_image',
					 'name'        => 'tishonator_slider_slide3_image',
					 'desc'        => 'Upload a custom Slide #3 Background image for the slider.',
					 'std'         => '',
					 'label_for'   => 'tishonator_slider_slide3_image',
					 'option_name' => 'fmuzz_tishonator_slider_settings',
				   );

	add_settings_field( 'tishonator_slider_slide3_image_image', 'Slide #3 Background Image', 'tishonator_display_setting',
			'fmuzz_tishonator_slider_settings', 'tishonator_slider_options_section', $field_args );
}

function tishonator_register_social_settings() {

	$options = get_option( 'fmuzz_tishonator_social_settings' );  
	if ( $options === false ) {
		// add default social settings
		$options = array (  
							'tishonator_social_facebook'   => 	'https://www.facebook.com/tishonator',
							'tishonator_social_googleplus' => 	'https://plus.google.com/+tishonator',
							'tishonator_social_rss' 	   => 	get_bloginfo( 'rss2_url' ),
							'tishonator_social_youtube'    => 	'http://www.youtube.com/',	
						  );	
		add_option( 'fmuzz_tishonator_social_settings', $options );
	}

    register_setting( 'fmuzz_tishonator_social_settings', 'fmuzz_tishonator_social_settings' );

	add_settings_section( 'tishonator_social_sites_section', __( 'Social Websites', 'tishonator' ),
		'tishonator_display_social_settings_section', 'fmuzz_tishonator_social_settings' );
		
	$field_args = array( 'type'        => 'text',
					 'id'          => 'tishonator_social_facebook',
					 'name'        => 'tishonator_social_facebook',
					 'desc'        => 'Place your Facebook page url and the Facebook icon will appear. To remove it, just leave it blank.',
					 'std'         => '',
					 'label_for'   => 'tishonator_social_facebook',
					 'option_name' => 'fmuzz_tishonator_social_settings',
				   );

	add_settings_field( 'tishonator_social_facebook_text', 'Facebook', 'tishonator_display_setting',
			'fmuzz_tishonator_social_settings', 'tishonator_social_sites_section', $field_args );
			
	$field_args = array( 'type'        => 'text',
					 'id'          => 'tishonator_social_googleplus',
					 'name'        => 'tishonator_social_googleplus',
					 'desc'        => 'Place your Google+ page url and the Google+ icon will appear. To remove it, just leave it blank.',
					 'std'         => '',
					 'label_for'   => 'tishonator_social_googleplus',
					 'option_name' => 'fmuzz_tishonator_social_settings',
				   );

	add_settings_field( 'tishonator_social_googleplus_text', 'Google+', 'tishonator_display_setting',
			'fmuzz_tishonator_social_settings', 'tishonator_social_sites_section', $field_args );
			
	$field_args = array( 'type'        => 'text',
					 'id'          => 'tishonator_social_rss',
					 'name'        => 'tishonator_social_rss',
					 'desc'        => 'Place your RSS Feeds page url and the RSS Feeds icon will appear. To remove it, just leave it blank.',
					 'std'         => '',
					 'label_for'   => 'tishonator_social_rss',
					 'option_name' => 'fmuzz_tishonator_social_settings',
				   );

	add_settings_field( 'tishonator_social_rss_text', 'RSS Feeds', 'tishonator_display_setting',
			'fmuzz_tishonator_social_settings', 'tishonator_social_sites_section', $field_args );
	
	$field_args = array( 'type'    => 'text',
					 'id'          => 'tishonator_social_youtube',
					 'name'        => 'tishonator_social_youtube',
					 'desc'        => 'Place your YouTube channel page url and the YouTube channel icon will appear. To remove it, just leave it blank.',
					 'std'         => '',
					 'label_for'   => 'tishonator_social_youtube',
					 'option_name' => 'fmuzz_tishonator_social_settings',
				   );

	add_settings_field( 'tishonator_social_youtube_text', 'YouTube channel', 'tishonator_display_setting',
			'fmuzz_tishonator_social_settings', 'tishonator_social_sites_section', $field_args );	
}

function tishonator_register_notfound_settings() {

	$options = get_option( 'fmuzz_tishonator_notfound_settings' );  
	if ( $options === false ) {
		// add default Not Found settings
		$options = array (  
					'tishonator_notfound_image'	=> get_stylesheet_directory_uri().'/images/404.png',
					'tishonator_notfound_title'	=> 'Error 404: Not Found',
					'tishonator_notfound_content'	=> '<p>Sorry. The page you are looking for does not exist.</p>',
					);	
		add_option( 'fmuzz_tishonator_notfound_settings', $options );
	}
	
	register_setting( 'fmuzz_tishonator_notfound_settings', 'fmuzz_tishonator_notfound_settings' );
					 
	add_settings_section( 'tishonator_notfound_options_section', __( 'Error 404 Not Found Page Settings', 'tishonator' ),
		'tishonator_display_notfound_settings_section', 'fmuzz_tishonator_notfound_settings');

	// Add 404 image
	$field_args = array( 'type'    => 'image',
					 'id'          => 'tishonator_notfound_image',
					 'name'        => 'tishonator_notfound_image',
					 'desc'        => __( 'Upload a custom image for your 404 Not Found Page.', 'tishonator' ),
					 'std'         => '',
					 'label_for'   => 'tishonator_notfound_image',
					 'option_name' => 'fmuzz_tishonator_notfound_settings',
				   );

	add_settings_field( 'tishonator_notfound_image_text', __( 'Image', 'tishonator' ), 'tishonator_display_setting',
			'fmuzz_tishonator_notfound_settings', 'tishonator_notfound_options_section', $field_args );
				   
	// Add title
	$field_args = array( 'type'    => 'text',
					 'id'          => 'tishonator_notfound_title',
					 'name'        => 'tishonator_notfound_title',
					 'desc'        => __( 'The Title to appear in the 404 Not Found Page', 'tishonator' ),
					 'std'         => '',
					 'label_for'   => 'tishonator_notfound_title',
					 'option_name' => 'fmuzz_tishonator_notfound_settings',
				   );

	add_settings_field( 'tishonator_notfound_title_text', __( 'Title', 'tishonator' ), 'tishonator_display_setting',
			'fmuzz_tishonator_notfound_settings', 'tishonator_notfound_options_section', $field_args );

	// Add content
	$field_args = array( 'type'    => 'textarea',
					 'id'          => 'tishonator_notfound_content',
					 'name'        => 'tishonator_notfound_content',
					 'desc'        => __( 'The Content to appear in the 404 Not Found Page', 'tishonator' ),
					 'std'         => '',
					 'label_for'   => 'tishonator_notfound_content',
					 'option_name' => 'fmuzz_tishonator_notfound_settings',
				   );

	add_settings_field( 'tishonator_notfound_content_textarea', __( 'Content', 'tishonator' ), 'tishonator_display_setting',
			'fmuzz_tishonator_notfound_settings', 'tishonator_notfound_options_section', $field_args );
}

/**
 * Function to add extra text to display on each section
 */
function tishonator_display_general_settings_section() {
}

function tishonator_display_header_settings_section() {
}

function tishonator_display_footer_settings_section() {
}

function tishonator_display_homepage_settings_section() {
}

function tishonator_display_slider_settings_section() {
}

function tishonator_display_social_settings_section() {
}

function tishonator_display_notfound_settings_section() {
}

function tishonator_add_select_settings_option($type, $id, $desc, $settingsKey, $title, $section, $values) {		   
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

	add_settings_field( $id.'_'.$type, $title, 'tishonator_display_setting', $settingsKey, $section, $field_args );
}

/**
 * Function to display the settings on the page
 * This is setup to be expandable by using a switch on the type variable.
 * In future you can add multiple types to be display from this function,
 * Such as checkboxes, select boxes, file upload boxes etc.
 */
 $sendToEditorAdded = false;
function tishonator_display_setting( $args ) {

	extract( $args );

    $options = get_option( $option_name );
	
	if ( $options !== false && array_key_exists( $id, $options ) ) {
	
		$options[$id] = stripslashes( $options[$id] );  
        $options[$id] = esc_attr( $options[$id] );
	}
	
	$optionsId = ( $options !== false && array_key_exists( $id, $options ) )
							? $options[ $id ] : '';
				
    switch ( $type ) {  
          case 'text':
              echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$optionsId' />";  
              echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";  
          break;
		  
		  case 'textarea':    
              echo "<textarea rows='4' cols='50' id='$id' name='" . $option_name . "[$id]'>".$optionsId.'</textarea>';  
              echo ( $desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";  
          break;
		  
		  case 'image':
		  
		  	  echo "<input type='text' id='$id' name='".$option_name."[$id]' value='$optionsId' class='regular-text' />";  
        	  echo '<input id="'.$id.'_uploadBtn" type="button" value="Upload" />';
			  echo ($desc != '' ) ? "<br /><span class='description'>$desc</span>" : "";
			  if ( $optionsId != '' ) {			  
			  	echo '<br /><p><img id="'.$id.'_preview" src="'.$optionsId.'" /></p>';
			  } 
			  ?>
			  <script type="text/javascript">
			    jQuery(document).ready(function($) {
				$( '#<?php echo $id; ?>_uploadBtn' ).click(function() {
					imgUploadSouceId = '#<?php echo $id; ?>';
					tb_show( 'Upload an image', 'media-upload.php?referer=<?php echo 'tishonator_options.php'; ?>&type=image&TB_iframe=true&post_id=0', false);  
					return false;  
				   });
				});	
				<?php if ( !isset( $sendToEditorAdded ) || !$sendToEditorAdded ) {
						$sendToEditorAdded = true; ?>
				var imgUploadSouceId;			
				jQuery(document).ready(function($) {
						window.send_to_editor = function(html) { 					
						var image_url = $( 'img',html).attr( 'src' );
						$(imgUploadSouceId).val(image_url);  
						$(imgUploadSouceId.concat( '_preview' )).attr("src", image_url);
						tb_remove();
					   }
					});
				<?php } ?>
			 </script>
			  <?php
		  break;
    }
}

/******************************
  Add WP javascript libraries used for image upload
******************************/ 
function tishonator_settings_enqueue_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'thickbox' );
    wp_enqueue_style( 'thickbox' );
    wp_enqueue_script( 'media-upload' );
    wp_enqueue_script( 'wptuts-upload' );
}
add_action( 'admin_enqueue_scripts', 'tishonator_settings_enqueue_scripts' );

/******************************
  Change 'Insert into Post' test in WP media upload dialog
******************************/
function tishonator_image_options_setup() {  
    global $pagenow;  
  
    if ( 'media-upload.php' == $pagenow || 'async-upload.php' == $pagenow ) {  
        // Now we'll replace the 'Insert into Post Button' inside Thickbox  
        add_filter( 'gettext', 'tishonator_replace_thickbox_text', 1, 3 ); 
    } 
} 
add_action( 'admin_init', 'tishonator_image_options_setup' ); 
 
function tishonator_replace_thickbox_text( $translated_text, $text, $domain ) {
    if ( 'Insert into Post' == $text ) {
        $referer = strpos( wp_get_referer(), 'tishonator_options.php' ); 
        if ( $referer != '' ) { 
            return 'Select Image';  
        }  
    }
    return $translated_text;  
}

?>