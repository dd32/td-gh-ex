<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package zenzero
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info smallPart">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'zenzero' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'zenzero' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( '%1$s by %2$s.', 'zenzero' ), 'Zenzero', '<a target="_blank" href="http://crestaproject.com" rel="designer" title="CrestaProject">CrestaProject</a>' ); ?>
		</div><!-- .site-info -->
		<div class="site-social smallPart">
		<?php 
			global $zenzero_theme_options;
			$zenzero_options = get_option( 'zenzero_theme_options', $zenzero_theme_options );
		?>
			<?php if ( $zenzero_options['facebookurl'] != '' ) : ?>
					<a href="<?php echo esc_url($zenzero_options['facebookurl']); ?>" title="Facebook" target="_blank" rel="nofollow"><i class="fa spaceLeftRight fa-facebook"></i></a>
				<?php endif; ?>
				
				<?php if ( $zenzero_options['twitterurl'] != '' ) : ?>
					<a href="<?php echo esc_url($zenzero_options['twitterurl']); ?>" title="Twitter" target="_blank" rel="nofollow"><i class="fa spaceLeftRight fa-twitter"></i></a>
				<?php endif; ?>
				
				<?php if ( $zenzero_options['googleplusurl'] != '' ) : ?>
					<a href="<?php echo esc_url($zenzero_options['googleplusurl']); ?>" title="Google Plus" target="_blank" rel="nofollow"><i class="fa spaceLeftRight fa-google-plus"></i></a>
				<?php endif; ?>
				
				<?php if ( $zenzero_options['linkedinurl'] != '' ) : ?>
					<a href="<?php echo esc_url($zenzero_options['linkedinurl']); ?>" title="Linkedin" target="_blank" rel="nofollow"><i class="fa spaceLeftRight fa-linkedin"></i></a>
				<?php endif; ?>
				
				<?php if ( $zenzero_options['instagramurl'] != '' ) : ?>
					<a href="<?php echo esc_url($zenzero_options['instagramurl']); ?>" title="Instagram" target="_blank" rel="nofollow"><i class="fa spaceLeftRight fa-instagram"></i></a>
				<?php endif; ?>
				
				<?php if ( $zenzero_options['youtubeurl'] != '' ) : ?>
					<a href="<?php echo esc_url($zenzero_options['youtubeurl']); ?>" title="YouTube" target="_blank" rel="nofollow"><i class="fa spaceLeftRight fa-youtube"></i></a>
				<?php endif; ?>
				
				<?php if ( $zenzero_options['pinteresturl'] != '' ) : ?>
					<a href="<?php echo esc_url($zenzero_options['pinteresturl']); ?>" title="Pinterest" target="_blank" rel="nofollow"><i class="fa spaceLeftRight fa-pinterest"></i></a>
				<?php endif; ?>
				
				<?php if ( $zenzero_options['tumblrurl'] != '' ) : ?>
					<a href="<?php echo esc_url($zenzero_options['tumblrurl']); ?>" title="Tumblr" target="_blank" rel="nofollow"><i class="fa spaceLeftRight fa-tumblr"></i></a>
				<?php endif; ?>
				
				<?php if ( ! $zenzero_options['hiderss'] ) : ?>
					<a href="<?php bloginfo( 'rss2_url' ); ?>" title="RSS"><i class="fa spaceLeftRight fa-rss"></i></a>
				<?php endif; ?>
		</div><!-- .site-social -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php get_sidebar(); ?>
<a href="#top" id="toTop" class="showTop"><i class="fa fa-angle-up"></i></a>
<?php if ( ! $zenzero_options['hidesearch'] ) : ?>
	<div id="open-search" class="showSearch"><i class="fa fa-search"></i></div>
	<!-- Start: Search Form -->
	<div id="search-full">
		<div class="search-container">
			<form id="search-form" method="get" action="<?php echo home_url( '/' ); ?>">
				<input id="search-field" type="text" name="s" value="" placeholder="<?php _e('Type here and hit enter...', 'zenzero'); ?>" />
			</form>
			<span><a id="close-search"><i class="fa fa-close"></i> <?php _e('Close', 'zenzero'); ?></a></span>
		</div>
	</div>
	<!-- End: Search Form -->
<?php endif; ?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="open-sidebar" class="showSide"><span class="sidebarButton"></span></div>
<?php endif; ?>
<?php wp_footer(); ?>

</body>
</html>
