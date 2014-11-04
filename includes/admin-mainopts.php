<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/* Weaver Xtreme - admin Main Options
 *
 * This function will start the main sapi form, which will be closed in admin-adminopts
 */

// ======================== Main Options > Top Level ========================
function weaverx_admin_mainopts() {
?>
<div id="tabwrap_main" style="padding-left:4px;">

<div id="tab-container-main" class='yetiisub'>
	<ul id="tab-container-main-nav" class='yetiisub'>
	<li><a href="#asp_genappear" title="Wrapping background colors, rounded corners, borders, fade, shadow,"><?php echo(wvr__('Wrapping Areas')); ?></a></li>
	<li><a href="#asp_widgets" title="Settings for Sidebars and Sidebar Layout"><?php echo(wvr__('Sidebars &amp; Layout')); ?></a></li>
	<li><a href="#asp_headeropts" title="Site Title/Tagline properties, Header Image"><?php echo(wvr__('Header')); ?></a></li>
	<li><a href="#asp_menus" title="Menu text and bg colors and other properties; Info Bar properties"><?php echo(wvr__('Menus')); ?></a></li>
	<li><a href="#asp_content" title="Text colors and bg, image borders, featured image, other properties related to all content"><?php echo(wvr__('Content Areas')); ?></a></li>
	<li><a href="#asp_postspecific" title="Properties related to posts: titles, meta info, navigation, excerpts, featured images, and more."><?php echo(wvr__('Post Specifics')); ?></a></li>
	<li><a href="#asp_footer" title="Footer options: bg color, borders, more. Site Copyright."><?php echo(wvr__('Footer')); ?></a></li>
    <li><a href="#asp_custom" title="Customizations - tweak various global settings"><?php echo(wvr__('Custom &amp; Fonts')); ?></a></li>
	</ul>

<h3>Main Options<?php weaverx_help_link('help.html#MainOptions','Help for Main Options'); ?></h3>

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
	array('name' => 'Wrapping Areas', 'id' => '-admin-generic', 'type' => 'header',
        'info' => 'Settings for outer wrapping areas',
		'help' => 'help.html#GenApp'),
	array('name' => 'Outside BG', 'id' => 'body_bgcolor', 'type' => 'ctext',
        'info' => 'Background color that wraps entire page. (&lt;body&gt;) Using <em>Appearance->Background</em> will override this value, or allow a background image instead.'),
	array('name' => 'Fade Outside BG', 'id' => 'fadebody_bg', 'type' => 'checkbox',
		'info' => 'Will fade the Outside BG color, darker at top to lighter at bottom.'),
    array('name' => 'Standard Links', 'id' => 'link', 'type' => 'link',
		'info' => 'Global default for link colors. (Bold, Italic, and Underline are per link type.)'),

    /* array('name' => '#070No Auto-Underline Links', 'id' => 'mobile_nounderline', 'type' => 'checkbox',
        'info' => 'Underlined links are easier to use on most mobile devices. This will disable auto-underlined links.'), */

    array('name' => 'Current Base Font Size:', 'type' => 'note',
		'info' => '<span style="font-size:' . $font_size . 'px;">' . $font_size . 'px.</span> Change on Custom Tab'),
	array( 'type' => 'submit'),


    array('name' => 'Wrapper Area', 'id' => 'wrapper', 'type' => 'widget_area_submit',
		'info' => 'Wrapper wraps entire site (CSS id: #wrapper). Colors and font settings will be the default values for all other areas.'),


    array('name' => 'Container Area', 'id' => 'container', 'type' => 'widget_area_submit',
		'info' => 'Container (#container div) wraps content and sidebars.'),

	);

?>
   <p>
The options on this tab affect the overall site appearance. The main <strong>Wrapper Area</strong> wraps the entire
site, and is used to specify default text and background colors, site width, font families, and more. With <em>Weaver Xtreme Plus</em>,
you can also specify background images for various areas of your site.
</p>
<?php
	weaverx_form_show_options($opts);
	do_action('weaverxplus_admin','general_appearance');
}



// ======================== Main Options > Custom ========================

function weaverx_mainopts_custom() {
	$opts = array(
	array( 'type' => 'submit'),
    array('name' => 'Custom Options', 'id' => '-admin-generic', 'type' => 'header',
	'info' => 'Set various global custom values.',
			'help' => 'help.html#Custom'),

    array('name' => 'Various Custom Values', 'id' => '-admin-settings', 'type' => 'subheader',
        'info' => 'Global tweaks'),

    array('name' => 'Smart Margin Width', 'id' => 'smart_margin_int', 'type' => '+val_percent',
		'info' => 'Width used for smart margins for Sidebars and Content Area. (Default: 1%) (&starf;Plus)'),

	array('name' => 'Border Color', 'id' => 'border_color', 'type' => 'color',
		'info' => 'Global color of borders. (Default: #222)'),
	array('name' => '<small>Border Width</small>', 'id' => 'border_width_int', 'type' => 'val_px',
		'info' => 'Global Width of borders. (Default: 1px)'),
    array('name' => '<small>Border Style</small>', 'id' => 'border_style', 'type' => '+select_id',
			'info' => 'Style of borders - width needs to be > 1 for some styles to work correctly (&starf;Plus)',
			'value' => array(
				array('val' => 'solid', 'desc' => 'Solid' ),
				array('val' => 'dotted', 'desc' => 'Dotted' ),
				array('val' => 'dashed', 'desc' => 'Dashed' ),
				array('val' => 'double', 'desc' => 'Double' ),
				array('val' => 'groove', 'desc' => 'Groove' ),
				array('val' => 'ridge', 'desc' => 'Ridge' ),
				array('val' => 'inset', 'desc' => 'Inset' ),
				array('val' => 'outset', 'desc' => 'Outset' )
				)),

    array('name' => 'Corner Radius', 'id' => 'rounded_corners_radius', 'type' => '+val_px',
		'info' => 'Controls how "round" corners are. Specify a value (5 to 15 look best) for corner radius. (Default: 8) (&starf;Plus)'),

    array('name' => 'Hide Menu/Link Tool Tips', 'id' => 'hide_tooltip', 'type' => '+checkbox',
		  'info' => 'Hide the tool tip pop up over all menus and links. (&starf;Plus)'),


    array('name' => 'Custom Shadow', 'id' => 'custom_shadow', 'type' => '+widetext',
		'info' => 'Specify full <em>box-shadow</em> CSS rule, e.g., <em>{box-shadow: 0 0 3px 1px rgba(0,0,0,0.25);}</em> (&starf;Plus)'),

    array( 'type' => 'submit'),

    array('name' => 'Custom CSS', 'id' => 'custom_css', 'type' => 'custom',
        'info' => 'Create Custom CSS Rules', 'val' => 'weaverx_custom_css'),

    array( 'type' => 'submit'),


	array('name' => 'Fonts', 'id' => '-editor-textcolor', 'type' => 'header',
        'info' => 'Font Base Sizes'
        ),

   	array('name' => 'Site Base Font Size', 'id' => 'site_fontsize_int', 'type' => 'val_px',
        'info' => 'Base font size of standard text. This value determines the default medium font size. Note that visitors can change their browser\'s font size, so final font size can vary, as expected. (Default: 16px)'),

	array('name' => 'Site Base Line Height', 'id' => 'site_line_height_dec', 'type' => '+val_num',
        'info' => 'Set the Base line-height. Most other line heights based on this multiplier. (Default: 1.5 - no units) (&starf;Plus)'),

	array('name' => '<small>Site Base Font Size - Small Tablets</small>', 'id' => 'site_fontsize_tablet_int', 'type' => '+val_px',
        'info' => 'Small Tablet base font size of standard text. (Default medium font size: 16px) (&starf;Plus)'),
    array('name' => '<small>Site Base Font Size - Phones</small>', 'id' => 'site_fontsize_phone_int', 'type' => '+val_px',
        'info' => 'Phone base font size of standard text. (Default medium font size: 16px)  (&starf;Plus)'),

    array('name' => 'Custom Font Size A', 'id' => 'custom_fontsize_a', 'type' => '+val_em',
		'info' => 'Specify font size in em for Custom Size A (&starf;Plus)'),
    array('name' => 'Custom Font Size B', 'id' => 'custom_fontsize_b', 'type' => '+val_em',
		'info' => 'Specify font size in em for Custom Size B (&starf;Plus)'),

    array( 'type' => 'submit')

    );
    ?>
    <p>
    Set values for "Custom" options: Smart Margin, Borders, Corners, Shadows, Custom CSS, and Fonts
   </p>
<?php
	weaverx_form_show_options($opts);


	do_action('weaverxplus_admin','fonts');

}


// ======================== Main Options > Header ========================
function weaverx_mainopts_header() {
	$opts = array(
	array( 'type' => 'submit'),
	array('name' => 'Header Options', 'id' => '-admin-generic', 'type' => 'header',
		'info' => 'Options affecting site Header',
		'help' => 'help.html#HeaderOpt'),


    array('name' => 'Header Area', 'id' => 'header', 'type' => 'widget_area',
		'info' => 'Wraps the Header Area: menu bars, standard header image, title, tagline, header widget area'),

    array('name' => 'Hide Search on Header', 'id' => 'header_search_hide', 'type' => 'select_hide',
		'info' => 'Selectively hide the Search Box Button on top right of header.'),
    array('name' => '<small>Search Area Options:</small>', 'type' => 'note',
		'info' => 'Specify search icon, text and background colors Search section of Content Areas tab.'),

    array( 'type' => 'submit'),

    array('name' => 'Header Image', 'id' => '-format-image', 'type' =>'subheader',
          'info' => 'Settings related to standard header image (Set on Appearance&rarr;Header)'),

	array('name' => 'Hide Header Image', 'id' => 'hide_header_image', 'type' => 'select_hide',
		'info' => 'Check to selectively hide standard header image.'),

	array('name' => '<small>Suggested Header Image Height</small>', 'id' => 'header_image_height_int', 'type' => 'val_px',
		'info' => 'Change the suggested height of the Header Image. Standard size is 188. This only affects the clipping window on
		the Appearance:Header page. Header images will be responsively sized. (Default header image width: theme width)'),


    array('name' => '<small>Maximum Image Width</small>', 'id' => 'header_image_max_width_dec', 'type' => '+val_percent',
		'info' => 'Maximum width of Image (Default: 100%; (&starf;Plus)'),


	array('name' => '<small>Use Actual Image Size</small>', 'id' => 'header_actual_size', 'type' => '+checkbox',
		'info' => 'Check to use actual header image size, centered in header. (Default: theme width) (&starf;Plus)'),



    array('name' => '<small>Align Header Image</small>', 'id' => 'header_image_align', 'type' => '+align',
		'info' => 'How to align header image - meaningful only when Max Width or Actual Size set. (&starf;Plus)'),



	array('name' => '<small>Hide Header Image Front Page</small>', 'id' => 'hide_header_image_front', 'type' => 'checkbox',
		'info' => 'Check to hide display of standard header image on front page only.'),

	array('name' => '<small>Header Image Links to Site</small>', 'id' => 'link_site_image', 'type' => 'checkbox',
		'info' => 'Check to add a link to site home page for Header Image. Note: If used with <em>Move Title/Tagline over Image</em>, parts of the header image will not be clickable.'),

    array('name' => '<small>Alternate Header Images:</small>', 'type' => 'note',
		'info' => 'Specify alternate header images using the <em>Featured Image Location</em> options on the <em>Content Areas</em> tab for pages, or the <em>Post Specifics</em> tab for single post views.'),


    array( 'type' => 'submit'),




	array('name' => 'Site Title/Tagline', 'id' => '-text', 'type' =>'subheader',
        'info' => 'Settings related to the Site Title and Tagline (Tagline sometimes called Site Description)'),


	array('name' => 'Site Title', 'id' => 'site_title', 'type' => 'titles',
		'info' => "The site's main title in the header (blog title)"),

	array('name' => '<small>Title Position</small>', 'id' => 'site_title_position_xy', 'type' => 'text_xy_percent',
		'info' => 'Adjust left and top margins for Title. Decimal and negative values allowed. (Default: X: 7%, Y:0%)'),

	array('name' => '<small>Title Max Width</small>', 'id' => 'site_title_max_w', 'type' => 'val_percent',
		'info' => "Maximum width of title in header area (Default: 90%)"),

    array('name' => '<small>Hide Site Title</small>', 'id' => 'hide_site_title', 'type' => 'select_hide',
		'info' => 'Hide Site Title (Uses "display:none;" : SEO friendly.)'),

	array('name' => 'Site Tagline', 'id' => 'tagline', 'type' => 'titles',
		'info' => "The site's tagline (blog description)"),


	array('name' => '<small>Tagline Position</small>', 'id' => 'tagline_xy', 'type' => 'text_xy_percent',
		'info' => 'Adjust default left and top margins for Tagline. (Default: X: 10% Y:0%)'),
	array('name' => '<small>Tagline Max Width</small>', 'id' => 'tagline_max_w', 'type' => 'val_percent',
		'info' => "Maximum width of Tagline in header area (Default: 90%)"),

    array('name' => '<small>Hide Site Tagline</small>', 'id' => 'hide_site_tagline', 'type' => 'select_hide',
		'info' => 'Hide Site Tagline (Uses "display:none;" : SEO friendly.)'),


	array('name' => '<small>Move Title/Tagline over Image</small>', 'id' => 'title_over_image', 'type' => 'checkbox',
		'info' => 'Check to move the Title, Tagline, Seach, and Mini-Menu over the Header Image.'),


	array( 'type' => 'submit'),


    array('name' => 'Header Mini-Menu', 'id' => '-menu', 'type' =>'subheader',
        'info' => 'Horizontal "Mini-Menu" displayed right-aligned of Site Tagline'),
    array('name' => 'Note:', 'type' => 'note',
		'info' => 'The Header Mini-Menu options are on the Menu Tab.'),


	array('name' => 'Header HTML', 'id' => 'header_html', 'type' => 'widget_area',
		'info' => 'Add arbitrary HTML to Header Area (in &lt;div id="header-html"&gt;)'),


	array('name' => 'Header HTML content', 'id' => 'header_html_text', 'type' => 'textarea',
        'placeholder' => 'Any HTML, including shortcodes.',
		'info' => "Add arbitrary HTML to Header Area (in &lt;div id=\"header-html\"&gt;)", 'val' => 4 ),

    array( 'type' => 'submit'),

    array('name' => 'Header Widget Area', 'id' => 'header_sb', 'type' => 'widget_area',
		'info' => 'Horizontal Header Widget Area'),
    array('name' => '<small>Header Widget Area Position</small>', 'id' => 'header_sb_position', 'type' => '+select_id',	//code
        'info' => 'Change where Header Widget Area is displayed. (Default: Top) (&starf;Plus)',
        'value' => array(
			array('val' => 'top', 'desc' => 'Top of Header'),
			array('val' => 'after_header', 'desc' => 'After Header Image'),
			array('val' => 'after_html', 'desc' => 'After HTML Block'),
            array('val' => 'after_menu', 'desc' => 'After Lower Menu'),
			)),

    array( 'type' => 'submit'),

    array('name' => 'Note:', 'type' => 'note',
		'info' => 'There are more standard WordPress Header options available on the Dashboard Appearance->Header panel.'),
	);

?>
   <p>
Options for objects in the <strong>Header</strong>, including the <strong>Site Title and Site Tagline</strong>, the <strong>Header Image</strong>,
the <strong>Header Widget Area</strong> and its widgets, and some other advanced options.
   </p>
<?php
	weaverx_form_show_options($opts);

	do_action('weaverxplus_admin','header_opts');
}

// ======================== Main Options > Menus ========================
function weaverx_mainopts_menus() {
	$opts = array(
	array( 'type' => 'submit'),
	array('name' => 'Menu &amp; Info Bars', 'id' => '-menu', 'type' => 'header',
		'info' => 'Options affecting site Menus and the Info Bar',
		'help' => 'help.html#MenuBar'),


    array('name' => 'Primary Menu Bar', 'id' => 'm_primary', 'type' => 'menu_opts',
		'info' => 'Attributes for the Primary Menu Bar (Default Location: Bottom of Header)'),

    array('name' => '<small>No Home Menu Item</small>', 'id' => 'menu_nohome', 'type' => 'checkbox',
		'info' => 'Don\'t automatically add Home menu item for home page (as defined in Settings->Reading)'),
    array( 'type' => 'submit'),

    array('name' => 'Secondary Menu Bar', 'id' => 'm_secondary', 'type' => 'menu_opts_submit',
		'info' => 'Attributes for the Secondary Menu Bar (Default Location: Top of Header)'),



    array('name' => 'Options: All Menus', 'id' => '-forms', 'type' => 'subheader_alt',
		'info' => 'Menu Bar enhancements and features'),


	array('name' => 'Current Page BG', 'id' => 'menubar_curpage_bgcolor', 'type' => 'ctext',
		'info' => 'BG Color for the currently displayed page and its ancestors.'),
    array('name' => 'Current Page Text', 'id' => 'menubar_curpage_color', 'type' => 'color',
		'info' => 'Color for the currently displayed page and its ancestors.'),


	array('name' => '<small>Bold Current Page</small>', 'id' => 'menubar_curpage_bold', 'type' => 'checkbox',
		'info' => 'Bold Face Current Page and ancestors'),
	array('name' => '<small>Italic Current Page</small>', 'id' => 'menubar_curpage_em', 'type' => 'checkbox',
		'info' => 'Italic Current Page and ancestors'),
	array('name' => '<small>Do Not Highlight Ancestors</small>', 'id' => 'menubar_curpage_noancestors', 'type' => 'checkbox',
		'info' => 'Highlight Current Page only - do not also highlight ancestor items'),


    array( 'type' => 'submit'),

    array('name' => 'Header Mini-Menu', 'id' => '-menu', 'type' =>'subheader_alt',
        'info' => 'Horizontal "Mini-Menu" displayed right-aligned of Site Tagline'),


	array('name' => 'Mini-Menu', 'id' => 'm_header_mini', 'type' => 'titles_text',
		'info' => "Color of Mini-Menu Link Items"),

    array('name' => '<small>Mini-Menu Hover</small>', 'id' => 'm_header_mini_hover_color', 'type' => 'ctext',
		'info' => 'Hover Color for Mini-Menu Links'),

    array('name' => '<small>Mini Menu Top Margin</small>', 'id' => 'm_header_mini_top_margin_dec', 'type' => 'val_em',
		'info' => 'Top margin for Mini-Menu. Negative value moves it up. (Default: -1.0em)'),

    array('name' => '<small>Hide Mini Menu</small>', 'id' => 'm_header_mini_hide', 'type' => 'select_hide',
		'info' => 'Hide Mini Menu'),


	array( 'type' => 'submit'),


    array('name' => 'Info Bar', 'id' => 'infobar', 'type' => 'widget_area',
		'info' => 'Info Bar : Breadcrumbs & Page Nav below primary menu'),


	array('name' => 'Hide Breadcrumbs', 'id' => 'info_hide_breadcrumbs', 'type' => 'checkbox',
        'info' => 'Do not display the Breadcrumbs'),
	array('name' => 'Hide Page Navigation', 'id' => 'info_hide_pagenav', 'type' => 'checkbox',
        'info' => 'Do not display the numbered Page navigation'),
	array('name' => 'Show Search box', 'id' => 'info_search', 'type' => 'checkbox',
        'info' => 'Include a Search box on the right'),
	array('name' => 'Show Log In', 'id' => 'info_addlogin', 'type' => 'checkbox',
        'info' => 'Include a simple Log In link on the right'),

	array('name' => 'Breadcrumb for Home', 'id' =>'info_home_label' , 'type' => 'widetext', //code - option done in code
        'info' => 'This lets you change the breadcrumb label for your home page. (Default: Home)'),
    array('name' => 'Info Bar Links', 'id' => 'ibarlink', 'type' => 'link',
		'info' => 'Color for links in Info Bar (uses Standard Link colors if left blank).')
	);

?>
<p>
Options for the <strong>Menu Bar</strong> (colors, font style, Mobile menu, Search) and the <strong>Info Bar</strong>
(breadcrumbs, page navigation)
</p>
<?php
    $all_opts = apply_filters('weaverxplus_menu_inject', $opts);

	weaverx_form_show_options($all_opts);

}


// ======================== Main Options > Content Areas ========================
function weaverx_mainopts_content() {
	$opts = array(
	array( 'type' => 'submit'),
	array('name' => 'Content Areas', 'id' => '-admin-page', 'type' => 'header',
		'info' => 'Settings for the content areas (posts and pages)',
        'toggle' => 'content-areas',
        'help' => 'help.html#ContentAreas'),

    array('name' => 'Content Area', 'id' => 'content', 'type' => 'widget_area',
		'info' => 'Area properties for page and post content'),

    array('name' => 'Page Title', 'id' => 'page_title', 'type' => 'titles',
		'info' => "Page titles, including pages, post single pages, and archive-like pages."),
    array('name' => '<small>Bar under Title</small>', 'id' => 'page_title_underline_int', 'type' => 'val_px',
		'info' => 'Enter size in px if you want a bar under page title. Leave blank or 0 for no bar.'),
    array('name' => '<small>Space Between Title and Content</small>', 'id' => 'space_after_title_dec', 'type' => 'val_em',
		'info' => 'Space between Page or Post title and beginning of content (Default: 1.0em)'),

    array('name' => 'Archive Pages Title Text', 'id' => 'archive_title', 'type' => 'titles',
		'info' => "Archive-like page titles: archives, categories, tags, searches."),

    array('name' => 'Content Links', 'id' => 'contentlink', 'type' => 'link',
		'info' => 'Color for links in Content'),

    array('name' => 'Content Headings', 'id' => 'content_h', 'type' => '+titles',
		'info' => 'Headings (&lt;h1&gt;-&lt;h6&gt;) in page and post content (&starf;Plus)'),

    array( 'type' => 'submit'),

	array('name' => 'Text', 'id' => '-text', 'type'=>'subheader_alt',
        'info' => 'Text related options'),

    array('name' => '<small>Space after paragraphs and lists</small>', 'id' => 'content_p_list_dec', 'type' => 'val_em',
		'info' => 'Space after paragraphs and lists (Recommended: 1.5 em)'),

	array('name' => '<small>Page/Post Editor BG</small>', 'id' => 'editor_bgcolor', 'type' => 'ctext',
		'info' => 'Alternative Background Color to use for Page/Post editor if you\'re using transparent or image backgrounds.'),

    array('name' => '<small>Input Area BG</small>', 'id' => 'input_bgcolor', 'type' => 'ctext',
		'info' => 'Background color for text input (textareas) boxes.'),
	array('name' => '<small>Input Area Text</small>', 'id' => 'input_color', 'type' => 'color',
		'info' => 'Text color for text input (textareas) boxes.'),

    array('name' => '<small>Auto Hyphenation</small>', 'id' => 'hyphenate', 'type' => 'checkbox',
        'info' => 'Allow browsers to automatically hyphenate text for appearance.'),



    array('name' => 'Search Boxes', 'id' => '-search', 'type'=>'subheader_alt',
        'info' => 'Search box related options'),

	array('name' => '<small>Search Input BG</small>', 'id' => 'search_bgcolor', 'type' => 'ctext',
		'info' => 'Background color for search input boxes.'),
	array('name' => '<small>Serch Input Text</small>', 'id' => 'search_color', 'type' => 'color',
		'info' => 'Text color for search input boxes.'),

    array('name' => '<small>Search Icon</small>', 'id' => 'search_icon', 'type' => 'radio',	//code
        'info' => 'Search Icon - used for both Header and Search Widgets.',
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
	array('name' => 'Images', 'id' => '-format-image', 'type'=>'subheader_alt',
        'info' => 'Image related options'),
	array('name' => '<small>Image Border Color</small>', 'id' => 'media_lib_border_color', 'type' => 'ctext',
		'info' => 'Border color for images.'),
	array('name' => '<small>Image Border Width</small>', 'id' => 'media_lib_border_int', 'type' => 'val_px',
		'info' => 'Border width for images originating from Media Library. (Leave blank or set to 0 for no image borders.)'),

	array('name' => '<small>Show Image Shadows</small>', 'id' => 'show_img_shadows', 'type' => 'checkbox',
        'info' => 'Add a shadow to all images (excluding header image). Add CSS+ to Border Color for custom shadow.'),

    array('name' => '<small>Restrict Borders to Media Library</small>', 'id' => 'restrict_img_border', 'type' => 'checkbox',
        'info' => 'Restrict border and shadows to images from Media Library. Manually entered &lt;img&gt; HTML without Media Library classes will not have borders.'),

	array('name' => '<small>Caption text color</small>', 'id' => 'caption_color', 'type' => 'ctext',
		'info' => 'Color of captions - e.g., below media images.'),

	array('name' => 'Featured Image - Pages', 'id' => '-id', 'type'=>'subheader_alt',
        'info' => 'Display of Page Featured Images'),
    array('name' => '&#8226; Featured Image Location', 'id' => 'page_fi_location', 'type' => 'fi_location',
        'info' => 'Where to display Featured Image for Pages'),
    array('name' => '<small>Featured Image Alignment<small>', 'id' => 'page_fi_align', 'type' => 'fi_align',
        'info' => 'How to align the Featured Image'),

	array('name' => '<small>Hide Featured Image on Pages</small>', 'id' => 'page_fi_hide', 'type' => 'select_hide',
        'info' => 'Where to hide Featured Images on Pages (Posts have their own setting.)'),
	array ('name' => '<small>Page Featured Image Size</small>',
        'id' => 'page_fi_size', 'type' => 'select_id', 'info' => 'Media Library Image Size for Featured Image on pages. (Header uses full size).',
		'value' => array(
			array('val' => 'thumbnail', 'desc' => 'Thumbnail (default)'),
			array('val' => 'medium', 'desc' => 'Medium'),
			array('val' => 'large', 'desc' => 'Large'),
            array('val' => 'full', 'desc' => 'Full'))
	  ),
	array('name' => '<small>Featured Image Width, Pages</small>', 'id' => 'page_fi_width', 'type' => '+val_percent',
			'info' => 'Width of Featured Image on Pages. Max Width in %, overrides FI Size selection. (&starf;Plus)' ),

	array('name' => 'Lists- &lt;HR&gt; - Tables', 'id' => '-list-view', 'type'=>'subheader_alt',
        'info' => 'Other options related to content'),
	array ('name' => 'Content List Bullet',
        'id' => 'contentlist_bullet', 'type' => 'select_id', 'info' => 'Bullet used for Unordered Lists in Content areas',
        'value' => array(
			array('val' => 'disc', 'desc' => 'Filled Disc (default)'),
			array('val' => 'circle', 'desc' => 'Circle'),
			array('val' => 'square', 'desc' => 'Square'),
			array('val' => 'none', 'desc' => 'None'))
	  ),

	array('name' => '&lt;HR&gt; color', 'id' => 'hr_color', 'type' => 'ctext',
		'info' => 'Color of horizontal (&lt;hr&gt;) lines in posts and pages.'),

	array ('name' => 'Table Style', 'id' => 'weaverx_tables', 'type' => 'select_id',
		'info' => 'Style used for tables in content.',
		'value' => array(
			array('val' => 'default', 'desc' => 'Theme Default'),
			array('val' => 'bold', 'desc' => 'Bold Headings'),
			array('val' => 'noborders', 'desc' => 'No Borders'),
			array('val' => 'fullwidth', 'desc' => 'Wide'),
			array('val' => 'wide', 'desc' => 'Wide 2'),
			array('val' => 'plain', 'desc' => 'Minimal'))
	  ),

	array('name' => 'Comments', 'id' => '-admin-comments', 'type' => 'subheader',
        'info' => 'Settings for displaying comments'),
	array('name' => 'Comment Headings', 'id' => 'comment_headings_color', 'type' => 'ctext',
        'info' => 'Color for various headings in comment form'),
	array('name' => 'Comment Content BG', 'id' => 'comment_content_bgcolor', 'type' => 'ctext',
        'info' => 'BG Color of Comment Content area'),
	array('name' => 'Comment Submit Button BG', 'id' => 'comment_submit_bgcolor', 'type' => 'ctext',
        'info' => 'BG Color of "Post Comment" submit button'),
    array('name' => 'Show Borders on Comments', 'id' => 'show_comment_borders', 'type' => 'checkbox',
        'info' => 'Show Borders around comment sections - improves visual look of comments'),

	array('name' => '<small>Hide Old Comments When Closed</small>', 'id' => 'hide_old_comments', 'type' => '+checkbox',
        'info' => 'Hide previous comments after closing comments for page or post. (Default: show old comments after closing.) (&starf;Plus)'),
    array('name' => '<small>Show Allowed HTML</small>', 'id' => 'form_allowed_tags', 'type' => '+checkbox',
        'info' => 'Show the allowed HTML tags below comment input box (&starf;Plus)'),
	array('name' => '<small>Hide Comment Title Icon</small>', 'id' => 'hide_comment_bubble', 'type' => '+checkbox',
        'info' => 'Hide the comment icon before the Comments title (&starf;Plus)'),
	array('name' => '<small>Hide Separator Above Comments</small>', 'id' => 'hide_comment_hr', 'type' => '+checkbox',
        'info' => 'Hide the (&lt;hr&gt;) separator line above the Comments area (&starf;Plus)')
	);

?>
   <p>
Options for <strong>Content Areas</strong>, including pages and posts. Includes options for <strong>Text</strong>,
<strong>Padding</strong>, <strong>Images</strong>, <strong>Lists &amp; Tables</strong>, and user <strong>Comments</strong>.
   </p>
<?php
	weaverx_form_show_options($opts);
	do_action('weaverxplus_admin','content_areas');
?>
	<span style="color:green;"><b>Hiding/Enabling Page and Post Comments</b></span>
<?php
	weaverx_help_link('help.html#LeavingComments',wvr__('Help for Leaving Comments'));
?>
	<p>Controlling "Reply/Leave a Comment" visibility for pages and posts is <strong>not</strong> a theme function. It is
	controlled by WordPress settings. Please click the ? just above to see the help file entry!</p>
<?php
}

// ======================== Main Options > Post Specifics ========================
function weaverx_mainopts_posts() {
	$opts = array(
	array( 'type' => 'submit'),
	array('name' => 'Post Specifics', 'id' => '-admin-post', 'type' => 'header',
		'info' => 'Settings affecting Posts',
	'help' => 'help.html#PPSpecifics'),

    array('name' => 'Post Area', 'id' => 'post', 'type' => 'widget_area',
		'info' => 'Use these settings to override Content Area settings for Posts (blog entries).'),

	array('name' => 'Sticky Post BG', 'id' => 'stickypost_bgcolor', 'type' => 'ctext',
		'info' => 'BG color for sticky posts, author info. (Add {border:none;padding:0;} to CSS to make sticky posts same as regular posts.)'),

    array('name' => '<small>Reset Major Content Options</small>', 'id' => 'reset_content_opts', 'type' => 'checkbox',
		'info' => 'Clear wrapping Content Area bg, borders, padding, and top/bottom margins for views with posts. Allows more flexible post settings.'),


    array( 'type' => 'submit'),


    array('name' => 'Post Title', 'id' => '-text', 'type' => 'subheader_alt',
        'info' => 'Options for the Post Title'),

	array('name' => 'Post Title', 'id' => 'post_title', 'type' => 'titles',
		'info' => "Post title (Blog Views)"),

    array('name' => '<small>Bar under Post Titles</small>', 'id' => 'post_title_underline_int', 'type' => 'val_px',
		'info' => 'Enter size in px if you want a bar under page title. Leave blank or 0 for no bar.'),

    array('name' => '<small>Post Title Hover</small>', 'id' => 'post_title_hover_color', 'type' => 'ctext',
		'info' => 'Color if you want the Post Title to show alternate color for hover'),

    array('name' => '<small>Space After Post Title</small>', 'id' => 'post_title_bottom_margin_dec', 'type' => 'val_em',
		'info' => 'Space between Post Title and Post Info Line or content. (Default: 0.15em)'),


	array('name' => '<small>Show Comment Bubble</small>', 'id' => 'show_post_bubble', 'type' => 'checkbox',
		'info' => "Show comment bubble with link to comments on the post info line"),

    array('name' => '<small>Hide <em>Post Format</em> Icons</small>', 'id' => 'hide_post_format_icon', 'type' => '+checkbox',
		'info' => 'Hide the icons for posts with Post Format specified. (&starf;Plus)'),




array('name' => 'Post Layout', 'id' => '-schedule', 'type' => 'subheader_alt',
        'info' => 'Layout of Posts'),

	array('name' => 'Columns of Posts', 'id' => 'blog_cols', 'type' => 'select_id',	//code
        'info' => 'Display posts on blog page with this many columns. (You should adjust "Display posts on blog page with this many columns" on Settings:Reading to be a multiple of this value.)',
        'value' => array(
			array('val' => '1', 'desc' => '1 Column'),
			array('val' => '2', 'desc' => '2 Columns'),
			array('val' => '3', 'desc' => '3 Columns'))
	  ),
	array('name' => '<small>First Post One Column</small>', 'id' => 'blog_first_one', 'type' => 'checkbox',
		'info' => 'Always display the first post in one column.'),
	array('name' => '<small>Sticky Posts One Column</small>', 'id' => 'blog_sticky_one', 'type' => 'checkbox',
		'info' => "Display opening Sticky Posts in one column. If First Post One Column also checked, then first non-sticky post will be one column."),
	array('name' => '<small>Use <em>Masonry</em> for Posts</small>', 'id' => 'masonry_cols', 'type' => 'select_id',	//code
        'info' => 'Use the <em>Masonry</em> blog layout option to show dynamically packed posts on blog and archive-like pages. Overrides "Columns of Posts" setting.',
        'value' => array(
			array('val' => '0', 'desc' => ''),
			array('val' => '2', 'desc' => '2 Columns'),
			array('val' => '3', 'desc' => '3 Columns'),
			array('val' => '4', 'desc' => '4 Columns'),
			array('val' => '5', 'desc' => '5 Columns'))
	  ),

    array('name' => '<small>Compact <em>Post Format</em> Posts</small>', 'id' => 'compact_post_formats', 'type' => 'checkbox',
		'info' => 'Use compact layout for <em>Post Format</em> posts (Image, Gallery, Video, etc.). Useful for photo blogs and multi-column layouts. Looks great with <em>Masonry</em>.'),
	array('name' => 'Photo Bloging', 'info' => 'Read the Help entry for information on creating a Photo Blog page',
	  'type' => 'note','help' => 'help.html#PhotoBlog'),


    array( 'type' => 'submit'),

    array('name' => 'Excerpts / Full Posts', 'id' => '-exerpt-view', 'type' => 'subheader_alt',
        'info' => 'How to display posts in  Blog / Archive Views'),
	array('name' => 'Show Full Blog Posts', 'id' => 'fullpost_blog', 'type' => 'checkbox',
			'info' => 'Will display full blog post instead of excerpts on <em>blog pages</em>.'),
	array('name' => '<small>Full Post for Archives</small>', 'id' => 'fullpost_archive', 'type' => 'checkbox',
			'info' => 'Display the full posts instead of excerpts on <em>special post pages</em>. (Archives, Categories, etc.) Does not override manually added &lt;--more--> breaks.'),
	array('name' => '<small>Full Post for Searches</small>', 'id' => 'fullpost_search', 'type' => 'checkbox',
			'info' => 'Display the full posts instead of excerpts for Search results. Does not override manually added &lt;--more--> breaks.'),
	array('name' => '<small>Full text for 1st <em>"n"</em> Posts</small>', 'id' => 'fullpost_first', 'type' => 'val_num',
			'info' => 'Display the full post for the first "n" posts on Blog pages. Does not override manually added &lt;--more--> breaks.'),
	array('name' => '<small>Excerpt length</small>', 'id' => 'excerpt_length', 'type' => 'val_num',
			'info' => 'Change post excerpt length. (Default: 40 words)'),
	array('name' => '<small><em>Continue reading</em> Message</small>', 'id' => 'excerpt_more_msg', 'type' => 'widetext',
			'info' => 'Change default <em>Continue reading &rarr;</em> message for excerpts. Can include HTML (e.g., &lt;img>).'),
    array('type' => 'endheader'),




	array('name' => 'Navigation', 'id' => '-leftright', 'type' => 'subheader_alt',
        'info' => 'Navigation for pages displaying posts'),
	array('name' => 'Blog Navigation Style', 'id' => 'nav_style', 'type' => 'select_id',
        'info' => 'Style of navigation links on blog pages: "Older/Newer posts", "Previous/Next Post", or by page numbers',
        'value' => array(
			array('val' => 'old_new', 'desc' => 'Older/Newer'),
			array('val' => 'prev_next', 'desc' => 'Previous/Next'),
			array('val' => 'paged_left', 'desc' => 'Paged - Left'),
			array('val' => 'paged_right', 'desc' => 'Paged - Right'))
	  ),
	array('name' => '<small>Hide Top Links</small>', 'id' => 'nav_hide_above', 'type' => '+checkbox',
        'info' => 'Hide the blog navigation links at the top (&starf;Plus)'),
	array('name' => '<small>Hide Bottom Links</small>', 'id' => 'nav_hide_below', 'type' => '+checkbox',
        'info' => 'Hide the blog navigation links at the bottom (&starf;Plus)'),
	array('name' => '<small>Show Top on First Page</small>', 'id' => 'nav_show_first', 'type' => '+checkbox',
        'info' => 'Show navigation at top even on the first page (&starf;Plus)'),

	array('name' => 'Single Page Navigation Style', 'id' => 'single_nav_style', 'type' => 'select_id',
        'info' => 'Style of navigation links on post Single pages: Previous/Next, by title, or none',
        'value' => array(
			array('val' => 'title', 'desc' => 'Post Titles'),
			array('val' => 'prev_next', 'desc' => 'Previous/Next'),
			array('val' => 'hide', 'desc' => 'None - no display'))
	  ),
	array('name' => '<small>Link to Same Categories</small>', 'id' => 'single_nav_link_cats', 'type' => '+checkbox',
        'info' => 'Single Page navigation links point to posts with same categories. (&starf;Plus)'),
	array('name' => '<small>Hide Top Links</small>', 'id' => 'single_nav_hide_above', 'type' => '+checkbox',
        'info' => 'Hide the single page navigation links at the top (&starf;Plus)'),
	array('name' => '<small>Hide Bottom Links</small>', 'id' => 'single_nav_hide_below', 'type' => '+checkbox',
        'info' => 'Hide the single page navigation links at the bottom (&starf;Plus)'),

	array( 'type' => 'submit'),
	array('name' => 'Post Meta Info Areas', 'id' => '-info', 'type' => 'subheader_alt',
        'info' => 'Top and Bottom Post Meta Information areas'),

    array('name' => 'Top Post Info', 'id' => 'post_info_top', 'type' => 'titles_text',
		'info' => "Top Post info line"),


	    array('name' => '<small>Hide top post info</small>', 'id' => 'post_info_hide_top', 'type' => 'checkbox',	//code
        'info' => 'Hide entire top info line (posted on, by) of post.'),

	array('name' => 'Bottom Post Info', 'id' => 'post_info_bottom', 'type' => 'titles_text',
		'info' => 'The bottom post info line'),

    array('name' => '<small>Hide bottom post info</small>', 'id' => 'post_info_hide_bottom', 'type' => 'checkbox',	//code
        'info' => 'Hide entire bottom info line (posted in, comments) of post.'),


    array('name' => 'Show Author Avatar', 'id' => 'show_post_avatar', 'type' => 'select_id',	//code
        'info' => 'Show author avatar on the post info line (also can be set per post with post editor)',
        'value' => array(
			array('val' => 'hide', 'desc' => 'Do Not Show'),
			array('val' => 'start', 'desc' => 'Start of Info Line'),
			array('val' => 'end', 'desc' => 'End of Info Line'))),
	array('name' => '<small>Avatar size</small>', 'id' => 'post_avatar_int', 'type' => 'val_px',
			'info' => 'Size of Avatar in px. (Default: 28px)'),

    array('name' => 'Use Icons in Post Info', 'id' => 'post_icons', 'type' => 'select_id',
        'info' => 'Use Icons instead of Text descriptions in Post Meta Info',
        'value' => array(
			array('val' => 'text', 'desc' => 'Text Descriptions'),
			array('val' => 'fonticons', 'desc' => 'Font Icons'),
			array('val' => 'graphics', 'desc' => 'Graphic Icons'))
	  ),
    array('name' => '<small>Font Icons Color</small>', 'id' => 'post_icons_color', 'type' => 'color',
		'info' => 'Color for Font Icons (Default: Post Info text color)'),


	array('name' => '<span style="color:red">Note:</span>', 'type' => 'note', 'info' => 'Hiding any meta info item automatically uses Icons instead of text descriptions.'),
	array('name' => '<small>Hide Post Date</small>', 'id' => 'post_hide_date', 'type' => 'checkbox',
			'info' => 'Hide the post date everywhere it is normally displayed.'),
	array('name' => '<small>Hide Post Author</small>', 'id' => 'post_hide_author', 'type' => 'checkbox',
			'info' => 'Hide the post author everywhere it is normally displayed.'),
	array('name' => '<small>Hide Post Categories</small>', 'id' => 'post_hide_categories', 'type' => 'checkbox',
			'info' => 'Hide the post categories and tags wherever they are normally displayed.'),
	array('name' => '<small>Hide Post Tags</small>', 'id' => 'post_hide_tags', 'type' => 'checkbox',
			'info' => 'Hide the post tags wherever they are normally displayed.'),
	array('name' => '<small>Hide Permalink</small>', 'id' => 'hide_permalink', 'type' => 'checkbox',
			'info' => 'Hide the permalink.'),
	array('name' => '<small>Hide Category if Only One</small>', 'id' => 'hide_singleton_category', 'type' => 'checkbox',
			'info' => 'If there is only one overall category defined (Uncategorized), don\'t show Category of post.'),
	array('name' => '<small>Hide Author for Single Author Site</small>', 'id' => 'post_hide_single_author', 'type' => 'checkbox',
			'info' => 'Hide author information if site has only a single author.'),

    array('name' => 'Post Info Links', 'id' => 'ilink', 'type' => 'link',
		'info' => 'Links in post information top and bottom lines.'),

	array( 'type' => 'submit'),


	array('name' => 'Featured Image - Posts', 'id' => '-id', 'type' => 'subheader_alt',
        'info' => 'Display of Post Featured Images'),

    array('name' => '&#8226; FI Location - Full Post', 'id' => 'post_full_fi_location', 'type' => 'fi_location_post',
        'info' => 'Where to display Featured Image for full blog posts'),
    array('name' => '<small>FI Alignment - Full post</small>', 'id' => 'post_full_fi_align', 'type' => 'fi_align',
        'info' => 'How to align the Featured Image'),


	array('name' => '<small>Hide FI - Full Posts</small>', 'id' => 'post_full_fi_hide', 'type' => 'select_hide',
        'info' => 'Where to hide Featured Images on full blog posts'),
	array ('name' => '<small>FI Size - Full Posts</small>',
        'id' => 'post_full_fi_size', 'type' => 'select_id', 'info' => 'Media Library Image Size for Featured Image on full posts.',
		'value' => array(
			array('val' => 'thumbnail', 'desc' => 'Thumbnail (default)'),
			array('val' => 'medium', 'desc' => 'Medium'),
			array('val' => 'large', 'desc' => 'Large'),
            array('val' => 'full', 'desc' => 'Full'))
	  ),
	array('name' => '<small>FI Width, Full Posts</small>', 'id' => 'post_full_fi_width', 'type' => '+val_percent',
			'info' => 'Width of Featured Image on Full Posts.  Max Width in %, overrides FI Size selection. (&starf;Plus)' ),



    array('name' => '&#8226; FI Location - Excerpts', 'id' => 'post_excerpt_fi_location', 'type' => 'fi_location_post',
        'info' => 'Where to display Featured Image for posts displayed as excerpt'),
    array('name' => '<small>FI Alignment - Excerpts</small>', 'id' => 'post_excerpt_fi_align', 'type' => 'fi_align',
        'info' => 'How to align the Featured Image'),

	array('name' => '<small>Hide FI - Excerpts</small>', 'id' => 'post_excerpt_fi_hide', 'type' => 'select_hide',
        'info' => 'Where to hide Featured Images on full blog posts'),
	array ('name' => '<small>FI Size - Excerpts</small>',
        'id' => 'post_excerpt_fi_size', 'type' => 'select_id', 'info' => 'Media Library Image Size for Featured Image on excerpts.',
		'value' => array(
			array('val' => 'thumbnail', 'desc' => 'Thumbnail (default)'),
			array('val' => 'medium', 'desc' => 'Medium'),
			array('val' => 'large', 'desc' => 'Large'),
            array('val' => 'full', 'desc' => 'Full'))
	  ),
	array('name' => '<small>FI Width, Excerpts</small>', 'id' => 'post_excerpt_fi_width', 'type' => '+val_percent',
			'info' => 'Width of Featured Image on excerpts.  Max Width in %, overrides FI Size selection. (&starf;Plus)' ),


    array('name' => '&#8226; FI Location - Single Page', 'id' => 'post_fi_location', 'type' => 'fi_location',
        'info' => 'Where to display Featured Image for posts on single page view'),
    array('name' => '<small>FI Alignment - Single Page</small>', 'id' => 'post_fi_align', 'type' => 'fi_align',
        'info' => 'How to align the Featured Image on Single Page View'),

	array('name' => '<small>Hide FI - Single Page</small>', 'id' => 'post_fi_hide', 'type' => 'select_hide',
        'info' => 'Where to hide Featured Images on single page view'),
	array ('name' => '<small>FI Size - Single Posts</small>',
        'id' => 'post_fi_size', 'type' => 'select_id', 'info' => 'Media Library Image Size for Featured Image on single page view.',
		'value' => array(
			array('val' => 'thumbnail', 'desc' => 'Thumbnail (default)'),
			array('val' => 'medium', 'desc' => 'Medium'),
			array('val' => 'large', 'desc' => 'Large'),
            array('val' => 'full', 'desc' => 'Full'))
	  ),
	array('name' => '<small>FI Width, Single Page</small>', 'id' => 'post_fi_width', 'type' => '+val_percent',
			'info' => 'Width of Featured Image on single page view. Max Width in %, overrides FI Size selection. (&starf;Plus)' ),



    array( 'type' => 'submit'),


	array('name' => 'More Post Related Options', 'id' => '-forms', 'type' => 'subheader_alt',
        'info' => 'Other options related to post display, including single pages'),
	array('name' => '<small>Show <em>Comments are closed.</em></small>', 'id' => 'show_comments_closed', 'type' => 'checkbox',
		'info' => 'If comments are off, and no comments have been made, show the <em>Comments are closed.</em> message.' ),
    array('name' => 'Author Info BG', 'id' => 'post_author_bgcolor', 'type' => 'ctext',
			'info' => 'Background color used for Author Bio.'),
	array('name' => '<small>Hide Author Bio</small>', 'id' => 'hide_author_bio', 'type' => 'checkbox',
		'info' => 'Hide display of author bio box on single post page view.'),
	array('name' => '<small>Allow comments for attachments</small>', 'id' => 'allow_attachment_comments', 'type' => 'checkbox',
		'info' => 'Allow visitors to leave comments for attachments (usually full size media image - only if comments allowed).')
	);

?>
   <p>
Options related to <strong>Posts</strong>, including <strong>Background</strong> color, <strong>Columns</strong> displayed
on blog pages, <strong>Title</strong> options, <strong>Navigation</strong> to earlier and later posts, the post <strong>
Info Lines</strong>, <strong>Excerpts</strong>, and <strong>Featured Image</strong> handling.
   </p>
<?php
	weaverx_form_show_options($opts);
	do_action('weaverxplus_admin','post_specifics');
?>
	<span style="color:green;"><b>Hiding/Enabling Page and Post Comments</b></span>
<?php
	weaverx_help_link('help.html#LeavingComments',wvr__('Help for Leaving Comments'));
?>
	<p>Controlling "Reply/Leave a Comment" visibility for pages and posts is <strong>not</strong> a theme function. It is
	controlled by WordPress settings. Please click the ? just above to see the help file entry! (Additional options for comment
	<em>styling</em> are found on the Content Areas tab.)</p>
<?php
}


// ======================== Main Options > Footer ========================
function weaverx_mainopts_footer() {
	$opts = array(
	array( 'type' => 'submit'),

    array('name' => 'Footer Options', 'id' => '-admin-generic', 'type' => 'header',
		'info' => 'Settings for the footer',
        'help' => 'help.html#FooterOpt'),


    array('name' => 'Footer Area', 'id' => 'footer', 'type' => 'widget_area',
		'info' => 'Properties for the footer area.'),
    array('name' => 'Footer Links', 'id' => 'footerlink', 'type' => 'link',
		'info' => 'Color for links in Footer (Uses Standard Link colors if left blank).'),
    array( 'type' => 'submit'),

    array('name' => 'Footer Widget Area', 'id' => 'footer_sb', 'type' => 'widget_area_submit',
		'info' => 'Properties for the Footer Widget Area.'),

    array('name' => 'Footer HTML', 'id' => 'footer_html', 'type' => 'widget_area',
		'info' => 'Add arbitrary HTML to Footer Area (in &lt;div id=\"footer-html\"&gt;)'),

    array('name' => 'Footer HTML content', 'id' => 'footer_html_text', 'type' => 'textarea',
        'placeholder' => 'Any HTML, including shortcodes.',
		'info' => "Add arbitrary HTML", 'val' => 4),
    array( 'type' => 'submit'),
    );

?>
<p>
	Options affecting the <strong>Footer</strong> area, including <strong>Background</strong> color, <strong>Borders</strong>,
	and the <strong>Copyright</strong> message.
</p>
<?php
	weaverx_form_show_options($opts);
	do_action('weaverxplus_admin','footer_opts');
?>
		   <strong>&copy;</strong>&nbsp;<span style="color:blue;"><b>Site Copyright</b></span><br/>
	<small>If you fill this in, the default copyright notice in the footer will be replaced with the text here. It will not
	automatically update from year to year.<br /> Use &amp;copy; to display &copy;. You can use other HTML as well.
	Use <span class="style4">&amp;nbsp;</span> to hide the copyright notice. &diams;</small>
	<br />

	<textarea name="<?php weaverx_sapi_main_name('copyright'); ?>" rows=1 style="width:750px;"><?php echo(esc_textarea(weaverx_getopt('copyright'))); ?></textarea>
	<br>
		<label>Hide Powered By tag: <input type="checkbox" name="<?php weaverx_sapi_main_name('_hide_poweredby'); ?>" id="_hide_poweredby" <?php checked(weaverx_getopt_checked( '_hide_poweredby' )); ?> /></label>
		<small>Check this to hide the "Proudly powered by" notice in the footer.</small>
		<br /><br />
	You can add other content to the Footer from the Advanced Options:HTML Insertion tab.
<?php
}

// ======================== Main Options > Widget Areas ========================
function weaverx_mainopts_widgets() {
	$opts = array(
	array( 'type' => 'submit'),
	array('name' => 'Sidebar Options', 'id' => '-screenoptions', 'type' => 'header',
		'info' => 'Settings affecting main Sidebars and individual widgets',
		'help' => 'help.html#WidgetAreas'),

	array('name' => 'Individual Widgets', 'id' => 'widget', 'type' => 'widget_area',
		'info' => 'Properties for individual widgets (e.g., Text, Recent Posts, etc.)'),

	array('name' => 'Widget Title', 'id' => 'widget_title', 'type' => 'titles',
		'info' => 'Color for Widget Titles.'),
	array('name' => 'Bar under Widget Titles', 'id' => 'widget_title_underline_int', 'type' => 'val_px',
		'info' => 'Enter size in px if you want a bar under Widget Titles. Leave blank or 0 for no bar.'),

	array ('name' => 'Widget List Bullet',
        'id' => 'widgetlist_bullet', 'type' => 'select_id', 'info' => 'Bullet used for Unordered Lists in Widget areas',
		'value' => array(
			array('val' => 'disc', 'desc' => 'Filled Disc (default)'),
			array('val' => 'circle', 'desc' => 'Circle'),
			array('val' => 'square', 'desc' => 'Square'),
			array('val' => 'none', 'desc' => 'None'))
	  ),

    array('name' => 'Widget Links', 'id' => 'wlink', 'type' => 'link',
		'info' => 'Color for links in widgets (uses Standard Link colors if left blank).'),

	array( 'type' => 'submit'),



	array('name' => 'Primary Widget Area', 'id' => 'primary', 'type' => 'widget_area_submit',
		'info' => 'Properties for the Primary (Upper/Left) Sidebar Widget Area.'),

	array('name' => 'Secondary Widget Area', 'id' => 'secondary', 'type' => 'widget_area_submit',
		'info' => 'Properties for the Secondary (Lower/Right) Sidebar Widget Area.'),

	array('name' => 'Top Widget Areas', 'id' => 'top', 'type' => 'widget_area_submit',
		'info' => 'Properties for all Top Widget areas (Sitewide, Pages, Blog, Archive).'),


	array('name' => 'Bottom Widget Areas', 'id' => 'bottom', 'type' => 'widget_area',
		'info' => 'Properties for all Bottom Widget areas (Sitewide, Pages, Blog, Archive).'),

	);

	weaverx_form_show_options($opts);
?>
<hr />
    <span style="color:blue;"><b>Define Per Page Extra Widget Areas</b></span>
<?php
	weaverx_help_link('help.html#PPWidgets','Help for Per Page Widget Areas');
?>
	<br/>
	<small>You may define extra widget areas that can then be used in the <em>Per Page</em> settings, or in the
    <em>Weaver Xtreme Plus</em> [widget_area] shortcode. Enter
	a list of one or more widget area names separated by commas. Your names should include only letters, numbers, or underscores -
	no spaces or other special characters. The widgets areas will then appear on the Appearance->Widgets menus. They can be included
	on individual pages by adding the name you define here to the "Weaver Xtreme Options For This Page" box on the Edit Page screen. (&diams;)</small>
	<br />
	<textarea name="<?php weaverx_sapi_main_name('_perpagewidgets'); ?>" rows=1 style="width: 80%"><?php echo(esc_textarea(weaverx_getopt('_perpagewidgets'))); ?></textarea>
<?php
	do_action('weaverxplus_admin','widget_areas');
}

// ======================== Main Options > Layout ========================
function weaverx_mainopts_layout() {
	$opts = array( array( 'type' => 'submit'),
    array('name' => 'Sidebar Layout', 'id' => '-welcome-widgets-menus', 'type' => 'header',
        'info' => wvr__('Sidebar Layout for each type of page ("stack top" used for mobile view)'),
		'help' => 'help.html#layout'),

    array('name' => wvr__('Blog, Post, Page Default'), 'id' => 'layout_default', 'type' => 'select_id',
        'info' => wvr__('Select the default theme layout for blog, single post, attachments, and pages.'),
        'value' => array(
            array('val' => 'right', 'desc' => wvr__('Sidebars on Right') ),
            array('val' => 'right-top', 'desc' => wvr__('Sidebars on Right (stack top)') ),
            array('val' => 'left', 'desc' => wvr__(' Sidebars on Left') ),
            array('val' => 'left-top', 'desc' => wvr__(' Sidebars on Left (stack top)') ),
            array('val' => 'split', 'desc' => wvr__('Split - Sidebars on Right and Left') ),
            array('val' => 'split-top', 'desc' => wvr__('Split (stack top)') ),
            array('val' => 'one-column', 'desc' => wvr__('No sidebars, content only') )
	)),

	array('name' => wvr__('Archive-like Default'), 'id' => 'layout_default_archive', 'type' => 'select_id',
        'info' => wvr__('Select the default theme layout for all other pages - archives, search, etc.'),
        'value' => array(
            array('val' => 'right', 'desc' => wvr__('Sidebars on Right') ),
            array('val' => 'right-top', 'desc' => wvr__('Sidebars on Right (stack top)') ),
            array('val' => 'left', 'desc' => wvr__(' Sidebars on Left') ),
            array('val' => 'left-top', 'desc' => wvr__(' Sidebars on Left (stack top)') ),
            array('val' => 'split', 'desc' => wvr__('Split - Sidebars on Right and Left') ),
            array('val' => 'split-top', 'desc' => wvr__('Split (stack top)') ),
            array('val' => 'one-column', 'desc' => wvr__('No sidebars, content only') )
	)),

	array('name' => wvr__('<small>Page</small>'), 'id' => 'layout_page', 'type' => 'select_layout',
        'info' => wvr__('Layout for normal Pages on your site.'),
        'value' => ''
	  ),
	array('name' => wvr__('<small>Blog</small>'), 'id' => 'layout_blog', 'type' => 'select_layout',
        'info' => wvr__('Layout for main blog page. Includes "Page with Posts" Page templates.'),
        'value' => ''
	  ),
	array('name' => wvr__('<small>Post Single Page</small>'), 'id' => 'layout_single', 'type' => 'select_layout',
        'info' => wvr__('Layout for Posts displayed as a single page.'),
        'value' => ''
	  ),
    array('name' => wvr__('<small>Attachments</small>'), 'id' => 'layout_image', 'type' => '+select_layout',
        'info' => wvr__('Layout for attachment pages such as images. (&starf;Plus)'),
        'value' => ''
	  ),
	array('name' => wvr__('<small>Date Archive</small>'), 'id' => 'layout_archive', 'type' => '+select_layout',
        'info' => wvr__('Layout for archive by date pages. (&starf;Plus)'),
        'value' => ''
	  ),
    array('name' => wvr__('<small>Category Archive</small>'), 'id' => 'layout_category', 'type' => '+select_layout',
        'info' => wvr__('Layout for category archive pages. (&starf;Plus)'),
        'value' => ''
	  ),
	array('name' => wvr__('<small>Tags Archive</small>'), 'id' => 'layout_tag', 'type' => '+select_layout',
        'info' => wvr__('Layout for tag archive pages. (&starf;Plus)'),
        'value' => ''
	  ),
	array('name' => wvr__('<small>Author Archive</small>'), 'id' => 'layout_author', 'type' => '+select_layout',
        'info' => wvr__('Layout for author archive pages. (&starf;Plus)'),
        'value' => ''
	  ),
	array('name' => wvr__('<small>Search Results, 404</small>'), 'id' => 'layout_search', 'type' => '+select_layout',
        'info' => wvr__('Layout for search results and 404 pages. (&starf;Plus)'),
        'value' => ''
	  ),



    array('name' => wvr__('<small>Left Sidebar Width</small>'), 'id' => 'left_sb_width_int', 'type' => 'val_percent',
        'info' => wvr__('Width for Left Sidebar (Default: 25%)'),
        'value' => ''
	  ),
    array('name' => wvr__('<small>Right Sidebar Width</small>'), 'id' => 'right_sb_width_int', 'type' => 'val_percent',
        'info' => wvr__('Width for Right Sidebar (Default: 25%)'),
        'value' => ''
	  ),
    array('name' => wvr__('<small>Split Left Sidebar Width</small>'), 'id' => 'left_split_sb_width_int', 'type' => 'val_percent',
        'info' => wvr__('Width for Split Sidebar, Left Side (Default: 25%)'),
        'value' => ''
	  ),
    array('name' => wvr__('<small>Split Right Sidebar Width</small>'), 'id' => 'right_split_sb_width_int', 'type' => 'val_percent',
        'info' => wvr__('Width for Split Sidebar, Right Side (Default: 25%)'),
        'value' => ''
	  ),
    array('name' => 'Content Width:', 'type' => 'note',
		'info' => 'The width of content area automatically determined by sidebar layout and width'),

    array('name' => 'Flow color to bottom', 'id' => 'flow_color', 'type' => '+checkbox',
		'info' => 'If checked, Content and Sidebar bg colors will flow to bottom of the Container (that is, equal heights). You must provide background colors for the Content and Sidebars or the default bg color will be used. (&starf;Plus)'),



	);
    ?>
<p>
Options affecting <strong>Sidebar Layout</strong> and the main <strong>Sidebar Areas</strong>. This includes properties of individual <strong>Widgets</strong>, as well as properties of various <strong>Sidebars</strong>.
</p>
<?php

	weaverx_form_show_options($opts);
    do_action('weaverxplus_admin','layout');   // add new layout option?
}
?>
