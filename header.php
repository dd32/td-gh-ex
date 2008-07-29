<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<?php wp_head();?>
</head>
<body>
<div align="center">
<table border="0" cellspacing="0" cellpadding="0" id="topbar">
	<tbody>
		<tr>
			<td width="50%" valign="middle"><div align="left"><span class="blogtitle"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></span> <span class="blogdescription"><?php bloginfo('description'); ?></span></div></td>
			<td width="50%" valign="middle"><div align="right"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div></td>
		</tr>
	</tbody>
</table>
<div align="left" id="contentwrap">