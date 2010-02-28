<?php
require_once( dirname(__FILE__) . '../../../../wp-config.php');
header("Content-type: text/css"); 
  	$logo = get_option('aggiornare_logo');
	$headlineColor = get_option('aggiornare_headline_color');
	$border = get_option('aggiornare_image_border');
	$bannerImage = get_option('aggiornare_homepage_image');
	
?>
.introBanner h2 { color: #<?php 
if(!$headlineColor) {
		$headlineColor = "414141";
	} else {
		echo $headlineColor;
	}
 ?>; }
<?php if($border=="on") { ?> .content p img { border: 0; } .content .wp-caption img { border: 0; } <?php } ?>
<?php if($logo) { ?>
#siteIdentification h1 a { display: block; text-indent: -9999px; background: url('images/logo.jpg') top left no-repeat; width: 278px; height: 160px; }
#siteIdentification h1 a:hover { background: url('images/logo.jpg') bottom left no-repeat; }
<?php } else { ?>
#siteIdentification h1 a { font-size: 48px; color: #414141; text-decoration: none; font-variant: small-caps; }
#siteIdentification h1 a:hover { color: #992622; }
<?php } 
if($bannerImage) { ?>
.bannerImage { margin: 5px 0 0 27px; overflow: hidden;  width: 599px; height: 225px; background: url('images/banner.jpg') 50% 50% no-repeat; }
<?php }
if(!dynamic_sidebar('Footer - Right Column')) { ?>
#explanation { width: 600px; float: right; }
<?php } ?>