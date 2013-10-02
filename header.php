<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php if (wip_setting('wip_custom_favicon')) : ?>
	<link rel="shortcut icon" href="<?php echo wip_setting('wip_custom_favicon'); ?>"/>
<?php endif; ?>

<title>
	<?php
		wp_title( '|', true, 'right' );
		bloginfo('name');
		if ( is_home() || is_front_page() ) echo ' - ' . get_bloginfo( 'description' );
 	?>
</title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<!--[if IE 8]>
    <link href='http://fonts.googleapis.com/css?family=Gudea' rel='stylesheet' type='text/css'>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/scripts/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->

<?php do_action( 'wip_head' ); ?>

</head>

<body <?php body_class('custombody'); ?>>

<header class="header" >
    <div class="container" >
        <div class="row">
            <div class="span3" >
                <div id="logo">
                        
                	<?php 
                                        
                    	if ( wip_setting('wip_custom_logo') ):
							echo '<a href="'.home_url().'" title="'.get_bloginfo('name').'">';
                            echo "<img src='".wip_setting('wip_custom_logo')."' alt='logo'>"; 
							echo '</a>';
                        else: 
							echo '<a href="'.home_url().'" class="logo" title="'.get_bloginfo('name').'">';
                            bloginfo('name');
							echo '</a>';
                        endif; 
                            
                    ?>

                </div>
                
            </div>
            <div class="span9" >
                <nav id="mainmenu">
                    <?php wp_nav_menu( array('theme_location' => 'main-menu', 'container' => 'false','depth' => 3  )); ?>
                </nav> 
                               
            </div>
        </div>
    </div>
</header>