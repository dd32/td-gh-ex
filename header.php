<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo('charset'); ?>" />
<style type="text/css" media="screen">
@import url( <?php bloginfo('stylesheet_url'); ?> );
</style>

<!--[if lt IE 9]>
<script type="text/javascript">
document.createElement("header");
document.createElement("nav");
document.createElement("section");
document.createElement("aside");
document.createElement("article");
document.createElement("footer");
</script>
<![endif]-->

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

<?php wp_get_archives('type=monthly&format=link'); ?>
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
<header><h1 id="header"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
<em><?php bloginfo('description'); ?></em>
</header> 
<?php get_template_part( 'nav', '1' ); ?>
