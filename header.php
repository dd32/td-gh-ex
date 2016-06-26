<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<?php wp_head(); ?>
</head>
<?php $awada_theme_options = awada_theme_options();
$class = "";
if ($awada_theme_options['site_layout'] == 'boxed') {
    $class .= ' boxed ';
} ?>
<body <?php body_class($class); ?>>
<?php if ($awada_theme_options['site_layout'] == 'boxed') { ?>
<div id="wrapper" class="container">
<?php } ?>
<?php if ($awada_theme_options['topbar']){ ?>
<div id="topbar" class="clearfix">
	<div class="container">
		<?php if ($awada_theme_options['social_media_header']) { ?>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="social-icons">
			<div class="social-icons">
				<?php if ($awada_theme_options['social_facebook_link'] != '') { ?>
				<span><a id="facebook" data-toggle="tooltip" data-placement="bottom" title="Facebook" href="<?php echo esc_url($awada_theme_options['social_facebook_link']); ?>" target="_blank"><i class="fa fa-facebook"></i></a></span>
				<?php } if ($awada_theme_options['social_google_plus_link'] != '') { ?>
				<span><a id="googleplus" data-toggle="tooltip" data-placement="bottom" title="Google Plus" href="<?php echo esc_url($awada_theme_options['social_google_plus_link']); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></span>
				<?php } if ($awada_theme_options['social_twitter_link'] != '') { ?>
				<span><a id="twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter" href="<?php echo esc_url($awada_theme_options['social_twitter_link']); ?>" target="_blank"><i class="fa fa-twitter"></i></a></span>
				<?php } if ($awada_theme_options['social_youtube_link'] != '') { ?>
				<span><a id="youtube" data-toggle="tooltip" data-placement="bottom" title="Youtube" href="<?php echo esc_url($awada_theme_options['social_youtube_link']); ?>" target="_blank"><i class="fa fa-youtube"></i></a></span>
				<?php } if ($awada_theme_options['social_linkedin_link'] != '') { ?>
				<span><a id="linkedin" data-toggle="tooltip" data-placement="bottom" title="Linkedin" href="<?php echo esc_url($awada_theme_options['social_linkedin_link']); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></span>
				<?php } if ($awada_theme_options['social_dribbble_link'] != '') { ?>
				<span><a id="dribbble" data-toggle="tooltip" data-placement="bottom" title="Dribbble" href="<?php echo esc_url($awada_theme_options['social_dribbble_link']); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></span>
				<?php } if ($awada_theme_options['social_skype_link'] != '') { ?>
				<span class="last"><a id="skype" data-toggle="tooltip" data-placement="bottom" title="Skype" href="<?php echo esc_url($awada_theme_options['social_skype_link']); ?>" target="_blank"><i class="fa fa-skype"></i></a></span>
				<?php } ?>
			</div><!-- end social icons -->
		</div><!-- end columns -->
		<?php } ?>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" id="callus">
			<?php if ($awada_theme_options['contact_info_header']) { ?>
			<div class="callus">
				<?php if ($awada_theme_options['contact_email']) { ?>
				<span class="topbar-email"><i class="fa fa-envelope"></i> <a href="mailto:<?php echo sanitize_email($awada_theme_options['contact_email']); ?>"><?php echo sanitize_email($awada_theme_options['contact_email']); ?></a></span>
				<?php } if ($awada_theme_options['contact_phone']) { ?>
				<span class="topbar-phone"><i class="fa fa-phone"></i> <?php echo esc_attr($awada_theme_options['contact_phone']); ?></span>
				<?php } ?>
			</div><!-- end callus -->
			<?php } ?>
		</div><!-- end columns -->
	</div><!-- end container -->
</div><!-- end topbar -->
<?php } ?>
<header id="header-style-1" style="<?php if (get_header_image()) : ?> background-image:url('<?php header_image();?>'); <?php endif; ?>" class="<?php if($awada_theme_options['headersticky']=='0'){ echo 'affix1'; } ?>">
	<div class="container">
		<nav class="navbar yamm navbar-default">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<?php if ( function_exists( 'the_custom_logo' )) {
						the_custom_logo();
					} ?>
					<a id="alogo" href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand"><?php
						$header_text = display_header_text();
						if($header_text){ ?>
							<p id="logo_text_id"><?php echo get_bloginfo('name'); ?> </p><?php
						} ?>
					</a>	
			</div><!-- end navbar-header -->
			
			<div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right <?php if ($awada_theme_options['logo_layout']=='right'){ echo 'style="float:right;"'; } ?>">
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