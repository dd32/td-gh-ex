<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url');?>/style.css" />
<?php include (TEMPLATEPATH . '/walls-style.php'); ?>
<title><?php if (is_home () ) { bloginfo('name'); echo ' - ' ; bloginfo('description');}
			elseif ( is_category() ) { single_cat_title(); echo ' - ' ; bloginfo('name');}
			elseif (is_single() ) { single_post_title(); echo ' - ' ; bloginfo('name');}
			elseif (is_page() ) { single_post_title(); echo ' - ' ; bloginfo('name');}
			else { wp_title('',true); } ?>
</title>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>		
</head>
<body>	
<div id="header">
<div class="con">
<?php include (TEMPLATEPATH.'/heads/'.$bxx_joes_head);?>
</div>
</div>
</div>

<?php if ($bxx_menu_switch == "yes") {?>
<?php include (TEMPLATEPATH.'/bricks/menus/'.$bxx_ks_choice);?>		<?php }?>


<div id="showhide"><?php include (TEMPLATEPATH . '/searchform-top.php'); ?></div><div id="container">