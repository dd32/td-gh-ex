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
        if ( is_single() || is_page() ) {
            if ( has_post_thumbnail() ) echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
            else {
                if ( get_header_image() != '' ) header_image(); 
                else echo get_template_directory_uri() . '/images/header.jpg';
            }
        } else {
            if ( get_header_image() != '' ) header_image();
            else echo get_template_directory_uri() . '/images/header.jpg';
        } ?>); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="overlay">
            <div class="inner-wrap">
                <div class="site-branding">
                    <?php
                    if ( ( of_get_option( 'header_title_text', '1' ) && of_get_default( 'header_title_text' ) ) || get_theme_mod( 'logo' ) ) {
                        echo '<h1 class="site-title"';
                        if ( of_get_option( 'header_title_size', '' ) ) {
                            echo ' style="font-size: ' . of_get_option( 'header_title_size') . 'rem;"';
                        }
                        echo '><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
                        if ( get_theme_mod( 'logo' ) ) {
                            echo '<img src="' . esc_url( get_theme_mod( 'logo' ) ) . '" alt="' . get_bloginfo( 'name' ) . '" />';
                        } else {
                            if ( of_get_option( 'header_title_text', '' ) || of_get_default( 'header_title_text' ) ) {
                                echo of_get_option( 'header_title_text' , of_get_default( 'header_title_text' ) );
                            }
                        }
                        echo '</a></h1>';
                    }
                    if ( of_get_option( 'header_description_text', '1' ) && of_get_default( 'header_description_text' ) ) {
                        echo '<h2 class="site-description"';
                        if ( of_get_option( 'header_description_size', '' ) ) {
                            echo ' style="font-size: ' . of_get_option( 'header_description_size' ) . 'rem;"';
                        }
                        echo '>';
                        if ( of_get_option( 'header_title_text', '' ) || of_get_default( 'header_description_text' ) ) {
                            echo of_get_option( 'header_description_text' , of_get_default( 'header_description_text' ) );
                        } else bloginfo( 'description' );
                        echo '</h2>';
                    }
                    ?>
                </div><!-- .site-branding -->
                <button class="menu-toggle"></button>
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <ul>
                        <?php wp_nav_menu( array( 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'primary' ) ); ?>
                    </ul>
                </nav><!-- #site-navigation -->
                <div class="clear"></div>
            </div>
            <div class="header-desc-wrap">
            <?php	
            /* Custom header text of single post, display date and title */
            if ( is_single() ) {
                echo '<div class="post-date';	
                if ( of_get_option( 'headertypography', '' ) || ( of_get_option( 'headertypography', '' ) == '' && of_get_default('headertypography') ) ) {
                    if ( of_get_option( 'headertypography', '' ) ) {
                        $typography = of_get_option( 'header_date_typography' );
                    } else $typography = of_get_default( 'header_date_typography' );
                    echo '" style="font-family: ' . $typography['face'] . '; font-size:' . $typography['size'] . '; font-style: ' . $typography['style'] . '; color:'.$typography['color'] . ';">';
                } else { echo ' post-date-default">'; }
                atomic_posted_on( '', '</div>' );

                echo '<div class="entry-title post-title';
                if ( of_get_option( 'headertypography', '' ) || ( of_get_option( 'headertypography', '' ) == '' && of_get_default('headertypography') ) ) {
                    if ( of_get_option( 'headertypography', '' ) ) {
                        $typography = of_get_option( 'header_title_typography' );
                    } else $typography = of_get_default( 'header_title_typography' );
                    echo '" style="font-family: ' . $typography['face'] . '; font-size:' . $typography['size'] . '; font-style: ' . $typography['style'] . '; color:'.$typography['color'] . ';">';
                } else { echo ' post-title-default">'; }
                the_title( '', '</div>' );
            }
            /* End custom header text of single post */
            
            /* Custom text on front page of site */
            if ( is_front_page() && ( of_get_option( 'header_top_text', '1' ) && of_get_default( 'header_top_text' ) ) ) {
                echo '<div ';	
                if ( of_get_option( 'header_top_text_typography', '' ) ) {
                    $typography = of_get_option( 'header_top_text_typography' );
                } else $typography = of_get_default( 'header_top_text_typography' );
                echo '" style="font-family: ' . $typography['face'] . '; font-size:' . $typography['size'] . '; font-style: ' . $typography['style'] . '; color:'.$typography['color'] . ';">';
                echo of_get_option( 'header_top_text', of_get_default( 'header_top_text' ) ) . '</div>';
            }
            if ( is_front_page() && ( of_get_option( 'header_bottom_text', '1' ) && of_get_default( 'header_bottom_text' ) ) ) {
                echo '<div ';	
                if ( of_get_option( 'header_bottom_text_typography', '' ) ) {
                    $typography = of_get_option( 'header_bottom_text_typography' );
                } else $typography = of_get_default( 'header_bottom_text_typography' );
                echo '" style="font-family: ' . $typography['face'] . '; font-size:' . $typography['size'] . '; font-style: ' . $typography['style'] . '; color:'.$typography['color'] . ';">';
                echo of_get_option( 'header_bottom_text', of_get_default( 'header_bottom_text' ) ) . '</div>';
            }
            if ( is_front_page() && ( of_get_option( 'header_linkone_text', '1' ) && of_get_default( 'header_linkone_text' ) ) ) {
                echo '<br><a href="' . of_get_option( 'header_linkone_address', of_get_default( 'header_linkone_address' ) ) . '" class="header-link">' . of_get_option( 'header_linkone_text', of_get_default( 'header_linkone_text' ) ) . '</a>';
            }
            if ( is_front_page() && ( of_get_option( 'header_linktwo_text', '1' ) && of_get_default( 'header_linktwo_text' ) ) ) {
                echo '&nbsp; &nbsp;<a href="' . of_get_option( 'header_linktwo_address', of_get_default( 'header_linktwo_address' ) ) . '" class="header-link">' . of_get_option( 'header_linktwo_text', of_get_default( 'header_linktwo_text' ) ) . '</a>';
            }
            /* End custom text on front page of site */
                
            /* Custom header text of category */
            if ( is_category( 'Latin America' ) ) {
                echo '<div class="header-text-first"></div><div class="header-text-second">En Moto Al Sur</div>';
            }
            else if ( is_category() ) {
                echo '<div class="header-text-first">Category</div><div class="header-text-second">' . single_cat_title("", false) . '</div>';
            }
            /* End custom header text of category */

            /* Custom header text of page */
            if ( is_page( 'Resume' ) ) {
                echo '<div class="header-text-first">What I\'ve done and</div><div class="header-text-second">my skillset</div><br><a href="http://kylegabriel.com/wp-content/uploads/2015/03/Kyle-Gabriel-Resume-2015.pdf" onclick="__gaTracker(\'send\', \'event\', \'download\', \'http://kylegabriel.com/wp-content/uploads/2015/03/Kyle-Gabriel-Resume-2015.pdf\');" class="header-link" target="_blank">download Resume</a>';
            }
            else if ( is_page( 'Contact Me' ) ) {
                echo '<div class="header-text-first">Send a friendly</div><div class="header-text-second"  style="font-style: italic;">HELLO</div>';
            }
            else if ( is_page( 'About Me') ) {
                echo '<div class="header-text-first"></div><div class="header-text-second" style="font-style: italic;">Who I Am</div>';
            }
            else if ( is_page( 'mytheme' ) ) {
                echo '<div class="header-text-first"  style="font-style: italic;">Simple, minimal</div><div class="header-text-second">atomic</div>';
            }
            else if ( is_page() && !is_front_page() ) {
                echo '<div class="header-page-title">' . get_the_title() . '</div>';
            }
            /* End custom header text of page */
            ?>
            </div><!-- .header-desc-wrap -->
		</div><!-- .overlay -->
	</header><!-- #masthead -->
	<div id="content" class="site-content inner-wrap">