<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>



<head profile="http://gmpg.org/xfn/11">



<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />



<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>



<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />



<link rel="ico" type="image/ico" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />



<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/slidemenu/slidemenu.css" />


<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />



<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />



<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />



<style type="text/css" media="screen">



<?php



// Checks to see whether it needs a sidebar or not



if ( !empty($withcomments) && !is_single() ) {



?>



	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/wide.png") repeat-y top; border: none; }



<?php } else { // No sidebar ?>



	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/wide.png") repeat-y top; border: none; }



<?php } ?>



</style>



<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>



<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/slidemenu/slidemenu.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.2.3.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.lavalamp.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/smoothscroll.js"></script>
	<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
        $(function() {
            $("#lmenu").lavaLamp({
                fx: "backout", 
                click: function(event, menuItem) {
                    return true;
                }
            });
        });
    </script>
<script type="text/javascript">
	  // When the document loads do everything inside here ...
	  $(document).ready(function(){	
		// When a link is clicked
		$("a.tab").click(function () {
			// switch all tabs off
			$(".active").removeClass("active");	
			// switch this tab on
			$(this).addClass("active");
			// slide all content up
			$(".contentlist").slideUp();
			// slide this content up
			var content_show = $(this).attr("title");
			$("#"+content_show).slideDown();
		});
	  });
</script>	


</head>



<body>



<div id="page">








<div id="header">

		 <div class="intro"><h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1> <div class="description"><?php bloginfo('description'); ?></div></div>


  <div id="ad-box"><?php if (file_exists(TEMPLATEPATH . '/' . 'topbar.php')) : ?><?php include (TEMPLATEPATH . '/topbar.php'); ?><?php endif; ?></div></div>







<div id="headerimg">

<div id="menu">
		<ul class="lavalamp" id="lmenu">
				
	   	 		<?php wp_list_pages('title_li=&depth=1&sort_column=menu_order');?>
		</ul>
		<div class="clear"></div>
</div>





</div>



<?php include("suckerfish.php"); ?>  

<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
