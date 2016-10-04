<?php
/**
 * Changelog
 */

$avis_lite = wp_get_theme( 'avis-lite' );

?>
<div class="avis-lite-tab-pane" id="changelog">

	<div class="avis-tab-pane-center">
	
		<h1>Avis Lite <?php if( !empty($avis_lite['Version']) ): ?> <sup id="avis-lite-theme-version"><?php echo esc_attr( $avis_lite['Version'] ); ?> </sup><?php endif; ?></h1>

	</div>

	<?php
	WP_Filesystem();
	global $wp_filesystem;
	$avis_lite_changelog = $wp_filesystem->get_contents( get_template_directory().'/changelog.txt' );
	$avis_lite_changelog_lines = explode(PHP_EOL, $avis_lite_changelog);
	foreach($avis_lite_changelog_lines as $avis_lite_changelog_line){
		if(substr( $avis_lite_changelog_line, 0, 3 ) === "###"){
			echo '<hr /><h1>'.substr($avis_lite_changelog_line,3).'</h1>';
		} else {
			echo $avis_lite_changelog_line,'<br/>';
		}
	}

	?>
	
</div>