<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/* Weaver Xtreme - admin
 *  __ added - 12/10/14
 */

function weaverx_admin_pro() {

    weaverx_tab_title(__('Theme Add-ons','weaverx_axtreme'), 'help.html#WeaverXPlus', __('Help for theme Add-ons','weaver-xtreme'));

    do_action('weaverx_show_licenses');

	if ( !function_exists('weaverxplus_plugin_installed') ) {
?>
<h2 style="font-weight:bold;">
<em><?php weaverx_site('','http://plus.weavertheme.com/',__('Weaver Xtreme Plus','weaver-xtreme')); ?>
<?php _e('Weaver Xtreme Plus','weaver-xtreme'); ?></a></em>
<?php _e('gives you more premium Weaver Xtreme features','weaver-xtreme'); ?>
</h2>
<div class="a-plus">
<p>
<?php _e('You can extend Weaver Xtreme\'s features by getting the premium <em>Weaver Xtreme Plus Plugin</em>.
Weaver Xtreme Plus adds useful new options to the Weaver Xtreme admin tabs
- many you\'ve probably already noticed mentioned on the existing option tabs.','weaver-xtreme'); ?>
<p>
<strong><em><?php _e('Premium features included with Weaver Xtreme Plus:','weaver-xtreme'); ?></em></strong>
<ul>
<li><?php _e('<strong>More Wrapping Areas Options</strong> - Specify background images for specific areas','weaver-xtreme'); ?></li>
<li><?php _e('<strong>More Widget Options</stong> - Define custom multi-column widgets. Equalize multi-column widget height','weaver-xtreme'); ?></li>
<li><?php _e('<strong>More Font Options</strong> - Easily add font families from hundreds of Google Fonts','weaver-xtreme'); ?></li>
<li><?php _e('<strong>Add Extra Menus</strong> - Add extra menus to your site using the Weaver Xtreme Plus Extra Menu
Widget, or the [extra_menu] shortcode','weaver-xtreme');?></li>
<li><?php _e('<strong>Additional Post Specifics Options</strong> - Define totally custom post top and bottom info lines','weaver-xtreme'); ?></li>
<li><strong><?php _e('More &lt;HEAD&gt; Section Options</strong> - define custom PHP actions and filters for WordPress','weaver-xtreme'); ?></li>
<li><strong><?php _e('Additional HTML Insertion Areas</strong> - Many HTML insertion area','weaver-xtreme'); ?></li>
<li><strong><?php _e('More Per Page HTML Insertion Options</strong> - Define HTML insertions on per page basis','weaver-xtreme'); ?></li>
	</ul>
</p>
	<p style="font-size:large;line-height:1.4em;">
<strong><span style="color:blue; font-weight:bold;"><?php _e('Get Weaver Xtreme Plus Now!','weaver-xtreme'); ?></span></strong>
<br />
<span style="margin-left:20px;"></span><?php _e('Visit','weaver-xtreme'); ?> <?php weaverx_site('','http://plus.weavertheme.com/','Weaver Xtreme Plus'); ?><?php _e('Plus.WeaverTheme.com<','weaver-xtreme'); ?>/a>
<?php _e('now to get your copy of <em>Weaver Xtreme Plus</em>.','weaver-xtreme'); ?>
</p>
</div>

<?php
    } else {
// to here, have Plus features

	echo '<h2 style="font-weight:bold;">' . __('Weaver Xtreme Plus Features - <span style="font-size:small;">You are using Weaver Xtreme Plus. Thank you.</span>','weaver-xtreme') . '</h2>' . "\n";

	do_action('weaverxplus_admin','weaverxplus_admin');
    }
?>
<hr />
<?php

	if (!function_exists('wvrx_ts_installed')) {
?>
<h2 style="font-weight:bold;"><?php _e('Get the <em>free</em> Weaver Xtreme Theme Support Plugin!','weaver-xtreme'); ?></h2>
<div class="a-plus">
<p>
<?php _e('The <em>Weaver Xtreme Theme Support</em> plugin provides a collection of useful shortcodes and widgets
to make it even easier to customize your site.','weaver-xtreme'); ?>
</p>
<p><strong><?php _e('See ','weaver-xtreme'); ?><em>
<?php weaverx_site('/plugins/weaverx-theme-plugins','','Weaver Xtreme Plugins'); ?><?php _e('Weaver Xtreme Plugins','weaver-xtreme'); ?></a></em> <?php _e('for complete details.','weaver-xtreme'); ?></strong></p>
<p>
	<?php _e('Shortcodes and Widgets included:','weaver-xtreme'); ?>
<ul>
<li><strong><?php _e('[show|hide_if]</strong> - Show or hide content based on device, page/post ID, user role, or logged in status','weaver-xtreme'); ?></li>
<li><strong><?php _e('[tab_group]</strong> - Add content to a tabbed box','weaver-xtreme'); ?></li>
<li><?php _e('<strong>[youtube]</strong> - Show your YouTube videos responsively, and with the capability
to use any of the YouTube custom display options','weaver-xtreme'); ?></li>
<li><strong><?php _e('[vimeo]</strong> -  Show your Vimeo videos responsively, and with the capability
to use any of the Vimeo custom display options','weaver-xtreme'); ?></li>
<li><?php _e('<strong>[iframe]</strong> - Quick and easy display of content in an iframe','weaver-xtreme'); ?></li>
<li><?php _e('Plus more shortcodes','weaver-xtreme'); ?></li>
<li><?php _e('Adds shortcode support to the standard Text Widget','weaver-xtreme'); ?></li>
<li><?php _e('<strong>Weaver Xtreme 2 Column Text Widget</strong> - Add text into two columns in a widget','weaver-xtreme'); ?></li>
<li><strong><?php _e('Weaver Xtreme Per Page Text Widget</strong> - Add a text widget on a per page basis','weaver-xtreme'); ?></li>
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
	' <span style="float:right;margin-right:4em;font-size:small;font-style:italic;"><a href="http://plus.weavertheme.com/" target="_blank";>' . __('Get Weaver Xtreme Plus','weaver-xtreme') . '</a></span></h4>'. "\n";
}

function weaverxplus_fonts() {
	weaverxplus_intro(__('Weaver Xtreme Plus Font Options','weaver-xtreme'));
?>
<div class="a-plus">
<p>
<?php _e('<strong>Weaver Xtreme Plus</strong> makes adding new font easy.
The Plus Font Control panel allows you to easily add fonts from Google Web Fonts, Font Squirrel,
or virtually any other free or commercial font source directly to the <em>Font Family</em> text options.','weaver-xtreme'); ?>
</p>
</div> <br />
<?php
}


function weaverxplus_footeropts() {
}

function weaverxplus_genappearance() {
	weaverxplus_intro('Weaver Xtreme Plus Wrapping Areas Options');
?>
<a id="background-images"></a></a><div class="a-plus">
<p>
<?php _e('<strong>Weaver Xtreme Plus</strong> allows you to specify a background image for specific areas
on your site, including a full screen site bg image, background images for the wrapper,
header, container, content, sidebars and more. You easily pick any image from your
Media Library to use as the background image.','weaver-xtreme'); ?>
</p>
	</div>

<?php
}

function weaverxplus_mainopts_header() {

}

function weaverxplus_adv_head() {
	weaverxplus_intro(__('Weaver Xtreme Plus &lt;HEAD&gt; Section Options','weaver-xtreme'));
?>
<div class="a-plus">
<p>
<?php _e('For advanced users, <strong>Weaver Xtreme Plus</strong> allows you to write complete PHP functions
that can define WordPress actions and filters used to format and control much of the content
output of your theme. Much of what previously required defining a child theme can be
done with the Actions and Filters feature of <strong>Weaver Xtreme Plus</strong>.','weaver-xtreme'); ?>
</p>
</div>
<?php
}

function weaverxplus_html_insertion() {
	weaverxplus_intro('Weaver Xtreme Plus Additional HTML Insertion Areas');
?>
<div class='a-plus'>
<p>
<?php _e('<strong>Weaver Xtreme Plus</strong> includes these additional HTML Insertions areas:','weaver-xtreme'); ?>
<ul style="padding-left:4em;">
<li><?php _e('Header Top Code','weaver-xtreme'); ?></li>
<li><?php _e('Container Top','weaver-xtreme'); ?></li>
<li><?php _e('Content Top','weaver-xtreme'); ?></li>
<li><?php _e('Page Content Bottom','weaver-xtreme'); ?></li>
<li><?php _e('Post-Post Content Code','weaver-xtreme'); ?></li>
<li><?php _e('Pre-Comments Code','weaver-xtreme'); ?></li>
<li><?php _e('Post-Comments Code','weaver-xtreme'); ?></li>
<li><?php _e('Pre-Footer Code','weaver-xtreme'); ?></li>
<li><?php _e('Pre-Sidebar','weaver-xtreme'); ?></li>
<li><?php _e('Fixed Browser Top Area','weaver-xtreme'); ?></li>
<li><?php _e('Fixed Browser Bottom Area','weaver-xtreme'); ?></li>
</ul>
</p>
</div>
<?php
}

//Header TopContainer TopContent TopPage Content BottomPost-Post ContentPre-CommentsPost-CommentsPre-FooterPre-Sidebar
function weaverxplus_post_spec() {
	weaverxplus_intro( __('Weaver Xtreme Plus Additional Post Specifics Options','weaver-xtreme'));
?>
<div class="a-plus">
<p>
<?php _e('<strong>Weaver Xtreme Plus</strong> includes the ability to define custom top and bottom post meta info lines.
You can define any combination of labels, icons, and elements like categories, author, dates, and custom text
to replace the default meta info lines.','weaver-xtreme'); ?>
</p>
</div>
<br />
<?php
}

}   // end of Weaver Xtreme Free's Weaver Xtreme Plus plugs
?>
