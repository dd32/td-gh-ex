<?php function adventure_admin_enqueue_scripts( $hook_suffix ) {
wp_enqueue_style( 'adventure-theme-options', get_template_directory_uri() . '/theme-options.css', false, '2011-04-28' );
wp_enqueue_script( 'adventure-theme-options', get_template_directory_uri() . '/theme-options.js', array( 'farbtastic' ), '2011-06-10' );
wp_enqueue_style( 'farbtastic' );}

add_action( 'admin_print_styles-appearance_page_theme_options', 'adventure_admin_enqueue_scripts' ); 

function adventure_theme_options_init() {

	// If we have no options in the database, let's add them now.
	if ( false === adventure_get_theme_options() )
		add_option( 'adventure_theme_options', adventure_get_default_theme_options() );

	register_setting(
		'adventure_options',       // Options group, see settings_fields() call in theme_options_render_page()
		'adventure_theme_options', // Database option, see adventure_get_theme_options()
		'adventure_theme_options_validate' // The sanitization callback, see adventure_theme_options_validate()
	);
}
add_action( 'admin_init', 'adventure_theme_options_init' );

/**
 * Change the capability required to save the 'adventure_options' options group.
 *
 * @see adventure_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see adventure_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * By default, the options groups for all registered settings require the manage_options capability.
 * This filter is required to change our theme options page to edit_theme_options instead.
 * By default, only administrators have either of these capabilities, but the desire here is
 * to allow for finer-grained control for roles and users.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 */
function adventure_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_adventure_options', 'adventure_option_page_capability' );

/**
 * Add our theme options page to the admin menu, including some help documentation.
 *
 * This function is attached to the admin_menu action hook.
 *
 */
function adventure_theme_options_add_page() { $theme_page = add_theme_page(
__( 'Theme Options', 'adventure' ),   // Name of page
__( 'Theme Options', 'adventure' ),   // Label in menu
'edit_theme_options',                    // Capability required
'theme_options',                         // Menu slug, used to uniquely identify the page
'adventure_theme_options_render_page' // Function that renders the options page
);

if ( ! $theme_page )
return;

$help = '<p>' . __( 'The Adventure+ Theme by Eric Schwarz provides customization options that are grouped together on the Theme Options screen. If you change themes, options may change or disappear, as they are theme-specific. Your current theme, Adventure+, provides the following Theme Options:', 'adventure' ) . '</p>' .
'<ol>' .
'<li>' . __( '<strong>Menu Image Color</strong>: You can choose from a bunch of different images to change the look and feel of the menu for your site.', 'adventure' ) . '</li>' .
'<li>' . __( '<strong>Link Color</strong>: You can choose the color used for text links on your site. You can enter the HTML color or hex code, or you can choose visually by clicking the "Select a Color" button to pick from a color wheel.', 'adventure' ) . '</li>' .
'<li>' . __( '<strong>Default Layout</strong>: You can choose if you want your site&#8217;s default layout to have a sidebar on the left, the right, or not at all.', 'adventure' ) . '</li>' .
'<li>' . __( '<strong>Menu Layout</strong>: You can choose if you want your site&#8217;s default layout to have a sidebar on the left, the right, or not at all.', 'adventure' ) . '</li>' .
'<li>' . __( '<strong>Contrast Ratio</strong>: Incase your have problems with the custom background making your website difficult to read, I have include 3 different content darkness to fix just such a problem.', 'adventure' ) . '</li>' .
'</ol>' .
'<p>' . __( 'Remember to click "Save Changes" to save any changes you have made to the theme options.', 'adventure' ) . '</p>' .
'<p><strong>' . __( 'For more information:', 'adventure' ) . '</strong></p>' .
'<p>' . __( '<a href="http://adventure.com/shop/adventure/" target="_blank">Adventure+ Home Page</a>', 'adventure' ) . '</p>' .
'<p>' . __( '<a href="http://wordpress.org/support/" target="_blank">Contact Eric Schwarz</a>', 'adventure' ) . '</p>';

add_contextual_help( $theme_page, $help );
}
add_action( 'admin_menu', 'adventure_theme_options_add_page' );

/**
 * Returns an array of color schemes registered for Adventure+.
 *
 */
function adventure_color_schemes() {
$color_scheme_options = array(
'purple' => array('value' => 'purple','label' => __( 'Purple', 'adventure' ),'thumbnail' => get_template_directory_uri() . '/images/purp.png','default_link_color' => '#0b6492',),
'red' => array('value' => 'red','label' => __( 'Red', 'adventure' ),'thumbnail' => get_template_directory_uri() . '/images/red.png','default_link_color' => '#b20c1a',),
'green' => array('value' => 'green','label' => __( 'Green', 'adventure' ),'thumbnail' => get_template_directory_uri() . '/images/green.png','default_link_color' => '#542912',),
'blue' => array('value' => 'blue','label' => __( 'Blue', 'adventure' ),'thumbnail' => get_template_directory_uri() . '/images/blue.png','default_link_color' => '#c63b00',),
'teal' => array('value' => 'teal','label' => __( 'Teal', 'adventure' ),'thumbnail' => get_template_directory_uri() . '/images/teal.png','default_link_color' => '#e6e600',),
'pink' => array('value' => 'pink','label' => __( 'Pink', 'adventure' ),'thumbnail' => get_template_directory_uri() . '/images/pink.png','default_link_color' => '#650898',),
'christmas' => array('value' => 'christmas','label' => __( 'Christmas', 'adventure' ),'thumbnail' => get_template_directory_uri() . '/images/christmas.png','default_link_color' => '#FFF',),);
return apply_filters( 'adventure_color_schemes', $color_scheme_options );}

/**
 * Returns an array of layout options registered for Twenty Eleven.
 *
 */
function adventure_layouts() {
	$layout_options = array(
		'content-sidebar' => array(
			'value' => 'content-sidebar',
			'label' => __( 'Content on left', 'adventure' ),
			'thumbnail' => get_template_directory_uri() . '/images/content-sidebar.png',),
		'sidebar-content' => array(
			'value' => 'sidebar-content',
			'label' => __( 'Content on right', 'adventure' ),
			'thumbnail' => get_template_directory_uri() . '/images/sidebar-content.png',),
		'content' => array(
			'value' => 'content',
			'label' => __( 'One-column, no sidebar', 'adventure' ),
			'thumbnail' => get_template_directory_uri() . '/images/content.png',),
	);
	return apply_filters( 'adventure_layouts', $layout_options );
}
function adventure_menu() {
	$menu_options = array(
		'bottom' => array(
			'value' => 'bottom',
			'label' => __( 'Menu on Bottom', 'adventure' ),
			'thumbnail' => get_template_directory_uri() . '/images/bottom.png',),
		'top' => array(
			'value' => 'top',
			'label' => __( 'Menu on Top', 'adventure' ),
			'thumbnail' => get_template_directory_uri() . '/images/content-sidebar.png',),
	);
	return apply_filters( 'adventure_menu', $menu_options );
}
function adventure_contrast() {
	$contrast_options = array(
		'seventyfive' => array(
			'value' => 'seventyfive',
			'label' => __( 'Contrast #B4B09D', 'adventure' ),
			'thumbnail' => get_template_directory_uri() . '/images/75.png',
		),
		'eighty' => array(
			'value' => 'eighty',
			'label' => __( 'Contrast #343131', 'adventure' ),
			'thumbnail' => get_template_directory_uri() . '/images/80.png',
		),
		'eightyfive' => array(
			'value' => 'eightyfive',
			'label' => __( 'Contrast #5E5C53', 'adventure' ),
			'thumbnail' => get_template_directory_uri() . '/images/85.png',),
	);
	return apply_filters( 'adventure_contrast', $contrast_options );
}

/**
 * Returns the default options for Twenty Eleven.
 *
 */
function adventure_get_default_theme_options() {
	$default_theme_options = array(
		'color_scheme' => 'purple',
		'link_color'   => adventure_get_default_link_color( 'purple' ),
		'theme_layout' => 'content-sidebar',
		'menu_layout' => 'bottom',
		'contrast_layout' => 'seventyfive',);

	if ( is_rtl() ) $default_theme_options['theme_layout'] = 'sidebar-content';
	if ( is_rtl() ) $default_theme_options['menu_layout'] = 'bottom';
	if ( is_rtl() ) $default_theme_options['contrast_layout'] = 'seventyfive';
	return apply_filters( 'adventure_default_theme_options', $default_theme_options );
}

/**
 * Returns the default link color for Twenty Eleven, based on color scheme.
 *
 * @param $string $color_scheme Color scheme. Defaults to the active color scheme.
 * @return $string Color.
*/
function adventure_get_default_link_color( $color_scheme = null ) {
	if ( null === $color_scheme ) {
		$options = adventure_get_theme_options();
		$color_scheme = $options['color_scheme'];
	}

	$color_schemes = adventure_color_schemes();
	if ( ! isset( $color_schemes[ $color_scheme ] ) )
		return false;

	return $color_schemes[ $color_scheme ]['default_link_color'];
}

/**
 * Returns the options array for Twenty Eleven.
 *
 */
function adventure_get_theme_options() {
	return get_option( 'adventure_theme_options', adventure_get_default_theme_options() );
}

/**
 * Returns the options array for Twenty Eleven.
 *
 */
function adventure_theme_options_render_page() {
	?>
<div class="wrap">
<?php screen_icon(); ?>
<h2><?php printf( __( '%s Theme Options', 'adventure' ), get_current_theme() ); ?></h2>
<?php settings_errors(); ?>

<form method="post" action="options.php">
<?php settings_fields( 'adventure_options' ); $options = adventure_get_theme_options(); $default_options = adventure_get_default_theme_options();?>

<table class="form-table">
<tr valign="top"><th scope="row">Information</th>
<td><p>Thank you for supporting my WordPress Theme "Adventure."</p>
<p>I would like to encourage you to regularly check for updates because I spend a lot of time improving and fixing the code so that it just simply keeps working better. You'll find the blead-edge downloads <a href="http://schwarttzy.com/web-design/adventure/" target="_blank">Here</a>.</p>
<p>If you would really like to show me your support of the Adventure theme or would like to be able to use the additional features below, just quick pick up your own copy by visiting the <a href="http://schwarttzy.com/shop/adventure/" target="_blank">Adventure+ Page</a>.</p>
<ol>
<li>Menu at top or bottom.</li>
<li>A Drop down-menu is built in</li>
<li>The ability to upload header images</li>
<li>Move the content to the left, the right, or just remove it</li>
<li>An additional widget area below content can be used</li>
<li>Choose from 3 different contrast ratios for readability</li>
</ol>
</br>
<p>With the addition of all the features from purchasing Adventure+, I also help out with small customizations of the theme and I lend my knowledge of WordPress to you for any question or support you may need.</p>
<p>Finally, I would like to get the word out on my Premium Theme &quot;<a href="http://schwarttzy.com/shop/adventure-bound/" target="_blank">Adventure Bound</a>.&quot; This very theme is the same that runs my own personal website right now (9/26/2011). So, if you want, hop on over to my website, <a href="http://schwarttzy.com/" target="_blank">http://Schwarttzy.com/</a>, check out the theme in action, and if you like it be sure to put a copy in your shopping cart.</p>
<a href="http://schwarttzy.com/shop/adventure-bound/" target="_blank"><img src="http://schwarttzy.com/shop/images/6" width="200" height="200" alt="" /></a>
<p>If you have any questions, comments, problems, or suggestions please feel free to <a href="http://schwarttzy.com/contact-me/" target="_blank">Contact Me Here.</a></p>
<p>Thank you again for your Support,</p>
<a href="http://schwarttzy.com/about-2/" target="_blank"><P>Eric J. Schwarz</P></a>
</td></tr>
<tr valign="top" class="image-radio-option color-scheme"><th scope="row"><?php _e( 'Menu Color', 'adventure' ); ?></th>
<td><fieldset><legend class="screen-reader-text"><span><?php _e( 'Menu Color', 'adventure' ); ?></span></legend>
<?php foreach ( adventure_color_schemes() as $scheme ) { ?>
<div class="layout">
<label class="description">
<input type="radio" name="adventure_theme_options[color_scheme]" value="<?php echo esc_attr( $scheme['value'] ); ?>" <?php checked( $options['color_scheme'], $scheme['value'] ); ?> />
<input type="hidden" id="default-color-<?php echo esc_attr( $scheme['value'] ); ?>" value="<?php echo esc_attr( $scheme['default_link_color'] ); ?>" />
<span><img src="<?php echo esc_url( $scheme['thumbnail'] ); ?>" width="136" height="122" alt="" /><?php echo $scheme['label']; ?></span>
</label>
</div><?php }?>
</fieldset></td></tr>

<tr valign="top"><th scope="row"><?php _e( 'Link Color', 'adventure' ); ?></th>
<td><fieldset><legend class="screen-reader-text"><span><?php _e( 'Link Color', 'adventure' ); ?></span></legend>
<input type="text" name="adventure_theme_options[link_color]" id="link-color" value="<?php echo esc_attr( $options['link_color'] ); ?>" />
<a href="#" class="pickcolor hide-if-no-js" id="link-color-example"></a>
<input type="button" class="pickcolor button hide-if-no-js" value="<?php esc_attr_e( 'Select a Color', 'adventure' ); ?>" />
<div id="colorPickerDiv" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
<span><?php printf( __( 'Default color: %s', 'adventure' ), '<span id="default-color">' . adventure_get_default_link_color( $options['color_scheme'] ) . '</span>' ); ?></span>
</fieldset></td></tr>

				<tr valign="top" class="image-radio-option theme-layout"><th scope="row"><?php _e( 'Default Layout</br>(Only Avaliable in Adventure+)', 'adventure' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Color Scheme', 'adventure' ); ?></span></legend>
						<?php
							foreach ( adventure_layouts() as $layout ) {
								?>
								<div class="layout">
								<label class="description">
									<input type="radio" name="adventure_theme_options[theme_layout]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['theme_layout'], $layout['value'] ); ?> />
									<span>
										<img src="<?php echo esc_url( $layout['thumbnail'] ); ?>" width="136" height="122" alt="" />
										<?php echo $layout['label']; ?>
									</span>
								</label>
								</div>
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>
                <tr valign="top" class="image-radio-option theme-layout"><th scope="row"><?php _e( 'Menu Layout</br>(Only Avaliable in Adventure+)', 'adventure' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Color Scheme', 'adventure' ); ?></span></legend>
						<?php
							foreach ( adventure_menu() as $layout ) {
								?>
								<div class="layout">
								<label class="description">
									<input type="radio" name="adventure_theme_options[menu_layout]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['menu_layout'], $layout['value'] ); ?> />
									<span>
										<img src="<?php echo esc_url( $layout['thumbnail'] ); ?>" width="136" height="122" alt="" />
										<?php echo $layout['label']; ?>
									</span>
								</label>
								</div>
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>
                <tr valign="top" class="image-radio-option theme-layout"><th scope="row"><?php _e( 'Content Contrast</br>(Only Avaliable in Adventure+)', 'adventure' ); ?></th>
					<td>
						<fieldset><legend class="screen-reader-text"><span><?php _e( 'Color Scheme', 'adventure' ); ?></span></legend>
						<?php
							foreach ( adventure_Contrast() as $layout ) {
								?>
								<div class="layout">
								<label class="description">
									<input type="radio" name="adventure_theme_options[contrast_layout]" value="<?php echo esc_attr( $layout['value'] ); ?>" <?php checked( $options['contrast_layout'], $layout['value'] ); ?> />
									<span>
										<img src="<?php echo esc_url( $layout['thumbnail'] ); ?>" width="136" height="122" alt="" />
										<?php echo $layout['label']; ?>
									</span>
								</label>
								</div>
								<?php
							}
						?>
						</fieldset>
					</td>
				</tr>
			</table>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see adventure_theme_options_init()
 * @todo set up Reset Options action
 *
 */
function adventure_theme_options_validate( $input ) {
	$output = $defaults = adventure_get_default_theme_options();

	// Color scheme must be in our array of color scheme options
	if ( isset( $input['color_scheme'] ) && array_key_exists( $input['color_scheme'], adventure_color_schemes() ) )
		$output['color_scheme'] = $input['color_scheme'];

	// Our defaults for the link color may have changed, based on the color scheme.
	$output['link_color'] = $defaults['link_color'] = adventure_get_default_link_color( $output['color_scheme'] );

	// Link color must be 3 or 6 hexadecimal characters
	if ( isset( $input['link_color'] ) && preg_match( '/^#?([a-f0-9]{3}){1,2}$/i', $input['link_color'] ) )
		$output['link_color'] = '#' . strtolower( ltrim( $input['link_color'], '#' ) );

	// Theme layout must be in our array of theme layout options
	if ( isset( $input['theme_layout'] ) && array_key_exists( $input['theme_layout'], adventure_layouts() ) )
		$output['theme_layout'] = $input['theme_layout'];
		
	// Theme menu must be in our array of theme layout options
	if ( isset( $input['menu_layout'] ) && array_key_exists( $input['menu_layout'], adventure_menu() ) )
		$output['menu_layout'] = $input['menu_layout'];
		
	// Theme menu must be in our array of theme layout options
	if ( isset( $input['contrast_layout'] ) && array_key_exists( $input['contrast_layout'], adventure_contrast() ) )
		$output['contrast_layout'] = $input['contrast_layout'];

	return apply_filters( 'adventure_theme_options_validate', $output, $input, $defaults );
}

/**
 * Add a style block to the theme for the current link color.
 *
 * This function is attached to the wp_head action hook.
 *
 */
function adventure_print_link_color_style() {
	$options = adventure_get_theme_options();
	$link_color = $options['link_color'];

	$default_options = adventure_get_default_theme_options();

	// Don't do anything if the current link color is the default.
	if ( $default_options['link_color'] == $link_color )
		return;
?>
<style>
/* Link color */
a, .label a:hover, #title a:hover, #site-title a:focus, #site-title a:hover, #site-title a:active, .entry-title a:hover, .entry-title a:focus, .entry-title a:active, .comments-link a:hover, section.recent-posts .other-recent-posts a[rel="bookmark"]:hover, section.recent-posts .other-recent-posts .comments-link a:hover, 	.format-image footer.entry-meta a:hover, #site-generator a:hover {color: <?php echo $link_color; ?>;}
section.recent-posts .other-recent-posts .comments-link a:hover {border-color: <?php echo $link_color; ?>;}
article.feature-image.small .entry-summary p a:hover, .entry-header .comments-link a:hover, .entry-header .comments-link a:focus,.entry-header .comments-link a:active, .feature-slider a.active {background-color: <?php echo $link_color; ?>;}
</style>
<?php
}
add_action( 'wp_head', 'adventure_print_link_color_style' );

/**
 * Enqueue the styles for the current color scheme.
 *
 */
function adventure_enqueue_color_scheme() {
	$options = adventure_get_theme_options();
	$color_scheme = $options['color_scheme'];

	if ( 'red' == $color_scheme ) wp_enqueue_style( 'red', get_template_directory_uri() . '/red.css', array(), null );
	if ( 'green' == $color_scheme ) wp_enqueue_style( 'green', get_template_directory_uri() . '/green.css', array(), null );
	if ( 'blue' == $color_scheme ) wp_enqueue_style( 'blue', get_template_directory_uri() . '/blue.css', array(), null );
	if ( 'teal' == $color_scheme ) wp_enqueue_style( 'teal', get_template_directory_uri() . '/teal.css', array(), null );
	if ( 'pink' == $color_scheme ) wp_enqueue_style( 'pink', get_template_directory_uri() . '/pink.css', array(), null );
	if ( 'christmas' == $color_scheme ) wp_enqueue_style( 'christmas', get_template_directory_uri() . '/christmas.css', array(), null );

	do_action( 'adventure_enqueue_color_scheme', $color_scheme );
}
add_action( 'wp_enqueue_scripts', 'adventure_enqueue_color_scheme' );

/**
 * Adds Twenty Eleven layout classes to the array of body classes.
 *
 */
function adventure_layout_classes( $existing_classes ) {
	$options = adventure_get_theme_options();
	$current_layout = $options['theme_layout'];

	if ( in_array( $current_layout, array( 'content-sidebar', 'sidebar-content', 'none-sidebar' ) ) )
		$classes = array( 'selected' );
	else
		$classes[] = $current_layout;
	if ( 'content-sidebar' == $current_layout )
		$classes[] = 'right-sidebar';
	if ( 'none-sidebar' == $current_layout )
		$classes[] = 'none-sidebar';
	elseif ( 'sidebar-content' == $current_layout )
		$classes[] = 'left-sidebar';
	else
		$classes[] = $current_layout;

	$classes = apply_filters( 'adventure_layout_classes', $classes, $current_layout );

	return array_merge( $existing_classes, $classes );
}
function adventure_layout_menu( $existing_classes ) {
	$options = adventure_get_theme_options();
	$current_layout = $options['menu_layout'];

	if ( 'bottom' == $current_layout )
		$classes[] = 'bottom';
	elseif ( 'top' == $current_layout )
		$classes[] = 'top';
	else
		$classes[] = $current_layout;

	$classes = apply_filters( 'adventure_layout_menu', $classes, $current_layout );

	return array_merge( $existing_classes, $classes );
}
function adventure_layout_contrast( $existing_classes ) {
	$options = adventure_get_theme_options();
	$current_layout = $options['contrast_layout'];

	if ( 'seventyfive' == $current_layout )
		$classes[] = 'seventyfive';
	elseif ( 'eighty' == $current_layout )
		$classes[] = 'eighty';
	elseif ( 'eightyfive' == $current_layout )
		$classes[] = 'eightyfive';
	else
		$classes[] = $current_layout;

	$classes = apply_filters( 'adventure_layout_contrast', $classes, $current_layout );

	return array_merge( $existing_classes, $classes );
}
if ( ! isset( $content_width ) ) $content_width = 760;
add_theme_support( 'automatic-feed-links' );
register_nav_menu( 'bar', 'The Menu Bar' );
register_sidebar(array(
'name' => 'SideBar',
'id' => 'sidebar',
'description' => 'Widgets in this area will be shown in the sidebar.',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
register_sidebars(4, array(
'name'=>'widget%d',
'id' => 'widget',
'description' => 'Widgets in this area will be shown below the the content of every page.',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
    ));
function new_excerpt_more($more) { return '....'; }
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_length($length) {return 250;}
add_filter('excerpt_length', 'new_excerpt_length');
add_custom_background();
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
add_image_size( 'page-thumbnail', 740, 9999, true );
function print_comment($comment, $args, $depth) { $GLOBALS['comment'] = $comment; ?> 
<div id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
<div class="avatar"><?php echo get_avatar( $comment, 100 ); ?></div>
<div class="commentinfo"><?php comment_author_link() ?> commented</div>
<?php if ($comment->comment_approved == '0') : ?><em><?php _e('Your comment is awaiting moderation.') ?></em><br /><?php endif; ?>
<?php comment_text() ?>
<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
<div class="right"><?php comment_date() ?> at <?php comment_time() ?> <?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
</div>
<?php } ?>