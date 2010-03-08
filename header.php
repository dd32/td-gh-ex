<?php
/**
 * @package WordPress
 * @subpackage Belle
 * @url http://www.getbelle.com/
 */
?>
<?php
if (!is_search()): ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type='text/javascript' src='<?php bloginfo('url'); ?>/wp-includes/js/jquery/jquery.js'></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/functions.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/livesearch.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/Comfortaa_400.font.js" type="text/javascript"></script>
<script type="text/javascript">
/* <![CDATA[ */
			Cufon.replace('h2');
			Cufon.replace('h3');
/* ]]> */
</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page">


<div id="content-head">
	<div id="headerimg">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
	</div>
	<ul id="nav">
			<?php wp_list_pages('sort_column=menu_order&depth=1&title_li=');?>
	</ul>
</div>

<?php endif; ?>