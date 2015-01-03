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
	<span style="font-size:larger;font-weight:bold;padding-right:70px;"><?php _e('Weaver Xtreme Help','weaver-xtreme' /*adm*/); ?></span>

<small><strong><?php _e('Media Library Picker Tool:','weaver-xtreme' /*adm*/); ?></strong></small>&nbsp;
<input name="media_url" type="text" style="width:400px;height:22px;" class="regular-text" name="media_url"
	id="media_url" value="<?php __('Paste media URL here that you can then Copy/Paste elsewhere.','weaver-xtreme' /*adm*/);?>" />
	<?php 	weaverx_media_lib_button('media_url'); ?>
<p>
<?php _e('This is the Weaver Xtreme Admin help button: ','weaver-xtreme' /*adm*/); ?>
<?php weaverx_help_link('help.html#top', __('Weaver Xtreme Help','weaver-xtreme' /*adm*/)); ?>
<?php _e('Clicking the ? will open the Weaver Xtreme Help	document to the appropriate section.','weaver-xtreme' /*adm*/); ?>
</p>
<p>
More help is available at the <?php weaverx_site(); ?><strong>Weaver Xtreme Theme web site</strong></a>, which includes
a support forum.
</p>
<?php
	do_action('weaverxplus_admin','help');
?>
<div style="float:left;width:50%;padding-right:2%">
	<div class="atw-help">
<h2 style="text-decoration:underline;font-weight:bold;")>
	<?php weaverx_help_link('help.html', __('Weaver Xtreme Help','weaver-xtreme' /*adm*/), __('Weaver Xtreme Theme Documentation','weaver-xtreme' /*adm*/)) ?>
</h2>
<p>
	<?php _e('Complete documentation for using the Weaver Xtreme Theme.','weaver-xtreme' /*adm*/); ?>
</p>
<h2 style="text-decoration:underline;font-weight:bold;")>
	<?php weaverx_help_link('css-help.html', __('Weaver CSS Help','weaver-xtreme' /*adm*/), __('CSS HELP','weaver-xtreme' /*adm*/)) ?>
</h2>
<p>
	<?php _e('A short CSS Tutorial','weaver-xtreme' /*adm*/); ?>
</p>
<h2 style="text-decoration:underline;font-weight:bold;")>
	<?php weaverx_help_link('font-demo.html', __('Examples of supported fonts','weaver-xtreme' /*adm*/), __('Font Examples','weaver-xtreme' /*adm*/)) ?>
</h2>
<p>
<?php _e('Example of Font Families supported by Weaver Xtreme and Weaver Xtreme Plus.','weaver-xtreme' /*adm*/); ?>
</p>
	</div>
</div>
<div style="float:right;width:40%;padding-right:1%">

<h2><b><?php _e('RECOMMENDED PLUGINS','weaver-xtreme' /*adm*/); ?></b></h2>
<p><strong>
<?php _e('Some recommended plugins to use with your Weaver Xtreme Theme','weaver-xtreme' /*adm*/); ?>
</strong></p>
<ul>
<li><a href="http://wordpress.org/plugins/weaverx-theme-support/" target="_blank"><?php _e('Weaver Xtreme Theme Support','weaver-xtreme' /*adm*/); ?></a>
<?php _e('- provides additional Weaver Xtreme theme options and useful shortcodes','weaver-xtreme' /*adm*/); ?>
</li>
<li><a href="http://wordpress.org/plugins/show-posts/" target="_blank"><?php _e('Aspen Themeworks Show Posts','weaver-xtreme' /*adm*/); ?></a>
<?php _e('- adds the [show_posts] shortcode to selectively display posts.
Adds additional filtering options to the Weaver Xtreme Page with Posts page template.','weaver-xtreme' /*adm*/); ?>
</li>
<li><a href="http://wordpress.org/plugins/show-sliders/" target="_blank"><?php _e('Aspen Themeworks Show Sliders','weaver-xtreme' /*adm*/); ?></a>
<?php __('- good for any kind of slideshows - images, posts, [gallery] replacement','weaver-xtreme' /*adm*/);?>
</li>
<li><a href="https://wordpress.org/plugins/wp-retina-2x/" target="_blank"><?php _e('WP Retina 2x','weaver-xtreme' /*adm*/); ?></a>
<?php _e('- Weaver Xtreme is Retina Ready - this plugin makes your Media Library Retina Ready, too.','weaver-xtreme' /*adm*/); ?>
</li>
<li><a href="https://wordpress.org/plugins/wp-edit/" target="_blank">WP Edit</a>
<?php _e('WP Edit adds additional editing functionality to the default WordPress editor.
Begin creating content like the pros; without knowing a single bit of HTML or CSS.','weaver-xtreme' /*adm*/); ?>
</li>
</ul>

</div><div style="clear:both;"></div>

<?php
}

?>
