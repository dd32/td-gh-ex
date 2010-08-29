<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title>
			<?php
			bloginfo('name');
			if( is_single() ) {
				_e('&raquo; Blog Archive', 'rcg-forest');
			}
			wp_title();
			?>
		</title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	</head>
	<body> 
		<div id="top">
			<div id="topcenter">
				<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
				<?php if (get_option('blogdescription')!='') { ?>
					<h1>|</h1><h2><?php bloginfo('description'); ?></h2>
				<?php } ?>
				<div id="search">
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
				</div>
			</div>
		</div>
		<div id="page" <?php if(!is_single()) {?> class="imagebg"<?php }?>>
			<div id="header">
			</div>
