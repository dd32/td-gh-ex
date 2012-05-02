<?php

if(!function_exists('origin_favicon')) :
	function origin_favicon($attachment){
		if(!empty($attachment)){
			$mime = get_post_mime_type($attachment);
			$src = wp_get_attachment_image_src($attachment, 'full');
			if(empty($mime)) return;
			?>
		<link
			rel="icon"
			type="<?php print $mime ?>"
			href="<?php print $src[0] ?>" />
		<?php
		}
	}
endif;

function origin_tempnam($extension, $filename = '', $dir = ''){
	if(empty($dir)) $dir = get_temp_dir();
	if(empty($filename)) $filename = time();

	$path = $dir . wp_unique_filename($dir, $filename.(!empty($extension) ? '.'.$extension : ''));
	touch($path);
	return $path;
}