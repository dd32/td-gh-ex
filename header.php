<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php if (wip_setting('wip_custom_favicon')) : ?> <link rel="shortcut icon" href="<?php echo wip_setting('wip_custom_favicon'); ?>"/> <?php endif; ?>

<title>
	<?php
		if (!get_post_meta( $post->ID , 'wip_seo_title', TRUE)):
			wp_title( '|', true, 'right' );
			echo get_bloginfo('name')." - ";
			echo get_bloginfo('description');
		else:
			echo get_post_meta( $post->ID , 'wip_seo_title', TRUE);
		endif;
 	?>
</title>

<?php
	
	if (get_post_meta( $post->ID , 'wip_seo_description', TRUE)):
		echo '<meta name="description" content="' . get_post_meta( $post->ID , 'wip_seo_description', TRUE) . '"/>';
		endif;

	if (get_post_meta( $post->ID , 'wip_seo_keywords', TRUE)):
		echo '<meta name="keywords" content="' . get_post_meta( $post->ID , 'wip_seo_keywords', TRUE) . '"/>';
	endif;
		
?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />
<link href='http://fonts.googleapis.com/css?family=Maven+Pro|Abel|Oxygen|Allura|Handlee' rel='stylesheet' type='text/css'>

<!--[if IE 8]>
    <link href='http://fonts.googleapis.com/css?family=Gudea' rel='stylesheet' type='text/css'>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php 
	
	wp_enqueue_style( "bootstrap", get_template_directory_uri()."/css/bootstrap.min.css");
	wp_enqueue_style( "bootstrap-responsive", get_template_directory_uri()."/css/bootstrap-responsive.min.css");
	wp_enqueue_style( "font-awesome.min", get_template_directory_uri()."/css/font-awesome.min.css");
	wp_enqueue_style( "prettyPhoto", get_template_directory_uri()."/css/prettyPhoto.css");
	wp_enqueue_script( 'jquery.tipsy', get_template_directory_uri().'/js/jquery.tipsy.js',array('jquery'),"1.0.0",TRUE  ); 
    wp_enqueue_script( 'jquery.mobilemenu', get_template_directory_uri().'/js/jquery.mobilemenu.js',array('jquery'),"1.0.0",TRUE );
	wp_enqueue_script( 'jquery.prettyPhoto', get_template_directory_uri().'/js/jquery.prettyPhoto.js',array('jquery'),"1.0.0",TRUE ); 
	wp_enqueue_script( 'jquery.custom', get_template_directory_uri().'/js/jquery.custom.js',array('jquery') ,"1.0.0",TRUE); 
	wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script('jquery'); 
    wp_head(); 
	
?>

</head>
<body <?php body_class(); ?>>

<header class="header container" >

	<div class="row">
    	<div class="span12" >
        	<div id="logo">
                    
            	<a href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?>">
                        
                	<?php 
					
                    	if ( wip_setting('wip_custom_logo')) :
                        	echo "<img src='".wip_setting('wip_custom_logo')."' alt='logo'>"; 
                        else: 
                            bloginfo('name');
							echo "<span>".get_bloginfo('description')."</span>";
                        endif; 
						
					?>
                            
                </a>
                        
			</div>

            <nav id="mainmenu">
            	<?php wp_nav_menu( array('menu' => 'main-menu', 'container' => 'false','depth' => 3  )); ?>
            </nav>                
        </div>
	</div>

</header>