<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class('bg'); ?>>

	<header id="navigation" >
		<ul id="iconstopleft" class="headerelements">
			<li class="icon-menu"><a href="#menu" class="menu-trigger">menu</a></li>	
		</ul>
		
		<div id="logo" class="headerelements <?php $logo = rwp('logo'); if (!empty($logo)) { ?>imagelogo<?php } ?>">
				<?php if (!empty($logo)) { ?>
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) );?> - <?php bloginfo( 'description' ); ?>"><img src="<?php echo esc_url(rwp('logo')); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - <?php bloginfo( 'description' ); ?>"/></a>
				<?php } else { ?> 
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) );?> - <?php bloginfo( 'description' ); ?>">
				 <h1 id="sitetitle" class="headerelements"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) );?></h1> 
				</a>
				<?php } ?>	
				
			</div><!-- #logo -->
			
			</header><!-- #navigation -->
			
	<nav id="sidr" >
	
		<form method="get" id="searchform-header" class="search-form searchformnav" action="<?php echo home_url(); ?>" ><input type="text" class="search-field searchfieldnav"  name="s" id="s"  value="<?php _e( 'Search', 'minimum-minimal' ); ?>" onfocus="this.value=(this.value=='<?php _e( 'Search', 'minimum-minimal' ); ?>') ? '' : this.value;" onblur="this.value=(this.value=='') ? '<?php _e( 'Search', 'minimum-minimal' ); ?>' : this.value;"/></form> 
<div style="clear:both;"></div>
		
		
		<?php if ( has_nav_menu( 'iconmenu' ) ) { wp_nav_menu( array( 'container' => false, 'menu_id' => 'iconmenu',   'theme_location' => 'iconmenu', 'depth' => -1 ) );  } ?>
					<div style="clear:both;"></div>
		       
		<?php if ( has_nav_menu( 'flyoutmenu' ) ) { wp_nav_menu( array( 'container' => false, 'menu_id' => 'flyoutmenu', 'menu_class' => 'primary-menu', 'theme_location' => 'flyoutmenu', 'depth' => 2 ) ); } ?>
	<div style="clear:both;"></div>

</nav>		
