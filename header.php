<?php
/**
 * The header for our theme.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
	<div class="wrapper-container">
	
		<a class="skip-link screen-reader-text" href="#content">
			<?php _e( 'Skip to content', 'bnw' ); ?>
		</a>
		<!-- Header -->
		<div class="header">
			<div class="header-container">
				<div class="top-header">
					<div class="container">
						<div class="logo animated fadeIn">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php
								if (class_exists("TitanFramework")){
									$titan = TitanFramework::getInstance( 'bnw' );
									$imageID = $titan->getOption( 'upload_logo' );
									// The value may be a URL to the image (for the default parameter)
									// or an attachment ID to the selected image.
									$imageSrc = $imageID; // For the default value
									if ( is_numeric( $imageID ) ) {
										$imageAttachment = wp_get_attachment_image_src( $imageID );
										$imageSrc = $imageAttachment[0];
									}
									if(strlen($imageSrc)>0){
										?>
											<img src='<?php echo esc_url( $imageSrc ); ?>' width=""/>
										<?php
									}
									else{
										?>
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
										<?php
									}
								}
								else{
									?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
									<?php
								}
							?>
							</a>
							
									
						</div>
						<div class="tagline">
							<?php		
								if (!class_exists("TitanFramework")){
									bloginfo( 'description' );
								}else{
									$titan = TitanFramework::getInstance( 'bnw' );
									$siteTagline = $titan->getOption( 'site_tagline' );
									if($siteTagline>0){
										echo bloginfo( 'description' );
									}
								}
							?>
							<?php
								if (class_exists("TitanFramework")){
									$titan = TitanFramework::getInstance( 'bnw' );
									$customTagline = $titan->getOption( 'custom_tagline' );
									echo $customTagline;
								}
							?>
						</div>
					</div>
				</div>
				<div class="middle-header">
					<div class="container">
						<div class="main-menu">
							<nav id="site-navigation" class="main-navigation" role="navigation">
								<button class="menu-toggle" aria-controls="menu" aria-expanded="false">
									<?php _e( 'Primary Menu', 'bnw' ); ?>
								</button>
								<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
							</nav>
						</div>
					</div>
				</div>
				<div class="bottom-header">
				</div>
			</div>
		</div><!-- /header -->
