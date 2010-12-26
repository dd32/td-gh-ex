<?php require(COMMON_FSROOT . 'global.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php require_once(COMMON_FSROOT . 'script.php'); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Begin Wrap -->
<div id="wrap">
  <div id="wrapdata">
  
    <!-- Begin Header -->
    <div id="header">
      <div id="headerdata">        
        <?php require_once(COMMON_FSROOT . 'primary-menu.php'); ?>
		<?php require_once(COMMON_FSROOT . 'logospon.php'); ?>        
        <?php require_once(COMMON_FSROOT . 'secondary-menu.php'); ?>        
      </div>
    </div>
    <!-- End Header -->