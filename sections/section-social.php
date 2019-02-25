<?php
/**
* social.php
*
* @author    Franchi Design
* @package   atomy
* @version   1.0.0
*/
?>

<!-- Facebook -->
<li><a href="<?php echo esc_url( get_theme_mod( 'atomy_link_facebook_social' ));?>">
	  <i class="fab fa-facebook"></i>
	</a>
</li>
	
<!-- Twitter -->
<li><a href="<?php echo esc_url( get_theme_mod( 'atomy_link_twitter_social' ));?>">
		<i class="fab fa-twitter"></i>
	</a>
</li>
	
<!-- Google Plus-->
<?php if ( false == esc_html( get_theme_mod( 'atomy_enable_google_plus_social', true) )) : ?>
<li><a href="<?php echo esc_url( get_theme_mod( 'atomy_link_google_plus_social' )); ?>">
		<i class="fab fa-google-plus-g"></i>
	</a>
</li>
<?php endif; ?>

<!-- Dribbble-->
<?php if ( false == esc_html( get_theme_mod( 'atomy_enable_dribbble_social', true ) )) : ?>
<li><a href="<?php echo esc_url( get_theme_mod( 'atomy_link_dribbble_social' )); ?>">
		<i class="fab fa-dribbble"></i>
	</a>
</li>
<?php endif; ?>

<!-- Tumblr -->
<?php if ( false == esc_html( get_theme_mod( 'atomy_enable_tumblr_social', true ) )) : ?>
<li><a href="<?php echo esc_url( get_theme_mod( 'atomy_link_tumblr_social' ));?>">
	   <i class="fab fa-tumblr"></i>
	</a>
</li>
<?php endif; ?>

<!-- Instagram -->
<li><a href="<?php echo esc_url( get_theme_mod( 'atomy_link_instagram_social' )); ?>">
	   <i class="fab fa-instagram"></i>
	</a>
</li>
						
<!-- Linkedin -->
<?php if ( false == esc_html( get_theme_mod( 'atomy_enable_linkedin_social', true ) )) : ?>
<li><a href="<?php echo esc_url( get_theme_mod( 'atomy_link_linkedin_social' )); ?>">
		<i class="fab fa-linkedin"></i>
	</a>
</li>
<?php endif; ?>

<!-- Youtube -->
<?php if ( false == esc_html( get_theme_mod( 'atomy_enable_youtube_social', true) )) : ?>
<li><a href="<?php echo esc_url( get_theme_mod( 'atomy_link_youtube_social' )); ?>">
		<i class="fab fa-youtube-square"></i>
	</a>
</li>
<?php endif; ?>

<!-- Pinterest -->
<?php if ( false == esc_html( get_theme_mod( 'atomy_enable_pinterest_social',true ) )) : ?>
<li><a href="<?php echo esc_url( get_theme_mod( 'atomy_link_pinterest_social' )); ?>">
		<i class="fab fa-pinterest-p"></i>
	</a>
</li>
<?php endif; ?>

<!-- Flickr -->
<?php if ( false == esc_html( get_theme_mod( 'atomy_enable_flickr_social', true) )) : ?>
<li><a href="<?php echo esc_url( get_theme_mod( 'atomy_link_flickr_social' )); ?>">
		<i class="fab fa-flickr"></i>
	</a>
</li>
<?php endif; ?>

<!-- Github -->
<?php if ( false == esc_html( get_theme_mod( 'atomy_enable_github_social', true ) )) : ?>
<li><a href="<?php echo esc_url( get_theme_mod( 'atomy_link_github_social' )); ?>">
		<i class="fab fa-github"></i>
	</a>
</li>
<?php endif; ?>


