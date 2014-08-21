<?php

// Default options values

$badeyes_options = array(
'footer_copyright' => 'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo('name'),
'intro_text' => '<h1>Add Title Here</h1><p>put text here</p>',
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
<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>";

// This shows the page's name and an icon if one has been provided ?>
<?php if ( false !== $_REQUEST['updated'] ) : ?>
<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
<?php endif; // If the form has just been submitted, this shows the notification ?>

<form method="post" action="options.php">
<?php $settings = get_option( 'badeyes_options', $badeyes_options ); ?>
<?php settings_fields( 'badeyes_theme_options' );
/* This function outputs some hidden fields required by the form,
including a nonce, a unique number used to ensure the form has been submitted from the admin page
 important for security */ ?>


<table class="form-table">
<tr valign="top"><th scope="row"><label for="footer_copyright">Footer Copyright Notice</label></th>
<td>
<input id="footer_copyright" name="badeyes_options[footer_copyright]" type="text" value="<?php  esc_attr_e($settings['footer_copyright']); ?>" />
</td>
</tr>
<tr valign="top"><th scope="row"><label for="intro_text">Intro Text</label></th>
<td>
<textarea id="intro_text" name="badeyes_options[intro_text]" rows="5" cols="30"><?php echo stripslashes($settings['intro_text']); ?></textarea>
</td>
</tr>

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

<tr valign="top"><th scope="row"><label for="side_title">Side Menu Heading</label></th>
<td>
<input id="side_heading" name="badeyes_options[side_heading]" type="text" value="<?php  esc_attr_e($settings['side_heading']); ?>" />
</td>
</tr>

<tr valign="top"><th scope="row"><label for="side_nav">Side Menu Link(change the name of the skip link at top of page)</label></th>
<td>
<input id="side_nav" name="badeyes_options[side_nav]" type="text" value="<?php  esc_attr_e($settings['side_nav']); ?>" />
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

</div>

<?php
}

function badeyes_validate_options( $input ) {

global $badeyes_options;
$settings = get_option( 'badeyes_options', $badeyes_options );
// We strip all tags from the text field, to avoid vulnerabilities like XSS

$input['footer_copyright'] = wp_filter_nohtml_kses( $input['footer_copyright'] );

// We strip all tags from the text field, to avoid vulnerabilities like XSS

$input['intro_text'] = wp_filter_post_kses( $input['intro_text'] );
$input['featured_title'] = wp_filter_post_kses( $input['featured_title'] );
$input['blog_title'] = wp_filter_post_kses( $input['blog_title'] );
$input['side_title'] = wp_filter_post_kses( $input['blog_title'] );

// We select the previous value of the field, to restore it in case an invalid entry has been given

$prev = $settings['intro_text'];
$prev = $settings['featured_title'];
$prev = $settings['blog_title'];
$prev = $settings['side_title'];

// If the checkbox has not been checked, we void it

	if ( ! isset( $input['author_credits'] ) )
$input['author_credits'] = null;

// We verify if the input is a boolean value

$input['author_credits'] = ( $input['author_credits'] == 1 ? 1 : 0 );

return $input;

}

endif;  // EndIf is_admin()