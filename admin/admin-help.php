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
	<span style="font-size:larger;font-weight:bold;padding-right:70px;"><?php _e('Weaver Xtreme Help', 'weaver-xtreme' /*adm*/); ?></span>

<small><strong><?php _e('Media Library Picker Tool:', 'weaver-xtreme' /*adm*/); ?></strong></small>&nbsp;
<input name="media_url" type="text" style="width:400px;height:22px;" class="regular-text" name="media_url"
	id="media_url" value="<?php __('Paste media URL here that you can then Copy/Paste elsewhere.', 'weaver-xtreme' /*adm*/);?>" />
	<?php 	weaverx_media_lib_button('media_url'); ?>
<p>
<?php _e('This is the Weaver Xtreme Admin help button: ', 'weaver-xtreme' /*adm*/); ?>
<?php weaverx_help_link('help.html#top', __('Weaver Xtreme Help', 'weaver-xtreme' /*adm*/)); ?>
<?php _e('Clicking the ? will open the Weaver Xtreme Help	document to the appropriate section.', 'weaver-xtreme' /*adm*/); ?>
</p>
<p>
<?php _e('More help is available at the ', 'weaver-xtreme' /*adm*/); ?><?php weaverx_site(); ?><strong><?php _e('Weaver Xtreme Theme web site', 'weaver-xtreme' /*adm*/); ?></strong></a><?php _e(', which includes a support forum.', 'weaver-xtreme' /*adm*/); ?>
</p>
<?php
	do_action('weaverxplus_admin','help');
?>
<div style="float:left;width:50%;padding-right:2%">
	<div class="atw-help">
<h2 style="text-decoration:underline;font-weight:bold;")>
	<?php weaverx_help_link('help.html', __('Weaver Xtreme Help', 'weaver-xtreme' /*adm*/), __('Weaver Xtreme Theme Documentation', 'weaver-xtreme' /*adm*/)) ?>
</h2>
<p>
	<?php _e('Complete documentation for using the Weaver Xtreme Theme.', 'weaver-xtreme' /*adm*/); ?>
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
<?php _e('Example of Font Families supported by Weaver Xtreme and Weaver Xtreme Plus.', 'weaver-xtreme' /*adm*/); ?>
</p>

<h3 style="text-decoration:underline;font-weight:bold;")>
	<?php _e('Release Notes', 'weaver-xtreme' /*adm*/); ?>
</h3>
<p>
<pre>
= Version 1.2 =
* New: Multiple Column option for Page content
* New: Full Width Subthemes - Dark and Light plus Demo versions
* New: Set menu bar switch desktop/mobile point (Plus)
* Tweak: additional support for Plus
* Tweak: Recommend Plugins - added WP Edit and WP Retina 2x
* Tweak: A few documentation changes
* Tweak: removed auto-generation of media library header sized image. This generated image was
         never actually used - cropping the header image when adding is an independent action.
* Fix: IE8 compatibility script loading
* Fix: Fatal error bug when Page with Post compact post option set
* Fix: Infobar centering

= Version 1.2.2 =
* Tweak: Beginning of Admin code reorganization - moved admin files to new directories
* Fix: Mobile menu bug on non-SmartMenus
* Fix: ignore mobile toggle set point if not SmartMenu

= Version 1.2.3 =
* New: Plain - Full Width subtheme
* Tweak: Moved Edit button inside .entry-content on Pages
* Tweak: Updated to new TGM library (for installing recommended plugins)
* Fix: 3-column Post display on small tablets
* Fix: z-index for Smart Menu HTML areas

= Version 1.2.4 =
* Fix: problem with 2 and 3 column post layout
* Fix: Failure to translate Post Comment and Leave a Reply
</pre>
</p>
	</div>
</div>
<div style="float:right;width:40%;padding-right:1%">

<h2><b><?php _e('RECOMMENDED PLUGINS', 'weaver-xtreme' /*adm*/); ?></b></h2>
<p><strong>
<?php _e('Some recommended plugins to use with your Weaver Xtreme Theme', 'weaver-xtreme' /*adm*/); ?>
</strong></p>
<ul>
<li><a href="//wordpress.org/plugins/weaverx-theme-support/" target="_blank"><?php _e('Weaver Xtreme Theme Support', 'weaver-xtreme' /*adm*/); ?></a>
<?php _e('- provides additional Weaver Xtreme theme options and useful shortcodes', 'weaver-xtreme' /*adm*/); ?>
</li>
<li><a href="//wordpress.org/plugins/show-posts/" target="_blank"><?php _e('Weaver Show Posts', 'weaver-xtreme' /*adm*/); ?></a>
<?php _e('- adds the [show_posts] shortcode to selectively display posts filtered by category, tag, order, id, etc.
Also adds additional filtering options to the Weaver Xtreme Page with Posts page template.
This formerly was integrated with Weaver, and was considered an important part of the theme.
Themes are no longer allowed to include shortcodes, so it is now a plugin that can be used with any theme.', 'weaver-xtreme' /*adm*/); ?>
</li>
<li><a href="//wordpress.org/plugins/show-sliders/" target="_blank"><?php _e('Weaver Show Sliders', 'weaver-xtreme' /*adm*/); ?></a>
<?php _e('- good for any kind of slideshows - images, posts, [gallery] replacement', 'weaver-xtreme' /*adm*/);?>
</li>
<li><a href="https://wordpress.org/plugins/wp-retina-2x/" target="_blank"><?php _e('WP Retina 2x', 'weaver-xtreme' /*adm*/); ?></a>
<?php _e('- Weaver Xtreme is Retina Ready - this plugin makes your Media Library Retina Ready, too.', 'weaver-xtreme' /*adm*/); ?>
</li>
<li><a href="https://wordpress.org/plugins/wp-edit/" target="_blank">WP Edit</a>
<?php _e('WP Edit adds additional editing functionality to the default WordPress editor.
Allows content formatting without the need for extra HTML or CSS.
Also includes advanced features to manage your content such as post and page revision control.', 'weaver-xtreme' /*adm*/); ?>
</li>
</ul>

</div><div style="clear:both;"></div>

<?php
}

?>
