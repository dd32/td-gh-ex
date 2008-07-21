<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<?php wp_head();?>
	<script type="text/javascript">
	// <![CDATA[
	var rotator1 = {
		path:   '<?php bloginfo('url'); ?>/wp-content/themes/3col-rdmbanv1/banners/',
		images: ["3col-523-1.jpg", "3col-523-2.jpg", "3col-523-3.jpg", "3col-523-4.jpg", "3col-523-5.jpg", "3col-523-6.jpg", "3col-523-7.jpg", "3col-523-8.jpg", "3col-523-9.jpg", "3col-523-10.jpg"]
		}
	function getRandomImage(rObj) {
	var imgAr = rObj.images;  if (!imgAr ) return;
	var num = Math.floor( Math.random() * imgAr.length );
	var imgStr = '';   var imgFile = imgAr[ num ];
	
	var path = rObj.path || ''; var id = rObj.name || '';
	var title, alt, url;
	// If there are *any* entries for actions, alt or title include them here 
	if (rObj.alt) {
		alt = rObj.alt[num]? rObj.alt[num]: rObj.alt[0]? rObj.alt[0]: '';
	}
	if (rObj.title) {
		title = rObj.title[num]? rObj.title[num]: rObj.title[0]? rObj.title[0]: '';
	}
	if (rObj.actions) {
		url = rObj.actions[num]? rObj.actions[num]: rObj.actions[0]? rObj.actions[0]: null;
	}
	if (url) {
		imgStr += '<a href="';
		imgStr += typeof url == 'string'? url: 'javascript: void ' + url;
		imgStr += '">';
	}
    
	imgStr += '<img src="' + path + imgFile + '"';
	imgStr += id? ' id="' + id + '" name="' + id + '"': '';
	if (title) {
		imgStr += ' title="' + title + '"';
	}
	imgStr += ' alt="' + alt + '" border="0" />';
	if (url) {
		imgStr += '</a>';
	}
	document.write(imgStr); document.close();
	}
	// ]]>
	</script>
</head>
<body>
<div align="center">
<table border="0" cellspacing="0" cellpadding="0" id="topbar">
	<tbody>
		<tr>
			<td width="50%" valign="middle"><div align="left"><?php wp_register('','&nbsp;/'); ?> <?php wp_loginout(); ?></div></td>
			<td width="50%" valign="middle"><div align="right"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div></td>
		</tr>
	</tbody>
</table>
<table border="0" cellspacing="0" cellpadding="0" id="banner">
	<tbody>
		<tr>
			<td valign="middle"><div align="center"><script type="text/javascript">getRandomImage(rotator1)</script></div></td>
		</tr>
	</tbody>
</table>
<div align="left" id="contentwrap">