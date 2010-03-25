<?php
/**
 * @package WordPress
 * @subpackage Belle
 * @url http://www.getbelle.com/
 */
?>
<?php
if ($_GET["dynamic"]!='true'): ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/colorstyles/<?php echo $wpb_color_scheme; ?>.css" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page">


<div id="content-head">
	<div id="headerimg">
		<?php if($wpb_title_disable!="true"){?><h1 class="blog-title"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1><?php } ?>
		<?php if($wpb_tagline_disable!="true"):?><div class="description"><?php bloginfo('description'); ?></div><?php endif; ?>
              <?php if($wpb_sociallink1_enable=="true"):?>
		 <div class="link1"><a href="<?php echo $wpb_link1_url; ?>"><?php echo $wpb_link1_title; ?></a><br><?php echo $wpb_link1_desc; ?></div>
              <?php endif; ?>
              <?php if($wpb_sociallink2_enable=="true"):?>
	        <div style="clear:both;"></div>
               <div class="link2"><a href="<?php echo $wpb_link2_url; ?>"><?php echo $wpb_link2_title; ?></a><br><?php echo $wpb_link2_desc; ?></div>
              <?php endif; ?>
	</div>
	<ul id="nav">
			<?php wp_list_pages('sort_column=menu_order&depth=1&title_li=');?>
	</ul>
</div>

<?php endif; ?>