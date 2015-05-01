<?php
/**
 * The header for the theme.
 *
 * Displays all of the <head> section and everything until <div id="content">
 *
 * @package Atomic
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
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'atomic' ); ?></a>
	<header id="masthead" class="site-header" role="banner" style="background-image: url(<?php
if ( ( is_single() || is_page() ) && ( '' != get_theme_mod( 'featured_header' ) ) ) {
	if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id() ); }
	else { if (get_header_image() != '') { header_image(); }
			else { echo get_template_directory_uri() . '/images/header.jpg'; }}
}
else { if (get_header_image() != '') { header_image(); }
			else { echo get_template_directory_uri() . '/images/header.jpg'; }} 
?>); background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
	<div class="overlay">
		<div class="inner-wrap">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php if ( get_theme_mod( 'logo' ) ) {
					echo '<img src="' . esc_url( get_theme_mod( 'logo' ) ) . '" alt="' . get_bloginfo( 'name' ) . '" />';
				} else {
					if ( of_get_option( 'header_topleft_text', '' ) || of_get_default('header_topleft_text') ) {
						echo of_get_option( 'header_topleft_text', of_get_default('header_topleft_text') );
					}
				} ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div><!-- .site-branding -->
			<button class="menu-toggle"></button>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<ul>
					<?php wp_nav_menu( array( 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'primary' ) ); ?>
				</ul>
			</nav><!-- #site-navigation -->
			<div class="clear"></div>
		</div>
		<?php
		echo '<div class="header-desc-wrap">';
			
		/* Custom header text if single post, display date and title */
		if ( is_single() ) {
			echo '<div class="post-date';	
			if ( of_get_option( 'headertypography', '' ) || ( of_get_option( 'headertypography', '' ) == '' && of_get_default('headertypography') ) ) {
				if ( of_get_option( 'headertypography', '' ) ) {
					$typography = of_get_option('header_date_typography');
				} else $typography = of_get_default('header_date_typography');
				echo '" style="font-family: ' . $typography['face'] . '; font-size:' . $typography['size'] . '; font-style: ' . $typography['style'] . '; color:'.$typography['color'] . ';">';
			} else { echo ' post-date-default">'; }
			atomic_posted_on( '', '</div>' );

			echo '<div class="entry-title post-title';
			if ( of_get_option( 'headertypography', '' ) || ( of_get_option( 'headertypography', '' ) == '' && of_get_default('headertypography') ) ) {
				if ( of_get_option( 'headertypography', '' ) ) {
					$typography = of_get_option('header_title_typography');
				} else $typography = of_get_default('header_title_typography');
				echo '" style="font-family: ' . $typography['face'] . '; font-size:' . $typography['size'] . '; font-style: ' . $typography['style'] . '; color:'.$typography['color'] . ';">';
			} else { echo ' post-title-default">'; }
			the_title( '', '</div>' );
		}
		/* End custom header text of single post */
		
		/* Custom text on front page of site (single or multisite site) */
		if ( is_front_page() && ( of_get_option( 'header_top_text', '1' ) && of_get_default('header_top_text') ) ) {
			echo '<div class="header-text-first">' . of_get_option( 'header_top_text', of_get_default('header_top_text') ) . '</div>';
		}
		
		if ( is_front_page() && ( of_get_option( 'header_bottom_text', '1' ) && of_get_default('header_bottom_text') ) ) {
			echo '<div class="header-text-second">' . of_get_option( 'header_bottom_text', of_get_default('header_bottom_text') ) . '</div>';
		}
		if ( is_front_page() && ( of_get_option( 'header_linkone_text', '1' ) && of_get_default('header_linkone_text') ) ) {
			echo '<br><a href="' . of_get_option( 'header_linkone_address', of_get_default('header_linkone_address') ) . '" class="header-link">' . of_get_option( 'header_linkone_text', of_get_default('header_linkone_text') ) . '</a>';
		}
		if ( is_front_page() && ( of_get_option( 'header_linktwo_text', '1' ) && of_get_default('header_linktwo_text') ) ) {
			echo '&nbsp; &nbsp;<a href="' . of_get_option( 'header_linktwo_address', of_get_default('header_linktwo_address') ) . '" class="header-link">' . of_get_option( 'header_linktwo_text', of_get_default('header_linktwo_text') ) . '</a>';
		}
		/* End custom text on front page of site */
			
		/* Custom header text if category or page  */
		if (is_category()) {
			echo '<div class="header-text-first">Category</div><div class="header-text-second">' . single_cat_title("", false) . '</div>';
		}

		if (is_page() && !is_front_page()) {
			echo '<div class="header-page-title">' . get_the_title() . '</div>';
		}
		/* End custom  text of category or page */
		
		echo '</div>';
		?>
		</div><!-- .overlay -->
	</header><!-- #masthead -->

	<div id="content" class="site-content inner-wrap">