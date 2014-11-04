<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/* Weaver Xtreme - admin Help
 *
 * This is the intro form. It won't have any options because it will be outside the main form
 */

function weaverx_admin_help() {
	$tdir = get_template_directory_uri();

	$readme = esc_url($tdir."/help/help.html");

?>
	<span style="font-size:larger;font-weight:bold;padding-right:70px;">Weaver Xtreme Help</span>

<small><strong>Media Library Picker Tool:</strong></small>&nbsp;<input name="media_url" type="text" style="width:400px;height:22px;" class="regular-text" name="media_url"
				id="media_url" value="Paste media URL here that you can then Copy/Paste elsewhere." />
		<?php 	weaverx_media_lib_button('media_url'); ?>
	<p>You will notice
	<?php weaverx_help_link('help.html#top', wvr__('Weaver Xtreme Help')); ?>
	next to many options and option sections on the Weaver Xtreme Admin tabs. Clicking the ? will open the Weaver Xtreme Help
	file to the appropriate place.</p>

	<p>More help is available at the <?php weaverx_site(); ?><strong>Weaver Xtreme Theme web site</strong></a>, which includes
	a support forum.</p>
<?php
	do_action('weaverxplus_admin','help');
?>
<div style="float:left;width:40%;padding-right:3%">
    <div class=\"atw-help\">
        <h2><strong><a href="<?php echo $readme; ?>" target="_blank">Weaver Xtreme Theme Documentation</a></strong>
        </h2>
        <p>Complete documentation for using the Weaver Xtreme Theme.</p>
        <h2><b><a href="<?php echo $tdir . '/help/css-help.html';?>" target="blank">CSS HELP</a></b></h2>
        <p>A short CSS Tutorial</p>
    </div>
</div>
<div style="float:right;width:40%;padding-right:1%">

	<h2><b>RECOMMENDED PLUGINS</b></h2>
	<p><strong>Some recommended plugins for your Weaver Xtreme Theme</strong></p>

    <ul>
        <li><a href="http://wordpress.org/plugins/weaverx-theme-support/" target="_blank">Weaver Xtreme Theme Support</a>
        - provides additional Weaver Xtreme theme options and useful shortcodes</li>

        <li><a href="http://wordpress.org/plugins/show-posts/" target="_blank">Aspen Themeworks Show Posts</a>
        - adds the [show_posts] shortcode to selectively display posts. Adds additional filtering options
        to the Weaver Xtreme Page with Posts page template.</li>

        <li><a href="http://wordpress.org/plugins/show-sliders/" target="_blank">Aspen Themeworks Show Sliders</a>
        - good for any kind of slideshows - images, posts, [gallery] replacement</li>

        <li><a href="https://wordpress.org/plugins/wp-retina-2x/" target="_blank">WP Retina 2x</a>
        - Weaver Xtreme is Retina Ready - this plugin makes your Media Library Retina Ready, too.</li>
    </ul>

</div><div style="clear:both;"></div>

<?php
}

?>
