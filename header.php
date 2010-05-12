<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script src="<?php bloginfo('template_directory'); ?>/js/menuebar.js" type="text/javascript"></script> 

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>


<body>

<?php
global $options;
foreach ($options as $value) {
    if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
}
?>


<div id="header">
		
		<div class="headtools">
				<h3><?php _e('Follow me...', 'altop'); ?></h3>

				<?php if ($altop_facebook != "") { ?>
				    <a href="http://www.facebook.com/people/@/<?php echo $altop_facebook; ?>"><img src="<?php echo bloginfo('template_directory'); ?>/images/facebook.png" title="<?php echo _e('Follow me on Facebook', 'altop'); ?>" alt="Follow me on Facebook" border="0" width="50" height="50" /></a>
				<?php } ?>
				
				<?php if ($altop_twitter != "") { ?>
				    <a href="http://www.twitter.com/<?php echo $altop_twitter; ?>"><img src="<?php echo bloginfo('template_directory'); ?>/images/twitter.png" title="<?php echo _e('Follow me on Twitter', 'altop'); ?>" alt="Follow me on Twitter" border="0" width="50" height="50" /></a>
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
<?php
/**
 * Start CSS Dropdown-Menü support. Sadly, there is no depth option available!
 **/
?>
    <?php if (class_exists('CSSDropDownMenu')) : ?>
      <?php
        $myMenu = new CSSDropDownMenu(); 
        $myMenu->home = ($altop_home_link != '') ? $altop_home_link : ''; //display the Home Link
        
        if ($altop_menue_pages == 'Pages' or $altop_menue_pages == '') {
          $myMenu->exclude_pid = $altop_page_exclude;
        } elseif ($altop_menue_pages == 'Categories') {
          $myMenu->show_cats = '1';
          $myMenu->show_pages = '0';
          $myMenu->exclude_cid = $altop_page_exclude;
        }
        $myMenu->show(); 
      ?>
      <?php else : ?>
<?php
/**
 * End CSS Dropdown-Menü support.
 **/
?>
		<ul>
			<?php if ($altop_home_link != "") { //display the Home Link ?>
				<li class="home"><a href="<?php echo get_option('home'); ?>"> <?php echo $altop_home_link; ?></a></li>
			<?php } ?>	
		
			<?php if ($altop_menue_pages == "Pages") { 
				 wp_list_pages('exclude='.$altop_page_exclude.'&depth='.$altop_page_depth.'&title_li='); 
					} elseif ($altop_menue_pages == "Categories") {
						wp_list_categories('exclude='.$altop_page_exclude.'&depth='.$altop_page_depth.'&title_li=');
							} elseif ($altop_menue_pages == "") { 
								wp_list_pages('depth=0&title_li=');			
									} ?>
		</ul>
      <?php endif; ?>
</div>