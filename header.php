<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php /* Arclite/digitalnature */
  $options = get_option('arclite_options');
  if (is_home()) {
  	$metakeywords = $options['metakeywords'];
  } else if (is_single()) {
  	$metakeywords = "";
  	$tags = wp_get_post_tags($post->ID);
  	foreach ($tags as $tag ) {
  	  $metakeywords = $metakeywords . $tag->name . ", ";
  	}
  }    
?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if($options['metakeywords']) { ?>
<meta name="keywords" content="<?php echo $metakeywords; ?>" />
<meta name="description" content="<?php bloginfo('description'); ?>" />
<?php } ?>

<title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if($options['imageless']) { ?>
<style type="text/css" media="all">@import "<?php bloginfo('template_url'); ?>/style-imageless.css";</style>
<?php } else { ?>
<style type="text/css" media="all">@import "<?php bloginfo('stylesheet_url'); ?>";</style>
<?php } ?>
<!--[if lte IE 6]>
<style type="text/css" media="screen">
  @import "<?php bloginfo('template_url'); ?>/ie6.css";
</style>
<![endif]-->

<?php if(!$options['imageless']) { ?>
<?php if($options['header']<>'') { ?>
<style type="text/css" media="all">@import "<?php bloginfo('template_url'); ?>/options/header-<?php print $options['header']; ?>.css";</style>
<?php } else { ?>
<style type="text/css" media="all">@import "<?php bloginfo('template_url'); ?>/options/header-default.css";</style>
<?php } } ?>

<?php // custom css?
  $usercss = $options['customcss'];
  if($usercss<>'') { ?>
<style type="text/css" media="screen">
  <?php echo $usercss; ?>
</style>
<?php } ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php if(!$options['nojquery']) { ?>
 <?php wp_enqueue_script('jquery'); ?>
 <?php wp_enqueue_script('arclite',get_bloginfo('template_url').'/js/arclite.js'); ?>
<?php } ?>

<?php wp_head(); ?>

<?php if(!$options['nojquery']) { ?>
<script type="text/javascript">
/* <![CDATA[ */
 jQuery(document).ready(function(){
  jQuery(".comment .avatar").pngfix();


  // rss popup link
  jQuery("ul.menu li.cat-item").hover(function() {
		jQuery(this).find("a.rss").animate({opacity: "show", top: "4", right: "6"}, "333");
	}, function() {
		jQuery(this).find("a.rss").animate({opacity: "hide", top: "-15", right: "6"}, "333");
	});

  // reply/quote links
  jQuery(".comment-head").hover(function() {
		jQuery(this).find("p.controls").animate({opacity: "show", top: "4", right: "6"}, "333");
	}, function() {
		jQuery(this).find("p.controls").animate({opacity: "hide", top: "-15", right: "6"}, "333");
	});

  // fade span
  jQuery('.fadeThis').append('<span class="hover"></span>').each(function () {
    var jQueryspan = jQuery('> span.hover', this).css('opacity', 0);
	  jQuery(this).hover(function () {
	    jQueryspan.stop().fadeTo(333, 1);
	  }, function () {
	    jQueryspan.stop().fadeTo(333, 0);
	  });
	});

  jQuery('#sidebar ul.menu li li a').mouseover(function () {
   	jQuery(this).animate({ marginLeft: "5px" }, 100 );
  });
  jQuery('#sidebar ul.menu li li a').mouseout(function () {
    jQuery(this).animate({ marginLeft: "0px" }, 100 );
  });

  tabmenudropdowns();

 });

 /* ]]> */
</script>
<?php } ?>

</head>
<body <?php if (is_home()) { ?>class="home"<?php } else { ?>class="<?php echo $post->post_name; ?>"<?php } ?>>
 <!-- page wrappers (100% width) -->
 <div id="page">

  <div id="header-wrap">
   <div id="header" class="block-content">
     <div id="pagetitle">
      <h1 class="logo"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>


      <h4><?php bloginfo('description'); ?></h4>
      <div class="clear"></div>


      <?php if(!$options['hidesearch']) { ?>
      <?php // get_search_form(); ?>
      <!-- search form -->
      <div class="search-block">
        <div class="searchform-wrap">
          <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
            <input type="text" name="s" id="searchbox" class="searchfield" value="<?php _e("Search","arclite"); ?>" onfocus="if(this.value == '<?php _e("Search","arclite"); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e("Search","arclite"); ?>';}" />
             <input type="submit" value="Go" class="go" />
          </form>
        </div>
      </div>
      <!-- /search form -->
      <?php } ?>

     </div>
     <!-- main navigation -->
     <div id="nav-wrap1">
      <div id="nav-wrap2">
        <ul id="nav">
         <?php
          if((!$options['hidehometab']) && (!$options['categorytabs'])) {
            if(is_home() && !is_paged()){ ?>
           <li class="current_page_item"><a href="<?php echo get_settings('home'); ?>" title="<?php _e('You are Home','arclite'); ?>"><span><span><?php _e('Home','arclite'); ?></span></span></a></li>
         <?php } else { ?>
          <li><a href="<?php echo get_option('home'); ?>" title="<?php _e('Click for Home','arclite'); ?>"><span><span><?php _e('Home','arclite'); ?></span></span></a></li>
         <?php
           }
          }
          ?>
         <?php
           if($options['categorytabs']) {
            echo preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i', '<li$1><a class="fadeThis"$2><span>$3</span></a>', wp_list_categories('show_count=0&echo=0&title_li='));
            }
           else {
             echo preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i', '<li$1><a class="fadeThis"$2><span>$3</span></a>', wp_list_pages('echo=0&orderby=name&title_li=&'));
           }
          ?>
        </ul>
      </div>
     </div>
     <!-- /main navigation -->

   </div>

