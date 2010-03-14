<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="author" content="Gordon French">
<meta name="copyright" content="2009 FrenchSquared">


<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

<!-- Wordpress Theme by Gordon French -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css"  />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php
$browserInfo = ($_SERVER['HTTP_USER_AGENT']);
if (preg_match('/MSIE/', $browserInfo)) {
	if (!preg_match('/MSIE 8.0/', 	$browserInfo)) 	{
    	echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/ie.css" type="text/css"  />';
	}
}
?>

<!-- Java for search form -->
<script language="JavaScript" type="text/javascript">
<!--
	function clearText(thefield){
	if (thefield.defaultValue==thefield.value)
	thefield.value = ""
	}
//-->
</script>

<?php wp_head(); ?>
</head>

<body>


<div id="container"><!-- header.php -->

  <div id="header">

    <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
    <div id="description"><?php bloginfo('description'); ?></div>
    <div id="logo"></div>
    <div id="search">
    	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
    	<input type="text" name="s" size="26" class="searchInput glow" id="s" 
                    onblur="this.value=(this.value=='') ? 'search' : this.value;" 
                    onfocus="clearText(this);" value="search" />
        <input type="submit" id="searchsubmit" value="Search" />
        </form>
    </div>
    
    
 
    <div id="topAds">
        <!-- place you adsense code below here --> 
        <?php
		$options = get_option("adStyleOptions"); 
		 if (!is_array( $options )){
			$options = array( 'ads' => 'sample ads go here' ); 
		 }     
		 echo stripslashes($options['ads']);
		?>
        <!-- place you adsense code above here -->  
    </div>
    
    
    
  </div><!-- end #header -->
  
  <div class="nav">
  	 <ul><li class="homeLink">
        <a href="<?php bloginfo('home'); ?>" title="Add Coupon">Home</a>
    </li></ul>
  	<?php wp_list_pages('title_li=' . __(' ') . ''); ?>
   
        
  
  </div>
<br clear="all"/>
  

