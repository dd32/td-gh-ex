<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/sIFR-screen.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/sIFR-print.css" type="text/css" media="print" />

<style type="text/css" media="screen">
.sIFR-active .logo h1{
	visibility: hidden;
	font-size: 26px;
	line-height: 1em;
}

.sIFR-active .logo h2 {
	color: #c3c5c5;
	visibility: hidden;
	font-size: 18px;
	line-height: 1em;
}

.sIFR-active .date {
	color: #c3c5c5;
	visibility: hidden;
	font-size: 23px;
	line-height: 1em;
}

.sIFR-active .title h2{
	visibility: hidden;
	font-size: 26px;
	line-height: 1em;
}

.sIFR-active .sidebar h2{
	visibility: hidden;
	font-size: 30px;
	line-height: 1em;
}
</style>

  <script src="<?php bloginfo('template_url'); ?>/js/sifr.js" type="text/javascript"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/sifr-debug.js" type="text/javascript"></script>
  <script type="text/javascript">
  //<[CDATA[
  sIFR.forceClear = true;
  var fagocotf = { src: '<?php bloginfo('template_url'); ?>/fagocotf.swf' };

  sIFR.useStyleCheck = true;

  sIFR.activate(fagocotf);

  sIFR.replace(fagocotf, {
    selector: '.logo h1'
    ,css: [
      '.sIFR-root { text-align: left; font-weight: bold; }'
      ,'a { text-decoration: none; }'
      ,'a:link { color: #000000; }'
      ,'a:hover { color: #015F6B; }'
    ]
  });

  sIFR.replace(fagocotf, {
    selector: '.logo h2'
    ,css: [ '.sIFR-root { text-align: left; font-weight: bold; color: #c3c5c5; }' ]
  });

  sIFR.replace(fagocotf, {
    selector: '.date'
    ,css: [ '.sIFR-root { text-align: center; font-weight: bold; color: #c32127; line-height: 1px; letter-spacing: -1; line-height: -2; }' ]
  });

  sIFR.replace(fagocotf, {
    selector: '.title h2'
    ,css: [
      '.sIFR-root { text-align: left; font-weight: bold; }'
      ,'a { text-decoration: none; }'
      ,'a:link { color: #000000; }'
      ,'a:hover { color: #015F6B; }'
    ]
  });

  sIFR.replace(fagocotf, {
    selector: '.sidebar h2'
    ,css: [ '.sIFR-root { text-align: left; font-weight: bold; color: #005f6b; line-height: 1px; letter-spacing: -1; line-height: -2; }' ]
  });


  //]]>
  </script>

<?php wp_head(); ?>
</head>
<body>
<div class="all">
	<div class="header">
    	<div class="logo">
        	<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
            <h2><?php bloginfo('description'); ?></h2>    	<a name="top"></a>
		</div> <!-- logo -->

    	<div class="header">
		</div> <!-- HEADER -->
	</div> <!-- HEADER -->
    <div style="clear"></div>