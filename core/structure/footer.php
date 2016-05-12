<?php
/**
 * Template functions used for the site footer.
 */

//SOCIAL LINKS
if ( ! function_exists( 'igthemes_social_links' ) ) {
	function igthemes_social_links() { ?>
        <?php if ( igthemes_option('facebook_url', 'https://www.facebook.com/iograficathemes') ) {
              $facebook_url = esc_url(igthemes_option('facebook_url', 'https://www.facebook.com/iograficathemes'));
              echo "<a href='$facebook_url' title='Facebook' target='_blank' class='social facebook-icon'><i class='fa-lg fa fa-facebook' aria-hidden='true'></i></a>";
        }?>
         <?php if ( igthemes_option('twitter_url', 'https://twitter.com/iograficathemes') ) {
              $twitter_url = esc_url(igthemes_option('twitter_url', 'https://twitter.com/iograficathemes'));
              echo "<a href='$twitter_url' title='Twitter' target='_blank' class='social twitter-icon'><i class='fa-lg fa fa-twitter' aria-hidden='true'></i></a>";
        }?>
         <?php if ( igthemes_option('google_url', 'https://plus.google.com/+Iograficathemes') ) {
              $google_url = esc_url(igthemes_option('google_url', 'https://plus.google.com/+Iograficathemes'));
              echo "<a href='$google_url' title='Google Plus' target='_blank' class='social google-icon'><i class='fa-lg fa fa-google-plus' aria-hidden='true'></i></a>";
        }?>
        <?php if ( igthemes_option('pinterest_url') ) {
              $pinterest_url = esc_url(igthemes_option('pinterest_url', ''));
              echo "<a href='$pinterest_url' title='Pinterest' target='_blank' class='social pinterest-icon'><i class='fa-lg fa fa-pinterest-p' aria-hidden='true'></i></a>";
        }?>
        <?php if ( igthemes_option('tumblr_url') ) {
              $tumblr_url = esc_url(igthemes_option('tumblr_url', ''));
              echo "<a href='$tumblr_url' title='Tumblr' target='_blank' class='social tumblr-icon'><i class='fa-lg fa fa-tumblr' aria-hidden='true'></i></a>";
        }?>
        <?php if ( igthemes_option('instagram_url') ) {
              $instagram_url = esc_url(igthemes_option('instagram_url', ''));
              echo "<a href='$instagram_url' title='Instagram' target='_blank' class='social instagram-icon'><i class='fa-lg fa fa-instagram' aria-hidden='true'></i></a>";
        }?>
        <?php if ( igthemes_option('linkedin_url') ) {
              $linkedin_url = esc_url(igthemes_option('linkedin_url', ''));
              echo "<a href='$linkedin_url' title='Linkedin' target='_blank' class='social linkedin-icon'><i class='fa-lg fa fa-linkedin' aria-hidden='true'></i></a>";
        }?>
        <?php if ( igthemes_option('dribbble_url') ) {
              $dribbble_url = esc_url(igthemes_option('dribbble_url', ''));
              echo "<a href='$dribbble_url' title='Dribble' target='_blank' class='social dribble-icon'><i class='fa-lg fa fa-dribbble' aria-hidden='true'></i></a>";
        }?>
         <?php if ( igthemes_option('vimeo_url') ) {
              $vimeo_url = esc_url(igthemes_option('vimeo_url', ''));
              echo "<a href='$vimeo_url' title='Vimeo' target='_blank' class='social vimeo-icon'><i class='fa-lg fa fa-vimeo' aria-hidden='true'></i></a>";
        }?>
        <?php if ( igthemes_option('youtube_url') ) {
              $youtube_url = esc_url(igthemes_option('youtube_url', ''));
              echo "<a href='$youtube_url' title='Youtube' target='_blank' class='social youtube-icon'><i class='fa-lg fa fa-youtube' aria-hidden='true'></i></a>";
        }?>
        <?php if ( igthemes_option('rss_url') ) {
              $rss_url = esc_url(igthemes_option('rss_url', ''));
              echo "<a href='$rss_url' title='RSS' target='_blank' class='social rss-icon'><i class='fa-lg fa fa-rss' aria-hidden='true'></i></a>";
        }?>
    <?php  }
}
//SITE INFO
if ( ! function_exists( 'igthemes_site_info' ) ) {
    function igthemes_site_info() { ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'basic-shop' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'basic-shop' ), 'WordPress' ); ?></a>
            <span class="sep"> | </span>
	        <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'basic-shop' ),wp_get_theme()->get( 'Name' ), '<a href="http://iograficathemes.com/" rel="designer">Iografica Themes</a>' ); ?>
            <a href="#" class="scrolltotop"><i class="fa-lg fa fa-chevron-circle-up" aria-hidden="true"></i></a>
		</div><!-- .site-info -->
    <?php  }
}