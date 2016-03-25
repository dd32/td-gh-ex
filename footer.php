<?php
/**
 * The template for displaying the footer.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adney
 */

if( is_front_page() && is_home()){
	if(!is_plugin_active('xylus-toolkit/xylus-toolkit.php')  || 'posts' == get_option('show_on_front')){
 	?>
		</div>
	</section>
<?php }
}else{ ?>
    </div><!-- end container -->
</section>
<?php } ?>

<!-- CAll to Action -->
<?php  if(get_theme_mod('display_cta',false)){
	$cta_title = (get_option('cta_title'))?sanitize_text_field(get_option('cta_title')):'';
	$cta_button_text = (get_option('cta_button_text'))?sanitize_text_field(get_option('cta_button_text')):'';
	$cta_button_link = (get_option('cta_button_link'))?absint(get_option('cta_button_link')):0;
	if($cta_button_link > 0){
		$cta_button_link = get_permalink($cta_button_link);
	}else{
		$cta_button_link = '#';
	}
	$cta_class = 'col-md-12 col-sm-12 text-center';
	if(is_active_sidebar('cta-sidebar')){
		$cta_class = 'col-md-6 col-sm-12';
	}
	?>
	<section class="green-section wow fadeInUp" style="padding:50px 0">
		<div class="container">
			<div class="<?php echo $cta_class; ?>">
				<div class="row">
					<span class="white-text montserrat-text uppercase" style="font-size:30px;display:block;">
						<?php echo $cta_title; ?>
					</span>
					<a href="<?php echo $cta_button_link; ?>" class="btn white" style="margin-top:30px"><span><?php echo $cta_button_text; ?></span></a>
				</div>
			</div>
			<?php
			if(is_active_sidebar('cta-sidebar')){ ?>
				<div class="col-md-6 col-sm-12">
					<div class="row">
						<?php
						dynamic_sidebar('cta-sidebar');
						?>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</section>
<?php }else{
	echo '<div class="gap"></div>';
} ?>

<!-- FOOTER -->
<footer id="colophon" class="main-footer wow fadeInUp site-footer">
	<div class="container">
		<div class="col-md-8 col-sm-12">
			<div class="row">
				<nav class="footer-nav">
					<?php
					if ( has_nav_menu( 'footer' ) ) {
						wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu','container'=>'ul','depth'=>'1', 'menu_class'=>'footer_menu' ));
					} ?>
				</nav>
			</div>
			<?php if(get_option('footer_copyright')){?>
				<div class="row">
					<div class="uppercase gray-text footer_copyright">
						<?php echo get_option('footer_copyright'); ?>
					</div>
				</div>
			<?php } ?>
		</div>

		<div class="col-md-4 col-sm-12" style="text-align:right">
			<div class="row">
				<div class="uppercase gray-text site-info">
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'adney' ), 'Adney', '<a href="http://xylusthemes.com/" rel="designer">Xylus Themes</a>' ); ?>
				</div>

				<?php  if(get_theme_mod('display_social')){
					$facebook = (get_option('facebook_url'))?esc_url_raw(get_option('facebook_url')):'';
					$twittter = (get_option('twitter_url'))?esc_url_raw(get_option('twitter_url')):'';
					$linkedin = (get_option('linkedin_url'))?esc_url_raw(get_option('linkedin_url')):'';
					$googleplus = (get_option('googleplus_url'))?esc_url_raw(get_option('googleplus_url')):'';
					$instagram = (get_option('instagram_url'))?esc_url_raw(get_option('instagram_url')):'';
					$youtube = (get_option('youtube_url'))?esc_url_raw(get_option('youtube_url')):'';
					?>
					<ul class="social-icons" style="margin-top:30px;float:right">
						<?php
						if($facebook != ''){
							echo '<li><a href="'.$facebook.'"><i class="icon ion-social-facebook"></i></a></li>';
						}
						if($twittter != ''){
							echo '<li><a href="'.$twittter.'"><i class="icon ion-social-twitter"></i></a></li>';
						}
						if($linkedin != ''){
							echo '<li><a href="'.$linkedin.'"><i class="icon ion-social-linkedin"></i></a></li>';
						}
						if($googleplus != ''){
							echo '<li><a href="'.$googleplus.'"><i class="icon ion-social-googleplus"></i></a></li>';
						}
						if($instagram != ''){
							echo '<li><a href="'.$instagram.'"><i class="icon ion-social-instagram"></i></a></li>';
						}
						if($youtube != ''){
							echo '<li><a href="'.$youtube.'"><i class="icon ion-social-youtube"></i></a></li>';
						}
						?>
					</ul>
					<?php
				}
				?>

			</div>
		</div>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>