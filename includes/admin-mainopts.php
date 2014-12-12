<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/* Weaver Xtreme - admin Main Options
 *
 *  __ added: 12/9/14
 * This function will start the main sapi form, which will be closed in admin-adminopts
 */


// ======================== Main Options > Top Level ========================
function weaverx_admin_mainopts() {
?>
<div id="tabwrap_main" style="padding-left:4px;">

<div id="tab-container-main" class='yetiisub'>
	<ul id="tab-container-main-nav" class='yetiisub'>
	<?php
    weaverx_elink('#asp_genappear' , __('Wrapping background colors, rounded corners, borders, fade, shadow','weaver-xtreme'), __('Wrapping Areas', 'weaver-xtreme'),'<li>','</li>');
    weaverx_elink('#asp_widgets' , __('Settings for Sidebars and Sidebar Layout','weaver-xtreme'), __('Sidebars &amp; Layout', 'weaver-xtreme'),'<li>', '</li>');
    weaverx_elink('#asp_headeropts' , __('Site Title/Tagline properties, Header Image','weaver-xtreme'), __('Header', 'weaver-xtreme'),'<li>', '</li>');
    weaverx_elink('#asp_menus' , __('Menu text and bg colors and other properties; Info Bar properties','weaver-xtreme'), __('Menus', 'weaver-xtreme'),'<li>', '</li>');
    weaverx_elink('#asp_content' , __('Text colors and bg, image borders, featured image, other properties related to all content','weaver-xtreme'), __('Content Areas', 'weaver-xtreme'),'<li>', '</li>');
    weaverx_elink('#asp_postspecific' , __('Properties related to posts: titles, meta info, navigation, excerpts, featured images, and more','weaver-xtreme'), __('Post Specifics', 'weaver-xtreme'),'<li>', '</li>');
    weaverx_elink('#asp_footer' , __('Footer options: bg color, borders, more. Site Copyright','weaver-xtreme'), __('Footer', 'weaver-xtreme'),'<li>', '</li>');
    weaverx_elink('#asp_custom' , __('Font settings &amp; Custom Settings','weaver-xtreme'), __('Fonts &amp; Custom', 'weaver-xtreme'),'<li>', '</li>');
    ?>
	</ul>

    <?php weaverx_tab_title(__('Main Options','weaver-xtreme'), 'help.html#MainOptions', __('Help for Main Options','weaver-xtreme')); ?>

	<div id="asp_genappear" class="tab_mainopt" >
        <?php weaverx_mainopts_general(); ?>
	</div>

	<div id="asp_widgets" class="tab_mainopt" >
		<?php
        weaverx_mainopts_layout();
        weaverx_mainopts_widgets();
        ?>
	</div>

	<div id="asp_headeropts" class="tab_mainopt" >
	<?php weaverx_mainopts_header(); ?>
	</div>

	<div id="asp_menus" class="tab_mainopt" >
	<?php weaverx_mainopts_menus(); ?>
	</div>

	<div id="asp_content" class="tab_mainopt" >
	<?php weaverx_mainopts_content(); ?>
	</div>

	<div id="asp_postspecific" class="tab_mainopt" >
	<?php weaverx_mainopts_posts(); ?>
	</div>

	<div id="asp_footer" class="tab_mainopt" >
		<?php weaverx_mainopts_footer(); ?>
	</div>


    <div id="asp_links" class="tab_mainopt" >
	<?php weaverx_mainopts_custom(); ?>
	</div>

</div> <!-- #tab-container-main -->
<?php weaverx_sapi_submit(); ?>
</div>	<!-- #tabwrap_main -->
   <script type="text/javascript">
	var tabberMainOpts = new Yetii({
	id: 'tab-container-main',
	tabclass: 'tab_mainopt',
	persist: true
	});
</script>
<?php
}

// ======================== Main Options > Wrapping Areas ========================
function weaverx_mainopts_general() {

    $font_size = weaverx_getopt_default('site_fontsize_int', 16);

	$opts = array(
	array( 'type' => 'submit'),
	array('name' => __('Wrapping Areas','weaver-xtreme'), 'id' => '-admin-generic', 'type' => 'header',
        'info' => 'Settings for outer wrapping areas',
		'help' => 'help.html#GenApp'),
	array('name' => __('Outside BG','weaver-xtreme'), 'id' => 'body_bgcolor', 'type' => 'ctext',
        'info' => __('Background color that wraps entire page. (&lt;body&gt;) Using <em>Appearance->Background</em> will override this value, or allow a background image instead.','weaver-xtreme')),
	array('name' => __('Fade Outside BG','weaver-xtreme'), 'id' => 'fadebody_bg', 'type' => 'checkbox',
		'info' => __('Will fade the Outside BG color, darker at top to lighter at bottom.','weaver-xtreme')),
    array('name' => __('Standard Links','weaver-xtreme'), 'id' => 'link', 'type' => 'link',
		'info' => __('Global default for link colors (not including menus and titles). Set Bold, Italic, and Underline by setting those options for specific areas rather than globally to have more control.','weaver-xtreme')),

    /* array('name' => '#070' . __('No Auto-Underline Links','weaver-xtreme'), 'id' => 'mobile_nounderline', 'type' => 'checkbox',
        'info' => __('Underlined links are easier to use on most mobile devices. This will disable auto-underlined links.','weaver-xtreme')), */

    array('name' => __('Current Base Font Size:','weaver-xtreme'), 'type' => 'note',
		'info' => '<span style="font-size:' . $font_size . 'px;">' . $font_size . __('px.','weaver-xtreme') . '</span> ' . __('Change on Custom Tab','weaver-xtreme')),
	array( 'type' => 'submit'),


    array('name' => __('Wrapper Area','weaver-xtreme'), 'id' => 'wrapper', 'type' => 'widget_area_submit',
		'info' => __('Wrapper wraps entire site (CSS id: #wrapper). Colors and font settings will be the default values for all other areas.','weaver-xtreme')),

    array('name' => __('Container Area','weaver-xtreme','weaver-xtreme'), 'id' => 'container', 'type' => 'widget_area_submit',
		'info' => __('Container (#container div) wraps content and sidebars.','weaver-xtreme')),

	);

?>

   <div class="options-intro"><?php _e('<strong>Wrapping Areas:</strong>
The options on this tab affect the overall site appearance.
The main <strong>Wrapper Area</strong> wraps the entire site, and is used to specify default text and background colors, site width, font families, and more.
With <em>Weaver Xtreme Plus</em>, you can also specify background images for various areas of your site.','weaver-xtreme'); ?>
<div class="options-intro-menu"> <a href="#wrapping-areas"><?php _e('Wrapping Areas','weaver-xtreme'); ?></a> |
<a href="#wrapper-area"><?php _e('Wrapper Area','weaver-xtreme'); ?></a> |
<a href="#container-area"><?php _e('Container Area','weaver-xtreme'); ?></a> |
<a href="#background-images"><?php _e('Background Image (X-Plus)','weaver-xtreme'); ?></a>
</div>
</div>
<?php
	weaverx_form_show_options($opts);
	do_action('weaverxplus_admin','general_appearance');
}



// ======================== Main Options > Custom ========================

function weaverx_mainopts_custom() {
	$opts = array(
	array( 'type' => 'submit'),
    array('name' => __('Custom Options','weaver-xtreme'), 'id' => '-admin-generic', 'type' => 'header',
        'info' => __('Set various global custom values.','weaver-xtreme'),
		'help' => 'help.html#Custom'),

    array('name' => __('Various Custom Values','weaver-xtreme'), 'id' => '-admin-settings', 'type' => 'subheader',
        'info' => __('Adjust various global settings','weaver-xtreme')),

    array('name' => '<span class="i-left dashicons dashicons-align-none"></span>' . __('Smart Margin Width','weaver-xtreme'),
        'id' => 'smart_margin_int', 'type' => '+val_percent',
		'info' => __('Width used for smart margins for Sidebars and Content Area. (Default: 1%) (&starf;Plus)','weaver-xtreme')),

	array('name' => __('Border Color','weaver-xtreme'), 'id' => 'border_color', 'type' => 'color',
		'info' => __('Global color of borders. (Default: #222)','weaver-xtreme')),
	array('name' => '<small>' . __('Border Width','weaver-xtreme') . '</small>' , 'id' => 'border_width_int', 'type' => 'val_px',
		'info' => __('Global Width of borders. (Default: 1px)','weaver-xtreme')),
    array('name' => '<span class="i-left" style="font-size:200%;margin-left:4px;">&#x25a1;</span><small>' . __('Border Style','weaver-xtreme') . '</small>',
        'id' => 'border_style', 'type' => '+select_id',
		'info' => __('Style of borders - width needs to be > 1 for some styles to work correctly (&starf;Plus)','weaver-xtreme'),
			'value' => array(
				array('val' => 'solid', 'desc' => __('Solid','weaver-xtreme') ),
				array('val' => 'dotted', 'desc' => __('Dotted','weaver-xtreme') ),
				array('val' => 'dashed', 'desc' => __('Dashed','weaver-xtreme') ),
				array('val' => 'double', 'desc' => __('Double','weaver-xtreme') ),
				array('val' => 'groove', 'desc' => __('Groove','weaver-xtreme') ),
				array('val' => 'ridge', 'desc' => __('Ridge','weaver-xtreme') ),
				array('val' => 'inset', 'desc' => __('Inset','weaver-xtreme') ),
				array('val' => 'outset', 'desc' => __('Outset','weaver-xtreme') )
				)),

    array('name' => __('Corner Radius','weaver-xtreme'), 'id' => 'rounded_corners_radius', 'type' => '+val_px',
		'info' => __('Controls how "round" corners are. Specify a value (5 to 15 look best) for corner radius. (Default: 8) (&starf;Plus)','weaver-xtreme')),

    array('name' => __('Hide Menu/Link Tool Tips','weaver-xtreme'), 'id' => 'hide_tooltip', 'type' => '+checkbox',
		  'info' => __('Hide the tool tip pop up over all menus and links. (&starf;Plus)','weaver-xtreme')),


    array('name' => __('Custom Shadow','weaver-xtreme'), 'id' => 'custom_shadow', 'type' => '+widetext',
		'info' => __('Specify full <em>box-shadow</em> CSS rule, e.g., <em>{box-shadow: 0 0 3px 1px rgba(0,0,0,0.25);}</em> (&starf;Plus)','weaver-xtreme')),

    array( 'type' => 'submit'),

    array('name' => __('Custom CSS','weaver-xtreme'), 'id' => 'custom_css', 'type' => 'custom',
        'info' => __('Create Custom CSS Rules','weaver-xtreme'), 'val' => 'weaverx_custom_css'),

    array( 'type' => 'submit'),


	array('name' => __('Fonts','weaver-xtreme'), 'id' => '-editor-textcolor', 'type' => 'header',
        'info' => __('Font Base Sizes','weaver-xtreme'),
        'help' => 'font-demo.html'
        ),

   	array('name' => __('Site Base Font Size','weaver-xtreme'), 'id' => 'site_fontsize_int', 'type' => 'val_px',
        'info' => __('Base font size of standard text. This value determines the default medium font size. Note that visitors can change their browser\'s font size, so final font size can vary, as expected. (Default: 16px)','weaver-xtreme')),

	array('name' => __('Site Base Line Height','weaver-xtreme'), 'id' => 'site_line_height_dec', 'type' => '+val_num',
        'info' => __('Set the Base line-height. Most other line heights based on this multiplier. (Default: 1.5 - no units) (&starf;Plus)','weaver-xtreme')),

	array('name' => '<small>' . __('Site Base Font Size - Small Tablets','weaver-xtreme') . '</small>', 'id' => 'site_fontsize_tablet_int', 'type' => '+val_px',
        'info' => __('Small Tablet base font size of standard text. (Default medium font size: 16px) (&starf;Plus)','weaver-xtreme')),
    array('name' => '<small>' . __('Site Base Font Size - Phones','weaver-xtreme') . '</small>', 'id' => 'site_fontsize_phone_int', 'type' => '+val_px',
        'info' => __('Phone base font size of standard text. (Default medium font size: 16px)  (&starf;Plus)','weaver-xtreme')),

    array('name' => __('Custom Font Size A','weaver-xtreme'), 'id' => 'custom_fontsize_a', 'type' => '+val_em',
		'info' => __('Specify font size in em for Custom Size A (&starf;Plus)','weaver-xtreme')),
    array('name' => __('Custom Font Size B','weaver-xtreme'), 'id' => 'custom_fontsize_b', 'type' => '+val_em',
		'info' => __('Specify font size in em for Custom Size B (&starf;Plus)','weaver-xtreme')),

    array( 'type' => 'submit')

    );
    ?>
    <div class="options-intro"><strong><?php _e('Custom &amp; Fonts:','weaver-xtreme'); ?> </strong>
<?php _e('Set values for Custom options and Fonts: Smart Margin, Borders, Corners, Shadows, Custom CSS, and Fonts','weaver-xtreme'); ?>
<br />
    <div class="options-intro-menu">
<a href="#various-custom-values"><?php _e('Various Custom Values','weaver-xtreme'); ?></a> |
<a href="#custom-css-rules"><?php _e('Custom CSS Rules','weaver-xtreme'); ?></a> |
<a href="#fonts">Fonts</a>
    </div>
    </div>
<?php
	weaverx_form_show_options($opts);

	do_action('weaverxplus_admin','fonts');
}


// ======================== Main Options > Header ========================
function weaverx_mainopts_header() {
	$opts = array(
	array( 'type' => 'submit'),
	array('name' => __('Header Options','weaver-xtreme'), 'id' => '-admin-generic', 'type' => 'header',
		'info' => __('Options affecting site Header','weaver-xtreme'),
		'help' => 'help.html#HeaderOpt'),


    array('name' => __('Header Area','weaver-xtreme'), 'id' => 'header', 'type' => 'widget_area',
		'info' => __('Wraps the Header Area: menu bars, standard header image, title, tagline, header widget area','weaver-xtreme')),

    array('name' => '<span class="i-left dashicons dashicons-visibility"></span>' . __('Hide Search on Header','weaver-xtreme'),
        'id' => 'header_search_hide', 'type' => 'select_hide',
		'info' => __('Selectively hide the Search Box Button on top right of header','weaver-xtreme')),
    array('name' => '<small>' . __('Search Area Options:','weaver-xtreme') . '</small>', 'type' => 'note',
		'info' => __('Specify search icon, text and background colors Search section of Content Areas tab.','weaver-xtreme')),

    array( 'type' => 'submit'),

    array('name' => __('Header Image','weaver-xtreme'), 'id' => '-format-image', 'type' =>'subheader',
          'info' => __('Settings related to standard header image (Set on Appearance&rarr;Header)','weaver-xtreme')),

	array('name' => '<span class="i-left dashicons dashicons-visibility"></span>' . __('Hide Header Image','weaver-xtreme'),
        'id' => 'hide_header_image', 'type' => 'select_hide',
		'info' => __('Check to selectively hide standard header image','weaver-xtreme')),

	array('name' => '<small>' . __('Suggested Header Image Height','weaver-xtreme') . '</small>',
        'id' => 'header_image_height_int', 'type' => 'val_px',
		'info' => __('Change the suggested height of the Header Image. Standard size is 188. This only affects the clipping window on the Appearance:Header page. Header images will be responsively sized. (Default header image width: theme width)','weaver-xtreme')),

    array('name' => '<span class="i-left" style="font-size:120%;">&harr;</span><small>' . __('Maximum Image Width','weaver-xtreme') . '</small>',
        'id' => 'header_image_max_width_dec', 'type' => '+val_percent',
		'info' => __('Maximum width of Image (Default: 100%; (&starf;Plus)','weaver-xtreme')),

	array('name' => '<small>' . __('Use Actual Image Size','weaver-xtreme') . '</small>',
        'id' => 'header_actual_size', 'type' => '+checkbox',
		'info' => __('Check to use actual header image size, centered in header. (Default: theme width) (&starf;Plus)','weaver-xtreme')),

    array('name' => '<span class="i-left dashicons dashicons-editor-alignleft"></span><small>' . __('Align Header Image','weaver-xtreme') . '</small>',
        'id' => 'header_image_align', 'type' => '+align',
		'info' => __('How to align header image - meaningful only when Max Width or Actual Size set. (&starf;Plus)','weaver-xtreme')),

	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Header Image Front Page','weaver-xtreme') . '</small>',
        'id' => 'hide_header_image_front', 'type' => 'checkbox',
		'info' => __('Check to hide display of standard header image on front page only.','weaver-xtreme')),

	array('name' => '<small>' . __('Header Image Links to Site','weaver-xtreme') . '</small>', 'id' => 'link_site_image', 'type' => 'checkbox',
		'info' => __('Check to add a link to site home page for Header Image. Note: If used with <em>Move Title/Tagline over Image</em>, parts of the header image will not be clickable.','weaver-xtreme')),

    array('name' => '<small>' . __('Alternate Header Images:','weaver-xtreme') . '</small>', 'type' => 'note',
		'info' => __('Specify alternate header images using the <em>Featured Image Location</em> options on the <em>Content Areas</em> tab for pages, or the <em>Post Specifics</em> tab for single post views.','weaver-xtreme')),


    array( 'type' => 'submit'),


	array('name' => __('Site Title/Tagline','weaver-xtreme'), 'id' => '-text', 'type' =>'subheader',
        'info' => __('Settings related to the Site Title and Tagline (Tagline sometimes called Site Description)','weaver-xtreme')),


	array('name' => __('Site Title','weaver-xtreme'), 'id' => 'site_title', 'type' => 'titles',
		'info' => __("The site's main title in the header (blog title)",'weaver-xtreme')),

	array('name' => '<span class="i-left font-bold" style="font-size:120%;">&#x21cc;</span><small>' . __('Title Position','weaver-xtreme') . '</small>',
        'id' => 'site_title_position_xy', 'type' => 'text_xy_percent',
		'info' => __('Adjust left and top margins for Title. Decimal and negative values allowed. (Default: X: 7%, Y:0.25%)','weaver-xtreme')),

	array('name' => '<span class="i-left" style="font-size:150%;">&harr;</span><small>' . __('Title Max Width','weaver-xtreme') . '</small>', 'id' => 'site_title_max_w', 'type' => 'val_percent',
		'info' => __("Maximum width of title in header area (Default: 90%)",'weaver-xtreme')),

    array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Site Title','weaver-xtreme') . '</small>',
        'id' => 'hide_site_title', 'type' => 'select_hide',
		'info' => __('Hide Site Title (Uses "display:none;" : SEO friendly.)','weaver-xtreme')),

	array('name' => __('Site Tagline','weaver-xtreme'), 'id' => 'tagline', 'type' => 'titles',
		'info' => __("The site's tagline (blog description)",'weaver-xtreme')),


	array('name' => '<span class="i-left font-bold" style="font-size:120%;">&#x21cc;</span><small>' . __('Tagline Position','weaver-xtreme') . '</small>',
        'id' => 'tagline_xy', 'type' => 'text_xy_percent',
		'info' => __('Adjust default left and top margins for Tagline. (Default: X: 10% Y:0%)','weaver-xtreme')),
	array('name' => '<span class="i-left" style="font-size:150%;">&harr;</span><small>' . __('Tagline Max Width','weaver-xtreme') . '</small>',
        'id' => 'tagline_max_w', 'type' => 'val_percent',
		'info' => __("Maximum width of Tagline in header area (Default: 90%)",'weaver-xtreme')),

    array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Site Tagline','weaver-xtreme') . '</small>',
        'id' => 'hide_site_tagline', 'type' => 'select_hide',
		'info' => __('Hide Site Tagline (Uses "display:none;" : SEO friendly.)','weaver-xtreme')),


	array('name' => '<small>' . __('Move Title/Tagline over Image','weaver-xtreme') . '</small>', 'id' => 'title_over_image', 'type' => 'checkbox',
		'info' => __('Move the Title, Tagline, Seach, and Mini-Menu over the Header Image.','weaver-xtreme')),


	array( 'type' => 'submit'),


    array('name' => __('The Header Mini-Menu','weaver-xtreme'), 'id' => '-menu', 'type' =>'subheader',
        'info' => __('Horizontal "Mini-Menu" displayed right-aligned of Site Tagline','weaver-xtreme')),
    array('name' => __('Note:','weaver-xtreme'), 'type' => 'note',
		'info' => __('The Header Mini-Menu options are on the Menu Tab.','weaver-xtreme')),

    array('name' => __('Header Widget Area','weaver-xtreme'), 'id' => 'header_sb', 'type' => 'widget_area',
		'info' => __('Horizontal Header Widget Area','weaver-xtreme')),
    array('name' => '<small>' . __('Header Widget Area Position','weaver-xtreme') . '</small>',
        'id' => 'header_sb_position', 'type' => '+select_id',	//code
        'info' => __('Change where Header Widget Area is displayed. (Default: Top) (&starf;Plus)','weaver-xtreme'),
        'value' => array(
			array('val' => 'top', 'desc' => __('Top of Header','weaver-xtreme')),
			array('val' => 'after_header', 'desc' => __('After Header Image','weaver-xtreme')),
			array('val' => 'after_html', 'desc' => __('After HTML Block','weaver-xtreme')),
            array('val' => 'after_menu', 'desc' => __('After Lower Menu','weaver-xtreme')),
			)),

    array( 'type' => 'submit'),

    array('name' => __('Header HTML','weaver-xtreme'), 'id' => 'header_html', 'type' => 'widget_area', __('Header Widget Area','weaver-xtreme'),
		'info' => __('Add arbitrary HTML to Header Area (in &lt;div id="header-html"&gt;)','weaver-xtreme')),


	array('name' => '<span class="i-left dashicons dashicons-editor-code"></span>' . __('Header HTML content','weaver-xtreme'),
        'id' => 'header_html_text', 'type' => 'textarea',
        'placeholder' => __('Any HTML, including shortcodes','weaver-xtreme'),
		'info' => __('Add arbitrary HTML to Header Area (in &lt;div id="header-html"&gt;)','weaver-xtreme'), 'val' => 4 ),

    array( 'type' => 'submit'),

    array('name' => __('Note:','weaver-xtreme'), 'type' => 'note',
		'info' => __('There are more standard WordPress Header options available on the Dashboard Appearance->Header panel.','weaver-xtreme')),
	);

?>
   <div class="options-intro">
<?php _e('<strong>Header:</strong> Options affecting the Header Area at the top of your site.','weaver-xtreme'); ?>
<br />
<div class="options-intro-menu"> <a href="#header-area"><?php _e('Header Area','weaver-xtreme'); ?></a> |
<a href="#header-image"><?php _e('Header Image','weaver-xtreme'); ?></a> |
<a href="#site-titletagline"><?php _e('Site Title/Tagline','weaver-xtreme'); ?></a> |
<a href="#header-widget-area"><?php _e('Header Widget Area','weaver-xtreme'); ?></a>|
<a href="#header-html"><?php _e('Header HTML','weaver-xtreme'); ?></a>
</div>
   </div>
<?php
	weaverx_form_show_options($opts);

	do_action('weaverxplus_admin','header_opts');
}

// ======================== Main Options > Menus ========================
function weaverx_mainopts_menus() {
	$opts = array(
	array( 'type' => 'submit'),
	array('name' => __('Menu &amp; Info Bars','weaver-xtreme'), 'id' => '-menu', 'type' => 'header',
		'info' => __('Options affecting site Menus and the Info Bar','weaver-xtreme'),
		'help' => 'help.html#MenuBar'),


    array('name' => __('Primary Menu Bar','weaver-xtreme'), 'id' => 'm_primary', 'type' => 'menu_opts',
		'info' => __('Attributes for the Primary Menu Bar (Default Location: Bottom of Header)','weaver-xtreme')),

    array('name' => '<small>' . __('No Home Menu Item','weaver-xtreme') . '</small>', 'id' => 'menu_nohome', 'type' => 'checkbox',
		'info' => __('Don\'t automatically add Home menu item for home page (as defined in Settings->Reading)','weaver-xtreme')),
    array( 'type' => 'submit'),

    array('name' => __('Secondary Menu Bar','weaver-xtreme'), 'id' => 'm_secondary', 'type' => 'menu_opts_submit',
		'info' => __('Attributes for the Secondary Menu Bar (Default Location: Top of Header)','weaver-xtreme')),



    array('name' => __('Options: All Menus','weaver-xtreme'), 'id' => '-forms', 'type' => 'subheader_alt',
		'info' => __('Menu Bar enhancements and features','weaver-xtreme')),


	array('name' => __('Current Page BG','weaver-xtreme'), 'id' => 'menubar_curpage_bgcolor', 'type' => 'ctext',
		'info' => __('BG Color for the currently displayed page and its ancestors.','weaver-xtreme')),
    array('name' => __('Current Page Text','weaver-xtreme'), 'id' => 'menubar_curpage_color', 'type' => 'color',
		'info' => __('Color for the currently displayed page and its ancestors.','weaver-xtreme')),


	array('name' => '<span class="i-left dashicons dashicons-editor-bold"></span><small>' . __('Bold Current Page','weaver-xtreme') . '</small>', 'id' => 'menubar_curpage_bold', 'type' => 'checkbox',
		'info' => __('Bold Face Current Page and ancestors','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-editor-italic"></span><small>' . __('Italic Current Page','weaver-xtreme') . '</small>', 'id' => 'menubar_curpage_em', 'type' => 'checkbox',
		'info' => __('Italic Current Page and ancestors','weaver-xtreme')),
	array('name' => '<small>' . __('Do Not Highlight Ancestors','weaver-xtreme') . '</small>',
        'id' => 'menubar_curpage_noancestors', 'type' => 'checkbox',
		'info' => __('Highlight Current Page only - do not also highlight ancestor items','weaver-xtreme')),


    array( 'type' => 'submit'),

    array('name' => __('Header Mini-Menu','weaver-xtreme'), 'id' => '-menu', 'type' =>'subheader_alt',
        'info' => __('Horizontal "Mini-Menu" displayed right-aligned of Site Tagline','weaver-xtreme')),


	array('name' => __('Mini-Menu','weaver-xtreme'), 'id' => 'm_header_mini', 'type' => 'titles_text',
		'info' => __('Color of Mini-Menu Link Items','weaver-xtreme')),

    array('name' => '<small>' . __('Mini-Menu Hover','weaver-xtreme') . '</small>', 'id' => 'm_header_mini_hover_color', 'type' => 'ctext',
		'info' => __('Hover Color for Mini-Menu Links','weaver-xtreme')),

    array('name' => '<span class="i-left dashicons dashicons-align-none"></span><small>' . __('Mini Menu Top Margin','weaver-xtreme') . '</small>',
        'id' => 'm_header_mini_top_margin_dec', 'type' => 'val_em',
		'info' => __('Top margin for Mini-Menu. Negative value moves it up. (Default: -1.0em)','weaver-xtreme')),

    array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Mini Menu','weaver-xtreme') . '</small>',
        'id' => 'm_header_mini_hide', 'type' => 'select_hide',
		'info' => __('Hide Mini Menu','weaver-xtreme')),


	array( 'type' => 'submit'),


    array('name' => __('Info Bar','weaver-xtreme'), 'id' => 'infobar', 'type' => 'widget_area',
		'info' => __('Info Bar : Breadcrumbs & Page Nav below primary menu','weaver-xtreme')),


	array('name' => '<span class="i-left dashicons dashicons-visibility"></span>' . __('Hide Breadcrumbs','weaver-xtreme'),
        'id' => 'info_hide_breadcrumbs', 'type' => 'checkbox',
        'info' => __('Do not display the Breadcrumbs','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span>' . __('Hide Page Navigation','weaver-xtreme'),
        'id' => 'info_hide_pagenav', 'type' => 'checkbox',
        'info' => __('Do not display the numbered Page navigation','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span>' . __('Show Search box','weaver-xtreme'),
        'id' => 'info_search', 'type' => 'checkbox',
        'info' => __('Include a Search box on the right','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span>' . __('Show Log In','weaver-xtreme'), 'id' => 'info_addlogin', 'type' => 'checkbox',
        'info' => __('Include a simple Log In link on the right','weaver-xtreme')),

	array('name' => __('Breadcrumb for Home','weaver-xtreme'), 'id' =>'info_home_label' , 'type' => 'widetext', //code - option done in code
        'info' => __('This lets you change the breadcrumb label for your home page. (Default: Home)','weaver-xtreme')),
    array('name' => __('Info Bar Links','weaver-xtreme'), 'id' => 'ibarlink', 'type' => 'link',
		'info' => __('Color for links in Info Bar (uses Standard Link colors if left blank)','weaver-xtreme'))
	);

?>
<div class="options-intro">
<?php _e('<strong>Menus:</strong> Options to control how your menus look.','weaver-xtreme'); ?><br />
<div class="options-intro-menu">
<a href="#primary-menu-bar"><?php _e('Primary Menu Bar','weaver-xtreme'); ?></a> |
<a href="#secondary-menu-bar"><?php _e('Secondary Menu Bar','weaver-xtreme'); ?></a> |
<a href="#options-all-menus"><?php _e('Options: All Menus','weaver-xtreme'); ?></a> |
<a href="#header-mini-menu"><?php _e('Header Mini-Menu','weaver-xtreme'); ?></a> |
<a href="#info-bar"><?php _e('Info Bar','weaver-xtreme'); ?></a> |
<a href="#extra-menu"><?php _e('Extra Menu (X-Plus)','weaver-xtreme'); ?></a>
</div>
</div>
<?php
    $all_opts = apply_filters('weaverxplus_menu_inject', $opts);

	weaverx_form_show_options($all_opts);

}


// ======================== Main Options > Content Areas ========================
function weaverx_mainopts_content() {
	$opts = array(
	array( 'type' => 'submit'),
	array('name' => __('Content Areas','weaver-xtreme'), 'id' => '-admin-page', 'type' => 'header',
		'info' => __('Settings for the content areas (posts and pages)','weaver-xtreme'),
        'toggle' => 'content-areas',
        'help' => 'help.html#ContentAreas'),

    array('name' => __('Content Area','weaver-xtreme'), 'id' => 'content', 'type' => 'widget_area',
		'info' => __('Area properties for page and post content','weaver-xtreme')),

    array('name' => __('Page Title','weaver-xtreme'), 'id' => 'page_title', 'type' => 'titles',
		'info' => __('Page titles, including pages, post single pages, and archive-like pages.','weaver-xtreme')),
    array('name' => '<small>' . __('Bar under Title','weaver-xtreme') . '</small>', 'id' => 'page_title_underline_int', 'type' => 'val_px',
		'info' => __('Enter size in px if you want a bar under page title. Leave blank or 0 for no bar.','weaver-xtreme')),
    array('name' => '<small>' . __('Space Between Title and Content','weaver-xtreme') . '</small>', 'id' => 'space_after_title_dec', 'type' => 'val_em',
		'info' => __('Space between Page or Post title and beginning of content (Default: 1.0em)','weaver-xtreme')),

    array('name' => __('Archive Pages Title Text','weaver-xtreme'), 'id' => 'archive_title', 'type' => 'titles',
		'info' => __('Archive-like page titles: archives, categories, tags, searches.','weaver-xtreme')),

    array('name' => __('Content Links','weaver-xtreme'), 'id' => 'contentlink', 'type' => 'link',
		'info' => __('Color for links in Content','weaver-xtreme')),

    array('name' => __('Content Headings','weaver-xtreme'), 'id' => 'content_h', 'type' => '+titles',
		'info' => __('Headings (&lt;h1&gt;-&lt;h6&gt;) in page and post content (&starf;Plus)','weaver-xtreme')),

    array( 'type' => 'submit'),

	array('name' => __('Text','weaver-xtreme'), 'id' => '-text', 'type'=>'subheader_alt',
        'info' => __('Text related options','weaver-xtreme')),

    array('name' => '<small>' . __('Space after paragraphs and lists','weaver-xtreme') . '</small>', 'id' => 'content_p_list_dec', 'type' => 'val_em',
		'info' => __('Space after paragraphs and lists (Recommended: 1.5 em)','weaver-xtreme')),

	array('name' => '<small>' . __('Page/Post Editor BG','weaver-xtreme') . '</small>', 'id' => 'editor_bgcolor', 'type' => 'ctext',
		'info' => 'Alternative Background Color to use for Page/Post editor if you\'re using transparent or image backgrounds.'),

    array('name' => '<small>' . __('Input Area BG','weaver-xtreme') . '</small>', 'id' => 'input_bgcolor', 'type' => 'ctext',
		'info' => __('Background color for text input (textareas) boxes.','weaver-xtreme')),
	array('name' => '<small>' . __('Input Area Text','weaver-xtreme') . '</small>', 'id' => 'input_color', 'type' => 'color',
		'info' => __('Text color for text input (textareas) boxes.','weaver-xtreme')),

    array('name' => '<small>' . __('Auto Hyphenation','weaver-xtreme') . '</small>', 'id' => 'hyphenate', 'type' => 'checkbox',
        'info' => __('Allow browsers to automatically hyphenate text for appearance.','weaver-xtreme')),



    array('name' => __('Search Boxes','weaver-xtreme'), 'id' => '-search', 'type'=>'subheader_alt',
        'info' => __('Search box related options','weaver-xtreme')),

	array('name' => '<small>' . __('Search Input BG','weaver-xtreme') . '</small>', 'id' => 'search_bgcolor', 'type' => 'ctext',
		'info' => __('Background color for search input boxes.','weaver-xtreme')),
	array('name' => '<small>' . __('Serch Input Text','weaver-xtreme') . '</small>', 'id' => 'search_color', 'type' => 'color',
		'info' => __('Text color for search input boxes.','weaver-xtreme')),

    array('name' => '<small>' . __('Search Icon','weaver-xtreme') . '</small>', 'id' => 'search_icon', 'type' => 'radio',	//code
        'info' => __('Search Icon - used for both Header and Search Widgets.','weaver-xtreme'),
        'value' => array(
            array('val' => 'black'),
            array('val' => 'gray'),
            array('val' => 'light'),
            array('val' => 'white'),
			array('val' => 'black-bg'),
            array('val' => 'gray-bg'),
            array('val' => 'white-bg'),
            array('val' => 'blue-bg'),
            array('val' => 'green-bg'),
            array('val' => 'orange-bg'),
			array('val' => 'red-bg'),
            array('val' => 'yellow-bg'),
			)),


	array( 'type' => 'submit'),
	array('name' => __('Images','weaver-xtreme'), 'id' => '-format-image', 'type'=>'subheader_alt',
        'info' => __('Image related options','weaver-xtreme')),
	array('name' => '<small>' . __('Image Border Color','weaver-xtreme') . '</small>', 'id' => 'media_lib_border_color', 'type' => 'ctext',
		'info' => __('Border color for images in Container and Footer.','weaver-xtreme')),
	array('name' => '<span class="i-left" style="font-size:150%;">&harr;</span><small>' . __('Image Border Width','weaver-xtreme') . '</small>',
        'id' => 'media_lib_border_int', 'type' => 'val_px',
		'info' => __('Border width for images in Container and Footer. (Leave blank or set to 0 for no image borders.)','weaver-xtreme')),

	array('name' => '<span class="i-left dashicons dashicons-admin-page"></span><small>' . __('Show Image Shadows','weaver-xtreme') . '</small>',
        'id' => 'show_img_shadows', 'type' => 'checkbox',
        'info' => __('Add a shadow to images  in Container and Footer. Add CSS+ to Border Color for custom shadow.','weaver-xtreme')),

    array('name' => '<small>' . __('Restrict Borders to Media Library','weaver-xtreme') . '</small>', 'id' => 'restrict_img_border', 'type' => 'checkbox',
        'info' => __('For Container and Footer, restrict border and shadows to images from Media Library. Manually entered &lt;img&gt; HTML without Media Library classes will not have borders.','weaver-xtreme')),

	array('name' => '<small>' . __('Caption text color','weaver-xtreme') . '</small>', 'id' => 'caption_color', 'type' => 'ctext',
		'info' => __('Color of captions - e.g., below media images.','weaver-xtreme')),

	array('name' => __('Featured Image - Pages','weaver-xtreme'), 'id' => '-id', 'type'=>'subheader_alt',
        'info' => __('Display of Page Featured Images','weaver-xtreme')),
    array('name' => '<span class="i-left" style=font-size:120%;">&nbsp;&#10538;</span>' . __('Featured Image Location','weaver-xtreme'),
        'id' => 'page_fi_location', 'type' => 'fi_location',
        'info' => 'Where to display Featured Image for Pages'),
    array('name' => '<span class="i-left dashicons dashicons-editor-alignleft"></span><small>' . __('Featured Image Alignment<small>','weaver-xtreme'), 'id' => 'page_fi_align', 'type' => 'fi_align',
        'info' => __('How to align the Featured Image','weaver-xtreme')),

	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Featured Image on Pages','weaver-xtreme') . '</small>', 'id' => 'page_fi_hide', 'type' => 'select_hide',
        'info' => __('Where to hide Featured Images on Pages (Posts have their own setting.)','weaver-xtreme')),

	array ('name' => '<small>' . __('Page Featured Image Size','weaver-xtreme') . '</small>',
        'id' => 'page_fi_size', 'type' => 'select_id',
        'info' => __('Media Library Image Size for Featured Image on pages. (Header uses full size).','weaver-xtreme'),
		'value' => array(
			array('val' => 'thumbnail', 'desc' => __('Thumbnail (default)','weaver-xtreme')),
			array('val' => 'medium', 'desc' => __('Medium','weaver-xtreme')),
			array('val' => 'large', 'desc' => __('Large','weaver-xtreme')),
            array('val' => 'full', 'desc' => __('Full','weaver-xtreme')))
	  ),
	array('name' => '<span class="i-left" style="font-size:150%;">&harr;</span><small>' . __('Featured Image Width, Pages','weaver-xtreme') . '</small>',
        'id' => 'page_fi_width', 'type' => '+val_percent',
		'info' => __('Width of Featured Image on Pages. Max Width in %, overrides FI Size selection. (&starf;Plus)','weaver-xtreme') ),

	array('name' => __('Lists - &lt;HR&gt; - Tables','weaver-xtreme'), 'id' => '-list-view', 'type'=>'subheader_alt',
        'info' => __('Other options related to content','weaver-xtreme')),
	array ('name' => __('Content List Bullet','weaver-xtreme'),
        'id' => 'contentlist_bullet', 'type' => 'select_id',
        'info' => __('Bullet used for Unordered Lists in Content areas','weaver-xtreme'),
        'value' => array(
			array('val' => 'disc', 'desc' => __('Filled Disc (default)','weaver-xtreme')),
			array('val' => 'circle', 'desc' => __('Circle','weaver-xtreme')),
			array('val' => 'square', 'desc' => __('Square','weaver-xtreme')),
			array('val' => 'none', 'desc' => __('None','weaver-xtreme')))
	  ),

	array('name' => __('&lt;HR&gt; color','weaver-xtreme'), 'id' => 'hr_color', 'type' => 'ctext',
		'info' => __('Color of horizontal (&lt;hr&gt;) lines in posts and pages.','weaver-xtreme')),

	array ('name' => __('Table Style','weaver-xtreme'), 'id' => 'weaverx_tables', 'type' => 'select_id',
		'info' => __('Style used for tables in content.','weaver-xtreme'),
		'value' => array(
			array('val' => 'default', 'desc' => __('Theme Default','weaver-xtreme')),
			array('val' => 'bold', 'desc' => __('Bold Headings','weaver-xtreme')),
			array('val' => 'noborders', 'desc' => __('No Borders','weaver-xtreme')),
			array('val' => 'fullwidth', 'desc' => __('Wide','weaver-xtreme')),
			array('val' => 'wide', 'desc' => __('Wide 2','weaver-xtreme')),
			array('val' => 'plain', 'desc' => __('Minimal','weaver-xtreme')))
	  ),

	array('name' => __('Comments','weaver-xtreme'), 'id' => '-admin-comments', 'type' => 'subheader',
        'info' => __('Settings for displaying comments','weaver-xtreme')),
	array('name' => __('Comment Headings','weaver-xtreme'), 'id' => 'comment_headings_color', 'type' => 'ctext',
        'info' => __('Color for various headings in comment form','weaver-xtreme')),
	array('name' => __('Comment Content BG','weaver-xtreme'), 'id' => 'comment_content_bgcolor', 'type' => 'ctext',
        'info' => __('BG Color of Comment Content area','weaver-xtreme')),
	array('name' => __('Comment Submit Button BG','weaver-xtreme'), 'id' => 'comment_submit_bgcolor', 'type' => 'ctext',
        'info' => __('BG Color of "Post Comment" submit button','weaver-xtreme')),
    array('name' => '<span class="i-left" style="font-size:200%;margin-left:4px;">&#x25a1;</span><small>' . __('Show Borders on Comments','weaver-xtreme') . '</small>',
        'id' => 'show_comment_borders', 'type' => 'checkbox',
        'info' => __('Show Borders around comment sections - improves visual look of comments.','weaver-xtreme')),

	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Old Comments When Closed','weaver-xtreme') . '</small>',
        'id' => 'hide_old_comments', 'type' => '+checkbox',
        'info' => __('Hide previous comments after closing comments for page or post. (Default: show old comments after closing.) (&starf;Plus)','weaver-xtreme')),
    array('name' => '<span class="i-left dashicons dashicons-visibility"></span>'. '<small>' . __('Show Allowed HTML','weaver-xtreme') . '</small>',
        'id' => 'form_allowed_tags', 'type' => '+checkbox',
        'info' => __('Show the allowed HTML tags below comment input box (&starf;Plus)','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><span class="dashicons dashicons-admin-comments"></span>' .
          '<small>' . __('Hide Comment Title Icon','weaver-xtreme') . '</small>',
        'id' => 'hide_comment_bubble', 'type' => '+checkbox',
        'info' => __('Hide the comment icon before the Comments title (&starf;Plus)','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Separator Above Comments','weaver-xtreme') . '</small>',
        'id' => 'hide_comment_hr', 'type' => '+checkbox',
        'info' => __('Hide the (&lt;hr&gt;) separator line above the Comments area (&starf;Plus)','weaver-xtreme'))
	);

?>
   <div class="options-intro">
<?php _e('<strong>Content Areas:</strong> Includes options common to both <em>Pages</em> and <em>Posts</em>. Options for <strong>Text</strong>,
<strong>Padding</strong>, <strong>Images</strong>, <strong>Lists &amp; Tables</strong>, and user <strong>Comments</strong>.','weaver-xtreme'); ?><br />
<div class="options-intro-menu">
<a href="#content-area"><?php _e('Content Area','weaver-xtreme'); ?></a> |
<a href="#text"><?php _e('Text','weaver-xtreme'); ?></a> |
<a href="#search-boxes"><?php _e('Search Boxes','weaver-xtreme'); ?></a> |
<a href="#images"><?php _e('Images','weaver-xtreme'); ?></a> |
<a href="#featured-image-pages"><?php _e('Featured Image - Pages','weaver-xtreme'); ?></a> |
<a href="#lists-hr-tables"><?php _e('Lists - &lt;HR&gt; - Tables','weaver-xtreme'); ?></a> |
<a href="#comments"><?php _e('Comments','weaver-xtreme'); ?></a>
</div>
   </div>
<?php
	weaverx_form_show_options($opts);
	do_action('weaverxplus_admin','content_areas');
?>
	<span style="color:green;"><b><?php _e('Hiding/Enabling Page and Post Comments','weaver-xtreme'); ?></b></span>
<?php
	weaverx_help_link('help.html#LeavingComments',__('Help for Leaving Comments','weaver-xtreme'));
?>
<p>
<?php _e('Controlling "Reply/Leave a Comment" visibility for pages and posts is <strong>not</strong> a theme function.
It is controlled by WordPress settings.
Please click the ? just above to see the help file entry!','weaver-xtreme'); ?>
</p>
<?php
}

// ======================== Main Options > Post Specifics ========================
function weaverx_mainopts_posts() {
	$opts = array(
	array( 'type' => 'submit'),
	array('name' => __('Post Specifics','weaver-xtreme'), 'id' => '-admin-post', 'type' => 'header',
		'info' => __('Settings affecting Posts','weaver-xtreme'),
        'help' => 'help.html#PPSpecifics'),

    array('name' => __('Post Area','weaver-xtreme'), 'id' => 'post', 'type' => 'widget_area',
		'info' => __('Use these settings to override Content Area settings for Posts (blog entries).','weaver-xtreme')),

	array('name' => __('Sticky Post BG','weaver-xtreme'), 'id' => 'stickypost_bgcolor', 'type' => 'ctext',
		'info' => __('BG color for sticky posts, author info. (Add {border:none;padding:0;} to CSS to make sticky posts same as regular posts.)','weaver-xtreme')),

    array('name' => '<small>' . __('Reset Major Content Options','weaver-xtreme') . '</small>', 'id' => 'reset_content_opts', 'type' => 'checkbox',
		'info' => __('Clear wrapping Content Area bg, borders, padding, and top/bottom margins for views with posts. Allows more flexible post settings.','weaver-xtreme')),


    array( 'type' => 'submit'),


    array('name' => __('Post Title','weaver-xtreme'), 'id' => '-text', 'type' => 'subheader_alt',
        'info' => __('Options for the Post Title','weaver-xtreme')),

	array('name' => __('Post Title','weaver-xtreme'), 'id' => 'post_title', 'type' => 'titles',
		'info' => __("Post title (Blog Views)",'weaver-xtreme')),

    array('name' => '<small>' . __('Bar under Post Titles','weaver-xtreme') . '</small>', 'id' => 'post_title_underline_int', 'type' => 'val_px',
		'info' => __('Enter size in px if you want a bar under page title. Leave blank or 0 for no bar.','weaver-xtreme')),

    array('name' => '<small>' . __('Post Title Hover','weaver-xtreme') . '</small>', 'id' => 'post_title_hover_color', 'type' => 'ctext',
		'info' => __('Color if you want the Post Title to show alternate color for hover','weaver-xtreme')),

    array('name' => '<small>' . __('Space After Post Title','weaver-xtreme') . '</small>', 'id' => 'post_title_bottom_margin_dec', 'type' => 'val_em',
		'info' => __('Space between Post Title and Post Info Line or content. (Default: 0.15em)','weaver-xtreme')),


	array('name' => '<span class="i-left dashicons dashicons-admin-comments"></span><small>' . __('Show Comment Bubble','weaver-xtreme') . '</small>',
        'id' => 'show_post_bubble', 'type' => 'checkbox',
		'info' => __("Show comment bubble with link to comments on the post info line",'weaver-xtreme')),

    array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide <em>Post Format</em> Icons','weaver-xtreme') . '</small>',
        'id' => 'hide_post_format_icon', 'type' => '+checkbox',
		'info' => __('Hide the icons for posts with Post Format specified. (&starf;Plus)','weaver-xtreme')),




array('name' => __('Post Layout','weaver-xtreme'), 'id' => '-schedule', 'type' => 'subheader_alt',
        'info' => __('Layout of Posts','weaver-xtreme')),

	array('name' => '<span class="i-left" style=font-size:120%;">&nbsp;&#9783;</span>' . __('Columns of Posts','weaver-xtreme'), 'id' => 'blog_cols', 'type' => 'select_id',	//code
        'info' => __('Display posts on blog page with this many columns. (You should adjust "Display posts on blog page with this many columns" on Settings:Reading to be a multiple of this value.)','weaver-xtreme'),
        'value' => array(
			array('val' => '1', 'desc' => __('1 Column','weaver-xtreme')),
			array('val' => '2', 'desc' => __('2 Columns','weaver-xtreme')),
			array('val' => '3', 'desc' => __('3 Columns','weaver-xtreme')))
	  ),
	array('name' => '<small>' . __('First Post One Column','weaver-xtreme') . '</small>', 'id' => 'blog_first_one', 'type' => 'checkbox',
		'info' => __('Always display the first post in one column.','weaver-xtreme')),
	array('name' => '<small>' . __('Sticky Posts One Column','weaver-xtreme') . '</small>', 'id' => 'blog_sticky_one', 'type' => 'checkbox',
		'info' => __("Display opening Sticky Posts in one column. If First Post One Column also checked, then first non-sticky post will be one column.",'weaver-xtreme')),
	array('name' => '<span class="i-left" style=font-size:120%;">&nbsp;&#9783;</span><small>' . __('Use <em>Masonry</em> for Posts','weaver-xtreme') . '</small>',
        'id' => 'masonry_cols', 'type' => 'select_id',	//code
        'info' => __('Use the <em>Masonry</em> blog layout option to show dynamically packed posts on blog and archive-like pages. Overrides "Columns of Posts" setting.','weaver-xtreme'),
        'value' => array(
			array('val' => '0', 'desc' => ''),
			array('val' => '2', 'desc' => __('2 Columns','weaver-xtreme')),
			array('val' => '3', 'desc' => __('3 Columns','weaver-xtreme')),
			array('val' => '4', 'desc' => __('4 Columns','weaver-xtreme')),
			array('val' => '5', 'desc' => __('5 Columns','weaver-xtreme')))
	  ),

    array('name' => '<small>' . __('Compact <em>Post Format</em> Posts','weaver-xtreme') . '</small>',
        'id' => 'compact_post_formats', 'type' => 'checkbox',
		'info' => __('Use compact layout for <em>Post Format</em> posts (Image, Gallery, Video, etc.). Useful for photo blogs and multi-column layouts. Looks great with <em>Masonry</em>.','weaver-xtreme')),
	array('name' => __('Photo Bloging','weaver-xtreme'),
        'info' => __('Read the Help entry for information on creating a Photo Blog page','weaver-xtreme'),
        'type' => 'note','help' => 'help.html#PhotoBlog'),


    array( 'type' => 'submit'),

    array('name' => __('Excerpts / Full Posts','weaver-xtreme'), 'id' => '-exerpt-view', 'type' => 'subheader_alt',
        'info' => __('How to display posts in  Blog / Archive Views','weaver-xtreme')),
	array('name' => __('Show Full Blog Posts','weaver-xtreme'), 'id' => 'fullpost_blog', 'type' => 'checkbox',
			'info' => __('Will display full blog post instead of excerpts on <em>blog pages</em>.','weaver-xtreme')),
	array('name' => '<small>' . __('Full Post for Archives','weaver-xtreme') . '</small>', 'id' => 'fullpost_archive', 'type' => 'checkbox',
			'info' => __('Display the full posts instead of excerpts on <em>special post pages</em>. (Archives, Categories, etc.) Does not override manually added &lt;--more--> breaks.','weaver-xtreme')),
	array('name' => '<small>' . __('Full Post for Searches','weaver-xtreme') . '</small>', 'id' => 'fullpost_search', 'type' => 'checkbox',
			'info' => __('Display the full posts instead of excerpts for Search results. Does not override manually added &lt;--more--> breaks.','weaver-xtreme')),
	array('name' => '<small>' . __('Full text for 1st <em>"n"</em> Posts','weaver-xtreme') . '</small>',
        'id' => 'fullpost_first', 'type' => 'val_num',
		'info' => __('Display the full post for the first "n" posts on Blog pages. Does not override manually added &lt;--more--> breaks.','weaver-xtreme')),
	array('name' => '<small>' . __('Excerpt length','weaver-xtreme') . '</small>', 'id' => 'excerpt_length', 'type' => 'val_num',
			'info' => __('Change post excerpt length. (Default: 40 words)','weaver-xtreme')),
	array('name' => '<small>' . __('<em>Continue reading</em> Message','weaver-xtreme') . '</small>', 'id' => 'excerpt_more_msg', 'type' => 'widetext',
			'info' => __('Change default <em>Continue reading &rarr;</em> message for excerpts. Can include HTML (e.g., &lt;img>).','weaver-xtreme')),
    array('type' => 'endheader'),




	array('name' => __('Post Navigation','weaver-xtreme'), 'id' => '-leftright', 'type' => 'subheader_alt',
        'info' => __('Navigation for moving between posts','weaver-xtreme')),
	array('name' => __('Blog Navigation Style','weaver-xtreme'), 'id' => 'nav_style', 'type' => 'select_id',
        'info' => __('Style of navigation links on blog pages: "Older/Newer posts", "Previous/Next Post", or by page numbers','weaver-xtreme'),
        'value' => array(
			array('val' => 'old_new', 'desc' => __('Older/Newer','weaver-xtreme')),
			array('val' => 'prev_next', 'desc' => __('Previous/Next','weaver-xtreme')),
			array('val' => 'paged_left', 'desc' => __('Paged - Left','weaver-xtreme')),
			array('val' => 'paged_right', 'desc' => __('Paged - Right','weaver-xtreme')))
	  ),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Top Links','weaver-xtreme') . '</small>',
        'id' => 'nav_hide_above', 'type' => '+checkbox',
        'info' => __('Hide the blog navigation links at the top (&starf;Plus)','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Bottom Links','weaver-xtreme') . '</small>',
        'id' => 'nav_hide_below', 'type' => '+checkbox',
        'info' => __('Hide the blog navigation links at the bottom (&starf;Plus)','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Show Top on First Page','weaver-xtreme') . '</small>',
        'id' => 'nav_show_first', 'type' => '+checkbox',
        'info' => __('Show navigation at top even on the first page (&starf;Plus)','weaver-xtreme')),

	array('name' => __('Single Page Navigation Style','weaver-xtreme'), 'id' => 'single_nav_style', 'type' => 'select_id',
        'info' => __('Style of navigation links on post Single pages: Previous/Next, by title, or none','weaver-xtreme'),
        'value' => array(
			array('val' => 'title', 'desc' => __('Post Titles','weaver-xtreme')),
			array('val' => 'prev_next', 'desc' => __('Previous/Next','weaver-xtreme')),
			array('val' => 'hide', 'desc' => __('None - no display','weaver-xtreme')))
	  ),
	array('name' => '<small>' . __('Link to Same Categories','weaver-xtreme') . '</small>', 'id' => 'single_nav_link_cats', 'type' => '+checkbox',
        'info' => __('Single Page navigation links point to posts with same categories. (&starf;Plus)','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Top Links','weaver-xtreme') . '</small>',
        'id' => 'single_nav_hide_above', 'type' => '+checkbox',
        'info' => __('Hide the single page navigation links at the top (&starf;Plus)','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Bottom Links','weaver-xtreme') . '</small>',
        'id' => 'single_nav_hide_below', 'type' => '+checkbox',
        'info' => __('Hide the single page navigation links at the bottom (&starf;Plus)','weaver-xtreme')),

	array( 'type' => 'submit'),
	array('name' => __('Post Meta Info Areas','weaver-xtreme'), 'id' => '-info', 'type' => 'subheader_alt',
        'info' => __('Top and Bottom Post Meta Information areas','weaver-xtreme')),

    array('name' => __('Top Post Info','weaver-xtreme'), 'id' => 'post_info_top', 'type' => 'titles_text',
		'info' => __("Top Post info line",'weaver-xtreme')),


	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide top post info','weaver-xtreme') . '</small>',
        'id' => 'post_info_hide_top', 'type' => 'checkbox',	//code
        'info' => 'Hide entire top info line (posted on, by) of post.'),

	array('name' => __('Bottom Post Info','weaver-xtreme'), 'id' => 'post_info_bottom', 'type' => 'titles_text',
		'info' => __('The bottom post info line','weaver-xtreme')),

    array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide bottom post info','weaver-xtreme') . '</small>',
        'id' => 'post_info_hide_bottom', 'type' => 'checkbox',	//code
        'info' => __('Hide entire bottom info line (posted in, comments) of post.','weaver-xtreme')),


    array('name' => '<span class="i-left dashicons dashicons-visibility"></span>' . __('Show Author Avatar','weaver-xtreme'),
        'id' => 'show_post_avatar', 'type' => 'select_id',	//code
        'info' => __('Show author avatar on the post info line (also can be set per post with post editor)','weaver-xtreme'),
        'value' => array(
			array('val' => 'hide', 'desc' => __('Do Not Show','weaver-xtreme')),
			array('val' => 'start', 'desc' => __('Start of Info Line','weaver-xtreme')),
			array('val' => 'end', 'desc' => __('End of Info Line','weaver-xtreme')))),

	array('name' => '<small>' . __('Avatar size','weaver-xtreme') . '</small>', 'id' => 'post_avatar_int', 'type' => 'val_px',
			'info' => __('Size of Avatar in px. (Default: 28px)','weaver-xtreme')),

    array('name' => __('Use Icons in Post Info','weaver-xtreme'), 'id' => 'post_icons', 'type' => 'select_id',
        'info' => __('Use Icons instead of Text descriptions in Post Meta Info','weaver-xtreme'),
        'value' => array(
			array('val' => 'text', 'desc' => __('Text Descriptions','weaver-xtreme')),
			array('val' => 'fonticons', 'desc' => __('Font Icons','weaver-xtreme')),
			array('val' => 'graphics', 'desc' => __('Graphic Icons','weaver-xtreme')))
	  ),
    array('name' => '<small>' . __('Font Icons Color','weaver-xtreme') . '</small>', 'id' => 'post_icons_color', 'type' => 'color',
		'info' => __('Color for Font Icons (Default: Post Info text color)','weaver-xtreme')),


	array('name' => '<span style="color:red">' . __('Note:','weaver-xtreme') . '</span>',
          'type' => 'note', 'info' => __('Hiding any meta info item automatically uses Icons instead of text descriptions.','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Post Date','weaver-xtreme') . '</small>',
        'id' => 'post_hide_date', 'type' => 'checkbox',
		'info' => __('Hide the post date everywhere it is normally displayed.','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Post Author','weaver-xtreme') . '</small>',
        'id' => 'post_hide_author', 'type' => 'checkbox',
		'info' => __('Hide the post author everywhere it is normally displayed.','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Post Categories','weaver-xtreme') . '</small>',
        'id' => 'post_hide_categories', 'type' => 'checkbox',
		'info' => __('Hide the post categories and tags wherever they are normally displayed.','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Post Tags','weaver-xtreme') . '</small>', 'id' => 'post_hide_tags', 'type' => 'checkbox',
			'info' => 'Hide the post tags wherever they are normally displayed.'),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Permalink','weaver-xtreme') . '</small>',
        'id' => 'hide_permalink', 'type' => 'checkbox',
		'info' => __('Hide the permalink.','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Category if Only One','weaver-xtreme') . '</small>',
        'id' => 'hide_singleton_category', 'type' => 'checkbox',
		'info' => __('If there is only one overall category defined (Uncategorized), don\'t show Category of post.','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Author for Single Author Site','weaver-xtreme') . '</small>',
        'id' => 'post_hide_single_author', 'type' => 'checkbox',
		'info' => __('Hide author information if site has only a single author.','weaver-xtreme')),

    array('name' => __('Post Info Links','weaver-xtreme'), 'id' => 'ilink', 'type' => 'link',
		'info' => __('Links in post information top and bottom lines.','weaver-xtreme')),

	array( 'type' => 'submit'),


	array('name' => __('Featured Image - Posts','weaver-xtreme'), 'id' => '-id', 'type' => 'subheader_alt',
        'info' => __('Display of Post Featured Images','weaver-xtreme')),

    array('name' => '<span class="i-left" style=font-size:120%;">&nbsp;&#10538;</span>' . __('FI Location - Full Post','weaver-xtreme'),
        'id' => 'post_full_fi_location', 'type' => 'fi_location_post',
        'info' => __('Where to display Featured Image for full blog posts.','weaver-xtreme')),
    array('name' => '<span class="i-left dashicons dashicons-editor-alignleft"></span><small>' . __('FI Alignment - Full post','weaver-xtreme') . '</small>',
        'id' => 'post_full_fi_align', 'type' => 'fi_align',
        'info' => 'Featured Image alignment'),


	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide FI - Full Posts','weaver-xtreme') . '</small>',
        'id' => 'post_full_fi_hide', 'type' => 'select_hide',
        'info' => __('Hide Featured Images on full blog posts.','weaver-xtreme')),
	array ('name' => '<small>' . __('FI Size - Full Posts','weaver-xtreme') . '</small>',
        'id' => 'post_full_fi_size', 'type' => 'select_id',
        'info' => __('Media Library Image Size for Featured Image on full posts.','weaver-xtreme'),
		'value' => array(
			array('val' => 'thumbnail', 'desc' => __('Thumbnail (default)','weaver-xtreme')),
			array('val' => 'medium', 'desc' => __('Medium','weaver-xtreme')),
			array('val' => 'large', 'desc' => __('Large','weaver-xtreme')),
            array('val' => 'full', 'desc' => __('Full','weaver-xtreme')))
	  ),
	array('name' => '<span class="i-left" style="font-size:150%;">&harr;</span><small>' . __('FI Width, Full Posts','weaver-xtreme') . '</small>',
        'id' => 'post_full_fi_width', 'type' => '+val_percent',
		'info' => __('Width of Featured Image on Full Posts.  Max Width in %, overrides FI Size selection. (&starf;Plus)','weaver-xtreme') ),



    array('name' => '<span class="i-left" style=font-size:120%;">&nbsp;&#10538;</span>'. __('FI Location - Excerpts','weaver-xtreme'),
        'id' => 'post_excerpt_fi_location', 'type' => 'fi_location_post',
        'info' => __('Where to display Featured Image for posts displayed as excerpt.','weaver-xtreme')),
    array('name' => '<span class="i-left dashicons dashicons-editor-alignleft"></span><small>' . __('FI Alignment - Excerpts','weaver-xtreme') . '</small>',
        'id' => 'post_excerpt_fi_align', 'type' => 'fi_align',
        'info' => __('How to align the Featured Image','weaver-xtreme')),

	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide FI - Excerpts','weaver-xtreme') . '</small>',
        'id' => 'post_excerpt_fi_hide', 'type' => 'select_hide',
        'info' => __('Where to hide Featured Images on full blog posts.','weaver-xtreme')),
	array ('name' => '<small>FI Size - Excerpts</small>',
        'id' => 'post_excerpt_fi_size', 'type' => 'select_id',
        'info' => __('Media Library Image Size for Featured Image on excerpts.','weaver-xtreme'),
		'value' => array(
			array('val' => 'thumbnail', 'desc' => __('Thumbnail (default)','weaver-xtreme')),
			array('val' => 'medium', 'desc' => __('Medium','weaver-xtreme')),
			array('val' => 'large', 'desc' => __('Large','weaver-xtreme')),
            array('val' => 'full', 'desc' => __('Full','weaver-xtreme')))
	  ),
	array('name' => '<span class="i-left" style="font-size:150%;">&harr;</span><small>' . __('FI Width, Excerpts','weaver-xtreme') . '</small>',
        'id' => 'post_excerpt_fi_width', 'type' => '+val_percent',
		'info' => __('Width of Featured Image on excerpts.  Max Width in %, overrides FI Size selection. (&starf;Plus)','weaver-xtreme') ),


    array('name' => '<span class="i-left" style=font-size:120%;">&nbsp;&#10538;</span>' . __('FI Location - Single Page','weaver-xtreme'),
        'id' => 'post_fi_location', 'type' => 'fi_location',
        'info' => __('Where to display Featured Image for posts on single page view.','weaver-xtreme')),
    array('name' => '<span class="i-left dashicons dashicons-editor-alignleft"></span><small>' . __('FI Alignment - Single Page','weaver-xtreme') . '</small>',
        'id' => 'post_fi_align', 'type' => 'fi_align',
        'info' => __('How to align the Featured Image on Single Page View.','weaver-xtreme')),

	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide FI - Single Page','weaver-xtreme') . '</small>',
        'id' => 'post_fi_hide', 'type' => 'select_hide',
        'info' => __('Where to hide Featured Images on single page view.','weaver-xtreme')),
	array ('name' => '<small>' . __('FI Size - Single Posts','weaver-xtreme') . '</small>',
        'id' => 'post_fi_size', 'type' => 'select_id',
        'info' => __('Media Library Image Size for Featured Image on single page view.','weaver-xtreme'),
		'value' => array(
			array('val' => 'thumbnail', 'desc' => __('Thumbnail (default)','weaver-xtreme')),
			array('val' => 'medium', 'desc' => __('Medium','weaver-xtreme')),
			array('val' => 'large', 'desc' => __('Large','weaver-xtreme')),
            array('val' => 'full', 'desc' => __('Full','weaver-xtreme')))
	  ),
	array('name' => '<span class="i-left" style="font-size:150%;">&harr;</span><small>' . __('FI Width, Single Page','weaver-xtreme') . '</small>',
        'id' => 'post_fi_width', 'type' => '+val_percent',
		'info' => __('Width of Featured Image on single page view. Max Width in %, overrides FI Size selection. (&starf;Plus)','weaver-xtreme') ),



    array( 'type' => 'submit'),


	array('name' => __('More Post Related Options','weaver-xtreme'), 'id' => '-forms', 'type' => 'subheader_alt',
        'info' => __('Other options related to post display, including single pages.','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Show <em>Comments are closed.</em>','weaver-xtreme') . '</small>',
        'id' => 'show_comments_closed', 'type' => 'checkbox',
		'info' => __('If comments are off, and no comments have been made, show the <em>Comments are closed.</em> message.','weaver-xtreme') ),
    array('name' => __('Author Info BG','weaver-xtreme'), 'id' => 'post_author_bgcolor', 'type' => 'ctext',
			'info' => __('Background color used for Author Bio.','weaver-xtreme')),
	array('name' => '<span class="i-left dashicons dashicons-visibility"></span><small>' . __('Hide Author Bio','weaver-xtreme') . '</small>',
        'id' => 'hide_author_bio', 'type' => 'checkbox',
		'info' => __('Hide display of author bio box on single post page view.','weaver-xtreme')),
	array('name' => '<small>' . __('Allow comments for attachments','weaver-xtreme') . '</small>',
        'id' => 'allow_attachment_comments', 'type' => 'checkbox',
		'info' => __('Allow visitors to leave comments for attachments (usually full size media image - only if comments allowed).','weaver-xtreme'))
	);

?>
   <div class="options-intro">
<?php _e('<strong>Post Specifics: </strong>
Options related to <strong>Posts</strong>, including <strong>Background</strong> color, <strong>Columns</strong> displayed
on blog pages, <strong>Title</strong> options, <strong>Navigation</strong> to earlier and later posts, the post
<strong>Info Lines</strong>, <strong>Excerpts</strong>, and <strong>Featured Image</strong> handling.','weaver-xtreme'); ?>
<br />
<div class="options-intro-menu">
<a href="#post-area"><?php _e('Post Area','weaver-xtreme'); ?></a> |
<a href="#post-title"><?php _e('Post Title','weaver-xtreme');?></a> |
<a href="#post-layout"><?php _e('Post Layout','weaver-xtreme');?></a> |
<a href="#excerpts-full-posts"><?php _e('Excerpts / Full Posts','weaver-xtreme');?></a> |
<a href="#post-navigation"><?php _e('Post Navigation','weaver-xtreme');?></a> |
<a href="#post-meta-info-areas"><?php _e('Post Meta Info Areas','weaver-xtreme');?></a> |
<a href="#featured-image-posts"><?php _e('Featured Image - Posts','weaver-xtreme'); ?></a> |
<a href="#more-post-related-options"><?php _e('More Post Related Options','weaver-xtreme'); ?></a> |
<a href="#custom-post-info-lines"><?php _e('Custom Post Info Lines','weaver-xtreme'); ?></a>
</div>
   </div>
<?php
	weaverx_form_show_options($opts);
	do_action('weaverxplus_admin','post_specifics');
?>
	<span style="color:green;"><b><?php _e('Hiding/Enabling Page and Post Comments','weaver-xtreme'); ?></b></span>
<?php
	weaverx_help_link('help.html#LeavingComments',__('Help for Leaving Comments','weaver-xtreme'));
?>
<p>
<?php _e('Controlling "Reply/Leave a Comment" visibility for pages and posts is <strong>not</strong> a theme function.
It is controlled by WordPress settings.
Please click the ? just above to see the help file entry!
(Additional options for comment <em>styling</em> are found on the Content Areas tab.)','weaver-xtreme'); ?>
</p>
<?php
}


// ======================== Main Options > Footer ========================
function weaverx_mainopts_footer() {
	$opts = array(
	array( 'type' => 'submit'),

    array('name' => __('Footer Options','weaver-xtreme'), 'id' => '-admin-generic', 'type' => 'header',
		'info' => __('Settings for the footer','weaver-xtreme'),
        'help' => 'help.html#FooterOpt'),


    array('name' => __('Footer Area','weaver-xtreme'), 'id' => 'footer', 'type' => 'widget_area',
		'info' => __('Properties for the footer area.','weaver-xtreme')),
    array('name' => __('Footer Links','weaver-xtreme'), 'id' => 'footerlink', 'type' => 'link',
		'info' => __('Color for links in Footer (Uses Standard Link colors if left blank).','weaver-xtreme')),
    array( 'type' => 'submit'),

    array('name' => __('Footer Widget Area','weaver-xtreme'), 'id' => 'footer_sb', 'type' => 'widget_area_submit',
		'info' => __('Properties for the Footer Widget Area.','weaver-xtreme')),

    array('name' => __('Footer HTML','weaver-xtreme'), 'id' => 'footer_html', 'type' => 'widget_area',
		'info' => __('Add arbitrary HTML to Footer Area (in &lt;div id=\"footer-html\"&gt;)','weaver-xtreme')),

    array('name' => '<span class="i-left dashicons dashicons-editor-code"></span>' . __('Footer HTML content','weaver-xtreme'),
        'id' => 'footer_html_text', 'type' => 'textarea',
        'placeholder' => 'Any HTML, including shortcodes.',
		'info' => __("Add arbitrary HTML",'weaver-xtreme'), 'val' => 4),
    array( 'type' => 'submit'),
    );

?>
<div class="options-intro">
<?php _e('<strong>Footer: </strong> 	Options affecting the <strong>Footer</strong> area, including <strong>Background</strong>
color, <strong>Borders</strong>, and the <strong>Copyright</strong> message.','weaver-xtreme'); ?>
<br />
<div class="options-intro-menu">
<a href="#footer-area"><?php _e('Footer Area','weaver-xtreme'); ?></a> |
<a href="#footer-widget-area"><?php _e('Footer Widget Area','weaver-xtreme'); ?></a> |
<a href="#footer-html"><?php _e('Footer HTML','weaver-xtreme'); ?></a> |
<a href="#site-copyright"><?php _e('Site Copyright','weaver-xtreme'); ?></a>
</div>
</div>
<?php
	weaverx_form_show_options($opts);
	do_action('weaverxplus_admin','footer_opts');
?>
	<a id="site-copyright"></a>
<strong>&copy;</strong>&nbsp;<span style="color:blue;"><b><?php _e('Site Copyright','weaver-xtreme'); ?></b></span>
<br/>
<small>
<?php _e('If you fill this in, the default copyright notice in the footer will be replaced with the text here.
It will not automatically update from year to year.
Use &amp;copy; to display &copy;.
You can use other HTML as well.
Use <span class="style4">&amp;nbsp;</span> to hide the copyright notice. &diams;','weaver-xtreme'); ?>
</small>
	<br />

	<span class="dashicons dashicons-editor-code"></span>
<textarea name="<?php weaverx_sapi_main_name('copyright'); ?>" rows=1 style="width:750px;"><?php echo(esc_textarea(weaverx_getopt('copyright'))); ?>
</textarea>
	<br>
		<label><span class="dashicons dashicons-visibility"></span> <?php _e('Hide Powered By tag:','weaver-xtreme'); ?>
        <input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_poweredby'); ?>" id="_hide_poweredby" <?php checked(weaverx_getopt_checked( '_hide_poweredby' )); ?> />
        </label>
		<small><?php _e('Check this to hide the "Proudly powered by" notice in the footer.','weaver-xtreme'); ?></small>
		<br /><br />
	<?php _e('You can add other content to the Footer from the Advanced Options:HTML Insertion tab.','weaver-xtreme'); ?>
<?php
}

// ======================== Main Options > Widget Areas ========================
function weaverx_mainopts_widgets() {
	$opts = array(
	array( 'type' => 'submit'),
	array('name' => __('Sidebar Options','weaver-xtreme'), 'id' => '-screenoptions', 'type' => 'header',
		'info' => __('Settings affecting main Sidebars and individual widgets','weaver-xtreme'),
		'help' => 'help.html#WidgetAreas'),

	array('name' => __('Individual Widgets','weaver-xtreme'), 'id' => 'widget', 'type' => 'widget_area',
		'info' => __('Properties for individual widgets (e.g., Text, Recent Posts, etc.)','weaver-xtreme')),

	array('name' => __('Widget Title','weaver-xtreme'), 'id' => 'widget_title', 'type' => 'titles',
		'info' => __('Color for Widget Titles.','weaver-xtreme')),
	array('name' => __('Bar under Widget Titles','weaver-xtreme'), 'id' => 'widget_title_underline_int', 'type' => 'val_px',
		'info' => __('Enter size in px if you want a bar under Widget Titles. Leave blank or 0 for no bar.','weaver-xtreme')),

	array ('name' => __('Widget List Bullet','weaver-xtreme'),
        'id' => 'widgetlist_bullet', 'type' => 'select_id',
        'info' => __('Bullet used for Unordered Lists in Widget areas.','weaver-xtreme'),
		'value' => array(
			array('val' => 'disc', 'desc' => __('Filled Disc (default)','weaver-xtreme')),
			array('val' => 'circle', 'desc' => __('Circle','weaver-xtreme')),
			array('val' => 'square', 'desc' => __('Square','weaver-xtreme')),
			array('val' => 'none', 'desc' => __('None','weaver-xtreme')))
	  ),

    array('name' => __('Widget Links','weaver-xtreme'), 'id' => 'wlink', 'type' => 'link',
		'info' => __('Color for links in widgets (uses Standard Link colors if left blank).','weaver-xtreme')),

	array( 'type' => 'submit'),



	array('name' => __('Primary Widget Area','weaver-xtreme'), 'id' => 'primary', 'type' => 'widget_area_submit',
		'info' => __('Properties for the Primary (Upper/Left) Sidebar Widget Area.','weaver-xtreme')),

	array('name' => __('Secondary Widget Area','weaver-xtreme'), 'id' => 'secondary', 'type' => 'widget_area_submit',
		'info' => __('Properties for the Secondary (Lower/Right) Sidebar Widget Area.','weaver-xtreme')),

	array('name' => __('Top Widget Areas','weaver-xtreme'), 'id' => 'top', 'type' => 'widget_area_submit',
		'info' => __('Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).','weaver-xtreme')),


	array('name' => __('Bottom Widget Areas','weaver-xtreme'), 'id' => 'bottom', 'type' => 'widget_area',
		'info' => __('Properties for all Bottom Widget areas (Sitewide, Pages, Blog, Archive).','weaver-xtreme')),

	);

	weaverx_form_show_options($opts);
?>
<hr />
    <span style="color:blue;"><b>Define Per Page Extra Widget Areas</b></span>
<?php
	weaverx_help_link('help.html#PPWidgets','Help for Per Page Widget Areas');
?>
<br/>
<small>
<?php _e('You may define extra widget areas that can then be used in the <em>Per Page</em> settings, or in the <em>Weaver Xtreme Plus</em> [widget_area] shortcode.
Enter a list of one or more widget area names separated by commas.
Your names should include only letters, numbers, or underscores - no spaces or other special characters.
The widgets areas will then appear on the Appearance->Widgets menus.
They can be included on individual pages by adding the name you define here to the "Weaver Xtreme Options For This Page" box on the Edit Page screen. (&diams;)','weaver-xtreme'); ?>
</small>
<br />
	<textarea name="<?php weaverx_sapi_main_name('_perpagewidgets'); ?>" rows=1 style="width: 80%">
    <?php echo(esc_textarea(weaverx_getopt('_perpagewidgets'))); ?>
    </textarea>
<?php
	do_action('weaverxplus_admin','widget_areas');
}

// ======================== Main Options > Layout ========================
function weaverx_mainopts_layout() {
	$opts = array( array( 'type' => 'submit'),
    array('name' => __('Sidebar Layout','weaver-xtreme'), 'id' => '-welcome-widgets-menus', 'type' => 'header',
        'info' => __('Sidebar Layout for each type of page ("stack top" used for mobile view)','weaver-xtreme'),
		'help' => 'help.html#layout'),

    array('name' => __('Blog, Post, Page Default','weaver-xtreme'), 'id' => 'layout_default', 'type' => 'select_id',
        'info' => __('Select the default theme layout for blog, single post, attachments, and pages.','weaver-xtreme'),
        'value' => array(
            array('val' => 'right', 'desc' => __('Sidebars on Right','weaver-xtreme') ),
            array('val' => 'right-top', 'desc' => __('Sidebars on Right (stack top)','weaver-xtreme') ),
            array('val' => 'left', 'desc' => __(' Sidebars on Left','weaver-xtreme') ),
            array('val' => 'left-top', 'desc' => __(' Sidebars on Left (stack top)','weaver-xtreme') ),
            array('val' => 'split', 'desc' => __('Split - Sidebars on Right and Left','weaver-xtreme') ),
            array('val' => 'split-top', 'desc' => __('Split (stack top)','weaver-xtreme') ),
            array('val' => 'one-column', 'desc' => __('No sidebars, content only','weaver-xtreme') )
	)),

	array('name' => __('Archive-like Default','weaver-xtreme'), 'id' => 'layout_default_archive', 'type' => 'select_id',
        'info' => __('Select the default theme layout for all other pages - archives, search, etc.','weaver-xtreme'),
        'value' => array(
            array('val' => 'right', 'desc' => __('Sidebars on Right','weaver-xtreme') ),
            array('val' => 'right-top', 'desc' => __('Sidebars on Right (stack top)','weaver-xtreme') ),
            array('val' => 'left', 'desc' => __(' Sidebars on Left','weaver-xtreme') ),
            array('val' => 'left-top', 'desc' => __(' Sidebars on Left (stack top)','weaver-xtreme') ),
            array('val' => 'split', 'desc' => __('Split - Sidebars on Right and Left','weaver-xtreme') ),
            array('val' => 'split-top', 'desc' => __('Split (stack top)','weaver-xtreme') ),
            array('val' => 'one-column', 'desc' => __('No sidebars, content only','weaver-xtreme') )
	)),

	array('name' => '<small>' . __('Page','weaver-xtreme') . '</small>', 'id' => 'layout_page', 'type' => 'select_layout',
        'info' => __('Layout for normal Pages on your site.','weaver-xtreme'),
        'value' => ''
	  ),
	array('name' => '<small>' . __('Blog','weaver-xtreme') . '</small>', 'id' => 'layout_blog', 'type' => 'select_layout',
        'info' => __('Layout for main blog page. Includes "Page with Posts" Page templates.','weaver-xtreme'),
        'value' => ''
	  ),
	array('name' => '<small>' . __('Post Single Page','weaver-xtreme') . '</small>', 'id' => 'layout_single', 'type' => 'select_layout',
        'info' => __('Layout for Posts displayed as a single page.','weaver-xtreme'),
        'value' => ''
	  ),
    array('name' => '<small>' . __('Attachments','weaver-xtreme') . '</small>', 'id' => 'layout_image', 'type' => '+select_layout',
        'info' => __('Layout for attachment pages such as images. (&starf;Plus)','weaver-xtreme'),
        'value' => ''
	  ),
	array('name' => '<small>' . __('Date Archive','weaver-xtreme') . '</small>', 'id' => 'layout_archive', 'type' => '+select_layout',
        'info' => __('Layout for archive by date pages. (&starf;Plus)','weaver-xtreme'),
        'value' => ''
	  ),
    array('name' => '<small>' . __('Category Archive','weaver-xtreme') . '</small>', 'id' => 'layout_category', 'type' => '+select_layout',
        'info' => __('Layout for category archive pages. (&starf;Plus)','weaver-xtreme'),
        'value' => ''
	  ),
	array('name' => '<small>' . __('Tags Archive','weaver-xtreme') . '</small>', 'id' => 'layout_tag', 'type' => '+select_layout',
        'info' => __('Layout for tag archive pages. (&starf;Plus)','weaver-xtreme'),
        'value' => ''
	  ),
	array('name' => '<small>' . __('Author Archive</small>','weaver-xtreme'), 'id' => 'layout_author', 'type' => '+select_layout',
        'info' => __('Layout for author archive pages. (&starf;Plus)','weaver-xtreme'),
        'value' => ''
	  ),
	array('name' => '<small>' . __('Search Results, 404</small>','weaver-xtreme'), 'id' => 'layout_search', 'type' => '+select_layout',
        'info' => __('Layout for search results and 404 pages. (&starf;Plus)','weaver-xtreme'),
        'value' => ''
	  ),



    array('name' => '<span class="i-left" style="font-size:120%;">&harr;</span><small>' . __('Left Sidebar Width','weaver-xtreme') . '</small>', 'id' => 'left_sb_width_int', 'type' => 'val_percent',
        'info' => __('Width for Left Sidebar (Default: 25%)','weaver-xtreme'),
        'value' => ''
	  ),
    array('name' => '<span class="i-left" style="font-size:120%;">&harr;</span><small>' . __('Right Sidebar Width','weaver-xtreme') . '</small>', 'id' => 'right_sb_width_int', 'type' => 'val_percent',
        'info' => __('Width for Right Sidebar (Default: 25%)','weaver-xtreme'),
        'value' => ''
	  ),
    array('name' => '<span class="i-left" style="font-size:120%;">&harr;</span><small>' . __('Split Left Sidebar Width','weaver-xtreme') . '</small>', 'id' => 'left_split_sb_width_int', 'type' => 'val_percent',
        'info' => __('Width for Split Sidebar, Left Side (Default: 25%)','weaver-xtreme'),
        'value' => ''
	  ),
    array('name' => '<span class="i-left" style="font-size:120%;">&harr;</span><small>' . __('Split Right Sidebar Width','weaver-xtreme') . '</small>', 'id' => 'right_split_sb_width_int', 'type' => 'val_percent',
        'info' => __('Width for Split Sidebar, Right Side (Default: 25%)','weaver-xtreme'),
        'value' => ''
	  ),
    array('name' => '<span class="i-left" style="font-size:120%;">&harr;</span> ' . __('Content Width:','weaver-xtreme'), 'type' => 'note',
		'info' => __('The width of content area automatically determined by sidebar layout and width','weaver-xtreme')),

    array('name' => __('Flow color to bottom','weaver-xtreme'), 'id' => 'flow_color', 'type' => '+checkbox',
		'info' => __('If checked, Content and Sidebar bg colors will flow to bottom of the Container (that is, equal heights). You must provide background colors for the Content and Sidebars or the default bg color will be used. (&starf;Plus)','weaver-xtreme')),



	);
    ?>
<div class="options-intro">
<strong>Sidebars &amp; Layout: </strong>
<?php _e('Options affecting <strong>Sidebar Layout</strong> and the main <strong>Sidebar Areas</strong>.
This includes properties of individual <strong>Widgets</strong>, as well as properties of various <strong>Sidebars</strong>.','weaver-xtreme'); ?>
<br />
<div class="options-intro-menu">
<a href="#sidebar-layout"><?php _e('Sidebar Layout','weaver-xtreme'); ?></a> |
<a href="#individual-widgets"><?php _e('Individual Widgets','weaver-xtreme'); ?></a> |
<a href="#primary-widget-area"><?php _e('Primary Widget Area','weaver-xtreme'); ?></a> |
<a href="#secondary-widget-area"><?php _e('Secondary Widget Area','weaver-xtreme'); ?></a> |
<a href="#top-widget-areas"><?php _e('Top Widget Areas','weaver-xtreme'); ?></a> |
<a href="#bottom-widget-areas"><?php _e('Bottom Widget Areas','weaver-xtreme'); ?></a>
</div>
</div>
<?php

	weaverx_form_show_options($opts);
    do_action('weaverxplus_admin','layout');   // add new layout option?
}
?>
