<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BeautyTemple
 */
			
$social_links_fb = get_theme_mod( 'beautytemple_social_links_fb_option', '' );
$social_links_tw = get_theme_mod( 'beautytemple_social_links_tw_option', '' );
$social_links_gplus =  get_theme_mod( 'beautytemple_social_links_gplus_option', '' );
$social_links_instagram = get_theme_mod( 'beautytemple_social_links_instagram_option', '' );
$social_links_github = get_theme_mod( 'beautytemple_social_links_github_option', '' );
$social_links_behance = get_theme_mod( 'beautytemple_social_links_behance_option', '' );

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ($social_links_fb || $social_links_tw || $social_links_gplus || $social_links_instagram || $social_links_behance):?>
			<div class="social-links row">
				<ul>
					<?php if ($social_links_fb):?><li><a target="blank" href="<?php echo $social_links_fb ; ?>"><i class="icon-facebook-squared"></i></a></li><?php endif;?>
					<?php if ($social_links_tw):?><li><a target="blank" href="<?php echo $social_links_tw ; ?>"><i class="icon-twitter"></i></a></li><?php endif;?>
					<?php if ($social_links_gplus):?><li><a target="blank" href="<?php echo $social_links_gplus ; ?>"><i class="icon-gplus"></i></a></li><?php endif;?>
					<?php if ($social_links_instagram):?><li><a target="blank" href="<?php echo $social_links_instagram ; ?>"><i class="icon-instagram"></i></a></li><?php endif;?>
					<?php if ($social_links_behance):?><li><a target="blank" href="<?php echo $social_links_behance ; ?>"><i class="icon-behance"></i></a></li><?php endif;?>
				</ul>
			</div>
		<?php endif;?>	
		<div class="site-info row">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'beautytemple' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'beautytemple' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'beautytemple' ), 'beautytemple', '<a href="http://AwoThemes.pro" rel="designer">AwoThemes</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
