<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>



<div id="header">
	<div id="headerimg">

<div id="headtext">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
</div>
		</div>
</div>
	<div id="wrap">
	<div id="pagetop" class="menulist"><ul>
 <li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
 <?php
 //Change the $howmany variable to however many pages you want to display on the Navigation bar. Keep in mind if you go too high and have long page names, it will go over to a new line and look ugly. 8 should be fine for most users.
$howmany = 8;
$pages = wp_list_pages("orderby=name&title_li=&depth=1&echo=0");
$pages_arr = explode("\n", $pages);
for($i=0;$i<$howmany;$i++){
echo $pages_arr[$i];
}

?>
<?php //wp_list_pages('orderby=name&title_li=&depth=1&offset=2'); ?>
</ul></div>
	<div id="page">
<hr />
