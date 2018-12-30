<?php
/**
 * Custom theme functions
 *
 * @package bidnis
 * @since 1.0.0
 */

/**
  * Social media icons
  *
  * @since 1.0.0
  */
$bidnis_social_icons = array(
  'Twitter'     =>  'fa-twitter',
  'Facebook'    =>  'fa-facebook',
  'Instagram'   =>  'fa-instagram',
  'Vine'        =>  'fa-vine',
  'SnapChat'    =>  'fa-snapchat-ghost',
  'LinkedIn'    =>  'fa-linkedin',
  'Google+'     =>  'fa-google-plus',
  'YouTube'     =>  'fa-youtube',
  'Twitch'      =>  'fa-twitch',
  'Vimeo'       =>  'fa-vimeo',
  'Pinterest'   =>  'fa-pinterest',
  'Reddit'      =>  'fa-reddit-alien',
  'Steam'       =>  'fa-steam',
  'Flickr'      =>  'fa-flickr',
  'Tumblr'      =>  'fa-tumblr',
  'Spotify'     =>  'fa-spotify',
  'Soundcloud'  =>  'fa-soundcloud',
  'MixCloud'    =>  'fa-mixcloud',
  'GitHub'      =>  'fa-github',
  'BitBucket'   =>  'fa-bitbucket',
  'Behance'     =>  'fa-behance',
  'LastFM'      =>  'fa-lastfm',
  'DeviantArt'  =>  'fa-deviantart',
  'BitCoin'     =>  'fa-btc',
);

/**
 * Formated social media elements
 * 
 * @since 1.0.0
 * @return Element [div#social-links]
 */
function bidnis_social_links() {
  global $bidnis_social_icons;

  ?>
  <div id="social-links">
    <?php if ( get_theme_mod( 'social_media_rss' ) ): ?>
      <a title="<?php esc_attr( bloginfo( 'rss2_url' ) ); ?>" href="<?php esc_url( bloginfo('rss2_url') ); ?>" target="_blank">
        <i class="fa fa-rss"></i>
      </a>
    <?php endif; ?>

    <?php foreach( $bidnis_social_icons as $service => $icon ): ?>
      <?php if ( get_theme_mod( 'social_media_'.strtolower( $service ) ) ): ?>
        <a title="<?php echo esc_attr( $service ); ?>" href="<?php echo esc_url( get_theme_mod( 'social_media_'.strtolower( $service ) ) ); ?>" target="_blank">
          <i class="fa <?php echo esc_attr( $icon ); ?>"></i>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
  </div><!-- #social-links -->
<?php
}

/**
  * Phone and E-mail
  *
  * @since Bidnis 1.0.0
  */
function bidnis_phone_email() { ?>
  <div id="bidnis-phone-email">
    <?php if( get_theme_mod('phone') ): ?>
      <a id="bidnis-phone" href="tel:<?php echo esc_url( get_theme_mod('phone') ); ?>"><?php echo esc_html( get_theme_mod('phone') ); ?></a>
    <?php endif; ?>

    <?php if( get_theme_mod('email') ): ?>
      <a id="bidnis-email" href="mailto:<?php echo esc_attr( get_theme_mod('email') ); ?>" target="_top"><?php echo esc_html( get_theme_mod('email') ); ?></a>
    <?php endif; ?>
  </div>
<?php } ?>