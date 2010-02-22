<?php
require_once( dirname(__FILE__) . '../../../../wp-config.php');
header("Content-type: text/css"); 
  	$logo = get_option('aggiornare_logo');
	$width = get_option('aggiornare_logo_width');
	$height = get_option('aggiornare_logo_height');
	$headlineColor = get_option('aggiornare_headline_color');
	if($headlineColor=='') {
		$headlineColor = "414141";
	}

?>
.introBanner h2 { color: #<?php echo $headlineColor; ?>; }
<?php if($logo) { ?>
#siteIdentification h1 a { display: block; text-indent: -9999px; background: url('<?php echo $logo; ?>') top left no-repeat; width: <?php echo $width; ?>px; height: <?php echo $height; ?>px; }
#siteIdentification h1 a:hover { background: url('<?php echo $logo; ?>') bottom left no-repeat; }
<?php } else { ?>
#siteIdentification h1 a { font-size: 48px; color: #414141; text-decoration: none; font-variant: small-caps; }
#siteIdentification h1 a:hover { color: #992622; }
<?php } 
if(!dynamic_sidebar('Footer - Right Column')) { ?>
#explanation { width: 600px; float: right; }
<?php } ?>