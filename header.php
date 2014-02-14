<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php $options = get_option( 'faster_theme_options' ); ?>
<link rel="shortcut icon" href="<?php if($options['fevicon'] != ''){echo $options['fevicon'];}else{ echo get_template_directory_uri().'/images/favicon.ico';} ?>">
<title><?php wp_title(); ?></title>

<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<?php wp_head(); ?>
<script type="text/javascript">
    jQuery(function($) {
		/* Mobile */
				
		$("#menu-trigger").on("click", function(){
			$(".menu-ommune").slideToggle();
		});

		// iPad
		var isiPad = navigator.userAgent.match(/iPad/i) != null;
		if (isiPad) $('#menu-ommune ul').addClass('no-transition');      
    });          
</script>
</head>

<body <?php body_class(); ?>>
<header class="header">
  <div class="navbar navbar-inverse " role="navigation">
    <div class="container">
	 <?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	<?php endif; ?>
      <div class="navbar-header">
        <button id="menu-trigger" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand head_title" href="<?php echo site_url(); ?>">
        <?php if('' == $options['logo']){
			 bloginfo('name');
		 }else{
           echo  "<img src='".$options['logo']."' class='img-responsive'/>";
		 }?>
        </a> </div>
      <?php 
			$defaults = array(
					'theme_location'  => 'primary',
					'menu'            => 'check',
					'container'       => 'div',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="menu" class="navbar-right menu-ommune">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
					);
			wp_nav_menu($defaults); ?>
      
      <!--/.navbar-collapse --> 
    </div>
  </div>
  <!--end / nav--> 
</header>
<!--end / header--> 