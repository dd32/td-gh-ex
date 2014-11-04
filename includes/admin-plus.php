<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/* Weaver Xtreme - admin shortcodes
 *
 */

function weaverx_admin_pro() {

?>
<h3>Enhance the Weaver Xtreme Theme <?php weaverx_help_link('help.html#WeaverXPlus','Help for Admin Options'); ?></h3>
<?php

    do_action('weaverx_show_licenses');

	if ( !function_exists('weaverxplus_plugin_installed') ) {
?>
<h2 style="font-weight:bold;">Get <em><?php weaverx_site('','http://plus.weavertheme.com/','Weaver Xtreme Plus'); ?>Weaver Xtreme Plus</a></em> for more premium Weaver Xtreme features</h2>
<div class="a-plus">
<p>You can extend Weaver Xtreme's features by getting the <em>Weaver Xtreme Plus Plugin</em>. Weaver Xtreme Plus adds useful new options to the Weaver Xtreme admin tabs
- many you've probably already noticed mentioned on the existing option tabs.
<p>
	<strong><em>Premium features included with Weaver Xtreme Plus:</em></strong>
	<ul>
		<li><strong>More Wrapping Areas Options</strong> - Specify background images for specific areas</li>
        <li><stong>More Widget Options</stong> - Define custom multi-column widgets. Equalize multi-column widget height</li>
		<li><strong>More Font Options</strong> - Easily add font families from hundreds of Google Fonts</li>
		<li><strong>Add Extra Menus</strong> - Add extra menus to your site using the Weaver Xtreme Plus Extra Menu
		Widget, or the [extra_menu] shortcode</li>
		<li><strong>Additional Post Specifics Options</strong> - Define totally custom post top and bottom info lines</li>
		<li><strong>More &lt;HEAD&gt; Section Options</strong> - define custom PHP actions and filters for WordPress</li>
		<li><strong>Additional HTML Insertion Areas</strong> - Many HTML insertion area</li>
		<li><strong>More Per Page HTML Insertion Options</strong> - Define HTML insertions on per page basis</li>
	</ul>
</p>
	<p style="font-size:large;line-height:1.4em;">
<strong><span style="color:blue; font-weight:bold;">Get Weaver Xtreme Plus Now!</span></strong>
<br />
<span style="margin-left:20px;"></span>Visit <?php weaverx_site('','http://plus.weavertheme.com/','Weaver Xtreme Plus'); ?>Plus.WeaverTheme.com</a>
now to get your copy of <em>Weaver Xtreme Plus</em>.
</p>
</div>

<?php
    } else {
// to here, have Plus features

	echo '<h2 style="font-weight:bold;">Weaver Xtreme Plus Features - <span style="font-size:small;">You are using Weaver Xtreme Plus, Version ' . WEAVER_XPLUS_VERSION . '. Thank you.</span></h2>' . "\n";

	do_action('weaverxplus_admin','weaverxplus_admin');
    }
?>
<hr />
<?php

	if (!function_exists('wvrx_ts_installed')) {
?>
<h2 style="font-weight:bold;">Get the <em>free</em> Weaver Xtreme Theme Support Plugin!</h2>
<div class="a-plus">
<p>The <em>Weaver Xtreme Theme Support</em> plugin provides a collection of useful shortcodes and widgets
to make it even easier to customize your site.</p>
<p><strong>See <em>
<?php weaverx_site('/plugins/weaverx-theme-plugins','','Weaver Xtreme Plugins'); ?>Weaver Xtreme Plugins</a></em> for complete details.</strong></p>
<p>
	Shortcodes and Widgets included:
	<ul>
    <li><strong>[show|hide_if]</strong> - Show or hide content based on device, page/post ID, user role, or logged in status</li>
	<li><strong>[tab_group]</strong> - Add content to a tabbed box.</li>
	<li><strong>[youtube]</strong> - Show your YouTube videos responsively, and with the capability
	to use any of the YouTube custom display options</li>
	<li><strong>[vimeo]</strong> -  Show your Vimeo videos responsively, and with the capability
	to use any of the Vimeo custom display options</li>
	<li><strong>[iframe]</strong> - Quick and easy display of content in an iframe </li>
	<li>Plus more shortcodes</li>
	<li><strong>Weaver Xtreme 2 Column Text Widget</strong> - Add text into two columns in a widget</li>
	<li><strong>Weaver Xtreme Per Page Text Widget</strong> - Add a text widget on a per page basis</li>
   </ul>
</p>
</div>

<?php
	} else {
        do_action('weaverx_theme_support_addon');
	}
}

if (!function_exists('weaverxplus_plugin_installed')) {
	add_action('weaverxplus_admin','weaverxplus_admin_actions_free');

function weaverxplus_admin_actions_free( $action ) {

	switch ($action) {  // search code for list of actions supported by Weaver Xtreme Theme

		case 'fonts':
			weaverxplus_fonts();
			break;

		case 'footer_opts':
			weaverxplus_footeropts();
			break;

		case 'general_appearance':
			weaverxplus_genappearance();
			break;

		case 'header_opts':
			weaverxplus_mainopts_header();
			break;

		case 'head_section':
			weaverxplus_adv_head();
			break;

		case 'html_insertion':
			weaverxplus_html_insertion();
			break;

		case 'post_specifics':
			weaverxplus_post_spec();
			break;

		// cases with no Plus extensions

		case 'admin_options':
		case 'content_areas':
		case 'help':
		case 'layout':
		case 'links':
		case 'menu_bar':
		case 'mobile_opts':
		case 'process_options':     // ignore submitted options
		case 'save_restore':
		case 'show_subthemes':
		case 'site_opts':
		case 'widget_areas':
			break;


		default:
			// echo '<h3 style="background-color:#afa;border:2px solid green;"><strong>Weaver Xtreme Plus Extra Admin: ' . $action . '</strong></h3>';
			break;
	}

}

function weaverxplus_intro($title) {
	echo '<h4 class="atw-option-subheader"><span style="color:black; padding:.2em;" class="dashicons dashicons-plus-alt"></span>' . $title .
	' <span style="float:right;margin-right:4em;font-size:small;font-style:italic;"><a href="http://plus.weavertheme.com/" target="_blank";>Get Weaver Xtreme Plus</a></span></h4>'. "\n";
}

function weaverxplus_fonts() {
	weaverxplus_intro('Weaver Xtreme Plus Font Options');
?>
	<div class="a-plus">
	<p><strong>Weaver Xtreme Plus</strong> makes adding new font easy. The Plus Font Control panel allows
    you to easily add fonts from Google Web Fonts, Font Squirrel, or virtually any other free or commercial font source directly to the
    <em>Font Family</em> text options.</p>
	</div> <br />
<?php
}


function weaverxplus_footeropts() {
}

function weaverxplus_genappearance() {
	weaverxplus_intro('Weaver Xtreme Plus Wrapping Areas Options');
?>
	<div class="a-plus">
	<p><strong>Weaver Xtreme Plus</strong> allows you to specify a background image for specific areas
	on your site, including a full screen site bg image, background images for the wrapper,
	header, container, content, sidebars and more. You easily pick any image from your
	Media Library to use as the background image.</p>
	</div>

<?php
}

function weaverxplus_mainopts_header() {

}

function weaverxplus_adv_head() {
	weaverxplus_intro('Weaver Xtreme Plus &lt;HEAD&gt; Section Options');
	?>
	<div class="a-plus">
		<p>For advanced users, <strong>Weaver Xtreme Plus</strong> allows you to write complete PHP functions
		that can define WordPress actions and filters used to format and control much of the content
		output of your theme. Much of what previously required defining a child theme can be
		done with the Actions and Filters feature of <strong>Weaver Xtreme Plus</strong>.</p>
	</div>
<?php
}

function weaverxplus_html_insertion() {
	weaverxplus_intro('Weaver Xtreme Plus Additional HTML Insertion Areas');
?>
	<div class='a-plus'>
		<p>
		<strong>Weaver Xtreme Plus</strong> includes these additional HTML Insertions areas:
		<ul style="padding-left:4em;">
            <li>Header Top Code</li>
			<li>Container Top</li>
			<li>Content Top</li>
            <li>Page Content Bottom</li>
			<li>Post-Post Content Code</li>
			<li>Pre-Comments Code</li>
			<li>Post-Comments Code</li>
			<li>Pre-Footer Code</li>
			<li>Pre-Sidebar</li>
            <li>Fixed Browser Top Area</li>
            <li>Fixed Browser Bottom Area</li>
		</ul>
		</p>
	</div>
<?php
}

//Header TopContainer TopContent TopPage Content BottomPost-Post ContentPre-CommentsPost-CommentsPre-FooterPre-Sidebar
function weaverxplus_post_spec() {
	weaverxplus_intro('Weaver Xtreme Plus Additional Post Specifics Options');
?>
<div class="a-plus">
<p>
	<strong>Weaver Xtreme Plus</strong> includes the ability to define custom top and bottom post meta info lines.
	You can define any combination of labels, icons, and elements like categories, author, dates, and custom text
	to replace the default meta info lines.
</p>
</div>
<br />
<?php
}

}   // end of Weaver Xtreme Free's Weaver Xtreme Plus plugs
?>
