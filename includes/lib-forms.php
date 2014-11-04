<?php
// custom forms

function weaverx_custom_css( $value='' ) {

    $css = weaverx_getopt('add_css');

    if (isset($value['id']))
        $icon = $value['id'];
    if ( !isset($icon) || !$icon )
        $icon = ' ';

    $dash = '';
	if ( $icon[0] == '-' ) {                      // add a leading icon
        $dash = '<span style="padding:.2em;" class="dashicons dashicons-' . substr( $icon, 1) . '"></span>';
    }
?>
<tr class="atw-row-header"><td colspan="3">
	<span style="color:black;padding:.2em;" class="dashicons dashicons-screenoptions"></span>
    <span style="font-weight:bold; font-size: larger;"><em>
        Custom CSS Rules <?php weaverx_help_link('help.html#CustomCSS', 'Custom CSS Rules');?></em></span>
</td></tr>
<tr><td colspan="3">

	<!-- ======== -->
<p>
	Rules you add here will be the <em>last</em> CSS Rules included by Weaver Xtreme, and thus override all other Weaver Xtreme generated CSS rules.
    Specify complete CSS rules, but don't add the &lt;style&gt; HTML element. You can prefix your selectors with <code>.is-desktop, .is-mobile, .is-smalltablet, or .is-phone</code>
    to create rules for specific devices.
    <strong>NOTE:</strong> Because Weaver Xtreme uses classes on many of its elements, you may to need to use
    <em>!important</em> with your rules to force the style override.
	It is possible that other plugins might generate CSS that comes after these rules.
	</p>
<textarea name="<?php weaverx_sapi_main_name('add_css'); ?>" rows=12 style="width: 95%"><?php weaverx_esc_textarea($css); ?></textarea>
</td></tr>
<?php
}
?>
