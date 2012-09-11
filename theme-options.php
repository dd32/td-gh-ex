<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

?>
<?php
add_action('admin_init', 'semperfi_theme_options_init');
add_action('admin_menu', 'semperfi_theme_options_add_page');


/**
 * A safe way of adding JavaScripts to a WordPress generated page.
 */
function semperfi_admin_enqueue_scripts( $hook_suffix ) {
	wp_enqueue_style('semperfi-theme-options', get_template_directory_uri() . '/theme-options.css', false, '1.0');
	wp_enqueue_script('semperfi-theme-options', get_template_directory_uri() . '/theme-options.js', array('jquery'), '1.0');
}
add_action('admin_print_styles-appearance_page_theme_options', 'semperfi_admin_enqueue_scripts');

/**
 * Init plugin options to white list our options
 */
function semperfi_theme_options_init() {
    register_setting('semperfi_options', 'semperfi_theme_options', 'semperfi_theme_options_validate');
}

/**
 * Load up the menu page
 */
function semperfi_theme_options_add_page() {
    add_theme_page(__('Theme Options', 'semperfi'), __('Theme Options', 'semperfi'), 'edit_theme_options', 'theme_options', 'semperfi_theme_options_do_page');
}
	
// Create the options page
function semperfi_theme_options_do_page() {
	
	if (!isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;
	?>

        <?php
        /**
         * < 3.4 Backward Compatibility
         */
        ?>
        
		<?php if (false !== $_REQUEST['settings-updated']) : ?>
		<div class="updated fade"><p><strong><?php _e('Options Saved', 'semperfi'); ?></strong></p></div>
		<?php endif; ?>
    
    <form method="post" action="options.php">    
	<?php settings_fields('semperfi_options'); ?>
	<?php $options = get_option('semperfi_theme_options'); ?>
    
    <div class="cover">
    
    <div id="header">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customize.png">
    </div>
    
    <div id="banner"></div>
    
    <div id="center">
	<div id="floatfix">

<div class="reading">
    <div class="spacing"></div>
<h3 class="title"><span>Please Read</br>This Page!</span>Thanks for Choosing Semper Fi!</h3>
	<span class="content"><p>Thank you for using my theme "Semper Fi" because without you I wouldn't be able to make these beautiful themes for WordPress. I dedicate this theme to my Grandfather, Eldon Schwarz, for his strength and courage in WWII. He is the sole survivor of the crew aboard the B17 Flying Fortress #44-6349, of the 483rd Bombardment Group, in the 840th Bomb Squadron and a prisoner of war from August 7, 1943 to November 5, 1945. I miss you Grandpa.</p>
<p>This theme began with me reading a newspaper from May 8, 1945. Just holding it I could sense that a lot time and planning went into simple things like font, layout, and especially choosing the paper's material. I marveled at the quality that clearly went into this paper. Even with how old the newspaper was, it makes modern newspapers just seem like a mere shadow of themselves clinging to their former glory.</p>
<p>Because of that I decided that I had to create a theme that feels like a newspaper, rich with details and fine quality. From hidden luxurious floral patterns, images that create the nostalgia of finely crafted paper, to incredibly detailed shadowing, but most importantly, the ability to respond to any width screen. "Semper Fi" is a completely flexible theme able to stretch from 300 pixels wide, all the way to 1920 and beyond. Images, galleries, quotes, text, titles, they all move fluidly to respond to any thing you through at it.</p>
</span>

<h3 class="title"><a href="http://schwarttzy.com/shop/semper-fi/"><span>Only</br>$15.00</span>Support Semper Fi</a></h3>
    <span class="content"><p>Semper Fi is considered an "Up-Vert Theme," meaning that it is first and foremost a completely free theme, but with that said, some of the additional features remain unusable until you support the theme. Once you have successfully supported the theme I provide unlimited access to free updates and downloads. These additional features require that you download and install the standard version of the theme <a href="http://schwarttzy.com/shop/semper-fi/">Semper Fi</a> on your WordPress installation. The standard version can only be downloaded after successfully supporting Semper Fi, if you run into a problem contact me with <a href="http://schwarttzy.com/about-2/">this form</a>. Finally, look for an Email that is from "Schwarttzy.com," not the PayPal, and in that email is transaction number so you can active the theme. Active Semper Fi standard by copying and pasting the transaction number in the Activation field on the Theme Options page. Finally click save and you will have all the extra features for life. If you have trouble finding the Theme Option page is generally located at http://yourwebsite.com/wp-admin/themes.php?page=theme_options but I have also added a link in the admin bar at the top of the screen.</p>
			<table>
            <tr>
            	<th class="alignleft">Semper Fi Theme Features</th> <th>Free</th> <th>Premium</th>
            </tr>
            <tr>
            	<td class="alignleft">100% Responsive WordPress Theme</td> <td>&#9733;</td> <td>&#9733;</td>
			</tr>
            <tr>
            	<td class="alignleft">Clean and Beatiful Stylized HTML, CSS, JavaScript</td> <td>&#9733;</td> <td>&#9733;</td>
            </tr>
            <tr>
            	<td class="alignleft">Featured Images for Posts &#38; Pages</td> <td>&#9733;</td> <td>&#9733;</td>
            </tr>
            <tr>
            	<td class="alignleft">Multiple Menu Banner Images to Choose (To be Implemented in Future Update)</td> <td>&#9733;</td> <td>&#9733;</td>
            </tr>
            <tr>
            	<td class="alignleft">Upload Your Own Background Image</td> <td>&#9733;</td> <td>&#9733;</td>
            </tr>
            <tr>
            	<td class="alignleft">Upload Your Own Logo (To be Implemented in Future Update)</td> <td></td> <td>&#9733;</td>
            </tr>
            <tr>
            	<td class="alignleft">Choose you own Hyper Link Color (To be Implemented in Future Update)</td> <td></td> <td>&#9733;</td>
            </tr>
            <tr>
            	<td class="alignleft">Favicon to be Easily Implemented on Your Website</td> <td></td> <td>&#9733;</td>
            </tr>
            <tr>
            	<td class="alignleft">Quickly Add Customize CSS to The Theme Uneffected by Updates</td> <td></td> <td>&#9733;</td>
            </tr>
            	<td class="alignleft">The Ablity to use Custom Fonts from Typekit</td> <td></td> <td>&#9733;</td>
            </tr>
            <tr>
            	<td class="alignleft">Personal Support on Technical Issues You May Run Into</td> <td></td> <td>&#9733;</td>
            </tr>
            <tr>
            	<td class="alignleft">Remove my Mark from the Footer (To be Implemented in Future Update)</td> <td></td> <td>&#9733;</td>
            </tr>
            </table>
            <p><a href="http://schwarttzy.com/shop/semper-fi/">Support Semper Fi to enable this Feature.</a></p>
	</span>

<h3 class="title">Personalize The Backgrounds</h3>
	<span class="content"><p>Click the link below to be taken to the page where you can upload your own Backgound image, but please read this section first because I have some recommendations that will help you to display the image exactly how you want.</p>
    <table>
    <tr><td class="alignleft">If you have the ablity, reduce the quality of the phot until it is about 400 Kilobytes or less, email me if you can't.</td></tr>
    <tr><td class="alignleft">The image should be resized to 1920 pixels wide and 1080 pixels tall for best all around display.</td></tr>
    <tr><td class="alignleft">Once the image is uploaded make sure to select "<b>Position</b>: <b>Center</b>," "<b>Repeat</b>: <b>No Repeat</b>," and "<b>Attachment</b>: <b>Fixed</b>"</td></tr>
    </table>
    <p> <?php printf('<a href="%s">Customize Background</a>', admin_url('themes.php?page=custom-background')); ?></p></span>

<h3 class="title">Add your own Favicon</h3>
	<span class="content"><p>A Favicon, also know as a Bookmark Icon, is a small icon that is generally 16x16 pixles used to help by give a visual aid to a browser tab. If you happen to need help creating a favicon for your website I recommend that you visit the website "<a href="http://www.favicon.cc/">Favicon.CC</a>" to generate your own. Once you have your favicon upload it to your website and then include the full address for the favicon to properly link.
   	<p><a href="http://schwarttzy.com/shop/semper-fi/">Support Semper Fi to enable this Feature.</a></p>
	</span>
<h3 class="title">Typekit Fonts</h3>
	<span class="content"><p>With this section you can add professional quality fonts to your website easily. Start by setting up an account at <a href="https://typekit.com/">Typekit by Adobe</a> to begin adding custom fonts your theme. To easily link a font through-out the entire website, select it by using "<b>body</b>" as the CSS selector. If you want have custom font for the Title and Slogan use the CSS Selector "<b>#header h1</b>" for title and "<b>#header h1 i</b>" for the slogan. Once finished setting up the CSS selectors click the embed and look for the <b>Typekit Kit ID</b>. If you're having any trouble with this have a quick read of <a href="http://help.typekit.com/customer/portal/articles/6848-using-typekit-with-typepad">Typekit's Help Page</a>.</p>
	<p><a href="http://schwarttzy.com/shop/semper-fi/">Support Semper Fi to enable this Feature.</a></p>
	</span>
<h3 class="title">Custom CSS</h3>
	<span class="content"><p>If you need additional customization to the theme use the css section here. Don't worry about backing this code up with updates becuase it will be carried over automatically. Note that you do not need to include the "<span class="red">&lt;style type="text/css" media="screen"&gt;</span>" or "<span class="red">&lt;/style&gt;</span>" because I have already encoded it into the theme for you. If you need help or would like to learn how to work with CSS Stylizations I personally recommend "<a href="https://developer.mozilla.org/en/CSS">Mozilla Developer Network</a>" and "<a href="http://css-tricks.com/">CSS-Tricks</a>" for great learning resources, but there is many more great website to learn from too.</p>
    <p><a href="http://schwarttzy.com/shop/semper-fi/">Support Semper Fi to enable this Feature.</a></p>
	</span>
	</div>
    
    </div>
    </div>
    
    </div>
    </form> 
<?php }

// Sanitize and validate input. Accepts an array, return a sanitized array.
function semperfi_theme_options_validate($input) {
	
	//Empty for right now, let's get the theme approved before I start adding options
	
    return $input;
}