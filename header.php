<?php
/*Template for displaying the header for all the files.
*
*@package -> Wordpress
*@sub-package -> afia
*@since -> V 1.0.0
*/ 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
 <meta charset = "<?php bloginfo('charset'); ?>"/>
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<?php 
wp_head();
?>
</head>
<body <?php body_class(); ?>>

<header class="header">
<nav class = "navbar-default">
<div class = "container-fluid">
<div class = "navbar-header">
<?php  if(get_theme_mod( 'custom_logo' )):?>
	<span id = "logo" style="float:left;">
	</span>
	<?php endif;?>
<i class ="fa fa-align-justify navbar-toggle"></i>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
</div>
<?php
$defaults = array(
	'theme_location'  => 'primary',
	'echo'            => true,
);
 ?>
 <div id = "menu">
	<?php wp_nav_menu($defaults ); ?>
 </div>
</div>
</nav>
</header><!-- .header -->

<?php 
if(get_header_image() && (get_theme_mod('afia_show_header') || is_home() )){?>
<div id = "header-img">
	<div class="col-xs-12 text-center abcen1">
	<?php  if(get_theme_mod( 'custom_logo' )):?>
	<span id = "logo">
	</span>
	<?php endif;?>
			<h1 class="h1_home"><?php _e(afia_sanitize_strip_slashes(get_theme_mod('afia_header_title','Afia')),'afia');?></h1>
			<h3 class="h3_home"><?php _e(afia_sanitize_strip_slashes(get_theme_mod('afia_header_description','Clean & minimal Theme')),'afia');?></h3>
			<a class ="space" href = "<?php echo(esc_url(get_theme_mod('afia_header_url','#')));?>"><button class = "btn btn-info"><?php _e(afia_sanitize_strip_slashes(get_theme_mod('afia_text_url','Check it out')),'afia');?></button></a>
		</div>    
</div>
<script>
jQuery(document).ready(function($){
if($("#header-img").length)
{
	function x(){
	$("#header-img").height($(window).height()+"px");
	};
	$(window).resize(x());
	x();
}
});</script>
<?php }?>
<!--We create a div container for the #content -->
<div id = "content" class = "<?php 
$layout = afia_sanitize_layout(get_theme_mod('afia_sidebar_position','side-right'));
if($layout == 'full-width')
echo "container-fluid";
else
echo "container";
?>">
<div class = "row">
<!--#leftContent-->
<div id = "leftContent" class="dotot col-md-9">
<div class = "breadcrumbs">
<!--Top-bar class -->
<?php afia_top_bar();?>
</div>
