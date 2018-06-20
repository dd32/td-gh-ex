<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/* Weaver Xtreme - admin Help
 *
 *  __ added:  12/10/14
 *
 * This is the intro form. It won't have any options because it will be outside the main form
 */

function weaverx_admin_help() {
?>
	<h2><?php _e('Weaver Xtreme Help', 'weaver-xtreme' /*adm*/); ?></h2>

<br />
<?php _e('This is the Weaver Xtreme Admin help button: ', 'weaver-xtreme' /*adm*/); ?>
<?php weaverx_help_link('help.html#top', __('Weaver Xtreme Help', 'weaver-xtreme' /*adm*/)); ?>
&nbsp;&nbsp;
<?php _e('Clicking the ? will open the Weaver Xtreme Help document.', 'weaver-xtreme' /*adm*/); ?>
</p>
<h2>
<?php _e('Please see our active ', 'weaver-xtreme' /*adm*/); ?>
<?php 		weaverx_site('','//forum.weavertheme.com/',__('Weaver Support Forum', 'weaver-xtreme' /*adm*/)); ?>
<?php _e('Support Forum</a> for online help.', 'weaver-xtreme' /*adm*/); ?>
</h2>
<br />
<?php
	do_action('weaverxplus_admin','help');
?>
<div style="float:left;width:50%;padding-right:2%">
	<div class="atw-help">

<h2>
<?php _e('Please see the ', 'weaver-xtreme' /*adm*/); ?>
<?php 		weaverx_site('','//guide.weavertheme.com/',__('Weaver Xtreme Guide', 'weaver-xtreme')); ?>
<?php _e('Online Guide</a> for complete online theme reference.', 'weaver-xtreme' /*adm*/); ?>
</h2>
<p>
	<?php _e('Extensive and searchable online guide for <em>Weaver Xtreme</em>. The best reference for Weaver Xtreme.', 'weaver-xtreme'); ?>
</p>
<h2 style="text-decoration:underline;font-weight:bold;")>
	<?php weaverx_help_link('help.html', __('Weaver Xtreme Help', 'weaver-xtreme' /*adm*/), __('Theme Documentation (Customizer)', 'weaver-xtreme' /*adm*/)) ?>
</h2>
<p>
	<?php _e('Complete documentation for using the Weaver Xtreme Theme and the Customizer option interface.', 'weaver-xtreme' /*adm*/); ?>
</p>

<h2 style="text-decoration:underline;font-weight:bold;")>
	<?php weaverx_help_link('legacy-help.html', __('Weaver Xtreme Help', 'weaver-xtreme' /*adm*/), __('Theme Documentation (Legacy Admin)', 'weaver-xtreme' /*adm*/)) ?>
</h2>
<p>
	<?php _e('Complete documentation for using the Weaver Xtreme Theme with the Legacy options interface.', 'weaver-xtreme' /*adm*/); ?>
</p>


<h2 style="text-decoration:underline;font-weight:bold;")>
	<?php weaverx_help_link('css-help.html', __('Weaver CSS Help', 'weaver-xtreme' /*adm*/), __('CSS HELP', 'weaver-xtreme' /*adm*/)) ?>
</h2>
<p>
	<?php _e('A short CSS Tutorial', 'weaver-xtreme' /*adm*/); ?>
</p>
<h2 style="text-decoration:underline;font-weight:bold;")>
	<?php weaverx_help_link('font-demo.html', __('Examples of supported fonts', 'weaver-xtreme' /*adm*/), __('Font Examples', 'weaver-xtreme' /*adm*/)) ?>
</h2>
<p>
<?php _e('Example of Font Families supported by Weaver Xtreme and Weaver Xtreme Plus.', 'weaver-xtreme' /*adm*/);
// Following Release Notes are not wrapped in translation as they are highly variable, and will
// change with each update of the theme - even minor updates. Just doesn't make sense to translate them.
?>
</p>

<h3 style="text-decoration:underline;font-weight:bold;")>
	<?php _e('Release Notes', 'weaver-xtreme' /*adm*/); ?>
</h3>
<p>
	<em>Please scroll to the end of the release notes to view latest changes.</em>
</p>
<?php
$notes = weaverx_relative_url('') . 'readme.txt';
?>
<p>
	<h3><a href="<?php echo $notes;?>" target="_blank">Click here to view most recent release notes.</a></h3>
</p>

	</div>
</div>
<div style="float:right;width:40%;padding-right:1%">

<h2><b><?php _e('RECOMMENDED PLUGINS', 'weaver-xtreme' /*adm*/); ?></b></h2>
<p><strong>
<?php _e('Some recommended plugins to use with your Weaver Xtreme Theme', 'weaver-xtreme' /*adm*/); ?>
</strong></p>
<ul>
<li style="font-size:120%;"><a href="//wordpress.org/plugins/weaverx-theme-support/" target="_blank"><?php _e('Weaver Xtreme Theme Support', 'weaver-xtreme' /*adm*/); ?></a>
<?php _e('- provides <strong>important</strong> Weaver Xtreme theme options and useful shortcodes. Per Page/Post options are now integrated with the theme, so if you do not need the legacy check-box options interface or the shortcodes, you can probably get by without the Theme Support Plugin.', 'weaver-xtreme' /*adm*/); ?>
</li>
</ul>
<p><strong>
<?php _e('The following plugins are not essential, but can be useful when creating pages, or using Weaver Xtreme shortcodes.', 'weaver-xtreme' /*adm*/); ?>
</strong></p>
<ul>
<li><a href="//wordpress.org/plugins/show-posts/" target="_blank"><?php _e('Weaver Show Posts', 'weaver-xtreme' /*adm*/); ?></a>
<?php _e('- adds the [show_posts] shortcode to selectively display posts filtered by category, tag, order, id, etc.
Also adds additional filtering options to the Weaver Xtreme Page with Posts page template.
This formerly was integrated with Weaver, and was considered an important part of the theme.', 'weaver-xtreme' /*adm*/); ?>
</li>
<li><a href="//wordpress.org/plugins/show-sliders/" target="_blank"><?php _e('Weaver Show Sliders', 'weaver-xtreme' /*adm*/); ?></a>
<?php _e('- good for any kind of slideshows - images, posts, [gallery] replacement', 'weaver-xtreme' /*adm*/);?>
</li>
<li><a href="https://wordpress.org/plugins/gutenberg/" target="_blank">Gutenberg</a> -
<?php _e('The new WordPress Gutenberg editor will soon become the default WordPress editor. The Gutenberg project has been underway for over a year, and the current version is getting very close. It has become a great tool for building good looking pages. This is especially true with Weaver Xtreme, which as added complete integrated support for Gutenberg. You will get a nearly total WYSIWYG experience when using the Gutenberg editor. Prepare for the future. Get Gutenberg now!', 'weaver-xtreme' /*adm*/); ?>
</li>
<li><a href="https://wordpress.org/plugins/widget-shortcode/" target="_blank">Widget Shortcode</a> -
<?php _e('Adds [widget] shortcode which enables you to display any widget in any content area. This is a great enhancement to Weaver Xtreme, especially when using the Weaver Xtreme Plus Flexible Layout Widget.', 'weaver-xtreme' /*adm*/); ?>
</li>
</ul>

</div><div class="clear-both;"></div>
<hr />
<?php
$local_mem_lim = ini_get('memory_limit');
$server_mem_lim = get_cfg_var('memory_limit');
$server_mem_lim = str_ireplace('M','', $server_mem_lim);
if ( $server_mem_lim < 128 && !weaverx_getopt('_disable_customizer') 	&& !weaverx_getopt('_ignore_PHP_memory')) {

	echo sprintf(__('<h3>Warning! Your WP host server has only %s of PHP Memory.</h3>
<p>Depending on your WordPress configuration, this could cause settings made in the Customizer to <em>NOT</em> be saved and applied to your live site. Weaver Xtreme recommends at least 128M of PHP memory for the Customizer to work properly. <em>Please verify that settings you make in the Customizer are being applied to your live site.</em></p><h4>HOW TO FIX THIS PROBLEM</h4>
<ul><li><strong>If your Customizer Settings do not save properly:</strong> Contact your site hosting company your hosting company to increase your PHP memory to 128M. This also may be an option on your hosting control panel. After you increase the PHP, please verify Customizer options are being saved.</li>
<li><strong>You do not need to or want to increase PHP Memory:</strong> Install the <em>Weaver Xtreme Theme Support Plugin</em> and check either the <em>Disable Weaver Xtreme Customizer Interface</em> option or the <em>Ignore Customizer PHP Minimum Memory</em> on the <em>Advanced Options : Admin Options</em> tab.', 'weaver-xtreme'), $server_mem_lim . 'M');
}
do_action('weaverx_more_help');
}

?>
