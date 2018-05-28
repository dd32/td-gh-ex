<?php
/**
 * social.php
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.0.0
 */
?>

    <!-- Facebook -->
    <?php if ( false == get_theme_mod( 'enable_facebook_social', false) ) :?>
    <li><a href="<?php echo get_theme_mod( 'link_facebook_social' ,'#');?>">
	<i class="fab fa-facebook"></i></a></li>
    <?php endif; ?>
    <!-- Twitter -->
    <?php if ( false == get_theme_mod( 'enable_twitter_social', false) ):?>
	<li><a href="<?php echo get_theme_mod( 'link_twitter_social','#' );?>">
	<i class="fab fa-twitter"></i></a></li>
	<?php endif; ?>
    <!-- Google Plus-->
	<?php if ( false == get_theme_mod( 'enable_google_plus_social', false) ) : ?>
	<li><a href="<?php echo get_theme_mod( 'link_google_plus_social','#' ); ?>">
	<i class="fab fa-google-plus-g"></i></a></li>
	<?php endif; ?>
	<!-- Dribbble-->
    <?php if ( false == get_theme_mod( 'enable_dribbble_social', true ) ) : ?>
	<li><a href="<?php echo get_theme_mod( 'link_dribbble_social','#' ); ?>">
	<i class="fab fa-dribbble"></i></a></li>
	<?php endif; ?>
    <!-- Tumblr -->
	<?php if ( false == get_theme_mod( 'enable_tumblr_social', true ) ) : ?>
	<li><a href="<?php echo get_theme_mod( 'link_tumblr_social','#' );?>">
	<i class="fab fa-tumblr"></i></a></li>
	<?php endif; ?>
    <!-- Instagram -->
	<?php if ( false == get_theme_mod( 'enable_instagram_social', false ) ) : ?>
	<li><a href="<?php echo get_theme_mod( 'link_instagram_social','#' ); ?>">
	<i class="fab fa-instagram"></i></a></li>
    <?php endif; ?>
    <!-- Linkedin -->
	<?php if ( false == get_theme_mod( 'enable_linkedin_social', false ) ) : ?>
	<li><a href="<?php echo get_theme_mod( 'link_linkedin_social','#' ); ?>">
	<i class="fab fa-linkedin"></i></a></li>
	<?php endif; ?>
    <!-- Youtube -->
    <?php if ( false == get_theme_mod( 'enable_youtube_social', true) ) : ?>
	<li><a href="<?php echo get_theme_mod( 'link_youtube_social','#' ); ?>">
	<i class="fab fa-youtube-square"></i></a></li>
	<?php endif; ?>
	<!-- Pinterest -->
	<?php if ( false == get_theme_mod( 'enable_pinterest_social',true ) ) : ?>
	<li><a href="<?php echo get_theme_mod( 'link_pinterest_social','#' ); ?>">
	<i class="fab fa-pinterest-p"></i></a></li>
	<?php endif; ?>
    <!-- Flickr -->
    <?php if ( false == get_theme_mod( 'enable_flickr_social', true) ) : ?>
	<li><a href="<?php echo get_theme_mod( 'link_flickr_social','#' ); ?>">
	<i class="fab fa-flickr"></i></a></li>
	<?php endif; ?>
    <!-- Github -->
	<?php if ( false == get_theme_mod( 'enable_github_social', true ) ) : ?>
	<li><a href="<?php echo get_theme_mod( 'link_github_social','#' ); ?>">
	<i class="fab fa-github"></i></a></li>
	<?php endif; ?>	