<?php
/**
 * @package WordPress
 * @subpackage Beardsley
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<style type="text/css" media="screen">
<?php wp_head(); ?>



</style>

</head>

<body>

<div class="wrapper">
<div class="header">
<div style="width: 80em; margin: auto; text-align: center;">
<span class="headtitle"><a href="<?php bloginfo('siteurl'); ?>"><?php bloginfo('title'); ?></a></span>
<h4><?php bloginfo('description'); ?></h4>
</div>
</div>
<div class="pagetop"></div>