<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
global $options;
foreach ($options as $value) {
    if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script src="<?php bloginfo('template_directory'); ?>/js/menuebar.js" type="text/javascript"></script> 


<?php wp_head(); ?>
</head>


<body>




<div id="header">
		
		<div class="headtools">
				<h3><?php _e('Follow me...', 'altop'); ?></h3>
				
				<?php if ($altop_twitter_logo == "true") { ?>
				    <a href="http://www.twitter.com/<?php echo $altop_twitter_name; ?>"><img src="<?php echo bloginfo('template_directory'); ?>/images/twitter.png" title="<?php echo _e('Follow me on Twitter', 'altop'); ?>" alt="Follow me on Twitter" border="0" width="50" height="50" /></a>
				<?php } ?>
				
				<?php if ($altop_feed_url != "") { ?>
					<a href="<?php echo $altop_feed_url; ?>"><img src="<?php echo bloginfo('template_directory'); ?>/images/rss.png" title="Twitter.com" alt="twitter" border="0" width="50" height="50" /></a>
				<?php } ?>
				<?php if ($altop_feed_url == "") { ?>	
					<a href="<?php echo get_bloginfo('rss2_url'); ?>"><img src="<?php echo bloginfo('template_directory'); ?>/images/rss.png" title="<?php echo _e('Subscribe to my Feed', 'altop');?>" alt="twitter" border="0" width="50" height="50" /></a>
				<?php } ?>
				</div>

                <h2><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h2>
                <p class="desc"><?php bloginfo('description'); ?></p>				

		</div>




<div id="bodywrap">

<div id="navbar">
		<ul>
			<?php if ($altop_show_home == "true") { //display the home button ?>
				<li class="home"><a href="<?php echo get_option('home'); ?>"> <?php echo $altop_home_name; ?></a></li>
			<?php } ?>	
		
			<?php if ($altop_menue_pages == "Pages") { 
				 wp_list_pages('exclude='.$altop_page_exclude.'&depth='.$altop_page_depth.'&title_li='); 
					} elseif ($altop_menue_pages == "Categories") {
						wp_list_categories('exclude='.$altop_page_exclude.'&depth='.$altop_page_depth.'&title_li=');
							} elseif ($altop_menue_pages == "") { 
								wp_list_pages('depth=0&title_li=');			
									} ?>
		</ul>
</div>