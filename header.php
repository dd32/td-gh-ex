<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset');?>">
<meta name="viewport" content="width=device-width" />

<?php if ( ! function_exists( '_wp_render_title_tag' ) ) {?>
<title><?php wp_title('|',true,'right');?></title>
<?php }?>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
<?php if(fmi_theme_option('vs-favicon')):echo '<link rel="icon" href="'.esc_url(fmi_theme_option('vs-favicon')).'">';endif;?>

<?php wp_head();?>
</head>

<body <?php body_class(); ?>>
<div id="container">

<div id="header"><div class="inner">
	<div id="caption">
    	<div id="title"><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a></div>
        <?php if ( fmi_theme_option( 'vs-header-search' )):?>
        <div id="divsearch">
            <?php get_search_form(); ?>
        </div>
        <?php endif;?>
        
        <div class="clear"></div>
	</div>
</div></div>

<div id="navigation"><div class="inner">
	<div id="nav" <?php if((is_home())or(is_single())or(is_search())){echo 'class="mr"';}?>>
		<div class="menu-toggle"><a href="javascript:void(0)"><?php echo __( 'Menu', 'fmi' ); ?></a></div>
        
		<?php wp_nav_menu(array('theme_location'=>'menu'));?>
    </div>
</div></div>