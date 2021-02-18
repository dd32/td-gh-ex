<?php 

/*
	Header
	
	Creates the iFeature header. 
	
	Copyright (C) 2011 CyberChimps
*/

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>

<head profile="http://gmpg.org/xfn/11">
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<!-- Inserts META Home Description -->
	<?php  $homedescription = get_option('if_home_description') ? : ''; ?>
		<meta name="description" content="<?php echo $homedescription ?>" />
	<!-- Inserts META Keywords -->	
	<?php  $homekeywords = get_option('if_home_keywords') ? : ''; ?>
		<meta name="keywords" content="<?php echo $homekeywords ?>" />
	<meta name="distribution" content="global" />
	<meta name="language" content="en" />
<!-- Page title -->
	<title>
			<?php  $hometitle = get_option('if_home_title') ? : 'none'; ?>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title('');  }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_front_page() AND $hometitle == 'none') {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      elseif (is_front_page() AND $hometitle != 'none') {
		         bloginfo('name'); echo ' - '; echo $hometitle ; }
		      else {
		         echo ' - '; bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>	
	
	<link rel="shortcut icon" href="<?php echo stripslashes(get_option('if_favicon')); ?>" type="image/x-icon" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php  $font = get_option('if_font') ? : 'Cantarell'; ?>
	
	<link href='http://fonts.googleapis.com/css?family=<?php echo $font ?>' rel='stylesheet' type='text/css'>

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    
	<?php wp_head(); ?>
	
	<script type="text/javascript">
    $(document).ready(function(){
        jQuery('ul.sf-menu').superfish();
    });
	</script>
	
</head>

<body STYLE="font-family:'<?php echo $font ?>'"; <?php body_class(); ?> >
	
	<div id="page-wrap">
		
		<div id="main">

			<div id="header">
				<div id="headerwrap">
					<div id="header_right">
						<!-- Inserts Header Contact Area -->
						<?php  $headercontact = get_option('if_header_contact') ? : 'Add contact information here'; ?>
							<?php if ($headercontact != 'hide' ):?>
								<div id="header_contact"><?php echo stripslashes ($headercontact); ?></div> 
							<?php endif;?>
							<?php if ($headercontact == 'hide' ):?>
								<div style ="height: 10%;">&nbsp;</div> 
							<?php endif;?>
						<br />
							<div id="social">
								<?php include (TEMPLATEPATH . '/sections/icons.php' ); ?>
							</div><!-- end social -->
					</div><!-- end header_right -->
					<!-- Inserts Site Logo -->
					<?php  $logo = get_option('if_logo') ? : 'default'; ?>
						<?php if ($logo != 'hide'  and $logo != 'default'):?>
							<div id="logo">
								<a href="<?php echo home_url(); ?>/"><img src="<?php echo stripslashes(get_option('if_logo')); ?>" alt="logo"></a>
							</div>
						<?php endif;?>
						<?php if ($logo == 'default' ):?>
							<div id="logo">
								<a href="<?php echo home_url(); ?>/"><img src="<?php bloginfo('template_url'); ?>/images/ifeaturelogo.png" alt="iFeature" /></a>
							</div>
						<?php endif;?>
						<?php if ($logo == 'hide' ):?>
							<div id="logo">
								<a href="<?php echo home_url(); ?>/"><h1 class="sitename"><?php bloginfo('name'); ?> </h1></a>
							</div>
						<?php endif;?>
					<div id="description">
						<h1 class="description"><?php bloginfo('description'); ?></h1>
					</div>
				</div><!-- end headerwrap -->
				
				<div style ="height: 40px; background: url(<?php bloginfo('template_url'); ?>/images/Grey.png) no-repeat left bottom">
				<?php include (TEMPLATEPATH . '/sections/nav.php' ); ?></div>
				
			</div><!-- end header -->
