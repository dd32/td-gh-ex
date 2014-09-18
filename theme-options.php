<?php

// Default options values

$badeyes_options = array(
'footer_copyright' => 'Copyright Since (start date goes here)',
'intro_text' => '<h1>Add Title Here</h1><p>put text here</p>',
'single_text' => '<h1>Add Title Here</h1><p>put text here</p>',
'page_text' => '<h1>Add Title Here</h1><p>put text here</p>',
'header_style' => '',
'featured_title' => 'Featured Content',
'blog_title' => 'Latest Headlines',
'side_heading' => 'Side Menu',
'side_nav' => 'Side Menu',
'author_credits' => true );

if ( is_admin() ) : // Load only if we are viewing an admin page

function badeyes_register_settings() {

// Register settings and call sanitation functions

register_setting( 'badeyes_theme_options', 'badeyes_options', 'badeyes_validate_options' );

}
add_action( 'admin_init', 'badeyes_register_settings' );
function badeyes_theme_options() {
// Add theme options page to the addmin menu

add_theme_page( 'Badeyes Theme Options', 'Badeyes Theme Options', 'edit_theme_options', 'theme_options', 'badeyes_theme_options_page' );
}
add_action( 'admin_menu', 'badeyes_theme_options' );
// Function to generate options page
function badeyes_theme_options_page() {
global $badeyes_options, $badeyes_categories, $badeyes_layouts;

if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. ?>
<div class="wrap">
<h1>Badeyes Theme Options</h1>
<p>Use this area to add or remove items from the front end of the site.</p> 
<p>You can use HTML in the edit boxes, but especially in the Intro Text area, if you do not then it will not render properly on the front end.</p>
<form method="post" action="options.php">
<?php $settings = get_option( 'badeyes_options', $badeyes_options ); ?>
<?php settings_fields( 'badeyes_theme_options' );
/* This function outputs some hidden fields required by the form,
including a nonce, a unique number used to ensure the form has been submitted from the admin page
 important for security */ ?>
<h2>CSS Styles</h2>
<p>If you know how to write css then use the area below to overwrite the classes with the new values.</p>
<p>Note: Remember that any color schemes you use might impact the "High Contrast" style sheet so make sure it doesn't impact appearance.</p>
<table class="form-table">
<tr valign="top"><th scope="row"><label for="header_style">CSS Styles:</label></th>
<td>
<textarea id="header_style" name="badeyes_options[header_style]" rows="5" cols="30"><?php echo stripslashes($settings['header_style']); ?></textarea>
</td>
</tr>
</table>
<h2>Introduction Text</h2>
<p>Use the area below to add a description, Advertisement, Google Ads or any other relevant text  to the top of the Blog, Single Post and Page area , as stated above you can use html, for accessibility reasons leave the heading if you use one at an H1.</p> 
<table class="form-table">
<tr valign="top"><th scope="row"><label for="intro_text">Blog Introduction</label></th>
<td>
<textarea id="intro_text" name="badeyes_options[intro_text]" rows="5" cols="30"><?php echo stripslashes($settings['intro_text']); ?></textarea>
</td>
</tr>
<tr valign="top"><th scope="row"><label for="single_text">Single Post Introduction</label></th>
<td>
<textarea id="single_text" name="badeyes_options[single_text]" rows="5" cols="30"><?php echo stripslashes($settings['single_text']); ?></textarea>
</td>
</tr>
<tr valign="top"><th scope="row"><label for="page_text">Page Introduction</label></th>
<td>
<textarea id="page_text" name="badeyes_options[page_text]" rows="5" cols="30"><?php echo stripslashes($settings['page_text']); ?></textarea>
</td>
</tr>
</table>
<h2>Rewrite Titles</h2>
<p>Use the edit fields below to change or remove the corresponding text.</p>
<table class="form-table">
<tr valign="top"><th scope="row"><label for="featured_title">Featured Heading Title</label></th>
<td>
<input id="featured_title" name="badeyes_options[featured_title]" type="text" value="<?php  esc_attr_e($settings['featured_title']); ?>" />
</td>
</tr>
<tr valign="top"><th scope="row"><label for="blog_title">Blog Heading Title</label></th>
<td>
<input id="blog_title" name="badeyes_options[blog_title]" type="text" value="<?php  esc_attr_e($settings['blog_title']); ?>" />
</td>
</tr>
<tr valign="top"><th scope="row"><label for="side_heading">Side Menu Heading</label></th>
<td>
<input id="side_heading" name="badeyes_options[side_heading]" type="text" value="<?php  esc_attr_e($settings['side_heading']); ?>" />
</td>
</tr>
<tr valign="top"><th scope="row"><label for="side_nav">Side Menu Link(change the name of the skip link at top of page)</label></th>
<td>
<input id="side_nav" name="badeyes_options[side_nav]" type="text" value="<?php  esc_attr_e($settings['side_nav']); ?>" />
</td>
</tr>
</table>
<h2>Miscellaneous</h2>
<table class="form-table">

<tr valign="top"><th scope="row"><label for="footer_copyright">Footer Copyright Notice</label></th>
<td>
<input id="footer_copyright" name="badeyes_options[footer_copyright]" type="text" value="<?php  esc_attr_e($settings['footer_copyright']); ?> " />
</td>
</tr>
<tr valign="top"><th scope="row">Author Credits</th>
<td>
<input type="checkbox" id="author_credits" name="badeyes_options[author_credits]" value="1" <?php checked( true, $settings['author_credits'] ); ?> />
<label for="author_credits">Show Author Credits</label>
</td>
</tr>

</table>
<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>

</form>
<h1>Welcome to the Badeyes 2014 Child Theme</h1>
<p>Important! This Theme requires that you have the TwentyFourteen Theme installed.</p>
<p>If you haven't already done so you can see a mock up version of this site at <a href="http://www.badeyes.com/2014" target="_blank">www.badeyes.com/2014/ (opens in new window/tab)</a>.</p> 
<p>This Child Theme has been optimized for screen reader users but should still be understanbable by those who dont, see changes below.</p>
<h2>Visual Editor</h2>
<p>If you use a screen reader then you will need to go to your Profile page and check the box "Disable the visual Editor" so that you can create Posts properly, you will quickly find out that it does not work very well if you dont.</p> 
<h2>Widgets</h2>
<p>Screen reader users will also need to go to the Widgets page and check the "enable accessibility mode" in the "Screen Options" area in order to be able to add and edit Widgets.</p>
<h2>Header Image</h2>
<p>The ability to crop the image has been removed for a number of reasons:<br />
<ul><li>* Those who use a screen reader more than likely cant see it to be able to change the dimensions so it is important that the image you upload is the size you want, you can however change the size in the Media Library once it is uploaded.</li>
 <li>* Even when you chose not to crop the image I found that it did not keep your image at its original dimensions it just filled the full width distorting the image.</li></ul>

<h2>Menus</h2>
<p>This Child Theme has 3 possible Menus, there is a custom menu an Primary one, both are situated horizontally under the Header section and the Secondary one or "Side Menu" located in the left hand sidebar.</p>
<p>Neither These menus nor their corresponding "Skip Links" will appear unless you create and manage them in the Menus area.</p> 
<p>You can see examples at <a href="http://www.badeyes.com/2014/" target="_blank">www.badeyes.com/2014/ (opens in new window/tab)</a></p>
<h2>Post Teaser Plugin</h2>
<p>For accessibility reasons the Post Teaser Plugin comes bundled with this Theme and is edited accordingly so there is no need to install it again, you can however edit it as you would any other Plugin in the Admin area.</p>
<p>If you already have it installed then it shouldn't be a problem but we suggest you deactivate and use our preset one.</p>
<h2>WordPress for Bad Eyes</h2>
<p>If you are new to WordPress then you might find my book useful even if you dont use a screen reader you can buy it at <a href="http://www.wordpressforbadeyes.com" target=_blank">www.wordpressforbadeyes.com(opens in new window/tab</a>.</p>

</div>

<?php
}

function badeyes_validate_options( $input ) {

global $badeyes_options;
$settings = get_option( 'badeyes_options', $badeyes_options );
// We strip all tags from the text field, to avoid vulnerabilities like XSS

$input['footer_copyright'] = wp_filter_nohtml_kses( $input['footer_copyright'] );
//$input['intro_text'] = wp_filter_post_kses( $input['intro_text'] );
//$input['featured_title'] = wp_filter_post_kses( $input['featured_title'] );
//$input['blog_title'] = wp_filter_post_kses( $input['blog_title'] );
//$input['side_heading'] = wp_filter_post_kses( $input['blog_title'] );

// We select the previous value of the field, to restore it in case an invalid entry has been given

$prev = $settings['intro_text'];
$prev = $settings['single_text'];
$prev = $settings['page_text'];
$prev = $settings['featured_title'];
$prev = $settings['blog_title'];
$prev = $settings['side_heading'];

// If the checkbox has not been checked, we void it

	if ( ! isset( $input['author_credits'] ) )
$input['author_credits'] = null;

// We verify if the input is a boolean value

$input['author_credits'] = ( $input['author_credits'] == 1 ? 1 : 0 );

return $input;

}

endif;  // EndIf is_admin()