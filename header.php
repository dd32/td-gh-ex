<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Athenea
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="google-site-verification" content="<?php echo of_get_option('athenea_webmaster','no entry'); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php if ( of_get_option('athenea_favicon') !='' ) { ?><?php echo of_get_option('athenea_favicon'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/favicon.png<?php } ?>">
<link href='http://fonts.googleapis.com/css?family=Nunito:300|Aclonica' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>

<body id="toop" <?php body_class(); ?>>
<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo of_get_option('athenea_analitics','no entry'); ?>']);
  _gaq.push(['_setDomainName', '<?php echo of_get_option('athenea_analidom','no entry'); ?>']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<div id="page" class="hfeed site">
<?php do_action( 'before' ); ?>	
<div class="navbar-wrapper">
  <div class="formathead formathead_imagn">
    <div class="site-branding">
      <div class="container">
       <div class="row">
        <div class="col-md-12">
          <h1 class="site-title">
            <span class="glyphicon glyphicon-globe"></span> 
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'description' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
          </h1>
        </div>
       </div><!-- #row -->     
      </div><!-- #container -->
    </div><!-- #site-branding -->
	<header id="masthead" class="site-header" role="banner">
     <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
        </div>
        <div id="menuf" class="collapse navbar-collapse navbar-ex1-collapse">
         <div class="container">
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		   <span class="glyphicon glyphicon-home"></span> <?php bloginfo( 'name' ); ?>
          </a>
          <form method="get" class="navbar-form navbar-right form-signin" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
            <label for="navbar-search" class="sr-only"><?php _e( 'Search:', 'athenea' ); ?></label>
            <div class="form-group">
                <input type="text" class="form-control" name="s" id="navbar-search" placeholder="<?php _e( 'Search', 'athenea' ); ?>" />
            </div>
          </form>
		  <?php wp_nav_menu( array(
			'theme_location' => 'primary',
			'menu_class'     => 'nav navbar-nav',
			'depth'          => 3,
			'fallback_cb'    => false,
			'walker'         => new wp_bootstrap_navwalker()
			));
          ?>
         </div><!-- #container -->
        </div><!-- #menu -->
     </nav><!-- #site-navigation -->
    </header><!-- #masthead -->
 </div><!-- #formathead -->
</div><!-- #navbar-wrapper -->