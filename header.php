<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <header>
 *
 * @package agency-x
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Meta tag -->
		<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Start Header -->
<header id="header">
	<!-- Header Inner -->
	<div class="header-inner">
		<div class="container">
			<div class="row">
				
				<div class="col-md-3 col-sm-6 col-xs-12">
					<!-- Logo -->
					<div class="logo">
						<?php the_custom_logo(); ?>
						<h1 class='site-title'><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo(); ?></a></h1>
					</div>
					<!--/ End Logo -->
				</div>
				
					<div class="col-md-9 col-sm-6 col-xs-12">
						<div class="nav-area">
							<!-- Main Menu -->
							<nav class="mainmenu">
								<div class="mobile-nav"></div>

								<?php
									if(has_nav_menu('primary')): 
									$args = array(
										'theme_location'	=>	'primary',									
										'container'			=>	'div',
										'container_class'	=>	'collapse navbar-collapse',
										'menu_class'		=>	'nav navbar-nav',
										'walker'			=>	new Agency_X_Wp_Bootstrap_Navwalker()
									); 
									 wp_nav_menu( $args );
									else:
										 ?>	
										 <ul class="nav navbar-nav">
			                                                <?php wp_list_pages( array( 'title_li' => '','depth' =>1 ) ); ?>
			                              </ul>
	                          	<?php endif;?>				
							</nav>
							<!--/ End Main Menu -->
							<!-- Search Form -->
							<ul class="search">
								<li><a href="#header"><i class="fa fa-search"></i></a></li>
							</ul>	
							<div class="search-form">
								<?php get_search_form( true ); ?>							
							</div>
							<!--/ End Search Form -->
						</div>
					</div>
			</div>
		</div>
	</div>
	<!--/ End Header Inner -->
</header>
<!--/ End Header -->

<?php if(!is_front_page() || is_home()): ?>
<!-- Start Breadcrumbs -->
		<section id="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php if(is_home()): ?>
						<h2><?php bloginfo(); ?></h2>
						<ul>
							<li>
								<?php bloginfo('description'); ?>
							</li>
						</ul>

						<?php
						else:
								if ( is_archive() ) {
								the_archive_title( '<h2>', '</h2>' );
													}
							else{
								echo '<h2>';
								echo esc_html( get_the_title() );
								echo '</h2>';
							}
							?>
						<ul>
							<?php
									do_action( 'agency_x_breadcrumb' );		
								?>
						</ul>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
<!--/ End Breadcrumbs -->
<?php endif; ?>
