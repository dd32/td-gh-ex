<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="topbar" class="clearfix">
	<div class="container">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="social-icons">
				<span><a data-toggle="tooltip" data-placement="bottom" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></span>
				<span><a data-toggle="tooltip" data-placement="bottom" title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a></span>
				<span><a data-toggle="tooltip" data-placement="bottom" title="Twitter" href="#"><i class="fa fa-twitter"></i></a></span>
				<span><a data-toggle="tooltip" data-placement="bottom" title="Youtube" href="#"><i class="fa fa-youtube"></i></a></span>
				<span><a data-toggle="tooltip" data-placement="bottom" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a></span>
				<span><a data-toggle="tooltip" data-placement="bottom" title="Dribbble" href="#"><i class="fa fa-dribbble"></i></a></span>
				<span class="last"><a data-toggle="tooltip" data-placement="bottom" title="Skype" href="#"><i class="fa fa-skype"></i></a></span>
			</div><!-- end social icons -->
		</div><!-- end columns -->
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="callus">
				<span class="topbar-email"><i class="fa fa-envelope"></i> <a href="mailto:name@yoursite.com">name@yoursite.com</a></span>
				<span class="topbar-phone"><i class="fa fa-phone"></i> 1-900-324-5467</span>
			</div><!-- end callus -->
		</div><!-- end columns -->
	</div><!-- end container -->
</div><!-- end topbar -->

<header id="header-style-1">
	<div class="container">
		<nav class="navbar yamm navbar-default">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand">
				<?php $header_text = display_header_text();
				if($header_text)
				{ echo get_bloginfo('name'); } ?></a>
			</div><!-- end navbar-header -->
			
			<div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right">
					<?php wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'menu_class' => 'nav navbar-nav',
                                    'fallback_cb' => 'awada_fallback_page_menu',
                                    'walker' => new awada_nav_walker(),
                                )
                            ); ?>
							<!-- end navbar-nav -->
			</div><!-- #navbar-collapse-1 -->
		</nav><!-- end navbar yamm navbar-default -->
	</div><!-- end container -->
</header><!-- end header-style-1 -->