<?php
/**
 * @package Babylog
 */
 
$options = get_option('babylog_theme_options');

$bbl_customcss = $options['sometextarea'];
$bbl_color = $options['radioinput'];
$bbl_skin = $options['radioinput2'];
$bbl_hair = $options['radioinput3'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link href='http://fonts.googleapis.com/css?family=Vidaloka' rel='stylesheet' type='text/css' />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

<?php if ( $bbl_customcss ) { 
	echo "<style type='text/css'>";
	echo $bbl_customcss; 
	echo "</style>"; 
}

if ( $bbl_color ) { 
	$color = $options['radioinput'];
} else {
	$color = "purple";
}

if ( $bbl_skin ) { 
	$skin = $options['radioinput2'];
} else {
	$skin = "light";
}

if ( $bbl_hair ) { 
	$hair = $options['radioinput3'];
} else {
	$hair = "brown";
}
?>
<style type="text/css">
.baby-graphic {
	background-image:url('<?php echo get_template_directory_uri() ?>/images/<?php echo $color . "-" . $skin . "-" . $hair ?>.png');
}
</style>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="wrapper">
	<div class="header">
    	<div class="title"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></div>
	  	<div class="baby-graphic">&nbsp;</div>
	  	<div class="tagline"><?php bloginfo('description'); ?></div>
	  	<div class="tabmenu">
	      	<?php 
	      		$menu = has_nav_menu('tabmenu');
	      		if ( $menu ) { 
	      			wp_nav_menu( array( 'theme_location' => 'tabmenu', 'depth' => '1' ) ); 
	      		} ?>
	  	</div>
	</div>