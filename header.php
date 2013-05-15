<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>


	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php wp_title(); ?></title>
			
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<!--wrapper-->
	<div id="wrapper">
	
	<!--headercontainer-->
	<div id="header_container">
	
		<!--header-->
		<div id="header2">

<?php $header_image = get_header_image();
	if ( ! empty( $header_image ) ) { ?>
		<div id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		</a></div><!--logo end-->
	<?php } else { ?>
			<div id="logo2"><a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo( 'name' ); ?></a></div><!--logo end-->
	<?php } ?>
			
			<!--menu-->
			
		<div id="menubar">
	
	<?php $navcheck = wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'menu_class' => 'nav' ,'fallback_cb' => '', 'echo' => false ) );  ?>
	
	 <?php  if ($navcheck == '') { ?>
	
	<ul class="nav">
		<li class="page_item"><a href="<?php echo esc_url(home_url()); ?>" title="Home"><?php _e( 'Home', 'agency' ); ?></a></li>				
		<?php wp_list_pages('title_li=&sort_column=menu_order'); ?>

	</ul>
<?php } else echo($navcheck); ?> 

	</div>
		
	
	<!--menu end-->
			
			<div class="clear"></div>			
			
		</div><!-- header end-->
		
<?php if(is_front_page()) { 
	get_template_part( 'element-slider', 'header' );
 } ?>

<?php if(!is_front_page()) { ?>

		<div id="subhead">
		
		<h1><?php if ( is_category() ) {
		single_cat_title();
		} elseif (is_tag() ) {
		echo (__( 'Archives for ', 'agency' )); single_tag_title();
		} elseif (is_author() ) {
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));		
		echo (__( 'Archives for ', 'agency' )); echo $curauth->nickname;		
	} elseif (is_archive() ) {
		echo (__( 'Archives for ', 'agency' )); single_month_title(' ', true);
	} elseif (is_search() ) {
		printf( __( 'Search Results for: %s', 'agency' ), '' . get_search_query() . '' );
	} else {
		the_title();
	} ?></h1>
			
			</div>
			
		<div class="clear"></div>			
	
<?php } ?>	
		
	</div><!--header container end-->	
		
